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
Αποθήκευση τοίχου μετά από επεξεργασία των στοιχείων                  *
Καλείται από kenak_form3   (function saveme)                          *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");

	$rec=$_GET["rec"];
	$f=explode("|",$rec);

	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET name='".$f[0]."' WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET t_mikos=".$f[1]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET t_ypsos=".$f[2]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET t_platos=".$f[3]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET t_u=".$f[4]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET t_thermo=".$f[5]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET d_ypsos=".$f[6]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET d_u=".$f[7]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET d_thermo=".$f[8]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET yp_mikos=".$f[9]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET yp_plithos=".$f[10]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET yp_u=".$f[11]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET yp_thermo=".$f[12]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET syr_mikos=".$f[13]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET syr_ypsos=".$f[14]." WHERE id=".$f[16]);
	mysql_query("UPDATE kataskeyi_t_".$f[17]." SET syr_u=".$f[15]." WHERE id=".$f[16]);

?>











