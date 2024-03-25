<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Devices extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ip',
        'location',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_devices', 'user', 'device');
    }

    // Mutator for 'name'
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Crypt::encryptString($value);
    }

    // Accessor for 'name'
    public function getNameAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Mutator for 'ip'
    public function setIpAttribute($value)
    {
        $this->attributes['ip'] = Crypt::encryptString($value);
    }

    // Accessor for 'ip'
    public function getIpAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Mutator for 'location'
    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = Crypt::encryptString($value);
    }

    // Accessor for 'location'
    public function getLocationAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }
}
