<?php

namespace App\Livewire\Admin\Order;

use App\Models\orders;
use App\Models\orders_items;
use App\Models\payments;
use App\Models\shipments;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminOrderDetail extends Component
{
    public $id, $inv;

    public $weight, $total, $amount;

    public function save()
    {
        try {
            $items = orders_items::where('order_id', $this->id)->first();
            $items->qty = $this->weight;
            $items->weight = $this->weight;
            $items->total = $this->amount; 
            $items->save();

            $data = orders::find($this->id);
            $data->amount = $this->amount;
            $data->weight = $this->weight;
            $data->status = 'waiting';
            $data->save();

            $this->dispatch('success', 'Product berhasil diupdate!');
            $this->dispatch('hiddenModal', 'ModalUpdated');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', 'Sorry something happend with system!');
        }
    }


    public $buyer = 0;
    public function payment()
    {
        $orders = orders::find($this->id);
        $user = User::find($orders->user_id);

        $data = new payments();
        $data->invoice = $orders->invoice;
        $data->username = $orders->username;
        $data->email = $user->email;
        $data->amount = $this->buyer;
        $data->date = date('Y-m-d');
        $data->time = date('H:i:s');
        $data->user_id = $user->user_id;
        $data->order_id = $orders->order_id;
        $data->save();

        if($orders->status == 'waiting'){
            $orders->status = 'process';
        } else {
            $orders->status = 'completed';
        }
        $orders->save();
        try {
            $this->dispatch('success', 'Product berhasil diupdate!');
            $this->dispatch('hiddenModal', 'ModalPayment');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', 'Sorry something happend with system!');
        }
    }


    public function complete()
    {
        try {
            $orders = orders::find($this->id);
            $orders->status = 'pickup';
            $orders->save();
            
            $this->dispatch('success', 'Product berhasil diupdate!');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', 'Sorry something happend with system!');
        }
    }

    #[Title('Detail orderan')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        $data = orders::find($this->id);
        $items = orders_items::where('order_id', $data->order_id)->get();
        $shipment = shipments::where('order_id', $data->order_id)->first();
        $payment = payments::where('order_id', $data->order_id)->get();
        return view('admin.order.admin-order-detail', [
            'order' => $data,
            'items' => $items,
            'shipment' => $shipment,
            'payment' => $payment
        ]);
    }
}
