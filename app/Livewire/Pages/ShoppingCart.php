<?php

namespace App\Livewire\Pages;

use App\Models\product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $items, $total, $discount_price, $discount;
    public $checkCart = [], $checkCartLaundry = [];

    public function updatedcheckCartLaundry($value, $key)
    {
        $this->cartLaundryUpdate();
    }
    
    public function cartLaundryUpdate()
    {
        $this->reset(['discount_price', 'discount', 'total', 'items']);
    
        $cart = session()->get('cartLaundry');
        foreach ($this->checkCartLaundry as $key => $value) {
            $this->items += 1;
            $this->discount_price += $cart[$value]['discount_price'];
            $this->discount += $cart[$value]['discount'];
            $this->total +=  $cart[$value]['price'] * $cart[$value]['qty'];
        }
    }

    public function plus($product_id)
    {
        $cart = session()->get('cart');
        $cart[$product_id]['qty'] += 1;
        session()->put('cart', $cart);
    }
    public function minus($product_id)
    {
        $cart = session()->get('cart');
        $cart[$product_id]['qty'] -= 1;
        if ($cart[$product_id]['qty'] === 0) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
            $this->dispatch('info', 'Keranjang belanja anda kosong!');
        } else {
            session()->put('cart', $cart);
        }
    }

    public function plusLaundry($product_id)
    {
        $cart = session()->get('cartLaundry');
        $cart[$product_id]['qty'] += 1;
        session()->put('cartLaundry', $cart);
        $this->cartLaundryUpdate();
    }
    public function minusLaundry($product_id)
    {
        $cart = session()->get('cartLaundry');
        $cart[$product_id]['qty'] -= 1;
        if ($cart[$product_id]['qty'] === 0) {
            unset($cart[$product_id]);
            session()->put('cartLaundry', $cart);
            $this->dispatch('info', 'Keranjang belanja anda kosong!');
        } else {
            session()->put('cartLaundry', $cart);
        }
        $this->cartLaundryUpdate();
    }

    public function removeCart($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        if (count(session('cart')) === 0) {
            $this->dispatch('info', 'Keranjang belanja anda kosong!');
        }
    }

     public function removeCartLaundry($id)
    {
        $cart = session()->get('cartLaundry');
        unset($cart[$id]);
        session()->put('cartLaundry', $cart);
        
        if (count(session('cartLaundry')) === 0) {
            $this->dispatch('info', 'Keranjang belanja anda kosong!');
        } else {
            $this->dispatch('info', 'Produk anda sudah terhapus!');
        }
    }


    #[Title('SKeranjang belanja')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        return view('pages.shopping-cart');
    }
}
