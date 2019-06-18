<?php
	$con =mysqli_connect("localhost","root","","search");
	$res =$_POST["query"];
	if(isset($res)){
		$output = '';
		$query = "SELECT * FROM searchdata WHERE countryname like'%".$res."%'";
		$output ='<ul class="list-unstyled">';
		$result = mysqli_query($con,$query);
		
		$gg =mysqli_num_rows($result);
		if($gg>0){
			while ($row = mysqli_fetch_array($result)){
				$output .= '<li>'.$row['countryname'].'</li>';
			}
		}
		else{
			$output .= '<li>country not found</li>';
		}
		$output .= '</ul>';
		echo $output;
	}
	else{
	echo 'can not fetch  data';

}

?>