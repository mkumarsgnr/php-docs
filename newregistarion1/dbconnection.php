<?php
$servername = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($servername,$username,$password,"dbreg");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL";mysqli_connect_error();
  }
?> 