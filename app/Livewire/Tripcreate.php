<?php

namespace App\Livewire;

use App\Models\Tripcreatemodel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Tripcreate extends Component
{
    public $departureLocation, $departureTime,$boat,$status,$emergency,$boaTemail;
    public $currentTime,$plannedArrivalTime;

    public function mount()
{
    $this->boat = Auth::user()->name;
    $this->boaTemail = Auth::user()->email;
    $this->status = 'Scheduled';
    $this->emergency = 'Safe';
    // $currentTime = now()->format('Y-m-d H:i:s');
}
    public function save()
    {
        $this->validate([
            'departureLocation' => 'required|string|max:255',
            'departureTime' => 'required|date',
            'plannedArrivalTime' => 'required|date',
            'boat'=>'string',
            // 'email'=>'string',
            'boaTemail' => 'required',
            'status'=>'nullable|string',
            'emergency'=>'nullable|string'
        ]);
        Tripcreatemodel::create([
            'departureLocation' => $this->departureLocation,
            'departureTime' => $this->departureTime,
            'plannedArrivalTime' => $this->plannedArrivalTime,
            'boat' => $this->boat,
            'boaTemail' => $this->boaTemail,
            'status' => $this->status,
            'emergency' => $this->emergency,
            'updated_at' => $this->emergency,
        ]);
        return redirect()->back()->with([
            'title' => 'Success!',
            'message' => 'Create New Trip successfully!',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.tripcreate');
    }
}





// <?php

// namespace App\Livewire;

// use App\Models\Tripcreatemodel;
// use Illuminate\Support\Facades\Auth;
// use Livewire\Component;

// class Tripcreate extends Component
// {
//     public $departureLocation, $departureTime,$boat,$status,$emergency,$boaTemail;
//     public $currentTime,$plannedArrivalTime;
//     // Save function with validation
//     public function mount()
// {
//     $this->boat = Auth::user()->name;
//     $this->boaTemail = Auth::user()->email;
//     // $currentTime = now()->format('Y-m-d H:i:s');

// }
//     public function save()
//     {
//         $this->validate([
//             'departureLocation' => 'required|string|max:255',
//             'departureTime' => 'required|date',
//             'plannedArrivalTime' => 'required|date',
//             'boat'=>'string',
//             // 'email'=>'string',
//             'boaTemail' => 'required|email',
//             'status'=>'nullable|string',
//             'emergency'=>'nullable|string'
//         ]);


//         Tripcreatemodel::create([
//             'departureLocation' => $this->departureLocation,
//             'departureTime' => $this->departureTime,
//             'plannedArrivalTime' => $this->plannedArrivalTime,
//             'boat' => $this->boat,
//             'boaTemail' => $this->boaTemail,
//             'status' => $this->status,
//             'emergency' => $this->emergency,
//             'updated_at' => $this->emergency,
//         ]);
//         return redirect()->back()->with([
//             'title' => 'Success!',
//             'message' => 'Create New Trip successfully!',
//             'type' => 'success'
//         ]);

//     }

//     public function render()
//     {
//         return view('livewire.tripcreate');
//     }
// }
