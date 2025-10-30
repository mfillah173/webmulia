<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faq';

    protected $fillable = [
        'pertanyaan',
        'jawaban'
    ];

    // Accessor untuk excerpt pertanyaan
    public function getShortQuestionAttribute()
    {
        return \Str::limit($this->pertanyaan, 80);
    }

    // Accessor untuk excerpt jawaban
    public function getShortAnswerAttribute()
    {
        return \Str::limit($this->jawaban, 150);
    }
}
