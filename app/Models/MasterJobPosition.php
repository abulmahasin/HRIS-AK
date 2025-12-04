<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterJobPosition extends Model
{
    use SoftDeletes;

    protected $table = 'master_job_position';

    protected $fillable = [
        'job_position_name',
        'information',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_position_id');
    }
}
