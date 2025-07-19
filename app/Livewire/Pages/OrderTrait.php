<?php

namespace App\Livewire\Pages;

use App\Models\product;

trait OrderTrait {

    public function orderLaundry($product_id, $qty, $note)
    {
        //code...
        try {
            $extra = [
                'qty' => $qty,
                'notes' => $note
            ];
            $data = product::find($product_id)->toArray();
            unset($data['description_list']);
            $merged = array_merge($data, $extra);

            $cart = session()->get('cartLaundry');
            if (isset($cart[$product_id])) {
                // $cart[$product_id]['qty'] += $extra['qty'];
                // session()->put('cartLaundry', $cart);
                $this->dispatch('success', 'Product sudah masuk ke keranjang');
            } else {

                $cart[$product_id] = $merged;

                session()->put('cartLaundry', $cart);
                $this->dispatch('success', 'Product sudah masuk ke keranjang!');
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', 'Sorry something worng with order!');
        }
    }

    public function orderProduct($product_id, $qty, $note)
    {
        //code...
        try {
            $extra = [
                'qty' => $qty,
                'notes' => $note
            ];
            $data = product::find($product_id)->toArray();
            unset($data['description_list']);
            $merged = array_merge($data, $extra);

            $cart = session()->get('cart');
            if (isset($cart[$product_id])) {
                $cart[$product_id]['qty'] += $extra['qty'];
                session()->put('cart', $cart);
                $this->dispatch('success', 'Product sudah masuk ke keranjang');
            } else {

                $cart[$product_id] = $merged;

                session()->put('cart', $cart);
                $this->dispatch('success', 'Product sudah masuk ke keranjang!');
            }
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', 'Sorry something worng with order!');
        }
    }
    
}