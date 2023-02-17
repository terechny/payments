<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Services\SaveProcess;
use App\Http\Controllers\Services\BaseSave;
use App\Models\Application;

class DBSave extends BaseSave
{
    public function save(){

        return Application::create($this->data);
    }
}