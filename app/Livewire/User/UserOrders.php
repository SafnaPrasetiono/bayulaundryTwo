<?php

namespace App\Livewire\User;

use App\Models\orders;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserOrders extends Component
{

    // RENDER
    #[Title('Pesanan Saya')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        $data = orders::with('items')->where('user_id', auth('users')->id())->latest()->get();
        return view('user.user-orders',[
            'orders' => $data
        ]);
    }
}
