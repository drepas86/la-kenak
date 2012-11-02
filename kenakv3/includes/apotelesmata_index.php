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

if (isset($_POST['anoigmata_alouminio'])) { // υποβλήθηκε η φόρμα xwris thermo.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$anoigmata_alouminio_name = trim(mysql_prep($_POST['anoigmata_alouminio_name']));
		$anoigmata_alouminio_u = trim(mysql_prep($_POST['anoigmata_alouminio_u']));
		$anoigmata_alouminio_g = trim(mysql_prep($_POST['anoigmata_alouminio_g']));

			$query = "INSERT INTO anoigmata_alouminio ";
			$query .= "(name, u, g)";
			$query .= "VALUES ('";
			$query .= $anoigmata_alouminio_name . "', '";
			$query .= $anoigmata_alouminio_u . "', '";
			$query .= $anoigmata_alouminio_g . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		} 
		
		if (isset($_POST['anoigmata_alouminio_thermo'])) { // υποβλήθηκε η φόρμα me thermo.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$anoigmata_alouminio_thermo_name = trim(mysql_prep($_POST['anoigmata_alouminio_thermo_name']));
		$anoigmata_alouminio_thermo_u = trim(mysql_prep($_POST['anoigmata_alouminio_thermo_u']));
		$anoigmata_alouminio_thermo_g = trim(mysql_prep($_POST['anoigmata_alouminio_thermo_g']));

			$query = "INSERT INTO anoigmata_alouminio_thermo ";
			$query .= "(name, u, g)";
			$query .= "VALUES ('";
			$query .= $anoigmata_alouminio_thermo_name . "', '";
			$query .= $anoigmata_alouminio_thermo_u . "', '";
			$query .= $anoigmata_alouminio_thermo_g . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		if (isset($_POST['anoigmata_doors'])) { // υποβλήθηκε η φόρμα doors.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$anoigmata_doors_name = trim(mysql_prep($_POST['anoigmata_doors_name']));
		$anoigmata_doors_u = trim(mysql_prep($_POST['anoigmata_doors_u']));
		$anoigmata_doors_g = trim(mysql_prep($_POST['anoigmata_doors_g']));

			$query = "INSERT INTO anoigmata_doors ";
			$query .= "(name, u, g)";
			$query .= "VALUES ('";
			$query .= $anoigmata_doors_name . "', '";
			$query .= $anoigmata_doors_u . "', '";
			$query .= $anoigmata_doors_g . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		if (isset($_POST['anoigmata_plastic'])) { // υποβλήθηκε η φόρμα plastic.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$anoigmata_plastic_name = trim(mysql_prep($_POST['anoigmata_plastic_name']));
		$anoigmata_plastic_u = trim(mysql_prep($_POST['anoigmata_plastic_u']));
		$anoigmata_plastic_g = trim(mysql_prep($_POST['anoigmata_plastic_g']));

			$query = "INSERT INTO anoigmata_plastic ";
			$query .= "(name, u, g)";
			$query .= "VALUES ('";
			$query .= $anoigmata_plastic_name . "', '";
			$query .= $anoigmata_plastic_u . "', '";
			$query .= $anoigmata_plastic_g . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		if (isset($_POST['anoigmata_wood'])) { // υποβλήθηκε η φόρμα wood.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$anoigmata_wood_name = trim(mysql_prep($_POST['anoigmata_wood_name']));
		$anoigmata_wood_u = trim(mysql_prep($_POST['anoigmata_wood_u']));
		$anoigmata_wood_g = trim(mysql_prep($_POST['anoigmata_wood_g']));

			$query = "INSERT INTO anoigmata_wood ";
			$query .= "(name, u, g)";
			$query .= "VALUES ('";
			$query .= $anoigmata_wood_name . "', '";
			$query .= $anoigmata_wood_u . "', '";
			$query .= $anoigmata_wood_g . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		if (isset($_POST['domika_dapedo_edafous'])) { // υποβλήθηκε η φόρμα dapedo epi edafous.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_dapedo_edafous_name = trim(mysql_prep($_POST['domika_dapedo_edafous_name']));
		$domika_dapedo_edafous_u = trim(mysql_prep($_POST['domika_dapedo_edafous_u']));
		$domika_dapedo_edafous_cm = trim(mysql_prep($_POST['domika_dapedo_edafous_cm']));
		$domika_dapedo_edafous_paxos = trim(mysql_prep($_POST['domika_dapedo_edafous_paxos']));
		$domika_dapedo_edafous_baros = trim(mysql_prep($_POST['domika_dapedo_edafous_baros']));

			$query = "INSERT INTO domika_dapedo_edafous ";
			$query .= "(name, u, cm, paxos, baros)";
			$query .= "VALUES ('";
			$query .= $domika_dapedo_edafous_name . "', '";
			$query .= $domika_dapedo_edafous_u . "', '";
			$query .= $domika_dapedo_edafous_cm . "', '";
			$query .= $domika_dapedo_edafous_paxos . "', '";
			$query .= $domika_dapedo_edafous_baros . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		if (isset($_POST['domika_orofes'])) { // υποβλήθηκε η φόρμα orofes.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_orofes_name = trim(mysql_prep($_POST['domika_orofes_name']));
		$domika_orofes_u = trim(mysql_prep($_POST['domika_orofes_u']));
		$domika_orofes_cm = trim(mysql_prep($_POST['domika_orofes_cm']));
		$domika_orofes_paxos = trim(mysql_prep($_POST['domika_orofes_paxos']));
		$domika_orofes_baros = trim(mysql_prep($_POST['domika_orofes_baros']));

			$query = "INSERT INTO domika_orofes ";
			$query .= "(name, u, cm, paxos, baros)";
			$query .= "VALUES ('";
			$query .= $domika_orofes_name . "', '";
			$query .= $domika_orofes_u . "', '";
			$query .= $domika_orofes_cm . "', '";
			$query .= $domika_orofes_paxos . "', '";
			$query .= $domika_orofes_baros . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		if (isset($_POST['domika_pilotis'])) { // υποβλήθηκε η φόρμα pilotis.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_pilotis_name = trim(mysql_prep($_POST['domika_pilotis_name']));
		$domika_pilotis_u = trim(mysql_prep($_POST['domika_pilotis_u']));
		$domika_pilotis_cm = trim(mysql_prep($_POST['domika_pilotis_cm']));
		$domika_pilotis_paxos = trim(mysql_prep($_POST['domika_pilotis_paxos']));
		$domika_pilotis_baros = trim(mysql_prep($_POST['domika_pilotis_baros']));

			$query = "INSERT INTO domika_pilotis ";
			$query .= "(name, u, cm, paxos, baros)";
			$query .= "VALUES ('";
			$query .= $domika_pilotis_name . "', '";
			$query .= $domika_pilotis_u . "', '";
			$query .= $domika_pilotis_cm . "', '";
			$query .= $domika_pilotis_paxos . "', '";
			$query .= $domika_pilotis_baros . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		if (isset($_POST['domika_toixoi'])) { // υποβλήθηκε η φόρμα toixoi.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_toixoi_name = trim(mysql_prep($_POST['domika_toixoi_name']));
		$domika_toixoi_u = trim(mysql_prep($_POST['domika_toixoi_u']));
		$domika_toixoi_cm = trim(mysql_prep($_POST['domika_toixoi_cm']));
		$domika_toixoi_paxos = trim(mysql_prep($_POST['domika_toixoi_paxos']));
		$domika_toixoi_baros = trim(mysql_prep($_POST['domika_toixoi_baros']));

			$query = "INSERT INTO domika_toixoi ";
			$query .= "(name, u, cm, paxos, baros)";
			$query .= "VALUES ('";
			$query .= $domika_toixoi_name . "', '";
			$query .= $domika_toixoi_u . "', '";
			$query .= $domika_toixoi_cm . "', '";
			$query .= $domika_toixoi_paxos . "', '";
			$query .= $domika_toixoi_baros . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
			
		if (isset($_POST['domika_ylika_beton'])) { // υποβλήθηκε η φόρμα Υλικά - Μπετόν.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_beton_name = trim(mysql_prep($_POST['domika_ylika_beton_name']));
		$domika_ylika_beton_agwg_l = trim(mysql_prep($_POST['domika_ylika_beton_agwg_l']));
		$domika_ylika_beton_pykn_r = trim(mysql_prep($_POST['domika_ylika_beton_pykn_r']));
		$domika_ylika_beton_paxos = trim(mysql_prep($_POST['domika_ylika_beton_paxos']));
		$domika_ylika_beton_cp = trim(mysql_prep($_POST['domika_ylika_beton_cp']));

			$query = "INSERT INTO domika_ylika_beton ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_beton_name . "', '";
			$query .= $domika_ylika_beton_agwg_l . "', '";
			$query .= $domika_ylika_beton_pykn_r . "', '";
			$query .= $domika_ylika_beton_paxos . "', '";
			$query .= $domika_ylika_beton_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		if (isset($_POST['domika_ylika_diafora'])) { // υποβλήθηκε η φόρμα Υλικά - διάφορα υλικά χρήστη.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_diafora_name = trim(mysql_prep($_POST['domika_ylika_diafora_name']));
		$domika_ylika_diafora_agwg_l = trim(mysql_prep($_POST['domika_ylika_diafora_agwg_l']));
		$domika_ylika_diafora_pykn_r = trim(mysql_prep($_POST['domika_ylika_diafora_pykn_r']));
		$domika_ylika_diafora_paxos = trim(mysql_prep($_POST['domika_ylika_diafora_paxos']));
		$domika_ylika_diafora_cp = trim(mysql_prep($_POST['domika_ylika_diafora_cp']));

			$query = "INSERT INTO domika_ylika_diafora ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_diafora_name . "', '";
			$query .= $domika_ylika_diafora_agwg_l . "', '";
			$query .= $domika_ylika_diafora_pykn_r . "', '";
			$query .= $domika_ylika_diafora_paxos . "', '";
			$query .= $domika_ylika_diafora_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		if (isset($_POST['domika_ylika_ygromonwseis'])) { // υποβλήθηκε η φόρμα Υλικά - Υγρομονώσεις.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_ygromonwseis_name = trim(mysql_prep($_POST['domika_ylika_ygromonwseis_name']));
		$domika_ylika_ygromonwseis_agwg_l = trim(mysql_prep($_POST['domika_ylika_ygromonwseis_agwg_l']));
		$domika_ylika_ygromonwseis_pykn_r = trim(mysql_prep($_POST['domika_ylika_ygromonwseis_pykn_r']));
		$domika_ylika_ygromonwseis_paxos = trim(mysql_prep($_POST['domika_ylika_ygromonwseis_paxos']));
		$domika_ylika_ygromonwseis_cp = trim(mysql_prep($_POST['domika_ylika_ygromonwseis_cp']));

			$query = "INSERT INTO domika_ylika_ygromonwseis ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_ygromonwseis_name . "', '";
			$query .= $domika_ylika_ygromonwseis_agwg_l . "', '";
			$query .= $domika_ylika_ygromonwseis_pykn_r . "', '";
			$query .= $domika_ylika_ygromonwseis_paxos . "', '";
			$query .= $domika_ylika_ygromonwseis_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		if (isset($_POST['domika_ylika_epixrismata'])) { // υποβλήθηκε η φόρμα Υλικά - Επιχρίσματα.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_epixrismata_name = trim(mysql_prep($_POST['domika_ylika_epixrismata_name']));
		$domika_ylika_epixrismata_agwg_l = trim(mysql_prep($_POST['domika_ylika_epixrismata_agwg_l']));
		$domika_ylika_epixrismata_pykn_r = trim(mysql_prep($_POST['domika_ylika_epixrismata_pykn_r']));
		$domika_ylika_epixrismata_paxos = trim(mysql_prep($_POST['domika_ylika_epixrismata_paxos']));
		$domika_ylika_epixrismata_cp = trim(mysql_prep($_POST['domika_ylika_epixrismata_cp']));

			$query = "INSERT INTO domika_ylika_epixrismata ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_epixrismata_name . "', '";
			$query .= $domika_ylika_epixrismata_agwg_l . "', '";
			$query .= $domika_ylika_epixrismata_pykn_r . "', '";
			$query .= $domika_ylika_epixrismata_paxos . "', '";
			$query .= $domika_ylika_epixrismata_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		if (isset($_POST['domika_ylika_gypsosanides'])) { // υποβλήθηκε η φόρμα Υλικά - Γυψοσανίδες.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_gypsosanides_name = trim(mysql_prep($_POST['domika_ylika_gypsosanides_name']));
		$domika_ylika_gypsosanides_agwg_l = trim(mysql_prep($_POST['domika_ylika_gypsosanides_agwg_l']));
		$domika_ylika_gypsosanides_pykn_r = trim(mysql_prep($_POST['domika_ylika_gypsosanides_pykn_r']));
		$domika_ylika_gypsosanides_paxos = trim(mysql_prep($_POST['domika_ylika_gypsosanides_paxos']));
		$domika_ylika_gypsosanides_cp = trim(mysql_prep($_POST['domika_ylika_gypsosanides_cp']));

			$query = "INSERT INTO domika_ylika_gypsosanides ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_gypsosanides_name . "', '";
			$query .= $domika_ylika_gypsosanides_agwg_l . "', '";
			$query .= $domika_ylika_gypsosanides_pykn_r . "', '";
			$query .= $domika_ylika_gypsosanides_paxos . "', '";
			$query .= $domika_ylika_gypsosanides_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		if (isset($_POST['domika_ylika_keramidia'])) { // υποβλήθηκε η φόρμα Υλικά - Κεραμίδια.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_keramidia_name = trim(mysql_prep($_POST['domika_ylika_keramidia_name']));
		$domika_ylika_keramidia_agwg_l = trim(mysql_prep($_POST['domika_ylika_keramidia_agwg_l']));
		$domika_ylika_keramidia_pykn_r = trim(mysql_prep($_POST['domika_ylika_keramidia_pykn_r']));
		$domika_ylika_keramidia_paxos = trim(mysql_prep($_POST['domika_ylika_keramidia_paxos']));
		$domika_ylika_keramidia_cp = trim(mysql_prep($_POST['domika_ylika_keramidia_cp']));

			$query = "INSERT INTO domika_ylika_keramidia ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_keramidia_name . "', '";
			$query .= $domika_ylika_keramidia_agwg_l . "', '";
			$query .= $domika_ylika_keramidia_pykn_r . "', '";
			$query .= $domika_ylika_keramidia_paxos . "', '";
			$query .= $domika_ylika_keramidia_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		if (isset($_POST['domika_ylika_ksyleia'])) { // υποβλήθηκε η φόρμα Υλικά - Ξυλεία.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_ksyleia_name = trim(mysql_prep($_POST['domika_ylika_ksyleia_name']));
		$domika_ylika_ksyleia_agwg_l = trim(mysql_prep($_POST['domika_ylika_ksyleia_agwg_l']));
		$domika_ylika_ksyleia_pykn_r = trim(mysql_prep($_POST['domika_ylika_ksyleia_pykn_r']));
		$domika_ylika_ksyleia_paxos = trim(mysql_prep($_POST['domika_ylika_ksyleia_paxos']));
		$domika_ylika_ksyleia_cp = trim(mysql_prep($_POST['domika_ylika_ksyleia_cp']));

			$query = "INSERT INTO domika_ylika_ksyleia ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_ksyleia_name . "', '";
			$query .= $domika_ylika_ksyleia_agwg_l . "', '";
			$query .= $domika_ylika_ksyleia_pykn_r . "', '";
			$query .= $domika_ylika_ksyleia_paxos . "', '";
			$query .= $domika_ylika_ksyleia_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		if (isset($_POST['domika_ylika_monwtika'])) { // υποβλήθηκε η φόρμα Υλικά - Μονωτικά.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_monwtika_name = trim(mysql_prep($_POST['domika_ylika_monwtika_name']));
		$domika_ylika_monwtika_agwg_l = trim(mysql_prep($_POST['domika_ylika_monwtika_agwg_l']));
		$domika_ylika_monwtika_pykn_r = trim(mysql_prep($_POST['domika_ylika_monwtika_pykn_r']));
		$domika_ylika_monwtika_paxos = trim(mysql_prep($_POST['domika_ylika_monwtika_paxos']));
		$domika_ylika_monwtika_cp = trim(mysql_prep($_POST['domika_ylika_monwtika_cp']));

			$query = "INSERT INTO domika_ylika_monwtika ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_monwtika_name . "', '";
			$query .= $domika_ylika_monwtika_agwg_l . "', '";
			$query .= $domika_ylika_monwtika_pykn_r . "', '";
			$query .= $domika_ylika_monwtika_paxos . "', '";
			$query .= $domika_ylika_monwtika_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		
		if (isset($_POST['domika_ylika_monwtikadow'])) { // υποβλήθηκε η φόρμα Υλικά - Μονωτικά dow.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_monwtikadow_name = trim(mysql_prep($_POST['domika_ylika_monwtikadow_name']));
		$domika_ylika_monwtikadow_agwg_l = trim(mysql_prep($_POST['domika_ylika_monwtikadow_agwg_l']));
		$domika_ylika_monwtikadow_pykn_r = trim(mysql_prep($_POST['domika_ylika_monwtikadow_pykn_r']));
		$domika_ylika_monwtikadow_paxos = trim(mysql_prep($_POST['domika_ylika_monwtikadow_paxos']));
		$domika_ylika_monwtikadow_cp = trim(mysql_prep($_POST['domika_ylika_monwtikadow_cp']));

			$query = "INSERT INTO domika_ylika_monwtikadow ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_monwtikadow_name . "', '";
			$query .= $domika_ylika_monwtikadow_agwg_l . "', '";
			$query .= $domika_ylika_monwtikadow_pykn_r . "', '";
			$query .= $domika_ylika_monwtikadow_paxos . "', '";
			$query .= $domika_ylika_monwtikadow_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		
		if (isset($_POST['domika_ylika_plakes'])) { // υποβλήθηκε η φόρμα Υλικά - Πλάκες.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_plakes_name = trim(mysql_prep($_POST['domika_ylika_plakes_name']));
		$domika_ylika_plakes_agwg_l = trim(mysql_prep($_POST['domika_ylika_plakes_agwg_l']));
		$domika_ylika_plakes_pykn_r = trim(mysql_prep($_POST['domika_ylika_plakes_pykn_r']));
		$domika_ylika_plakes_paxos = trim(mysql_prep($_POST['domika_ylika_plakes_paxos']));
		$domika_ylika_plakes_cp = trim(mysql_prep($_POST['domika_ylika_plakes_cp']));

			$query = "INSERT INTO domika_ylika_plakes ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_plakes_name . "', '";
			$query .= $domika_ylika_plakes_agwg_l . "', '";
			$query .= $domika_ylika_plakes_pykn_r . "', '";
			$query .= $domika_ylika_plakes_paxos . "', '";
			$query .= $domika_ylika_plakes_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		if (isset($_POST['domika_ylika_skyrodemata'])) { // υποβλήθηκε η φόρμα Υλικά - Σκυροδέματα.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_skyrodemata_name = trim(mysql_prep($_POST['domika_ylika_skyrodemata_name']));
		$domika_ylika_skyrodemata_agwg_l = trim(mysql_prep($_POST['domika_ylika_skyrodemata_agwg_l']));
		$domika_ylika_skyrodemata_pykn_r = trim(mysql_prep($_POST['domika_ylika_skyrodemata_pykn_r']));
		$domika_ylika_skyrodemata_paxos = trim(mysql_prep($_POST['domika_ylika_skyrodemata_paxos']));
		$domika_ylika_skyrodemata_cp = trim(mysql_prep($_POST['domika_ylika_skyrodemata_cp']));

			$query = "INSERT INTO domika_ylika_skyrodemata ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_skyrodemata_name . "', '";
			$query .= $domika_ylika_skyrodemata_agwg_l . "', '";
			$query .= $domika_ylika_skyrodemata_pykn_r . "', '";
			$query .= $domika_ylika_skyrodemata_paxos . "', '";
			$query .= $domika_ylika_skyrodemata_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		
		if (isset($_POST['domika_ylika_toyvla'])) { // υποβλήθηκε η φόρμα Υλικά - Τούβλα.
		$errors = array();

		// Δεδομένα για τη φόρμα
		$domika_ylika_toyvla_name = trim(mysql_prep($_POST['domika_ylika_toyvla_name']));
		$domika_ylika_toyvla_agwg_l = trim(mysql_prep($_POST['domika_ylika_toyvla_agwg_l']));
		$domika_ylika_toyvla_pykn_r = trim(mysql_prep($_POST['domika_ylika_toyvla_pykn_r']));
		$domika_ylika_toyvla_paxos = trim(mysql_prep($_POST['domika_ylika_toyvla_paxos']));
		$domika_ylika_toyvla_cp = trim(mysql_prep($_POST['domika_ylika_toyvla_cp']));

			$query = "INSERT INTO domika_ylika_toyvla ";
			$query .= "(name, agwg_l, pykn_r, paxos, cp)";
			$query .= "VALUES ('";
			$query .= $domika_ylika_toyvla_name . "', '";
			$query .= $domika_ylika_toyvla_agwg_l . "', '";
			$query .= $domika_ylika_toyvla_pykn_r . "', '";
			$query .= $domika_ylika_toyvla_paxos . "', '";
			$query .= $domika_ylika_toyvla_cp . "')";
			
			$result = mysql_query($query, $connection);
			if ($result) {
			// Success!
			echo "Η Εγγραφή πραγματοποιήθηκε επιτυχώς";
			} else {
			// Display error message.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
	
?>