<?php

namespace App\Http\Livewire\Contests;

use Livewire\Component;
use App\Models\Contest;

class CreateContest extends Component
{
    public $creating = false;

    public $year;
    public $title;

    protected function rules()
    {
        return [
            'year' => 'required|max:8|unique:contests|regex:/[0-9-]/',
            'title' => 'required|max:150',
        ];
    }

    public function render()
    {
        return view('livewire.contests.create-contest');
    }

    public function create()
    {
        $data = $this->validate();
        $data['description'] = 'Lorem ipsum!';

        $contest = Contest::create($data);

        return redirect()->route('contests.show', $contest);
    }
}
