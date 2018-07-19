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
        <p>
        <h2>Tasks</h2>
        <ol>
        @foreach($employee->tasks as $task)
            <li> {{ $task->subject }} </li>
        @endforeach
        </ol>
        </p>
    </body>
</html>