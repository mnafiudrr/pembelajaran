<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    // public function index(){
    //     $data = Quiz::all();

    //     if($data){
    //         return ApiFormatter::createApi(200, 'Success', $data);
    //     }else{
    //         return ApiFormatter::createApi(400, 'Failed');
    //     }
    // }

    public function index()
    {
        $quiz = Quiz::select('id', 'icon', 'judul')->get();

        $data = $quiz->transform(
            function ($item){
                return [
                    "icon" => url($item->icon),
                    "id" => $item->id,
                    "title" => $item->judul
                ];
            }
        );

        return response()->json(["data" => [
            "quiz" => $data
        ]], 200);
    }

    public function questions($quiz_id)
    {

        $quiz = Quiz::select('id', 'judul', 'header')->where('id', $quiz_id)
        ->with(['soals' => function ($q) {
            $q->select('quizzes_id', 'soal', 'jawaban1', 'jawaban2', 'jawaban3', 'jawaban4', 'jawaban5', 'jawaban');
        }])->first();

        $soals = $quiz->soals->transform(
            function ($data){
                return [
                    'question' => $data->soal,
                    'options' => [
                        $data->jawaban1,
                        $data->jawaban2,
                        $data->jawaban3,
                        $data->jawaban4,
                        $data->jawaban5,
                    ],
                    'key' => $data->jawaban,
                ];
            }
        );

        return response()->json([
            'data' => [
                'judul' => $quiz->judul,
                'header' => $quiz->header,
                'quiz' => $soals
            ]
        ], 200);
    }
}
