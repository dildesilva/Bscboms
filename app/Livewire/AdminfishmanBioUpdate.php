<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TripMemberDetiles;

class AdminfishmanBioUpdate extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateFisherman($id, $field, $value)
    {
        TripMemberDetiles::find($id)->update([$field => $value]);

        
        $this->dispatch('notify', type: 'success', message: 'Fisherman updated successfully');
    }

    public function render()
    {
        $fishermen = TripMemberDetiles::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('nic', 'like', '%' . $this->search . '%')
                    ->orWhere('rank', 'like', '%' . $this->search . '%')
                    ->orWhere('employer_number', 'like', '%' . $this->search . '%');
            })
        //     ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.adminfishman-bio-update', [
            'fishermen' => $fishermen
        ]);
    }
}
