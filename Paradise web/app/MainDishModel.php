<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainDishModel extends Model
{
    protected $table = 'main_dish';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id', 'main_dish_name', 'price', 'created_at', 'updated_at'
    ];
}
