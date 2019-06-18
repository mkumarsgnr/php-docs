<!DOCTYPE html>
<html>
<head>
	<title>search box</title>
	
</head>
<body><script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed in=true&libraries=places"></script>
	<script type="text/javascript">
		google.maps.event.addDomListner(window,'load',intilize);
		function intilize(){
			var autocomplete = new google.maps.places.Autocomplete(document.getElementById('txtautocomplete'));

			google.maps.event.addListener(autocomplete,'place_changed',function(){
				var place =autocomplete.getPlace();
				var location = "<b>address</b>" + place.formatted_address +"</br>";
				location+= "<b>lat:</b>"+place.geometry.location.lat()+"</br>";
				location+= "<b>long:</b>"+place.geometry.location.lng();
				document.getElementById('lblResult').innerHTML = location;
			});
		};
	</script>
<span>location:</span><input type="text" id="txtautocomplete" style="width:200px"><label id="lblResult"></label>
</body>
</html>