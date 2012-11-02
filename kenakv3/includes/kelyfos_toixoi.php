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
$p="";
$tk="";
$call="";
if (isset($_GET['p'])) $p=$_GET['p'];
if (isset($_GET['t'])) $tk=$_GET['t'];
if (isset($_GET['t'])) $tk=$_GET['t'];
if (isset($_GET['lib'])) {
$call=$_GET['lib'];
}
if (!isset($paxos)) $paxos="";
	add_column_if_not_exist("domika_ylika_beton", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_diafora", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_epifstraera", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_epixrismata", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_gypsosanides", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_keramidia", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_ksyleia", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_monwtika", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_monwtikadow", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_plakes", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_skyrodemata", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_toyvla", "hatch", "INT(2)");
	add_column_if_not_exist("domika_ylika_ygromonwseis", "hatch", "INT(2)");
?>
	  <script type="text/javascript">
<!--document.getElementById('imgs').innerHTML="<img src=\"images/style/wall1.png\"></img><img src=\"images/style/floor.png\"></img><img src=\"images/style/roof.png\"></img>";-->
		floorid=0;
		wallid=0;
	  </script>
		<table width=100%><tr><td style="width:55%;vertical-align:middle;"><h2>Υπολογισμός U δομικού στοιχείου</h2></td>
		<td style="width:2%;vertical-align:middle;"><img src="./images/domika/save1.png" width="32px" height="32px" title="αποθήκευση" style="cursor:pointer;" onclick=savewall(); /></td>
		<td style="width:2%;vertical-align:middle;"><img src="./images/domika/load.png" width="32px" height="32px" title="ανάκτηση" style="cursor:pointer;" onclick=getwall(); /></td>
		<td style="width:5%;vertical-align:middle;"><img src="./images/domika/print.png" width="32px" height="32px" title="εκτύπωση" style="cursor:pointer;" onclick=showgraph(1); /></td>
		<td style="width:5%;vertical-align:middle;"><img src="./images/domika/qm.png" title="οδηγίες" style="cursor:pointer;" onclick=help_dom(); /></td>
		<td style="width:31%;vertical-align:middle;">&nbsp;</td>
		</tr></table>

	  <div id="tab-toix" class="tabdiv1" style="background-image: url(images/style/beige.png);" > 
			<form name="form_strwseis" accept-charset="utf-8" action="domika_kelyfos.php" method="post">
					<table border=0><tr><td>
					<b>Δομικό Στοιχείο: </b><input type="text" name="descr" id="descr" size="70" value="" />&nbsp;</td><td>
					    <select name="zwni" id="zwni" onchange="document.getElementById('umax').innerHTML='<b>&nbsp;Umax='+getumax()+'</b>';getria();" >
						<option value="0.60|1.50|1.50|0.50|0.50|1.20|1.20">Ζώνη Α</option>
						<option value="0.50|1.00|1.00|0.45|0.45|0.90|0.90">Ζώνη Β</option>
						<option value="0.45|0.80|0.80|0.40|0.40|0.75|0.75">Ζώνη Γ</option>
						<option value="0.40|0.70|0.70|0.35|0.35|0.70|0.70">Ζώνη Δ</option>
						</select></td><td id="umax" name="umax"><b>&nbsp;</b>
						</td></tr></table><br />
<!--------------------------------------------------------------------------------------->	
<!--    Κρυφό div που ανοίγει με jquery για την επιλογή δομικού στοιχείου από τη βάση  -->
		<div style='display:none'><div id='inline_content' style='padding:10px; background:#ebf9c9;'>
			<table><tr><td style="text-align:right;">
			Επιλογή τοίχου: </td><td>
			<select name="floors" id="walls"  size="1">
			<?php echo dropdown2("SELECT * FROM domika_toixoi","paxh","strwseis","name","walls"); ?>
			</select></td><td>
			&nbsp;<input type="button" style="cursor:pointer;" value="επιλογή" onclick=getname('walls'); /></td></tr><tr><td style="text-align:right;">
			<br/>Επιλογή δαπέδου - οροφής: </td><td>
			<br/><select name="floors" id="floors"  size="1">
			<?php echo dropdown2("SELECT * FROM domika_orofes ORDER by name","paxh","strwseis","name"); ?>
			<?php echo dropdown2("SELECT * FROM domika_pilotis ORDER by name","paxh","strwseis","name"); ?>
			<?php echo dropdown2("SELECT * FROM domika_dapedo_edafous ORDER by name","paxh","strwseis","name"); ?>
			</select></td><td>
			<br/>&nbsp;<input type="button" style="cursor:pointer;" value="επιλογή" onclick=getname('floors'); /></td></tr></table>
		</div></div>
<!------------------------------------------------------------------------------------>						
<!--      div για την αποθήκευση του τοίχου στη βάση                                -->
		<div style='display:none'><div id='inline_content1' style='padding:10px; background:#ebf9c9;'>
			
		</div></div>
<!------------------------------------------------------------------------------------>						
					<table border="1" style="width:98%;background:#efefef;">
						<tr style="background:#d6e2bc;"><td style="text-align:center;width:80px;">A/A</td>
						<td style="text-align:center;">Πάχος (m)</td>
						<td style="text-align:center;">Είδος στρώσης</td>
						<td style="text-align:center;">Tύπος στρώσης</td>
						<td style="text-align:center;">Συντ. λ</td>
						<td style="text-align:center;">d/λ</td></tr>
						<?php for ($i = 1; $i <= 10; $i++) {
						echo "<tr><td align=\"center\">" . $i . "</td>";
						echo "<td align=\"center\"><input type=\"text\" style=\"text-align:center;width:70px;\" name=\"paxos" . $i . "\" id=\"paxos" . $i . "\" maxlength=\"10\" value=\"" . htmlentities($paxos) . "\" onchange=getcl(".$i.") /></td>";?>
						<td align="center"><select name="eidos<?php echo $i; ?>" id="eidos<?php echo $i; ?>"  size="1" style="width:300px;" onchange="document.getElementById('strwsi<?php echo $i; ?>').innerHTML=getmat(<?php echo $i; ?>);">
						<?php
							echo "<option value=\" \" selected=\"selected\"> </option>";
							echo "<option value=\"1\">Επιφανειακή στρώση αέρα</option>";
							echo "<option value=\"2\">Μπετόν</option>";
							echo "<option value=\"3\">Επιχρίσματα</option>";
							echo "<option value=\"4\">Γυψοσανίδες</option>";
							echo "<option value=\"5\">Κεραμίδια</option>";
							echo "<option value=\"6\">Ξυλεία</option>";
							echo "<option value=\"7\">Μονωτικά</option>";
							echo "<option value=\"8\">Μονωτικά DOW</option>";
							echo "<option value=\"9\">Πλάκες</option>";
							echo "<option value=\"10\">Σκυροδέματα</option>";
							echo "<option value=\"11\">Τούβλα</option>";
							echo "<option value=\"12\">Υγρομονώσεις</option>";
							echo "<option value=\"13\">Διάφορα</option>";
							echo "</select></td><td   align=\"center\">";
						echo "<select name=\"strwsi" . $i . "\" id=\"strwsi" . $i . "\" style=\"width:300px;\" onchange=getcl(".$i.");>";
						echo "<option>&nbsp;</option>";
						echo "</select></td><td align=\"center\"><input type=\"text\" id=\"cl".$i."\" style=\"text-align:center;width:50px;\" disabled=\"disabled\"  class=\"disabled\"/></td>";
						echo "<td align=\"center\"><input type=\"text\" id=\"dl".$i."\" style=\"text-align:center;width:50px;\" disabled=\"disabled\"  class=\"disabled\"/></td>";
						}
						?>
						</tr><tr>
							<td></td><td align="center"><input type="text" id="sum2" style="text-align:center;width:70px;font-weight:bold;" disabled="disabled" class="disabled" value="0.000" /></td>
							<td colspan="2" align="center">
<!--
							<button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=showgraph(0); >Σκαρίφημα</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=savewall(); >Αποθήκευση</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;"  disabled="disabled">Διαγραφή</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;"  disabled="disabled">Προσθήκη</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=getwall(); >Ανάκτηση</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;"  onclick=showgraph(1); >Εκτύπωση</button>
-->
							</td> 
							<td align="right">R<sub>Λ</sub>=</td>
							<td align="center"><input type="text" id="sum1" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled" class="disabled" value="0.000" />
							</td>
						</tr></tr>
						<tr style="background:#ffffff;">
						<td align="center" colspan="4" id="myHeader1" style="vertical-align:middle;">αντιστάσεις θερμικής μετάβασης:&nbsp;
							<select name="Ria" id="Ria" onchange=getria()>
							<option value=" | "></option>
							<option value="0.13|0.04">Εξωτερικοί τοίχοι και παράθυρα (προς εξωτ. αέρα)</option>
							<option value="0.13|0.13">Τοίχος που συνορεύει με μη θερμαινόμενο χώρο</option>
							<option value="0.13|0.00">Τοίχος σε επαφή με το έδαφος</option>
							<option value="0.10|0.04">Στέγες, δώματα (ανερχόμενη ροή θερμότητας)</option>
							<option value="0.10|0.10">Οροφή που συνορεύει με μη θερμαινόμενο χώρο</option>
							<option value="0.17|0.04">Δάπεδο επάνω από ανοικτή διάβαση (pilotis)</option>
							<option value="0.17|0.17">Δάπεδο επάνω από μη θερμαινόμενο χώρο (κατερχόμενη ροή)</option>
							<option value="0.17|0.00">Δάπεδο σε επαφή με το έδαφος</option>
						</select></td>
						<td align="right">R<sub>i</sub>=</td>
						<td align="center"><input type="text" id="sum3" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled" class="disabled" />
						</tr>
						<tr style="background:#efefef;">
						<script type="text/javascript">document.getElementById("myHeader1").rowSpan="2";</script>
						<td style="background:#ffffff;text-align:right;">R<sub>a</sub>=</td>
						<td style="background:#ffffff;text-align:center;"><input type="text" id="sum4" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled" class="disabled" />
						</tr><tr style="background:#efefef;">
						<td align="center" colspan="4" style="vertical-align:middle;">θερμική αντίσταση κεραμοσκεπής:&nbsp;
							<select name="Roof" id="Roof" onchange=getroof()>
							<option value=" | "></option>
							<option value="0.06">Κεραμοσκεπή επί τεγίδων χωρίς σανίδωμα</option>
							<option value="0.20">Κεραμοσκεπή με σανίδωμα ή μεμβράνη</option>
							<option value="0.30">Κεραμοσκεπή με σανίδωμα ή μεμβράνη και φύλλο αλουμινίου</option>
							<option value="0.30">Κεραμοσκεπή με σανίδωμα και μεμβράνη</option>
						</select></td>
						<td align="right">R<sub>u</sub>=</td>
						<td align="center"><input type="text" id="sum6" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled" class="disabled" />
						</tr><tr style="background:#ffffff;">
						<td colspan="4" style="vertical-align:middle;text-align:center;">στρώμα αέρα πάχους:&nbsp;
							<select name="air" id="air" onchange=getair()>
							<option value=" | "></option>
							<option value=".11|.11|.11|.19|.19|.19|.18|.18|.18|.17|.17|.17">5</option>
							<option value=".13|.13|.13|.26|.26|.26|.25|.25|.25|.22|.22|.22">7</option>
							<option value=".15|.15|.15|.36|.36|.36|.33|.33|.33|.29|.29|.29">10</option>
							<option value=".17|.16|.17|.52|.45|.52|.46|.41|.46|.38|.34|.38">15</option>
							<option value=".18|.16|.19|.67|.45|.80|.57|.41|.66|.44|.34|.50">25</option>
							<option value=".18|.16|.21|.67|.45|.80|.57|.41|.66|.44|.34|.67">50</option>
							<option value=".18|.16|.22|.67|.45|.80|.57|.41|.66|.44|.34|.75">100</option>
							<option value=".18|.16|.23|.67|.45|.80|.57|.41|.66|.44|.34|.75">300</option>
						</select>&nbsp;mm<hr />
						ροή 
						<input type="radio" id="fl1" name="flowdir" value="1" onclick=getair() />οριζόντια 
						<input type="radio" id="fl2" name="flowdir" value="2" onclick=getair() />από κάτω προς τα πάνω 
						<input type="radio" id="fl3" name="flowdir" value="3" onclick=getair() />από πάνω προς τα κάτω <hr/>
						ανακλαστική επιφάνεια με ε = 
						<input type="radio" id="refl1" name="refl" value="1" onclick=getair() />0.80
						<input type="radio" id="refl2" name="refl" value="2" onclick=getair() />0.05
						<input type="radio" id="refl3" name="refl" value="3" onclick=getair() />0.10
						<input type="radio" id="refl4" name="refl" value="4" onclick=getair() />0.20
						</td>
						<td style="vertical-align:middle;text-align:right;">R<sub>δ</sub>=</td>
						<td style="vertical-align:middle;text-align:center;"><input type="text" id="sum7" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled" class="disabled" /></td>
						</tr><tr style="vertical-align:middle;background:#d6e2bc;">
						<td colspan="4" style="vertical-align:middle;text-align:center;">
						U = <input type="text" id="U" style="cursor:pointer;text-align:center;width:50px;font-weight:bold;" class="disabled" 
						onclick=parent.get_ut(this.value,<?=$p;?>,'<?=$tk;?>',document.getElementById('sum2').value); />
						<img id="OK" src="images/domika/blank.png" style="vertical-align:middle;"></img>
						</td> 
						<td align="right">R<sub>ολ</sub>=</td>
						<td align="center"><input type="text" id="sum5" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled"  class="disabled"/>
						</tr>
					</table>
				
					</form>
					<div id="graph"style="width:740px;height:300px;"> </div>

					
<!------------------------------------------------------------------------------------------->						
<!--              κρυφό div για HELP                                                       -->
<!------------------------------------------------------------------------------------------->						
<div style='display:none'><div id='help_box' style='width:500px;padding:10px; background:#ebf9c9;'>
<strong>Υπολογισμός U Δομικών Στοιχείων</strong><hr />
Στη σελίδα αυτή γίνονται οι υπολογισμοί της θερμοπερατότητας τοίχων, δαπέδων και οροφών.<br /><br /> 
Επιλέξτε για κάθε στρώση πρώτα την κατηγορία (είδος) της στρώσης και έπειτα το υλικό (τύπο) της στρώσης.<br /><br />
Συμπληρώνοντας τα πάχη (σε μέτρα) των στρώσεων, το πρόγραμμα εκτελεί τους απαραίτητους υπολογισμούς.<br /><br />
Για να υπολογιστεί το U πρέπει να επιλεγούν τουλάχιστον οι συντελεστές θερμικής μετάβασης.<br /><br />
Είναι δυνατή επίσης και η επιλογή τυχόν κεραμοσκεπής πάνω από μονωμένη οροφή καθώς και κενού στρώματος αέρα.
<hr />Με το εικονίδιο <img src="./images/domika/load.png" width="32px" height="32px" style="vertical-align:middle;" /> (ανάκτηση) 
ανακτούνται από το αρχείο τα στοιχεία του δομικού στοιχείου που θα επιλεγεί στο παράθυρο που ανοίγει.<br /><br />
Με το εικονίδιο <img src="./images/domika/save1.png" width="32px" height="32px" style="vertical-align:middle;"  /> (αποθήκευση ) 
αποθηκεύονται οι αλλαγές που ενδεχομένως έγιναν στο στοιχείο. 
Αν πρόκειται για νέο δομικό στοιχείο τότε γίνεται εισαγωγή του στη βάση. Το ίδιο συμβαίνει για στοιχείο του οποίου ανακτήθηκαν τα δεδομένα 
αλλά τροποποιήθηκε το όνομά του.<br /><br />
Με το εικονίδιο <img src="./images/domika/print.png" width="32px" height="32px" style="vertical-align:middle;"  /> (εκτύπωση) 
δημιουργείται αρχείο PDF με τους υπολογισμούς και το σκαρίφημα του δομικού στοιχείου.
<hr />
Αν η σελίδα αυτή έχει κληθεί από το "ΜΕΛΕΤΗ - Δομικά Στοιχεία", με κλικ στην τιμή του U μεταφέρονται οι τιμές στο δομικό στοιχείο από το οποίο έγινε η κλήση.

</div></div>
<!------------------------------------------------------------------------------------------->						
					
					
<?php if ($call<>""){ ?>
		<script type="text/javascript">
			document.getElementById('walls').selectedIndex=<?=$call;?>;
			document.getElementById('Ria').selectedIndex=1;
			getname('walls');
		</script>
<?php } ?>
					
</div>					
