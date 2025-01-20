<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $incrementing = true;
    protected $table = "employees";
    protected $fillable = [ 'id','first_name','last_name','email','phone'];
}
