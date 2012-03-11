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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>La-Kenak - v<?php echo VERSION; ?> - Δομικά στοιχεία κελύφους</title>
		<link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
		<link href="stylesheets/by_tsak1.css" media="all" rel="stylesheet" type="text/css" />

		<link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
		<link href="stylesheets/by_tsak1.css" media="all" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="stylesheets/colorbox.css" />
		<script src="javascripts/sorttable.js"></script>
		<script src="javascripts/jquery.min.js" type="text/javascript"></script>
		<script src="javascripts/jquery-ui-personalized-1.5.2.packed.js"></script>
		<script src="javascripts/jquery.colorbox.js" type="text/javascript"></script>
		<script src="javascripts/encoder.js" type="text/javascript"></script>
		<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
		<script src="javascripts/cssfix.js"></script>
		
		<?php include("includes/kelyfos_scripts.php"); ?>
		<script  type="text/javascript">
		$(document).ready(function() {  
		$('#tabvanilla > ul').tabs();  
		}); 
		</script>
	</head>
<?php
$anrec="*";
if (isset($_GET['read'])) $anrec=$_GET['read'];
echo'<script  type="text/javascript">
function checkread(){
var x="'.$anrec.'";
if (x=="*"){return;}
document.getElementById("an_rec").selectedIndex=x;
read_an1();
}</script>';
?>

	<body onload=checkread();>
<?php if ($min!=1){?>	
		<div id="header">
			<h1><a href=index.php>La-Kenak v<?php echo VERSION; ?> - Δομικά στοιχεία κελύφους</a></h1>
		</div>
<?php }?>
		