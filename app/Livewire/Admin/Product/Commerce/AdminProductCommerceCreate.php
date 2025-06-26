<?php

namespace App\Livewire\Admin\Product\Commerce;

use App\Livewire\Admin\Product\Trait\ProductImageUpload;
use App\Models\product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminProductCommerceCreate extends Component
{
    use ProductImageUpload;

    public $title, $price, $stock, $weight, $discount, $discount_expired, $is_active, $description, $description_short;


    public function save()
    {
        $this->validate([
            'title' => 'required:max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'weight' => 'required|numeric',
            'description' => 'required',
            'description_short' => 'required',
            'is_active' => 'required',
            'images' => 'required|file|max:12288|mimes:jpg,jpeg,png,sgv',
        ], [
            'title.required' => 'nama product tidak boleh kosong!',
            'title.max' => 'nama product telalu panjang!',
            'price.required' => 'harga tidak boleh kosong!',
            'price.numeric' => 'harga bukan numeric!',
            'stock.required' => 'stock product tidak boleh kosong!',
            'stock.numeric' => 'stock product bukan numeric!',
            'weight.required' => 'weight product tidak boleh kosong!',
            'weight.numeric' => 'stock product bukan numeric!',
            'description.required' => 'description tidak boleh kosong!',
            'description_short.required' => 'description tidak boleh kosong!',
            'is_active.required' => 'status tidak boleh kosong!',
            'images.required' => 'Image tidak boleh kosong!',
            'images.file' => 'File upload harus berupa file image',
            'images.mimes' => 'File upload format tidak sah!',
            'images.max' => 'File upload melebihi kapasitas!',
        ]);
        // dd($this->all());


        try {
            // CHANGE_FILE_NAME
            $filename = pathinfo($this->images->getClientOriginalName(), PATHINFO_FILENAME);
            $image = 'IMG-' . date('YmdHis') . $filename . "." . $this->images->getClientOriginalExtension();
            $this->images->storeAs('/images/product', $image, 's4');

            // SAVE_PRODUCT
            $product = new product();
            $product->title = $this->title;
            $product->slug = Str::slug($this->title);
            $product->price = $this->price;
            $product->stock = $this->stock;
            $product->weight = $this->weight;
            $product->description = $this->description;
            $product->description_short = $this->description_short;
            $product->discount = $this->discount;
            $product->discount_price = $this->price - (($this->price * $this->discount) / 100);
            $product->discount_expired = $this->discount_expired;
            $product->is_active = $this->is_active;
            $product->images = $image;
            $product->save();
            $this->uploadImage($product->product_id);

            $this->reset([
                'title',
                'price',
                'stock',
                'weight',
                'description',
                'description_short',
                'discount',
                'discount_expired',
                'is_active',
                'images',
                'image_multiple',
            ]);

            $this->dispatch('success', 'Product Data saved!');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', 'Sorry something happen with system!');
        }
    }


    #[Title('Create New Product')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        return view('admin.product.commerce.admin-product-commerce-create');
    }
}
