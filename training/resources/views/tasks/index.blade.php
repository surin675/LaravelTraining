<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	</head>
	<body>
		<h1>Tasks</h1>
        <div class="col-xs-12 col-md-6 col-lg-6">
			<a href="{{ URL('/tasks/create') }}"> Create Task</a>
		</div>
		<table  border="1">
			<thead>
				<tr>
					<th>Subject</th>
					<th>Detail</th>
					<th>Created time</th>
					<th>Actions</th>
					<th>Assign Employee</th>
				</tr>
			</thead>
			<tbody>
			@foreach($tasks as $key => $value)
				<tr>
					<td>{{ $value->subject }}</td>
					<td>{{ $value->detail }}</td>
					<td>{{ $value->created_at }}</td>
					<td>
						<form method="POST" action="{{ URL('tasks/'.$value->id) }}">
						{{ csrf_field() }}
			            {{ method_field('DELETE') }}
							<a href="{{ URL::to('tasks/' . $value->id) }}">Show</a>
							<a href="{{ URL::to('tasks/' . $value->id . '/edit') }}">Edit</a>
							<button type="submit">Delete</button>
						</form>
					</td>
					<td>
						<a href="{{ URL::to('tasks/' . $value->id.'/employees') }}">Assign Employee</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<a href="{{ URL('/employees') }}" > View Employees </a>
    </body>
</html>