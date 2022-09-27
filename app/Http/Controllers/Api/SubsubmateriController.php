<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Subsubmateri;
use Illuminate\Http\Request;

class SubsubmateriController extends Controller
{
    public function index(){
        $data = Subsubmateri::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
