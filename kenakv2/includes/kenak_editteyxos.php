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
*************************************************************************
Tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr       *
-                                                                       *
- Επεξεργασία του πρότυπου τεύχους                                      *
-                                                                       *
*************************************************************************
*/

require_once("connection.php"); 
require_once("functions.php"); 
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>La-Kenak - v<?php echo VERSION; ?> - Μελέτη ΚΕΝΑΚ</title>
		<link href="../stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
		<link href="../stylesheets/by_tsak1.css" media="all" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../stylesheets/colorbox.css" />
		<script src="../javascripts/sorttable.js"></script>
		<script src="../javascripts/jquery.min.js" type="text/javascript"></script>
		<script src="../javascripts/jquery-ui-personalized-1.5.2.packed.js"></script>
		<script src="../javascripts/jquery.colorbox.js" type="text/javascript"></script>
		<script src="../javascripts/encoder.js" type="text/javascript"></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script src="../javascripts/cssfix.js"></script>
		<script>
		$(document).ready(function() {  
		$('#tabvanilla > ul').tabs();  
		}); 
		</script>
	</head>
	<body>
<script type="text/javascript">
	document.write("<style>ul.tabnav {margin-bottom:6px;}</style>");
</script>

<?php

$strSQL = "SELECT * FROM teyxos_template";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult[] = mysql_fetch_array($objQuery));
$kef1=$objResult[0]["text"];
$kef2=$objResult[1]["text"];
$kef3=$objResult[2]["text"];
$kef4=$objResult[3]["text"];
$kef5=$objResult[4]["text"];
$kef6=$objResult[5]["text"];
$kef7=$objResult[6]["text"];
$kef8=$objResult[7]["text"];


?>	

<div id="tabvanilla" class="widget">
<ul class="tabnav">
<?php
for ($i=1;$i<=8;$i++){
$j=$i;
$p="Κεφ. ".$j;
if ($j==8)$p="Υπολογισμοί";
echo "<li><a  onclick=\"active_tab=".$j.";\" href=\"#kef".$j."\">".$p."</a></li>";
}
?>
</ul>

<?php
for ($i=1;$i<=8;$i++){
$j=$i;
if ($i==1)echo"<div id=\"kef".$j."\" class=\"tabdiv\">";
if ($i>1)echo"<div id=\"kef".$j."\" class=\"tabdiv\" style=\"display:none;\">";
echo"<form id=\"f".$j."\" action=\"./save_teyxos.php\" method=\"post\">";
echo"<div id=\"container\" style=\"background:#eee;border:1px solid #000000;padding:3px;width:99%;height:580px;\">";
echo"<textarea name=\"kef".$j."a\" id=\"kef".$j."a\" >".${'kef'.$j}."</textarea>";
echo"<script type=\"text/javascript\">CKEDITOR.replace('kef".$j."a');</script>";
echo"<input type=\"hidden\" name=\"kef\" value=\"".$j."\"><br/>";
echo"<input type=\"hidden\" name=\"template\" value=\"1\"><br/>";
echo"</div><input type=\"submit\" value=\"Αποθήκευση Κεφαλαίου\" />";
echo"</form></div>";
}
echo "</div>";


?>

<script type="text/javascript">
	active_tab=1;
</script>

</body></html>
