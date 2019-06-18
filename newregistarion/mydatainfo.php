<?php
  include("dbConnection.php");
  $sql="SELECT * FROM registration";
   $result = $con->query($sql);
    while($row = $result->fetch_assoc()) {
       $data[] = array(                                  //here [] is used for multidimentional array
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