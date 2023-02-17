<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Services\SaveProcess;
use App\Http\Controllers\Services\BaseSave;

class FileSave extends BaseSave
{
    public function save(){
     
        $new_str = 'Name: '. $this->data['name'] . ' Phone: ' . $this->data['phone'] . ' Message: ' . $this->data['message'];        
        file_put_contents('applications.txt', PHP_EOL . $new_str, FILE_APPEND);
        return $new_str;
    }
}