<?php
namespace App\Livewire;

use App\Models\User;
use App\Models\Addmembertrip;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminfishmanInactive extends Component
{
    public $inactiveUsers;

    public function render()
    {
        // 1. fishermaṇ la ganna
        $fishermen = User::where('accountsType', 'fisherman')->get();

        $inactiveUsers = collect();

        foreach ($fishermen as $fisherman) {
            // 2. eyaṭa latest Addmembertrip record eka ganna
            $latestAddmembertrip = Addmembertrip::where('memberEmail', $fisherman->email)
                ->orderByDesc('id')
                ->with('tripcreatemodel')
                ->first();

            if ($latestAddmembertrip && $latestAddmembertrip->tripcreatemodel) {
                // 3. Trip status eka check karanna
                if ($latestAddmembertrip->tripcreatemodel->status === 'completed') {
                    $inactiveUsers->push($fisherman);
                }
            }
        }

        $this->inactiveUsers = $inactiveUsers;

        return view('livewire.adminfishman-inactive', ['inactiveUsers' => $this->inactiveUsers]);
    }
}
