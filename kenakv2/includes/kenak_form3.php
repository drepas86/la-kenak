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
tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr       *
- Αναδιάταξη των στοιχείων στην οθόνη για να μην ξεπερνούν το πλάτος    *
- της σε ανάλυση με πλάτος 1280                                         *
- Προσθήκη κώδικα στο adddel_toixoi για επαναφορά εδώ μετά την προσθήκη *
- ή διαγραφή τοίχου                                                     *
-                                                                       *
*************************************************************************

*/
?>
		<?php	if ($sel_page["id"] == 3)	{ ?>
			<h2>ΚΕΝΑΚ - Δομικά στοιχεία</h2>
	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/wall.png\"></img>";
	  </script>

<script language="JavaScript">
	function ClickCheckAll(vol,n)
	{
		if (n==1){var j=document.frmMain1.hdnCount1.value;}
		if (n==2){var j=document.frmMain2.hdnCount2.value;}
		if (n==3){var j=document.frmMain3.hdnCount3.value;}
		if (n==4){var j=document.frmMain4.hdnCount4.value;}
		var i=1;
		for(i=1;i<=j;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain"+n+".delcheck"+n+i+".checked=true");
			}
			else
			{
				eval("document.frmMain"+n+".delcheck"+n+i+".checked=false");
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

	
function get_thermo_or(){
$(".orofis").colorbox({iframe:true, width:"685px", height:"90%"});
}
function get_thermo_dok(){
$(".dok").colorbox({iframe:true, width:"685px", height:"90%"});
}
function get_thermo_ypost(){
$(".ypost").colorbox({iframe:true, width:"685px", height:"50%"});
}
function iframe_t_u(){
$(".iframe").colorbox({iframe:true, width:"900px", height:"90%"});
}

function get_inlinetext(v){
$.colorbox({inline:true,  href:"#inline_text"+v});
}
function getpsi(n,x){
$.fn.colorbox.close();
document.getElementById("t_thermo"+x).selectedIndex=n-1;
}
function getpsi1(n,x){
$.fn.colorbox.close();
document.getElementById("d_thermo"+x).selectedIndex=n-1;
}
function getpsi2(n,x){
$.fn.colorbox.close();
document.getElementById("yp_thermo"+x).selectedIndex=n-1;
}
function get_ut(n,x,t,d){
$.fn.colorbox.close();
document.getElementById(t+"_u"+x).value=n;
if (t=='t'){document.getElementById("t_p"+x).value=d;}
}
</script>
		
			<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#toixoib">Βόρεια</a></li>
					<li><a href="#toixoia">Ανατολικά</a></li>
					<li><a href="#toixoin">Νότια</a></li>
					<li><a href="#toixoid">Δυτικά</a></li>
					</ul> 
					
<?php
$it[1]="b";
$dt[1]="Διαγραφή Βόρειου τοίχου";
$pt[1]="Προσθήκη Βόρειου τοίχου";
$it[2]="a";
$dt[2]="Διαγραφή Ανατολικού τοίχου";
$pt[2]="Προσθήκη Ανατολικού τοίχου";
$it[3]="n";
$dt[3]="Διαγραφή Νότιου τοίχου";
$pt[3]="Προσθήκη Νότιου τοίχου";
$it[4]="d";
$dt[4]="Διαγραφή Δυτικού τοίχου";
$pt[4]="Προσθήκη Δυτικού τοίχου";

for ($j=1;$j<=4;$j++){
?>
			<div id="toixoi<?=$it[$j];?>" class="tabdiv"> 
					<form name="frmMain<?=$j;?>" id="frmMain<?=$j;?>" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_t_" . $it[$j];
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1" id="domika">
					<tr>
					<th id="header<?=$j;?>1" style="vertical-align:middle;">Id</th>
					<th colspan=6> Τοίχος </th><th colspan=3> Δοκός </th><th colspan=4> Υποστύλωμα </th><th colspan=3> Συρόμενα </th>
					<th id="header<?=$j;?>2" style="vertical-align:middle;"> 
					<input name="CheckAll<?=$it[$j];?>" type="checkbox" id="CheckAll<?=$it[$j];?>" value="Y" onClick="ClickCheckAll(this,<?=$j;?>);">
					</th>
					<script type="text/javascript">
					document.getElementById("header<?=$j;?>1").rowSpan="2";
					document.getElementById("header<?=$j;?>2").rowSpan="2";
					</script>					
					</tr><tr>
					<th> Όνομα</th><th> Μήκος</th><th> Ύψος</th><th> Πλάτος</th><th> U</th><th> Ψ</th>
					<th> Ύψος</th><th> U</th><th> Ψ</th>
					<th> Μήκος</th><th> Πλήθος</th><th> U</th><th> Ψ</th>
					<th> Μήκος</th><th> Ύψος</th><th> U</th>
					</tr>
					<?php
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					?>
					<tr>
<!--					<td><div align="center"><?=$objResult["id"];?></div></td> -->
					<td><div align="center"><?=$i;?></div></td>
					<td><?=$objResult["name"];?></td>
					<td><?=number_format($objResult["t_mikos"],2,".",",");?></td>
					<td><?=number_format($objResult["t_ypsos"],2,".",",");?></td>
					<td><?=number_format($objResult["t_platos"],2,".",",");?></td>
					<td><?=number_format($objResult["t_u"],3,".",",");?></td>
					<td><?=number_format($objResult["t_thermo"],3,".",",");?></td>
					<td><?=number_format($objResult["d_ypsos"],2,".",",");?></td>
					<td><?=number_format($objResult["d_u"],3,".",",");?></td>
					<td><?=number_format($objResult["d_thermo"],3,".",",");?></td>
					<td><?=number_format($objResult["yp_mikos"],2,".",",");?></td>
					<td><?=number_format($objResult["yp_plithos"],0,".",",");?></td>
					<td><?=number_format($objResult["yp_u"],3,".",",");?></td>
					<td><?=number_format($objResult["yp_thermo"],3,".",",");?></td>
					<td><?=number_format($objResult["syr_mikos"],2,".",",");?></td>
					<td><?=number_format($objResult["syr_ypsos"],2,".",",");?></td>
					<td><?=number_format($objResult["syr_u"],3,".",",");?></td>
					<td><input type="checkbox" name="delcheck[]" id="delcheck<?=$j;?><?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<table id="domika"><tr><td style="width:100%;">
					<input type="submit" name="delete_toixoi<?=$it[$j];?>" value="<?=$dt[$j];?>" style="float:right;"></td></tr></table>
					<input type="hidden" name="hdnCount<?=$j;?>" value="<?=$i;?>">
					</form>

					<form name="frmAdd<?=$j;?>" id="frmAdd<?=$j;?>" action="kenak.php" method="post">
					
					<?php
					//προσθήκη στη βάση δεδομένων των στοιχείων
					$vasi = "prosthiki";
						echo "<table border=\"1\" align=\"center\"><br/><form action=\"kenak.php\" method=\"post\">";
						$thermo_d = dropdown1("SELECT name, y FROM thermo_d", "y", "name");
						$thermo_oe = dropdown1("SELECT name, y FROM thermo_oe", "y", "name");
						$thermo_pr = dropdown1("SELECT name, y FROM thermo_pr", "y", "name");
						$thermo_edp = dropdown1("SELECT name, y FROM thermo_edp", "y", "name");
						?>
						<tr>
						<th colspan=6>Τοίχος</th></tr><tr>
						<th>Όνομα<br/><a class="inline" href="#inline_content1" onclick=get_inlinetext(1);><img src="./images/style/help.png"/></a></th>
						<th>Μήκος<br/><a class="inline" href="#inline_content2" onclick=get_inlinetext(2);><img src="./images/style/help.png"/></a></th>
						<th>Ύψος<br/><a class="inline" href="#inline_content3" onclick=get_inlinetext(3);><img src="./images/style/help.png"/></a></th>
						<th>Πλάτος<br/><a class="inline" href="#inline_content4" onclick=get_inlinetext(4);><img src="./images/style/help.png"/></a></th>
						<th>U<br/><a class="iframe" href="./domika_kelyfos.php?page=1&min=1&t=t&p=<?=$j;?>" onclick=iframe_t_u();><img src="./images/style/help.png" /></a></th>
						<th>Ψ<br/><a class="orofis" href="./includes/kenak_help1.php?p=<?=$j;?>" title="" onclick=get_thermo_or();><img src="./images/style/help.png"/></a></th>
						</tr/><tr>
						<?php
						echo "<td><input type=\"text\" name=\"" . $vasi . "_name\" maxlength=\"50\" size=\"25\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_t_mikos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_t_ypsos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_t_platos\" id=\"t_p".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_t_u\" id=\"t_u".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><select name=\"" . $vasi . "_t_thermo\" id=\"t_thermo".$j."\"/>" . $thermo_d . $thermo_oe . $thermo_pr . "</select></td>";
					?>
						</tr><tr></table><br /><table border=1 align="center"><tr>
						
						<th colspan=3>Δοκός</th><th colspan=4>Υποστύλωμα</th><th colspan=3>Συρόμενα</th></tr/><tr>
						<th>Ύψος<br/><a class="inline" href="#inline_content5" onclick=get_inlinetext(5);><img src="./images/style/help.png"/></a></th>
						<th>U<br/><a class="iframe" href="./domika_kelyfos.php?page=1&min=1&t=d&p=<?=$j;?>" onclick=iframe_t_u();><img src="./images/style/help.png" /></a></th>
						<th>Ψ<br/><a class="dok" href="./includes/kenak_help2.php?p=<?=$j;?>" title="" onclick=get_thermo_dok();><img src="./images/style/help.png"/></a></th>
<!--					<th>Ψ<br/><a class="dok" href="./images/thermo/edp/edp4.jpg" title="" onclick=get_thermo_dok();><img src="./images/style/help.png" /></a></th> -->
						<th>Μήκος<br/><a class="inline" href="#inline_content6" onclick=get_inlinetext(6);><img src="./images/style/help.png"/></a></th>
						<th>Πλήθος<br/><a class="inline" href="#inline_content7" onclick=get_inlinetext(7);><img src="./images/style/help.png"/></a></th>
						<th>U<br/><a class="iframe" href="./domika_kelyfos.php?page=1&min=1&t=y&p=<?=$j;?>" onclick=iframe_t_u();><img src="./images/style/help.png" /></a></th>
						<th>Ψ<br/><a class="ypost" href="./includes/kenak_help3.php?p=<?=$j;?>" title="" onclick=get_thermo_ypost();><img src="./images/style/help.png"/></a></th>
						<th>Μήκος<br/><a class="inline" href="#inline_content8" onclick=get_inlinetext(8);><img src="./images/style/help.png"/></a></th>
						<th>Ύψος<br/><a class="inline" href="#inline_content9" onclick=get_inlinetext(9);><img src="./images/style/help.png"/></a></th>
						<th>U<br/><a class="iframe" href="./domika_kelyfos.php?page=1&min=1&t=s&p=<?=$j;?>" onclick=iframe_t_u();><img src="./images/style/help.png" /></a></th>
						</tr><tr>
						<?php
						echo "<td><input type=\"text\" name=\"" . $vasi . "_d_ypsos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_d_u\" id=\"d_u".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><select name=\"" . $vasi . "_d_thermo\" id=\"d_thermo".$j."\"/>" . $thermo_edp . $thermo_pr . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_yp_mikos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_yp_plithos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_yp_u\" id=\"y_u".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><select name=\"" . $vasi . "_yp_thermo\" id=\"yp_thermo".$j."\"/>" . $thermo_pr . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_syr_mikos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_syr_ypsos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_syr_u\" id=\"s_u".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "</tr></table>";
						echo "<br /><center><input type=\"submit\" name=\"" . $vasi . "_toixoi" . $it[$j] . "\" value=\"" . $pt[$j] . "\" /></center>";
						?>
					</form>	
			</div><!--/toixoi<?=$it[$j];?>-->
<?php } ?>
</div>
					
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στην επιλογή ονόματος                             -->
		<div style='display:none'><div id='inline_text1' style='padding:10px; background:#ebf9c9;'>
		Το όνομα του τοίχου θα μπορούσε να είναι χαρακτηριστικό της κατεύθυνσης του και του ορόφου. πχ (ΙΣ-Β1 = Ισόγειο Βόρεια Αριθμός τοίχου 1).
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στο μήκος του τοίχου                              -->
		<div style='display:none'><div id='inline_text2' style='padding:10px; background:#ebf9c9;'>
		Η οριζόντια διάσταση του τοίχου (πάνω / κάτω).
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στο ύψος του τοίχου           -->
		<div style='display:none'><div id='inline_text3' style='padding:10px; background:#ebf9c9;'>
		Η κατακόρυφη διάσταση του τοίχου (αριστερά / δεξιά).
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στο ύψος του τοίχου           -->
		<div style='display:none'><div id='inline_text4' style='padding:10px; background:#ebf9c9;'>
		Το πλάτος του τοίχου (Όπως υπολογίστηκε στο U του δομικού στοιχείου).
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στο ύψος της δοκού           -->
		<div style='display:none'><div id='inline_text5' style='padding:10px; background:#ebf9c9;'>
		Η κατακόρυφη διάσταση της δοκού. Η οριζόντια διάστασή της είναι το μήκος του τοίχου.
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια μήκος των υποστηλωμάτων           -->
		<div style='display:none'><div id='inline_text6' style='padding:10px; background:#ebf9c9;'>
		Η οριζόντια διάσταση των υποστυλωμάτων. Η κατακόρυφη διάσταση αυτών είναι το ύψος του τοίχου.
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια πλήθος των υποστηλωμάτων           -->
		<div style='display:none'><div id='inline_text7' style='padding:10px; background:#ebf9c9;'>
		Το πλήθος των υποστυλωμάτων. Ανάλογα με το πλήθος αυτών υπολογίζονται οι θερμογέφυρες ενώσεων του τοίχου <br/>δεξιά και αριστερά του κάθε υποστυλώματος.
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια μήκος των συρομένων           -->
		<div style='display:none'><div id='inline_text8' style='padding:10px; background:#ebf9c9;'>
		Το μήκος συρομένων πορτών ή παραθύρων.<br/>Σύνηθες είναι το άθροισμα του μήκους των συρομένων παραθύρων.
		</div></div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια ύψος των συρομένων           -->
		<div style='display:none'><div id='inline_text9' style='padding:10px; background:#ebf9c9;'>
		Το ύψος συρομένων πορτών ή παραθύρων.<br/>Σύνηθες είναι το άθροισμα του ύψους των συρομένων παραθύρων.
		</div></div>
<!------------------------------------------------------------------------------------>
		<?php } ?>