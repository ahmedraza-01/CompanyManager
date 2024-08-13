<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    // Relation with employee table
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    protected $fillable = [
      
        'name',
        'email',
        'website',
        'logo',
        'employee_id',
        'user_id',
       
    ];
}
