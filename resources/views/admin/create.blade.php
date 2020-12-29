<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
</head>
<body>
	<a href="{{route('home.index')}}">Back</a> |
	<a href="/logout">logout</a>
	<br>
	
		<form method="post" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<fieldset>
				<legend>Create User</legend>
			<table>
				<tr>
					<td>Employee Name</td>
					<td><input type="text" name="ename" value="{{old('ename')}}"></td>
				</tr>
				<tr>
					<td>Contact</td>
					<td><input type="text" name="contact" value="{{old('contact')}}"></td>
				</tr>
				<tr>
					<td>User Name</td>
					<td><input type="text" name="name" value="{{old('name')}}"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="pass" value="{{old('pass')}}"></td>
				</tr>
				
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Create"></td>
				</tr>
			</table>
			</fieldset>
		</form>

		@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
</body>
</html>