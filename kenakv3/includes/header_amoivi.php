﻿<?php
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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>La-Kenak - v<?php echo VERSION; ?> - Μελέτη ΚΕΝΑΚ</title>
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
		<script type="text/javascript" src="includes/ckeditor/ckeditor.js"></script>
		<script src="javascripts/cssfix.js"></script>
		<script>
		$(document).ready(function() {  
		$('#tabvanilla').tabs();  
		}); 
		</script>
		<script>
		$(document).ready(function() {  
		$('#helpme').tabs();  
		}); 
		</script>
		
		<script>
		$("#kenakform").validator();
		</script>
<?php 
//
?>
<script type="text/javascript">
function showhideoptions() {
document.getElementById("katoikia").style.display = "none"; 
document.getElementById("levitas").style.display = "none"; 
document.getElementById("levitaspalaios").style.display = "none"; 
document.getElementById("klimatismos").style.display = "none"; 
document.getElementById("emvadon").style.display = "none";
if (document.getElementById("xrisi").selectedIndex == 0) {document.getElementById("katoikia").style.display = "";}
if (document.getElementById("xrisi").selectedIndex == 2) {document.getElementById("levitas").style.display = "";document.getElementById("levitaspalaios").style.display = "";}
if (document.getElementById("xrisi").selectedIndex == 3) {document.getElementById("klimatismos").style.display = "";}
if (document.getElementById("xrisi").selectedIndex < 2) {document.getElementById("emvadon").style.display = "";}
}
</script>

	</head>
	<body onload=get_active();>
		<div id="header">
		</div>
<?php include ('menu.php'); ?>
