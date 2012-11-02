<?php
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
*/
require_once("includes/connection.php"); 
require_once("includes/functions.php");
require_once("includes/session.php"); 
find_selected_page(); 
confirm_logged_in();
include("includes/header_skiaseis.php"); 

if (isset($_SESSION['user_id'])){$login_message="Καλωσήρθες, <a href=\"staff.php\">".$_SESSION['username']."</a>";}
if (isset($_SESSION['meleti_id'])){$login_message.=" - Μελέτη: ".$_SESSION['meleti_perigrafi'];}
if (!isset($_SESSION['meleti_id'])){$login_message.=" - Επιλέξτε μελέτη πρώτα";}
if (!isset($_SESSION['user_id'])){$login_message="<a href=\"login.php\">Σύνδεση</a>";}
?>

<div class="topright"><?php echo $login_message ?><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
		<td id="page">

<?php 
/*
<h2>Υπολογισμός ηλιακής τροχιάς (*)</h2><br/><br/>

<form name="astronomical_form" action="astronomical.php" method="post">
Lat:<input type="text" name="lat" maxlength="10" size="10" />
Lon:<input type="text" name="lon" maxlength="10" size="10" />
Ημέρα (1-30):<input type="text" name="mera" maxlength="10" size="10" />
Ώρα (0-23):<input type="text" name="wra" maxlength="10" size="10" />
<input type="submit" name="astronomical_form" value="Υπολογισμός" />
</form>

include("includes/sunpath.php");
*/
?>		
		
<div id="header1">
		
		<div id="welcome" title="Βοήθεια">
			<p><strong>Η ηλιακή τροχιά</strong> </p><br/>
			<font color="red">21 Ιουνίου</font><br/>
			<font color="cyan">21 Δεκεμβρίου</font><br/>
			<font color="yellow">Ανατολή ηλίου</font><br/>
			<font color="FF9900">Δύση ηλίου</font><br/>
			<p><img src="suncalc/images/help.png"></p><br/>
			Βασισμένο στο <a href="https://github.com/mourner/suncalc">Suncalc στο github</a>.<br/>
			Copyright is &copy; 2009 <a href="http://agafonkin.com/en">Vladimir Agafonkin</a>. βασισμένο στο <a href="http://www.astro.uu.nl/~strous/AA/en/reken/zonpositie.html">Astronomy Answers formulae</a>.<br/> 
			Υλοποιημένο με <a href="http://code.google.com/intl/ru/apis/maps/documentation/v3/">Google Maps API v3</a>, <a href="http://jquery.com">jQuery</a> and <a href="http://jqueryui.com">jQuery UI</a>, <a href="http://raphaeljs.com/">Raphaël</a>.
			<p></p>
			
			
		</div>
		
		<p id="settings">
			<span id="tagline">Ηλιακή τροχιά  για </span>
			<span id="location-container">
				<input class="title" id="location" type="text" value="" /> <button id="go-location">Πάμε</button><br />
				<button id="detect-location">Βρες την τοποθεσία μου</button>
			</span> 
			<span id="date-container">
				την <input class="title" id="date" type="text" /> 
			</span>
			<a href="#now" id="now-link" class="button">Τώρα</a>        ΚΕΝΑΚ: 
			<a href="#21jun09" id="21jun09-link" class="button">21 Jun 09:00</a>
			<a href="#21jun09" id="21jun12-link" class="button">21 Jun 12:00</a>
			<a href="#21jun09" id="21jun15-link" class="button">21 Jun 15:00</a>
			<a href="#21dec09" id="21dec09-link" class="button">21 Δεκ 09:00</a>
			<a href="#21dec09" id="21dec12-link" class="button">21 Δεκ 12:00</a>
			<a href="#21dec09" id="21dec15-link" class="button">21 Δεκ 15:00</a>
		</p>
		<br/><br/>
		<div id="time-slider-container">
			<div id="time-scale-container"></div>
			<div id="time-slider-2">
				<div id="time-scale-twilight"></div>
				<div id="time-scale-twilight-2"></div>
				<div id="time-scale-sunlight"></div>
				<div id="time-scale-sunlight-2"></div>
			</div>
		</div><br/>
	</div>
	<div id="legend" class="map-content">
		<!-- time: your | <a href="#">local</a><br /><br /> -->
		<span id="before-sunrise">
			<span class="time-span dark morning-dark-time">...</span> &mdash; 
			<acronym title="Η περίοδος της μέρας κατά τη διάρκεια της οποίας είναι αρκετά σκοτεινά για αστρονομικές παρατηρήσεις και ο ουρανός δε φωτίζεται από τον ήλιο">Νύχτα</acronym><br />
			<span class="time-span twilight morning-astro-time">...</span> &mdash; 
			<acronym title="Η περίοδος της μέρας κατά τη διάρκεια της οποίας είναι αρκετά σκοτεινά για αστρονομικές παρατηρήσεις και ο ουρανός φωτίζεται ακόμα από τον ήλιο">astronomical twilight</acronym><br />
			<span class="time-span twilight morning-nau-time">...</span> &mdash; 
			<acronym title="Η περίοδος της μέρας κατά τη διάρκεια της οποίας υπάρχει αρκετό φως από τον ήλιο για πλοήγηση μέσω του ορίζοντα στη θάλασσα αλλά όχι αρκετό για άλλες δραστηριότητες χωρίς άλλες πηγές φωτός.">nautical twilight</acronym><br />
			<span class="time-span twilight morning-civil-time">...</span> &mdash; 
			<acronym title="Η περίοδος της μέρας κατά τη διάρκεια της οποίας υπάρχει αρκετό φως από τον ήλιο και το φως από τεχνητές πηγές δεν χρειάζεται για εξωτερικές δραστηριότητες.">civil twilight</acronym><br />
		</span>
		<span id="dawn">
			<span class="time-span twilight dawn-time">...</span> &mdash; 
			<acronym title="Ο χρόνος που σηματοδοτεί την έναρξη της ανατολής. Πρίν την Ανατολή. Χαρακτηρίζεται από την παρουσία ελαφρού φωτός, όταν ο ήλιος είναι ακόμα κάτω από τον ορίζοντα.">Αυγή</acronym><br />
		</span>
		<span id="sunset-sunrise">
			<span class="time-span sunrise sunrise-time">...</span> &mdash; 
			<acronym title="Η στιγμή που το ανώτερο μέρος του κύκλου του ηλίου φτάνει τον ορίζοντα στην ανατολή.">Ανατολή ηλίου</acronym><br />
			<span id="daylight">
				<span class="time-span sun daylight-time">...</span> &mdash; Ημέρα<br />
			</span>
			<span id="transit">
				<span class="time-span transit transit-time">...</span> &mdash; 
				<acronym title="Τη στιγμή που ο ήλιος εμφανίζεται στην υψηλότερη θέση του, σε σύγκριση με τις θέσεις του τις υπόλοιπες ώρες.">Ηλιακό μεσημέρι</acronym><br />
			</span>
			<span class="time-span sunset sunset-time">...</span> &mdash; 
			<acronym title="Η στιγμή που το ανώτερο μέρος του κύκλου του ηλίου φτάνει τον ορίζοντα στην δύση.">Ηλιοβασίλεμα</acronym><br />
		</span>
		<span id="dusk">
			<span class="time-span twilight dusk-time">...</span> &mdash; 
			<acronym title="Η στιγμή που σηματοδοτεί το τέλος της δύσης του ηλίου μετά το απόγευμα και την αρχή της συσκότισης από τον ήλιο.">Σούρουπο</acronym><br />
		</span>
		<span id="after-sunset">
			<span class="time-span twilight night-civil-time">...</span> &mdash; civil twilight<br />
			<span class="time-span twilight night-nau-time">...</span> &mdash; nautical twilight<br />
			<span class="time-span twilight night-astro-time">...</span> &mdash; astronomical twilight<br />
			<span class="time-span dark night-dark-time">...</span> &mdash; Νύχτα<br />
		</span>
		<a id="more-detailed-link" href="#more-detailed">Περισσότερα... &raquo;</a>
		<!-- <span class="sun specified-time">...</span> &mdash; <span class="altitude">...</span> -->
	</div>
	<div id="map"></div>
	<br/>
	<?php
	/*
	<div id="forecast" class="map-content"><img src="suncalc/images/weather.png" id="forecast-link" ><img src="suncalc/images/print.png" target="_blank" title="print" onclick="window.open('print_map.html')"></div>
	*/
	?>
	<div id="links" class="map-content">
		<a id="about-link" href="#about">Βοήθεια</a><br />
	</div>
	
	
	
		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>