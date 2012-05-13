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
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions_skiaseis.php"); ?>
<?php include_once("includes/form_functions.php"); ?>
<?php 
$min=0;
if (isset($_GET['min'])) $min=$_GET['min'];
if (isset($_POST['min'])) $min=$_POST['min'];
?>
<?php find_selected_page(); ?>
<?php include("includes/header_skiaseis.php"); ?>

<?php if ($min!=1){?>
<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>

<?php }else{ ?><table><tr><?php } ?>
		<td id="page">

<?php 
//Υπολογισμός σκιάσεων από δεξιά και αριστερά
include("includes/apotelesmata_skiaseis_pleyrika.php"); 
?>
<?php 
//Υπολογισμός σκιάσεων από δεξιά και αριστερά
include("includes/apotelesmata_skiaseis_orizonta.php"); 
?>
<?php		
// Υπολογισμών σκιάσεων προβόλου αν υποβλήθηκε η φόρμα
include("includes/apotelesmata_skiaseis_provolou.php"); 
?>
<?php		
// Υπολογισμών σκιάσεων δεξιά και αριστερά αν υποβλήθηκε η φόρμα
include("includes/apotelesmata_skiaseis_dyo_meries.php");
?>
			<?php if ($sel_page) { ?><h2><?php echo $sel_page['menu_name']; ?></h2>
				<div class="page-content">
					<?php echo "<br/>";?>
					
					<?php
						//Φόρμα για Σκιάσεις από αριστερά ή δεξιά (περιπτώσεις 23,24)
					if ($sel_page["id"] > 22 && $sel_page["id"] < 25)	{ ?>
					<img src="images/pleyrika.png"></img><br/>
					<form action="index_skiaseis.php" method="post">
					<table border="1">
						<tr><td>Όνομα στοιχείου (Αλφαριθμητικό)</td><td>Πλάτος τοίχου (m)</td><td>Απόσταση τοίχου από εμπόδιο (m)</td><td>Πλάτος ανοίγματος (m)</td><td>Απόσταση ανοίγματος από εμπόδιο (m)</td><td>Απόσταση υαλοστασίων από εξωτερική παρειά (m)</td><td>Μήκος εμποδίου (m)</td><td>Θέση εμποδίου <br/>(1=αριστερά, 2=δεξιά)</td><td>Προσανατολισμός (μοίρες)</td></tr>
						<tr>
						<td><input type="text" name="name" required="required" maxlength="30" size="10" value="<?php echo htmlentities($name); ?>" /></td>
						<td><input type="text" name="platos_toixoy" required="required" maxlength="30" size="10" value="<?php echo htmlentities($platos_toixoy); ?>" /></td>
						<td width="30"><input type="text" name="apost_empod" required="required" maxlength="30" size="10" value="<?php echo htmlentities($apost_empod); ?>" /></td>
						<td width="30"><input type="text" name="platos_anoig" maxlength="30" size="10" value="<?php echo htmlentities($platos_anoig); ?>" /></td>
						<td width="30"><input type="text" name="apost_anoig_empod" maxlength="30" size="10" value="<?php echo htmlentities($apost_anoig_empod); ?>" /></td>
						<td width="30"><input type="text" name="apost_yalo" maxlength="30" size="10" value="<?php echo htmlentities($apost_yalo); ?>" /></td>
						<td><input type="text" name="mikos_empod" required="required" maxlength="30" size="10" value="<?php echo htmlentities($mikos_empod); ?>" /></td>
						<td><input type="text" name="thesi" maxlength="30" required="required" size="10" value="<?php echo htmlentities($thesi); ?>" /></td>
						<td><input type="text" name="pros" maxlength="30" required="required" size="10" value="<?php echo htmlentities($pros); ?>" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit1" value="calculate" /></td>
						</tr>
					</table>
					<input type="hidden" name="min" value=<?php echo $min; ?> /> 
					</form>
					<br/><br/> Πίνακας σκίασης από αριστερές πλευρικές προεξοχές: Πίνακας 3.20a της ΤΟΤΕΕ 20701-1.
					<br/> Πίνακας σκίασης από δεξιές πλευρικές προεξοχές: Πίνακας 3.20b της ΤΟΤΕΕ 20701-1.
					<?php } ?>
					<?php
						//Φόρμα για Σκιάσεις από ορίζοντα
					if ($sel_page["id"] == 25)	{ ?>
					<img src="images/orizontas.png"></img><br/>
					<form action="index_skiaseis.php" method="post">
					<table border="1">
						<tr><td>Όνομα στοιχείου (Αλφαριθμητικό)</td><td>Ύψος τοίχου (m) a</td><td>Ύψος πόρτας (m) b</td><td>Ύψος παραθύρου (m) c</td><td>Ύψος ποδιάς (m) d</td><td>Απόσταση υαλοστασίων από εξωτερική παρειά (m) g</td><td>Απόσταση εμποδίου (m) e</td><td>Ύψος εμποδίου (m) f</td><td>Προσανατολισμός (μοίρες)</td></tr>
						<tr>
						<td><input type="text" name="name" required="required" maxlength="30" size="10" value="<?php echo htmlentities($name); ?>" /></td>
						<td><input type="text" name="ipsos_toixoy" required="required" maxlength="30" size="10" value="<?php echo htmlentities($ipsos_toixoy); ?>" /></td>
						<td><input type="text" name="ipsos_portas" maxlength="30" size="10" value="<?php echo htmlentities($ipsos_portas); ?>" /></td>
						<td><input type="text" name="ipsos_parath" maxlength="30" size="10" value="<?php echo htmlentities($ipsos_parath); ?>" /></td>
						<td><input type="text" name="ipsos_podias" maxlength="30" size="10" value="<?php echo htmlentities($ipsos_podias); ?>" /></td>
						<td width="30"><input type="text" name="apost_yalo" maxlength="30" size="10" value="<?php echo htmlentities($apost_yalo); ?>" /></td>
						<td><input type="text" name="apost_empod" required="required" maxlength="30" size="10" value="<?php echo htmlentities($apost_empod); ?>" /></td>
						<td><input type="text" name="ypsos_empod" required="required" maxlength="30" size="10" value="<?php echo htmlentities($ypsos_empod); ?>" /></td>
						<td><input type="text" name="pros" required="required" maxlength="30" size="10" value="<?php echo htmlentities($pros); ?>" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit2" value="calculate" /></td>
						</tr>
					</table>
					<input type="hidden" name="min" value="<?php echo $min; ?>" /> 
					</form>
					<br/>
					Στην περίπτωση ύπαρξης πολλών φυσικών ή τεχνητών εμποδίων με διαφορετικό ύψος, τότε ως
					ανώτερη παρειά εμποδίου λαμβάνεται το μέσο ύψος όλων των εμποδίων, σταθμισμένο με το
					αντίστοιχο μήκος καθενός εμποδίου. (Παρ. 3.3.2 ΤΟΤΕΕ-20701-1.2nd edition)
					<br/><br/> Πίνακας σκίασης ορίζοντα: Πίνακας 3.18 της ΤΟΤΕΕ 20701-1.
					<?php } ?>
					
					<?php
						//Φόρμα για Σκιάσεις από πρόβολο
					if ($sel_page["id"] == 26)	{ ?>
					<img src="images/provolos.png"></img><br/>
					<form action="index_skiaseis.php" method="post">
					<table border="1">
						<tr><td>Όνομα στοιχείου (Αλφαριθμητικό)</td><td>Ύψος τοίχου (m) a</td><td>Ύψος πόρτας (m) b</td><td>Ύψος παραθύρου (m) c</td><td>Ύψος ποδιάς (m) d</td><td>Απόσταση υαλοστασίων από εξωτερική παρειά (m) g</td><td>Μήκος προβόλου (m) e</td><td>Προσανατολισμός (μοίρες)</td></tr>
						<tr>
						<td><input type="text" name="name" required="required" maxlength="30" size="10" value="<?php echo htmlentities($name); ?>" /></td>
						<td><input type="text" name="ipsos_toixoy" required="required" maxlength="30" size="10" value="<?php echo htmlentities($ipsos_toixoy); ?>" /></td>
						<td><input type="text" name="ipsos_portas" maxlength="30" size="10" value="<?php echo htmlentities($ipsos_portas); ?>" /></td>
						<td><input type="text" name="ipsos_parath" maxlength="30" size="10" value="<?php echo htmlentities($ipsos_parath); ?>" /></td>
						<td><input type="text" name="ipsos_podias" maxlength="30" size="10" value="<?php echo htmlentities($ipsos_podias); ?>" /></td>
						<td width="30"><input type="text" name="apost_yalo" maxlength="30" size="10" value="<?php echo htmlentities($apost_yalo); ?>" /></td>
						<td><input type="text" name="mikos_prov" required="required" maxlength="30" size="10" value="<?php echo htmlentities($mikos_prov); ?>" /></td>
						<td><input type="text" name="pros" required="required" maxlength="30" size="10" value="<?php echo htmlentities($pros); ?>" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit3" value="calculate" /></td>
						</tr>
					</table>
					<input type="hidden" name="min" value="<?php echo $min; ?>" /> 
					</form>
					<br/>
					Στην περίπτωση ύπαρξης πολλών φυσικών ή τεχνητών εμποδίων με διαφορετικό ύψος, τότε ως
					ανώτερη παρειά εμποδίου λαμβάνεται το μέσο ύψος όλων των εμποδίων, σταθμισμένο με το 
					αντίστοιχο μήκος καθενός εμποδίου. (Παρ. 3.3.3 ΤΟΤΕΕ-20701-1.2nd edition)
					<br/><br/> Πίνακας σκίασης για πρόβολο: Πίνακας 3.19 της ΤΟΤΕΕ 20701-1.
					<?php } ?>
					
					<?php
						//Φόρμα για Σκιάσεις από δεξιά και αριστερά
					if ($sel_page["id"] == 40)	{ ?>
					<img src="images/pleyrika.png"></img><br/>
					<form action="index_skiaseis.php" method="post">
					<table border="1">
						<tr><td>Όνομα στοιχείου (Αλφαριθμητικό)</td><td>Πλάτος τοίχου ή ανοίγματος (m)</td><td>Απόσταση από εμπόδιο αριστερά (m)</td><td>Μήκος εμποδίου αριστερά (m)</td><td>Απόσταση από εμπόδιο δεξιά (m)</td><td>Μήκος εμποδίου δεξιά (m)</td><td>Προσανατολισμός (μοίρες)</td></tr>
						<tr>
						<td><input type="text" name="name" required="required" maxlength="30" size="10" value="<?php echo htmlentities($name); ?>" /></td>
						<td><input type="text" name="platos_toixoy" required="required" maxlength="30" size="10" value="<?php echo htmlentities($platos_toixoy); ?>" /></td>
						<td width="30"><input type="text" name="apost_ar" required="required" maxlength="30" size="10" value="<?php echo htmlentities($apost_ar); ?>" /></td>
						<td width="30"><input type="text" name="mikos_ar" required="required" maxlength="30" size="10" value="<?php echo htmlentities($mikos_ar); ?>" /></td>
						<td width="30"><input type="text" name="apost_de" required="required" maxlength="30" size="10" value="<?php echo htmlentities($apost_de); ?>" /></td>
						<td width="30"><input type="text" name="mikos_de" required="required" maxlength="30" size="10" value="<?php echo htmlentities($mikos_de); ?>" /></td>
						<td><input type="text" name="pros" required="required" maxlength="30" size="10" value="<?php echo htmlentities($pros); ?>" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" name="submit4" value="calculate" /></td>
						</tr>
					</table>
					<input type="hidden" name="min" value="<?php echo $min; ?>" /> 
					</form>
					<br/><br/> Πίνακας σκίασης από αριστερές πλευρικές προεξοχές: Πίνακας 3.20α της ΤΟΤΕΕ 20701-1.
					<br/> Πίνακας σκίασης από δεξιές πλευρικές προεξοχές: Πίνακας 3.20β της ΤΟΤΕΕ 20701-1.
					<?php } ?>
					
					<?php 
					if ($sel_page["id"] != 40) {
					//Αν η επιλογή είναι απο αριστερά και δεξιά μην εμφανίζεις πίνακες με τιμές. Για τις άλλες 4 επιλογές εμφάνισε.
						$vivliothikes = get_skiaseis($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Μοίρες (degrees)</td><td>Περίοδος</td><td>Β (γ=0deg)</td><td>ΒΑ (γ=45deg)</td><td>Α (γ=90deg)</td><td>ΝΑ (γ=135deg)</td><td>Ν (γ=180deg)</td><td>ΝΔ (γ=225deg)</td><td>Δ (γ=270deg)</td><td>ΒΔ (γ=315deg)</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"50\">" . $vivliothikes[$i]["deg"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"50\">" . $vivliothikes[$i]["periode"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["b"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["ba"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["a"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["na"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["n"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["nd"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["d"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["bd"] . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)";
					}
					
					
					?>

				</div>
				
			<?php } else { ?>
				<br/>Η φόρμα υπολογίστηκε σωστά.
			<?php } ?>
		</td>

	</tr>
</table>

<?php 
if ($min!=1){
include("includes/footer.php"); 
}
?>


