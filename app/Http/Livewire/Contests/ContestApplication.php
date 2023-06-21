<?php

namespace App\Http\Livewire\Contests;

use Livewire\Component;

class ContestApplication extends Component
{
    public $applying = true;

    public $user;

    public $schoolLevel = '';

    public function mount($user)
    {
        request()->session()->put('x.url.intended', route('home', ['apply_to_contest' => true]));
    }
    
    public function render()
    {
        return view('livewire.contests.contest-application');
    }
}
