<!DOCTYPE html>
<html lang="en">
   <head>
  		<title>Bootstrap Example</title>
  		 <meta charset="utf-8">
  		 <meta name="viewport" content="width=device-width,nitial-scale=1">
  		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <style type="text/css">
       .valid{
        color: red;
       }
     </style>
   </head>

  <body>
  	<div class="container">
  		<h1 class="page-header text-center">Login Page</h1>

        <label>Username:</label>
        <input type="text" name="username" id="User" class="form-control"><div class="valid" id="val_User"></div>
        <label>Password:</label>
        <input type="Password" name="Password" id="Pass" class="form-control"><div class="valid" id="val_Pass"></div>
         <div align="center"> 
        <button class="btn" onclick="login_function()">Submit</button>

  	</div>
  </body>



<script src="myLogin.js"></script>

</html>
 <!--      $data = array();
      while($row = $run2 ->fetch_assoc()){
        $data=array(
                  "id"=>$row['id'],
                     "name"=>$row['name'],
                     "city"=>$row['city'],
                     "ddate"=>$row['ddate'],
                     "mno"=>$row['mno'],
                     "emailid"=>$row['emailid'],
                 );
      }
      session_start();
      $_SESSION['id']= $data["id"];
      $_SESSION['name']= $data["name"];
      $_SESSION['city']= $data["city"];
      $_SESSION['ddate']= $data["ddate"];
      $_SESSION['mno']= $data["mno"];
      $_SESSION['emailid']= $data["emailid"]; -->

















    <!--         $row = mysqli_fetch_row($run1);
print_r($row);
      session_start();
      $_SESSION['id']= $row[0]["id"];
      $_SESSION['name']= $row[0]["name"];
      $_SESSION['city']= $row[0]["city"];
      $_SESSION['ddate']= $row[0]["ddate"];
      $_SESSION['mno']= $row[0]["mno"];
      $_SESSION['emailid']= $row[0]["emailid"];
      echo '101'; -->