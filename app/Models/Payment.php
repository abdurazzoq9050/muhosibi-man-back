<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'date',
        'number',
        'payer_account',
        'beneficiary',
        'beneficiary_account',
        'beneficiary_inn',
        'beneficiary_kpp',
        'beneficiary_country',
        'beneficiary_city',
        'beneficiary_street',
        'beneficiary_bank_code',
        'currency_operation_code',
        'budget_organization_code',
        'income_code',
        'region_code',
        'have_bank_intermediary',
        'payment_sum',
        'payment_purpose',
        'currency_agreement',
        'comment',
        'owner_id'
    ];

    public function owner()
    {
        return $this->belongsTo(Counterparty::class, 'owner_id');
    }

}
