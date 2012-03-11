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
- Προσθήκη κώδικα στο adddel_skiaseis για επαναφορά εδώ μετά την        *
- προσθήκη ή διαγραφή σκίασης                                           *
- Προσθήκη κώδικα για  επεξεργασία του πίνακα με άμεση αποθήκευση       *
- των αλλαγών                                                           *
-                                                                       *
*************************************************************************
*/
?>
		<?php	if ($sel_page["id"] == 8)	{ ?>
<table width=100% id="maintable"><tr><td style="width:50%;vertical-align:middle;"><h2>ΚΕΝΑΚ - Σκιάσεις Ανοιγμάτων</h2></td>
<td style="vertical-align:middle;">
<img src="./images/domika/help.png"  width="40px" height="40px"  title="οδηγίες" style="cursor:pointer;" onclick=help_sk(); />
</td>
</td></tr></table>

	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/window.png\"></img>";
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
	
function iframe_sk(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"90%"});
}
</script>

			
			<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#sk_an_b">Σκιάσεις Βόρεια</a></li>
					<li><a href="#sk_an_a">Σκιάσεις Ανατολικά</a></li>
					<li><a href="#sk_an_n">Σκιάσεις Νότια</a></li>
					<li><a href="#sk_an_d">Σκιάσεις Δυτικά</a></li>
					</ul> 
<?php
$it[1]="b";
$dt[1]="Διαγραφή Σκίασης Βόρειου ανοίγματος";
$pt[1]="Προσθήκη Σκίασης Βόρειου ανοίγματος";
$it[2]="a";
$dt[2]="Διαγραφή Σκίασης Ανατολικού ανοίγματος";
$pt[2]="Προσθήκη Σκίασης Ανατολικού ανοίγματος";
$it[3]="n";
$dt[3]="Διαγραφή Σκίασης Νότιου ανοίγματος";
$pt[3]="Προσθήκη Σκίασης Νότιου ανοίγματος";
$it[4]="d";
$dt[4]="Διαγραφή Σκίασης Δυτικού ανοίγματος";
$pt[4]="Προσθήκη Σκίασης Δυτικού ανοίγματος";

for ($j=1;$j<=4;$j++){
?>
					
					<div id="sk_an_<?=$it[$j];?>" class="tabdiv"> 
					<form name="frmMain<?=$j;?>" id="frmMain<?=$j;?>" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_".$it[$j];
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1" id="domika">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Id Ανοίγματος</div></th>
					<th> <div align="center">F_hor_h</div></th>
					<th> <div align="center">F_hor_c</div></th>
					<th> <div align="center">F_ov_h</div></th>
					<th> <div align="center">F_ov_c</div></th>
					<th> <div align="center">F_fin_h</div></th>
					<th> <div align="center">F_fin_c</div></th>
					<th> <div align="center">
					<input name="CheckAll<?=$it[$j];?>"  id="CheckAll<?=$it[$j];?>" type="checkbox" value="Y" onClick="ClickCheckAll(this,<?=$j;?>);">
					</div></th>
					</tr>
					<?php
					$i = 0;
					while($objResult = mysql_fetch_array($objQuery))
					{
					$i++;
					?>
					<input type="hidden" id="id<?=$j;?><?=$i;?>" value="<?=$objResult["id"];?>">
					<tr>
<!--					<td><div align="center"><?=$objResult["id"];?></div></td> -->
					<td><div align="center"><?=$i;?></div></td>
					<td><?=$objResult["id_an"];?></td>
					<td id="f1<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("f1",<?=$j;?><?=$i;?>); ><?=number_format($objResult["f_hor_h"],3,".",",");?></td>
					<td id="f2<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("f2",<?=$j;?><?=$i;?>); ><?=number_format($objResult["f_hor_c"],3,".",",");?></td>
					<td id="f3<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("f3",<?=$j;?><?=$i;?>); ><?=number_format($objResult["f_ov_h"],3,".",",");?></td>
					<td id="f4<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("f4",<?=$j;?><?=$i;?>); ><?=number_format($objResult["f_ov_c"],3,".",",");?></td>
					<td id="f5<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("f5",<?=$j;?><?=$i;?>); ><?=number_format($objResult["f_fin_h"],3,".",",");?></td>
					<td id="f6<?=$j;?><?=$i;?>" style="cursor:pointer;" onclick=editme("f6",<?=$j;?><?=$i;?>); ><?=number_format($objResult["f_fin_c"],3,".",",");?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$j;?><?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?php
					}
					?>
					</table>
					<input type="submit" name="delete_sk_an_<?=$it[$j];?>" value="<?=$dt[$j];?>">
					<input type="hidden" name="hdnCount<?=$j;?>" value="<?=$i;?>">
					</form>
					<br/><br/>
					<form name="frmAdd<?=$j;?>" id="frmAdd<?=$j;?>" action="kenak.php" method="post">
					<?php
					//προσθήκη στη βάση δεδομένων των στοιχείων
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/>";
						?>
						<th>Άνοιγμα</th>
						<th>F_hor_h<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_hor_c<br/><a class='iframe' href="./index_skiaseis.php?page=25&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_h<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_ov_c<br/><a class='iframe' href="./index_skiaseis.php?page=26&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_h<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<th>F_fin_c<br/><a class='iframe' href="./index_skiaseis.php?page=23&min=1" onclick=iframe_sk();><img src="./images/style/help.png" /></a></th>
						<?php
						echo "<tr>";
						$id_an = dropdown1("SELECT id, name FROM kataskeyi_an_b", "id", "name");		
						echo "<td><select name=\"" . $vasi . "_id_an\"/>" . $id_an . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_h_an\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_hor_c_an\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_h_an\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_ov_c_an\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_h_an\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_f_fin_c_an\" maxlength=\"10\" size=\"5\" /></td>";
						echo "</tr></table>";

						echo "<input type=\"submit\" name=\"" . $vasi . "_sk_an_" . $it[$j] . "\" value=\"".$pt[$j]."\" />";
					?>
					</form>
			</div>

<?php } ?>
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
		<b>Σκιάσεις Ανοιγμάτων</b><hr>
		Στη σελίδα αυτή γίνεται η εισαγωγή των σκιάσεων των ανοιγμάτων. 
		Με κλικ στα εικονίδια <img src ="./images/style/help.png" style="vertical-align:middle;" /> ανοίγουν σε νέο παράθυρο οι σελίδες υπολογισμών
		των σκιάσεων.<br /><br /><hr>
		Αν κατά την εισαγωγή των στοιχείων μιας σκίασης έγινε κάπου λάθος, μπορεί να διορθωθεί με κλικ στη λάθος τιμή και 
		συμπλήρωση της σωστής στο παράθυρο που ανοίγει.
		</div></div>
<!------------------------------------------------------------------------------------>

<script language="JavaScript">

function help_sk(){
$.colorbox({inline:true,  href:"#guide", width:"500px", height:"250px"});
}


editn="";
editm="";
function editme(n,m){
document.getElementById("editbox").style.width="50px";
document.getElementById("editbox").value=document.getElementById(n+m).innerHTML;
$.colorbox({inline:true,  href:"#editme", onComplete:function(){document.getElementById("editbox").focus();}});
editn=n;
editm=m;
}

function saveme(){
document.getElementById(editn+editm).innerHTML=document.getElementById("editbox").value;
var m=editm;
var x=document.getElementById("f1"+m).innerHTML;
x=x+"|"+document.getElementById("f2"+m).innerHTML;
x=x+"|"+document.getElementById("f3"+m).innerHTML;
x=x+"|"+document.getElementById("f4"+m).innerHTML;
x=x+"|"+document.getElementById("f5"+m).innerHTML;
x=x+"|"+document.getElementById("f6"+m).innerHTML;
x=x+"|"+document.getElementById("id"+m).value;
var m1;
if (m.toString().substr(0,1)=="1"){m1="b";}
if (m.toString().substr(0,1)=="2"){m1="a";}
if (m.toString().substr(0,1)=="3"){m1="n";}
if (m.toString().substr(0,1)=="4"){m1="d";}
x=x+"|"+m1;
x="./includes/save_sk_an.php?rec="+x;
document.getElementById('phpout').innerHTML="<img src=\""+x+"\" />";
$.fn.colorbox.close();
}

</script>










<?php } ?>