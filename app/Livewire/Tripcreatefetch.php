<?php
namespace App\Livewire;

use App\Models\Tripcreatemodel;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Tripcreatefetch extends Component
{
    public $tripComlted;
    public $create,$trip,$email;

    public function mount()
    {
        // $this->trip = Tripcreatemodel::all();  // Load trips initially




            $this->email = Auth::user()->email;

            // $this->trip = Tripcreatemodel::where('boaTemail', $this->email)->get();

            // // Determine if all trips are completed
            // $this->create = $this->trip->every(function ($t) {
            //     return $t->status === 'completed';
            // });




    }

    public function updateTripStatus($tripId, $status)
    {

        $trip = Tripcreatemodel::find($tripId);
        if ($trip->status === 'completed') {
            session()->flash('error', 'This trip is already marked as completed and cannot be edited.');
            return;
        }
        if ($trip) {
            $trip->status = $status;
            $trip->save();
            // Automatically refresh the trip list after the status update
            // $this->trip = Tripcreatemodel::all();
        }
    }

    public function updateEmergency($tripId, $emergency)
    {
        $trip = Tripcreatemodel::find($tripId);
        if ($trip) {
            $trip->emergency = $emergency;
            $trip->save();
            // Automatically refresh the trip list after the emergency update
            $this->trip = Tripcreatemodel::all();
        }
    }

    public function deleteTrip($tripId)
    {
        $trip = Tripcreatemodel::find($tripId);
        if ($trip) {
            $trip->delete();
            // Refresh the trip list after deletion
            $this->trip = Tripcreatemodel::all();
        }
    }

    public function render()
    {

        $this->trip = Tripcreatemodel::where('boaTemail', $this->email)->get();
        $this->create = $this->trip->every(function ($t) {
            return $t->status === 'completed';
        });

        $user = Auth::user();

        if ($user->accountsType == "Boat") {

            $this->trip = Tripcreatemodel::where('boaTemail', $this->email)->where('status', '!=', 'completed')->get(); // Boat users see only active trips
            $this->tripComlted = Tripcreatemodel::where('boaTemail', $this->email)->where('status', '=', 'completed')->get(); // Boat users see only active trips
        } else {
            $this->trip = Tripcreatemodel::where('boaTemail', $this->email)->all();
        }


        return view('livewire.tripcreatefetch', ['trip' => $this->trip,'tripComlted'=>$this->tripComlted]);
    }
}

