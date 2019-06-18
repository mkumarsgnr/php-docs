var  mData;

    function info1(){
    $.ajax({

                type: "POST",
                url: "mydatainfotemp.php",
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
        html += '<tr><td>'+data[i]['id']+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['name']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="text" class="form-control" value="'+data[i]['name']+'" id="name_'+i+'"></div>'+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['city']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="text" class="form-control" value="'+data[i]['city']+'" id="city_'+i+'"></div>'+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['ddate']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="date" class="form-control" value="'+data[i]['ddate']+'" id="ddate_'+i+'"></div>'+'</td>';
        html += '<td>'+'<div class="actualdata_'+i+'">'+data[i]['mno']+'</div>'+'<div class="inputbox_'+i+'" style="display: none;"><input type="text" class="form-control"value="'+data[i]['mno']+'" id="mno_'+i+'"></div>'+'</td>';
        html += '<td>'+data[i]['emailid']+'</td><td>'+data[i]['pass']+'</td>';
        html += '<td><center><div id="savebutton_'+i+'" style="display: none;"><button class="btn btn-success" onclick="update('+i+','+data[i]['id']+')">Save</button></div><button class="btn btn-success" id="editbutton_'+i+'" style="display: block;" onclick="Edit1('+i+','+data[i]['id']+')">Edit</button><button class="btn btn-danger" onclick="delete1('+i+','+data[i]['id']+')">Delete</button></center></td></tr>';
        
        // $(".inputbox_"+i+"").hide();
         //$('#savebutton_'+i+'').hide();
     
    } 
    $("#tdata").html(html);
    $('#example').DataTable();


}  

function Edit1(i,id){
    $('.actualdata_'+i+'').hide();
    $('#editbutton_'+i+'').hide();
   $('.inputbox_'+i+'').show();
    $('#savebutton_'+i+'').show();
}

function update(i,id){
    $('.actualdata_'+i+'').show();
    $('.inputbox_'+i+'').hide();
    $('#savebutton_'+i+'').hide();
    $('#editbutton_'+i+'').show();
        var data2 = {
                    "id" :id,
                    "name":$("#name_"+i+"").val(),
                    "city":$("#city_"+i+"").val(),
                    "ddate" :$("#ddate_"+i+"").val(),
                    "mno" :$("#mno_"+i+"").val()
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
function delete1(i,id)
        {
            var html ='<div class="modal-header"><center><h3 class="modal-title " id="exampleModalLabel">Are you sure want to delete data?</h3></center><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body" ><center><button type="button" class="btn btn-danger" data-dismiss="modal" onclick="delete_data('+id+')">yes</button>    <button type="button" class="btn btn-info" data-dismiss="modal">No</button></center></div>';
            $("#modelForm").html(html);
           $("#myModal").modal('show');
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
