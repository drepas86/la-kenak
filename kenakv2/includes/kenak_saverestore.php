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
?>
<?php	if ($sel_page["id"] == 9)	{
echo "<h2>ΚΕΝΑΚ - Αποθήκευση / Ανάκτηση μελέτης</h2>";
?>	



<script language="JavaScript">
function get_iframe(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
}
</script>

Όνομα μελέτης : <input type="text" id="xmlname" /> <br/>
<img src="./images/style/xml.png"></img>
<br/>
<a class="iframe" href="./save-scripts/save-script-xml.php" id="xmlsavelink" title="" onclick=get_iframe();>Αποθήκευση τρέχουσας μελέτης σε αρχείο XML</a><br/>
<a class="iframe" href="./save-scripts/get_files.php" title="" onclick=get_iframe();>Ανάκτηση/Διαγραφή μελέτης από αρχείο XML</a><br/>

<br/><br/>
<img src="./images/style/xml-tee.png"></img>
<br/>
<a class="iframe" href="./xml/xml-tee.php" id="teesavelink" title="" onclick=get_iframe();>Παραγωγή αρχείου XML-TEE</a><br/>
<a class="iframe" href="./xml/excel-domika.php" title="" onclick=get_iframe();>Προεπισκόπηση Δομικών στοιχείων σε EXCEL</a><br/>

<br/><br/>
<img src="./images/style/sql.png"></img>
<br/>
<a class="iframe" href="./save-scripts/save-script-sql.php" id="sqlsavelink" title="" onclick=get_iframe();>Αποθήκευση τρέχουσας μελέτης σε αρχείο SQL</a><br/>
<a class="iframe" href="./save-scripts/sql-import2.php" title="" onclick=get_iframe();>Ανάκτηση/Διαγραφή μελέτης από αρχείο SQL</a><br/>
<br/>
Προσοχή: Τα αρχεία XML τα οποία δημιουργούνται έχουν την εξής μορφή: <br/>
lakenak-xml-onoma.xml για αποθήκευση-ανάκτηση μελέτης από το παρόν λογισμικό και βρίσκονται στο φάκελο /save-scripts.<br/>
tee-kenak-onoma.xml για είσοδο στο πρόγραμμα του ΤΕΕ-ΚΕΝΑΚ και βρίσκονται στο φάκελο /xml της διανομής.<br/><br/>

<b>Τα αρχεία με πρόθεμα tee-kenak-onoma.xml είναι τα μόνα που μπορείτε να προσθέσετε στο TEE-KENAK</b>
<script type="text/javascript">
    var linkxml= document.getElementById('xmlsavelink');
	var linksql= document.getElementById('sqlsavelink');
	var linktee= document.getElementById('teesavelink');
    var input= document.getElementById('xmlname');
    input.onchange=input.onkeyup= function() {
        linkxml.href= './save-scripts/save-script-xml.php?name='+encodeURIComponent(input.value);
		linksql.href= './save-scripts/save-script-sql.php?name='+encodeURIComponent(input.value);
		linktee.href= './xml/xml-tee.php?name='+encodeURIComponent(input.value);

    };
</script>

<?php	} ?>