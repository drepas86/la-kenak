﻿<?php
//make class file require
require('xpMenu.class.php');
//construct the class
$xpmenu = new xpMenu();

//add category and options on menu
//use the format: 
//addMenu("short_name")
//addCategory("short_name", "name", "image", "menu")
//addOption("short_name", "name", "image", "link", "category", "menu")
//remember: short_name can be anything without spaces or specials chars

$xpmenu->addMenu("1");
$xpmenu->addCategory("m1", "Βιβλιοθήκες", "", "1");
	$xpmenu->addOption("m11", " βιβλιοθήκες υλικών", "", "index.php?page=3", "m1", "1");
	$xpmenu->addOption("m12", " κλιματικά δεδομένα", "", "index_climate.php?page=41", "m1", "1");
	$xpmenu->addOption("m13", " Διευθύνσεις", "", "addresses.php", "m1", "1");
	$xpmenu->addOption("m14", " Νομική βιβλιοθήκη", "", "laws.php", "m1", "1");
	$xpmenu->addOption("m15", " Βοήθεια", "", "tekmiriwsi.php", "m1", "1");

$xpmenu->addMenu("2");
$xpmenu->addCategory("m2", "Σκιάσεις", "", "2");
	$xpmenu->addOption("m21", "από αριστερά", "", "index_skiaseis.php?page=23", "m2", "2");
	$xpmenu->addOption("m22", "από δεξιά", "", "index_skiaseis.php?page=24", "m2", "2");
	$xpmenu->addOption("m23", "από ορίζοντα", "", "index_skiaseis.php?page=25", "m2", "2");
	$xpmenu->addOption("m24", "από πρόβολο", "", "index_skiaseis.php?page=26", "m2", "2");
	$xpmenu->addOption("m25", "από δεξιά και αριστερά", "", "index_skiaseis.php?page=40", "m2", "2");
	$xpmenu->addOption("m26", "από τέντες", "", "index_skiaseis.php?page=56", "m2", "2");
	$xpmenu->addOption("m27", "από ορ. περσίδες", "", "index_skiaseis.php?page=57", "m2", "2");
	$xpmenu->addOption("m28", "Ηλιακή τροχιά", "", "astronomical.php", "m2", "2");

$xpmenu->addMenu("3");
$xpmenu->addCategory("m3", "Στοιχεία Ζώνης", "", "3");
	$xpmenu->addOption("m31", "Στοιχεία κατανάλωσης ΖΝΧ", "", "stoixeia_zwnis.php?page=1", "m3", "3");
	$xpmenu->addOption("m32", "Διείσδυση αέρα ", "", "stoixeia_zwnis.php?page=2", "m3", "3");

$xpmenu->addMenu("4");
$xpmenu->addCategory("m4", "Κέλυφος", "", "4");
	$xpmenu->addOption("m41", "Αδιαφανή δομικά στοιχεία", "", "domika_kelyfos.php?page=1", "m4", "4");
	$xpmenu->addOption("m42", "Διαφανή δομικά στοιχεία", "", "domika_kelyfos.php?page=2", "m4", "4");
	$xpmenu->addOption("m43", "Ισοδύναμοι συντελεστές", "", "domika_kelyfos.php?page=3", "m4", "4");
	$xpmenu->addOption("m44", "ΠΕΑ", "", "domika_kelyfos.php?page=4", "m4", "4");

$xpmenu->addMenu("5");
$xpmenu->addCategory("m5", "Μ Ε Λ Ε Τ Η", "", "5");
	$xpmenu->addOption("m51", "Αποθήκευση/Ανάκτηση", "", "kenak.php?page=1", "m5", "5");
	$xpmenu->addOption("m52", "Γενικά Στοιχεία", "", "kenak.php?page=2", "m5", "5");
	$xpmenu->addOption("m53", "Κτίριο", "", "kenak.php?page=3", "m5", "5");	
	$xpmenu->addOption("m54", "Συστήματα", "", "kenak.php?page=4", "m5", "5");	
	$xpmenu->addOption("m55", "Επ. με έδαφος", "", "kenak.php?page=5", "m5", "5");
	$xpmenu->addOption("m56", "Αδιαφανή", "", "kenak.php?page=6", "m5", "5");	
	$xpmenu->addOption("m57", "Διαφανή", "", "kenak.php?page=7", "m5", "5");	
	$xpmenu->addOption("m58", "Σκιάσεις αδιαφανών", "", "kenak.php?page=8", "m5", "5");	
	$xpmenu->addOption("m59", "Σκιάσεις διαφανών", "", "kenak.php?page=9", "m5", "5");	
	$xpmenu->addOption("m510", "Τ Ε Υ Χ Ο Σ", "", "kenak.php?page=10", "m5", "5");
	$xpmenu->addOption("m511", "Αμοιβές", "", "amoivi.php", "m5", "5");

$xpmenu->addMenu("6");
$xpmenu->addCategory("m6", "ΧΡΗΣΤΗΣ", "theme/icons/authors.gif", "6");
if (!isset($_SESSION['user_id'])){
	$xpmenu->addOption("m61", " Σύνδεση", "", "login.php", "m6", "6");
}
if (isset($_SESSION['user_id'])){	
	$xpmenu->addOption("m61", "Καλωσήρθες ".$_SESSION['username'], "", "staff.php", "m6", "6");
}
if (!isset($_SESSION['meleti_id'])){
	$xpmenu->addOption("m62", " Επιλογή Μελέτης", "", "staff.php", "m6", "6");
}
if (isset($_SESSION['meleti_id'])){
	$xpmenu->addOption("m62", $_SESSION['meleti_perigrafi'], "", "staff.php", "m6", "6");
}

	
//javascript for the menu
echo $xpmenu->javaScript();
//css for menu
echo $xpmenu->style();

?>

<div style="position:absolute;top:0;left:0;width:100%;height:50px;background:#558806;">
<div style="position:absolute;top:4;left:5;width:845px;height:40px;z-index:2000;">
<table border='0' cellpadding='0' cellspacing='0' width='900px' ><tr><td valign='top'>
	<table border='0' cellspacing='1' cellpadding='0'  >
		<tr>
			<td id="menu1" style="vertical-align:top;width:150px;"><?php echo $xpmenu->mountMenu("1"); ?></td>
			<td id="menu2" style="vertical-align:top;width:150px;"><?php echo $xpmenu->mountMenu("2"); ?></td>
			<td id="menu3" style="vertical-align:top;width:150px;"><?php echo $xpmenu->mountMenu("3"); ?></td>
			<td id="menu4" style="vertical-align:top;width:150px;"><?php echo $xpmenu->mountMenu("4"); ?></td>
			<td id="menu5" style="vertical-align:top;width:150px;"><?php echo $xpmenu->mountMenu("5"); ?></td>
			<td id="separator" style="vertical-align:top;width:10px;"></td>
			<td id="menu6" style="vertical-align:top;width:150px;"><?php echo $xpmenu->mountMenu("6"); ?></td>
  		</tr>
  	</table>
</table>
</div></div>
<div style="position:absolute;top:0;left:980;width:300px;height:50px;z-index:0;">
<h1 style="color: #8D0D19;">La-Kenak v<?php echo VERSION; ?> </h1>
</div>
