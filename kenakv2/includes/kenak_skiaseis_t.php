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
		<?php	if ($sel_page["id"] == 7)	{ ?>
			<h2>ΚΕΝΑΚ - Σκιάσεις Τοίχων</h2>
	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/wall.png\"></img>";
	  </script>
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.delcheck"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.delcheck"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Επιθυμείτε σίγουρα διαγραφή;')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

function iframe_sk(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"90%"});
}
</script>

			
			<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#sk_toix_b">Σκιάσεις Βόρεια</a></li>
					<li><a href="#sk_toix_a">Σκιάσεις Ανατολικά</a></li>
					<li><a href="#sk_toix_n">Σκιάσεις Νότια</a></li>
					<li><a href="#sk_toix_d">Σκιάσεις Δυτικά</a></li>
					</ul> 
					
			<div id="sk_toix_b" class="tabdiv"> 
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_b";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id τοίχου</div></th>
					<th> <div align="center">F_hor_h</div></th>
					<th> <div align="center">F_hor_c</div></th>
					<th> <div align="center">F_ov_h</div></th>
					<th> <div align="center">F_ov_c</div></th>
					<th> <div align="center">F_fin_h</div></th>
					<th> <div align="center">F_fin_c</div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["id_toixoy"];?></td>
					<td><?=$objResult["f_hor_h"];?></td>
					<td><?=$objResult["f_hor_c"];?></td>
					<td><?=$objResult["f_ov_h"];?></td>
					<td><?=$objResult["f_ov_c"];?></td>
					<td><?=$objResult["f_fin_h"];?></td>
					<td><?=$objResult["f_fin_c"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_sk_t_b" value="Διαγραφή σκίασης τοίχου">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					<br/><br/>
					
					<?php
					//προσθήκη στη βάση δεδομένων των στοιχείων
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						?>
						<tr><th>Id</th>
						<th>Id Τοίχου</th>
						<th>F_hor_h<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_hor_c<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_h<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_c<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_h<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_c<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<?php
						echo "<tr><td></td>";
						$id_toixoy = dropdown1("SELECT id, name FROM kataskeyi_t_b", "id", "name");
						echo "<td><select name=\"" . $vasi . "_id_toixoy\"/>" . $id_toixoy . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "</tr></table>";

						echo "<input type=\"submit\" name=\"" . $vasi . "_sk_t_b\" value=\"Προσθήκη σκίασης τοίχου\" />";
					?>
					</div><!--/sk_toix_b-->
					
					
					
					
					<div id="sk_toix_a" class="tabdiv"> 
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_a";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id τοίχου</div></th>
					<th> <div align="center">F_hor_h</div></th>
					<th> <div align="center">F_hor_c</div></th>
					<th> <div align="center">F_ov_h</div></th>
					<th> <div align="center">F_ov_c</div></th>
					<th> <div align="center">F_fin_h</div></th>
					<th> <div align="center">F_fin_c</div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["id_toixoy"];?></td>
					<td><?=$objResult["f_hor_h"];?></td>
					<td><?=$objResult["f_hor_c"];?></td>
					<td><?=$objResult["f_ov_h"];?></td>
					<td><?=$objResult["f_ov_c"];?></td>
					<td><?=$objResult["f_fin_h"];?></td>
					<td><?=$objResult["f_fin_c"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_sk_t_a" value="Διαγραφή σκίασης τοίχου">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					<br/><br/>
					
					<?php
					//προσθήκη στη βάση δεδομένων των στοιχείων
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						?>
						<tr><th>Id</th>
						<th>Id Τοίχου</th>
						<th>F_hor_h<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_hor_c<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_h<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_c<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_h<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_c<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<?php
						echo "<tr><td></td>";
						$id_toixoy = dropdown1("SELECT id, name FROM kataskeyi_t_a", "id", "name");
						echo "<td><select name=\"" . $vasi . "_id_toixoy\"/>" . $id_toixoy . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "</tr></table>";

						echo "<input type=\"submit\" name=\"" . $vasi . "_sk_t_a\" value=\"Προσθήκη σκίασης τοίχου\" />";
					?>
					</div><!--/sk_toix_a-->
					
					
					
					
					
					
					<div id="sk_toix_n" class="tabdiv"> 
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_n";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id τοίχου</div></th>
					<th> <div align="center">F_hor_h</div></th>
					<th> <div align="center">F_hor_c</div></th>
					<th> <div align="center">F_ov_h</div></th>
					<th> <div align="center">F_ov_c</div></th>
					<th> <div align="center">F_fin_h</div></th>
					<th> <div align="center">F_fin_c</div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["id_toixoy"];?></td>
					<td><?=$objResult["f_hor_h"];?></td>
					<td><?=$objResult["f_hor_c"];?></td>
					<td><?=$objResult["f_ov_h"];?></td>
					<td><?=$objResult["f_ov_c"];?></td>
					<td><?=$objResult["f_fin_h"];?></td>
					<td><?=$objResult["f_fin_c"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_sk_t_n" value="Διαγραφή σκίασης τοίχου">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					<br/><br/>
					
					<?php
					//προσθήκη στη βάση δεδομένων των στοιχείων
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						?>
						<tr><th>Id</th>
						<th>Id Τοίχου</th>
						<th>F_hor_h<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_hor_c<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_h<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_c<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_h<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_c<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<?php
						echo "<tr><td></td>";
						$id_toixoy = dropdown1("SELECT id, name FROM kataskeyi_t_n", "id", "name");
						echo "<td><select name=\"" . $vasi . "_id_toixoy\"/>" . $id_toixoy . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "</tr></table>";

						echo "<input type=\"submit\" name=\"" . $vasi . "_sk_t_n\" value=\"Προσθήκη σκίασης τοίχου\" />";
					?>
					</div><!--/sk_toix_n-->
					
					
					
					
					<div id="sk_toix_d" class="tabdiv"> 
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_d";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id τοίχου</div></th>
					<th> <div align="center">F_hor_h</div></th>
					<th> <div align="center">F_hor_c</div></th>
					<th> <div align="center">F_ov_h</div></th>
					<th> <div align="center">F_ov_c</div></th>
					<th> <div align="center">F_fin_h</div></th>
					<th> <div align="center">F_fin_c</div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["id_toixoy"];?></td>
					<td><?=$objResult["f_hor_h"];?></td>
					<td><?=$objResult["f_hor_c"];?></td>
					<td><?=$objResult["f_ov_h"];?></td>
					<td><?=$objResult["f_ov_c"];?></td>
					<td><?=$objResult["f_fin_h"];?></td>
					<td><?=$objResult["f_fin_c"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_sk_t_d" value="Διαγραφή σκίασης τοίχου">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					<br/><br/>
					
					<?php
					//προσθήκη στη βάση δεδομένων των στοιχείων
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						?>
						<tr><th>Id</th>
						<th>Id Τοίχου</th>
						<th>F_hor_h<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_hor_c<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_h<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_c<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_h<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_c<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<?php
						echo "<tr><td></td>";
						$id_toixoy = dropdown1("SELECT id, name FROM kataskeyi_t_d", "id", "name");
						echo "<td><select name=\"" . $vasi . "_id_toixoy\"/>" . $id_toixoy . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_h_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_c_t\" maxlength=\"10\" size=\"5\" /></td>";
						echo "</tr></table>";

						echo "<input type=\"submit\" name=\"" . $vasi . "_sk_t_d\" value=\"Προσθήκη σκίασης τοίχου\" />";
					?>
					</div><!--/sk_toix_d-->
					</div>
		<?php } ?>