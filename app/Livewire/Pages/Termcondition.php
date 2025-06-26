<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Termcondition extends Component
{
    #[Title('Syarat dan Ketentuan')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        return view('pages.termcondition');
    }
}
