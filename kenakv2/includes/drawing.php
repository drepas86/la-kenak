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

***********************************************************************
Tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr     *
                                                                      *
Javascripts για σχεδίαση χώρων και τοίχων, επιλογή θερμογεφυρών κλπ   *
                                                                      *
***********************************************************************

*/
include("connection.php");
include("functions.php");
$floor=0;
if (isset($_GET['floor']))$floor=$_GET["floor"];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>La-Kenak - v<?php echo VERSION; ?> - Μελέτη ΚΕΝΑΚ</title>
		<link href="../stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../stylesheets/colorbox.css" />
		<link href="../stylesheets/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
		<link href="../stylesheets/by_tsak1.css" media="all" rel="stylesheet" type="text/css" />

		<script src="../javascripts/jquery-1.7.2.js" type="text/javascript"></script>
		<script src="../javascripts/jquery-ui-1.8.18.custom.min.js" type="text/javascript"></script>
		<script src="../javascripts/jquery.colorbox.js" type="text/javascript"></script>

		<script type="text/javascript" src="../javascripts/wz_jsgraphics.js"></script>
		<script src="../javascripts/draw_scripts.js" type="text/javascript"></script>

	</head>
	<body style="background:#ffffff;" onload="init();">

<div style="position:absolute;top:50px;left:60px;width:800px;height:600px;">
<canvas id="canvas" width="800" height="600" style="border:1px solid #d3d3d3;cursor:crosshair;position:absolute;top:0px;left:0px;"  
		onmousemove="mousemove(event);" onclick="mouseclick(event);" 
		onmousedown="mousedown(event);" onmouseup="mouseup(event);"
>your browser does not support the canvas tag </canvas>
</div>

<div style="position:absolute;top:50px;left:5px;width:55px;height:600px;"  id="toolbox" >
<img src="../images/domika/edit.png" width="50px" height="50px" style="cursor:pointer;background:#aaaaaa;" title="σχεδίαση" id="edit"  onclick="set_action('edit');" /><br /><br />
<img src="../images/domika/eraser.png" width="50px" height="50px" style="cursor:pointer;" title="διαγραφή"  id="erase" onclick="set_action('erase');" /><br /><br />
<img src="../images/domika/move.png" width="50px" height="50px" style="cursor:pointer;" title="μετακίνηση"  id="move" onclick="set_action('move');" /><br /><br />
<img src="../images/domika/properties.png" width="50px" height="50px" style="cursor:pointer;" title="ιδιότητες"  id="props" onclick="set_action('props');" /><br /><br />
<img src="../images/domika/save2.png" width="50px" height="50px" style="cursor:pointer;" title="αποθήκευση"  id="save" onclick="set_action('save');" /><br /><br />
<img src="../images/domika/png.png" width="50px" height="50px" style="cursor:pointer;" title="εισαγωγή κάτοψης"  id="insert" onclick="set_action('insert');" /><br /><br />
<img src="../images/domika/tape.png" width="50px" height="50px" style="cursor:pointer;" title="βαθμονόμηση κάτοψης"  id="calibr" onclick="set_action('calibr');" /><br /><br />
<img src="../images/domika/help1.png" width="50px" height="50px" style="cursor:pointer;" title="οδηγίες"  id="help" onclick="set_action('help');" /><br /><br />
</div>

<div style="position:absolute;top:10px;left:60px;width:850px;height:30px;" id="infobox" >
<div style="display:none;">
X: <input type="text" id="x" style="width:50px;"> 
Y: <input type="text" id="y" style="width:50px;"> 
Lx: <input type="text" id="lx" style="width:50px;"> 
Ly: <input type="text" id="ly" style="width:50px;"> 
Ymax= <input type="text" id="ymax" style="width:50px;" onchange="setmax();"> 
</div>
Στάθμη: <select id="floor" onchange="change_floor();">
		<option></option>
		<option value='1'>Υπόγειο</option>
		<option value='2'>Ισόγειο</option>
		<option value='3'>1ος Οροφος</option>
		<option value='4'>2ος Οροφος</option>
		<option value='5'>Δώμα - Στέγη</option>
		</select>
<!--
<select id="floor" onchange="change_floor();"><option></option>
<?=dropdown1("SELECT * FROM ktirio", "id", "floor");?>
</select>
-->
<input type="radio" id="d1" name="dtype" value="1" onclick="set_type();" checked="checked" />Δάπεδο
<input type="radio" id="d5" name="dtype" value="5" onclick="set_type();" />Εξώστης
<input type="radio" id="d2" name="dtype" value="2" onclick="set_type();" />Τοίχος
<input type="radio" id="d3" name="dtype" value="3" onclick="set_type();" />Άνοιγμα
<input type="radio" id="d4" name="dtype" value="4" onclick="set_type();" />Υποστύλωμα
<input type="radio" id="d6" name="dtype" value="6" onclick="set_type();" />Θερμογέφυρα
</div>

<div style="position:absolute;top:49px;left:60px;width:800px;height:1px;" id="drawbox" >
<div id="draw" style="position:relative;height:1px;width:1px;"></div>
</div>

<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για εισαγωγή κάτοψης                                          -->
<div style='display:none'><div id='image_insert' style='padding:10px; background:#ebf9c9;'>
<form name="uploadForm">
<h3>Εισαγωγή εικόνας</h3>
<table>
<tbody>
<tr>
<td><img id="uploadPreview" style="border:1px solid black; width: 400px; height: 300px;" src="data:image/svg+xml,%3C%3Fxml%20version%3D%221.0%22%3F%3E%0A%3Csvg%20width%3D%22153%22%20height%3D%22153%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%0A%20%3Cg%3E%0A%20%20%3Ctitle%3ENo%20image%3C/title%3E%0A%20%20%3Crect%20id%3D%22externRect%22%20height%3D%22150%22%20width%3D%22150%22%20y%3D%221.5%22%20x%3D%221.500024%22%20stroke-width%3D%223%22%20stroke%3D%22%23666666%22%20fill%3D%22%23e1e1e1%22/%3E%0A%20%20%3Ctext%20transform%3D%22matrix%286.66667%2C%200%2C%200%2C%206.66667%2C%20-960.5%2C%20-1099.33%29%22%20xml%3Aspace%3D%22preserve%22%20text-anchor%3D%22middle%22%20font-family%3D%22Fantasy%22%20font-size%3D%2214%22%20id%3D%22questionMark%22%20y%3D%22181.249569%22%20x%3D%22155.549819%22%20stroke-width%3D%220%22%20stroke%3D%22%23666666%22%20fill%3D%22%23000000%22%3E%3F%3C/text%3E%0A%20%3C/g%3E%0A%3C/svg%3E" alt="Image preview" /></td>
</tr><tr><td><input id="uploadImage" type="file" size="30" onchange="loadImageFile();" />&nbsp;&nbsp;
<button type="button" onclick="redraw_all();set_action('calibr');" >Εισαγωγή</button></td>
</tr>
</tbody>
</table>
</form>
</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για βαθμονόμηση κάτοψης                                       -->
<div style='display:none'><div id='image_calibr' style='padding:10px; background:#ebf9c9;'>
<h3>Βαθμονόμηση εικόνας</h3><hr>
Συμπληρώστε την απόσταση κατά Y των δύο σημείων (σε μέτρα).<br /><br /> 
<table style="width:100%"><tr>
<td style="text-align:right;">απόσταση: </td><td style="text-align:center;"><input type="text" id="cal1" size="5" value="" onchange="calibrate();" /></td></tr>
</table><hr>
<table style="width:100%"><tr><td style="text-align:right;"><button type="button" onclick="calibrate();">OK</button></td></tr></table>
</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για επεξεργασία χώρου                                         -->
<div style='display:none'><div id='info' style='padding:10px; background:#ebf9c9;'>
<b>Ιδιότητες χώρου</b><hr>
<table style="width:100%"><tr><td style="width:30%">
<table style="width:100%"><tr>
<td style="text-align:right;">Ονομα: </td><td style="text-align:center;"><input type="text" id="n" size="10" value=""/></td></tr><tr>
<td style="text-align:right;">X: </td><td style="text-align:center;"><input type="text" id="x_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;">Y: </td><td style="text-align:center;"><input type="text" id="y_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;">Μήκος: </td><td style="text-align:center;"><input type="text" id="lx_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;">Πλάτος: </td><td style="text-align:center;"><input type="text" id="ly_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;">Υψος: </td><td style="text-align:center;"><input type="text" id="h" size="5" value=""/></td></tr><tr>
<td style="text-align:right;">Θερμική Ζώνη:</td><td style="text-align:center;"><input type="text" id="z" size="5" value=""/></td></tr>
</table></td><td style="width:70%">
<table style="width:100%"><tr>
<td style="text-align:center;" colspan="2">
<input type="radio" id="t1" name="stype" value="1" checked="checked" />Δάπεδο
<input type="radio" id="t2" name="stype" value="2" />Οροφή
<br /><br /></td></tr><tr>
<td style="text-align:center;border-top:1px solid black;" colspan="2">Χώρος επάνω από: </td></tr><tr>
<td style="text-align:center;" colspan="2">
	<select id="dap">
		<option>Θερμαινόμενο χώρο</option>
		<option>Μη θερμαινόμενο χώρο</option>
		<option>Ανοικτή διάβαση (pilotis)</option>
		<option>Εδαφος</option>
	</select>
<br /><br /></td></tr><tr>
<td style="text-align:center;border-top:1px solid black;" colspan="2">Συντελεστής Θερμοπερατότητας</td></tr><tr>
<td style="text-align:right;width:30%;">U:
</td><td style="text-align:left;width:70%;">
<input type="text" id="u" size="10" value=""/>
</td></tr></table>
</td></tr></table>
<hr><table style="width:100%"><tr><td style="text-align:right;"><button type="button" onclick="save_xwros();">OK</button></td></tr></table>
</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για επεξεργασία τοίχων                                        -->
<div style='display:none'><div id='info1' style='padding:10px; background:#ebf9c9;'>
<b>Ιδιότητες τοίχου</b><button style="float:right;" type="button" onclick="save_toixos(0); view_toixos();"> O ψ η </button><hr>
<table style="width:100%"><tr><td style="width:30%">
<table style="width:100%"><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Ονομα: </td><td style="text-align:center;vertical-align:middle;"><input type="text" id="tn" size="20" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">X: </td><td style="text-align:center;vertical-align:middle;"><input type="text" id="tx_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Y: </td><td style="text-align:center;vertical-align:middle;"><input type="text" id="ty_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Μήκος: </td><td style="text-align:center;vertical-align:middle;"><input type="text" id="tlx_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Πάχος: </td><td style="text-align:center;vertical-align:middle;"><input type="text" id="tly_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Υψος: </td><td style="text-align:center;vertical-align:middle;"><input type="text" id="th" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Θερμική Ζώνη:</td><td style="text-align:center;vertical-align:middle;"><input type="text" id="tz" size="5" value=""/></td></tr>
</table></td><td style="width:70%">
<table style="width:100%;"><tr>
<td style="text-align:center;" colspan="2">
<div id="orientation"></div> <br />
</td></tr><tr style="padding:5px;">
<td style="text-align:center;border-top:1px solid black;" colspan="2">Τοίχος σε επαφή με: </td></tr><tr>
<td style="text-align:center;height:25px;" colspan="2">
	<select id="dap1">
		<option>Εξωτερικό αέρα</option>
		<option>Μη θερμαινόμενο χώρο</option>
		<option>Εδαφος</option>
	</select>
<br /></td></tr><tr>
<td style="text-align:right;width:50%;height:25px;vertical-align:middle;border-top:1px solid black;">U:
</td><td style="text-align:left;width:50%;vertical-align:middle;border-top:1px solid black;">
<input type="text" id="tu" size="5" value=""/></td></tr><tr>
<td style="text-align:right;width:50%;height:25px;vertical-align:middle;">Ψ δαπέδου:
</td><td style="text-align:left;width:50%;vertical-align:middle;">
<input type="text" id="th_dap" size="5" value=""/>
<a id="thermodap" href="kenak_help6.php?p=1" title="" onclick="get_thermo_dap();"><img src="../images/style/help.png"/></a>
</td></tr><tr>
<td style="text-align:right;width:50%;height:25px;vertical-align:middle;">Ψ οροφής:
</td><td style="text-align:left;width:50%;vertical-align:middle;">
<input type="text" id="th_or" size="5" value=""/>
<a id="orofis" href="kenak_help1.php?p=99" title="" onclick="get_thermo_or();"><img src="../images/style/help.png"/></a>
</td></tr><tr>
<td style="text-align:right;width:50%;height:25px;border-top:1px solid black;vertical-align:middle;">Υψος δοκού:
</td><td style="text-align:left;width:50%;vertical-align:middle;border-top:1px solid black;">
<input type="text" id="hd" size="5" value=""/></td></tr><tr>
<td style="text-align:right;width:50%;height:25px;vertical-align:middle;">U δοκού:
</td><td style="text-align:left;width:50%;vertical-align:middle;">
<input type="text" id="u_dok" size="5" value=""/></td></tr><tr>
<td style="text-align:right;width:50%;height:25px;vertical-align:middle;">Ψ δοκού:
</td><td style="text-align:left;width:50%;vertical-align:middle;">
<input type="text" id="th_dok" size="5" value=""/>
<a id="dok" href="kenak_help2.php?p=1" title="" onclick="get_thermo_dok();"><img src="../images/style/help.png"/></a>
</td></tr></table>
</td></tr></table>
<hr><table style="width:100%"><tr><td style="text-align:right;"><button type="button" onclick="save_toixos(1);">OK</button></td></tr></table>
<div style="display:none;">
<?php
$thermo_d = dropdown1("SELECT name, y FROM thermo_d", "y", "name");
$thermo_oe = dropdown1("SELECT name, y FROM thermo_oe", "y", "name");
$thermo_pr = dropdown1("SELECT name, y FROM thermo_pr", "y", "name");
$thermo_edp = dropdown1("SELECT name, y FROM thermo_edp", "y", "name");
echo "<select id=\"t_thermo\" >" . $thermo_d . $thermo_oe . $thermo_pr . "</select>";
echo "<select id=\"d_thermo\" >" . $thermo_edp . $thermo_pr . "</select>";
?></div>
</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για όψεις τοίχων                                              -->
<div style='display:none'><div id='view' style='padding:10px; background:#ebf9c9;'>
<div style="position:absolute;top:10px;left:10px;width:780px;height:40px;" id="v_info"></div>
<div style="position:absolute;top:50px;left:0px;width:800px;height:400px;">
<canvas id="v_canvas" width="800" height="400" 
		style="background:#eeefff;border:1px solid #d3d3d3;cursor:crosshair;position:absolute;top:0px;left:0px;"  
		onmousemove="mousemove(event);" onclick="mouseclick(event);" 
		onmousedown="mousedown(event);" onmouseup="mouseup(event);"
>your browser does not support the canvas tag </canvas>
</div>
<div style="display:none;">
<img src="../images/hatch/brick1.png" id="brick" width="50" height="51" />
<img src="../images/hatch/concrete.png" id="concr" width="65" height="65" />
<img src="../images/hatch/glass.png" id="glass" width="71" height="72" />
</div>
</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για επεξεργασία ανοιγμάτων                                    -->
<div style='display:none'><div id='info2' style='padding:10px; background:#ebf9c9;'>
<b>Ιδιότητες ανοίγματος</b><hr>
<table style="width:100%"><tr><td style="width:30%">
<table style="width:100%"><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Ονομα: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="an" size="10" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">X: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="ax_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Y: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="ay_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Μήκος: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="alx_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Ποδιά: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="aly_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Πρέκι: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="ah" size="5" value=""/></td></tr>
</table></td><td style="width:70%">
<table style="width:100%;"><tr>
<td style="text-align:center;" colspan="2">Είδος</td></tr><tr>
<td style="text-align:center;" colspan="2">
<select id="ae">
	<option></option>
	<option>Αδιαφανής πόρτα</option>
	<option>Συρόμενο παράθυρο</option>
	<option>Ανοιγόμενο παράθυρο</option>
	<option>Επάλληλο παράθυρο</option>
	<option>Συρόμενη πόρτα απλή</option>
	<option>Συρόμενη πόρτα διπλή</option>
	<option>Ανοιγόμενη πόρτα μονή</option>
	<option>Ανοιγόμενη πόρτα διπλή</option>
	<option>Επάλληλη πόρτα</option>
</select>
<br /><br /></td></tr><tr>
<td style="text-align:center;border-top:1px solid black;" colspan="2">Αερισμός<br /></td></tr><tr>
<td style="text-align:center;" colspan="2">
<select id="aa">
	<option value=""></option>
	<option value="15.1">Παράθυρο με ξύλινο πλαίσιο: 15.1</option>
	<option value="12.5">Παράθυρο με ξύλινο πλαίσιο: 12.5</option>
	<option value="10">Παράθυρο με ξύλινο πλαίσιο: 10.0</option>
	<option value="11.8">Πόρτα με ξύλινο πλαίσιο: 11.8</option>
	<option value="9.8">Πόρτα με ξύλινο πλαίσιο: 9.8</option>
	<option value="7.9">Πόρτα με ξύλινο πλαίσιο: 7.9</option>
	<option value="8.7">Παράθυρο με συνθ. πλαίσιο: 8.7</option>
	<option value="6.8">Παράθυρο με συνθ. πλαίσιο: 6.8</option>
	<option value="6.2">Παράθυρο με συνθ. πλαίσιο: 6.2</option>
	<option value="7.4">Πόρτα με συνθ. πλαίσιο: 7.4</option>
	<option value="5.3">Πόρτα με συνθ. πλαίσιο: 5.3</option>
	<option value="4.8">Πόρτα με συνθ. πλαίσιο: 4.8</option>
</select>
<br /><br /></td></tr><tr>
<td style="text-align:right;width:50%;height:25px;vertical-align:middle;border-top:1px solid black;">U:
</td><td style="text-align:left;width:50%;vertical-align:middle;border-top:1px solid black;">
<input type="text" id="au" size="5" value=""/></td></tr><tr>
<td style="text-align:right;width:60%;height:40px;vertical-align:middle;border-top:1px solid black;">Ψ λαμπά: 
</td><td style="text-align:left;width:40%;vertical-align:middle;border-top:1px solid black;">
<input type="text" id="th1" size="5" value=""/>
<a id="lamda1" href="kenak_help4.php?t=l&p=1" title="" onclick="get_thermo_lamda();"><img src="../images/style/help.png"/></a>
</td></tr><tr>
<td style="text-align:right;width:60%;height:40px;border-top:1px solid black;vertical-align:middle;">Ψ ποδιάς/πρεκιού: 
</td><td style="text-align:left;width:40%;border-top:1px solid black;vertical-align:middle;">
<input type="text" id="th2" size="5" value=""/>
<a id="lamda2" href="kenak_help5.php?t=a&p=1" title="" onclick="get_thermo_ak();"><img src="../images/style/help.png"/></a>
</td></tr></table>
</td></tr></table>
<hr><table style="width:100%"><tr><td style="text-align:right;"><button type="button" onclick="save_anoigma();">OK</button></td></tr></table>
<div style="display:none;">
<?php $thermo_l = dropdown1("SELECT name, y FROM thermo_l", "y", "name");	
echo "<select id=\"l_thermo\" >" . $thermo_l . "</select>"; 
$thermo_ak = dropdown1("SELECT name, y FROM thermo_ak", "y", "name");
echo "<select id=\"a_thermo\" >" . $thermo_ak . "</select>";
?> 
</div>
</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για επεξεργασία υποστυλωμάτων                                        -->
<div style='display:none'><div id='info3' style='padding:10px; background:#ebf9c9;'>
<b>Ιδιότητες υποστυλώματος</b><hr>
<table style="width:100%"><tr><td style="width:30%">
<table style="width:100%"><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">X: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="yx_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Y: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="yy_info" size="5" value=""/></td></tr><tr>
<td style="text-align:right;height:25px;vertical-align:middle;">Μήκος: </td>
<td style="text-align:center;vertical-align:middle;"><input type="text" id="ylx_info" size="5" value=""/></td></tr>
</table></td><td style="width:70%">
<table style="width:100%;"><tr>
<td style="text-align:right;width:50%;height:25px;vertical-align:middle;border-top:1px solid black;">U:
</td><td style="text-align:left;width:50%;vertical-align:middle;border-top:1px solid black;">
<input type="text" id="yu" size="5" value=""/></td></tr><tr>
<td style="text-align:right;width:50%;height:25px;vertical-align:middle;">Ψ:
</td><td style="text-align:left;width:50%;vertical-align:middle;">
<input type="text" id="th_yp" size="5" value=""/>
<a id="thermoypost" href="kenak_help3.php?p=1" title="" onclick="get_thermo_ypost();"><img src="../images/style/help.png"/></a>
</td></tr></table>
</td></tr></table>
<hr><table style="width:100%"><tr><td style="text-align:right;"><button type="button" onclick="save_stylos();">OK</button></td></tr></table>
<div style="display:none;">
<?php echo "<select id=\"yp_thermo\" >" . $thermo_pr . "</select>"; ?>
</div>
</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για οδηγίες                                                   -->
<div style='display:none'><div id='draw_help' style='padding:10px; background:#ebf9c9;'>
<b>Σχεδιάσεις</b><hr>
Στη σελίδα αυτή γίνεται εισαγωγή των δεδομένων των χώρων και των δομικών στοιχείων σε γραφικό περιβάλλον.<br /><br />
Το ζουμ ρυθμίζεται με τον τροχό του ποντικιού.<br /><br />
Οι διαθέσιμες επιλογές είναι:<br /><br /><table><tr style="border-top:1px solid black;"><td>
<img src="../images/domika/edit.png" width="32px" height="32px" style="vertical-align:middle;" /> </td><td>
Σχεδίαση χώρων, τοίχων κλπ. Επιλέγονται δύο αντιδιαμετρικές γωνίες και σχεδιάζεται μία ορθογώνια επιφάνεια.<br />
Τα ανοίγματα και τα υποστυλώματα μπορούν να σχεδιαστούν μόνο μέσα σε κάποιον τοίχο και τον ακολουθούν σε ενδεχόμενη μετακίνηση. 
Κατά τη σχεδίασή τους δεν απαιτείται ακρίβεια όσον αφορά το πάχος τους. Σχεδιάζονται αυτόματα με το πάχος του τοίχου.
</td></tr><tr style="border-top:1px solid black;"><td>
<img src="../images/domika/eraser.png" width="32px" height="32px" style="vertical-align:middle;" /></td><td> 
Διαγραφή στοιχείων. Επιλέγεται το στοιχείο που θέλουμε να διαγραφεί. Δεν ζητείται επιβεβαίωση.<br />
Αν διαγραφεί τοίχος διαγράφονται και όλα τα ανοίγματα και υποστυλώματα που ανήκουν σ' αυτόν.
</td></tr><tr style="border-top:1px solid black;"><td>
<img src="../images/domika/move.png" width="32px" height="32px" style="vertical-align:middle;" /> </td><td>
Μετακίνηση στοιχείων. Επιλέγουμε ότι θέλουμε να μετακινηθεί και με το πλήκτρο πατημένο σέρνουμε το στοιχείο στη νέα θέση.
Με τον ίδιο τρόπο μορεί να γίνει αυξομείωση των διαστάσεων του στοιχείου. Αυτό γίνεται με επιλογή ενός σημείου κοντά ή επάνω στο περίγραμμα.<br />
Με το αριστερό πλήκτρο πατημένο εκτός κάποιου στοιχείου μετακινείται όλο το σχέδιο.</td></tr><tr style="border-top:1px solid black;"><td>
<img src="../images/domika/properties.png" width="32px" height="32px" style="vertical-align:middle;" /> </td><td>
Ιδιότητες στοιχείου. Στο παράθυρο που ανοίγει συμπληρώνονται οι ιδιότητες του στοιχείου. 
Αν τροποποιηθούν οι διαστάσεις του ή οι συντεταγμένες της επάνω αριστερής γωνίας τότε ενημερώνεται αντίστοιχα το σχέδιο.</td></tr><tr style="border-top:1px solid black;"><td>
<img src="../images/domika/save2.png" width="32px" height="32px" style="vertical-align:middle;" /> </td><td>
Αποθήκευση των δεδομένων στο αρχείο.</td></tr><tr style="border-top:1px solid black;"><td>
<img src="../images/domika/png.png" width="32px" height="32px" style="vertical-align:middle;" /> </td><td>
Εισαγωγή κάτοψης. Εισάγεται ένα αρχείο εικόνας (jpg, png κλπ) με την κάτοψη του ορόφου. Εχοντας την κάτοψη ως υπόβαθρο είναι ευκολότερη η σχεδίαση των στοιχείων του ορόφου.</td></tr><tr style="border-top:1px solid black;"><td>
<img src="../images/domika/tape.png" width="32px" height="32px" style="vertical-align:middle;" /> </td><td>
Βαθμονόμηση κάτοψης. Για την εισαγωγή της κάτοψης με σωστές διαστάσεις θα πρέπει να γίνει πρώτα βαθμονόμηση. 
Επιλέγονται δύο σημεία με διαφορετικό Y και ορίζεται η απόστασή τους κατά Y.</td></tr><tr style="border-top:1px solid black;"><td>
&nbsp;</td><td>&nbsp;
</td></tr></table>
</div></div>
<!------------------------------------------------------------------------------------>

<script type="text/javascript">
	function rectangle(x,y,w,h,type){
		this.x=x;
		this.y=y;
		this.w=w;
		this.h=h;
		this.name="";
		this.zone=1;
		this.height=0;
		this.type=type;
		this.c=-1;
		this.or=0;
		this.ep=0;
		this.u=0;
		this.hd=0;
		this.th1=0;
		this.th2=0;
		this.ae=0;
		this.aa=0;
		this.ah=0;
		this.th_or=0;
		this.th_dap=0;
		this.u_dok=0;
		this.th_dok=0;
	}
	rect=[];
	document.getElementById("floor").selectedIndex=<?=$floor?>;
<?php	
/*
	$drop_set = mysql_query("SELECT * FROM kataskeyi_xwroi WHERE floor=$floor");
    $i=0;
	while ($result = mysql_fetch_array($drop_set)) {
		$x=$result['x']/10*600;
		$y=600-$result['y']/10*600;
		$w=$result['mikos']/10*600;
		$h=$result['platos']/10*600;
		echo "var r=new rectangle(".$x.",".$y.",".$w.",".$h.",1);";
		echo "rect[".$i."]=r;";
		echo "rect[".$i."].name='".$result['name']."';" ;
		echo "rect[".$i."].zone=".$result['id_zwnis'].";" ;
		echo "rect[".$i."].height=".$result['ypsos'].";" ;
		$i+=1;
	}
*/
?>
	function change_floor(){
		if (save==0){
			if(confirm('Οι αλλαγές δεν έχουν αποθηκευθεί. Επιθυμείτε αλλαγή στάθμης;')==false){document.getElementById("floor").value=floor;return;}
		}
		if (document.getElementById("floor").value>0){
			window.location=("drawing.php?floor="+document.getElementById("floor").value);
		}else{
			window.location=("drawing.php");
		}
	}
</script>

</body>
</html>
