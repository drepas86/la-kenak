﻿<?php
/*
Copyright (C) 2012 - Labros KENAK v.1.0 
Author: Labros Karoyntzos 

Labros KENAK v.1.0 from Labros Karountzos is free software: 
you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3 of the License.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License version 3
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.

Το παρόν με την ονομασία Labros KENAK v.1.0. με δημιουργό τον Λάμπρο Καρούντζο
στοιχεία επικοινωνίας info@chem-lab.gr www.chem-lab.gr
είναι δωρεάν λογισμικό. Μπορείτε να το τροποποιήσετε και επαναδιανείμετε υπό τους
όρους της άδειας GNU General Public License όπως δίδεται από το Free Software Foundation
στην έκδοση 3 αυτής της άδειας.
Το παρόν σχόλιο πρέπει να παραμένει ως έχει ώστε να τηρείται η παραπάνω άδεια κατά τη διανομή.
*/?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<title>La-Kenak - v<?php echo VERSION; ?> - Μελέτη ΚΕΝΑΚ</title>
		<link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="stylesheets/colorbox.css" />
		<link href="stylesheets/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
		<link href="stylesheets/jtable_green.css" rel="stylesheet" type="text/css" />
		<link href="stylesheets/by_tsak1.css" media="all" rel="stylesheet" type="text/css" />

		<script src="javascripts/jquery-1.7.2.js" type="text/javascript"></script>
		<script src="javascripts/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
		<script src="javascripts/jquery.colorbox.js" type="text/javascript"></script>
		<script src="javascripts/jquery.jtable.js" type="text/javascript"></script>

		<script src="javascripts/encoder.js" type="text/javascript"></script>
		<script type="text/javascript" src="includes/ckeditor/ckeditor.js"></script>
		<script src="javascripts/cssfix.js"></script>
		<script>
		$(document).ready(function() {  
		$('#tabvanilla').tabs();  
		}); 
		</script>
		<script>
		$(document).ready(function() {  
		$('#helpme').tabs();  
		}); 
		</script>
		
		<script>
		$("#kenakform").validator();
		</script>
		<script>
		$(document).ready(function(){  
		$(".toixoi-menu > li").click(function(e){  
        switch(e.target.id){  
            case "north":  
                //change status &amp;amp;amp; style menu  
                $("#north").addClass("active");  
                $("#east").removeClass("active");  
                $("#south").removeClass("active"); 
				$("#west").removeClass("active");				
                //display selected division, hide others  
                $("div.north").fadeIn();  
                $("div.east").css("display", "none");  
                $("div.south").css("display", "none");
				$("div.west").css("display", "none");
            break;  
            case "east":  
                //change status &amp;amp;amp; style menu  
                $("#north").removeClass("active");  
                $("#east").addClass("active");  
                $("#south").removeClass("active");  
				$("#west").removeClass("active");
                //display selected division, hide others  
                $("div.east").fadeIn();  
                $("div.north").css("display", "none");  
                $("div.south").css("display", "none");
				$("div.west").css("display", "none");
            break;  
            case "south":  
                //change status &amp;amp;amp; style menu  
                $("#north").removeClass("active");  
                $("#east").removeClass("active");  
                $("#south").addClass("active");
				$("#west").removeClass("active");				
                //display selected division, hide others  
                $("div.south").fadeIn();  
                $("div.north").css("display", "none");  
                $("div.east").css("display", "none");
				$("div.west").css("display", "none"); 
            break;  
			case "west":  
                //change status &amp;amp;amp; style menu  
                $("#west").addClass("active");  
                $("#east").removeClass("active");  
                $("#south").removeClass("active");
				$("#north").removeClass("active");				
                //display selected division, hide others  
                $("div.west").fadeIn();  
                $("div.east").css("display", "none");  
                $("div.south").css("display", "none");
				$("div.north").css("display", "none"); 				
            break; 
			}  
			//alert(e.target.id);  
			return false;  
		});  
		}); 
		</script>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Άγνωστη τοποθεσία');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
	document.getElementById("map_lat").value = latLng.lat();
	document.getElementById("map_lon").value = latLng.lng();
}

function updateMarkerAddress(str) {
  document.getElementById('map_address').value = str;
}

function initialize() {
  var latLng = new google.maps.LatLng(37.5, 22.5);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 6,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Τοποθετήστε το δείκτη...');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Τοποθετήστε το δείκτη...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Τοποθετήθηκε ο δείκτης');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
</script>
		

	</head>
	<body onload=get_active();>
<style>
  #mapCanvas {
    width: 600px;
    height: 400px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
  }
</style>
		<div id="header">
		</div>
<?php include ('menu.php'); ?>
