<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterEmployeeStatus extends Model
{
    use SoftDeletes;

    protected $table = 'master_employee_status';

    protected $fillable = [
        'employee_status_name',
        'information',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'employee_status_id');
    }
}
