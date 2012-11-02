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
require_once("includes/session.php");
require_once("includes/connection.php"); 
require_once("includes/functions.php"); 
include_once("includes/form_functions.php");
confirm_logged_in();
confirm_meleti_isset();
find_selected_page(); 
include("includes/header_kenak.php"); 

if (isset($_SESSION['user_id'])){$login_message="Καλωσήρθες, <a href=\"staff.php\">".$_SESSION['username']."</a>";}
if (isset($_SESSION['meleti_id'])){$login_message.=" - Μελέτη: ".$_SESSION['meleti_perigrafi'];}
if (!isset($_SESSION['meleti_id'])){$login_message.=" - Επιλέξτε μελέτη πρώτα";}
if (!isset($_SESSION['user_id'])){$login_message="<a href=\"login.php\">Σύνδεση</a>";}
?>

<div class="topright"><?php echo $login_message ?><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
		<td id="page">

<?php //το αρχείο των υπολογισμών αν υποβλήθηκε η φόρμα στο πρώτο στοιχείο του μενού. Ανενεργό
include("includes/apotelesmata_kenak.php");
?>	

<?php
//τα αρχεία των υπολογισμών (προσθήκη δεδομένων από τις φόρμες στη βάση) αν υποβλήθηκε κάποια από τις φόρμες.
include("includes/core-formprocess/adddel_xwrwn.php");
include("includes/core-formprocess/adddel_stoixeia.php");
include("includes/core-formprocess/adddel_daporo.php");
include("includes/core-formprocess/adddel_thermo_dap.php");
include("includes/core-formprocess/adddel_thermo_eks.php");
include("includes/core-formprocess/adddel_thermo_es.php");
include("includes/core-formprocess/adddel_toixoi.php");
include("includes/core-formprocess/adddel_an.php");
include("includes/core-formprocess/adddel_hm.php");
include("includes/core-formprocess/adddel_teyxos.php");
include("includes/core-formprocess/adddel_skiaseis.php");
include("includes/core-formprocess/adddel_meletis.php");
include("includes/core-formprocess/adddel_zwnwn.php");

?>
	
<?php
//Η φόρμα για το πρώτο στοιχείο του μενού. Υπολογισμός με POST σε μία και μόνο φόρμα - DISCONTINUED
//include("includes/kenak_form1.php");

//ΜΕΝΟΥ-ΑΠΟΘΗΚΕΥΣΗ-ΑΝΑΚΤΗΣΗ
include("includes/kenak_menu_saverestore.php");
//ΜΕΝΟΥ-ΓΕΝΙΚΑ ΣΤΟΙΧΕΙΑ
include("includes/kenak_menu_stoixeia.php");
//ΜΕΝΟΥ-ΘΕΡΜΙΚΕΣ ΖΩΝΕΣ
include("includes/kenak_menu_zwnes.php");
//ΜΕΝΟΥ-ΣΥΣΤΗΜΑΤΑ
include("includes/kenak_menu_hm.php");
//ΜΕΝΟΥ-ΕΠΑΦΗ ΜΕ ΕΔΑΦΟΣ
include("includes/kenak_menu_ground.php");
//ΜΕΝΟΥ-ΔΟΜΙΚΑ ΣΤΟΙΧΕΙΑ (ΤΟΙΧΟΙ)
include("includes/kenak_menu_t.php");
//ΜΕΝΟΥ-ΑΝΟΙΓΜΑΤΑ
include("includes/kenak_menu_an.php");
//ΜΕΝΟΥ-ΣΚΙΑΣΕΙΣ ΤΟΙΧΩΝ
include("includes/kenak_menu_sk_t.php");
//ΜΕΝΟΥ-ΣΚΙΑΣΕΙΣ ΑΝΟΙΓΜΑΤΩΝ
include("includes/kenak_menu_sk_an.php");
//ΜΕΝΟΥ-ΤΕΥΧΟΣ
include("includes/kenak_menu_teyxos.php");
//ΜΕΝΟΥ-ΠΡΟΕΠΙΣΚΟΠΙΣΗ ΑΠΟΤΕΛΕΣΜΑΤΩΝ - DOCX-XLSX - DISCONTINUED
//include("includes/kenak_form5.php");




?>	
		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>