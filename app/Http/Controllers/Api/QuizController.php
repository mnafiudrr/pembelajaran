<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(){
        $data = Quiz::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }
}
