function login_function(){
	var email = $("#User").val();
	var Pass = $("#Pass").val();

	if (User){
		$.ajax({
			type : 'POST',
			url : 'login_email.php',
			data : { 'User' : email,
					 'Pass' : Pass },
			cache : false,
			success : function(result){
				if(result==101){
					window.location.href = 'profile.php';
				}
				else if(result==102){
					$('#val_Pass').html("Password is incorrect");
				}
				else if(result==103){
					$('#val_User').html("please register first");

				}
				else if(result==104){
					alert('Please enter Email and Password Correctly!');
				}
				else{
					alert('somthing is wrong!');
				}
			}

		})
	}

}