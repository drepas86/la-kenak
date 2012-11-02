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
Αποθήκευση σκιάσεων ανοιγμάτων μετά από επεξεργασία των στοιχείων     *
Καλείται από kenak_skiaseis_an   (function saveme)                    *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");

	$rec=$_GET["rec"];
	$f=explode("|",$rec);

	mysql_query("UPDATE kataskeyi_skiaseis_an_".$f[7]." SET f_hor_h='".$f[0]."' WHERE id=".$f[6]);
	mysql_query("UPDATE kataskeyi_skiaseis_an_".$f[7]." SET f_hor_c=".$f[1]." WHERE id=".$f[6]);
	mysql_query("UPDATE kataskeyi_skiaseis_an_".$f[7]." SET f_ov_h=".$f[2]." WHERE id=".$f[6]);
	mysql_query("UPDATE kataskeyi_skiaseis_an_".$f[7]." SET f_ov_c=".$f[3]." WHERE id=".$f[6]);
	mysql_query("UPDATE kataskeyi_skiaseis_an_".$f[7]." SET f_fin_h=".$f[4]." WHERE id=".$f[6]);
	mysql_query("UPDATE kataskeyi_skiaseis_an_".$f[7]." SET f_fin_c=".$f[5]." WHERE id=".$f[6]);

?>











