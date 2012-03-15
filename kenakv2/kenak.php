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
require_once("includes/functions.php"); 
find_selected_page(); 
include("includes/header_kenak.php"); 
?>

<div class="topright"><img src="images/home.png" align="right"></img><a href="index.php">Βιβλιοθήκες</a><br/><a href="index_climate.php">Κλιματικά δεδομένα</a><br/><a href="index_skiaseis.php">Υπολογισμός Σκιάσεων</a><br/><a href="stoixeia_zwnis.php">Στοιχεία ζώνης</a><br/><a href="domika_kelyfos.php">Κέλυφος</a><br/><a href="kenak.php">ΚΕΝΑΚ</a></div>
<table id="structure">
	<tr>
		<td id="navigation">
		<ol type="circle">
			<!--<li><a href="kenak.php?page=1">ΚΕΝΑΚ Υπολογισμοί</a><br/></li>-->
			<li><a href="kenak.php?page=9">Αποθήκευση/Ανάκτηση</a><br/></li>
			<li><a href="kenak.php?page=2">Γενικά στοιχεία</a><br/></li>
			<li><a href="kenak.php?page=11">Θερμικές ζώνες</a><br/></li>
			<li><a href="kenak.php?page=10">Συστήματα</a><br/></li>
			<li><a href="kenak.php?page=3">Δομικά στοιχεία</a><br/></li>
			<li><a href="kenak.php?page=4">Ανοίγματα</a><br/></li>
			<li><a href="kenak.php?page=7">Σκιάσεις Τοίχων</a><br/></li>
			<li><a href="kenak.php?page=8">Σκιάσεις Ανοιγμάτων</a><br/></li>
			<li><a href="kenak.php?page=5">Τεύχος</a><br/></li>
			<li><a href="kenak.php?page=6">Αποτελέσματα</a><br/></li>
		</ol>	
			<div id="imgs" style="width:50%;margin-left:auto;margin-right:auto;"></div>
		</td>
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
include("includes/kenak_saverestore.php");
//ΜΕΝΟΥ-ΓΕΝΙΚΑ ΣΤΟΙΧΕΙΑ
include("includes/kenak_form2.php");
//ΜΕΝΟΥ-ΘΕΡΜΙΚΕΣ ΖΩΝΕΣ
include("includes/kenak_zwnes.php");
//ΜΕΝΟΥ-ΣΥΣΤΗΜΑΤΑ
include("includes/kenak_form_hm.php");
//ΜΕΝΟΥ-ΔΟΜΙΚΑ ΣΤΟΙΧΕΙΑ (ΤΟΙΧΟΙ)
include("includes/kenak_form3.php");
//ΜΕΝΟΥ-ΑΝΟΙΓΜΑΤΑ
include("includes/kenak_form4.php");
//ΜΕΝΟΥ-ΣΚΙΑΣΕΙΣ ΤΟΙΧΩΝ
include("includes/kenak_skiaseis_t.php");
//ΜΕΝΟΥ-ΣΚΙΑΣΕΙΣ ΑΝΟΙΓΜΑΤΩΝ
include("includes/kenak_skiaseis_an.php");
//ΜΕΝΟΥ-ΤΕΥΧΟΣ
include("includes/kenak_formteyxos.php");
//ΜΕΝΟΥ-ΠΡΟΕΠΙΣΚΟΠΙΣΗ ΑΠΟΤΕΛΕΣΜΑΤΩΝ - DOCX-XLSX
include("includes/kenak_form5.php");




?>	
		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>