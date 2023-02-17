<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Services\SaveProcess;

abstract class BaseSave implements SaveProcess
{
    public $data;

    public function setData($data){

        $this->data = $data;

        return $this;
    }
} 