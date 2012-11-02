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
Tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr       *
- Ενσωμάτωση του CKEDITOR για επεξεργασία των κειμένων με μορφοποίηση   *
- Εκτύπωση του τεύχους σε PDF                                           *
-                                                                       *
*************************************************************************
*/

if ($sel_page["id"] == 10)	{ 
?>
<script language="JavaScript">
	function edit_frame(){
	$(".edit_t").colorbox({iframe:true, width:"80%", height:"100%"});
	}
	function help_t(){
	$.colorbox({inline:true, href:"#helpme"});
	}
</script>

<table width=100% id="maintable"><tr><td style="width:50%;vertical-align:middle;"><h2>ΚΕΝΑΚ - Τεύχος</h2></td>
<td style="vertical-align:middle;">
<a href="./includes/print_teyxos_pdf.php" target="_blank"><img src="./images/domika/pdf.png" width="40px" height="40px" title="δημιουργία αρχείων pdf" style="cursor:pointer;" /></a>
&nbsp;&nbsp;
<a onclick="window.open('./includes/print_teyxos_pdf.php?kef='+active_tab,'_blank');" 
target="_blank"><img src="./images/domika/pdf1.png" width="40px" height="40px" title="δημιουργία αρχείου pdf του κεφαλαίου" style="cursor:pointer;" /></a>
&nbsp;&nbsp;&nbsp;
<a href="./includes/print_teyxos.php" target="_blank"><img src="./images/domika/printer.png" title="εκτύπωση συνολικού τεύχους" style="cursor:pointer;" /></a>
&nbsp;&nbsp;
<a href="./includes/print_teyxos_docx.php" target="_blank"><img src="./images/style/word.png" width="40px" height="40px" title="Κατέβασμα τεύχους σε docx" style="cursor:pointer;" /></a>
&nbsp;&nbsp;
<img src="./images/domika/save.png"  width="35px" height="35px"  title="αποθήκευση κεφαλαίου" style="cursor:pointer;" onclick="document.forms['f'+active_tab].submit();"/>
&nbsp;&nbsp;
<a class='edit_t' href="./includes/kenak_editteyxos.php" onclick=edit_frame();><img src="./images/domika/edit.png"  width="40px" height="40px"  title="επεξεργασία πρότυπου" style="cursor:pointer;"/></a>
&nbsp;&nbsp;
<img src="./images/domika/help.png"  width="40px" height="40px"  title="οδηγίες" style="cursor:pointer;" onclick=help_t(); />
</td></tr></table>
<script type="text/javascript">
<!--	document.getElementById('imgs').innerHTML="<img src=\"images/style/word.png\"></img>";-->
</script>

<?php
include_once("print_teyxos_read_anazwni.php");
$strSQL = "SELECT * FROM teyxos_f WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']. " ORDER BY kefalaio";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult[] = mysql_fetch_array($objQuery));
$kef1=$objResult[0]["text"];
$kef2=$objResult[1]["text"];
$kef3=$objResult[2]["text"];
$kef4=$objResult[3]["text"];
$kef5=$objResult[4]["text"];
$kef6=$objResult[5]["text"];
$kef7=$objResult[6]["text"];
$kef8=$objResult[7]["text"];
?>	

<div id="tabvanilla" class="widget" style="display:none;">
<ul class="tabnav">
<?php
for ($i=1;$i<=8;$i++){
$j=$i;
$p="Κεφ. ".$j;
if ($j==8)$p="Υπολογισμοί";
echo "<li><a  onclick=\"active_tab=".$j.";\" href=\"#kef".$j."\">".$p."</a></li>";
}
?>
</ul>

<?php
for ($i=1;$i<=8;$i++){
$j=$i;
if ($i==1)echo"<div id=\"kef".$j."\" class=\"tabdiv\">";
if ($i>1) echo"<div id=\"kef".$j."\" class=\"tabdiv\" style=\"display:none;\">";
echo"<form id=\"f".$j."\" action=\"./includes/save_teyxos.php\" method=\"post\">";
echo"<div id=\"container\" style=\"background:#eee;border:1px solid #000000;padding:3px;width:99%;height:580px;\">";
echo"<textarea name=\"kef".$j."a\" id=\"kef".$j."a\" >".${'kef'.$j}."</textarea>";
echo"<script type=\"text/javascript\">CKEDITOR.replace('kef".$j."a');</script>";
echo"<input type=\"hidden\" name=\"kef\" value=\"".$j."\"><br/>";
echo"</div>";
echo"</form></div>";
}
echo "</div>";
?>

<!------------------------------------------------------------------------------------------->						
<!--              κρυφό div για HELP                                                       -->
<!------------------------------------------------------------------------------------------->						
<div id ="helpbox" style='display:none'>
<div id="helpme" class="widget">
<ul class="tabnav" style="margin-bottom:6px;">
<li><a href="#help_t" >ΚΕΝΑΚ - Τεύχος</a></li>
<li><a href="#help_e" >File Manager</a></li>
<li><a href="#help_kefalaia" >Κεφάλαια</a></li>
</ul>

<div id='help_t' class="tabdiv" style='width:630px;padding:10px;'>
<br /><br />Το τεύχος εκτυπώνεται με βάση ένα πρότυπο τεύχος που είναι αποθηκευμένο στη βάση και περιέχει τα σταθερά κείμενα και ορισμένες ετικέτες(tags) που αντικαθίστανται από τα δεδομένα της τρέχουσας μελέτης.<br />
Η επεξεργασία του πρότυπου τεύχους είναι δυνατή με κλικ στο εικονίδιο <img src="./images/domika/edit.png" style="vertical-align:middle;width:30px;height:30px;" /><br />
Με την επιλογή 'Τεύχος' στο αριστερό μενού, δημιουργείται το τεύχος και εμφανίζεται στην οθόνη. 
Αν θέλουμε διορθώσεις πριν την τελική εκτύπωση, μπορούν να γίνουν και να αποθηκευθούν ώστε να περιληφθούν στο τελικό PDF. 
Θα ισχύσουν όμως μόνο προσωρινά. Οι μόνες αλλαγές που είναι μόνιμες είναι αυτές που γίνονται στο πρότυπο τεύχος.<br /><br />
Η προσωρινή αποθήκευση γίνεται με το εικονίδιο <img src="./images/domika/save.png"  style="vertical-align:middle;width:30px;height:30px;" /><br /><br />
Για την παραγωγή των αρχείων PDF υπάρχουν τρεις επιλογές:<br /><br />
<img src="./images/domika/pdf.png" style="vertical-align:middle;width:30px;height:30px;" /> Παραγωγή όλων των PDF, ένα για κάθε κεφάλαιο.<br /><br />
<img src="./images/domika/pdf1.png" style="vertical-align:middle;width:30px;height:30px;" /> Παραγωγή του PDF του ενεργού κεφαλαίου.<br /><br />
<img src="./images/domika/printer.png" style="vertical-align:middle;width:30px;height:30px;" /> Συνένωση όλων των PDF σε ένα ενιαίο τεύχος.<hr>
Σημ.: Η εμφάνιση στην οθόνη δεν είναι ίδια με αυτήν που θα προκύψει στο PDF. Οι γραμματοσειρές που χρησιμοποιούνται είναι διαφορετικές, 
όπως επίσης και η μορφοποίηση των πινάκων. <br /><br /><br /><br /><br /><br />
</div>

<div id='help_e' class="tabdiv" style='width:630px;padding:10px;'>
Μία χρήσιμη λειτουργία του επεξεργαστή κειμένου της εφαρμογής είναι η εισαγωγή αρχείου εικόνας στο κείμενο.<br />
<table border="0" align="center" width="140" height="80px"><tr><td><img src="./images/domika/h1.png"  style="vertical-align:middle;width:140px;height:80px;" /></td></tr></table>
Με την επιλογή του σχετικού εικονιδίου ανοίγει ένα παράθυρο στο οποίο μπορούν να ρυθμιστούν οι ιδιότητες της εικόνας<br /><br />
<table border="0" align="center" width="442" height="136px"><tr><td><img src="./images/domika/h2.png"  style="vertical-align:middle;width:442px;height:136px;" /></td></tr></table>
Την τοποθεσία στην οποία βρίσκεται η εικόνα ή την πληκτρολογούμε ή για ευκολία την επιλέγουμε από τον διαχειριστή αρχείων που βρίσκονται στον διακομιστή.<br />
Ανοίγει άλλο παράθυρο όπου εμφανίζονται τα αρχεία του διακομιστή. Εκεί ή επιλέγουμε μία από τις εικόνες που ήδη υπάρχουν ή πρώτα ανεβάζουμε στον διακομιστή ένα αρχείο από το δίσκο του υπολογιστή μας.<br /><br />
<table border="0" align="center" width="406" height="55px"><tr><td><img src="./images/domika/h3.png"  style="vertical-align:middle;width:406px;height:55px;" /></td></tr></table>
Επιλέγουμε το αρχείο και με το πλήκτρο Upload το ανεβάζουμε στον  διακομιστή. <br />
Η εισαγωγή του αρχείου στο κείμενο γίνεται με το πλήκτρο Select: <img src="./images/domika/h4.png"  style="vertical-align:middle;width:134px;height:56px;" />
</div>

<div id='help_kefalaia' class="tabdiv" style='width:630px;padding:10px;'>

<font color="green"><b>Κεφάλαιο 1</b></font>
<hr/>
Περιλαμβάνει το εξώφυλλο και σύντομη θεωρητική εισαγωγή.<br/>
<font color="3333CC">Δεν απαιτούνται αλλαγές καθώς τα στοιχεία εισάγονται από το  <a href="kenak.php?page=2">μενού γενικών στοιχείων</a></font><br/><br/>

<font color="green"><b>Κεφάλαιο 2</b></font>
<hr/>
Περιλαμβάνει τη γενική περιγραφή του κτιρίου και στοιχεία τοπογραφίας.<br/>
<font color="3333CC">Δεν απαιτούνται αλλαγές καθώς τα στοιχεία εισάγονται από το  <a href="kenak.php?page=2">μενού γενικών στοιχείων</a></font><br/><br/>

<font color="green"><b>Κεφάλαιο 3</b></font>
<hr/>
Περιλαμβάνει τον αρχιτεκτονικό σχεδιασμού του κτιρίου.<br/>
<font color="3333CC">Περιέχει γενικά στοιχεία για ηλιοπροστασία ανοιγμάτων, φυσικό φωτισμό και χωροθέτηση</font><br/><br/>

<font color="green"><b>Κεφάλαιο 4</b></font>
<hr/>
Περιλαμβάνει τον έλεγχο θερμομονωτικής επάρκειας.<br/>
<font color="3333CC">Τα στοιχεία ανοιγμάτων εμφανίζονται με το μέγιστο συντελεστή τους. <br/>
Για τα στοιχεία αδιαφανών θα χρειαστεί να προστεθεί ένας μέσος
συντελεστής U ανά τύπο στοιχείου. Αυτοί οι συντελεστές και τα φύλλα ελέγχου μπορούν να αναπαραχθούν και να τυπωθούν στο μενού
<a href="domika_kelyfos.php?page=1">ΚΕΛΥΦΟΣ-Αδιαφανή δομικά στοιχεία</a><br/>
Τα στοιχεία των αδιαφανών (ανοίγματα) όπως και ο τύπος πλαισίου και υαλοπίνακα δηλώνεται για τη μελέτη στο μενού
<a href="domika_kelyfos.php?page=2">ΚΕΛΥΦΟΣ-Διαφανή δομικά στοιχεία</a>
</font><br/><br/>

<font color="green"><b>Κεφάλαιο 5</b></font>
<hr/>
Περιλαμβάνει τη θεωρητική τεκμηρίωση για τα συστήματα του κτιρίου.<br/>
<font color="3333CC">
Θα χρειαστεί να προσθέσετε την τεχνική περιγραφή του συστήματος θέρμανσης, ψύξης, ΖΝΧ ανάλογα με τη μελέτη θέρμανσης, ψύξης κλπ.<br/>
Οι τεχνικές περιγραφές που έχουν προστεθεί αφορούν ένα τυπικό σύστημα θέρμανσης με λέβητα πετρελαίου θέρμανσης.
</font><br/><br/>

<font color="green"><b>Κεφάλαιο 6</b></font>
<hr/>
Περιλαμβάνει τα στοιχεία των ζωνών και τα συστήματα του κτιρίου.<br/>
<font color="3333CC">
Εμφανίζονται οι ζώνες του κτιρίου καθώς και δεδομένα γι αυτές όπως προστέθηκαν στο μενού 
<a href="kenak.php?page=3">ΜΕΛΕΤΗ-Κτίριο</a>. <br/>
Εμφανίζονται όλα τα συστήματα του κτιρίου όπως δηλώθηκαν στο μενού 
<a href="kenak.php?page=4">ΜΕΛΕΤΗ-Συστήματα</a>. <br/>
Για τα στοιχεία του συστήματος ΖΝΧ περιλαμβάνεται και ο υπολογισμός των συντελεστών αυτού.
Τα στοιχεία για τα συστήματα φωτισμού και ύγρανσης εμφανίζονται μόνο εαν προστεθεί το ανάλογο σύστημα.
</font><br/><br/>

<font color="green"><b>Κεφάλαιο 7</b></font>
<hr/>
Περιλαμβάνει την κατάταξη και το φύλλο ελέγχου.<br/>
<font color="3333CC">
Θα χρειαστεί να προσθέσετε την κατάταξη όπως την υπολογίσατε στο ΤΕΕ-ΚΕΝΑΚ και να προσθέσετε την εικόνα της. 
Επίσης θα χρειαστεί να επισυνάψετε την εξαγωγή αποτελεσμάτων του ΤΕΕ-ΚΕΝΑΚ το οποίο θα εκτελέσει την κατάταξη.
</font><br/><br/>

<font color="green"><b>Κεφάλαιο 8</b></font>
<hr/>
Το τεύχος αναλυτικών υπολογισμών για δομικά στοιχεία, ΖΝΧ, Αερισμό, Συστήματα.<br/>
<font color="3333CC">
Θα χρειαστεί να προσθέσετε οποιοδήποτε άλλο υπολογισμό εκτελέσατε σε άλλο λογισμικό (πχ libre calc, open office κλπ) 
ώστε να τεκμηριώνονται τα αποτελέσματα.
</font><br/><br/>

<font color="green"><b>Πρόσθετα στοιχεία</b></font>
<hr/>
<font color="3333CC">
Πέρα από το συνολικό pdf στο τεύχος χειροκίνητα πρέπει να επισυνάψετε και τα φύλλα υπολογισμών αδιαφανών, διαφανών, από το μενού ΚΕΛΥΦΟΣ, 
τα πιστοποιητικά (CE) υλικών και δομικών καθώς και τα παραγόμενα έντυπα από το ΤΕΕ-ΚΕΝΑΚ.<br/>
Όσο αφορά τα σχέδια μέρι την ολοκλήρωση του σχεδιαστικού τα σχέδια (x2) των ορόφων πρέπει να δημιουργηθούν σε οποιοδήποτε 
σχεδιαστικό λογισμικό και να παρουσιάζονται πέραν του περιγράμματος, της κάτοψης, των όψεων, των τομών και του τοπογραφικού και 
οποιαδήποτε εμπόδια πλευρικά, ορίζοντα, προβόλων τα οποία ευθύνονται για τις σκιάσεις της κατασκευής.
</font><br/><br/>

</div>
</div>

</div>
<!------------------------------------------------------------------------------------------->						

<script type="text/javascript">
function get_active(){
for (i=1;i<=8;i++){
	var x=document.getElementById("kef"+i).style.display;
	if (x!=="none"){
		active_tab=i;
	}
}
for (i=1;i<=8;i++){
	document.getElementById("kef"+i).style.display="inherit";
}
document.getElementById("tabvanilla").style.display="block";
}
</script>
<?php
}
?>

