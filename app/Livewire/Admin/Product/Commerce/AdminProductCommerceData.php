<?php

namespace App\Livewire\Admin\Product\Commerce;

use App\Models\product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductCommerceData extends Component
{
    use WithPagination;

    public $search, $pages = 5, $status;
    public $selected = [], $selectedAll = false, $syarat = false;
    public $selected_id;

    protected $listeners = ["DeleteActionGo"];

    public function clickSelected()
    {
        if ($this->selectedAll == true) {
            $this->selected = product::pluck('product_id')->toArray();
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
            product::find($this->selected_id)->delete();
            $this->dispatch('success', 'Data telah dihapus permanent!');
        } catch (\Throwable $th) {
            $this->dispatch('error', 'Sorry something with proses!');
        }
    }

    public function DeleteActionAll()
    {
        $this->syarat = false;
        try {
            product::whereIn('product_id', $this->selected)->delete();
            $this->dispatch('deleteModelAll');
        } catch (\Throwable $th) {
            $this->dispatch('error', 'Sorry something with proses!');
        }
    }

    public function searchPush()
    {
        $this->search;
    }

    #[Title('Product Commerce')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        $data = product::where('type', 0)->Search($this->search)->paginate($this->pages);
        return view('admin.product.commerce.admin-product-commerce-data',[
            'data' => $data
        ]);
    }
}
