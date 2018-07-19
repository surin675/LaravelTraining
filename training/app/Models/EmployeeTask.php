<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeTask extends Model
{
    public $timestamps = false;

    public function employees()
    {
        return $this->belongsTo('App\Models\Employee','employee_id')->withTrashed();
    }
    public function tasks()
    {
        return $this->belongsTo('App\Models\Task','task_id')->withTrashed();
    }
}
