<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_size extends Model
{
    use HasFactory;
    protected $table ='products_size';
    protected $fillable = ['product_id','size','price'];
    public $timestamps=false;
}
