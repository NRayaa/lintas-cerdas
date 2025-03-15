<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class SmaUser extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'email', 'external_id', 'password'
    ];

    public function smaResults(): HasMany
    {
        return $this->hasMany(SmaResult::class, 'sma_user_id', 'id');
    }

    public function smaScores(): HasMany
    {
        return $this->hasMany(SmaScore::class, 'sma_user_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($smaUser) {
            $user = User::create([
                'id' => $smaUser->external_id,
                'name' => $smaUser->name,
                'email' => $smaUser->email,
                'type' => 'sma',
                'password' => $smaUser->password
            ]);

            // dd($user);
        });

        static::updating(function ($smaUser) {
            if ($smaUser->external_id) {
                $user = User::find($smaUser->external_id);
                if ($user) {
                    $user->update([
                        'name' => $smaUser->name,
                        'email' => $smaUser->email,
                    ]);

                    if ($smaUser->password) {
                        $user->update([
                            'password' => Hash::make($smaUser->password),
                        ]);
                    }
                }
            }
        });

        static::deleting(function ($smaUser) {
            if ($smaUser->external_id) {
                User::destroy($smaUser->external_id);
            }
        });
    }

}
