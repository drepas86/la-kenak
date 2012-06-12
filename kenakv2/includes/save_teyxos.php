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
Αποθήκευση του τεύχους της μελέτης                                    *
Καλείται από kenak_formteyxos   (function save_kef)                   *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");
	$template="0";
	if (isset($_POST['template'])) $template=$_POST['template'];
	$kef=$_POST["kef"];
	$text=html_entity_decode($_POST["kef".$kef."a"], ENT_QUOTES, 'UTF-8');
	$text=addslashes($text);
	$kf=number_format($kef,0,".",",");
	$sql = "UPDATE teyxos_f SET text = '$text' WHERE id = $kef ";
	if ($template=="1")$sql = "UPDATE teyxos_template SET text = '$text' WHERE id = $kef ";
	mysql_query($sql, $connection);
	if ($template=="1"){
	?><script type="text/javascript">window.location = "kenak_editteyxos.php?#kef<?=$kf?>"</script><?php
	}else{
	?><script type="text/javascript">window.location = "../kenak.php?save=1&page=10#kef<?=$kf?>"</script><?php
	}
	
?>
