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

		<?php	if ($sel_page["id"] == 1)	{ ?>
			<h2>ΚΕΝΑΚ - Υπολογισμοί</h2>
	
	
			<form id="kenakform" accept-charset="utf-8" action="kenak.php" method="post">
					
					<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#tab-zwni">Στοιχεία ζώνης</a></li>
					<li><a href="#tab-znx">ΖΝΧ</a></li>  
					<li><a href="#tab-xwroi">Χώροι κτιρίου</a></li>
					<li><a href="#tab-katakoryfa">Δάπεδο-Οροφές</a></li>
					<li><a href="#tab-thermo">Θερμογέφυρες</a></li>
					</ul>  
					
					<div id="tab-znx" class="tabdiv"> 
					<table border="1">
						<tr><th colspan="6">ZNX</th></tr>
						<tr>
						<td>Επιλογή Χρήσης</td>
						<td><select name="drop_xrisi"  onchange="if(this.value!=''){document.getElementById('xrisi_image').src='images/xrisi/'+this.value+'.png';}">
						<?php $list = dropdown1("SELECT xrisi, id FROM energy_conditions", "id", "xrisi"); echo $list; ?></select></td>
						<td>Επιφάνεια Ηλιακού</td>
						<td><input type="text" title="Σε μ2" name="epif_iliakoy" required="required" maxlength="6" size="6" value="<?php echo htmlentities($epif_iliakoy); ?>" /></td>
						</tr>
						<tr>
						<td>Θ Νερού δικτύου (ΕΛΟΤ 1291)</td>
						<td><select name="drop_nero_diktyoy" onchange="if(this.value!=''){document.getElementById('neroelot_image').src='images/water/'+this.value+'.jpg';}">
						<?php $list = dropdown1("SELECT place, id FROM climate61", "id", "place"); echo $list; ?></td>
						<td>Μηνιαία ηλιακή ενέργεια </br>για βέλτ. κλίση</br>TOTEE 20701-3 Πίνακας 4.4</td>
						<td><select name="drop_velt_klisi" onchange="if(this.value!=''){document.getElementById('pv_image').src='images/pv/'+this.value+'.jpg';}">
						<?php $list = dropdown1("SELECT place, id FROM climate44", "id", "place"); echo $list; ?></td>
						</tr>
					</table>
					
					<img id="xrisi_image" src="images/xrisi/1.png">
					<img id="neroelot_image" src="images/water/1.jpg">
					<img id="pv_image" src="images/pv/1.jpg">
					
					</div><!--/znx-->
					
					<div id="tab-zwni" class="tabdiv"> 
					<table border="1">
						<tr><th colspan="4">Στοιχείας ζώνης</th></tr>
						<tr>
						<td>Επιλογή ζώνης</td>
						<td><select name="zwni" onchange="if(this.value!=''){document.getElementById('zwni_image').src='images/'+this.value+'.jpg';}">
						<option value="a">Ζώνη Α</option>
						<option value="b">Ζώνη Β</option>
						<option value="g">Ζώνη Γ</option>
						<option value="d">Ζώνη Δ</option>
						</select> </td>
						<td>Κλιματολογικά δεδομένα για : (*)</td>
						<td><?php $list = dropdown("SELECT place, id FROM climate31", "id", "place", "drop_climate"); echo $list; ?></td>
						</tr>
					</table>
					
					<img id="zwni_image" src="images/b.jpg">
					</br>
					* : Η επιλογή αυτή δεν χρησιμοποιείται προς το παρόν στους υπολογισμούς.
					</div><!--/zwni-->
					
					 
										
					<div id="tab-xwroi" class="tabdiv"> 
					<table border="1">
						<tr><th colspan="4">Χώροι κτιρίου</th></tr>
						<tr><td>Χώροι κτιρίου</td><td>Μήκος</td><td>Πλάτος</td><td>Ύψος</td></tr>
						<?php 
						for ($i = 1; $i <= 10; $i++) { //επανάληψη για 10 χώρους κτιρίου. Αν αλλάξει το 10 πρέπει να αλλαχθεί και στο αρχείο kenak_apotelesmata.php
						$mikos = "mikos";
						$platos = "platos";
						$ypsos = "ypsos";
						
						echo "<tr><td>Χώρος " . $i . "</td><td><input type=\"text\" name=\"mikos" . $i . "\" maxlength=\"6\" size=\"6\" value=\"" . htmlentities(${$mikos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"platos" . $i . "\" maxlength=\"6\" size=\"6\" value=\"" . htmlentities(${$platos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"ypsos" . $i . "\" maxlength=\"6\" size=\"6\" value=\"" . htmlentities(${$ypsos.$i}) . "\" /></td></tr>";
						}
						?>
						</table>
					</div><!--/xwroi-->						
					
					<div id="tab-katakoryfa" class="tabdiv">
					<table border="1">
						<tr><th colspan="2">Δάπεδο - Οροφές</th></tr>
						<tr>
						<td>Είδος</td><td>Εμβαδόν</td><td>U</td>
						</tr>
						<tr><td colspan="2">Δάπεδα</td></tr>
						<tr>
						<td>Δάπεδο επί εδάφους</td>
						<td><input type="text" title="Σε μέτρα" name="dapedo_embadon1" required="required" maxlength="6" size="6" value="<?php echo htmlentities($dapedo_embadon1); ?>" /></td>
						<td><input type="text" title="Τυπική τιμή 0.32" name="dapedo_u1" required="required" maxlength="6" size="6" value="<?php echo htmlentities($dapedo_u1); ?>" /></td>
						</tr>
						<tr>
						<td>Δάπεδο επί μη θερμαινόμενου χώρου</td>
						<td><input type="text" title="Σε μέτρα" name="dapedo_embadon2" maxlength="6" size="6" value="<?php echo htmlentities($dapedo_embadon2); ?>" /></td>
						<td><input type="text" name="dapedo_u2" maxlength="6" size="6" value="<?php echo htmlentities($dapedo_u2); ?>" /></td>
						</tr>
						<tr><td colspan="2">Οροφές</td></tr>
						<tr>
						<td>Οροφή με κεραμίδι</td>
						<td><input type="text" title="Σε μέτρα" name="orofi_embadon1" maxlength="6" size="6" value="<?php echo htmlentities($orofi_embadon1); ?>" /></td>
						<td><input type="text" name="orofi_u1" maxlength="6" size="6" value="<?php echo htmlentities($orofi_u1); ?>" /></td>
						</tr>
						<tr>
						<td>Οροφή πλάκα</td>
						<td><input type="text" title="Σε μέτρα" name="orofi_embadon2" maxlength="6" size="6" value="<?php echo htmlentities($orofi_embadon2); ?>" /></td>
						<td><input type="text" name="orofi_u2" maxlength="6" size="6" value="<?php echo htmlentities($orofi_u2); ?>" /></td>
						</tr>
						</table>
						</div><!--/katakoryfa-->
						
					<div id="tab-thermo" class="tabdiv">
					<table border="1">
						<tr><th colspan="3">Θερμογέφυρες</th></tr>
						<tr>
						<td>Είδος</td><td>Πλήθος</td><td>Ύψος</td>
						</tr>
						<tr><td colspan="3">Εσωτερικές γωνίες</td></tr>
						<?php 
						
						for ($i = 1; $i <= 5; $i++) { 
						${"thermo_esw_drop".$i} = dropdown("SELECT name, y FROM thermo_esg", "y", "name", "thermo_esw_drop".$i);
						echo "<tr>";
						echo "<td>" . ${"thermo_esw_drop".$i} . "</td>";
						echo "<td><input type=\"text\" name=\"thermo_esw_gwnia_p" . $i . "\" maxlength=\"6\" size=\"6\" value=\"" . htmlentities(${"thermo_esw_gwnia_p".$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"thermo_esw_gwnia_ypsos" . $i . "\" maxlength=\"6\" size=\"6\" value=\"" . htmlentities(${"thermo_esw_gwnia_ypsos".$i}) . "\" /></td>";
						echo "</tr>";
						}
						?>
						<tr><td colspan="3">Εξωτερικές γωνίες</td></tr>
						</tr>
						<?php 
						
						for ($i = 1; $i <= 5; $i++) { 
						${"thermo_eksw_drop".$i} = dropdown("SELECT name, y FROM thermo_eksg", "y", "name", "thermo_eksw_drop".$i);
						echo "<tr>";
						echo "<td>" . ${"thermo_eksw_drop".$i} . "</td>";
						echo "<td><input type=\"text\" name=\"thermo_eksw_gwnia_p" . $i . "\" maxlength=\"6\" size=\"6\" value=\"" . htmlentities(${"thermo_eksw_gwnia_p".$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"thermo_eksw_gwnia_ypsos" . $i . "\" maxlength=\"6\" size=\"6\" value=\"" . htmlentities(${"thermo_eksw_gwnia_ypsos".$i}) . "\" /></td>";
						echo "</tr>";
						}
						
						echo "<tr><td colspan=\"3\">Δαπέδου (Με βάση την περίμετρο)</td></tr>";
						$thermo_dapedo1_drop = dropdown1("SELECT name, y FROM thermo_d", "y", "name");
						$thermo_dapedo2_drop = dropdown1("SELECT name, y FROM thermo_oe", "y", "name");
						$thermo_dapedo3_drop = dropdown1("SELECT name, y FROM thermo_ed", "y", "name");
						$thermo_dapedo4_drop = dropdown1("SELECT name, y FROM thermo_edp", "y", "name");
						$thermo_dapedo5_drop = dropdown1("SELECT name, y FROM thermo_de", "y", "name");
						$thermo_dapedo6_drop = dropdown1("SELECT name, y FROM thermo_dp", "y", "name");
						echo "<tr><td colspan=\"3\"><select name=\"thermo_dapedo_drop\">" . $thermo_dapedo1_drop . $thermo_dapedo2_drop . $thermo_dapedo3_drop . $thermo_dapedo4_drop . $thermo_dapedo5_drop . $thermo_dapedo6_drop . "</select></td></tr>";
						?>
						
						</table>
						</div><!--/thermo-->
						</div><!--/tab-vanilla-->
					</br></br>
					<img src="images/toixoi.jpg">
<div id="container">  
        <ul class="toixoi-menu">  
            <li id="north" class="active">Βόρεια</li>  
            <li id="east">Ανατολικά</li>  
            <li id="south">Νότια</li>
			<li id="west">Δυτικά</li> 			
        </ul>  
        <span class="clear"></span>  

	<div class="content north">  
					<table border="1">
						<br/><br/>
						<tr bgcolor="grey"><th colspan="9"><b>ΔΟΜΙΚΑ ΣΤΟΙΧΕΙΑ ΚΕΝΑΚ</b></th></tr>
						<tr><td><b>Όνομα στοιχείου</b></td><td><b>Μήκος<b></td><td><b>Ύψος</b></td><td><b>Πάχος</b></td><td><b>U</b></tr>
						<tr bgcolor="#00FFFF"><th colspan="9"><b>ΒΟΡΕΙΑ (0)</b></th></tr>
						<?php 
						$thermo_ak = dropdown1("SELECT name, y FROM thermo_ak", "y", "name");
						$thermo_d = dropdown1("SELECT name, y FROM thermo_d", "y", "name");
						$thermo_de = dropdown1("SELECT name, y FROM thermo_de", "y", "name");
						$thermo_dp = dropdown1("SELECT name, y FROM thermo_dp", "y", "name");
						$thermo_ed = dropdown1("SELECT name, y FROM thermo_ed", "y", "name");
						$thermo_edp = dropdown1("SELECT name, y FROM thermo_edp", "y", "name");
						$thermo_eds = dropdown1("SELECT name, y FROM thermo_eds", "y", "name");
						$thermo_eksg = dropdown1("SELECT name, y FROM thermo_eksg", "y", "name");
						$thermo_esg = dropdown1("SELECT name, y FROM thermo_esg", "y", "name");
						$thermo_l = dropdown1("SELECT name, y FROM thermo_l", "y", "name");
						$thermo_oe = dropdown1("SELECT name, y FROM thermo_oe", "y", "name");
						$thermo_pr = dropdown1("SELECT name, y FROM thermo_pr", "y", "name");
						$thermo_yp = dropdown1("SELECT name, y FROM thermo_yp", "y", "name");
						for ($i = 1; $i <= $t_boreia; $i++) { 
						//Οι μεταβλητές του άνω ορίου της επανάληψης βρίσκονται στο αρχείο kenak_apotelesmata.php στο φάκελο icludes. 
						//Με βάση αυτές τις μεταβλητές πχ για τη βόρεια πλευρά θα δημιουργηθούν 5 τοίχοι ($i) και 3 επιλογές ανοιγμάτων ($j) για τον κάθε ένα.
						$onoma = "T-B";
						$mikos = "mikos_b";
						$ypsos = "ypsos_b";
						$paxos = "paxos_b";
						$dokos = "dokos_b";
						$ypostil = "ypostil_b";
						$u = "u_b";
						$mikos_syr = "mikos_syr_b";
						$ypsos_syr = "ypsos_syr_b";
						$u_syr = "u_syr_b";
						$drop_syr = "drop_syr_b";
						$drop_aeras = "drop_aeras_b";
						$u_dok = "u_dok_b";
						$u_ypost = "u_ypost_b";
						$u_anoig = "u_anoig_b";
						$thermo_orofis_drop = "thermo_orofis_drop_b";
						$thermo_dokoy_drop = "thermo_dokoy_drop_b";
						$arithmos_ypost  = "arithmos_ypost_b";
						$thermo_ypost_drop = "thermo_ypost_drop_b";
						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"5\"><b>" . $onoma . $i . "</b></td></td><td bgcolor=\"#00FFFF\"colspan=\"2\">Τύπος</td><td bgcolor=\"#00FFFF\">Πλήθος</td><td bgcolor=\"#00FFFF\">Θερμογέφυρα</td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $mikos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $ypsos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $paxos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$paxos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $u . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα οροφής</td><td>1</td>";
						echo "<td><select name=\"" . $thermo_orofis_drop . $i . "\">" . $thermo_d . $thermo_oe . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Δοκός " . $onoma . $i . "</td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $dokos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$dokos.$i}) . "\" /></td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $u_dok . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_dok.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα δοκού</td><td>1</td>";
						echo "<td><select name=\"" . $thermo_dokoy_drop . $i . "\">" . $thermo_edp . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $ypostil . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypostil.$i}) . "\" /></td><td colspan=\"2\"></td>";
						echo "<td><input type=\"text\" name=\"" . $u_ypost . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_ypost.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα Υποστυλώματος</td>";
						echo "<td><input type=\"text\" name=\"" . $arithmos_ypost . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$arithmos_ypost.$i}) . "\" /></td>";
						echo "<td><select name=\"" . $thermo_ypost_drop . $i . "\">" . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $mikos_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos_syr.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $ypsos_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos_syr.$i}) . "\" /></td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $u_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_syr.$i}) . "\" /></td></tr>";

						echo "<tr><td bgcolor=\"#99FFFF\" colspan=\"5\"><b>Ανοίγματα-" . $onoma . $i . "</b></td></td><td bgcolor=\"#99FFFF\">Είδος</td><td bgcolor=\"#99FFFF\">Αερισμός</td><td bgcolor=\"#99FFFF\">Λαμπάς</td><td bgcolor=\"#99FFFF\">Ανωκ./κατ.</td></tr>";
								for ($j = 1; $j <= $anoig_t_boreia; $j++) {
								echo "<tr><td>Άνοιγμα " . $onoma . $i . "-" . $j . "</td>";
								echo "<td><input type=\"text\" name=\"" . $mikos . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos.$i.$j}) . "\" /></td>";
								echo "<td><input type=\"text\" name=\"" . $ypsos . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos.$i.$j}) . "\" /></td><td></td>";
								echo "<td><input type=\"text\" name=\"" . $u_anoig . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_anoig.$i.$j}) . "\" /></td>";
								echo "<td><select name=\"" . $drop_syr . $i . $j . "\">";
								echo "<option value=\"\" selected=\"selected\"></option>";
								echo "<option value=\"1\">Αδιαφανής πόρτα</option>";
								echo "<option value=\"syromeno\">Συρόμενο παράθυρο</option>";
								echo "<option value=\"anoigomeno\">Ανοιγόμενο παράθυρο</option>";
								echo "<option value=\"epallilo\">Επάλληλο παράθυρο</option>";
								echo "<option value=\"syromeniportaapli\">Συρόμενη πόρτα απλή</option>";
								echo "<option value=\"syromeniportadipli\">Συρόμενη πόρτα διπλή</option>";
								echo "<option value=\"anoigomeniportamoni\">Ανοιγόμενη πόρτα μονή</option>";
								echo "<option value=\"anoigomeniportadipli\">Ανοιγόμενη πόρτα διπλή</option>";
								echo "<option value=\"epalliliportadipli\">Επάλληλη πόρτα</option></select></td>";
								echo "<td><select name=\"" . $drop_aeras . $i . $j . "\">";
								echo "<option value=\"\" selected=\"selected\"></option>";
								echo "<option value=\"15.1\">Παράθυρο με ξύλινο πλαίσιο: 15,1</option>";
								echo "<option value=\"12.5\">Παράθυρο με ξύλινο πλαίσιο: 12,5</option>";
								echo "<option value=\"10\">Παράθυρο με ξύλινο πλαίσιο: 10,0</option>";
								echo "<option value=\"11.8\">Πόρτα με ξύλινο πλαίσιο: 11,8</option>";
								echo "<option value=\"9.8\">Πόρτα με ξύλινο πλαίσιο: 9,8</option>";
								echo "<option value=\"7.9\">Πόρτα με ξύλινο πλαίσιο: 7,9</option>";
								echo "<option value=\"8.7\">Παράθυρο με συνθ πλαίσιο: 8,7</option>";
								echo "<option value=\"6.8\">Παράθυρο με συνθ πλαίσιο: 6,8</option>";
								echo "<option value=\"6.2\">Παράθυρο με συνθό πλαίσιο: 6,2</option>";
								echo "<option value=\"7.4\">Πόρτα με συνθ πλαίσιο: 7,4</option>";
								echo "<option value=\"5.3\">Πόρτα με συνθ πλαίσιο: 5,3</option>";
								echo "<option value=\"4.8\">Πόρτα με συνθ πλαίσιο: 4,8</option></select></td>";
								${"thermo_lampas_drop_b".$i.$j} = dropdown("SELECT name, y FROM thermo_l", "y", "name", "thermo_lampas_drop_b".$i.$j);
								echo "<td>" . ${"thermo_lampas_drop_b".$i.$j} . "</td>";
								${"thermo_anwkatw_drop_b".$i.$j} = dropdown("SELECT name, y FROM thermo_ak", "y", "name", "thermo_anwkatw_drop_b".$i.$j);
								echo "<td>" . ${"thermo_anwkatw_drop_b".$i.$j} . "</td></tr>";

								}
						}
						?>
						</table>
	</div>
	
	<div class="content east">    
						<table border="1">
						<br/><br/>
						<tr bgcolor="grey"><th colspan="9"><b>ΔΟΜΙΚΑ ΣΤΟΙΧΕΙΑ ΚΕΝΑΚ</b></th></tr>
						<tr><td><b>Όνομα στοιχείου</b></td><td><b>Μήκος<b></td><td><b>Ύψος</b></td><td><b>Πάχος</b></td><td><b>U</b></td></tr>	
						<tr bgcolor="#FFFF33"><th colspan="9"><b>ΑΝΑΤΟΛΙΚΑ (90)</b></th></tr>
						<?php
						for ($i = 1; $i <= $t_anatolika; $i++) {
						$onoma = "T-A";
						$mikos = "mikos_a";
						$ypsos = "ypsos_a";
						$paxos = "paxos_a";
						$dokos = "dokos_a";
						$ypostil = "ypostil_a";
						$u = "u_a";
						$mikos_syr = "mikos_syr_a";
						$ypsos_syr = "ypsos_syr_a";
						$u_syr = "u_syr_a";
						$drop_syr = "drop_syr_a";
						$drop_aeras = "drop_aeras_a";
						$u_dok = "u_dok_a";
						$u_ypost = "u_ypost_a";
						$u_anoig = "u_anoig_a";
						$thermo_orofis_drop = "thermo_orofis_drop_a";
						$thermo_dokoy_drop = "thermo_dokoy_drop_a";
						$arithmos_ypost  = "arithmos_ypost_a";
						$thermo_ypost_drop = "thermo_ypost_drop_a";
						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"5\"><b>" . $onoma . $i . "</b></td></td><td bgcolor=\"#00FFFF\"colspan=\"2\">Τύπος</td><td bgcolor=\"#00FFFF\">Πλήθος</td><td bgcolor=\"#00FFFF\">Θερμογέφυρα</td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $mikos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $ypsos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $paxos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$paxos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $u . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα οροφής</td><td>1</td>";
						echo "<td><select name=\"" . $thermo_orofis_drop . $i . "\">" . $thermo_d . $thermo_oe . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Δοκός " . $onoma . $i . "</td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $dokos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$dokos.$i}) . "\" /></td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $u_dok . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_dok.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα δοκού</td><td>1</td>";
						echo "<td><select name=\"" . $thermo_dokoy_drop . $i . "\">" . $thermo_edp . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $ypostil . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypostil.$i}) . "\" /></td><td colspan=\"2\"></td>";
						echo "<td><input type=\"text\" name=\"" . $u_ypost . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_ypost.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα Υποστυλώματος</td>";
						echo "<td><input type=\"text\" name=\"" . $arithmos_ypost . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$arithmos_ypost.$i}) . "\" /></td>";
						echo "<td><select name=\"" . $thermo_ypost_drop . $i . "\">" . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $mikos_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos_syr.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $ypsos_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos_syr.$i}) . "\" /></td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $u_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_syr.$i}) . "\" /></td></tr>";
						
						echo "<tr><td bgcolor=\"#99FFFF\" colspan=\"5\"><b>Ανοίγματα-" . $onoma . $i . "</b></td></td><td bgcolor=\"#99FFFF\">Είδος</td><td bgcolor=\"#99FFFF\">Αερισμός</td><td bgcolor=\"#99FFFF\">Λαμπάς</td><td bgcolor=\"#99FFFF\">Ανωκ./κατ.</td></tr>";
								for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
								echo "<tr><td>Άνοιγμα " . $onoma . $i . "-" . $j . "</td>";
								echo "<td><input type=\"text\" name=\"" . $mikos . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos.$i.$j}) . "\" /></td>";
								echo "<td><input type=\"text\" name=\"" . $ypsos . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos.$i.$j}) . "\" /></td><td></td>";
								echo "<td><input type=\"text\" name=\"" . $u_anoig . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_anoig.$i.$j}) . "\" /></td>";
								echo "<td><select name=\"" . $drop_syr . $i . $j . "\">";
								echo "<option value=\"\" selected=\"selected\"></option>";
								echo "<option value=\"1\">Αδιαφανής πόρτα</option>";
								echo "<option value=\"syromeno\">Συρόμενο παράθυρο</option>";
								echo "<option value=\"anoigomeno\">Ανοιγόμενο παράθυρο</option>";
								echo "<option value=\"epallilo\">Επάλληλο παράθυρο</option>";
								echo "<option value=\"syromeniportaapli\">Συρόμενη πόρτα απλή</option>";
								echo "<option value=\"syromeniportadipli\">Συρόμενη πόρτα διπλή</option>";
								echo "<option value=\"anoigomeniportamoni\">Ανοιγόμενη πόρτα μονή</option>";
								echo "<option value=\"anoigomeniportadipli\">Ανοιγόμενη πόρτα διπλή</option>";
								echo "<option value=\"epalliliportadipli\">Επάλληλη πόρτα</option></select></td>";
								echo "<td><select name=\"" . $drop_aeras . $i . $j . "\">";
								echo "<option value=\"\" selected=\"selected\"></option>";
								echo "<option value=\"15.1\">Παράθυρο με ξύλινο πλαίσιο: 15,1</option>";
								echo "<option value=\"12.5\">Παράθυρο με ξύλινο πλαίσιο: 12,5</option>";
								echo "<option value=\"10\">Παράθυρο με ξύλινο πλαίσιο: 10,0</option>";
								echo "<option value=\"11.8\">Πόρτα με ξύλινο πλαίσιο: 11,8</option>";
								echo "<option value=\"9.8\">Πόρτα με ξύλινο πλαίσιο: 9,8</option>";
								echo "<option value=\"7.9\">Πόρτα με ξύλινο πλαίσιο: 7,9</option>";
								echo "<option value=\"8.7\">Παράθυρο με συνθ πλαίσιο: 8,7</option>";
								echo "<option value=\"6.8\">Παράθυρο με συνθ πλαίσιο: 6,8</option>";
								echo "<option value=\"6.2\">Παράθυρο με συνθό πλαίσιο: 6,2</option>";
								echo "<option value=\"7.4\">Πόρτα με συνθ πλαίσιο: 7,4</option>";
								echo "<option value=\"5.3\">Πόρτα με συνθ πλαίσιο: 5,3</option>";
								echo "<option value=\"4.8\">Πόρτα με συνθ πλαίσιο: 4,8</option></select></td>";
								${"thermo_lampas_drop_a".$i.$j} = dropdown("SELECT name, y FROM thermo_l", "y", "name", "thermo_lampas_drop_a".$i.$j);
								echo "<td>" . ${"thermo_lampas_drop_a".$i.$j} . "</td>";
								${"thermo_anwkatw_drop_a".$i.$j} = dropdown("SELECT name, y FROM thermo_ak", "y", "name", "thermo_anwkatw_drop_a".$i.$j);
								echo "<td>" . ${"thermo_anwkatw_drop_a".$i.$j} . "</td></tr>";

								}
						}
						?>
						</table>
	</div>					
						
	<div class="content south">  				
					<table border="1">
						<br/><br/>
						<tr bgcolor="grey"><th colspan="9"><b>ΔΟΜΙΚΑ ΣΤΟΙΧΕΙΑ ΚΕΝΑΚ</b></th></tr>
						<tr><td><b>Όνομα στοιχείου</b></td><td><b>Μήκος<b></td><td><b>Ύψος</b></td><td><b>Πάχος</b></td><td><b>U</b></td></tr>	
						<tr bgcolor="#009966"><th colspan="9"><b>ΝΟΤΙΑ (90)</b></th></tr>
						<?php
						for ($i = 1; $i <= $t_notia; $i++) {
						$onoma = "T-N";
						$mikos = "mikos_n";
						$ypsos = "ypsos_n";
						$paxos = "paxos_n";
						$dokos = "dokos_n";
						$ypostil = "ypostil_n";
						$u = "u_n";
						$mikos_syr = "mikos_syr_n";
						$ypsos_syr = "ypsos_syr_n";
						$u_syr = "u_syr_n";
						$drop_syr = "drop_syr_n";
						$drop_aeras = "drop_aeras_n";
						$u_dok = "u_dok_n";
						$u_ypost = "u_ypost_n";
						$u_anoig = "u_anoig_n";
						$thermo_orofis_drop = "thermo_orofis_drop_n";
						$thermo_dokoy_drop = "thermo_dokoy_drop_n";
						$arithmos_ypost  = "arithmos_ypost_n";
						$thermo_ypost_drop = "thermo_ypost_drop_n";

						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"5\"><b>" . $onoma . $i . "</b></td></td><td bgcolor=\"#00FFFF\"colspan=\"2\">Τύπος</td><td bgcolor=\"#00FFFF\">Πλήθος</td><td bgcolor=\"#00FFFF\">Θερμογέφυρα</td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $mikos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $ypsos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $paxos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$paxos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $u . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα οροφής</td><td>1</td>";
						echo "<td><select name=\"" . $thermo_orofis_drop . $i . "\">" . $thermo_d . $thermo_oe . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Δοκός " . $onoma . $i . "</td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $dokos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$dokos.$i}) . "\" /></td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $u_dok . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_dok.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα δοκού</td><td>1</td>";
						echo "<td><select name=\"" . $thermo_dokoy_drop . $i . "\">" . $thermo_edp . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $ypostil . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypostil.$i}) . "\" /></td><td colspan=\"2\"></td>";
						echo "<td><input type=\"text\" name=\"" . $u_ypost . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_ypost.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα Υποστυλώματος</td>";
						echo "<td><input type=\"text\" name=\"" . $arithmos_ypost . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$arithmos_ypost.$i}) . "\" /></td>";
						echo "<td><select name=\"" . $thermo_ypost_drop . $i . "\">" . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $mikos_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos_syr.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $ypsos_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos_syr.$i}) . "\" /></td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $u_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_syr.$i}) . "\" /></td></tr>";

						echo "<tr><td bgcolor=\"#99FFFF\" colspan=\"5\"><b>Ανοίγματα-" . $onoma . $i . "</b></td></td><td bgcolor=\"#99FFFF\">Είδος</td><td bgcolor=\"#99FFFF\">Αερισμός</td><td bgcolor=\"#99FFFF\">Λαμπάς</td><td bgcolor=\"#99FFFF\">Ανωκ./κατ.</td></tr>";
								for ($j = 1; $j <= $anoig_t_notia; $j++) {
								echo "<tr><td>Άνοιγμα " . $onoma . $i . "-" . $j . "</td>";
								echo "<td><input type=\"text\" name=\"" . $mikos . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos.$i.$j}) . "\" /></td>";
								echo "<td><input type=\"text\" name=\"" . $ypsos . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos.$i.$j}) . "\" /></td><td></td>";
								echo "<td><input type=\"text\" name=\"" . $u_anoig . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_anoig.$i.$j}) . "\" /></td>";
								echo "<td><select name=\"" . $drop_syr . $i . $j . "\">";
								echo "<option value=\"\" selected=\"selected\"></option>";
								echo "<option value=\"1\">Αδιαφανής πόρτα</option>";
								echo "<option value=\"syromeno\">Συρόμενο παράθυρο</option>";
								echo "<option value=\"anoigomeno\">Ανοιγόμενο παράθυρο</option>";
								echo "<option value=\"epallilo\">Επάλληλο παράθυρο</option>";
								echo "<option value=\"syromeniportaapli\">Συρόμενη πόρτα απλή</option>";
								echo "<option value=\"syromeniportadipli\">Συρόμενη πόρτα διπλή</option>";
								echo "<option value=\"anoigomeniportamoni\">Ανοιγόμενη πόρτα μονή</option>";
								echo "<option value=\"anoigomeniportadipli\">Ανοιγόμενη πόρτα διπλή</option>";
								echo "<option value=\"epalliliportadipli\">Επάλληλη πόρτα</option></select></td>";
								echo "<td><select name=\"" . $drop_aeras . $i . $j . "\">";
								echo "<option value=\"\" selected=\"selected\"></option>";;
								echo "<option value=\"15.1\">Παράθυρο με ξύλινο πλαίσιο: 15,1</option>";
								echo "<option value=\"12.5\">Παράθυρο με ξύλινο πλαίσιο: 12,5</option>";
								echo "<option value=\"10\">Παράθυρο με ξύλινο πλαίσιο: 10,0</option>";
								echo "<option value=\"11.8\">Πόρτα με ξύλινο πλαίσιο: 11,8</option>";
								echo "<option value=\"9.8\">Πόρτα με ξύλινο πλαίσιο: 9,8</option>";
								echo "<option value=\"7.9\">Πόρτα με ξύλινο πλαίσιο: 7,9</option>";
								echo "<option value=\"8.7\">Παράθυρο με συνθ πλαίσιο: 8,7</option>";
								echo "<option value=\"6.8\">Παράθυρο με συνθ πλαίσιο: 6,8</option>";
								echo "<option value=\"6.2\">Παράθυρο με συνθό πλαίσιο: 6,2</option>";
								echo "<option value=\"7.4\">Πόρτα με συνθ πλαίσιο: 7,4</option>";
								echo "<option value=\"5.3\">Πόρτα με συνθ πλαίσιο: 5,3</option>";
								echo "<option value=\"4.8\">Πόρτα με συνθ πλαίσιο: 4,8</option></select></td>";
								${"thermo_lampas_drop_n".$i.$j} = dropdown("SELECT name, y FROM thermo_l", "y", "name", "thermo_lampas_drop_n".$i.$j);
								echo "<td>" . ${"thermo_lampas_drop_n".$i.$j} . "</td>";
								${"thermo_anwkatw_drop_n".$i.$j} = dropdown("SELECT name, y FROM thermo_ak", "y", "name", "thermo_anwkatw_drop_n".$i.$j);
								echo "<td>" . ${"thermo_anwkatw_drop_n".$i.$j} . "</td></tr>";

								}
						}
						?>
						</table>
	</div>					
						
	<div class="content west">  		
					<table border="1">
						<br/><br/>
						<tr bgcolor="grey"><th colspan="9"><b>ΔΟΜΙΚΑ ΣΤΟΙΧΕΙΑ ΚΕΝΑΚ</b></th></tr>
						<tr><td><b>Όνομα στοιχείου</b></td><td><b>Μήκος<b></td><td><b>Ύψος</b></td><td><b>Πάχος</b></td><td><b>U</b></td></tr>	
						<tr bgcolor="#CC9933"><th colspan="9"><b>ΔΥΤΙΚΑ (270)</b></th></tr>
						<?php
						for ($i = 1; $i <= $t_dytika; $i++) {
						$onoma = "T-Δ";
						$mikos = "mikos_d";
						$ypsos = "ypsos_d";
						$paxos = "paxos_d";
						$dokos = "dokos_d";
						$ypostil = "ypostil_d";
						$u = "u_d";
						$mikos_syr = "mikos_syr_d";
						$ypsos_syr = "ypsos_syr_d";
						$u_syr = "u_syr_d";
						$drop_syr = "drop_syr_d";
						$drop_aeras = "drop_aeras_d";
						$u_dok = "u_dok_d";
						$u_ypost = "u_ypost_d";
						$u_anoig = "u_anoig_d";
						$thermo_orofis_drop = "thermo_orofis_drop_d";
						$thermo_dokoy_drop = "thermo_dokoy_drop_d";
						$arithmos_ypost  = "arithmos_ypost_d";
						$thermo_ypost_drop = "thermo_ypost_drop_d";
						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"5\"><b>" . $onoma . $i . "</b></td></td><td bgcolor=\"#00FFFF\"colspan=\"2\">Τύπος</td><td bgcolor=\"#00FFFF\">Πλήθος</td><td bgcolor=\"#00FFFF\">Θερμογέφυρα</td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $mikos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $ypsos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $paxos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$paxos.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $u . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα οροφής</td><td>1</td>";
						echo "<td><select name=\"" . $thermo_orofis_drop . $i . "\">" . $thermo_d . $thermo_oe . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Δοκός " . $onoma . $i . "</td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $dokos . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$dokos.$i}) . "\" /></td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $u_dok . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_dok.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα δοκού</td><td>1</td>";
						echo "<td><select name=\"" . $thermo_dokoy_drop . $i . "\">" . $thermo_edp . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $ypostil . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypostil.$i}) . "\" /></td><td colspan=\"2\"></td>";
						echo "<td><input type=\"text\" name=\"" . $u_ypost . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_ypost.$i}) . "\" /></td>";
						echo "<td colspan=\"2\">Θερμογέφυρα Υποστυλώματος</td>";
						echo "<td><input type=\"text\" name=\"" . $arithmos_ypost . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$arithmos_ypost.$i}) . "\" /></td>";
						echo "<td><select name=\"" . $thermo_ypost_drop . $i . "\">" . $thermo_pr . "</select></td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . $i . "</td>";
						echo "<td><input type=\"text\" name=\"" . $mikos_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos_syr.$i}) . "\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $ypsos_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos_syr.$i}) . "\" /></td><td></td>";
						echo "<td><input type=\"text\" name=\"" . $u_syr . $i . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_syr.$i}) . "\" /></td></tr>";

						echo "<tr><td bgcolor=\"#99FFFF\" colspan=\"5\"><b>Ανοίγματα-" . $onoma . $i . "</b></td></td><td bgcolor=\"#99FFFF\">Είδος</td><td bgcolor=\"#99FFFF\">Αερισμός</td><td bgcolor=\"#99FFFF\">Λαμπάς</td><td bgcolor=\"#99FFFF\">Ανωκ./κατ.</td></tr>";
								for ($j = 1; $j <= $anoig_t_dytika; $j++) {
								echo "<tr><td>Άνοιγμα " . $onoma . $i . "-" . $j . "</td>";
								echo "<td><input type=\"text\" name=\"" . $mikos . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$mikos.$i.$j}) . "\" /></td>";
								echo "<td><input type=\"text\" name=\"" . $ypsos . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$ypsos.$i.$j}) . "\" /></td><td></td>";
								echo "<td><input type=\"text\" name=\"" . $u_anoig . $i . $j . "\" maxlength=\"10\" size=\"5\" value=\"". htmlentities(${$u_anoig.$i.$j}) . "\" /></td>";
								echo "<td><select name=\"" . $drop_syr . $i . $j . "\">";
								echo "<option value=\"\" selected=\"selected\"></option>";
								echo "<option value=\"1\">Αδιαφανής πόρτα</option>";
								echo "<option value=\"syromeno\">Συρόμενο παράθυρο</option>";
								echo "<option value=\"anoigomeno\">Ανοιγόμενο παράθυρο</option>";
								echo "<option value=\"epallilo\">Επάλληλο παράθυρο</option>";
								echo "<option value=\"syromeniportaapli\">Συρόμενη πόρτα απλή</option>";
								echo "<option value=\"syromeniportadipli\">Συρόμενη πόρτα διπλή</option>";
								echo "<option value=\"anoigomeniportamoni\">Ανοιγόμενη πόρτα μονή</option>";
								echo "<option value=\"anoigomeniportadipli\">Ανοιγόμενη πόρτα διπλή</option>";
								echo "<option value=\"epalliliportadipli\">Επάλληλη πόρτα</option></select></td>";
								echo "<td><select name=\"" . $drop_aeras . $i . $j . "\">";
								echo "<option value=\"\" selected=\"selected\"></option>";
								echo "<option value=\"15.1\">Παράθυρο με ξύλινο πλαίσιο: 15,1</option>";
								echo "<option value=\"12.5\">Παράθυρο με ξύλινο πλαίσιο: 12,5</option>";
								echo "<option value=\"10\">Παράθυρο με ξύλινο πλαίσιο: 10,0</option>";
								echo "<option value=\"11.8\">Πόρτα με ξύλινο πλαίσιο: 11,8</option>";
								echo "<option value=\"9.8\">Πόρτα με ξύλινο πλαίσιο: 9,8</option>";
								echo "<option value=\"7.9\">Πόρτα με ξύλινο πλαίσιο: 7,9</option>";
								echo "<option value=\"8.7\">Παράθυρο με συνθ πλαίσιο: 8,7</option>";
								echo "<option value=\"6.8\">Παράθυρο με συνθ πλαίσιο: 6,8</option>";
								echo "<option value=\"6.2\">Παράθυρο με συνθό πλαίσιο: 6,2</option>";
								echo "<option value=\"7.4\">Πόρτα με συνθ πλαίσιο: 7,4</option>";
								echo "<option value=\"5.3\">Πόρτα με συνθ πλαίσιο: 5,3</option>";
								echo "<option value=\"4.8\">Πόρτα με συνθ πλαίσιο: 4,8</option></select></td>";
								${"thermo_lampas_drop_d".$i.$j} = dropdown("SELECT name, y FROM thermo_l", "y", "name", "thermo_lampas_drop_d".$i.$j);
								echo "<td>" . ${"thermo_lampas_drop_d".$i.$j} . "</td>";
								${"thermo_anwkatw_drop_d".$i.$j} = dropdown("SELECT name, y FROM thermo_ak", "y", "name", "thermo_anwkatw_drop_d".$i.$j);
								echo "<td>" . ${"thermo_anwkatw_drop_d".$i.$j} . "</td></tr>";

								}
						}
						?>
						</table>
	</div>
	</div>
						
					<input type="submit" name="submit1" value="calculate" />	
					</form>
					
			<?php } ?>