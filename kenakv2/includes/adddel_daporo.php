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
if (isset($_POST['delete_daporo'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_daporo";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή στοιχείων ζώνης επιτυχής.";
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη χώρων
if (isset($_POST['prosthiki_daporo'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_dapedo_emv1 = trim(mysql_prep($_POST['prosthiki_dapedo_emv1']));
		$prosthiki_dapedo_u1 = trim(mysql_prep($_POST['prosthiki_dapedo_u1']));
		$prosthiki_dapedo_emv2 = trim(mysql_prep($_POST['prosthiki_dapedo_emv2']));
		$prosthiki_dapedo_u2 = trim(mysql_prep($_POST['prosthiki_dapedo_u2']));
		$prosthiki_orofi_emv1 = trim(mysql_prep($_POST['prosthiki_orofi_emv1']));
		$prosthiki_orofi_u1 = trim(mysql_prep($_POST['prosthiki_orofi_u1']));
		$prosthiki_orofi_emv2 = trim(mysql_prep($_POST['prosthiki_orofi_emv2']));
		$prosthiki_orofi_u2 = trim(mysql_prep($_POST['prosthiki_orofi_u2']));

			$query = "UPDATE kataskeyi_daporo ";
			$query .= "SET emvadon=";
			$query .= "'" . $prosthiki_dapedo_emv1 . "',";
			$query .= " u=";
			$query .= "'" . $prosthiki_dapedo_u1 . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε τo δάπεδο επί εδάφους";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο στο δάπεδο επί εδάφους.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			
			
			$query = "UPDATE kataskeyi_daporo ";
			$query .= "SET emvadon=";
			$query .= "'" . $prosthiki_dapedo_emv2 . "',";
			$query .= " u=";
			$query .= "'" . $prosthiki_dapedo_u2 . "'";
			$query .= " WHERE id=2";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε τo δάπεδο σε μη θερμ. χώρο";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο στο δάπεδο σε μη θερμ. χώρο.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			
			$query = "UPDATE kataskeyi_daporo ";
			$query .= "SET emvadon=";
			$query .= "'" . $prosthiki_orofi_emv1 . "',";
			$query .= " u=";
			$query .= "'" . $prosthiki_orofi_u1 . "'";
			$query .= " WHERE id=3";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η οροφή με κεραμίδι";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο στην οροφή με κεραμίδι.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			
			$query = "UPDATE kataskeyi_daporo ";
			$query .= "SET emvadon=";
			$query .= "'" . $prosthiki_orofi_emv2 . "',";
			$query .= " u=";
			$query .= "'" . $prosthiki_orofi_u2 . "'";
			$query .= " WHERE id=4";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η οροφή πλάκας";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο στην οροφή πλάκας.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
	
?>