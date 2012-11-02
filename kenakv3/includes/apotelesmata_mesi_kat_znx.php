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


	include_once("includes/form_functions.php");
	
	// Υποβλήθηκε η πρώτη φόρμα
	if (isset($_POST['submit1'])) { // έλεγχος υποβολής.
		$errors = array();

		// έλεγχος δεδομένων
		$required_fields = array('embadon', 'drop_name');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('embadon' => 30, 'drop_name' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$embadon = trim(mysql_prep($_POST['embadon']));
		$drop_name = trim(mysql_prep($_POST['drop_name']));
		
		if ( empty($errors) ) {
		
		$katanalwsi = $embadon * $drop_name;
		
			echo "<br/>" . "Για εμβαδόν χώρου/κλίνες/υπνοδωμάτια: <b>" . $embadon . "</b>μ2 ";
			echo "και συντελεστή <b>" . $drop_name . "</b>" . " " . "προκύπτει κατανάλωση " . "<b> " .  $katanalwsi . " </b>μ3/έτος";
			
			}
		} else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
?>