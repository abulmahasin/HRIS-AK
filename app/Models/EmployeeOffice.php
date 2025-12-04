<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeOffice extends Model
{
    use SoftDeletes;

    protected $table = 'employee_office_table';

    protected $fillable = [
        'employee_id',
        'organization_id',
        'job_position_id',
        'job_level_id',
        'employment_status_id',
        'grade_id',
        'branch',
        'join_date',
        'approval_line',
    ];

    public function personal()
    {
        return $this->belongsTo(EmployeePersonalData::class, 'employee_id', 'employee_id');
    }

    // relasi ke approval (atasan)
    public function approval()
    {
        return $this->belongsTo(EmployeePersonalData::class, 'approval_line', 'id');
    }
}
