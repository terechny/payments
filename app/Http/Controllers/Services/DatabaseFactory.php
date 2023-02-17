<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Services\ApplicationFactory;

class DatabaseFactory implements Application
{
    public function saveApplication(){

        return new DBSave();
    }
}