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
	require_once("includes/session.php");
	
//υποβλήθηκε η φόρμα για διαγραφή meletis
if (isset($_POST['delete_meletis'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_meletis ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή στοιχείων μελέτης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-meletis"</script><?php
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη meletis
if (isset($_POST['prosthiki_meletis'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_project = trim(mysql_prep($_POST['prosthiki_project']));
		$prosthiki_place = trim(mysql_prep($_POST['prosthiki_place']));
		$prosthiki_address = trim(mysql_prep($_POST['prosthiki_address']));
		$prosthiki_owner = trim(mysql_prep($_POST['prosthiki_owner']));
		$prosthiki_owner_status = trim(mysql_prep($_POST['prosthiki_owner_status']));
		$prosthiki_engs = trim(mysql_prep($_POST['prosthiki_engs']));

			$query = "UPDATE kataskeyi_meletis ";
			$query .= "SET project=";
			$query .= "'" . $prosthiki_project . "',";
			$query .= " place=";
			$query .= "'" . $prosthiki_place . "',";
			$query .= " address=";
			$query .= "'" . $prosthiki_address . "',";
			$query .= " owner=";
			$query .= "'" . $prosthiki_owner . "',";
			$query .= " owner_status=";
			$query .= "'" . $prosthiki_owner_status . "',";
			$query .= " engs=";
			$query .= "'" . $prosthiki_engs . "'";
			$query .= " WHERE user_id=";
			$query .= "'" . $_SESSION['user_id'] . "'";
			$query .= " AND meleti_id=";
			$query .= "'" . $_SESSION['meleti_id'] . "'";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν τα στοιχεία ιδιοκτητών/μελετητών επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-meletis"</script><?php
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			
		}

//υποβλήθηκε η φόρμα για προσθήκη meletis_contact
if (isset($_POST['prosthiki_meletis_contact'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_contact_type = mysql_prep($_POST['prosthiki_contact_type']);
		$prosthiki_contact_name = mysql_prep($_POST['prosthiki_contact_name']);
		$prosthiki_contact_tel = mysql_prep($_POST['prosthiki_contact_tel']);
		$prosthiki_contact_mail = mysql_prep($_POST['prosthiki_contact_mail']);

			$query = "UPDATE kataskeyi_meletis ";
			$query .= "SET contact_type=";
			$query .= "'" . $prosthiki_contact_type . "',";
			$query .= " contact_name=";
			$query .= "'" . $prosthiki_contact_name . "',";
			$query .= " contact_tel=";
			$query .= "'" . $prosthiki_contact_tel . "',";
			$query .= " contact_mail=";
			$query .= "'" . $prosthiki_contact_mail . "'";
			$query .= " WHERE user_id=";
			$query .= "'" . $_SESSION['user_id'] . "'";
			$query .= " AND meleti_id=";
			$query .= "'" . $_SESSION['meleti_id'] . "'";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν τα στοιχεία υπευθύνου επικοινωνίας επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-meletis"</script><?php
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			
		}
		
		
		
//υποβλήθηκε η φόρμα για διαγραφή meletis_topo
if (isset($_POST['delete_meletis_topo'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_meletis_topo ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή στοιχείων τοπογραφίας επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-zwni"</script><?php
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη meletis_topo
if (isset($_POST['prosthiki_meletis_topo'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_sxedio = trim(mysql_prep($_POST['prosthiki_sxedio']));
		$prosthiki_odos = trim(mysql_prep($_POST['prosthiki_odos']));
		$prosthiki_apostaseis = trim(mysql_prep($_POST['prosthiki_apostaseis']));
		$prosthiki_klisi = trim(mysql_prep($_POST['prosthiki_klisi']));
		$prosthiki_prosb = trim(mysql_prep($_POST['prosthiki_prosb']));

			$query = "UPDATE kataskeyi_meletis_topo ";
			$query .= "SET sxedio=";
			$query .= "'" . $prosthiki_sxedio . "',";
			$query .= " odos=";
			$query .= "'" . $prosthiki_odos . "',";
			$query .= " apostaseis=";
			$query .= "'" . $prosthiki_apostaseis . "',";
			$query .= " klisi=";
			$query .= "'" . $prosthiki_klisi . "',";
			$query .= " prosb=";
			$query .= "'" . $prosthiki_prosb . "'";
			$query .= " WHERE user_id=";
			$query .= "'" . $_SESSION['user_id'] . "'";
			$query .= " AND meleti_id=";
			$query .= "'" . $_SESSION['meleti_id'] . "'";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν τα στοιχεία τοπογραφίας επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-zwni"</script><?php
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			
		}



//υποβλήθηκε η φόρμα για προσθήκη meletis_topo_pol
if (isset($_POST['prosthiki_meletis_topo_pol'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_pol_grafeio = trim(mysql_prep($_POST['prosthiki_pol_grafeio']));
		$prosthiki_pol_year = trim(mysql_prep($_POST['prosthiki_pol_year']));
		$prosthiki_pol_number = trim(mysql_prep($_POST['prosthiki_pol_number']));
		$prosthiki_pol_year_complete = trim(mysql_prep($_POST['prosthiki_pol_year_complete']));
		$prosthiki_pol_type = trim(mysql_prep($_POST['prosthiki_pol_type']));

			$query = "UPDATE kataskeyi_meletis_topo ";
			$query .= "SET pol_grafeio=";
			$query .= "'" . $prosthiki_pol_grafeio . "',";
			$query .= " pol_year=";
			$query .= "'" . $prosthiki_pol_year . "',";
			$query .= " pol_number=";
			$query .= "'" . $prosthiki_pol_number . "',";
			$query .= " pol_year_complete=";
			$query .= "'" . $prosthiki_pol_year_complete . "',";
			$query .= " pol_type=";
			$query .= "'" . $prosthiki_pol_type . "'";
			$query .= " WHERE user_id=";
			$query .= "'" . $_SESSION['user_id'] . "'";
			$query .= " AND meleti_id=";
			$query .= "'" . $_SESSION['meleti_id'] . "'";
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκαν τα στοιχεία πολεοδομίας επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=2#tab-meletis"</script><?php
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
			
		}		
?>