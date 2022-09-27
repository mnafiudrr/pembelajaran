<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    public function index(){
        $data = Soal::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
