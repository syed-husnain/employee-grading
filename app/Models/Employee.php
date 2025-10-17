<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
  use HasFactory;
  protected $guarded = [];


  public function certificates()
  {
    return $this->hasMany(EmployeeCertificate::class);
  }
}
