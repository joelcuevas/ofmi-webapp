<?php

namespace App\Http\Livewire\Contests;

use Livewire\Component;
use App\Models\Contest;
use Illuminate\Validation\Rule;

class UpdateContestInformation extends Component
{
    public $contest;
    public $year;
    public $title;
    public $description;

    protected function rules()
    {
        return [
            'year' => [
                'required',
                'max:8',
                'regex:/[0-9-]/',
                Rule::unique('contests')->ignore($this->contest->id),
            ],
            'title' => 'required|max:150',
            'description' => 'required',
        ];
    }

    public function mount($contest)
    {
        $this->year = $contest->year;
        $this->title = $contest->title;
        $this->description = $contest->description;
    }

    public function render()
    {
        return view('livewire.contests.update-contest-information');
    }

    public function update()
    {
        $data = $this->validate();

        $this->contest->update($data);

        $this->emit('saved');
    }
}
