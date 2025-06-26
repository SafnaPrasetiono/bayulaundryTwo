<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Privacy extends Component
{

    #[Title('Privasi Laundrymu')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        return view('pages.privacy');
    }
}
