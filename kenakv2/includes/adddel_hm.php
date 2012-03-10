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
	
//υποβλήθηκε η φόρμα για διαγραφή χώρων
if (isset($_POST['delete_hm'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_hm ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή στοιχείων ζώνης επιτυχής.";
	echo "<br/><a href=\"kenak.php?page=2#tab-energy\">Πίσω</a>";
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη χώρων
if (isset($_POST['prosthiki_hm'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_thermansi = trim(mysql_prep($_POST['prosthiki_thermansi']));
		$prosthiki_klimatismos = trim(mysql_prep($_POST['prosthiki_klimatismos']));

			$query = "UPDATE kataskeyi_hm ";
			$query .= "SET value=";
			$query .= "'" . $prosthiki_thermansi . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			
			$query = "UPDATE kataskeyi_hm ";
			$query .= "SET value=";
			$query .= "'" . $prosthiki_klimatismos . "'";
			$query .= " WHERE id=2";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία θέρμανσης/κλιματισμού επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			echo "<br/><a href=\"kenak.php?page=2#tab-energy\">Πίσω</a>";
		}
	
?>