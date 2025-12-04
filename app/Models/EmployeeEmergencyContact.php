<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeEmergencyContact extends Model
{
    use SoftDeletes;

    protected $table = 'employee_emergency_contact_table';

    protected $fillable = [
        'employee_id',
        'name',
        'relationship_id',
        'phone_number',
    ];

    public function personal()
    {
        return $this->belongsTo(EmployeePersonalData::class, 'employee_id', 'employee_id');
    }
}
