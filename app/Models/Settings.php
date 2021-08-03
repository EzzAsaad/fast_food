<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameAr',
        'nameEn',
        'email',
        'phone',
        'phone2',
        'ArDescription',
        'EnDescription',
        'ArMetaDescription',
        'EnMetaDescription',
        'ArMetaKeywords',
        'EnMetaKeywords',
        'logo'
    ];
}
