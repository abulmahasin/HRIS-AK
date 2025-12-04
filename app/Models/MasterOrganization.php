<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterOrganization extends Model
{
    use SoftDeletes;

    protected $table = 'master_organization';

    protected $fillable = [
        'organization_name',
        'information',
    ];

    // Relasi ke Employee
    public function employees()
    {
        return $this->hasMany(Employee::class, 'organization_id');
    }
}
