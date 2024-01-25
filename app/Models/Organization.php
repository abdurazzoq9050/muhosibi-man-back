<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;  

    protected $fillable = [
        'title',
        'email',
        'phone',
        'inn',
        'kpp',
        'tax_system',
        'legal_address',
        'physic_address',
        'owner_id',
        'type',
        'contacts',
        'status',
    ];

    protected $casts = [
        'contacts' => 'json',
    ];

    public function activities(){
        return $this->belongsToMany(Activities::class, 'organization_activity', 'organization','activity');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function cashbox()
    {
        return $this->hasMany(Cashbox::class, 'organization');
    }


}
