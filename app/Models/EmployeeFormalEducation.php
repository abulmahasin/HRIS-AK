<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeFormalEducation extends Model
{
    use SoftDeletes;

    protected $table = 'employee_formal_education_table';

    protected $fillable = [
        'employee_id',
        'degree_id',
        'institutions',
        'major',
        'score',
        'start_date',
        'end_date',
        'document',
        'activity',
    ];

    public function personal()
    {
        return $this->belongsTo(EmployeePersonalData::class, 'employee_id', 'employee_id');
    }
}
