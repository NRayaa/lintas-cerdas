<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmaImgSub extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'external_id',
        'img',
        'name',
        'sd_sub_subject_id',
        'content'
    ];

    public function sdSubSubject():BelongsTo
    {
        return $this->belongsTo(SmaSubSubject::class, 'sd_sub_subject_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($imgSub) {
            $imgSub->external_id = (SmaImgSub::max('external_id') ?? 0) + 1;
        });
    }
}
