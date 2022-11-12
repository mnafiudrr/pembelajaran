<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UploadsController extends Controller
{
    //
    public function uploads($folder, $file){
        try {
            $file_path = public_path('../uploads/'.$folder.'/'.$file);
            return response()->file($file_path);;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function uploadFile($file){
        try {
            $file_path = public_path('../uploads/'.$file);
            return response()->file($file_path);;
        } catch (\Exception $e) {
            return null;
        }
    }
}
