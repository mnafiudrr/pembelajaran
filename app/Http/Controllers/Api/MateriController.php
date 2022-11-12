<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index(){
        $data = Materi::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function test($id)
    {
        $materi = Materi::find($id);

        $contents = $materi->content;
        $contents = [
            [
                'content_type_id' => 3,
                'value' => $materi->link,
            ],
            [
                'content_type_id' => 2,
                'value' => $materi->photo,
            ],
            [
                'content_type_id' => 3,
                'value' => $materi->paragraf1,
            ],
            [
                'content_type_id' => 3,
                'value' => $materi->paragraf2,
            ],
            [
                'content_type_id' => 3,
                'value' => $materi->paragraf3,
            ],
            [
                'content_type_id' => 3,
                'value' => $materi->paragraf4,
            ],
        ];

        $subMateris = $materi->submateris->transform( function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->judul,
                'contents' => [
                    [
                        'content_type_id' => 2,
                        'value' => $item->photo,
                    ],
                    [
                        'content_type_id' => 3,
                        'value' => $item->paragraf1,
                    ],
                    [
                        'content_type_id' => 3,
                        'value' => $item->paragraf2,
                    ],
                ],
            ];
        });

        return response()->json([
            "data" => [
                "id" => $materi->id,
                "logo" => $materi->logo,
                "contents" => $contents,
                "subMateris" => $subMateris
            ]
        ], 200);
    }
}
