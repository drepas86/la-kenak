﻿<?php
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
require_once("includes/connection.php"); 
require_once("includes/functions.php"); 
find_selected_page(); 
include("includes/header_kenak.php"); 
?>

<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
		<td id="page">
<h2>Υπολογισμός ηλιακής τροχιάς (*)</h2><br/><br/>

<form name="astronomical_form" action="astronomical.php" method="post">
Lat:<input type="text" name="lat" maxlength="10" size="10" />
Lon:<input type="text" name="lon" maxlength="10" size="10" />
Ημέρα (1-30):<input type="text" name="mera" maxlength="10" size="10" />
Ώρα (0-23):<input type="text" name="wra" maxlength="10" size="10" />
<input type="submit" name="astronomical_form" value="Υπολογισμός" />
</form>
<?php
include("includes/sunpath.php");
?>

		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>