<?php

namespace App\Livewire\Auth;

use App\Mail\UserRegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Str;

class UserRegister extends Component
{
    public $username, $email, $password, $password_confirmation;
    public function save()
    {
        $this->validate([
            'username' => 'required|min:4',
            'email' => 'required|min:4|email|max:255',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ], [
            'username.required' => 'username tidak boleh kosong',
            'username.min' => 'username terlalu pendek',
            'email.required' => 'email tidak boleh kosong',
            'email.min' => 'terdeteksi bukan alamat email',
            'email.email' => 'email ini sudah terdaftar',
            'email.max' => 'email anda terlalu panjang',
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password tidak boleh kurang dari 8 karakter',
            'password.confirmed' => 'password dan confirmed password tidak sama',
            'password_confirmation.required' => 'password confirmation tidak boleh kosong',
        ]);


        $act = User::where('email', $this->email)->first();

        if ($act != null) {
            if ($act->active === 1) {
                $this->dispatch('error', 'Akun kamu sudah aktif, silahkan login');
            } else {
                $this->dispatch('error', 'Anda sudah daftar silahkan cek email untuk aktivasi!');
            }
        } else {
            try {
                $Vkey = md5(date("YmdHis") . $this->email);
                $data = User::create([
                    'username' => $this->username,
                    'slug' => Str::slug($this->username),
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'avatar' => "default.png",
                    'active' => 3,
                    'vKey' => $Vkey,
                ]);
                Mail::to($this->email)->send(new UserRegisterMail($data));

                $this->reset(['username', 'email', 'password', 'password_confirmation']);
                $this->dispatch('success', 'Aktivasi akun telah dikirim melalui email');
            } catch (\Throwable $th) {
                User::where('email', $this->email)->delete();
                $this->dispatch('error', 'Maaf, server sedang dalam perbaikan lakukan nanti!');
            }
        }
    }


    #[Title('Register Form')]
    #[Layout('layouts.authLayouts')]
    public function render()
    {
        return view('auth.user-register');
    }
}
