<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserGetPassword extends Component
{
    public $email, $vkey;
    public $password, $password_confirmation;
    public $alert = 0;


    public function mount()
    {
        $data = User::where('vKey', $this->vkey)->first();
        if (!$data) {
            return redirect()->route('index');
        }
    }

    public function changeds()
    {
        $this->validate([
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ], [
            'password.required' => 'password tidak boleh kosong',
            'password.min' => 'password tidak boleh kurang dari 8 karakter',
            'password.confirmed' => 'password dan confirmed password tidak sama',
            'password_confirmation.required' => 'password confirmation tidak boleh kosong',
        ]);

        try {
            $data = User::where('vKey', $this->vkey)->first();
            $data->vKey = md5(date("YmdHis") . $data->email);
            $data->password = bcrypt($this->password);
            $data->save();

            $this->alert = 1;
        } catch (\Throwable $th) {
            $this->dispatch('error', 'Maaf, server sedang dalam perbaikan lakukan nanti!');
        }
    }

    #[Title('Login Form')]
    #[Layout('layouts.authLayouts')]
    public function render()
    {
        return view('auth.user-get-password');
    }
}
