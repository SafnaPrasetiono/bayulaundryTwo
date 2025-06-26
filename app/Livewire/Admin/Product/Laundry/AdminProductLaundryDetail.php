<?php

namespace App\Livewire\Admin\Product\Laundry;

use App\Models\product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminProductLaundryDetail extends Component
{
    public $id, $slug;

    #[Title('Detail Product')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        $data = product::find($this->id);
        return view('admin.product.laundry.admin-product-laundry-detail', [
            'data' => $data
        ]);
    }
}
