    function info1(){
    $.ajax({

                type: "POST",
                url: "mydatainfo.php",
                cache: false,
                success: function(result){                   
                	var data = JSON.parse(result);
                    create_table(data['data']);
                    console.log(data)
                }

            });
}
info1();
function create_table(data){

    var html = '';
    for(var i in data){
        html += '<tr><td>'+data[i]['id']+'</td><td>'+data[i]['name']+'</td><td>'+data[i]['city']+'</td><td>'+data[i]['ddate']+'</td><td>'+data[i]['mno']+'</td><td>'+data[i]['emailid']+'</td><td>'+data[i]['pass']+'</td><td><button class="btn btn-info" onclick="delete_data('+data[i]['id']+')">Delete</button></td></tr>';
    }

    $("#tdata").html(html);
    $('#example').DataTable();
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