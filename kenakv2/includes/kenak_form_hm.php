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





</script>
			
			<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#tab-meletes">Μελέτες Η/Μ</a></li>
					<li><a href="#tab-thermansi">Θέρμανση</a></li>
					<li><a href="#tab-psyksi">Ψύξη</a></li>
					<li><a href="#tab-znx">ΖΝΧ</a></li>
					</ul>  
					
					
					
					
					<div id="tab-meletes" class="tabdiv">
					
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
					</div><!--/meletes-->

					

					
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
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Πηγή Ενέργειας </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">Β.Απ. (-) </div></th>
					<th> <div align="center">COP (-) </div></th>
					<th> <div align="center">Ιαν (-) </div></th>
					<th> <div align="center">Φεβ (-) </div></th>
					<th> <div align="center">Μαρ (-) </div></th>
					<th> <div align="center">Απρ (-) </div></th>
					<th> <div align="center">Μαι (-) </div></th>
					<th> <div align="center">Ιουν (-) </div></th>
					<th> <div align="center">Ιουλ (-) </div></th>
					<th> <div align="center">Αυγ (-) </div></th>
					<th> <div align="center">Σεπ (-) </div></th>
					<th> <div align="center">Οκτ (-) </div></th>
					<th> <div align="center">Νοε (-) </div></th>
					<th> <div align="center">Δεκ (-) </div></th>
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
					<td><?=$objResult["type"];?></td>
					<td><?=$objResult["pigienergy"];?></td>
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
					?>
						<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>Id</th>
					
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
						
						<tr><td></td>
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
						<option value="5">Βιομάζα</option>
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
					</div></div>
					
					
					<?php
					$kataskeyi_xsystems_thermd_array = get_times_all("*", "kataskeyi_xsystems_thermd");
					
					$kataskeyi_xsystems_thermd_type1 = $kataskeyi_xsystems_thermd_array[0]["type"];
					$kataskeyi_xsystems_thermd_isxys1 = $kataskeyi_xsystems_thermd_array[0]["isxys"];
					$kataskeyi_xsystems_thermd_xwros1 = $kataskeyi_xsystems_thermd_array[0]["xwros"];
					$kataskeyi_xsystems_thermd_bathm1 = $kataskeyi_xsystems_thermd_array[0]["bathm"];
					$kataskeyi_xsystems_thermd_monwsi1 = $kataskeyi_xsystems_thermd_array[0]["monwsi"];
					
					$kataskeyi_xsystems_thermd_type2 = $kataskeyi_xsystems_thermd_array[1]["type"];
					$kataskeyi_xsystems_thermd_isxys2 = $kataskeyi_xsystems_thermd_array[1]["isxys"];
					$kataskeyi_xsystems_thermd_xwros2 = $kataskeyi_xsystems_thermd_array[1]["xwros"];
					$kataskeyi_xsystems_thermd_bathm2 = $kataskeyi_xsystems_thermd_array[1]["bathm"];
					$kataskeyi_xsystems_thermd_monwsi2 = $kataskeyi_xsystems_thermd_array[1]["monwsi"];
					
					?>
					
					<h3>Δίκτυο διανομής - Θέρμανση</h3>
					
					<table>
					<tr>
					<td>
					
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_xsystems_thermd_type1;?></td>
					<td></td>
					</tr>
					<tr>
					<th> <div align="center">Ισχύς </div></th>
					<td><?=$kataskeyi_xsystems_thermd_isxys1;?></td>
					<td><input type="text" name="<?=$vasi."_thermd_isxys1"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Χώρος </div></th>
					<td><?=$kataskeyi_xsystems_thermd_xwros1;?></td>
					<td>
					<select name="<?=$vasi."_thermd_xwros1";?>">
					<option value="0">Εσωτερικοί ή έως 20% σε εξωτερικούς</option>
					<option value="1">Πάνω από 20% σε εξωτερικούς</option>
					</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Βαθμ. Απ. </div></th>
					<td><?=$kataskeyi_xsystems_thermd_bathm1;?></td>
					<td><input type="text" name="<?=$vasi."_thermd_bathm1"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Μόνωση </div></th>
					<td><?=$kataskeyi_xsystems_thermd_monwsi1;?></td>
					<td><input type="checkbox" value="1" name="<?=$vasi."_thermd_monwsi1"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_thermd1"?>" value="Τροποποίηση δικτύου διανομής θερμού μέσου" />
					</form>
					
					</td>
					<td>
					
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_xsystems_thermd_type2;?></td>
					<td></td>
					</tr>
					<tr>
					<th> <div align="center">Ισχύς </div></th>
					<td><?=$kataskeyi_xsystems_thermd_isxys2;?></td>
					<td><input type="text" name="<?=$vasi."_thermd_isxys2"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Χώρος </div></th>
					<td><?=$kataskeyi_xsystems_thermd_xwros2;?></td>
					<td>
					<select name="<?=$vasi."_thermd_xwros2";?>">
					<option value="0">Εσωτερικοί ή έως 20% σε εξωτερικούς</option>
					<option value="1">Πάνω από 20% σε εξωτερικούς</option>
					</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Βαθμ. Απ. </div></th>
					<td><?=$kataskeyi_xsystems_thermd_bathm2;?></td>
					<td><input type="text" name="<?=$vasi."_thermd_bathm2"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Μόνωση </div></th>
					<td><?=$kataskeyi_xsystems_thermd_monwsi2;?></td>
					<td><input type="checkbox" value="1" name="<?=$vasi."_thermd_monwsi2"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_thermd2"?>" value="Τροποποίηση αεραγωγών" />
					</form>
					
					</td>
					</tr>
					</table>
					
					<?php
					$kataskeyi_xsystems_thermt_array = get_times_all("*", "kataskeyi_xsystems_thermt");
					
					$kataskeyi_xsystems_thermt_type = $kataskeyi_xsystems_thermt_array[0]["type"];
					$kataskeyi_xsystems_thermt_bathm = $kataskeyi_xsystems_thermt_array[0]["bathm"];
					
					?>
					<h3>Τερματικές μονάδες - Θέρμανση</h3>
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_xsystems_thermt_type;?></td>
					<td><input type="text" name="<?=$vasi."_thermt_type"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Ισχύς </div></th>
					<td><?=$kataskeyi_xsystems_thermt_bathm;?></td>
					<td><input type="text" name="<?=$vasi."_thermt_bathm"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_thermt"?>" value="Τροποποίηση τερματικών μονάδων" />
					</form>
					
					
					
					
					<h3>Βοηθητικές μονάδες - Θέρμανση</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_thermb";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
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
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["type"];?></td>
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
					
					
					
					<a class="inline" href="#inline_content2" onclick=get_inlinetext(2);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text2' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δεδομένων των βοηθητικών μονάδων θέρμανσης
					$vasi = "prosthiki";
					
					?>
					<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>Id</th>
					
						<th>Τύπος</th>
						<th>Αριθμός</th>
						<th>Ισχύς (KW)</th>						
						
						<tr><td></td>
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
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Πηγή Ενέργειας </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">Β.Απ. (-) </div></th>
					<th> <div align="center">EER (-) </div></th>
					<th> <div align="center">Ιαν (-) </div></th>
					<th> <div align="center">Φεβ (-) </div></th>
					<th> <div align="center">Μαρ (-) </div></th>
					<th> <div align="center">Απρ (-) </div></th>
					<th> <div align="center">Μαι (-) </div></th>
					<th> <div align="center">Ιουν (-) </div></th>
					<th> <div align="center">Ιουλ (-) </div></th>
					<th> <div align="center">Αυγ (-) </div></th>
					<th> <div align="center">Σεπ (-) </div></th>
					<th> <div align="center">Οκτ (-) </div></th>
					<th> <div align="center">Νοε (-) </div></th>
					<th> <div align="center">Δεκ (-) </div></th>
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
					<td><?=$objResult["type"];?></td>
					<td><?=$objResult["pigienergy"];?></td>
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
					
					<br/>
					<a class="inline" href="#inline_content3" onclick=get_inlinetext(3);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text3' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση μονάδας παραγωγής ψύξη
					$vasi = "prosthiki";
					?>
						<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>Id</th>
					
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
						
						<tr><td></td>
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
						<option value="5">Βιομάζα</option>
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
					</div></div>
					
					
					<?php
					$kataskeyi_xsystems_coldd_array = get_times_all("*", "kataskeyi_xsystems_coldd");
					
					$kataskeyi_xsystems_coldd_type1 = $kataskeyi_xsystems_coldd_array[0]["type"];
					$kataskeyi_xsystems_coldd_isxys1 = $kataskeyi_xsystems_coldd_array[0]["isxys"];
					$kataskeyi_xsystems_coldd_xwros1 = $kataskeyi_xsystems_coldd_array[0]["xwros"];
					$kataskeyi_xsystems_coldd_bathm1 = $kataskeyi_xsystems_coldd_array[0]["bathm"];
					$kataskeyi_xsystems_coldd_monwsi1 = $kataskeyi_xsystems_coldd_array[0]["monwsi"];
					
					$kataskeyi_xsystems_coldd_type2 = $kataskeyi_xsystems_coldd_array[1]["type"];
					$kataskeyi_xsystems_coldd_isxys2 = $kataskeyi_xsystems_coldd_array[1]["isxys"];
					$kataskeyi_xsystems_coldd_xwros2 = $kataskeyi_xsystems_coldd_array[1]["xwros"];
					$kataskeyi_xsystems_coldd_bathm2 = $kataskeyi_xsystems_coldd_array[1]["bathm"];
					$kataskeyi_xsystems_coldd_monwsi2 = $kataskeyi_xsystems_coldd_array[1]["monwsi"];
					
					?>
					
					<h3>Δίκτυο διανομής - Ψύξη</h3>
					
					<table>
					<tr>
					<td>
					
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_xsystems_coldd_type1;?></td>
					<td></td>
					</tr>
					<tr>
					<th> <div align="center">Ισχύς </div></th>
					<td><?=$kataskeyi_xsystems_coldd_isxys1;?></td>
					<td><input type="text" name="<?=$vasi."_coldd_isxys1"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Χώρος </div></th>
					<td><?=$kataskeyi_xsystems_coldd_xwros1;?></td>
					<td>
					<select name="<?=$vasi."_coldd_xwros1";?>">
					<option value="0">Εσωτερικοί ή έως 20% σε εξωτερικούς</option>
					<option value="1">Πάνω από 20% σε εξωτερικούς</option>
					</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Βαθμ. Απ. </div></th>
					<td><?=$kataskeyi_xsystems_coldd_bathm1;?></td>
					<td><input type="text" name="<?=$vasi."_coldd_bathm1"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Μόνωση </div></th>
					<td><?=$kataskeyi_xsystems_coldd_monwsi1;?></td>
					<td><input type="checkbox" value="1" name="<?=$vasi."_coldd_monwsi1"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_coldd1"?>" value="Τροποποίηση δικτύου διανομής ψυχρού μέσου" />
					</form>
					
					</td>
					<td>
					
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_xsystems_thermd_type2;?></td>
					<td></td>
					</tr>
					<tr>
					<th> <div align="center">Ισχύς </div></th>
					<td><?=$kataskeyi_xsystems_coldd_isxys2;?></td>
					<td><input type="text" name="<?=$vasi."_coldd_isxys2"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Χώρος </div></th>
					<td><?=$kataskeyi_xsystems_coldd_xwros2;?></td>
					<td>
					<select name="<?=$vasi."_coldd_xwros2";?>">
					<option value="0">Εσωτερικοί ή έως 20% σε εξωτερικούς</option>
					<option value="1">Πάνω από 20% σε εξωτερικούς</option>
					</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Βαθμ. Απ. </div></th>
					<td><?=$kataskeyi_xsystems_coldd_bathm2;?></td>
					<td><input type="text" name="<?=$vasi."_coldd_bathm2"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Μόνωση </div></th>
					<td><?=$kataskeyi_xsystems_coldd_monwsi2;?></td>
					<td><input type="checkbox" value="1" name="<?=$vasi."_coldd_monwsi2"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_coldd2"?>" value="Τροποποίηση αεραγωγών" />
					</form>
					
					</td>
					</tr>
					</table>
					
					<?php
					$kataskeyi_xsystems_coldt_array = get_times_all("*", "kataskeyi_xsystems_coldt");
					
					$kataskeyi_xsystems_coldt_type = $kataskeyi_xsystems_coldt_array[0]["type"];
					$kataskeyi_xsystems_coldt_bathm = $kataskeyi_xsystems_coldt_array[0]["bathm"];
					
					?>
					<h3>Τερματικές μονάδες - Ψύξη</h3>
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_xsystems_coldt_type;?></td>
					<td><input type="text" name="<?=$vasi."_coldt_type"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Ισχύς </div></th>
					<td><?=$kataskeyi_xsystems_coldt_bathm;?></td>
					<td><input type="text" name="<?=$vasi."_coldt_bathm"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_coldt"?>" value="Τροποποίηση τερματικών μονάδων ψύξης" />
					</form>
					
					
					
					
					<h3>Βοηθητικές μονάδες - Ψύξη</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_xsystems_coldb";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
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
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["type"];?></td>
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
					
					
					
					<a class="inline" href="#inline_content4" onclick=get_inlinetext(4);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text4' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση δεδομένων των βοηθητικών μονάδων ψύξης
					$vasi = "prosthiki";
					
					?>
					<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>Id</th>
					
						<th>Τύπος</th>
						<th>Αριθμός</th>
						<th>Ισχύς (KW)</th>						
						
						<tr><td></td>
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
					<th> <div align="center">Τύπος </div></th>
					<th> <div align="center">Πηγή Ενέργειας </div></th>
					<th> <div align="center">Ισχύς (KW) </div></th>
					<th> <div align="center">Β.Απ. (-) </div></th>
					<th> <div align="center">Ιαν (-) </div></th>
					<th> <div align="center">Φεβ (-) </div></th>
					<th> <div align="center">Μαρ (-) </div></th>
					<th> <div align="center">Απρ (-) </div></th>
					<th> <div align="center">Μαι (-) </div></th>
					<th> <div align="center">Ιουν (-) </div></th>
					<th> <div align="center">Ιουλ (-) </div></th>
					<th> <div align="center">Αυγ (-) </div></th>
					<th> <div align="center">Σεπ (-) </div></th>
					<th> <div align="center">Οκτ (-) </div></th>
					<th> <div align="center">Νοε (-) </div></th>
					<th> <div align="center">Δεκ (-) </div></th>
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
					<td><?=$objResult["type"];?></td>
					<td><?=$objResult["pigienergy"];?></td>
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
					
					<br/>
					<a class="inline" href="#inline_content5" onclick=get_inlinetext(5);><img src="./images/style/add.png"/></a>
					<div style='display:none'><div id='inline_text5' style='padding:10px; background:#ebf9c9;'>
					<?php
					//προσθήκη στη βάση μονάδας παραγωγής ZNX
					$vasi = "prosthiki";
					?>
						<table border="1"><br/><form action="kenak.php" method="post">
						<tr><th>Id</th>
					
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
						
						<tr><td></td>
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
					</div></div>
					
					
					
					
					<?php
					$kataskeyi_xsystems_znxd_array = get_times_all("*", "kataskeyi_xsystems_znxd");
					
					$kataskeyi_xsystems_znxd_type = $kataskeyi_xsystems_znxd_array[0]["type"];
					$kataskeyi_xsystems_znxd_anakykloforia = $kataskeyi_xsystems_znxd_array[0]["anakykloforia"];
					$kataskeyi_xsystems_znxd_xwros = $kataskeyi_xsystems_znxd_array[0]["xwros"];
					$kataskeyi_xsystems_znxd_bathm = $kataskeyi_xsystems_znxd_array[0]["bathm"];
					?>
					
					<h3>Δίκτυο διανομής - ΖΝΧ</h3>
					
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_xsystems_znxd_type;?></td>
					<td><input type="text" name="<?=$vasi."_znxd_type"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Ισχύς </div></th>
					<td><?=$kataskeyi_xsystems_znxd_anakykloforia;?></td>
					<td><input type="checkbox" value="1" name="<?=$vasi."_znxd_anakykloforia"?>" /></td>
					</tr>
					<tr>
					<th> <div align="center">Χώρος </div></th>
					<td><?=$kataskeyi_xsystems_znxd_xwros;?></td>
					<td>
					<select name="<?=$vasi."_znxd_xwros";?>">
					<option value="0">Εσωτερικοί ή έως 20% σε εξωτερικούς</option>
					<option value="1">Πάνω από 20% σε εξωτερικούς</option>
					</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Βαθμ. Απ. </div></th>
					<td><?=$kataskeyi_xsystems_znxd_bathm;?></td>
					<td><input type="text" name="<?=$vasi."_znxd_bathm"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_znxd"?>" value="Τροποποίηση δικτύου διανομής ZNX" />
					</form>
					
					
					
					
					<?php
					$kataskeyi_xsystems_znxa_array = get_times_all("*", "kataskeyi_xsystems_znxa");
					
					$kataskeyi_xsystems_znxa_type = $kataskeyi_xsystems_znxa_array[0]["type"];
					$kataskeyi_xsystems_znxa_bathm = $kataskeyi_xsystems_znxa_array[0]["bathm"];
					
					?>
					<h3>Αποθηκευτικές μονάδες - ΖΝΧ</h3>
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_xsystems_znxa_type;?></td>
					<td><input type="text" name="<?=$vasi."_znxa_type"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Βαθμ. Απ. </div></th>
					<td><?=$kataskeyi_xsystems_znxa_bathm;?></td>
					<td><input type="text" name="<?=$vasi."_znxa_bathm"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_znxa"?>" value="Τροποποίηση μονάδων αποθήκευσης ΖΝΧ" />
					</form>
					</div><!--/znx-->
					
					</div>
<!------------------------------------------------------------------------------------>	

		<?php } ?>