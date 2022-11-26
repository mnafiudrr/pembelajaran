<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        $berita = Berita::select('id', 'judul', 'photo1')->orderBy('created_at', 'desc')->limit(6)->get();

        $data = $berita->transform(
            function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->judul,
                    'icon' => url($item->photo1)
                ];
            }
        );
        
        return response()->json([
            "data" => $data,
            "meta" => [
                "status" => "success"
            ]
        ]);
    }

    public function all(){
        $berita = Berita::select('id', 'judul', 'photo1')->get();

        $data = $berita->transform(
            function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->judul,
                    'icon' => url($item->photo1)
                ];
            }
        );
        
        return response()->json([
            "data" => $data,
            "meta" => [
                "status" => "success"
            ]
        ]);
    }

    public function show($id)
    {
        $berita = Berita::find($id);

        $data = [
            [
                'content_type_id' => 2,
                'value' => $berita->photo1?url($berita->photo1):null,
            ],
            [
                'content_type_id' => 2,
                'value' => $berita->photo2?url($berita->photo2):null,
            ],
            [
                'content_type_id' => 2,
                'value' => $berita->photo3?url($berita->photo3):null,
            ],
            [
                'content_type_id' => 1,
                'value' => $berita->paragraf1,
            ],
            [
                'content_type_id' => 1,
                'value' => $berita->paragraf2,
            ],
            [
                'content_type_id' => 1,
                'value' => $berita->paragraf3,
            ],
            [
                'content_type_id' => 1,
                'value' => $berita->paragraf4,
            ],
        ];
        
        return response()->json([
            "data" => [
                "id" => $berita->id,
                "title" => $berita->judul,
                "contents" => $data
            ],
            "meta" => [
                "message" => "success"
            ]
        ]);
    }
}
