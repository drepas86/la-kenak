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
			${"apost_empod".$i} . "&ypsosemp=" . ${"ypsos_empod".$i} . "&pros=" . ${"pros".$i} . "&name=" . ${"name".$i} . "\"></img><br/>";
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
			
			//Εύρεση των στηλών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΠΡΟΣΑΝΑΤΟΛΙΣΜΟΣ ΕΠΙΦΑΝΕΙΑΣ
			$arrayprosanatolismoy = get_prosanatolismo_pleyrika($pros);
			$stili1 = $arrayprosanatolismoy[0];
			$stili2 = $arrayprosanatolismoy[1];
			$prosanatolismos_epif = $arrayprosanatolismoy[2];
			$timi_stili1 = $arrayprosanatolismoy[3];
			$timi_stili2 = $arrayprosanatolismoy[4];
			
			//Εύρεση των γραμμών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΤΟΙΧΟΣ
			$arrayskiasistoixoyar = get_skiasi_pleyrika($degtoixoyar);
			$grammi1toixoyar = $arrayskiasistoixoyar[0];
			$grammi2toixoyar = $arrayskiasistoixoyar[1];
						
			$arrayskiasistoixoyde = get_skiasi_pleyrika($degtoixoyde);
			$grammi1toixoyde = $arrayskiasistoixoyde[0];
			$grammi2toixoyde = $arrayskiasistoixoyde[1];
			
			//υπολογισμός τοίχου αριστερά
			if (!isset($stili2)) {	//δεν έχει οριστεί ενδιάμεσος προσανατολισμός πλευράς
					if (!isset($grammi2toixoyar)) { //η σκίαση έχει πέσει σε στάνταρ τιμή
					$timesf = get_skiaseis_toixoy_pleyrika($stili1, $sqltable1, $grammi1toixoyar);
					$f_har = $timesf[0][0];
					$f_car = $timesf[1][0];
					}
					if (isset($grammi2toixoyar)) { //η σκίαση δεν πέφτει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις γραμμές με τη γωνία σκίασης
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable1, $grammi1toixoyar);
					$f_h1 = $timesf1[0][0];
					$f_c1 = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable1, $grammi2toixoyar);
					$f_h2 = $timesf2[0][0];
					$f_c2 = $timesf2[1][0];
					$f_har = palindromisi($grammi1toixoyar, $grammi2toixoyar, $f_h1, $f_h2, $degtoixoyar);
					$f_car = palindromisi($grammi1toixoyar, $grammi2toixoyar, $f_c1, $f_c2, $degtoixoyar);
					}
					
			}
			else{ //έχει οριστεί ενδιάμεσος προσανατολισμός
					if (!isset($grammi2toixoyar)) { //η σκίαση έχει πέσει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις στηλες (προσανατολισμός) με τον προσανατολισμό
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable1, $grammi1toixoyar);
					$f_h1_toixoy = $timesf1[0][0];
					$f_c1_toixoy = $timesf1[1][0];
					
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable1, $grammi1toixoyar);
					$f_h2_toixoy = $timesf2[0][0];
					$f_c2_toixoy = $timesf2[1][0];
					$f_har = palindromisi($timi_stili1, $timi_stili2, $f_h1_toixoy, $f_h2_toixoy, $pros);
					$f_car = palindromisi($timi_stili1, $timi_stili2, $f_c1_toixoy, $f_c2_toixoy, $pros);
					}
					if (isset($grammi2toixoyar)) { // η σκιαση έχει πέσει ενδιάμεσα. ο προσανατολισμός έχει πέσει ενδιάμεσα
					$timesf71 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable1, $grammi1toixoyar);
					$f_h71_toixoy = $timesf71[0][0];
					$f_c71_toixoy = $timesf71[1][0];
					$timesf81 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable1, $grammi1toixoyar);
					$f_h81_toixoy = $timesf81[0][0];
					$f_c81_toixoy = $timesf81[1][0];
					
					// παλινδρόμηση ανάμεσα στις τιμές της πρώτης γραμμής για στήλη 1 και 2
					$f_h11ar_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_h71_toixoy, $f_h81_toixoy, $pros);
					$f_c11ar_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_c71_toixoy, $f_c81_toixoy, $pros);
					
					$timesf72 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable1, $grammi2toixoyar);
					$f_h72_toixoy = $timesf72[0][0];
					$f_c72_toixoy = $timesf72[1][0];
					$timesf82 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable1, $grammi2toixoyar);
					$f_h82_toixoy = $timesf82[0][0];
					$f_c82_toixoy = $timesf82[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της δεύτερης γραμμής για στήλη 1 και 2
					$f_h12ar_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_h72_toixoy, $f_h82_toixoy, $pros);
					$f_c12ar_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_c72_toixoy, $f_c82_toixoy, $pros);
					// παλινδρόμηση ανάμεσα στις τιμές των δύο γραμμών που βρέθηκαν με την γωνία σκίασης.
					$f_har = palindromisi($grammi1toixoyar, $grammi2toixoyar, $f_h11ar_toixoy, $f_h12ar_toixoy, $degtoixoyar);
					$f_car = palindromisi($grammi1toixoyar, $grammi2toixoyar, $f_c11ar_toixoy, $f_c12ar_toixoy, $degtoixoyar);
					}
			}
			
			//υπολογισμός τοίχου ΔΕΞΙΑ
			if (!isset($stili2)) {	//δεν έχει οριστεί ενδιάμεσος προσανατολισμός πλευράς
					if (!isset($grammi2toixoyde)) { //η σκίαση έχει πέσει σε στάνταρ τιμή
					$timesfde = get_skiaseis_toixoy_pleyrika($stili1, $sqltable2, $grammi1toixoyde);
					$f_hde = $timesfde[0][0];
					$f_cde = $timesfde[1][0];
					}
					if (isset($grammi2toixoyde)) { //η σκίαση δεν πέφτει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις γραμμές με τη γωνία σκίασης
					$timesf1de = get_skiaseis_toixoy_pleyrika($stili1, $sqltable2, $grammi1toixoyde);
					$f_h1 = $timesf1de[0][0];
					$f_c1 = $timesf1de[1][0];
					$timesf2de = get_skiaseis_toixoy_pleyrika($stili1, $sqltable2, $grammi2toixoyde);
					$f_h2 = $timesf2de[0][0];
					$f_c2 = $timesf2de[1][0];
					$f_hde = palindromisi($grammi1toixoyde, $grammi2toixoyde, $f_h1, $f_h2, $degtoixoyde);
					$f_cde = palindromisi($grammi1toixoyde, $grammi2toixoyde, $f_c1, $f_c2, $degtoixoyde);
					}
					
			}
			else{ //έχει οριστεί ενδιάμεσος προσανατολισμός
					if (!isset($grammi2toixoyde)) { //η σκίαση έχει πέσει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις στηλες (προσανατολισμός) με τον προσανατολισμό
					$timesf1de = get_skiaseis_toixoy_pleyrika($stili1, $sqltable2, $grammi1toixoyde);
					$f_h1de_toixoy = $timesf1de[0][0];
					$f_c1de_toixoy = $timesf1de[1][0];
					$timesf2de = get_skiaseis_toixoy_pleyrika($stili2, $sqltable2, $grammi1toixoyde);
					$f_h2de_toixoy = $timesf2de[0][0];
					$f_c2de_toixoy = $timesf2de[1][0];
					$f_hde = palindromisi($stili1, $stili2, $f_h1de_toixoy, $f_h2de_toixoy, $pros);
					$f_cde = palindromisi($stili1, $stili2, $f_c1de_toixoy, $f_c2de_toixoy, $pros);
					}
					if (isset($grammi2toixoyde)) { // η σκιαση έχει πέσει ενδιάμεσα. ο προσανατολισμός έχει πέσει ενδιάμεσα
					$timesf71de = get_skiaseis_toixoy_pleyrika($stili1, $sqltable2, $grammi1toixoyde);
					$f_h71de_toixoy = $timesf71de[0][0];
					$f_c71de_toixoy = $timesf71de[1][0];
					$timesf81de = get_skiaseis_toixoy_pleyrika($stili2, $sqltable2, $grammi1toixoyde);
					$f_h81de_toixoy = $timesf81de[0][0];
					$f_c81de_toixoy = $timesf81de[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της πρώτης γραμμής για στήλη 1 και 2
					$f_h11de_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_h71de_toixoy, $f_h81de_toixoy, $pros);
					$f_c11de_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_c71de_toixoy, $f_c81de_toixoy, $pros);
					
					$timesf72de = get_skiaseis_toixoy_pleyrika($stili1, $sqltable2, $grammi2toixoyde);
					$f_h72de_toixoy = $timesf72de[0][0];
					$f_c72de_toixoy = $timesf72de[1][0];
					$timesf82de = get_skiaseis_toixoy_pleyrika($stili2, $sqltable2, $grammi2toixoyde);
					$f_h82de_toixoy = $timesf82de[0][0];
					$f_c82de_toixoy = $timesf82de[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της δεύτερης γραμμής για στήλη 1 και 2
					$f_h12de_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_h72de_toixoy, $f_h82de_toixoy, $pros);
					$f_c12de_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_c72de_toixoy, $f_c82de_toixoy, $pros);
					// παλινδρόμηση ανάμεσα στις τιμές των δύο γραμμών που βρέθηκαν με την γωνία σκίασης.
					$f_hde = palindromisi($grammi1toixoyde, $grammi2toixoyde, $f_h11de_toixoy, $f_h12de_toixoy, $degtoixoyde);
					$f_cde = palindromisi($grammi1toixoyde, $grammi2toixoyde, $f_c11de_toixoy, $f_c12de_toixoy, $degtoixoyde);
					}
			}
			$f_h_syn = $f_hde * $f_har;
			$f_c_syn = $f_cde * $f_car;
			
			
			//Προβολή των υπολογισμών
			
			if (${"name".$i}!=''){
			echo "<tr><td>" . ${"name".$i} . "</td><td>" . $degtoixoyar . " μοίρες</td><td>" . $degtoixoyde . " μοίρες</td><td>Πίνακας: " . $pinakasthesisar . $pinakasthesisde . "</td><td>" . 
			$prosanatolismos_epif . "</td><td>" . round($f_har,3) . "</td><td>" . round($f_car,3) . "</td><td>" . round($f_hde,3) . "</td><td>" . round($f_cde,3) . "</td><td>" . round($f_h_syn,3) . "</td><td>" . round($f_c_syn,3) . "</td></tr>";
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