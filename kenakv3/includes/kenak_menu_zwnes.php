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

function help_xwroiname(){
$.colorbox({inline:true,  href:"#guidexwroiname", width:"60%", height:"60%"});
}
function help_xwroimikos(){
$.colorbox({inline:true,  href:"#guidexwroimikos", width:"60%", height:"60%"});
}
function help_xwroiplatos(){
$.colorbox({inline:true,  href:"#guidexwroiplatos", width:"60%", height:"60%"});
}
function help_xwroiypsos(){
$.colorbox({inline:true,  href:"#guidexwroiypsos", width:"60%", height:"60%"});
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
function get_thermo_ak(){
$(".ak").colorbox({rel:'ak'});
}
function get_thermo_d(){
$(".d").colorbox({rel:'d'});
}
function get_thermo_de(){
$(".de").colorbox({rel:'de'});
}
function get_thermo_dp(){
$(".dp").colorbox({rel:'dp'});
}
function get_thermo_ed(){
$(".ed").colorbox({rel:'ed'});
}
function get_thermo_edp(){
$(".edp").colorbox({rel:'edp'});
}
function get_thermo_eds(){
$(".eds").colorbox({rel:'eds'});
}
function get_thermo_l(){
$(".l").colorbox({rel:'l'});
}
function get_thermo_oe(){
$(".oe").colorbox({rel:'oe'});
}
function get_thermo_pr(){
$(".pr").colorbox({rel:'pr'});
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
	$dig="0|0|0|0|0|0|2|0|0|0|0|0|0";
	$tb_name="TableContainer_zvnes";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
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
<font color="red">Ανανεώστε την σελίδα αφού προσθέσετε την ζώνη.</font>

</div><!--/zwnes-->

<div id="tab-xwroi" class="tabdiv"> 
<h3>Χώροι κτιρίου</h3>
<?php 
	$ped="kataskeyi_xwroi";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		name: {title: 'Χώρος <a class=\"esg\" href=\"#guidexwroiname\" onclick=help_xwroiname();><img src=\"./images/style/help.png\"/></a>',width: '20%',listClass: 'center'},
		mikos: {title: 'Μήκος <a class=\"esg\" href=\"#guidexwroimikos\" onclick=help_xwroimikos();><img src=\"./images/style/help.png\"/></a>',width: '20%',listClass: 'center'},
		platos: {title: 'Πλάτος <a class=\"esg\" href=\"#guidexwroiplatos\" onclick=help_xwroiplatos();><img src=\"./images/style/help.png\"/></a>',width: '20%',listClass: 'center'},
		ypsos: {title: 'Υψος <a class=\"esg\" href=\"#guidexwroiypsos\" onclick=help_xwroiypsos();><img src=\"./images/style/help.png\"/></a>',width: '20%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
<br/>
<h3>Όροφοι</h3>	
<font color="green">(δηλώνονται εαν χρησιμοποιηθεί η σχεδίαση)</font>
<?php 
	$ped="kataskeyi_floors";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_floors";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
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
<h3>Δάπεδα (Κέλυφος)</h3>
<?php
	$ped="kataskeyi_dap";
	$dig="0|0|0|0|0|2|2|3|1|2|2|0|0";
	$tb_name="TableContainer_daporo";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '20%',listClass: 'center', options: {'0':'Δάπεδο επί εδάφους','1':'Δάπεδο σε Μ.Θ.Χ.','2':'Δάπεδο σε πυλωτή'}},
		name: {title: 'Όνομα',width: '20%',listClass: 'center'},
		emvadon: {title: 'Εμβαδόν',width: '20%',listClass: 'center'},
		u: {title: 'U (ονομαστ. συντ.) <a class=\"iframe\" href=\"./domika_kelyfos.php?page=3&min=1\" onclick=iframe_ground();><img src=\"./images/style/help.png\" /></a>',width: '20%',listClass: 'center'},
		b: {title: 'Μειωτικός συντελεστής',width: '20%',listClass: 'center', options: {'1.0':'b=1','0.5':'b=0.5'}},
		bathos: {title: 'Κατώτερο βάθος',width: '20%',listClass: 'center'},
		perimetros: {title: 'Περίμετρος',width: '20%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
<font color="green">Δάπεδο σε επαφή με το έδαφος υπολογίζεται αυτόματα με βάση τον ισοδύναμο συντελεστή. 
Πρέπει να δηλωθεί ο ονομαστικός U ο οποίος προστίθεται στο xml. Στον υπολογισμό UxA υπολογίζεται αυτόματα με βάση τον ισοδύναμο.</font><br/>
<font color="#8B008B">Οι υπόλοιπες περιπτώσεις υπολογίζονται με βάση το διορθωτικό συντελεστή b. πχ σε δάπεδο σε επαφή με ΜΘΧ πρέπει να δηλωθεί b=0.5. 
Σε δάπεδο που έρχεται σε επαφή με εξωτερικό αέρα (πυλωτή) εισάγεται b=1.</font><br/>


<h3>Οροφές (Κέλυφος - Αδιαφανή)</h3>	
<?php
	$ped="kataskeyi_oro";
	$dig="0|0|0|0|0|0|2|2|1|2|2|2|2|2|2";
	$tb_name="TableContainer_oro";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '20%',listClass: 'center', options: {'0':'Κεκλιμένη στέγη','1':'Οροφή πλάκα'}},
		name: {title: 'Όνομα',width: '20%',listClass: 'center'},
		emvadon: {title: 'Εμβαδόν',width: '20%',listClass: 'center'},
		u: {title: 'U (ονομαστ. συντ.) <a class=\"iframe\" href=\"./domika_kelyfos.php?page=3&min=1\" onclick=iframe_ground();><img src=\"./images/style/help.png\" /></a>',width: '20%',listClass: 'center'},
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
<br/> <br/> 
Ο συνολικός συντελεστής σκίασης για τις επιστεγάσεις οριζόντιες ή κεκλιμένες (π.χ. δώματα ή στέγες), εξαρτάται από τη μορφολογία του περιβάλλοντος χώρου 
(δηλαδή από φυσικά ή τεχνητά εμπόδια) και από τις εγκαταστάσεις που υπάρχουν επάνω στις επιστεγάσεις, όπως η απόληξη κλιμακοστασίου, οι ηλιακοί συλλέκτες, 
οι εγκαταστάσεις κλιματισμού, κ.ά. Για λόγους απλοποίησης, για τον υπολογισμό της ενεργειακής απόδοσης κτηρίων ο συντελεστής σκίασης κατά την ενεργειακή 
μελέτη και επιθεώηση λαμβάνεται ίσος με 0,9, ανεξαρτήτως του βαθμού σκίασης των οριζόντιων επιφανειών, υπό την προϋπόθεση ότι ο συντελεστής θερμοπερατότητας 
των δομικών στοιχείων είναι μικρότερος από 0,6 [W/(m2/K)]. Ο υπολογισμός του συνολικού συντελεστή σκίασης είναι αρκετά πολύπλοκη διαδικασία. Για το λόγο 
αυτό, στην περίπτωση αδυναμίας αναλυτικού υπολογισμού, ο συντελεστής σκίασης των επιστεγάσεων λαμβάνεται ίσος με:
<ul>
<li>0,9 για συντελεστή θερμοπερατότητας των δομικών στοιχείων μεγαλύτερο ή ίσο από 0,6 [W/(m2/K)] και περιορισμένη σκίαση των επιστεγάσεων. Ως περιορισμένη 
σκίαση νοείται η έλλειψη φυσικών ή τεχνητών εμποδίων, καθώς και η ύπαρξη Η/Μ εγκαταστάσεων μικρής επιφάνειας.
<li>0,6 για συντελεστή θερμοπερατότητας των δομικών στοιχείων μεγαλύτερο ή ίσο από 0,6 [W/(m2/K)] και μερική σκίαση των επιστεγάσεων.
<li>0,3 για συντελεστή θερμοπερατότητας των δομικών στοιχείων μεγαλύτερο ή ίσο από 0,6 [W/(m2/K)] και με σημαντική σκίαση των επιστεγάσεων (π.χ. μεγάλου ύψους 
κτήρια, μεγάλο ποσοστό κάλυψη επιστεγάσεων από Η/Μ εγκαταστάσεις κ.ά.). 
Οι ως άνω συντελεστές σκίασης για επιστεγάσεις μπορούν να ληφθούν υπόψη και για ανοίγματα οροφής, σε περίπτωση που δεν διαθέτουν κάποιο ειδικό σύστημα σκίασης.
</div><!--/tab-katakoryfa-->



<div id="tab-thermo" class="tabdiv"> 
<h3>Θερμογέφυρες εξωτερικών γωνιών
<a class="eksg" href="./images/thermo/eksg/eksg1.jpg" title="" onclick=get_thermo_eksg();><img src="./images/style/help.png"/></a></h3>
<?php
	$ped="kataskeyi_therm_eks";
	$dig="0|0|0|0|0|0|2|0|0|0|0|0|0";
	$tb_name="TableContainer_therm_eks";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
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
	$dig="0|0|0|0|0|0|2|0|0|0|0|0|0";
	$tb_name="TableContainer_therm_es";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '25%',listClass: 'center',options: ".getzwnes()."},
		thermo_u: {title: 'Θερμογέφυρα',width: '25%',listClass: 'center', options: ".jtable_getthermo_esg()."},
		plithos: {title: 'Πλήθος',width: '25%',listClass: 'center'},
		ypsos: {title: 'Ύψος',width: '25%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>
<h3>Θερμογέφυρες άλλου τύπου</h3></h3><br/>
Τύποι θερμογεφυρών:  
<a class="ak" href="./images/thermo/ak/ak1.jpg" title="" onclick=get_thermo_ak();>AK</a> | 
<a class="d" href="./images/thermo/d/d1.jpg" title="" onclick=get_thermo_d();>Δ</a> | 
<a class="de" href="./images/thermo/de/de1.jpg" title="" onclick=get_thermo_de();>ΔΕ</a> | 
<a class="dp" href="./images/thermo/dp/dp1.jpg" title="" onclick=get_thermo_dp();>ΔΠ</a> | 
<a class="ed" href="./images/thermo/ed/ed1.jpg" title="" onclick=get_thermo_ed();>ΕΔ</a> | 
<a class="edp" href="./images/thermo/edp/edp1.jpg" title="" onclick=get_thermo_edp();>ΕΔΠ</a> | 
<a class="eds" href="./images/thermo/eds/eds1.jpg" title="" onclick=get_thermo_eds();>ΕΔΣ</a> | 
<a class="l" href="./images/thermo/l/l1.jpg" title="" onclick=get_thermo_l();>Λ</a> | 
<a class="oe" href="./images/thermo/oe/oe1.jpg" title="" onclick=get_thermo_oe();>ΟΕ</a> | 
<a class="pr" href="./images/thermo/pr/pr1.jpg" title="" onclick=get_thermo_pr();>ΠΡ</a>
<br/>
<font color="green">
Εδώ μπορείτε να προσθέσετε εαν έχετε υπολογίσει μία θερμογέφυρα σε άλλο λογισμικό και δεν γνωρίζετε που να την προσθέσετε 
ή θέλετε να προσθέσετε όλες τις θερμογέφυρες χειροκίνητα και να τις αφήσετε κενές σε τοίχους και ανοίγματα.<br/> 
Εισάγετε τον πλησιέστερο τύπο συντελεστή ψ και το μήκος όπου η κάθετη ροή θερμότητας σε κάποια επιφάνεια δεν μπορεί να περιγραφεί μονοδιάστατα από το νόμο του Fourier.</font><br/> 
<?php
	$ped="kataskeyi_therm_alles";
	$dig="0|0|0|0|0|0|2|0|0|0|0|0|0";
	$tb_name="TableContainer_therm_alles";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '25%',listClass: 'center',options: ".getzwnes()."},
		thermo_u: {title: 'Θερμογέφυρα',width: '25%',listClass: 'center', options: ".jtable_getthermo_alles()."},
		plithos: {title: 'Πλήθος',width: '25%',listClass: 'center'},
		ypsos: {title: 'Ύψος',width: '25%',listClass: 'center'}
	}";
	include('includes/jtable.php');	
	
?>
<br/> <br/> 
Σε περίπτωση μη αναφοράς ενός τύπου θερμογέφυρας του κτηρίου, τότε για τους υπολογισμούς λαμβάνεται ο πλησιέστερος τύπος θερμογέφυρας που περιγράφεται στην ΤOTEE 20701-2/2010.                                                                                             

Επειδή ο ΚENAK στον υπολογισμό των θερμογεφυρών δεν έχει λάβει υπόψη άλλα υλικά εκτός του οπλισμένου σκυροδέματος και της οπτοπλινθοδομής, όλα τα υπόλοιπα υλικά κατά απλοποιητική παραδοχή ανάγονται σε αυτά τα δύο. Δηλαδή:
<ul>
<li>α) Η πέτρα και το μέταλλο έρχονται πλησιέστερα προς το οπλισμένο σκυρόδεμα.</li>
<li>β) Τα διαφόρων τύπων πετάσματα από οργανικά και ανόργανα υλικά και το ξύλο ανάγονται στην οπτοπλινθοδομή.</li>
</ul><br/>
Οι θερμογέφυρες ορίζονται αναλυτικά μεταξύ θερμαινόμενου και μη θερμαινόμενου χώρου.


</div><!--/tab-thermo-->

<div id="tab-draw" class="tabdiv"> 
<iframe src='includes/drawing.php' width=100%  height=700px marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0  scrolling='no'></iframe></div>
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


<!--  Κρυφό div class για βοήθεια στην επιλογή ονόματος χώρων ------------------------>
		<div style='display:none'><div id='guidexwroiname' style='padding:10px; background:#ebf9c9;'>
		<b>Όνομα χώρων:</b><br/>
		Ένα τυπικό όνομα για το χώρο όπως "ισόγειο", "υπνοδωμάτιο" κλπ.
		</div></div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή μήκους χώρων ------------------------>
		<div style='display:none'><div id='guidexwroimikos' style='padding:10px; background:#ebf9c9;'>
		<b>Μήκος χώρων:</b><br/>
		Μπορεί να χρησιμοποιηθεί η τιμή μονάδας (1) εαν στο πλάτος χρησιμοποιηθεί εμβαδόν. Αυτό που 
		ενδιαφέρει είναι ο πολλαπλασιασμός μήκους x ύψους να αντιπροσωπεύει το πραγματικό εμβαδόν.
		<br/><br/>
		Επιλέγεται σύμφωνα με την σελ. 41 της ΤΟΤΕΕ-1 2nd edition - Σχήμα 3.1 - Ορισμός μέτρησης οριζόντιων και 
		κατακόρυφων διαστάσεων
		</div></div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή πλάτους χώρων ------------------------>
		<div style='display:none'><div id='guidexwroiplatos' style='padding:10px; background:#ebf9c9;'>
		<b>Πλάτος χώρων:</b><br/>
		Μπορεί να χρησιμοποιηθεί η τιμή μονάδας (1) εαν στο μήκος χρησιμοποιηθεί εμβαδόν. Αυτό που 
		ενδιαφέρει είναι ο πολλαπλασιασμός μήκους x ύψους να αντιπροσωπεύει το πραγματικό εμβαδόν.
		<br/><br/>
		Επιλέγεται σύμφωνα με την σελ. 41 της ΤΟΤΕΕ-1 2nd edition - Σχήμα 3.1 - Ορισμός μέτρησης οριζόντιων και 
		κατακόρυφων διαστάσεων
		</div></div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή ύψους χώρων ------------------------>
		<div style='display:none'><div id='guidexwroiypsos' style='padding:10px; background:#ebf9c9;'>
		<b>Ύψος χώρων:</b><br/>
		Επιλέγεται σύμφωνα με την σελ. 41 της ΤΟΤΕΕ-1 2nd edition - Σχήμα 3.1 - Ορισμός μέτρησης οριζόντιων και 
		κατακόρυφων διαστάσεων
		</div></div>
<!------------------------------------------------------------------------------------>

<!------------------------------------------------------------------------------------>	

<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών ΔΑΠΕΔΟΥ  -->
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
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών AK  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 21; $i++) {
		echo "<p><a class=\"ak\" href=\"./images/thermo/ak/ak" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών D  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 65; $i++) {
		echo "<p><a class=\"d\" href=\"./images/thermo/d/d" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών DE  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 13; $i++) {
		echo "<p><a class=\"de\" href=\"./images/thermo/de/de" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών DP  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 28; $i++) {
		echo "<p><a class=\"dp\" href=\"./images/thermo/dp/dp" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών ED  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 16; $i++) {
		echo "<p><a class=\"ed\" href=\"./images/thermo/ed/ed" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών EDP  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 25; $i++) {
		echo "<p><a class=\"edp\" href=\"./images/thermo/edp/edp" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών EDS  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 5; $i++) {
		echo "<p><a class=\"eds\" href=\"./images/thermo/eds/eds" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών L  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 15; $i++) {
		echo "<p><a class=\"l\" href=\"./images/thermo/l/l" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών OE  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 26; $i++) {
		echo "<p><a class=\"oe\" href=\"./images/thermo/oe/oe" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών PR  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 4; $i++) {
		echo "<p><a class=\"pr\" href=\"./images/thermo/pr/pr" . $i . ".jpg\" title=\"\"></a></p>";
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
<b>Έλεγχος θερμομονωτικής επάρκειας για τη ζώνη:</b><br/><br/>
Εαν επιλεγεί ο έλεγχος τότε:
<ol><li>Εμφανίζεται ο υπολογισμός ελέγχου θερμομονωτικής επάρκειας στο τεύχος</li>
<li>Υπολογίζονται ΖΝΧ για τη ζώνη και εμφανίζονται στο τεύχος,</li> 
<li>Υπολογίζεται αερισμός για τη ζώνη</li></ol><br/>
Μπορείτε να προσθέσετε μη θερμαινόμενους χώρους για τους οποίους θέλετε να εμφανίσετε το κέλυφος στο τεύχος αλλά δεν απαιτείται έλεγχος θερμομονωτικής επάρκειας.<br/><br/>

Κατά την παραγωγή του xml για το λογισμικό ΤΕΕ-ΚΕΝΑΚ όπου έχει δηλωθεί ΝΑΙ στον έλεγχο θερμομονωτικής επάρκειας εισάγεται ζώνη ενώ όπου έχει δηλωθεί ΟΧΙ εισάγεται Μη Θερμ. Χώρος.

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
$strSQL = "SELECT * FROM kataskeyi_zwnes WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id'];
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


//ΘΕΡΜΟΓΕΦΥΡΕΣ ΑΛΛΟΥ ΤΥΠΟΥ
function jtable_getthermo_alles(){
$ret=array();
$strSQL = "SELECT * FROM thermo_esg";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}	
$strSQL = "SELECT * FROM thermo_eksg";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
$strSQL = "SELECT * FROM thermo_d";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
$strSQL = "SELECT * FROM thermo_de";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}	
$strSQL = "SELECT * FROM thermo_dp";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
$strSQL = "SELECT * FROM thermo_ed";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
$strSQL = "SELECT * FROM thermo_edp";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
$strSQL = "SELECT * FROM thermo_eds";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
$strSQL = "SELECT * FROM thermo_ak";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
$strSQL = "SELECT * FROM thermo_l";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
$strSQL = "SELECT * FROM thermo_pr";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
{
	//$ret[$objResult["id"]] =  $objResult["name"];
	$ret[$objResult["y"].'|'.$objResult["name"]] =  $objResult["name"];
}
return json_encode($ret);
}

?>
	
