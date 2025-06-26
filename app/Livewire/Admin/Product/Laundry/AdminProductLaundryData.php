<?php

namespace App\Livewire\Admin\Product\Laundry;

use Livewire\Component;
use App\Models\product;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class AdminProductLaundryData extends Component
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

    #[Title('Product laundry')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        $data = product::where('type', 1)->Search($this->search)->paginate($this->pages);
        return view('admin.product.laundry.admin-product-laundry-data',[
            'data' => $data
        ]);
    }
}
