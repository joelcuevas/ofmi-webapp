<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Models\Page;

class EditPage extends Component
{
    public $page;

    public $year;
    
    public $title;
    
    public $description;

    public $label;

    public $order = 0;

    protected function rules()
    {
        return [
            'slug' => [
                'required',
                'max:25',
                'alpha_dash:ascii',
                Rule::unique('pages')->ignore($this->page->id),
            ],
            'title' => 'required|max:150',
            'content' => 'required',
            'label' => 'required|max:25',
            'order' => 'required|numeric|min:0|max:9',
        ];
    }

    public function mount($page)
    {
        $this->slug = $page->slug;
        $this->title = $page->title;
        $this->content = $page->content;
        $this->label = $page->label;
        $this->order = $page->order;
    }

    public function render()
    {
        return view('livewire.pages.edit-page');
    }

    public function update()
    {
        $data = $this->validate();

        $this->page->update($data);

        $this->emit('saved');
    }
}
