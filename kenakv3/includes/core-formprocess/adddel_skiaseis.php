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
	
//υποβλήθηκε η φόρμα για διαγραφή σκίασης τοίχου ΒΟΡΕΙΑ
if (isset($_POST['delete_sk_t_b'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_skiaseis_t_b ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή σκίασης Βόρειου τοίχου επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=8#sk_toix_b"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη σκίασης τοίχου ΒΟΡΕΙΑ
if (isset($_POST['prosthiki_sk_t_b'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_toixoy = trim(mysql_prep($_POST['prosthiki_id_toixoy']));
		$prosthiki_f_hor_h_t = trim(mysql_prep($_POST['prosthiki_f_hor_h_t']));
		$prosthiki_f_hor_c_t = trim(mysql_prep($_POST['prosthiki_f_hor_c_t']));
		$prosthiki_f_ov_h_t = trim(mysql_prep($_POST['prosthiki_f_ov_h_t']));
		$prosthiki_f_ov_c_t = trim(mysql_prep($_POST['prosthiki_f_ov_c_t']));
		$prosthiki_f_fin_h_t = trim(mysql_prep($_POST['prosthiki_f_fin_h_t']));
		$prosthiki_f_fin_c_t = trim(mysql_prep($_POST['prosthiki_f_fin_c_t']));

			$query = "INSERT INTO kataskeyi_skiaseis_t_b ";
			$query .= "(user_id, meleti_id, id_toixoy, f_hor_h, f_hor_c, f_ov_h, f_ov_c, f_fin_h, f_fin_c)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_toixoy . "', '";
			$query .= $prosthiki_f_hor_h_t . "', '";
			$query .= $prosthiki_f_hor_c_t . "', '";
			$query .= $prosthiki_f_ov_h_t . "', '";
			$query .= $prosthiki_f_ov_c_t . "', '";
			$query .= $prosthiki_f_fin_h_t . "', '";
			$query .= $prosthiki_f_fin_c_t . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε σκίαση Βόρειου τοίχου επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=8#sk_toix_b"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		
//υποβλήθηκε η φόρμα για διαγραφή σκίασης τοίχου ΑΝΑΤΟΛΙΚΑ
if (isset($_POST['delete_sk_t_a'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_skiaseis_t_a ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή σκίασης Ανατολικού τοίχου επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=8#sk_toix_a"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη σκίασης τοίχου ΑΝΑΤΟΛΙΚΑ
if (isset($_POST['prosthiki_sk_t_a'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_toixoy = trim(mysql_prep($_POST['prosthiki_id_toixoy']));
		$prosthiki_f_hor_h_t = trim(mysql_prep($_POST['prosthiki_f_hor_h_t']));
		$prosthiki_f_hor_c_t = trim(mysql_prep($_POST['prosthiki_f_hor_c_t']));
		$prosthiki_f_ov_h_t = trim(mysql_prep($_POST['prosthiki_f_ov_h_t']));
		$prosthiki_f_ov_c_t = trim(mysql_prep($_POST['prosthiki_f_ov_c_t']));
		$prosthiki_f_fin_h_t = trim(mysql_prep($_POST['prosthiki_f_fin_h_t']));
		$prosthiki_f_fin_c_t = trim(mysql_prep($_POST['prosthiki_f_fin_c_t']));

			$query = "INSERT INTO kataskeyi_skiaseis_t_a ";
			$query .= "(user_id, meleti_id, id_toixoy, f_hor_h, f_hor_c, f_ov_h, f_ov_c, f_fin_h, f_fin_c)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_toixoy . "', '";
			$query .= $prosthiki_f_hor_h_t . "', '";
			$query .= $prosthiki_f_hor_c_t . "', '";
			$query .= $prosthiki_f_ov_h_t . "', '";
			$query .= $prosthiki_f_ov_c_t . "', '";
			$query .= $prosthiki_f_fin_h_t . "', '";
			$query .= $prosthiki_f_fin_c_t . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε σκίαση Ανατολικού τοίχου επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=8#sk_toix_a"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}


		
//υποβλήθηκε η φόρμα για διαγραφή σκίασης τοίχου ΝΟΤΙΑ
if (isset($_POST['delete_sk_t_n'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_skiaseis_t_n ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή σκίασης Νότιου τοίχου επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=8#sk_toix_n"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη σκίασης τοίχου ΝΟΤΙΑ
if (isset($_POST['prosthiki_sk_t_n'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_toixoy = trim(mysql_prep($_POST['prosthiki_id_toixoy']));
		$prosthiki_f_hor_h_t = trim(mysql_prep($_POST['prosthiki_f_hor_h_t']));
		$prosthiki_f_hor_c_t = trim(mysql_prep($_POST['prosthiki_f_hor_c_t']));
		$prosthiki_f_ov_h_t = trim(mysql_prep($_POST['prosthiki_f_ov_h_t']));
		$prosthiki_f_ov_c_t = trim(mysql_prep($_POST['prosthiki_f_ov_c_t']));
		$prosthiki_f_fin_h_t = trim(mysql_prep($_POST['prosthiki_f_fin_h_t']));
		$prosthiki_f_fin_c_t = trim(mysql_prep($_POST['prosthiki_f_fin_c_t']));

			$query = "INSERT INTO kataskeyi_skiaseis_t_n ";
			$query .= "(user_id, meleti_id, id_toixoy, f_hor_h, f_hor_c, f_ov_h, f_ov_c, f_fin_h, f_fin_c)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_toixoy . "', '";
			$query .= $prosthiki_f_hor_h_t . "', '";
			$query .= $prosthiki_f_hor_c_t . "', '";
			$query .= $prosthiki_f_ov_h_t . "', '";
			$query .= $prosthiki_f_ov_c_t . "', '";
			$query .= $prosthiki_f_fin_h_t . "', '";
			$query .= $prosthiki_f_fin_c_t . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε σκίαση Νότιου τοίχου επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=8#sk_toix_n"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}		
		
		
		
//υποβλήθηκε η φόρμα για διαγραφή σκίασης τοίχου ΔΥΤΙΚΑ
if (isset($_POST['delete_sk_t_d'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_skiaseis_t_d ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή σκίασης Δυτικού τοίχου επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=8#sk_toix_d"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη σκίασης τοίχου ΔΥΤΙΚΑ
if (isset($_POST['prosthiki_sk_t_d'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_toixoy = trim(mysql_prep($_POST['prosthiki_id_toixoy']));
		$prosthiki_f_hor_h_t = trim(mysql_prep($_POST['prosthiki_f_hor_h_t']));
		$prosthiki_f_hor_c_t = trim(mysql_prep($_POST['prosthiki_f_hor_c_t']));
		$prosthiki_f_ov_h_t = trim(mysql_prep($_POST['prosthiki_f_ov_h_t']));
		$prosthiki_f_ov_c_t = trim(mysql_prep($_POST['prosthiki_f_ov_c_t']));
		$prosthiki_f_fin_h_t = trim(mysql_prep($_POST['prosthiki_f_fin_h_t']));
		$prosthiki_f_fin_c_t = trim(mysql_prep($_POST['prosthiki_f_fin_c_t']));

			$query = "INSERT INTO kataskeyi_skiaseis_t_d ";
			$query .= "(user_id, meleti_id, id_toixoy, f_hor_h, f_hor_c, f_ov_h, f_ov_c, f_fin_h, f_fin_c)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_toixoy . "', '";
			$query .= $prosthiki_f_hor_h_t . "', '";
			$query .= $prosthiki_f_hor_c_t . "', '";
			$query .= $prosthiki_f_ov_h_t . "', '";
			$query .= $prosthiki_f_ov_c_t . "', '";
			$query .= $prosthiki_f_fin_h_t . "', '";
			$query .= $prosthiki_f_fin_c_t . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε σκίαση Δυτικού τοίχου επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=8#sk_toix_d"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}		
		
		

//υποβλήθηκε η φόρμα για διαγραφή σκίασης Ανοίγματος ΒΟΡΕΙΑ
if (isset($_POST['delete_sk_an_b'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_skiaseis_an_b ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή σκίασης Βόρειου ανοίγματος επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=9#sk_an_b"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη σκίασης Ανοίγματος ΒΟΡΕΙΑ
if (isset($_POST['prosthiki_sk_an_b'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_an = trim(mysql_prep($_POST['prosthiki_id_an']));
		$prosthiki_f_hor_h_an = trim(mysql_prep($_POST['prosthiki_f_hor_h_an']));
		$prosthiki_f_hor_c_an = trim(mysql_prep($_POST['prosthiki_f_hor_c_an']));
		$prosthiki_f_ov_h_an = trim(mysql_prep($_POST['prosthiki_f_ov_h_an']));
		$prosthiki_f_ov_c_an = trim(mysql_prep($_POST['prosthiki_f_ov_c_an']));
		$prosthiki_f_fin_h_an = trim(mysql_prep($_POST['prosthiki_f_fin_h_an']));
		$prosthiki_f_fin_c_an = trim(mysql_prep($_POST['prosthiki_f_fin_c_an']));

			$query = "INSERT INTO kataskeyi_skiaseis_an_b ";
			$query .= "(user_id, meleti_id, id_an, f_hor_h, f_hor_c, f_ov_h, f_ov_c, f_fin_h, f_fin_c)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_an . "', '";
			$query .= $prosthiki_f_hor_h_an . "', '";
			$query .= $prosthiki_f_hor_c_an . "', '";
			$query .= $prosthiki_f_ov_h_an . "', '";
			$query .= $prosthiki_f_ov_c_an . "', '";
			$query .= $prosthiki_f_fin_h_an . "', '";
			$query .= $prosthiki_f_fin_c_an . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε σκίαση Βόρειου ανοίγματος επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=9#sk_an_b"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}	
		
		
		
		
//υποβλήθηκε η φόρμα για διαγραφή σκίασης Ανοίγματος ΑΝΑΤΟΛΙΚΑ
if (isset($_POST['delete_sk_an_a'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_skiaseis_an_a ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή σκίασης Ανατολικού ανοίγματος επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=9#sk_an_a"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη σκίασης Ανοίγματος ΑΝΑΤΟΛΙΚΑ
if (isset($_POST['prosthiki_sk_an_a'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_an = trim(mysql_prep($_POST['prosthiki_id_an']));
		$prosthiki_f_hor_h_an = trim(mysql_prep($_POST['prosthiki_f_hor_h_an']));
		$prosthiki_f_hor_c_an = trim(mysql_prep($_POST['prosthiki_f_hor_c_an']));
		$prosthiki_f_ov_h_an = trim(mysql_prep($_POST['prosthiki_f_ov_h_an']));
		$prosthiki_f_ov_c_an = trim(mysql_prep($_POST['prosthiki_f_ov_c_an']));
		$prosthiki_f_fin_h_an = trim(mysql_prep($_POST['prosthiki_f_fin_h_an']));
		$prosthiki_f_fin_c_an = trim(mysql_prep($_POST['prosthiki_f_fin_c_an']));

			$query = "INSERT INTO kataskeyi_skiaseis_an_a ";
			$query .= "(user_id, meleti_id, id_an, f_hor_h, f_hor_c, f_ov_h, f_ov_c, f_fin_h, f_fin_c)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_an . "', '";
			$query .= $prosthiki_f_hor_h_an . "', '";
			$query .= $prosthiki_f_hor_c_an . "', '";
			$query .= $prosthiki_f_ov_h_an . "', '";
			$query .= $prosthiki_f_ov_c_an . "', '";
			$query .= $prosthiki_f_fin_h_an . "', '";
			$query .= $prosthiki_f_fin_c_an . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε σκίαση Ανατολικού ανοίγματος επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=9#sk_an_a"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}





//υποβλήθηκε η φόρμα για διαγραφή σκίασης Ανοίγματος ΝΟΤΙΑ
if (isset($_POST['delete_sk_an_n'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_skiaseis_an_n ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή σκίασης Νότιου ανοίγματος επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=9#sk_an_n"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη σκίασης Ανοίγματος ΝΟΤΙΑ
if (isset($_POST['prosthiki_sk_an_n'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_an = trim(mysql_prep($_POST['prosthiki_id_an']));
		$prosthiki_f_hor_h_an = trim(mysql_prep($_POST['prosthiki_f_hor_h_an']));
		$prosthiki_f_hor_c_an = trim(mysql_prep($_POST['prosthiki_f_hor_c_an']));
		$prosthiki_f_ov_h_an = trim(mysql_prep($_POST['prosthiki_f_ov_h_an']));
		$prosthiki_f_ov_c_an = trim(mysql_prep($_POST['prosthiki_f_ov_c_an']));
		$prosthiki_f_fin_h_an = trim(mysql_prep($_POST['prosthiki_f_fin_h_an']));
		$prosthiki_f_fin_c_an = trim(mysql_prep($_POST['prosthiki_f_fin_c_an']));

			$query = "INSERT INTO kataskeyi_skiaseis_an_n ";
			$query .= "(user_id, meleti_id, id_an, f_hor_h, f_hor_c, f_ov_h, f_ov_c, f_fin_h, f_fin_c)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_an . "', '";
			$query .= $prosthiki_f_hor_h_an . "', '";
			$query .= $prosthiki_f_hor_c_an . "', '";
			$query .= $prosthiki_f_ov_h_an . "', '";
			$query .= $prosthiki_f_ov_c_an . "', '";
			$query .= $prosthiki_f_fin_h_an . "', '";
			$query .= $prosthiki_f_fin_c_an . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε σκίαση Νότιου ανοίγματος επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=9#sk_an_n"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}	




//υποβλήθηκε η φόρμα για διαγραφή σκίασης Ανοίγματος ΔΥΤΙΚΑ
if (isset($_POST['delete_sk_an_d'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_skiaseis_an_d ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή σκίασης Δυτικού ανοίγματος επιτυχής.";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=9#sk_an_d"</script><?php
	exit;
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη σκίασης Ανοίγματος ΔΥΤΙΚΑ
if (isset($_POST['prosthiki_sk_an_d'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_id_an = trim(mysql_prep($_POST['prosthiki_id_an']));
		$prosthiki_f_hor_h_an = trim(mysql_prep($_POST['prosthiki_f_hor_h_an']));
		$prosthiki_f_hor_c_an = trim(mysql_prep($_POST['prosthiki_f_hor_c_an']));
		$prosthiki_f_ov_h_an = trim(mysql_prep($_POST['prosthiki_f_ov_h_an']));
		$prosthiki_f_ov_c_an = trim(mysql_prep($_POST['prosthiki_f_ov_c_an']));
		$prosthiki_f_fin_h_an = trim(mysql_prep($_POST['prosthiki_f_fin_h_an']));
		$prosthiki_f_fin_c_an = trim(mysql_prep($_POST['prosthiki_f_fin_c_an']));

			$query = "INSERT INTO kataskeyi_skiaseis_an_d ";
			$query .= "(user_id, meleti_id, id_an, f_hor_h, f_hor_c, f_ov_h, f_ov_c, f_fin_h, f_fin_c)";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $_SESSION['meleti_id'] . "', '";
			$query .= $prosthiki_id_an . "', '";
			$query .= $prosthiki_f_hor_h_an . "', '";
			$query .= $prosthiki_f_hor_c_an . "', '";
			$query .= $prosthiki_f_ov_h_an . "', '";
			$query .= $prosthiki_f_ov_c_an . "', '";
			$query .= $prosthiki_f_fin_h_an . "', '";
			$query .= $prosthiki_f_fin_c_an . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε σκίαση Δυτικού ανοίγματος επιτυχώς";
	//Tsak mod
	?><script type="text/javascript">window.location = "./kenak.php?page=9#sk_an_d"</script><?php
	exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}		

?>