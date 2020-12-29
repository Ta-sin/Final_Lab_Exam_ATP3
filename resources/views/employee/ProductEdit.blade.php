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
				<legend>Edit Product</legend>
			<table>
				<tr>
					<td>Product name</td>
					<td><input type="text" name="pname" value="{{$pname}}"></td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><input type="text" name="quantity" value="{{$quantity}}"></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="price" value="{{$price}}"></td>
				</tr>
				
				
				
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Update"></td>
				</tr><br>
				
			</table>
			<a href="/pdf/{{$id}}" >Convert into PDF</a>
			</fieldset>
		</form>

		@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach
</body>
</html>