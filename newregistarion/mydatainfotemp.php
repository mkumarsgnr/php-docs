<?php
  include("dbConnection.php");
  $sql="SELECT * FROM registration";
  $data = array();
   $result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
       $data[] = array(
        "id"=>$row['id'],
               "name"=>$row['name'],
               "city"=>$row['city'],
               "ddate"=>$row['ddate'],
               "mno"=>$row['mno'],
               "emailid"=>$row['emailid'],
               "pass"=>$row['pass']
               );
         }
         $result = array('data' => $data );
           echo json_encode($result);
?>