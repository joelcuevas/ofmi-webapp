<?php

namespace App\Http\Livewire\Contests;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Contest;
use Illuminate\Validation\ValidationException;

class ContestApplication extends Component
{
    public $applying = true;

    public $contest;

    public $user;

    public $schoolLevel = '';

    public $schoolGrade = '';

    public $schoolName;

    public $tshirtSize = '';

    public $tshirtStyle = '';

    public $acceptRules;

    public $userRegistered = false;

    protected function rules()
    {
        return [
            'schoolLevel' => 'required|in:primary,middle,high',
            'schoolGrade' => [
                'required',
                Rule::when(fn($input) => 
                    $input['schoolLevel'] == 'primary',
                    'in:1,2,3,4,5,6', 
                    'in:1,2,3' 
                ), 
            ],
            'schoolName' => 'required|max:255',
            'tshirtSize' => 'required|in:XS,S,M,L,XL,XXL',
            'tshirtStyle' => 'required|in:A,B',
            'acceptRules' => 'in:1',
        ];
    }

    protected $messages = [
        'acceptRules.in' => 'You must accept the rules and requirements for the contest.',
    ];

    public function mount($user)
    {
        $this->contest = Contest::where('active', 1)->first();
        $this->userRegistered = $this->contest->hasContestant($user);
        
        request()->session()->put('x.url.intended', route('home', ['apply_to_contest' => true]));
    }
    
    public function render()
    {
        return view('livewire.contests.contest-application');
    }

    public function apply()
    {
        $this->emit('error');
        $data = $this->validate();

        $this->userRegistered = $this->contest->registerContestant($this->user, $data);
    }
}
