<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
</head>
<body>
	<form action="" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}">

	Are you sure want to delete this Employee??<br>
	<input type="submit" name="submit" value="Update">
	</form>
</body>
</html>