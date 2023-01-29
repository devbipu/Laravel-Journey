<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    //


    public function fileStore(Request $request)
    {
        // $file = $request->file('photo');
        // $fName = $file->hashName();
        //Store file 
        // Storage::putFileAs('images', $file, $fName);

        // Copy file
        //Storage::copy('images/FgxBpIHvxJQCoeeQZQCghW4UI28z8DaebbqqRQBK.jpg', 'public/img/FgxBpIHvxJQCoeeQZQCghW4UI28z8DaebbqqRQBK.jpg');
        
        //move file 
        //Storage::move('images/FgxBpIHvxJQCoeeQZQCghW4UI28z8DaebbqqRQBK.jpg', 'public/img/FgxBpIHvxJQCoeeQZQCghW4UI28z8DaebbqqRQBK.jpg');

        //Get all the file
        //$files = Storage::allFiles('public');

        //Get file
        // $file = Storage::get('public/img/FgxBpIHvxJQCoeeQZQCghW4UI28z8DaebbqqRQBK.jpg');

        //Download File
        //$file = Storage::download('public/img/FgxBpIHvxJQCoeeQZQCghW4UI28z8DaebbqqRQBK.jpg');

        //Delete File 
        // if(Storage::exists('public/img/filetest1.jpg')){
        //     return Storage::delete('public/img/filetest1.jpg');
        // }

        //Delete Direcotory
        // Storage::deleteDirectory('public/img');
        
        return $request;
    }
}
