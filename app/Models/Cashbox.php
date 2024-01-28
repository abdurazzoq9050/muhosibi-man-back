<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashbox extends Model
{
    use HasFactory; 

    protected $fillable = [
        'title',
        'balance',
        'organization_id',
        'status',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

}
