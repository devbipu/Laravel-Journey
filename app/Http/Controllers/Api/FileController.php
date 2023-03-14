<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function upload(Request $request)
    {

        $avt = $request->file('avt');

        //copy file
        // return Storage::copy('/images/GQuXCbyaQUhjTKN3TU7hUBkZx5Sd4gHuTaJAZRRY.png', 'public/GQuXCbyaQUhjTKN3TU7hUBkZx5Sd4gHuTaJAZRRY.png');
        //delete file
        // return Storage::delete('public/GQuXCbyaQUhjTKN3TU7hUBkZx5Sd4gHuTaJAZRRY.png');
        
        // Downlod file
        // return Storage::download('public/GQuXCbyaQUhjTKN3TU7hUBkZx5Sd4gHuTaJAZRRY.png');
    }
}
