<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;
use File;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\Content::factory()->count(5)->create();

        Content::truncate();

        $json = File::get("database/data/content.json");
        $data = json_decode($json);

        foreach ($data as $key => $value) {
            Content::create([
                "title" => $value->title,
                "content" => $value->content,
                "image" => $value->image,
            ]);

        }
    }
}
