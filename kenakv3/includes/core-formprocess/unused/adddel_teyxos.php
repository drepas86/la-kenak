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
	
//υποβλήθηκε η φόρμα για εισαγωγή τεύχους
if (isset($_POST['update_intro'])) {
// Δεδομένα για τη φόρμα
		$intro1 = trim(mysql_prep($_POST['intro1']));
		$intro2 = trim(mysql_prep($_POST['intro2']));
		$intro3 = trim(mysql_prep($_POST['intro3']));

			$query1 = "UPDATE kataskeyi_teyxos ";
			$query1 .= "SET text=";
			$query1 .= "'" . $intro1 . "'";
			$query1 .= " WHERE id=1";
			$result1 = mysql_query($query1);
			
			$query2 = "UPDATE kataskeyi_teyxos ";
			$query2 .= "SET text=";
			$query2 .= "'" . $intro2 . "'";
			$query2 .= " WHERE id=2";
			$result2 = mysql_query($query2);
			
			$query3 = "UPDATE kataskeyi_teyxos ";
			$query3 .= "SET text=";
			$query3 .= "'" . $intro3 . "'";
			$query3 .= " WHERE id=3";
			$result3 = mysql_query($query3);
			if ($result1 && $result2 && $result3) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η εισαγωγή του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

//υποβλήθηκε η φόρμα για κεφ1 τεύχους
if (isset($_POST['update_kef1'])) {
// Δεδομένα για τη φόρμα
		$genikiperigrafi = trim(mysql_prep($_POST['genikiperigrafi']));
		$genikastoixeiaktirioy = trim(mysql_prep($_POST['genikastoixeiaktirioy']));
		$topografiaoikopedoy = trim(mysql_prep($_POST['topografiaoikopedoy']));
		$tekmiriwsi1 = trim(mysql_prep($_POST['tekmiriwsi1']));
		$tekmiriwsi2 = trim(mysql_prep($_POST['tekmiriwsi2']));
		$tekmiriwsi3 = trim(mysql_prep($_POST['tekmiriwsi3']));
		$tekmiriwsi4 = trim(mysql_prep($_POST['tekmiriwsi4']));
		$tekmiriwsi5 = trim(mysql_prep($_POST['tekmiriwsi5']));
		$tekmiriwsi6 = trim(mysql_prep($_POST['tekmiriwsi6']));
		$tekmiriwsi7 = trim(mysql_prep($_POST['tekmiriwsi7']));
		$tekmiriwsi8 = trim(mysql_prep($_POST['tekmiriwsi8']));
		$tekmiriwsi9 = trim(mysql_prep($_POST['tekmiriwsi9']));
		$tekmiriwsi10 = trim(mysql_prep($_POST['tekmiriwsi10']));
		$tekmiriwsi11 = trim(mysql_prep($_POST['tekmiriwsi11']));
		$tekmiriwsi12 = trim(mysql_prep($_POST['tekmiriwsi12']));

			$query1 = "UPDATE kataskeyi_teyxos ";
			$query1 .= "SET text=";
			$query1 .= "'" . $genikiperigrafi . "'";
			$query1 .= " WHERE place='genikiperigrafi'";
			$result1 = mysql_query($query1);
			
			$query2 = "UPDATE kataskeyi_teyxos ";
			$query2 .= "SET text=";
			$query2 .= "'" . $genikastoixeiaktirioy . "'";
			$query2 .= " WHERE place='genikastoixeiaktirioy'";
			$result2 = mysql_query($query2);
			
			$query3 = "UPDATE kataskeyi_teyxos ";
			$query3 .= "SET text=";
			$query3 .= "'" . $topografiaoikopedoy . "'";
			$query3 .= " WHERE place='topografiaoikopedoy'";
			$result3 = mysql_query($query3);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi1 . "'";
			$query .= " WHERE place='tekmiriwsi1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi2 . "'";
			$query .= " WHERE place='tekmiriwsi2'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi3 . "'";
			$query .= " WHERE place='tekmiriwsi3'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi4 . "'";
			$query .= " WHERE place='tekmiriwsi4'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi5 . "'";
			$query .= " WHERE place='tekmiriwsi5'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi6 . "'";
			$query .= " WHERE place='tekmiriwsi6'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi7 . "'";
			$query .= " WHERE place='tekmiriwsi7'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi8 . "'";
			$query .= " WHERE place='tekmiriwsi8'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi9 . "'";
			$query .= " WHERE place='tekmiriwsi9'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi10 . "'";
			$query .= " WHERE place='tekmiriwsi10'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi11 . "'";
			$query .= " WHERE place='tekmiriwsi11'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $tekmiriwsi12 . "'";
			$query .= " WHERE place='tekmiriwsi12'";
			$result = mysql_query($query);
			
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν στοιχεία στο Κεφ 2 και 3 του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		
		
		
//υποβλήθηκε η φόρμα για κεφ2 τεύχους
if (isset($_POST['update_kef2'])) {
// Δεδομένα για τη φόρμα
		$xwrothetisiktirioy = trim(mysql_prep($_POST['xwrothetisiktirioy']));
		$xwrothetisileitoyrgiwn = trim(mysql_prep($_POST['xwrothetisileitoyrgiwn']));
		$ilioprostasiaanoig = trim(mysql_prep($_POST['ilioprostasiaanoig']));
		$fysikosfwtismos = trim(mysql_prep($_POST['fysikosfwtismos']));
		$fysikosdrosismos = trim(mysql_prep($_POST['fysikosdrosismos']));
		$pathitikailiakasyst = trim(mysql_prep($_POST['pathitikailiakasyst']));
		$diamorfwsiperiv = trim(mysql_prep($_POST['diamorfwsiperiv']));

			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $xwrothetisiktirioy . "'";
			$query .= " WHERE place='xwrothetisiktirioy'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $xwrothetisileitoyrgiwn . "'";
			$query .= " WHERE place='xwrothetisileitoyrgiwn'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $ilioprostasiaanoig . "'";
			$query .= " WHERE place='ilioprostasiaanoig'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $fysikosfwtismos . "'";
			$query .= " WHERE place='fysikosfwtismos'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $fysikosdrosismos . "'";
			$query .= " WHERE place='fysikosdrosismos'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $pathitikailiakasyst . "'";
			$query .= " WHERE place='pathitikailiakasyst'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $diamorfwsiperiv . "'";
			$query .= " WHERE place='diamorfwsiperiv'";
			$result = mysql_query($query);

			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν στοιχεία στο Κεφ του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		
//υποβλήθηκε η φόρμα για κεφ3 τεύχους
if (isset($_POST['update_kef3'])) {
// Δεδομένα για τη φόρμα
		$kelyfos1 = trim(mysql_prep($_POST['kelyfos1']));
		$kelyfos2 = trim(mysql_prep($_POST['kelyfos2']));
		$kelyfos3 = trim(mysql_prep($_POST['kelyfos3']));
		$kelyfos4 = trim(mysql_prep($_POST['kelyfos4']));
		$kelyfos5 = trim(mysql_prep($_POST['kelyfos5']));
		$kelyfos6 = trim(mysql_prep($_POST['kelyfos6']));
		$kelyfos7 = trim(mysql_prep($_POST['kelyfos7']));

			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos1 . "'";
			$query .= " WHERE place='kelyfos1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos2 . "'";
			$query .= " WHERE place='kelyfos2'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos3 . "'";
			$query .= " WHERE place='kelyfos3'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos4 . "'";
			$query .= " WHERE place='kelyfos4'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos5 . "'";
			$query .= " WHERE place='kelyfos5'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos6 . "'";
			$query .= " WHERE place='kelyfos6'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos7 . "'";
			$query .= " WHERE place='kelyfos7'";
			$result = mysql_query($query);

			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν στοιχεία στις υποενότητες του Κεφ 3.x του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		
		
//υποβλήθηκε η φόρμα για κεφ4 τεύχους
if (isset($_POST['update_kef4'])) {
// Δεδομένα για τη φόρμα
		$thermoeparkeia1 = trim(mysql_prep($_POST['thermoeparkeia1']));
		$kataskeyastikeslyseis1 = trim(mysql_prep($_POST['kataskeyastikeslyseis1']));


			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $thermoeparkeia1 . "'";
			$query .= " WHERE place='thermoeparkeia1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kataskeyastikeslyseis1 . "'";
			$query .= " WHERE place='kataskeyastikeslyseis1'";
			$result = mysql_query($query);

			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν στοιχεία στο Κεφ 4 του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		

//υποβλήθηκε η φόρμα για κεφ5 τεύχους
if (isset($_POST['update_kef5'])) {
// Δεδομένα για τη φόρμα

		$thermansisxediasmos = trim(mysql_prep($_POST['thermansisxediasmos']));
		$psyksisxediasmos = trim(mysql_prep($_POST['psyksisxediasmos']));
		$elthermansi1 = trim(mysql_prep($_POST['elthermansi1']));
		$elthermansi2 = trim(mysql_prep($_POST['elthermansi2']));
		$elthermansi3 = trim(mysql_prep($_POST['elthermansi3']));
		$elthermansi4 = trim(mysql_prep($_POST['elthermansi4']));
		$elthermansi5 = trim(mysql_prep($_POST['elthermansi5']));
		$elthermansi6 = trim(mysql_prep($_POST['elthermansi6']));
		$elthermansi7 = trim(mysql_prep($_POST['elthermansi7']));
		$elpsyksi1 = trim(mysql_prep($_POST['elpsyksi1']));
		$elpsyksi2 = trim(mysql_prep($_POST['elpsyksi2']));
		$elpsyksi3 = trim(mysql_prep($_POST['elpsyksi3']));
		$elznx1 = trim(mysql_prep($_POST['elznx1']));
		$elznx2 = trim(mysql_prep($_POST['elznx2']));
		$elznx3 = trim(mysql_prep($_POST['elznx3']));
		$elznx4 = trim(mysql_prep($_POST['elznx4']));

			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $thermansisxediasmos . "'";
			$query .= " WHERE place='thermansisxediasmos'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $psyksisxediasmos . "'";
			$query .= " WHERE place='psyksisxediasmos'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elthermansi1 . "'";
			$query .= " WHERE place='elthermansi1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elthermansi2 . "'";
			$query .= " WHERE place='elthermansi2'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elthermansi3 . "'";
			$query .= " WHERE place='elthermansi3'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elthermansi4 . "'";
			$query .= " WHERE place='elthermansi4'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elthermansi5 . "'";
			$query .= " WHERE place='elthermansi5'";
			$result = mysql_query($query);

			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elthermansi6 . "'";
			$query .= " WHERE place='elthermansi6'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elthermansi7 . "'";
			$query .= " WHERE place='elthermansi7'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elpsyksi1 . "'";
			$query .= " WHERE place='elpsyksi1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elpsyksi2 . "'";
			$query .= " WHERE place='elpsyksi2'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elpsyksi3 . "'";
			$query .= " WHERE place='elpsyksi3'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elznx1 . "'";
			$query .= " WHERE place='elznx1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elznx2 . "'";
			$query .= " WHERE place='elznx2'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elznx3 . "'";
			$query .= " WHERE place='elznx3'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $elznx4 . "'";
			$query .= " WHERE place='elznx4'";
			$result = mysql_query($query);
			
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν στοιχεία ελάχιστης θέρμανσης/ψύξης/ζνχ του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		
		
//υποβλήθηκε η φόρμα για κεφ5.2.2 τεύχους
if (isset($_POST['update_kef51'])) {
// Δεδομένα για τη φόρμα

		$egiliaka1 = trim(mysql_prep($_POST['egiliaka1']));
		$egiliaka2 = trim(mysql_prep($_POST['egiliaka2']));
		$egiliaka3 = trim(mysql_prep($_POST['egiliaka3']));
		$egiliaka4 = trim(mysql_prep($_POST['egiliaka4']));
		$egiliaka5 = trim(mysql_prep($_POST['egiliaka5']));
		$egiliaka6 = trim(mysql_prep($_POST['egiliaka6']));
		$egiliaka7 = trim(mysql_prep($_POST['egiliaka7']));


			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egiliaka1 . "'";
			$query .= " WHERE place='egiliaka1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egiliaka2 . "'";
			$query .= " WHERE place='egiliaka2'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egiliaka3 . "'";
			$query .= " WHERE place='egiliaka3'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egiliaka4 . "'";
			$query .= " WHERE place='egiliaka4'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egiliaka5 . "'";
			$query .= " WHERE place='egiliaka5'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egiliaka6 . "'";
			$query .= " WHERE place='egiliaka6'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egiliaka7 . "'";
			$query .= " WHERE place='egiliaka7'";
			$result = mysql_query($query);
			
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν στοιχεία ηλιακών συλλεκτών του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
//υποβλήθηκε η φόρμα για κεφ53,54,55 τεύχους
if (isset($_POST['update_kef52'])) {
// Δεδομένα για τη φόρμα

		$egfwtismos1 = trim(mysql_prep($_POST['egfwtismos1']));
		$egfwtismos2 = trim(mysql_prep($_POST['egfwtismos2']));
		$egfwtismos3 = trim(mysql_prep($_POST['egfwtismos3']));
		$enalaktiki1 = trim(mysql_prep($_POST['enalaktiki1']));
		$enalaktiki2 = trim(mysql_prep($_POST['enalaktiki2']));
		$enalaktiki3 = trim(mysql_prep($_POST['enalaktiki3']));


			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egfwtismos1 . "'";
			$query .= " WHERE place='egfwtismos1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egfwtismos2 . "'";
			$query .= " WHERE place='egfwtismos2'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $egfwtismos3 . "'";
			$query .= " WHERE place='egfwtismos3'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $enalaktiki1 . "'";
			$query .= " WHERE place='enalaktiki1'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $enalaktiki2 . "'";
			$query .= " WHERE place='enalaktiki2'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $enalaktiki3 . "'";
			$query .= " WHERE place='enalaktiki3'";
			$result = mysql_query($query);
			
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν στοιχεία φωτισμού, διόρθωσης συνημιτόνου και εναλλακτικών λύσεων του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		
//υποβλήθηκε η φόρμα για κεφ6.3.3 τεύχους
if (isset($_POST['update_kef6'])) {
// Δεδομένα για τη φόρμα

		$kelyfos3331 = trim(mysql_prep($_POST['kelyfos3331']));
		$kelyfos3332 = trim(mysql_prep($_POST['kelyfos3332']));
		$kelyfos3333 = trim(mysql_prep($_POST['kelyfos3333']));
		$kelyfos3334 = trim(mysql_prep($_POST['kelyfos3334']));
		$kelyfos3335 = trim(mysql_prep($_POST['kelyfos3335']));


			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos3331 . "'";
			$query .= " WHERE place='kelyfos3331'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos3332 . "'";
			$query .= " WHERE place='kelyfos3332'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos3333 . "'";
			$query .= " WHERE place='kelyfos3333'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos3334 . "'";
			$query .= " WHERE place='kelyfos3334'";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_teyxos ";
			$query .= "SET text=";
			$query .= "'" . $kelyfos3335 . "'";
			$query .= " WHERE place='kelyfos3335'";
			$result = mysql_query($query);
			
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν στοιχεία κτηριακού κελύφους του τεύχους επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
?>