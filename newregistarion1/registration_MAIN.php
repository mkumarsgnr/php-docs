<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,nitial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <style type="text/css">
       .val{
        color: red;
       }
     </style>
</head>
<body>
<div class="container">
	<h2 class="page-header text-center">
		Registration
	</h2>
		<label>Name:</label><input id="name"  type="text" class="form-control" onchange="valid(this.value,'name')"><div class="val" id="val_name"></div>
		<label>City:</label><input type="text" id="city" name="city"  class="form-control"  onchange="valid(this.value,'city')"><div class="val" id="val_city"></div>
		<label>DOB:</label><input type="date" id="ddate" name="ddate" class="form-control"  onchange="valid(this.value,'ddate')"><div class="val" id="val_ddate"></div>
		<label>Mobile No.</label><input type="number" id="mno" name="mno" class="form-control"  onchange="valid(this.value,'mno')"><div class="val" id="val_mno"></div>
		<label>Email:</label><input type="text" name="emailid" id="emailid" class="form-control" onchange="valid(this.value,'emailid')"><div class="val" id="val_emailid"></div>
		<label>Password:</label><input type="text" name="pass" id="pass" class="form-control" onchange="valid(this.value,'pass')"><div class="val" id="val_pass"></div>
		 <center><button class="btn" onclick="submit1()" align="center">submit</button></center>
</div>
<script src="registration.js"></script>
</body>
</html>