<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmpScore extends Model
{
    use HasFactory;

    protected $fillable = ['smp_user_id', 'smp_quiz_id', 'score'];


    public function smpUser(): BelongsTo
    {
        return $this->belongsTo(SmpUser::class, 'smp_user_id', 'id');
    }

    public function smpQuiz(): BelongsTo
    {
        return $this->belongsTo(SmpQuiz::class, 'smp_quiz_id', 'id');
    }
}
