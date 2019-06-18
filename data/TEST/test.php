<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<input type="text" id="i1">
<input type="text" id="i2">
<button onclick="gg()">gggg</button>
<script>
	function gg(){
		var i1 = $('#i1').val();
		var i2 = $('#i2').val();
		$.ajax({
			type : 'POST',
			url : 'test1.php',
			data :{
				'ip1' : i1,
				'ip2' : i2
			},
			cache: false,
			success : function(result){
				if (result == '101'){
					alert('yeye');
				}
				else{
					alert('not op')
				}
			}

		})
	}
</script>
</body>
</html>