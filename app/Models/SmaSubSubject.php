<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmaSubSubject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'external_id',
        'sma_subject_id',
        'name',
        'content',
        'number',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $maxNumber = SmaSubSubject::withTrashed()->max('number'); // Termasuk yang soft deleted
            $post->number = $maxNumber ? $maxNumber + 1 : 1; // Tambah 1 atau mulai dari 1
        });
    }

    public function smaSubject():BelongsTo
    {
        return $this->belongsTo(SmaSubject::class, 'sma_subject_id', 'id');
    }

    public function smaImgSubs():HasMany
    {
        return $this->hasMany(SmaImgSub::class, 'sma_sub_subject_id', 'id');
    }
}
