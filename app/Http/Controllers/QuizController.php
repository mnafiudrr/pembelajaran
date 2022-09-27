<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quiz;

class QuizController extends Controller
{
    public function index()
    {
        $quiz = Quiz::all();
        return view('pages.quiz.index', ['quiz' => $quiz]);
    }

    public function create()
    {
        return view('pages.quiz.quiz-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'header' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
            'judul' => 'required|min:5',
        ]);

        if($request->hasfile('icon', 'header')){
            $exticon = $request->file('icon')->getClientOriginalExtension();
            $namafileicon = "icon_".time().'.'.$exticon;
            $request->file('icon')->storeAs('public/quiz',$namafileicon);

            $extheader = $request->file('header')->getClientOriginalExtension();
            $namafileheader = "header_".time().'.'.$extheader;
            $request->file('header')->storeAs('public/quiz',$namafileheader);        
        }

        Quiz::create([
            'icon' => $namafileicon,
            'header' => $namafileheader,
            'judul' => $request->judul,
        ]);

        return redirect('/quiz')->with('sukses', 'Quiz '. $request->judul .' berhasil ditambahkan');
    }

    public function detail($id)
    {
        $quiz = Quiz::find($id);
        // $submateri = Submateri::where('materis_id', $materi->id)->get();
        return view('pages.quiz.quiz', [
            'quiz' => $quiz,
            // 'submateri' => $submateri
        ]);
    }

    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('pages.quiz.quiz-edit', ['quiz' => $quiz]);
    }

    public function update(Request $request, $id)
    {
        $quiz = Quiz::find($id);

        $request->validate([
            'icon' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'header' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'judul' => 'required|min:5',
        ]);

        $quiz->update([
            'judul' => $request->judul,
        ]);

        if($request->hasfile('icon')){
            $request->validate(['icon' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $exticon = $request->file('icon')->getClientOriginalExtension();
            $namafileicon = "icon_".time().'.'.$exticon;
            $request->file('icon')->storeAs('public/quiz',$namafileicon);
            $quiz->icon = $namafileicon;            
        }

        if($request->hasfile('header')){
            $request->validate(['header' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',]);
            $extheader = $request->file('header')->getClientOriginalExtension();
            $namafileheader = "header_".time().'.'.$extheader;
            $request->file('header')->storeAs('public/quiz',$namafileheader);
            $quiz->header = $namafileheader; 
        }

        $quiz->save();

        return redirect('quiz/'. $quiz->id . '/detail' )->with('edit', 'Quiz '. $quiz->judul .' berhasil diedit');
    }

    public function delete($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();
        return redirect('/quiz')->with('hapus', 'Quiz '. $quiz->judul .' berhasil dihapus');
    }
}
