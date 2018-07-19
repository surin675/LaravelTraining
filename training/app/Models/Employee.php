<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task', 'employee_tasks', 'employee_id', 'task_id');
    }
}
