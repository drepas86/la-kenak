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
<?php	if ($sel_page["id"] == 1)	{
echo "<h2>ΚΕΝΑΚ - Αποθήκευση / Ανάκτηση μελέτης</h2>";
?>	



<script language="JavaScript">
function get_iframe(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
}
</script>

Όνομα μελέτης : <input type="text" id="xmlname" /> <font color="green">(Σημ:χρησιμοποιήστε αγγλικούς χαρακτήρες)</font><br/>
<br/><br/>
<table>
<tr>
<td align="center"><a class="iframe" href="./xml/xml-tee_anazwni.php" id="teesavelink" title="" onclick=get_iframe();>
<img src="./images/style/xml-tee-kenak.png"></img><br/>Παραγωγή αρχείου<br/>XML-TEE<br/>για άνοιγμα στο ΤΕΕ-ΚΕΝΑΚ 1.29</a></td>
<td align="center"><a class="iframe" href="./xml/excel-domika_anazwni.php" title="" onclick=get_iframe();>
<img src="./images/style/xlsx.png"></img><br/>Προεπισκόπηση Δομικών<br/>στοιχείων σε XLSX</a></td>
<?php		
if ($_SESSION['username']=="admin")
{
?>
<td><a class="iframe" href="./save-scripts/save-script-xml.php" id="xmlsavelink" title="" onclick=get_iframe();>
<img src="./images/style/xml-save.png"></img><br/>Αποθήκευση τρέχουσας <br/>μελέτης σε αρχείο XML</a></td>
<td><a class="iframe" href="./save-scripts/get_files.php" title="" onclick=get_iframe();>
<img src="./images/style/xml-open.png"></img><br/>Ανάκτηση/Διαγραφή  <br/>μελέτης από αρχείο XML</a></td>
<td><a class="iframe" href="./save-scripts/save-script-sql.php" id="sqlsavelink" title="" onclick=get_iframe();>
<img src="./images/style/sql-save.png"></img><br/>Αποθήκευση τρέχουσας <br/>μελέτης σε αρχείο SQL</a></td>
<td><a class="iframe" href="./save-scripts/sql-import2.php" title="" onclick=get_iframe();>
<img src="./images/style/sql-open.png"></img><br/>Ανάκτηση/Διαγραφή <br/>μελέτης από αρχείο SQL</a></td>
<?php } ?>
</tr>
</table>

<br/>
<?php		
if ($_SESSION['username']=="admin")
{
?>
<b>Προσοχή: Διαχειριστής:</b> <br/>
<ul>
  <li>lakenak-xml-onoma.xml για αποθήκευση-ανάκτηση όλων των μελετών των χρηστών από το παρόν λογισμικό και βρίσκονται στο φάκελο /save-scripts. <br/>
Το παρόν λογισμικό γνωρίζει την θέση τους και δεν χρειάζεται να τα αποθηκεύσετε σε άλλη διαδρομή εκτός της περίπτωσης<br/>
αναβάθμισης σε νεότερη έκδοση. Το ίδιο ισχύει και για τα αρχεία sql. Ο τύπος του αρχείου (xml,sql) που θα επιλέξετε να αποθηκεύσετε<br/>
τις μελέτες των χρηστών σας είναι καθαρά στην κρίση σας. Παρέχονται και οι 2 λύσεις αποθήκευσης.
</li>
  <li>tee-kenak-onoma.xml για είσοδο στο πρόγραμμα του ΤΕΕ-ΚΕΝΑΚ και βρίσκονται στο φάκελο /xml της διανομής.</li>
</ul> 
<?php } ?>
<br/>

<font color="green">
<b>Τα αρχεία με πρόθεμα tee-kenak-onoma.xml είναι τα μόνα που μπορείτε να προσθέσετε στο TEE-KENAK<br/>
και σε αυτά σας δίνεται η δυνατότητα να τα κατεβάσετε/αποθηκεύσετε σε οποιαδήποτε θέση.</b></font>
<script type="text/javascript">
    var linkxml= document.getElementById('xmlsavelink');
	var linksql= document.getElementById('sqlsavelink');
	var linktee= document.getElementById('teesavelink');
    var input= document.getElementById('xmlname');
    input.onchange=input.onkeyup= function() {
        linkxml.href= './save-scripts/save-script-xml.php?name='+encodeURIComponent(input.value);
		linksql.href= './save-scripts/save-script-sql.php?name='+encodeURIComponent(input.value);
		linktee.href= './xml/xml-tee_anazwni.php?name='+encodeURIComponent(input.value);

    };
	document.getElementById('xmlname').focus();
</script>

<?php	} ?>