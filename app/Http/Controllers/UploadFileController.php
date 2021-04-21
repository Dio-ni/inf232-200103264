<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index(){
        return view('file_upload');
    }
    public function showUploadFile(Request $request){
        $file = $request -> file('image');
        $destinationPath ='uploads';
        $file -> move($destinationPath, $file-> getClientOriginalName());

    }
}
