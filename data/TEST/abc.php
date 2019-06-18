<!DOCTYPE html>
<html>
    <head>
    	<title>bootstrap practice</title>
    	<meta charset="utf-8">
    	
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      
      <link rel="stylesheet" href="dataTables.bootstrap.min.css">
      
      <script src="jquery.dataTables.min.js"></script>
      <script src="dataTables.bootstrap.min.js"></script>
      
    </head>

<body>

    <div class="container-fluid">
	    <div class="container-fluid top-bar bg-primary ">
		    <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 ">
				    <p class="text-right text-bold">Contact us-<span class="glyphicon glyphicon-phone">91- 9570070655</span></p>
			    </div>
		    </div>
	    </div>

        <nav class="navbar navbar-default navbar-dark">
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php">Home</a></li>
                    <li><a href="database.php">Table</a></li>
                    <li><a href="registration.php">Registration</a> </li>
                   <!-- <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Customer <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php">Login</a></li>
                            <li><a href="registration.php">Registration</a> </li>
                            <li><a href="#">Forget password</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Help</a></li>
                        </ul>class="active"
                    </li>-->
                </ul>
                <div class="navbar-form navbar-right">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                    </div>
                </div>
            </div>
        </nav>
    
        <div class="container-fluid">
            <div class="row">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                           <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Sate</th>
                            <th>Games</th>
                            <th>Address</th>
                            <th>Edit</th>  
                            <th>Delete</th>
          
                        </tr>
                    </thead>
            
                    <tbody id="tabboady">
                
                   
                    </tbody>        
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="myModal" role="dialog"            aria-labelledby="exampleModalLabel" aria-hidden="true"          data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modelForm"></div>
        </div>
    </div>
    


       
    <script type="text/javascript">
      var mainData = [];  
     function show()
        {
            $.ajax({
                        type: "POST",
                        url: 'insert1.php',
                                            
                        cache: false,        
                        success: function(result)
                        {
                            
                            var data = JSON.parse(result);//to get string data into array form
                            console.log(data);
                            mainData = data['data'];
                            if(data['code']==101)
                            {
                                create_table(data['data']);
                                
                            }
                            else
                            {
                                alert("data not found");
                            }
                           
                        }
                    });
        }
          show();
          function create_table(data)
          {
            var html = '';
            for(var i in data)
            {
                html += '<tr><td>'+data[i]['id']+'</td><td>'+data[i]['name']+'</td><td>'+data[i]['email']+'</td><td>'+data[i]['mobile']+'</td><td>'+data[i]['dob']+'</td><td>'+data[i]['gender']+'</td><td>'+data[i]['state']+'</td><td>'+data[i]['games']+'</td><td>'+data[i]['address']+'</td><td><button type="button" class="btn btn-primary"  onclick="createModal('+i+','+data[i]['id']+')" >Edit</button></td><td><button  type="button" class="btn btn-danger"onclick="deleteModal('+i+','+data[i]['id']+')" >Delete</button></td></tr>';
            }
            $("#tabboady").html(html);
            $('#example').DataTable();
          
          }
     function createModal(i,id)
      {
        //console.log(mainData);
        //alert('ghvghv');
         var html = '<div class="modal-header"><h3 class="modal-title" id="exampleModalLabel">Would you like to update data !</h3> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><div class="form-horizontal" id=""><div class="form-group "><label class="control-label col-sm-2">Name:</label><div class="col-sm-10"><input type="text" value="'+mainData[i]['name']+'" class="form-control" id="modalname"></div></div><div class="form-group"><label class="col-form-label col-sm-2">Mobile number:</label><div class="col-sm-10"><input type="text" class="form-control" value="'+mainData[i]['mobile']+'" id="modalmobileno"></div></div><div class="modal-body"  ><div  class="form-horizontal" id=""><div class="form-group "><label class="control-label col-sm-2">Date of Birth:</label><div class="col-sm-10"><input type="text" value="'+mainData[i]['dob']+'" class="form-control" id="modaldob"></div></div><div class="form-group"><label class="col-form-label col-sm-2">Gender:</label><div class="col-sm-10"><input type="text" class="form-control" value="'+mainData[i]['gender']+'" id="modalgender"></div></div><div class="form-group "><label class="col-form-label col-sm-2">state:</label><div class="col-sm-10"><input type="text" class="form-control" value="'+mainData[i]['state']+'" id="modalstate"></div></div><div class="form-group"><label class="col-form-label col-sm-2">Games:</label><div class="col-sm-10"><input type="text" class="form-control" value="'+mainData[i]['games']+'" id="modalgames"></div></div><div class="form-group"><label class="col-form-label col-sm-2">Address:</label><div class="col-sm-10"><textarea class="form-control" id="modaladdress"></textarea></div></div></div></div><div class="modal-footer" ><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="button" onclick="update('+id+')" class="btn btn-primary" data-dismiss="modal">save changes</button></div>';
         $("#modelForm").html(html);
         $('#myModal').modal('show');
      }   
      function update(id)
        {
                var name = $("#modalname").val();
                var mobile = $("#modalmobileno").val();
                var dob = $("#modaldob").val();
                var gender = $("#modalgender").val();
                var state =$("#modalstate").val();
                 var games =$("#modalgames").val();
                var address =$("#modaladdress").val();
                var data2 = {
                            "id" :id,
                            "modalname":name,
                            "modalmobileno":mobile,
                            "modaldob" :dob,
                            "modalgender" :gender,
                            "modalgames" :games,
                            "modalstate" :state,
                            "modaladdress" :address
                            };
                          
                $.ajax({
                        type: "POST",
                        url: 'insert2.php',
                        data : {"data2":data2},                    
                        cache: false,        
                        success: function(result)
                        {
                            if(result==1)
                            {
                                alert("successfully updated ");
                                show();
                            }
                            else
                            {
                                alert("not updated please try again!");
                            }
                        }
                    });
        } 
  
    function deleteModal(i,id)
        {
            var html ='<div class="modal-header"><h3 class="modal-title text-danger" id="exampleModalLabel">Are you sure want to delete data?</h3><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-footer" ><button type="button" class="btn btn-secondary" data-dismiss="modal">No</button><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="delete1('+id+')">yes</button></div>';
            $("#modelForm").html(html);
            $('#myModal').modal('show');
        }
         
       function delete1(id)
        {   
            var data3={
                "id":id
            };
                $.ajax({
                        type: "POST",
                        url: 'delete.php',
                        data : {"data3":data3},                    
                        cache: false,        
                        success: function(result)
                        {
                            
                            if(result==1)
                            {
                                alert("deleted successfully");
                                show();
                            }
                            else
                            {
                                alert("not deleted !");
                            }
                        }
                    }); 
        }
           
    </script>
</body>
</html>