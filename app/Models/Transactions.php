<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'details',
        'total',
        'total_tax',
        'sender',
        'taker',
        'status',
        'payment',
    ];

    protected $casts = [
        'detalis' => 'json',
    ];

    public function taker()
    {
        return $this->belongsTo(Counterparty::class, 'taker');
    }
    
    public function sender()
    {
        return $this->belongsTo(Counterparty::class, 'sender');
    }

    
    public function paymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class, 'payment');
    }


}
