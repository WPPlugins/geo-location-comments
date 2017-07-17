$(document).ready(function(){
	
	$("#locate").click(function(){
		
  if (navigator.geolocation) {
  $('#geo_td').html('<span style = "color:red; text-decoration: blink;">Locating You...</span>');
		navigator.geolocation.getCurrentPosition(function(position) {
		doStuff(position.coords.latitude, position.coords.longitude);
		
		if(position.coords.latitude != '')
			{
				$('#geo_td').html('<a style = "color:#red;" href = "http://maps.google.com/?q=Powered by WordPress Geo-Location@'+position.coords.latitude+','+position.coords.longitude+'" target = "_blank">You\'ve been located (Click to view on map!)</a>');
				
				}
		
  });
}

else {
	
  if (document.getElementById("geo_td")) {
	  
		$('#geo_td').text("sorry but geolocation services are not supported by your browser");
		
  }
}

function doStuff(mylat, mylong) {
  if (document.getElementById("GeoAPI")) {
	  
	 $("#geo_location").attr('value', mylat+','+mylong);
	 
  }
}

		
		});
$('submit').click(function(){
	$('form').submit();
	});
	});