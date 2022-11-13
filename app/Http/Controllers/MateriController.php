<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Materi;
use App\Models\Submateri;

class MateriController extends Controller
{
    public function index()
    {
        $materi = Materi::all();
        return view('pages.materi.index', ['materi' => $materi]);
    }

    public function create()
    {
        return view('pages.materi.materi-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'header' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'judul' => 'required|min:5',
            'link' => 'required|url',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
        ]);

        if($request->hasfile('icon', 'header', 'photo')){
            $exticon = $request->file('icon')->getClientOriginalExtension();
            $namafileicon = "icon_".time().'.'.$exticon;
            $request->file('icon')->move('../uploads/materi', $namafileicon);
            
            $extheader = $request->file('header')->getClientOriginalExtension();
            $namafileheader = "header_".time().'.'.$extheader;
            $request->file('header')->move('../uploads/materi', $namafileheader);
            
            $extphoto = $request->file('photo')->getClientOriginalExtension();
            $namafilephoto = "photo_".time().'.'.$extphoto;
            $request->file('photo')->move('../uploads/materi', $namafilephoto);       
        }

        Materi::create([
            'icon' => 'uploads/materi/'.$namafileicon,
            'header' => 'uploads/materi/'.$namafileheader,
            'judul' => $request->judul,
            'link' => $request->link,
            'photo' => 'uploads/materi/'.$namafilephoto,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'paragraf3' => $request->paragraf3,
            'paragraf4' => $request->paragraf4,
        ]);

        return redirect('/materi')->with('sukses', 'Materi '. $request->judul .' berhasil ditambahkan');
    }

    public function detail($id)
    {
        $materi = Materi::find($id);
        $submateri = Submateri::where('materis_id', $materi->id)->get();
        return view('pages.materi.materi', [
            'materi' => $materi,
            'submateri' => $submateri
        ]);
    }

    public function edit($id)
    {
        $materi = Materi::find($id);
        return view('pages.materi.materi-edit', ['materi' => $materi]);
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::find($id);

        $request->validate([
            'icon' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'header' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'judul' => 'required|min:5',
            'link' => 'required|url',
            'photo' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
        ]);

        $materi->update([
            'judul' => $request->judul,
            'link' => $request->link,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'paragraf3' => $request->paragraf3,
            'paragraf4' => $request->paragraf4,
        ]);

        if($request->hasfile('icon')){
            $request->validate(['icon' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $exticon = $request->file('icon')->getClientOriginalExtension();
            $namafileicon = "icon_".time().'.'.$exticon;
            $request->file('icon')->move('../uploads/materi', $namafileicon);
            $materi->icon = 'uploads/materi/'.$namafileicon;            
        }

        if($request->hasfile('header')){
            $request->validate(['header' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extheader = $request->file('header')->getClientOriginalExtension();
            $namafileheader = "header_".time().'.'.$extheader;
            $request->file('header')->move('../uploads/materi', $namafileheader);
            $materi->header = 'uploads/materi/'.$namafileheader; 
        }

        if($request->hasfile('photo')){
            $request->validate(['photo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extphoto = $request->file('photo')->getClientOriginalExtension();
            $namafilephoto = "photo_".time().'.'.$extphoto;
            $request->file('photo')->move('../uploads/materi', $namafilephoto);
            $materi->photo = 'uploads/materi/'.$namafilephoto;
        }

        $materi->save();

        return redirect('materi/'. $materi->id . '/detail' )->with('edit', 'Materi '. $materi->judul .' berhasil diedit');
    }

    public function delete($id)
    {
        $materi = Materi::find($id);
        $materi->delete();
        return redirect('/materi')->with('hapus', 'Materi '. $materi->judul .' berhasil dihapus');
    }
}
