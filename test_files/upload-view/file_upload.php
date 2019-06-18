<!DOCTYPE html>
<html>
<head>
	<title>file upload</title>
</head>
<body>
<form action="" method="post"  enctype="multipart/form-data" >

	name:<input type="txt" name="name"><br>
	picture:<input type="file" name="picture"><br>
	<input type="submit" name="submit">
</form>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
	$name =  $_POST['name'];
	 $pic =$_FILES['picture'];
	echo $name,'<br>';
	print_r($pic);
	echo '<br>';
require 'db.php';
	try{
		$dbcon = new connection();
		$connect = $dbcon->connect();
		$query = "INSERT INTO test(name, pic) values(:name, :pic)";
		$row = $connect->prepare($query);
		$row->execute([':name' => $name , ':pic'=> $pic['name'] ]);
		move_uploaded_file($pic['tmp_name'],'C:\xampp\htdocs\text_files\pics/'.$pic['name'] );
		echo '<script>window.location="http://localhost/text_files/view.php"</script>';
	}
	catch(PDOException $e){
		echo $e->getMassage();
	}
}
?>
