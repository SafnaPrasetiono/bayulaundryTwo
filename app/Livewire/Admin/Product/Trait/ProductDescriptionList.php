<?php

namespace App\Livewire\Admin\Product\Trait;

trait ProductDescriptionList
{

    public $description_list = [];

    public function addInput()
    {
        array_push($this->description_list, "");
    }

    public function delInput($que)
    {
        unset($this->description_list[$que]);
    }

}
