<?php

namespace App\Livewire\Pages\Checkout;

use App\Models\UserAddress;
use Livewire\Component;

class Address extends Component
{

    public $selected, $select;

    public function mount()
    {
        $this->selected = UserAddress::where('is_primary', true)->first();
        $this->select = $this->selected->user_address_id;
        $this->dispatch('setAddress', addressId:  $this->selected->user_address_id);
    }
    
    public function selectedAddress()
    {
        $this->selected = UserAddress::find($this->select);
        $this->dispatch('setAddress', addressId:  $this->selected->user_address_id);
        $this->dispatch('hiddenModal');
    }


    public function render()
    {
        $user = auth('users')->user()->user_id;
        $data = UserAddress::where('user_id', $user)->get();
        return view('pages.checkout.address',[
            'data' => $data
        ]);
    }
}
