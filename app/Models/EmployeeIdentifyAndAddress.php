<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeIdentifyAndAddress extends Model
{
    use SoftDeletes;

    protected $table = 'employee_identify_and_address_table';

    protected $fillable = [
        'employee_id',
        'nik',
        'npwp',
        'postal_code',
        'card_address',
        'residential_address',
    ];

    public function personal()
    {
        return $this->belongsTo(EmployeePersonalData::class, 'employee_id', 'employee_id');
    }
}
