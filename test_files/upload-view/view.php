<?php
require 'db.php';
$con = new connection();
$connection = $con->connect();
$query = $connection->query("SELECT * FROM test ORDER BY id DESC");
$row = $query->fetch();
?>
name:<?php
echo $row['name'];
?><br>
pic:<?php
	echo '<img src ="pics/'.$row['pic'].'">';
?>
