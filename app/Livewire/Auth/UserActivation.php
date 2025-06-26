<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class UserActivation extends Component
{
    public $email, $vkey;
    public $alert;

    public function mount()
    {
        try {
            if ($this->vkey) {
                $data = User::where('email', $this->email)->where('vKey', $this->vkey)->first();
                if ($data) {
                    if ($data->is_active == 1) {
                        $this->alert = 2;
                    } else {
                        $data->is_active = '1';
                        $data->save();
                        $this->alert = 1;
                    }
                } else {
                    $this->alert = 0;
                }
            } else {
                $this->alert = 0;
            }
        } catch (\Throwable $th) {
            $this->alert = 0;
        }
    }


    #[Title('Activation Account')]
    #[Layout('layouts.authLayouts')]
    public function render()
    {
        return view('auth.user-activation');
    }
}
