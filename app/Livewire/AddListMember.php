<?php

namespace App\Livewire;

use App\Models\Addmembertrip;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddListMember extends Component
{
    public $member = [];
    public $tripId;
 public $email;
    public function mount($tripId)
    {
        $this->tripId = $tripId;
            $this->email = Auth::user()->email;

    }

    public function remove($dataId)
    {
        $user = Addmembertrip::find($dataId);

        if ($user) {
            $user->delete();
            session()->flash('message', 'User removed successfully.');
        }

        $this->refresh();
    }

    public function refresh()
    {
        $this->member = Addmembertrip::with('user')
            ->where('tripID', $this->tripId)
            ->get();
    }

    public function render()
    {
        $this->refresh();
        return view('livewire.add-list-member');
    }
}
