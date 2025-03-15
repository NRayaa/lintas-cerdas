<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class SdUser extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'email',
        'external_id',
        'password'
    ];

    public function sdResults(): HasMany
    {
        return $this->hasMany(SdResult::class, 'sd_user_id', 'id');
    }

    public function sdScores(): HasMany
    {
        return $this->hasMany(SdScore::class, 'sd_user_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($sdUser) {
            $user = User::create([
                'id' => $sdUser->external_id,
                'name' => $sdUser->name,
                'email' => $sdUser->email,
                'type' => 'sd',
                'password' => $sdUser->password
            ]);

            // dd($user);
        });

        static::updating(function ($sdUser) {
            if ($sdUser->external_id) {
                $user = User::find($sdUser->external_id);
                if ($user) {
                    $user->update([
                        'name' => $sdUser->name,
                        'email' => $sdUser->email,
                    ]);

                    if ($sdUser->password) {
                        $user->update([
                            'password' => Hash::make($sdUser->password),
                        ]);
                    }
                }
            }
        });

        static::deleting(function ($sdUser) {
            if ($sdUser->external_id) {
                User::destroy($sdUser->external_id);
            }
        });
    }
}
