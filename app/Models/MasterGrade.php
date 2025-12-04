<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterGrade extends Model
{
    use SoftDeletes;

    protected $table = 'master_grade';

    protected $fillable = [
        'grade_name',
        'information',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'grade_id');
    }
}
