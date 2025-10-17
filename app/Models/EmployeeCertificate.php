<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeCertificate extends Model
{
  use HasFactory;

  protected $fillable = [
    'employee_id',
    'certificate_name',
    'file_path',
    'file_type',
    'uploaded_at',
  ];

  public function employee()
  {
    return $this->belongsTo(Employee::class);
  }
}
