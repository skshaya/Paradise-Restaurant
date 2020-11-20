<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
    	'id', 'main_dish', 'side_dish', 'amount', 'created_at', 'updated_at'
    ];
}
