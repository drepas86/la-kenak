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
	
	// Έλεγχος αν υποβλήθηκε η φόρμα
	if (isset($_POST['submit1'])) { // Υποβλήθηκε
		$errors = array();

		// έλεγχος δεδομένων
		$required_fields = array('paxos1', 'strwsi1');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('paxos1' => 30, 'strwsi1' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		//πάρε τις τιμές
		for ($i = 1; $i <= 10; $i++) {
		${"paxos".$i} = $_POST["paxos".$i];
		${"cl".$i} = $_POST["cl".$i];
		${"dl".$i} = $_POST["dl".$i];
		}


		//υπολογισμοί από τις τιμές
		//τα if ελέγχουν το checkbox epif και αν αυτό επιλεγεί τότε ο συντελεστής δεν λαμβάνει υπόψη το πάχος. Παίρνω δηλαδή μόνο το $strwsi.
		if ( empty($errors) ) {
		
		}	
			
		
		
			//προβολή αποτελεσμάτων
			echo "<h2>Αποτελέσματα εξωτερικής τοιχοποιίας</h2>";
			echo "<br/>" . "<table border=\"1\">";
			echo "<tr><td>U τοίχου:</td> <td><b>" . $u . "</b> </td>";
			for ($i = 1; $i <= 10; $i++) {
			echo "<tr><td>".$i."η Στρώση d/λ:</td> <td><b>" . ${"dl".$i} . "</b> </td>";
			}
			echo "</tr></table>";
			
			echo "<br/><br/>Για τις μέγιστες επιτρεπόμενες τιμές του συντελεστή θερμοπερατότητας δομικών στοιχείων ανά ζώνη κατά τον πίνακα 3.3α της ΤΟΤΕΕ 20701-1:";
			echo "<table border=\"1\"><tr><td><b>Δομικό στοιχείο</b></td><td><b>Σύμβολο</b></td><td><b>Α</b></td><td><b>Β</b></td><td><b>Γ</b></td><td><b>Δ</b></td></tr>" . 
			"<tr><td><b>Εξωτερική οριζόντια ή κεκλιμένη επιφάνεια σε επαφή με τον εξωτερικό αέρα (οροφές)</b></td><td><b>Uv_d</b></td><td><b>0,50</b></td><td><b>0,45</b></td><td><b>0,40</b></td><td><b>0,35</b></td></tr>" . 
			"<tr><td><b>Εσωτερικοί τοίχοι σε επαφή με τον εξωτερικό αέρα</b></td><td><b>Uv_w</b></td><td><b>0,60</b></td><td><b>0,50</b></td><td><b>0,45</b></td><td><b>0,40</b></td></tr>" .
			"<tr><td><b>Δάπεδα σε επαφή με τον εξωτερικό αέρα (πυλωτή)</b></td><td><b>Uv_dl</b></td><td><b>0,50</b></td><td><b>0,45</b></td><td><b>0,40</b></td><td><b>0,35</b></td></tr>" .
			"<tr><td><b>Δάπεδα σε επαφή με το έδαφος ή με κλειστούς μη θερμαινόμενους χώρους</b></td><td><b>Uv_g</b></td><td><b>1,20</b></td><td><b>0,90</b></td><td><b>0,75</b></td><td><b>0,70</b></td></tr>" .
			"<tr><td><b>Τοίχοι σε επαφή με το έδαφος ή με μη θερμαινόμενους χώρους</b></td><td><b>Uv_we</b></td><td><b>1,50</b></td><td><b>1,00</b></td><td><b>0,80</b></td><td><b>0,70</b></td></tr>" .
			"<tr><td><b>Ανοίγματα (παράθυρα, μπαλκονόπορτες)</b></td><td><b>Uv_f</b></td><td><b>3,20</b></td><td><b>3,00</b></td><td><b>2,80</b></td><td><b>2,60</b></td></tr>" .
			"<tr><td><b>Γυάλινες προσόψεις κτιρίων μη ανοιγόμενες ή μερικώς ανοιγόμενες</b></td><td><b>Uv_gf</b></td><td><b>2,20</b></td><td><b>2,00</b></td><td><b>1,80</b></td><td><b>1,80</b></td></tr></table>";
		
		} 
		else {//αν υπάρχουν λάθη δείξε τα λάθη
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}//εδώ τελειώνει ο υπολογισμός αν υποβλήθηκε η σελίδα για το u τοιχοποιίας
		
	
	
	
	// Έλεγχος αν υποβλήθηκε η φόρμα 2 για τα ανοίγματα
	if (isset($_POST['submit2'])) { // Υποβλήθηκε
		$errors = array();

		// έλεγχος δεδομένων
		$required_fields = array('platos1', 'ipsos1');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('platos1' => 30, 'ipsos1' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		//πάρε τις τιμές
		for ($i = 1; $i <= 10; $i++) {
		${"platos".$i} = $_POST["platos".$i];
		${"ipsos".$i} = $_POST["ipsos".$i];
		${"platos_plaisio".$i} = $_POST["platos_plaisio".$i];
		${"syntel_plaisio".$i} = $_POST["syntel_plaisio".$i];
		${"syntel_yalo".$i} = $_POST["syntel_yalo".$i];
		${"syntel_thermo".$i} = $_POST["syntel_thermo".$i];
		}
		
		if ( empty($errors) ) {
		//Υπολογισμοί και εμφάνιση
		echo "<table class=\"znx\" border=\"1\"><tr><td>Κούφωμα</td><td colspan=\"3\">Διαστάσεις κουφώματος</td><td colspan=\"4\">Πλαίσιο</td><td colspan=\"4\">Υαλοπίνακας</td><td colspan=\"2\">Θερμογέφυρα</td><td>U</td></tr>";
		echo "<tr><td class=\"znx\">Όνομα</td><td class=\"znx\">Πλάτος</td><td class=\"znx\">Ύψος</td><td class=\"znx\">Εμβαδόν</td><td class=\"znx\">Μήκος</td><td class=\"znx\">Πλάτος</td><td class=\"znx\">Εμβαδόν</td>";
		echo "<td class=\"znx\">Συντελεστής</td><td class=\"znx\">Πλάτος</td><td class=\"znx\">Ύψος</td><td class=\"znx\">Εμβαδόν</td><td class=\"znx\">Συντελεστής</td><td class=\"znx\">Μήκος</td><td class=\"znx\">Γραμμικός</td><td class=\"znx\">Ολικό</td></tr>";
				for ($i = 1; $i <= 10; $i++) {
				${"emvadon".$i} = ${"platos".$i} * ${"ipsos".$i};
				$emvadon += ${"emvadon".$i};
				${"mikos_plaisio".$i} = ( ${"platos".$i} + ${"ipsos".$i} ) * 2;
				${"emvadon_plaisio".$i} = ${"mikos_plaisio".$i} * ${"platos_plaisio".$i};
				${"platos_yalo".$i} = ${"platos".$i} - (${"platos_plaisio".$i}*2);
				${"ipsos_yalo".$i} = ${"ipsos".$i} - (${"platos_plaisio".$i}*2);
				${"emvadon_yalo".$i} = ${"platos_yalo".$i} * ${"ipsos_yalo".$i};
				${"mikos_thermo".$i} = ( ${"platos_yalo".$i} + ${"ipsos_yalo".$i} ) * 2;
				${"u".$i} = ( ${"emvadon_plaisio".$i} * ${"syntel_plaisio".$i} + ${"emvadon_yalo".$i} * ${"syntel_yalo".$i} + ${"mikos_thermo".$i} * ${"syntel_thermo".$i}) / (${"emvadon_plaisio".$i}+${"emvadon_yalo".$i});
				echo "<tr><td>Κούφωμα-" . $i . "</td>";
				echo "<td class=\"znx\">" . ${"platos".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"ipsos".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"emvadon".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"mikos_plaisio".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"platos_plaisio".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"emvadon_plaisio".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"syntel_plaisio".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"platos_yalo".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"ipsos_yalo".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"emvadon_yalo".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"syntel_yalo".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"mikos_thermo".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"syntel_thermo".$i} . "</td>";
				echo "<td class=\"znx\">" . ${"u".$i} . "</td></tr>";
				}
		echo "</table>";
		echo "</br>Συνολικό εμβαδόν ανοιγμάτων που δηλώθηκαν:" . $emvadon;
		
		
		} 
		else {//αν υπάρχουν λάθη δείξε τα λάθη
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}//εδώ τελειώνει ο υπολογισμός αν υποβλήθηκε η σελίδα για τα ανοίγματα
		
	}
	
	
	
	
	// Έλεγχος αν υποβλήθηκε η φόρμα 3 για δάπεδο επί εδάφους
	if (isset($_POST['submit3'])) { // Υποβλήθηκε
		$errors = array();
		// έλεγχος δεδομένων
		$required_fields = array('dapedo_ufb', 'vathos', 'xaraktiristiki');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));
		$fields_with_lengths = array('dapedo_ufb' => 30, 'vathos' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		//πάρε τις τιμές
		$dapedo_ufb = $_POST["dapedo_ufb"];
		$vathos = $_POST["vathos"];
		$xaraktiristiki = $_POST["xaraktiristiki"];

		if ( empty($errors) ) {
		//Υπολογισμοί και εμφάνιση
		echo "</br>Ufb:" . $dapedo_ufb . " [W/(m2K)]";
		echo "</br>Βάθος Ζ:" . $vathos . " m";
		echo "</br>Χαρακτηριστική διάσταση:" . $xaraktiristiki . " m";
		
		$stiles = get_xaraktiristiki($xaraktiristiki);
		$stiles1 = $stiles[0];
		$stiles2 = $stiles[1];
		$grammes = get_ufb($dapedo_ufb);
		$grammes1 = $grammes[0];
		$grammes2 = $grammes[1];
		
		
			if (!isset($stiles2)){ //H χαρακτηριστική διάσταση ακριβώς
				if (!isset($grammes2)) { //Το Ufb ακριβώς
				$timiu = get_dapedo_edafoys($stiles1, $vathos, $grammes1);
				}
				
				if (isset($grammes2)) { //Το Ufb δεν πέφτει ακριβώς
				$timiu1 = get_dapedo_edafoys($stiles1, $vathos, $grammes1);
				$timiu2 = get_dapedo_edafoys($stiles1, $vathos, $grammes2);
				$timiu = palindromisi($grammes1, $grammes2, $timiu1, $timiu2, $dapedo_ufb);
				echo "<br/>Χρησιμοποιήθηκαν Ufb " . $grammes1 . " και " . $grammes2;
				}
			}
		
			else{ //H χαρακτηριστική διάσταση δεν πέφτει ακριβώς
				if (!isset($grammes2)) { //Το Ufb ακριβώς
				$timiu1 = get_dapedo_edafoys($stiles1, $vathos, $grammes1);
				$timiu2 = get_dapedo_edafoys($stiles2, $vathos, $grammes1);
				$timiu = palindromisi($stiles1, $stiles2, $timiu1, $timiu2, $xaraktiristiki);
				echo "<br/>Χρησιμοποιήθηκαν χαρακτηριστικές διαστάσεις πλάκας " . $stiles1 . " και " . $stiles2;
				}
				
				if (isset($grammes2)) { //Το Ufb δεν πέφτει ακριβώς
				$timiu11 = get_dapedo_edafoys($stiles1, $vathos, $grammes1);
				$timiu12 = get_dapedo_edafoys($stiles1, $vathos, $grammes2);
				$timiu1 = palindromisi($grammes1, $grammes2, $timiu11, $timiu12, $dapedo_ufb);
				$timiu21 = get_dapedo_edafoys($stiles2, $vathos, $grammes1);
				$timiu22 = get_dapedo_edafoys($stiles2, $vathos, $grammes2);
				$timiu2 = palindromisi($grammes1, $grammes2, $timiu21, $timiu22, $dapedo_ufb);
				$timiu = palindromisi($stiles1, $stiles2, $timiu1, $timiu2, $xaraktiristiki);
				echo "<br/><br/>Χρησιμοποιήθηκαν Ufb " . $grammes1 . " και " . $grammes2;
				echo "<br/>Χρησιμοποιήθηκαν χαρακτηριστικές διαστάσεις πλάκας " . $stiles1 . " και " . $stiles2;
				
				echo "<table border=\"1\"><tr><td>Ufb</td><td colspan=\"2\">Χαρακτηριστική διάσταση πλάκας</td></tr>";
				echo "<tr><td></td><td>" . $stiles1 . "</td><td>" . $stiles2 . "</td></tr>";
				echo "<tr><td>" . $grammes1 . "</td><td>" . $timiu11 . "</td><td>" . $timiu21 . "</td></tr>";
				echo "<tr><td>" . $grammes2 . "</td><td>" . $timiu12 . "</td><td>" . $timiu22 . "</td></tr>";
				echo "</table>";
				}
			}
			echo "<br/><br/> Η τιμή του U' για το δάπεδο επί εδάφους είναι: " . $timiu . " [W/(m2K)]";
		
		
		
		} 
		else {//αν υπάρχουν λάθη δείξε τα λάθη
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}//εδώ τελειώνει ο υπολογισμός αν υποβλήθηκε η σελίδα για το δάπεδο επί εδάφους
		
	}
?>