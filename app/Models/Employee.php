<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employees';

    protected $fillable = [
        'full_name',
        'employee_id',
        'branch',
        'job_position_id',
        'organization_id',
        'job_level_id',
        'employee_status_id',
        'grade_id',
        'marital_status_id',
        'photo',
    ];

    public function organization()
    {
        return $this->belongsTo(MasterOrganization::class);
    }

    public function jobPosition()
    {
        return $this->belongsTo(MasterJobPosition::class);
    }

    public function jobLevel()
    {
        return $this->belongsTo(MasterJobLevel::class);
    }

    public function employeeStatus()
    {
        return $this->belongsTo(MasterEmployeeStatus::class);
    }

    public function grade()
    {
        return $this->belongsTo(MasterGrade::class);
    }

    public function maritalStatus()
    {
        return $this->belongsTo(MasterMaritalStatus::class);
    }
}
