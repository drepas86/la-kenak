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

<?php	if ($sel_page["id"] == 3)	{ 

$sql1 = "ALTER TABLE `kataskeyi_therm_eks` CHANGE `thermo_u` `thermo_u` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL";
$sql2 = "ALTER TABLE `kataskeyi_therm_es` CHANGE `thermo_u` `thermo_u` VARCHAR(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL";
$Query1 = mysql_query($sql1) or die ("Error Query [".$strSQL."]");
$Query2 = mysql_query($sql2) or die ("Error Query [".$strSQL."]");

?>		
<table width=100% id="maintable"><tr><td style="width:50%;vertical-align:middle;"><h2>ΚΕΝΑΚ - Κτίριο</h2></td>
<td style="vertical-align:middle;">
<img src="./images/domika/help.png"  width="40px" height="40px"  title="οδηγίες" style="cursor:pointer;" onclick=help_t(); />
</td>
</td></tr></table>

<script type="text/javascript">
<!-- document.getElementById('imgs').innerHTML="<img src=\"images/style/wall.png\"></img>"; -->
</script>

<script language="JavaScript">

var nt=new Array();

	function ClickCheckAll(vol)
	{
		var j=document.frmMain1.hdnCount.value;
		var i=1;
		for(i=1;i<=j;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain1.delcheck"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain1.delcheck"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Επιθυμείτε σίγουρα διαγραφή;')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	

function get_inlinetext(v){
$.colorbox({inline:true,  href:"#inline_text"+v});
}

function help_t(){
$.colorbox({inline:true,  href:"#guide", width:"600px", height:"410px"});
}

function help_aytomatismoi(){
$.colorbox({inline:true,  href:"#guideaytomatismoi", width:"80%", height:"80%"});
}

function help_anigmthermo(){
$.colorbox({inline:true,  href:"#guideanigmthermo", width:"60%", height:"40%"});
}

function help_klines(){
$.colorbox({inline:true,  href:"#guideklines", width:"60%", height:"40%"});
}

function help_elegxosthermo(){
$.colorbox({inline:true,  href:"#guideelegxosthermo", width:"60%", height:"40%"});
}

function get_active(){
document.getElementById("tabvanilla").style.display="block";
}
function get_thermo_esg(){
$(".esg").colorbox({rel:'esg'});
}
function get_thermo_eksg(){
$(".eksg").colorbox({rel:'eksg'});
}

function iframe_ground(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"90%"});
}

</script>
		
<div id="tabvanilla" class="widget" style="display:none;">
	<ul class="tabnav">  
		<li><a href="#zwnes">Θερμικές ζώνες</a></li>
		<li><a href="#tab-xwroi">Ε/V κτηρίου</a></li>
		<li><a href="#tab-katakoryfa">Οριζόντια στοιχεία</a></li>
		<li><a href="#tab-thermo">Θερμογέφυρες</a></li>
		<li><a href="#tab-draw">Σχεδιάσεις</a></li>
	</ul> 

<div id="zwnes" class="tabdiv">
<h3>Θερμικές ζώνες κτηρίου</h3>
<?php
	$ped="kataskeyi_zwnes";
	$dig="0|0|0|0|0|0|0|0|0|0|0";
	$tb_name="TableContainer_zvnes";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		name: {title: 'Όνομα ζώνης',width: '10%',listClass: 'center'},
		xrisi: {title: 'Χρήση',width: '15%',listClass: 'center',options: ".jtable_getxrisi()."},
		thermoeparkeia: {title: 'Έλεγχος θερμ. επάρκ. <a class=\"esg\" href=\"#guideelegxosthermo\" onclick=help_elegxosthermo();><img src=\"./images/style/help.png\"/></a>',width: '15%',listClass: 'center', options: {'0':'OXI','1':'NAI'}},
		klines: {title: 'Κλίνες/Υπνοδωμάτια <a class=\"esg\" href=\"#guideklines\" onclick=help_klines();><img src=\"./images/style/help.png\"/></a>',width: '10%',listClass: 'center'},
		anigmeni_thermo: {title: 'Ανηγμένη θερμ. <a class=\"esg\" href=\"#guideanigmthermo\" onclick=help_anigmthermo();><img src=\"./images/style/help.png\"/></a>',width: '20%',listClass: 'center', 
			options: {'80':'Πολύ Ελαφριά κατασκευή (80 KJ/m2.K)','110':'Ελαφριά κατασκευή (110 KJ/m2.K)','165':'Μέτρια κατασκευή (165 KJ/m2.K)','260':'Βαριά κατασκευή (260 KJ/m2.K)','370':'Πολύ βαριά κατασκευή (370 KJ/m2.K)'}},
		aytomatismoi: {title: 'Αυτοματισμοί <a class=\"esg\" href=\"#guideaytomatismoi\" onclick=help_aytomatismoi();><img src=\"./images/style/help.png\"/></a>',width: '10%',listClass: 'center', options: {'0':'Τύπος Α','1':'Τύπος Β','2':'Τύπος Γ','3':'Τύπος Δ'}},
		kaminades: {title: 'Καμινάδες',width: '10%',listClass: 'center'},
		eksaerismos: {title: 'Εξαερισμός',width: '10%',listClass: 'center'},
		anem_orofis: {title: 'Ανεμιστήρες οροφής',width: '10%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
<br/>

</div><!--/zwnes-->

<div id="tab-xwroi" class="tabdiv"> 
<h3>Χώροι κτιρίου</h3>
<?php 
	$ped="kataskeyi_xwroi";
	$dig="0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		name: {title: 'Χώρος',width: '20%',listClass: 'center'},
		mikos: {title: 'Μήκος',width: '20%',listClass: 'center'},
		platos: {title: 'Πλάτος',width: '20%',listClass: 'center'},
		ypsos: {title: 'Υψος',width: '20%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
<br/>
<h3>Όροφοι</h3>	
<font color="green">(δηλώνονται εαν χρησιμοποιηθεί η σχεδίαση)</font>
<?php 
	$ped="kataskeyi_floors";
	$dig="0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_floors";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		type: {title: 'Τύπος',width: '40%',listClass: 'center',options: {'1':'Υπόγειο','2':'Πυλωτή','3':'Ισόγειο','4':'Όροφος','5':'Στέγη-Επικλινής','6':'Στέγη-Πλάκα'}},
		name: {title: 'Όνομα',width: '40%',listClass: 'center'},
		height: {title: 'Ύψος',width: '20%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
<br/>
<img src="includes/image_create_floors.php">
</div><!--/xwroi-->

<div id="tab-katakoryfa" class="tabdiv">
<h3>Δάπεδα (Κέλυφος - Σε επαφή με το έδαφος)</h3>	
<?php
	$ped="kataskeyi_dap";
	$dig="0|0|0|2|2|2|1|0|0|0|0";
	$tb_name="TableContainer_daporo";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '20%',listClass: 'center', options: {'0':'Δάπεδο επί εδάφους','1':'Δάπεδο σε Μ.Θ.Χ.','2':'Δάπεδο σε πυλωτή'}},
		name: {title: 'Όνομα',width: '20%',listClass: 'center'},
		emvadon: {title: 'Εμβαδόν',width: '20%',listClass: 'center'},
		u: {title: 'U (ισοδ. συντ.) <a class=\"iframe\" href=\"./domika_kelyfos.php?page=3&min=1\" onclick=iframe_ground();><img src=\"./images/style/help.png\" /></a>',width: '20%',listClass: 'center'},
		b: {title: 'Μειωτικός συντελεστής',width: '20%',listClass: 'center', options: {'1.0':'b=1','0.5':'b=0.5'}},
		bathos: {title: 'Κατώτερο βάθος',width: '20%',listClass: 'center'},
		perimetros: {title: 'Περίμετρος',width: '20%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>

<h3>Οροφές (Κέλυφος - Αδιαφανή)</h3>	
<?php
	$ped="kataskeyi_oro";
	$dig="0|0|0|0|2|2|1|2|2|2|2|2|2";
	$tb_name="TableContainer_oro";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '20%',listClass: 'center', options: {'0':'Κεκλιμένη στέγη','1':'Οροφή πλάκα'}},
		name: {title: 'Όνομα',width: '20%',listClass: 'center'},
		emvadon: {title: 'Εμβαδόν',width: '20%',listClass: 'center'},
		u: {title: 'U (ισοδ. συντ.) <a class=\"iframe\" href=\"./domika_kelyfos.php?page=3&min=1\" onclick=iframe_ground();><img src=\"./images/style/help.png\" /></a>',width: '20%',listClass: 'center'},
		b: {title: 'Μειωτικός συντελεστής',width: '20%',listClass: 'center', options: {'1.0':'b=1','0.5':'b=0.5'}},
		f_hor_h: {title: 'f_hor_h',width: '20%',listClass: 'center'},
		f_hor_c: {title: 'f_hor_c',width: '20%',listClass: 'center'},
		f_ov_h: {title: 'f_ov_h',width: '20%',listClass: 'center'},
		f_ov_c: {title: 'f_ov_c',width: '20%',listClass: 'center'},
		f_fin_h: {title: 'f_fin_h',width: '20%',listClass: 'center'},
		f_fin_c: {title: 'f_fin_c',width: '20%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>

</div><!--/tab-katakoryfa-->

<div id="tab-thermo" class="tabdiv"> 
<h3>Θερμογέφυρες εξωτερικών γωνιών
<a class="eksg" href="./images/thermo/eksg/eksg1.jpg" title="" onclick=get_thermo_eksg();><img src="./images/style/help.png"/></a></h3>
<?php
	$ped="kataskeyi_therm_eks";
	$dig="0|0|0|0|2|0|0|0|0|0|0";
	$tb_name="TableContainer_therm_eks";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '25%',listClass: 'center',options: ".getzwnes()."},
		thermo_u: {title: 'Θερμογέφυρα',width: '25%',listClass: 'center', options: ".jtable_getthermo_eksg()."},
		plithos: {title: 'Πλήθος',width: '25%',listClass: 'center'},
		ypsos: {title: 'Ύψος',width: '25%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
<h3>Θερμογέφυρες εσωτερικών γωνιών
<a class="esg" href="./images/thermo/esg/esg1.jpg" title="" onclick=get_thermo_esg();><img src="./images/style/help.png"/></a></h3>
<?php
	$ped="kataskeyi_therm_es";
	$dig="0|0|0|0|2|0|0|0|0|0|0";
	$tb_name="TableContainer_therm_es";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '25%',listClass: 'center',options: ".getzwnes()."},
		thermo_u: {title: 'Θερμογέφυρα',width: '25%',listClass: 'center', options: ".jtable_getthermo_esg()."},
		plithos: {title: 'Πλήθος',width: '25%',listClass: 'center'},
		ypsos: {title: 'Ύψος',width: '25%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
</div><!--/tab-thermo-->

<div id="tab-draw" class="tabdiv"> 
<iframe src='includes/drawing.php' width=100%  height=660px marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0  scrolling='no'></iframe></div>
</div>


<!--        Κρυφό div για γενική βοήθεια                                            -->
		<div style='display:none'><div id='guide' style='padding:10px; background:#ebf9c9;'>
		<b>Θερμικές ζώνες κτηρίου</b><hr>
		Στη σελίδα αυτή γίνεται η εισαγωγή των θερμικών ζωνών του κτιρίου.
		Με κλικ στα εικονίδια <img src ="./images/style/help.png" style="vertical-align:middle;" /> δίνονται οδηγίες για τον τύπο του κάθε δεδομένου.<br /><br />
		Αφού χωρίστε το κτήριο σε θερμικές ζώνες στο σχέδιο που έχετε ανάλογα με διαφορετικούς χώρους θέρμανσης (θερμαινόμενους ή μη) ή χρήσεις και εισάγετε τις θερμικές ζώνες
		μπορείτε να αντιστοιχίσετε τα δομικά στοιχεία, τα συστήματα και τις θερμογέφυρες του κτηρίου σε αυτές τις ζώνες.<br /><br />
		<hr>
		Τα παραπάνω στοιχεία περνούν αυτόματα κατά την δημιουργία του xml στο λογισμικό του ΤΕΕ χωρισμένα ανά ζώνη.<br /><br />
		Ο έλεγχος της θερμομονωτικής επάρκειας πραγματοποιείται για κάθε ζώνη μόνο εφόσον στη συγκεκριμένη ζώνη έχει δηλωθεί να πραγματοποιηθεί ο έλεγχος θερμομονωτικής επάρκειας.<br /><br />
		Ο σχεδιαστικός πυρήνας βρίσκεται ακόμα σε ανάπτυξη και δεν αποθηκεύει δεδομένα κατά την σχεδίαση ούτε επηρρεάζει τον υπολογισμό μέχρι να ολοκληρωθεί.
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για επεξεργασία των τιμών του πίνακα                          -->
		<div style='display:none'><div id='editme' style='padding:10px; background:#ebf9c9;'>
		
		<table ><tr><td>
		<input type="text" id="editbox" style="width:50px;">&nbsp;
		<input type="button" value="Αποθήκευση" onclick=saveme(); >
		</td></tr></table>
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών δαπέδου  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 65; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/d/d" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 26; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/oe/oe" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 16; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/ed/ed" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 25; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/edp/edp" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 13; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/de/de" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 28; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/dp/dp" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών εσωτερικών γωνιών  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 20; $i++) {
		echo "<p><a class=\"esg\" href=\"./images/thermo/esg/esg" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών εξωτερικών γωνιών  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 26; $i++) {
		echo "<p><a class=\"eksg\" href=\"./images/thermo/eksg/eksg" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή αυτοματισμών  ------------------------->
		<div style='display:none'><div id='guideaytomatismoi' style='padding:10px; background:#ebf9c9;'>
		<b>Τύποι αυτοματισμών:</b><br/>
<table border="1">
<tr><th>Περιγραφή διατάξεων ελέγχου ανά κατηγορία</th><th>Κατηγορία</th></tr>
<tr><td>
<b>Συστήματα παραγωγής, διανομής & εκπομπής θέρμανσης / ψύξης</b>
<ol><li>Ολοκληρωμένη διάταξη αυτομάτου ελέγχου της λειτουργίας των τερματικών μονάδων σε
επίπεδο αυτόνομων χώρων ανά ιδιοκτησία (ανά λειτουργικό χώρο) με έλεγχο
παρουσίας χρηστών (συστήματα ανίχνευσης κίνησης κ.ά.). Ύπαρξη θερμοστάτη και
θερμοστατικών βαλβίδων ανά αυτόνομο χώρο ιδιοκτησίας κ.τ.λ.</li>
<li>Αυτόματη υδραυλική ή θερμοκρασιακή προσαρμογή του δικτύου διανομής στα
θερμικά/ψυκτικά φορτία, με εφαρμογή διατάξεων όπως: σύστημα υδραυλικής ή
θερμοκρασιακής αντιστάθμισης ή κυκλοφορητές μεταβλητού σημείου λειτουργίας ή
μονάδα παραγωγής θέρμανσης/ψύξης με μεταβλητής θερμοκρασίας παροχή μέσου
προς το δίκτυο διανομής ανάλογα με το θερμικό/ψυκτικό φορτίο των επιμέρους χώρων.</li>
<li>Σε περίπτωση αλληλουχίας μεταξύ διαφορετικών μονάδων παραγωγής θέρμανσης
/ ψύξης η προτεραιότητα βασίζεται στην αποδοτικότητα των μονάδων παραγωγής
(ονομαστικό θερμικό/ψυκτικό φορτίο και απόδοση).</li></ol>
<b>Συστήματα αερισμού κτηρίων τριτογενή τομέα</b>
<ol><li>Σε περίπτωση μονάδων αερισμού ή/και κεντρικής κλιματιστικής μονάδας εφαρμόζεται
αυτόματος έλεγχος της προσαγωγής αέρα μέσα στο χώρο βάσει της παρουσίας
χρηστών και της ποιότητας του εσωτερικού αέρας.</li>
<li>Υπάρχει η δυνατότητα ελεύθερης μηχανικής ψύξης (free cooling) και νυχτερινού
αερισμού (night ventilation - cooling).</li>
<li>Έλεγχος της θερμοκρασίας προσαγωγής αέρα (θερμοκρασία ανάλογα με τη μεταβολή
του απαιτούμενου φορτίου ανά χώρο).</li>
<li>Εφαρμόζεται έλεγχος της υγρασίας του αέρα προσαγωγής ή/και απόρριψης.</li></ol>
</td><td>Α</td></tr>
<tr><td>
<b>Συστήματα παραγωγής, διανομής & εκπομπής θέρμανσης / ψύξης</b>
<ol><li>Ανεξάρτητος αυτόματος έλεγχος της λειτουργίας των τερματικών μονάδων σε επίπεδο
αυτόνομων χώρων ανά ιδιοκτησία (ανά λειτουργικό χώρο). Ύπαρξη θερμοστάτη και
θερμοστατικών βαλβίδων ανά χώρο ιδιοκτησίας κ.τ.λ..</li>
<li>Αυτόματη υδραυλική ή θερμοκρασιακή προσαρμογή του δικτύου διανομής στα
θερμικά/ψυκτικά φορτία, με εφαρμογή διατάξεων όπως: σύστημα υδραυλικής ή
θερμοκρασιακής αντιστάθμισης ή κυκλοφορητές μεταβλητού σημείου λειτουργίας ή
μονάδα παραγωγής θέρμανσης/ψύξης με μεταβλητής θερμοκρασίας παροχή μέσου
προς το δίκτυο διανομής ανάλογα με το θερμικό/ψυκτικό φορτίο.</li>
<li>Σε περίπτωση αλληλουχίας μεταξύ διαφορετικών μονάδων παραγωγής θέρμανση / 
ψύξης η προτεραιότητα βασίζεται στα φορτία και στην αποδοτικότητα των μονάδων
παραγωγής (ονομαστικό θερμικό/ψυκτικό φορτίο).</li></ol>
<b>Συστήματα αερισμού κτηρίων τριτογενή τομέα</b>
<ol><li>Σε περίπτωση μονάδων αερισμού ή/και κεντρικής κλιματιστικής μονάδας εφαρμόζεται
αυτόματος έλεγχος της προσαγωγής αέρα μέσα στο χώρο βάσει της παρουσίας
χρηστών.</li>
<li>Υπάρχει η δυνατότητα ελεύθερης μηχανικής ψύξης (free cooling) ή νυχτερινού αερισμού
(night ventilation - cooling).</li>
<li>Έλεγχος της θερμοκρασίας προσαγωγής αέρα (θερμοκρασία ανάλογα με την επιθυμητή
και την εξωτερική θερμοκρασία).</li>
<li>Εφαρμόζεται έλεγχος της υγρασίας του αέρα προσαγωγής ή/και απόρριψης.</li></ol>
</td><td>Β</td></tr>
<tr><td>
<b>Συστήματα παραγωγής, διανομής & εκπομπής θέρμανσης / ψύξης</b>
<ol><li>Αυτόματος έλεγχος της λειτουργίας των τερματικών μονάδων σε επίπεδο ιδιοκτησίας/
λειτουργικής αυτονομίας. Ύπαρξη ενός θερμοστάτη χώρου και ενός αυτόματου
διακόπτη (π.χ. ηλεκτροβάνα αυτονομίας) ανά ιδιοκτησία.</li>
<li>Αυτόματη υδραυλική ή θερμοκρασιακή προσαρμογή του δικτύου διανομής στα
θερμικά/ψυκτικά φορτία, με εφαρμογή διατάξεων όπως: σύστημα υδραυλικής ή
θερμοκρασιακής αντιστάθμισης ή κυκλοφορητές μεταβλητού σημείου λειτουργίας ή
μονάδα παραγωγής θέρμανσης/ψύξης με μεταβλητής θερμοκρασίας παροχή μέσου
προς το δίκτυο διανομής ανάλογα με το φορτίο θέρμανσης / ψύξης.</li>
<li>Σε περίπτωση αλληλουχίας μεταξύ διαφορετικών μονάδων παραγωγής
θέρμανσης / ψύξης η προτεραιότητα βασίζεται μόνο στα θερμικά/ψυκτικά φορτία.</li></ol>
<b>Συστήματα αερισμού κτηρίων τριτογενή τομέα</b>
<ol><li>Σε περίπτωση μονάδων αερισμού ή/και κεντρικής κλιματιστικής μονάδας εφαρμόζεται
αυτόματος έλεγχος της προσαγωγής αέρα μέσα στον χώρο με χρονοδιακόπτη.</li>
<li>Δεν υπάρχει η δυνατότητα ελεύθερης μηχανικής ψύξης (free cooling) ή νυχτερινού
αερισμού (night ventilation - cooling).</li>
<li>Έλεγχος της θερμοκρασίας προσαγωγής του αέρα (σταθερή θερμοκρασία ίση με την
επιθυμητή). Δεν υπάρχει έλεγχος της υγρασίας του αέρα.</li></ol>
</td><td>Γ</td></tr>
<tr><td>
<b>Συστήματα παραγωγής, διανομής & εκπομπής θέρμανσης / ψύξης</b>
<ol><li>Ο έλεγχος της λειτουργίας των τερματικών μονάδων και του δικτύου διανομής είναι
χειροκίνητος χωρίς θερμοστάτες χώρου.</li>
<li>Ο έλεγχος των κυκλοφορητών του δικτύου διανομής είναι χειροκίνητος ή
χρονοπρόγραμμα, χωρίς καμία ανάδραση από τη ζήτηση θερμικού/ψυκτικού φορτίου.</li>
<li>Η μονάδα παραγωγής θέρμανσης / ψύξης λειτουργεί με σταθερή θερμοκρασία παροχής
μέσου προς το δίκτυο διανομής.</li>
<li>Σε περίπτωση αλληλουχίας μεταξύ διαφορετικών μονάδων παραγωγής θέρμανσης /
ψύξης δεν ελέγχεται η προτεραιότητα.</li></ol>
<b>Συστήματα αερισμού κτηρίων τριτογενή τομέα</b>
<ol><li>Σε περίπτωση μονάδων αερισμού ή/και κεντρικής κλιματιστικής ο έλεγχος της
προσαγωγής αέρα είναι χειροκίνητος.</li>
<li>Δεν υπάρχει η δυνατότητα ελεύθερης μηχανικής ψύξης (free cooling) ή νυχτερινού
αερισμού (night ventilation - cooling).</li>
<li>Κανένας θερμοστατικός έλεγχος του αέρα προσαγωγής και της υγρασίας του αέρα</li></ol>
</td><td>Δ</td></tr>
</table>
		</div></div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή ανηγμένης θερμοχωρητικότητας  --------->
		<div style='display:none'><div id='guideanigmthermo' style='padding:10px; background:#ebf9c9;'>
<b>Ανηγμένη θερμοχωρητικότητα:</b><br/>
<table border="1">
<tr><td>Κατηγορία</td><td></td><td></td></tr>
<tr><td>1</td><td>Ελαφριά κατασκευή με ξύλινο σκελετό και στοιχεία πλήρωσης από
γυψοσανίδα ή ξύλο και εσωτερική θερμομόνωση σε όλα τα δομικά
στοιχεία (τοιχοποιία, οροφή, δάπεδο).</td><td>80</td></tr>
<tr><td>2</td><td>Φέρων οργανισμός από ελαφριά μεταλλική κατασκευή, πλήρωση
από υαλοπετάσματα ή ελαφριά πετάσματα με θερμομόνωση.</td><td>110</td></tr>
<tr><td>3</td><td>Φέρων οργανισμός από σκυρόδεμα, στοιχεία πλήρωσης από
ελαφροβαρείς τσιμεντόλιθους ή γυψοσανίδα και ύπαρξη
ψευδοροφών.</td><td>165</td></tr>
<tr><td>4</td><td>Φέρων οργανισμός από σκυρόδεμα και στοιχεία πλήρωσης από
διάτρητες οπτόπλινθους.</td><td>260</td></tr>
<tr><td>5</td><td>Φέρων οργανισμός από σκυρόδεμα και στοιχεία πλήρωσης από
βαριά υλικά, όπως πέτρα, συμπαγείς οπτόπλινθους, ωμόπλινθους
ή σκυρόδεμα.</td><td>370</td></tr>
</table>
		</div></div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή υπνοδωματίων/κλινών στις χρήσεις ------>
		<div style='display:none'><div id='guideklines' style='padding:10px; background:#ebf9c9;'>
<b>Υπνοδωμάτια/Κλίνες:</b><br/>
Οι χρησεις 
<ol><li>Μονοκατοικίας/Πολυκατοικίας (ανάλογα με τα υπνοδωμάτια),</li>
<li>Προσωρινής διαμονής (ανάλογα με την κατάταξη του ξενοδοχείου lux,A,B,Γ),</li> 
<li>Υγείας και κοινωνικής πρόνοιας (ανάλογα με τις κλίνες των νοσοκομείων) εκτός αγροτικών ιατρείων </li></ol><br/>
απαιτούν υπολογισμό ΖΝΧ με βάση τα διαμερίσματα ή τις κλίνες με βάση τις διορθώσεις στην ΤΟΤΕΕ-20701-1. 
(2η έκδοση αυτής).Στις υπόλοιπες χρήσεις ακολουθείται υπολογισμός ανάλογα με την επιφάνεια της ζώνης. Τα αποτελέσματα αυτών των υπολογισμών βρίσκονται στο Κεφάλαιο υπολογισμών του τεύχους.<br/>
		</div></div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή ελέγχου θερμομονωτικής επάρκειας ------>
		<div style='display:none'><div id='guideelegxosthermo' style='padding:10px; background:#ebf9c9;'>
<b>Έλεγχος θερμομονωτικής επάρκειας για τη ζώνη:</b><br/>
Εαν επιλεγεί ο έλεγχος τότε
<ol><li>Εμφανίζεται ο υπολογισμός ελέγχου θερμομονωτικής επάρκειας στο τεύχος</li>
<li>Υπολογίζονται ΖΝΧ για τη ζώνη και εμφανίζονται στο τεύχος,</li> 
<li>Υπολογίζεται αερισμός για τη ζώνη</li></ol><br/>
Μπορείτε να προσθέσετε μη θερμαινόμενους χώρους για τους οποίους θέλετε να εμφανίσετε το κέλυφος στο τεύχος αλλά δεν απαιτείται έλεγχος θερμομονωτικής επάρκειας.
		</div></div>
<!------------------------------------------------------------------------------------>
<?php } 


function jtable_getxrisi(){
$strSQL = "SELECT * FROM energy_conditions";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$ret=array();
while($objResult = mysql_fetch_array($objQuery))
{
	$ret[$objResult["id"]] =  $objResult["xrisi"];
}					
return json_encode($ret);
}


function getzwnes(){
$strSQL = "SELECT * FROM kataskeyi_zwnes";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$ret=array();
while($objResult = mysql_fetch_array($objQuery))
{
	$ret[$objResult["id"]] =  $objResult["name"];
}					
return json_encode($ret);
}


function jtable_getthermo_eksg(){
$strSQL = "SELECT * FROM thermo_eksg";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$ret=array();
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["id"]] =  $objResult["name"];
}					
return json_encode($ret);
}


function jtable_getthermo_esg(){
$strSQL = "SELECT * FROM thermo_esg";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$ret=array();
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["id"]] =  $objResult["name"];
}					
return json_encode($ret);
}

?>
	
