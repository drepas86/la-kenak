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
		<!--/Δεύτερος τρόπος εισαγωγής δεδομένων στη βάση-->
		<?php	if ($sel_page["id"] == 4)	{ ?>
			<h2>ΚΕΝΑΚ - Συστήματα</h2>
	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/home.png\"></img>";
	  </script>
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.delcheck"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.delcheck"+i+".checked=false");
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
	

function get_thermo_dap(){
$(".dap").colorbox({rel:'dap'});
}
function get_thermo_esg(){
$(".esg").colorbox({rel:'esg'});
}
function get_thermo_eksg(){
$(".eksg").colorbox({rel:'eksg'});
}
function iframe_oriz_u(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"90%"});
}
function get_inlinetext(v){
$.colorbox({inline:true,  href:"#inline_text"+v});
}

function get_active(){
document.getElementById("tabvanilla").style.display="block";
}


function help_thermpisxys(){
$.colorbox({inline:true,  href:"#guide_thermpisxys", width:"60%", height:"40%"});
}
function help_thermpbathm(){
$.colorbox({inline:true,  href:"#guide_thermpbathm", width:"60%", height:"80%"});
}
function calc_ngen(){
var ngen;
var ngm;
var ng1;
var ng2;
ngm = document.getElementById('ngm').value;
ng1 = document.getElementById('ng1').value;
ng2 = document.getElementById('ng2').value;
ngen = ngm*ng1*ng2;
document.getElementById('ngen').value = ngen.toFixed(2);
}
function help_thermpcop(){
$.colorbox({inline:true,  href:"#guide_thermpcop", width:"60%", height:"60%"});
}
function help_thermdbathm(){
$.colorbox({inline:true,  href:"#guide_thermdbathm", width:"60%", height:"60%"});
}
function help_thermtbathm(){
$.colorbox({inline:true,  href:"#guide_thermtbathm", width:"60%", height:"60%"});
}


function help_coldpeer(){
$.colorbox({inline:true,  href:"#guide_coldpeer", width:"60%", height:"60%"});
}
function help_colddbathm(){
$.colorbox({inline:true,  href:"#guide_colddbathm", width:"60%", height:"60%"});
}
function help_coldtbathm(){
$.colorbox({inline:true,  href:"#guide_coldtbathm", width:"60%", height:"60%"});
}

function help_znxdbathm(){
$.colorbox({inline:true,  href:"#guide_znxdbathm", width:"60%", height:"60%"});
}

function help_iliakostherm(){
$.colorbox({inline:true,  href:"#guide_iliakostherm", width:"60%", height:"40%"});
}
function help_iliakosznx(){
$.colorbox({inline:true,  href:"#guide_iliakosznx", width:"60%", height:"40%"});
}
function help_syna(){
$.colorbox({inline:true,  href:"#guide_syna", width:"60%", height:"80%"});
}
function help_synb(){
$.colorbox({inline:true,  href:"#guide_synb", width:"60%", height:"80%"});
}
function help_gdeg(){
$.colorbox({inline:true,  href:"#guide_gdeg", width:"60%", height:"80%"});
}
function help_bdeg(){
$.colorbox({inline:true,  href:"#guide_bdeg", width:"60%", height:"80%"});
}
function help_fs(){
$.colorbox({inline:true,  href:"#guide_fs", width:"60%", height:"80%"});
}

function help_lightisxys(){
$.colorbox({inline:true,  href:"#guide_lightisxys", width:"60%", height:"40%"});
}
function help_lightperioxi(){
$.colorbox({inline:true,  href:"#guide_lightperioxi", width:"60%", height:"80%"});
}
function help_lightthermotita(){
$.colorbox({inline:true,  href:"#guide_lightthermotita", width:"60%", height:"40%"});
}
function help_lightasfaleia(){
$.colorbox({inline:true,  href:"#guide_lightasfaleia", width:"60%", height:"40%"});
}
function help_lightefedreia(){
$.colorbox({inline:true,  href:"#guide_lightefedreia", width:"60%", height:"40%"});
}

function calc_lightan(){
var an_height;
var an_platos;
var an_preki;
var anff_vathos;
var anff_platos;
an_height = document.getElementById('light_an_height').value;
an_platos = document.getElementById('light_an_platos').value;
an_preki = document.getElementById('light_an_preki').value;
anff_vathos = 2.5*(an_preki-an_height);
anff_platos = (0.5*anff_vathos)+parseFloat(an_platos);
document.getElementById('light_anff_vathos').value = anff_vathos.toFixed(2);
document.getElementById('light_anff_platos').value = anff_platos;
}

function calc_lightor(){
var or_height;
var or_orofi;
var or_platos;
var orff_d;
or_height = document.getElementById('light_or_height').value;
or_orofi = document.getElementById('light_or_orofi').value;
or_platos = document.getElementById('light_or_platos').value;
orff_d = parseFloat(or_platos) + 2*(parseFloat(or_orofi)-parseFloat(or_height))*Math.tan(30*(180/Math.PI));
document.getElementById('light_orff_d').value = orff_d.toFixed(2);
}

function help_kkm_fh(){
$.colorbox({inline:true,  href:"#guide_kkm_fh", width:"60%", height:"40%"});
}
function help_kkm_rh(){
$.colorbox({inline:true,  href:"#guide_kkm_rh", width:"60%", height:"40%"});
}
function help_kkm_qrh(){
$.colorbox({inline:true,  href:"#guide_kkm_qrh", width:"60%", height:"40%"});
}
function help_kkm_fc(){
$.colorbox({inline:true,  href:"#guide_kkm_fc", width:"60%", height:"40%"});
}
function help_kkm_rc(){
$.colorbox({inline:true,  href:"#guide_kkm_rc", width:"60%", height:"40%"});
}
function help_kkm_qrc(){
$.colorbox({inline:true,  href:"#guide_kkm_qrc", width:"60%", height:"40%"});
}
function help_kkm_hr(){
$.colorbox({inline:true,  href:"#guide_kkm_hr", width:"60%", height:"40%"});
}
function help_kkm_event(){
$.colorbox({inline:true,  href:"#guide_kkm_event", width:"60%", height:"40%"});
}

</script>
<font color="green">Εαν δεν υπάρχουν δεδομένα φωτισμού, ΚΚΜ, Ύγρανσης ή ηλιακού δεν εισάγονται και δεν εμφανίζονται στο ΤΕΕ-ΚΕΝΑΚ. <br/>
Επίσης εαν η χρήση απαγορεύει την ύπαρξη ενός συστήματος στο ΤΕΕ-ΚΕΝΑΚ (πχ Μονοκατοικία-Φωτισμός)τότε και να έχει προστεθεί δεν εμφανίζεται.<br/>
Στο τεύχος ο ηλιακός εμφανίζεται πάντα ακόμα και αν δεν γίνει εισαγωγή κάποιου τύπου (απαίτηση κάλυψης αναγκών ΖΝΧ).</font>			
			<div id="tabvanilla" class="widget" style="display:none;">
					<ul class="tabnav">  
					<!--<li><a href="#tab-meletes">Μελέτες Η/Μ</a></li>-->
					<li><a href="#tab-thermansi">Θέρμανση</a></li>
					<li><a href="#tab-psyksi">Ψύξη</a></li>
					<li><a href="#tab-znx">ΖΝΧ</a></li>
					<li><a href="#tab-iliakos">Ηλιακός</a></li>
					<li><a href="#tab-light">Φωτισμός</a></li>
					<li><a href="#tab-kkm">Μηχανικός Αερισμός</a></li>
					<li><a href="#tab-ygransi">Ύγρανση</a></li>
					</ul>  
					
					
					
					
			<!--<div id="tab-meletes" class="tabdiv">
					
					<?php
					$kataskeyi_hm_array = get_times_all("*", "kataskeyi_hm");
					$kataskeyi_hm_thermansi = $kataskeyi_hm_array[0]["value"];
					$kataskeyi_hm_klimatismos = $kataskeyi_hm_array[1]["value"];
					$vasi = "prosthiki";
					?>
					<h3>Μελέτες Θέρμανσης/Κλιματισμού</h3>
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Θέρμανση (τιμή από μελέτη θέρμανσης Kcal) </div></th>
					<td><?=$kataskeyi_hm_thermansi;?></td>
					<td><input type="text" name="<?=$vasi."_thermansi"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Κλιματισμός (τιμή από μελέτη κλιματισμού Btu) </div></th>
					<td><?=$kataskeyi_hm_klimatismos;?></td>
					<td><input type="text" name="<?=$vasi."_klimatismos"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_hm"?>" value="Τροποποίηση στοιχείων μελέτης Η/Μ" />
					</form>
			</div> 
			meletes-->


	
	<div id="tab-thermansi" class="tabdiv"> 
					
	<img src="images/style/heat.png"></img>
	<h3>Παραγωγή - Θέρμανση</h3>
	
	<?php 
	$ped="kataskeyi_xsystems_thermp";
	$dig="0|0|0|0|0|0|2|2|2|2|2|2|2|2|2|2|2|2|2|2|2";
	$tb_name="TableContainer_thermp";
	$thermp_type_lib= array("Λέβητας","Κεντρική υδρόψυκτη Α.Θ.","Κεντρική αερόψυκτη Α.Θ.","Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη","Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη","Κεντρική άλλου τύπου Α.Θ.",
	"Τοπικές ηλεκτρικές μονάδες (καλοριφέρ ή θερμοπομποί ή άλλο)","Τοπικές μονάδες αερίου ή υγρού καυσίμου","Ανοικτές εστίες καύσης","Τηλεθέρμανση","ΣΗΘ","Μονάδα παραγωγής άλλου τύπου");
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '20%',listClass: 'center', 
			options: {'0':'Λέβητας',
					'1':'Κεντρική υδρόψυκτη Α.Θ.',
					'2':'Κεντρική αερόψυκτη Α.Θ.',
					'3':'Τοπική αερόψυκτη Α.Θ.',
					'4':'Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη',
					'5':'Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη',
					'6':'Κεντρική άλλου τύπου Α.Θ.',
					'7':'Τοπικές ηλεκτρικές μονάδες (καλοριφέρ ή θερμοπομποί ή άλλο)',
					'8':'Τοπικές μονάδες αερίου ή υγρού καυσίμου',
					'9':'Ανοικτές εστίες καύσης',
					'10':'Τηλεθέρμανση',
					'11':'ΣΗΘ',
					'12':'Μονάδα παραγωγής άλλου τύπου'}},
		pigienergy: {title: 'Πηγή ενέργειας',width: '20%',listClass: 'center',
			options: {'0':'Υγραέριο (LPG)',
					'1':'Φυσικό αέριο',
					'2':'Ηλεκτρισμός',
					'3':'Πετρέλαιο θέρμανσης',
					'4':'Πετρέλαιο κίνησης',
					'5':'Τηλεθέρμανση (ΔΕΗ)',
					'6':'Τηλεθέρμανση (ΑΠΕ)',
					'7':'Βιομάζα',
					'8':'Βιομάζα τυποποιημένη',
					'9':'ΣΗΘ1',
					'10':'ΣΗΘ2',
					'11':'ΣΗΘ3',
					'12':'ΣΗΘ4',
					'13':'ΣΗΘ5',
					'14':'ΣΗΘ6',
					'15':'ΣΗΘ7',
					'16':'ΣΗΘ8',
					'17':'ΣΗΘ9',
					'18':'ΣΗΘ10'}},
		isxys: {title: 'Ισχύς <a href=\"#guide_thermpisxys\" onclick=help_thermpisxys();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		bathm: {title: 'Βαθμ. <a href=\"#guide_thermpbathm\" onclick=help_thermpbathm();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		cop: {title: 'COP <a href=\"#guide_thermpcop\" onclick=help_thermpcop();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		jan: {title: 'Ιαν',width: '2%',listClass: 'center'},
		feb: {title: 'Φεβ',width: '2%',listClass: 'center'},
		mar: {title: 'Μαρ',width: '2%',listClass: 'center'},
		apr: {title: 'Απρ',width: '2%',listClass: 'center'},
		may: {title: 'Μαι',width: '2%',listClass: 'center',create: false,default: '0'},
		jun: {title: 'Ιουν',width: '2%',listClass: 'center',create: false,default: '0'},
		jul: {title: 'Ιουλ',width: '2%',listClass: 'center',create: false,default: '0'},
		aug: {title: 'Αυγ',width: '2%',listClass: 'center',create: false,default: '0'},
		sep: {title: 'Σεπ',width: '2%',listClass: 'center',create: false,default: '0'},
		okt: {title: 'Οκτ',width: '2%',listClass: 'center',create: false,default: '0'},
		nov: {title: 'Νοε',width: '2%',listClass: 'center'},
		decem: {title: 'Δεκ',width: '2%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>

<!--  Κρυφό div class για βοήθεια στην επιλογή thermp isxys ------>
<div style='display:none'>
	<div id='guide_thermpisxys' style='padding:10px; background:#ebf9c9;'>
	<b>Ονομαστική ισχύς μονάδας παραγωγής:</b><br/>
	
	<br/>
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή βαθμού απόδοσης συστήματος θερμανσης------>
<div style='display:none'>
	<div id='guide_thermpbathm' style='padding:10px; background:#ebf9c9;'>
	<b>Βαθμός απόδοσης συστήματος θέρμανσης:</b><br/>
	Υπολογίζεται ως γινόμενο τριών συντελεστών:
	n<sub>gen</sub> = n<sub>gm</sub> × ng<sub>1</sub> × ng<sub>2</sub>
	<br/><br/>
	<hr>
	<font color="red"><b>Συντελεστής n<sub>gm</sub> (πραγματικός βαθμός απόδοσης της μονάδας):</b></font><br/>
	Προκύπτει από την ανάλυση καυσαερίων, η οποία είναι υποχρεωτική σύμφωνα με την Κ.Υ.Α. 189533/2011 και αναγράφεται στο φύλλο συντήρησης και ρύθμισης του συστήματος θέρμανσης.<br/>
	Όταν δεν αναφέρεται στις τεχνικές προδιαγραφές χρησιμοποιείται η ελάχιστη θερμική απόδοση λέβητα-καυστήρα σύμφωνα με το Π.Δ. 335/1993 Φ.Ε.Κ. 143:<br/>
	<font color="green">Μπορείτε να εισάγετε το P<sub>n</sub> εδώ και να επιλέξετε το κελί για είσοδο του n<sub>gm</sub> στον τύπο.</font>
	<input tupe="text" id="arithmos_pn">
	<table border="1">
	<tr>
	<th>Τύπος λέβητα</th>
	<th align="center">Απαίτηση απόδοσης [%] σε ονομαστική ισχύ P<sub>n</sub> (πλήρες φορτίο) και σε μέση θερμοκρασία του νερού του λέβητα 70<sup>o</sup>C</th>
	</tr>
	<tr>
	<td>Συνήθεις λέβητες</td>
	<td align="center" style="cursor:pointer;" onclick="document.getElementById('ngm').value=((84+2*Math.log(document.getElementById('arithmos_pn').value))/100);calc_ngen();">≥ 84 + 2 × λογP<sub>n</sub> (για P<sub>n</sub> από 4 έως 400 kW)</td>
	</tr>
	<tr>
	<td>Λέβητες χαμηλής θερμοκρασίας ή συμπύκνωσης υγρών καυσίμων</td>
	<td align="center" style="cursor:pointer;" onclick="document.getElementById('ngm').value=((87.5+1.5*Math.log(document.getElementById('arithmos_pn').value))/100);calc_ngen();">≥ 87,5 + 1,5 × λογP<sub>n</sub> (για P<sub>n</sub> από 4 έως 400 kW)</td>
	</tr>
	<tr>
	<td>Λέβητες συμπύκνωσης αερίων καυσίμων</td>
	<td align="center" style="cursor:pointer;" onclick="document.getElementById('ngm').value=((91+1*Math.log(document.getElementById('arithmos_pn').value))/100);calc_ngen();">≥ 91 + 1 × λογP<sub>n</sub> (για P<sub>n</sub> από 4 έως 400 kW)</td>
	</tr>
	</table>
	<hr>
	<font color="red"><b>Συντελεστής ng<sub>1</sub> (συντελεστής υπερδιαστασιολόγησης):</b></font><br/>
	Γίνεται υπολογισμός της μέγιστης απαιτούμενης θερμικής ισχύος της μονάδας P<sub>gen</sub>=A×U<sub>m</sub>×ΔT×2,5 (βλ. ΤΕΥΧΟΣ-Κεφάλαιο υπολογισμών) προς την πραγματική P<sub>m</sub>.
	<table border="1">
	<tr>
	<th>Σχέση πραγματικής προς υπολογιζόμενη ισχύ μονάδας θέρμανσης(P<sub>m</sub> / P<sub>gen</sub>)</th>
	<th>Συντελεστής βαρύτητας ng<sub>1</sub></th>
	</tr>
	<tr>
	<td>Λέβητας με υπερδιπλάσια ισχύ από τη μέγιστη υπολογιζόμενη</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng1').value=0.75;calc_ngen();">0,75</td>
	</tr>
	<tr>
	<td>Λέβητας με ισχύ μεγαλύτερη από 50% μέχρι και 100% από τη μέγιστη υπολογιζόμενη</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng1').value=0.85;calc_ngen();">0,85</td>
	</tr>
	<tr>
	<td>Λέβητας με ισχύ μεγαλύτερη από 25% μέχρι και 50% από τη μέγιστη υπολογιζόμενη</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng1').value=0.95;calc_ngen();">0,95</td>
	</tr>
	<tr>
	<td>Λέβητας με ισχύ μέχρι και 25% μεγαλύτερη από τη μέγιστη υπολογιζόμενη</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng1').value=1;calc_ngen();">1</td>
	</tr>
	</table>
	<br/>
	<hr>
	<font color="red"><b>Συντελεστής ng<sub>2</sub> (συντελεστής μόνωσης λέβητα):</b></font><br/>
	<table border="1">
	<tr>
	<th>Ονομαστική ισχύς (kW)</th><th>20 - 100</th><th>100 - 200</th><th>200 - 300</th><th>300 - 400</th><th>≥ 400</th>
	</tr>
	<tr>
	<td>Λέβητας με μόνωση Σε καλή κατάσταση μόνωσης</td>
	<td colspan="5" align="center" style="cursor:pointer;" onclick="document.getElementById('ng2').value=1;">1,0</td>
	</tr>
	<tr>
	<td>Λέβητας γυμνός ή με κατεστραμμένη μόνωση</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng2').value=0.936;calc_ngen();">0,936</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng2').value=0.949;calc_ngen();">0,949</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng2').value=0.948;calc_ngen();">0,948</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng2').value=0.951;calc_ngen();">0,951</td>
	<td style="cursor:pointer;" onclick="document.getElementById('ng2').value=0.952;calc_ngen();">0,952</td>
	</tr>
	</table>
	<br/>
	<hr>
	<table>
	<tr>
	<th>ng<sub>m</sub></th><th>ng<sub>1</sub></th><th>ng<sub>2</sub></th><th>n<sub>gen</sub></th>
	</tr>
	<tr>
	<td><input type="text" id="ngm" onkeyup="calc_ngen();">×</td>
	<td><input type="text" id="ng1" onkeyup="calc_ngen();">×</td>
	<td><input type="text" id="ng2" onkeyup="calc_ngen();">=</td>
	<td><input type="text" id="ngen"></td>
	</tr>
	</table>
	<br/>
	<font color="green">Με κλικ στις τιμές ng<sub>1</sub> και ng<sub>2</sub> εισάγωνται οι τιμές στον τύπο.</font>
	</div>
</div>
<!--------------------------------------------------------------------------------------->
<!--  Κρυφό div class για βοήθεια στην επιλογή thermp COP ------>
<div style='display:none'>
	<div id='guide_thermpcop' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής επίδοσης (COP):</b><br/>
	Η τιμή του COP προσδιορίζεται σε συγκεκριμένες συνθήκες εξωτερικού περιβάλλοντος και 
	θερμοκρασίας παροχής και επιστροφής θερμικού μέσου. Η απόδοση των αντλιών θερμότητας 
	εξαρτάται επίσης και από την πηγή θερμότητας που αξιοποιούν για τη λειτουργία τους και η οποία 
	μπορεί να είναι ο αέρας, το έδαφος, τα υπόγεια και επιφανειακά νερά, το θαλασσινό νερό, τα καυσαέρια 
	κινητήρων (π.χ. Σ.Η.Θ.), η ηλιακή ενέργεια κ.ά.
	<br/>
	Λαμβάνεται για ονομαστικές συνθήκες λειτουργίας θερμοκρασίας εξωτερικού αέρα 7<sup>ο</sup>C και θερμοκρασία 
	μέσου 45οC σύμφωνα με το ευρωπαϊκό πρότυπο ΕΝ 14511:2007, όπως δίνεται από τον κατασκευαστή και 
	αναγράφεται στις τεχνικές προδιαγραφές ή/και στο πλαίσιο της αντλίας θερμότητας.<br/>
	<hr>
	Μέσος ολικός εποχικός συντελεστής επίδοσης SCOP για μονάδες αντλιών θερμότητας για 
	διάφορες θερμοκρασίες θερμικού μέσου (ΕΛΟΤ ΕΝ 15316.4.2:2008).
	<table border="1">
	<tr>
	<th rowspan="2" valign="middle">Πηγή θερμότητας</th>
	<th colspan="3">Κτήρια τριτογενούς τομέα</th>
	<th colspan="2">Κτήρια κατοικιών</th>
	</tr>
	<tr>
	<th>Τ<35<sup>o</sup>C</th>
	<th>35<sup>o</sup>C<Τ<45<sup>o</sup>C</th>
	<th>45<sup>o</sup>C<Τ<55<sup>o</sup>C</th>
	<th>Τ<35<sup>o</sup>C</th>
	<th>35<sup>o</sup>C<Τ<45<sup>o</sup>C</th>
	</tr>
	<tr>
	<td>Εξωτερικός αέρας</td><td>3,4</td><td>3,1</td><td>2,8</td><td>3,7</td><td>3,3</td>
	</tr>
	<tr>
	<td>Έδαφος</td><td>5,5</td><td>5,1</td><td>4,7</td><td>3,8</td><td>3,4</td>
	</tr>
	<tr>
	<td>Θερμότητα από καυσαέρια (π.χ. Σ.Η.Θ.)</td><td>6,1</td><td>5,1</td><td>4,4</td><td></td><td></td>
	</tr>
	<tr>
	<td>Υπόγειο ή θαλασσινό νερό</td><td>4,7</td><td>4,2</td><td>3,6</td><td>4,5</td><td>4,1</td>
	</tr>
	<tr>
	<td>Επιφανειακά νερά</td><td>4,1</td><td>3,7</td><td>3,3</td><td></td><td></td>
	</tr>
	</table>
	<br/>
	<hr>
	Για τις τοπικές αερόψυκτες μονάδες αντλιών θερμότητας (διαιρούμενου ή ενιαίου τύπου), για τις 
	οποίες δεν υπάρχουν διαθέσιμα στοιχεία, ο βαθμός επίδοσης COP για τους υπολογισμούς της 
	ενεργειακής απόδοσης τού προς επιθεώρηση κτηρίου λαμβάνεται:
	<ol>
	<li>1,7 για συστήματα 20-ετίας και</li>
	<li>2,2 για συστήματα 10-ετίας.</li>
	</ol>
	Για τις κεντρικές μονάδες αντλιών θερμότητας, για τις οποίες δεν υπάρχουν διαθέσιμα στοιχεία, ο 
	βαθμός επίδοσης COP για τους υπολογισμούς της ενεργειακής απόδοσης του υπό μελέτη ή προς 
	επιθεώρηση κτηρίου, λαμβάνεται:
	<ol>
	<li>2,2 για συστήματα 20-ετίας και</li>
	<li>2,7 για συστήματα 10-ετίας.</li>
	</ol>
	</div>
</div>
<!------------------------------------------------------------------------------------>

	<h3>Δίκτυο διανομής - Θέρμανση</h3>
	<?php 
	$ped="kataskeyi_xsystems_thermd";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_thermd";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '30%',listClass: 'center', 
			options: {'0':'Δίκτυο διανομής θερμού μέσου',
					'1':'Αεραγωγοί'
			}
		},
		isxys: {title: 'Ισχύς',width: '15%',listClass: 'center'},
		xwros: {title: 'Χώρος',width: '30%',listClass: 'center',
			options: {'0.00':'Εσωτερικοί ή έως 20% σε εξωτερικούς',
					'1.00':'Πάνω από 20% σε εξωτερικούς',
					}
		},
		bathm: {title: 'Βαθμ. <a href=\"#guide_thermdbathm\" onclick=help_thermdbathm();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		monwsi: {title: 'Μόνωση',width: '5%',listClass: 'center', 
			options: {'0':'ΟΧΙ',
					'1':'ΝΑΙ'
			}}
	}";
	include('includes/jtable.php');
	?>	

<!--  Κρυφό div class για βοήθεια στην επιλογή thermd bathm ------>
<div style='display:none'>
	<div id='guide_thermdbathm' style='padding:10px; background:#ebf9c9;'>
	<b>Βαθμός απόδοσης δικτύου διανομής θέρμανσης:</b>
	<br/><br/>
	<b>Ποσοστό θερμικών απωλειών:</b>

	<table border="1">
	<tr><th rowspan="2" align="middle">Θερμική ή ψυκτική ισχύς δικτύου διανομής [kW]</th>
	<th colspan="4" align="middle">Διέλευση σε εσωτερικούς χώρους ή/και 20% σε εξωτερικούς χώρους</th>
	<th colspan="3" align="middle">Διέλευση > 20% σε εξωτερικούς χώρους</th>
	</tr>
	<tr>
	<th>Μόνωση κτηρίου αναφοράς [%]</th>
	<th>Μόνωση ίση με την ακτίνα σωλήνων [%]</th>
	<th>Ανεπαρκής μόνωση [%]</th>
	<th>Χωρίς μόνωση [%]</th>
	<th>Μόνωση κτηρίου αναφοράς [%]</th>
	<th>Μόνωση ίση με την ακτίνα σωλήνων [%]</th>
	<th>Χωρίς ή μενεπαρκή μόνωση [%]</th>
	</tr>
	<tr>
	<td colspan="8" align="middle">Δίκτυα διανομής θέρμανσης με υψηλές θερμοκρασίες προσαγωγής θερμικού μέσου (≥60<sup>o</sup>C)</td>
	</tr>
	<tr>
	<td>20 - 100</td>
	<td align="center">5,5</td>
	<td align="center">4,5</td>
	<td align="center">11,0</td>
	<td align="center">14,0</td>
	<td align="center">8,0</td>
	<td align="center">6,5</td>
	<td align="center">17,0</td>
	</tr>
	<tr>
	<td>100 - 200</td>
	<td align="center">4,0</td>
	<td align="center">3,0</td>
	<td align="center">8,5</td>
	<td align="center">12,0</td>
	<td align="center">7,2</td>
	<td align="center">5,7</td>
	<td align="center">15,5</td>
	</tr>
	<tr>
	<td>200 - 300</td>
	<td align="center">3,0</td>
	<td align="center">2,5</td>
	<td align="center">6,5</td>
	<td align="center">10,5</td>
	<td align="center">6,0</td>
	<td align="center">4,2</td>
	<td align="center">14,2</td>
	</tr>
	<tr>
	<td>300 - 400</td>
	<td align="center">2,5</td>
	<td align="center">2,0</td>
	<td align="center">5,0</td>
	<td align="center">9,2</td>
	<td align="center">3,8</td>
	<td align="center">2,7</td>
	<td align="center">13,1</td>
	</tr>
	<tr>
	<td>>400</td>
	<td align="center">2,0</td>
	<td align="center">1,5</td>
	<td align="center">4,0</td>
	<td align="center">7,0</td>
	<td align="center">3,0</td>
	<td align="center">2,0</td>
	<td align="center">12,0</td>
	</tr>
	<tr>
	<td colspan="8" align="middle">Δίκτυα διανομής θέρμανσης με χαμηλές θερμοκρασίες προσαγωγής θερμικού μέσου (<60<sup>o</sup>C)</td>
	</tr>
	<tr>
	<td>20 - 100</td>
	<td align="center">3,5</td>
	<td align="center">3,0</td>
	<td align="center">8,0</td>
	<td align="center">9,0</td>
	<td align="center">4,5</td>
	<td align="center">3,7</td>
	<td align="center">11,0</td>
	</tr>
	<tr>
	<td>100 - 200</td>
	<td align="center">2,7</td>
	<td align="center">2,2</td>
	<td align="center">7,2</td>
	<td align="center">8,3</td>
	<td align="center">4,0</td>
	<td align="center">3,1</td>
	<td align="center">10,4</td>
	</tr>
	<tr>
	<td>200 - 300</td>
	<td align="center">2,0</td>
	<td align="center">1,8</td>
	<td align="center">6,0</td>
	<td align="center">6,2</td>
	<td align="center">3,3</td>
	<td align="center">2,5</td>
	<td align="center">10,0</td>
	</tr>
	<tr>
	<td>300 - 400</td>
	<td align="center">1,5</td>
	<td align="center">1,2</td>
	<td align="center">4,5</td>
	<td align="center">5,0</td>
	<td align="center">2,2</td>
	<td align="center">1,8</td>
	<td align="center">9,7</td>
	</tr>
	<tr>
	<td>>400</td>
	<td align="center">1,2</td>
	<td align="center">0,8</td>
	<td align="center">3,3</td>
	<td align="center">4,0</td>
	<td align="center">1,7</td>
	<td align="center">1,0</td>
	<td align="center">9,5</td>
	</tr>
	</table>
<br/>
Σε περίπτωση ύπαρξης άνω του ενός δικτύων διανομής στο κτήριο ή στη θερμική ζώνη, απαιτείται
ο προσδιορισμός μίας μόνο απόδοσης δικτύου, η οποία θα είναι σταθμισμένη. Κατά συνέπεια αν
υπάρχουν άνω του ενός δίκτυα διανομής (που τροφοδοτούνται από διαφορετικές μονάδες
παραγωγής) στο κτήριο ή στη θερμική ζώνη και παρουσιάζουν διαφορετική ποιότητα και επάρκεια
(ποσότητα) θερμομόνωσης, τότε η απόδοσή τους λαμβάνεται ενιαία και ίση με αυτήν του τμήματος
που βρίσκεται στη χειρότερη ποιοτικά κατάσταση.	
	</div>
</div>
<!------------------------------------------------------------------------------------>
	
	<h3>Τερματικές μονάδες - Θέρμανση</h3>
	<?php 
	$ped="kataskeyi_xsystems_thermt";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_thermt";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '70%',listClass: 'center'},
		bathm: {title: 'Βαθμ. <a href=\"#guide_thermtbathm\" onclick=help_thermtbathm();><img src=\"./images/style/help.png\"/></a>',width: '15%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>	

<!--  Κρυφό div class για βοήθεια στην επιλογή thermt bathm ------>
<div style='display:none'>
	<div id='guide_thermtbathm' style='padding:10px; background:#ebf9c9;'>
	<b>Βαθμός απόδοσης τερματικών μονάδων θέρμανσης (n<sub>em,t</sub>):</b><br/>
	Συνήθεις τερματικές μονάδες:
	<ol>
	<li>θερμαντικά σώματα άμεσης απόδοσης (καλοριφέρ)</li>
	<li>ενδοδαπέδια συστήματα θέρμανσης</li>
	<li>ενδοτοίχια συστήματα και </li>
	<li>μονάδες ανεμιστήρα στοιχείου (fancoil)</li>
	</ol>
	<br/>
	<hr>
	Σύμφωνα με το πρότυπο ΕΛΟΤ ΕΝ 15316.2.1:2008 υπολογίζεται ως:
	n<sub>em,t</sub>=n<sub>em</sub>/(f<sub>rad</sub>×f<sub>im</sub>×f<sub>hydr</sub>)
	<br/>
	<hr>
	<font color="red">Aπόδοση εκπομπής n<sub>em</sub></font>:
	<br/>
	<table border="1">
	<tr><th colspan="4">Απόδοση εκπομπής n<sub>em</sub> τερματικών μονάδων θέρμανσης</th></tr>
	<tr><th rowspan="2" align="middle">Τύπος τερματικής μονάδας</th><th colspan="3">Θερμοκρασία μέσου Τ [<sup>ο</sup>C]</th></tr>
	<tr><th>90 - 70</th><th>70 - 50</th><th>50 - 35</th></tr>
	<tr><td>Άμεσης απόδοσης σε εσωτερικό τοίχο</td><td>0,85</td><td>0,89</td><td>0,91</td></tr>
	<tr><td>Άμεσης απόδοσης σε εξωτερικό τοίχο</td><td>0,89</td><td>0,93</td><td>0,95</td></tr>
	<tr><td>Ενδοδαπέδιο σύστημα θέρμανσης</td><td></td><td></td><td>0,90</td></tr>
	<tr><td>Ενδοτοίχιο σύστημα θέρμανσης</td><td></td><td></td><td>0,87</td></tr>
	<tr><td>Σύστημα θέρμανσης οροφής</td><td></td><td></td><td>0,85</td></tr>
	</table>
	<br/>
	<table border="1">
	<tr>
	<th>Τύπος τερματικής μονάδας</th>
	<th>Απόδοση εκπομπής η<sub>em</sub> ηλεκτρικών μονάδων</th>
	</tr>
	<tr>
	<td>Τοπικές ηλεκτρικές μονάδες σε εσωτερικό τοίχο</td>
	<td align="center">0,91</td>
	</tr>
	<tr>
	<td>Τοπικές ηλεκτρικές μονάδες σε εξωτερικό τοίχο</td>
	<td align="center">0,94</td>
	</tr>
	</table>
	<br/>
	<hr>
	<font color="red">Παράγοντας για την αποτελεσματικότητα της ακτινοβολίας f<sub>rad</sub></font>:
	<br/>
	Με βάση τον παρακάτω πίνακα για σώματα ακτινοβολίας. Στις υπόλοιπες περιπτώσεις =1.
	<table border="1">
	<tr>
	<th>Για τερματικές μονάδες θέρμανσης σε χώρους</th>
	<th>f<sub>rad</sub></th>
	</tr>
	<tr><td>με ύψος μικρότερο από 4 m</td><td>1,00</td></tr>
	<tr><td>με ύψος ίσο ή μεγαλύτερο από 4 m</td><td>0,95</td></tr>
	<tr><td>με ανακυκλοφορία αέρα για μεγάλα ύψη</td><td>1,00</td></tr>
	</table>
	<br/>
	<hr>
	<font color="red">Παράγοντας της διακοπτόμενης λειτουργίας f<sub>im</sub></font>:
	<br/>
	<table border="1">
	<tr>
	<th>Για τερματικές μονάδες θέρμανσης:</th>
	<th>f<sub>im</sub></th>
	</tr>
	<tr>
	<td>με συνεχή λειτουργία</td>
	<td align="center">1,00</td>
	</tr>
	<tr>
	<td>με διακοπτόμενη λειτουργία με 
	δυνατότητα αυτόματης ρύθμισης λειτουργίας σε επίπεδο τερματικής μονάδας</td>
	<td align="center">0,97</td>
	</tr>
	</table>
	<br/>
	<hr>
	<font color="red">Παράγοντας για την υδραυλική ισορροπία f<sub>hydr</sub></font>:
	<br/>
	<table border="1">
	<tr>
	<th>Για τερματικές μονάδες:</th>
	<th>f<sub>hydr</sub></th>
	</tr>
	<tr>
	<td>με υδραυλικά εξισορροπημένο σύστημα</td>
	<td align="center">1,00</td>
	</tr>
	<tr>
	<td>με συστήματα εκτός ισορροπίας</td>
	<td align="center">1,03</td>
	</tr>
	</table>
	<br/>
Όταν σε ένα κτήριο ή σε μια θερμική ζώνη υπάρχουν περισσότεροι του ενός τύποι τερματικών
μονάδων, τότε η συνολική απόδοση εκπομπής λαμβάνεται ως μια μέση σταθμισμένη τιμή, ανάλογα με
την απόδοση της κάθε τερματικής μονάδας και του ποσοστού συμμετοχής της στο σύνολο του
καλυπτόμενου φορτίου (από το σύνολο των τερματικών μονάδων).
Σε περίπτωση προφανών βλαβών και κακοσυντήρησης των τερματικών μονάδων (κατεστραμμένα
τμήματα, διαβρώσεις, διαρροές κ.ά.), η απόδοση των τερματικών μονάδων εκπομπής λαμβάνεται
μειωμένη κατά 10%.
	</div>
</div>
<!------------------------------------------------------------------------------------>	
	
	<h3>Βοηθητικές μονάδες - Θέρμανση</h3>
	<?php 
	$ped="kataskeyi_xsystems_thermb";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_thermb";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '35%',listClass: 'center', 
			options: {'0':'Αντλίες',
					'1':'Κυκλοφορητές',
					'2':'Ηλεκτροβάνες',
					'3':'Ανεμιστήρες'
			}
		},
		number: {title: 'Αριθμός',width: '25%',listClass: 'center'},
		isxys: {title: 'Ισχύς',width: '25%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	
	</div><!--/thermansi-->


	
	<div id="tab-psyksi" class="tabdiv"> 
	<img src="images/style/cold.png"></img>
	
	<h3>Παραγωγή - Ψύξη</h3>
	<?php 
	$ped="kataskeyi_xsystems_coldp";
	$dig="0|0|0|0|0|0|2|2|2|2|2|2|2|2|2|2|2|2|2|2|2";
	$tb_name="TableContainer_coldp";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '20%',listClass: 'center', 
			options: {'0':'Αερόψυκτος ψύκτης',
					'1':'Υδρόψυκτος ψύκτης',
					'2':'Υδρόψυκτη Α.Θ.',
					'3':'Αερόψυκτη Α.Θ.',
					'4':'Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη',
					'5':'Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη',
					'6':'Προσρόφησης απορρόφησης Α.Θ.',
					'7':'Κεντρική άλλου τύπου Α.Θ.',
					'8':'Μονάδα παραγωγής άλλου τύπου'
			}
		},
		pigienergy: {title: 'Πηγή ενέργειας',width: '20%',listClass: 'center',
			options: {'0':'Υγραέριο (LPG)',
					'1':'Φυσικό αέριο',
					'2':'Ηλεκτρισμός',
					'3':'Πετρέλαιο θέρμανσης',
					'4':'Πετρέλαιο κίνησης',
					'5':'Τηλεθέρμανση (ΔΕΗ)',
					'6':'Τηλεθέρμανση (ΑΠΕ)',
					'7':'Βιομάζα',
					'8':'Βιομάζα τυποποιημένη',
					'9':'ΣΗΘ1',
					'10':'ΣΗΘ2',
					'11':'ΣΗΘ3',
					'12':'ΣΗΘ4',
					'13':'ΣΗΘ5',
					'14':'ΣΗΘ6',
					'15':'ΣΗΘ7',
					'16':'ΣΗΘ8',
					'17':'ΣΗΘ9',
					'18':'ΣΗΘ10'}
		},
		isxys: {title: 'Ισχύς',width: '5%',listClass: 'center'},
		bathm: {title: 'Βαθμ.',width: '5%',listClass: 'center'},
		eer: {title: 'EER <a href=\"#guide_coldpeer\" onclick=help_coldpeer();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		jan: {title: 'Ιαν',width: '2%',listClass: 'center',create: false,default: '0'},
		feb: {title: 'Φεβ',width: '2%',listClass: 'center',create: false,default: '0'},
		mar: {title: 'Μαρ',width: '2%',listClass: 'center',create: false,default: '0'},
		apr: {title: 'Απρ',width: '2%',listClass: 'center',create: false,default: '0'},
		may: {title: 'Μαι',width: '2%',listClass: 'center'},
		jun: {title: 'Ιουν',width: '2%',listClass: 'center'},
		jul: {title: 'Ιουλ',width: '2%',listClass: 'center'},
		aug: {title: 'Αυγ',width: '2%',listClass: 'center'},
		sep: {title: 'Σεπ',width: '2%',listClass: 'center'},
		okt: {title: 'Οκτ',width: '2%',listClass: 'center',create: false,default: '0'},
		nov: {title: 'Νοε',width: '2%',listClass: 'center',create: false,default: '0'},
		decem: {title: 'Δεκ',width: '2%',listClass: 'center',create: false,default: '0'}
	}";
	include('includes/jtable.php');
	?>

<!--  Κρυφό div class για βοήθεια στην επιλογή cold EER ------>
<div style='display:none'>
	<div id='guide_coldpeer' style='padding:10px; background:#ebf9c9;'>
	<b>Δείκτης ενεργειακής αποδοτικότητας (EER):</b><br/>
	Η τιμή του EER προσδιορίζεται σε συγκεκριμένες συνθήκες εξωτερικού περιβάλλοντος και 
	θερμοκρασίας προσαγωγής και επιστροφής ψυκτικού μέσου. Η απόδοση των ψυκτών και αντλιών 
	θερμότητας εξαρτάται επίσης και από την πηγή θερμότητας που αξιοποιούν για τη λειτουργία τους και 
	μπορεί να είναι ο αέρας, το έδαφος, τα υπόγεια & επιφανειακά νερά, το θαλασσινό νερό, τα καυσαέρια 
	κινητήρων (π.χ. Σ.Η.Θ.), η ηλιακή ενέργεια κ.ά.
	<br/>
	<hr>
	Για τις τοπικές αερόψυκτες μονάδες αντλιών θερμότητας (διαιρούμενου ή ενιαίου τύπου), για τις 
	οποίες δεν υπάρχουν διαθέσιμα στοιχεία, ο δείκτης αποδοτικότητας EER για του υπολογισμούς της 
	ενεργειακής απόδοσης του προς επιθεώρηση κτηρίου λαμβάνεται:
	<ol>
	<li>1,5 για συστήματα 20-ετίας και</li>
	<li>2,0 για συστήματα 10-ετίας.</li>
	</ol>
	Για τις κεντρικές μονάδες ψύξης (αντλίες θερμότητας, ψύκτες κ.ά.), για τις οποίες δεν υπάρχουν
	διαθέσιμα στοιχεία, ο δείκτης αποδοτικότητας EER θα λαμβάνεται:
	<ol>
	<li>2,0 για συστήματα 20-ετίας και</li>
	<li>2,5 για συστήματα 10-ετίας.</li>
	</ol>
	</div>
</div>
<!------------------------------------------------------------------------------------>
	
	<h3>Δίκτυο διανομής - Ψύξη</h3>
	<?php 
	$ped="kataskeyi_xsystems_coldd";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_coldd";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '30%',listClass: 'center', 
			options: {'0':'Δίκτυο διανομής ψυχρού μέσου',
					'1':'Αεραγωγοί'
			}
		},
		isxys: {title: 'Ισχύς',width: '15%',listClass: 'center'},
		xwros: {title: 'Χώρος',width: '30%',listClass: 'center',
			options: {'0.00':'Εσωτερικοί ή έως 20% σε εξωτερικούς',
					'1.00':'Πάνω από 20% σε εξωτερικούς',
					}
		},
		bathm: {title: 'Βαθμ. <a href=\"#guide_colddbathm\" onclick=help_colddbathm();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		monwsi: {title: 'Μόνωση',width: '5%',listClass: 'center', 
			options: {'0':'ΟΧΙ',
					'1':'ΝΑΙ'
			}}
	}";
	include('includes/jtable.php');
	?>	

<!--  Κρυφό div class για βοήθεια στην επιλογή coldd bathm ------------------->
<div style='display:none'>
	<div id='guide_colddbathm' style='padding:10px; background:#ebf9c9;'>
	<b>Βαθμός απόδοσης δικτύου διανομής ψύξης:</b>
	<br/><br/>
	<b>Ποσοστό ψυκτικών απωλειών:</b>

	<table border="1">
	<tr><th rowspan="2" align="middle">Θερμική ή ψυκτική ισχύς δικτύου διανομής [kW]</th>
	<th colspan="4" align="middle">Διέλευση σε εσωτερικούς χώρους ή/και 20% σε εξωτερικούς χώρους</th>
	<th colspan="3" align="middle">Διέλευση > 20% σε εξωτερικούς χώρους</th>
	</tr>
	<tr>
	<th>Μόνωση κτηρίου αναφοράς [%]</th>
	<th>Μόνωση ίση με την ακτίνα σωλήνων [%]</th>
	<th>Ανεπαρκής μόνωση [%]</th>
	<th>Χωρίς μόνωση [%]</th>
	<th>Μόνωση κτηρίου αναφοράς [%]</th>
	<th>Μόνωση ίση με την ακτίνα σωλήνων [%]</th>
	<th>Χωρίς ή μενεπαρκή μόνωση [%]</th>
	</tr>
	<tr>
	<td colspan="8" align="middle">Δίκτυα διανομής ψύξης</td>
	</tr>
	<tr>
	<td>20 - 100</td>
	<td align="center">2,0</td>
	<td align="center">1,5</td>
	<td align="center">3,0</td>
	<td align="center">4,5</td>
	<td align="center">2,5</td>
	<td align="center">2,0</td>
	<td align="center">6,7</td>
	</tr>
	<tr>
	<td>100 - 200</td>
	<td align="center">1,8</td>
	<td align="center">1,4</td>
	<td align="center">2,8</td>
	<td align="center">3,6</td>
	<td align="center">2,3</td>
	<td align="center">1,9</td>
	<td align="center">5,9</td>
	</tr>
	<tr>
	<td>200 - 300</td>
	<td align="center">1,5</td>
	<td align="center">1,1</td>
	<td align="center">2,2</td>
	<td align="center">3,0</td>
	<td align="center">2,0</td>
	<td align="center">1,6</td>
	<td align="center">5,1</td>
	</tr>
	<tr>
	<td>300 - 400</td>
	<td align="center">1,2</td>
	<td align="center">0,7</td>
	<td align="center">1,8</td>
	<td align="center">2,4</td>
	<td align="center">1,5</td>
	<td align="center">1,2</td>
	<td align="center">4,5</td>
	</tr>
	<tr>
	<td>>400</td>
	<td align="center">0,7</td>
	<td align="center">0,4</td>
	<td align="center">1,1</td>
	<td align="center">2,0</td>
	<td align="center">1,0</td>
	<td align="center">0,8</td>
	<td align="center">4,0</td>
	</tr>
	<tr>	
	</table>
	<br/>
Σε περίπτωση ύπαρξης άνω του ενός δικτύων διανομής στο κτήριο ή στη θερμική ζώνη, απαιτείται
ο προσδιορισμός μίας μόνο απόδοσης δικτύου, η οποία θα είναι σταθμισμένη. Κατά συνέπεια αν
υπάρχουν άνω του ενός δίκτυα διανομής (που τροφοδοτούνται από διαφορετικές μονάδες
παραγωγής) στο κτήριο ή στη θερμική ζώνη και παρουσιάζουν διαφορετική ποιότητα και επάρκεια
(ποσότητα) θερμομόνωσης, τότε η απόδοσή τους λαμβάνεται ενιαία και ίση με αυτήν του τμήματος
που βρίσκεται στη χειρότερη ποιοτικά κατάσταση.	
	</div>
</div>
<!------------------------------------------------------------------------------------>
	
	<h3>Τερματικές μονάδες - Ψύξη</h3>
	<?php 
	$ped="kataskeyi_xsystems_coldt";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_coldt";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '70%',listClass: 'center'},
		bathm: {title: 'Βαθμ. <a href=\"#guide_coldtbathm\" onclick=help_coldtbathm();><img src=\"./images/style/help.png\"/></a>',width: '15%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>	

<!--  Κρυφό div class για βοήθεια στην επιλογή coldt bathm --------------------------->
<div style='display:none'>
	<div id='guide_coldtbathm' style='padding:10px; background:#ebf9c9;'>
	<b>Βαθμός απόδοσης τερματικών μονάδων ψύξης (n<sub>em,t</sub>):</b><br/>
	Συνήθεις τερματικές μονάδες:
	<ol>
	<li>μονάδες ανεμιστήρα-στοιχείου (fancoil)</li>
	<li>εσωτερικές μονάδες συστημάτων άμεσης εξάτμισης</li>
	<li>τερματικά στοιχεία αέρα (στόμια δικτύου αεραγωγών) </li>
	<li>ενδοδαπέδια και ενδοτοίχια συστήματα δροσισμού και</li>
	<li>ψυχόμενη οροφή</li>
	</ol>
	<br/>
	<hr>
	Υπολογίζεται ως:
	n<sub>em,t</sub>=n<sub>em</sub>/(f<sub>im</sub>×f<sub>hydr</sub>)
	<br/>
	
	<font color="red">Aπόδοση εκπομπής n<sub>em</sub></font>:
	<br/>
	<table border="1">
	<tr>
	<th>Τύπος τερματικής μονάδας</th>
	<th>Απόδοση εκπομπής n<sub>em</sub> τερματικών μονάδων ψύξης</th>
	</tr>
	<tr>
	<td>Άμεσα συστήματα: π.χ. μονάδες ανεμιστήρα στοιχείου (fan-coils), δαπέδου 
	ή οροφής, εσωτερικές μονάδες τοπικών συστημάτων άμεσης εξάτμισης, τερματικά στοιχεία 
	διανομής αέρα κ.ά.</td>
	<td>0,93</td>
	</tr>
	<tr>
	<td>Ενσωματωμένες τερματικές μονάδες: π.χ. ενδοτοίχιο, ενδοδαπέδιο, ψυχόμενες οροφές</td>
	<td>0,90</td>
	</tr>
	<tr><td>Τοπικές αντλίες θερμότητας</td><td>0,93</td></tr>
	</table>
	
	<font color="red">Παράγοντας της διακοπτόμενης λειτουργίας f<sub>im</sub></font>:
	<br/>
	<table border="1">
	<tr>
	<th>Για τερματικές μονάδες ψύξης:</th>
	<th>f<sub>im</sub></th>
	</tr>
	<tr>
	<td>με συνεχή λειτουργία</td>
	<td align="center">1,00</td>
	</tr>
	<tr>
	<td>με διακοπτόμενη λειτουργία με 
	δυνατότητα αυτόματης ρύθμισης λειτουργίας σε επίπεδο τερματικής μονάδας</td>
	<td align="center">0,97</td>
	</tr>
	</table>
	<br/>
	<hr>
	
	<font color="red">Παράγοντας για την υδραυλική ισορροπία f<sub>hydr</sub></font>:
	<br/>
	<table border="1">
	<tr>
	<th>Για τερματικές μονάδες:</th>
	<th>f<sub>hydr</sub></th>
	</tr>
	<tr>
	<td>με υδραυλικά εξισορροπημένο σύστημα</td>
	<td align="center">1,00</td>
	</tr>
	<tr>
	<td>με συστήματα εκτός ισορροπίας</td>
	<td align="center">1,03</td>
	</tr>
	</table>
	<br/>
Όταν σε ένα κτήριο ή σε θερμική ζώνη υπάρχουν περισσότεροι του ενός τύποι τερματικών
μονάδων, ως απόδοση εκπομπής λαμβάνεται μια μέση σταθμισμένη τιμή, ανάλογα με την απόδοση
κάθε τερματικής μονάδας και του ποσοστού συμμετοχής (ψυκτική ικανότητα) της στο σύνολο του
καλυπτόμενου φορτίου (των τερματικών μονάδων).
Σε περίπτωση προφανών βλαβών και κακοσυντήρησης (κατεστραμμένα τμήματα, διαβρώσεις,
διαρροές κ.ά.) των τερματικών μονάδων, η απόδοση τερματικών μονάδων εκπομπής λαμβάνεται
μειωμένη κατά 10%.
	</div>
</div>
<!------------------------------------------------------------------------------------>
	
	<h3>Βοηθητικές μονάδες - Ψύξη</h3>
	<?php 
	$ped="kataskeyi_xsystems_coldb";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_coldb";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '35%',listClass: 'center', 
			options: {'0':'Αντλίες',
					'1':'Κυκλοφορητές',
					'2':'Ηλεκτροβάνες',
					'3':'Ανεμιστήρες',
					'4':'Πύργος ψύξης'
			}
		},
		number: {title: 'Αριθμός',width: '25%',listClass: 'center'},
		isxys: {title: 'Ισχύς',width: '25%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	
	</div><!--/psyksi-->
					
					
					
					
					
	<div id="tab-znx" class="tabdiv"> 
	<img src="images/style/znx.png">
	<h3>Παραγωγή - ZNX</h3>
	<?php 
	$ped="kataskeyi_xsystems_znxp";
	$dig="0|0|0|0|0|0|2|2|2|2|2|2|2|2|2|2|2|2|2|2|2";
	$tb_name="TableContainer_znxp";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '20%',listClass: 'center', 
			options: {'0':'Λέβητας',
					'1':'Τηλεθέρμανση',
					'2':'ΣΗΘ',
					'3':'Αντλία θερμότητας (Α.Θ.)',
					'4':'Τοπικός ηλεκτρικός θερμαντήρας',
					'5':'Τοπική μονάδα φυσικού αερίου',
					'6':'Μονάδα παραγωγής (κεντρική) άλλου τύπου'
			}
		},
		pigienergy: {title: 'Πηγή ενέργειας',width: '20%',listClass: 'center',
			options: {'0':'Υγραέριο (LPG)',
					'1':'Φυσικό αέριο',
					'2':'Ηλεκτρισμός',
					'3':'Πετρέλαιο θέρμανσης',
					'4':'Πετρέλαιο κίνησης',
					'5':'Τηλεθέρμανση (ΔΕΗ)',
					'6':'Τηλεθέρμανση (ΑΠΕ)',
					'7':'Βιομάζα',
					'8':'Βιομάζα τυποποιημένη',
					'9':'ΣΗΘ1',
					'10':'ΣΗΘ2',
					'11':'ΣΗΘ3',
					'12':'ΣΗΘ4',
					'13':'ΣΗΘ5',
					'14':'ΣΗΘ6',
					'15':'ΣΗΘ7',
					'16':'ΣΗΘ8',
					'17':'ΣΗΘ9',
					'18':'ΣΗΘ10'}
		},
		isxys: {title: 'Ισχύς',width: '5%',listClass: 'center'},
		bathm: {title: 'Βαθμ.',width: '5%',listClass: 'center'},
		jan: {title: 'Ιαν',width: '2%',listClass: 'center'},
		feb: {title: 'Φεβ',width: '2%',listClass: 'center'},
		mar: {title: 'Μαρ',width: '2%',listClass: 'center'},
		apr: {title: 'Απρ',width: '2%',listClass: 'center'},
		may: {title: 'Μαι',width: '2%',listClass: 'center'},
		jun: {title: 'Ιουν',width: '2%',listClass: 'center'},
		jul: {title: 'Ιουλ',width: '2%',listClass: 'center'},
		aug: {title: 'Αυγ',width: '2%',listClass: 'center'},
		sep: {title: 'Σεπ',width: '2%',listClass: 'center'},
		okt: {title: 'Οκτ',width: '2%',listClass: 'center'},
		nov: {title: 'Νοε',width: '2%',listClass: 'center'},
		decem: {title: 'Δεκ',width: '2%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	
	
	<h3>Δίκτυο διανομής - ΖΝΧ</h3>
	<?php 
	$ped="kataskeyi_xsystems_znxd";
	$dig="0|0|0|0|0|0|2|2|0|0|0|0|0";
	$tb_name="TableContainer_znxd";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '30%',listClass: 'center'},
		anakykloforia: {title: 'Ανακυκλοφορία',width: '15%',listClass: 'center', 
			options: {'0':'ΟΧΙ',
					'1':'ΝΑΙ'
			}},
		xwros: {title: 'Χώρος',width: '30%',listClass: 'center',
			options: {'0.00':'Εσωτερικοί ή έως 20% σε εξωτερικούς',
					'1.00':'Πάνω από 20% σε εξωτερικούς',
					}
		},
		bathm: {title: 'Βαθμ. <a href=\"#guide_znxdbathm\" onclick=help_znxdbathm();><img src=\"./images/style/help.png\"/></a>',width: '15%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>	

<!--  Κρυφό div class για βοήθεια στην επιλογή znxd bathm ------------------->
<div style='display:none'>
	<div id='guide_znxdbathm' style='padding:10px; background:#ebf9c9;'>
	<b>Βαθμός απόδοσης δικτύου διανομής ZNX:</b>
	<br/><br/>
	<b>Ποσοστό ψυκτικών απωλειών:</b>

	<table border="1">
	<tr><th rowspan="2" align="middle">Ημερήσια ζήτηση Ζ.Ν.Χ. [σε lt]</th>
	<th colspan="4" align="middle">Χωρίς ανακυκλοφορία</th>
	<th colspan="3" align="middle">Με ανακυκλοφορία</th>
	</tr>
	<tr>
	<th>Μόνωση κτηρίου αναφοράς [%]</th>
	<th>Ανεπαρκής μόνωση [%]</th>
	<th>Χωρίς μόνωση [%]</th>
	<th>Μόνωση κτηρίου αναφοράς [%]</th>
	<th>Ανεπαρκής μόνωση [%]</th>
	<th>Χωρίς μόνωση [%]</th>
	</tr>
	<tr>
	<td colspan="8" align="middle">Δίκτυα διανομής ΖΝΧ</td>
	</tr>
	<tr>
	<td>50 - 200</td>
	<td align="center">8,0</td>
	<td align="center">16,0</td>
	<td align="center">28,0</td>
	<td align="center">12,8</td>
	<td align="center">25,6</td>
	<td align="center">44,8</td>
	</tr>
	<tr>
	<td>200 - 1000</td>
	<td align="center">7,7</td>
	<td align="center">15,4</td>
	<td align="center">27,0</td>
	<td align="center">12,4</td>
	<td align="center">24,8</td>
	<td align="center">43,4</td>
	</tr>
	<tr>
	<td>1000 - 4000</td>
	<td align="center">7,5</td>
	<td align="center">15,0</td>
	<td align="center">26,3</td>
	<td align="center">12,1</td>
	<td align="center">24,2</td>
	<td align="center">42,4</td>
	</tr>
	<tr>
	<td>4000 - 7000</td>
	<td align="center">7,3</td>
	<td align="center">14,6</td>
	<td align="center">25,6</td>
	<td align="center">11,8</td>
	<td align="center">23,6</td>
	<td align="center">41,3</td>
	</tr>
	<tr>
	<td>>7000</td>
	<td align="center">7,0</td>
	<td align="center">14,0</td>
	<td align="center">25,4</td>
	<td align="center">11,5</td>
	<td align="center">23,0</td>
	<td align="center">40,3</td>
	</tr>
	<tr>	
	</table>
	<br/>
Σε περίπτωση τοπικών μονάδων παραγωγής Ζ.Ν.Χ. (π.χ. σε κτήρια κατοικιών), όπου το δίκτυο
διανομής είναι μικρό, οι απώλειες δικτύου λαμβάνονται μηδενικές.<br/><br/>
Σε περίπτωση θερμικής ζώνης με περισσότερους του ενός κλάδους διανομής Ζ.Ν.Χ. και με
διαφορετικές θερμικές αποδόσεις των κλάδων, για τους υπολογισμούς λαμβάνεται υπόψη η
χαμηλότερη θερμική απόδοση μεταξύ των δύο κλάδων.<br/><br/>
Σε περίπτωση μη ύπαρξης συστήματος παραγωγής Ζ.Ν.Χ. θεωρείται ότι το κτήριο διαθέτει
σύστημα παραγωγής Ζ.Ν.Χ. όπως το κτήριο αναφοράς, με διέλευση από εσωτερικούς χώρους και
χωρίς ανακυκλοφορία. Στις χρήσεις κτηρίων κατά τις οποίες το κτήριο αναφοράς διαθέτει κεντρικό
σύστημα παραγωγής Ζ.Ν.Χ., τότε και το εξεταζόμενο κτήριο θα διαθέτει κεντρικό σύστημα παραγωγής
Ζ.Ν.Χ. και με απώλειες δικτύου διανομής, ανάλογα με την ημερήσια ζήτηση Ζ.Ν.Χ.
	</div>
</div>
<!------------------------------------------------------------------------------------>	
	
	<h3>Αποθηκευτικές μονάδες - ΖΝΧ</h3>
	<?php 
	$ped="kataskeyi_xsystems_znxa";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_znxa";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '70%',listClass: 'center'},
		bathm: {title: 'Βαθμ.',width: '15%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	
	<h3>Βοηθητικές μονάδες - ΖΝΧ</h3>
	<?php 
	$ped="kataskeyi_xsystems_znxb";
	$dig="0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_znxb";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '35%',listClass: 'center', 
			options: {'0':'Αντλίες',
					'1':'Κυκλοφορητές',
					'2':'Ηλεκτροβάνες',
					'3':'Άλλου τύπου'		
			}
		},
		number: {title: 'Αριθμός',width: '15%',listClass: 'center'},
		isxys: {title: 'Ισχύς.',width: '15%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	
	
	</div><!--/znx-->
	
	
	<div id="tab-iliakos" class="tabdiv">
	<img src="images/style/solar.png">
	<h3>Ηλιακός</h3>
	<?php 
	$ped="kataskeyi_xsystems_znxiliakos";
	$dig="0|0|0|0|0|0|0|3|3|2|2|2|2";
	$tb_name="TableContainer_znxiliakos";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '30%',listClass: 'center', 
			options: {'0':'Χωρίς κάλυμα',
					'1':'Απλός επίπεδος',
					'2':'Επιλεκτικός επίπεδος',
					'3':'Κενού',
					'4':'Συγκεντρωτικός'
			}
		},
		thermansi: {title: 'Θέρμανση <a href=\"#guide_iliakostherm\" onclick=help_iliakostherm();><img src=\"./images/style/help.png\"/></a>',width: '10%',listClass: 'center', 
			options: {'0':'ΟΧΙ',
					'1':'ΝΑΙ'
			}},
		znx: {title: 'ΖΝΧ <a href=\"#guide_iliakosznx\" onclick=help_iliakosznx();><img src=\"./images/style/help.png\"/></a>',width: '10%',listClass: 'center',
			options: {'0':'ΟΧΙ',
					'1':'ΝΑΙ',
					}
		},
		syna: {title: 'Συν. α <a href=\"#guide_syna\" onclick=help_syna();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		synb: {title: 'Συν. β <a href=\"#guide_synb\" onclick=help_synb();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		epifaneia: {title: 'Επιφάνεια',width: '10%',listClass: 'center'},
		gdeg: {title: 'γ (deg) <a href=\"#guide_gdeg\" onclick=help_gdeg();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		bdeg: {title: 'β (deg) <a href=\"#guide_bdeg\" onclick=help_bdeg();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		fs: {title: 'F_s <a href=\"#guide_fs\" onclick=help_fs();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	

<!--  Κρυφό div class για βοήθεια στην επιλογή iliakoy thermansi ------>
<div style='display:none'>
	<div id='guide_iliakostherm' style='padding:10px; background:#ebf9c9;'>
	<b>Χρήση ηλιακού συλλέκτη για θέρμανση:</b><br/>
	
	<br/>
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή iliakoy ZNX ------>
<div style='display:none'>
	<div id='guide_iliakosznx' style='padding:10px; background:#ebf9c9;'>
	<b>Χρήση ηλιακού συλλέκτη για ΖΝΧ:</b><br/>
	
	<br/>
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή syna ------>
<div style='display:none'>
	<div id='guide_syna' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής αξιοποίησης ηλιακής ακτινοβολίας για ΖΝΧ:</b><br/>
	<hr>
	Το ποσοστό αξιοποίησης της ηλιακής ακτινοβολίας, ορίζεται ως το ποσοστό της προσπίπτουσας 
	ηλιακής ακτινοβολίας στο συλλέκτη που μετατρέπεται σε θερμική και αξιοποιείται τελικά για την 
	παραγωγή ζεστού νερού χρήσης ή για τη θέρμανση χώρων, δηλαδή είναι η μέση ετήσια απόδοση του 
	ηλιακού συλλέκτη. Η μέση ετήσια απόδοση μιας εγκατάστασης ηλιακών συλλεκτών εξαρτάται από:
	<ol>
	<li>τον τύπο των ηλιακών συλλεκτών (απλοί επίπεδοι, επίπεδοι με επιλεκτική επιφάνεια, 
	συλλέκτες κενού κ.ά.) και τα τεχνικά χαρακτηριστικά που δίνει ο κατασκευαστής,</li>
	<li>τη χρήση των ηλιακών συλλεκτών: ζεστού νερού χρήσης ή/και θέρμανσης χώρων κ.ά.,</li>
	<li>τις απώλειες εγκατάστασης λόγω παλαιότητας, φθοράς, κακής συντήρησης κ.ά.</li>
	</ol>
	<br/>
	Σε περίπτωση που δεν υπάρχει μελέτη διαστασιολόγησης (σχεδιασμού) του συστήματος ηλιακών 
	συλλεκτών, όπως σε υφιστάμενα κτήρια, από την οποία να προκύπτει το ποσοστό αξιοποίησης 
	ηλιακής ακτινοβολίας για παραγωγή ζεστού νερού χρήσης λαμβάνονται οι τιμές των πινάκων 5.8. 
	και 5.9 της ΤΟΤΕΕ-1. Ο πίνακας 5.8. δίνει το συντελεστή εκμετάλλευσης (αξιοποίησης) ηλιακής ακτινοβολίας 
	για εφαρμογές σε κτήρια του οικιακού τομέα και ο πίνακας 5.9. το συντελεστή εκμετάλλευσης 
	ηλιακής ακτινοβολίας για εφαρμογές σε κτήρια του τριτογενούς τομέα (ξενοδοχεία κ.ά.):
	<br/><br/>
	Πίνακας 5.8.Συντελεστής αξιοποίησης ηλιακής ακτινοβολίας για παραγωγή ζεστού νερού χρήσης 
	σε κατοικίες.
	<table border="1">
	<tr>
	<th rowspan="4">Πόλεις της Ελλάδας</th>
	<th colspan="9">Τύπος ηλιακού συλλέκτη</th>
	</tr>
	<tr>
	<th colspan="3">Απλός</th>
	<th colspan="3">Επιλεκτικός</th>
	<th colspan="3">Κενού</th>
	</tr>
	<tr>
	<th colspan="9">Γωνία κλίσης εγκατάστασης ηλιακών συλλεκτών</th>
	</tr>
	<tr>
	<th>15<sup>o</sup></th><th>45<sup>o</sup></th><th>65<sup>o</sup></th>
	<th>15<sup>o</sup></th><th>45<sup>o</sup></th><th>65<sup>o</sup></th>
	<th>15<sup>o</sup></th><th>45<sup>o</sup></th><th>65<sup>o</sup></th>
	</tr>
	<tr>
	<td>Αλεξανδρούπολη</td>
	<td>0,318</td><td>0,325</td><td>0,329</td>
	<td>0,341</td><td>0,353</td><td>0,350</td>
	<td>0,360</td><td>0,367</td><td>0,369</td>
	</tr>
	<tr>
	<td>Αθήνα</td>
	<td>0,338</td><td>0,344</td><td>0,351</td>
	<td>0,359</td><td>0,369</td><td>0,369</td>
	<td>0,374</td><td>0,381</td><td>0,383</td>
	</tr>
	<tr>
	<td>Ηράκλειο</td>
	<td>0,333</td><td>0,339</td><td>0,343</td>
	<td>0,355</td><td>0,364</td><td>0,361</td>
	<td>0,370</td><td>0,375</td><td>0,378</td>
	</tr>
	<tr>
	<td>Καστοριά</td>
	<td>0,307</td><td>0,314</td><td>0,316</td>
	<td>0,333</td><td>0,344</td><td>0,340</td>
	<td>0,356</td><td>0,363</td><td>0,363</td>
	</tr>
	<tr>
	<td>Λάρισα</td>
	<td>0,327</td><td>0,334</td><td>0,343</td>
	<td>0,350</td><td>0,360</td><td>0,360</td>
	<td>0,369</td><td>0,376</td><td>0,378</td>
	</tr>
	<tr>
	<td>Λήμνος</td>
	<td>0,319</td><td>0,327</td><td>0,331</td>
	<td>0,343</td><td>0,354</td><td>0,352</td>
	<td>0,360</td><td>0,368</td><td>0,370</td>
	</tr>
	<tr>
	<td>Νάξος</td>
	<td>0,332</td><td>0,340</td><td>0,344</td>
	<td>0,355</td><td>0,365</td><td>0,363</td>
	<td>0,372</td><td>0,378</td><td>0,381</td>
	</tr>
	<tr>
	<td>Πάτρα</td>
	<td>0,335</td><td>0,342</td><td>0,348</td>
	<td>0,357</td><td>0,366</td><td>0,366</td>
	<td>0,373</td><td>0,381</td><td>0,382</td>
	</tr>
	<tr>
	<td>Θεσσαλονίκη</td>
	<td>0,325</td><td>0,332</td><td>0,337</td>
	<td>0,348</td><td>0,358</td><td>0,358</td>
	<td>0,368</td><td>0,375</td><td>0,376</td>
	</tr>
	<tr>
	<td>Τρίπολη</td>
	<td>0,317</td><td>0,324</td><td>0,327</td>
	<td>0,340</td><td>0,349</td><td>0,347</td>
	<td>0,363</td><td>0,369</td><td>0,370</td>
	</tr>
	<tr>
	<td>Μ.Ο.</td>
	<td>0,325</td><td>0,332</td><td>0,337</td>
	<td>0,348</td><td>0,358</td><td>0,357</td>
	<td>0,366</td><td>0,373</td><td>0,375</td>
	</tr>
	</table>
	<br/><br/>
	Πίνακας 5.9.Συντελεστής αξιοποίησης ηλιακής ακτινοβολίας για παραγωγή ζεστού νερού χρήσης 
	σε κτήρια του τριτογενούς τομέα.
	<table border="1">
	<tr>
	<th rowspan="4">Πόλεις της Ελλάδας</th>
	<th colspan="9">Τύπος ηλιακού συλλέκτη</th>
	</tr>
	<tr>
	<th colspan="3">Απλός</th>
	<th colspan="3">Επιλεκτικός</th>
	<th colspan="3">Κενού</th>
	</tr>
	<tr>
	<th colspan="9">Γωνία κλίσης εγκατάστασης ηλιακών συλλεκτών</th>
	</tr>
	<tr>
	<th>15<sup>o</sup></th><th>45<sup>o</sup></th><th>65<sup>o</sup></th>
	<th>15<sup>o</sup></th><th>45<sup>o</sup></th><th>65<sup>o</sup></th>
	<th>15<sup>o</sup></th><th>45<sup>o</sup></th><th>65<sup>o</sup></th>
	</tr>
	<tr>
	<td>Αλεξανδρούπολη</td>
	<td>0,312</td><td>0,316</td><td>0,325</td>
	<td>0,327</td><td>0,333</td><td>0,339</td>
	<td>0,337</td><td>0,341</td><td>0,351</td>
	</tr>
	<tr>
	<td>Αθήνα</td>
	<td>0,324</td><td>0,324</td><td>0,334</td>
	<td>0,338</td><td>0,338</td><td>0,344</td>
	<td>0,349</td><td>0,348</td><td>0,355</td>
	</tr>
	<tr>
	<td>Ηράκλειο</td>
	<td>0,304</td><td>0,299</td><td>0,308</td>
	<td>0,315</td><td>0,308</td><td>0,313</td>
	<td>0,321</td><td>0,317</td><td>0,325</td>
	</tr>
	<tr>
	<td>Καστοριά</td>
	<td>0,308</td><td>0,309</td><td>0,314</td>
	<td>0,325</td><td>0,327</td><td>0,328</td>
	<td>0,337</td><td>0,336</td><td>0,341</td>
	</tr>
	<tr>
	<td>Λάρισα</td>
	<td>0,328</td><td>0,334</td><td>0,346</td>
	<td>0,343</td><td>0,352</td><td>0,360</td>
	<td>0,356</td><td>0,364</td><td>0,372</td>
	</tr>
	<tr>
	<td>Λήμνος</td>
	<td>0,307</td><td>0,309</td><td>0,320</td>
	<td>0,320</td><td>0,323</td><td>0,330</td>
	<td>0,325</td><td>0,331</td><td>0,342</td>
	</tr>
	<tr>
	<td>Νάξος</td>
	<td>0,314</td><td>0,316</td><td>0,326</td>
	<td>0,329</td><td>0,330</td><td>0,336</td>
	<td>0,341</td><td>0,343</td><td>0,352</td>
	</tr>
	<tr>
	<td>Πάτρα</td>
	<td>0,325</td><td>0,330</td><td>0,342</td>
	<td>0,340</td><td>0,347</td><td>0,354</td>
	<td>0,351</td><td>0,359</td><td>0,369</td>
	</tr>
	<tr>
	<td>Θεσσαλονίκη</td>
	<td>0,323</td><td>0,329</td><td>0,339</td>
	<td>0,339</td><td>0,347</td><td>0,353</td>
	<td>0,352</td><td>0,358</td><td>0,365</td>
	</tr>
	<tr>
	<td>Τρίπολη</td>
	<td>0,315</td><td>0,318</td><td>0,325</td>
	<td>0,330</td><td>0,334</td><td>0,336</td>
	<td>0,343</td><td>0,345</td><td>0,350</td>
	</tr>
	<tr>
	<td>Μ.Ο.</td>
	<td>0,316</td><td>0,318</td><td>0,328</td>
	<td>0,331</td><td>0,334</td><td>0,339</td>
	<td>0,341</td><td>0,344</td><td>0,352</td>
	</tr>
	</table>
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή synb ------>
<div style='display:none'>
	<div id='guide_synb' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής αξιοποίησης ηλιακής ακτινοβολίας για θέρμανση χώρων:</b><br/>
	
	<br/>
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή gdeg ------>
<div style='display:none'>
	<div id='guide_gdeg' style='padding:10px; background:#ebf9c9;'>
	<b>γ (μοίρες):</b><br/>
	Προσανατολισμός του ηλιακού συλλέκτη ως προς το Βορρά.
	<br/>
	0 -> Βόρεια
	<br/>
	90 -> Ανατολικά
	<br/>
	180 -> Νότια
	<br/>
	270 -> Δυτικά
	<br/>
	<img src="images/style/gdeg.png">
	<font color="green">Ο βέλτιστος προσανατολισμός για τους ηλιακούς συλλέκτες είναι ο νότιος με μικρή απόκλιση ±5<sup>ο</sup>.</font>
	</div>
</div>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή bdeg ------>
<div style='display:none'>
	<div id='guide_bdeg' style='padding:10px; background:#ebf9c9;'>
	<b>β (μοίρες):</b><br/>
	Κλίση των ηλιακών συλλεκτών ως προς το επίπεδο.
	<br/>
	90<sup>ο</sup> -> Κάθετη τοποθέτηση<br/>
	0<sup>ο</sup> -> Οριζόντια τοποθέτηση<br/>
	<br/>
	Η βέλτιστη κλίση εγκατάστασης των ηλιακών συλλεκτών εξαρτάται από μια σειρά παραμέτρων με
	βασικότερες την εποχική χρήση και την τοποθεσία (γεωγραφικό πλάτος). Για την Ελλάδα ενδεικτικές
	τιμές είναι οι εξής:
	<ol>
	<li>για ετήσια χρήση β = γεωγραφικό πλάτος +/- 5ο,</li>
	<li>για χειμερινή χρήση β = γεωγραφικό πλάτος + 15ο,</li>
	<li>για θερινή χρήση β = γεωγραφικό πλάτος - 20ο.</li>
	</ol>
	<img src="images/style/bdeg.png">
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή fs ------>
<div style='display:none'>
	<div id='guide_fs' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής σκίασης ηλιακού συλλέκτη:</b><br/>
	Ο συντελεστής σκίασης είναι διορθωτικός συντελεστής για τη μείωση της ηλιακής ακτινοβολίας,
	λόγω της σκίασης που προκαλείται από το περιβάλλοντα χώρο στην επιφάνεια των ηλιακών
	συλλεκτών.
	<br/>
	Τιμές από 0 εως 1.
	<br/>
	0 -> Πλήρως σκιασμένος
	<br/>
	1 -> Χωρίς σκίαση
	</div>
</div>
<!------------------------------------------------------------------------------------>
	
	
	</div><!--Ηλιακός-->
	
	
	<div id="tab-light" class="tabdiv"> 
	<img src="images/style/light.png"></img>
	<h3>Φωτισμός (3<sub>γενής</sub> τομέας)</h3>
	<?php 
	$ped="kataskeyi_xsystems_light";
	$dig="0|0|0|0|2|2|0|0|0|0|0";
	$tb_name="TableContainer_light";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		isxys: {title: 'Ισχύς (kW) <a href=\"#guide_lightisxys\" onclick=help_lightisxys();><img src=\"./images/style/help.png\"/></a>',width: '7%',listClass: 'center'},
		perioxi: {title: 'Περιοχή ΦΦ(%) <a href=\"#guide_lightperioxi\" onclick=help_lightperioxi();><img src=\"./images/style/help.png\"/></a>',width: '10%',listClass: 'center'},
		ayt_elegxoy: {title: 'Αυτοματισμοί ελέγχου ΦΦ ',width: '13%',listClass: 'center',
			options: {'0':'1.Αυτόματος',
					'1':'2.Χειροκίνητος',
					}
		},
		ayt_kinisis: {title: 'Αυτοματισμοί ανίχνευσης κίνησης ',width: '20%',listClass: 'center',
			options: {'0':'1.Χειροκίνητος διακόπτης (αφής/σβέσης)',
					'1':'2.Χειροκίνητος διακόπτης (αφής/σβέσης) και αισθητήρας παρουσίας',
					'2':'3.Ανίχνευση με αυτόματη έναυση / ρύθμιση φωτεινής ροής (dimming)',
					'3':'4.Ανίχνευση με αυτόματo έναυση και σβέση',
					'4':'5.Ανίχνευση με χειροκίνητη έναυση / ρύθμιση φωτεινής ροής (dimming)',
					'5':'5.Ανίχνευση με χειροκίνητη έναυση / αυτόματη σβέση'
					}
		},
		thermotita: {title: 'Σύστημα απομάκρυνσης θερμότητας <a href=\"#guide_lightthermotita\" onclick=help_lightthermotita();><img src=\"./images/style/help.png\"/></a>',width: '15%',listClass: 'center',
			options: {'0':'ΟΧΙ',
					'1':'ΝΑΙ',
					}
		},
		asfaleia: {title: 'Φωτισμός ασφαλείας <a href=\"#guide_lightasfaleia\" onclick=help_lightasfaleia();><img src=\"./images/style/help.png\"/></a>',width: '10%',listClass: 'center',
			options: {'0':'ΟΧΙ',
					'1':'ΝΑΙ',
					}
		},
		efedreia: {title: 'Σύστημα εφεδρείας <a href=\"#guide_lightefedreia\" onclick=help_lightefedreia();><img src=\"./images/style/help.png\"/></a>',width: '10%',listClass: 'center',
			options: {'0':'ΟΧΙ',
					'1':'ΝΑΙ',
					}
		}
	}";
	include('includes/jtable.php');
	?>
	
<!--  Κρυφό div class για βοήθεια στην επιλογή light isxys -------------------------->
<div style='display:none'>
	<div id='guide_lightisxys' style='padding:10px; background:#ebf9c9;'>
	<b>Εγκατεστημένη ισχύς φωτισμού:</b>
	<br/>
	Η συνολική εγκατεστημένη ισχύς για φωτισμό [W] σε μια θερμική ζώνη υπολογίζεται από τον τύπο των 
	συστημάτων φωτισμού που είναι εγκατεστημένα και την καταγραφή του αριθμού φωτιστικών, των λαμπτήρων 
	και των στραγγαλιστικών πηνίων.
	<br/>
	Τυπικές τιμές πυκνότητας ισχύος φωτισμού ανά 100lux, για επιθεώρηση κτηρίων.
	<table border="1">
	<tr>
	<th>Φωτιστικά με λαμπτήρες</th><th>Πυκνότητα ισχύος ανά 100 lx [W/m<sup>2</sup>/100lx]</th>
	</tr>
	<tr>
	<td>Πυράκτωσης</td><td>27,0</td>
	</tr>
	<tr>
	<td>Αλογόνου</td><td>16,6</td>
	</tr>
	<tr>
	<td>Υδραργύρου</td><td>7,0</td>
	</tr>
	<tr>
	<td>Υψηλής πίεσης νατρίου</td><td>4,2</td>
	</tr>
	<tr>
	<td>Συμπαγής φθορισμού (συμπεριλαμβανομένου του στραγγαλιστικού 
	πηνίου (ballast))</td><td>4,5</td>
	</tr>
	<tr>
	<td>Γραμμικός φθορισμού Τ8 (halophospate συμπεριλαμβανομένου του 
	μαγνητικού στραγγαλιστικού πηνίου (ballast))</td><td>4,2</td>
	</tr>
	<tr>
	<td>Γραμμικός φθορισμού Τ8 (triphosphor συμπεριλαμβανομένου 
	του ηλεκτρονικού ballast)</td><td>3,4</td>
	</tr>
	<tr>
	<td>Γραμμικός φθορισμού Τ5 (συμπεριλαμβανομένου του στραγγαλιστικού 
	πηνίου (ballast))</td><td>3,2</td>
	</tr>
	<tr>
	<td>Αλογονιδίων μετάλλων (συμπεριλαμβανομένου του στραγγαλιστικού 
	πηνίου (ballast))</td><td>5,2</td>
	</tr>
	</table>
	</div>
</div>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή light perioxi -------------------------->
<div style='display:none'>
	<div id='guide_lightperioxi' style='padding:10px; background:#ebf9c9;'>
	<b>Περιοχές φυσικού φωτισμού:</b>
	<br/>
	<hr>
	<font color="red">Ανοίγματα</font>
	<br/><br/>
	Βάθος περιοχής φωτισμού: L<sub>ΖΦΦ</sub>=2,5 x h<sub>ΖΦΦ</sub>=2,5 x (h<sub>Π</sub>-h<sub>ΕΕ</sub>)<br/>
	Με:
	<ol>
	<li>h<sub>Π</sub>: ύψος πρεκιού ανοίγματος</li>
	<li>h<sub>ΕΕ</sub>: Ύψος επιφάνειας εργασίας</li>
	<li>L<sub>ΖΦΦ</sub>: Βάθος ζώνης φωτισμού</li>
	</ol>
	<br/><br/>
	Πλάτος περιοχής φωτισμού: W<sub>ΖΦΦ</sub>=W<sub>Π</sub> + 0,5 x L<sub>ΖΦΦ</sub><br/>
	Με:
	<ol>
	<li>L<sub>ΖΦΦ</sub>: Βάθος ζώνης φωτισμού</li>
	<li>W<sub>Π</sub>: Πλάτος παραθύρου</li>
	<li>W<sub>ΖΦΦ</sub>: Πλάτος ζώνης φωτισμού</li>
	</ol>
	<br/>
	<table border="1">
	<tr><td>Ύψος επιφάνειας εργασίας h<sub>ΕΕ</sub></td>
	<td>Πρέκι h<sub>Π</sub></td>
	<td>Πλάτος παραθύρου W<sub>Π</sub></td>
	<td>Βάθος ζώνης φωτισμού L<sub>ΖΦΦ</sub></td>
	<td>Πλάτος ζώνης φωτισμού W<sub>ΖΦΦ</sub></td></tr>
	<tr>
	<td><input type="text" id="light_an_height" onkeyup="calc_lightan();"></td>
	<td><input type="text" id="light_an_preki" onkeyup="calc_lightan();"></td>
	<td><input type="text" id="light_an_platos" onkeyup="calc_lightan();"></td>
	<td><input type="text" id="light_anff_vathos" disabled="disabled"></td>
	<td><input type="text" id="light_anff_platos" disabled="disabled"></td>
	</tr>
	</table>
	<br/>
	<img src="images/style/light_platos.png">
	<br/>
	<hr>
	<font color="red">Ανοίγματα οροφής</font>
	<br/>
	Η περιοχή φυσικού φωτισμού από τα ανοίγματα οροφής υπολογίζεται ανάλογα το πλάτος του
	ανοίγματος W<sub>ΑΟ</sub>, το ύψος του χώρου h<sub>K</sub> και το ύψος της επιφάνειας 
	εργασίας h<sub>EE</sub>.
	<br/>
	Η περιοχή που μπορεί να καλυφθεί με φυσικό φωτισμό από ένα άνοιγμα οροφής ορίζεται 
	περιμετρικά με την ευθεία που ξεκινάει από το άνοιγμα οροφής και προσπίπτει επάνω στην 
	επιφάνεια εργασίας (με ύψος h<sub>EE</sub>) με κλίση 30<sup>o</sup>. Για ένα κυκλικό άνοιγμα, η περιοχή στο 
	επίπεδο επιφάνειας εργασίας που καλύπτει το άνοιγμα οροφής θα αντιστοιχεί σε μια κυκλική 
	περιοχή με διάμετρο D<sub>ΖΦΦ</sub> όπως υπολογίζεται από τη σχέση:
	<br/>
	D<sub>ΖΦΦ</sub>=W<sub>ΑΟ</sub> + 2 x (h<sub>K</sub> - h<sub>EE</sub>) x εφ(30<sup>o</sup>)
	<br/>
	<table border="1">
	<tr><td>Ύψος επιφάνειας εργασίας h<sub>ΕΕ</sub></td>
	<td>Ύψος οροφής h<sub>k</sub></td>
	<td>Πλάτος ανοίγματος W<sub>ΑΟ</sub></td>
	<td>Διάμετρος ζώνης φωτισμού D<sub>ΖΦΦ</sub></td>
	<tr>
	<td><input type="text" id="light_or_height" onkeyup="calc_lightor();"></td>
	<td><input type="text" id="light_or_orofi" onkeyup="calc_lightor();"></td>
	<td><input type="text" id="light_or_platos" onkeyup="calc_lightor();"></td>
	<td><input type="text" id="light_orff_d" disabled="disabled"></td>
	</tr>
	</table>
	<br/>
	<img src="images/style/light_orofis.png">
	</div>
</div>
<!------------------------------------------------------------------------------------>		
<!--  Κρυφό div class για βοήθεια στην επιλογή light thermotita -------------------------->
<div style='display:none'>
	<div id='guide_lightthermotita' style='padding:10px; background:#ebf9c9;'>
	<b>Σύστημα απομάκρυνσης θερμότητας:</b>
	<br/>
	<hr>
Η θερμότητα φωτισμού που παραμένει στη ζώνη είναι το ποσοστό της θερμότητας που
εκπέμπεται από το σύστημα φωτισμού, το οποίο δεν απομακρύνεται άμεσα μέσω συστήματος
τεχνητού εξαερισμού. Όταν απομακρύνεται όλη η θερμότητα από το χώρο, ο συντελεστής παίρνει τιμή
ίση με το μηδέν (0), ενώ όταν δεν προβλέπεται καμία απομάκρυνση της θερμότητας από τη ζώνη ο
συντελεστής ισούται με τη μονάδα (1). Σε περίπτωση ύπαρξης συστήματος απομάκρυνσης της
θερμότητας που εκλύεται από τα φωτιστικά, για τους υπολογισμούς λαμβάνεται τιμή ίση με 0,4.	
	</div>
</div>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή light asfaleia -------------------------->
<div style='display:none'>
	<div id='guide_lightasfaleia' style='padding:10px; background:#ebf9c9;'>
	<b>Φωτισμός ασφαλείας:</b>
	<br/>
	<hr>
Ο δείκτης ύπαρξης συστήματος φωτισμού ασφαλείας είναι μια τυπική τιμή κατανάλωσης
ενέργειας. Σε περίπτωση ύπαρξης συστήματος φωτισμού ασφαλείας και σύμφωνα με το πρότυπο
ΕΛΟΤ ΕΝ 15193:2008, λαμβάνεται για τους υπολογισμούς τιμή ίση με 1 kWh/(m2.έτος). Το κτήριο
αναφοράς διαθέτει σύστημα ασφαλείας φωτισμού.	
	</div>
</div>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή light efedreia -------------------------->
<div style='display:none'>
	<div id='guide_lightefedreia' style='padding:10px; background:#ebf9c9;'>
	<b>Εφεδρικό σύστημα για φωτισμό:</b>
	<br/>
	<hr>
Ο δείκτης ύπαρξης εφεδρικού συστήματος για φωτισμό, είναι μια τυπική τιμή κατανάλωσης
ενέργειας. Σε περίπτωση ύπαρξης συστήματος φωτισμού εφεδρείας και σύμφωνα με το πρότυπο
ΕΛΟΤ ΕΝ 15193:2008, λαμβάνεται για τους υπολογισμούς τιμή ίση με 5 kWh/(m2.έτος). Το κτήριο
αναφοράς για τα κτήρια υγείας και κοινωνικής πρόνοιας καθώς και προσωρινής διαμονής διαθέτει
σύστημα εφεδρείας.	
	</div>
</div>
<!------------------------------------------------------------------------------------>	


	</div><!--φωτισμός-->
	
	<div id="tab-kkm" class="tabdiv"> <!--ΚΚΜ-->
	<img src="images/style/kkm.png"></img>
	<h3>Μηχανικός αερισμός</h3>
	<?php 
	$ped="kataskeyi_xsystems_kkm";
	$dig="0|0|0|0|0|0|2|2|2|0|2|2|2|0|2|0|2";
	$tb_name="TableContainer_kkm";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '10%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '16%',listClass: 'center'},
		tm_ther: {title: 'Τμήμα θέρμανσης',width: '7%',listClass: 'center',
			options: {'0':'OXI',
					'1':'NAI',
					}
		},
		F_h: {title: 'F_h (m<sup>3</sup>/h) <a href=\"#guide_kkm_fh\" onclick=help_kkm_fh();><img src=\"./images/style/help.png\"/></a>',width: '7%',listClass: 'center'},
		R_h: {title: 'R_h <a href=\"#guide_kkm_rh\" onclick=help_kkm_rh();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		Q_r_h: {title: 'Q_r_h <a href=\"#guide_kkm_qrh\" onclick=help_kkm_qrh();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		tm_psyx: {title: 'Τμήμα ψύξης',width: '7%',listClass: 'center',
			options: {'0':'OXI',
					'1':'NAI',
					}
		},
		F_c: {title: 'F_c (m<sup>3</sup>/h) <a href=\"#guide_kkm_fc\" onclick=help_kkm_fc();><img src=\"./images/style/help.png\"/></a>',width: '7%',listClass: 'center'},
		R_c: {title: 'R_c <a href=\"#guide_kkm_rc\" onclick=help_kkm_rc();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		Q_r_c: {title: 'Q_r_c <a href=\"#guide_kkm_qrc\" onclick=help_kkm_qrc();><img src=\"./images/style/help.png\"/></a>',width: '5%',listClass: 'center'},
		tm_ygr: {title: 'Τμήμα Ύγρανσης',width: '5%',listClass: 'center',
			options: {'0':'OXI',
					'1':'NAI',
					}
		},
		H_r: {title: 'H_r <a href=\"#guide_kkm_hr\" onclick=help_kkm_hr();><img src=\"./images/style/help.png\"/></a>',width: '6%',listClass: 'center'},
		filters: {title: 'Φίλτρα',width: '5%',listClass: 'center',
			options: {'0':'OXI',
					'1':'NAI',
					}
		},
		E_vent: {title: 'E_vent (kW/m<sup>3</sup>/s)<a href=\"#guide_kkm_event\" onclick=help_kkm_event();><img src=\"./images/style/help.png\"/></a>',width: '20%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	</div><!--ΚΚΜ-->
	
<!--  Κρυφό div class για βοήθεια στην επιλογή kkm_fh -------------------------->
<div style='display:none'>
	<div id='guide_kkm_fh' style='padding:10px; background:#ebf9c9;'>
	<b>Παροχή αέρα-Τμήμα Θέρμανσης:</b>
	<br/>
	<hr>
	
	</div>
</div>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή kkm_rh -------------------------->
<div style='display:none'>
	<div id='guide_kkm_rh' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής ανακυκλοφορίας αέρα-Τμήμα Θέρμανσης:</b>
	<br/>
	<hr>
	
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή kkm_qrh -------------------------->
<div style='display:none'>
	<div id='guide_kkm_qrh' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής ανάκτησης θερμότητας-Τμήμα Θέρμανσης:</b>
	<br/>
	<hr>
	
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή kkm_fc -------------------------->
<div style='display:none'>
	<div id='guide_kkm_fc' style='padding:10px; background:#ebf9c9;'>
	<b>Παροχή αέρα-Τμήμα Ψύξης:</b>
	<br/>
	<hr>
	
	</div>
</div>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή kkm_rc -------------------------->
<div style='display:none'>
	<div id='guide_kkm_rc' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής ανακυκλοφορίας αέρα-Τμήμα Ψύξης:</b>
	<br/>
	<hr>
	
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή kkm_qrc -------------------------->
<div style='display:none'>
	<div id='guide_kkm_qrc' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής ανάκτησης θερμότητας-Τμήμα Ψύξης:</b>
	<br/>
	<hr>
	
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή kkm_hr -------------------------->
<div style='display:none'>
	<div id='guide_kkm_hr' style='padding:10px; background:#ebf9c9;'>
	<b>Συντελεστής ανάκτησης υγρασίας-Τμήμα Ύγρανσης:</b>
	<br/>
	<hr>
	
	</div>
</div>
<!------------------------------------------------------------------------------------>
<!--  Κρυφό div class για βοήθεια στην επιλογή kkm_event -------------------------->
<div style='display:none'>
	<div id='guide_kkm_event' style='padding:10px; background:#ebf9c9;'>
	<b>Ειδική ηλεκτρική ισχύς:</b>
	<br/>
	<hr>
	
	</div>
</div>
<!------------------------------------------------------------------------------------>
	
	<div id="tab-ygransi" class="tabdiv"> <!--Ύγρανση-->
	<img src="images/style/ygransi.png"></img>
	<h3>Παραγωγή - Ύγρανση</h3>
	<?php 
	$ped="kataskeyi_xsystems_ygrp";
	$dig="0|0|0|0|0|0|2|2|0|0|0|0|0|0|0|0|0|0|0|0";
	$tb_name="TableContainer_ygrp";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '21%',listClass: 'center', 
			options: {'0':'Ατμολέβητας κεντρικής παροχής',
					'1':'Τοπική μονάδα ψεκασμού',
					'2':'Τοπική μονάδα παραγωγής ατμού',
					'3':'Τοπική μονάδα άλλου τύπου'
			}
		},
		pigienergy: {title: 'Πηγή ενέργειας',width: '25%',listClass: 'center',
			options: {'0':'Υγραέριο (LPG)',
					'1':'Φυσικό αέριο',
					'2':'Ηλεκτρισμός',
					'3':'Πετρέλαιο θέρμανσης',
					'4':'Πετρέλαιο κίνησης',
					'5':'Τηλεθέρμανση (ΔΕΗ)',
					'6':'Τηλεθέρμανση (ΑΠΕ)',
					'7':'Βιομάζα',
					'8':'Βιομάζα τυποποιημένη',
					'9':'ΣΗΘ1',
					'10':'ΣΗΘ2',
					'11':'ΣΗΘ3',
					'12':'ΣΗΘ4',
					'13':'ΣΗΘ5',
					'14':'ΣΗΘ6',
					'15':'ΣΗΘ7',
					'16':'ΣΗΘ8',
					'17':'ΣΗΘ9',
					'18':'ΣΗΘ10'}
		},
		isxys: {title: 'Ισχύς',width: '5%',listClass: 'center'},
		bathm: {title: 'Βαθμ.',width: '5%',listClass: 'center'},
		jan: {title: 'Ιαν',width: '2%',listClass: 'center'},
		feb: {title: 'Φεβ',width: '2%',listClass: 'center'},
		mar: {title: 'Μαρ',width: '2%',listClass: 'center'},
		apr: {title: 'Απρ',width: '2%',listClass: 'center'},
		may: {title: 'Μαι',width: '2%',listClass: 'center'},
		jun: {title: 'Ιουν',width: '2%',listClass: 'center'},
		jul: {title: 'Ιουλ',width: '2%',listClass: 'center'},
		aug: {title: 'Αυγ',width: '2%',listClass: 'center'},
		sep: {title: 'Σεπ',width: '2%',listClass: 'center'},
		okt: {title: 'Οκτ',width: '2%',listClass: 'center'},
		nov: {title: 'Νοε',width: '2%',listClass: 'center'},
		decem: {title: 'Δεκ',width: '2%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	
	<h3>Δίκτυο διανομής - Ύγρανση</h3>
	<?php 
	$ped="kataskeyi_xsystems_ygrd";
	$dig="0|0|0|0|0|0|2";
	$tb_name="TableContainer_ygrd";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '20%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '30%',listClass: 'center'},
		xwros: {title: 'Χώρος',width: '30%',listClass: 'center',
			options: {'0':'Εσωτερικοί ή έως 20% σε εξωτερικούς',
					'1':'Πάνω από 20% σε εξωτερικούς',
					}
		},
		bathm: {title: 'Βαθμ.',width: '20%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>	
	
	<h3>Σύστημα διοχέτευσης - Ύγρανση</h3>
	<?php 
	$ped="kataskeyi_xsystems_ygrt";
	$dig="0|0|0|0|0|2|2|2|0|0|0|0|0";
	$tb_name="TableContainer_ygrt";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '15%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος',width: '70%',listClass: 'center'},
		bathm: {title: 'Βαθμ.',width: '15%',listClass: 'center'}
	}";
	include('includes/jtable.php');
	?>
	
	</div><!--Ύγρανση-->

</div>
<!------------------------------------------------------------------------------------>	

<?php } ?>