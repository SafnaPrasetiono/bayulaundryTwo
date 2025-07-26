<?php

namespace App\Livewire\Auth;

use App\Mail\UserGetPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserLogin extends Component
{

    public $email, $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|min:4|email|max:255',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'Alamat email tidak boleh kosong!',
            'email.min' => 'Alamat email tidak dikenal!',
            'email.email' => 'Alamat email tidak dikenal!',
            'email.max' => 'Alamat email tidak dikenal!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter!',
        ]);

        $data = User::where('email', $this->email)->first();
        if ($data) {
            if (Hash::check($this->password, $data->password)) {
                if ($data->is_active == "1") {
                    Auth::guard('users')->loginUsingId($data->user_id);
                    if (session('cart')) {
                        return redirect()->route('checkout');
                    } else {
                        return redirect()->route('index');
                    }
                } else {
                    $this->dispatch('error', 'Akun anda belum diaktivasi!');
                }
            } else {
                $this->dispatch('error', 'Password anda salah!');
            }
        } else {
            $this->dispatch('error', 'Email dan Password anda salah!');
        }
    }


    public function loginWithGoogle()
    {
        $url = Socialite::driver('google')->redirect()->getTargetUrl();

        $this->dispatch('open-google-login', url: $url);
    }

    public function getPassword()
    {
        $this->validate([
            'email' => 'required|min:4|email|max:255',
        ], [
            'email.required' => 'Alamat email tidak boleh kosong!',
            'email.min' => 'Alamat email tidak dikenal!',
            'email.email' => 'Alamat email tidak dikenal!',
            'email.max' => 'Alamat email tidak dikenal!',
        ]);

        if ($this->email) {
            $data = User::where('email', $this->email)->first();
            if($data){
                Mail::to($this->email)->send(new UserGetPasswordMail($data));
                $this->reset(['email', 'password']);
                $this->dispatch('success', 'Verifikasi telah dikirim melalui email');
            }else{
                $this->dispatch('info', 'Oops, Alamat email tidak terdaftar!');
            }
        } else {
            $this->dispatch('error', 'Masukan alamat email!');
        }
    }

    #[Title('Login Form')]
    #[Layout('layouts.authLayouts')]
    public function render()
    {
        return view('auth.user-login');
    }
}
