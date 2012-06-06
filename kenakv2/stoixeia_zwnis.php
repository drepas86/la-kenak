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
*/?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php find_selected_page(); ?>

<?php include("includes/header_znx.php"); ?>
<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
		<td id="page">
<?php
include("includes/apotelesmata_mesi_kat_znx.php");
?>	
<?php	
include("includes/apotelesmata_dieisdysi.php");
?>	
	
<?php	if ($sel_page["id"] == 1)	{ ?>

<script language="JavaScript">
function get_active(){
document.getElementById("tabvanilla").style.display="block";
}
</script>
			
<div id="tabvanilla" class="widget" style="display:none;">
		<ul class="tabnav">  
		<li><a href="#tab-znx">Υπολογισμός ΖΝΧ</a></li>
		</ul>
		
		<div id="tab-znx" class="tabdiv">
			<h2>Μέση κατανάλωση ΖΝΧ</h2>
			<img src="images/style/znx.png"></img>
			<form accept-charset="utf-8" action="stoixeia_zwnis.php" method="post">
					<table border="1">
						<tr><td>Εμβαδόν ζώνης / Κλίνες / Υπνοδωμάτια</td>
						<td><input type="text" name="embadon" required="required" maxlength="30" value="<?php echo htmlentities($embadon); ?>" /></td>
						</tr>
						<tr>
						<td>Επιλογή Χρήσης (συντελεστής ΖΝΧ)</td>
						<td><?php $list = dropdown("SELECT xrisi, znx_m3_sq_y FROM energy_conditions", "znx_m3_sq_y", "xrisi", "drop_name"); echo $list; ?></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit1" value="calculate" /></td>
						</tr>
					</table>
					</form>
		</div>
</div>		
<?php } ?>


		
		<?php	if ($sel_page["id"] == 2)	{ ?>
		
<script language="JavaScript">
function get_active(){
document.getElementById("tabvanilla").style.display="block";
}
</script>
			
<div id="tabvanilla" class="widget" style="display:none;">
		<ul class="tabnav">  
		<li><a href="#tab-aerismos">Διείσδυση αέρα</a></li>
		</ul>
		
		<div id="tab-znx" class="tabdiv">
			<h2>Διείσδυση αέρα από κουφώματα</h2>
			<img src="images/style/window1.png"></img>
			<form action="stoixeia_zwnis.php" method="post">
					<table border="1">
						<tr><td><b>Εμβαδόν ζώνης</b></td><td><b>Επιλογή Χρήσης (συντελεστής αερισμού σε m³/h/m²)</b></td></tr>
						<tr>
						<td><input type="text" name="embadon" required="required" maxlength="30" value="<?php echo htmlentities($embadon); ?>" /></td>
						<td><?php $list = dropdown("SELECT xrisi, nwpos_aeras_m2 FROM energy_conditions", "nwpos_aeras_m2", "xrisi", "drop_name"); echo $list; ?></td>
						</tr>
						</table>
						<table border="1">
						<br/><br/>
						<tr><td><b>Είδος ανοίγματος</b></td><td><b>Εμβαδόν παραθύρων<b></td><td><b>Εμβαδόν θυρών</b></td><td><b>Πίνακας 3.26 <br/>παράθυρα <br/>(m³/h/m²)</b></td><td><b>Πίνακας 3.26 <br/>πόρτες <br/>(m³/h/m²)</b></td></tr>
						<tr><td><b>Κουφώματα με ξύλινο πλαίσιο</b></td></tr>
						<tr>
						<td>Κούφωμα με μονό υαλοπίνακα, μη αεροστεγές χωνευτό ή συρόμενο</td>
						<td><input type="text" name="embadon_parath1" maxlength="30" value="<?php echo htmlentities($embadon_parath1); ?>" /></td>
						<td><input type="text" name="embadon_thyr1" maxlength="30" value="<?php echo htmlentities($embadon_thyr1); ?>" /></td>
						<td>15,1</td>
						<td>11,8</td>
						</tr>
						<tr>
						<td>Κούφωμα με δίδυμο υαλοπίνακα, συρόμενα επάλληλα ή μη, με ψύκτρες, αεροστεγές, με πιστοποίηση.<br/>Ανοιγόμενο κούφωμα με διπλό υαλοπίνακα, μη πιστοποιημένο.</td>
						<td><input type="text" name="embadon_parath2" maxlength="30" value="<?php echo htmlentities($embadon_parath2); ?>" /></td>
						<td><input type="text" name="embadon_thyr2" maxlength="30" value="<?php echo htmlentities($embadon_thyr2); ?>" /></td>
						<td>12,5</td>
						<td>9,8</td>
						</tr>
						<tr>
						<td>Ανοιγόμενο κούφωμα με δίδυμο υαλοπίνακα, αεροστεγές, με πιστοποίηση.<br/>Κούφωμα χωρίς υαλοπίνακα, αεροστεγές, με πιστοποίηση.</td>
						<td><input type="text" name="embadon_parath3" maxlength="30" value="<?php echo htmlentities($embadon_parath3); ?>" /></td>
						<td><input type="text" name="embadon_thyr3" maxlength="30" value="<?php echo htmlentities($embadon_thyr3); ?>" /></td>
						<td>10</td>
						<td>7,9</td>
						</tr>
						<tr>
						<tr><td><b>Κουφώματα με μεταλλικό ή συνθετικό πλαίσιο</b></td></tr>
						<tr>
						<td>Κούφωμα με μονό υαλοπίνακα, μη αεροστεγές χωνευτό ή συρόμενο</td>
						<td><input type="text" name="embadon_parath4" maxlength="30" value="<?php echo htmlentities($embadon_parath4); ?>" /></td>
						<td><input type="text" name="embadon_thyr4" maxlength="30" value="<?php echo htmlentities($embadon_thyr4); ?>" /></td>
						<td>8,7</td>
						<td>7,4</td>
						</tr>
						<tr>
						<td>Κούφωμα με δίδυμο υαλοπίνακα, συρόμενα επάλληλα ή μη, με ψύκτρες, αεροστεγές, με πιστοποίηση.<br/>Ανοιγόμενο κούφωμα με διπλό υαλοπίνακα, μη πιστοποιημένο.</td>
						<td><input type="text" name="embadon_parath5" maxlength="30" value="<?php echo htmlentities($embadon_parath5); ?>" /></td>
						<td><input type="text" name="embadon_thyr5" maxlength="30" value="<?php echo htmlentities($embadon_thyr5); ?>" /></td>
						<td>6,8</td>
						<td>5,3</td>
						</tr>
						<tr>
						<td>Ανοιγόμενο κούφωμα με δίδυμο υαλοπίνακα, αεροστεγές, με πιστοποίηση.<br/>Κούφωμα χωρίς υαλοπίνακα, αεροστεγές, με πιστοποίηση.</td>
						<td><input type="text" name="embadon_parath6" maxlength="30" value="<?php echo htmlentities($embadon_parath6); ?>" /></td>
						<td><input type="text" name="embadon_thyr6" maxlength="30" value="<?php echo htmlentities($embadon_thyr6); ?>" /></td>
						<td>6,2</td>
						<td>4,8</td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit2" value="calculate" /></td>
						</tr>
					</table>
					</form>
					<br/>
					Για τα μερικώς ανοιγόμενα κουφώματα των γυάλινων προσόψεων (π.χ. με προβαλλόμενα τμήματα)
					λαμβάνεται υπόψη μόνο το μη σταθερό τμήμα, ανάλογα προς τις παραπάνω κατηγορίες αυτού του πίνακα. (Παρ. 3.4.2 ΤΟΤΕΕ-20701-1.2nd edition)
					
		</div>
</div>
	<?php } ?>
	
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>