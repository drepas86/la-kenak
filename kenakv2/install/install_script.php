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

if (isset($_POST["installform"])) {
//Πάρε τις τιμές από τη φόρμα εγκατάστασης
$dbuser = $_POST["dbuser"];
$dbpwd = $_POST["dbpwd"];
$dbserver = $_POST["dbserver"];
$dbname = $_POST["dbname"];
$periexomeno = $_POST["periexomeno"];


//Ανοίγει το αρχείο ρυθμίσεων για να αποθηκευτούν οι ρυθμίσεις
$file = "database_origin.php";
$file_contents = file_get_contents($file);
if (!$file_contents) {
	echo "Δεν βρίσκω το αρχείο database_origin.php";
	}
fclose($file); 

$file_dest = "../includes/database.php";
$fh = fopen($file_dest, "w");

	if (!$fh) {
	echo "Δεν βρίσκω το αρχείο includes/database.php";
	}

	else{
		$original_values = array ('database_server','database_name','database_user','database_password');
		$new_values = array ($dbserver,$dbname,$dbuser,$dbpwd);

		//Αλλάζει τις τιμές database_user/database_password/database_name/database_server
		for ($i=0; $i<=3; $i++){
		$file_contents = str_replace($original_values[$i],$new_values[$i],$file_contents);
		}

	fwrite($fh, $file_contents);
	echo "Τα στοιχεία που δώσατε προστέθηκαν στο αρχείο includes/database.php.";
	fclose($fh);
	}
}
else
{

}
include_once("../includes/database.php");
include_once("../includes/connection.php");
include("sql-importoriginal.php");
?> 