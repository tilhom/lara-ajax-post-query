<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Live Search</title>
	<link rel="stylesheet" href="css/app.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Products info </h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<input type="text" class="form-control" id="search" name="search"></input>
					</div>
					<table class="table table-dark">
						<thead>
							<tr>
								<th>ID</th>
								<th>Product Name</th>
								<th>Description</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/app.js"></script>
		<script type="text/javascript">

$.ajaxSetup({ headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' } });

</script>
	<script type="text/javascript">
		$('#search').on('keyup',function(){
			$value=$(this).val();
			$.ajax({
				type : 'post',
				url : '{{URL::to('search')}}',
				data:{
					'search':$value
					 },
				success:function(data){
					$('tbody').html(data);
				}
			});
		})
	</script>

	
</body>
</html>