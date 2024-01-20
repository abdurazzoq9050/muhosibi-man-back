<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documents_type extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'fields',
    ]; 
}
