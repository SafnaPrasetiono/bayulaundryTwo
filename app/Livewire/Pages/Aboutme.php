<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Aboutme extends Component
{

        #[Title('About Me')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        return view('pages.aboutme');
    }
}
