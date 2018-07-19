<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
	</head>
	<body>
		<h1>Create Employee</h1>
		<a href="{{ URL('/employees') }}"> Back</a>
        <form method="POST" action="{{ route('employees.update', $employee->id) }}">
            {{ csrf_field() }}
			{{ method_field('PUT') }}
            <label>First Name *</label>
            <input id="first_name" type="text" name="first_name" value="{{ $employee->first_name }}" required autofocus>
            <br/>
            <label>Last Name *</label>
            <input id="last_name" type="text" name="last_name" value="{{ $employee->last_name }}" required autofocus>
            <br/>
            <button type="submit">
                Update
            </button>
        </form>
    </body>
</html>