<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submateri;
use App\Models\Subsubmateri;

class SubmateriController extends Controller
{
    public function create(Request $req)
    {
        $materiId = $req->materiId;
        return view('pages.submateri.submateri-create', compact('materiId'));
    }

    public function store(Request $request)
    {
        // dd($request->materiId);
        $request->validate([
            'judul' => 'required|min:5',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
        ]);

        if($request->hasfile('photo')){

            $extphoto = $request->file('photo')->getClientOriginalExtension();
            $namafilephoto = "photo_".time().'.'.$extphoto;
            $request->file('photo')->move('../uploads/submateri', $namafilephoto);          
        }

        Submateri::create([
            'judul' => $request->judul,
            'photo' => 'uploads/submateri/'.$namafilephoto,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'materis_id' => $request->materiId,
        ]);

        return redirect('/materi/'. $request->materiId . '/detail')->with('sukses-sub', 'Submateri '. $request->judul .' berhasil ditambahkan');
    }

    public function detail($id)
    {
        $submateri = Submateri::find($id);
        $subsubmateri = Subsubmateri::where('submateris_id', $submateri->id)->get();
        return view('pages.submateri.submateri', [
            'submateri' => $submateri,
            'subsubmateri' => $subsubmateri
        ]);
    }

    public function edit($id)
    {
        $submateri = Submateri::find($id);
        return view('pages.submateri.submateri-edit', ['submateri' => $submateri]);
    }

    public function update(Request $request, $id)
    {
        $submateri = Submateri::find($id);

        $request->validate([
            'judul' => 'required|min:5',
            'photo' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
        ]);

        $submateri->update([
            'judul' => $request->judul,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
        ]);

        if($request->hasfile('photo')){
            $request->validate(['photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extphoto = $request->file('photo')->getClientOriginalExtension();
            $namafilephoto = "photo_".time().'.'.$extphoto;
            $request->file('photo')->move('../uploads/submateri', $namafilephoto);
            $submateri->photo = 'uploads/submateri/'.$namafilephoto;
        }

        $submateri->save();

        return redirect('submateri/'. $submateri->id . '/detail' )->with('edit', 'Submateri '. $submateri->judul .' berhasil diedit');
    }

    public function delete($id)
    {
        $submateri = Submateri::find($id);
        $submateri->delete();
        return redirect('/materi/'. $submateri->materis_id . '/detail')->with('hapus-sub', 'Submateri '. $submateri->judul .' berhasil dihapus');
    }
}
