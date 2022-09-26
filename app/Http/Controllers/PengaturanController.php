<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengaturan;

class PengaturanController extends Controller
{
    public function index()
    {
        $pengaturan = Pengaturan::all();
        return view('pages.pengaturan.index', ['pengaturan' => $pengaturan]);
    }

    public function create()
    {
        return view('pages.pengaturan.pengaturan-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'tagline' => 'required|min:5',
            'header' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'link' => 'required|url',
            'status' => 'required|unique:pengaturan'
        ]);

        if($request->hasfile('logo', 'header')){
            $extlogo = $request->file('logo')->getClientOriginalExtension();
            $namafilelogo = "logo_".time().'.'.$extlogo;
            $request->file('logo')->storeAs('public/pengaturan',$namafilelogo);

            $extheader = $request->file('header')->getClientOriginalExtension();
            $namafileheader = "header_".time().'.'.$extheader;
            $request->file('header')->storeAs('public/pengaturan',$namafileheader);         
        }

        Pengaturan::create([
            'logo' => $namafilelogo,
            'tagline' => $request->tagline,
            'header' => $namafileheader,
            'link' => $request->link,
            'status' => $request->status,
        ]);

        return redirect('/pengaturan')->with('sukses', 'Pengaturan berhasil disimpan.');
    }

    public function edit($id)
    {
        $pengaturan = Pengaturan::find($id);
        return view('pages.pengaturan.pengaturan-edit', ['pengaturan' => $pengaturan]);
    }

    public function update(Request $request, $id)
    {
        $pengaturan = Pengaturan::find($id);

        $request->validate([
            'logo' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'tagline' => 'required|min:5',
            'header' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'link' => 'required|url',
        ]);
        
        $pengaturan->update([
            'tagline' => $request->tagline,
            'link' => $request->link,
        ]);

        if($request->hasfile('logo', 'header')){
            $extlogo = $request->file('logo')->getClientOriginalExtension();
            $namafilelogo = "logo_".time().'.'.$extlogo;
            $request->file('logo')->storeAs('public/pengaturan',$namafilelogo);
            $pengaturan->logo = $namafilelogo;                 
        }

        if($request->hasfile('header')){
            $extheader = $request->file('header')->getClientOriginalExtension();
            $namafileheader = "header_".time().'.'.$extheader;
            $request->file('header')->storeAs('public/pengaturan',$namafileheader);
            $pengaturan->header = $namafileheader; 
        }

        $pengaturan->save();

        return redirect('/pengaturan')->with('edit', 'Pengaturan berhasil diedit');
    }

    public function delete($id)
    {
        $pengaturan = Pengaturan::find($id);
        $pengaturan->delete();
        return redirect('/pengaturan')->with('hapus', 'Pengaturan berhasil dihapus');
    }
}
