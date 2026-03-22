<?php

namespace App\Livewire;

use App\Models\Addmembertrip;
use App\Models\Tripcreatemodel;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class AddMemberLive extends Component
{
    public $memberEmail;
    public $tripID;
    public $tripStatus;
    public $inactiveUsers = [];
    public $member = [];

    /**
     * Validation rules for adding a member
     */
    protected function rules()
    {
        return [
            'memberEmail' => [
                'required',
                'email',
                Rule::exists('users', 'email')
                    ->where(fn ($query) => $query->where('accountsType', 'Fisherman')),
                Rule::unique('addmembertrips', 'memberEmail')
                    ->where(fn ($query) => $query->where('tripID', $this->tripID)),
            ],
        ];
    }

    /**
     * Custom messages
     */
    protected $messages = [
        'memberEmail.required' => 'Please select a fisherman.',
        'memberEmail.exists'   => 'The selected fisherman is not registered in the system.',
        'memberEmail.unique'   => 'This fisherman is already assigned to the trip.',
    ];

    /**
     * Mount component with trip data
     */
    public function mount($tripId)
    {
        try {
            $this->tripID     = $tripId;
            $trip             = Tripcreatemodel::findOrFail($tripId);
            $this->tripStatus = $trip->status ?? 'Unknown';

            $this->loadTripMembers();
            $this->loadInactiveUsers();
        } catch (ModelNotFoundException) {
            session()->flash('error', 'The requested trip could not be found.');
            Log::warning('Trip not found in mount()', ['trip_id' => $tripId]);
        } catch (\Throwable $e) {
            session()->flash('error', 'Unexpected error occurred while loading the trip.');
            Log::error('Mount error in AddMemberLive', ['error' => $e]);
        }
    }

    /**
     * Load members assigned to this trip
     */
    public function loadTripMembers()
    {
        try {
            $this->member = Addmembertrip::with('user')
                ->where('tripID', $this->tripID)
                ->latest()
                ->get();
        } catch (\Throwable $e) {
            Log::error('Failed to load trip members', ['error' => $e]);
            session()->flash('error', 'Could not load trip members.');
            $this->member = collect();
        }
    }

    /**
     * Load all-time inactive users
     */
    public function loadInactiveUsers()
    {
        try {
            $inactive = collect();
            $fishermen = User::where('accountsType', 'Fisherman')->get();

            foreach ($fishermen as $fisherman) {
                $latest = Addmembertrip::where('memberEmail', $fisherman->email)
                    ->with('tripcreatemodel')
                    ->latest('id')
                    ->first();

                if (!$latest || optional($latest->tripcreatemodel)->status === 'completed') {
                    $inactive->push($fisherman);
                }
            }

            $latestMemberTrips = Addmembertrip::select('memberEmail')
                ->with('tripcreatemodel')
                ->latest('id')
                ->get()
                ->unique('memberEmail');

            foreach ($latestMemberTrips as $memberTrip) {
                if ($fishermen->contains('email', $memberTrip->memberEmail)) {
                    continue;
                }

                $trip = $memberTrip->tripcreatemodel;
                if ($trip && $trip->status === 'completed') {
                    $inactive->push((object) [
                        'name'         => '(Not Registered)',
                        'email'        => $memberTrip->memberEmail,
                        'accountsType' => 'Not Found',
                    ]);
                }
            }

            $this->inactiveUsers = $inactive->values();
        } catch (\Throwable $e) {
            Log::error('Failed loading inactive users', ['error' => $e]);
            session()->flash('error', 'Could not load inactive users.');
            $this->inactiveUsers = collect();
        }
    }

    /**
     * Add fisherman to trip
     */
    public function addMember()
    {
        try {
            $validated = $this->validate();

            DB::transaction(function () use ($validated) {
                Addmembertrip::create([
                    'memberEmail' => $validated['memberEmail'],
                    'tripID'      => $this->tripID,
                ]);
            });

            $this->reset('memberEmail');
            $this->loadTripMembers();
            $this->loadInactiveUsers();

            $this->dispatch('closeModal');
            session()->flash('success', 'Fisherman added successfully.');
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Throwable $e) {
            session()->flash('error', 'Failed to add fisherman.');
            Log::error('AddMemberLive -> addMember() failed', ['error' => $e]);
        }
    }

    /**
     * Remove fisherman from trip
     */
    public function remove($memberId)
    {
        try {
            DB::transaction(function () use ($memberId) {
                Addmembertrip::findOrFail($memberId)->delete();
            });

            $this->loadTripMembers();
            $this->loadInactiveUsers();

            session()->flash('success', 'Fisherman removed successfully.');
        } catch (ModelNotFoundException) {
            session()->flash('error', 'Member not found.');
            Log::warning('Tried to remove non-existent member.', ['member_id' => $memberId]);
        } catch (\Throwable $e) {
            session()->flash('error', 'Failed to remove fisherman.');
            Log::error('AddMemberLive -> remove() failed', ['error' => $e]);
        }
    }

    /**
     * Render component
     */
    public function render()
    {
        return view('livewire.add-member-live');
    }
}
