<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class MateriController extends Controller
{
    // public function index(){
    //     $data = Materi::all();

    //     if($data){
    //         return ApiFormatter::createApi(200, 'Success', $data);
    //     }else{
    //         return ApiFormatter::createApi(400, 'Failed');
    //     }
    // }

    public function index()
    {
        $materi = Materi::select('id', 'icon', 'judul')->get();

        $data = $materi->transform(
            function ($item){
                return [
                    "icon" => url($item->icon),
                    "id" => $item->id,
                    "title" => $item->judul
                ];
            }
        );

        return response()->json(["data" => [
            "materi" => $data
        ]], 200);
    }

    public function show($id)
    {
        $materi = Materi::find($id);

        $contents = $materi->content;
        $contents = [
            [
                'content_type_id' => 2,
                'value' => $materi->header,
            ],
            [
                'content_type_id' => 1,
                'value' => $materi->judul,
            ],
            [
                'content_type_id' => 3,
                'value' => $materi->link,
            ],
            [
                'content_type_id' => 2,
                'value' => $materi->photo,
            ],
            [
                'content_type_id' => 1,
                'value' => $materi->paragraf1,
            ],
            [
                'content_type_id' => 1,
                'value' => $materi->paragraf2,
            ],
            [
                'content_type_id' => 1,
                'value' => $materi->paragraf3,
            ],
            [
                'content_type_id' => 1,
                'value' => $materi->paragraf4,
            ],
        ];
        // dd($materi->submateris);
        $subMateris = $materi->submateris->transform( 
            function ($item) {
                $subSubMateris = $item->subsubmateris->transform(
                        function ($item) {
                            return [
                                "icon" => url($item->icon),
                                "id" => $item->id,
                                "title" => $item->judul
                            ];
                        }
                    );
                return [
                    'id' => $item->id,
                    'title' => $item->judul,
                    'contents' => [
                        [
                            'content_type_id' => 2,
                            'value' => $item->photo,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->paragraf1,
                        ],
                        [
                            'content_type_id' => 1,
                            'value' => $item->paragraf2,
                        ],
                    ],
                    'subSubMateris' => $subSubMateris,
                ];
            }
        );

        // $subSubMateris = $subMateris->subsubmateris->transform(
        //     function ($item) {
        //         return [
        //             "icon" => url($item->icon),
        //             "id" => $item->id,
        //             "title" => $item->judul
        //         ];
        //     }
        // );

        return response()->json([
            "data" => [
                "id" => $materi->id,
                "contents" => $contents,
                "subMateris" => $subMateris,
                // "subSubMateri" => $subSubMateris,
            ]
        ], 200);
    }
}
