<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stuff extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'patronimyc',
        'birthday',
        'gender',
        'citizenship',
        'contract_type',
        'position',
        'begin_date',
        'legal_address',
        'physic_address', 
        'site',
        'group',
        'inn',
        'kpp',
        'contacts',
        'for_sign_docs',
        'passport_details', 
        'comment',
        'payment_account',
    ];
}
