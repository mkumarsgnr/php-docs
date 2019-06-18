<!DOCTYPE html>
<html>
<head>
	<title>search</title>
	<meta charset="utf-8">
   <meta name="viewport" content="width=device-width,nitial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		ul{
			background-color: #eee;
			cursor : pointer;
		}
		li{
			padding: 12px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h3 align="center">Autocomplete Search box</h3>
		<label>Enter Country Name:</label>
		<input type="tet" name="country" id="country" class="form-control" placeholder="enter country name">
		<div id="countrylist"></div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#country').keyup(function(){
				var query = $(this).val();
				if (query != ''){
					$.ajax({
						type: 'POST',
						url : 'search1.php',
						data :{
							query : query
						},
						success:function(data){
							$('#countrylist').fadeIn();
							$('#countrylist').html(data);
						}
					});
				}
				else{
					$('#countrylist').fadeout();
					$('#countrylist').html("");

				}
			});
			$(document).on('click','li',function(){
				$('#country').val($(this).text());
				$('#countrylist').fadeOut();
			});
		});
	</script>

</body>
</html>