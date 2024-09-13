<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionResult extends Model
{
    use HasFactory;
    // Arahkan model ini ke tabel 'question_result'
    protected $table = 'question_result';

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id');
    }
}
