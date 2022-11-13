<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subsubmateri;
use App\Models\Kontenssm;

class SubsubmateriController extends Controller
{
    public function create(Request $req)
    {
        $submateriId = $req->submateriId;
        return view('pages.subsubmateri.subsubmateri-create', compact('submateriId'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'icon' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'header' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'judul' => 'required|min:5',
            'photo1' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
            'photo2' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf5' => 'required',
        ]);

        if($request->hasfile('icon', 'header', 'photo1', 'photo2')){
            $exticon = $request->file('icon')->getClientOriginalExtension();
            $namafileicon = "icon_".time().'.'.$exticon;
            $request->file('icon')->move('../uploads/subsubmateri', $namafileicon);

            $extheader = $request->file('header')->getClientOriginalExtension();
            $namafileheader = "header_".time().'.'.$extheader;
            $request->file('header')->move('../uploads/subsubmateri', $namafileheader);

            $extphoto1 = $request->file('photo1')->getClientOriginalExtension();
            $namafilephoto1 = "photo1_".time().'.'.$extphoto1;
            $request->file('photo1')->move('../uploads/subsubmateri', $namafilephoto1);
            

            $extphoto2 = $request->file('photo2')->getClientOriginalExtension();
            $namafilephoto2 = "photo2_".time().'.'.$extphoto2;
            $request->file('photo2')->move('../uploads/subsubmateri', $namafilephoto2);

        }

        Subsubmateri::create([
            'icon' => 'uploads/subsubmateri/'.$namafileicon,
            'header' => 'uploads/subsubmateri/'.$namafileheader,
            'judul' => $request->judul,
            'photo1' => 'uploads/subsubmateri/'.$namafilephoto1,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'paragraf3' => $request->paragraf3,
            'paragraf4' => $request->paragraf4,
            'photo2' => 'uploads/subsubmateri/'.$namafilephoto2,
            'paragraf5' => $request->paragraf5,
            'paragraf6' => $request->paragraf6,
            'paragraf7' => $request->paragraf7,
            'paragraf8' => $request->paragraf8,
            'submateris_id' => $request->submateriId,
        ]);

        return redirect('/submateri/'. $request->submateriId . '/detail')->with('sukses-subsub', 'Subsubmateri '. $request->judul .' berhasil ditambahkan');
    }

    public function detail($id)
    {
        $subsubmateri = Subsubmateri::find($id);
        $kontenssm = Kontenssm::where('subsubmateris_id', $subsubmateri->id)->get();
        return view('pages.subsubmateri.subsubmateri', [
            'subsubmateri' => $subsubmateri,
            'kontenssm' => $kontenssm
        ]);
    }

    public function edit($id)
    {
        $subsubmateri = Subsubmateri::find($id);
        return view('pages.subsubmateri.subsubmateri-edit', ['subsubmateri' => $subsubmateri]);
    }

    public function update(Request $request, $id)
    {
        $subsubmateri = Subsubmateri::find($id);

        $request->validate([
            'icon' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'header' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'judul' => 'required|min:5',
            'photo1' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
            'photo2' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf5' => 'required',
        ]);

        $subsubmateri->update([
            'judul' => $request->judul,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'paragraf3' => $request->paragraf3,
            'paragraf4' => $request->paragraf4,
            'paragraf5' => $request->paragraf5,
            'paragraf6' => $request->paragraf6,
            'paragraf7' => $request->paragraf7,
            'paragraf8' => $request->paragraf8,
        ]);

        if($request->hasfile('icon')){
            $request->validate(['icon' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $exticon = $request->file('icon')->getClientOriginalExtension();
            $namafileicon = "icon_".time().'.'.$exticon;
            $request->file('icon')->move('../uploads/subsubmateri', $namafileicon);
            $subsubmateri->icon = 'uploads/subsubmateri/'.$namafileicon;            
        }

        if($request->hasfile('header')){
            $request->validate(['header' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extheader = $request->file('header')->getClientOriginalExtension();
            $namafileheader = "header_".time().'.'.$extheader;
            $request->file('header')->move('../uploads/subsubmateri', $namafileheader);
            $subsubmateri->header = 'uploads/subsubmateri/'.$namafileheader; 
        }

        if($request->hasfile('photo1')){
            $request->validate(['photo1' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extphoto1 = $request->file('photo1')->getClientOriginalExtension();
            $namafilephoto1 = "photo1_".time().'.'.$extphoto1;
            $request->file('photo1')->move('../uploads/subsubmateri', $namafilephoto1);
            $subsubmateri->photo1 = 'uploads/subsubmateri/'.$namafilephoto1;
        }

        if($request->hasfile('photo2')){
            $request->validate(['photo2' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extphoto2 = $request->file('photo2')->getClientOriginalExtension();
            $namafilephoto2 = "photo2_".time().'.'.$extphoto2;
            $request->file('photo2')->move('../uploads/subsubmateri', $namafilephoto2);
            $subsubmateri->photo2 = 'uploads/subsubmateri/'.$namafilephoto2;
        }

        $subsubmateri->save();

        return redirect('subsubmateri/'. $subsubmateri->id . '/detail' )->with('edit', 'Subsubmateri '. $subsubmateri->judul .' berhasil diedit');
    }

    public function delete($id)
    {
        $subsubmateri = Subsubmateri::find($id);
        $subsubmateri->delete();
        return redirect('/submateri/'. $subsubmateri->submateris_id . '/detail')->with('hapus-subsub', 'Subsubmateri '. $subsubmateri->judul .' berhasil dihapus');
    }
}
