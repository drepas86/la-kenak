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
		<!--/Δεύτερος τρόπος εισαγωγής δεδομένων στη βάση-->
		<?php	if ($sel_page["id"] == 10)	{ ?>
			<h2>ΚΕΝΑΚ - Συστήματα</h2>
	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/home.png\"></img>";
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
	

function get_thermo_dap(){
$(".dap").colorbox({rel:'dap'});
}
function get_thermo_esg(){
$(".esg").colorbox({rel:'esg'});
}
function get_thermo_eksg(){
$(".eksg").colorbox({rel:'eksg'});
}
function iframe_oriz_u(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"90%"});
}
function get_inlinetext(v){
$.colorbox({inline:true,  href:"#inline_text"+v});
}

function get_active(){
document.getElementById("tabvanilla").style.display="block";
}

</script>
			
			<div id="tabvanilla" class="widget" style="display:none;">
					<ul class="tabnav">  
					<!--<li><a href="#tab-meletes">Μελέτες Η/Μ</a></li>-->
					<li><a href="#tab-thermansi">Θέρμανση</a></li>
					<li><a href="#tab-psyksi">Ψύξη</a></li>
					<li><a href="#tab-znx">ΖΝΧ</a></li>
					<li><a href="#tab-iliakos">Ηλιακός</a></li>
					</ul>  
					
					
					
					
			<!--<div id="tab-meletes" class="tabdiv">
					
					<?php
					$kataskeyi_hm_array = get_times_all("*", "kataskeyi_hm");
					$kataskeyi_hm_thermansi = $kataskeyi_hm_array[0]["value"];
					$kataskeyi_hm_klimatismos = $kataskeyi_hm_array[1]["value"];
					$vasi = "prosthiki";
					?>
					<h3>Μελέτες Θέρμανσης/Κλιματισμού</h3>
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Θέρμανση (τιμή από μελέτη θέρμανσης Kcal) </div></th>
					<td><?=$kataskeyi_hm_thermansi;?></td>
					<td><input type="text" name="<?=$vasi."_thermansi"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Κλιματισμός (τιμή από μελέτη κλιματισμού Btu) </div></th>
					<td><?=$kataskeyi_hm_klimatismos;?></td>
					<td><input type="text" name="<?=$vasi."_klimatismos"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_hm"?>" value="Τροποποίηση στοιχείων μελέτης Η/Μ" />
					</form>
			</div> 
			meletes-->


	
			<div id="tab-thermansi" class="tabdiv"> 
					
					<img src="images/style/heat.png"></img>
					<h3>Παραγωγή - Θέρμανση</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_thermp";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Πηγή Ενέργειας </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">Β.Απ.</div></th>
					<th> <div align="center">COP</div></th>
					<th> <div align="center">Ιαν</div></th>
					<th> <div align="center">Φεβ</div></th>
					<th> <div align="center">Μαρ</div></th>
					<th> <div align="center">Απρ</div></th>
					<th> <div align="center">Μαι</div></th>
					<th> <div align="center">Ιουν</div></th>
					<th> <div align="center">Ιουλ</div></th>
					<th> <div align="center">Αυγ</div></th>
					<th> <div align="center">Σεπ</div></th>
					<th> <div align="center">Οκτ</div></th>
					<th> <div align="center">Νοε</div></th>
					<th> <div align="center">Δεκ</div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["type"] == 0){$thermp_type="Λέβητας";}
					if ($objResult["type"] == 1){$thermp_type="Κεντρική υδρόψυκτη Α.Θ.";}
					if ($objResult["type"] == 2){$thermp_type="Κεντρική αερόψυκτη Α.Θ.";}
					if ($objResult["type"] == 3){$thermp_type="Τοπική αερόψυκτη Α.Θ.";}
					if ($objResult["type"] == 4){$thermp_type="Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη";}
					if ($objResult["type"] == 5){$thermp_type="Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη";}
					if ($objResult["type"] == 6){$thermp_type="Κεντρική άλλου τύπου Α.Θ.";}
					if ($objResult["type"] == 7){$thermp_type="Τοπικές ηλεκτρικές μονάδες";}
					if ($objResult["type"] == 8){$thermp_type="Τοπικές μονάδες αερίου";}
					if ($objResult["type"] == 9){$thermp_type="Ανοικτές εστίες καύσης";}
					if ($objResult["type"] == 10){$thermp_type="Τηλεθέρμανση";}
					if ($objResult["type"] == 11){$thermp_type="ΣΗΘ";}
					if ($objResult["type"] == 12){$thermp_type="Μονάδα παραγωγής άλλου τύπου";}
					
					if ($objResult["pigienergy"] == 0){$thermp_pigi="Υγραέριο (LPG)";}
					if ($objResult["pigienergy"] == 1){$thermp_pigi="Φυσικό αέριο";}
					if ($objResult["pigienergy"] == 2){$thermp_pigi="Ηλεκτρισμός";}
					if ($objResult["pigienergy"] == 3){$thermp_pigi="Πετρέλαιο θέρμανσης";}
					if ($objResult["pigienergy"] == 4){$thermp_pigi="Πετρέλαιο κίνησης";}
					if ($objResult["pigienergy"] == 5){$thermp_pigi="Τηλεθέρμανση";}
					if ($objResult["pigienergy"] == 6){$thermp_pigi="Βιομάζα";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$thermp_type;?></td>
					<td><?=$thermp_pigi;?></td>
					<td><?=$objResult["isxys"];?></td>
					<td><?=$objResult["bathm"];?></td>
					<td><?=$objResult["cop"];?></td>
					<td><?=$objResult["jan"];?></td>
					<td><?=$objResult["feb"];?></td>
					<td><?=$objResult["mar"];?></td>
					<td><?=$objResult["apr"];?></td>
					<td><?=$objResult["may"];?></td>
					<td><?=$objResult["jun"];?></td>
					<td><?=$objResult["jul"];?></td>
					<td><?=$objResult["aug"];?></td>
					<td><?=$objResult["sep"];?></td>
					<td><?=$objResult["okt"];?></td>
					<td><?=$objResult["nov"];?></td>
					<td><?=$objResult["decem"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_thermp" value="Διαγραφή μονάδας παραγωγής (Θέρμανση)">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<a class="inline" href="#inline_content1" onclick=get_inlinetext(1);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text1' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση μονάδας παραγωγής θέρμανση
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
						<table border="1"><br/><form action="kenak.php" method="post">
						<tr>
						<th>Ζώνη</th>
						<th>Τύπος</th>
						<th>Πηγή Ενέργειας</th>
						<th>Ισχύς (KW)</th>
						<th>Β.Απ. (-)</th>
						<th>COP (-)</th>
						<th>Ιαν</th>
						<th>Φεβ</th>
						<th>Μαρ</th>
						<th>Απρ</th>
						<th>Μαι</th>
						<th>Ιουν</th>
						<th>Ιουλ</th>
						<th>Αυγ</th>
						<th>Σεπ</th>
						<th>Οκτ</th>
						<th>Νοε</th>
						<th>Δεκ</th>
						
						<tr>
						<td><?=$id_zwnis?></td>
						<td>
						<select name="<?=$vasi."_type";?>">
						<option value="0">Λέβητας</option>
						<option value="1">Κεντρική υδρόψυκτη Α.Θ.</option>
						<option value="2">Κεντρική αερόψυκτη Α.Θ.</option>
						<option value="3">Τοπική αερόψυκτη Α.Θ.</option>
						<option value="4">Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη</option>
						<option value="5">Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη</option>
						<option value="6">Κεντρική άλλου τύπου Α.Θ.</option>
						<option value="7">Τοπικές ηλεκτρικές μονάδες</option>
						<option value="8">Τοπικές μονάδες αερίου</option>
						<option value="9">Ανοικτές εστίες καύσης</option>
						<option value="10">Τηλεθέρμανση</option>
						<option value="10">ΣΗΘ</option>
						<option value="10">Μονάδα παραγωγής άλλου τύπου</option>
						</select>
						</td>
						<td>
						<select name="<?=$vasi."_pigienergy";?>">
						<option value="0">Υγραέριο (LPG)</option>
						<option value="1">Φυσικό αέριο</option>
						<option value="2">Ηλεκτρισμός</option>
						<option value="3">Πετρέλαιο θέρμανσης</option>
						<option value="4">Πετρέλαιο κίνησης</option>
						<option value="5">Τηλεθέρμανση</option>
						<option value="6">Βιομάζα</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_isxys";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_bathm";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_cop";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_jan";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_feb";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_mar";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_apr";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_may";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_jun";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_jul";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_aug";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_sep";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_okt";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_nov";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_dec";?>" maxlength="10" size="3" /></td></tr></table>
						<input type="submit" name="<?=$vasi."_thermp";?>" value="Προσθήκη μονάδας παραγωγής (Θέρμανση)" />
						</form>
					</div></div>
					
					
					
					
					<h3>Δίκτυο διανομής - Θέρμανση</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_thermd";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Ισχύς </div></th>
					<th> <div align="center">Χώρος </div></th>
					<th> <div align="center">Βαθμ. απ. </div></th>
					<th> <div align="center">Μόνωση </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["xwros"] == 0){$xwrostherm="Εσωτερικοί ή έως 20% σε εξωτερικούς";}
					if ($objResult["xwros"] == 1){$xwrostherm="Πάνω από 20% σε εξωτερικούς";}
					
					if ($objResult["type"] == 0){$typetherm="Δίκτυο διανομής θερμού μέσου";}
					if ($objResult["type"] == 1){$typetherm="Αεραγωγοί";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$typetherm;?></td>
					<td><?=$objResult["isxys"];?></td>
					<td><?=$xwrostherm?></td>
					<td><?=$objResult["bathm"];?></td>
					<td><?=$objResult["monwsi"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_thermd" value="Διαγραφή δικτύου διανομής θέρμανσης">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<a class="inline" href="#inline_content2" onclick=get_inlinetext(2);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text2' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δεδομένων των βοηθητικών μονάδων θέρμανσης
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
					<table border="1"><br/><form action="kenak.php" method="post">
						<tr>
						<th>Ζώνη</th>
						<th> <div align="center">Τύπος </div></th>
						<th> <div align="center">Ισχύς </div></th>
						<th> <div align="center">Χώρος </div></th>
						<th> <div align="center">Βαθμ. Απ. </div></th>
						<th> <div align="center">Μόνωση </div></th>						
						
						<tr>
						<td><?=$id_zwnis?></td>
						<td>
						<select name="<?=$vasi."_thermd_type";?>">
						<option value="0">Δίκτυο διανομής θερμού μέσου</option>
						<option value="1">Αεραγωγοί</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_thermd_isxys"?>" maxlength="200" size="10" /></td>
						<td>
						<select name="<?=$vasi."_thermd_xwros";?>">
						<option value="0">Εσωτερικοί ή έως 20% σε εξωτερικούς</option>
						<option value="1">Πάνω από 20% σε εξωτερικούς</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_thermd_bathm"?>" maxlength="200" size="10" /></td>
						<td><input type="checkbox" value="1" name="<?=$vasi."_thermd_monwsi"?>" maxlength="200" size="10" /></td>
						</tr></table>
						<input type="submit" name="<?=$vasi."_thermd";?>" value="Προσθήκη δικτύου διανομής (Θέρμανση)" />
					</form>
					</div></div>
					
					
					
					
					<h3>Τερματικές μονάδες - Θέρμανση</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_thermt";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$objResult["type"];?></td>
					<td><?=$objResult["bathm"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_thermt" value="Διαγραφή τερματικής μονάδας θέρμανσης">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<a class="inline" href="#inline_content3" onclick=get_inlinetext(3);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text3' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δεδομένων των τερματικών μονάδων θέρμανσης
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
					<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>Id ζώνης</th>
					
						<th>Τύπος</th>
						<th>Ισχύς (KW)</th>						
						
						<tr>
						<td><?=$id_zwnis?></td>
						<td><input type="text" name="<?=$vasi."_thermt_type"?>" maxlength="200" size="10" /></td>
						<td><input type="text" name="<?=$vasi."_thermt_bathm"?>" maxlength="200" size="10" /></td>
						</tr></table>
						<input type="submit" name="<?=$vasi."_thermt";?>" value="Προσθήκη τερματικής μονάδας (Θέρμανση)" />
					</form>
					</div></div>
					

					
					
					
					
					<h3>Βοηθητικές μονάδες - Θέρμανση</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_thermb";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Αριθμός </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["type"] == 0){$thermb_type="Αντλίες";}
					if ($objResult["type"] == 1){$thermb_type="Κυκλοφορητές";}
					if ($objResult["type"] == 2){$thermb_type="Ηλεκτροβάνες";}
					if ($objResult["type"] == 3){$thermb_type="Ανεμιστήρες";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$thermb_type;?></td>
					<td><?=$objResult["number"];?></td>
					<td><?=$objResult["isxys"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_thermb" value="Διαγραφή βοηθητικής μονάδας θέρμανσης">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<a class="inline" href="#inline_content4" onclick=get_inlinetext(4);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text4' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δεδομένων των βοηθητικών μονάδων θέρμανσης
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
					<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>Id ζώνης</th>
					
						<th>Τύπος</th>
						<th>Αριθμός</th>
						<th>Ισχύς (KW)</th>						
						
						<tr>
						<td><?=$id_zwnis?></td>
						<td>
						<select name="<?=$vasi."_type";?>">
						<option value="0">Αντλίες</option>
						<option value="1">Κυκλοφορητές</option>
						<option value="2">Ηλεκτροβάνες</option>
						<option value="3">Ανεμιστήρες</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_number";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_isxys";?>" maxlength="10" size="10" /></td></tr></table>
						<input type="submit" name="<?=$vasi."_thermb";?>" value="Προσθήκη βοηθητικής μονάδας (Θέρμανση)" />
						</form>
					</div></div>
					
					
			</div><!--/thermansi-->

					
					
					
					
					
			<div id="tab-psyksi" class="tabdiv"> 
					<img src="images/style/cold.png"></img>
					<h3>Παραγωγή - Ψύξη</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_coldp";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Πηγή Ενέργειας </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">Β.Απ.</div></th>
					<th> <div align="center">EER</div></th>
					<th> <div align="center">Ιαν</div></th>
					<th> <div align="center">Φεβ</div></th>
					<th> <div align="center">Μαρ</div></th>
					<th> <div align="center">Απρ</div></th>
					<th> <div align="center">Μαι</div></th>
					<th> <div align="center">Ιουν</div></th>
					<th> <div align="center">Ιουλ</div></th>
					<th> <div align="center">Αυγ</div></th>
					<th> <div align="center">Σεπ</div></th>
					<th> <div align="center">Οκτ</div></th>
					<th> <div align="center">Νοε</div></th>
					<th> <div align="center">Δεκ</div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["type"] == 0){$coldp_type="Αερόψυκτος ψύκτης";}
					if ($objResult["type"] == 1){$coldp_type="Υδρόψυκτος ψύκτης";}
					if ($objResult["type"] == 2){$coldp_type="Υδρόψυκτη Α.Θ.";}
					if ($objResult["type"] == 3){$coldp_type="Αερόψυκτη Α.Θ.";}
					if ($objResult["type"] == 4){$coldp_type="Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη";}
					if ($objResult["type"] == 5){$coldp_type="Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη";}
					if ($objResult["type"] == 6){$coldp_type="Προσρόφησης απορρόφησης Α.Θ.";}
					if ($objResult["type"] == 7){$coldp_type="Κεντρική άλλου τύπου Α.Θ.";}
					if ($objResult["type"] == 8){$coldp_type="Μονάδα παραγωγής άλλου τύπου";}
					
					if ($objResult["pigienergy"] == 0){$coldp_pigi="Υγραέριο (LPG)";}
					if ($objResult["pigienergy"] == 1){$coldp_pigi="Φυσικό αέριο";}
					if ($objResult["pigienergy"] == 2){$coldp_pigi="Ηλεκτρισμός";}
					if ($objResult["pigienergy"] == 3){$coldp_pigi="Πετρέλαιο θέρμανσης";}
					if ($objResult["pigienergy"] == 4){$coldp_pigi="Πετρέλαιο κίνησης";}
					if ($objResult["pigienergy"] == 5){$coldp_pigi="Τηλεθέρμανση";}
					if ($objResult["pigienergy"] == 6){$coldp_pigi="Βιομάζα";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$coldp_type;?></td>
					<td><?=$coldp_pigi;?></td>
					<td><?=$objResult["isxys"];?></td>
					<td><?=$objResult["bathm"];?></td>
					<td><?=$objResult["eer"];?></td>
					<td><?=$objResult["jan"];?></td>
					<td><?=$objResult["feb"];?></td>
					<td><?=$objResult["mar"];?></td>
					<td><?=$objResult["apr"];?></td>
					<td><?=$objResult["may"];?></td>
					<td><?=$objResult["jun"];?></td>
					<td><?=$objResult["jul"];?></td>
					<td><?=$objResult["aug"];?></td>
					<td><?=$objResult["sep"];?></td>
					<td><?=$objResult["okt"];?></td>
					<td><?=$objResult["nov"];?></td>
					<td><?=$objResult["decem"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_coldp" value="Διαγραφή μονάδας παραγωγής (ψύξη)">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<a class="inline" href="#inline_content5" onclick=get_inlinetext(5);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text5' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση μονάδας παραγωγής ψύξη
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
						<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>Id ζώνης</th>
					
						<th>Τύπος</th>
						<th>Πηγή Ενέργειας</th>
						<th>Ισχύς (KW)</th>
						<th>Β.Απ. (-)</th>
						<th>EER (-)</th>
						<th>Ιαν</th>
						<th>Φεβ</th>
						<th>Μαρ</th>
						<th>Απρ</th>
						<th>Μαι</th>
						<th>Ιουν</th>
						<th>Ιουλ</th>
						<th>Αυγ</th>
						<th>Σεπ</th>
						<th>Οκτ</th>
						<th>Νοε</th>
						<th>Δεκ</th>
						
						<tr>
						<td><?=$id_zwnis?></td>
						<td>
						<select name="<?=$vasi."_type";?>">
						<option value="0">Αερόψυκτος ψύκτης</option>
						<option value="1">Υδρόψυκτος ψύκτης</option>
						<option value="2">Υδρόψυκτη Α.Θ.</option>
						<option value="3">Αερόψυκτη Α.Θ.</option>
						<option value="4">Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη</option>
						<option value="5">Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη</option>
						<option value="6">Προσρόφησης απορρόφησης Α.Θ.</option>
						<option value="7">Κεντρική άλλου τύπου Α.Θ.</option>
						<option value="8">Μονάδα παραγωγής άλλου τύπου</option>
						</select>
						</td>
						<td>
						<select name="<?=$vasi."_pigienergy";?>">
						<option value="0">Υγραέριο (LPG)</option>
						<option value="1">Φυσικό αέριο</option>
						<option value="2">Ηλεκτρισμός</option>
						<option value="3">Πετρέλαιο θέρμανσης</option>
						<option value="4">Πετρέλαιο κίνησης</option>
						<option value="5">Τηλεθέρμανση</option>
						<option value="6">Βιομάζα</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_isxys";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_bathm";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_eer";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_jan";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_feb";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_mar";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_apr";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_may";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_jun";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_jul";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_aug";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_sep";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_okt";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_nov";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td>
						<td><input type="text" name="<?=$vasi."_dec";?>" maxlength="10" size="3" value="0" disabled="disabled" /></td></tr></table>
						<input type="submit" name="<?=$vasi."_coldp";?>" value="Προσθήκη μονάδας παραγωγής (ψύξη)" />
						</form>
					</div></div>
					
					
					
					
					<h3>Δίκτυο διανομής - Ψύξη</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_coldd";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Ισχύς </div></th>
					<th> <div align="center">Χώρος </div></th>
					<th> <div align="center">Βαθμ. απ. </div></th>
					<th> <div align="center">Μόνωση </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["xwros"] == 0){$xwroscoldd="Εσωτερικοί ή έως 20% σε εξωτερικούς";}
					if ($objResult["xwros"] == 1){$xwroscoldd="Πάνω από 20% σε εξωτερικούς";}
					
					if ($objResult["type"] == 0){$typecold="Δίκτυο διανομής ψυχρού μέσου";}
					if ($objResult["type"] == 1){$typecold="Αεραγωγοί";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$typecold;?></td>
					<td><?=$objResult["isxys"];?></td>
					<td><?=$xwroscoldd;?></td>
					<td><?=$objResult["bathm"];?></td>
					<td><?=$objResult["monwsi"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_coldd" value="Διαγραφή δικτύου διανομής ψύξης">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<a class="inline" href="#inline_content6" onclick=get_inlinetext(6);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text6' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δεδομένων του δικτύου διανομής ψύξης
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
					<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>id ζώνης</th>
						<th>Τύπος</th>
						<th>Ισχύς (KW)</th>	
						<th> <div align="center">Χώρος </div></th>
						<th> <div align="center">Βαθμ. απ. </div></th>
						<th> <div align="center">Μόνωση </div></th>						
						<tr><td><?=$id_zwnis?></td>
						<td>
						<select name="<?=$vasi."_coldd_type";?>">
						<option value="0">Δίκτυο διανομής ψυχρού μέσου</option>
						<option value="1">Αεραγωγοί</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_coldd_isxys"?>" maxlength="200" size="10" /></td>
						<td>
						<select name="<?=$vasi."_coldd_xwros";?>">
						<option value="0">Εσωτερικοί ή έως 20% σε εξωτερικούς</option>
						<option value="1">Πάνω από 20% σε εξωτερικούς</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_coldd_bathm"?>" maxlength="200" size="10" /></td>
						<td><input type="checkbox" value="1" name="<?=$vasi."_coldd_monwsi"?>" maxlength="200" size="10" /></td>
						</tr></table>
						<input type="submit" name="<?=$vasi."_coldd";?>" value="Προσθήκη δικτύου διανομής (ψύξη)" />
					</form>
					</div></div>
					
					
					
					
					
					
					<h3>Τερματικές μονάδες - Ψύξη</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_coldt";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Ισχύς </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$objResult["type"];?></td>
					<td><?=$objResult["bathm"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_coldt" value="Διαγραφή τερματικής μονάδας ψύξης">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<a class="inline" href="#inline_content7" onclick=get_inlinetext(7);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text7' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δεδομένων των τερματικών μονάδων ψύξης
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
					<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>id ζώνης</th>
						<th>Τύπος</th>
						<th>Ισχύς (KW)</th>						
						<tr><td><?=$id_zwnis?></td>
						<td><input type="text" name="<?=$vasi."_coldt_type"?>" maxlength="200" size="10" /></td>
						<td><input type="text" name="<?=$vasi."_coldt_bathm";?>" maxlength="10" size="10" /></td></tr></table>
						<input type="submit" name="<?=$vasi."_coldt";?>" value="Προσθήκη τερματικής μονάδας (ψύξη)" />
					</form>
					</div></div>
					
					
					
					<h3>Βοηθητικές μονάδες - Ψύξη</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_coldb";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Αριθμός </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["type"] == 0){$coldb_type="Αντλίες";}
					if ($objResult["type"] == 1){$coldb_type="Κυκλοφορητές";}
					if ($objResult["type"] == 2){$coldb_type="Ηλεκτροβάνες";}
					if ($objResult["type"] == 3){$coldb_type="Ανεμιστήρες";}
					if ($objResult["type"] == 4){$coldb_type="Πύργος ψύξης";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$coldb_type;?></td>
					<td><?=$objResult["number"];?></td>
					<td><?=$objResult["isxys"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_coldb" value="Διαγραφή βοηθητικής μονάδας ψύξης">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<a class="inline" href="#inline_content8" onclick=get_inlinetext(8);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text8' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δεδομένων των βοηθητικών μονάδων ψύξης
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
					<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>id ζώνης</th>
					
						<th>Τύπος</th>
						<th>Αριθμός</th>
						<th>Ισχύς (KW)</th>						
						
						<tr><td><?=$id_zwnis?></td>
						<td>
						<select name="<?=$vasi."_type";?>">
						<option value="0">Αντλίες</option>
						<option value="1">Κυκλοφορητές</option>
						<option value="2">Ηλεκτροβάνες</option>
						<option value="3">Ανεμιστήρες</option>
						<option value="4">Πύργος ψύξης</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_number";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_isxys";?>" maxlength="10" size="10" /></td></tr></table>
						<input type="submit" name="<?=$vasi."_coldb";?>" value="Προσθήκη βοηθητικής μονάδας (ψύξη)" />
						</form>
					</div></div>
					
			</div><!--/psyksi-->
					
					
					
					
					
					
			<div id="tab-znx" class="tabdiv"> 
					
					<h3>Παραγωγή - ZNX</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_znxp";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Ζώνη</div></th>
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Πηγή Ενέργειας </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">Β.Απ.</div></th>
					<th> <div align="center">Ιαν</div></th>
					<th> <div align="center">Φεβ</div></th>
					<th> <div align="center">Μαρ</div></th>
					<th> <div align="center">Απρ</div></th>
					<th> <div align="center">Μαι</div></th>
					<th> <div align="center">Ιουν</div></th>
					<th> <div align="center">Ιουλ</div></th>
					<th> <div align="center">Αυγ</div></th>
					<th> <div align="center">Σεπ</div></th>
					<th> <div align="center">Οκτ</div></th>
					<th> <div align="center">Νοε</div></th>
					<th> <div align="center">Δεκ</div></th>
					<th> <div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["type"] == 0){$znxp_type="Λέβητας";}
					if ($objResult["type"] == 1){$znxp_type="Τηλεθέρμανση";}
					if ($objResult["type"] == 2){$znxp_type="ΣΗΘ";}
					if ($objResult["type"] == 3){$znxp_type="Αντλία θερμότητας (Α.Θ.)";}
					if ($objResult["type"] == 4){$znxp_type="Τοπικός ηλεκτρικός θερμαντήρας";}
					if ($objResult["type"] == 5){$znxp_type="Τοπική μονάδα φυσικού αερίου";}
					if ($objResult["type"] == 6){$znxp_type="Μονάδα παραγωγής (κεντρική) άλλου τύπου";}
					
					if ($objResult["pigienergy"] == 0){$znxp_pigi="Υγραέριο (LPG)";}
					if ($objResult["pigienergy"] == 1){$znxp_pigi="Φυσικό αέριο";}
					if ($objResult["pigienergy"] == 2){$znxp_pigi="Ηλεκτρισμός";}
					if ($objResult["pigienergy"] == 3){$znxp_pigi="Πετρέλαιο θέρμανσης";}
					if ($objResult["pigienergy"] == 4){$znxp_pigi="Πετρέλαιο κίνησης";}
					if ($objResult["pigienergy"] == 5){$znxp_pigi="Τηλεθέρμανση";}
					if ($objResult["pigienergy"] == 6){$znxp_pigi="Βιομάζα";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><?=$znxp_type;?></td>
					<td><?=$znxp_pigi;?></td>
					<td><?=$objResult["isxys"];?></td>
					<td><?=$objResult["bathm"];?></td>
					<td><?=$objResult["jan"];?></td>
					<td><?=$objResult["feb"];?></td>
					<td><?=$objResult["mar"];?></td>
					<td><?=$objResult["apr"];?></td>
					<td><?=$objResult["may"];?></td>
					<td><?=$objResult["jun"];?></td>
					<td><?=$objResult["jul"];?></td>
					<td><?=$objResult["aug"];?></td>
					<td><?=$objResult["sep"];?></td>
					<td><?=$objResult["okt"];?></td>
					<td><?=$objResult["nov"];?></td>
					<td><?=$objResult["decem"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_znxp" value="Διαγραφή μονάδας παραγωγής (ZNX)">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<a class="inline" href="#inline_content9" onclick=get_inlinetext(9);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text9' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση μονάδας παραγωγής ZNX
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
						<table border="1"><br/>
						<form action="kenak.php" method="post">
						<tr><th>Id ζώνης</th>
						<th>Τύπος</th>
						<th>Πηγή Ενέργειας</th>
						<th>Ισχύς (KW)</th>
						<th>Β.Απ. (-)</th>
						<th>Ιαν</th>
						<th>Φεβ</th>
						<th>Μαρ</th>
						<th>Απρ</th>
						<th>Μαι</th>
						<th>Ιουν</th>
						<th>Ιουλ</th>
						<th>Αυγ</th>
						<th>Σεπ</th>
						<th>Οκτ</th>
						<th>Νοε</th>
						<th>Δεκ</th>
						
						<tr><td><?=$id_zwnis?></td>
						<td>
						<select name="<?=$vasi."_type";?>">
						<option value="0">Λέβητας</option>
						<option value="1">Τηλεθέρμανση</option>
						<option value="2">ΣΗΘ</option>
						<option value="3">Αντλία θερμότητας (Α.Θ.)</option>
						<option value="4">Τοπικός ηλεκτρικός θερμαντήρας</option>
						<option value="5">Τοπική μονάδα φυσικού αερίου</option>
						<option value="6">Μονάδα παραγωγής (κεντρική) άλλου τύπου</option>
						</select>
						</td>
						<td>
						<select name="<?=$vasi."_pigienergy";?>">
						<option value="0">Υγραέριο (LPG)</option>
						<option value="1">Φυσικό αέριο</option>
						<option value="2">Ηλεκτρισμός</option>
						<option value="3">Πετρέλαιο θέρμανσης</option>
						<option value="4">Πετρέλαιο κίνησης</option>
						<option value="5">Τηλεθέρμανση</option>
						<option value="5">Βιομάζα</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_isxys";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_bathm";?>" maxlength="10" size="5" /></td>
						<td><input type="text" name="<?=$vasi."_jan";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_feb";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_mar";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_apr";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_may";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_jun";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_jul";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_aug";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_sep";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_okt";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_nov";?>" maxlength="10" size="3" /></td>
						<td><input type="text" name="<?=$vasi."_dec";?>" maxlength="10" size="3" /></td></tr></table>
						<input type="submit" name="<?=$vasi."_znxp";?>" value="Προσθήκη μονάδας παραγωγής (ZNX)" />
						</form>
					</div></div>
					
				
					
					<h3>Δίκτυο διανομής - ΖΝΧ</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_znxd";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th><div align="center">Id</div></th>
					<th><div align="center">Ιd ζώνης </div></th>
					<th><div align="center">Τύπος </div></th>
					<th><div align="center">Ανακυκλοφορία </div></th>
					<th><div align="center">Χώρος </div></th>
					<th><div align="center">Βαθμός απόδ. </div></th>
					<th><div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["anakykloforia"] == 0){$znxd_anakykloforia="OXI";}
					if ($objResult["anakykloforia"] == 1){$znxd_anakykloforia="ΝΑΙ";}
					
					if ($objResult["xwros"] == 0){$znxd_xwros="Εσωτερικοί ή έως 20% σε εξωτερικούς";}
					if ($objResult["xwros"] == 0){$znxd_xwros="Πάνω από 20% σε εξωτερικούς";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><div align="center"><?=$objResult["type"];?></div></td>
					<td><div align="center"><?=$znxd_anakykloforia;?></div></td>
					<td><div align="center"><?=$znxd_xwros;?></div></td>
					<td><div align="center"><?=$objResult["bathm"];?></div></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_znxd" value="Διαγραφή δικτύου διανομής ΖΝΧ">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<a class="inline" href="#inline_content10" onclick=get_inlinetext(10);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text10' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δικτύου διανομής ZNX
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
						<table border="1"><br/>
						<form action="kenak.php" method="post">
						<tr>
						<th> <div align="center">Id</div></th>
						<th> <div align="center">id Ζώνης</div></th>
						<th> <div align="center">Τύπος </div></th>
						<th><div align="center">Ανακυκλοφορία </div></th>
						<th><div align="center">Χώρος </div></th>
						<th><div align="center">Βαθμός απόδ. </div></th>
						<tr>
						<td></td>
						<td><div align="center"><?=$id_zwnis?></div></td>
						<td><input type="text" name="<?=$vasi."_znxd_type"?>" maxlength="200" size="10" /></td>
						<td><input type="checkbox" value="1" name="<?=$vasi."_znxd_anakykloforia"?>" /></td>
						<td>
						<select name="<?=$vasi."_znxd_xwros";?>">
						<option value="0">Εσωτερικοί ή έως 20% σε εξωτερικούς</option>
						<option value="1">Πάνω από 20% σε εξωτερικούς</option>
						</select>
						</td>
						<td><input type="text" name="<?=$vasi."_znxd_bathm"?>" maxlength="200" size="10" /></td>
						</tr></table>
						<input type="submit" name="<?=$vasi."_znxd";?>" value="Προσθήκη δικτύου διανομής ΖΝΧ" />
						</form>
						</div></div>					
					
					
				
					<h3>Αποθηκευτικές μονάδες - ΖΝΧ</h3>
					
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_znxa";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th><div align="center">Id</div></th>
					<th><div align="center">Ιd ζώνης </div></th>
					<th><div align="center">Τύπος </div></th>
					<th><div align="center">Βαθμός απόδ. </div></th>
					<th><div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><div align="center"><?=$objResult["type"];?></div></td>
					<td><div align="center"><?=$objResult["bathm"];?></div></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_znxa" value="Διαγραφή μονάδων αποθήκευσης ΖΝΧ">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<a class="inline" href="#inline_content11" onclick=get_inlinetext(11);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text11' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση μονάδας παραγωγής ZNX
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
						<table border="1"><br/>
						<form action="kenak.php" method="post">
						<tr>
						<th> <div align="center">Id</div></th>
						<th> <div align="center">id Ζώνης</div></th>
						<th> <div align="center">Τύπος </div></th>
						<th> <div align="center">Βαθμ. Απ. </div></th>
						<tr>
						<td></td>
						<td><div align="center"><?=$id_zwnis?></div></td>
						<td><input type="text" name="<?=$vasi."_znxa_type"?>" maxlength="200" size="10" /></td>
						<td><div align="center"><input type="text" name="<?=$vasi."_znxa_bathm"?>" maxlength="200" size="10" /></div></td>
						</tr></table>
						<input type="submit" name="<?=$vasi."_znxa";?>" value="Προσθήκη μονάδων αποθήκευσης ΖΝΧ" />
						</form>
						</div></div>
					
			</div><!--/znx-->
				
				
			<div id="tab-iliakos" class="tabdiv">
			<h3>Ηλιακός</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_znxiliakos";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th><div align="center">Id</div></th>
					<th><div align="center">Id ζώνης </div></th>
					<th><div align="center">Τύπος</div></th>
					<th><div align="center">Θέρμανση</div></th>
					<th><div align="center">ΖΝΧ</div></th>
					<th><div align="center">Συν. α</div></th>
					<th><div align="center">Συν. β</div></th>
					<th><div align="center">Επιφάνεια</div></th>
					<th><div align="center">γ deg</div></th>
					<th><div align="center">β deg</div></th>
					<th><div align="center">F_s</div></th>
					<th><div align="center">
					<input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
					</div></th>
					</tr>
					<?
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					
					$thermzwni_array = get_times("name", "kataskeyi_zwnes", $objResult["id_zwnis"]);
					if (isset($thermzwni_array[0]["name"])){$thermzwni = $thermzwni_array[0]["name"];}
					else {$thermzwni="Η ζώνη έχει διαγραφεί!!!";}
					
					if ($objResult["type"] == 0){$iliakosp_type="Χωρίς κάλυμα";}
					if ($objResult["type"] == 1){$iliakosp_type="Απλός επίπεδος";}
					if ($objResult["type"] == 2){$iliakosp_type="Επιλεκτικός επίπεδος";}
					if ($objResult["type"] == 3){$iliakosp_type="Κενού";}
					if ($objResult["type"] == 4){$iliakosp_type="Συγκεντρωτικός";}
					
					if ($objResult["thermansi"] == 1){$iliakosp_thermansi="NAI";}
					if ($objResult["thermansi"] == 0){$iliakosp_thermansi="OXI";}
					
					if ($objResult["znx"] == 1){$iliakosp_znx="NAI";}
					if ($objResult["znx"] == 0){$iliakosp_znx="OXI";}
					
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><div align="center"><?=$thermzwni;?></div></td>
					<td><div align="center"><?=$iliakosp_type;?></div></td>
					<td><div align="center"><?=$iliakosp_thermansi;?></div></td>
					<td><div align="center"><?=$iliakosp_znx;?></div></td>
					<td><div align="center"><?=$objResult["syna"];?></div></td>
					<td><div align="center"><?=$objResult["synb"];?></div></td>
					<td><div align="center"><?=$objResult["epifaneia"];?></div></td>
					<td><div align="center"><?=$objResult["gdeg"];?></div></td>
					<td><div align="center"><?=$objResult["bdeg"];?></div></td>
					<td><div align="center"><?=$objResult["fs"];?></div></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="submit" name="delete_systemiliakos" value="Διαγραφή ηλιακού">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					<?php
					//προσθήκη στη βάση ηλιακού
					$vasi = "prosthiki";
					$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_zwni");
					?>
						<table border="1"><br/>
						<form action="kenak.php" method="post">
						<tr>
						<th><div align="center">Id ζώνης </div></th>
						<th><div align="center">Τύπος</div></th>
						<th><div align="center">Θέρμανση</div></th>
						<th><div align="center">ΖΝΧ</div></th>
						<th><div align="center">Συν. α</div></th>
						<th><div align="center">Συν. β</div></th>
						<th><div align="center">Επιφάνεια</div></th>
						<th><div align="center">γ deg</div></th>
						<th><div align="center">β deg</div></th>
						<th><div align="center">F_s</div></th>
						<tr>
						<td><div align="center"><?=$id_zwnis?></div></td>
						<td>
						<select name="<?=$vasi."_type";?>">
						<option value="0">Χωρίς κάλυμα</option>
						<option value="1">Απλός επίπεδος</option>
						<option value="2">Επιλεκτικός επίπεδος</option>
						<option value="3">Κενού</option>
						<option value="4">Συγκεντρωτικός</option>
						</select>
						</td>
						<td><div align="center"><input type="checkbox" value="1" name="<?=$vasi."_thermansi"?>"/></div></td>
						<td><div align="center"><input type="checkbox" value="1" name="<?=$vasi."_znx"?>"/></div></td>
						<td><div align="center"><input type="text" name="<?=$vasi."_syna";?>" maxlength="10" size="5" /></div></td>
						<td><div align="center"><input type="text" name="<?=$vasi."_synb";?>" maxlength="10" size="5" /></div></td>
						<td><div align="center"><input type="text" name="<?=$vasi."_epifaneia";?>" maxlength="10" size="5" /></div></td>
						<td><div align="center"><input type="text" name="<?=$vasi."_gdeg";?>" maxlength="10" size="5" /></div></td>
						<td><div align="center"><input type="text" name="<?=$vasi."_bdeg";?>" maxlength="10" size="5" /></div></td>
						<td><div align="center"><input type="text" name="<?=$vasi."_fs";?>" maxlength="10" size="5" /></div></td>
						</tr></table>
						<input type="submit" name="<?=$vasi."_systemiliakos";?>" value="Προσθήκη ηλιακού" />
						</form>
					
			</div>
					
					
					</div>
<!------------------------------------------------------------------------------------>	

		<?php } ?>