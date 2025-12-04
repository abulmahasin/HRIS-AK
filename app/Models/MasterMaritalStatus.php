<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterMaritalStatus extends Model
{
    use SoftDeletes;

    protected $table = 'master_marital_status';

    protected $fillable = [
        'marital_status_name',
        'information',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'marital_status_id');
    }
}
