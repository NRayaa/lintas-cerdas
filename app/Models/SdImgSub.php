<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SdImgSub extends Model
{
    // use SoftDeletes;

    protected $fillable = [
        'external_id',
        'img',
        'name',
        'sd_sub_subject_id',
        'content'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($imgSub) {
            $imgSub->external_id = (SdImgSub::max('external_id') ?? 0) + 1;
        });
    }

    public function sdSubSubject():BelongsTo
    {
        return $this->belongsTo(SdSubSubject::class, 'sd_sub_subject_id', 'id');
    }
}
