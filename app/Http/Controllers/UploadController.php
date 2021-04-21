<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadFile;


class UploadController extends Controller
{
	 function index(Request $request) {
         

           UploadFile::create([
             'name'=>$request->name,
             'surname'=>$request->surname,
             'email'=>$request->email
             ]);
             $request->file('photos')->store('docs');
             return back();
       }   

} 