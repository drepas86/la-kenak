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
			
			<form name="form_dapedo_edafoys" accept-charset="utf-8" action="domika_kelyfos.php" method="post">
					<table border="1">
						<tr><th>Ονομαστικός συντελεστής Ufb [W/(m2K)]</th><th>Βάθος z (m)</th><th>Χαρακτηριστική διάσταση πλάκας B' (m)</th></tr>
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
			&nbsp;
			
			</div>
			
</div>			

