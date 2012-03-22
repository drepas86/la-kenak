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
Αποθήκευση ομάδας ανοιγμάτων                                          *
Καλείται από domika_kelyfos   (javascript function save_an)           *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");

	$record=$_GET["record"];
	$t=explode("@",$record);
	
	$tbl=array();
	$tbl[0]="domika_anoigmata";
	$tbl[1]="anoigmata_alouminio";
	$tbl[2]="anoigmata_alouminio_thermo";
	$tbl[3]="anoigmata_doors";
	$tbl[4]="anoigmata_plastic";
	$tbl[5]="anoigmata_wood";
	$tb1=0;
	$tb=0;
	for ($i=1;$i<=5;$i++){
		$total = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM ".$tbl[$i]." WHERE name LIKE '".substr_unicode($t[0],0,5)."%'"));
		$total1 = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM ".$tbl[$i]." WHERE name ='".$t[0]."'"));
		$tb1+=($total[0]>0)*$i;
		$tb+=$total1[0]*$i;
	}
	
	if ($tb>0){
		mysql_query("UPDATE $tbl[$tb] SET rec = '$t[1]' WHERE name = '$t[0]' ");
	}else{
		mysql_query("INSERT INTO $tbl[$tb1] (name,rec) VALUES ('".$t[0]."','".$t[1]."') ");
	}

	function substr_unicode($str, $s, $l = null) {
    return join("", array_slice(
        preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY), $s, $l));
	}
	
?>