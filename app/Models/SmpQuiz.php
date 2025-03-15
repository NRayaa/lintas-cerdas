<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmpQuiz extends Model
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

    public function smpQuestions(): HasMany
    {
        return $this->hasMany(SmpQuestion::class, 'smp_quiz_id', 'id');
    }

    public function smpResults(): HasMany
    {
        return $this->hasMany(SmpResult::class, 'smp_quiz_id', 'id');
    }

    public function smpScores(): HasMany
    {
        return $this->hasMany(SmpScore::class, 'smp_quiz_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $maxNumber = SmpQuiz::withTrashed()->max('number'); // Termasuk yang soft deleted
            $post->number = $maxNumber ? $maxNumber + 1 : 1; // Tambah 1 atau mulai dari 1
        });
    }
}
