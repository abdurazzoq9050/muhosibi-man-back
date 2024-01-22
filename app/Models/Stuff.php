<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'birthday',
        'gender',
        'citizenship',
        'contract_type',
        'position',
        'begin_date',
        'experience_days',
        'unique_number',
        'passport_details',
        'legal_address',
        'physic_address',
        'inn',
        'payment_method',
    ];

    protected $casts = [
        'birthday' => 'date',
        'begin_date' => 'date',
        'experience_days' => 'date',
        'passport_details' => 'json',
    ];
}
