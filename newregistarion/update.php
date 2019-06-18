<?php 
include ("dbConnection.php");
$data2 =$_POST['data2'];
 
	if(isset($data2)){
		$sql =" UPDATE registration SET name='".$data2['name']."',city='".$data2['city']."',ddate='".$data2['ddate']."',mno='".$data2['mno']."' WHERE id ='".$data2['id']."'";
		
		$result = mysqli_query($con, $sql);
		if($result){
			echo 101;
		}
		else{
			echo 102;
		}
	}
	else{
		echo ' error 404';
	}
?>