<?php

namespace App\Livewire\Admin\Product\Laundry;

use App\Livewire\Admin\Product\Trait\ProductDescriptionList;
use App\Livewire\Admin\Product\Trait\ProductImageUpload;
use Livewire\Component;
use App\Models\product;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;

class AdminProductLaundryUpdate extends Component
{
    use ProductDescriptionList;
    use ProductImageUpload;

    public $id, $slug;
    public $title, $price, $discount, $discount_expired, $is_active, $description_short;


    public function update()
    {
        $this->validate([
            'title' => 'required:max:255',
            'price' => 'required:number',
            'is_active' => 'required',
            'description_short' => 'required',
        ], [
            'title.required' => 'nama product tidak boleh kosong!',
            'price.required' => 'harga tidak boleh kosong!',
            'price.integer' => 'harga bukan number!',
            'status.required' => 'status tidak boleh kosong!',
            'description_short.required' => 'description tidak boleh kosong!',
        ]);

        try {
            // SAVE_PRODUCT
            $product = product::find($this->id);
            $product->title = $this->title;
            $product->slug = Str::slug($this->title);
            $product->price = $this->price;
            $product->stock = 1;

            $product->discount = $this->discount;
            $product->discount_price = $this->price - (($this->price * $this->discount) / 100);
            $product->discount_expired = $this->discount_expired;

            $product->description_short = $this->description_short;
            $product->description_list = array_filter($this->description_list);
            $product->is_active = $this->is_active;

            if ($this->images) {

                $this->validate([
                    'images' => 'required|file|max:12288|mimes:jpg,jpeg,png,sgv',
                ], [
                    'images.required' => 'Images tidak boleh kosong!',
                    'images.file' => 'File upload harus berupa file images',
                    'images.mimes' => 'File upload format tidak sah!',
                    'images.max' => 'File upload melebihi kapasitas!',
                ]);

                // CHANGE_FILE_NAME
                $filename = pathinfo($this->images->getClientOriginalName(), PATHINFO_FILENAME);
                $image = 'IMG-' . date('YmdHis') . $filename . "." . $this->images->getClientOriginalExtension();
                $this->images->storeAs('/images/product', $image, 's4');
                $product->images = $image;
            }
            $product->save();

            $this->reset([
                'title',
                'price',
                'description_short',
                'discount',
                'discount_expired',
                'is_active',
                'images',
                'description_list'
            ]);

            $this->reload();

            $this->dispatch('success', 'Product Data saved!');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', 'Sorry something happen with system!');
        }
    }

    public function reload()
    {
        $data = product::find($this->id);
        $this->title = $data->title;
        $this->slug = $data->title;
        $this->price = $data->price;
        $this->description_short = $data->description_short;

        $this->discount = $data->discount;
        $this->discount_expired = $data->discount_expired;
        $this->description_list = array_values($data->description_list);

        $this->is_active = $data->is_active;
        $this->post = $data->images;
    }

    public function mount()
    {
        $this->reload();
    }

    #[Title('Update Product')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        return view('admin.product.laundry.admin-product-laundry-update');
    }
}
