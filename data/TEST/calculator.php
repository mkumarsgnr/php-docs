<!DOCTYPE html>
<html>
<head>
	<title>Calculator</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<form action="" method="post">
<input type="text" name="subject" id="subject" value=''>
<button onclick="revrse() " name="ok">OK</button>
</form>
<?php
if(isset($_POST['ok'])){

$str= $_POST['subject'];
echo $str."<br>";
function revrse($str){
	echo strrev($str);
}

}
?>
</body>
</html>