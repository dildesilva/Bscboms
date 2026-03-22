<?php

namespace App\Livewire;

use App\Models\Catchfish;
use Livewire\Component;

class CatchRecordsferch extends Component
{
    public
    $tripId,
    $cathfish,$totalAmount
    ;
    public function mount($tripId)
    {
    //    $this->cathfish=Catchfish::where('tripID', '=',$this->tripId)->get();

        $this->tripId = $tripId;
       $this->cathfish=Catchfish::where('tripID', '=',$this->tripId)->get();

    }

public function deleteCatch($Id){
    $cathfish = Catchfish::find($Id);


        $cathfish->delete();

        // Flash message after deletion
        session()->flash('message', 'deleted successfully.');


    // Re-fetch expenses after deletion
    $this->cathfish = Catchfish::all();
}
public function refresh()
{
    $this->cathfish = Catchfish::all();
}

    public function render()
    {
       $this->cathfish=Catchfish::where('tripID', '=',$this->tripId)->get();
       $this->totalAmount = Catchfish::where('tripID', '=',$this->tripId)->sum('weight');

        return view('livewire.catch-recordsferch',['cathfish'=>$this->cathfish,'totalAmount'=>$this->totalAmount]);
    }
}
