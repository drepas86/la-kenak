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
<html>
<head>
<link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="stylesheets/colorbox.css" />
		<link href="stylesheets/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
		<link href="stylesheets/jtable_green.css" rel="stylesheet" type="text/css" />
		<link href="stylesheets/by_tsak1.css" media="all" rel="stylesheet" type="text/css" />

		<script src="javascripts/jquery-1.7.2.js" type="text/javascript"></script>
		<script src="javascripts/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
		<script src="javascripts/jquery.colorbox.js" type="text/javascript"></script>
		<script src="javascripts/jquery.jtable.js" type="text/javascript"></script>

		<script src="javascripts/encoder.js" type="text/javascript"></script>
		<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
		<script src="javascripts/cssfix.js"></script>
		
		<script  type="text/javascript">
		$(document).ready(function() {  
		$('#tabvanilla').tabs();  
		}); 
		</script>
</head>

<body>
<?php
echo date("F j, Y, g:i a") . "<h1>Καλωσορίσατε στην εγκατάσταση του la-kenak ". VERSION ."</h1>";
?>

<div id="tabvanilla" class="widget">
	<ul class="tabnav">  
	<li><a href="#install">Εγκατάσταση</a></li>
	</ul>  		
<div id="install" class="tabdiv" > 

<?php
echo "<br/>Είτε είναι η πρώτη φορά που βρίσκεστε στο λογισμικό είτε δεν υπάρχει επικοινωνία με τη βάση δεδομένων.<br/>
Ακολουθήστε τα βήματα εγκατάστασης παρακάτω για να εγκαταστήσετε τη βάση δεδομένων:<br/>";
?>
<table border="1">
<tr>
	<th colspan="3">Απαιτήσεις λογισμικού</th>
</tr>

<tr>
	<th>Είδος</th>
	<th>Απαίτηση</th>
	<th>Έλεγχος</th>
</tr>
<tr>
	<td>Έκδοση php</td>
	<td>5.0.0</td>
	<td>
		<?php 
		
		if (version_compare(phpversion(),'5.0.0') > 0) {
		echo "ΟΚ! ";
		}else{
		echo "<font color=\"red\">Ενδέχεται να αντιμετωπίσετε προβλήματα <br/>με την έκδοση php που βρέθηκε εγκατεστημένη.</font>";
		}
		echo phpversion();
		?>
	</td>
</tr>
<tr>
	<td>gd library</td>
	<td>2.0</td>
	<td>
		<?php
		if (extension_loaded('gd') && function_exists('gd_info')) {
		$gd_version = gd_info();
		echo "ΟΚ! " . $gd_version["GD Version"];
		}else{
		echo "<font color=\"red\">Η βιβλιοθήκη gd δεν βρέθηκε</font>";
		}
		?>
	</td>
</tr>
<tr>
	<td>Δικαιώματα φακέλων</td>
	<td>xml</td>
	<td>
		<?php
		if (is_writable('xml')) {
		echo "OK! " . "/xml";
		}else{
		echo "<font color=\"red\">Ο φάκελος xml <br/>δεν έχει διακαιώματα εγγραφής</font>";
		}
		?>
	</td>
</tr>
<tr>
	<td>Δικαιώματα φακέλων</td>
	<td>Τεύχος</td>
	<td>
		<?php
		if (is_writable('includes/PDF')) {
		echo "OK! " . "/includes/PDF";
		}else{
		echo "<font color=\"red\">Ο φάκελος /includes/PDF <br/>δεν έχει διακαιώματα εγγραφής</font>";
		}
		?>
	</td>
</tr>
<tr>
	<td>Δικαιώματα φακέλων</td>
	<td>Αποθήκευση μελετών</td>
	<td>
		<?php
		if (is_writable('save-scripts')) {
		echo "OK! " . "/save-scripts";
		}else{
		echo "<font color=\"red\">Ο φάκελος save-scripts <br/>δεν έχει διακαιώματα εγγραφής</font>";
		}
		?>
	</td>
</tr>
<tr>
	<td>Δικαιώματα φακέλων</td>
	<td>Σκαριφήματα</td>
	<td>
		<?php
		if (is_writable('includes')) {
		echo "OK! " . "/includes";
		}else{
		echo "<font color=\"red\">Ο φάκελος includes <br/>δεν έχει διακαιώματα εγγραφής</font>";
		}
		?>
	</td>
</tr>
</table>
</br></br>

<form name="installform" action="install/install_script.php" method="post">
	<table border="1">
		<tr><th>Στοιχείο</th><th>Εισαγωγή</th></tr>
		<tr>
		<td>Διακομιστής:<?php echo "(βρέθηκε : <font color=\"blue\">" . $_SERVER['SERVER_NAME'] . "</font>)"; ?></td>
		<td><input type="text" name="dbserver" id="dbserver" size="20" value="localhost" /></td>
		</tr>
		<tr>
		<td>Όνομα βάσης:</td>
		<td><input type="text" name="dbname" id="dbname" size="20" value="labros_kenakv3" /></td>
		</tr>
		<tr>
		<td>Χρήστης βάσης:</td>
		<td><input type="text" name="dbuser" id="dbuser" size="20" value="root" /></td>
		</tr>
		<tr>
		<td>Κωδικός βάσης:</td>
		<td><input type="password" name="dbpwd" size="20" /></td>
		</tr>
		<tr>
		<td>Εισαγωγή ενδεικτικού περιεχομένου:</td>
		<td><input type="checkbox" name="periexomeno" /></td>
		</tr>
		<tr>
		<td colspan="2" align="middle">
		<input type="submit" name="installform" value="Εγκατάσταση" />
		</td>
		</tr>
	</table>
</form>
</div>
</div>
</body>
</html>