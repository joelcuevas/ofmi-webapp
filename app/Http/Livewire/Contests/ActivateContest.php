<?php

namespace App\Http\Livewire\Contests;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Contest;

class ActivateContest extends Component
{
    use AuthorizesRequests;

    public $confirmingActivation = false;
    public $contest;

    public function render()
    {
        return view('livewire.contests.activate-contest');
    }

    public function activate()
    {
        $this->authorize('admin');

        $this->contest->activate();

        $this->confirmingActivation = false;
        $this->emit('activated');
    }
}
