<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use File;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Question::factory(100)->create();
        Question::truncate();

        $json = File::get("database/data/soal.json");
        $data = json_decode($json);

        foreach ($data as $key => $value) {
            Question::create([
                "pertanyaan" => $value->pertanyaan,
                "kategori" => $value->kategori,
                "jawaban_a" => $value->jawaban_a,
                "jawaban_b" => $value->jawaban_b,
                "jawaban_c" => $value->jawaban_c,
                "jawaban_d" => $value->jawaban_d,
                "kunci" => $value->kunci,
            ]);

        }
    }
}
