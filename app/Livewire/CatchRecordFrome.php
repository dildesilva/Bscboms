<?php

namespace App\Livewire;

use App\Models\Catchfish;
use Carbon\Carbon;
use Livewire\Component;

class CatchRecordFrome extends Component
{
    public $tripId;
    public $date;
    public $fish,$weight,$quantity;
    public function mount( $tripId){
        $this->tripId = $tripId;
        $this->date= now()->format('Y-m-d\TH:i');
    }
    protected $rules=[

'fish'=>'required|string',
'quantity'=>'required|numeric|min:0',
'weight'=>'required|numeric|min:0',
    ];
    public function saveCatch(){
        $this->validate();
        Catchfish::create([
            'date'=>Carbon::parse($this->date),
            'tripId'=>$this->tripId,
            'fish'=>$this->fish,
            'quantity'=>$this->quantity,
            'weight'=>$this->weight,
        ]);
    session()->flash('message','done');
    $this->reset([ 'fish', 'quantity', 'weight']);


    }
    public function render()
    {
        return view('livewire.catch-record-frome');
    }
}
