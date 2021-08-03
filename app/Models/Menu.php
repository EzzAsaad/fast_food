<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table= 'menus';
    protected $fillable = [
        'name_ar',
        'name_en',
        'menu_id',
        'link',
        'status',
    ];
}
