<?php
namespace App\Livewire;

use App\Models\TripMemberDetiles;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
// use App\Models\TripMemberDetails;

class FishacountVerify extends Component
{
    public $nic;
    public $employerNumber;
    public $dob;
    public $country;
    public $rank;
    public $gender;
    public $phoneNumber;
    public $userEmailId;
    public $name;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->userEmailId = Auth::user()->email;
    }

    public function save()
    {
        $this->validate([
            'nic' => 'required|string',
            'name' => 'required',
            'userEmailId' => 'required|email',
            'employerNumber' => 'required|string|max:20',
            'dob' => 'required|date',
            'country' => 'required|string',
            'rank' => 'required|string',
            'gender' => 'required|in:male,female',
            'phoneNumber' => 'required|string|min:10',
        ]);

        TripMemberDetiles::create([
            'userEmailId' => $this->userEmailId,
            'name' => $this->name,
            'nic' => $this->nic,
            'employer_number' => $this->employerNumber,
            'dob' => $this->dob,
            'country' => $this->country,
            'rank' => $this->rank,
            'gender' => $this->gender,
            'phone_number' => $this->phoneNumber,
        ]);

        session()->flash('success', 'Fisherman details have been successfully submitted and verified.');
        $this->reset(['nic', 'employerNumber', 'dob', 'country', 'rank', 'gender', 'phoneNumber']);
    }

    public function render()
    {
        return view('livewire.fishacount-verify');
    }
}
