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

<?php	if ($sel_page["id"] == 11)	{ 

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

function get_active(){
document.getElementById("tabvanilla").style.display="block";
}
function get_thermo_esg(){
$(".esg").colorbox({rel:'esg'});
}
function get_thermo_eksg(){
$(".eksg").colorbox({rel:'eksg'});
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
		thermoeparkeia: {title: 'Έλεγχος θερμ. επάρκ.',width: '15%',listClass: 'center', options: {'0':'OXI','1':'NAI'}},
		anigmeni_thermo: {title: 'Ανηγμένη θερμ.',width: '20%',listClass: 'center', 
			options: {'80':'Πολύ Ελαφριά κατασκευή (80 KJ/m2.K)','110':'Ελαφριά κατασκευή (110 KJ/m2.K)','165':'Μέτρια κατασκευή (165 KJ/m2.K)','260':'Βαριά κατασκευή (260 KJ/m2.K)','370':'Πολύ βαριά κατασκευή (370 KJ/m2.K)'}},
		aytomatismoi: {title: 'Αυτοματισμοί',width: '10%',listClass: 'center', options: {'0':'Τύπος Α','1':'Τύπος Β','2':'Τύπος Γ','3':'Τύπος Δ'}},
		kaminades: {title: 'Καμινάδες',width: '10%',listClass: 'center'},
		eksaerismos: {title: 'Εξαερισμός',width: '10%',listClass: 'center'},
		anem_orofis: {title: 'Ανεμιστήρες οροφής',width: '10%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
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
</div><!--/xwroi-->

<div id="tab-katakoryfa" class="tabdiv">
<h3>Οριζόντια στοιχεία</h3>	
<?php
	$ped="kataskeyi_daporo";
	$dig="0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_daporo";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '20%',listClass: 'center', options: {'0':'Δάπεδο','1':'Οροφή'}},
		name: {title: 'Όνομα',width: '20%',listClass: 'center'},
		emvadon: {title: 'Εμβαδόν',width: '20%',listClass: 'center'},
		u: {title: 'U',width: '20%',listClass: 'center'}
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
<iframe src='includes/drawing.php' width=900px  height=660px marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0  scrolling='no'></iframe></div>
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
	
