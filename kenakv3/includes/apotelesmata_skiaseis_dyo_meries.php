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
		
		// Υπολογισμών σκιάσεων δεξιά και αριστερά αν υποβλήθηκε η φόρμα
	if (isset($_POST['submit4'])) { // υποβλήθηκε η φόρμα.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$required_fields = array('name1', 'platos_toixoy1', 'apost_ar1', 'mikos_ar1', 'apost_de1', 'mikos_de1', 'pros1');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('name1' => 30, 'platos_toixoy1' => 30, 'apost_ar1' => 30, 'mikos_ar1' => 30, 'apost_de1' => 30, 'mikos_de1' => 30, 'pros1' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		
		for ($i=1;$i<=10;$i++){
		${"name".$i} = trim(mysql_prep($_POST["name".$i]));
		${"platos_toixoy".$i} = trim(mysql_prep($_POST["platos_toixoy".$i]));
		${"apost_ar".$i} = trim(mysql_prep($_POST["apost_ar".$i]));
		${"mikos_ar".$i} = trim(mysql_prep($_POST["mikos_ar".$i]));
		${"apost_de".$i} = trim(mysql_prep($_POST["apost_de".$i]));
		${"mikos_de".$i} = trim(mysql_prep($_POST["mikos_de".$i]));
		${"pros".$i} = trim(mysql_prep($_POST["pros".$i]));
		}
		
		if ( empty($errors) ) {
		
			echo "<img src=\"images/pleyrika.png\"></img><br/>";
			//Προβολή της εικόνας από τα δεδομένα του χρήστη (χρήση img tag με τη σελίδα δημιουργίας)
			for ($i=1;$i<=10;$i++){
			if (${"name".$i}!=''){
			echo "<img src=\"includes/image_creation_dyo_meries.php" . 
			"?platos_toixoy=" . ${"platos_toixoy".$i} . "&apost_ar=" . ${"apost_ar".$i} . "&mikos_ar=" . 
			${"mikos_ar".$i} . "&apost_de=" . ${"apost_de".$i} . "&mikos_de=" . ${"mikos_de".$i} . "&apostemp=" . 
			${"apost_empod".$i} . "&ypsosemp=" . ${"ypsos_empod".$i} . "&pros=" . ${"pros".$i} . "&name=" . ${"name".$i} . "\"></img>";
			}
			}
			
			
			//Προβολή των επιλογών του χρήστη
			echo "<table border=\"1\"><tr><td>Όνομα στοιχείου</td><td>Πλάτος τοίχου</td><td>Απόσταση εμποδίου αριστερά</td>" . 
			"<td>Μήκος εμποδίου αριστερά</td><td>Απόσταση εμποδίου δεξιά</td><td>Μήκος εμποδίου δεξιά</td><td>Προσανατολισμός</td></tr>";
			
			for ($i=1;$i<=10;$i++){
			if (${"name".$i}!=''){
			echo "<tr><td>" . ${"name".$i} . "</td><td>" . ${"platos_toixoy".$i} . "</td><td>" . ${"apost_ar".$i} . "</td><td>" . ${"mikos_ar".$i} . "</td><td>" . 
			${"apost_de".$i} . "</td><td>" . ${"mikos_de".$i} . "</td><td>" . ${"pros".$i} . "</td></tr>";
			}
			}
			
			echo "</table><br/><br/>";
			
			echo "<table border=\"1\"><tr><td>Όνομα στοιχείου</td><td>Γωνία σκίασης τοίχου αριστερά</td><td>Γωνία σκίασης τοίχου δεξιά</td><td>Πίνακας σκιάσεων</td>" . 
			"<td>Προσανατολισμός επιφάνειας</td><td>f_fin_h Τοίχου αριστερά</td><td>f_fin_c Τοίχου αριστερά</td><td>f_fin_h τοίχου δεξιά</td><td>f_fin_c τοίχου δεξιά</td><td>f_fin_h Συνολικό</td><td>f_fin_c Συνολικό</td></tr>";
		
		for ($i=1;$i<=10;$i++){
			//Βρες τις μοίρες για τις γωνίες και στρογγυλοποίησέ τες χωρίς δεκαδικά
			$pros = ${"pros".$i};
			$tantoixoyar = (${"mikos_ar".$i} / (${"apost_ar".$i} + (${"platos_toixoy".$i}/2)));
			$degtoixar = rad2deg(atan($tantoixoyar));
			$degtoixoyar = round($degtoixar);
			
			$tantoixoyde = (${"mikos_de".$i} / (${"apost_de".$i} + (${"platos_toixoy".$i}/2)));
			$degtoixde = rad2deg(atan($tantoixoyde));
			$degtoixoyde = round($degtoixde);
			
			//Ορισμός του πίνακα για σκιάσεις
			$sqltable1 = "skiaseis_aristera";
			$sqltable2 = "skiaseis_deksia";
			$pinakasthesisar = "320a";
			$pinakasthesisde = "320b";
			
			$array_ar = calc_skiasi_fin($degtoixoyar, ${"pros".$i}, 1);
			$f_har = $array_ar[0];
			$f_car = $array_ar[1];
			$array_de = calc_skiasi_fin($degtoixoyde, ${"pros".$i}, 2);
			$f_hde = $array_de[0];
			$f_cde = $array_de[1];
			
			
			
			$f_h_syn = $f_hde * $f_har;
			$f_c_syn = $f_cde * $f_car;
			
			
			//Προβολή των υπολογισμών
			
			if (${"name".$i}!=''){
			echo "<tr><td>" . ${"name".$i} . "</td><td>" . $degtoixoyar . " μοίρες</td><td>" . $degtoixoyde . " μοίρες</td><td>Πίνακας: " . $pinakasthesisar . $pinakasthesisde . "</td><td>" . 
			$prosanatolismos_epif . "</td><td>" . $f_har . "</td><td>" . $f_car . "</td><td>" . $f_hde . "</td><td>" . $f_cde . "</td><td>" . $f_h_syn . "</td><td>" . $f_c_syn . "</td></tr>";
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