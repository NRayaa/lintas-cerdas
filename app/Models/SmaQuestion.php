<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SmaQuestion extends Model
{
    protected $fillable = [
        'external_id',
        'sma_quiz_id',
        'name',
        'a',
        'b',
        'c',
        'd',
        'answer',
    ];

    public function smaQuiz():BelongsTo
    {
        return $this->belongsTo(SmaQuiz::class, 'sma_quiz_id', 'id');
    }

    public function smaResults(): HasMany
    {
        return $this->hasMany(SmaResult::class, 'sma_question_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($imgSub) {
            $imgSub->external_id = (SmaQuestion::max('external_id') ?? 0) + 1;
        });
    }
}
