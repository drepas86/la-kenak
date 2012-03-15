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
	
//υποβλήθηκε η φόρμα για διαγραφή δαπέδου / οροφής
if (isset($_POST['delete_daporo'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_daporo ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	if ($objQuery) {
			// Εγγραφή επιτυχής
	echo "Διαγραφή οριζόντιου στοιχείου επιτυχώς.";
	?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-katakoryfa"</script><?php
	} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο του οριζόντιου στοιχείου.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
}
	
	
	
//υποβλήθηκε η φόρμα για προσθήκη δαπέδου / οροφής
if (isset($_POST['prosthiki_daporo'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));
		$prosthiki_type = trim(mysql_prep($_POST['prosthiki_type']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_emvadon = trim(mysql_prep($_POST['prosthiki_emvadon']));
		$prosthiki_u = trim(mysql_prep($_POST['prosthiki_u']));

			$query = "INSERT INTO kataskeyi_daporo ";
			$query .= "(id_zwnis, type, name, emvadon, u) ";
			$query .= "VALUES ( '";
			$query .= $prosthiki_zwni . "', '";
			$query .= $prosthiki_type . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_emvadon . "', '";
			$query .= $prosthiki_u . "')";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε το οριζόντιο στοιχείο επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-katakoryfa"</script><?php
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο του οριζόντιου στοιχείου.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
	
?>