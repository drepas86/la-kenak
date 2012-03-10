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
	
//υποβλήθηκε η φόρμα για διαγραφή κλιματικών δεδομένων (ΑΝΕΝΕΡΓΟ)
if (isset($_POST['delete_stoixeia'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_stoixeia ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή στοιχείων ζώνης επιτυχής.";
	echo "<br/><a href=\"kenak.php?page=2#tab-zwni\">Πίσω</a>";
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη κλιματικών δεδομένων
if (isset($_POST['prosthiki_stoixeia'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));
		$prosthiki_climate_data = trim(mysql_prep($_POST['prosthiki_climate_data']));
		$prosthiki_xrisi = trim(mysql_prep($_POST['prosthiki_xrisi']));
		$prosthiki_nero_dikt = trim(mysql_prep($_POST['prosthiki_nero_dikt']));
		$prosthiki_velt_klisi = trim(mysql_prep($_POST['prosthiki_velt_klisi']));
		$prosthiki_iliakos = trim(mysql_prep($_POST['prosthiki_iliakos']));

			$query = "UPDATE kataskeyi_stoixeia ";
			$query .= "SET zwni=";
			$query .= "'" . $prosthiki_zwni . "',";
			$query .= " climate_data=";
			$query .= "'" . $prosthiki_climate_data . "',";
			$query .= " xrisi=";
			$query .= "'" . $prosthiki_xrisi . "',";
			$query .= " nero_dikt=";
			$query .= "'" . $prosthiki_nero_dikt . "',";
			$query .= " velt_klisi=";
			$query .= "'" . $prosthiki_velt_klisi . "',";
			$query .= " iliakos=";
			$query .= "'" . $prosthiki_iliakos . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν τα στοιχεία ζώνης επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			echo "<br/><a href=\"kenak.php?page=2#tab-zwni\">Πίσω</a>";
		}



//υποβλήθηκε η φόρμα για προσθήκη στοιχείων δροσισμού
if (isset($_POST['prosthiki_stoixeia_dros'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_anigmeni_thermo = trim(mysql_prep($_POST['prosthiki_anigmeni_thermo']));
		$prosthiki_aytomatismoi = trim(mysql_prep($_POST['prosthiki_aytomatismoi']));
		$prosthiki_kaminades = trim(mysql_prep($_POST['prosthiki_kaminades']));
		$prosthiki_eksaerismos = trim(mysql_prep($_POST['prosthiki_eksaerismos']));
		$prosthiki_anem_orofis = trim(mysql_prep($_POST['prosthiki_anem_orofis']));

			$query = "UPDATE kataskeyi_stoixeia ";
			$query .= "SET anigmeni_thermo=";
			$query .= "'" . $prosthiki_anigmeni_thermo . "',";
			$query .= " aytomatismoi=";
			$query .= "'" . $prosthiki_aytomatismoi . "',";
			$query .= " kaminades=";
			$query .= "'" . $prosthiki_kaminades . "',";
			$query .= " eksaerismos=";
			$query .= "'" . $prosthiki_eksaerismos . "',";
			$query .= " anem_orofis=";
			$query .= "'" . $prosthiki_anem_orofis . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν τα στοιχεία ζώνης επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			echo "<br/><a href=\"kenak.php?page=2#tab-zwni\">Πίσω</a>";
		}		
?>