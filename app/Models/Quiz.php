<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = [
        'kategori',
        'pertanyaan',
        'a','b','c','d',
        'jawaban',
        'pembahasan',
        'is_active',
    ];
}
