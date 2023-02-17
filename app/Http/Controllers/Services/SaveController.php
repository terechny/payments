<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\Services\FileFactory;
use App\Http\Controllers\Services\DatabaseFactory;

class SaveController extends Controller
{
    private $fileFactory;
    private $databaseFactory;

    public function __construct(FileFactory $fileFactory, DatabaseFactory $databaseFactory)
    {
        $this->fileFactory = $fileFactory;
        $this->databaseFactory = $databaseFactory;
    }

    public function Database($data){

        return $this->factoryBuild($this->databaseFactory, $data);
    }

    public function File($data){

        return $this->factoryBuild($this->fileFactory, $data);
    }

    private function factoryBuild($factory, $data){

        return $factory->saveApplication()->setData($data)->save();
    }
}
