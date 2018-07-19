<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
	</head>
	<body>
		<h1>Create Employee</h1>
		<a href="{{ URL('/tasks') }}" class="btn btn-default "> Back</a>
        <form method="POST" action="{{ route('tasks.update', $task->id) }}">
            {{ csrf_field() }}
			{{ method_field('PUT') }}
            <label>First Name *</label>
            <input id="subject" type="text" name="subject" value="{{ $task->subject }}" required autofocus>
            <br/>
            <label>Detail</label><br/>
            <textarea rows="10" cols="30" id="detail" name="detail">
                {{ $task->detail }}
            </textarea>
            <br/>
            <button type="submit"> Update </button>
        </form>
    </body>
</html>