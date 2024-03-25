<?php

namespace App\Models;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'phone',
        'password',
        'code_phrase',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];


    public function devices(){
        return $this->belongsToMany(Devices::class,'user_devices', 'user','device');
    }

    public function organizations()
    {
        return $this->hasMany(Organization::class, 'owner_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'owner_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notifications::class, 'user');
    }


    // username
    public function getUsernameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = Crypt::encryptString($value);
    }


    // email
    public function getEmailAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = Crypt::encryptString($value);
    }

    // code phrases
    public function getCodePhraseAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    public function setCodePhraseAttribute($value)
    {
        $this->attributes['code_phrase'] = Crypt::encryptString($value);
    }
}
