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

<?php	if ($sel_page["id"] == 11)	{ 
?>		
<table width=100% id="maintable"><tr><td style="width:50%;vertical-align:middle;"><h2>ΚΕΝΑΚ - Κτίριο</h2></td>
<td style="vertical-align:middle;">
<img src="./images/domika/help.png"  width="40px" height="40px"  title="οδηγίες" style="cursor:pointer;" onclick=help_t(); />
</td>
</td></tr></table>

<script type="text/javascript">
document.getElementById('imgs').innerHTML="<img src=\"images/style/wall.png\"></img>";
</script>

<script language="JavaScript">

var nt=new Array();

	function ClickCheckAll(vol)
	{
		var j=document.frmMain1.hdnCount.value;
		var i=1;
		for(i=1;i<=j;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain1.delcheck"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain1.delcheck"+i+".checked=false");
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

	

function get_inlinetext(v){
$.colorbox({inline:true,  href:"#inline_text"+v});
}

function help_t(){
$.colorbox({inline:true,  href:"#guide", width:"600px", height:"410px"});
}



</script>
		
			<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#zwnes">Θερμικές ζώνες</a></li>
					<li><a href="#tab-xwroi">Ε/V κτηρίου</a></li>
					<li><a href="#tab-katakoryfa">Οριζόντια στοιχεία</a></li>
					<li><a href="#tab-thermo">Θερμογέφυρες</a></li>
					</ul> 
					


<div id="zwnes" class="tabdiv">
<h3>Θερμικές ζώνες κτηρίου</h3>
					<form name="frmMain1" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_zwnes";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Όνομα<br/>ζώνης</div></th>
					<th> <div align="center">Χρήση στη ζώνη</div></th>
					<th> <div align="center">Έλεγχος<br/>θερμ. επαρκ. </div></th>
					<th> <div align="center">Ανηγμένη<br/>θερμοχωρητικότητα<br/>(KJ/m2.K)</div></th>
					<th> <div align="center">Αυτοματισμοί</div></th>
					<th> <div align="center">Καμινάδες</div></th>
					<th> <div align="center">Εξαερισμός</div></th>
					<th> <div align="center">Ανεμιστήρες<br/>οροφής</div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					$xrisi_array = get_times("gen_xrisi", "energy_conditions", $objResult["xrisi"]);
					$xrisi_array1 = get_times("xrisi", "energy_conditions", $objResult["xrisi"]);
					$xrisi = $xrisi_array[0]["gen_xrisi"] . ', ' . $xrisi_array1[0]["xrisi"];
					if ($objResult["thermoeparkeia"] == 1){$thermoeparkeia="ΝΑΙ";}else{$thermoeparkeia="ΟΧΙ";}
					
					if ($objResult["aytomatismoi"] == 0){$aytomatismoi="Τύπος Α";}
					if ($objResult["aytomatismoi"] == 1){$aytomatismoi="Τύπος Β";}
					if ($objResult["aytomatismoi"] == 2){$aytomatismoi="Τύπος Γ";}
					if ($objResult["aytomatismoi"] == 3){$aytomatismoi="Τύπος Δ";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["name"];?></td>
					<td><?=$xrisi;?></td>
					<td><div align="center"><?=$thermoeparkeia;?></div></td>
					<td><div align="center"><?=$objResult["anigmeni_thermo"];?></div></td>
					<td><div align="center"><?=$aytomatismoi;?></div></td>
					<td><div align="center"><?=$objResult["kaminades"];?></div></td>
					<td><div align="center"><?=$objResult["eksaerismos"];?></div></td>
					<td><div align="center"><?=$objResult["anem_orofis"];?></div></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_zwnis" value="Διαγραφή ζώνης">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<?php
					//προσθήκη στη βάση δεδομένων της ζώνης
					$vasi = "prosthiki_";
					$listxrisi = dropdown("SELECT xrisi, id FROM energy_conditions", "id", "xrisi", $vasi."xrisi");
					?>
					<table border="1"><br/>
					<form action="kenak.php" method="post">
					<tr><th>Id</th><td></td></tr>
					<tr>
					<th> <div align="center">Όνομα<br/>ζώνης</div></th>
					<td><input type="text" name="<?=$vasi."name"?>" maxlength="50" size="15" /></td>
					</tr><tr>
					<th>Χρήση στη ζώνη</th>
					<td><?=$listxrisi?></td>
					</tr><tr>
					<th> <div align="center">Έλεγχος<br/>θερμ. επαρκ. </div></th>
					<td><div align="center"><input type="checkbox" value="1" name="<?=$vasi."thermoeparkeia"?>" /></div></td>
					</tr><tr>
					<th> <div align="center">Ανηγμένη<br/>θερμοχωρητικότητα<br/>(KJ/m2.K)</div></th>
					<td>
					<select name="<?=$vasi."anigmeni_thermo"?>" id="<?=$vasi."anigmeni_thermo"?>">
					<option value="80">Πολύ ελαφριά κατασκευή (80 KJ/m2.K)</option>
					<option value="110">Ελαφριά κατασκευή (110 KJ/m2.K)</option>
					<option value="165">Μέτρια κατασκευή (165 KJ/m2.K)</option>
					<option value="260">Βαριά κατασκευή (260 KJ/m2.K)</option>
					<option value="370">Πολύ βαριά κατασκευή (370 KJ/m2.K)</option>
					</select>
					</td>
					</tr><tr>
					<th> <div align="center">Αυτοματισμοί</div></th>
					<td>
					<select name="<?=$vasi."aytomatismoi"?>" id="<?=$vasi."aytomatismoi"?>">
					<option value="0">Τύπος Α</option>
					<option value="1">Τύπος Β</option>
					<option value="2">Τύπος Γ</option>
					<option value="3">Τύπος Δ</option>
					</select>
					</td>
					</tr><tr>
					<th> <div align="center">Καμινάδες</div></th>
					<td><input type="text" name="<?=$vasi."kaminades"?>" maxlength="7" size="7" /></td>
					</tr><tr>
					<th> <div align="center">Εξαερισμός</div></th>
					<td><input type="text" name="<?=$vasi."eksaerismos"?>" maxlength="7" size="7" /></td>
					</tr><tr>
					<th> <div align="center">Ανεμιστήρες<br/>οροφής</div></th>
					<td><input type="text" name="<?=$vasi."anem_orofis"?>" maxlength="7" size="7" /></td>
					</tr>

					</table>
					<input type="submit" name="<?=$vasi."zwnis"?>" value="Προσθήκη ζώνης" />
					</form>


		</div><!--/zwnes-->

		<div id="tab-xwroi" class="tabdiv"> 
					<h3>Χώροι κτιρίου</h3>					
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xwroi";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id ζώνης</div></th>
					<th> <div align="center">Όνομα χώρου </div></th>
					<th> <div align="center">Μήκος </div></th>
					<th> <div align="center">Πλάτος </div></th>
					<th> <div align="center">Ύψος </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					$xwroi_zwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($xwroi_zwni_array[0]["name"])){$xwroi_zwni = $xwroi_zwni_array[0]["name"];}
					else {$xwroi_zwni="Η ζώνη έχει διαγραφεί!!!";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$xwroi_zwni;?></div></td>
					<td><?=$objResult["name"];?></td>
					<td><?=$objResult["mikos"];?></td>
					<td><div align="center"><?=$objResult["platos"];?></div></td>
					<td align="right"><?=$objResult["ypsos"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_xwrwn" value="Διαγραφή χώρου">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<?php
					//προσθήκη στη βάση δεδομένων των χώρων
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						echo "<tr><th>Id</th>";
						echo "<th>Id Ζώνης</th>";
						echo "<th>Όνομα χώρου</th>";
						echo "<th>Μήκος</th>";
						echo "<th>Πλάτος</th>";
						echo "<th>Ύψος</th></tr>";
						echo "<tr><td></td>";
						$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
						echo "<td>".$id_zwnis."</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_mikos\" required=\"required\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_platos\" required=\"required\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_ypsos\" required=\"required\" maxlength=\"10\" size=\"5\" /></td></tr></table>";
						echo "<input type=\"submit\" name=\"" . $vasi . "_xwrwn\" value=\"Προσθήκη χώρου\" />";
					?>
					</form>	
					
			</div><!--/xwroi-->
					
					
					
					
					
			<div id="tab-katakoryfa" class="tabdiv">
					<h3>Οριζόντια στοιχεία</h3>					
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_daporo";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id ζώνης</div></th>
					<th> <div align="center">Τύπος</div></th>
					<th> <div align="center">Όνομα </div></th>
					<th> <div align="center">Εμβαδόν </div></th>
					<th> <div align="center">U </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					if ( $objResult["type"] == "0"){$typos="Δάπεδο";}
					if ( $objResult["type"] == "1"){$typos="Οροφή";}
					
					$dapedo_zwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($dapedo_zwni_array[0]["name"])){$dapedo_zwni = $dapedo_zwni_array[0]["name"];}
					else {$dapedo_zwni="Η ζώνη έχει διαγραφεί!!!";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$dapedo_zwni;?></div></td>
					<td><div align="center"><?=$typos;?></div></td>
					<td><?=$objResult["name"];?></td>
					<td><div align="center"><?=$objResult["emvadon"];?></div></td>
					<td align="right"><?=$objResult["u"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_daporo" value="Διαγραφή δαπέδων/οροφών">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<?php
					//προσθήκη στη βάση δεδομένων των δαπέδων/οροφών
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
					
						<table border="1"><br/><form action="kenak.php" method="post">
						<tr>
						<th>Id</th>
						<th>Id ζώνης</th>
						<th>Τύπος</th>
						<th>Όνομα</th>
						<th>Εμβαδόν</th>
						<th>U<a class='iframe' href="./domika_kelyfos.php?page=1&min=1" onclick=iframe_oriz_u();><img src="./images/style/help.png" /></a></th></tr>
						<tr>
						<td></td>
						<td><?=$id_zwnis ?></td>
						<td>
						<select name="<?=$vasi."_type";?>"/>
						<option value="0">Δάπεδο</option> 
						<option value="0">Οροφή</option> 
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_name";?>" required="required" maxlength="10" size="30" /></td>
						<td><input type="text" name="<?=$vasi."_emvadon";?>" required="required" maxlength="10" size="7" /></td>
						<td><input type="text" name="<?=$vasi."_u";?>" required="required" maxlength="10" size="5" /></td>
						</tr></table>
						<input type="submit" name="<?=$vasi."_daporo";?>" value="Προσθήκη δαπέδων/οροφών" />
						</form>
			</div><!--/tab-katakoryfa-->
					
					
					
					
			<div id="tab-thermo" class="tabdiv"> 
					
					<h3>Θερμογέφυρες εξωτερικών γωνιών</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_therm_eks";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id ζώνης</div></th>
					<th> <div align="center">Θερμογέφυρα Εξωτερικής γωνίας </div></th>
					<th> <div align="center">Πλήθος </div></th>
					<th> <div align="center">Ύψος </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					$eks_zwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($eks_zwni_array[0]["name"])){$eks_zwni = $eks_zwni_array[0]["name"];}
					else {$eks_zwni="Η ζώνη έχει διαγραφεί!!!";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$eks_zwni;?></div></td>
					<td><?=$objResult["thermo_u"];?></td>
					<td><?=$objResult["plithos"];?></td>
					<td><?=$objResult["ypsos"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_therm_eks" value="Διαγραφή Θερμογέφυρας εξ. γωνίας">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<?php
					//προσθήκη στη βάση δεδομένων των εξ. γωνίας
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						echo "<tr><th>Ζώνη</th>";
						?>
						<th>Θερμογέφυρα εξωτερικής γωνίας <a class="eksg" href="./images/thermo/eksg/eksg1.jpg" title="" onclick=get_thermo_eksg();><img src="./images/style/help.png"/></a></th>
						<th>Πλήθος</th>
						<th>Ύψος</th>
						</tr>
						<?php
						echo "<tr>";
						$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
						echo "<td>".$id_zwnis."</td>";
						$thermo_eksw_drop = dropdown("SELECT name, y FROM thermo_eksg", "y", "name", $vasi."_thermo_drop");
						echo "<td>" . $thermo_eksw_drop . "</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_plithos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_ypsos\" maxlength=\"10\" size=\"5\" /></td></tr></table>";
						echo "<input type=\"submit\" name=\"" . $vasi . "_therm_eks\" value=\"Προσθήκη θερμογέφυρας εξ. γωνίας\" />";
					?>
					</form>
					
					
					<br/><br/>
					<h3>Θερμογέφυρες εσωτερικών γωνιών</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_therm_es";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id ζώνης</div></th>
					<th> <div align="center">Θερμογέφυρα Εσωτερικής γωνίας </div></th>
					<th> <div align="center">Πλήθος </div></th>
					<th> <div align="center">Ύψος </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					$es_zwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($es_zwni_array[0]["name"])){$es_zwni = $es_zwni_array[0]["name"];}
					else {$es_zwni="Η ζώνη έχει διαγραφεί!!!";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$es_zwni;?></div></td>
					<td><?=$objResult["thermo_u"];?></td>
					<td><?=$objResult["plithos"];?></td>
					<td><?=$objResult["ypsos"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_therm_es" value="Διαγραφή Θερμογέφυρας εσ. γωνίας">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<?php
					//προσθήκη στη βάση δεδομένων θερμογέφυρας εξ. γωνίας
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						echo "<tr><th>Id</th>";
						?>
						<th>Θερμογέφυρα εσωτερικής γωνίας <a class="esg" href="./images/thermo/esg/esg1.jpg" title="" onclick=get_thermo_esg();><img src="./images/style/help.png"/></a></th>
						<th>Πλήθος</th>
						<th>Ύψος</th>
						</tr>
						<?php
						echo "<tr>";
						$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
						echo "<td>".$id_zwnis."</td>";
						$thermo_esw_drop = dropdown("SELECT name, y FROM thermo_esg", "y", "name", $vasi."_thermo_drop");
						echo "<td>" . $thermo_esw_drop . "</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_plithos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_ypsos\" maxlength=\"10\" size=\"5\" /></td></tr></table>";
						echo "<input type=\"submit\" name=\"" . $vasi . "_therm_es\" value=\"Προσθήκη θερμογέφυρας εσ. γωνίας\" />";
					?>
					</form>
			</div><!--/tab-thermo-->

</div>




<!--        Κρυφό div για γενική βοήθεια                                            -->
		<div style='display:none'><div id='guide' style='padding:10px; background:#ebf9c9;'>
		<b>Θερμικές ζώνες κτηρίου</b><hr>
		Στη σελίδα αυτή γίνεται η εισαγωγή των θερμικών ζωνών του κτιρίου.
		Με κλικ στα εικονίδια <img src ="./images/style/help.png" style="vertical-align:middle;" /> δίνονται οδηγίες για τον τύπο του κάθε δεδομένου.<br /><br />
		Αφού χωρίστε το κτήριο σε θερμικές ζώνες στο σχέδιο που έχετε ανάλογα με διαφορετικούς χώρους θέρμανσης (θερμαινόμενους ή μη) ή χρήσεις και εισάγετε τις θερμικές ζώνες
		μπορείτε να αντιστοιχίσετε τα δομικά στοιχεία, τα συστήματα και τις θερμογέφυρες του κτηρίου σε αυτές τις ζώνες.<br /><br />
		<hr>
		Τα παραπάνω στοιχεία περνούν αυτόματα κατά την δημιουργία του xml στο λογισμικό του ΤΕΕ χωρισμένα ανά ζώνη.<br /><br />
		Ο έλεγχος της θερμομονωτικής επάρκειας πραγματοποιείται για κάθε ζώνη μόνο εφόσον στη συγκεκριμένη ζώνη έχει δηλωθεί με βάση τα δεδομένα από τη βιβλιοθήκη για τη χρήση αυτής.<br /><br />
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για επεξεργασία των τιμών του πίνακα                          -->
		<div style='display:none'><div id='editme' style='padding:10px; background:#ebf9c9;'>
		
		<table ><tr><td>
		<input type="text" id="editbox" style="width:50px;">&nbsp;
		<input type="button" value="Αποθήκευση" onclick=saveme(); >
		</td></tr></table>
		</div></div>
<!------------------------------------------------------------------------------------>





<?php } ?>
	
