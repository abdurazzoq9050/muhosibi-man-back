<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Notifications extends Model
{
    use HasFactory; 

    protected $fillable = [
        'subject',
        'description',
        'user',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    // Mutator for 'subject'
    public function setSubjectAttribute($value)
    {
        $this->attributes['subject'] = Crypt::encryptString($value);
    }

    // Accessor for 'subject'
    public function getSubjectAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    // Mutator for 'description'
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Crypt::encryptString($value);
    }

    // Accessor for 'description'
    public function getDescriptionAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }
}
