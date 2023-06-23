<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Page;

class CreatePage extends Component
{
    use AuthorizesRequests;

    public $creating = false;

    public $slug;

    public $title;

    public $label;

    public $order = 0;

    protected $rules = [
        'slug' => 'required|max:25|unique:pages|alpha_dash:ascii',
        'title' => 'required|max:150',
        'label' => 'required|max:25',
        'order' => 'required|numeric|min:0|max:9',
    ];

    public function render()
    {
        return view('livewire.pages.create-page');
    }

    public function create()
    {
        $this->authorize('admin');

        $data = $this->validate();
        $data['content'] = '';
 
        Page::create($data);

        return redirect()->route('pages.index');
    }
}
