<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nilai_angka',
        'nilai_verbal',
        'nilai_logika',
        'hasil',
    ];
}
