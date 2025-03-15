<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class SmpUser extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name', 'email', 'external_id', 'password', 'id'
    ];

    public function smpResults(): HasMany
    {
        return $this->hasMany(SmpResult::class, 'smp_user_id', 'id');
    }

    public function smpScores(): HasMany
    {
        return $this->hasMany(SmpScore::class, 'smp_user_id', 'id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($smpUser) {
            $user = User::create([
                'id' => $smpUser->external_id,
                'name' => $smpUser->name,
                'email' => $smpUser->email,
                'type' => 'smp',
                'password' => $smpUser->password
            ]);

            // dd($user);
        });

        static::updating(function ($smpUser) {
            if ($smpUser->external_id) {
                $user = User::find($smpUser->external_id);
                if ($user) {
                    $user->update([
                        'name' => $smpUser->name,
                        'email' => $smpUser->email,
                    ]);

                    if ($smpUser->password) {
                        $user->update([
                            'password' => Hash::make($smpUser->password),
                        ]);
                    }
                }
            }
        });

        static::deleting(function ($smpUser) {
            if ($smpUser->external_id) {
                User::destroy($smpUser->external_id);
            }
        });
    }
}
