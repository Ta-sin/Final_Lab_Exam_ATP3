<!DOCTYPE html>
<html>
<head>
	<title>User list page</title>
</head>
<body>

	<h3>Product List</h3>
	
	<br>
	<br>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>PRODUCT NAME</td>
			<td>Quantity</td>
			<td>Price</td>
			<td>Action</td>
			
		</tr>

		@for($i=0; $i < count($pros); $i++)
		<tr>
			<td>{{$pros[$i]['id']}}</td>
			<td>{{$pros[$i]['pname']}}</td>
			<td>{{$pros[$i]['quantity']}}</td>
			<td>{{$pros[$i]['price']}}</td>
			<td>
				
				<a href="{{route('product.edit', $pros[$i]['id'])}}">Edit</a> |
				<a href="/deleteProduct/{{$pros[$i]['id']}}">Delete</a> 
			</td>
		</tr>
		@endfor
	</table>

</body>
</html>