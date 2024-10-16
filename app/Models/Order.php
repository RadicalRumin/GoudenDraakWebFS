<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['table_id'];
    public function Table(){
        return $this->belongsTo(Table::class);
    }
    public function Order_Dish(){
        return $this->hasMany(Order_Dish::class);
    }
}
