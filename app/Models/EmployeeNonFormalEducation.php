<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeNonFormalEducation extends Model
{
    use SoftDeletes;

    protected $table = 'employee_non_formal_education_table';

    protected $fillable = [
        'employee_id',
        'education_name',
        'organizer',
        'start_date',
        'end_date',
        'expired_date',
        'fee',
        'document',
    ];

    public function personal()
    {
        return $this->belongsTo(EmployeePersonalData::class, 'employee_id', 'employee_id');
    }
}
