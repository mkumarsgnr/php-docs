<?php


$f= $_FILES["picture"];
$pdo = new PDO("mysql:host=localhost;dbname=test","root","");
$name = mysqli_real_escape_string( mysqli_connect('localhost','root','','test'),$_POST['name']);  
move_uploaded_file($f['tmp_name'], 'C:/xampp/htdocs/text_files/pics/'.$f['name']);
$pdo->query("INSERT INTO test(name,pic) values('".$name."','".$f['name']."')");
?>
<script type="text/javascript">
	window.location = "view.php";
</script>