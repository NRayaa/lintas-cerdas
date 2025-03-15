<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmpResult extends Model
{
    protected $fillable = [
        'smp_user_id',
        'smp_quiz_id',
        'smp_question_id',
        'answer',
        'is_correct'
    ];

    public function smpUser():BelongsTo
    {
        return $this->belongsTo(SmpUser::class, 'smp_user_id', 'id');
    }

    public function smpQuiz():BelongsTo
    {
        return $this->belongsTo(SmpQuiz::class, 'smp_quiz_id', 'id');
    }

    public function smpQuestion():BelongsTo
    {
        return $this->belongsTo(SmpQuestion::class, 'smp_question_id', 'id');
    }
}
