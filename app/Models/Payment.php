<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['employee_id','employee_name','full_salary','discounts','final_salary','date','time'];

    public function employee(){
           return $this->belongsTo(Employee::class);
    }
}
