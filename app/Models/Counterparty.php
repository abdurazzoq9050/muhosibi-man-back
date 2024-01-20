<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counterparty extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name',
        'legal_address',
        'physic_address', 
        'site',
        'group',
        'inn',
        'kpp',
        'contacts',
        'for_sign_doc',
        'passport_details',
        'comment',
        'payment_account',
    ];
}
