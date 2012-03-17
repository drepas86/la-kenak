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


//ΘΕΡΜΑΝΣΗ - ΨΎΞΗ
//ΔΙΑΓΡΑΦΗ

//-------------------------------------------ΘΕΡΜΑΝΣΗ-----------------------------------------------------

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_thermp
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
	echo "Διαγραφή της μονάδας (βοηθητικής) θέρμανσης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
}

if (isset($_POST['delete_thermd'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_thermd ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή του δικτύου διανομής θέρμανσης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
}

if (isset($_POST['delete_thermt'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_thermt ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της τερματικής μονάδας θέρμανσης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-thermansi"</script><?php
			exit;
}

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


//-------------------------------------------ΨΥΞΗ-----------------------------------------------------


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
	echo "Διαγραφή της μονάδας παραγωγής ψυξης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
}

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_coldd
if (isset($_POST['delete_coldd'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_coldd ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της μονάδας παραγωγής ψυξης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
}

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


//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_coldt
if (isset($_POST['delete_coldt'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_coldt ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της μονάδας παραγωγής ψυξης επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
}

//-------------------------------------------ZNX-----------------------------------------------------

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_znxa
if (isset($_POST['delete_znxa'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_znxa ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της μονάδας παραγωγής ZNX επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-znx"</script><?php
			exit;
}

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_znxd
if (isset($_POST['delete_znxd'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_znxd ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή της μονάδας παραγωγής ZNX επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-znx"</script><?php
			exit;
}

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


//-------------------------------------------ΗΛΙΑΚΟΣ-----------------------------------------------------

//υποβλήθηκε η φόρμα για διαγραφή στον πίνακα kataskeyi_xsystems_znxiliakos
if (isset($_POST['delete_systemiliakos'])) {
for($i=0;$i<count($_POST["delcheck"]);$i++)
	{
		if($_POST["delcheck"][$i] != "")
		{
			$strSQL = "DELETE FROM kataskeyi_xsystems_znxiliakos ";
			$strSQL .="WHERE id = '".$_POST["delcheck"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	echo "Διαγραφή του ηλιακού επιτυχής.";
	?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-iliakos"</script><?php
			exit;
}





//ΘΕΡΜΑΝΣΗ - ΨΎΞΗ - ZNX
//ΠΡΟΣΘΗΚΕΣ

//-------------------------------------------ΘΕΡΜΑΝΣΗ-----------------------------------------------------

//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_thermp
if (isset($_POST['prosthiki_thermp'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));
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
			$query .= "(id_zwnis, type, pigienergy, isxys, bathm, cop, jan, feb, mar, apr, nov, decem) ";
			$query .= "VALUES ( '";
			$query .= $prosthiki_zwni . "', '";
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

		
		
//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_thermd
if (isset($_POST['prosthiki_thermd'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_thermd_isxys = trim(mysql_prep($_POST['prosthiki_thermd_isxys']));
		$prosthiki_thermd_xwros = trim(mysql_prep($_POST['prosthiki_thermd_xwros']));
		$prosthiki_thermd_bathm = trim(mysql_prep($_POST['prosthiki_thermd_bathm']));
		$prosthiki_thermd_monwsi = trim(mysql_prep($_POST['prosthiki_thermd_monwsi']));
		$prosthiki_thermd_type = trim(mysql_prep($_POST['prosthiki_thermd_type']));
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));

			$query = "INSERT INTO kataskeyi_xsystems_thermd ";
			$query .= "(id_zwnis, type, isxys, xwros, bathm, monwsi) ";
			$query .= "VALUES ( '";
			$query .= $prosthiki_zwni . "', '";
			$query .= $prosthiki_thermd_type . "', '";
			$query .= $prosthiki_thermd_isxys . "', '";
			$query .= $prosthiki_thermd_xwros . "', '";
			$query .= $prosthiki_thermd_bathm . "', '";
			$query .= $prosthiki_thermd_monwsi . "')";

			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία δικτύου διανομής θερμού μέσου επιτυχώς";
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
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));
		
			$query = "INSERT INTO kataskeyi_xsystems_thermt ";
			$query .= "(id_zwnis, type, bathm) ";
			$query .= "VALUES ( '";
			$query .= $prosthiki_zwni . "', '";
			$query .= $prosthiki_thermt_type . "', '";
			$query .= $prosthiki_thermt_bathm . "')";
			
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
		

//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_thermb
if (isset($_POST['prosthiki_thermb'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_type = trim(mysql_prep($_POST['prosthiki_type']));
		$prosthiki_number = trim(mysql_prep($_POST['prosthiki_number']));
		$prosthiki_isxys = trim(mysql_prep($_POST['prosthiki_isxys']));
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));

			$query = "INSERT INTO kataskeyi_xsystems_thermb ";
			$query .= "(id_zwnis, type, number, isxys)";
			$query .= "VALUES ('";
			$query .= $prosthiki_zwni . "', '";
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
		
		


//-------------------------------------------ΨΥΞΗ-----------------------------------------------------


//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_coldp
if (isset($_POST['prosthiki_coldp'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));
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
			$query .= "(id_zwnis, type, pigienergy, isxys, bathm, eer, may, jun, jul, aug, sep)";
			$query .= "VALUES ('";
			$query .= $prosthiki_zwni . "', '";
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

		
		
//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_coldd
if (isset($_POST['prosthiki_coldd'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_coldd_isxys = trim(mysql_prep($_POST['prosthiki_coldd_isxys']));
		$prosthiki_coldd_xwros = trim(mysql_prep($_POST['prosthiki_coldd_xwros']));
		$prosthiki_coldd_bathm = trim(mysql_prep($_POST['prosthiki_coldd_bathm']));
		$prosthiki_coldd_monwsi = trim(mysql_prep($_POST['prosthiki_coldd_monwsi']));
		$prosthiki_coldd_type = trim(mysql_prep($_POST['prosthiki_coldd_type']));
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));

		
			$query = "INSERT INTO kataskeyi_xsystems_coldd ";
			$query .= "(id_zwnis, type, isxys, xwros, bathm, monwsi)";
			$query .= "VALUES ('";
			$query .= $prosthiki_zwni . "', '";
			$query .= $prosthiki_coldd_type . "', '";
			$query .= $prosthiki_coldd_isxys . "', '";
			$query .= $prosthiki_coldd_xwros . "', '";
			$query .= $prosthiki_coldd_bathm . "', '";
			$query .= $prosthiki_coldd_monwsi . "')";
			
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

	
		
//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_thermt
if (isset($_POST['prosthiki_coldt'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_coldt_type = trim(mysql_prep($_POST['prosthiki_coldt_type']));
		$prosthiki_coldt_bathm = trim(mysql_prep($_POST['prosthiki_coldt_bathm']));
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));
		
			$query = "INSERT INTO kataskeyi_xsystems_coldt ";
			$query .= "(id_zwnis, type, bathm) ";
			$query .= "VALUES ( '";
			$query .= $prosthiki_zwni . "', '";
			$query .= $prosthiki_coldt_type . "', '";
			$query .= $prosthiki_coldt_bathm . "')";
			
			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία τερματικές μονάδες ψύξης επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-psyksi"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}
		
		



//υποβλήθηκε η φόρμα για προσθήκη στον πίνακα kataskeyi_xsystems_coldb
if (isset($_POST['prosthiki_coldb'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_type = trim(mysql_prep($_POST['prosthiki_type']));
		$prosthiki_number = trim(mysql_prep($_POST['prosthiki_number']));
		$prosthiki_isxys = trim(mysql_prep($_POST['prosthiki_isxys']));
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));

			$query = "INSERT INTO kataskeyi_xsystems_coldb ";
			$query .= "(id_zwnis, type, number, isxys)";
			$query .= "VALUES ('";
			$query .= $prosthiki_zwni . "', '";
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
		
		
		
		
//-------------------------------------------ΨΥΞΗ-----------------------------------------------------	


//ZNX ΠΡΟΣΘΗΚΗ

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
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));

			$query = "INSERT INTO kataskeyi_xsystems_znxp ";
			$query .= "(id_zwnis, type, pigienergy, isxys, bathm, jan, feb, mar, apr, may, jun, jul, aug, sep, okt, nov, decem)";
			$query .= "VALUES ('";
			$query .= $prosthiki_zwni . "', '";
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
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));
			
			
			$query = "INSERT INTO kataskeyi_xsystems_znxd ";
			$query .= "(id_zwnis, type, anakykloforia, xwros, bathm)";
			$query .= "VALUES ('";
			$query .= $prosthiki_zwni . "', '";
			$query .= $prosthiki_znxd_type . "', '";
			$query .= $prosthiki_znxd_anakykloforia . "', '";
			$query .= $prosthiki_znxd_xwros . "', '";
			$query .= $prosthiki_znxd_bathm . "')";
			
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
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));

			$query = "INSERT INTO kataskeyi_xsystems_znxa ";
			$query .= "(id_zwnis, type, bathm)";
			$query .= "VALUES ('";
			$query .= $prosthiki_zwni . "', '";
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
		
//-------------------------------------------ΗΛΙΑΚΟΣ-----------------------------------------------------	
		
		
//υποβλήθηκε η φόρμα για UPDATE στον πίνακα kataskeyi_xsystems_znxiliakos
if (isset($_POST['prosthiki_systemiliakos'])) {
// Δεδομένα για τη φόρμα
		$prosthiki_epifaneia = trim(mysql_prep($_POST['prosthiki_epifaneia']));
		$prosthiki_zwni = trim(mysql_prep($_POST['prosthiki_zwni']));

			$query = "INSERT INTO kataskeyi_xsystems_znxiliakos ";
			$query .= "(id_zwnis, epifaneia) ";
			$query .= "VALUES ( '";
			$query .= $prosthiki_zwni . "', '";
			$query .= $prosthiki_epifaneia . "')";

			$result = mysql_query($query);
			
			if ($result) {
			// Εγγραφή επιτυχής
			echo "Τροποποιήθηκαν τα στοιχεία δικτύου διανομής θερμού μέσου επιτυχώς";
			?><script type="text/javascript">window.location = "./kenak.php?page=10#tab-iliakos"</script><?php
			exit;
			} else {
			// Λάθος.
			echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
			echo "<p>" . mysql_error() . "</p>";
			}
		}

?>