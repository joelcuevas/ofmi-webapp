<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChangeUserRole extends Component
{
    public $user;

    public $role;

    public $updating = false;

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
    }
}
