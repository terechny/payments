<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => 'required:min:3',
            'phone' => 'required|min:5',
            'message' => 'required|min:10',
        ]);        

        $data = [];
        $params = $request->all();  

        $factory = new DataBaseSaveApplicationFactory();
        $m = $factory->saveApplication();
        $data['d'] = $m->setData($params)->save();   
        
        $factory = new FileSaveApplicationFactory();
        $m = $factory->saveApplication();
        $data['f'] = $m->setData($params)->save();         
        
        $data['params'] = $params;
        
        return response()->json($data);
    }
}


// Factory
interface ApplicationFactory
{
    public function saveApplication();
}

class DataBaseSaveApplicationFactory implements ApplicationFactory
{
    public function saveApplication(){

        return new DBSave();
    }
}

class FileSaveApplicationFactory implements ApplicationFactory
{
    public function saveApplication(){
        
        return new FileSave();
    }
}

// Save types

interface SaveProcess
{
    public function save();
    public function setData(array $data);
}

abstract class baseSave implements SaveProcess
{
    public $data;

    public function setData($data){

        $this->data = $data;

        return $this;
    }
} 

class FileSave extends baseSave
{
    public function save(){
     
        $new_str = 'Name: '. $this->data['name'] . ' Phone: ' . $this->data['phone'] . ' Message: ' . $this->data['message'];        
        file_put_contents('applications.txt', PHP_EOL . $new_str, FILE_APPEND);
        return $new_str;
    }
}

class DBSave extends baseSave
{
    public function save(){

        return Application::create($this->data);
    }
}
