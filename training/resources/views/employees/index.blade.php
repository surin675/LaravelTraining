<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
	</head>
	<body>
		<h1>Employees</h1>
		<a href="{{ URL('/employees/create') }}" > Create Employee</a>
		<table  border="1">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Created time</th>
					<th>Actions</th>
					<th>Add Task</th>
				</tr>
			</thead>
			<tbody>
			@foreach($employees as $key => $value)
				<tr>
					<td>{{ $value->first_name }}</td>
					<td>{{ $value->last_name }}</td>
					<td>{{ $value->created_at }}</td>
					<td>
						<form method="POST" action="{{ URL('employees/'.$value->id) }}">
						{{ csrf_field() }}
			            {{ method_field('DELETE') }}
							<a href="{{ URL::to('employees/' . $value->id) }}">Show</a>
							<a href="{{ URL::to('employees/' . $value->id . '/edit') }}">Edit</a>
							
							<button type="submit">Delete</button>
						</form>
					</td>
					<td>
						<a href="{{ URL::to('employees/' . $value->id.'/tasks') }}">Add Task</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<a href="{{ URL('/tasks') }}" > View Tasks</a>
    </body>
</html>