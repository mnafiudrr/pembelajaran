<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('pages.berita.index', ['berita' => $berita]);
    }

    public function create()
    {
        return view('pages.berita.berita-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:5',
            'photo1' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'photo2' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'photo3' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
        ]);

        $namafilephoto1 = null;
        $namafilephoto2 = null;
        $namafilephoto3 = null;

        if($request->hasfile('photo1')){
            $extphoto1 = $request->file('photo1')->getClientOriginalExtension();
            $namafilephoto1 = "photo1_".time().'.'.$extphoto1;
            $request->file('photo1')->move('../uploads/berita',$namafilephoto1);
        }

        if($request->hasfile('photo2')){
            $extphoto2 = $request->file('photo2')->getClientOriginalExtension();
            $namafilephoto2 = "photo2_".time().'.'.$extphoto2;
            $request->file('photo2')->move('../uploads/berita',$namafilephoto2);       
        }

        if($request->hasfile('photo3')){
            $extphoto3 = $request->file('photo3')->getClientOriginalExtension();
            $namafilephoto3 = "photo3_".time().'.'.$extphoto3;
            $request->file('photo3')->move('../uploads/berita',$namafilephoto3);         
        }

        Berita::create([
            'judul' => $request->judul,
            'photo1' => 'uploads/berita/'.$namafilephoto1,
            'photo2' => 'uploads/berita/'.$namafilephoto2,
            'photo3' => 'uploads/berita/'.$namafilephoto3,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'paragraf3' => $request->paragraf3,
            'paragraf4' => $request->paragraf4,
        ]);

        return redirect('/berita')->with('sukses', 'Berita '. $request->judul .' berhasil ditambahkan');
    }

    public function detail($id)
    {
        $berita = Berita::find($id);
        return view('pages.berita.berita', [
            'berita' => $berita,
        ]);
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::find($id);

        $request->validate([
            'judul' => 'required|min:5',
            'photo1' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'photo2' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'photo3' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'paragraf1' => 'required',
        ]);

        $berita->update([
            'judul' => $request->judul,
            'paragraf1' => $request->paragraf1,
            'paragraf2' => $request->paragraf2,
            'paragraf3' => $request->paragraf3,
            'paragraf4' => $request->paragraf4,
        ]);

        if($request->hasfile('photo1')){
            $extphoto1 = $request->file('photo1')->getClientOriginalExtension();
            $namafilephoto1 = "photo1_".time().'.'.$extphoto1;
            $request->file('photo1')->move('../uploads/berita',$namafilephoto1);
            $berita->photo1 = 'uploads/berita/'.$namafilephoto1;         
        }

        if($request->hasfile('photo2')){
            $extphoto2 = $request->file('photo2')->getClientOriginalExtension();
            $namafilephoto2 = "photo2_".time().'.'.$extphoto2;
            $request->file('photo2')->move('../uploads/berita',$namafilephoto2); 
            $berita->photo2 = 'uploads/berita/'.$namafilephoto2;       
        }

        if($request->hasfile('photo3')){    
            $extphoto3 = $request->file('photo3')->getClientOriginalExtension();
            $namafilephoto3 = "photo3_".time().'.'.$extphoto3;
            $request->file('photo3')->move('../uploads/berita',$namafilephoto3);
            $berita->photo3 = 'uploads/berita/'.$namafilephoto3;      
        }

        $berita->save();

        return redirect('berita/'. $berita->id . '/detail' )->with('edit', 'Berita '. $berita->judul .' berhasil diedit');
    }

    public function edit($id)
    {
        $berita = Berita::find($id);
        return view('pages.berita.berita-edit', ['berita' => $berita]);
    }

    public function delete($id)
    {
        $berita = Berita::find($id);
        $berita->delete();
        return redirect('/berita')->with('hapus', 'Berita '. $berita->judul .' berhasil dihapus');
    }
}
