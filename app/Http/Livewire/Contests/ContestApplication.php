<?php

namespace App\Http\Livewire\Contests;

use Livewire\Component;

class ContestApplication extends Component
{
    public $applying = false;

    public $user;
    public $name;
    public $last_name;

    public function mount($user)
    {
        if ($user) {
            $this->name = $user->name;
            $this->last_name = $user->last_name;
        }

        request()->session()->put('x.url.intended', route('home'));
    }
    
    public function render()
    {
        return view('livewire.contests.contest-application');
    }
}
