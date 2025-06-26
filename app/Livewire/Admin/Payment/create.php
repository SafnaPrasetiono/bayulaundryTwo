<?php

namespace App\Livewire\Admin\Payment;

use App\Models\payment_methods;
use App\Models\paymentMethod;
use Livewire\WithFileUploads;

trait create 
{
     use WithFileUploads;

    public $name, $code, $type, $logo, $is_active = true;

    protected $rules = [
        'name'      => 'required|string|max:100',
        'code'      => 'required|string|max:20|unique:payment_methods,code',
        'type'      => 'required|in:bank,ewallet,qris,va,other',
        'logo'      => 'nullable|image|max:2048',
        'is_active' => 'boolean',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function save()
    {
        $validated = $this->validate();

        if ($this->logo) {
            $validated['logo'] = $this->logo->store('/images/payment/method', 's4');
        }

        paymentMethod::create($validated);

        $this->reset(['name', 'code', 'type', 'logo', 'is_active']);

        // Dispatch event to close modal and refresh list
        $this->dispatch('payment-method-saved');
        $this->dispatch('success', 'Metode pembayaran berhasil ditambahkan!');
    }
}