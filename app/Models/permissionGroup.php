<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permissionGroup extends Model
{
    use HasFactory;
    protected $table= 'permission__groups';
    protected $fillable = [
        'group_id',
        'permission_id'
    ];
}
