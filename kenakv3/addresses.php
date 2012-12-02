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
find_selected_page(); 
include("includes/header_kenak.php"); 

if (isset($_SESSION['user_id'])){$login_message="Καλωσήρθες, <a href=\"staff.php\">".$_SESSION['username']."</a>";}
if (isset($_SESSION['meleti_id'])){$login_message.=" - Μελέτη: ".$_SESSION['meleti_perigrafi'];}
if (!isset($_SESSION['meleti_id'])){$login_message.=" - Επιλέξτε μελέτη πρώτα";}
if (!isset($_SESSION['user_id'])){$login_message="<a href=\"login.php\">Σύνδεση</a>";}
?>

<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
		<td id="page">
<h2>Συνεργάτες / Βιβλίο διευθύνσεων</h2><br/><br/>
<?php

$tb_name="jtable_container";
$ped="synergates";
						$dig="0|0|0|0|0|0|0|0|0|0|0";
						$fields="fields: {
							id: {key: true,create: false,edit: false,list: false},
							user_id: {create: false,edit: false,list: false},
							name: {title: 'Ονομα',width: '15%'},
							syrname: {title: 'Επώνυμο',width: '15%',listClass: 'center'},
							address: {title: 'Διεύθυνση',width: '25%',listClass: 'center'},
							tel: {title: 'Τηλέφωνο',width: '15%',listClass: 'center'},
							mobile: {title: 'Κινητό',width: '15%',listClass: 'center'},
							comments: {title: 'Σχόλια',width: '15%',listClass: 'center'}
						}";
						include('includes/jtable_a.php');

?>	
		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>