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
- Προσθήκη κώδικα στο adddel_an για επαναφορά εδώ μετά την προσθήκη     *
- ή διαγραφή ανοίγματος                                                 *
- Προσθήκη κώδικα για  επεξεργασία του πίνακα με άμεση αποθήκευση       *
-  των αλλαγών                                                          *
-                                                                       *
*************************************************************************
*/
?>
		<?php	if ($sel_page["id"] == 7)	{ 
	add_column_if_not_exist("kataskeyi_an_b", "x", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_b", "y", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_a", "x", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_a", "y", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_n", "x", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_n", "y", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_d", "x", "DECIMAL(7,5)");
	add_column_if_not_exist("kataskeyi_an_d", "y", "DECIMAL(7,5)");
		?>
<table width=100% id="maintable"><tr><td style="width:50%;vertical-align:middle;"><h2>ΚΕΝΑΚ - Κατακόρυφα διαφανή δομικά στοιχεία (Ανοίγματα)</h2></td>
<td style="vertical-align:middle;">
<img src="./images/domika/help.png"  width="40px" height="40px"  title="οδηγίες" style="cursor:pointer;" onclick=help_a(); />
</td>
</td></tr></table>
	
	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/window.png\"></img>";
	  </script>

<script language="JavaScript">

function help_a(){
$.colorbox({inline:true,  href:"#guide", width:"600px", height:"320px"});
}


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
	
function get_inlinetext(v){
$.colorbox({inline:true,  href:"#inline_text"+v});
}
function iframe_an_u(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"90%"});
}
function get_thermo_ak(){
$(".ak").colorbox({iframe:true, width:"690px", height:"90%"});
}
function get_thermo_lamda(){
$(".lamda").colorbox({iframe:true, width:"685px", height:"90%"});
}	
function getpsi(n,x,t){
$.fn.colorbox.close();
document.getElementById(t+"_thermo"+x).selectedIndex=n-1;
}
function get_ut(n,x,w,h){
$.fn.colorbox.close();
document.getElementById("u"+x).value=n;
document.getElementById("w"+x).value=w;
document.getElementById("h"+x).value=h;
}
function get_name(x){
var n=document.getElementById("t"+x).options[document.getElementById("t"+x).selectedIndex].text;
n+="- ";
n+=document.getElementById("e"+x).options[document.getElementById("e"+x).selectedIndex].text;
document.getElementById("n"+x).value=n;
}

function get_active(){
document.getElementById("tabvanilla").style.display="block";
}

</script>
<font color="green">Τα αδιαφανή ανοίγματα (όπως εξώπορτες, πόρτες μασίφ, κλπ) αν και βρίσκονται εδώ μεταφέρονται στα αδιαφανή δομικά στοιχεία κατά τον υπολογισμό</font>
			<div class="tab">
			<div id="tabvanilla" class="widget" style="display:none;">
					<ul class="tabnav">  
					<li><a href="#anb">Βόρεια</a></li>
					<li><a href="#ana">Ανατολικά</a></li>
					<li><a href="#ann">Νότια</a></li>
					<li><a href="#and">Δυτικά</a></li>
					</ul> 
<?php
$it[1]="b";
$dt[1]="Διαγραφή Βόρειου ανοίγματος";
$pt[1]="Προσθήκη Βόρειου ανοίγματος";
$it[2]="a";
$dt[2]="Διαγραφή Ανατολικού ανοίγματος";
$pt[2]="Προσθήκη Ανατολικού ανοίγματος";
$it[3]="n";
$dt[3]="Διαγραφή Νότιου ανοίγματος";
$pt[3]="Προσθήκη Νότιου ανοίγματος";
$it[4]="d";
$dt[4]="Διαγραφή Δυτικού ανοίγματος";
$pt[4]="Προσθήκη Δυτικού ανοίγματος";

for ($j=1;$j<=4;$j++){
?>
					
			<div id="an<?=$it[$j];?>" class="tabdiv"> 
					<form name="frmMain<?=$j;?>" id="frmMain<?=$j;?>" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_an_" . $it[$j];
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1" id="domika">
					<tr>
					<th> Id</th>
					<th> Id τοίχου</th>
					<th> Όνομα ανοίγματος</th>
					<th> Μήκος ανοίγματος</th>
					<th> Ύψος ανοίγματος</th>
					<th> U ανοίγματος</th>
					<th> Είδος ανοίγματος</th>
					<th> Αερισμός ανοίγματος</th>
					<th> Ψ Λαμπάς</th>
					<th> Ψ Ανωκάσι Κατωκάσι</th>
					<th> 
					<input name="CheckAll<?=$it[$j];?>" id="CheckAll<?=$it[$j];?>" type="checkbox" value="Y" onClick="ClickCheckAll(this,<?=$j;?>);">
					</th>
					</tr>
					<?php
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					$name_toixoy_array = get_times("name", "kataskeyi_t_".$it[$j], $objResult["id_toixoy"]);
					$name_toixoy = $name_toixoy_array[0]["name"];
					?>
					<tr>
<!--				<td><?=$objResult["id"];?></td> -->
					<input type="hidden" id="id<?=$j;?><?=$i;?>" value="<?=$objResult["id"];?>">
					<td><?=$i;?></td>
					<td><?=$name_toixoy;?></td>
					<td id="name<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("name",<?=$j;?><?=$i;?>); ><?=$objResult["name"];?></td>
					<td id="am<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("am",<?=$j;?><?=$i;?>); ><?=number_format($objResult["anoig_mikos"],2,".",",");?></td>
					<td id="ay<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("ay",<?=$j;?><?=$i;?>); ><?=number_format($objResult["anoig_ypsos"],2,".",",");?></td>
					<td id="au<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("au",<?=$j;?><?=$i;?>); ><?=number_format($objResult["anoig_u"],2,".",",");?></td>
					<td id="ae<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("ae",<?=$j;?><?=$i;?>); ><?=number_format($objResult["anoig_eidos"],0,".",",");?></td>
					<td id="aa<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("aa",<?=$j;?><?=$i;?>); ><?=number_format($objResult["anoig_aerismos"],2,".",",");?></td>
					<td id="al<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("al",<?=$j;?><?=$i;?>); ><?=number_format($objResult["anoig_lampas"],2,".",",");?></td>
					<td id="ac<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("ac",<?=$j;?><?=$i;?>); ><?=number_format($objResult["anoig_ankat"],2,".",",");?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$j;?><?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?php
					}
					?>
					</table>
					<table id="domika"><tr><td style="width:100%;">
					<input type="submit" name="delete_an<?=$it[$j];?>" value="<?=$dt[$j];?>" style="float:right;"></td></tr></table>
					<input type="hidden" name="hdnCount<?=$j;?>" value="<?=$i;?>">
					</form>
					<br/><br/>
					<form name="frmAdd<?=$j;?>" id="frmAdd<?=$j;?>" action="kenak.php" method="post">
					<?php
					//προσθήκη στη βάση δεδομένων των στοιχείων
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/>";
						?>
						<tr>
						<th>Id τοίχου</th>
						<th>Όνομα<br/><a class='inline' href="#inline_content1" onclick=get_inlinetext(1);><img src="./images/style/help.png"/></a></th>
						<th>Μήκος<br/><a class='inline' href="#inline_content2" onclick=get_inlinetext(2);><img src="./images/style/help.png"/></a></th>
						<th>Ύψος<br/><a class='inline' href="#inline_content3" onclick=get_inlinetext(3);><img src="./images/style/help.png"/></a></th>
						<th>U<br/><a class='iframe' href="./domika_kelyfos.php?page=2&min=1&p=<?=$j;?>#tab-an2" onclick=iframe_an_u();><img src="./images/style/help.png" /></a></th>
						<th>Είδος<br/><a class='inline' href="#inline_content4" onclick=get_inlinetext(4);><img src="./images/style/help.png"/></a></th>
						<th>Αερισμός<br/><a class='inline' href="#inline_content5" onclick=get_inlinetext(5);><img src="./images/style/help.png"/></a></th>
						<th>Ψ <br/>Λαμπάς<br/><a class="lamda" href="./includes/kenak_help4.php?t=l&p=<?=$j;?>" title="" onclick=get_thermo_lamda();><img src="./images/style/help.png"/></a></th>
						<th>Ψ <br/>Ανωκάσι κατωκάσι<br/><a class="ak" href="./includes/kenak_help5.php?t=a&p=<?=$j;?>" title="" onclick=get_thermo_ak();><img src="./images/style/help.png"/></a></th></tr/>
						<?php
						echo "<tr>";
						$id_toixoy = dropdown1("SELECT id, name FROM kataskeyi_t_". $it[$j], "id", "name");	
						echo "<td><select name=\"" . $vasi . "_id_toixoy\" id=\"t".$j."\" onchange=get_name(".$j.");>" . $id_toixoy . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_name\" id=\"n".$j."\" maxlength=\"50\" size=\"10\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_anoig_mikos\" id=\"w".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_anoig_ypsos\" id=\"h".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_anoig_u\" id=\"u".$j."\" maxlength=\"10\" size=\"5\" /></td>";
						$anoig_eidos = "<option value=\"\" selected=\"selected\"></option>
						<option value=\"1\">Αδιαφανής πόρτα</option>
						<option value=\"2\">Συρόμενο παράθυρο</option>
						<option value=\"3\">Ανοιγόμενο παράθυρο</option>
						<option value=\"4\">Επάλληλο παράθυρο</option>
						<option value=\"5\">Συρόμενη πόρτα απλή</option>
						<option value=\"6\">Συρόμενη πόρτα διπλή</option>
						<option value=\"7\">Ανοιγόμενη πόρτα μονή</option>
						<option value=\"8\">Ανοιγόμενη πόρτα διπλή</option>
						<option value=\"9\">Επάλληλη πόρτα</option>";
						echo "<td><select name=\"" . $vasi . "_anoig_eidos\" id=\"e".$j."\" onchange=get_name(".$j."); >" . $anoig_eidos . "</select></td>";
						$anoig_aer = "<option value=\"\" selected=\"selected\"></option>
								<option value=\"15.1\">Παράθυρο με ξύλινο πλαίσιο: 15,1</option>
								<option value=\"12.5\">Παράθυρο με ξύλινο πλαίσιο: 12,5</option>
								<option value=\"10\">Παράθυρο με ξύλινο πλαίσιο: 10,0</option>
								<option value=\"11.8\">Πόρτα με ξύλινο πλαίσιο: 11,8</option>
								<option value=\"9.8\">Πόρτα με ξύλινο πλαίσιο: 9,8</option>
								<option value=\"7.9\">Πόρτα με ξύλινο πλαίσιο: 7,9</option>
								<option value=\"8.7\">Παράθυρο με συνθ πλαίσιο: 8,7</option>
								<option value=\"6.8\">Παράθυρο με συνθ πλαίσιο: 6,8</option>
								<option value=\"6.2\">Παράθυρο με συνθό πλαίσιο: 6,2</option>
								<option value=\"7.4\">Πόρτα με συνθ πλαίσιο: 7,4</option>
								<option value=\"5.3\">Πόρτα με συνθ πλαίσιο: 5,3</option>
								<option value=\"4.8\">Πόρτα με συνθ πλαίσιο: 4,8</option>";	
						echo "<td><select name=\"" . $vasi . "_anoig_aerismos\"/>" . $anoig_aer . "</select></td>";
						$thermo_l = dropdown1("SELECT name, y FROM thermo_l", "y", "name");	
						echo "<td><select name=\"" . $vasi . "_anoig_lampas\"  id=\"l_thermo".$j."\" />" . $thermo_l . "</select></td>";
						$thermo_ak = dropdown1("SELECT name, y FROM thermo_ak", "y", "name");
						echo "<td><select name=\"" . $vasi . "_anoig_ankat\" id=\"a_thermo".$j."\"/>" . $thermo_ak . "</select></td></tr></table>";

						echo "<input type=\"submit\" name=\"" . $vasi . "_an" . $it[$j] . "\" value=\"" . $pt[$j] . "\" />";
					?>
					</form>
			</div>

<?php } ?>
</div></div>
<!------------------------------------------------------------------------------------>	
<!--         Κρυφό div class  για βοήθεια στην επιλογή θερμογεφυρών AK              -->
		<div style='display:none'>
		<?php
		for ($i = 5; $i <= 21; $i++) {
		echo "<p><a class=\"ak\" href=\"./images/thermo/ak/ak" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>	
<!--         Κρυφό div class  για βοήθεια στην επιλογή θερμογεφυρών Λ               -->
		<div style='display:none'>
		<?php
		for ($i = 5; $i <= 15; $i++) {
		echo "<p><a class=\"lamda\" href=\"./images/thermo/l/l" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στην επιλογή ονόματος           -->
		<div style='display:none'><div id='inline_text1' style='padding:10px; background:#ebf9c9;'>
		Το όνομα του ανοίγματος θα μπορούσε να είναι χαρακτηριστικό του τοίχου που ανήκει αυτό <br/> μαζί με την περιγραφή του. 
		<br/>πχ (ΙΣ-Β1-1 = Ισόγειο Βόρεια Αριθμός τοίχου 1, Αριθμός ανοίγματος 1) + Περιγραφή.
		</div></div>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στην επιλογή μήκους           -->
		<div style='display:none'><div id='inline_text2' style='padding:10px; background:#ebf9c9;'>
		Η οριζόντια διάσταση του ανοίγματος (πάνω / κάτω)
		</div></div>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στην επιλογή μήκους           -->
		<div style='display:none'><div id='inline_text3' style='padding:10px; background:#ebf9c9;'>
		Η κατακόρυφη διάσταση του ανοίγματος (αριστερά / δεξιά)
		</div></div>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στην επιλογή είδους           -->
		<div style='display:none'><div id='inline_text4' style='padding:10px; background:#ebf9c9;'>
		Επιλογή του είδους του ανοίγματος. Εαν το άνοιγμα είναι αδιαφανές (πχ πόρτα μασιφ) τότε
		<br/> υπολογίζεται ξεχωριστά από τα υπόλοιπα ώστε να προστίθεται στα αδιαφανή στοιχεία της κατασκευής.
		<br/> Έτσι στο φύλλο αποτελεσμάτων (.xlsx) βρίσκεται στο φύλλο των αδιαφανών.
		</div></div>
<!------------------------------------------------------------------------------------>	
<!--        Κρυφό div για βοήθεια στην επιλογή αερισμού           -->
		<div style='display:none'><div id='inline_text5' style='padding:10px; background:#ebf9c9;'>
		Επιλογή του αερισμού του ανοίγματος. Ο συντελεστής με τον οποίο θα υπολογιστεί ο αερισμός για το άνοιγμα.
		<br/> Στην εμφάνιση των υπολογισμών υπεισέρχεται στο συνολικό αερισμό της κατασκευής και ελέγχεται αν τηρείται 
		<br/> ο ελάχιστον σύμφωνα με την ΤΟΤΕΕ.
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για επεξεργασία των τιμών του πίνακα                          -->
		<div style='display:none'><div id='editme' style='padding:10px; background:#ebf9c9;'>
		<table ><tr><td>
		<input type="text" id="editbox">&nbsp;
		<input type="button" value="Αποθήκευση" onclick=saveme(); >
		</td></tr></table>
		<div id="phpout" style="display:none;"><div>
		</div></div>
<!------------------------------------------------------------------------------------>
<!--        Κρυφό div για βοήθεια                                                   -->
		<div style='display:none'><div id='guide' style='padding:10px; background:#ebf9c9;'>
		<b>Ανοίγματα</b><hr>
		Στη σελίδα αυτή γίνεται η εισαγωγή των ανοιγμάτων του κτιρίου.
		Με κλικ στα εικονίδια <img src ="./images/style/help.png" style="vertical-align:middle;" /> δίνονται οδηγίες για τον τύπο του κάθε δεδομένου.<br /><br />
		Επί πλέον, για τον συντελεστή U ανοίγει νέο παράθυρο με το φύλλο υπολογισμού του, όπου με κλικ στην τιμή του U που υπολογίστηκε, 
		μεταφέρονται τα δεδομένα στη παρούσα  καρτέλα.<br /><br />
		Αντίστοιχα για τον συντελεστή θερμογέφυρας, η επιλογή μπορεί να γίνει με επιλογή του είδους της από τις εικόνες που εμφανίζονται 
		στο σχετικό παράθυρο.<hr>
		Αν κατά την εισαγωγή των στοιχείων ενός ανοίγματος έγινε κάπου λάθος, μπορεί να διορθωθεί με κλικ στη λάθος τιμή και 
		συμπλήρωση της σωστής στο παράθυρο που ανοίγει.<hr>
		Θεωρείται οτι τα ανοίγματα είναι της εξής μορφής και τα οποία αφαιρούνται από τη συνολική όψη για την εύρεση της επιφάνειας του δρομικού:<br/>
		<img src="images/style/help_an.png">
		</div></div>
<!------------------------------------------------------------------------------------>

<script language="JavaScript">

editn="";
editm="";
function editme(n,m){
document.getElementById("editbox").style.width="50px";
if (n=='name'){document.getElementById("editbox").style.width="200px";}
document.getElementById("editbox").value=document.getElementById(n+m).innerHTML;
$.colorbox({inline:true,  href:"#editme", onComplete:function(){document.getElementById("editbox").focus();}});
editn=n;
editm=m;
}

function saveme(){
document.getElementById(editn+editm).innerHTML=document.getElementById("editbox").value;
var m=editm;
var x=document.getElementById("name"+m).innerHTML;
x=x+"|"+document.getElementById("am"+m).innerHTML;
x=x+"|"+document.getElementById("ay"+m).innerHTML;
x=x+"|"+document.getElementById("au"+m).innerHTML;
x=x+"|"+document.getElementById("ae"+m).innerHTML;
x=x+"|"+document.getElementById("aa"+m).innerHTML;
x=x+"|"+document.getElementById("al"+m).innerHTML;
x=x+"|"+document.getElementById("ac"+m).innerHTML;
x=x+"|"+document.getElementById("id"+m).value;
var m1;
if (m.toString().substr(0,1)=="1"){m1="b";}
if (m.toString().substr(0,1)=="2"){m1="a";}
if (m.toString().substr(0,1)=="3"){m1="n";}
if (m.toString().substr(0,1)=="4"){m1="d";}
x=x+"|"+m1;
x="./includes/save_anoigmata.php?rec="+x;
document.getElementById('phpout').innerHTML="<img src=\""+x+"\" />";
$.fn.colorbox.close();
}

</script>

<?php } ?>