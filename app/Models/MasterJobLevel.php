<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterJobLevel extends Model
{
    use SoftDeletes;

    protected $table = 'master_job_level';

    protected $fillable = [
        'job_level_name',
        'information',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'job_level_id');
    }
}
