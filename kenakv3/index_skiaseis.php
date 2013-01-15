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
<?php 
require_once("includes/connection.php");
require_once("includes/functions_skiaseis.php");
include_once("includes/form_functions.php");
require_once("includes/session.php");

$min=0;
if (isset($_GET['min'])) $min=$_GET['min'];
if (isset($_POST['min'])) $min=$_POST['min'];

find_selected_page();
confirm_logged_in();
include("includes/header_skiaseis.php"); 

if (isset($_SESSION['user_id'])){$login_message="Καλωσήρθες, <a href=\"staff.php\">".$_SESSION['username']."</a>";}
if (isset($_SESSION['meleti_id'])){$login_message.=" - Μελέτη: ".$_SESSION['meleti_perigrafi'];}
if (!isset($_SESSION['meleti_id'])){$login_message.=" - Επιλέξτε μελέτη πρώτα";}
if (!isset($_SESSION['user_id'])){$login_message="<a href=\"login.php\">Σύνδεση</a>";}
?>

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
					<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr style="background-color:#ddd;border:1px #6699CC dotted;">
						<td style="border:1px #6699CC dotted;vertical-align:middle;">α/α</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Όνομα στοιχείου (Αλφαριθμητικό)</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Πλάτος τοίχου (m)<br/>W=<input id="default_fin_a" type="text" size="5" onkeyup="set_fin_a();calc_fin();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση τοίχου από εμπόδιο (m)<br/>dx=<input id="default_fin_b" type="text" size="5" onkeyup="set_fin_b();calc_fin();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Πλάτος ανοίγματος (m)<br/>W<sub>w</sub>=<input id="default_fin_c" type="text" size="5" onkeyup="set_fin_c();calc_fin();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση ανοίγματος από εμπόδιο (m)<br/>dx<sub>w</sub>=<input id="default_fin_d" type="text" size="5" onkeyup="set_fin_d();calc_fin();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση υαλοστασίων από εξωτερική παρειά (m)<br/>g=<input id="default_fin_g" type="text" size="5" onkeyup="set_fin_g();calc_fin();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Μήκος εμποδίου (m)<br/>W<sub>1,2</sub>=<input id="default_fin_e" type="text" size="5" onkeyup="set_fin_e();calc_fin();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Θέση εμποδίου <br/>(1=αριστερά, 2=δεξιά)<br/>f=<input id="default_fin_f" type="text" size="5" onkeyup="set_fin_f();calc_fin();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Προσανατολισμός <br/>deg=<input id="default_fin_pros" type="text" size="5" onkeyup="set_fin_pros();calc_fin();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Τοίχου</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Ανοίγματος</td>
						</tr>
						<?php for ($i=1;$i<=10;$i++){ ?>
						<tr>
						<td><?=$i;?></td>
						<td><input type="text" id="fin_name<?php echo $i; ?>" name="name<?=$i;?>" style="text-align:center;width:150px;" value="Τ-<?php echo $i; ?>" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_a<?php echo $i; ?>" name="platos_toixoy<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_b<?php echo $i; ?>" name="apost_empod<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_c<?php echo $i; ?>" name="platos_anoig<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_d<?php echo $i; ?>" name="apost_anoig_empod<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_g<?php echo $i; ?>" name="apost_yalo<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_e<?php echo $i; ?>" name="mikos_empod<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_f<?php echo $i; ?>" name="thesi<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_pros<?php echo $i; ?>" name="pros<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin();"/></td>
						<td><input type="text" id="fin_deg_t<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						<td><input type="text" id="fin_deg_an<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						</tr>
						<?php } ?>
						
						<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr>
							<td colspan="2"><input type="submit" name="submit1" value="Παραγωγή εικόνων (beta)" /></td>
							<td><button type="button" onclick="calc_fin(1);"/>Εκτύπωση αποτελεσμάτων</button></td>
						</tr>
						</table>
					</table>
					<input type="hidden" name="min" value=<?php echo $min; ?> /> 
					</form>
					<div id='f_fin_h_general' style='padding:15px; background:#ebf9c9;'></div>
					
					<br/><br/> Πίνακας σκίασης από αριστερές πλευρικές προεξοχές: Πίνακας 3.20a της ΤΟΤΕΕ 20701-1.
					<br/> Πίνακας σκίασης από δεξιές πλευρικές προεξοχές: Πίνακας 3.20b της ΤΟΤΕΕ 20701-1.
					<?php } ?>
					<?php
						//Φόρμα για Σκιάσεις από ορίζοντα
					if ($sel_page["id"] == 25)	{ ?>
					<img src="images/orizontas.png"></img><br/>
					<form action="index_skiaseis.php" method="post">
					<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr style="background-color:#ddd;border:1px #6699CC dotted;">
						<td style="border:1px #6699CC dotted;vertical-align:middle;">α/α</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Όνομα στοιχείου (Αλφαριθμητικό)</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος τοίχου (m)<br/>H=<input id="default_hor_a" type="text" size="5" onkeyup="set_hor_a();calc_hor();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος πόρτας (m)<br/>H<sub>w</sub>=<input id="default_hor_b" type="text" size="5" onkeyup="set_hor_b();calc_hor();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος παραθύρου (m)<br/>H<sub>w1</sub>=<input id="default_hor_c" type="text" size="5" onkeyup="set_hor_c();calc_hor();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος ποδιάς (m)<br/>d<sub>1</sub>=<input id="default_hor_d" type="text" size="5" onkeyup="set_hor_d();calc_hor();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση υαλοστασίων από εξωτερική παρειά (m) <br/>g=<input id="default_hor_g" type="text" size="5" onkeyup="set_hor_g();calc_hor();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση εμποδίου (m)<br/>e=<input id="default_hor_e" type="text" size="5" onkeyup="set_hor_e();calc_hor();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος εμποδίου (m)<br/>f=<input id="default_hor_f" type="text" size="5" onkeyup="set_hor_f();calc_hor();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Προσανατολισμός  <br/>deg=<input id="default_hor_pros" type="text" size="5" onkeyup="set_hor_pros();calc_hor();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Τοίχου</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Πόρτας</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Ανοίγματος</td>
						</tr>
						<?php for ($i=1;$i<=10;$i++){ ?>
						<tr style="border:1px #6699CC dotted;">
						<td><?=$i;?></td>
						<td><input type="text" id="hor_name<?php echo $i; ?>" name="name<?php echo $i; ?>" style="text-align:center;width:150px;" value="Τ-<?php echo $i; ?>" onchange="calc_hor();"/></td>
						<td><input type="text" id="hor_a<?php echo $i; ?>" name="ipsos_toixoy<?php echo $i; ?>" style="text-align:center;width:50px;" onchange="calc_hor();"/></td>
						<td><input type="text" id="hor_b<?php echo $i; ?>" name="ipsos_portas<?php echo $i; ?>" style="text-align:center;width:50px;" onchange="calc_hor();"/></td>
						<td><input type="text" id="hor_c<?php echo $i; ?>" name="ipsos_parath<?php echo $i; ?>" style="text-align:center;width:50px;" onchange="calc_hor();"/></td>
						<td><input type="text" id="hor_d<?php echo $i; ?>" name="ipsos_podias<?php echo $i; ?>" style="text-align:center;width:50px;" onchange="calc_hor();"/></td>
						<td width="30"><input type="text" id="hor_g<?php echo $i; ?>" name="apost_yalo<?php echo $i; ?>" style="text-align:center;width:50px;" onchange="calc_hor();"/></td>
						<td><input type="text" id="hor_e<?php echo $i; ?>" name="apost_empod<?php echo $i; ?>" style="text-align:center;width:50px;" onchange="calc_hor();"/></td>
						<td><input type="text" id="hor_f<?php echo $i; ?>" name="ypsos_empod<?php echo $i; ?>" style="text-align:center;width:50px;" onchange="calc_hor();"/></td>
						<td><input type="text" id="hor_pros<?php echo $i; ?>" name="pros<?php echo $i; ?>" style="text-align:center;width:50px;" onchange="calc_hor();"/></td>
						<td><input type="text" id="hor_deg_t<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						<td><input type="text" id="hor_deg_door<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						<td><input type="text" id="hor_deg_an<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						</tr>
						<?php } ?>
							
						
						<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr>
							<td><input type="submit" name="submit2" value="Παραγωγή εικόνων (beta)" /></td>
							<td><button type="button" onclick="calc_hor(1);"/>Εκτύπωση αποτελεσμάτων</button></td>
						</tr>
						</table>
					</table>
					
					<input type="hidden" name="min" value="<?php echo $min; ?>" /> 
					</form>
					<div id='f_hor_h_general' style='padding:15px; background:#ebf9c9;'></div>
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
					<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr style="background-color:#ddd;border:1px #6699CC dotted;">
						<td style="border:1px #6699CC dotted;vertical-align:middle;">α/α</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Όνομα στοιχείου (Αλφαριθμητικό)</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος τοίχου (m) <br/>H=<input id="default_ov_a" type="text" size="5" onkeyup="set_ov_a();calc_ov();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος πόρτας (m) <br/>H<sub>w</sub>=<input id="default_ov_b" type="text" size="5" onkeyup="set_ov_b();calc_ov();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος παραθύρου (m) <br/>H<sub>w1</sub>=<input id="default_ov_c" type="text" size="5" onkeyup="set_ov_c();calc_ov();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος ποδιάς (m) <br/>d=<input id="default_ov_d" type="text" size="5" onkeyup="set_ov_d();calc_ov();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση υαλοστασίων από εξωτερική παρειά (m) <br/>g=<input id="default_ov_g" type="text" size="5" onkeyup="set_ov_g();calc_ov();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Μήκος προβόλου (m) <br/>L=<input id="default_ov_e" type="text" size="5" onkeyup="set_ov_e();calc_ov();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Προσανατολισμός <br/>deg=<input id="default_ov_pros" type="text" size="5" onkeyup="set_ov_pros();calc_ov();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Τοίχου</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Πόρτας</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Ανοίγματος</td>
						</tr>
						<?php for ($i=1;$i<=10;$i++){ ?>
						<tr style="border:1px #6699CC dotted;">
						<td><?=$i;?></td>
						<td><input type="text" id="ov_name<?php echo $i; ?>" name="name<?=$i;?>" style="text-align:center;width:150px;" value="Τ-<?php echo $i; ?>" onchange="calc_ov();" /></td>
						<td><input type="text" id="ov_a<?php echo $i; ?>" name="ipsos_toixoy<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ov();" /></td>
						<td><input type="text" id="ov_b<?php echo $i; ?>" name="ipsos_portas<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ov();" /></td>
						<td><input type="text" id="ov_c<?php echo $i; ?>" name="ipsos_parath<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ov();" /></td>
						<td><input type="text" id="ov_d<?php echo $i; ?>" name="ipsos_podias<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ov();" /></td>
						<td width="30"><input type="text" id="ov_g<?php echo $i; ?>" name="apost_yalo<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ov();" /></td>
						<td><input type="text" id="ov_e<?php echo $i; ?>" name="mikos_prov<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ov();" /></td>
						<td><input type="text" id="ov_pros<?php echo $i; ?>" name="pros<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ov();" /></td>
						<td><input type="text" id="ov_deg_t<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						<td><input type="text" id="ov_deg_door<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						<td><input type="text" id="ov_deg_an<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						</tr>
						<?php } ?>
						
						<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr>
							<td><input type="submit" name="submit3" value="Παραγωγή εικόνων (beta)" /></td>
							<td><button type="button" onclick="calc_ov(1);"/>Εκτύπωση αποτελεσμάτων</button></td>
						</tr>
						</table>
					</table>
					<input type="hidden" name="min" value="<?php echo $min; ?>" /> 
					</form>
					<div id='f_ov_h_general' style='padding:15px; background:#ebf9c9;'></div>
					
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
					<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr style="background-color:#ddd;border:1px #6699CC dotted;">
						<td style="border:1px #6699CC dotted;vertical-align:middle;">α/α</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Όνομα στοιχείου (Αλφαριθμητικό)</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Πλάτος τοίχου ή ανοίγματος (m) <br/>a=<input id="default_fin2_a" type="text" size="5" onkeyup="set_fin2_a();calc_fin2();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση από εμπόδιο αριστερά (m) <br/>b=<input id="default_fin2_b" type="text" size="5" onkeyup="set_fin2_b();calc_fin2();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Μήκος εμποδίου αριστερά (m) <br/>c=<input id="default_fin2_c" type="text" size="5" onkeyup="set_fin2_c();calc_fin2();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση από εμπόδιο δεξιά (m) <br/>d=<input id="default_fin2_d" type="text" size="5" onkeyup="set_fin2_d();calc_fin2();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Μήκος εμποδίου δεξιά (m) <br/>e=<input id="default_fin2_e" type="text" size="5" onkeyup="set_fin2_e();calc_fin2();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Προσανατολισμός (μοίρες) <br/>deg=<input id="default_fin2_pros" type="text" size="5" onkeyup="set_fin2_pros();calc_fin2();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Αριστερά</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Δεξιά</td>
						
						</tr>
						<?php for ($i=1;$i<=10;$i++){ ?>
						<tr>
						<td><?=$i;?></td>
						<td><input type="text" id="fin2_name<?php echo $i; ?>" name="name<?=$i;?>" maxlength="30" size="10" value="Τ-<?php echo $i; ?>" /></td>
						<td><input type="text" id="fin2_a<?php echo $i; ?>" name="platos_toixoy<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin2();" /></td>
						<td><input type="text" id="fin2_b<?php echo $i; ?>" name="apost_ar<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin2();" /></td>
						<td><input type="text" id="fin2_c<?php echo $i; ?>" name="mikos_ar<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin2();" /></td>
						<td><input type="text" id="fin2_d<?php echo $i; ?>" name="apost_de<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin2();" /></td>
						<td><input type="text" id="fin2_e<?php echo $i; ?>" name="mikos_de<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin2();" /></td>
						<td><input type="text" id="fin2_pros<?php echo $i; ?>" name="pros<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin2();" /></td>
						<td><input type="text" id="fin2_deg_ar<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						<td><input type="text" id="fin2_deg_de<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						</tr>
						<?php } ?>
						
						<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr>
							<td><input type="submit" name="submit4" value="Παραγωγή εικόνων (beta)" /></td>
							<td><button type="button" onclick="calc_fin2(1);"/>Εκτύπωση αποτελεσμάτων</button></td>
						</tr>
						</table>
					</table>
					<input type="hidden" name="min" value="<?php echo $min; ?>" /> 
					</form>
					
					<div id='f_fin2_h_general' style='padding:15px; background:#ebf9c9;'></div>
					
					<br/><br/> Πίνακας σκίασης από αριστερές πλευρικές προεξοχές: Πίνακας 3.20α της ΤΟΤΕΕ 20701-1.
					<br/> Πίνακας σκίασης από δεξιές πλευρικές προεξοχές: Πίνακας 3.20β της ΤΟΤΕΕ 20701-1.
					<?php } ?>
					
					
					
					
					
					
					
					<?php
						//Φόρμα για Σκιάσεις από τέντες
					if ($sel_page["id"] == 56)	{ ?>
					<img src="images/tentes.png"></img><br/>
					<form action="index_skiaseis.php" method="post">
					<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr style="background-color:#ddd;border:1px #6699CC dotted;">
						<td style="border:1px #6699CC dotted;vertical-align:middle;">α/α</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Όνομα στοιχείου (Αλφαριθμητικό)</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος τοίχου κάτω από τέντα (m) <br/>H=<input id="default_ovt_a" type="text" size="5" onkeyup="set_ovt_a();calc_ovt();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος πόρτας (m) <br/>H<sub>w</sub>=<input id="default_ovt_b" type="text" size="5" onkeyup="set_ovt_b();calc_ovt();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος παραθύρου (m) <br/>H<sub>w1</sub>=<input id="default_ovt_c" type="text" size="5" onkeyup="set_ovt_c();calc_ovt();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος ποδιάς (m) <br/>d=<input id="default_ovt_d" type="text" size="5" onkeyup="set_ovt_d();calc_ovt();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόστ. υαλοστασίων (m) <br/>d=<input id="default_ovt_g" type="text" size="5" onkeyup="set_ovt_g();calc_ovt();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Μήκος τέντας L (m) <br/>L<sub>1</sub>=<input id="default_ovt_e" type="text" size="5" onkeyup="set_ovt_e();calc_ovt();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Ύψος τέντας H (m) <br/>H<sub>1</sub>=<input id="default_ovt_f" type="text" size="5" onkeyup="set_ovt_f();calc_ovt();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Προσανατολισμός (μοίρες) <br/>deg=<input id="default_ovt_pros" type="text" size="5" onkeyup="set_ovt_pros();calc_ovt();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Τοίχου</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Πόρτας</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Ανοίγματος</td>
						
						</tr>
						<?php for ($i=1;$i<=10;$i++){ ?>
						<tr>
						<td><?=$i;?></td>
						<td><input type="text" id="ovt_name<?php echo $i; ?>" name="name<?=$i;?>" maxlength="30" size="10" value="Τ-<?php echo $i; ?>" /></td>
						<td><input type="text" id="ovt_a<?php echo $i; ?>" name="ipsos_toixoy<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ovt();" /></td>
						<td><input type="text" id="ovt_b<?php echo $i; ?>" name="ipsos_portas<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ovt();" /></td>
						<td><input type="text" id="ovt_c<?php echo $i; ?>" name="ipsos_parath<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ovt();" /></td>
						<td><input type="text" id="ovt_d<?php echo $i; ?>" name="ipsos_podias<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ovt();" /></td>
						<td><input type="text" id="ovt_g<?php echo $i; ?>" name="apost_yalo<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ovt();" /></td>
						<td><input type="text" id="ovt_e<?php echo $i; ?>" name="ipsos_prov<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ovt();" /></td>
						<td><input type="text" id="ovt_f<?php echo $i; ?>" name="ipsos_prov<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ovt();" /></td>
						<td><input type="text" id="ovt_pros<?php echo $i; ?>" name="pros<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_ovt();" /></td>
						<td><input type="text" id="ovt_deg_t<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						<td><input type="text" id="ovt_deg_door<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						<td><input type="text" id="ovt_deg_an<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td>
						</tr>
						<?php } ?>
						
						<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr>
							<td><input type="submit" name="submit5" value="Παραγωγή εικόνων (Υπό κατασκευή)" /></td>
							<td><button type="button" onclick="calc_ovt(1);"/>Εκτύπωση αποτελεσμάτων</button></td>
						</tr>
						</table>
					</table>
					<input type="hidden" name="min" value="<?php echo $min; ?>" /> 
					</form>
					
					<div id='f_ovt_h_general' style='padding:15px; background:#ebf9c9;'></div>
					
					<br/><br/> Πίνακας σκίασης για τέντες: Πίνακας 3.19 (Συντελεστές προβόλου) της ΤΟΤΕΕ 20701-1.
					<?php } ?>
					
					
					
					
					
					<?php
						//Φόρμα για Σκιάσεις περσίδες
					if ($sel_page["id"] == 57)	{ ?>
					<img src="images/persides.png"></img><br/>
					<form action="index_skiaseis.php" method="post">
					<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr style="background-color:#ddd;border:1px #6699CC dotted;">
						<td style="border:1px #6699CC dotted;vertical-align:middle;">α/α</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Όνομα στοιχείου (Αλφαριθμητικό)</td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Τύπος περσίδων (m) <br/>(1:Σταθερές 2:Κινητές)=<input id="default_fsh_a" type="text" size="5" onkeyup="set_fsh_a();calc_fsh();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Μήκος περσίδων (m) <br/>L=<input id="default_fsh_b" type="text" size="5" onkeyup="set_fsh_b();calc_fsh();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Απόσταση περσίδων (m) <br/>Η=<input id="default_fsh_c" type="text" size="5" onkeyup="set_fsh_c();calc_fsh();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Προσανατολισμός (μοίρες) <br/>deg=<input id="default_fsh_pros" type="text" size="5" onkeyup="set_fsh_pros();calc_fsh();"></td>
						<td style="border:1px #6699CC dotted;vertical-align:middle;">Deg Τοίχου</td>
						
						</tr>
						<?php for ($i=1;$i<=10;$i++){ ?>
						<tr>
						<td><?=$i;?></td>
						<td><input type="text" id="fsh_name<?php echo $i; ?>" name="name<?=$i;?>" maxlength="30" size="10" value="Τ-<?php echo $i; ?>" /></td>
						<td><input type="text" id="fsh_a<?php echo $i; ?>" name="platos_toixoy<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fin2();" /></td>
						<td><input type="text" id="fsh_b<?php echo $i; ?>" name="apost_ar<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fsh();" /></td>
						<td><input type="text" id="fsh_c<?php echo $i; ?>" name="mikos_ar<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fsh();" /></td>
						<td><input type="text" id="fsh_pros<?php echo $i; ?>" name="pros<?=$i;?>" style="text-align:center;width:50px;" onchange="calc_fsh();" /></td>
						<td><input type="text" id="fsh_deg_t<?php echo $i; ?>" style="font-weight:bold;text-align:center;width:50px;" disabled="disabled" class="disabled"></td
						
						</tr>
						<?php } ?>
						
						<table style="width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;">
						<tr>
							<td><input type="submit" name="submit6" value="Παραγωγή εικόνων (Υπό κατασκευή)" /></td>
							<td><button type="button" onclick="calc_fsh(1);"/>Εκτύπωση αποτελεσμάτων</button></td>
						</tr>
						</table>
					</table>
					<input type="hidden" name="min" value="<?php echo $min; ?>" /> 
					</form>
					
					<div id='f_fsh_h_general' style='padding:15px; background:#ebf9c9;'></div>
					
					<br/><br/> Πίνακας σκίασης από αριστερές πλευρικές προεξοχές: Πίνακας 3.20α της ΤΟΤΕΕ 20701-1.
					<br/> Πίνακας σκίασης από δεξιές πλευρικές προεξοχές: Πίνακας 3.20β της ΤΟΤΕΕ 20701-1.
					<?php } ?>
					
					
					
					
					
					
					
					<?php 
					if ($sel_page["id"] != 40) {
					//Αν η επιλογή είναι απο αριστερά και δεξιά μην εμφανίζεις πίνακες με τιμές. Για τις άλλες 4 επιλογές εμφάνισε.
						$vivliothikes = get_skiaseis($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td>";
						if ($sel_page["id"] == 57){echo "<td>Τύπος περσίδων</td>";}
						echo "<td>Μοίρες (degrees)</td><td>Περίοδος</td><td>Β (γ=0deg)</td><td>ΒΑ (γ=45deg)</td><td>Α (γ=90deg)</td><td>ΝΑ (γ=135deg)</td><td>Ν (γ=180deg)</td><td>ΝΔ (γ=225deg)</td><td>Δ (γ=270deg)</td><td>ΒΔ (γ=315deg)</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["id"] . "</td>";
						if ($sel_page["id"] == 57){echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["type"] . "</td>";}
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

<!--JS Scripts -->
<script type="text/javascript">

function number_format (number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

<!--######################## Hor scripts ########################### -->
//θέσε όλα τα ύψη των τοίχων -hor
function set_hor_a(){
var default_hor_a=document.getElementById("default_hor_a").value;
	for (i=1;i<=10;i++){
	document.getElementById("hor_a"+i).value=default_hor_a;
	}
}
//θέσε όλα Ύψος πόρτας -hor
function set_hor_b(){
var default_hor_b=document.getElementById("default_hor_b").value;
	for (i=1;i<=10;i++){
	document.getElementById("hor_b"+i).value=default_hor_b;
	}
}
//θέσε όλα Ύψος παραθύρου -hor
function set_hor_c(){
var default_hor_c=document.getElementById("default_hor_c").value;
	for (i=1;i<=10;i++){
	document.getElementById("hor_c"+i).value=default_hor_c;
	}
}
//θέσε όλα Ύψος ποδιάς -hor
function set_hor_d(){
var default_hor_d=document.getElementById("default_hor_d").value;
	for (i=1;i<=10;i++){
	document.getElementById("hor_d"+i).value=default_hor_d;
	}
}
//θέσε όλες τις αποστάσεις υαλοστασίων -hor
function set_hor_g(){
var default_hor_g=document.getElementById("default_hor_g").value;
	for (i=1;i<=10;i++){
	document.getElementById("hor_g"+i).value=default_hor_g;
	}
}
//θέσε όλα Απόσταση εμποδίου -hor
function set_hor_e(){
var default_hor_e=document.getElementById("default_hor_e").value;
	for (i=1;i<=10;i++){
	document.getElementById("hor_e"+i).value=default_hor_e;
	}
}
//θέσε όλα Ύψος εμποδίου -hor
function set_hor_f(){
var default_hor_f=document.getElementById("default_hor_f").value;
	for (i=1;i<=10;i++){
	document.getElementById("hor_f"+i).value=default_hor_f;
	}
}
//θέσε όλους τους προσανατολισμούς -hor
function set_hor_pros(){
var default_hor_pros=document.getElementById("default_hor_pros").value;
	for (i=1;i<=10;i++){
	document.getElementById("hor_pros"+i).value=default_hor_pros;
	}
}
function calc_hor(print=0){

var x="includes/calc_skiaseis_f.php?skiasi=1&print="+print;

for (k=1;k<=10;k++){
var hor_name=document.getElementById("hor_name"+k).value;
var hor_a=parseFloat(document.getElementById("hor_a"+k).value);
var hor_b=parseFloat(document.getElementById("hor_b"+k).value);
var hor_c=parseFloat(document.getElementById("hor_c"+k).value);
var hor_d=parseFloat(document.getElementById("hor_d"+k).value);
var hor_g=parseFloat(document.getElementById("hor_g"+k).value);
var hor_e=parseFloat(document.getElementById("hor_e"+k).value);
var hor_f=parseFloat(document.getElementById("hor_f"+k).value);
var hor_pros=parseFloat(document.getElementById("hor_pros"+k).value);

var tan_toixoy = ((hor_f-(hor_a/2)) / hor_e);
var deg_toixoy = Math.atan(tan_toixoy) *  180 / Math.PI;

var tan_door = (hor_f-(hor_b/2)) / (hor_e + hor_g);
var deg_door = Math.atan(tan_door) *  180 / Math.PI;

var tan_an = (hor_f-(hor_c/2)-hor_d) / (hor_e + hor_g);
var deg_an = Math.atan(tan_an) *  180 / Math.PI;

document.getElementById("hor_deg_t"+k).value=number_format(deg_toixoy,2);
document.getElementById("hor_deg_door"+k).value=number_format(deg_door,2);
document.getElementById("hor_deg_an"+k).value=number_format(deg_an,2);

x += "&name"+k+"=" + hor_name + "&deg_toixoy"+k+"=" + deg_toixoy + "&deg_door"+k+"=" + deg_door + "&deg_an"+k+"=" + deg_an + "&pros"+k+"=" + hor_pros;
x += "&hor_a"+k+"=" + hor_a + "&hor_b"+k+"=" + hor_b + "&hor_c"+k+"=" + hor_c + "&hor_d"+k+"=" + hor_d + "&hor_g"+k+"=" + hor_g + "&hor_e"+k+"=" + hor_e + "&hor_f"+k+"=" + hor_f;
}//τέλος επαναληψης

	if(print==0){
	//json result
	jQuery.ajax({
			url: x,
			type: "POST",
			async: true, //αλλαγή σε false δουλεύει πάντοτε αλλά επιβραδύνει τον browser
			success: function (data) {
				var html = data;
				document.getElementById("f_hor_h_general").innerHTML=html;
			}
		});
	}
	
	if(print==1){
	window.open(x,"La-Kenak");
	}
}

<!--######################## Hor scripts ########################### -->

<!--######################## Ov scripts ########################### -->
//θέσε όλα τα ύψη των τοίχων -ov
function set_ov_a(){
var default_ov_a=document.getElementById("default_ov_a").value;
	for (i=1;i<=10;i++){
	document.getElementById("ov_a"+i).value=default_ov_a;
	}
}
//θέσε όλα Ύψος πόρτας -ov
function set_ov_b(){
var default_ov_b=document.getElementById("default_ov_b").value;
	for (i=1;i<=10;i++){
	document.getElementById("ov_b"+i).value=default_ov_b;
	}
}
//θέσε όλα Ύψος παραθύρου -ov
function set_ov_c(){
var default_ov_c=document.getElementById("default_ov_c").value;
	for (i=1;i<=10;i++){
	document.getElementById("ov_c"+i).value=default_ov_c;
	}
}
//θέσε όλα Ύψος ποδιάς -ov
function set_ov_d(){
var default_ov_d=document.getElementById("default_ov_d").value;
	for (i=1;i<=10;i++){
	document.getElementById("ov_d"+i).value=default_ov_d;
	}
}
//θέσε όλες τις αποστάσεις υαλοστασίων -ov
function set_ov_g(){
var default_ov_g=document.getElementById("default_ov_g").value;
	for (i=1;i<=10;i++){
	document.getElementById("ov_g"+i).value=default_ov_g;
	}
}
//θέσε όλα Μήκος προβόλου -ov
function set_ov_e(){
var default_ov_e=document.getElementById("default_ov_e").value;
	for (i=1;i<=10;i++){
	document.getElementById("ov_e"+i).value=default_ov_e;
	}
}
//θέσε όλους τους προσανατολισμούς -ov
function set_ov_pros(){
var default_ov_pros=document.getElementById("default_ov_pros").value;
	for (i=1;i<=10;i++){
	document.getElementById("ov_pros"+i).value=default_ov_pros;
	}
}

function calc_ov(print=0){

var x="includes/calc_skiaseis_f.php?skiasi=2&print="+print;

for (k=1;k<=10;k++){
var ov_name=document.getElementById("ov_name"+k).value;
var ov_a=parseFloat(document.getElementById("ov_a"+k).value);
var ov_b=parseFloat(document.getElementById("ov_b"+k).value);
var ov_c=parseFloat(document.getElementById("ov_c"+k).value);
var ov_d=parseFloat(document.getElementById("ov_d"+k).value);
var ov_g=parseFloat(document.getElementById("ov_g"+k).value);
var ov_e=parseFloat(document.getElementById("ov_e"+k).value);
var ov_pros=parseFloat(document.getElementById("ov_pros"+k).value);

var tan_toixoy =  (ov_e / (ov_a/2));
var deg_toixoy = Math.atan(tan_toixoy) *  180 / Math.PI;

var tan_door = ((ov_e+ov_g) / (ov_a -(ov_b/2)));
var deg_door = Math.atan(tan_door) *  180 / Math.PI;

var tan_an = ((ov_e+ov_g) / (ov_a - ov_d - (ov_c/2)));
var deg_an = Math.atan(tan_an) *  180 / Math.PI;

document.getElementById("ov_deg_t"+k).value=number_format(deg_toixoy,2);
document.getElementById("ov_deg_door"+k).value=number_format(deg_door,2);
document.getElementById("ov_deg_an"+k).value=number_format(deg_an,2);

x += "&name"+k+"=" + ov_name + "&deg_toixoy"+k+"=" + deg_toixoy + "&deg_door"+k+"=" + deg_door + "&deg_an"+k+"=" + deg_an + "&pros"+k+"=" + ov_pros;
x += "&ov_a"+k+"=" + ov_a + "&ov_b"+k+"=" + ov_b + "&ov_c"+k+"=" + ov_c + "&ov_d"+k+"=" + ov_d + "&ov_g"+k+"=" + ov_g + "&ov_e"+k+"=" + ov_e;
}//τέλος επαναληψης

	if(print==0){
	//json result
	jQuery.ajax({
			url: x,
			type: "POST",
			async: true, //αλλαγή σε false δουλεύει πάντοτε αλλά επιβραδύνει τον browser
			success: function (data) {
				var html = data;
				document.getElementById("f_ov_h_general").innerHTML=html;
			}
		});
	}
	
	if(print==1){
	window.open(x,"La-Kenak");
	}
}


<!--######################## Ov scripts ########################### -->

<!--######################## Fin x 2 scripts ########################### -->
//θέσε όλα τα μήκη των τοίχων -fin2
function set_fin2_a(){
var default_fin2_a=document.getElementById("default_fin2_a").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin2_a"+i).value=default_fin2_a;
	}
}
//θέσε όλες τις αποστάσεις από αριστερά -fin2
function set_fin2_b(){
var default_fin2_b=document.getElementById("default_fin2_b").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin2_b"+i).value=default_fin2_b;
	}
}
//θέσε όλα τα εμπόδια από αριστερά -fin2
function set_fin2_c(){
var default_fin2_c=document.getElementById("default_fin2_c").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin2_c"+i).value=default_fin2_c;
	}
}
//θέσε όλες τις αποστάσεις από δεξία -fin2
function set_fin2_d(){
var default_fin2_d=document.getElementById("default_fin2_d").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin2_d"+i).value=default_fin2_d;
	}
}
//θέσε όλα τα εμπόδια από δεξιά -fin2
function set_fin2_e(){
var default_fin2_e=document.getElementById("default_fin2_e").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin2_e"+i).value=default_fin2_e;
	}
}
//θέσε όλους τους προσανατολισμούς -fin2
function set_fin2_pros(){
var default_fin2_pros=document.getElementById("default_fin2_pros").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin2_pros"+i).value=default_fin2_pros;
	}
}


function calc_fin2(print=0){

var x="includes/calc_skiaseis_f.php?skiasi=3&print="+print;

for (k=1;k<=10;k++){
var fin2_name=document.getElementById("fin2_name"+k).value;
var fin2_a=parseFloat(document.getElementById("fin2_a"+k).value);
var fin2_b=parseFloat(document.getElementById("fin2_b"+k).value);
var fin2_c=parseFloat(document.getElementById("fin2_c"+k).value);
var fin2_d=parseFloat(document.getElementById("fin2_d"+k).value);
var fin2_e=parseFloat(document.getElementById("fin2_e"+k).value);
var fin2_pros=parseFloat(document.getElementById("fin2_pros"+k).value);

var tan_toixoy_ar =  (fin2_c / (fin2_b + (fin2_a/2)));
var deg_toixoy_ar = Math.atan(tan_toixoy_ar) *  180 / Math.PI;

var tan_toixoy_de = (fin2_e / (fin2_d + (fin2_a/2)));
var deg_toixoy_de = Math.atan(tan_toixoy_de) *  180 / Math.PI;


document.getElementById("fin2_deg_ar"+k).value=number_format(deg_toixoy_ar,2);
document.getElementById("fin2_deg_de"+k).value=number_format(deg_toixoy_de,2);

x += "&name"+k+"=" + fin2_name + "&deg_toixoy_ar"+k+"=" + deg_toixoy_ar + "&deg_toixoy_de"+k+"=" + deg_toixoy_de + "&pros"+k+"=" + fin2_pros;
x += "&fin2_a"+k+"=" + fin2_a + "&fin2_b"+k+"=" + fin2_b + "&fin2_c"+k+"=" + fin2_c + "&fin2_d"+k+"=" + fin2_d + "&fin2_e"+k+"=" + fin2_e;
}//τέλος επαναληψης

	if(print==0){
	//json result
	jQuery.ajax({
			url: x,
			type: "POST",
			async: true, //αλλαγή σε false δουλεύει πάντοτε αλλά επιβραδύνει τον browser
			success: function (data) {
				var html = data;
				document.getElementById("f_fin2_h_general").innerHTML=html;
			}
		});
	}
	
	if(print==1){
	window.open(x,"La-Kenak");
	}
}

<!--######################## Fin x 2 scripts ########################### -->

<!--######################## Fin scripts ########################### -->


//θέσε όλα τα πλάτη των τοίχων -fin
function set_fin_a(){
var default_fin_a=document.getElementById("default_fin_a").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin_a"+i).value=default_fin_a;
	}
}
//θέσε όλες τις αποστάσεις τοίχου από εμπόδιο -fin
function set_fin_b(){
var default_fin_b=document.getElementById("default_fin_b").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin_b"+i).value=default_fin_b;
	}
}
//θέσε όλα τα πλάτη ανοίγματος -fin
function set_fin_c(){
var default_fin_c=document.getElementById("default_fin_c").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin_c"+i).value=default_fin_c;
	}
}
//θέσε όλες τις αποστάσεις από άνοιογμα -fin
function set_fin_d(){
var default_fin_d=document.getElementById("default_fin_d").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin_d"+i).value=default_fin_d;
	}
}
//θέσε όλες τις αποστάσεις υαλοστασίων -fin
function set_fin_g(){
var default_fin_g=document.getElementById("default_fin_g").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin_g"+i).value=default_fin_g;
	}
}
//θέσε όλα τα μήκη εμποδίων -fin
function set_fin_e(){
var default_fin_e=document.getElementById("default_fin_e").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin_e"+i).value=default_fin_e;
	}
}
//θέσε όλες τις θέσεις εμποδίων -fin
function set_fin_f(){
var default_fin_f=document.getElementById("default_fin_f").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin_f"+i).value=default_fin_f;
	}
}
//θέσε όλους τους προσανατολισμούς -fin
function set_fin_pros(){
var default_fin_pros=document.getElementById("default_fin_pros").value;
	for (i=1;i<=10;i++){
	document.getElementById("fin_pros"+i).value=default_fin_pros;
	}
}

function calc_fin(print=0){

var x="includes/calc_skiaseis_f.php?skiasi=4&print="+print;

for (k=1;k<=10;k++){
var fin_name=document.getElementById("fin_name"+k).value;
var fin_a=parseFloat(document.getElementById("fin_a"+k).value);
var fin_b=parseFloat(document.getElementById("fin_b"+k).value);
var fin_c=parseFloat(document.getElementById("fin_c"+k).value);
var fin_d=parseFloat(document.getElementById("fin_d"+k).value);
var fin_g=parseFloat(document.getElementById("fin_g"+k).value);
var fin_e=parseFloat(document.getElementById("fin_e"+k).value);
var fin_f=parseFloat(document.getElementById("fin_f"+k).value);
var fin_pros=parseFloat(document.getElementById("fin_pros"+k).value);

var tan_toixoy =  (((fin_a / 2) + fin_b) / fin_e);
var deg_toixoy = Math.atan(tan_toixoy) *  180 / Math.PI;

var tan_an = (((fin_c / 2) + fin_d) / (fin_e+fin_g));
var deg_an = Math.atan(tan_an) *  180 / Math.PI;

document.getElementById("fin_deg_t"+k).value=number_format(deg_toixoy,2);
document.getElementById("fin_deg_an"+k).value=number_format(deg_an,2);

x += "&name"+k+"=" + fin_name + "&deg_toixoy"+k+"=" + deg_toixoy + "&deg_an"+k+"=" + deg_an + "&pros"+k+"=" + fin_pros;
x += "&fin_a"+k+"=" + fin_a + "&fin_b"+k+"=" + fin_b + "&fin_c"+k+"=" + fin_c + "&fin_d"+k+"=" + fin_d + "&fin_g"+k+"=" + fin_g + "&fin_e"+k+"=" + fin_e + "&fin_f"+k+"=" + fin_f;
}//τέλος επαναληψης

	if(print==0){
	//json result
	jQuery.ajax({
			url: x,
			type: "POST",
			async: true, //αλλαγή σε false δουλεύει πάντοτε αλλά επιβραδύνει τον browser
			success: function (data) {
				var html = data;
				document.getElementById("f_fin_h_general").innerHTML=html;
			}
		});
	}
	
	if(print==1){
	window.open(x,"La-Kenak");
	}
}


<!--######################## fin scripts ########################### -->




<!--######################## ovt scripts ########################### -->
//θέσε όλα τα ύψη των τοίχων -ovt
function set_ovt_a(){
var default_ovt_a=document.getElementById("default_ovt_a").value;
	for (i=1;i<=10;i++){
	document.getElementById("ovt_a"+i).value=default_ovt_a;
	}
}
//θέσε όλα Ύψος πόρτας -ovt
function set_ovt_b(){
var default_ovt_b=document.getElementById("default_ovt_b").value;
	for (i=1;i<=10;i++){
	document.getElementById("ovt_b"+i).value=default_ovt_b;
	}
}
//θέσε όλα Ύψος παραθύρου -ovt
function set_ovt_c(){
var default_ovt_c=document.getElementById("default_ovt_c").value;
	for (i=1;i<=10;i++){
	document.getElementById("ovt_c"+i).value=default_ovt_c;
	}
}
//θέσε όλα Ύψος ποδιάς -ovt
function set_ovt_d(){
var default_ovt_d=document.getElementById("default_ovt_d").value;
	for (i=1;i<=10;i++){
	document.getElementById("ovt_d"+i).value=default_ovt_d;
	}
}
//θέσε όλες τις αποστάσεις υαλοστασίων -ovt
function set_ovt_g(){
var default_ovt_g=document.getElementById("default_ovt_g").value;
	for (i=1;i<=10;i++){
	document.getElementById("ovt_g"+i).value=default_ovt_g;
	}
}
//θέσε όλα Μήκος τέντας -ovt
function set_ovt_e(){
var default_ovt_e=document.getElementById("default_ovt_e").value;
	for (i=1;i<=10;i++){
	document.getElementById("ovt_e"+i).value=default_ovt_e;
	}
}
//θέσε όλα Μήκος τέντας -ovt
function set_ovt_f(){
var default_ovt_f=document.getElementById("default_ovt_f").value;
	for (i=1;i<=10;i++){
	document.getElementById("ovt_f"+i).value=default_ovt_f;
	}
}
//θέσε όλους τους προσανατολισμούς -ovt
function set_ovt_pros(){
var default_ovt_pros=document.getElementById("default_ovt_pros").value;
	for (i=1;i<=10;i++){
	document.getElementById("ovt_pros"+i).value=default_ovt_pros;
	}
}

function calc_ovt(print=0){

var x="includes/calc_skiaseis_f.php?skiasi=5&print="+print;

for (k=1;k<=10;k++){
var ovt_name=document.getElementById("ovt_name"+k).value;
var ovt_a=parseFloat(document.getElementById("ovt_a"+k).value);
var ovt_b=parseFloat(document.getElementById("ovt_b"+k).value);
var ovt_c=parseFloat(document.getElementById("ovt_c"+k).value);
var ovt_d=parseFloat(document.getElementById("ovt_d"+k).value);
var ovt_g=parseFloat(document.getElementById("ovt_g"+k).value);
var ovt_e=parseFloat(document.getElementById("ovt_e"+k).value);
var ovt_f=parseFloat(document.getElementById("ovt_f"+k).value);
var ovt_pros=parseFloat(document.getElementById("ovt_pros"+k).value);

var tan_toixoy =  (ovt_e / ((ovt_a/2) - ovt_f));
var deg_toixoy = Math.atan(tan_toixoy) *  180 / Math.PI;

var tan_door = ((ovt_e+ovt_g) / (ovt_a - (ovt_b/2) - ovt_f));
var deg_door = Math.atan(tan_door) *  180 / Math.PI;

var tan_an = ((ovt_e+ovt_g) / (ovt_a - ovt_d - (ovt_c/2) - ovt_f));
var deg_an = Math.atan(tan_an) *  180 / Math.PI;

document.getElementById("ovt_deg_t"+k).value=number_format(deg_toixoy,2);
document.getElementById("ovt_deg_door"+k).value=number_format(deg_door,2);
document.getElementById("ovt_deg_an"+k).value=number_format(deg_an,2);

x += "&name"+k+"=" + ovt_name + "&deg_toixoy"+k+"=" + deg_toixoy + "&deg_door"+k+"=" + deg_door + "&deg_an"+k+"=" + deg_an + "&pros"+k+"=" + ovt_pros;
x += "&ovt_a"+k+"=" + ovt_a + "&ovt_b"+k+"=" + ovt_b + "&ovt_c"+k+"=" + ovt_c + "&ovt_d"+k+"=" + ovt_d + "&ovt_g"+k+"=" + ovt_g + "&ovt_e"+k+"=" + ovt_e + "&ovt_f"+k+"=" + ovt_f;
}//τέλος επαναληψης

	if(print==0){
	//json result
	jQuery.ajax({
			url: x,
			type: "POST",
			async: true, //αλλαγή σε false δουλεύει πάντοτε αλλά επιβραδύνει τον browser
			success: function (data) {
				var html = data;
				document.getElementById("f_ovt_h_general").innerHTML=html;
			}
		});
	}
	
	if(print==1){
	window.open(x,"La-Kenak");
	}
}


<!--######################## ovt scripts ########################### -->







<!--######################## fsh scripts ########################### -->
//θέσε όλα τον τύπο περσίδων -fsh
function set_fsh_a(){
var default_fsh_a=document.getElementById("default_fsh_a").value;
	for (i=1;i<=10;i++){
	document.getElementById("fsh_a"+i).value=default_fsh_a;
	}
}
//θέσε όλα το μήκος περσίδων -fsh
function set_fsh_b(){
var default_fsh_b=document.getElementById("default_fsh_b").value;
	for (i=1;i<=10;i++){
	document.getElementById("fsh_b"+i).value=default_fsh_b;
	}
}
//θέσε όλα την απόσταση περσίδων -fsh
function set_fsh_c(){
var default_fsh_c=document.getElementById("default_fsh_c").value;
	for (i=1;i<=10;i++){
	document.getElementById("fsh_c"+i).value=default_fsh_c;
	}
}
//θέσε όλους τους προσανατολισμούς -fsh
function set_fsh_pros(){
var default_fsh_pros=document.getElementById("default_fsh_pros").value;
	for (i=1;i<=10;i++){
	document.getElementById("fsh_pros"+i).value=default_fsh_pros;
	}
}

function calc_fsh(print=0){

var x="includes/calc_skiaseis_f.php?skiasi=6&print="+print;

for (k=1;k<=10;k++){
var fsh_name=document.getElementById("fsh_name"+k).value;
var fsh_a=parseFloat(document.getElementById("fsh_a"+k).value);
var fsh_b=parseFloat(document.getElementById("fsh_b"+k).value);
var fsh_c=parseFloat(document.getElementById("fsh_c"+k).value);
var fsh_pros=parseFloat(document.getElementById("fsh_pros"+k).value);

var tan_toixoy =  fsh_b / fsh_c;
var deg_toixoy = Math.atan(tan_toixoy) *  180 / Math.PI;


document.getElementById("fsh_deg_t"+k).value=number_format(deg_toixoy,2);

x += "&name"+k+"=" + fsh_name + "&deg_toixoy"+k+"=" + deg_toixoy + "&pros"+k+"=" + fsh_pros;
x += "&fsh_a"+k+"=" + fsh_a + "&fsh_b"+k+"=" + fsh_b + "&fsh_c"+k+"=" + fsh_c;
}//τέλος επαναληψης

	if(print==0){
	//json result
	jQuery.ajax({
			url: x,
			type: "POST",
			async: true, //αλλαγή σε false δουλεύει πάντοτε αλλά επιβραδύνει τον browser
			success: function (data) {
				var html = data;
				document.getElementById("f_fsh_h_general").innerHTML=html;
			}
		});
	}
	
	if(print==1){
	window.open(x,"La-Kenak");
	}
}


<!--######################## fsh scripts ########################### -->

</script>

<?php 
if ($min!=1){
include("includes/footer.php"); 
}
?>


