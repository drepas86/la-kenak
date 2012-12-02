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

require_once("includes/connection.php"); 
require_once("includes/session.php");
require_once("includes/functions.php");
confirm_logged_in();
include("includes/header_kenak.php"); 

if (isset($_SESSION['user_id'])){$login_message="Καλωσήρθες, <a href=\"staff.php\">".$_SESSION['username']."</a>";}
if (isset($_SESSION['meleti_id'])){$login_message.=" - Μελέτη: ".$_SESSION['meleti_perigrafi'];}
if (!isset($_SESSION['meleti_id'])){$login_message.=" - Επιλέξτε μελέτη πρώτα";}
if (!isset($_SESSION['user_id'])){$login_message="<a href=\"login.php\">Σύνδεση</a>";}


$id_meletis = dropdown("SELECT id, perigrafi FROM users_meletes WHERE user_id=".$_SESSION['user_id'], "id", "perigrafi", "id_meletis");
$id_meletis1 = dropdown("SELECT id, perigrafi FROM users_meletes WHERE user_id=".$_SESSION['user_id'], "id", "perigrafi", "id_meletis1");



include_once("includes/form_functions.php");
	
	// Φόρμα για να τεθεί στο session το id και η περιγραφή της μελέτης.
	if (isset($_POST['select_meleti'])) { // Η φόρμα έδωσε στοιχεία.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('id_meletis');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('id_meletis' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$id_meletis = trim(mysql_prep($_POST['id_meletis']));
		
		if ( empty($errors) ) {
			// Έλεγχος εαν υπάρχει ο χρήστης στη βάση
			$query = "SELECT id, perigrafi ";
			$query .= "FROM users_meletes ";
			$query .= "WHERE id = '{$id_meletis}' ";
			$query .= "LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// βρέθηκε η μελέτη
				// σε μία μόνο γραμμή
				$found_meleti = mysql_fetch_array($result_set);
				$_SESSION['meleti_id'] = $found_meleti['id'];
				$_SESSION['meleti_perigrafi'] = $found_meleti['perigrafi'];
				
				?><script type="text/javascript">window.location = "staff.php"</script><?php
				
			} else {
				//Δεν βρέθηκε το id της μελέτης στη βάση
				$message = "Δεν βρέθηκε η μελέτη. Προέκυψε κάποιο πρόβλημα";
			}
		} else {
			if (count($errors) == 1) {
				$message = "Υπήρξε ένα λάθος στη φόρμα.";
			} else {
				$message = "Υπήρξαν " . count($errors) . " λάθη στη φόρμα.";
			}
		}
		
	}
	
	
	
	// Φόρμα για είσοδο μελέτης.
	if (isset($_POST['insert_meleti'])) { // Η φόρμα έδωσε στοιχεία.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('onoma_meletis');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('onoma_meletis' => 100);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$onoma_meletis = trim(mysql_prep($_POST['onoma_meletis']));
		
		if ( empty($errors) ) {
			// Έλεγχος εαν υπάρχει ο χρήστης στη βάση
			$query = "INSERT INTO users_meletes ";
			$query .= "(user_id, perigrafi) ";
			$query .= "VALUES ('";
			$query .= $_SESSION['user_id'] . "', '";
			$query .= $onoma_meletis . "')";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (isset($result_set)) {
				// Τέλος
				
				?><script type="text/javascript">window.location = "staff.php"</script><?php
				}
			} else {
			if (count($errors) == 1) {
				$message = "Υπήρξε ένα λάθος στη φόρμα.";
			} else {
				$message = "Υπήρξαν " . count($errors) . " λάθη στη φόρμα.";
			}
		}
		
	}
	
	
	
	// Φόρμα για διαγραφή μελέτης.
	if (isset($_POST['delete_meleti'])) { // Η φόρμα έδωσε στοιχεία.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('id_meletis1');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('id_meletis1' => 100);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$id_meletis = trim(mysql_prep($_POST['id_meletis1']));
		
		if ( empty($errors) ) {
			
			$tables_array = array("kataskeyi_an_a", "kataskeyi_an_b", "kataskeyi_an_d", "kataskeyi_an_n", "kataskeyi_an_s", "kataskeyi_dap", "kataskeyi_drawing", "kataskeyi_floors", "kataskeyi_ground",
			"kataskeyi_meletis", "kataskeyi_meletis_topo", "kataskeyi_oro", "kataskeyi_skiaseis_an_a", "kataskeyi_skiaseis_an_b", "kataskeyi_skiaseis_an_d",
			"kataskeyi_skiaseis_an_n", "kataskeyi_skiaseis_t_a", "kataskeyi_skiaseis_t_b", "kataskeyi_skiaseis_t_d", "kataskeyi_skiaseis_t_n", "kataskeyi_stoixeia",
			"kataskeyi_therm_alles", "kataskeyi_therm_eks", "kataskeyi_therm_es", "kataskeyi_t_a", "kataskeyi_t_b", "kataskeyi_t_d", "kataskeyi_t_n", "kataskeyi_xsystems_coldb",
			"kataskeyi_xsystems_coldd", "kataskeyi_xsystems_coldp", "kataskeyi_xsystems_coldt", "kataskeyi_xsystems_kkm", "kataskeyi_xsystems_light", "kataskeyi_xsystems_thermb",
			"kataskeyi_xsystems_thermd", "kataskeyi_xsystems_thermp", "kataskeyi_xsystems_thermt", "kataskeyi_xsystems_ygrd", "kataskeyi_xsystems_ygrp", "kataskeyi_xsystems_ygrt",
			"kataskeyi_xsystems_znxa", "kataskeyi_xsystems_znxb", "kataskeyi_xsystems_znxd", "kataskeyi_xsystems_znxiliakos", "kataskeyi_xsystems_znxp", "kataskeyi_xwroi", 
			"kataskeyi_zwnes", "teyxos_f", "teyxos_template");
			
			for ($i=0; $i<=49; $i++){
			$query = "DELETE FROM ";
			$query .= $tables_array[$i];
			$query .= " WHERE meleti_id=".$id_meletis;
			$result_set = mysql_query($query);
			confirm_query($result_set);
			}
			
			$query1 = "DELETE FROM users_meletes ";
			$query1 .= "WHERE id=".$id_meletis;
			$result_set1 = mysql_query($query1);
			confirm_query($result_set1);
			
			unset($_SESSION['meleti_id']);
			
			if (isset($result_set)) {
				// Τέλος
				
				?><script type="text/javascript">window.location = "staff.php"</script><?php
				}
			} else {
			if (count($errors) == 1) {
				$message = "Υπήρξε ένα λάθος στη φόρμα.";
			} else {
				$message = "Υπήρξαν " . count($errors) . " λάθη στη φόρμα.";
			}
		}
		
	}
?>

<script language="JavaScript">
function get_iframe(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
}
</script>

<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
		<td id="navigation">
			&nbsp;
		</td>
		<td id="page">
			<h2>Περιοχή χρηστών</h2>
			<p>Καλωσήρθες στην περιοχή χρηστών, <?php echo $_SESSION['username']; ?>.</p>
			<font color="green">Τώρα μπορείτε να έχετε πρόσβαση στο λογισμικό.</font><img src="images/domika/yes.png"><br/>
			
			<b>Μενού χρήστη</b>
			<ul>
				<li><a href="addresses.php">Οι διευθύνσεις μου</a></li>
				<?php		
				if ($_SESSION['username']=="admin")
				{
				?>
				<li><a href="new_user.php">Προσθήκη χρήστη</a> - Έχετε συνδεθεί ως διαχειριστής</li>
				<?php
				}
				?>
				<li><a href="logout.php">Αποσύνδεση</a></li>
			</ul>
			
			
			
			<?php		
			if ($_SESSION['username']=="admin")
			{
			?>
			<b>Κατάλογος φακέλων</b>
			<ul>
			<li><a class="iframe" href="includes/PDF/" target="_blank" onclick=get_iframe();><img src="theme/icons/pdf.png"></img>Φάκελος PDF</a></li>
			<li><a class="iframe" href="uploadimg/images/" target="_blank" onclick=get_iframe();><img src="theme/icons/jpg.png"></img>Φάκελος ΠΕΑ</a></li>
			<li><a class="iframe" href="xml/" target="_blank" onclick=get_iframe();><img src="theme/icons/xml.png"></img>Φάκελος XML</a></li>
			<li><a class="iframe" href="includes/dxfwrite/" target="_blank" onclick=get_iframe();><img src="theme/icons/draw.png"></img>Φάκελος DXF</a></li>
			</ul>
			<?php
			}
			?>
			
			
			
			<h2>Οι μελέτες μου</h2>
			<br/><hr>
			Για να προσθέσετε μελέτη εργασίας δηλώστε ένα χαρακτηριστικό όνομα για τη μελέτη. Επιτρεπτοί χαρακτήρες: (α-ω,Α-Ω,a-z,A-Z,0,1,2,3,...).
			<form action="staff.php" method="post">
			<input type="text" name="onoma_meletis" size="50">
			<input type="submit" name="insert_meleti" value="Νέα μελέτη">
			</form>
			
			<br/><hr>
			<?php 
			if (isset($_SESSION['meleti_id'])){
			echo "<table><tr><td bgcolor=\"#99FF00\">";
			echo "<font color=\"green\">Έχετε επιλέξει τη μελέτη: ".$_SESSION['meleti_perigrafi']." Μπορείτε τώρα να μεταβείτε στο Μενού
			<a href=\"kenak.php?page=2\">ΜΕΛΕΤΗ</a></font><img src=\"images/domika/yes.png\">";
			}else{
			echo "<table><tr><td bgcolor=\"#99FF00\">";
			echo "<font color=\"red\">Επιλέξτε πρώτα μελέτη εργασίας. Μπορείτε να προσθέσετε νέα μελέτη παραπάνω και έπειτα να την επιλέξετε.</font><img src=\"images/domika/no.png\">";
			}
			
			?>
			
			<form name="select" action="staff.php" method="post">
			<?php echo $id_meletis; ?>
			<input type="submit" name="select_meleti" value="Επιλογή μελέτης">
			</form>
			</td></tr>
			</table>
			
			
			<br/><hr>
			<table>
			<tr><td bgcolor="red">
			Σε περίπτωση λάθους ή και για εξοικονόμηση χώρου μπορείτε να διαγράψετε μία αποθηκευμένη μελέτη.
			<form name="delete" action="staff.php" method="post">
			<?php echo $id_meletis1; ?>
			<input type="submit" name="delete_meleti" value="Διαγραφή μελέτης"> 
			<br/>ΠΡΟΣΟΧΗ! Κατά τη διαγραφή Θα διαγραφούν και όλα τα στοιχεία που προσθέσατε στη μελέτη. Μετά την διαγραφή δεν είναι δυνατή η ανάκτηση αυτών των δεδομένων.
			</form>
			</td></tr>
			</table>
			
			
			
			<?php	
			//Περιοχή διαχειριστή
			if ($_SESSION['username']=="admin")
			{
			?>
			<hr>
			Έχεις συνδεθεί ως διαχειριστής. <br/><br/>
			<ol>
			<li>Μπορείς	να <a href="new_user.php">προσθέσεις ένα χρήστη</a> και να δεις τους χρήστες που υπάρχουν στη βάση.</li>
			<li>Στο μενού <a href="kenak.php?page=1">ΚΕΝΑΚ - Αποθήκευση/Ανάκτηση</a> έχεις τη δυνατότητα εξαγωγής/εισαγωγής των μελετών όλων των χρηστών σε xml/sql.</li>
			<li>Το <a href="kenak.php?page=10">πρότυπο τεύχος</a> της μελέτης "Μελέτη χρήστη admin" χρησιμοποιείται ως πρότυπο τεύχος για κάθε νέο χρήστη που προστίθεται
			και για κάθε νέα μελέτη του την πρώτη φορά που θα μεταβεί στο μενού ΜΕΛΕΤΗ-Τεύχος.</li>
			<li>Για δοκιμές αλλά και για εντοπισμό λαθών έχει προστεθεί μία πρότυπη μελέτη διόροφου κτιρίου (ζώνη 1 - ΘΧ) με υπόγειο (ζώνη 2 - ΜΘΧ).</li>
			<li>Οι βιβλιοθήκες υλικών/κλιματικών είναι κοινές για όλους του χρήστες για τη διασφάλιση της ίδιας μεθοδολογίας ενώ τα δομικά στοιχεία των βιβλιοθηκών επίσης με το σκεπτικό 
			της πολυσυνεργασίας αλλά και της ανάπτυξης/εξέλιξης αυτής της βάσης δεδομένων από όλους τους χρήστες.</li>
			<li>Σε όλα τα τμήματα του λογισμικού απαιτείται σύνδεση του χρήστη ενώ στο μενού ΜΕΛΕΤΗ απαιτείται και επιλογή της μελέτης εργασίας.</li>
			</ol>
			
			<?php
			}
			?>
			
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>
