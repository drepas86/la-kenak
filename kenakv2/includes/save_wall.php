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
Αποθήκευση δομικού στοιχείου στη βάση                                 *
Καλείται από domika_kelyfos   (function savewall)                     *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");

	$paxh=$_GET["paxh"];
	$wid=$_GET["wid"];
	$fid=$_GET["fid"];
	$u=$_GET["u"];
	$d=$_GET["d"];
	$str=$_GET["strwseis"];
	$name=$_GET["name"];
	$kind=$_GET["kind"];

	$tb=0;
	$total = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM domika_toixoi WHERE name='$name'"));
	$tb+=$total[0];
	$total = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM domika_orofes WHERE name='$name'"));
	$tb+=$total[0]*2;
	$total = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM domika_pilotis WHERE name='$name'"));
	$tb+=$total[0]*3;
	$total = mysql_fetch_row(mysql_query("SELECT COUNT(*) FROM domika_dapedo_edafous WHERE name='$name'"));
	$tb+=$total[0]*4;
	$tbl=array();
	$tbl[1]="domika_toixoi";
	$tbl[2]="domika_orofes";
	$tbl[3]="domika_pilotis";
	$tbl[4]="domika_dapedo_edafous";

	if ($tb>0){
		mysql_query("UPDATE $tbl[$tb] SET paxh = '$paxh' WHERE name = '$name' ");
		mysql_query("UPDATE $tbl[$tb] SET strwseis = '$str' WHERE name = '$name' ");
		mysql_query("UPDATE $tbl[$tb] SET u = $u WHERE name = '$name' ");
		mysql_query("UPDATE $tbl[$tb] SET paxos = $d WHERE name = '$name' ");
	}else{
		if ($kind<4)$tbl[0]="domika_toixoi";
		if ($kind==4 || $kind==5 || $kind==7)$tbl[0]="domika_orofes";
		if ($kind==6)$tbl[0]="domika_pilotis";
		if ($kind==8)$tbl[0]="domika_dapedo_edafous";
		mysql_query("INSERT INTO $tbl[$tb] (name,u,paxos,paxh,strwseis) VALUES ('$name',$u,$d,'$paxh','$str') ");
	}
	

	
?>



