<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Group;
class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'employees';


    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function area()
    {
        return $this->hasOne(Area::class);
    }
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function checkAuthority($ControllerName){
        $res = new \stdClass();
        $res->result = 0;
        $data = [];
        $res->data = [];
        foreach(auth()->user()->group->permissions as $p){
            if($p->ControllerName == $ControllerName && $p->status == 1)
            {
                $res->result = 1;
            }
        }
        if($res->result == 1)
        {
            foreach(auth()->user()->group->permissions as $p){
                if($p->ControllerName == $ControllerName && $p->status == 1)
                {
                    foreach(auth()->user()->group->permissions as $p)
                    {
                        $data[] = $p->MethodName;
                    }
                }
            }
            $res->data = $data;

        }
        return $res;


    }
}
