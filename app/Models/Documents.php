<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    use HasFactory; 
    protected $fillable = [
        'title',
        'template',
        'metatag',
        'doc_type',
        'with_sign_seal',
        'public',
        'sum',
    ];

    protected $casts = [
        'metatag' => 'json',
        'with_sign_seal' => 'boolean',
        'public' => 'boolean',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentsType::class, 'doc_type');
    }
    

}
