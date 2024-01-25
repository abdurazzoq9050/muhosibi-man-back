<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory; 

    protected $fillable = [
        'title',
        'description',
    ];

    public function organizations(){
        return $this->belongsToMany(Organization::class);
    }

}
