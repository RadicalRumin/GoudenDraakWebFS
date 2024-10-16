<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    public function Customers(){
        return $this->hasMany(Customer::class);
    }
    public function Orders(){
        return $this->hasMany(Order::class);
    }
}
