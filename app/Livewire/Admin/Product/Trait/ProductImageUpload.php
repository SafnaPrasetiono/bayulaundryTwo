<?php

namespace App\Livewire\Admin\Product\Trait;

use App\Models\productImages;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

trait ProductImageUpload
{
    use WithFileUploads;

    public $post, $postMultiple = [];
    public $images, $image_multiple = [], $pushImage = [];
    // public $dragging = false;

    public function delImg($id)
    {
        if ($this->id) {
            $imaged = productImages::find($id);
            $filePath = public_path("$imaged->path/$imaged->filename");
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $imaged->delete();
        } else {
            unset($this->image_multiple[$id]);
        }
    }

    public function updatedPushImage()
    {
        if ($this->id) {
            foreach ($this->pushImage as $img) {
                array_push($this->image_multiple, $img);
            }
            $this->uploadImage($this->id);
        } else {
            foreach ($this->pushImage as $img) {
                array_push($this->image_multiple, $img);
            }
        }
    }


    public function uploadImage($product_id)
    {
        if ($this->image_multiple) {

            foreach ($this->image_multiple as $index => $itemImg) {
                // CHANGE_FILE_NAME
                $filename = pathinfo($itemImg->getClientOriginalName(), PATHINFO_FILENAME);
                $image_extension = $itemImg->getClientOriginalExtension();
                $image_name = 'IMG-' . date('YmdHis') . $filename . "." . $image_extension;
                $image_size = $itemImg->getSize();
                $itemImg->storeAs('/images/product', $image_name, 's4');

                productImages::create([
                    'filename' => $image_name,
                    'path' => '/images/product',
                    'extension' => $image_extension,
                    'size' => $image_size,
                    'is_main' =>  $index == 0 ? true : false,
                    'product_id' => $product_id,
                ]);
            }
        }
    }


    //  protected $listeners = ['handleDrop'];
    // public $files = [];
    #[On('handleDrop')]
    public function handleDrop($image)
    {
        dd($image);
        foreach ($image as $file) {
            $this->image_multiple[] += $file;
        }
    }

    #[On('checkData')]
    public function checkData()
    {
        dd($this->image_multiple);
    }
}
