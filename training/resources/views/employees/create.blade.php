<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	</head>
	<body>
		<h1>Create Employee</h1>
		<a href="{{ URL('/employees') }}"> Back</a>
        <form method="POST" action="{{ URL('/employees') }}">
            {{ csrf_field() }}
            <label>First Name *</label>
            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
            <label>Last Name *</label>
            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required autofocus>
            <button type="submit">
                Create
            </button>
        </form>
    </body>
</html>