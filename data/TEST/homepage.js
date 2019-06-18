var mdata={
	"name":"",
	"city":"",
	"ddate":"",
	"mno":""

}
function valid(v,type){
	if(v){
		mdata[type] = v;
		if(type=="name"){
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
function submit1(){	
	var error=0;
	//var i;
	for(var i in mdata){
		console.log(error);
		console.log(i);
		error += valid(mdata[i],i);
	}
	if(error <= 0){
		$.ajax({
			type:"POST",
			url:"newregister.php",
			data: {'dataArray' : mdata},
			cache : false,
			success : function(result){
				if(result==101){
					alert("inserted");
				}
				else{
					alert("can not insert")
				}
			}
		})
	}
	else{
		alert("Kindly fill all the fields!");
	}
}