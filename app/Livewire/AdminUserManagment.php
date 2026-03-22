<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminUserManagment extends Component
{
    public $users,$admin, $boats,$fisherman;    public $activeTab = 'active';


    public function mount()

    {  $this->users = User::all();
        $this->admin = User::where('accountsType', 'admin')->get();
        $this->boats = User::where('accountsType', 'boat')->get();
        $this->fisherman = User::where('accountsType', 'fisherman')->get();

    }
    public function updateUser($id, $field, $value)
    {
        $userUpdate = User::find($id);
        if ($userUpdate) {
            $userUpdate->$field = $value;
            $userUpdate->save();
            session()->flash('success', 'User updated successfully!');
        }
    }
    public function deleteUser($id)
    {

        User::findOrFail($id)->delete();
        $this->refresh();
        session()->flash('success', 'User deleted successfully!');
    }
    public function refresh()
    {      $this->admin = User::where('accountsType', 'admin')->get();
           $this->boats = User::where('accountsType', 'boat')->get();
           $this->fisherman = User::where('accountsType', 'fisherman')->get();
         $this->users = User::all();

    }
    public function render()
    {
        return view('livewire.admin-user-managment');
    }
}
