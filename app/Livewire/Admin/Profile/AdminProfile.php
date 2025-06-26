<?php

namespace App\Livewire\Admin\Profile;

use App\Models\admins;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProfile extends Component
{
    use WithFileUploads;
    use AdminPassword;

    public $admin_id, $username, $email, $phone, $born, $address, $avatar;
    public $edit = false;

    protected $rules = [
        'username'     => 'required',
        // 'images'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
    ];

    protected $messages = [
        'username.required' => 'Oops, username kamu tidak boleh kosong!',
        // 'images.required' => 'Category must input images!',
        // 'images.image' => 'Oops sepertinya yang diupload bukan gambar!',
        // 'images.mimes' => 'Format gambar harus jpeg, png, jpg atau svg!',
        // 'images.max' => 'Ukuran gambar maksimal 4mb!',
    ];

    public function mount()
    {
        $this->admin_id = auth('admins')->user()->admin_id;
        $this->username = auth('admins')->user()->username;
        $this->email = auth('admins')->user()->email;
        $this->phone = auth('admins')->user()->phone;
        $this->born = auth('admins')->user()->born;
        $this->address = auth('admins')->user()->address;
        $this->avatar = auth('admins')->user()->avatar;
    }

    public function edited()
    {
        $this->edit = true;
    }

    public function cancle()
    {
        $this->edit = false;
    }

    public function save()
    {
        $this->validate();
        $data = admins::find($this->admin_id);
        $data->username = $this->username;
        $data->phone = $this->phone;
        $data->born = $this->born;
        $data->address = $this->address;
        $data->avatar = $this->avatar;
        if ($data->save()) {
            $this->edit = false;
            $this->dispatch('success', 'Data berhasil diperbaharui!');
        } else {
            $this->edit = false;
            $this->dispatch('errors', 'Database Error, data Gagal terupdate!!!');
        }
    }


    #[Title('Admin Profile')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        return view('admin.profile.admin-profile');
    }
}
