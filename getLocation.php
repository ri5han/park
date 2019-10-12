<?php
session_start();

if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){
    
    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];
    $_SESSION['latitude'] = $lat;
    $_SESSION['longitude'] = $long;
    echo $_SESSION['latitude']."<br>";
    echo $_SESSION['longitude'];
}

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Locating you ...</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script>

$(document).ready(function(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation);
    } else { 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});

function showLocation(position) {
	
    var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;
    

	$.ajax({
		type:'POST',
		url:'getLocation.php',
		data:'latitude='+latitude+'&longitude='+longitude,
		success:function(msg){
            if(msg){
               $("#location").html("Located! Redirecting ....");
               window.location.href = "listing.php";
            }else{
                $("#location").html('Not Available');
            }
		}
	});

}
</script>
<style type="text/css">
	p{ border: 2px dashed #000; width: auto; padding: 10px; font-size: 18px; border-radius: 5px; color: #ff4b20;}
    span.label{ font-weight: bold; color: #000;}
</style>
</head>
<body>
    <p><span class="label"></span> <span id="location"></span></p>
</body>
</html>
