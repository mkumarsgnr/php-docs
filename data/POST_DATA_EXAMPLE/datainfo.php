<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'mytest';
$con = mysqli_connect($server,$user,$pass,$db);
  if(mysqli_connect_errno()){
    echo 'connection_aborted!';
  }
  else{
  $sql="SELECT * FROM testdata";
   $run = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($run)) {
      $data[] = array(
               "id"=>$row['id'],
               "input1"=>$row['input1'],
               "input2"=>$row['input2']
             );
         }
         $result = array('dataid' => $data );
           echo json_encode($result);
}
?>