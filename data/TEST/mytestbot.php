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
					$('.chatBox').append('<span class="userInput">' + 'me:'+ $('input').val() + '</span><br><br>')
					event.preventDefault();
					let query  = $('input').val()
					$('input').val('')
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
			console.log( val.result.fulfillment.messages[1].destinationName,  val.result.fulfillment.messages[1].url);
			$(".chatBox").append('<span class="responseData">'+ 'bot:' + val.result.fulfillment.speech + '</span><br><br>')
			$(".chatBox").append('<span classs="responseData"><a href="' +val.result.fulfillment.messages[1].url+'">'+ val.result.fulfillment.messages[1].destinationName+ '</a></span><br><br>')
		}
	</script>
	<style type="text/css">
		body { width: 500px; margin: 0 auto;height: 500px; border: 2px solid black;padding: 10px;	 }
		div { width: 400px;height: 450px;overflow: auto	 }
		.userInput{float: left;}
		.responseData{float:right};
		#input { width: 500px; }
		button { width: 50px; }
	</style>
</head>
<body>
	<div class = 'chatBox'>
	</div>
	<input id="input" type="text" style="width: 430px;"> <button id="rec">send</button>
</body>
</html>