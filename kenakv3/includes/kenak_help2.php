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

*************************************************************************
tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr       *
- Επιλογή θερμογεφυρών δοκών                                            *
- Χρησιμοποιείται από kenak_form3                                       *
-                                                                       *
*************************************************************************

*/

$p=$_GET['p'];
?>
		<table height="100%"><tr><td style="vertical-align:middle;">
		<?php 
		for ($i = 1; $i <= 25; $i++) {
		echo "<img src=\"../images/thermo/edp/edp/edp" . $i . ".gif\" onclick=\"parent.getpsi1(".$i.",".$p.");\" style=\"cursor:pointer;\" border=1></img>";
		if ($i%4==0)echo"<br />";
		}
		echo"<br />";
		for ($i = 1; $i <= 4; $i++) {
		$j=$i+25;
		echo "<img src=\"../images/thermo/pr/pr/pr" . $i . ".gif\" onclick=\"parent.getpsi1(".$j.",".$p.");\" style=\"cursor:pointer;\" border=1></img>";
		if ($i%4==0)echo"<br />";
		}
		?>
		</td></tr></table>
		
