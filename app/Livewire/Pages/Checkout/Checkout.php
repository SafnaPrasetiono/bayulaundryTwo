<?php

namespace App\Livewire\Pages\Checkout;

use App\Models\orders;
use App\Models\orders_items;
use App\Models\shipments;
use App\Models\User;
use App\Models\userAddress;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Checkout extends Component
{

    public $address_id;
    #[On('setAddress')]
    public function setAddress($addressId)
    {
        $this->address_id = $addressId;
    }


    function generateInvoiceNumber(): string
    {
        $prefix = 'INV-' . date('Ymd');

        $todayCount = orders::whereDate('created_at', today())->count() + 1;

        $number = str_pad($todayCount, 5, '0', STR_PAD_LEFT);

        return "{$prefix}-{$number}";
    }

    public function checkoutLaundry()
    {
        if (!$this->address_id) {
            $this->dispatch('info', 'Maaf anda harus menambahkan detail alamat');
        } else {

            // ORDER
            $user = auth('users')->user();
            $order = orders::create([
                'invoice'        => $this->generateInvoiceNumber(),
                'username'       => $user->username,
                'email'          => $user->email,
                'amount'         => 0,
                'weight'         => 0,
                'order_date'     => now()->toDateString(),   // YYYY‑MM‑DD
                'order_time'     => now()->format('H:i:s'),  // HH:MM:SS
                'type'           => 1,
                'status'         => 'pending',
                'payment_method' => 'COD',
                'note'           => '',
                'user_id'        => $user->user_id,
            ]);

            // ORDER-ITEM
            foreach(session('cartLaundry') as $item){
                $total = ($item['price'] * $item['qty']);
                if($item['discount']){
                    $total = ($item['discount_price'] * $item['qty']);
                }
                orders_items::create([
                    'title'          => $item['title'],
                    'description'    => $item['description_short'],
                    'qty'            => $item['qty'],
                    'price'          => $item['price'],
                    'discount'       => $item['discount'],
                    'discount_price' => $item['discount_price'],
                    'weight'         => $item['weight'], 
                    'images'         => $item['images'],
                    'total'          => $total, 
                    'order_id'       => $order['order_id'],         
                    'product_id'     => $item['product_id'],  
                    'note'           => '',
                ]);
            }

            // SHIPMENT
            $shipment = userAddress::find($this->address_id);
            shipments::create([
                'order_id' => $order->order_id,
                'recipient_name' => $shipment->username,
                'recipient_phone' => $shipment->phone,
                'address_line' => $shipment->detail,
                'province' => $shipment->province,
                'regencies' => $shipment->regencies,
                'districts' => $shipment->districts,
                'villages' => $shipment->villages,
                'postal_code' => $shipment->postal_code,
                'tracking_number' => '',
                'courier' => '',
                'status' => '',
                'shipped_at' => now()->subDays(2),
                'delivered_at' => null,
                'notes' => '',
            ]);

            session()->forget('cartLaundry');

            return redirect()->route('index');
        }
    }









    public function mount()
    {
        if (!Auth::guard('users')->check()) {
            return redirect()->route('login');
        }
        if (!session()->has('cart')) {
            if(!session()->has('cartLaundry')){
                return redirect()->route('index');
            }
        }
    }

    #[Title('Checkout produk')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        return view('pages.checkout.checkout');
    }
}
