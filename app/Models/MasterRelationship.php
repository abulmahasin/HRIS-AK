<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterRelationship extends Model
{
    use SoftDeletes;

    protected $table = 'master_relationship';

    protected $fillable = [
        'relationship_name',
        'information',
    ];

    public function families()
    {
        return $this->hasMany(EmployeeFamily::class, 'relationship_id');
    }

    public function emergencyContacts()
    {
        return $this->hasMany(EmployeeEmergencyContact::class, 'relationship_id');
    }
}
