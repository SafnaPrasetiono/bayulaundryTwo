<?php

namespace App\Livewire\Pages;

use App\Models\contentBanners;
use App\Models\product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class IndexPages extends Component
{
    use OrderTrait;

    public function order($product_id)
    {
        $this->orderLaundry($product_id, 1 , null);
    }

    #[Title('Wellcome to application Laundrymu')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        $banner = contentBanners::all();
        $product = product::where('type', 1)->get();
        $commerce = product::where('type', 0)->orderBy('created_at', 'DESC')->limit(8)->get();
        return view('pages.index-pages', [
            'product' => $product,
            'banner' => $banner,
            'commerce' => $commerce
        ]);
    }
}
