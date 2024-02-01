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
        'inn',
        'kpp',
        'contacts',
        'for_sign_docs',
        'by_person',
        'passport_details',
        'comment',
        'payment_method',
    ];

    protected $casts = [
        'inn' => 'integer',
        'kpp' => 'integer',
        'contacts' => 'json',
        'for_sign_docs' => 'json',
        'by_person' => 'json',
        'passport_details' => 'json',
        'comment' => 'json',
    ];

    public function paymentAccount()
    {
        return $this->hasMany(PaymentAccount::class, 'owner_id');
    }

}
