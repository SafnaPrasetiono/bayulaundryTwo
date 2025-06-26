<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShoppingCart extends Component
{
    public $items, $total, $discount_price, $discount;
    public $checkCart, $checkCartLaundry;

    public function checkedLaundry()
    {
        if($this->checkCartLaundry == true){
            foreach (session('cartLaundry') as $itm) {
                $this->items += 1;
                $this->discount_price = $itm['discount_price'];
                $this->discount = $itm['discount'];
                $this->total =  $itm['price'] * $itm['qty'];
            }
        } else {
            $this->reset(['discount_price', 'discount', 'total', 'items']);
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


    #[Title('SKeranjang belanja')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        return view('pages.shopping-cart');
    }
}
