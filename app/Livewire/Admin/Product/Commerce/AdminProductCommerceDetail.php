<?php

namespace App\Livewire\Admin\Product\Commerce;

use App\Livewire\Admin\Product\Trait\ProductImageUpload;
use App\Models\product;
use App\Models\productImages;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminProductCommerceDetail extends Component
{
    use ProductImageUpload;

    public $id, $slug;

    #[Title('Create New Product')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        $data = product::find($this->id);
        $this->postMultiple = productImages::where('product_id', $this->id)->get();
        return view('admin.product.commerce.admin-product-commerce-detail',[
            'data' => $data
        ]);
    }
}
