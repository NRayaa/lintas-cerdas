<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmpGoal extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'content',
        'is_active',
        'external_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if ($model->is_active) {
                // Set semua entri lain menjadi tidak aktif
                static::where('id', '!=', $model->id)->update(['is_active' => false]);
            }
        });
    }
}
