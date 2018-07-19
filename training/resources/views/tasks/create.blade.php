<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	</head>
	<body>
		<h1>Create Task</h1>
		<a href="{{ URL('/tasks') }}"> Back</a>
        <form method="POST" action="{{ URL('/tasks') }}">
            {{ csrf_field() }}
            <label>Subject *</label>
            <input id="subject" type="text" name="subject" value="{{ old('subject') }}" required autofocus>
            <br/>
            <label>Detail</label><br/>
            <textarea rows="10" cols="30" id="detail" name="detail">
                {{ old('detail') }}
            </textarea>
            <br/>
            <button type="submit">
                Create
            </button>
        </form>
    </body>
</html>