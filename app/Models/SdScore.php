<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SdScore extends Model
{
    use HasFactory;

    protected $fillable = ['sd_user_id', 'sd_quiz_id', 'score'];


    public function sdUser(): BelongsTo
    {
        return $this->belongsTo(SdUser::class, 'sd_user_id', 'id');
    }

    public function sdQuiz(): BelongsTo
    {
        return $this->belongsTo(SdQuiz::class, 'sd_quiz_id', 'id');
    }

}
