<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Employee extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','function','registration_id','turn'];

    public function payments(){
           return $this->hasMany(Payment::class);
    }
}
