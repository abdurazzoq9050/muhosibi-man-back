<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_account extends Model
{
    use HasFactory;
    protected $fillable = [
        'number', 
        'BIC',
        'correspondent_account', 
        'comments',
        'status',
    ];
}
