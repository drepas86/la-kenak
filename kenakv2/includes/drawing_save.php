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
tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr     *
                                                                      *
Αποθήκευση σχεδίου ορόφου                                             *
Καλείται από drawing.php                                              *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");

	$floor=$_GET["floor"];
	$item=$_GET["item"];
	$record=$_GET["rec"];
	
	$total = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM kataskeyi_drawing WHERE floor=".$floor." AND item=".$item ));
	if ($total[0]>0){
		mysql_query("UPDATE kataskeyi_drawing SET rec = '$record' WHERE floor = $floor AND item = $item");
	}else{
		mysql_query("INSERT INTO kataskeyi_drawing (floor,item,rec) VALUES (".$floor.",".$item.",'".$record."') ");
	}


?>