<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	<h1>Welcome Admin</h1>
	<a href="/create">Create New User</a> |
	<a href="/userlist">View User List</a> |
	<a href="/logout">logout</a>

	<br>
	<br>

	<input type="text" class="srch" style="position: relative;left:30px;" id="search"  placeholder="Search Product Data" /><br><br>

	<div id="info" style="position: relative;left:30px; padding:20px;  width:400px; height: 200px; background-color: #FAEBD7;"></div>

	
	
</body>
</html>

<script type="text/javascript">


  $(document).ready(function(){

    $(".srch").on('keyup',function(){

      var q = $(this).val();
      if(q.length>0){
        $.ajax({
          url:"{{url('search')}}",
          data:{
             q:q
          },
          dataType:'json',
           success:function(res){
            var ht='';
            
           $.each(res.data, function(index,data){
              var i = data.id;
              ht+='<a href="/products/edit/'+i+'">'+data.pname+'</a>';

           });
           $('#info').html(ht);
           }
        });
      }

    });

  });




</script>
