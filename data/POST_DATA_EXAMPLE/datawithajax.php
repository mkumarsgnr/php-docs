<!DOCTYPE html>
<html>
<head>
	<title>with ajax</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<table id="exp">
		<thead>
			<th>id</th>
			<th>input1</th>
			<th>input2</th>
		</thead>
		<tbody id="data">
			
		</tbody>
	</table>
	<script type="text/javascript">
		function ajaxdata(type1,url1,cache1,sucfunction){
			$.ajax({
					type: type1,
					url: url1,
					cache: cache1,
					success: sucfunction
			});
		}



			ajaxdata('POST' , 'datainfo.php' , false , function(result){
													var gg = JSON.parse(result);
													creatT(gg['dataid']);
												}
			);
/*			$.ajax({
				type:'POST',
				url: 'datainfo.php',
				cache: false,
				success : function(result){
					var gg = JSON.parse(result);
					creatT(gg['dataid']);
				}
			})*/

		function creatT(gg){
			var html ='';
			for(var i in gg){
				html+='<tr><td>'+gg[i]['id']+'</td><td>'+gg[i]['input1']+'</td><td>'+gg[i]['input2']+'</td></tr>';
				$('#data').html(html);
			}

		}
	</script>
</body>
</html>
