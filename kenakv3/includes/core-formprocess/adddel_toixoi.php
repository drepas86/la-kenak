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
	
//υποβλήθηκε η φόρμα για διαγραφή Β Τοίχου
if (isset($_POST['delete_toixoib'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_t_b ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή βόρειου τοίχου επιτυχής.";
			//Tsak mod
			?><script type="text/javascript">window.location = "./kenak.php?page=6#toixoib"</script><?php
			exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη Β τοίχου
if (isset($_POST['prosthiki_toixoib'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_zwnis = trim(mysql_prep($_POST['prosthiki_id_zwnis']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_t_mikos = trim(mysql_prep($_POST['prosthiki_t_mikos']));
		$prosthiki_t_ypsos = trim(mysql_prep($_POST['prosthiki_t_ypsos']));
		$prosthiki_t_platos = trim(mysql_prep($_POST['prosthiki_t_platos']));
		$prosthiki_t_u = trim(mysql_prep($_POST['prosthiki_t_u']));
		$prosthiki_t_thermo = trim(mysql_prep($_POST['prosthiki_t_thermo']));
		$prosthiki_t_thermodap = trim(mysql_prep($_POST['prosthiki_t_thermodap']));
		$prosthiki_d_ypsos = trim(mysql_prep($_POST['prosthiki_d_ypsos']));
		$prosthiki_d_u = trim(mysql_prep($_POST['prosthiki_d_u']));
		$prosthiki_d_thermo = trim(mysql_prep($_POST['prosthiki_d_thermo']));
		$prosthiki_yp_mikos = trim(mysql_prep($_POST['prosthiki_yp_mikos']));
		$prosthiki_yp_plithos = trim(mysql_prep($_POST['prosthiki_yp_plithos']));
		$prosthiki_yp_u = trim(mysql_prep($_POST['prosthiki_yp_u']));
		$prosthiki_yp_thermo = trim(mysql_prep($_POST['prosthiki_yp_thermo']));
		$prosthiki_syr_mikos = trim(mysql_prep($_POST['prosthiki_syr_mikos']));
		$prosthiki_syr_ypsos = trim(mysql_prep($_POST['prosthiki_syr_ypsos']));
		$prosthiki_syr_u = trim(mysql_prep($_POST['prosthiki_syr_u']));

			$query = "INSERT INTO kataskeyi_t_b ";
			$query .= "(user_id, meleti_id, id_zwnis, name, t_mikos, t_ypsos, t_platos, t_u, t_thermo, t_thermodap, d_ypsos, d_u, d_thermo, yp_mikos, yp_plithos, yp_u, yp_thermo, syr_mikos, syr_ypsos, syr_u)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_zwnis . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_t_mikos . "', '";
			$query .= $prosthiki_t_ypsos . "', '";
			$query .= $prosthiki_t_platos . "', '";
			$query .= $prosthiki_t_u . "', '";
			$query .= $prosthiki_t_thermo . "', '";
			$query .= $prosthiki_t_thermodap . "', '";
			$query .= $prosthiki_d_ypsos . "', '";
			$query .= $prosthiki_d_u . "', '";
			$query .= $prosthiki_d_thermo . "', '";
			$query .= $prosthiki_yp_mikos . "', '";
			$query .= $prosthiki_yp_plithos . "', '";
			$query .= $prosthiki_yp_u . "', '";
			$query .= $prosthiki_yp_thermo . "', '";
			$query .= $prosthiki_syr_mikos . "', '";
			$query .= $prosthiki_syr_ypsos . "', '";
			$query .= $prosthiki_syr_u . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε ο βόρειος τοίχος που δηλώσατε επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=6#toixoib"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		

		
//υποβλήθηκε η φόρμα για διαγραφή Α Τοίχου
if (isset($_POST['delete_toixoia'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_t_a ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή ανατολικού τοίχου επιτυχής.";
			?><script type="text/javascript">window.location = "./kenak.php?page=6#toixoia"</script><?php
			exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη Α τοίχου
if (isset($_POST['prosthiki_toixoia'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_zwnis = trim(mysql_prep($_POST['prosthiki_id_zwnis']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_t_mikos = trim(mysql_prep($_POST['prosthiki_t_mikos']));
		$prosthiki_t_ypsos = trim(mysql_prep($_POST['prosthiki_t_ypsos']));
		$prosthiki_t_platos = trim(mysql_prep($_POST['prosthiki_t_platos']));
		$prosthiki_t_u = trim(mysql_prep($_POST['prosthiki_t_u']));
		$prosthiki_t_thermo = trim(mysql_prep($_POST['prosthiki_t_thermo']));
		$prosthiki_t_thermodap = trim(mysql_prep($_POST['prosthiki_t_thermodap']));
		$prosthiki_d_ypsos = trim(mysql_prep($_POST['prosthiki_d_ypsos']));
		$prosthiki_d_u = trim(mysql_prep($_POST['prosthiki_d_u']));
		$prosthiki_d_thermo = trim(mysql_prep($_POST['prosthiki_d_thermo']));
		$prosthiki_yp_mikos = trim(mysql_prep($_POST['prosthiki_yp_mikos']));
		$prosthiki_yp_plithos = trim(mysql_prep($_POST['prosthiki_yp_plithos']));
		$prosthiki_yp_u = trim(mysql_prep($_POST['prosthiki_yp_u']));
		$prosthiki_yp_thermo = trim(mysql_prep($_POST['prosthiki_yp_thermo']));
		$prosthiki_syr_mikos = trim(mysql_prep($_POST['prosthiki_syr_mikos']));
		$prosthiki_syr_ypsos = trim(mysql_prep($_POST['prosthiki_syr_ypsos']));
		$prosthiki_syr_u = trim(mysql_prep($_POST['prosthiki_syr_u']));

			$query = "INSERT INTO kataskeyi_t_a ";
			$query .= "(user_id, meleti_id, id_zwnis, name, t_mikos, t_ypsos, t_platos, t_u, t_thermo, t_thermodap, d_ypsos, d_u, d_thermo, yp_mikos, yp_plithos, yp_u, yp_thermo, syr_mikos, syr_ypsos, syr_u)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_zwnis . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_t_mikos . "', '";
			$query .= $prosthiki_t_ypsos . "', '";
			$query .= $prosthiki_t_platos . "', '";
			$query .= $prosthiki_t_u . "', '";
			$query .= $prosthiki_t_thermo . "', '";
			$query .= $prosthiki_t_thermodap . "', '";
			$query .= $prosthiki_d_ypsos . "', '";
			$query .= $prosthiki_d_u . "', '";
			$query .= $prosthiki_d_thermo . "', '";
			$query .= $prosthiki_yp_mikos . "', '";
			$query .= $prosthiki_yp_plithos . "', '";
			$query .= $prosthiki_yp_u . "', '";
			$query .= $prosthiki_yp_thermo . "', '";
			$query .= $prosthiki_syr_mikos . "', '";
			$query .= $prosthiki_syr_ypsos . "', '";
			$query .= $prosthiki_syr_u . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε ο Ανατολικός τοίχος που δηλώσατε επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=6#toixoia"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}



//υποβλήθηκε η φόρμα για διαγραφή Ν Τοίχου
if (isset($_POST['delete_toixoin'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_t_n ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή νότιου τοίχου επιτυχής.";
			?><script type="text/javascript">window.location = "./kenak.php?page=6#toixoin"</script><?php
			exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη Ν τοίχου
if (isset($_POST['prosthiki_toixoin'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_zwnis = trim(mysql_prep($_POST['prosthiki_id_zwnis']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_t_mikos = trim(mysql_prep($_POST['prosthiki_t_mikos']));
		$prosthiki_t_ypsos = trim(mysql_prep($_POST['prosthiki_t_ypsos']));
		$prosthiki_t_platos = trim(mysql_prep($_POST['prosthiki_t_platos']));
		$prosthiki_t_u = trim(mysql_prep($_POST['prosthiki_t_u']));
		$prosthiki_t_thermo = trim(mysql_prep($_POST['prosthiki_t_thermo']));
		$prosthiki_t_thermodap = trim(mysql_prep($_POST['prosthiki_t_thermodap']));
		$prosthiki_d_ypsos = trim(mysql_prep($_POST['prosthiki_d_ypsos']));
		$prosthiki_d_u = trim(mysql_prep($_POST['prosthiki_d_u']));
		$prosthiki_d_thermo = trim(mysql_prep($_POST['prosthiki_d_thermo']));
		$prosthiki_yp_mikos = trim(mysql_prep($_POST['prosthiki_yp_mikos']));
		$prosthiki_yp_plithos = trim(mysql_prep($_POST['prosthiki_yp_plithos']));
		$prosthiki_yp_u = trim(mysql_prep($_POST['prosthiki_yp_u']));
		$prosthiki_yp_thermo = trim(mysql_prep($_POST['prosthiki_yp_thermo']));
		$prosthiki_syr_mikos = trim(mysql_prep($_POST['prosthiki_syr_mikos']));
		$prosthiki_syr_ypsos = trim(mysql_prep($_POST['prosthiki_syr_ypsos']));
		$prosthiki_syr_u = trim(mysql_prep($_POST['prosthiki_syr_u']));

			$query = "INSERT INTO kataskeyi_t_n ";
			$query .= "(user_id, meleti_id, id_zwnis, name, t_mikos, t_ypsos, t_platos, t_u, t_thermo, t_thermodap, d_ypsos, d_u, d_thermo, yp_mikos, yp_plithos, yp_u, yp_thermo, syr_mikos, syr_ypsos, syr_u)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_zwnis . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_t_mikos . "', '";
			$query .= $prosthiki_t_ypsos . "', '";
			$query .= $prosthiki_t_platos . "', '";
			$query .= $prosthiki_t_u . "', '";
			$query .= $prosthiki_t_thermo . "', '";
			$query .= $prosthiki_t_thermodap . "', '";
			$query .= $prosthiki_d_ypsos . "', '";
			$query .= $prosthiki_d_u . "', '";
			$query .= $prosthiki_d_thermo . "', '";
			$query .= $prosthiki_yp_mikos . "', '";
			$query .= $prosthiki_yp_plithos . "', '";
			$query .= $prosthiki_yp_u . "', '";
			$query .= $prosthiki_yp_thermo . "', '";
			$query .= $prosthiki_syr_mikos . "', '";
			$query .= $prosthiki_syr_ypsos . "', '";
			$query .= $prosthiki_syr_u . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε ο Νότιος τοίχος που δηλώσατε επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=6#toixoin"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}	





//υποβλήθηκε η φόρμα για διαγραφή D Τοίχου
if (isset($_POST['delete_toixoid'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_t_d ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
//	echo "Διαγραφή δυτικού τοίχου επιτυχής.";
			?><script type="text/javascript">window.location = "./kenak.php?page=6#toixoid"</script><?php
			exit;
	
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη D τοίχου
if (isset($_POST['prosthiki_toixoid'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_zwnis = trim(mysql_prep($_POST['prosthiki_id_zwnis']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_t_mikos = trim(mysql_prep($_POST['prosthiki_t_mikos']));
		$prosthiki_t_ypsos = trim(mysql_prep($_POST['prosthiki_t_ypsos']));
		$prosthiki_t_platos = trim(mysql_prep($_POST['prosthiki_t_platos']));
		$prosthiki_t_u = trim(mysql_prep($_POST['prosthiki_t_u']));
		$prosthiki_t_thermo = trim(mysql_prep($_POST['prosthiki_t_thermo']));
		$prosthiki_t_thermodap = trim(mysql_prep($_POST['prosthiki_t_thermodap']));
		$prosthiki_d_ypsos = trim(mysql_prep($_POST['prosthiki_d_ypsos']));
		$prosthiki_d_u = trim(mysql_prep($_POST['prosthiki_d_u']));
		$prosthiki_d_thermo = trim(mysql_prep($_POST['prosthiki_d_thermo']));
		$prosthiki_yp_mikos = trim(mysql_prep($_POST['prosthiki_yp_mikos']));
		$prosthiki_yp_plithos = trim(mysql_prep($_POST['prosthiki_yp_plithos']));
		$prosthiki_yp_u = trim(mysql_prep($_POST['prosthiki_yp_u']));
		$prosthiki_yp_thermo = trim(mysql_prep($_POST['prosthiki_yp_thermo']));
		$prosthiki_syr_mikos = trim(mysql_prep($_POST['prosthiki_syr_mikos']));
		$prosthiki_syr_ypsos = trim(mysql_prep($_POST['prosthiki_syr_ypsos']));
		$prosthiki_syr_u = trim(mysql_prep($_POST['prosthiki_syr_u']));

			$query = "INSERT INTO kataskeyi_t_d ";
			$query .= "(user_id, meleti_id, id_zwnis, name, t_mikos, t_ypsos, t_platos, t_u, t_thermo, t_thermodap, d_ypsos, d_u, d_thermo, yp_mikos, yp_plithos, yp_u, yp_thermo, syr_mikos, syr_ypsos, syr_u)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_zwnis . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_t_mikos . "', '";
			$query .= $prosthiki_t_ypsos . "', '";
			$query .= $prosthiki_t_platos . "', '";
			$query .= $prosthiki_t_u . "', '";
			$query .= $prosthiki_t_thermo . "', '";
			$query .= $prosthiki_t_thermodap . "', '";
			$query .= $prosthiki_d_ypsos . "', '";
			$query .= $prosthiki_d_u . "', '";
			$query .= $prosthiki_d_thermo . "', '";
			$query .= $prosthiki_yp_mikos . "', '";
			$query .= $prosthiki_yp_plithos . "', '";
			$query .= $prosthiki_yp_u . "', '";
			$query .= $prosthiki_yp_thermo . "', '";
			$query .= $prosthiki_syr_mikos . "', '";
			$query .= $prosthiki_syr_ypsos . "', '";
			$query .= $prosthiki_syr_u . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			//echo "Προστέθηκε ο Δυτικός τοίχος που δηλώσατε επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=6#toixoid"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p><br /><br />Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}		
?>