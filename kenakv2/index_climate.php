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
<?php find_selected_page(); ?>
<?php include("includes/header_climate.php"); ?>
<div class="topright"><img src="images/home.png" align="right"></img><a href="index.php">Βιβλιοθήκες</a><br/><a href="index_climate.php">Κλιματικά δεδομένα</a><br/><a href="index_skiaseis.php">Υπολογισμός Σκιάσεων</a><br/><a href="stoixeia_zwnis.php">Στοιχεία ζώνης</a><br/><a href="domika_kelyfos.php">Κέλυφος</a><br/><a href="kenak.php">ΚΕΝΑΚ</a></div>

<table id="structure">
	<tr>
		<td id="navigation">
		<ol class="listmenu" type="circle">
<?php		
$d[41]="Μέση μηνιαία θερμοκρασία εικοσιτετραώρου";
$d[42]="Μέση μηνιαία θερμοκρασία κατά τη διάρκεια της ημέρας";
$d[43]="Μέση μέγιστη μηνιαία θερμοκρασία";
$d[44]="Μέση ελάχιστη μηνιαία θερμοκρασία";
$d[45]="Μέση απολύτως μέγιστη μηνιαία θερμοκρασία";
$d[46]="Μέση απολύτως ελάχιστη μηνιαία θερμοκρασία";
$d[47]="Βαθμοημέρες θέρμανσης σε θ αναφοράς";
$d[48]="Βαθμοημέρες ψύξης σε θ αναφοράς";
$d[49]="Μέση μηνιαία σχετική υγρασία";
$d[50]="Μέση μηνιαία ειδικη υγρασία";
$d[51]="Μέση ταχύτητα του ανέμου";
$d[52]="Μέση θερμοκρασία νερού δικτύου";
$d[53]="Μέση μηνιαία ηλιακή ακτινοβολία στο οριζόντιο επίπεδο";
$d[54]="Μέση μηνιαία διάχυτη ηλιακή ακτινοβολία στο οριζόντιο επίπεδο";
$d[55]="Μέσος μηνιαίος συντελεστής αιθριότητας";
for ($i=41;$i<=55;$i++){
	echo "<li";
	if ($i==$sel_page['id']) echo " class=\"selected\"";
	echo "><a href=\"index_climate.php?page=".$i."\">".$d[$i]."</a><br/></li>";
}?>			
		</ol>	
		</td>
		<td id="page">
			<?php if ($sel_page) { ?>
				<h2><?php echo $sel_page['menu_name']; ?></h2>
				<div class="page-content">
					<?php 
					echo "<br/>";
					if ($sel_page["id"] > 0){
					$vivliothikes = get_climate($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Μέρος</td><td class=\"vivliothikic\" >ΙΑΝ</td><td class=\"vivliothikic\">ΦΕΒ</td><td class=\"vivliothikic\">ΜΑΡ</td>
						<td class=\"vivliothikic\">ΑΠΡ</td><td class=\"vivliothikic\">ΜΑΙ</td><td class=\"vivliothikic\">ΙΟΥΝ</td><td class=\"vivliothikic\">ΙΟΥΛ</td>
						<td class=\"vivliothikic\">ΑΥΓ</td><td class=\"vivliothikic\">ΣΕΠ</td><td class=\"vivliothikic\">ΟΚΤ</td><td class=\"vivliothikic\">ΝΟΕ</td><td class=\"vivliothikic\">ΔΕΚ</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothikil\" width=\"37%\">" . $vivliothikes[$i]["place"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["jan"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["feb"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["mar"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["apr"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["may"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["jun"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["jul"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["aug"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["sep"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["okt"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["nov"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"5%\">" . $vivliothikes[$i]["dec"] . "</td>";
						echo "</tr>";
						}
						echo "<tr style=\"background-color: #558806;color:#ffffff;\"><td>Α/Α</td><td>Μέρος</td><td class=\"vivliothikic\" >ΙΑΝ</td><td class=\"vivliothikic\">ΦΕΒ</td><td class=\"vivliothikic\">ΜΑΡ</td>
						<td class=\"vivliothikic\">ΑΠΡ</td><td class=\"vivliothikic\">ΜΑΙ</td><td class=\"vivliothikic\">ΙΟΥΝ</td><td class=\"vivliothikic\">ΙΟΥΛ</td>
						<td class=\"vivliothikic\">ΑΥΓ</td><td class=\"vivliothikic\">ΣΕΠ</td><td class=\"vivliothikic\">ΟΚΤ</td><td class=\"vivliothikic\">ΝΟΕ</td><td class=\"vivliothikic\">ΔΕΚ</td></tr>";
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)";
					}
						
					
					?>
				</div>
			<?php } else { ?>
				<h2>Welcome to La-Kenak v<?=VERSION?> <br/><br/><br/><br/> <img src="images/intro.png"></img></h2>
			<?php } ?>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>