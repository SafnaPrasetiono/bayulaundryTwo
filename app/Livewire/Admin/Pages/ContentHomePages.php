<?php

namespace App\Livewire\Admin\Pages;

use App\Models\contentBanners;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ContentHomePages extends Component
{

    use WithFileUploads;

    public $title, $description, $linked, $linkedText, $textPosition = 'left', $textColor = 'dark';
    public $imagesDesktop, $imagesMobile;

    protected $rules = [
        'imagesDesktop'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        'imagesMobile'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
    ];

    protected $messages = [
        'imagesDesktop.required' => 'Oops, pleas input banner dektop!',
        'imagesDesktop.image' => 'Oops sepertinya yang diupload bukan gambar!',
        'imagesDesktop.mimes' => 'Format gambar harus jpeg, png, jpg atau svg!',
        'imagesDesktop.max' => 'Ukuran gambar maksimal 4mb!',

        'imagesMobile.required' => 'Oops, pleas input banner phone!',
        'imagesMobile.image' => 'Oops sepertinya yang diupload bukan gambar!',
        'imagesMobile.mimes' => 'Format gambar harus jpeg, png, jpg atau svg!',
        'imagesMobile.max' => 'Ukuran gambar maksimal 4mb!',
    ];

    public function preview()
    {
        $this->dispatchBrowserEvent('previewModals');
    }

    public function store()
    {
        $this->validate();

        $resorceLG = $this->imagesDesktop;
        $originNameLG = $resorceLG->getClientOriginalName();
        $IMGLG = "BNR-D-" . substr(md5($originNameLG . date("YmdHis")), 0, 28) . '.' . $resorceLG->getClientOriginalExtension();
        
        $resorceSM = $this->imagesMobile;
        $originNameSM = $resorceSM->getClientOriginalName();
        $IMGSM = "BNR-M-" . substr(md5($originNameSM . date("YmdHis")), 0, 28) . '.' . $resorceSM->getClientOriginalExtension();


        $data = new contentBanners();
        $data->title = $this->title;
        $data->description = $this->description;
        $data->linked = $this->linked;
        $data->linkedText = $this->linkedText;
        $data->imagesPath = '/images/pages/home/banner/';
        $data->imagesDesktop = $IMGLG;
        $data->imagesMobile = $IMGSM;
        $data->textPosition = $this->textPosition;
        $data->textColor = $this->textColor;
        if ($data->save()) {
            $resorceLG->storeAs($data->imagesPath,  $IMGLG, 's4');
            $resorceSM->storeAs($data->imagesPath,  $IMGSM, 's4');
            $this->dispatch('success', 'Data banner telah ditambahkan');
            $this->dispatch('hiddenModal', 'modalBanner');
        } else {
            $this->dispatch('error', 'Oops, Something worng with databse, try again letter!');
        }
    }

    
    #[Title('Payment Method')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        $data = contentBanners::all();
        return view('admin.pages.content-home-pages',[
            'data' => $data
        ]);
    }
}
