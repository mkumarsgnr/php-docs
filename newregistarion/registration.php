<?php
include ("dbConnection.php");
$data=$_POST['dataArray'];
$sql="INSERT into registration(name,city,ddate,mno,emailid,pass) values('".$data['name']."','".$data['city']."','".$data['ddate']."','".$data['mno']."','".$data['emailid']."','".$data['pass']."')";
$run=mysqli_query($con,$sql);
if($run){
	echo '101';
}
else{
	echo '102';
}
?>
