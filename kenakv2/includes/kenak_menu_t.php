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
- Αναδιάταξη των στοιχείων στην οθόνη για να μην ξεπερνούν το πλάτος    *
- της σε ανάλυση με πλάτος 1280                                         *
- Προσθήκη κώδικα στο adddel_toixoi για επαναφορά εδώ μετά την προσθήκη *
- ή διαγραφή τοίχου                                                     *
- Προσθήκη κώδικα για σχεδίαση των τοίχων και επεξεργασία του πίνακα    *
- με άμεση αποθήκευση των αλλαγών                                       *
-                                                                       *
*************************************************************************
*/
?>
		<?php	if ($sel_page["id"] == 6)	{ 
	add_column_if_not_exist("kataskeyi_an_b", "x", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_b", "y", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_a", "x", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_a", "y", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_n", "x", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_n", "y", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_d", "x", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_d", "y", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_t_b", "yp_len", "VARCHAR(100)");
	add_column_if_not_exist("kataskeyi_t_a", "yp_len", "VARCHAR(100)");
	add_column_if_not_exist("kataskeyi_t_n", "yp_len", "VARCHAR(100)");
	add_column_if_not_exist("kataskeyi_t_d", "yp_len", "VARCHAR(100)");
?>		
<table width=100% id="maintable"><tr><td style="width:50%;vertical-align:middle;"><h2>ΚΕΝΑΚ - Κατακόρυφα αδιαφανή δομικά στοιχεία σε επαφή με εξ. αέρα</h2></td>
<td style="vertical-align:middle;">
<img src="./images/domika/draw.png"  width="40px" height="40px"  title="σχεδίαση τοίχων" style="cursor:pointer;" onclick="draw()" />
&nbsp;&nbsp;
<img src="./images/domika/help.png"  width="40px" height="40px"  title="οδηγίες" style="cursor:pointer;" onclick=help_t(); />
</td>
</td></tr></table>
<script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/wall.png\"></img>";
	  </script>

<script language="JavaScript">

var nt=new Array();

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
function get_thermo_dap(){
$(".thermodap").colorbox({iframe:true, width:"685px", height:"90%"});
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

function help_t(){
$.colorbox({inline:true,  href:"#guide", width:"600px", height:"410px"});
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
function getpsi3(n,x){
$.fn.colorbox.close();
document.getElementById("t_thermodap"+x).selectedIndex=n-1;
}
function get_ut(n,x,t,d){
$.fn.colorbox.close();
document.getElementById(t+"_u"+x).value=n;
if (t=='t'){document.getElementById("t_p"+x).value=d;}
}

function get_active(){

var t=new Array();
t[1]="b";
t[2]="a";
t[3]="n";
t[4]="d";
var i;
for (i=1;i<=4;i++){
	var x=document.getElementById("toixoi"+t[i]).style.display;
	if (x!=="none"){
		active_tab=i;
	}
}
for (i=1;i<=4;i++){
	document.getElementById("toixoi"+t[i]).style.display="inherit";
}
document.getElementById("tabvanilla").style.display="block";
}
</script>
<font color="green">Η βόρεια πλευρά είναι αυτή που δηλώνεται στο μενού <a href="kenak.php?page=2#tab-zwni">Κτίριο-Κλιματολογικά</a> η κλίση της.
<br/>
Η ονομασία είναι τυπική ως Βόρεια. Όσο αφορά το λογισμικό η Βόρεια πλευρά μπορεί να έχει οποιαδήποτε κλίση και είναι στην ευχέρεια του χρήστη ποια επιλέγεται.
</font>		
			<div id="tabvanilla" class="widget" style="display:none;">
				<ul class="tabnav">  
					<li><a onclick="active_tab=1;" href="#toixoib">Βόρεια</a></li>
					<li><a onclick="active_tab=2;" href="#toixoia">Ανατολικά</a></li>
					<li><a onclick="active_tab=3;" href="#toixoin">Νότια</a></li>
					<li><a onclick="active_tab=4;" href="#toixoid">Δυτικά</a></li>
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
	if ($j>1)echo "<div id=\"toixoi".$it[$j]."\" class=\"tabdiv\"  style=\"display:none;\" >";
	if ($j==1)echo "<div id=\"toixoi".$it[$j]."\" class=\"tabdiv\">";
?>
					<form name="frmMain<?=$j;?>" id="frmMain<?=$j;?>" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_t_" . $it[$j];
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1" id="domika">
					<tr>
					<th id="header<?=$j;?>1" style="vertical-align:middle;">Id</th>
					<th colspan=8> Τοίχος </th><th colspan=3> Δοκός </th><th colspan=4> Υποστύλωμα </th><th colspan=3> Συρόμενα </th>
					<th id="header<?=$j;?>2" style="vertical-align:middle;"> 
					<input name="CheckAll<?=$it[$j];?>" type="checkbox" id="CheckAll<?=$it[$j];?>" value="Y" onClick="ClickCheckAll(this,<?=$j;?>);">
					</th>
					<script type="text/javascript">
					document.getElementById("header<?=$j;?>1").rowSpan="2";
					document.getElementById("header<?=$j;?>2").rowSpan="2";
					</script>					
					</tr><tr>
					<th> Id ζώνης</th><th> Όνομα</th><th> Μήκος</th><th> Ύψος</th><th> Πάχος</th><th> U</th><th> Ψ οροφής</th><th> Ψ δαπέδου</th>
					<th> Ύψος</th><th> U</th><th> Ψ</th>
					<th> Μήκος</th><th> Πλήθος</th><th> U</th><th> Ψ</th>
					<th> Μήκος</th><th> Ύψος</th><th> U</th>
					</tr>
					<?php
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					$tid=$objResult["id"];
					$strSQL1 = "SELECT * FROM kataskeyi_an_" . $it[$j]." WHERE id_toixoy=".$tid;
					$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
					$k = 0;
					while($objResult1 = mysql_fetch_array($objQuery1))
					{
					$k++;
					$anw[$k]=$objResult1["anoig_mikos"];
					$anh[$k]=$objResult1["anoig_ypsos"];
					$anx[$k]=$objResult1["x"];
					$any[$k]=$objResult1["y"];
					$anid[$k]=$objResult1["id"];
					}
					$ans[$i]=$k;
					?>
					<tr>
<!--					<td><div align="center"><?=$objResult["id"];?></div></td> -->
					<input type="hidden" id="id<?=$j;?><?=$i;?>" value="<?=$objResult["id"];?>">
					<input type="hidden" id="yprec<?=$j;?><?=$i;?>" value="<?=$objResult["yp_len"];?>">
					<input type="hidden" id="ans<?=$j;?><?=$i;?>" value="<?=$ans[$i];?>">
					<?php
					for ($l=1;$l<=$ans[$i];$l++){
					echo "<input type=\"hidden\" id=\"anw".$j.$i.$l."\" value=\"".number_format($anw[$l],2,".",",")."\">";
					echo "<input type=\"hidden\" id=\"anh".$j.$i.$l."\" value=\"".number_format($anh[$l],2,".",",")."\">";
					echo "<input type=\"hidden\" id=\"anx".$j.$i.$l."\" value=\"".number_format($anx[$l],2,".",",")."\">";
					echo "<input type=\"hidden\" id=\"any".$j.$i.$l."\" value=\"".number_format($any[$l],2,".",",")."\">";
					echo "<input type=\"hidden\" id=\"anid".$j.$i.$l."\" value=\"".$anid[$l]."\">";
					}
					?>
					<td><div align="center"><?=$i;?></div></td>
					<td id="idzwnis<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("idzwnis",<?=$j;?><?=$i;?>); ><?=$objResult["id_zwnis"];?></td>
					<td id="name<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("name",<?=$j;?><?=$i;?>); ><?=$objResult["name"];?></td>
					<td id="tl<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("tl",<?=$j;?><?=$i;?>); ><?=number_format($objResult["t_mikos"],2,".",",");?></td>
					<td id="th<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("th",<?=$j;?><?=$i;?>); ><?=number_format($objResult["t_ypsos"],2,".",",");?></td>
					<td id="tp<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("tp",<?=$j;?><?=$i;?>); ><?=number_format($objResult["t_platos"],2,".",",");?></td>
					<td id="tu<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("tu",<?=$j;?><?=$i;?>); ><?=number_format($objResult["t_u"],3,".",",");?></td>
					<td id="tt<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("tt",<?=$j;?><?=$i;?>); ><?=number_format($objResult["t_thermo"],3,".",",");?></td>
					<td id="td<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("td",<?=$j;?><?=$i;?>); ><?=number_format($objResult["t_thermodap"],3,".",",");?></td>
					<td id="dh<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("dh",<?=$j;?><?=$i;?>); ><?=number_format($objResult["d_ypsos"],2,".",",");?></td>
					<td id="du<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("du",<?=$j;?><?=$i;?>); ><?=number_format($objResult["d_u"],3,".",",");?></td>
					<td id="dt<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("dt",<?=$j;?><?=$i;?>); ><?=number_format($objResult["d_thermo"],3,".",",");?></td>
					<td id="yl<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("yl",<?=$j;?><?=$i;?>); ><?=number_format($objResult["yp_mikos"],2,".",",");?></td>
					<td id="yn<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("yn",<?=$j;?><?=$i;?>); ><?=number_format($objResult["yp_plithos"],0,".",",");?></td>
					<td id="yu<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("yu",<?=$j;?><?=$i;?>); ><?=number_format($objResult["yp_u"],3,".",",");?></td>
					<td id="yt<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("yt",<?=$j;?><?=$i;?>); ><?=number_format($objResult["yp_thermo"],3,".",",");?></td>
					<td id="sl<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("sl",<?=$j;?><?=$i;?>); ><?=number_format($objResult["syr_mikos"],2,".",",");?></td>
					<td id="sh<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("sh",<?=$j;?><?=$i;?>); ><?=number_format($objResult["syr_ypsos"],2,".",",");?></td>
					<td id="su<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("su",<?=$j;?><?=$i;?>); ><?=number_format($objResult["syr_u"],3,".",",");?></td>
					<td><input type="checkbox" name="delcheck[]" id="delcheck<?=$j;?><?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?php
					}
					?>
					<script language="JavaScript">nt[<?=$j;?>]=<?=$i;?>;</script>
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
						<th colspan=8>Τοίχος</th></tr><tr>
						<th>Ζώνη</th>
						<th>Όνομα<br/><a class="inline" href="#inline_content1" onclick=get_inlinetext(1);><img src="./images/style/help.png"/></a></th>
						<th>Μήκος<br/><a class="inline" href="#inline_content2" onclick=get_inlinetext(2);><img src="./images/style/help.png"/></a></th>
						<th>Ύψος<br/><a class="inline" href="#inline_content3" onclick=get_inlinetext(3);><img src="./images/style/help.png"/></a></th>
						<th>Πάχος<br/><a class="inline" href="#inline_content4" onclick=get_inlinetext(4);><img src="./images/style/help.png"/></a></th>
						<th>U<br/><a class="iframe" href="./domika_kelyfos.php?page=1&min=1&t=t&p=<?=$j;?>" onclick=iframe_t_u();><img src="./images/style/help.png" /></a></th>
						<th>Ψ οροφής<br/><a class="orofis" href="./includes/kenak_help1.php?p=<?=$j;?>" title="" onclick=get_thermo_or();><img src="./images/style/help.png"/></a></th>
						<th>Ψ δαπέδου<br/><a class="thermodap" href="./includes/kenak_help6.php?p=<?=$j;?>" title="" onclick=get_thermo_dap();><img src="./images/style/help.png"/></a></th>
						</tr/><tr>
						<?php
						$id_zwnis = dropdown("SELECT id, name FROM kataskeyi_zwnes", "id", "name", $vasi."_id_zwnis");
						echo "<td>".$id_zwnis."</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_name\" maxlength=\"50\" size=\"25\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_t_mikos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_t_ypsos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_t_platos\" id=\"t_p".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_t_u\" id=\"t_u".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><select name=\"" . $vasi . "_t_thermo\" id=\"t_thermo".$j."\"/>" . $thermo_d . $thermo_oe . $thermo_pr . "</select></td>";
						echo "<td><select name=\"" . $vasi . "_t_thermodap\" id=\"t_thermodap".$j."\"/>" . $thermo_d . $thermo_oe . $thermo_pr . "</select></td>";
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
<!--        Κρυφό div για βοήθεια στο μήκος του τοίχου                              -->
		<div style='display:none'><div id='inline_text2' style='padding:10px; background:#ebf9c9;'>
		Η οριζόντια διάσταση του τοίχου (πάνω / κάτω).
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για βοήθεια στο ύψος του τοίχου                               -->
		<div style='display:none'><div id='inline_text3' style='padding:10px; background:#ebf9c9;'>
		Η κατακόρυφη διάσταση του τοίχου (αριστερά / δεξιά).
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για βοήθεια στο ύψος του τοίχου                               -->
		<div style='display:none'><div id='inline_text4' style='padding:10px; background:#ebf9c9;'>
		Το πλάτος του τοίχου (Όπως υπολογίστηκε στο U του δομικού στοιχείου).
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για βοήθεια στο ύψος της δοκού                                -->
		<div style='display:none'><div id='inline_text5' style='padding:10px; background:#ebf9c9;'>
		Η κατακόρυφη διάσταση της δοκού. Η οριζόντια διάστασή της είναι το μήκος του τοίχου.
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για βοήθεια μήκος των υποστηλωμάτων                           -->
		<div style='display:none'><div id='inline_text6' style='padding:10px; background:#ebf9c9;'>
		Η οριζόντια διάσταση των υποστυλωμάτων. Η κατακόρυφη διάσταση αυτών είναι το ύψος του τοίχου.
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για βοήθεια πλήθος των υποστηλωμάτων                          -->
		<div style='display:none'><div id='inline_text7' style='padding:10px; background:#ebf9c9;'>
		Το πλήθος των υποστυλωμάτων. Ανάλογα με το πλήθος αυτών υπολογίζονται οι θερμογέφυρες ενώσεων του τοίχου <br/>δεξιά και αριστερά του κάθε υποστυλώματος.
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για βοήθεια μήκος των συρομένων                               -->
		<div style='display:none'><div id='inline_text8' style='padding:10px; background:#ebf9c9;'>
		Το μήκος συρομένων πορτών ή παραθύρων.<br/>Σύνηθες είναι το άθροισμα του μήκους των συρομένων παραθύρων.
		</div></div>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια ύψος των συρομένων                                -->
		<div style='display:none'><div id='inline_text9' style='padding:10px; background:#ebf9c9;'>
		Το ύψος συρομένων πορτών ή παραθύρων.<br/>Σύνηθες είναι το άθροισμα του ύψους των συρομένων παραθύρων.
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για γενική βοήθεια                                            -->
		<div style='display:none'><div id='guide' style='padding:10px; background:#ebf9c9;'>
		<b>Δομικά Στοιχεία</b><hr>
		Στη σελίδα αυτή γίνεται η εισαγωγή των τοίχων του κτιρίου.
		Με κλικ στα εικονίδια <img src ="./images/style/help.png" style="vertical-align:middle;" /> δίνονται οδηγίες για τον τύπο του κάθε δεδομένου.<br /><br />
		Επί πλέον, για τον συντελεστή U ανοίγει νέο παράθυρο με το φύλλο υπολογισμού του, όπου με κλικ στην τιμή του U που υπολογίστηκε, 
		μεταφέρονται τα δεδομένα στη παρούσα  καρτέλα.<br /><br />
		Αντίστοιχα για τον συντελεστή θερμογέφυρας, η επιλογή μπορεί να γίνει με επιλογή του είδους της από τις εικόνες που εμφανίζονται 
		στο σχετικό παράθυρο.<hr>
		Με το εικονίδιο <img src="./images/domika/draw.png"  style="vertical-align:middle;width:30px;height:30px;"  > ανοίγει παράθυρο 
		στο οποίο σχεδιάζονται τα σκαριφήματα των τοίχων και είναι δυνατή η επεξεργασία της θέσης των στύλων και των ανοιγμάτων.
		 (τα δεδομένα των ανοιγμάτων πρέπει να έχουν δοθεί στη σελίδα 'Ανοίγματα')<hr>
		Αν κατά την εισαγωγή των στοιχείων ενός τοίχου έγινε κάπου λάθος, μπορεί να διορθωθεί με κλικ στη λάθος τιμή και 
		συμπλήρωση της σωστής στο παράθυρο που ανοίγει.<hr>
		Θεωρείται πως ο τοίχος έχει την εξής μορφή:<br/>
		<img src="images/style/help_wall.png">
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για σχεδίαση τοίχων                                           -->
		<div style='display:none'><div id='draw' style='padding:10px; background:#ebf9c9;'>
		<table style="width:804px;border:1px solid black;"><tr><td style="vertical-align:middle;width:200px;">
		Τοίχος:&nbsp;<select id="toixos" onchange=drawit();></select></td><td id="dims" style="vertical-align:middle;width:400px;"</td>
		<td id="saveimg" style="width:200px;text-align:right;"></td></tr></table>
		<table style="width:800px;border:1px solid black;"><tr><td>
		<div id="ypost" style="width:800px;height:30px;"><div>
		</td></tr><tr><td style="border-top:1px dotted;">
		<div id="anoig" style="width:800px;height:150px;"><div>
		</td></tr></table>
		<br />
		<table style="width:800px;border:1px solid black;"><tr><td>
		<div id="graph" style="width:800px;height:300px;"><div>
		</td></tr></table>
		
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

<script language="JavaScript">

function draw(){
var x;
var i;
for (i=1;i<=nt[active_tab];i++){
x+="<option>"+document.getElementById("name"+active_tab+i).innerHTML+"</option>";
}
document.getElementById("toixos").innerHTML=x;

$.colorbox({inline:true, href:"#draw", width:"860px", height:"635px"});
drawit();
}

function drawit(){
	var t=document.getElementById("toixos").selectedIndex+1;
	var tl=document.getElementById("tl"+active_tab+t).innerHTML;
	var th=document.getElementById("th"+active_tab+t).innerHTML;
	document.getElementById("dims").innerHTML="Διαστάσεις τοίχου: "+tl+" x "+th;
	var dh=document.getElementById("dh"+active_tab+t).innerHTML;
	var yl=document.getElementById("yl"+active_tab+t).innerHTML;
	var yn=document.getElementById("yn"+active_tab+t).innerHTML;
	var id=document.getElementById("id"+active_tab+t).value;
	var yprec=document.getElementById("yprec"+active_tab+t).value;
	if (isNaN(parseFloat(yprec))){yprec="0";}
	var ans=document.getElementById("ans"+active_tab+t).value;
	var anrec="";
	var anw;
	var anh;
	var anx;
	var any;
	var anid="";
	for (var i=1;i<=ans;i++){
		anw=document.getElementById("anw"+active_tab+t+i).value;
		anh=document.getElementById("anh"+active_tab+t+i).value;
		anx=document.getElementById("anx"+active_tab+t+i).value;
		any=document.getElementById("any"+active_tab+t+i).value;
		anid+=document.getElementById("anid"+active_tab+t+i).value;
		if (i<ans){anid+="|";}
		anrec=anrec+anw+"|"+anh+"|"+anx+"|"+any;
		if (i<ans){anrec+="^";}
	}
	if (anid==""){anid="0";}
	document.getElementById('saveimg').innerHTML="<img src=\"./images/domika/save.png\"  width=\"35px\" height=\"35px\"  "+
	"title=\"αποθήκευση αλλαγών\" style=\"cursor:pointer;\" "+
	"onclick=\"savewall("+yn+","+id+","+ans+",'"+anid+"');\" />";

	yd=yprec;
	if (yn==0){yd="";}
	var gl=300*tl/th;
	var gh=300;
	if (gl>800){gl=800;gh=800*th/tl;}
	x="./includes/draw_wall.php?tl="+tl+"&th="+th+"&dh="+dh+"&yd="+yd+"&yl="+yl+"&id="+id+"&anrec="+anrec;
	document.getElementById('graph').innerHTML="<img src=\""+x+"\" height=\""+gh+"px\" width=\""+gl+"px\" ></img>";
	
	x="Αποστάσεις των στύλων από το αριστερό άκρο: ";
	if (yn==0){x="";}
	for (i=1;i<=yn;i++){
		x+="<input type=\"text\" id=\"yd"+i+"\" style=\"width:50px;\" onchange=\"set_ypost("+yn+","+yl+","+gl+","+tl+","+th+","+dh+","+gh+","+id+","+ans+");\" />&nbsp;";
	}
	var y1=yd.split("|");
	document.getElementById("ypost").innerHTML=x;
	for (i=1;i<=yn;i++){
		if (y1[i-1]==undefined){y1[i-1]="";}
		document.getElementById("yd"+i).value=y1[i-1];
	}
	x="Ανοίγματα (πλάτος, ύψος, x και y της κάτω αριστερής γωνίας) <br /><br />";
	if (ans==0){x="";}
	for (i=1;i<=ans;i++){
		anw=document.getElementById("anw"+active_tab+t+i).value;
		anh=document.getElementById("anh"+active_tab+t+i).value;
		anx=document.getElementById("anx"+active_tab+t+i).value;
		any=document.getElementById("any"+active_tab+t+i).value;
		x+="<input type=\"text\" id=\"anw"+i+"\" style=\"width:50px;\" onchange=\"set_ypost("+yn+","+yl+","+gl+","+tl+","+th+","+dh+","+gh+","+id+","+ans+");\" />&nbsp;";
		x+="<input type=\"text\" id=\"anh"+i+"\" style=\"width:50px;\" onchange=\"set_ypost("+yn+","+yl+","+gl+","+tl+","+th+","+dh+","+gh+","+id+","+ans+");\" />&nbsp;";
		x+="<input type=\"text\" id=\"anx"+i+"\" style=\"width:50px;\" onchange=\"set_ypost("+yn+","+yl+","+gl+","+tl+","+th+","+dh+","+gh+","+id+","+ans+");\" />&nbsp;";
		x+="<input type=\"text\" id=\"any"+i+"\" style=\"width:50px;\" onchange=\"set_ypost("+yn+","+yl+","+gl+","+tl+","+th+","+dh+","+gh+","+id+","+ans+");\" />&nbsp;";
		x+="<br />";
	}
	document.getElementById("anoig").innerHTML=x;
	for (i=1;i<=ans;i++){
		document.getElementById("anw"+i).value=document.getElementById("anw"+active_tab+t+i).value;
		document.getElementById("anh"+i).value=document.getElementById("anh"+active_tab+t+i).value;
		document.getElementById("anx"+i).value=document.getElementById("anx"+active_tab+t+i).value;
		document.getElementById("any"+i).value=document.getElementById("any"+active_tab+t+i).value;
	}
}


function set_ypost(yn,yl,gl,tl,th,dh,gh,id,ans){
	var yd="";
	for (i=1;i<=yn;i++){
		yd+=document.getElementById("yd"+i).value;
		if (i<yn){yd+="|";}
	}
	var anrec="";
	for (var i=1;i<=ans;i++){
		var anw=document.getElementById("anw"+i).value;
		var anh=document.getElementById("anh"+i).value;
		var anx=document.getElementById("anx"+i).value;
		var any=document.getElementById("any"+i).value;
		anrec=anrec+anw+"|"+anh+"|"+anx+"|"+any;
		if (i<ans){anrec+="^";}
	}
	
	var x="./includes/draw_wall.php?tl="+tl+"&th="+th+"&dh="+dh+"&yd="+yd+"&yl="+yl+"&id="+id+"&anrec="+anrec;
	document.getElementById('graph').innerHTML="<img src=\""+x+"\" height=\""+gh+"px\" width=\""+gl+"px\" ></img>";
}

function savewall(yn,id,ans,anid){

	var t=document.getElementById("toixos").selectedIndex+1;
	var yd=" ";
	for (i=1;i<=yn;i++){
		yd+=document.getElementById("yd"+i).value;
		if (i<yn){yd+="|";}
	}
	document.getElementById("yprec"+active_tab+t).value=yd;
	var anrec=" ";
	for (var i=1;i<=ans;i++){
		var anw=document.getElementById("anw"+i).value;
		document.getElementById("anw"+active_tab+t+i).value=anw;
		var anh=document.getElementById("anh"+i).value;
		document.getElementById("anh"+active_tab+t+i).value=anh;
		var anx=document.getElementById("anx"+i).value;
		document.getElementById("anx"+active_tab+t+i).value=anx;
		var any=document.getElementById("any"+i).value;
		document.getElementById("any"+active_tab+t+i).value=any;
		anrec=anrec+anw+"|"+anh+"|"+anx+"|"+any;
		if (i<ans){anrec+="^";}
	}
	
	var x="./includes/save_toixoi.php?yd="+yd+"&id="+id+"&anrec="+anrec+"&tab="+active_tab+"&anid="+anid;
	document.getElementById('graph').innerHTML="<img src=\""+x+"\" />";
//	$.fn.colorbox.close();
//	window.location=("kenak.php?page=3");
	drawit();
}


editn="";
editm="";
function editme(n,m){
editn=n;
editm=m;
document.getElementById("editbox").value=document.getElementById(n+m).innerHTML;
$.colorbox({inline:true,  href:"#editme", onComplete:function(){document.getElementById("editbox").focus();}});
}

function saveme(){
document.getElementById(editn+editm).innerHTML=document.getElementById("editbox").value;
var m=editm;
var x=document.getElementById("idzwnis"+m).innerHTML;
x=x+"|"+document.getElementById("name"+m).innerHTML;
x=x+"|"+document.getElementById("tl"+m).innerHTML;
x=x+"|"+document.getElementById("th"+m).innerHTML;
x=x+"|"+document.getElementById("tp"+m).innerHTML;
x=x+"|"+document.getElementById("tu"+m).innerHTML;
x=x+"|"+document.getElementById("tt"+m).innerHTML;
x=x+"|"+document.getElementById("td"+m).innerHTML;
x=x+"|"+document.getElementById("dh"+m).innerHTML;
x=x+"|"+document.getElementById("du"+m).innerHTML;
x=x+"|"+document.getElementById("dt"+m).innerHTML;
x=x+"|"+document.getElementById("yl"+m).innerHTML;
x=x+"|"+document.getElementById("yn"+m).innerHTML;
x=x+"|"+document.getElementById("yu"+m).innerHTML;
x=x+"|"+document.getElementById("yt"+m).innerHTML;
x=x+"|"+document.getElementById("sl"+m).innerHTML;
x=x+"|"+document.getElementById("sh"+m).innerHTML;
x=x+"|"+document.getElementById("su"+m).innerHTML;
x=x+"|"+document.getElementById("id"+m).value;
var m1;
if (m.toString().substr(0,1)=="1"){m1="b";}
if (m.toString().substr(0,1)=="2"){m1="a";}
if (m.toString().substr(0,1)=="3"){m1="n";}
if (m.toString().substr(0,1)=="4"){m1="d";}
x=x+"|"+m1;
x="./includes/save_toixoi1.php?rec="+x;
document.getElementById('graph').innerHTML="<img src=\""+x+"\" />";
$.fn.colorbox.close();
}
</script>




		<?php } ?>
		
		
		
		
		
		
		
		
		
		