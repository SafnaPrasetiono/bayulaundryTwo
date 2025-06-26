<?php

namespace App\Livewire\Admin\Profile;

use App\Models\admins;

trait AdminPassword
{
    public $password, $confirmation;

    
    public function updated()
    {
        $this->validate([
        'password'  => 'required',
        'confirmation'  => 'required'
    ],[
        'password.required' => 'Oops, password tidak boleh kosong!',
        'confirmation.required' => 'Oops, konfirmasi password tidak boleh kosong!',
    ]);
    }

    public function clear()
    {
        $this->password = '';
        $this->confirmation = '';
    }

    public function setup()
    {
        $id = auth('admins')->user()->admin_id;
        if ($this->password != $this->confirmation) {
            $this->dispatch('error', 'Oops, password dan konfrimasi password tidak sama!');
        } else {
            $data = admins::find($id);
            $data->password = bcrypt($this->password);
            if ($data->save()) {
                $this->dispatch('success', 'Password berhasil dirubah!');
            } else {
                $this->dispatch('error', 'Oops, maaf database sedang sibuk!');
            }
        }
        $this->clear();
    }
}
