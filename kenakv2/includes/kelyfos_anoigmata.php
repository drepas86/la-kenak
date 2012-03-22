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

//πρόσθεση του πίνακα domika_anoigmata που πιθανόν λείπει, για αποθήκευση δομικών στοιχείων δαπέδων και οροφών.
if(add_new_table("domika_anoigmata")){
	add_column_if_not_exist("domika_anoigmata", "name", "VARCHAR(100)");
	add_column_if_not_exist("domika_anoigmata", "rec", "VARCHAR(300)");
}

$p="";
$call="";
if (isset($_GET['p'])) $p=$_GET['p'];
if (isset($_GET['lib'])) {
$call=$_GET['lib'];
$sp=$_GET['sp'];
}
?>
			<script type="text/javascript">
				document.getElementById('imgs').innerHTML="<img src=\"images/style/window2.png\"></img>";
			</script>
			<table width=100%><tr><td style="width:35%;vertical-align:middle;cursor:pointer;"><h2 onclick=read_an1();>Υπολογισμός U Ανοιγμάτων</h2></td>
			<td style="width:2%;vertical-align:middle;"><img src="./images/domika/save1.png" width="32px" height="32px" title="αποθήκευση" style="cursor:pointer;" onclick=save_an(); /></td>
			<td style="width:2%;vertical-align:middle;"><img src="./images/domika/load.png" width="32px" height="32px" title="ανάκτηση" style="cursor:pointer;" onclick=read_an(); /></td>
			<td style="width:5%;vertical-align:middle;"><img src="./images/domika/print.png" width="32px" height="32px" title="εκτύπωση" style="cursor:pointer;" onclick=printop(); /></td>
			<td style="width:5%;vertical-align:middle;"><img src="./images/domika/qm.png" title="οδηγίες" style="cursor:pointer;" onclick=help_an(); /></td>
			<td style="width:5%;vertical-align:middle;" ><img src="./images/domika/Pin_Green.png" width="30px" height="30px" title="επιλογή για την παρούσα μελέτη" style="cursor:pointer;" onclick=set_default(); /></td>
			<td style="width:10%;vertical-align:middle;text-align:right;">
			Ζώνη: <select id="an_zwni" onchange=checkall(); >
			<option value="3.2">&nbsp; Α </option>
			<option value="3.0">&nbsp; Β </option>
			<option value="2.8">&nbsp; Γ </option>
			<option value="2.6">&nbsp; Δ </option>
			</select>
			</td><td style="width:41%;vertical-align:middle;"><class id="an_umax"><b>&nbsp;Umax ανοιγμάτων=3.2</b></class></td></tr></table>

<!--
			<div id="tabvanila" class="widget">
					<ul class="tabnav">  
					<li><a href="#tab-an1">Γενικά Στοιχεία</a></li>
					<li><a href="#tab-an2" onclick=checkall(); >Στοιχεία Ανοιγμάτων</a></li>
					</ul>  
					
<!-- **************		ΓΕΝΙΚΑ ΣΤΟΙΧΕΙΑ   ******************************************-->			
					<div id="tab-an1" class="tabdiv1"> 
					<table style="width:100%;border:1px #6699CC dotted;"><tr><td id="anoig" style="width:100%;text-align:center;font-weight:bold;background-color:#EEE4B9;">&nbsp;</td></tr></table>
					<table  class="anoigmata"><tr><td style="vertical-align:middle;width:40%;">
					<b>Τύπος Πλαισίου: </b><select id="syntel_plaisio" onchange=getpane()>
						<option value=""></option>
						<option value="7.0">Μεταλλικό πλαίσιο χωρίς θερμοδιακοπή</option>
						<option value="2.5">Μεταλλικό πλαίσιο με θερμοδιακοπή</option>
						<option value="2.8">Συνθετικό πλαίσιο - Πολυουρεθάνη</option>
						<option value="2.2">Συνθετικό πλαίσιο - PVC - 2 θάλαμοι</option>
						<option value="2.0">Συνθετικό πλαίσιο - PVC - 3 θάλαμοι</option>
						<option value="1.5">Συνθετικό πλαίσιο - PVC - πολυθαλαμικό</option>
						<option value="2.4">Ξύλινο πλαίσιο σκληρή ξυλεία - μέσο πλάτος 5cm</option>
						<option value="2.0">Ξύλινο πλαίσιο μαλακή ξυλεία - μέσο πλάτος 5cm</option>
						<option value="1.7">Ξύλινο πλαίσιο σκληρή ξυλεία - μέσο πλάτος 10cm</option>
						<option value="1.5">Ξύλινο πλαίσιο μαλακη ξυλεία - μέσο πλάτος 10cm</option>
						</select>
					</td><td style="vertical-align:middle;width:30%;text-align:left;"><class id="UF"></class></td>
					<td style="vertical-align:middle;width:30%;text-align:center;">Μέσο πλάτος πλαισίου:&nbsp;
					<input type="text" id="mpp" size="5" value="" />&nbsp;cm
					</tr></table>
					<br />
					<table style="width:100%;border-top:1px #6699CC dotted;"><tr>
					<td style="width:25%;text-align:center;">Τύπος υάλωσης</td>
					<td style="width:25%;text-align:center;">Συντελεστής εκπομπής υαλοπίνακα</td>
					<td style="width:25%;text-align:center;">Διαστάσεις</td>
					<td style="width:25%;text-align:center;">Υλικό διακένου</td></tr><tr>
					<td style="width:25%;margin-left:auto;margin-right:auto;">
						<div style="width:70px;margin-left:auto;margin-right:auto;">
<!--						<select id="typ" onchange=getpane()> -->
						<select id="typ" disabled="disabled">
							<option value=""></option>
							<option value="1">Διπλή</option>
							<option value="2">Τριπλή</option>
						</select></div>
					</td>
					<td style="width:25%;margin-left:auto;margin-right:auto;">
						<div style="width:70px;margin-left:auto;margin-right:auto;">
						<select id="ekp"  onchange=getpane()>
							<option value=""></option>
							<option value="1">&nbsp;0.89</option>
							<option value="2"><0.10</option>
							<option value="3"><0.05</option>
						</select></div>
					</td>
					<td style="width:25%;margin-left:auto;margin-right:auto;">
						<div style="width:70px;margin-left:auto;margin-right:auto;">
						<select id="dias"  onchange=getpane()>
							<option value=""></option>
							<option value="4-6-4">4-6-4</option>
							<option value="4-8-4">4-8-4</option>
							<option value="4-12-4">4-12-4</option>
							<option value="4-16-4">4-16-4</option>
							<option value="4-20-4">4-20-4</option>
							<option value="4-6-4-6-4">4-6-4-6-4</option>
							<option value="4-8-4-8-4">4-8-4-8-4</option>
							<option value="4-12-4-12-4">4-12-4-12-4</option>
						</select></div>
					</td>
					<td style="width:25%;margin-left:auto;margin-right:auto;">
						<div style="width:70px;margin-left:auto;margin-right:auto;">
						<select id="aer"  onchange=getpane()>
							<option value=""></option>
							<option value="1">Αέρας</option>
							<option value="2">Αργό</option>
							<option value="3">Κρυπτό</option>
						</select></div>
					</td>
					</td></tr></table>
					<table style="width:100%;border-top:1px #6699CC dotted;"><tr><td><br>
					<b>Τύπος υαλοπίνακα: </b><input type="text" id="descr" size="95" value=""  disabled="disabled" class="disabled"/>&nbsp;</td></tr></table>
					<table style="width:100%;border-top:1px #6699CC dotted;"><tr><td><br>
					<b>Συντελεστής θερμοπερατότητας υαλοπίνακα: U<sub>g</sub> = </b>
					<input type="text" id="UG" size="10" value="" style="font-weight:bold;text-align:center;" disabled="disabled" class="disabled"/>&nbsp;W/(m²K)</td></tr></table>
					<table style="width:100%;border-top:1px #6699CC dotted;"><tr><td><br>
					<b>Γραμμική θερμοπερατότητα συναρμογής υαλοπινάκων και πλαισίου: Ψ<sub>g</sub> = </b>
					<input type="text" id="CG" size="10" value="" style="font-weight:bold;text-align:center;" disabled="disabled" class="disabled"/>&nbsp;W/(m·K)</td></tr></table>

					
					</div>
<!-- **************		ΣΤΟΙΧΕΙΑ ΑΝΟΙΓΜΑΤΩΝ  ******************************************-->			
			<div id="tab-an2" class="tabdiv1"> 
					<table border="1" class="anoigmata">
						<tr style="background-color:#ddd;"><td id="myHeader3" >A/A</td><td colspan="4" >Ανοιγμα</td>
						<td colspan="3" >Υαλοπίνακας</td>
						<td colspan="2" >Πλαίσιο</td>
						<td id="myHeader1" >Μήκος Θεμογέφυρας L<sub>g</sub></td>
						<td id="myHeader2" >U Κουφώματος [W/(m²K)]</td>
						</tr><tr  style="background-color:#ddd;">
						<td >Πλάτος</td><td >Ύψος</td><td >Εμβαδό</td><td >Αριθμός φύλλων</td>
						<td >Πλάτος</td><td >Ύψος</td><td >Eμβαδό</td>
						<td >Eμβαδό</td><td >Ποσοστό</td>
						</tr>
						<script type="text/javascript">document.getElementById("myHeader1").rowSpan="2";
						document.getElementById("myHeader2").rowSpan="2";
						document.getElementById("myHeader3").rowSpan="2";</script>
						<?php for ($i = 1; $i <= 10; $i++) { 
						echo "<tr><td >" . $i . "</td>";
						?>
		<td width=8%><input type="text" id="aw<?php echo $i; ?>" style="width:50px;" onchange="get_u(<?php echo $i; ?>);"/></td>
		<td width=8%><input type="text" id="ah<?php echo $i; ?>" style="width:50px;" onchange="get_u(<?php echo $i; ?>);"/></td>
		<td width=8%><input type="text" id="ae<?php echo $i; ?>" style="width:50px;" disabled="disabled" class="disabled"/></td>
		<td width=8%><input type="text" id="af<?php echo $i ;?>" style="width:50px;" onchange="get_u(<?php echo $i; ?>,1);"/></td>
		<td width=8%><input type="text" id="yw<?php echo $i ;?>" style="width:50px;" onchange="get_u(<?php echo $i; ?>);"/></td>
		<td width=8%><input type="text" id="yh<?php echo $i ;?>" style="width:50px;" onchange="get_u(<?php echo $i; ?>);"/></td>
		<td width=8%><input type="text" id="ye<?php echo $i ;?>" style="width:50px;" disabled="disabled" class="disabled"/></td>
		<td width=8%><input type="text" id="pe<?php echo $i ;?>" style="width:50px;" disabled="disabled" class="disabled"/></td>
		<td width=8%><input type="text" id="pp<?php echo $i ;?>" style="width:50px;" disabled="disabled" class="disabled"/></td>
		<td width=8%><input type="text" id="lg<?php echo $i ;?>" style="width:50px;" disabled="disabled" class="disabled"/></td>
		<td width=8%><input type="text" id="uw<?php echo $i ;?>" style="cursor:pointer;width:50px;font-weight: bold;" class="disabled" 
		onclick=parent.get_ut(this.value,<?=$p;?>,document.getElementById('aw<?php echo $i; ?>').value,document.getElementById('ah<?php echo $i; ?>').value) />
		</td>
						</tr>
						<?php
						}
						?>
						
					</table>
<!--
		<table width="100%"><tr><td><button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=save_an(); >Αποθήκευση</button>
		&nbsp;&nbsp;<button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=read_an(); >Ανάκτηση</button>
		&nbsp;&nbsp;<button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=printop(); >Εκτύπωση</button>
		</td><td>
		</td></tr></table>
-->
<!------------------------------------------------------------------------------------------->						
<!--              κρυφό div για την αποθήκευση της ομάδας των ανοιγμάτων                   -->
<!------------------------------------------------------------------------------------------->						
		<div style='display:none'><div id='save_an' style='padding:10px; background:#ebf9c9;'>
			<form id="test" onSubmit="save_an1(); return false;">
			<h2>Αποθήκευση του πίνακα ανοιγμάτων</h2>
			Ονομα:&nbsp;<input type="text" id="an_name" size="50" value=""/>&nbsp;&nbsp;
			<button type="button" onclick=save_an1(); >OK</button>
			</form>
		</div></div>
		<div style='display:none'><div id='save_an1' style='padding:10px; background:#ebf9c9;'>
		
		</div></div>
<!------------------------------------------------------------------------------------------->						
<!--              κρυφό div για την ανάκτηση ομάδας ανοιγμάτων                             -->
<!------------------------------------------------------------------------------------------->						
		<div style='display:none'><div id='read_an' style='padding:10px; background:#ebf9c9;'>
			<form id="test1" onSubmit="read_an1(); return false;">
			<h2>Ανάκτηση πίνακα ανοιγμάτων</h2>
			<?php 
			if ($call==""){
//			$an = dropdown1("SELECT * FROM domika_anoigmata", "rec", "name"); 
			$an = dropdown1("SELECT * FROM anoigmata_alouminio", "rec", "name"); 
			$an .= dropdown1("SELECT * FROM anoigmata_alouminio_thermo", "rec", "name"); 
			$an .= dropdown1("SELECT * FROM anoigmata_doors", "rec", "name"); 
			$an .= dropdown1("SELECT * FROM anoigmata_plastic", "rec", "name"); 
			$an .= dropdown1("SELECT * FROM anoigmata_wood", "rec", "name"); 
			}else{
			if ($sp==1)$an = dropdown1("SELECT * FROM anoigmata_alouminio", "rec", "name"); 
			if ($sp==2)$an = dropdown1("SELECT * FROM anoigmata_alouminio_thermo", "rec", "name"); 
			if ($sp==3)$an = dropdown1("SELECT * FROM anoigmata_doors", "rec", "name"); 
			if ($sp==4)$an = dropdown1("SELECT * FROM anoigmata_plastic", "rec", "name"); 
			if ($sp==5)$an = dropdown1("SELECT * FROM anoigmata_wood", "rec", "name"); 
			}
			echo "<select id=\"an_rec\" style=\"width:400px;\">" . $an . "</select>";		
			?>
			&nbsp;&nbsp;<button type="button" onclick=read_an1(); >OK</button>
			</form>
		</div></div>
<!------------------------------------------------------------------------------------------->						
		</div>
</div> <!-- vanilla end -->

<!------------------------------------------------------------------------------------------->						
<!--              κρυφό div για HELP                                                       -->
<!------------------------------------------------------------------------------------------->						
<div style='display:none'><div id='help_an' style='width:500px;padding:10px; background:#ebf9c9;'>
<strong>Υπολογισμός U Ανοιγμάτων</strong><br />
<ol>
<li>Επιλέξτε τύπο πλαισίου και χαρακτηριστικά υαλοπίνακα, ώστε να υπολογιστούν οι θερμοπερατότητες υαλοπίνακα και συναρμογής του με το πλαίσιο.</li><br />
<li>Συμπληρώστε το μέσο πλάτος του πλαισίου.</li><br />
<li>Στον πίνακα κουφωμάτων συμπληρώστε πλάτος, ύψος και αριθμό φύλλων. Τα υπόλοιπα στοιχεία υπολογίζονται αυτόματα.<br /> 
Το πλάτος και το ύψος του υαλοπίνακα μπορούν να αλλάξουν και χειροκίνητα. Αν δεν δοθεί μέσο πλάτος πλαισίου, θα πρέπει να πληκτρολογηθούν όλα.</li><br />
<li>Με το πλήκτρο αποθήκευση ανοίγει παράθυρο στο οποίο πληκτρολογείτε το όνομα με το οποίο θέλετε να γίνει η αποθήκευση.<br />
Αν υπάρχει ήδη αποθηκευμένος πίνακας με το ίδιο όνομα, τότε αντικαθίσταται με τα νέα στοιχεία.</li><br />
<li>Με το πλήκτρο εκτύπωση, δημιουργείται αρχείο PDF με τον πίνακα.</li>
</ol>
Με κάθε αλλαγή, οποιουδήποτε στοιχείου γίνεται επανυπολογισμός των U. Σε περίπτωση που κάποιο είναι μεγαλύτερο του Umax 
(ανάλογα με την ζώνη που έχει επιλεγεί) τότε εμφανίζεται με κόκκινο χρώμα.<br /><br />
Αν η σελίδα αυτή έχει κληθεί από το "ΚΕΝΑΚ - ανοίγματα", με κλικ στην τιμή του U ενός ανοίγματος μεταφέρονται οι τιμές στο άνοιγμα από το οποίο έγινε η κλήση.

</div></div>
<!------------------------------------------------------------------------------------------->						

<?php if ($min==1){ ?>
<?php if ($call<>""){ ?>
		<script type="text/javascript">
			document.getElementById('an_rec').selectedIndex=<?=$call;?>;
			document.getElementById('anoig').innerHTML=document.getElementById('an_rec').options[document.getElementById('an_rec').selectedIndex].text;
			read_an1();
		</script>
<?php }else{ ?>
<script type="text/javascript">
read_an();
</script>
<?php }} ?>










