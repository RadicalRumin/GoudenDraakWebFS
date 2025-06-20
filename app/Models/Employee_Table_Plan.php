<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_Table_Plan extends Model
{
    public $incrementing = true;
    protected $table = "employee_table_plan";
    protected $fillable = ['id','employee_id','table_id','date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}