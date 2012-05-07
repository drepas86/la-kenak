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
		
		// Υπολογισμών σκιάσεων ορίζοντα αν υποβλήθηκε η φόρμα
	if (isset($_POST['submit2'])) { // υποβλήθηκε η φόρμα.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$required_fields = array('name', 'ipsos_toixoy', 'ipsos_portas', 'ipsos_parath', 'ipsos_podias', 'apost_yalo', 'apost_empod', 'ypsos_empod', 'pros');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('name' => 30, 'ipsos_toixoy' => 30, 'ipsos_portas' => 30, 'ipsos_parath' => 30, 'ipsos_podias' => 30, 'apost_yalo' => 30, 'apost_empod' => 30, 'ypsos_empod' => 30, 'pros' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$name = trim(mysql_prep($_POST['name']));
		$ipsos_toixoy = trim(mysql_prep($_POST['ipsos_toixoy']));
		$ipsos_portas = trim(mysql_prep($_POST['ipsos_portas']));
		$ipsos_parath = trim(mysql_prep($_POST['ipsos_parath']));
		$ipsos_podias = trim(mysql_prep($_POST['ipsos_podias']));
		$apost_yalo = trim(mysql_prep($_POST['apost_yalo']));
		$apost_empod = trim(mysql_prep($_POST['apost_empod']));
		$ypsos_empod = trim(mysql_prep($_POST['ypsos_empod']));
		$pros = trim(mysql_prep($_POST['pros']));
		
		if ( empty($errors) ) {
			//Προβολή της εικόνας από τα δεδομένα του χρήστη (χρήση img tag με τη σελίδα δημιουργίας)
			echo "<img src=\"includes/image_creation_orizonta.php" . 
			"?ipsost=" . $ipsos_toixoy . "&ipsosp=" . $ipsos_portas . "&ipsospar=" . 
			$ipsos_parath . "&ipsospod=" . $ipsos_podias . "&apostyal=" . $apost_yalo . "&apostemp=" . 
			$apost_empod . "&ypsosemp=" . $ypsos_empod . "&pros=" . $pros . "&name=" . $name . "\"></img>";
			
			
			echo "<img src=\"images/orizontas.jpg\"></img><br/>";
			//Προβολή των επιλογών του χρήστη
			echo "<table border=\"1\"><tr><td>Όνομα στοιχείου</td><td>Ύψος τοίχου</td><td>Ύψος πόρτας</td><td>Ύψος ανοίγματος</td>" . 
			"<td>Ύψος ποδιάς</td><td>Απόσταση υαλοστασίων</td><td>Απόσταση εμποδίου</td><td>Ύψος εμποδίου</td><td>Προσανατολισμός</td></tr><tr><td>" . 
			$name . "</td><td>" . $ipsos_toixoy . "</td><td>" . $ipsos_portas . "</td><td>" . $ipsos_parath . "</td><td>" . 
			$ipsos_podias . "</td><td>" . $apost_yalo . "</td><td>" . $apost_empod . "</td><td>" . $ypsos_empod . "</td><td>" . $pros . "</td></tr></table><br/><br/>";
			
			//Βρες τις μοίρες για τις γωνίες και στρογγυλοποίησέ τες χωρίς δεκαδικά
			$tantoixoy = (($ypsos_empod - ($ipsos_toixoy / 2)) / $apost_empod);
			$degtoix = rad2deg(atan($tantoixoy));
			$degtoixoy = round($degtoix);
			$tananoig = (($ypsos_empod - ($ipsos_portas / 2)) / ($apost_empod+$apost_yalo));
			$deganoigm = rad2deg(atan($tananoig));
			$deganoigmatos = round($deganoigm);
			$tanpo = (($ypsos_empod - ($ipsos_parath / 2) - $ipsos_podias) / ($apost_empod+$apost_yalo));
			$degpor = rad2deg(atan($tanpo));
			$degport = round($degpor);
			
			//Ορισμός του πίνακα για σκιάσεις
			$sqltable = "skiaseis_orizonta";
			$pinakasthesis = "318";
			
			//Εύρεση των στηλών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΠΡΟΣΑΝΑΤΟΛΙΣΜΟΣ ΕΠΙΦΑΝΕΙΑΣ
			$arrayprosanatolismoy = get_prosanatolismo_pleyrika($pros);
			$stili1 = $arrayprosanatolismoy[0];
			$stili2 = $arrayprosanatolismoy[1];
			$prosanatolismos_epif = $arrayprosanatolismoy[2];
			$timi_stili1 = $arrayprosanatolismoy[3];
			$timi_stili2 = $arrayprosanatolismoy[4];
			
			//Εύρεση των γραμμών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΤΟΙΧΟΣ
			$arrayskiasistoixoy = get_skiasi_orizonta($degtoixoy);
			$grammi1toixoy = $arrayskiasistoixoy[0];
			$grammi2toixoy = $arrayskiasistoixoy[1];
			
			//Εύρεση των γραμμών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΑΝΟΙΓΜΑ
			$arrayskiasianoig = get_skiasi_orizonta($deganoigmatos);
			$grammi1anoig = $arrayskiasianoig[0];
			$grammi2anoig = $arrayskiasianoig[1];
			
			//Εύρεση των γραμμών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΠΟΡΤΑ
			$arrayskiasiport = get_skiasi_orizonta($degport);
			$grammi1port = $arrayskiasiport[0];
			$grammi2port = $arrayskiasiport[1];
			
			//Παρεμβολή εαν είμαστε ενδιάμεσα σε τιμές προσανατολισμού.
			//Αν όχι πάρε τις στάνταρ τιμές από τον πίνακα
			
			//υπολογισμός τοίχου
			if (!isset($stili2)) {	//δεν έχει οριστεί ενδιάμεσος προσανατολισμός πλευράς
					if (!isset($grammi2toixoy)) { //η σκίαση έχει πέσει σε στάνταρ τιμή
					$timesf = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1toixoy);
					$f_h = $timesf[0][0];
					$f_c = $timesf[1][0];
					}
					if (isset($grammi2toixoy)) { //η σκίαση δεν πέφτει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις γραμμές με τη γωνία σκίασης
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1toixoy);
					$f_h1 = $timesf1[0][0];
					$f_c1 = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2toixoy);
					$f_h2 = $timesf2[0][0];
					$f_c2 = $timesf2[1][0];
					$f_h = palindromisi($grammi1toixoy, $grammi2toixoy, $f_h1, $f_h2, $degtoixoy);
					$f_c = palindromisi($grammi1toixoy, $grammi2toixoy, $f_c1, $f_c2, $degtoixoy);
					}
					
			}
			else{ //έχει οριστεί ενδιάμεσος προσανατολισμός
					if (!isset($grammi2toixoy)) { //η σκίαση έχει πέσει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις στηλες (προσανατολισμός) με τον προσανατολισμό
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1toixoy);
					$f_h1_toixoy = $timesf1[0][0];
					$f_c1_toixoy = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1toixoy);
					$f_h2_toixoy = $timesf2[0][0];
					$f_c2_toixoy = $timesf2[1][0];
					$f_h = palindromisi($timi_stili1, $timi_stili2, $f_h1_toixoy, $f_h2_toixoy, $pros);
					$f_c = palindromisi($timi_stili1, $timi_stili2, $f_c1_toixoy, $f_c2_toixoy, $pros);
					}
					if (isset($grammi2toixoy)) { // η σκιαση έχει πέσει ενδιάμεσα. ο προσανατολισμός έχει πέσει ενδιάμεσα
					$timesf71 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1toixoy);
					$f_h71_toixoy = $timesf71[0][0];
					$f_c71_toixoy = $timesf71[1][0];
					$timesf81 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1toixoy);
					$f_h81_toixoy = $timesf81[0][0];
					$f_c81_toixoy = $timesf81[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της πρώτης γραμμής για στήλη 1 και 2
					$f_h11_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_h71_toixoy, $f_h81_toixoy, $pros);
					$f_c11_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_c71_toixoy, $f_c81_toixoy, $pros);
					
					$timesf72 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2toixoy);
					$f_h72_toixoy = $timesf72[0][0];
					$f_c72_toixoy = $timesf72[1][0];
					$timesf82 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi2toixoy);
					$f_h82_toixoy = $timesf82[0][0];
					$f_c82_toixoy = $timesf82[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της δεύτερης γραμμής για στήλη 1 και 2
					$f_h12_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_h72_toixoy, $f_h82_toixoy, $pros);
					$f_c12_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_c72_toixoy, $f_c82_toixoy, $pros);
					// παλινδρόμηση ανάμεσα στις τιμές των δύο γραμμών που βρέθηκαν με την γωνία σκίασης.
					$f_h = palindromisi($grammi1toixoy, $grammi2toixoy, $f_h11_toixoy, $f_h12_toixoy, $degtoixoy);
					$f_c = palindromisi($grammi1toixoy, $grammi2toixoy, $f_c11_toixoy, $f_c12_toixoy, $degtoixoy);
					}
			}
			
			
			//υπολογισμός ανοίγματος
			if (!isset($stili2)) {	//δεν έχει οριστεί ενδιάμεσος προσανατολισμός πλευράς
					if (!isset($grammi2anoig)) { //η σκίαση έχει πέσει σε στάνταρ τιμή
					$timesf = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1anoig);
					$f_h_an = $timesf[0][0];
					$f_c_an = $timesf[1][0];
					}
					if (isset($grammi2anoig)) { //η σκίαση δεν πέφτει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις γραμμές με τη γωνία σκίασης
					$timesf3 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1anoig);
					$f_h1_an = $timesf3[0][0];
					$f_c1_an = $timesf3[1][0];
					$timesf4 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2anoig);
					$f_h2_an = $timesf4[0][0];
					$f_c2_an = $timesf4[1][0];
					$f_h_an = palindromisi($grammi1anoig, $grammi2anoig, $f_h1_an, $f_h2_an, $deganoigmatos);
					$f_c_an = palindromisi($grammi1anoig, $grammi2anoig, $f_c1_an, $f_c2_an, $deganoigmatos);
					}
					
			}
			else{ //έχει οριστεί ενδιάμεσος προσανατολισμός
					if (!isset($grammi2anoig)) { //η σκίαση έχει πέσει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις στηλες (προσανατολισμός) με τον προσανατολισμό
					$timesf3 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1anoig);
					$f_h1_anoig = $timesf3[0][0];
					$f_c1_anoig = $timesf3[1][0];
					$timesf4 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1anoig);
					$f_h2_anoig = $timesf4[0][0];
					$f_c2_anoig = $timesf4[1][0];
					$f_h_an = palindromisi($timi_stili1, $timi_stili2, $f_h1_anoig, $f_h2_anoig, $pros);
					$f_c_an = palindromisi($timi_stili1, $timi_stili2, $f_c1_anoig, $f_c2_anoig, $pros);
					}
					if (isset($grammi2anoig)) { // η σκιαση έχει πέσει ενδιάμεσα. ο προσανατολισμός έχει πέσει ενδιάμεσα
					$timesf31 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1anoig);
					$f_h31_anoig = $timesf31[0][0];
					$f_c31_anoig = $timesf31[1][0];
					$timesf41 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1anoig);
					$f_h41_anoig = $timesf41[0][0];
					$f_c41_anoig = $timesf41[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της πρώτης γραμμής για στήλη 1 και 2
					$f_h11_anoig = palindromisi($timi_stili1, $timi_stili2, $f_h31_anoig, $f_h41_anoig, $pros);
					$f_c11_anoig = palindromisi($timi_stili1, $timi_stili2, $f_c31_anoig, $f_c41_anoig, $pros);
					
					$timesf32 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2anoig);
					$f_h32_anoig = $timesf32[0][0];
					$f_c32_anoig = $timesf32[1][0];
					$timesf42 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi2anoig);
					$f_h42_anoig = $timesf42[0][0];
					$f_c42_anoig = $timesf42[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της δεύτερης γραμμής για στήλη 1 και 2
					$f_h12_anoig = palindromisi($timi_stili1, $timi_stili2, $f_h32_anoig, $f_h42_anoig, $pros);
					$f_c12_anoig = palindromisi($timi_stili1, $timi_stili2, $f_c32_anoig, $f_c42_anoig, $pros);
					// παλινδρόμηση ανάμεσα στις τιμές των δύο γραμμών που βρέθηκαν με την γωνία σκίασης.
					$f_h_an = palindromisi($grammi1anoig, $grammi2anoig, $f_h11_anoig, $f_h12_anoig, $deganoigmatos);
					$f_c_an = palindromisi($grammi1anoig, $grammi2anoig, $f_c11_anoig, $f_c12_anoig, $deganoigmatos);
					}
			}
			
			//υπολογισμός πόρτας
			if (!isset($stili2)) {	//δεν έχει οριστεί ενδιάμεσος προσανατολισμός πλευράς
					if (!isset($grammi2port)) { //η σκίαση έχει πέσει σε στάνταρ τιμή
					$timesf = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1port);
					$f_h_port = $timesf[0][0];
					$f_c_port = $timesf[1][0];
					}
					if (isset($grammi2port)) { //η σκίαση δεν πέφτει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις γραμμές με τη γωνία σκίασης
					$timesf5 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1port);
					$f_h1_port = $timesf5[0][0];
					$f_c1_port = $timesf5[1][0];
					$timesf6 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2port);
					$f_h2_port = $timesf6[0][0];
					$f_c2_port = $timesf6[1][0];
					$f_h_port = palindromisi($grammi1port, $grammi2port, $f_h1_port, $f_h2_port, $degport);
					$f_c_port = palindromisi($grammi1port, $grammi2port, $f_c1_port, $f_c2_port, $degport);
					}
			}
			else{ //έχει οριστεί ενδιάμεσος προσανατολισμός
					if (!isset($grammi2port)) { //η σκίαση έχει πέσει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις στηλες (προσανατολισμός) με τον προσανατολισμό
					$timesf5 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1port);
					$f_h1_port = $timesf5[0][0];
					$f_c1_port = $timesf5[1][0];
					$timesf6 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1port);
					$f_h2_port = $timesf6[0][0];
					$f_c2_port = $timesf6[1][0];
					$f_h_port = palindromisi($timi_stili1, $timi_stili2, $f_h1_port, $f_h2_port, $pros);
					$f_c_port = palindromisi($timi_stili1, $timi_stili2, $f_c1_port, $f_c2_port, $pros);
					}
					if (isset($grammi2port)) { // η σκιαση έχει πέσει ενδιάμεσα. ο προσανατολισμός έχει πέσει ενδιάμεσα
					$timesf51 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1port);
					$f_h51_port = $timesf51[0][0];
					$f_c51_port = $timesf51[1][0];
					$timesf61 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1port);
					$f_h61_port = $timesf61[0][0];
					$f_c61_port = $timesf61[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της πρώτης γραμμής για στήλη 1 και 2
					$f_h11_port = palindromisi($timi_stili1, $timi_stili2, $f_h51_port, $f_h61_port, $pros);
					$f_c11_port = palindromisi($timi_stili1, $timi_stili2, $f_c51_port, $f_c61_port, $pros);
					
					$timesf52 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2port);
					$f_h52_port = $timesf52[0][0];
					$f_c52_port = $timesf52[1][0];
					$timesf62 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi2port);
					$f_h62_port = $timesf62[0][0];
					$f_c62_port = $timesf62[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της δεύτερης γραμμής για στήλη 1 και 2
					$f_h12_port = palindromisi($timi_stili1, $timi_stili2, $f_h52_port, $f_h62_port, $pros);
					$f_c12_port = palindromisi($timi_stili1, $timi_stili2, $f_c52_port, $f_c62_port, $pros);
					// παλινδρόμηση ανάμεσα στις τιμές των δύο γραμμών που βρέθηκαν με την γωνία σκίασης.
					$f_h_port = palindromisi($grammi1port, $grammi2port, $f_h11_port, $f_h12_port, $degport);
					$f_c_port = palindromisi($grammi1port, $grammi2port, $f_c11_port, $f_c12_port, $degport);
					}
			}
			
			//Προβολή των υπολογισμών
			echo "<table border=\"1\"><tr><td>Όνομα στοιχείου</td><td>Γωνία σκίασης τοίχου</td><td>Γωνία σκίασης πόρτας</td><td>Γωνία σκίασης ανοίγματος</td><td>Πίνακας σκιάσεων</td>" . 
			"<td>Προσανατολισμός επιφάνειας</td><td>f_hor_h Τοίχου</td><td>f_hor_c Τοίχου</td><td>f_hor_h Πόρτας</td><td>f_hor_c Πόρτας</td><td>f_hor_h Ανοίγματος</td><td>f_hor_c Ανοίγματος</td></tr><tr><td>" . 
			$name . "</td><td>" . $degtoixoy . " μοίρες</td><td>" . $degport . " μοίρες</td><td>" . $deganoigmatos . " μοίρες</td><td>Πίνακας: " . $pinakasthesis . "</td><td>" . 
			$prosanatolismos_epif . "</td><td>" . $f_h . "</td><td>" . $f_c . "</td><td>" . $f_h_port . "</td><td>" . $f_c_port . "</td><td>" . $f_h_an . "</td><td>" . $f_c_an . "</td></tr></table>";
			
			
		} else {
			if (count($errors) == 1) {
				$message = "Βρέθηκε 1 λάθος στη φόρμα εισόδου.";
			} else {
				$message = "Βρέθηκαν " . count($errors) . " λάθη στη φόρμα εισόδου.";
			}
		}
		
	}
?>