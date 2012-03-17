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
?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
add_column_if_not_exist("anoigmata_alouminio", "rec","VARCHAR(300)");
add_column_if_not_exist("anoigmata_alouminio_thermo", "rec","VARCHAR(300)");
add_column_if_not_exist("anoigmata_doors", "rec","VARCHAR(300)");
add_column_if_not_exist("anoigmata_plastic", "rec","VARCHAR(300)");
add_column_if_not_exist("anoigmata_wood", "rec","VARCHAR(300)");
?>
<?php find_selected_page(); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/scripts.php"); ?>
<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>

<?php if ($sel_page) { ?>
	<td id="navigation">
			<?php echo public_navigation($sel_subject, $sel_page); ?>
		</td>
<?php } ?>
		<td id="page">
	
<?php
include_once("includes/apotelesmata_index.php");
?>
			<?php if ($sel_page) { ?>
				<h2><?php echo $sel_page['menu_name']; ?></h2>
				<div class="page-content">
					<?php 
					//Ο κάθε πίνακας στη βάση έχει διαφορετικές στήλες με διαφορετικά ονόματα.γι αυτό πρέπει να δημιουργώ άλλο πίνακα κάθε φορά 
					//Οι πίνακες βέβαια είναι παρόμοιοι ανά τύπο γι αυτό στα if οι συνθήκες είναι ανισώσεις που περιλαμβάνουν πχ όλες τις επιλογές για τις σκιάσεις.
					//Ανάμεσα σε αυτές τις ανισότητες οι επιλογές για το id γίνονται στο αρχειο functions.php με τις function get_anoigmata,get_ylika κλπ.
					echo "<br/>";
					if ($sel_page["id"] < 6){
					$vivliothikes = get_anoigmata($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Όνομα</td><td>U [W/(m²*K)]</td><td>g [-]</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"4%\">" . $vivliothikes[$i]["id"] . "</td>";
						if ($sel_page["id"]<>3){ 
						echo "<td class=\"vivliothikil\" width=\"84%\"><a class=\"domika\" href=\"./domika_kelyfos.php?page=2&min=1&lib=".$i."&sp=".$sel_page["id"]."\" onclick=call_t(); > " . $vivliothikes[$i]["name"] . " </a></td>";
						}else{
						echo "<td class=\"vivliothikil\" width=\"84%\">" . $vivliothikes[$i]["name"] . "</td>";
						}
						echo "<td class=\"vivliothikic\" width=\"6%\">" . number_format($vivliothikes[$i]["u"], 3, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"6%\">" . number_format($vivliothikes[$i]["g"], 3, '.', ',') . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)";
						echo "<br/><br/>Προσθήκη στοιχείων:";
						//Είσοδος στη βάση δεδομένων
						//Φόρμα εισόδου για ανοίγματα xwris thermo
						if ($sel_page["id"] == 1){
						$vasi = "anoigmata_alouminio";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"50\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<b>g:<input type=\"text\" name=\"" . $vasi . "_g\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για ανοίγματα me thermo
						if ($sel_page["id"] == 2){
						$vasi = "anoigmata_alouminio_thermo";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"50\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<b>g:<input type=\"text\" name=\"" . $vasi . "_g\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για ανοίγματα doors
						if ($sel_page["id"] == 3){
						$vasi = "anoigmata_doors";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"50\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<b>g:<input type=\"text\" name=\"" . $vasi . "_g\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για ανοίγματα plastic
						if ($sel_page["id"] == 4){
						$vasi = "anoigmata_plastic";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"50\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<b>g:<input type=\"text\" name=\"" . $vasi . "_g\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για ανοίγματα wood
						if ($sel_page["id"] == 5){
						$vasi = "anoigmata_wood";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"50\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<b>g:<input type=\"text\" name=\"" . $vasi . "_g\" required=\"required\" maxlength=\"10\" size=\"50\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						
					}
						
					if ($sel_page["id"] > 5 && $sel_page["id"] < 18)	{
					$vivliothikes = get_ylika($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Όνομα</td><td>Θερμική Αγωγιμότητα (λ) W/(m·K)</td><td>Πυκνότητα  (ρ) kg/m³</td><td>Πάχος (L) m</td><td>Ειδική θερμότητα (cp) kJ/(kg·K)</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothikil\" width=\"43%\">" . $vivliothikes[$i]["name"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"13%\">" . number_format($vivliothikes[$i]["agwg_l"], 3, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"13%\">" . $vivliothikes[$i]["pykn_r"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"13%\">" . number_format($vivliothikes[$i]["paxos"], 3, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"13%\">" . number_format($vivliothikes[$i]["cp"], 3, '.', ',') . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)";
						
						//Είσοδος στη βάση δεδομένων
						
						//Φόρμα εισόδου για Υλικά - Μπετόν
						if ($sel_page["id"] == 6){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_beton";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - διάφορα υλικά χρήστη
						if ($sel_page["id"] == 7){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_diafora";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Υγρομονώσεις
						if ($sel_page["id"] == 8){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_ygromonwseis";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Επιχρίσματα
						if ($sel_page["id"] == 9){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_epixrismata";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Γυψοσανίδες
						if ($sel_page["id"] == 10){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_gypsosanides";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Κεραμίδια
						if ($sel_page["id"] == 11){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_keramidia";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Ξυλεία
						if ($sel_page["id"] == 12){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_ksyleia";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Μονωτικά
						if ($sel_page["id"] == 13){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_monwtika";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Μονωτικά dow
						if ($sel_page["id"] == 14){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_monwtikadow";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Πλάκες
						if ($sel_page["id"] == 15){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_plakes";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Σκυροδέματα
						if ($sel_page["id"] == 16){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_skyrodemata";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για Υλικά - Τούβλα
						if ($sel_page["id"] == 17){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_toyvla";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Αγωγιμότητα:<input type=\"text\" name=\"" . $vasi . "_agwg_l\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πυκνότητα:<input type=\"text\" name=\"" . $vasi . "_pykn_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Cp:<input type=\"text\" name=\"" . $vasi . "_cp\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						
					}
					
					if ($sel_page["id"] == 18)	{
					$vivliothikes = get_ylika($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Όνομα</td><td>Θερμική Αντίσταση (R) (m²·K)/W</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothikil\" width=\"60%\">" . $vivliothikes[$i]["name"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"30%\">" . number_format($vivliothikes[$i]["r"], 3, '.', ',') . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)";
						//Φόρμα εισόδου για Υλικά - Επιφανειακή στρώση αέρα
						if ($sel_page["id"] == 18){
						echo "<br/><br/>Προσθήκη στοιχείων:";
						$vasi = "domika_ylika_epifstraera";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>Θερμική Αντίσταση (R) (m²·K)/W:<input type=\"text\" name=\"" . $vasi . "_r\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Είσοδος στη βάση\" />";
						}
					}
					
					if ($sel_page["id"] > 18 && $sel_page["id"] < 23)	{
					$sp=$sel_page["id"];
					$vivliothikes = get_domika($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Όνομα</td><td>U W/(m²·K)</td><td>Cm kJ/(kg·K)</td><td>Πάχος m</td><td>Βάρος kg/m²</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["id"] . "</td>";
						if ($sp==22){ 
						echo "<td class=\"vivliothikil\" width=\"43%\"><a class=\"domika\" href=\"./domika_kelyfos.php?page=1&min=1&lib=".$i."\" onclick=call_t(); > " . $vivliothikes[$i]["name"] . " </a></td>";
						}else{
						echo "<td class=\"vivliothikil\" width=\"43%\">" . $vivliothikes[$i]["name"] . "</td>";
						}
						echo "<td class=\"vivliothikic\" width=\"13%\">" . number_format($vivliothikes[$i]["u"], 3, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"13%\">" . number_format($vivliothikes[$i]["cm"], 3, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"13%\">" . number_format($vivliothikes[$i]["paxos"], 3, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"13%\">" . number_format($vivliothikes[$i]["baros"], 2, '.', ',') . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)";
						echo "<br/><br/>Προσθήκη στοιχείων:";
						//Είσοδος στη βάση δεδομένων
						//Φόρμα εισόδου για δάπεδο επί εδάφους
						if ($sel_page["id"] == 19){
						$vasi = "domika_dapedo_edafous";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>cm:<input type=\"text\" name=\"" . $vasi . "_cm\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Βάρος:<input type=\"text\" name=\"" . $vasi . "_baros\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για  οροφές
						if ($sel_page["id"] == 20){
						$vasi = "domika_orofes";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>cm:<input type=\"text\" name=\"" . $vasi . "_cm\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Βάρος:<input type=\"text\" name=\"" . $vasi . "_baros\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για  πυλωτές
						if ($sel_page["id"] == 21){
						$vasi = "domika_pilotis";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>cm:<input type=\"text\" name=\"" . $vasi . "_cm\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Βάρος:<input type=\"text\" name=\"" . $vasi . "_baros\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
						//Φόρμα εισόδου για τοίχους
						if ($sel_page["id"] == 22){
						$vasi = "domika_toixoi";
						echo "<br/><form action=\"index.php\" method=\"post\">";
						echo "<b>Name:<input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" />";
						echo "<b>U:<input type=\"text\" name=\"" . $vasi . "_u\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>cm:<input type=\"text\" name=\"" . $vasi . "_cm\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Πάχος:<input type=\"text\" name=\"" . $vasi . "_paxos\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<b>Βάρος:<input type=\"text\" name=\"" . $vasi . "_baros\" required=\"required\" maxlength=\"10\" size=\"10\" />";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Insert into database\" />";
						}
					}
					
					if ($sel_page["id"] > 22 && $sel_page["id"] < 27)	{
					$vivliothikes = get_skiaseis($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Μοίρες (degrees)</td><td>Περίοδος</td><td>Β (γ=0deg)</td><td>ΒΑ (γ=45deg)</td><td>Α (γ=90deg)</td><td>ΝΑ (γ=135deg)</td><td>Ν (γ=180deg)</td><td>ΝΔ (γ=225deg)</td><td>Δ (γ=270deg)</td><td>ΒΔ (γ=315deg)</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"50\">" . $vivliothikes[$i]["deg"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"50\">" . $vivliothikes[$i]["periode"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["b"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["ba"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["a"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["na"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["n"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["nd"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["d"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["bd"] . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)";
					}
					
					if ($sel_page["id"] == 27)	{
					$vivliothikes = get_energy($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Όνομα</td><td>Μονάδα</td><td>f_unit (Μονάδα/MJ)</td><td>f_prim (-)</td><td>f_CO2 (KgCO2/kWh)</td><td>f_cost (€/MJ)</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"47%\">" . $vivliothikes[$i]["name"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . $vivliothikes[$i]["unit"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . number_format($vivliothikes[$i]["funit"], 5, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . number_format($vivliothikes[$i]["fprim"], 5, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . number_format($vivliothikes[$i]["fco2"], 5, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . number_format($vivliothikes[$i]["fcost"], 5, '.', ','). "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)" 
						. "<br/><br/>όπου:<br/><b>f_unit:</b> Συντελεστής μετατροπής από ενέργεια καυσίμου (MJ) σε Μ.Μ."
						. "<br/><b>f_prim:</b> Συντελεστής μετατροπής από ενέργεια καυσίμου (MJ) σε πρωτογενή"
						. "<br/><b>f_CO2:</b> Συντελεστής μετατροπής από ενέργεια καυσίμου (MJ) σε Kg CO2";
					}
					
					if ($sel_page["id"] > 27)	{
					$vivliothikes = get_synthikes($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Κατηγορία</td><td>Χρήση</td><td>Ώρες λειτουρ γίας (h)</td><td>Ημέρες λειτουρ γίας</td><td>Μήνες λειτουρ γίας</td><td>θ,i,h (C)</td><td>θ,i,c (C)</td><td>Χ,i,h (%)</td><td>Χ,i,c (%)</td><td>Άτομα / 100 m2</td><td>Νωπός αέρας (m3 / h / person)</td><td>Νωπός αέρας (m3 / h / m2)</td><td>Στάθμη φωτι σμού (lux)</td><td>Ισχύς κτιρίου αναφο ράς (W/m2)</td><td>Ώρες λειτουρ γίας ημέρας (h)</td><td>Ώρες λειτουρ γίας νύχτας (h)</td><td>ΖΝΧ (lt / άτομο / ημέρα)</td><td>ΖΝΧ (lt / m2 / ημέρα)</td><td>ΖΝΧ (m3 / m2 / year)</td><td>Άνθρω ποι (W / άτομο)</td><td>Άνθρω ποι (W / m2)</td><td>Συντε λεστής παρου σίας f</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"18%\">" . $vivliothikes[$i]["gen_xrisi"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"19%\">" . $vivliothikes[$i]["xrisi"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"50\">" . $vivliothikes[$i]["hours"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"50\">" . $vivliothikes[$i]["days"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["months"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["tih"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["tic"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["xih"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["xic"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["atoma"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["nwpos_aeras_per"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["nwpos_aeras_m2"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["fwtismos"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["isxys_anaf"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["hours_day"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["hours_night"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["znx_l_p_d"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["znx_l_sq_d"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["znx_m3_sq_y"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["w_persons"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["w_m2"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["synt_parousias"] . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)" . 
						"<br/><br/>Τυπικό ωράριο λειτουργίας ανά χρήση: Πίνακας 2.1 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Καθοριζόμενες τιμές θερμοκρασίας και σχετικής υγρασίας εσωτερικών χώρων: Πίνακας 2.2 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Απαιτούμενος νωπός αέρας ανά χρήση κτιρίου: Πίνακας 2.3 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Στάθμη γενικού (όχι ειδικού) φωτισμού και εγκατεστημένη ισχύς φωτισμού κτιρίου αναφοράς ανά χρήση κτιρίου: Πίνακας 2.4 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Τυπική κατανάλωση ΖΝΧ ανά χρήση κτιρίου: Πίνακας 2.5 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Εκλυόμενη θερμότητα χρηστών ανά χρήση κτιρίου: Πίνακας 2.7 της ΤΟΤΕΕ 20701-1. ";
					}
					
					?>
				</div>
			<?php } else { 
				
				 include("includes/version-history.php"); 
				
			 } ?>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>