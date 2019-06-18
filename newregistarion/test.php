<!DOCTYPE html>
<html>
<head>
    <title>ALL data</title>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,nitial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <style type="text/css">
.val{
    color: red;
}
.topnav {
  background-color: #f5f5f5;
  overflow: hidden;
}
.topnav a {
  float: left;
  color: #717070;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav a.active {
  background-color: #E7E7E7;
  color: #717070;
}
    </style>
</head>
<body>
<div class="topnav">
    <a href="registration_MAIN.php" >Registration</a>
    <a href="mydata.php" class="active">Data</a>
    <a href="myLogin.php">Login</a>
</div>
<input type="text" id="searchbox1" placeholder="Search" class="form-control">
<div class="container">
    <center><h2>All Data From Database</h2></center>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr><th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>DOB</th>
                <th>Mobile no.</th>
                <th>Email</th>
                <th>Password</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody id="tdata">
            
        </tbody>

    </table>
</div>



    <div class="modal fade" tabindex="-1" id="myModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modelForm">
                
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="mydata.js"></script>

</body>
</html>



