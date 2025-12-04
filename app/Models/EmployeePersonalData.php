<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeePersonalData extends Model
{
    use SoftDeletes;

    protected $table = 'employee_personal_data_table';

    protected $fillable = [
        'employee_id',
        'phone_number',
        'email',
        'phone_number_2',
        'place_of_birth',
        'gender',
        'marital_status_id',
        'blood_type',
        'religion',
    ];

    // RELATIONS
    public function identity()
    {
        return $this->hasOne(EmployeeIdentifyAndAddress::class, 'employee_id', 'employee_id');
    }

    public function office()
    {
        return $this->hasOne(EmployeeOffice::class, 'employee_id', 'employee_id');
    }

    public function educationsFormal()
    {
        return $this->hasMany(EmployeeFormalEducation::class, 'employee_id', 'employee_id');
    }

    public function educationsNonFormal()
    {
        return $this->hasMany(EmployeeNonFormalEducation::class, 'employee_id', 'employee_id');
    }

    public function experiences()
    {
        return $this->hasMany(EmployeeWorkingExperience::class, 'employee_id', 'employee_id');
    }

    public function families()
    {
        return $this->hasMany(EmployeeFamily::class, 'employee_id', 'employee_id');
    }

    public function emergencyContacts()
    {
        return $this->hasMany(EmployeeEmergencyContact::class, 'employee_id', 'employee_id');
    }
}
