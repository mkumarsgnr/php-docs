<!DOCTYPE html>
<html>
<head>
	<title>yeye</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<table>
	<thead >
		<th>id</th>
		<th>i1</th>
		<th>i2</th>
	</thead>
	<tbody id="tdata"></tbody>
</table>
<script type="text/javascript">
	function MF(){
		$.ajax({
			type : 'POST',
			url : 'newmf.php',
			cache : false,
			success : function(result){
				var gg = JSON.parse(result);
				ggg(gg['row']);
				console.log(gg);
			}
		})
	}
	MF();
	function ggg(gg){
		var html ='';
		for(var i in gg){
			html+='<tr><td>'+gg[i]['id']+'</td><td>'+gg[i]['i1']+'</td><td>'+gg[i]['i2']+'</td></tr>';
			$('#tdata').html(html);
		}
	}
</script>
</body>
</html>