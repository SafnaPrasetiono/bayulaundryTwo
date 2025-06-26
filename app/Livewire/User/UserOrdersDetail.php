<?php

namespace App\Livewire\User;

use App\Models\orders;
use App\Models\orders_items;
use App\Models\shipments;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserOrdersDetail extends Component
{
    public $inv;

    #[Title('Detail Pesanan Saya')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        $data = orders::where('invoice', $this->inv)->where('user_id', auth('users')->id())->first();
        $items = orders_items::where('order_id', $data->order_id)->get();
        $shipment = shipments::where('order_id', $data->order_id)->first();
        return view('user.user-orders-detail',[
            'order' => $data,
            'items' => $items,
            'shipment' => $shipment
        ]);
    }
}
