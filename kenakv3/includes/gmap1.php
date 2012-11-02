<?php ?> 
  <div id="mapCanvas"></div>
  <div id="infoPanel">
    <b>Θέση:</b>
    <div id="markerStatus"><i>Αλλάξτε τη θέση του δείκτη.</i></div>
  <form name="map_form" action="map.php" method="POST">
	
	<b>Διεύθυνση:</b><br/>
	<input type="text" id="map_address" size="50">
	<br/>
	<table>
	<tr><td><b>Lat:</b></td><td><input type="text" id="map_lat"></td></tr>
	<tr><td><b>Lon:</b></td><td><input type="text" id="map_lon"></td></tr>
	</table>
	<br/>
	</form>
	<br/>Ο χάρτης δεν αποθηκεύει τη θέση της μελέτης.<br/>
	</div>
	<p style="clear:both;">
<?php ?> 
