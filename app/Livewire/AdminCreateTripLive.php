<?php

namespace App\Livewire;

use App\Models\Catchfish;
use App\Models\Tripcreatemodel;
use App\Models\Expense;
use App\Models\Addmembertrip;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Exception;

class AdminCreateTripLive extends Component
{
    public $activeTab = 'active';
    // Trip creation form
    public $departureLocation, $departureTime, $boat, $status = 'scheduled', $emergency = '', $plannedArrivalTime, $boaTemail;
    public $expenses = [];
    public $tripMembers = [];
    public $fishC = [];
    public $selectedTripId;
    public $intrips;
    public $tripstat = 'scheduled';

    // UI control flags
    public $showCreateForm = false;
    public $showFishForm = false;
    public $showExpensesForm = false;
    public $showCrewForm = false;

    // Catch form
    public $fishSpecies, $fishWeight, $fishQuantity;

    public $trips;
    public $message;
   public function changeTab($tab)
{
    $this->activeTab = $tab;

}

    public function mount()
    {
        $this->expenses = [];
        $this->tripMembers = [];
        $this->trips = Tripcreatemodel::where('status','!=','completed')->latest()->get();
        $this->intrips = Tripcreatemodel::where('status','=','completed')->latest()->get();
    }

    public function createTrip()
    {
        try {
            $validated = $this->validate([
                'departureLocation' => 'required|string',
                'departureTime' => 'required|date',
                'boat' => 'required|string',
                'plannedArrivalTime' => 'required|date',
                'boaTemail' => 'required|email|exists:users,email',
            ]);

            $trip = Tripcreatemodel::create([
                'departureLocation' => $this->departureLocation,
                'departureTime' => $this->departureTime,
                'boat' => $this->boat,
                'status' => $this->status,
                'emergency' => $this->emergency,
                'plannedArrivalTime' => $this->plannedArrivalTime,
                'boaTemail' => $this->boaTemail,
            ]);

            foreach ($this->expenses as $expense) {
                if (!empty($expense['description'])) {
                    Expense::create([
                        'tripID' => $trip->id,
                        'date_time' => $expense['date_time'],
                        'description' => $expense['description'],
                        'quantity' => $expense['quantity'],
                        'unit' => $expense['unit'],
                        'amount' => $expense['amount'],
                    ]);
                }
            }

            foreach ($this->tripMembers as $member) {
                if (!empty($member['email'])) {
                    Addmembertrip::create([
                        'tripID' => $trip->id,
                        'memberEmail' => $member['email'],
                    ]);
                }
            }

            $this->reset([
                'departureLocation',
                'departureTime',
                'boat',
                'status',
                'emergency',
                'plannedArrivalTime',
                'boaTemail',
                'expenses',
                'tripMembers',
                'showCreateForm'
            ]);

            $this->mount(); // Refresh trips

            session()->flash('message', 'Trip successfully created.');
            $this->message = 'Trip successfully created.';
        } catch (Exception $e) {
            Log::error('Trip creation failed: ' . $e->getMessage());
            session()->flash('message', 'Error: Trip creation failed.');
        }
    }

    public function addExpense()
    {
        $this->expenses[] = ['date_time' => '', 'description' => '', 'quantity' => '', 'unit' => '', 'amount' => ''];
    }

    public function removeExpense($index)
    {
        unset($this->expenses[$index]);
        $this->expenses = array_values($this->expenses);
    }

    public function addMember()
    {
        $this->tripMembers[] = ['email' => ''];
    }

    public function addFish($tripId)
    {
        $this->selectedTripId = $tripId;
        $this->showFishForm = true;
        $this->reset(['fishSpecies', 'fishWeight', 'fishQuantity']);
    }

    public function saveFishCatch()
    {
        try {
            $this->validate([
                'fishSpecies' => 'required|string',
                'fishWeight' => 'required|numeric|min:0.01',
                'fishQuantity' => 'required|integer|min:1',
            ]);

            Catchfish::create([
                'tripId' => $this->selectedTripId,
                'date' => Carbon::today()->toDateString(),
                'fish' => $this->fishSpecies,
                'quantity' => $this->fishWeight,
                'weight' => $this->fishQuantity,
            ]);

            $this->reset(['fishSpecies', 'fishWeight', 'fishQuantity', 'showFishForm']);
            session()->flash('message', 'Catch successfully logged.');
        } catch (Exception $e) {
            Log::error('Fish catch save failed: ' . $e->getMessage());
            session()->flash('message', 'Error: Failed to save catch.');
        }
    }

    public function addExpenses($tripId)
    {
        $this->selectedTripId = $tripId;
        $this->expenses = [];
        $this->showExpensesForm = true;
    }

    public function saveExpenses()
    {
        try {
            foreach ($this->expenses as $expense) {
                if (!empty($expense['description'])) {
                    Expense::create([
                        'tripID' => $this->selectedTripId,
                        'date_time' => $expense['date_time'],
                        'description' => $expense['description'],
                        'quantity' => $expense['quantity'],
                        'unit' => $expense['unit'],
                        'amount' => $expense['amount'],
                    ]);
                }
            }

            $this->reset(['showExpensesForm', 'expenses']);
            $this->mount(); // Refresh trips
            session()->flash('message', 'Expenses saved successfully.');
        } catch (Exception $e) {
            Log::error('Expense save failed: ' . $e->getMessage());
            session()->flash('message', 'Error: Failed to save expenses.');
        }
    }

    public function completeTrip($tripId)
    {
        try {
            $trip = Tripcreatemodel::findOrFail($tripId);
            $trip->status = 'completed';
            $trip->save();
            $this->mount();
            session()->flash('message', 'Trip marked as completed.');
        } catch (Exception $e) {
            Log::error('Trip completion failed: ' . $e->getMessage());
            session()->flash('message', 'Error: Failed to complete trip.');
        }
    }

    public function crew($tripId)
    {
        $this->selectedTripId = $tripId;
        $this->showCrewForm = true;
        $this->tripMembers = Addmembertrip::where('tripID', $tripId)->get()->toArray();

        if (empty($this->tripMembers)) {
            $this->tripMembers = [['email' => '']];
        }
    }

    public function saveCrew()
    {
        try {
            Addmembertrip::where('tripID', $this->selectedTripId)
                // ->delete()
            ;

            foreach ($this->tripMembers as $member) {
                if (!empty($member['email'])) {
                    Addmembertrip::create([
                        'tripID' => $this->selectedTripId,
                        'memberEmail' => $member['email'],
                    ]);
                }
            }

            $this->showCrewForm = false;
            session()->flash('message', 'Crew members updated successfully.');
        } catch (Exception $e) {
            Log::error('Crew update failed: ' . $e->getMessage());
            session()->flash('message', 'Error: Failed to update crew.');
        }
    }
    public $inactiveUsers = [];

    public function render()
    {
        $inactiveUsers = collect();

        // ❶ Fishermen whose latest trip is 'completed'
        $fishermen = User::where('accountsType', 'Fisherman')->get();

        foreach ($fishermen as $fisherman) {
            $latestAddmembertrip = Addmembertrip::where('memberEmail', $fisherman->email)
                ->with('tripcreatemodel')
                ->orderByDesc('id')
                ->first();

            if ($latestAddmembertrip && $latestAddmembertrip->tripcreatemodel) {
                if ($latestAddmembertrip->tripcreatemodel->status === 'completed') {
                    $inactiveUsers->push($fisherman);
                }
            }
        }

        // ❷ Other inactive: trip members not in User table or with no trip history
        $latestMemberTrips = Addmembertrip::select('memberEmail')
            ->orderByDesc('id')
            ->with('tripcreatemodel')
            ->get()
            ->unique('memberEmail');

        $allTripEmails = $latestMemberTrips->pluck('memberEmail')->toArray();

        foreach ($latestMemberTrips as $memberTrip) {
            $trip = $memberTrip->tripcreatemodel;

            if (!$trip || $trip->status !== 'completed') {
                continue;
            }

            $user = User::where('email', $memberTrip->memberEmail)
                ->where('accountsType', 'Fisherman')
                ->first();

            if (!$user) {
                $inactiveUsers->push((object) [
                    'name' => '(Not Registered)',
                    'email' => $memberTrip->memberEmail,
                    'accountsType' => 'Not Found',
                ]);
            }
        }

        // ❸ Add Fishermen from User table with no Addmembertrip records
        $noTripFishermen = User::where('accountsType', 'Fisherman')
            ->whereNotIn('email', $allTripEmails)
            ->get();

        foreach ($noTripFishermen as $user) {
            $inactiveUsers->push($user);
        }

        // Set final result
        $this->inactiveUsers = $inactiveUsers;

        return view('livewire.admin-create-trip-live', [
            'inactiveUsers' => $this->inactiveUsers,
            'usersBoat' => User::where('accountsType', 'Boat')->get(),
            'trips' => $this->trips,
            'intrips' => $this->intrips,
        ]);
    }
}
