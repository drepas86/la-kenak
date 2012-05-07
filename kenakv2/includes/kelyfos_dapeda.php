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

			<script type="text/javascript">
				document.getElementById('imgs').innerHTML="<img src=\"images/style/grass.png\"></img>";
			</script>
			<h2>Υπολογισμός ισοδυνάμων U' δομικών στοιχείων σε επαφή με το έδαφος</h2>
			
			<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#tab-u1">Οριζόντια στοιχεία</a></li>
					<li><a href="#tab-u2">Κατακόρυφα στοιχεία</a></li>
					</ul>  
<!-- **************		ΟΡΙΖΟΝΤΙΑ ΣΤΟΙΧΕΙΑ   ******************************************-->			
			<div id="tab-u1" class="tabdiv" > 
			<h3>Ισοδύναμος συντελεστής θερμοπερατότητας U'<sub>FB</sub> [W/(m<sup>2</sup>K)] οριζόντιου δομικού στοιχείου 
			</br>ονομαστικού συντελεστή θερμοπερατότητας U<sub>fb</sub> [W/(m<sup>2</sup>K)] με χαρακτηριστική διάσταση πλάκας Β' που εκτείνεται σε βάθος z [m] </h3>
			<img src="images/ufb.png">
			<form name="form_dapedo_edafoys" accept-charset="utf-8" action="domika_kelyfos.php" method="post">
					<table border="1">
						<tr><th>Ονομαστικός συντελεστής U<sub>fb</sub> <br/>[W/(m<sup>2</sup>K)]</th><th>Βάθος z <br/>(m)</th><th>Χαρακτηριστική διάσταση πλάκας B' <br/>(m)</th>
						<th>Πίνακας 3.8<br/>ΤΟΤΕΕ-20701-1</th></tr>
						<?php
						echo "<tr><td><input type=\"text\" name=\"dapedo_ufb\" maxlength=\"10\" size=\"10\" value=\"" . htmlentities($dapedo_ufb) . "\" /></td>";
						echo "<td><select name=\"vathos\" size=\"1\">";
							echo "<option value=\"0\">0.0</option>";
							echo "<option value=\"0.5\">0.5</option>";
							echo "<option value=\"1\">1.0</option>";
							echo "<option value=\"1.5\">1.5</option>";
							echo "<option value=\"2\">2.0</option>";
							echo "<option value=\"2.5\">2.5</option>";
							echo "<option value=\"3\">3.0</option>";
							echo "<option value=\"4.5\">4.5</option>";
							echo "<option value=\"6\">6.0</option>";
							echo "<option value=\"9\">9.0</option>";
							echo "</select></td>";
						echo "<td><input type=\"text\" name=\"xaraktiristiki\" maxlength=\"10\" size=\"10\" value=\"" . htmlentities($xaraktiristiki) . "\" /></td>";
						?>

						<td>
							<input type="submit" name="submit3" value="calculate" />
						</td>
						</tr>
					</table>
					
					</form>
			
			</div>
<!-- **************		ΚΑΤΑΚΟΡΥΦΑ ΣΤΟΙΧΕΙΑ   *****************************************-->		
			<div id="tab-u2" class="tabdiv" > 
			<h3>Ισοδύναμος συντελεστής θερμοπερατότητας U'<sub>TB</sub> [W/(m<sup>2</sup>K)] ενός κατακόρυφου δομικού στοιχείου 
			<br/>ονομαστικού συντελεστή θερμοπερατότητας U<sub>tb</sub> [W/(m<sup>2</sup>K)] που εκτείνεται σε βάθος z [m]</h3>
			<img src="images/utbz1.png">
			<form name="form_iso_katakoryfa1" accept-charset="utf-8" action="domika_kelyfos.php" method="post">
					<table border="1">
						<tr><th>Ονομαστικός συντελεστής U<sub>tb</sub> <br/>[W/(m<sup>2</sup>K)]</th><th>Βάθος z <br/>(m)</th>
						<th>Πίνακας 3.7<br/>ΤΟΤΕΕ-20701-1</th></tr>
						<tr><td><input type="text" name="katakoryfo_utb" id="katakoryfo_utb" maxlength="10" size="10" value="<?php htmlentities($dapedo_utb)?>" onkeyup=calcufbz1(); /></td>
						<td><select name="vathos" id="vathos" size="1" onchange=calcufbz1(); >
							<option value="0.5">0.5</option>
							<option value="1">1.0</option>
							<option value="1.5">1.5</option>
							<option value="2">2.0</option>
							<option value="2.5">2.5</option>
							<option value="3">3.0</option>
							<option value="4.5">4.5</option>
							<option value="6">6.0</option>
							<option value="9">9.0</option>
							</select></td>

						<td>
							<input type="submit" name="submit4" value="calculate" />
						</td>
						</tr>
					</table>
					<div id="ufb1_info"></div>
			</form>
			<h3>Ισοδύναμος συντελεστής θερμοπερατότητας U'<sub>TB</sub> [W/(m<sup>2</sup>K)] ενός κατακόρυφου δομικού στοιχείου 
			<br/>ισοδύναμου συντελεστή θερμοπερατότητας U'<sub>tb</sub>1 [W/(m<sup>2</sup>K)] σε βάθος z<sub>1</sub> [m] και
			<br/>ισοδύναμου συντελεστή θερμοπερατότητας U'<sub>tb</sub>2 [W/(m<sup>2</sup>K)] σε βάθος z<sub>2</sub> [m]</h3>
			<img src="images/utbz1z2.png">
			
					<table border="1">
						<tr><th>Ισοδύναμος συντελεστής U'<sub>tb</sub>1 <br/>[W/(m<sup>2</sup>K)]</th><th>Βάθος z<sub>1</sub> <br/>(m)</th>
						<th>Ισοδύναμος συντελεστής U'<sub>tb</sub>2 <br/>[W/(m<sup>2</sup>K)]</th><th>Βάθος z<sub>2</sub> <br/>(m)</th>
						</tr>
						<tr><td><input type="text" name="katakoryfo_utb1" id="katakoryfo_utb1" maxlength="10" size="10" value="<?php htmlentities($dapedo_utb)?>" onkeyup=calcufbz1z2(); /></td>
						<td><select name="vathos1" id="vathos1" size="1" onchange=calcufbz1z2(); >
							<option value="0.5">0.5</option>
							<option value="1">1.0</option>
							<option value="1.5">1.5</option>
							<option value="2">2.0</option>
							<option value="2.5">2.5</option>
							<option value="3">3.0</option>
							<option value="4.5">4.5</option>
							<option value="6">6.0</option>
							<option value="9">9.0</option>
							</select></td>
						<td><input type="text" name="katakoryfo_utb2" id="katakoryfo_utb2" maxlength="10" size="10" value="<?php htmlentities($dapedo_utb)?>" onkeyup=calcufbz1z2(); /></td>
						<td><select name="vathos2" id="vathos2" size="1" onchange=calcufbz1z2(); >
							<option value="0.5">0.5</option>
							<option value="1">1.0</option>
							<option value="1.5">1.5</option>
							<option value="2">2.0</option>
							<option value="2.5">2.5</option>
							<option value="3">3.0</option>
							<option value="4.5">4.5</option>
							<option value="6">6.0</option>
							<option value="9">9.0</option>
							</select></td>
						
						</tr>
					</table>
				
					<br/>
					<table style="text-align:middle;">
					<tr><th>Πίνακας 3.7<br/>ΤΟΤΕΕ-20701-1</th><th></th></tr>
					<tr><td><img src="images/ufbz1z2_equation.png"></td><td><br/><br/>= <input type="text" id="ufbz1z2" size="6" disabled="disabled"/> [W/(m<sup>2</sup>K)]</td></tr>
					</table>
					<div id="ufb_info"></div>
			</div>
			
</div>			

