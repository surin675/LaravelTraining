<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	</head>
	<body>
		<h1>Employee</h1>
		<a href="{{ URL('/employees') }}"> Back</a>
        <p> First Name : {{ $employee->first_name }} </p>
        <p> Last Name : {{ $employee->last_name }} </p>
		<form method="POST" action="{{ URL('employees/storeEmployeeTask') }}">
			{{ csrf_field() }}
            <input id="employee_id" name="employee_id" type="hidden" value="{{ $employee->id }}">
            <select id="task_id" name="task_id">
            @foreach($tasks as $key => $value)
                <option value="{{ $value->id }}">{{ $value->subject }}</option>
            @endforeach
            </select>
			<button type="submit">Save</button>
		</form>
    </body>
</html>