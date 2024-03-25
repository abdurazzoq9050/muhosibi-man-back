<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'details',
        'total',
        'total_tax',
        'sender', //
        'taker', //
        'status',
        'payment', //
    ];

    protected $casts = [
        'details' => 'json',
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

    public function getDetailsAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    public function setDetailsAttribute($value)
    {
        $this->attributes['details'] = Crypt::encryptString($value);
    }

    
    public function getTotalAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = Crypt::encryptString($value);
    }

    public function getTotalTaxAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return null;
        }
    }

   
    public function setTotalTaxAttribute($value)
    {
        $this->attributes['total_tax'] = Crypt::encryptString($value);
    }
}
