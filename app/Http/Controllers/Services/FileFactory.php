<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Services\Application;

class FileFactory implements Application
{
    public function saveApplication(){
        
        return new FileSave();
    }
}