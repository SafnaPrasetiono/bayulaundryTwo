<?php

namespace App\Livewire\Admin\Order;

use App\Models\orders;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminOrder extends Component
{
     public $search, $pages = 5, $status;
    public $selected = [], $selectedAll = false, $syarat = false;
    public $selected_id;

    protected $listeners = ["DeleteActionGo"];

    public function clickSelected()
    {
        if ($this->selectedAll == true) {
            $this->selected = orders::pluck('order_id')->toArray();
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

    public function DeleteAction($id)
    {
        $this->selected_id = $id;
        $this->dispatch('deleteModel');
    }

    public function DeleteActionGo()
    {
        try {
            orders::find($this->selected_id)->delete();
            $this->dispatch('success', 'Data telah dihapus permanent!');
        } catch (\Throwable $th) {
            $this->dispatch('error', 'Sorry something with proses!');
        }
    }

    public function DeleteActionAll()
    {
        $this->syarat = false;
        try {
            orders::whereIn('order_id', $this->selected)->delete();
            $this->dispatch('deleteModelAll');
        } catch (\Throwable $th) {
            $this->dispatch('error', 'Sorry something with proses!');
        }
    }

    public function searchPush()
    {
        $this->search;
    }

    #[Title('Orderan')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        $data = orders::orderBy('order_date', 'desc')->Search($this->search)->paginate($this->pages);
        return view('admin.order.admin-order',[
            'data' => $data
        ]);
    }
}
