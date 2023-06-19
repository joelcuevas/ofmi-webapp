<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use Illuminate\Http\Request;

class UsersIndex extends Component
{
    use AuthorizesRequests;

    public $q;

    protected $listeners = ['refreshUsersIndex' => '$refresh'];

    public function render()
    {
        $this->authorize('admin');

        $users = User::query()
            ->orderBy('name')
            ->orderBy('last_name');

        if ($this->q) {
            $q = '%'.$this->q.'%';

            $users->where('name', 'like', $q)
                ->orWhere('last_name', 'like', $q)
                ->orWhere('email', 'like', $q);
        }

        return view('livewire.users.users-index', [
            'users' => $users->paginate(50),
        ]);
    }
}
