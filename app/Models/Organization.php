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
        'type',
        'contacts',
        'status',
    ];

    protected $casts = [
        'contacts' => 'json',
    ];
}
