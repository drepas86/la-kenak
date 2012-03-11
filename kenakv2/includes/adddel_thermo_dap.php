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
if (isset($_POST['delete_therm_dap'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_therm_dap ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή χώρου επιτυχής.";
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη χώρων
if (isset($_POST['prosthiki_therm_dap'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_thermo_dap = trim(mysql_prep($_POST['prosthiki_thermo_dap']));
		$prosthiki_perimetros = trim(mysql_prep($_POST['prosthiki_perimetros']));

			$query = "UPDATE kataskeyi_therm_dap ";
			$query .= "SET therm_dap=";
			$query .= "'" . $prosthiki_thermo_dap . "',";
			$query .= " perimetros=";
			$query .= "'" . $prosthiki_perimetros . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκε η θερμογέφυρα δαπέδου και η περίμετρος δαπέδου επιτυχώς";
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση για τη θερμογέφυρα δαπέδου.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
	
?>