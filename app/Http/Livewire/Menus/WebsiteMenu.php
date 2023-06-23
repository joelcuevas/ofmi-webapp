<?php

namespace App\Http\Livewire\Menus;

use Livewire\Component;
use App\Models\Page;

class WebsiteMenu extends Component
{
    public function render()
    {
        $pages = Page::getForMenu();

        return view('livewire.menus.website-menu', ['pages' => $pages]);
    }
}
