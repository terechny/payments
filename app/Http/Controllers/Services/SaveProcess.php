<?php

namespace App\Http\Controllers\Services;

interface SaveProcess
{   
    public function setData(array $data);
    public function save();
}