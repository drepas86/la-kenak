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
if (isset($_POST['delete_xwrwn'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xwroi ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή χώρου επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-xwroi"</script><?php
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη χώρων
if (isset($_POST['prosthiki_xwrwn'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_mikos = trim(mysql_prep($_POST['prosthiki_mikos']));
		$prosthiki_platos = trim(mysql_prep($_POST['prosthiki_platos']));
		$prosthiki_ypsos = trim(mysql_prep($_POST['prosthiki_ypsos']));

			$query = "INSERT INTO kataskeyi_xwroi ";
			$query .= "(id_zwnis, name, mikos, platos, ypsos)";
			$query .= "VALUES ('";
			$query .= $prosthiki_zwni . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_mikos . "', '";
			$query .= $prosthiki_platos . "', '";
			$query .= $prosthiki_ypsos . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε ο χώρος επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-xwroi"</script><?php
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
	
?>