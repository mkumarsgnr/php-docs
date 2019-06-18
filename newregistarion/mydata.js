var  mData;

    function info1(){
    $.ajax({

                type: "POST",
                url: "mydatainfo.php",
                cache: false,
                success: function(result){                   
                	var data = JSON.parse(result);
                    create_table(data['data']);
                    mData =data['data'];
                   // console.log(data)
                }

            });
}
info1();
function create_table(data){

    var html = '';
    for(var i in data){
        html += '<tr><td>'+data[i]['id']+'</td><td>'+data[i]['name']+'</td><td>'+data[i]['city']+'</td><td>'+data[i]['ddate']+'</td><td>'+data[i]['mno']+'</td><td>'+data[i]['emailid']+'</td><td>'+data[i]['pass']+'</td><td><center><button class="btn btn-success" onclick="Edit1('+i+','+data[i]['id']+')">Edit</button>  <button class="btn btn-danger" onclick="delete1('+i+','+data[i]['id']+')">Delete</button></center></td></tr>';
    }

    $("#tdata").html(html);
    $('#example').DataTable();
}  
function delete1(i,id)
        {
            var html ='<div class="modal-header"><center><h3 class="modal-title " id="exampleModalLabel">Are you sure want to delete data?</h3></center><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" ><center><button type="button" class="btn btn-danger" data-dismiss="modal" onclick="delete_data('+id+')">yes</button>    <button type="button" class="btn btn-info" data-dismiss="modal">No</button></center></div>';
            $("#modelForm").html(html);
           $("#myModal").modal('show');// document.getElementById("myModal").showModal();
        }
function delete_data(id)
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
                        // show();
                        location.reload(true); 

                        
                    }
                    else
                    {
                        alert("not deleted !");
                    }
                }
            }); 
}
function Edit1(i,id){
    console.log(mData);
    var html = '<div class="modal-header"><center><h3 class="modal-title" id="exampleModalLabel">Would you like to update data !</h3></center><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body"><label>Name:</label><input type="text"  class="form-control" value="'+mData[i]['name']+'" id="modalname"><label>City:</label><input type="text" class="form-control" value="'+mData[i]['city']+'" id="modalcity"><label>Date of Birth:</label><input type="date" value="'+mData[i]['ddate']+'"class="form-control" id="modalddate"><label>Mobile No. :</label><input type="text" value="'+mData[i]['mno']+'"class="form-control"  id="modalmno"></div><div class="modal-footer" ><button type="button" onclick="update('+id+')" class="btn btn-success" data-dismiss="modal">save changes</button><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div>';
        $("#modelForm").html(html);
        $("#myModal").modal('show');
}

      function update(id)
        {
             
                var data2 = {
                            "id" :id,
                            "modalname":$("#modalname").val(),
                            "modalcity":$("#modalcity").val(),
                            "modalddate" :$("#modalddate").val(),
                            "modalmno" :$("#modalmno").val()
                            };
                          
                $.ajax({
                        type: "POST",
                        url: 'Update.php',
                        data : {"data2":data2},                    
                        cache: false,        
                        success: function(result)
                        {
                            if(result==101)
                            {
                                alert("successfully updated ");
                                location.reload(true);
                            }
                            else
                            {
                                alert("not updated please try again!");
                            }
                        }
                    });
        } 
