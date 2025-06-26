<?php

namespace App\Livewire\Admin\Home;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

/** @method $this layout(string $view, array $params = []) */
class Dashboard extends Component
{
    
    #[Title('Wellcome to application dashboard')]
    #[Layout('layouts.adminLayouts')] 
    public function render()
    {
        return view('admin.home.dashboard');
    }
}
