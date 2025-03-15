<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmaQuiz extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'external_id',
        'number',
        'name',
        'content',
        'is_active',
        'start_date',
        'end_date',
    ];

    public function smaQuestions(): HasMany
    {
        return $this->hasMany(SmaQuestion::class, 'sma_quiz_id', 'id');
    }

    public function smaResults(): HasMany
    {
        return $this->hasMany(SmaResult::class, 'sma_quiz_id', 'id');
    }

    public function smaScores(): HasMany
    {
        return $this->hasMany(SmaScore::class, 'sma_quiz_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $maxNumber = SmaQuiz::withTrashed()->max('number'); // Termasuk yang soft deleted
            $post->number = $maxNumber ? $maxNumber + 1 : 1; // Tambah 1 atau mulai dari 1
        });
    }


}
