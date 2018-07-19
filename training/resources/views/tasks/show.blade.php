<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	</head>
	<body>
		<h1>Task</h1>
		<a href="{{ URL('/tasks') }}"> Back</a>
        <p> Subject : {{ $task->subject }} </p>
        <p> Detail : {{ $task->detail }} </p>
        <h2>Employee</h2>
        <ol>
        @foreach($task->employees as $employee)
            <li> {{ $employee->first_name }} {{ $employee->last_name }} (ID: {{$employee->id}})</li>
        @endforeach
        </ol>
    </body>
</html>