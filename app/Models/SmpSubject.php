<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmpSubject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'external_id',
        'name',
        'content',
        'number',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $maxNumber = SmpSubject::withTrashed()->max('number'); // Termasuk yang soft deleted
            $post->number = $maxNumber ? $maxNumber + 1 : 1; // Tambah 1 atau mulai dari 1
        });
    }

    public function smpSubSubjects():HasMany
    {
        return $this->hasMany(SmpSubSubject::class, 'smp_subject_id', 'id');
    }
}
