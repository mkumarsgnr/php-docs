var mdata={
	"name":"",
	"city":"",
	"ddate":"",
	"mno":"",
	"emailid":"",
	"pass":""

}
function valid(v,type){
	if(v){
		mdata[type] = v;
		if(type=="name"){
	          var filter=  /^[a-z, ,A-Z]+$/;
            if (!filter.test(v)){
            	$("#val_"+type).html("please enter only charcters from A-Z,a-z!");
            	return 1;
            }
  		    else{
  		    	$("#val_"+type).html("");
  		    	//mdata[type] = v;
  		    	return 0;
  		    }
		}
		else if(type=="city"){
	          var filter=  /^[a-z,A-Z]+$/;
            if (!filter.test(v)){
            	$("#val_"+type).html("please enter only charcters from A-Z,a-z!");
            	return 1;
            }
  		    else{
  		    	$("#val_"+type).html("");
  		    	//mdata[type] = v;
  		    	return 0;
  		    }
		}
		else if(type=="mno"){
			if (v.length == 10) {
				    if (/^\d{10}$/.test(v)) {
				    	$("#val_"+type).html("");
				    	return 0;
					}
				   else{
				   	$("#val_"+type).html("please enter valid mobile number!");
				   	return 1;
  					}
  			}	
	       else{
	           $("#val_"+type).html("please enter a valid mobile number!");
	           return 1;
        	}
		}
		else if(type=="emailid"){
			var filter=  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if(!filter.test(v)){
				$("#val_"+type).html("please enter a valid email id.");

				return 1;
			}
			else{
				$("#chk_"+type).html("");
				checkEmail(type);
				return 0;
			}
		}
		else if(type=="pass"){
			if(v.length>=8){
				$("#val_"+type).html("");
				return 0;
			}
			else{
				$("#val_"+type).html("your password should contain atleast 8 charcters");
				return 1;
			}
		}
		else{
			$("#val_"+type).html("");
			return 0;
		}
	}
	else{
	 	$("#val_"+type).html("This field is required!");
	 	//mdata[type] = v;
	 	return 1;
	}
}
function checkEmail(type){
	var email = $("#emailid").val();
	if(email){
		$.ajax({
			type : 'POST',
			url : 'checkEmail.php',
			data : {'email' : email},
			cache : false,
			success : function(result){
				if(result==101){
					$('#val_'+type).html("");
					return 0;
				} 
				else{
					$('#val_'+type).html("email already exixts!");
					return 1;
				}
			}
		})
	}

}
function submit1(){	
	var error=0;
	//var i;
	for(var i in mdata){
		console.log(error);
		console.log(mdata[i],i);
		error += valid(mdata[i],i);
	}
	if(error <= 0){
		$.ajax({
			type:"POST",
			url:"registration.php",
			data: {'dataArray' : mdata},
			cache : false,
			success : function(result){
				if(result==101){
					alert("inserted");
				}
				else{
					alert("can not insert");
				}
			}
		})
	}
	else{
		alert("Kindly Check all the fields again!");
	}
}