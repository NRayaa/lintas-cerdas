<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SdSubSubject extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'external_id',
        'sd_subject_id',
        'name',
        'content',
        'number',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $maxNumber = SdSubSubject::withTrashed()->max('number'); // Termasuk yang soft deleted
            $post->number = $maxNumber ? $maxNumber + 1 : 1; // Tambah 1 atau mulai dari 1
        });
    }

    public function sdSubject():BelongsTo
    {
        return $this->belongsTo(SdSubject::class, 'sd_subject_id', 'id');
    }

    public function sdImgSubs():HasMany
    {
        return $this->hasMany(SdImgSub::class, 'sd_sub_subject_id', 'id');
    }
}
