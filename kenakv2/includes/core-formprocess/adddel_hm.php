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


//Μελέτες Η/Μ
//ΔΙΑΓΡΑΦΗ και UPDATE
	include_once("includes/form_functions.php");
	
//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_hm
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
	echo "Διαγραφή στοιχείων επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-meletes"</script><?php
}

	
	
	
//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_hm
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
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-meletes"</script><?php
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}


//ΘΕΡΜΑΝΣΗ
//ΔΙΑΓΡΑΦΗ, ΠΡΟΣΘΗΚΗ και UPDATE

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_thermp
if (isset($_POST['delete_thermp'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_thermp ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της μονάδας παραγωγής θέρμανσης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
}



//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_thermp
if (isset($_POST['prosthiki_thermp'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_type = trim(mysql_prep($_POST['prosthiki_type']));
		$prosthiki_pigienergy = trim(mysql_prep($_POST['prosthiki_pigienergy']));
		$prosthiki_isxys = trim(mysql_prep($_POST['prosthiki_isxys']));
		$prosthiki_bathm = trim(mysql_prep($_POST['prosthiki_bathm']));
		$prosthiki_cop = trim(mysql_prep($_POST['prosthiki_cop']));
		$prosthiki_jan = trim(mysql_prep($_POST['prosthiki_jan']));
		$prosthiki_feb = trim(mysql_prep($_POST['prosthiki_feb']));
		$prosthiki_mar = trim(mysql_prep($_POST['prosthiki_mar']));
		$prosthiki_apr = trim(mysql_prep($_POST['prosthiki_apr']));
		$prosthiki_may = "0";
		$prosthiki_jun = "0";
		$prosthiki_jul = "0";
		$prosthiki_aug = "0";
		$prosthiki_sep = "0";
		$prosthiki_okt = "0";
		$prosthiki_nov = trim(mysql_prep($_POST['prosthiki_nov']));
		$prosthiki_dec = trim(mysql_prep($_POST['prosthiki_dec']));

			$query = "INSERT INTO kataskeyi_xsystems_thermp ";
			$query .= "(type, pigienergy, isxys, bathm, cop, jan, feb, mar, apr, nov, decem) ";
			$query .= "VALUES ( '";
			$query .= $prosthiki_type . "', '";
			$query .= $prosthiki_pigienergy . "', '";
			$query .= $prosthiki_isxys . "', '";
			$query .= $prosthiki_bathm . "', '";
			$query .= $prosthiki_cop . "', '";
			$query .= $prosthiki_jan . "', '";
			$query .= $prosthiki_feb . "', '";
			$query .= $prosthiki_mar . "', '";
			$query .= $prosthiki_apr . "', '";
			$query .= $prosthiki_nov . "', '";
			$query .= $prosthiki_dec . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η μονάδα παραγωγής θέρμανσης επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο μονάδας παραγωγής θέρμανσης στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_thermd (πρώτη φόρμα)
if (isset($_POST['prosthiki_thermd1'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_thermd_isxys1 = trim(mysql_prep($_POST['prosthiki_thermd_isxys1']));
		$prosthiki_thermd_xwros1 = trim(mysql_prep($_POST['prosthiki_thermd_xwros1']));
		$prosthiki_thermd_bathm1 = trim(mysql_prep($_POST['prosthiki_thermd_bathm1']));
		$prosthiki_thermd_monwsi1 = trim(mysql_prep($_POST['prosthiki_thermd_monwsi1']));

			$query = "UPDATE kataskeyi_xsystems_thermd ";
			$query .= "SET isxys=";
			$query .= "'" . $prosthiki_thermd_isxys1 . "',";
			$query .= " xwros=";
			$query .= "'" . $prosthiki_thermd_xwros1 . "',";
			$query .= " bathm=";
			$query .= "'" . $prosthiki_thermd_bathm1 . "',";
			$query .= " monwsi=";
			$query .= "'" . $prosthiki_thermd_monwsi1 . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία Δίκτυο διανομής θερμού μέσου επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_thermd (δεύτερη φόρμα)		
if (isset($_POST['prosthiki_thermd2'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_thermd_isxys2 = trim(mysql_prep($_POST['prosthiki_thermd_isxys2']));
		$prosthiki_thermd_xwros2 = trim(mysql_prep($_POST['prosthiki_thermd_xwros2']));
		$prosthiki_thermd_bathm2 = trim(mysql_prep($_POST['prosthiki_thermd_bathm2']));
		$prosthiki_thermd_monwsi2 = trim(mysql_prep($_POST['prosthiki_thermd_monwsi2']));

			$query = "UPDATE kataskeyi_xsystems_thermd ";
			$query .= "SET isxys=";
			$query .= "'" . $prosthiki_thermd_isxys2 . "',";
			$query .= " xwros=";
			$query .= "'" . $prosthiki_thermd_xwros2 . "',";
			$query .= " bathm=";
			$query .= "'" . $prosthiki_thermd_bathm2 . "',";
			$query .= " monwsi=";
			$query .= "'" . $prosthiki_thermd_monwsi2 . "'";
			$query .= " WHERE id=2";
			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία Αεραγωγοί επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		
		
//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_thermt
if (isset($_POST['prosthiki_thermt'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_thermt_type = trim(mysql_prep($_POST['prosthiki_thermt_type']));
		$prosthiki_thermt_bathm = trim(mysql_prep($_POST['prosthiki_thermt_bathm']));

			$query = "UPDATE kataskeyi_xsystems_thermt ";
			$query .= "SET type=";
			$query .= "'" . $prosthiki_thermt_type . "',";
			$query .= " bathm=";
			$query .= "'" . $prosthiki_thermt_bathm . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία τερματικές μονάδες θέρμανσης επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		
		
//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_thermb
if (isset($_POST['delete_thermb'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_thermb ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της βοηθητικής μονάδας θέρμανσης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
}



//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_thermb
if (isset($_POST['prosthiki_thermb'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_type = trim(mysql_prep($_POST['prosthiki_type']));
		$prosthiki_number = trim(mysql_prep($_POST['prosthiki_number']));
		$prosthiki_isxys = trim(mysql_prep($_POST['prosthiki_isxys']));

			$query = "INSERT INTO kataskeyi_xsystems_thermb ";
			$query .= "(type, number, isxys)";
			$query .= "VALUES ('";
			$query .= $prosthiki_type . "', '";
			$query .= $prosthiki_number . "', '";
			$query .= $prosthiki_isxys . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η βοηθητική μονάδα παραγωγής θέρμανσης επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		


		
		
		
		
		
		
//ΨΥΞΗ
//ΔΙΑΓΡΑΦΗ, ΠΡΟΣΘΗΚΗ και UPDATE

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_coldp
if (isset($_POST['delete_coldp'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_coldp ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της μονάδας παραγωγής ψυξης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
}



//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_coldp
if (isset($_POST['prosthiki_coldp'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_type = trim(mysql_prep($_POST['prosthiki_type']));
		$prosthiki_pigienergy = trim(mysql_prep($_POST['prosthiki_pigienergy']));
		$prosthiki_isxys = trim(mysql_prep($_POST['prosthiki_isxys']));
		$prosthiki_bathm = trim(mysql_prep($_POST['prosthiki_bathm']));
		$prosthiki_eer = trim(mysql_prep($_POST['prosthiki_eer']));
		$prosthiki_jan = trim(mysql_prep($_POST['prosthiki_jan']));
		$prosthiki_feb = trim(mysql_prep($_POST['prosthiki_feb']));
		$prosthiki_mar = trim(mysql_prep($_POST['prosthiki_mar']));
		$prosthiki_apr = trim(mysql_prep($_POST['prosthiki_apr']));
		$prosthiki_may = trim(mysql_prep($_POST['prosthiki_may']));
		$prosthiki_jun = trim(mysql_prep($_POST['prosthiki_jun']));
		$prosthiki_jul = trim(mysql_prep($_POST['prosthiki_jul']));
		$prosthiki_aug = trim(mysql_prep($_POST['prosthiki_aug']));
		$prosthiki_sep = trim(mysql_prep($_POST['prosthiki_sep']));
		$prosthiki_okt = trim(mysql_prep($_POST['prosthiki_okt']));
		$prosthiki_nov = trim(mysql_prep($_POST['prosthiki_nov']));
		$prosthiki_dec = trim(mysql_prep($_POST['prosthiki_dec']));

			$query = "INSERT INTO kataskeyi_xsystems_coldp ";
			$query .= "(type, pigienergy, isxys, bathm, eer, may, jun, jul, aug, sep)";
			$query .= "VALUES ('";
			$query .= $prosthiki_type . "', '";
			$query .= $prosthiki_pigienergy . "', '";
			$query .= $prosthiki_isxys . "', '";
			$query .= $prosthiki_bathm . "', '";
			$query .= $prosthiki_eer . "', '";
			$query .= $prosthiki_may . "', '";
			$query .= $prosthiki_jun . "', '";
			$query .= $prosthiki_jul . "', '";
			$query .= $prosthiki_aug . "', '";
			$query .= $prosthiki_sep . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η μονάδα παραγωγής ψυξης επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_coldd (πρώτη φόρμα)
if (isset($_POST['prosthiki_coldd1'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_coldd_isxys1 = trim(mysql_prep($_POST['prosthiki_coldd_isxys1']));
		$prosthiki_coldd_xwros1 = trim(mysql_prep($_POST['prosthiki_coldd_xwros1']));
		$prosthiki_coldd_bathm1 = trim(mysql_prep($_POST['prosthiki_coldd_bathm1']));
		$prosthiki_coldd_monwsi1 = trim(mysql_prep($_POST['prosthiki_coldd_monwsi1']));

			$query = "UPDATE kataskeyi_xsystems_coldd ";
			$query .= "SET isxys=";
			$query .= "'" . $prosthiki_coldd_isxys1 . "',";
			$query .= " xwros=";
			$query .= "'" . $prosthiki_coldd_xwros1 . "',";
			$query .= " bathm=";
			$query .= "'" . $prosthiki_coldd_bathm1 . "',";
			$query .= " monwsi=";
			$query .= "'" . $prosthiki_coldd_monwsi1 . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία Δίκτυο διανομής ψυχρού μέσου επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_coldd (δεύτερη φόρμα)		
if (isset($_POST['prosthiki_coldd2'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_coldd_isxys2 = trim(mysql_prep($_POST['prosthiki_coldd_isxys2']));
		$prosthiki_coldd_xwros2 = trim(mysql_prep($_POST['prosthiki_coldd_xwros2']));
		$prosthiki_coldd_bathm2 = trim(mysql_prep($_POST['prosthiki_coldd_bathm2']));
		$prosthiki_coldd_monwsi2 = trim(mysql_prep($_POST['prosthiki_coldd_monwsi2']));

			$query = "UPDATE kataskeyi_xsystems_coldd ";
			$query .= "SET isxys=";
			$query .= "'" . $prosthiki_coldd_isxys2 . "',";
			$query .= " xwros=";
			$query .= "'" . $prosthiki_coldd_xwros2 . "',";
			$query .= " bathm=";
			$query .= "'" . $prosthiki_coldd_bathm2 . "',";
			$query .= " monwsi=";
			$query .= "'" . $prosthiki_coldd_monwsi2 . "'";
			$query .= " WHERE id=2";
			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία Αεραγωγοί ψυξης επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

		
		
//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_coldt
if (isset($_POST['prosthiki_coldt'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_coldt_type = trim(mysql_prep($_POST['prosthiki_coldt_type']));
		$prosthiki_coldt_bathm = trim(mysql_prep($_POST['prosthiki_coldt_bathm']));

			$query = "UPDATE kataskeyi_xsystems_coldt ";
			$query .= "SET type=";
			$query .= "'" . $prosthiki_coldt_type . "',";
			$query .= " bathm=";
			$query .= "'" . $prosthiki_coldt_bathm . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία τερματικές μονάδες ψυξης επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		
		
//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_coldb
if (isset($_POST['delete_coldb'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_coldb ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της βοηθητικής μονάδας ψύξης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
}



//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_coldb
if (isset($_POST['prosthiki_coldb'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_type = trim(mysql_prep($_POST['prosthiki_type']));
		$prosthiki_number = trim(mysql_prep($_POST['prosthiki_number']));
		$prosthiki_isxys = trim(mysql_prep($_POST['prosthiki_isxys']));

			$query = "INSERT INTO kataskeyi_xsystems_coldb ";
			$query .= "(type, number, isxys)";
			$query .= "VALUES ('";
			$query .= $prosthiki_type . "', '";
			$query .= $prosthiki_number . "', '";
			$query .= $prosthiki_isxys . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η βοηθητική μονάδα παραγωγής ψύξης επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
		
		
		
		
		
//ZNX
//ΔΙΑΓΡΑΦΗ, ΠΡΟΣΘΗΚΗ και UPDATE

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_znxp
if (isset($_POST['delete_znxp'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_znxp ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της μονάδας παραγωγής ZNX επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-znx"</script><?php
			exit;
}



//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_znxp
if (isset($_POST['prosthiki_znxp'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_type = trim(mysql_prep($_POST['prosthiki_type']));
		$prosthiki_pigienergy = trim(mysql_prep($_POST['prosthiki_pigienergy']));
		$prosthiki_isxys = trim(mysql_prep($_POST['prosthiki_isxys']));
		$prosthiki_bathm = trim(mysql_prep($_POST['prosthiki_bathm']));
		$prosthiki_jan = trim(mysql_prep($_POST['prosthiki_jan']));
		$prosthiki_feb = trim(mysql_prep($_POST['prosthiki_feb']));
		$prosthiki_mar = trim(mysql_prep($_POST['prosthiki_mar']));
		$prosthiki_apr = trim(mysql_prep($_POST['prosthiki_apr']));
		$prosthiki_may = trim(mysql_prep($_POST['prosthiki_may']));
		$prosthiki_jun = trim(mysql_prep($_POST['prosthiki_jun']));
		$prosthiki_jul = trim(mysql_prep($_POST['prosthiki_jul']));
		$prosthiki_aug = trim(mysql_prep($_POST['prosthiki_aug']));
		$prosthiki_sep = trim(mysql_prep($_POST['prosthiki_sep']));
		$prosthiki_okt = trim(mysql_prep($_POST['prosthiki_okt']));
		$prosthiki_nov = trim(mysql_prep($_POST['prosthiki_nov']));
		$prosthiki_dec = trim(mysql_prep($_POST['prosthiki_dec']));

			$query = "INSERT INTO kataskeyi_xsystems_znxp ";
			$query .= "(type, pigienergy, isxys, bathm, jan, feb, mar, apr, may, jun, jul, aug, sep, okt, nov, decem)";
			$query .= "VALUES ('";
			$query .= $prosthiki_type . "', '";
			$query .= $prosthiki_pigienergy . "', '";
			$query .= $prosthiki_isxys . "', '";
			$query .= $prosthiki_bathm . "', '";
			$query .= $prosthiki_jan . "', '";
			$query .= $prosthiki_feb . "', '";
			$query .= $prosthiki_mar . "', '";
			$query .= $prosthiki_apr . "', '";
			$query .= $prosthiki_may . "', '";
			$query .= $prosthiki_jun . "', '";
			$query .= $prosthiki_jul . "', '";
			$query .= $prosthiki_aug . "', '";
			$query .= $prosthiki_sep . "', '";
			$query .= $prosthiki_okt . "', '";
			$query .= $prosthiki_nov . "', '";
			$query .= $prosthiki_dec . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η μονάδα παραγωγής ΖΝΧ επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-znx"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_znxd
if (isset($_POST['prosthiki_znxd'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_znxd_type = trim(mysql_prep($_POST['prosthiki_znxd_type']));
		$prosthiki_znxd_anakykloforia = trim(mysql_prep($_POST['prosthiki_znxd_anakykloforia']));
		$prosthiki_znxd_xwros = trim(mysql_prep($_POST['prosthiki_znxd_xwros']));
		$prosthiki_znxd_bathm = trim(mysql_prep($_POST['prosthiki_znxd_bathm']));

			$query = "UPDATE kataskeyi_xsystems_znxd ";
			$query .= "SET type=";
			$query .= "'" . $prosthiki_znxd_type . "',";
			$query .= " anakykloforia=";
			$query .= "'" . $prosthiki_znxd_anakykloforia . "',";
			$query .= " xwros=";
			$query .= "'" . $prosthiki_znxd_xwros . "',";
			$query .= " bathm=";
			$query .= "'" . $prosthiki_znxd_bathm . "'";
			$query .= " WHERE id=1";
			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία Δίκτυο διανομής ZNX επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-znx"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		
//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_znxa
if (isset($_POST['prosthiki_znxa'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_znxa_type = trim(mysql_prep($_POST['prosthiki_znxa_type']));
		$prosthiki_znxa_bathm = trim(mysql_prep($_POST['prosthiki_znxa_bathm']));

			$query = "INSERT INTO kataskeyi_xsystems_znxa ";
			$query .= "(type, bathm)";
			$query .= "VALUES ('";
			$query .= $prosthiki_znxa_type . "', '";
			$query .= $prosthiki_znxa_bathm . "')";
			
			$result = mysql_query($query);
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Προστέθηκε η αποθηκευτική μονάδα ΖΝΧ επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-znx"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

?>