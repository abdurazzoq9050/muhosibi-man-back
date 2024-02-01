<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAccount extends Model 
{
    use HasFactory;

    protected $fillable = [
        'number',
        'BIC',
        'сorrespondent_account', 
        'comments',
        'status',
        'owner_id',
    ];

    protected $casts = [
        'number' => 'integer',
    ];

    public function owner()
    {
        return $this->belongsTo(Counterparty::class, 'owner_id');
    }
}
