<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChangeUserRole extends Component
{
    use AuthorizesRequests; 

    public $user;

    public $role;

    public $updating = false;

    public $rules = [
        'role' => 'required|in:Competidor,Administrador,Superadmin',
    ];

    public function mount($user)
    {
        $this->role = $user->role;
    }

    public function render()
    {
        return view('livewire.users.change-user-role');
    }

    public function update()
    {
        $this->authorize('superadmin');

        $data = $this->validate();

        $this->user->role = $data['role'];
        $this->user->save();

        $this->updating = false;

        $this->emit('refreshUsersIndex');
    }
}
