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
*************************************************************************
tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr       *
- Τροποποίηση στο page=1 για συνολική αντιμετώπιση τοίχων και δαπέδων   *
- Σύνδεση των select κατηγοριών και υλικών                              *
- Προσθήκη javascript για άμεσους υπολογισμούς στην ίδια σελίδα         *
- Δημιουργία σκαριφήματος                                               *
- Εκτύπωση φύλλου δομικού στοιχείου σε pdf                              *
- Αποθήκευση και ανάγνωση από τη βάση των δομικών στοιχείων             *
-      																    *
- Τροποποίηση στο page=2 για υπολογισμό των ανοιγμάτων στην ίδια σελίδα *
- Εκτύπωση των υπολογισμών σε pdf                                       *
- TODO: Αποθήκευση - ανάκτηση στοιχείων     				            *
-                                                                       *
- Μεταφέρθηκαν τα function στο header_kelyfos						    *
- Μεταφέρθηκαν τα τμήματα για τοίχους, ανοίγματα και δάπεδα υπογείων    *
- στον φάκελο includes                                                  *
-                                                                       *
*************************************************************************
*/
?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
$min="";
if (isset($_GET['min'])) $min=$_GET['min'];
if (isset($_POST['min'])) $min=$_POST['min'];
?>
<?php find_selected_page(); ?>
<?php
	$aeras1 = dropdown1("SELECT name, r FROM domika_ylika_epifstraera", "r", "name"); 
	$beton1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_beton", "agwg_l", "name"); 
	$epixrismata1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_epixrismata", "agwg_l", "name"); 
	$gypso1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_gypsosanides", "agwg_l", "name"); 
	$keram1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_keramidia", "agwg_l", "name");
	$ksyl1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_ksyleia", "agwg_l", "name");
	$mon1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_monwtika", "agwg_l", "name");
	$mondow1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_monwtikadow", "agwg_l", "name");
	$plakes1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_plakes", "agwg_l", "name"); 
	$skyro1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_skyrodemata", "agwg_l", "name");
	$toyvla1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_toyvla", "agwg_l", "name");
	$ygro1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_ygromonwseis", "agwg_l", "name");
	$diaf1 = dropdown1("SELECT name, agwg_l FROM domika_ylika_diafora", "agwg_l", "name");
//πρόσθεση νέων πεδίων που πιθανόν λείπουν από τους πίνακες
	add_column_if_not_exist("domika_toixoi", "paxh");
	add_column_if_not_exist("domika_toixoi", "strwseis");
	add_column_if_not_exist("domika_orofes", "paxh");
	add_column_if_not_exist("domika_orofes", "strwseis");
	add_column_if_not_exist("domika_pilotis", "paxh");
	add_column_if_not_exist("domika_pilotis", "strwseis");
	add_column_if_not_exist("domika_dapedo_edafous", "paxh");
	add_column_if_not_exist("domika_dapedo_edafous", "strwseis");
?>
<?php include("includes/header_kelyfos.php"); ?>

<?php if ($min!=1){?>

<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
<td id="page">
<!--			<div id="imgs" style="width:50%;margin-left:auto;margin-right:auto;"></div> -->
<?php }else{ ?><table style="width:100%"><tr><td><?php } ?>
		
		
<?php 
	include_once("includes/apotelesmata_kelyfos.php");

    if ($sel_page["id"] == 1){ 
		include_once("includes/kelyfos_toixoi.php"); 
	} 
   if ($sel_page["id"] == 2){ 
		include_once("includes/kelyfos_anoigmata.php"); 
	} 
   if ($sel_page["id"] == 3){ 
		include_once("includes/kelyfos_dapeda.php"); 
	} 
?>
		</td>
	</tr>
</table>


<?php 
if ($min!=1){
include("includes/footer.php"); 
}
?>

