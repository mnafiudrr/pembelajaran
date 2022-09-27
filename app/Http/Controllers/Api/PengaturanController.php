<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index(){
        $data = Pengaturan::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}