<?php

namespace App\Livewire\Pages;

use App\Models\product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPages extends Component
{
    use WithPagination;
    use OrderTrait;

    public $pages = 15;
    public $search;

    public function orderL($product_id)
    {
        $this->orderLaundry($product_id, 1, '');
        $this->dispatch('ordered');
    }

    #[Title('produk laundrymu')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        $laundry = product::where('type', 1)->get();
        $commerce = product::where('type', 0)->paginate($this->pages);
        $bestSeller = product::where('type', 0)->orderBy('created_at', 'desc')->limit(6)->get();
        return view('pages.product-pages', [
            'laundry' => $laundry,
            'commerce' => $commerce,
            'bestSeller' => $bestSeller
        ]);
    }
}
