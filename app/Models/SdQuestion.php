<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SdQuestion extends Model
{
    protected $fillable = [
        'external_id',
        'sd_quiz_id',
        'name',
        'a',
        'b',
        'c',
        'd',
        'answer',
    ];

    public function sdQuiz():BelongsTo
    {
        return $this->belongsTo(SdQuiz::class, 'sd_quiz_id', 'id');
    }

    public function sdResults(): HasMany
    {
        return $this->hasMany(SdResult::class, 'sd_question_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($imgSub) {
            $imgSub->external_id = (SdQuestion::max('external_id') ?? 0) + 1;
        });
    }

}
