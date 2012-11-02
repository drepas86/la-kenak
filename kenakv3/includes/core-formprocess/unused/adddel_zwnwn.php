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


//ΘΕΡΜΙΚΕΣ ΖΩΝΕΣ
//ΔΙΑΓΡΑΦΗ και ΠΡΟΣΘΗΚΗ
		
		
//ZNX
//ΔΙΑΓΡΑΦΗ, ΠΡΟΣΘΗΚΗ και UPDATE

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_zwnes
if (isset($_POST['delete_zwnis'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_zwnes ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή θερμικής ζώνης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=11#zwnes"</script><?php
			exit;
}



//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_zwnes
if (isset($_POST['prosthiki_zwnis'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_xrisi = trim(mysql_prep($_POST['prosthiki_xrisi']));
		$prosthiki_thermoeparkeia = trim(mysql_prep($_POST['prosthiki_thermoeparkeia']));
		$prosthiki_anigmeni_thermo = trim(mysql_prep($_POST['prosthiki_anigmeni_thermo']));
		$prosthiki_aytomatismoi = trim(mysql_prep($_POST['prosthiki_aytomatismoi']));
		$prosthiki_kaminades = trim(mysql_prep($_POST['prosthiki_kaminades']));
		$prosthiki_eksaerismos = trim(mysql_prep($_POST['prosthiki_eksaerismos']));
		$prosthiki_anem_orofis = trim(mysql_prep($_POST['prosthiki_anem_orofis']));

			$query = "INSERT INTO kataskeyi_zwnes ";
			$query .= "(name, xrisi, thermoeparkeia, anigmeni_thermo, aytomatismoi, kaminades, eksaerismos, anem_orofis)";
			$query .= "VALUES ('";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_xrisi . "', '";
			$query .= $prosthiki_thermoeparkeia . "', '";
			$query .= $prosthiki_anigmeni_thermo . "', '";
			$query .= $prosthiki_aytomatismoi . "', '";
			$query .= $prosthiki_kaminades . "', '";
			$query .= $prosthiki_eksaerismos . "', '";
			$query .= $prosthiki_anem_orofis . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η θερμική ζώνη επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=11#zwnes"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		

?>