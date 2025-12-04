<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeWorkingExperience extends Model
{
    use SoftDeletes;

    protected $table = 'employee_working_experience_table';

    protected $fillable = [
        'employee_id',
        'company_name',
        'job_position',
        'start_date',
        'end_date',
    ];

    public function personal()
    {
        return $this->belongsTo(EmployeePersonalData::class, 'employee_id', 'employee_id');
    }
}
