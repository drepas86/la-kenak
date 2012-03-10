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
if (isset($_GET['p'])) $p=$_GET['p'];
if (isset($_GET['t'])) $tk=$_GET['t'];
if (!isset($paxos)) $paxos="";
?>

	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/wall1.png\"></img><img src=\"images/style/floor.png\"></img><img src=\"images/style/roof.png\"></img>";
	  </script>
	  <h2>Υπολογισμός U δομικού στοιχείου</h2>
	  <div id="tab-toix" class="tabdiv1"> 
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
<!------------------------------------------------------------------------------------>	
<!--      Κρυφό div που ανοίγει με jquery για την επιλογή τοίχου από τη βάση        -->
		<div style='display:none'><div id='inline_content' style='padding:10px; background:#ebf9c9;'>
			<table><tr><td>
			Επιλογή τοίχου: </td><td>
			<?php echo dropdown2("SELECT * FROM domika_toixoi","paxh","strwseis","name","walls"); ?></td><td>
			&nbsp;<input type="button" style="cursor:pointer;" value="επιλογή" onclick=getname('walls'); /></td></tr><tr><td>
			<br/>Επιλογή δαπέδου - οροφής: </td><td>
			<br/><?php echo dropdown2("SELECT * FROM domika_floors","paxh","strwseis","name","floors"); ?></td><td>
			<br/>&nbsp;<input type="button" style="cursor:pointer;" value="επιλογή" onclick=getname('floors'); /></td></tr></table>
		</div></div>
<!------------------------------------------------------------------------------------>						
<!--      div για την αποθήκευση του τοίχου στη βάση                                -->
		<div style='display:none'><div id='inline_content1' style='padding:10px; background:#ebf9c9;'>
			
		</div></div>
<!------------------------------------------------------------------------------------>						
					<table border="1" width="770px;">
						<tr><td>A/A</td><td>Πάχος (m)</td><td>Είδος στρώσης</td><td>Tύπος στρώσης</td><td>Συντ. λ</td><td align="center">d/λ</td></tr>
						<?php for ($i = 1; $i <= 10; $i++) {
						echo "<tr><td align=\"center\">" . $i . "</td>";
						echo "<td align=\"center\"><input type=\"text\" style=\"text-align:center;width:70px;\" name=\"paxos" . $i . "\" id=\"paxos" . $i . "\" maxlength=\"10\" value=\"" . htmlentities($paxos) . "\" onchange=getcl(".$i.") /></td>";?>
						<td align="center"><select name="eidos<?php echo $i; ?>" id="eidos<?php echo $i; ?>"  size="1" onchange="document.getElementById('strwsi<?php echo $i; ?>').innerHTML=getmat(<?php echo $i; ?>);">
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
							echo "</select></td><td width='300px'  align=\"center\">";
						echo "<select name=\"strwsi" . $i . "\" id=\"strwsi" . $i . "\" style=\"width:260px;\" onchange=getcl(".$i.");>";
						echo "<option>&nbsp;</option>";
						echo "</select></td><td align=\"center\"><input type=\"text\" id=\"cl".$i."\" style=\"text-align:center;width:50px;\" disabled=\"disabled\"  class=\"disabled\"/></td>";
						echo "<td align=\"center\"><input type=\"text\" id=\"dl".$i."\" style=\"text-align:center;width:50px;\" disabled=\"disabled\"  class=\"disabled\"/></td>";
						}
						?>
						</tr><tr>
							<td></td><td align="center"><input type="text" id="sum2" style="text-align:center;width:70px;font-weight:bold;" disabled="disabled" class="disabled" value="0.000" /></td>
							<td colspan="2" align="center">
							<button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=showgraph(0); >Σκαρίφημα</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=savewall(); >Αποθήκευση</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;"  >Διαγραφή</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;"  >Προσθήκη</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;" onclick=getwall(); >Ανάκτηση</button>
							<button type="button" style="background-color:#fee3ad;cursor:pointer;"  onclick=showgraph(1); >Εκτύπωση</button>
							</td> 
							<td align="right">R<sub>Λ</sub>=</td>
							<td align="center"><input type="text" id="sum1" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled" class="disabled" value="0.000" />
							</td>
						</tr></tr>
						<tr>
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
						<tr>
						<script type="text/javascript">document.getElementById("myHeader1").rowSpan="2";</script>
						<td align="right">R<sub>a</sub>=</td>
						<td align="center"><input type="text" id="sum4" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled" class="disabled" />
						</tr><tr>
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
						</tr><tr>
						<td align="center" colspan="4" style="vertical-align:middle;">στρώμα αέρα πάχους:&nbsp;
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
						<td align="right"style="vertical-align:middle;">R<sub>δ</sub>=</td>
						<td align="center"style="vertical-align:middle;"><input type="text" id="sum7" style="text-align:center;width:50px;font-weight:bold;" disabled="disabled" class="disabled" />
						</tr><tr>
						<td align="center" colspan="4" style="vertical-align:middle;">
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
</div>					
