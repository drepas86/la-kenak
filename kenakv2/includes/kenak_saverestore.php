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
?>
<?php	if ($sel_page["id"] == 9)	{
echo "<h2>ΚΕΝΑΚ - Αποθήκευση / Ανάκτηση μελέτης</h2>";
?>	



<script language="JavaScript">
function get_iframe(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
}
</script>
<img src="./images/style/xml.png"></img>
<br/>
<a class="iframe" href="./save-scripts/save-script-xml.php" title="" onclick=get_iframe();>Αποθήκευση τρέχουσας μελέτης σε αρχείο XML</a><br/>
<a class="iframe" href="./save-scripts/get_files.php" title="" onclick=get_iframe();>Ανάκτηση/Διαγραφή μελέτης από αρχείο XML</a><br/>

<br/><br/>
<img src="./images/style/sql.png"></img>
<br/>
<a class="iframe" href="./save-scripts/save-script-sql.php" title="" onclick=get_iframe();>Αποθήκευση τρέχουσας μελέτης σε αρχείο SQL</a><br/>
<a class="iframe" href="./save-scripts/sql-import2.php" title="" onclick=get_iframe();>Ανάκτηση/Διαγραφή μελέτης από αρχείο SQL</a><br/>
<br/>
Προσοχή: Τα αρχεία XML και SQL τα οποία δημιουργούνται ΔΕΝ προορίζονται για εισαγωγή σε άλλο λογισμικό συμπεριλαμβανομένου και του ΤΕΕ-ΚΕΝΑΚ.<br/>
Αφορούν τη δυνατότητα αποθήκευσης και ανάκτησης των δεδομένων που εισάγουμε για αυτό το λογισμικό. Όταν προστεθεί η δυνατότητα εξαγωγής XML
αρχείου για την είσοδο στο ΤΕΕ-ΚΕΝΑΚ θα δηλωθεί ρητά στους παραπάνω συνδέσμους.


<?php	} ?>