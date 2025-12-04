<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeFamily extends Model
{
    use SoftDeletes;

    protected $table = 'employee_family_table';

    protected $fillable = [
        'employee_id',
        'full_name',
        'relationship_id',
        'birth_date',
        'address',
        'is_dependent',
    ];

    public function personal()
    {
        return $this->belongsTo(EmployeePersonalData::class, 'employee_id', 'employee_id');
    }
}
