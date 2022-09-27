<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Soal;

class SoalController extends Controller
{
    public function create(Request $req)
    {
        $quizId = $req->quizId;
        return view('pages.soal.soal-create', compact('quizId'));
    }

    public function store(Request $request)
    {
        // dd($request->materiId);
        $request->validate([
            'soal' => 'required',
            'jawaban1' => 'required',
            'jawaban2' => 'required',
            'jawaban3' => 'required',
            'jawaban4' => 'required',
            'jawaban5' => 'required',
            'jawaban' => 'required|numeric',
        ]);

        Soal::create([
            'soal' => $request->soal,
            'jawaban1' => $request->jawaban1,
            'jawaban2' => $request->jawaban2,
            'jawaban3' => $request->jawaban3,
            'jawaban4' => $request->jawaban4,
            'jawaban5' => $request->jawaban5,
            'jawaban' => $request->jawaban,
            'quizzes_id' => $request->quizId,
        ]);

        return redirect('/quiz/'. $request->quizId . '/detail')->with('sukses-soal', 'Soal berhasil ditambahkan');
    }

    public function detail($id)
    {
        $soal = Soal::find($id);
        return view('pages.soal.soal', [
            'soal' => $soal,
        ]);
    }

    public function edit($id)
    {
        $soal = Soal::find($id);
        return view('pages.soal.soal-edit', ['soal' => $soal]);
    }

    public function update(Request $request, $id)
    {
        $soal = Soal::find($id);
        $request->validate([
            'soal' => 'required',
            'jawaban1' => 'required',
            'jawaban2' => 'required',
            'jawaban3' => 'required',
            'jawaban4' => 'required',
            'jawaban5' => 'required',
            'jawaban' => 'required|numeric',
        ]);

        $soal->update([
            'soal' => $request->soal,
            'jawaban1' => $request->jawaban1,
            'jawaban2' => $request->jawaban2,
            'jawaban3' => $request->jawaban3,
            'jawaban4' => $request->jawaban4,
            'jawaban5' => $request->jawaban5,
            'jawaban' => $request->jawaban,
        ]);

        return redirect('soal/'. $soal->id . '/detail' )->with('edit', 'Soal berhasil diedit');
    }

    public function delete($id)
    {
        $soal = Soal::find($id);
        $soal->delete();
        return redirect('/quiz/'. $soal->quizzes_id . '/detail')->with('hapus-soal', 'Soal berhasil dihapus');
    }
}
