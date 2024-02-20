<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materi;
use File;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Materi::factory()->count(5)->create();
        Materi::truncate();

        $json = File::get("database/data/materi.json");
        $data = json_decode($json);

        foreach ($data as $key => $value) {
            Materi::create([
                "title" => $value->title,
                "content" => $value->content,
                "image" => $value->image,
            ]);

        }
    }
}
