<!DOCTYPE html>
<html>
<head>
	<title>Edit Page</title>
</head>
<body>
	<a href="{{route('home.index')}}">Back</a> |
	<a href="/logout">logout</a>
	<br>
	
		<form method="post" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<fieldset>
				<legend>Edit User</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="ename" value="{{$ename}}"></td>
				</tr>
				<tr>
					<td>Contact</td>
					<td><input type="text" name="contact" value="{{$contact}}"></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="{{$username}}"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pass" value="{{$password}}"></td>
				</tr>
				
				
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Update"></td>
				</tr>
			</table>
			</fieldset>
		</form>

		@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
</body>
</html>