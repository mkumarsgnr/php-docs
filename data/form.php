<!DOCTYPE html>
<html>
<head>
	<title>form validation usnig php</title>
</head>
<body>
<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
	if ($_SERVER['REQUEST_METHOD']=='POST'){
		if (empty($_POST['name'])) {
			$nameErr = 'please fill yur name here!';
		}
		else{
			$name = test_data($_POST['name']);
			if(!preg_match("/^[a-zA-Z ]*$/", $name)){
				$nameErr = 'please enter a valid name!';
			}
		}

		if(empty($_post['email'])){
			$emailErr = 'please enter your email id';
		}
		else{
			$email =test_data($_POST['email']);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailErr= 'please enter avail email id';
			}
		}
		if(empty($_POST['url'])){
			$websiteErr = 'please enter a url';
		}
		else{
			$url = test_data($_POST['url']);
			if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
			$websiteErr='please enter a valid url';
			}
		
	 	if (empty($_POST["comment"])) {
   		 $comment = "";
  		} 
  		else {
   		 $comment = test_data($_POST["comment"]); 
   		}
	}
	  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_data($_POST["gender"]);
  }
}

function test_data($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender"value="female">Female
  <input type="radio" name="gender"  value="male">Male
  <input type="radio" name="gender"  value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
  <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</form>
</body>
</html>