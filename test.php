<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Chat Bot</title>
    <link rel="stylesheet" type="text/css" href="bot.css">
</head>

<body>
	<div class="container">
		<div class="full-chat-right-container">
			<div class="chat-right-image-container">
				<img src="dp2.jpg" class="chat-right-image">
			</div>
			<div class="chat-right-massage-container">
				<div class="massage-right-container">
					this is the massage
				</div>
				<div class="extra-response">
					<div class="options">option 1</div>
					<div class="options">option 2</div>
					<div class="options"> option 3</div>
				</div>
			</div>
		</div>
		<div class="inputbox">
			<input id="input" type="text" name="query"><button class="sendbutton">Send</button>
		</div>
	</div>
	    
	</body>
	
	<script
	src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
</body>

</html>
<!-- <?php 
//$var = "hello";
//$salt = "this is salt";
//$varnew = crypt($var,$salt);
//echo $var .'<br>';
//echo $salt .'<br>';
//echo $varnew .'<br>';
//$N = crypt("hello",$salt);
//echo $N;
?> -->


