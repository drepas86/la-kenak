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
		<?php	if ($sel_page["id"] == 2)	{ ?>
			<h2>ΚΕΝΑΚ - Αποθήκευση (γενικά)</h2>
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
					<li><a href="#tab-meletis">Στοιχεία Μελέτης</a></li>
					<li><a href="#tab-zwni">Στοιχεία ζώνης</a></li>
					<li><a href="#tab-xwroi">Χώροι κτιρίου</a></li>
					<li><a href="#tab-katakoryfa">Δάπεδο-Οροφές</a></li>
					<li><a href="#tab-thermo">Θερμογέφυρες</a></li>
					</ul>  
					
					
					
					
					<div id="tab-meletis" class="tabdiv"> 
					<h3>Ιδιοκτησία/Μελετητές</h3>
					<?php
					$kataskeyi_meletis_array = get_times_all("*", "kataskeyi_meletis");
					$kataskeyi_meletis_id = $kataskeyi_meletis_array[0]["id"];
					$kataskeyi_meletis_project = $kataskeyi_meletis_array[0]["project"];
					$kataskeyi_meletis_place = $kataskeyi_meletis_array[0]["place"];
					$kataskeyi_meletis_owner = $kataskeyi_meletis_array[0]["owner"];
					$kataskeyi_meletis_engs = $kataskeyi_meletis_array[0]["engs"];
					$kataskeyi_meletis_ownerstatus = $kataskeyi_meletis_array[0]["owner_status"];
					
					if ($kataskeyi_meletis_ownerstatus=="0"){$kataskeyi_meletis_ownerstatus="Δημόσιο";}
					if ($kataskeyi_meletis_ownerstatus=="1"){$kataskeyi_meletis_ownerstatus="Ιδιωτικό";}
					if ($kataskeyi_meletis_ownerstatus=="2"){$kataskeyi_meletis_ownerstatus="Δημόσιο ιδιωτικού ενδιαφέροντος";}
					if ($kataskeyi_meletis_ownerstatus=="3"){$kataskeyi_meletis_ownerstatus="Ιδιωτικό δημόσιου ενδιαφέροντος";}
					
					$kataskeyi_meletis_address = $kataskeyi_meletis_array[0]["address"];
					$kataskeyi_meletis_contact_type = $kataskeyi_meletis_array[0]["contact_type"];
					
					if ($kataskeyi_meletis_contact_type=="0"){$kataskeyi_meletis_contact_type="Ιδιοκτήτης";}
					if ($kataskeyi_meletis_contact_type=="1"){$kataskeyi_meletis_contact_type="Διαχειριστής";}
					if ($kataskeyi_meletis_contact_type=="2"){$kataskeyi_meletis_contact_type="Ενοικιαστής";}
					if ($kataskeyi_meletis_contact_type=="3"){$kataskeyi_meletis_contact_type="Τεχνικός υπεύθυνος";}
					if ($kataskeyi_meletis_contact_type=="4"){$kataskeyi_meletis_contact_type="Άλλο";}
					
					$kataskeyi_meletis_contact_name = $kataskeyi_meletis_array[0]["contact_name"];
					$kataskeyi_meletis_contact_tel  = $kataskeyi_meletis_array[0]["contact_tel"];
					$kataskeyi_meletis_contact_mail = $kataskeyi_meletis_array[0]["contact_mail"];
					$vasi = "prosthiki";
					?>
					<form action="kenak.php" method="post">
					<table border="1">
					<tr>
					<th> <div align="center">Έργο </div></th>
					<td><?=$kataskeyi_meletis_project;?></td>
					<td><input type="text" name="<?=$vasi."_project"?>" maxlength="200" size="35" /></td>
					</tr>
					<tr>
					<th> <div align="center">Θέση </div></th>
					<td><?=$kataskeyi_meletis_place;?></td>
					<td><input type="text" name="<?=$vasi."_place"?>" maxlength="200" size="35" /></td>
					</tr>
					<tr>
					<th> <div align="center">Διεύθυνση </div></th>
					<td><div align="center"><?=$kataskeyi_meletis_address;?></div></td>
					<td><input type="text" name="<?=$vasi."_address"?>" maxlength="200" size="35" /></td>
					</tr>
					<tr>
					<th> <div align="center">Ιδιοκτήτης </div></th>
					<td><div align="center"><?=$kataskeyi_meletis_owner;?></div></td>
					<td><input type="text" name="<?=$vasi."_owner"?>" maxlength="200" size="35" /></td>
					</tr>
					<tr>
					<th> <div align="center">Ιδιοκτησιακό καθεστώς </div></th>
					<td><div align="center"><?=$kataskeyi_meletis_ownerstatus;?></div></td>
					<td><select name="<?=$vasi . "_owner_status"?>" >
						<option value="0">Δημόσιο</option>
						<option value="1">Ιδιωτικό</option>
						<option value="2">Δημόσιο ιδιωτικού ενδιαφέροντος</option>
						<option value="3">Ιδιωτικό δημόσιου ενδιαφέροντος</option>
						</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Μελετητές </div></th>
					<td align="center"><?=$kataskeyi_meletis_engs;?></td>
					<td><input type="text" name="<?=$vasi."_engs"?>" maxlength="200" size="35" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_meletis"?>" value="Τροποποίηση στοιχείων ιδιοκτησίας" />
					</form>
					
					<h3>Υπεύθυνος επικοινωνίας</h3>
					<form action="kenak.php" method="post">
					<table border="1">
					<tr>
					<th> <div align="center">Είδος υπευθύνου </div></th>
					<td><?=$kataskeyi_meletis_contact_type;?></td>
					<td><select name="<?=$vasi."_contact_type"?>" >
						<option value="0">Ιδιοκτήτης</option>
						<option value="1">Διαχειριστής</option>
						<option value="2">Ενοικιαστής</option>
						<option value="3">Τεχνικός υπεύθυνος</option>
						<option value="4">Άλλο</option>
						</select>
					</td>
					</tr>
					<th> <div align="center">Ονοματεπώνυμο </div></th>
					<td><?=$kataskeyi_meletis_contact_name;?></td>
					<td><input type="text" name="<?=$vasi."_contact_name"?>" maxlength="200" size="35" /></td>
					</tr>
					<th> <div align="center">Τηλεφωνο </div></th>
					<td><?=$kataskeyi_meletis_contact_tel;?></td>
					<td><input type="text" name="<?=$vasi."_contact_tel"?>" maxlength="200" size="35" /></td>
					</tr>
					<th> <div align="center">Mail </div></th>
					<td><?=$kataskeyi_meletis_contact_mail;?></td>
					<td><input type="text" name="<?=$vasi."_contact_mail"?>" maxlength="200" size="35" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_meletis_contact"?>" value="Τροποποίηση στοιχείων υπευθύνου" />
					</form>
					
					<h3>Πολεοδομία</h3>
					
					<?php
					$kataskeyi_meletistopo_array = get_times_all("*", "kataskeyi_meletis_topo");
					$kataskeyi_meletistopo_sxedio = $kataskeyi_meletistopo_array[0]["sxedio"];
					$kataskeyi_meletistopo_odos = $kataskeyi_meletistopo_array[0]["odos"];
					$kataskeyi_meletistopo_apostaseis = $kataskeyi_meletistopo_array[0]["apostaseis"];
					$kataskeyi_meletistopo_klisi = $kataskeyi_meletistopo_array[0]["klisi"];
					$kataskeyi_meletistopo_pol_grafeio = $kataskeyi_meletistopo_array[0]["pol_grafeio"];
					$kataskeyi_meletistopo_pol_year = $kataskeyi_meletistopo_array[0]["pol_year"];
					$kataskeyi_meletistopo_pol_number = $kataskeyi_meletistopo_array[0]["pol_number"];
					$kataskeyi_meletistopo_pol_year_complete = $kataskeyi_meletistopo_array[0]["pol_year_complete"];
					$kataskeyi_meletistopo_pol_type = $kataskeyi_meletistopo_array[0]["pol_type"];
					
					if ($kataskeyi_meletistopo_pol_type=="0"){$kataskeyi_meletistopo_pol_type="Νέο";}
					if ($kataskeyi_meletistopo_pol_type=="1"){$kataskeyi_meletistopo_pol_type="Παλιό";}
					if ($kataskeyi_meletistopo_pol_type=="2"){$kataskeyi_meletistopo_pol_type="Ριζικά ανακαινιζόμενο";}
					
					$vasi = "prosthiki";
					?>
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<tr>
					<th> <div align="center">Πολεοδομικό γραφείο </div></th>
					<td><?=$kataskeyi_meletistopo_pol_grafeio;?></td>
					<td><input type="text" name="<?=$vasi."_pol_grafeio"?>" maxlength="200" size="35" /></td>
					</tr>
					<tr>
					<th> <div align="center">Έτος </div></th>
					<td><?=$kataskeyi_meletistopo_pol_year;?></td>
					<td><input type="text" name="<?=$vasi."_pol_year"?>" maxlength="200" size="35" /></td>
					</tr>
					<tr>
					<th> <div align="center">Αριθμός αδείας </div></th>
					<td><?=$kataskeyi_meletistopo_pol_number;?></td>
					<td><input type="text" name="<?=$vasi."_pol_number"?>" maxlength="200" size="35" /></td>
					</tr>
					<tr>
					<th> <div align="center">Έτος ολοκλήρωσης </div></th>
					<td><?=$kataskeyi_meletistopo_pol_year_complete;?></td>
					<td><input type="text" name="<?=$vasi."_pol_year_complete"?>" maxlength="200" size="35" /></td>
					</tr>
					<tr>
					<th> <div align="center">Τύπος </div></th>
					<td><?=$kataskeyi_meletistopo_pol_type;?></td>
					<td><select name="<?=$vasi."_pol_type"?>">
						<option value="0">Νέο</option>
						<option value="1">Παλαιό</option>
						<option value="2">Ριζικά ανακαινιζόμενο</option>
						</select>
					</td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_meletis_topo_pol"?>" value="Τροποποίηση στοιχείων πολεοδομίας" />
					</form>
					
					</div><!--/μελετης-->
					
					
					
					
					
					<div id="tab-zwni" class="tabdiv"> 
					<h3>Στοιχεία κλιματικής ζώνης</h3>
					
					<?php
					//Τραβάει τις τιμές από την βάση
					$kataskeyi_stoixeia_array = get_times_all("*", "kataskeyi_stoixeia");
					//Εκχωρεί σε μεταβλητή ανάλογα με τη στήλη
					$kataskeyi_stoixeia_zwni = $kataskeyi_stoixeia_array[0]["zwni"];
					//Ελέγχει ανάλογα με τη μεταβλητή και εκχωρεί ξανά με το όνομα
					if ($kataskeyi_stoixeia_zwni=="a"){$kataskeyi_stoixeia_zwni="Ζώνη Α";}
					if ($kataskeyi_stoixeia_zwni=="b"){$kataskeyi_stoixeia_zwni="Ζώνη Β";}
					if ($kataskeyi_stoixeia_zwni=="g"){$kataskeyi_stoixeia_zwni="Ζώνη Γ";}
					if ($kataskeyi_stoixeia_zwni=="d"){$kataskeyi_stoixeia_zwni="Ζώνη Δ";}
					
					$kataskeyi_stoixeia_climate_data = $kataskeyi_stoixeia_array[0]["climate_data"];
					$climate_data_array = get_times("place", "climate41", $kataskeyi_stoixeia_climate_data);
					$kataskeyi_stoixeia_climate_data = $climate_data_array[0]["place"];
					
					//Εκχωρεί σε μεταβλητή ανάλογα με τη στήλη
					$kataskeyi_stoixeia_xrisi = $kataskeyi_stoixeia_array[0]["xrisi"];
					//Εκχωρεί σε array το όνομα της γενικής χρήσης ανάλογα με το id της χρήσης
					$stoixeia_xrisi_array = get_times("gen_xrisi", "energy_conditions", $kataskeyi_stoixeia_xrisi);
					//Εκχωρεί σε array το όνομα της χρήσης ανάλογα με το id της χρήσης
					$stoixeia_xrisi_array1 = get_times("xrisi", "energy_conditions", $kataskeyi_stoixeia_xrisi);
					//Εκχωρεί στην πρώτη μεταβλητή τα 2 ονόματα αντικαθιστώντας το id.
					$kataskeyi_stoixeia_xrisi = $stoixeia_xrisi_array[0]["gen_xrisi"] . ', ' . $stoixeia_xrisi_array1[0]["xrisi"];
					
					$kataskeyi_stoixeia_nero_dikt = $kataskeyi_stoixeia_array[0]["nero_dikt"];
					$nero_dikt_array = get_times("place", "climate61", $kataskeyi_stoixeia_nero_dikt);
					$kataskeyi_stoixeia_nero_dikt = $nero_dikt_array[0]["place"];
					
					$kataskeyi_stoixeia_velt_klisi = $kataskeyi_stoixeia_array[0]["velt_klisi"];
					$velt_klisi_array = get_times("place", "climate44", $kataskeyi_stoixeia_velt_klisi);
					$kataskeyi_stoixeia_velt_klisi = $velt_klisi_array[0]["place"];
					
					$kataskeyi_stoixeia_iliakos = $kataskeyi_stoixeia_array[0]["iliakos"];
					$kataskeyi_stoixeia_anigmeni_thermo = $kataskeyi_stoixeia_array[0]["anigmeni_thermo"];
					$kataskeyi_stoixeia_aytomatismoi = $kataskeyi_stoixeia_array[0]["aytomatismoi"];
					if ($kataskeyi_stoixeia_aytomatismoi == 0){$kataskeyi_stoixeia_aytomatismoi="Τύπος Α";}
					if ($kataskeyi_stoixeia_aytomatismoi == 1){$kataskeyi_stoixeia_aytomatismoi="Τύπος Β";}
					if ($kataskeyi_stoixeia_aytomatismoi == 2){$kataskeyi_stoixeia_aytomatismoi="Τύπος Γ";}
					if ($kataskeyi_stoixeia_aytomatismoi == 3){$kataskeyi_stoixeia_aytomatismoi="Τύπος Δ";}
					
					$kataskeyi_stoixeia_kaminades = $kataskeyi_stoixeia_array[0]["kaminades"];
					$kataskeyi_stoixeia_eksaerismos = $kataskeyi_stoixeia_array[0]["eksaerismos"];
					$kataskeyi_stoixeia_anem_orofis = $kataskeyi_stoixeia_array[0]["anem_orofis"];
					
					$vasi = "prosthiki";
					$list1 = dropdown("SELECT place, id FROM climate31", "id", "place", $vasi."_climate_data");
					$list2 = dropdown("SELECT xrisi, id FROM energy_conditions", "id", "xrisi", $vasi."_xrisi");
					$list3 = dropdown("SELECT place, id FROM climate61", "id", "place", $vasi."_nero_dikt");
					$list4 = dropdown("SELECT place, id FROM climate44", "id", "place", $vasi."_velt_klisi");
					?>
					
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<tr>
					<th> <div align="center">Ζώνη </div></th>
					<td><?=$kataskeyi_stoixeia_zwni;?></td>
					<td><select name="<?=$vasi."_zwni"?>">
					<option value="a">Ζώνη Α</option>
					<option value="b">Ζώνη Β</option>
					<option value="g">Ζώνη Γ</option>
					<option value="d">Ζώνη Δ</option>
					</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Κλιματολογικά δεδομένα </div></th>
					<td><?=$kataskeyi_stoixeia_climate_data;?></td>
					<td><?=$list1?></td>
					</tr>
					<tr>
					<th> <div align="center">Χρήση κτηρίου </div></th>
					<td><?=$kataskeyi_stoixeia_xrisi;?></td>
					<td><?=$list2?></td>
					</tr>
					<tr>
					<th> <div align="center">Νερό δικτύου </div></th>
					<td><?=$kataskeyi_stoixeia_nero_dikt;?></td>
					<td><?=$list3?></td>
					</tr>
					<tr>
					<th> <div align="center">Βέλτιστη κλίση (βιβλιοθήκη) </div></th>
					<td><?=$kataskeyi_stoixeia_velt_klisi;?></td>
					<td><?=$list4?></td>
					</tr>
					<tr>
					<th> <div align="center">Επιφάνεια Ηλιακού (ΖΝΧ) </div></th>
					<td><?=$kataskeyi_stoixeia_iliakos;?></td>
					<td><input type="text" name="<?=$vasi."_iliakos"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_stoixeia"?>" value="Τροποποίηση στοιχείων ζώνης" />
					</form>
					
					
					<h3>Αυτοματισμοί/Διείσδυση αέρα/Δροσισμός</h3>
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<tr>
					<th> <div align="center">Ανηγμένη θερμοχωρητικότητα (KJ/m2.K) </div></th>
					<td><?=$kataskeyi_stoixeia_anigmeni_thermo;?></td>
					<td><select name="<?=$vasi."_anigmeni_thermo"?>">
					<option value="80">Πολύ ελαφριά κατασκευή (80 KJ/m2.K)</option>
					<option value="110">Ελαφριά κατασκευή (110 KJ/m2.K)</option>
					<option value="165">Μέτρια κατασκευή (165 KJ/m2.K)</option>
					<option value="260">Βαριά κατασκευή (260 KJ/m2.K)</option>
					<option value="370">Πολύ βαριά κατασκευή (370 KJ/m2.K)</option>
					</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Κατηγορία αυτοματισμών </div></th>
					<td><?=$kataskeyi_stoixeia_aytomatismoi;?></td>
					<td><select name="<?=$vasi."_aytomatismoi"?>">
					<option value="0">Τύπος Α</option>
					<option value="1">Τύπος Β</option>
					<option value="2">Τύπος Γ</option>
					<option value="3">Τύπος Δ</option>
					</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Καμινάδες </div></th>
					<td><?=$kataskeyi_stoixeia_kaminades;?></td>
					<td><input type="text" name="<?=$vasi."_kaminades"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Θυρίδες εξαερισμού </div></th>
					<td><?=$kataskeyi_stoixeia_eksaerismos;?></td>
					<td><input type="text" name="<?=$vasi."_eksaerismos"?>" maxlength="200" size="10" /></td>
					</tr>
					<tr>
					<th> <div align="center">Ανεμιστήρες οροφής </div></th>
					<td><?=$kataskeyi_stoixeia_anem_orofis;?></td>
					<td><input type="text" name="<?=$vasi."_anem_orofis"?>" maxlength="200" size="10" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_stoixeia_dros"?>" value="Τροποποίηση στοιχείων ζώνης" />
					</form>
					
					
					<h3>Τοπογραφία</h3>
					
					<?php
					$vasi = "prosthiki";
					?>
					<form name="frmMain" action="kenak.php" method="post">
					<table border="1">
					<tr>
					<th> <div align="center">Εντός/Εκτός σχεδίου </div></th>
					<td><?=$kataskeyi_meletistopo_sxedio;?></td>
					<td><select name="<?=$vasi."_sxedio"?>">
						<option value="εντός">Εντός</option>
						<option value="εκτός">Εκτός</option>
						</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Σύνδεση με παρακείμενη οδό </div></th>
					<td><?=$kataskeyi_meletistopo_odos;?></td>
					<td><select name="<?=$vasi."_odos"?>">
						<option value="αγροτική">αγροτική</option>
						<option value="δημοτική">δημοτική</option>
						<option value="κοινοτική">κοινοτική</option>
						<option value="επαρχιακή">επαρχιακή</option>
						<option value="επαρχιακή">εθνική</option>
						</select>
					</td>
					</tr>
					<tr>
					<th> <div align="center">Αποστάσεις από όρια (τεύχος)</div></th>
					<td><?=$kataskeyi_meletistopo_apostaseis;?> m</td>
					<td><input type="text" name="<?=$vasi."_apostaseis"?>" maxlength="200" size="20" /></td>
					</tr>
					<tr>
					<th> <div align="center">Βέλτιστη κλίση Φ/Β (τεύχος)</div></th>
					<td><?=$kataskeyi_meletistopo_klisi;?> deg</td>
					<td><input type="text" name="<?=$vasi."_klisi"?>" maxlength="200" size="20" /></td>
					</tr>
					</table>
					<input type="submit" name="<?=$vasi."_meletis_topo"?>" value="Τροποποίηση στοιχείων τοπογραφίας" />
					</form>
					
					
					</div><!--/zwni-->
					
					
					
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
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
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
					$vasi = "prosthiki_xwrwn";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						echo "<tr><th>Id</th>";
						echo "<th>Όνομα χώρου</th>";
						echo "<th>Μήκος</th>";
						echo "<th>Πλάτος</th>";
						echo "<th>Ύψος</th></tr>";
						echo "<tr><td></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_name\" required=\"required\" maxlength=\"200\" size=\"30\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_mikos\" required=\"required\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_platos\" required=\"required\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_ypsos\" required=\"required\" maxlength=\"10\" size=\"5\" /></td></tr></table>";
						echo "<input type=\"submit\" name=\"" . $vasi . "\" value=\"Προσθήκη χώρου\" />";
					?>
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
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
					<td><?=$objResult["name"];?></td>
					<td><div align="center"><?=$objResult["emvadon"];?></div></td>
					<td align="right"><?=$objResult["u"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="hidden" name="delete_daporo" value="Διαγραφή δαπέδων/οροφών">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<?php
					//προσθήκη στη βάση δεδομένων των δαπέδων/οροφών
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						?>
						<tr><th>Id</th>
						<th>Όνομα</th>
						<th>Εμβαδόν</th>
						<th>U<a class='iframe' href="./domika_kelyfos.php?page=1&min=1" onclick=iframe_oriz_u();><img src="./images/style/help.png" /></a></th></tr>
						<?php
						echo "<tr><td>1</td>";
						echo "<td>Δάπεδο επί εδάφους</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_dapedo_emv1\" required=\"required\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_dapedo_u1\" required=\"required\" maxlength=\"10\" size=\"5\" /></td></tr>";
						echo "<tr><td>2</td>";
						echo "<td>Δάπεδο επί μη θερμ. χώρου</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_dapedo_emv2\" required=\"required\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_dapedo_u2\" required=\"required\" maxlength=\"10\" size=\"5\" /></td></tr>";
						echo "<tr><td>3</td>";
						echo "<td>Οροφή με κεραμίδι</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_orofi_emv1\" required=\"required\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_orofi_u1\" required=\"required\" maxlength=\"10\" size=\"5\" /></td></tr>";
						echo "<tr><td>4</td>";
						echo "<td>Οροφή πλάκα</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_orofi_emv2\" required=\"required\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_orofi_u2\" required=\"required\" maxlength=\"10\" size=\"5\" /></td></tr></table>";
						echo "<input type=\"submit\" name=\"" . $vasi . "_daporo\" value=\"Τροποποίηση δαπέδων/οροφών\" />";
					?>
					</div><!--/tab-katakoryfa-->
					
					
					
					
					<div id="tab-thermo" class="tabdiv"> 
					<h3>Θερμογέφυρα δαπέδου</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_therm_dap";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
					<th> <div align="center">Θερμογέφυρα δαπέδου </div></th>
					<th> <div align="center">Περίμετρος </div></th>
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
					<td><?=$objResult["therm_dap"];?></td>
					<td><?=$objResult["perimetros"];?></td>
					<td align="center"><input type="checkbox" name="delcheck[]" id="delcheck<?=$i;?>" value="<?=$objResult["id"];?>"></td>
					</tr>
					<?
					}
					?>
					</table>
					<input type="hidden" name="delete_therm_dap" value="Διαγραφή Θερμογέφυρας δαπέδου">
					<input type="hidden" name="hdnCount" value="<?=$i;?>">
					</form>
					
					
					<?php
					//προσθήκη στη βάση δεδομένων των θερμογέφυρας δαπέδου
					$vasi = "prosthiki";
						echo "<table border=\"1\"><br/><form action=\"kenak.php\" method=\"post\">";
						echo "<tr><th>Id</th>";
						?>
						<th>Θερμογέφυρα δαπέδου <a class="dap" href="./images/thermo/d/d4.jpg" title="" onclick=get_thermo_dap();><img src="./images/style/help.png"/></a></th>
						<th>Περίμετρος</th></tr>
						<?php
						echo "<tr><td>1</td>";
						$thermo_dapedo1_drop = dropdown1("SELECT name, y FROM thermo_d", "y", "name");
						$thermo_dapedo2_drop = dropdown1("SELECT name, y FROM thermo_oe", "y", "name");
						$thermo_dapedo3_drop = dropdown1("SELECT name, y FROM thermo_ed", "y", "name");
						$thermo_dapedo4_drop = dropdown1("SELECT name, y FROM thermo_edp", "y", "name");
						$thermo_dapedo5_drop = dropdown1("SELECT name, y FROM thermo_de", "y", "name");
						$thermo_dapedo6_drop = dropdown1("SELECT name, y FROM thermo_dp", "y", "name");
						echo "<td><select name=\"prosthiki_thermo_dap\">" . $thermo_dapedo1_drop . $thermo_dapedo2_drop . $thermo_dapedo3_drop . $thermo_dapedo4_drop . $thermo_dapedo5_drop . $thermo_dapedo6_drop . "</select></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_perimetros\" maxlength=\"10\" size=\"5\" /></td></tr></table>";
						echo "<input type=\"submit\" name=\"" . $vasi . "_therm_dap\" value=\"Τροποποίηση θερμογέφυρας δαπέδου\" />";
					?>
					
					<br/><br/><br/><br/>
					<h3>Θερμογέφυρες εξωτερικών γωνιών</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_therm_eks";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
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
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
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
						echo "<tr><th>Id</th>";
						?>
						<th>Θερμογέφυρα εξωτερικής γωνίας <a class="eksg" href="./images/thermo/eksg/eksg1.jpg" title="" onclick=get_thermo_eksg();><img src="./images/style/help.png"/></a></th>
						<?php
						echo "<tr><td></td>";
						$thermo_eksw_drop = dropdown("SELECT name, y FROM thermo_eksg", "y", "name", $vasi."_thermo_drop");
						echo "<td>" . $thermo_eksw_drop . "</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_plithos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_ypsos\" maxlength=\"10\" size=\"5\" /></td></tr></table>";
						echo "<input type=\"submit\" name=\"" . $vasi . "_therm_eks\" value=\"Προσθήκη θερμογέφυρας εξ. γωνίας\" />";
					?>
					
					
					<br/><br/><br/><br/>
					<h3>Θερμογέφυρες εσωτερικών γωνιών</h3>
					<form name="frmMain" action="kenak.php" method="post" OnSubmit="return onDelete();">
					<?php
					$strSQL = "SELECT * FROM kataskeyi_therm_es";
					$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
					?>
					<table border="1">
					<tr>
					<th> <div align="center">Id</div></th>
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
					?>
					<tr>
					<td><div align="center"><?=$objResult["id"];?></div></td>
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
						<?php
						echo "<tr><td></td>";
						$thermo_esw_drop = dropdown("SELECT name, y FROM thermo_esg", "y", "name", $vasi."_thermo_drop");
						echo "<td>" . $thermo_esw_drop . "</td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_plithos\" maxlength=\"10\" size=\"5\" /></td>";
						echo "<td><input type=\"text\" name=\"" . $vasi . "_ypsos\" maxlength=\"10\" size=\"5\" /></td></tr></table>";
						echo "<input type=\"submit\" name=\"" . $vasi . "_therm_es\" value=\"Προσθήκη θερμογέφυρας εσ. γωνίας\" />";
					?>
					
					</div><!--/tab-thermo-->
					
					
				

					</div>
					
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών δαπέδου  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 65; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/d/d" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 26; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/oe/oe" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 16; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/ed/ed" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 25; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/edp/edp" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 13; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/de/de" . $i . ".jpg\" title=\"\"></a></p>";
		}
		for ($i = 1; $i <= 28; $i++) {
		echo "<p><a class=\"dap\" href=\"./images/thermo/dp/dp" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών εσωτερικών γωνιών  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 20; $i++) {
		echo "<p><a class=\"esg\" href=\"./images/thermo/esg/esg" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------>	
<!--  Κρυφό div class για βοήθεια στην επιλογή θερμογεφυρών εξωτερικών γωνιών  -->
		<div style='display:none'>
		<?php 
		for ($i = 2; $i <= 26; $i++) {
		echo "<p><a class=\"eksg\" href=\"./images/thermo/eksg/eksg" . $i . ".jpg\" title=\"\"></a></p>";
		}
		?>
		</div>
<!------------------------------------------------------------------------------------>
		<?php } ?>