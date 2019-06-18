<?php
$user='root';
$pass='';
$db='registration';
$data=$_POST['dataArray'];
$con= mysqli_connect('localhost' , $user , $pass , $db)or die("not connected!");
$sql="INSERT into regdata(name,city,ddate,mno) values('".$data['name']."','".$data['city']."','".$data['ddate']."','".$data['mno']."')";
$run=mysqli_query($con,$sql);
if($run){
	echo '101';
}
else{
	echo '102';
}
?>