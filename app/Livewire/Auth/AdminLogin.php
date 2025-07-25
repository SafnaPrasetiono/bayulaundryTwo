<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminLogin extends Component
{
     public $email, $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|min:4|email|max:255',
            'password' => 'required|min:8',
        ],[
            'email.required' => 'Alamat email tidak boleh kosong!',
            'email.min' => 'Alamat email tidak dikenal!',
            'email.email' => 'Alamat email tidak dikenal!',
            'email.max' => 'Alamat email tidak dikenal!',
            'password.required' => 'Password tidak boleh kosong!',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter!',
        ]);

        if (Auth::guard('admins')->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->intended()->route('admin.dashboard');
        } else {
            $this->dispatch('errors', 'Your email and password failed!');
        }
    }
    
    #[Title('Admin Login Form')]
    #[Layout('layouts.authLayouts')]
    public function render()
    {
        return view('auth.admin-login');
    }
}
