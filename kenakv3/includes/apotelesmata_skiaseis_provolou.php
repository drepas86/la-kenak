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
*/
		
		// Υπολογισμών σκιάσεων προβόλου αν υποβλήθηκε η φόρμα
	if (isset($_POST['submit3'])) { // υποβλήθηκε η φόρμα.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$required_fields = array('name1', 'ipsos_toixoy1', 'ipsos_portas1', 'ipsos_parath1', 'ipsos_podias1', 'apost_yalo1', 'mikos_prov1', 'pros1');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('name1' => 30, 'ipsos_toixoy1' => 30, 'ipsos_portas1' => 30, 'ipsos_parath1' => 30, 'ipsos_podias1' => 30, 'apost_yalo1' => 30, 'mikos_prov1' => 30, 'pros1' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		
		for ($i=1;$i<=10;$i++){
		${"name".$i} = trim(mysql_prep($_POST["name".$i]));
		${"ipsos_toixoy".$i} = trim(mysql_prep($_POST["ipsos_toixoy".$i]));
		${"ipsos_portas".$i} = trim(mysql_prep($_POST["ipsos_portas".$i]));
		${"ipsos_parath".$i} = trim(mysql_prep($_POST["ipsos_parath".$i]));
		${"ipsos_podias".$i} = trim(mysql_prep($_POST["ipsos_podias".$i]));
		${"apost_yalo".$i} = trim(mysql_prep($_POST["apost_yalo".$i]));
		${"mikos_prov".$i} = trim(mysql_prep($_POST["mikos_prov".$i]));
		${"pros".$i} = trim(mysql_prep($_POST["pros".$i]));
		}
		
		if ( empty($errors) ) {
		
			echo "<img src=\"images/provolos.png\"></img><br/>";
			//Προβολή της εικόνας από τα δεδομένα του χρήστη (χρήση img tag με τη σελίδα δημιουργίας)
			for ($i=1;$i<=10;$i++){
			if (${"name".$i}!=''){
			echo "<img src=\"includes/image_creation_provolou.php" . "?ipsos_toixoy=" . ${"ipsos_toixoy".$i} . "&ipsos_portas=" . ${"ipsos_portas".$i} . "&ipsos_parath=" . 
			${"ipsos_parath".$i} . "&ipsos_podias=" . ${"ipsos_podias".$i} . "&mikos_prov=" . ${"mikos_prov".$i} . "&pros=" . ${"pros".$i} . "&name=" . ${"name".$i} . "&apost_yalo=" . ${"apost_yalo".$i} . "\"></img>";
			}
			}
			
			
			//Προβολή των επιλογών του χρήστη
			echo "<table border=\"1\"><tr><td>Όνομα στοιχείου</td><td>Ύψος τοίχου</td><td>Ύψος πόρτας</td><td>Ύψος ανοίγματος</td>" . 
			"<td>Ύψος ποδιάς</td><td>Απόσταση υαλοστασίων</td><td>Mήκος προβόλου</td><td>Προσανατολισμός</td></tr>";
			
			for ($i=1;$i<=10;$i++){
			if (${"name".$i}!=''){
			echo "<tr><td>" . ${"name".$i} . "</td><td>" . ${"ipsos_toixoy".$i} . "</td><td>" . ${"ipsos_portas".$i} . "</td><td>" . ${"ipsos_parath".$i} . "</td><td>" . 
			${"ipsos_podias".$i} . "</td><td>" . ${"apost_yalo".$i} . "</td><td>" . ${"mikos_prov".$i} . "</td><td>" . ${"pros".$i} . "</td></tr>";
			}
			}
			
			echo "</table><br/><br/>";
			
			echo "<table border=\"1\"><tr><td>Όνομα στοιχείου</td><td>Γωνία σκίασης τοίχου</td><td>Γωνία σκίασης πόρτας</td><td>Γωνία σκίασης ανοίγματος</td><td>Πίνακας σκιάσεων</td>" . 
			"<td>Προσανατολισμός επιφάνειας</td><td>f_ov_h Τοίχου</td><td>f_ov_c Τοίχου</td><td>f_ov_h Πόρτας</td><td>f_ov_c Πόρτας</td><td>f_ov_h Ανοίγματος</td><td>f_ov_c Ανοίγματος</td></tr>";
			
		for ($i=1;$i<=10;$i++){
			//Βρες τις μοίρες για τις γωνίες και στρογγυλοποίησέ τες χωρίς δεκαδικά
			$pros = ${"pros".$i};
			$tantoixoy = (${"mikos_prov".$i}  / (${"ipsos_toixoy".$i} / 2));
			$degtoix = rad2deg(atan($tantoixoy));
			$degtoixoy = round($degtoix);
			$tananoig = ((${"mikos_prov".$i}+${"apost_yalo".$i}) / (${"ipsos_toixoy".$i} - ${"ipsos_podias".$i} - (${"ipsos_parath".$i}/2)));
			$deganoigm = rad2deg(atan($tananoig));
			$deganoigmatos = round($deganoigm);
			$tanpo = ((${"mikos_prov".$i}+${"apost_yalo".$i}) / (${"ipsos_toixoy".$i} -(${"ipsos_portas".$i}/2)));
			$degpor = rad2deg(atan($tanpo));
			$degport = round($degpor);
			
			//Ορισμός του πίνακα για σκιάσεις
			$sqltable = "skiaseis_provolos";
			$pinakasthesis = "319";
			
			$array_toixoy = calc_skiasi_ov($degtoixoy, ${"pros".$i});
			$f_h = $array_toixoy[0];
			$f_c = $array_toixoy[1];
			$array_portas = calc_skiasi_ov($degport, ${"pros".$i});
			$f_h_port = $array_portas[0];
			$f_c_port = $array_portas[1];
			$array_anoigmatos = calc_skiasi_ov($deganoigmatos, ${"pros".$i});
			$f_h_an = $array_anoigmatos[0];
			$f_c_an = $array_anoigmatos[1];
			
			//Προβολή των υπολογισμών
			
			if (${"name".$i}!=''){
			echo "<tr><td>" . ${"name".$i} . "</td><td>" . $degtoixoy . " μοίρες</td><td>" . $degport . " μοίρες</td><td>" . $deganoigmatos . " μοίρες</td><td>Πίνακας: " . $pinakasthesis . "</td><td>" . 
			${"pros".$i} . "</td><td>" . $f_h . "</td><td>" . $f_c . "</td><td>" . $f_h_port . "</td><td>" . $f_c_port . "</td><td>" . $f_h_an . "</td><td>" . $f_c_an . "</td></tr>";
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