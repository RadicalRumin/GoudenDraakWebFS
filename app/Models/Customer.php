<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['age','deluxe','table_id'];
    public function table(){
        return $this->belongsTo(Table::class);
    }
}
