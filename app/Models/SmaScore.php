<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmaScore extends Model
{
    use HasFactory;

    protected $fillable = ['sma_user_id', 'sma_quiz_id', 'score'];


    public function smaUser(): BelongsTo
    {
        return $this->belongsTo(SmaUser::class, 'sma_user_id', 'id');
    }

    public function smaQuiz(): BelongsTo
    {
        return $this->belongsTo(SmaQuiz::class, 'sma_quiz_id', 'id');
    }
}
