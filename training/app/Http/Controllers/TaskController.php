<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use App\Models\EmployeeTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all()->sortByDesc('created_at');
		
        return View('tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
		$task->subject = $request->subject;
		$task->detail = $request->detail;
        $task->save();
        
        // back to index
        return redirect('tasks')->with('message', 'Successfully created task!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return View('tasks.show')
            ->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return View('tasks.edit')
            ->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
		$task->subject = $request->subject;
		$task->detail = $request->detail;
        $task->save();
        return redirect('tasks')->with('message', 'Successfully updated task!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = task::findOrFail($id);
        $task->delete();
 
        return redirect('tasks')->with('message', 'Successfully deleted the task!');
    }

    public function assignTaskToEmployee($id)
    {
       $task = Task::findOrFail($id);
       $employees = Employee::all()->sortBy('first_name');
        return view('tasks.add_task',[
                'task' => $task,
                'employees' => $employees
            ]);
    }

    public function storeEmployeeTask(Request $request)
    {
        $employeeTask = new EmployeeTask;
        $employeeTask->employee_id = $request->employee_id;
        $employeeTask->task_id = $request->task_id;
        $employeeTask->save();
        return redirect('tasks')->with('message', 'Successfully Add Employee Task!');
    }

}
