<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SdQuiz extends Model
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

    public function sdQuestions(): HasMany
    {
        return $this->hasMany(SdQuestion::class, 'sd_quiz_id', 'id');
    }

    public function sdResults(): HasMany
    {
        return $this->hasMany(SdResult::class, 'sd_quiz_id', 'id');
    }

    public function sdScores(): HasMany
    {
        return $this->hasMany(SdScore::class, 'sd_quiz_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $maxNumber = SdQuiz::withTrashed()->max('number'); // Termasuk yang soft deleted
            $post->number = $maxNumber ? $maxNumber + 1 : 1; // Tambah 1 atau mulai dari 1
        });
    }
}
