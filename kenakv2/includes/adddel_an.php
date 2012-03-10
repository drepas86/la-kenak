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
	
//υποβλήθηκε η φόρμα για διαγραφή Β Ανοίγματος
if (isset($_POST['delete_anb'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_an_b ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή βόρειου ανοίγματος επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=4#anb"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη Β Ανοίγματος
if (isset($_POST['prosthiki_anb'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_toixoy = trim(mysql_prep($_POST['prosthiki_id_toixoy']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_anoig_mikos = trim(mysql_prep($_POST['prosthiki_anoig_mikos']));
		$prosthiki_anoig_ypsos = trim(mysql_prep($_POST['prosthiki_anoig_ypsos']));
		$prosthiki_anoig_u = trim(mysql_prep($_POST['prosthiki_anoig_u']));
		$prosthiki_anoig_eidos = trim(mysql_prep($_POST['prosthiki_anoig_eidos']));
		$prosthiki_anoig_aerismos = trim(mysql_prep($_POST['prosthiki_anoig_aerismos']));
		$prosthiki_anoig_lampas = trim(mysql_prep($_POST['prosthiki_anoig_lampas']));
		$prosthiki_anoig_ankat = trim(mysql_prep($_POST['prosthiki_anoig_ankat']));

			$query = "INSERT INTO kataskeyi_an_b ";
			$query .= "(id_toixoy, name, anoig_mikos, anoig_ypsos, anoig_u, anoig_eidos, anoig_aerismos, anoig_lampas, anoig_ankat)";
			$query .= "VALUES ('";
			$query .= $prosthiki_id_toixoy . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_anoig_mikos . "', '";
			$query .= $prosthiki_anoig_ypsos . "', '";
			$query .= $prosthiki_anoig_u . "', '";
			$query .= $prosthiki_anoig_eidos . "', '";
			$query .= $prosthiki_anoig_aerismos . "', '";
			$query .= $prosthiki_anoig_lampas . "', '";
			$query .= $prosthiki_anoig_ankat . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε βόρειο άνοιγμα επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=4#anb"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}




//υποβλήθηκε η φόρμα για διαγραφή Α Ανοίγματος
if (isset($_POST['delete_ana'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_an_a ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή Ανατολικού ανοίγματος επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=4#ana"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη Α Ανοίγματος
if (isset($_POST['prosthiki_ana'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_toixoy = trim(mysql_prep($_POST['prosthiki_id_toixoy']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_anoig_mikos = trim(mysql_prep($_POST['prosthiki_anoig_mikos']));
		$prosthiki_anoig_ypsos = trim(mysql_prep($_POST['prosthiki_anoig_ypsos']));
		$prosthiki_anoig_u = trim(mysql_prep($_POST['prosthiki_anoig_u']));
		$prosthiki_anoig_eidos = trim(mysql_prep($_POST['prosthiki_anoig_eidos']));
		$prosthiki_anoig_aerismos = trim(mysql_prep($_POST['prosthiki_anoig_aerismos']));
		$prosthiki_anoig_lampas = trim(mysql_prep($_POST['prosthiki_anoig_lampas']));
		$prosthiki_anoig_ankat = trim(mysql_prep($_POST['prosthiki_anoig_ankat']));

			$query = "INSERT INTO kataskeyi_an_a ";
			$query .= "(id_toixoy, name, anoig_mikos, anoig_ypsos, anoig_u, anoig_eidos, anoig_aerismos, anoig_lampas, anoig_ankat)";
			$query .= "VALUES ('";
			$query .= $prosthiki_id_toixoy . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_anoig_mikos . "', '";
			$query .= $prosthiki_anoig_ypsos . "', '";
			$query .= $prosthiki_anoig_u . "', '";
			$query .= $prosthiki_anoig_eidos . "', '";
			$query .= $prosthiki_anoig_aerismos . "', '";
			$query .= $prosthiki_anoig_lampas . "', '";
			$query .= $prosthiki_anoig_ankat . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε Ανατολικό άνοιγμα επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=4#ana"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}	






//υποβλήθηκε η φόρμα για διαγραφή N Ανοίγματος
if (isset($_POST['delete_ann'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_an_n ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή Νότιου ανοίγματος επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=4#ann"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη N Ανοίγματος
if (isset($_POST['prosthiki_ann'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_toixoy = trim(mysql_prep($_POST['prosthiki_id_toixoy']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_anoig_mikos = trim(mysql_prep($_POST['prosthiki_anoig_mikos']));
		$prosthiki_anoig_ypsos = trim(mysql_prep($_POST['prosthiki_anoig_ypsos']));
		$prosthiki_anoig_u = trim(mysql_prep($_POST['prosthiki_anoig_u']));
		$prosthiki_anoig_eidos = trim(mysql_prep($_POST['prosthiki_anoig_eidos']));
		$prosthiki_anoig_aerismos = trim(mysql_prep($_POST['prosthiki_anoig_aerismos']));
		$prosthiki_anoig_lampas = trim(mysql_prep($_POST['prosthiki_anoig_lampas']));
		$prosthiki_anoig_ankat = trim(mysql_prep($_POST['prosthiki_anoig_ankat']));

			$query = "INSERT INTO kataskeyi_an_n ";
			$query .= "(id_toixoy, name, anoig_mikos, anoig_ypsos, anoig_u, anoig_eidos, anoig_aerismos, anoig_lampas, anoig_ankat)";
			$query .= "VALUES ('";
			$query .= $prosthiki_id_toixoy . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_anoig_mikos . "', '";
			$query .= $prosthiki_anoig_ypsos . "', '";
			$query .= $prosthiki_anoig_u . "', '";
			$query .= $prosthiki_anoig_eidos . "', '";
			$query .= $prosthiki_anoig_aerismos . "', '";
			$query .= $prosthiki_anoig_lampas . "', '";
			$query .= $prosthiki_anoig_ankat . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε Νότιο άνοιγμα επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=4#ann"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		

		
		
//υποβλήθηκε η φόρμα για διαγραφή Δ Ανοίγματος
if (isset($_POST['delete_and'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_an_d ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή Δυτιοκού Ανοίγματος επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=4#and"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη Δ Ανοίγματος
if (isset($_POST['prosthiki_and'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_toixoy = trim(mysql_prep($_POST['prosthiki_id_toixoy']));
		$prosthiki_name = trim(mysql_prep($_POST['prosthiki_name']));
		$prosthiki_anoig_mikos = trim(mysql_prep($_POST['prosthiki_anoig_mikos']));
		$prosthiki_anoig_ypsos = trim(mysql_prep($_POST['prosthiki_anoig_ypsos']));
		$prosthiki_anoig_u = trim(mysql_prep($_POST['prosthiki_anoig_u']));
		$prosthiki_anoig_eidos = trim(mysql_prep($_POST['prosthiki_anoig_eidos']));
		$prosthiki_anoig_aerismos = trim(mysql_prep($_POST['prosthiki_anoig_aerismos']));
		$prosthiki_anoig_lampas = trim(mysql_prep($_POST['prosthiki_anoig_lampas']));
		$prosthiki_anoig_ankat = trim(mysql_prep($_POST['prosthiki_anoig_ankat']));

			$query = "INSERT INTO kataskeyi_an_d ";
			$query .= "(id_toixoy, name, anoig_mikos, anoig_ypsos, anoig_u, anoig_eidos, anoig_aerismos, anoig_lampas, anoig_ankat)";
			$query .= "VALUES ('";
			$query .= $prosthiki_id_toixoy . "', '";
			$query .= $prosthiki_name . "', '";
			$query .= $prosthiki_anoig_mikos . "', '";
			$query .= $prosthiki_anoig_ypsos . "', '";
			$query .= $prosthiki_anoig_u . "', '";
			$query .= $prosthiki_anoig_eidos . "', '";
			$query .= $prosthiki_anoig_aerismos . "', '";
			$query .= $prosthiki_anoig_lampas . "', '";
			$query .= $prosthiki_anoig_ankat . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε Δυτικό άνοιγμα επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=4#and"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		

		

?>