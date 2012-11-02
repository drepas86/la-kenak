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

***********************************************************************
Tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr     *
                                                                      *
- Αποθήκευση τοίχου μετά από επεξεργασία των στοιχείων για τους       *
- στύλους και τα ανοίγματα                                            *
- Καλείται από kenak_form3   (function savewall)                      *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");

	$yd=$_GET["yd"];
	$id=$_GET["id"];
	$anrec=$_GET["anrec"];
	$tab=$_GET["tab"];
	$anid=$_GET["anid"];
	if ($tab=="1")$t="b";
	if ($tab=="2")$t="a";
	if ($tab=="3")$t="n";
	if ($tab=="4")$t="d";
	$aid=explode("|",$anid);
	$an1=explode("^",$anrec);
	for ($i=1;$i<=count($an1);$i++){
		$an2[$i]=explode("|",$an1[$i-1]);
	}
	
	$query = "UPDATE kataskeyi_t_".$t." SET yp_len='".$yd ."' WHERE id=".$id;
	$result = mysql_query($query);
	if ($result) {
	// Εγγραφή επιτυχής
	echo "Η αποθήκευση των στοιχείων έγινε επιτυχώς";
	} else {
	// Λάθος.
	echo "<p>Λάθος κατά την είσοδο δεδομένων στη βάση.</p>";
	echo "<p>" . mysql_error() . "</p>";
	}
	
	for ($i=1;$i<=count($aid);$i++){
		mysql_query("UPDATE kataskeyi_an_".$t." SET x=".$an2[$i][2] ." WHERE id=".$aid[$i-1]);
		mysql_query("UPDATE kataskeyi_an_".$t." SET y=".$an2[$i][3] ." WHERE id=".$aid[$i-1]);
		mysql_query("UPDATE kataskeyi_an_".$t." SET anoig_mikos=".$an2[$i][0] ." WHERE id=".$aid[$i-1]);
		mysql_query("UPDATE kataskeyi_an_".$t." SET anoig_ypsos=".$an2[$i][1] ." WHERE id=".$aid[$i-1]);
	}


	
?>
