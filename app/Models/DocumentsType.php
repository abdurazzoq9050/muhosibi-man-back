<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class DocumentsType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'metatag',
    ];

    protected $casts = [
        'metatag' => 'json',
    ];

    public function documents()
    {
        return $this->hasMany(Documents::class, 'doc_type');
    }

    // Accessor for 'title'
    public function getTitleAttribute($value)
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

    // Mutator for 'metatag'
    public function setMetatagAttribute($value)
    {
        $this->attributes['metatag'] = Crypt::encryptString($value);
    }

    // Accessor for 'metatag'
    public function getMetatagAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }
}
