<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmpSubSubject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'external_id',
        'smp_subject_id',
        'name',
        'content',
        'number',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $maxNumber = SmpSubSubject::withTrashed()->max('number'); // Termasuk yang soft deleted
            $post->number = $maxNumber ? $maxNumber + 1 : 1; // Tambah 1 atau mulai dari 1
        });
    }

    public function smpSubject():BelongsTo
    {
        return $this->belongsTo(SmpSubject::class, 'smp_subject_id', 'id');
    }

    public function smpImgSubs():HasMany
    {
        return $this->hasMany(SmpImgSub::class, 'smp_sub_subject_id', 'id');
    }
}
