<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SdResult extends Model
{
    protected $fillable = [
        'sd_user_id',
        'sd_quiz_id',
        'sd_question_id',
        'answer',
        'is_correct'
    ];

    public function sdUser():BelongsTo
    {
        return $this->belongsTo(SdUser::class, 'sd_user_id', 'id');
    }

    public function sdQuiz():BelongsTo
    {
        return $this->belongsTo(SdQuiz::class, 'sd_quiz_id', 'id');
    }

    public function sdQuestion():BelongsTo
    {
        return $this->belongsTo(SdQuestion::class, 'sd_question_id', 'id');
    }
}
