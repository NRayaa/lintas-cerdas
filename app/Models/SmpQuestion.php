<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SmpQuestion extends Model
{
    protected $fillable = [
        'external_id',
        'smp_quiz_id',
        'name',
        'a',
        'b',
        'c',
        'd',
        'answer',
    ];

    public function smpQuiz():BelongsTo
    {
        return $this->belongsTo(SmpQuiz::class, 'smp_quiz_id', 'id');
    }

    public function smpResults(): HasMany
    {
        return $this->hasMany(SmpResult::class, 'smp_question_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($imgSub) {
            $imgSub->external_id = (SmpQuestion::max('external_id') ?? 0) + 1;
        });
    }
}
