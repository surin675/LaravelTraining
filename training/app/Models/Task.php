<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function employees()
    {
        return $this->belongsToMany('App\Models\Employee', 'employee_tasks', 'task_id', 'employee_id');
    }
}
