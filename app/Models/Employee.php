<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // Relation with employee table
    public function company()
{
    return $this->belongsTo(Company::class);
}
protected $fillable = [
      
    'first_name',
    'last_name',
    'email',
    'phone',
    'company_id',
];
}
