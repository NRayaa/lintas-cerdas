<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmaResult extends Model
{
    protected $fillable = [
        'sma_user_id',
        'sma_quiz_id',
        'sma_question_id',
        'answer',
        'is_correct'
    ];

    public function smaUser():BelongsTo
    {
        return $this->belongsTo(SmaUser::class, 'sma_user_id', 'id');
    }

    public function smaQuiz():BelongsTo
    {
        return $this->belongsTo(SmaQuiz::class, 'sma_quiz_id', 'id');
    }

    public function smaQuestion():BelongsTo
    {
        return $this->belongsTo(SmaQuestion::class, 'sma_question_id', 'id');
    }
}
