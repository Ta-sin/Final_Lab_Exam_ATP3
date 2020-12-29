<!DOCTYPE html>
<html>
<head>
	<title>User list page</title>
</head>
<body>

	<h3>All User</h3>
	<a href="{{route('home.index')}}">Back</a> |
	<a href="/logout">logout</a>

	<br>
	<br>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>E NAME</td>
			<td>Contact</td>
			<td>User Name</td>
			<td>Action</td>
			
		</tr>

		@for($i=0; $i < count($users); $i++)
		<tr>
			<td>{{$users[$i]['id']}}</td>
			<td>{{$users[$i]['ename']}}</td>
			<td>{{$users[$i]['contact']}}</td>
			<td>{{$users[$i]['username']}}</td>
			<td>
				
				<a href="{{route('home.edit', $users[$i]['id'])}}">Edit</a> |
				<a href="/delete/{{$users[$i]['id']}}">Delete</a> 
			</td>
		</tr>
		@endfor
	</table>

</body>
</html>