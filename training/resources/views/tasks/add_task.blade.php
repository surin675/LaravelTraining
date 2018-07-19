<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	</head>
	<body>
		<h1>Task to Employee</h1>
		<a href="{{ URL('/tasks') }}"> Back</a>
        <p> Subject : {{ $task->subject }} </p>
        <p> Detail : {{ $task->detail }} </p>
		<form method="POST" action="{{ URL('tasks/storeEmployeeTask') }}">
			{{ csrf_field() }}
            <input id="task_id" name="task_id" type="hidden" value="{{ $task->id }}">
            <select id="employee_id" name="employee_id">
            @foreach($employees as $key => $value)
                <option value="{{ $value->id }}">{{ $value->first_name }}</option>
            @endforeach
            </select>
			<button type="submit">Save</button>
		</form>
    </body>
</html>