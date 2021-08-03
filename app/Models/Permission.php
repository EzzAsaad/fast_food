<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use App\Models\Group;
class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'breifName', 'ControllerName', 'MethodName', 'status'];
    public static function getAllControllers()
    {
        $controllers = [];
        $data = [];
        foreach (Route::getRoutes()->getRoutes() as $route)
        {
            $action = $route->getAction();

            if (array_key_exists('controller', $action))
            {
                $controllers[] = $action['controller'];
            }
        }
        foreach($controllers as $c)
        {
            $res = explode('\\', $c);
            if(!in_array(end($res), $data))
            {
                $data[] = end($res);

            }
            
        }
        return $data;
    }
    public static function getControllersNames()
    {
        $data= [];
        $controllers = Permission::getAllControllers();
        foreach($controllers as $c)
        {
            if (strpos($c , '@') !== false)
            {
                $line = explode('@', $c);
                if(!in_array($line[0] , $data)){
                    $data[] = $line[0];
                }
            }
        }
        return $data;
    }
    public static function getMethodsByControllerName($name)
    {
        $controllers = Permission::getAllControllers();
        $data = [];
        $a = 'How are you?';
        if (strpos($a, 'are') !== false) {
        }
        foreach($controllers as $c)
        {
            if(strpos($c, $name) !== false)
            {
                if(strpos($c,'@') !== false)
                {
                    $line = explode('@', $c);
                    $li = end($line);
                    $data[] = $li;
                    $li = [];
                }
            }
        }

        return json_encode($data);
    }
    public static function AllMethods()
    {
        $controllers = Permission::getAllControllers();
        $data = [];
        $a = 'How are you?';
        if (strpos($a, 'are') !== false) {
        }
        foreach($controllers as $c)
        {

            if(strpos($c,'@') !== false)
            {
                $line = explode('@', $c);
                $li = end($line);
                $data[] = $li;
                $li = [];
            }
        
        }

        return json_encode($data);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'permission__groups');
    }

}
