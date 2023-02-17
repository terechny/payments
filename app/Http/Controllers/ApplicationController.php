<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Services\SaveController;

class ApplicationController extends Controller
{
    public function store(Request $request, SaveController $save){

        $data = [];

        $validator = Validator::make($request->all(), [
            'name' => 'required:min:3',
            'phone' => 'required|min:5',
            'message' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json($validator);
        }

        $data['s'] = $save->Database($validator->validated());
        $data['f'] = $save->File($validator->validated()); 

        return response()->json($data);
    }
}
