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

		// Υπολογισμοί σκιάσεων δεξιά ή αριστερά αν υποβλήθηκε η φόρμα
	if (isset($_POST['submit1'])) { // υποβλήθηκε η φόρμα.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$required_fields = array('name1', 'platos_toixoy1', 'apost_empod1', 'platos_anoig1', 'apost_anoig_empod1', 'apost_yalo1', 'mikos_empod1', 'pros1');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('name1' => 30, 'platos_toixoy1' => 30, 'apost_empod1' => 30, 'platos_anoig1' => 30, 'apost_anoig_empod1' => 30, 'apost_yalo1' => 30, 'mikos_empod1' => 30, 'pros1' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		
		for ($i=1;$i<=10;$i++){
		${"name".$i} = trim(mysql_prep($_POST["name".$i]));
		${"platos_toixoy".$i} = trim(mysql_prep($_POST["platos_toixoy".$i]));
		${"apost_empod".$i} = trim(mysql_prep($_POST["apost_empod".$i]));
		${"platos_anoig".$i} = trim(mysql_prep($_POST["platos_anoig".$i]));
		${"apost_anoig_empod".$i} = trim(mysql_prep($_POST["apost_anoig_empod".$i]));
		${"apost_yalo".$i} = trim(mysql_prep($_POST["apost_yalo".$i]));
		${"mikos_empod".$i} = trim(mysql_prep($_POST["mikos_empod".$i]));
		${"thesi".$i} = trim(mysql_prep($_POST["thesi".$i]));
		${"pros".$i} = trim(mysql_prep($_POST["pros".$i]));
		}
		
		if ( empty($errors) ) {
			//Προβολή της στάνταρ εικόνας πλευρικών σκιάσεων
			echo "<img src=\"images/pleyrika.png\"></img><br/>";

			//Προβολή της εικόνας από τα δεδομένα του χρήστη (χρήση img tag με τη σελίδα δημιουργίας)
			for ($i=1;$i<=10;$i++){
			if (${"name".$i}!=''){
			echo "<img src=\"includes/image_creation_pleyrika.php" . 
			"?platost=" . ${"platos_toixoy".$i} . "&aposte=" . ${"apost_empod".$i} . "&platosa=" . 
			${"platos_anoig".$i} . "&aposta=" . ${"apost_anoig_empod".$i} . "&mikose=" . ${"mikos_empod".$i} . "&name=" . ${"name".$i} . "&apost_yalo=" .${"apost_yalo".$i} . "\"></img>";
			}
			}
			
			//Εαν το παραπάνω δημιουργεί πρόβλημα δοκιμή με iframe
			/*
			echo "<iframe frameborder=\"0\" width=\"400\" height=\"400\" src=\"includes/image_creation_pleyrika.php" . 
			"?platos_toixoy=" . $platos_toixoy . "&apost_empod=" . $apost_empod . "&platos_anoig=" . 
			$platos_anoig . "&apost_anoig_empod=" . $apost_anoig_empod . "&mikos_empod=" . $mikos_empod . "&name=" . $name . "\"></iframe>"; 
			*/
			
			//Προβολή των επιλογών του χρήστη
			echo "<br/><br/><table border=\"1\"><tr><td>Όνομα στοιχείου</td><td>Πλάτος τοίχου</td><td>Απόσταση εμποδίου</td><td>Πλάτος ανοίγματος</td>" . 
			"<td>Απόσταση ανοίγματος από εμπόδιο</td><td>Απόσταση υαλοστασίων</td><td>Μήκος εμποδίου</td><td>Θέση εμποδίου</td><td>Προσανατολισμός</td></tr>";
			
			for ($i=1;$i<=10;$i++){
			if (${"name".$i}!=''){
			echo "<tr><td>" . ${"name".$i} . "</td><td>" . ${"platos_toixoy".$i} . "</td><td>" . ${"apost_empod".$i} . "</td><td>" . ${"platos_anoig".$i} . "</td><td>" . 
			${"apost_anoig_empod".$i} . "</td><td>" . ${"apost_yalo".$i} . "</td><td>" . ${"mikos_empod".$i} . "</td><td>" . ${"thesi".$i} . "</td><td>" . ${"pros".$i} . "</td></tr>";
			}
			}
			
			echo "</table><br/><br/>";
			
			echo "<table border=\"1\"><tr><td>Όνομα στοιχείου</td><td>Γωνία σκίασης τοίχου</td><td>Γωνία σκίασης ανοίγματος</td><td>Πίνακας σκιάσεων</td>" . 
			"<td>Προσανατολισμός επιφάνειας</td><td>f_fin_h Τοίχου</td><td>f_fin_c Τοίχου</td><td>f_fin_h Ανοίγματος</td><td>f_fin_c Ανοίγματος</td></tr>";
			
		for ($i=1;$i<=10;$i++){
			//Βρες τις μοίρες για τις γωνίες και στρογγυλοποίησέ τες χωρίς δεκαδικά
			$tantoixoy = (((${"platos_toixoy".$i} / 2) + ${"apost_empod".$i}) / ${"mikos_empod".$i});
			$degtoix = (90 - rad2deg(atan($tantoixoy)));
			$degtoixoy = round($degtoix);
			$tananoig = (((${"platos_anoig".$i} / 2) + ${"apost_anoig_empod".$i}) / (${"mikos_empod".$i}+${"apost_yalo".$i}));
			$deganoigm = (90 - rad2deg(atan($tananoig)));
			$deganoigmatos = round($deganoigm);
			$pros = ${"pros".$i};
			
			//Προβολή του πίνακα της ΤΟΤΕΕ για πλευρικές σκιάσεις
			if (${"thesi".$i} == 1) { 
			$pinakasthesis = "320a";
			$sqltable = "skiaseis_aristera";
			}
			else {
			$pinakasthesis = "320b";
			$sqltable = "skiaseis_deksia";
			}
			
			$array_toixoy = calc_skiasi_fin($degtoixoy, ${"pros".$i}, ${"thesi".$i});
			$f_h = $array_toixoy[0];
			$f_c = $array_toixoy[1];
			$array_anoigmatos = calc_skiasi_fin($deganoigm, ${"pros".$i}, ${"thesi".$i});
			$f_h_an = $array_anoigmatos[0];
			$f_c_an = $array_anoigmatos[1];
		
			
			
			//Προβολή των υπολογισμών

			if (${"name".$i}!=''){
			echo "<tr><td>" . ${"name".$i} . "</td><td>" . $degtoixoy . " μοίρες</td><td>" . $deganoigmatos . " μοίρες</td><td>Πίνακας: " . $pinakasthesis . "</td><td>" . 
			${"pros".$i} . "</td><td>" . $f_h . "</td><td>" . $f_c . "</td><td>" . $f_h_an . "</td><td>" . $f_c_an . "</td></tr>";
			}
		}//επανάληψη x10	
			
			echo "</table>";
			
			
		} else {
			if (count($errors) == 1) {
				$message = "Βρέθηκε 1 λάθος στη φόρμα εισόδου.";
			} else {
				$message = "Βρέθηκαν " . count($errors) . " λάθη στη φόρμα εισόδου.";
			}
		}
		
	}
?>