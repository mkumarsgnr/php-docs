<html>
<head>
	<title>API Example</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		var accessToken = "aa5a77b5d46f4479b67a0621ea10bc78";
		var baseUrl = "https://api.api.ai/v1/";
		$(document).ready(function() {
			$("#input").keypress(function(event) {
				if (event.which == 13) {
					$('.chatBox').append('<span class="userInput">' + 'me:'+ $('.query').val() + '</span><br><br>')
					event.preventDefault();
					let query  = $('.query').val()
					$('.query').val('')
					send(query);
				}
			});
		});
	
		function send(query) {
			var text = query;
			$.ajax({
				type: "POST",
				url: baseUrl + "query?v=20180101",
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				headers: {
					"Authorization": "Bearer " + accessToken
				},
				data: JSON.stringify({ query: text, lang: "en", sessionId: "somerandomthing" }),
				success: function(data) {
					setResponse(data);
				}
			});


		}
		function setResponse(val) {
			var i =val.result.fulfillment.messages.length>1;
				if(i==true){
					var j = val.result.fulfillment.messages[1].url;
					var k = val.result.fulfillment.messages[1].suggestions;
				}
			if( i){

				if(j!= undefined){
						$(".chatBox").append('<div class="responseData">'+ 'bot:' + val.result.fulfillment.speech + '<a href="' +val.result.fulfillment.messages[1].url+'">'+ val.result.fulfillment.messages[1].destinationName+ '</a></div>');
				}
				else if(k.length>0){
					$(".chatBox").append('<div class="responseData">'+ 'bot:' + val.result.fulfillment.speech + '</div>');
					for(var item in k){
						$(".chatBox").append('<div class="option" onclick="gg(this.id)" id="option_id_'+item+'"> '+k[item].title + '</div>');
					}

				}
			}
			else{
				$(".chatBox").append('<div class="responseData">'+ 'bot:' + val.result.fulfillment.speech + '</div>')
			}
		}



		function gg(id) {
			
			var data1 =$('#'+id+'').html();
			event.preventDefault();
			send(data1);

			$('.chatBox').append('<div class="userInput">' + 'me:'+  data1+ '</div>')
			$('.option').remove();
		};


	</script>
	<style type="text/css">
		body { width: 500px; margin: 0 auto;height: 500px; border: 2px solid black;padding: 10px;	 }
		.chatBox{ width: 400px;height: 450px;overflow: auto	 }
		.userInput{float: left;}
		.responseData{float:right};
		#input { width: 500px; }
		button { width: 50px; }
	</style>
</head>
<body>
	<div class = 'chatBox'>
	</div>
	<input id="input"  class="query"type="text" style="width: 430px;"> <button id="rec">send</button>
</body>
</html>