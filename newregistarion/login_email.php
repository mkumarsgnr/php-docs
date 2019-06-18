<?php
include('dbconnection.php');
if(isset($_POST['User']) &&$_POST['Pass']){
	$data = $_POST['User'];
	$pass = $_POST['Pass'];
	$sql = "SELECT emailid FROM registration WHERE emailid = '".$data."'";
	$run = mysqli_query($con, $sql);
	$chk = mysqli_num_rows($run);

	if($chk>0){
		$sql1 = "SELECT * FROM registration WHERE emailid ='".$data."' && pass ='".$pass."'  ";
		$run1 = mysqli_query($con,$sql1);
		$chk1 = mysqli_num_rows($run1);
		if($chk1>0){
			$row = mysqli_fetch_row($run1);

// print_r($row);
			session_start();
			$_SESSION['id']= $row[0];
			
			echo '101';
		}
		else{
			echo '102';
		}
	}
	else{
		echo '103';
	}
}
else{
	echo '104';
}
?>


