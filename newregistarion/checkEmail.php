<?php
include ('dbConnection.php');
if(isset($_POST['email'])){



	$data =$_POST['email'];

	$sql = "SELECT emailid FROM registration WHERE emailid = '".$data."'";
	$result=mysqli_query($con,$sql);
	$chk = mysqli_num_rows($result);

	if($chk>0){
		echo '102';
	}
	else{
		echo '101';
	}
	
}
else{
	echo 'can not fetch  email';

}

?>