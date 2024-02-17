<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Question;
use App\Models\Exam;
use App\Models\ExamQuestionsList;

use App\Http\Resources\QuestionResource;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // create ujian
    public function createUjian(Request $request)
    {
        $soalLogika = Question::where('kategori', 'Logika')->inRandomOrder()->limit(20)->get();
        $soalNumeric = Question::where('kategori', 'Numeric')->inRandomOrder()->limit(20)->get();
        $soalVerbal = Question::where('kategori', 'Verbal')->inRandomOrder()->limit(20)->get();

        $ujian = Exam::create([
            'user_id' => $request->user()->id,
        ]);

        foreach ($soalLogika as $soal) {
            ExamQuestionsList::create([
                'exam_id' => $ujian->id,
                'question_id' => $soal->id,
            ]);
        }

        foreach ($soalNumeric as $soal) {
            ExamQuestionsList::create([
                'exam_id' => $ujian->id,
                'question_id' => $soal->id,
            ]);
        }

        foreach ($soalVerbal as $soal) {
            ExamQuestionsList::create([
                'exam_id' => $ujian->id,
                'question_id' => $soal->id,
            ]);
        }

        return response()->json([
            'message' => 'The test was created successfully',
            'data' => $ujian,
        ], 200);
    }

    public function getListSoalByKategori(Request $request)
    {
        $ujian = Exam::where('user_id', $request->user()->id)->first();
        if (!$ujian) {
            return response()->json([
                'message' => 'Ujian tidak ditemukan',
                'data' => [],
            ], 200); 
        }
        $ujianSoalList = ExamQuestionsList::where('exam_id', $ujian->id)->get();
        $soalIds = $ujianSoalList->pluck('question_id');

        $soal = Question::whereIn('id', $soalIds)->where('kategori', $request->kategori)->get();
        // timer by kategori
        $timer = $ujian->timer_angka;
        if ($request->kategori == 'Verbal') {
            $timer = $ujian->timer_verbal;
        } else if ($request->kategori == 'Logika') {
            $timer = $ujian->timer_logika;
         }
        return response()->json([
            'message' => 'Successfully got the question',
            'data' => QuestionResource::collection($soal),
        ], 200);
    }

    public function jawabSoal(Request $request)
    {
        $validateDate = $request->validate([
            'soal_id' => 'required',
            'jawaban' => 'required',
        ]);

        $ujian = Exam::where('user_id', $request->user()->id)->first();
        if (!$ujian) {
            return response()->json([
                'message' => 'Ujian tidak ditemukan',
                'data' => [],
            ], 200);
        }
        $ujianSoalList = ExamQuestionsList::where('exam_id', $ujian->id)->where('question_id', $validateDate['soal_id'])->first();
        $soal = Question::where('id', $validateDate['soal_id'])->first();

        if ($soal->kunci == $validateDate['jawaban']) {
            $ujianSoalList->update([
                'kebenaran' => true,
            ]);
        } else {
            $ujianSoalList->update([
                'kebenaran' => false,
            ]);
        }

        return response()->json([
            'message' => 'Successfully saved answer',
            'jawaban' => $ujianSoalList->kebenaran,
        ], 200);
    }

    public function hitungNilaiUjianByKategori(Request $request) {
        $kategori = $request->kategori;
        $ujian = Exam::where('user_id', $request->user()->id)->first();

        if (!$ujian) {
            return response()->json([
                'message' => 'Ujian tidak ditemukan',
                'data' => [],
            ], 200); 
        }
                
        $ujianSoalList = ExamQuestionsList::where('exam_id', $ujian->id)->get();
        $ujianSoalList = $ujianSoalList->filter(function($value, $key) use ($kategori) {
            return $value->question->kategori == $kategori;
        });

        $totalBenar = $ujianSoalList->where('kebenaran', true)->count();
        $totalSoal = $ujianSoalList->count();
        $nilai = ($totalBenar / $totalSoal) * 100;


        $kategori_field = 'nilai_verbal';
        $status_field = 'status_verbal';
        $timer_field = 'timer_verbal';
        if ($kategori == "Numeric") {
            $kategori_field = 'nilai_angka';
            $status_field = 'status_angka';
            $timer_field = 'timer_angka';
        } else if ($kategori == "Logika") {
            $kategori_field = 'nilai_logika';
            $status_field = 'status_logika';
            $timer_field = 'timer_logika';
        }

        $ujian->update([
            $kategori_field => round($nilai),
            $status_field => 'done',
            $timer_field => 0,
        ]);

        return response()->json([
            'message' => 'Berhasil mendapatkan nilai',
            'nilai' => $nilai,
        ], 200);
    
    }
}
