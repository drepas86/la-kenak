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

	// Υποβλήθηκε η δεύτερη φόρμα
	if (isset($_POST['submit2'])) { // έλεγχος υποβολής
		$errors = array();

		// έλεγχος δεδομένων
		$required_fields = array('embadon', 'drop_name', 'embadon_parath1', 'embadon_thyr1');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('embadon' => 30, 'drop_name' => 30, 'embadon_parath1' => 30, 'embadon_thyr1' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$embadon = trim(mysql_prep($_POST['embadon']));
		$drop_name = trim(mysql_prep($_POST['drop_name']));
		$embadon_parath1 = trim(mysql_prep($_POST['embadon_parath1']));
		$embadon_thyr1 = trim(mysql_prep($_POST['embadon_thyr1']));
		$embadon_parath2 = trim(mysql_prep($_POST['embadon_parath2']));
		$embadon_thyr2 = trim(mysql_prep($_POST['embadon_thyr2']));
		$embadon_parath3 = trim(mysql_prep($_POST['embadon_parath3']));
		$embadon_thyr3 = trim(mysql_prep($_POST['embadon_thyr3']));
		$embadon_parath4 = trim(mysql_prep($_POST['embadon_parath4']));
		$embadon_thyr4 = trim(mysql_prep($_POST['embadon_thyr4']));
		$embadon_parath5 = trim(mysql_prep($_POST['embadon_parath5']));
		$embadon_thyr5 = trim(mysql_prep($_POST['embadon_thyr5']));
		$embadon_parath6 = trim(mysql_prep($_POST['embadon_parath6']));
		$embadon_thyr6 = trim(mysql_prep($_POST['embadon_thyr6']));

		
		if ( empty($errors) ) {
		
		$di_apaitoymeni = $embadon * $drop_name;
		$di_portes1 = $embadon_thyr1 * 11.8;
		$di_portes2 = $embadon_thyr2 * 9.8;
		$di_portes3 = $embadon_thyr3 * 7.9;
		$di_portes4 = $embadon_thyr4 * 7.4;
		$di_portes5 = $embadon_thyr5 * 5.3;
		$di_portes6 = $embadon_thyr6 * 4.8;
		$di_parath1 = $embadon_parath1 * 15.1;
		$di_parath2 = $embadon_parath2 * 12.5;
		$di_parath3 = $embadon_parath3 * 10;
		$di_parath4 = $embadon_parath4 * 8.7;
		$di_parath5 = $embadon_parath5 * 6.8;
		$di_parath6 = $embadon_parath6 * 6.2;
		$embadon_portes = $di_portes1 + $di_portes2 + $di_portes3 + $di_portes4 + $di_portes5 + $di_portes6;
		$embadon_parathyra = $di_parath1 + $di_parath2 + $di_parath3 + $di_parath4 + $di_parath5 + $di_parath6;
		$di_portes = $di_portes1 + $di_portes2 + $di_portes3 + $di_portes4 + $di_portes5 + $di_portes6;
		$di_parath = $di_parath1 + $di_parath2 + $di_parath3 + $di_parath4 + $di_parath5 + $di_parath6;
		$di_synolo = $di_portes + $di_parath;
		
				if ($di_apaitoymeni <= $di_synolo){
				$apaitisi = "<font color=\"blue\"><b>Ικανοποιείται</b> η απαίτηση καθώς Απαιτούμενη διείσδυση: <b>" . $di_apaitoymeni . "</b> m3/h<b> < ή = </b>" . "Συνολική διείσδυση: <b>" . $di_synolo . "</b> m3/h</font>";
				}
				else {
				$apaitisi = "<font color=\"red\"><b>Δεν κανοποιείται</b> η απαίτηση καθώς Απαιτούμενη διείσδυση: <b>" . $di_apaitoymeni . "</b> m3/h<b> > </b>" . "Συνολική διείσδυση: <b>" . $di_synolo . "</b> m3/h</font>";
				}
		
			echo "<br/>" . "Για εμβαδόν χώρου: <b>" . $embadon . "</b> m2 ";
			echo "και συντελεστή χρήσης <b>" . $drop_name . "</b>" . " " . "η απαιτούμενη διείσδυση αέρα " . "<font color=\"red\"><b> " .  $di_apaitoymeni . " </b>m3/h</font><br/><br/>";
			echo "Σύμφωνα με τον πίνακα 3.26 της ΤΟΤΕΕ 20701-1 ισχύουν τα ακόλουθα για τα στοιχεία που ορίσατε:<br/><br/>";
			echo "<table border=\"1\" ><tr><td>Είδος ανοίγματος</td><td>Εμβαδόν θυρών (m2)</td><td>Εμβαδόν παραθύρων (m2)</td><td>Διείσδυση θυρών(m3/h)</td><td>Διείσδυση παραθύρων(m3/h)</td></tr>";
			echo "<tr><td><b>Κουφώματα με ξύλινο πλαίσιο</b></td></tr>";
			echo "<tr><td>Κούφωμα με μονό υαλοπίνακα, μη αεροστεγές χωνευτό ή συρόμενο</td><td>" . $embadon_thyr1 . "</td><td>" . $embadon_parath1 . "</td><td>" .  $di_portes1 . "</td><td>" .  
			$di_parath1 . "</td></tr>";
			echo "<tr><td>Κούφωμα με δίδυμο υαλοπίνακα, συρόμενα επάλληλα ή μη, με ψύκτρες, αεροστεγές, με πιστοποίηση.<br/>Ανοιγόμενο κούφωμα με διπλό υαλοπίνακα, μη πιστοποιημένο.</td><td>" . 
			$embadon_thyr2 . "</td><td>" . $embadon_parath2 . "</td><td>" .  $di_portes2 . "</td><td>" .  $di_parath2 . "</td></tr>";
			echo "<tr><td>Ανοιγόμενο κούφωμα με δίδυμο υαλοπίνακα, αεροστεγές, με πιστοποίηση.<br/>Κούφωμα χωρίς υαλοπίνακα, αεροστεγές, με πιστοποίηση.</td><td>" . 
			$embadon_thyr3 . "</td><td>" . $embadon_parath3 . "</td><td>" .  $di_portes3 . "</td><td>" .  $di_parath3 . "</td></tr>";
			echo "<tr><td><b>Κουφώματα με μεταλλικό ή συνθετικό πλαίσιο</b></td></tr>";
			echo "<tr><td>Κούφωμα με μονό υαλοπίνακα, μη αεροστεγές χωνευτό ή συρόμενο</td><td>" . $embadon_thyr4 . "</td><td>" . $embadon_parath4 . "</td><td>" .  $di_portes4 . "</td><td>" .  
			$di_parath4 . "</td></tr>";
			echo "<tr><td>Κούφωμα με δίδυμο υαλοπίνακα, συρόμενα επάλληλα ή μη, με ψύκτρες, αεροστεγές, με πιστοποίηση.<br/>Ανοιγόμενο κούφωμα με διπλό υαλοπίνακα, μη πιστοποιημένο.</td><td>" . 
			$embadon_thyr5 . "</td><td>" . $embadon_parath5 . "</td><td>" .  $di_portes5 . "</td><td>" .  $di_parath5 . "</td></tr>";
			echo "<tr><td>Ανοιγόμενο κούφωμα με δίδυμο υαλοπίνακα, αεροστεγές, με πιστοποίηση.<br/>Κούφωμα χωρίς υαλοπίνακα, αεροστεγές, με πιστοποίηση.</td><td>" . 
			$embadon_thyr6 . "</td><td>" . $embadon_parath6 . "</td><td>" .  $di_portes6 . "</td><td>" .  $di_parath6 . "</td></tr>";
			echo "<tr><td><b>Σύνολο</b></td><td>" . $embadon_portes . "</td><td>" . $embadon_parathyra . "</td><td>" . $di_portes . "</td><td>" . $di_parath . "</td></tr>";
			echo "<tr></tr><tr><td><b>Σύνολο Διείσδυσης:</b></td><td><font color=\"red\"><b>" . $di_synolo . "</b> m3/h</font></td><tr></table><br/><br/>";
			echo $apaitisi;
			
			
			
			
			
			}
		} else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
		
?>