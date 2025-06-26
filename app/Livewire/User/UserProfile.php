<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $postId;
    public $photos;

    public $username, $email, $phone, $born, $gender, $avatar;

    public function save()
    {
        $this->validate([
            'username' => 'required|max:255',
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'username.max' => 'Username anda terlalu panjang',
        ]);
        try {
            $data = User::find($this->postId);
            $data->username = $this->username;
            $data->phone = $this->phone;
            $data->born = $this->born;
            $data->gender = $this->gender;
            $data->save();
            $this->dispatch('success', 'Data telah dirubah!');
        } catch (\Throwable $th) {
            $this->dispatch('errors', 'Maaf terjadi kesalah pada applikasi!');
        }
    }

    public function uploadFoto()
    {
        $this->validate([
            'photos' => 'file|max:12288|mimes:jpg,jpeg,png,sgv',
        ], [
            'photos.file' => 'File upload harus berupa file image',
            'photos.mimes' => 'File upload format tidak sah!',
            'photos.max' => 'File upload melebihi kapasitas!',
        ]);

        try {
            $data = User::find($this->postId);
            $filename = pathinfo($this->photos->getClientOriginalName(), PATHINFO_FILENAME);
            $photos = 'IMG-' . date('YmdHis') . $filename . "." . $this->photos->getClientOriginalExtension();
            $this->photos->storeAs('/images/avatar', $photos, 's4');
            $data->avatar = $photos;
            $data->save();
            $this->dispatch('success', 'Foto telah berhasil dirubah!');
        } catch (\Throwable $th) {
            $this->dispatch('errors', 'Maaf terjadi kesalah pada applikasi!');
            
        }
    }

    public function mount()
    {
        $this->postId = auth('users')->user()->user_id;
        $data = User::find($this->postId);
        $this->username = $data->username;
        $this->email = $data->email;
        $this->born = $data->born;
        $this->gender = $data->gender;
        $this->phone = $data->phone;
        $this->avatar = $data->avatar;
    }
    
    #[Title('My Profile')]
    #[Layout('layouts.pagesLayouts')]
    public function render()
    {
        return view('user.user-profile');
    }
}
