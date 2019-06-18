<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'mytest';
$data = $_POST['ip1'];
$data1 =$_POST['ip2'];
$con = mysqli_connect($server,$user,$pass,$db);
	if(mysqli_connect_errno()){
		echo 'connection_aborted!';
	}
else{
	$query = "INSERT INTO testdata(input1,input2) VALUES ('".$data."','".$data1."')";
	$run=mysqli_query($con,$query);
	if($run){
		echo '101';
	}
	else{
		echo '102';
	}
}

?>