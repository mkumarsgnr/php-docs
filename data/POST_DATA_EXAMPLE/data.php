<!DOCTYPE html>
<html>
<head>
	<title>data</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	<table id="example">
		<thead>
      <th>id</th>
			<th>input1</th>
			<th>input2</th>
		</thead>
		<tbody >
		<?php
      $server = 'localhost';
      $user = 'root';
      $pass = '';
      $db = 'mytest';
      $con = mysqli_connect($server,$user,$pass,$db);
        if(mysqli_connect_errno()){
          echo 'connection_aborted!';
        }
        else{
          $sql="SELECT * FROM testdata";
          $data = array();
          $result = mysqli_query($con,$sql);
          while($row = mysqli_fetch_assoc($result)) {
            echo  '<tr><td>'.$row['id'].'</td><td>'.$row['input1'].'</td><td>'.$row['input2'].'</td></tr>';
          }
        }
    ?>
		</tbody>
	</table>


</body>
</html>