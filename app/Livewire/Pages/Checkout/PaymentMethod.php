<?php

namespace App\Livewire\Pages\Checkout;

use App\Models\paymentMethod as ModelsPaymentMethod;
use Livewire\Component;

class PaymentMethod extends Component
{
    public function render()
    {
        $data = ModelsPaymentMethod::all();
        $grouped = $data->groupBy('type')->values();
        return view('pages.checkout.payment-method',[
            'data' => $data,
            'grouped' => $grouped
        ]);
    }
}
