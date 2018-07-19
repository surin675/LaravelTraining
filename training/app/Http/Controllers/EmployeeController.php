<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use App\Models\EmployeeTask;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all()->sortByDesc('created_at');
		
        return View('employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = new Employee;
		$employee->first_name = $request->first_name;
		$employee->last_name = $request->last_name;
        $employee->save();
        
        // back to index
        return redirect('employees')->with('message', 'Successfully created employee!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return View('employees.show')
            ->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return View('employees.edit')
            ->with('employee', $employee);
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
        $employee = Employee::findOrFail($id);
		$employee->first_name = $request->first_name;
		$employee->last_name = $request->last_name;
        $employee->save();
        return redirect('employees')->with('message', 'Successfully updated employee!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
 
        return redirect('employees')->with('message', 'Successfully deleted the employee!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addEmployeeTask($id)
    {
        $employee = Employee::findOrFail($id);
        $tasks = Task::all()->sortBy('subject');
        return view('employees.add_task',[
                'employee' => $employee,
                'tasks' => $tasks
            ]);
    }

    
    public function storeEmployeeTask(Request $request)
    {
        $employeeTask = new EmployeeTask;
        $employeeTask->employee_id = $request->employee_id;
        $employeeTask->task_id = $request->task_id;
        $employeeTask->save();
        return redirect('employees')->with('message', 'Successfully Add Employee Task!');
    }

}
