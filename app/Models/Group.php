<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Employee;
use App\Models\Permission;
class Group extends Model
{
    use HasFactory;
    protected $table="groups";
    protected $fillable = [
        'name',
        'description',
        'status'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function permissions()
    {
        return $this->belongstoMany(Permission::class, 'permission__groups' );
    }
}
