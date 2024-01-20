<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        // 'doc_type',
        'fields',
        'source',
        'with_sign_seal', 
        'public',
        'sum',
    ];
}
