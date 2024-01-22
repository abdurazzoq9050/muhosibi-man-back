<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'detalis',
        'total',
        'total_tax',
        'status',
    ];

    protected $casts = [
        'detalis' => 'json',
    ];
}
