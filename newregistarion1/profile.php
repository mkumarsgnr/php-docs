<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,nitial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2 class="pager-header text-center">Profile Page</h2>
		<table class="table  table-borderd" style="width:100%">
			<tbody>
				<tr>
					<th>Id:</th>
					<td>
						<?php
							echo $_SESSION['id'];
						?>
					</td>
				</tr>
				<tr>
					<th>Name:</th>
					<td>
						<?php
							echo $_SESSION['name'];
						?>
					</td>
				</tr>
				<tr>
					<th>City:</th>
					<td>
						<?php
							echo $_SESSION['city'];
						?>
					</td>
				</tr>
				<tr>
					<th>Date of Birth:</th>
					<td>
						<?php
							echo $_SESSION['ddate'];
						?>
					</td>
				</tr>
				<tr>
					<th>Mobile No. :</th>
					<td>
						<?php
							echo $_SESSION['mno'];
						?>
					</td>
				</tr>
				<tr>
					<th>City:</th>
					<td>
						<?php
							echo $_SESSION['city'];
						?>
					</td>
				</tr>
				<tr>
					<th>Email ID :</th>
					<td>
						<?php
							echo $_SESSION['emailid'];
						?>
					</td>
				</tr>
			</tbody>
		</table>
		<form action="logOut.php" method="get"><center><button class="btn btn-info">Logout</button></center></form>
	</div>
</body>
</html>