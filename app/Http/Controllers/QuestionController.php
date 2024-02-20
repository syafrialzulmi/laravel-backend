<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

use App\Models\Question;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $count = DB::table('questions')->count();
        $countkategori = DB::table('questions')
            ->select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->get();
        $questions = DB::table('questions')
            ->when($request->input('pertanyaan'), function($query, $pertanyaan) {
                return $query->where('pertanyaan', 'like', '%' .$pertanyaan. '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('pages.question.index', compact('questions','count','countkategori'));
    }

    public function create()
    {
        return view('pages.question.create');
    }

    public function store(StoreQuestionRequest $request)
    {
        $data = $request->all();
        Question::create($data);
        return redirect()->route('question.index')->with('success', 'Question successfulyy created');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('pages.question.edit', compact('question'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $data = $request->validated();
        $question->update($data);
        return redirect()->route('question.index')->with('success', 'Question successfully updated');
    }

    public function delete($id)
    {
        $question = Question::find($id);
        return view('pages.question.delete', compact('question'));
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('question.index')->with('success', 'Question successfully deleted');
    }
}
