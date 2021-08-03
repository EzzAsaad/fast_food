<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_Drivers extends Model
{
    use HasFactory;
    protected $table='orders_drivers';
    protected $fillable = ['order_id','driver_id'];
}
