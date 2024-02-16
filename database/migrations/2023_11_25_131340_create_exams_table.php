<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // $table->integer('nilai_angka')->nullable();
            // $table->integer('nilai_verbal')->nullable();
            // $table->integer('nilai_logika')->nullable();
            $table->decimal('nilai_angka', $precision = 8, $scale = 2)->nullable();
            $table->decimal('nilai_verbal', $precision = 8, $scale = 2)->nullable();
            $table->decimal('nilai_logika', $precision = 8, $scale = 2)->nullable();
            // status ujian
            $table->enum('status_angka', ['start', 'done'])->default('start');
            $table->enum('status_verbal', ['start', 'done'])->default('start');
            $table->enum('status_logika', ['start', 'done'])->default('start');
            // timer ujian perkategori
            $table->integer('timer_angka')->nullable();
            $table->integer('timer_verbal')->nullable();
            $table->integer('timer_logika')->nullable();
            $table->string('hasil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
