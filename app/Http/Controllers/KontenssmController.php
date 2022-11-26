<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kontenssm;

class KontenssmController extends Controller
{
    public function create(Request $req)
    {
        $subsubmateriId = $req->subsubmateriId;
        return view('pages.kontenssm.kontenssm-create', compact('subsubmateriId'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'judul' => 'required|min:5',
            'photo1' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'photo2' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'photo3' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
            'doc1' => 'mimes:pdf|max:4096',
            'doc2' => 'mimes:pdf|max:4096',
            'doc3' => 'mimes:pdf|max:4096',
        ]);

        $namafilephoto1 = null;
        $namafilephoto2 = null;
        $namafilephoto3 = null;
        $namafiledoc1 = null;
        $namafiledoc2 = null;
        $namafiledoc3 = null;

        if($request->hasfile('photo1')){
            $extphoto1 = $request->file('photo1')->getClientOriginalExtension();
            $namafilephoto1 = "uploads/kontenssm/".'.'."photo1_".time().'.'.$extphoto1;
            $request->file('photo1')->move('../uploads/kontenssm', $namafilephoto1);
            $request->photo1 = $namafilephoto1;
        }

        if($request->hasFile('photo2')){
            $extphoto2 = $request->file('photo2')->getClientOriginalExtension();
            $namafilephoto2 = "uploads/kontenssm/".'.'."photo2_".time().'.'.$extphoto2;
            $request->file('photo2')->move('../uploads/kontenssm', $namafilephoto2);
            $request->photo2 = $namafilephoto2;
        }

        if($request->hasFile('photo3')){
            $extphoto3 = $request->file('photo3')->getClientOriginalExtension();
            $namafilephoto3 = "uploads/kontenssm/".'.'."photo3_".time().'.'.$extphoto3;
            $request->file('photo3')->move('../uploads/kontenssm', $namafilephoto3);
            $request->photo3 = $namafilephoto3;
        }

        if($request->hasFile('doc1')){
            $extdoc1 = $request->file('doc1')->getClientOriginalExtension();
            $namafiledoc1 = "uploads/kontenssm/".'.'."doc1_".time().'.'.$extdoc1;
            $request->file('doc1')->move('../uploads/kontenssm', $namafiledoc1);
            $request->doc1 = $namafiledoc1;
        }

        if($request->hasFile('doc2')){
            $extdoc2 = $request->file('doc2')->getClientOriginalExtension();
            $namafiledoc2 = "uploads/kontenssm/".'.'."doc2_".time().'.'.$extdoc2;
            $request->file('doc2')->move('../uploads/kontenssm', $namafiledoc2);
            $request->doc2 = $namafiledoc2;
        }

        if($request->hasFile('doc3')){
            $extdoc3 = $request->file('doc3')->getClientOriginalExtension();
            $namafiledoc3 = "uploads/kontenssm/".'.'."doc3_".time().'.'.$extdoc3;
            $request->file('doc3')->move('../uploads/kontenssm', $namafiledoc3);
            $request->doc3 = $namafiledoc3;
        }

        Kontenssm::create([
            'judul' => $request->judul,
            'photo1' => $namafilephoto1,
            'photo2' => $namafilephoto2,
            'photo3' => $namafilephoto3,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'paragraf3' => $request->paragraf3,
            'paragraf4' => $request->paragraf4,
            'juduldoc1' => $request->juduldoc1,
            'doc1' => $namafiledoc1,
            'juduldoc2' => $request->juduldoc2,
            'doc2' => $namafiledoc2,
            'juduldoc3' => $request->juduldoc3,
            'doc3' => $namafiledoc3,
            'subsubmateris_id' => $request->subsubmateriId,
        ]);

        return redirect('/subsubmateri/'. $request->subsubmateriId . '/detail')->with('sukses-kontenssm', 'Konten subsubmateri '. $request->judul .' berhasil ditambahkan');
    }

    public function detail($id)
    {
        $kontenssm = Kontenssm::find($id);
        return view('pages.kontenssm.kontenssm', [
            'kontenssm' => $kontenssm,
        ]);
    }

    public function edit($id)
    {
        $kontenssm = Kontenssm::find($id);
        return view('pages.kontenssm.kontenssm-edit', ['kontenssm' => $kontenssm]);
    }

    public function update(Request $request, $id)
    {
        $kontenssm = Kontenssm::find($id);

        $request->validate([
            'judul' => 'required|min:5',
            'photo1' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'photo2' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'photo3' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
            'doc1' => 'mimes:pdf|max:4096',
            'doc2' => 'mimes:pdf|max:4096',
            'doc3' => 'mimes:pdf|max:4096',
        ]);

        $kontenssm->update([
            'judul' => $request->judul,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'paragraf3' => $request->paragraf3,
            'paragraf4' => $request->paragraf4,
            'juduldoc1' => $request->juduldoc1,
            'juduldoc2' => $request->juduldoc2,
            'juduldoc3' => $request->juduldoc3,
        ]);

        if($request->hasfile('photo1')){
            $request->validate(['photo1' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extphoto1 = $request->file('photo1')->getClientOriginalExtension();
            $namafilephoto1 = "uploads/kontenssm/".'.'."photo1_".time().'.'.$extphoto1;
            $request->file('photo1')->move('../uploads/kontenssm', $namafilephoto1);
            $kontenssm->photo1 = 'uploads/kontenssm/'.$namafilephoto1;
        }

        if($request->hasfile('photo2')){
            $request->validate(['photo2' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extphoto2 = $request->file('photo2')->getClientOriginalExtension();
            $namafilephoto2 = "uploads/kontenssm/".'.'."photo2_".time().'.'.$extphoto2;
            $request->file('photo2')->move('../uploads/kontenssm', $namafilephoto2);
            $kontenssm->photo2 = 'uploads/kontenssm/'.$namafilephoto2;
        }

        if($request->hasfile('photo3')){
            $request->validate(['photo3' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extphoto3 = $request->file('photo3')->getClientOriginalExtension();
            $namafilephoto3 = "uploads/kontenssm/".'.'."photo3_".time().'.'.$extphoto3;
            $request->file('photo3')->move('../uploads/kontenssm', $namafilephoto3);
            $kontenssm->photo3 = 'uploads/kontenssm/'.$namafilephoto3;
        }

        if($request->hasFile('doc1')){
            $request->validate(['doc1' => 'mimes:pdf|max:4096',]);
            $extdoc1 = $request->file('doc1')->getClientOriginalExtension();
            $namafiledoc1 = "uploads/kontenssm/".'.'."doc1_".time().'.'.$extdoc1;
            $request->file('doc1')->move('../uploads/kontenssm', $namafiledoc1);
            $request->doc1 = $namafiledoc1;
        }

        if($request->hasFile('doc2')){
            $request->validate(['doc2' => 'mimes:pdf|max:4096',]);
            $extdoc2 = $request->file('doc2')->getClientOriginalExtension();
            $namafiledoc2 = "uploads/kontenssm/".'.'."doc2_".time().'.'.$extdoc2;
            $request->file('doc2')->move('../uploads/kontenssm', $namafiledoc2);
            $request->doc2 = $namafiledoc2;
        }

        if($request->hasFile('doc3')){
            $request->validate(['doc3' => 'mimes:pdf|max:4096',]);
            $extdoc3 = $request->file('doc3')->getClientOriginalExtension();
            $namafiledoc3 = "uploads/kontenssm/".'.'."doc3_".time().'.'.$extdoc3;
            $request->file('doc3')->move('../uploads/kontenssm', $namafiledoc3);
            $request->doc3 = $namafiledoc3;
        }

        $kontenssm->save();

        return redirect('kontenssm/'. $kontenssm->id . '/detail' )->with('edit', 'Konten subsubmateri '. $kontenssm->judul .' berhasil diedit');
    }

    public function delete($id)
    {
        $kontenssm = Kontenssm::find($id);
        $kontenssm->delete();
        return redirect('/subsubmateri/'. $kontenssm->subsubmateris_id . '/detail')->with('hapus-kontenssm', 'Konten subsubmateri '. $kontenssm->judul .' berhasil dihapus');
    }
}
