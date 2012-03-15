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
<table width=100% id="maintable"><tr><td style="width:50%;vertical-align:middle;"><h2>ΚΕΝΑΚ - Θερμικές ζώνες</h2></td>
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
					<li><a href="#zwnes">Θερμικές ζώνες κτηρίου</a></li>
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
					<th> <div align="center">Όνομα ζώνης</div></th>
					<th> <div align="center">Χρήση στη ζώνη</div></th>
					<th> <div align="center">Έλεγχος θερμ. επαρκ. </div></th>
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
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["name"];?></td>
					<td><?=$xrisi;?></td>
					<td><div align="center"><?=$thermoeparkeia;?></div></td>
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
					<table border="1"><br/><form action="kenak.php" method="post">
					<tr><th>Id</th>
					<th>Όνομα ζώνης</th>
					<th>Χρήση στη ζώνη</th>
					<th>Έλεγχος θερμ. επαρκ.</th>
					<tr><td></td>
					<td><input type="text" name="<?=$vasi."name"?>" maxlength="200" size="30" /></td>
					<td><?=$listxrisi?></td>
					<td><div align="center"><input type="checkbox" value="1" name="<?=$vasi."thermoeparkeia"?>" maxlength="10" size="5" /></div></td></tr>
					</table>
					<input type="submit" name="<?=$vasi."zwnis"?>" value="Προσθήκη ζώνης" />
					


</div><!--/zwnes-->
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
	
