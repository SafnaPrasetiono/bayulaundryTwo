<?php

namespace App\Livewire\Admin\Account;

use App\Models\admins;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

class AdminAccountCreate extends Component
{
    use WithFileUploads;

    public $images;
    public $username, $email, $gender, $born, $phone, $address, $is_active;
    public $password, $password_confirmation;

    public function save()
    {
        $this->validate([
            'username' => 'required',
            'email' => 'required|min:4|email|max:255',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required',
            'born' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'is_active' => 'required',
        ]);

        // try {
        //code...
        $data = new admins();
        $data->username = $this->username;
        $data->slug = Str::slug($this->username);
        $data->email = $this->email;
        $data->password = bcrypt($this->password);
        $data->gender = $this->gender;
        $data->born = $this->born;
        $data->phone = $this->phone;
        $data->address = $this->address;
        $data->is_active = $this->is_active;

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
            $this->images->storeAs('/images/admins', $image, 's4');
            $data->avatar = $image;
        } else {
            $data->avatar = "default-" . $this->gender . ".png";
        }

        $data->save();

        $this->reset([
            'username',
            'email',
            'password',
            'gender',
            'born',
            'phone',
            'images',
            'address',
            'is_active',
        ]);
        try {
            $this->dispatch('success', 'Your data updated!');
        } catch (\Throwable $th) {
            //throw $th;
            $this->dispatch('error', 'Sorry something with update data!');
        }
    }


    #[Title('Create New Account')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        return view('admin.account.admin-account-create');
    }
}
