<?php

namespace App\Livewire\Admin\Account;

use App\Models\admins;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class AdminAccountDetail extends Component
{
    public $id, $slug;

    public $images, $avatar;
    public $username, $email, $gender, $born, $phone, $address, $is_active;


    public function mount()
    {
        $data = admins::find($this->id);
        $this->username = $data->username;
        $this->email = $data->email;
        $this->gender = $data->gender;
        $this->born = $data->born;
        $this->phone = $data->phone;
        $this->avatar = $data->avatar;
        $this->address = $data->address;
        $this->is_active = $data->is_active;
    }

    #[Title('Admin Detail Account')]
    #[Layout('layouts.adminLayouts')]
    public function render()
    {
        return view('admin.account.admin-account-detail');
    }
}
