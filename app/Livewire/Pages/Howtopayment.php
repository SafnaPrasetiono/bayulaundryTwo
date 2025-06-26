<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Howtopayment extends Component
{

    #[Title('Tatacara pembayaran')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        return view('pages.howtopayment');
    }
}
