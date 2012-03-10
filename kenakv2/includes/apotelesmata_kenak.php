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
	//ΔΗΛΩΣΗ ΑΡΙΘΜΟΥ ΤΟΙΧΩΝ ΚΑΙ ΑΝΟΙΓΜΑΤΩΝ ΑΝΑ ΠΛΕΥΡΑ.
	$t_boreia = 5; //αριθμός τοίχων βόρεια
	$anoig_t_boreia = 5; //αριθμός ανοιγμάτων βόρεια ανά τοίχο
	$t_anatolika = 5; //αριθμός τοίχων ανατολικά
	$anoig_t_anatolika = 5; //αριθμός ανοιγμάτων ανατολικά ανά τοίχο
	$t_notia = 5; //αριθμός τοίχων νότια
	$anoig_t_notia = 5; //αριθμός ανοιγμάτων νότια ανά τοίχο
	$t_dytika = 5; //αριθμός τοίχων δυτικά
	$anoig_t_dytika = 5; //αριθμός ανοιγμάτων δυτικά ανά τοίχο

	include_once("includes/form_functions.php");
	
	// Υποβλήθηκε η πρώτη φόρμα
	if (isset($_POST['submit1'])) { // έλεγχος υποβολής.
		$errors = array();

		// υποτυπώδης έλεγχος δεδομένων
		$required_fields = array('mikos1', 'drop_xrisi');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('mikos1' => 30, 'drop_xrisi' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));
		
		//stantar times (σύνολο μεταβλητών 14)
		$drop_xrisi = $_POST['drop_xrisi'];
		$epif_iliakoy = $_POST['epif_iliakoy'];
		$zwni = $_POST['zwni'];
		$dapedo_embadon1 = $_POST['dapedo_embadon1'];
		$dapedo_u1 = $_POST['dapedo_u1'];
		$dapedo_embadon2 = $_POST['dapedo_embadon2'];
		$dapedo_u2 = $_POST['dapedo_u2'];
		$orofi_embadon1 = $_POST['orofi_embadon1'];
		$orofi_u1 = $_POST['orofi_u1'];
		$orofi_embadon2 = $_POST['orofi_embadon2'];
		$orofi_u2 = $_POST['orofi_u2'];
		$drop_nero_diktyoy = $_POST['drop_nero_diktyoy'];
		$drop_climate = $_POST['drop_climate'];
		$drop_velt_klisi = $_POST['drop_velt_klisi'];
		$thermo_dapedo_drop = $_POST['thermo_dapedo_drop'];
		
		//Υπολογισμοί U*A δαπέδων - οροφών
		$dapedo_ua1 = $dapedo_embadon1 * $dapedo_u1;
		$dapedo_ua2 = $dapedo_embadon2 * $dapedo_u2;
		$dapedo_ua = $dapedo_ua1*0.5 + $dapedo_ua2*0.5;
		$orofi_ua1 = $orofi_embadon1 * $orofi_u1;
		$orofi_ua2 = $orofi_embadon2 * $orofi_u2;
		$orofi_ua = $orofi_ua1 + $orofi_ua2;
		
		//Υπολογισμοί θερμογεφυρών γωνιών
		for ($i = 1; $i <= 5; $i++) {
		${"thermo_esw_gwnia_p".$i} = $_POST["thermo_esw_gwnia_p".$i];
		${"thermo_esw_gwnia_ypsos".$i} = $_POST["thermo_esw_gwnia_ypsos".$i];
		${"thermo_esw_drop".$i} = $_POST["thermo_esw_drop".$i];
		${"thermo_eksw_gwnia_p".$i} = $_POST["thermo_eksw_gwnia_p".$i];
		${"thermo_eksw_gwnia_ypsos".$i} = $_POST["thermo_eksw_gwnia_ypsos".$i];
		${"thermo_eksw_drop".$i} = $_POST["thermo_eksw_drop".$i];
		
		${"thermo_esw_gwnia_ua".$i} = ${"thermo_esw_gwnia_p".$i} * ${"thermo_esw_gwnia_ypsos".$i} * ${"thermo_esw_drop".$i};
		$thermo_esw_gwnia_ua += ${"thermo_esw_gwnia_ua".$i};
		${"thermo_eksw_gwnia_ua".$i} = ${"thermo_eksw_gwnia_p".$i} * ${"thermo_eksw_gwnia_ypsos".$i} * ${"thermo_eksw_drop".$i};
		$thermo_eksw_gwnia_ua += ${"thermo_eksw_gwnia_ua".$i};
		}
		
		$thermogefyres_gwnia = $thermo_esw_gwnia_ua + $thermo_eksw_gwnia_ua;
		


		//τιμες που ερχονται με i ή j (σύνολο μεταβλητών 10χ3=30)
		for ($i = 1; $i <= 10; $i++) {
		${"mikos".$i} = $_POST["mikos".$i];
		${"platos".$i} = $_POST["platos".$i];
		${"ypsos".$i} = $_POST["ypsos".$i];
		${"embadon".$i} = ${"mikos".$i} * ${"platos".$i};
		${"ogkos".$i} = ${"mikos".$i} * ${"platos".$i} * ${"ypsos".$i};
		$synoliko_embadon += ${"embadon".$i};
		$synolikos_ogkos += ${"ogkos".$i};
		}
		
		
		
		//στοιχεία βόρειας πλευράς (σύνολο μεταβλητών 8χ6=48 + 6χ4χ4=72)
		for ($i = 1; $i <= $t_boreia; $i++) {
		
		${"mikos_b".$i} = $_POST["mikos_b".$i];
		${"ypsos_b".$i} = $_POST["ypsos_b".$i];
		${"paxos_b".$i} = $_POST["paxos_b".$i];
		${"dokos_b".$i} = $_POST["dokos_b".$i];
		${"ypostil_b".$i} = $_POST["ypostil_b".$i];
		${"u_b".$i} = $_POST["u_b".$i];
		${"mikos_syr_b".$i} = $_POST["mikos_syr_b".$i];
		${"ypsos_syr_b".$i} = $_POST["ypsos_syr_b".$i];
		${"u_syr_b".$i} = $_POST["u_syr_b".$i];
		${"u_dok_b".$i} = $_POST["u_dok_b".$i];
		${"u_ypost_b".$i} = $_POST["u_ypost_b".$i];
		${"thermo_orofis_drop_b".$i} = $_POST["thermo_orofis_drop_b".$i];
		${"thermo_dokoy_drop_b".$i} = $_POST["thermo_dokoy_drop_b".$i];
		${"arithmos_ypost_b".$i} = $_POST["arithmos_ypost_b".$i];
		${"thermo_ypost_drop_b".$i} = $_POST["thermo_ypost_drop_b".$i];

		
		//υπολογισμοί τοίχου
		${"epifaneia_toixoy_b".$i} = ${"mikos_b".$i} * ${"ypsos_b".$i};
		${"epifaneia_toixoy_syr_b".$i} = ${"mikos_syr_b".$i} * ${"ypsos_syr_b".$i};
		${"epifaneia_dokos_b".$i} = ${"mikos_b".$i} * ${"dokos_b".$i};
		${"epifaneia_ypost_b".$i} = ${"ypostil_b".$i} * (${"ypsos_b".$i} - ${"dokos_b".$i});
		${"thermogefyres_toixoy_b".$i} = (${"mikos_b".$i} * ${"thermo_orofis_drop_b".$i}) + (${"mikos_b".$i} * ${"thermo_dokoy_drop_b".$i}) + (${"ypsos_b".$i} * ${"arithmos_ypost_b".$i} * ${"thermo_ypost_drop_b".$i} * 2);
		$thermogefyres_toixoy_b += ${"thermogefyres_toixoy_b".$i};
		$mikos_toixoy_b += ${"mikos_b".$i};
		$epifaneia_toixoy_b += ${"epifaneia_toixoy_b".$i};
		$epifaneia_toixoy_syr_b += ${"epifaneia_toixoy_syr_b".$i};
		$epifaneia_dokos_b += ${"epifaneia_dokos_b".$i};
		$epifaneia_ypost_b += ${"epifaneia_ypost_b".$i};
		
				for ($j = 1; $j <= $anoig_t_boreia; $j++) {
				${"mikos_b".$i.$j} = $_POST["mikos_b".$i.$j];
				${"ypsos_b".$i.$j} = $_POST["ypsos_b".$i.$j];
				${"drop_syr_b".$i.$j} = $_POST["drop_syr_b".$i.$j];
				${"drop_aeras_b".$i.$j} = $_POST["drop_aeras_b".$i.$j];
				${"u_anoig_b".$i.$j} = $_POST["u_anoig_b".$i.$j];
				${"thermo_lampas_drop_b".$i.$j} = $_POST["thermo_lampas_drop_b".$i.$j];
				${"thermo_anwkatw_drop_b".$i.$j} = $_POST["thermo_anwkatw_drop_b".$i.$j];
				//υπολογισμοί ανοιγμάτων
				${"dieisdysi_b".$i.$j} = ${"mikos_b".$i.$j} * ${"ypsos_b".$i.$j} * ${"drop_aeras_b".$i.$j};
				${"dieisdysi_b".$i} += ${"dieisdysi_b".$i.$j};
				${"thermogefyres_anoig_b".$i.$j} = (${"mikos_b".$i.$j} * ${"thermo_anwkatw_drop_b".$i.$j})*2 + (${"ypsos_b".$i.$j} * ${"thermo_lampas_drop_b".$i.$j})*2;
				${"thermogefyres_anoig_b".$i} += ${"thermogefyres_anoig_b".$i.$j};
								
					if (${"drop_syr_b".$i.$j} != 1) {
					${"epifaneia_anoigmatos_b".$i.$j} = ${"mikos_b".$i.$j} * ${"ypsos_b".$i.$j};
					${"epifaneia_anoigmatwn_toixoy_b".$i} += ${"epifaneia_anoigmatos_b".$i.$j};
					${"ua_anoigmatos_b".$i.$j} = ${"epifaneia_anoigmatos_b".$i.$j} * ${"u_anoig_b".$i.$j};
					${"ua_anoigmatos_b".$i} += ${"ua_anoigmatos_b".$i.$j};
					}
					else{
					${"epifaneia_masif_b".$i.$j} = ${"mikos_b".$i.$j} * ${"ypsos_b".$i.$j};
					${"epifaneia_masif_toixoy_b".$i} += ${"epifaneia_masif_b".$i.$j};
					${"ua_masif_b".$i.$j} = ${"epifaneia_masif_b".$i.$j} * ${"u_anoig_b".$i.$j};
					${"ua_masif_b".$i} += ${"ua_masif_b".$i.$j};
					}
				
				}
		${"epifaneia_dromikoy_b".$i} = ${"epifaneia_toixoy_b".$i} - ${"epifaneia_toixoy_syr_b".$i} - ${"epifaneia_anoigmatwn_toixoy_b".$i} - ${"epifaneia_masif_toixoy_b".$i} - ${"epifaneia_dokos_b".$i} - ${"epifaneia_ypost_b".$i};
		$epifaneia_anoigmatwn_toixoy_b += ${"epifaneia_anoigmatwn_toixoy_b".$i};
		$epifaneia_masif_toixoy_b += ${"epifaneia_masif_toixoy_b".$i};
		$epifaneia_dromikoy_b += ${"epifaneia_dromikoy_b".$i};
		$thermogefyres_anoig_b += ${"thermogefyres_anoig_b".$i};
		${"ua_dromikoy_b".$i} = ${"u_b".$i} *  ${"epifaneia_dromikoy_b".$i};
		$ua_dromikoy_b += ${"ua_dromikoy_b".$i};
		${"ua_syr_b".$i} = ${"u_syr_b".$i} *  ${"epifaneia_toixoy_syr_b".$i};
		$ua_syr_b += ${"ua_syr_b".$i};
		${"ua_dok_b".$i} = ${"u_dok_b".$i} * ${"epifaneia_dokos_b".$i};
		$ua_dok_b += ${"ua_dok_b".$i};
		${"ua_ypost_b".$i} = ${"u_ypost_b".$i} * ${"epifaneia_ypost_b".$i};
		$ua_ypost_b += ${"ua_ypost_b".$i};
		$ua_anoigmatos_b +=${"ua_anoigmatos_b".$i};
		$ua_masif_b +=${"ua_masif_b".$i};
		$dieisdysi_b += ${"dieisdysi_b".$i};
		}
		
		
		
		//στοιχεία ανατολικής πλευράς (σύνολο μεταβλητών 8χ6=48 + 6χ4χ4=72)
		for ($i = 1; $i <= $t_anatolika; $i++) {
		${"mikos_a".$i} = $_POST["mikos_a".$i];
		${"ypsos_a".$i} = $_POST["ypsos_a".$i];
		${"paxos_a".$i} = $_POST["paxos_a".$i];
		${"dokos_a".$i} = $_POST["dokos_a".$i];
		${"ypostil_a".$i} = $_POST["ypostil_a".$i];
		${"u_a".$i} = $_POST["u_a".$i];
		${"mikos_syr_a".$i} = $_POST["mikos_syr_a".$i];
		${"ypsos_syr_a".$i} = $_POST["ypsos_syr_a".$i];
		${"u_syr_a".$i} = $_POST["u_syr_a".$i];
		${"u_dok_a".$i} = $_POST["u_dok_a".$i];
		${"u_ypost_a".$i} = $_POST["u_ypost_a".$i];
		${"thermo_orofis_drop_a".$i} = $_POST["thermo_orofis_drop_a".$i];
		${"thermo_dokoy_drop_a".$i} = $_POST["thermo_dokoy_drop_a".$i];
		${"arithmos_ypost_a".$i} = $_POST["arithmos_ypost_a".$i];
		${"thermo_ypost_drop_a".$i} = $_POST["thermo_ypost_drop_a".$i];

		
		//υπολογισμοί τοίχου
		${"epifaneia_toixoy_a".$i} = ${"mikos_a".$i} * ${"ypsos_a".$i};
		${"epifaneia_toixoy_syr_a".$i} = ${"mikos_syr_a".$i} * ${"ypsos_syr_a".$i};
		${"epifaneia_dokos_a".$i} = ${"mikos_a".$i} * ${"dokos_a".$i};
		${"epifaneia_ypost_a".$i} = ${"ypostil_a".$i} * (${"ypsos_a".$i} - ${"dokos_a".$i});
		${"thermogefyres_toixoy_a".$i} = (${"mikos_a".$i} * ${"thermo_orofis_drop_a".$i}) + (${"mikos_a".$i} * ${"thermo_dokoy_drop_a".$i}) + (${"ypsos_a".$i} * ${"arithmos_ypost_a".$i} * ${"thermo_ypost_drop_a".$i} * 2);
		$thermogefyres_toixoy_a += ${"thermogefyres_toixoy_a".$i};
		$mikos_toixoy_a += ${"mikos_a".$i};
		$epifaneia_toixoy_a += ${"epifaneia_toixoy_a".$i};
		$epifaneia_toixoy_syr_a += ${"epifaneia_toixoy_syr_a".$i};
		$epifaneia_dokos_a += ${"epifaneia_dokos_a".$i};
		$epifaneia_ypost_a += ${"epifaneia_ypost_a".$i};
				for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
				${"mikos_a".$i.$j} = $_POST["mikos_a".$i.$j];
				${"ypsos_a".$i.$j} = $_POST["ypsos_a".$i.$j];
				${"drop_syr_a".$i.$j} = $_POST["drop_syr_a".$i.$j];
				${"drop_aeras_a".$i.$j} = $_POST["drop_aeras_a".$i.$j];
				${"u_anoig_a".$i.$j} = $_POST["u_anoig_a".$i.$j];
				${"thermo_lampas_drop_a".$i.$j} = $_POST["thermo_lampas_drop_a".$i.$j];
				${"thermo_anwkatw_drop_a".$i.$j} = $_POST["thermo_anwkatw_drop_a".$i.$j];
				//υπολογισμοί ανοιγμάτων
				${"dieisdysi_a".$i.$j} = ${"mikos_a".$i.$j} * ${"ypsos_a".$i.$j} * ${"drop_aeras_a".$i.$j};
				${"dieisdysi_a".$i} += ${"dieisdysi_a".$i.$j};
				${"thermogefyres_anoig_a".$i.$j} = (${"mikos_a".$i.$j} * ${"thermo_anwkatw_drop_a".$i.$j})*2 + (${"ypsos_a".$i.$j} * ${"thermo_lampas_drop_a".$i.$j})*2;
				${"thermogefyres_anoig_a".$i} += ${"thermogefyres_anoig_a".$i.$j};
								
				if (${"drop_syr_a".$i.$j} != 1) {
					${"epifaneia_anoigmatos_a".$i.$j} = ${"mikos_a".$i.$j} * ${"ypsos_a".$i.$j};
					${"epifaneia_anoigmatwn_toixoy_a".$i} += ${"epifaneia_anoigmatos_a".$i.$j};
					${"ua_anoigmatos_a".$i.$j} = ${"epifaneia_anoigmatos_a".$i.$j} * ${"u_anoig_a".$i.$j};
					${"ua_anoigmatos_a".$i} += ${"ua_anoigmatos_a".$i.$j};
					}
					else{
					${"epifaneia_masif_a".$i.$j} = ${"mikos_a".$i.$j} * ${"ypsos_a".$i.$j};
					${"epifaneia_masif_toixoy_a".$i} += ${"epifaneia_masif_a".$i.$j};
					${"ua_masif_a".$i.$j} = ${"epifaneia_masif_a".$i.$j} * ${"u_anoig_a".$i.$j};
					${"ua_masif_a".$i} += ${"ua_masif_a".$i.$j};
					}
					
					
				}
		${"epifaneia_dromikoy_a".$i} = ${"epifaneia_toixoy_a".$i} - ${"epifaneia_toixoy_syr_a".$i} - ${"epifaneia_masif_toixoy_a".$i} - ${"epifaneia_anoigmatwn_toixoy_a".$i} - ${"epifaneia_dokos_a".$i} - ${"epifaneia_ypost_a".$i};
		$epifaneia_anoigmatwn_toixoy_a += ${"epifaneia_anoigmatwn_toixoy_a".$i};
		$epifaneia_masif_toixoy_a += ${"epifaneia_masif_toixoy_a".$i};
		$thermogefyres_anoig_a += ${"thermogefyres_anoig_a".$i};
		$epifaneia_dromikoy_a += ${"epifaneia_dromikoy_a".$i};
		${"ua_dromikoy_a".$i} = ${"u_a".$i} *  ${"epifaneia_dromikoy_a".$i};
		$ua_dromikoy_a += ${"ua_dromikoy_a".$i};
		${"ua_syr_a".$i} = ${"u_syr_a".$i} *  ${"epifaneia_toixoy_syr_a".$i};
		$ua_syr_a += ${"ua_syr_a".$i};
		${"ua_dok_a".$i} = ${"u_dok_a".$i} * ${"epifaneia_dokos_a".$i};
		$ua_dok_a += ${"ua_dok_a".$i};
		${"ua_ypost_a".$i} = ${"u_ypost_a".$i} * ${"epifaneia_ypost_a".$i};
		$ua_ypost_a += ${"ua_ypost_a".$i};
		$ua_anoigmatos_a +=${"ua_anoigmatos_a".$i};
		$ua_masif_a +=${"ua_masif_a".$i};
		$dieisdysi_a +=${"dieisdysi_a".$i};
		}
		
		
		//στοιχεία νότιας πλευράς (σύνολο μεταβλητών 8χ6=48 + 6χ4χ4=72)
		for ($i = 1; $i <= $t_notia; $i++) {
		${"mikos_n".$i} = $_POST["mikos_n".$i];
		${"ypsos_n".$i} = $_POST["ypsos_n".$i];
		${"paxos_n".$i} = $_POST["paxos_n".$i];
		${"dokos_n".$i} = $_POST["dokos_n".$i];
		${"ypostil_n".$i} = $_POST["ypostil_n".$i];
		${"u_n".$i} = $_POST["u_n".$i];
		${"mikos_syr_n".$i} = $_POST["mikos_syr_n".$i];
		${"ypsos_syr_n".$i} = $_POST["ypsos_syr_n".$i];
		${"u_syr_n".$i} = $_POST["u_syr_n".$i];
		${"u_dok_n".$i} = $_POST["u_dok_n".$i];
		${"u_ypost_n".$i} = $_POST["u_ypost_n".$i];
		${"thermo_orofis_drop_n".$i} = $_POST["thermo_orofis_drop_n".$i];
		${"thermo_dokoy_drop_n".$i} = $_POST["thermo_dokoy_drop_n".$i];
		${"arithmos_ypost_n".$i} = $_POST["arithmos_ypost_n".$i];
		${"thermo_ypost_drop_n".$i} = $_POST["thermo_ypost_drop_n".$i];

		
		//υπολογισμοί τοίχου
		${"epifaneia_toixoy_n".$i} = ${"mikos_n".$i} * ${"ypsos_n".$i};
		${"epifaneia_toixoy_syr_n".$i} = ${"mikos_syr_n".$i} * ${"ypsos_syr_n".$i};
		${"epifaneia_dokos_n".$i} = ${"mikos_n".$i} * ${"dokos_n".$i};
		${"epifaneia_ypost_n".$i} = ${"ypostil_n".$i} * (${"ypsos_n".$i} - ${"dokos_n".$i});
		${"thermogefyres_toixoy_n".$i} = (${"mikos_n".$i} * ${"thermo_orofis_drop_n".$i}) + (${"mikos_n".$i} * ${"thermo_dokoy_drop_n".$i}) + (${"ypsos_n".$i} * ${"arithmos_ypost_n".$i} * ${"thermo_ypost_drop_n".$i} * 2);
		$thermogefyres_toixoy_n += ${"thermogefyres_toixoy_n".$i};
		$mikos_toixoy_n += ${"mikos_n".$i};
		$epifaneia_toixoy_n += ${"epifaneia_toixoy_n".$i};
		$epifaneia_toixoy_syr_n += ${"epifaneia_toixoy_syr_n".$i};
		$epifaneia_dokos_n += ${"epifaneia_dokos_n".$i};
		$epifaneia_ypost_n += ${"epifaneia_ypost_n".$i};
				for ($j = 1; $j <= $anoig_t_notia; $j++) {
				${"mikos_n".$i.$j} = $_POST["mikos_n".$i.$j];
				${"ypsos_n".$i.$j} = $_POST["ypsos_n".$i.$j];
				${"drop_syr_n".$i.$j} = $_POST["drop_syr_n".$i.$j];
				${"drop_aeras_n".$i.$j} = $_POST["drop_aeras_n".$i.$j];
				${"u_anoig_n".$i.$j} = $_POST["u_anoig_n".$i.$j];
				${"thermo_lampas_drop_n".$i.$j} = $_POST["thermo_lampas_drop_n".$i.$j];
				${"thermo_anwkatw_drop_n".$i.$j} = $_POST["thermo_anwkatw_drop_n".$i.$j];
				//υπολογισμοί ανοιγμάτων
				${"dieisdysi_n".$i.$j} = ${"mikos_n".$i.$j} * ${"ypsos_n".$i.$j} * ${"drop_aeras_n".$i.$j};
				${"dieisdysi_n".$i} += ${"dieisdysi_n".$i.$j};
				${"thermogefyres_anoig_n".$i.$j} = (${"mikos_n".$i.$j} * ${"thermo_anwkatw_drop_n".$i.$j})*2 + (${"ypsos_n".$i.$j} * ${"thermo_lampas_drop_n".$i.$j})*2;
				${"thermogefyres_anoig_n".$i} += ${"thermogefyres_anoig_n".$i.$j};
								
				if (${"drop_syr_n".$i.$j} != 1) {
					${"epifaneia_anoigmatos_n".$i.$j} = ${"mikos_n".$i.$j} * ${"ypsos_n".$i.$j};
					${"epifaneia_anoigmatwn_toixoy_n".$i} += ${"epifaneia_anoigmatos_n".$i.$j};
					${"ua_anoigmatos_n".$i.$j} = ${"epifaneia_anoigmatos_n".$i.$j} * ${"u_anoig_n".$i.$j};
					${"ua_anoigmatos_n".$i} += ${"ua_anoigmatos_n".$i.$j};
					}
					else{
					${"epifaneia_masif_n".$i.$j} = ${"mikos_n".$i.$j} * ${"ypsos_n".$i.$j};
					${"epifaneia_masif_toixoy_n".$i} += ${"epifaneia_masif_n".$i.$j};
					${"ua_masif_n".$i.$j} = ${"epifaneia_masif_n".$i.$j} * ${"u_anoig_n".$i.$j};
					${"ua_masif_n".$i} += ${"ua_masif_n".$i.$j};
					}
					
					
				}
		${"epifaneia_dromikoy_n".$i} = ${"epifaneia_toixoy_n".$i} - ${"epifaneia_toixoy_syr_n".$i} - ${"epifaneia_masif_toixoy_n".$i} - ${"epifaneia_anoigmatwn_toixoy_n".$i} - ${"epifaneia_dokos_n".$i} - ${"epifaneia_ypost_n".$i};
		$thermogefyres_anoig_n += ${"thermogefyres_anoig_n".$i};
		$epifaneia_anoigmatwn_toixoy_n += ${"epifaneia_anoigmatwn_toixoy_n".$i};
		$epifaneia_masif_toixoy_n += ${"epifaneia_masif_toixoy_n".$i};
		$epifaneia_dromikoy_n += ${"epifaneia_dromikoy_n".$i};
		${"ua_dromikoy_n".$i} = ${"u_n".$i} *  ${"epifaneia_dromikoy_n".$i};
		$ua_dromikoy_n += ${"ua_dromikoy_n".$i};
		${"ua_syr_n".$i} = ${"u_syr_n".$i} *  ${"epifaneia_toixoy_syr_n".$i};
		$ua_syr_n += ${"ua_syr_n".$i};
		${"ua_dok_n".$i} = ${"u_dok_n".$i} * ${"epifaneia_dokos_n".$i};
		$ua_dok_n += ${"ua_dok_n".$i};
		${"ua_ypost_n".$i} = ${"u_ypost_n".$i} * ${"epifaneia_ypost_n".$i};
		$ua_ypost_n += ${"ua_ypost_n".$i};
		$ua_anoigmatos_n +=${"ua_anoigmatos_n".$i};
		$ua_masif_n +=${"ua_masif_n".$i};
		$dieisdysi_n += ${"dieisdysi_n".$i}; 
		}
		
		//στοιχεία δυτικής πλευράς (σύνολο μεταβλητών 8χ6=48 + 6χ4χ4=72)
		for ($i = 1; $i <= $t_dytika; $i++) {
		${"mikos_d".$i} = $_POST["mikos_d".$i];
		${"ypsos_d".$i} = $_POST["ypsos_d".$i];
		${"paxos_d".$i} = $_POST["paxos_d".$i];
		${"dokos_d".$i} = $_POST["dokos_d".$i];
		${"ypostil_d".$i} = $_POST["ypostil_d".$i];
		${"u_d".$i} = $_POST["u_d".$i];
		${"mikos_syr_d".$i} = $_POST["mikos_syr_d".$i];
		${"ypsos_syr_d".$i} = $_POST["ypsos_syr_d".$i];
		${"u_syr_d".$i} = $_POST["u_syr_d".$i];
		${"u_dok_d".$i} = $_POST["u_dok_d".$i];
		${"u_ypost_d".$i} = $_POST["u_ypost_d".$i];
		${"thermo_orofis_drop_d".$i} = $_POST["thermo_orofis_drop_d".$i];
		${"thermo_dokoy_drop_d".$i} = $_POST["thermo_dokoy_drop_d".$i];
		${"arithmos_ypost_d".$i} = $_POST["arithmos_ypost_d".$i];
		${"thermo_ypost_drop_d".$i} = $_POST["thermo_ypost_drop_d".$i];

		
		//υπολογισμοί τοίχου
		${"epifaneia_toixoy_d".$i} = ${"mikos_d".$i} * ${"ypsos_d".$i};
		${"epifaneia_toixoy_syr_d".$i} = ${"mikos_syr_d".$i} * ${"ypsos_syr_d".$i};
		${"epifaneia_dokos_d".$i} = ${"mikos_d".$i} * ${"dokos_d".$i};
		${"epifaneia_ypost_d".$i} = ${"ypostil_d".$i} * (${"ypsos_d".$i} - ${"dokos_d".$i});
		${"thermogefyres_toixoy_d".$i} = (${"mikos_d".$i} * ${"thermo_orofis_drop_d".$i}) + (${"mikos_d".$i} * ${"thermo_dokoy_drop_d".$i}) + (${"ypsos_d".$i} * ${"arithmos_ypost_d".$i} * ${"thermo_ypost_drop_d".$i} * 2); // ΘΕΡΜΟΓΕΦΥΡΕΣ ΤΟΙΧΟΥ (ΕΝΩΣΗΣ) 
		$thermogefyres_toixoy_d += ${"thermogefyres_toixoy_d".$i};
		$mikos_toixoy_d += ${"mikos_d".$i};
		$epifaneia_toixoy_d += ${"epifaneia_toixoy_d".$i};
		$epifaneia_toixoy_syr_d += ${"epifaneia_toixoy_syr_d".$i};
		$epifaneia_dokos_d += ${"epifaneia_dokos_d".$i};
		$epifaneia_ypost_d += ${"epifaneia_ypost_d".$i};
				for ($j = 1; $j <= $anoig_t_dytika; $j++) {
				${"mikos_d".$i.$j} = $_POST["mikos_d".$i.$j];
				${"ypsos_d".$i.$j} = $_POST["ypsos_d".$i.$j];
				${"drop_syr_d".$i.$j} = $_POST["drop_syr_d".$i.$j];
				${"drop_aeras_d".$i.$j} = $_POST["drop_aeras_d".$i.$j];
				${"u_anoig_d".$i.$j} = $_POST["u_anoig_d".$i.$j];
				${"thermo_lampas_drop_d".$i.$j} = $_POST["thermo_lampas_drop_d".$i.$j];
				${"thermo_anwkatw_drop_d".$i.$j} = $_POST["thermo_anwkatw_drop_d".$i.$j];
				//υπολογισμοί ανοιγμάτων
				${"dieisdysi_d".$i.$j} = ${"mikos_d".$i.$j} * ${"ypsos_d".$i.$j} * ${"drop_aeras_d".$i.$j};
				${"dieisdysi_d".$i} += ${"dieisdysi_d".$i.$j};
				${"thermogefyres_anoig_d".$i.$j} = (${"mikos_d".$i.$j} * ${"thermo_anwkatw_drop_d".$i.$j})*2 + (${"ypsos_d".$i.$j} * ${"thermo_lampas_drop_d".$i.$j})*2; //ΘΕΡΜΟΓΕΦΥΡΕΣ ΛΑΜΠΑΣ ΚΑΙ ΑΝΩΚΑΣΙ - ΚΑΤΩΚΑΣΙ
				${"thermogefyres_anoig_d".$i} += ${"thermogefyres_anoig_d".$i.$j};
								
				if (${"drop_syr_d".$i.$j} != 1) {
					${"epifaneia_anoigmatos_d".$i.$j} = ${"mikos_d".$i.$j} * ${"ypsos_d".$i.$j};
					${"epifaneia_anoigmatwn_toixoy_d".$i} += ${"epifaneia_anoigmatos_d".$i.$j};
					${"ua_anoigmatos_d".$i.$j} = ${"epifaneia_anoigmatos_d".$i.$j} * ${"u_anoig_d".$i.$j};
					${"ua_anoigmatos_d".$i} += ${"ua_anoigmatos_d".$i.$j};
					}
					else{
					${"epifaneia_masif_d".$i.$j} = ${"mikos_d".$i.$j} * ${"ypsos_d".$i.$j};
					${"epifaneia_masif_toixoy_d".$i} += ${"epifaneia_masif_d".$i.$j};
					${"ua_masif_d".$i.$j} = ${"epifaneia_masif_d".$i.$j} * ${"u_anoig_d".$i.$j};
					${"ua_masif_d".$i} += ${"ua_masif_d".$i.$j};
					}
					
					
				}
		${"epifaneia_dromikoy_d".$i} = ${"epifaneia_toixoy_d".$i} - ${"epifaneia_toixoy_syr_d".$i} - ${"epifaneia_masif_toixoy_d".$i} - ${"epifaneia_anoigmatwn_toixoy_d".$i} - ${"epifaneia_dokos_d".$i} - ${"epifaneia_ypost_d".$i};
		$thermogefyres_anoig_d += ${"thermogefyres_anoig_d".$i};
		$epifaneia_anoigmatwn_toixoy_d += ${"epifaneia_anoigmatwn_toixoy_d".$i};
		$epifaneia_masif_toixoy_d += ${"epifaneia_masif_toixoy_d".$i};
		$epifaneia_dromikoy_d += ${"epifaneia_dromikoy_d".$i};
		${"ua_dromikoy_d".$i} = ${"u_d".$i} *  ${"epifaneia_dromikoy_d".$i};
		$ua_dromikoy_d += ${"ua_dromikoy_d".$i};
		${"ua_syr_d".$i} = ${"u_syr_d".$i} *  ${"epifaneia_toixoy_syr_d".$i};
		$ua_syr_d += ${"ua_syr_d".$i};
		${"ua_dok_d".$i} = ${"u_dok_d".$i} * ${"epifaneia_dokos_d".$i};
		$ua_dok_d += ${"ua_dok_d".$i};
		${"ua_ypost_d".$i} = ${"u_ypost_d".$i} * ${"epifaneia_ypost_d".$i};
		$ua_ypost_d += ${"ua_ypost_d".$i};
		$ua_anoigmatos_d +=${"ua_anoigmatos_d".$i};
		$ua_masif_d +=${"ua_masif_d".$i};
		$dieisdysi_d +=${"dieisdysi_d".$i};
		}
		
		//Υπολογισμός περιμέτρου
		$perimetros = $mikos_toixoy_b + $mikos_toixoy_a + $mikos_toixoy_n + $mikos_toixoy_d;
		
		//Υπολογισμός θερμογεφυρών 
		$thermogefyres_anoig = ($thermogefyres_anoig_b + $thermogefyres_anoig_a + $thermogefyres_anoig_n + $thermogefyres_anoig_d); //εδώ έχω υπολογίσει θερμογεφυρες ανω/κατω-κασι,λαμπας
		$thermogefyres_enwsi = ($thermogefyres_toixoy_b + $thermogefyres_toixoy_a + $thermogefyres_toixoy_n + $thermogefyres_toixoy_d);//εδώ έχω υπολογίσει θερμογεφυρες υποστύλωμα,δοκό,οροφή,συρόμενα
			
			//Υπολογισμοί των υπόλοιπων θερμογεφυρών
			$thermogefyres_dapedoy = $perimetros * $thermo_dapedo_drop;//εδώ έχω υπολογίσει θερμογεφυρες δαπεδου
			$thermogefyres = $thermogefyres_orofi + $thermogefyres_dapedoy + $thermogefyres_gwnia + $thermogefyres_anoig + $thermogefyres_enwsi;
			
			//Υπολογισμός UA
			$ua_dromikoy = $ua_dromikoy_b + $ua_dromikoy_a + $ua_dromikoy_n + $ua_dromikoy_d;
			$ua_syr = $ua_syr_b + $ua_syr_a + $ua_syr_n + $ua_syr_d;
			$ua_dok = $ua_dok_b + $ua_dok_a + $ua_dok_n + $ua_dok_d;
			$ua_ypost = $ua_ypost_b + $ua_ypost_a + $ua_ypost_n + $ua_ypost_d;
			//$dapedo_ua, $orofi_ua
			$ua_anoigmatos = $ua_anoigmatos_b + $ua_anoigmatos_a + $ua_anoigmatos_n + $ua_anoigmatos_d;
			$ua_masif = $ua_masif_b + $ua_masif_a + $ua_masif_n + $ua_masif_d;
			
			//Υπολογισμός A
			$a_diafanwn_anoigmatwn = $epifaneia_anoigmatwn_toixoy_b + $epifaneia_anoigmatwn_toixoy_a + $epifaneia_anoigmatwn_toixoy_n + $epifaneia_anoigmatwn_toixoy_d;
			$a_adiafanwn_anoigmatwn = $epifaneia_masif_toixoy_b + $epifaneia_masif_toixoy_a + $epifaneia_masif_toixoy_n + $epifaneia_masif_toixoy_d;
			$a_dromikoy = $epifaneia_dromikoy_b + $epifaneia_dromikoy_a + $epifaneia_dromikoy_n + $epifaneia_dromikoy_d;
			$a_syr = $epifaneia_toixoy_syr_b + $epifaneia_toixoy_syr_a + $epifaneia_toixoy_syr_n + $epifaneia_toixoy_syr_d;
			$a_dokoy = $epifaneia_dokos_b + $epifaneia_dokos_a + $epifaneia_dokos_n + $epifaneia_dokos_d;
			$a_ypost = $epifaneia_ypost_b + $epifaneia_ypost_a + $epifaneia_ypost_n + $epifaneia_ypost_d;
			
			//Υπολογισμός συνόλων ανά κατηγορία Α
			$a_oriz_adiafanwn = $dapedo_embadon1 + $dapedo_embadon2 + $orofi_embadon1 + $orofi_embadon2;
			$a_kat_adiafanwn = $a_adiafanwn_anoigmatwn + $a_dromikoy + $a_syr + $a_dokoy + $a_ypost;
			$a_diafanwn = $a_diafanwn_anoigmatwn;
			$a_thermoperatotitas = $a_oriz_adiafanwn + $a_kat_adiafanwn + $a_diafanwn;
			
			//Υπολογισμός συνόλων ανά κατηγορία UA
			$ua_oriz_adiafanwn = $dapedo_ua + $orofi_ua;
			$ua_kat_adiafanwn = $ua_masif + $ua_dromikoy + $ua_syr + $ua_dok + $ua_ypost;
			$ua_diafanwn = $ua_anoigmatos;
			$ua_thermoperatotitas = $ua_oriz_adiafanwn + $ua_kat_adiafanwn + $ua_diafanwn;
				
		
		
		if ( empty($errors) ) {
				
			//Προβολή δεδομένων του χρήστη
			//ZNX (συντελεστής)
			echo "<table border=\'1\"><tr><th colspan=\"2\">ZNX</th></tr><tr><td>Χρήση ID Βιβλιοθήκης:</td><td>" . $drop_xrisi . "</td></tr></table><br/>";
			//Ζώνη
			echo "<table border=\'1\"><tr><th colspan=\"6\">Στοιχεία ζώνης</th></tr><tr><td>Ζώνη</td><td>" . $zwni . "</td><td>Νερό δικτύου ID βιλιοθήκης</td><td>" . $drop_nero_diktyoy . "</td><td>Κιματολογικά ID βιλιοθήκης</td><td>" . $drop_climate . "</td></tr></table><br/>";
			//Χώροι κτιρίου
			echo "<table border=\"1\"><tr><th colspan=\"6\">Χώροι κτιρίου</th></tr><tr><td>Χώροι κτιρίου</td><td>Μήκος</td><td>Πλάτος</td><td>Ύψος</td><td>Εμβαδόν</td><td>Όγκος</td></tr>";
			for ($i = 1; $i <= 10; $i++) {
			
			echo "<tr><td>Χώρος " . $i . "</td><td>" . ${"mikos".$i} . "</td>";
			echo "<td>" . ${"platos".$i} . "</td>";
			echo "<td>" . ${"ypsos".$i} . "</td>";
			echo "<td>" . ${"embadon".$i} . "</td>";
			echo "<td>" . ${"ogkos".$i} . "</td></tr>";
			
			}
			echo "<tr><td colspan=\"4\">Σύνολο</td><td>" . $synoliko_embadon . "</td><td>" . $synolikos_ogkos . "</td></tr></table><br/>";
			
			//Δάπεδα - Οροφές
			echo "<table border=\"1\"><tr><th colspan=\"3\">Δάπεδο - Οροφές</th></tr><tr><td>Είδος</td><td>Εμβαδόν</td><td>U</td></tr><tr><td colspan=\"3\">Δάπεδα</td></tr><tr><td>Δάπεδο επί εδάφους</td>";
			echo "<td>" . $dapedo_embadon1 . "</td>";
			echo "<td>" . $dapedo_u1 . "</td>";
			echo "</tr><tr><td>Δάπεδο επί μη θερμαινόμενου χώρου</td>";
			echo "<td>" . $dapedo_embadon2 . "</td>";
			echo "<td>" . $dapedo_u2 . "</td>";
			echo "</tr><tr><td colspan=\"3\">Οροφές</td></tr><tr><td>Οροφή με κεραμίδι</td>";
			echo "<td>" . $orofi_embadon1 . "</td>";
			echo "<td>" . $orofi_u1 . "</td>";
			echo "</tr><tr><td>Οροφή πλάκα</td><td>" . $orofi_embadon2 . "</td><td>" . $orofi_u2 . "</td></tr></table>";
			
			//Θερμογεφυρες
			echo "<table border=\"1\"><tr><th colspan=\"4\">Θερμογέφυρες</th></tr><tr><td>Είδος</td><td>Πλήθος</td><td>Ύψος</td><td>U*A</td></tr><tr><td colspan=\"4\">Εσωτερικές</td></tr>";
			for ($i = 1; $i <= 5; $i++) {
			echo "<tr><td>" . ${"thermo_esw_drop".$i} . "</td><td>" . ${"thermo_esw_gwnia_p".$i} . "</td><td>" . ${"thermo_esw_gwnia_ypsos".$i} . "</td><td>" . ${"thermo_esw_gwnia_ua".$i} . "</td></tr>";
			}
			echo "<tr><td colspan=\"4\">Εξωτερικές</td></tr></tr>";
			for ($i = 1; $i <= 5; $i++) {
			echo "<tr><td>" . ${"thermo_eksw_drop".$i} . "</td><td>" . ${"thermo_eksw_gwnia_p".$i} . "</td><td>" . ${"thermo_eksw_gwnia_ypsos".$i} . "</td><td>" . ${"thermo_eksw_gwnia_ua".$i} . "</td></tr>";
			}
			
			echo "<tr><td colspan=\"4\">Δαπέδου (υπολογισμός με βάση την περίμετρο)</td></tr>";
			echo "<tr><td colspan=\"4\">" . $thermo_dapedo_drop . "</td></tr>";
			echo "</table></br></br>";
			
			//Δομικά στοιχεία
			echo "<table border=\"1\"><br/><br/><tr bgcolor=\"grey\"><th colspan=\"8\"><b>ΔΟΜΙΚΑ ΣΤΟΙΧΕΙΑ ΚΕΝΑΚ</b></th><th colspan=\"2\"><b>Τύπος/αερισμός</b></th></tr>";
			echo "<tr><td><b>Όνομα στοιχείου</b></td><td><b>Μήκος<b></td><td><b>Ύψος</b></td><td><b>Πάχος</b></td><td><b> U </b></td><td><b>  Ε  </b></td><td><b>Θερμογέφυρες</b></td><td><b>Εδρομ.</b></td></tr>";
			echo "<tr bgcolor=\"#00FFFF\"><th colspan=\"10\"><b>ΒΟΡΕΙΑ (0)</b></th></tr>";
						//ΒΟΡΕΙΑ
						for ($i = 1; $i <= $t_boreia; $i++) {
						$onoma = "T-B";
						$mikos = "mikos_b";
						$ypsos = "ypsos_b";
						$paxos = "paxos_b";
						$dokos = "dokos_b";
						$ypostil = "ypostil_b";
						$u = "u_b";
						$mikos_syr = "mikos_syr_b";
						$ypsos_syr = "ypsos_syr_b";
						$u_syr = "u_syr_b";
						$drop_syr = "drop_syr_b";
						$drop_aeras = "drop_aeras_b";
						$u_dok = "u_dok_b";
						$u_ypost = "u_ypost_b";
						$u_anoig = "u_anoig_b";
						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"10\"><b>" . $onoma . $i . "</b></td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . $i . "</td>";
						echo "<td>". ${$mikos.$i} . "</td>";
						echo "<td>" . ${$ypsos.$i} . "</td>";
						echo "<td>" . ${$paxos.$i} . "</td>";
						echo "<td>" . ${$u.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_b".$i} . "</td>";
						echo "<td>" . ${"thermogefyres_toixoy_b".$i} . "</td>";
						echo "<td>" . ${"epifaneia_dromikoy_b".$i} . "</td></tr>";
						echo "<tr><td>Δοκός " . $onoma . $i . "</td>";
						echo "<td></td><td>" . ${$dokos.$i} . "</td><td></td>";
						echo "<td>" . ${$u_dok.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dokos_b".$i} . "</td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . $i . "</td>";
						echo "<td>" . ${$ypostil.$i} . "</td><td colspan=\"2\"></td>";
						echo "<td>" . ${$u_ypost.$i} . "</td>";
						echo "<td>" . ${"epifaneia_ypost_b".$i} . "</td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . $i . "</td>";
						echo "<td>" . ${$mikos_syr.$i} . "</td>";
						echo "<td>" . ${$ypsos_syr.$i} . "</td><td></td>";
						echo "<td>" . ${$u_syr.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_syr_b".$i} . "</td></tr>";
						
								for ($j = 1; $j <= $anoig_t_boreia; $j++) {
								echo "<tr><td>Άνοιγμα " . $onoma . $i . "-" . $j . "</td>";
								echo "<td>" . ${$mikos.$i.$j} . "</td>";
								echo "<td>". ${$ypsos.$i.$j} . "</td>";
								echo "<td></td><td>" . ${$u_anoig.$i.$j} . "</td>";
								echo "<td>" . ${"epifaneia_anoigmatos_b".$i.$j} . "</td>";
								echo "<td>" . ${"thermogefyres_anoig_b".$i.$j} . "</td><td></td>";
								echo "<td>" . ${$drop_syr.$i.$j} . "</td>";
								echo "<td>" . ${"dieisdysi_b".$i.$j} . "</td></tr>";
								}
						
						}
						//ΑΝΑΤΟΛΙΚΑ
						echo "<tr bgcolor=\"#FFFF33\"><th colspan=\"10\"><b>ΑΝΑΤΟΛΙΚΑ (90)</b></th></tr>";
						for ($i = 1; $i <= $t_anatolika; $i++) {
						$onoma = "T-A";
						$mikos = "mikos_a";
						$ypsos = "ypsos_a";
						$paxos = "paxos_a";
						$dokos = "dokos_a";
						$ypostil = "ypostil_a";
						$u = "u_a";
						$mikos_syr = "mikos_syr_a";
						$ypsos_syr = "ypsos_syr_a";
						$u_syr = "u_syr_a";
						$drop_syr = "drop_syr_a";
						$drop_aeras = "drop_aeras_a";
						$u_dok = "u_dok_a";
						$u_ypost = "u_ypost_a";
						$u_anoig = "u_anoig_a";
						
						echo "<tr><td bgcolor=\"#FFFF33\" colspan=\"10\"><b>" . $onoma . $i . "</b></td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . $i . "</td>";
						echo "<td>". ${$mikos.$i} . "</td>";
						echo "<td>" . ${$ypsos.$i} . "</td>";
						echo "<td>" . ${$paxos.$i} . "</td>";
						echo "<td>" . ${$u.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_a".$i} . "</td>";
						echo "<td>" . ${"thermogefyres_toixoy_a".$i} . "</td>";
						echo "<td>" . ${"epifaneia_dromikoy_a".$i} . "</td></tr>";
						echo "<tr><td>Δοκός " . $onoma . $i . "</td>";
						echo "<td></td><td>" . ${$dokos.$i} . "</td><td></td>";
						echo "<td>" . ${$u_dok.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dokos_a".$i} . "</td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . $i . "</td>";
						echo "<td>" . ${$ypostil.$i} . "</td><td colspan=\"2\"></td>";
						echo "<td>" . ${$u_ypost.$i} . "</td>";
						echo "<td>" . ${"epifaneia_ypost_a".$i} . "</td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . $i . "</td>";
						echo "<td>" . ${$mikos_syr.$i} . "</td>";
						echo "<td>" . ${$ypsos_syr.$i} . "</td><td></td>";
						echo "<td>" . ${$u_syr.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_syr_a".$i} . "</td></tr>";
						
								for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
								echo "<tr><td>Άνοιγμα " . $onoma . $i . "-" . $j . "</td>";
								echo "<td>" . ${$mikos.$i.$j} . "</td>";
								echo "<td>". ${$ypsos.$i.$j} . "</td>";
								echo "<td></td><td>" . ${$u_anoig.$i.$j} . "</td>";
								echo "<td>" . ${"epifaneia_anoigmatos_a".$i.$j} . "</td>";
								echo "<td>" . ${"thermogefyres_anoig_a".$i.$j} . "</td><td></td>";
								echo "<td>" . ${$drop_syr.$i.$j} . "</td>";
								echo "<td>" . ${"dieisdysi_a".$i.$j} . "</td></tr>";
								}
						
						
						}
						
						//NOTIA
						echo "<tr bgcolor=\"#009966\"><th colspan=\"10\"><b>ΝΟΤΙΑ (180)</b></th></tr>";
						for ($i = 1; $i <= $t_notia; $i++) {
						$onoma = "T-N";
						$mikos = "mikos_n";
						$ypsos = "ypsos_n";
						$paxos = "paxos_n";
						$dokos = "dokos_n";
						$ypostil = "ypostil_n";
						$u = "u_n";
						$mikos_syr = "mikos_syr_n";
						$ypsos_syr = "ypsos_syr_n";
						$u_syr = "u_syr_n";
						$drop_syr = "drop_syr_n";
						$drop_aeras = "drop_aeras_n";
						$u_dok = "u_dok_n";
						$u_ypost = "u_ypost_n";
						$u_anoig = "u_anoig_n";
						
						echo "<tr><td bgcolor=\"#009966\" colspan=\"10\"><b>" . $onoma . $i . "</b></td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . $i . "</td>";
						echo "<td>". ${$mikos.$i} . "</td>";
						echo "<td>" . ${$ypsos.$i} . "</td>";
						echo "<td>" . ${$paxos.$i} . "</td>";
						echo "<td>" . ${$u.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_n".$i} . "</td>";
						echo "<td>" . ${"thermogefyres_toixoy_n".$i} . "</td>";
						echo "<td>" . ${"epifaneia_dromikoy_n".$i} . "</td></tr>";
						echo "<tr><td>Δοκός " . $onoma . $i . "</td>";
						echo "<td></td><td>" . ${$dokos.$i} . "</td><td></td>";
						echo "<td>" . ${$u_dok.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dokos_n".$i} . "</td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . $i . "</td>";
						echo "<td>" . ${$ypostil.$i} . "</td><td colspan=\"2\"></td>";
						echo "<td>" . ${$u_ypost.$i} . "</td>";
						echo "<td>" . ${"epifaneia_ypost_n".$i} . "</td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . $i . "</td>";
						echo "<td>" . ${$mikos_syr.$i} . "</td>";
						echo "<td>" . ${$ypsos_syr.$i} . "</td><td></td>";
						echo "<td>" . ${$u_syr.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_syr_n".$i} . "</td></tr>";
						
								for ($j = 1; $j <= $anoig_t_notia; $j++) {
								echo "<tr><td>Άνοιγμα " . $onoma . $i . "-" . $j . "</td>";
								echo "<td>" . ${$mikos.$i.$j} . "</td>";
								echo "<td>". ${$ypsos.$i.$j} . "</td>";
								echo "<td></td><td>" . ${$u_anoig.$i.$j} . "</td>";
								echo "<td>" . ${"epifaneia_anoigmatos_n".$i.$j} . "</td>";
								echo "<td>" . ${"thermogefyres_anoig_n".$i.$j} . "</td><td></td>";
								echo "<td>" . ${$drop_syr.$i.$j} . "</td>";
								echo "<td>" . ${"dieisdysi_n".$i.$j} . "</td></tr>";
								}
						
						}
						
						//ΔΥΤΙΚΑ
						echo "<tr bgcolor=\"#CC9933\"><th colspan=\"10\"><b>ΔΥΤΙΚΑ (270)</b></th></tr>";
						for ($i = 1; $i <= $t_dytika; $i++) {
						$onoma = "T-Δ";
						$mikos = "mikos_d";
						$ypsos = "ypsos_d";
						$paxos = "paxos_d";
						$dokos = "dokos_d";
						$ypostil = "ypostil_d";
						$u = "u_d";
						$mikos_syr = "mikos_syr_d";
						$ypsos_syr = "ypsos_syr_d";
						$u_syr = "u_syr_d";
						$drop_syr = "drop_syr_d";
						$drop_aeras = "drop_aeras_d";
						$u_dok = "u_dok_d";
						$u_ypost = "u_ypost_d";
						$u_anoig = "u_anoig_d";
						
						echo "<tr><td bgcolor=\"#CC9933\" colspan=\"10\"><b>" . $onoma . $i . "</b></td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . $i . "</td>";
						echo "<td>". ${$mikos.$i} . "</td>";
						echo "<td>" . ${$ypsos.$i} . "</td>";
						echo "<td>" . ${$paxos.$i} . "</td>";
						echo "<td>" . ${$u.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_d".$i} . "</td>";
						echo "<td>" . ${"thermogefyres_toixoy_d".$i} . "</td>";
						echo "<td>" . ${"epifaneia_dromikoy_d".$i} . "</td></tr>";
						echo "<tr><td>Δοκός " . $onoma . $i . "</td>";
						echo "<td></td><td>" . ${$dokos.$i} . "</td><td></td>";
						echo "<td>" . ${$u_dok.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dokos_d".$i} . "</td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . $i . "</td>";
						echo "<td>" . ${$ypostil.$i} . "</td><td colspan=\"2\"></td>";
						echo "<td>" . ${$u_ypost.$i} . "</td>";
						echo "<td>" . ${"epifaneia_ypost_d".$i} . "</td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . $i . "</td>";
						echo "<td>" . ${$mikos_syr.$i} . "</td>";
						echo "<td>" . ${$ypsos_syr.$i} . "</td><td></td>";
						echo "<td>" . ${$u_syr.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_syr_d".$i} . "</td></tr>";
						
								for ($j = 1; $j <= $anoig_t_dytika; $j++) {
								echo "<tr><td>Άνοιγμα " . $onoma . $i . "-" . $j . "</td>";
								echo "<td>" . ${$mikos.$i.$j} . "</td>";
								echo "<td>". ${$ypsos.$i.$j} . "</td>";
								echo "<td></td><td>" . ${$u_anoig.$i.$j} . "</td>";
								echo "<td>" . ${"epifaneia_anoigmatos_d".$i.$j} . "</td>";
								echo "<td>" . ${"thermogefyres_anoig_d".$i.$j} . "</td><td></td>";
								echo "<td>" . ${$drop_syr.$i.$j} . "</td>";
								echo "<td>" . ${"dieisdysi_d".$i.$j} . "</td></tr>";
								
								}
						
						}
						
			echo "</table>";
			
			//Προβολή όψεων.Συμβαδίζει αυτός ο αριθμός με το σχέδιο. Αν όχι λάθος στην είσοδο των δεδομένων για τους τοίχους
			echo "<br/><font color=\"blue\"> Διαστάσεις κατασκευής </font>";
			echo "<br/>Όψη Β:" . $mikos_toixoy_b . " m";
			echo "<br/>Όψη Α:" . $mikos_toixoy_a . " m";
			echo "<br/>Όψη N:" . $mikos_toixoy_n . " m";
			echo "<br/>Όψη Δ:" . $mikos_toixoy_d . " m";
			echo "<br/>Περίμετρος ορόφου:" . $perimetros . " m";
			echo "<br/>Όγκος ορόφου:" . $synolikos_ogkos . " m3<br/><br/>";
			
			//τράβα από το αρχείο τον πίνακα με τα σύνολα των επιφανειών
			include_once("includes/pinakas_synolo_domikwn.php");
			
			
			echo "<br/><font color=\"blue\"> Έλεγχος θερμομονωτικής επάρκειας </font>";
			//Στοιχεία θερμοπερατότητας:
			echo "<br/><table bgcolor=\"cyan\" border=\"1\"><tr><td>Είδος</td><td>Επιφάνεια Α</td><td>U*A</td></tr>";
			echo "<tr><td>Στοιχεία κατακόρυφων αδιαφανών</td><td>" . $a_kat_adiafanwn . "</td><td>" . $ua_kat_adiafanwn . "</td></tr>";
			echo "<tr><td>Στοιχεία οριζόντιων αδιαφανών</td><td>" . $a_oriz_adiafanwn . "</td><td>" . $ua_oriz_adiafanwn . "</td></tr>";
			echo "<tr><td>Στοιχεία διαφανών</td><td>" . $a_diafanwn . "</td><td>" . $ua_diafanwn . "</td></tr>";
			echo "<tr><td>Σύνολο</td><td>" . $a_thermoperatotitas . "</td><td>" . $ua_thermoperatotitas . "</td></tr></table>";
			
			//Στοιχεία θερμογεφυρών:
			echo "<br/>U*A θερμογεφυρών :<b>" . $thermogefyres . "</b>";
			$sunolo_ua = $thermogefyres + $ua_thermoperatotitas;
			echo "<br/>Σύνολικό U*A  :<b>" . $sunolo_ua . "</b>";
			$uadiaa = $sunolo_ua / $a_thermoperatotitas;
			
			
			//Έλεγχος ζώνης και θερμομονωτικής επάρκειας
			$aprosv = $a_thermoperatotitas / $synolikos_ogkos;
			echo "<br/>A/V  :<b>" . $aprosv . "</b><br/>";
			$sqltable = "thermo_eparkeia_u";
			//βρες τις γραμμές πριν και μετά
			$array_aprosv = get_ua($aprosv);
			$grammi1 = $array_aprosv[0];
			$grammi2 = $array_aprosv[1];
			
			if (!isset($grammi2)){
			$umax1 = get_thermoeparkeia($zwni, $sqltable, $grammi1);
			$umax = $umax1[0][0]; 
			} 
			else {
			$umax11 = get_thermoeparkeia($zwni, $sqltable, $grammi1);
			$umax1 = $umax11[0][0];
			$umax21 = get_thermoeparkeia($zwni, $sqltable, $grammi2);
			$umax2 = $umax21[0][0];
			$umax = palindromisi($grammi1,$grammi2,$umax1,$umax2,$aprosv);
			
			}
			echo "<br/>Τιμή (U*A)/Α  :<b>" . $uadiaa  . "</b>";
			echo "<br/>Η μέγιστη επιτρεπόμενη τιμή μέσου συντελεστή θερμοπερατότητας <br/>Um  [W/(m2·Κ)] :<b>" . $umax;
			$sygkrisiua = $uadiaa  / $umax;
			
			if ($uadiaa  <= $umax){
			echo "<font color=\"blue\"><br/>Τηρείται U=<b>" . $uadiaa . "</b> <= Umax=<b>" . $umax . "</b>.</font>";
			}
			else{
			echo "<br/><font color=\"red\">ΔΕΝ Τηρείται U<Umax καθώς U=<b>" . $uadiaa . "</b> > Umax=<b>" . $umax . "</b>.</font>";
			}
			
			
			$array_xrisis_znx = get_times("xrisi,znx_l_sq_d", "energy_conditions", $drop_xrisi);
			$xrisi_znx_iliakos = $array_xrisis_znx[0][0];
			$syntelestis_znx_iliakos = $array_xrisis_znx[0][1];
			$t_znx = 50; //Θερμοκρασία ΖΝΧ
			echo "<br/><br/><font color=\"blue\"> ZNX από ηλιακό </font><br/>Χρήση:" . $xrisi_znx_iliakos;
			echo "<br/>Απαιτούμενο ποσό ΖΝΧ: " . $syntelestis_znx_iliakos . " lt/ημέρα/μ2";
			echo "<br/>Θερμοκρασία ΖΝΧ: " . $t_znx . " οC";
			echo "<br/>Μέση πυκνότητα νερού: 0.998 Kg/lt";
			echo "<br/>Ειδική θερμότητα νερού: 4.18 KJ/(Kg.K)";
			echo "<br/>Επιφάνεια ηλιακού: " . $epif_iliakoy . "m2";
			$vd_iliakoy = $syntelestis_znx_iliakos * $synoliko_embadon;
			echo "<br/>Vd: " . $vd_iliakoy . "lt/ημέρα";
			
			//τράβα από το αρχείο τον πίνακα με τους υπολογισμούς ηλιακών
			include_once("includes/pinakas_znx_iliaka.php");
			
			
			//Έλεγχος διείσδυσης αέρα από κουφώματα
			$array_dieisdysi_aera = get_times("xrisi,nwpos_aeras_m2", "energy_conditions", $drop_xrisi);
			$syntelestis_dieisdysi_aera = $array_dieisdysi_aera[0][1];
			$apaitoymeni_dieisdysi_aera = $syntelestis_dieisdysi_aera * $synoliko_embadon;
			$dieisdysi_aera = $dieisdysi_b + $dieisdysi_a + $dieisdysi_n + $dieisdysi_d;
			
			
			echo "<br/><font color=\"blue\"><b>ΕΛΕΓΧΟΣ διείσδυσης αέρα από κουφώματα</b></font>";
			echo "<br/>Η συνολική διείσδυση αέρα από κουφώματα είναι: " . $dieisdysi_aera . " m3/h";		
			echo "<br/>Η απαιτούμενη διείσδυση αέρα είναι: " . $apaitoymeni_dieisdysi_aera . " m3/h<br/>";
			if ($apaitoymeni_dieisdysi_aera <= $dieisdysi_aera){
				echo "<font color=\"blue\"><b>Ικανοποιείται</b> η απαίτηση καθώς Απαιτούμενη διείσδυση: <b>" . $apaitoymeni_dieisdysi_aera . "</b> m3/h<b> < ή = </b>" . "Συνολική διείσδυση: <b>" . $dieisdysi_aera . "</b> m3/h</font>";
				}
				else {
				echo "<font color=\"red\"><b>Δεν ικανοποιείται</b> η απαίτηση καθώς Απαιτούμενη διείσδυση: <b>" . $apaitoymeni_dieisdysi_aera . "</b> m3/h<b> > </b>" . "Συνολική διείσδυση: <b>" . $dieisdysi_aera . "</b> m3/h</font>";
				}
			
			
			include_once("apotelesmata/kenak_excel.php");
			include_once("apotelesmata/kenak_word.php");
			
			
			}
			//εδω τελειώνει ο έλεγχος μετά το POST.
		}
		//εδω τελειώνει ο έλεγχος της φόρμας
		else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
?>