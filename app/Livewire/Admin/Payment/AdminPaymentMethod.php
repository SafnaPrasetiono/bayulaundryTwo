<?php

namespace App\Livewire\Admin\Payment;

use App\Models\paymentMethod;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class AdminPaymentMethod extends Component
{
    use create;
    use WithPagination;

    public $search, $pages = 5, $status;
    public $selected = [], $selectedAll = false, $syarat = false;
    public $selected_id;

    public function clickSelected()
    {
        if ($this->selectedAll == true) {
            $this->selected = paymentMethod::pluck('payment_method_id')->toArray();
        } else {
            $this->selected = [];
        }
    }
    public function clickSelectedOne()
    {
        if ($this->selectedAll == true) {
            $this->selectedAll = false;
        }
    }

    #[On('DeleteAction')]
    public function DeleteAction($id)
    {
        $this->selected_id = $id;
        $this->dispatch('deleteModel');
    }

    #[On('DeleteActionGo')]
    public function DeleteActionGo()
    {
        try {
            paymentMethod::find($this->selected_id)->delete();
            $this->dispatch('success', 'Your data has been deleted.');
        } catch (\Throwable $th) {
            $this->dispatch('error', 'Your data failed to deleted.');
        }
    }

    public function DeleteActionAll()
    {
        $this->syarat = false;
        try {
            paymentMethod::whereIn('payment_method_id', $this->selected)->delete();
            $this->dispatch('success', 'All your data has been deleted.');
        } catch (\Throwable $th) {
            $this->dispatch('error', 'Your data failed to deleted.');
        }
    }

    #[Title('Payment Method')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        $data = paymentMethod::paginate(12);
        return view('admin.payment.admin-payment-method', [
            'data' => $data
        ]);
    }
}
