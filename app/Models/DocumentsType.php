<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentsType extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'metatag',
    ];

    protected $casts = [
        'metatag' => 'json',
    ];
}   
