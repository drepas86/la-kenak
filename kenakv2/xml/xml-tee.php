﻿<?php
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

include ("../includes/database.php");
include ("../includes/connection.php");
include ("../includes/functions.php");
$namefile = $_GET['name'];


//Το αρχείο των υπολογισμών
include("../includes/core-calc/core_calculate.php");



//Δημιουργία array σε μορφή για το xml του ΤΕΕ
//Ορίζω τις array για τις στηλες που θα μπούν στο τεε-κενακ (15 στήλες αδιαφανών, 14 στήλες διαφανών)
$array_adiafani_type = array();
$array_adiafani_name = array();
$array_adiafani_g = array();
$array_adiafani_b = array();
$array_adiafani_edrom = array();
$array_adiafani_u = array();
$array_adiafani_a = array();
$array_adiafani_e = array();
$array_adiafani_fhorh = array();
$array_adiafani_fhorc = array();
$array_adiafani_fovh = array();
$array_adiafani_fovc = array();
$array_adiafani_ffinh = array();
$array_adiafani_ffinc = array();

$array_diafani_type = array();
$array_diafani_name = array();
$array_diafani_g = array();
$array_diafani_b = array();
$array_diafani_edrom = array();
$array_diafani_typos = array();
$array_diafani_u = array();
$array_diafani_gw = array();
$array_diafani_fhorh = array();
$array_diafani_fhorc = array();
$array_diafani_fovh = array();
$array_diafani_fovc = array();
$array_diafani_ffinh = array();
$array_diafani_ffinc = array();


//Για τους 4 προσανατολισμούς tων τοίχων
for ($p=4;$p<=7;$p++){
if ($p==4)$st=$t_boreia;
if ($p==5)$st=$t_anatolika;
if ($p==6)$st=$t_notia;
if ($p==7)$st=$t_dytika;

//Για κάθε στοιχείο του προσανατολισμού
for ($i = 1; $i <= $st; $i++) {
$type_toixwn = "Τοίχος";
$type_ypost = "Τοίχος";
$type_syr = "Τοίχος";
$klisi_epifaneias = "90";
$a_epifaneias = "0.40";
$e_epifaneias = "0.80";
if ($p==4){
$t = "b";
$an = "an_b_";
$sk = "sk_t_b_";
$prosanatolismos = "0";
for ($z = 1; $z <= $skiaseis_t_b; $z++){
			if (${"id_".$t.$i} == ${$sk."id_toixoy".$z}){
			$fhorh_epifaneias = ${$sk."f_hor_h".$z};
			$fhorc_epifaneias = ${$sk."f_hor_c".$z};
			$fovh_epifaneias = ${$sk."f_ov_c".$z};
			$fovc_epifaneias = ${$sk."f_ov_c".$z};
			$ffinh_epifaneias = ${$sk."f_fin_c".$z};
			$ffinc_epifaneias = ${$sk."f_fin_c".$z};
			}
			else{
			$fhorh_epifaneias = "1";
			$fhorc_epifaneias = "1";
			$fovh_epifaneias = "1";
			$fovc_epifaneias = "1";
			$ffinh_epifaneias = "1";
			$ffinc_epifaneias = "1";
			}
		}
}

if ($p==5){
$t = "a";
$an = "an_a_";
$sk = "sk_t_a_";
$prosanatolismos = "90";
for ($z = 1; $z <= $skiaseis_t_a; $z++){
			if (${"id_".$t.$i} == ${$sk."id_toixoy".$z}){
			$fhorh_epifaneias = ${$sk."f_hor_h".$z};
			$fhorc_epifaneias = ${$sk."f_hor_c".$z};
			$fovh_epifaneias = ${$sk."f_ov_c".$z};
			$fovc_epifaneias = ${$sk."f_ov_c".$z};
			$ffinh_epifaneias = ${$sk."f_fin_c".$z};
			$ffinc_epifaneias = ${$sk."f_fin_c".$z};
			}
			else{
			$fhorh_epifaneias = "1";
			$fhorc_epifaneias = "1";
			$fovh_epifaneias = "1";
			$fovc_epifaneias = "1";
			$ffinh_epifaneias = "1";
			$ffinc_epifaneias = "1";
			}
		}
}

if ($p==6){
$t = "n";
$an = "an_n_";
$sk = "sk_t_n_";
$prosanatolismos = "180";
for ($z = 1; $z <= $skiaseis_t_n; $z++){
			if (${"id_".$t.$i} == ${$sk."id_toixoy".$z}){
			$fhorh_epifaneias = ${$sk."f_hor_h".$z};
			$fhorc_epifaneias = ${$sk."f_hor_c".$z};
			$fovh_epifaneias = ${$sk."f_ov_c".$z};
			$fovc_epifaneias = ${$sk."f_ov_c".$z};
			$ffinh_epifaneias = ${$sk."f_fin_c".$z};
			$ffinc_epifaneias = ${$sk."f_fin_c".$z};
			}
			else{
			$fhorh_epifaneias = "1";
			$fhorc_epifaneias = "1";
			$fovh_epifaneias = "1";
			$fovc_epifaneias = "1";
			$ffinh_epifaneias = "1";
			$ffinc_epifaneias = "1";
			}
		}
}

if ($p==7){
$t = "d";
$onoma = ${"name_d".$i};
$an = "an_d_";
$sk = "sk_t_d_";
$prosanatolismos = "270";
for ($z = 1; $z <= $skiaseis_t_d; $z++){
			if (${"id_".$t.$i} == ${$sk."id_toixoy".$z}){
			$fhorh_epifaneias = ${$sk."f_hor_h".$z};
			$fhorc_epifaneias = ${$sk."f_hor_c".$z};
			$fovh_epifaneias = ${$sk."f_ov_c".$z};
			$fovc_epifaneias = ${$sk."f_ov_c".$z};
			$ffinh_epifaneias = ${$sk."f_fin_c".$z};
			$ffinc_epifaneias = ${$sk."f_fin_c".$z};
			}
			else{
			$fhorh_epifaneias = "1";
			$fhorc_epifaneias = "1";
			$fovh_epifaneias = "1";
			$fovc_epifaneias = "1";
			$ffinh_epifaneias = "1";
			$ffinc_epifaneias = "1";
			}
		}
}

//Προσθήκη στο τέλος της κάθε array των τιμών για κάθε επανάληψη.
if (${"epifaneia_toixoy_syr_".$t.$i} != 0){
array_push($array_adiafani_type, $type_toixwn, $type_ypost, $type_syr);
array_push($array_adiafani_name, ${"name_".$t.$i}, "Δοκοί-Υποστ. ".${"name_".$t.$i}, "Συρόμ. ".${"name_".$t.$i});
array_push($array_adiafani_g, $prosanatolismos, $prosanatolismos, $prosanatolismos);
array_push($array_adiafani_b, $klisi_epifaneias, $klisi_epifaneias, $klisi_epifaneias);
array_push($array_adiafani_edrom, ${"epifaneia_dromikoy_".$t.$i}, (${"epifaneia_dokos_".$t.$i} + ${"epifaneia_ypost_".$t.$i}), ${"epifaneia_toixoy_syr_".$t.$i});
array_push($array_adiafani_u, ${"u_".$t.$i}, ${"u_dok_".$t.$i}, ${"u_syr_".$t.$i});
array_push($array_adiafani_a, $a_epifaneias, $a_epifaneias, $a_epifaneias);
array_push($array_adiafani_e, $e_epifaneias, $e_epifaneias, $e_epifaneias);
array_push($array_adiafani_fhorh, $fhorh_epifaneias, $fhorh_epifaneias, $fhorh_epifaneias);
array_push($array_adiafani_fhorc, $fhorc_epifaneias, $fhorc_epifaneias, $fhorc_epifaneias);
array_push($array_adiafani_fovh, $fovh_epifaneias, $fovh_epifaneias, $fovh_epifaneias);
array_push($array_adiafani_fovc, $fovc_epifaneias, $fovc_epifaneias, $fovc_epifaneias);
array_push($array_adiafani_ffinh, $ffinh_epifaneias, $ffinh_epifaneias, $ffinh_epifaneias);
array_push($array_adiafani_ffinc, $ffinc_epifaneias, $ffinc_epifaneias, $ffinc_epifaneias);
}
if (${"epifaneia_toixoy_syr_".$t.$i} == 0){
array_push($array_adiafani_type, $type_toixwn, $type_ypost);
array_push($array_adiafani_name, ${"name_".$t.$i}, "Δοκοί-Υποστ. ".${"name_".$t.$i});
array_push($array_adiafani_g, $prosanatolismos, $prosanatolismos);
array_push($array_adiafani_b, $klisi_epifaneias, $klisi_epifaneias);
array_push($array_adiafani_edrom, ${"epifaneia_dromikoy_".$t.$i}, (${"epifaneia_dokos_".$t.$i} + ${"epifaneia_ypost_".$t.$i}));
array_push($array_adiafani_u, ${"u_".$t.$i}, ${"u_dok_".$t.$i});
array_push($array_adiafani_a, $a_epifaneias, $a_epifaneias);
array_push($array_adiafani_e, $e_epifaneias, $e_epifaneias);
array_push($array_adiafani_fhorh, $fhorh_epifaneias, $fhorh_epifaneias);
array_push($array_adiafani_fhorc, $fhorc_epifaneias, $fhorc_epifaneias);
array_push($array_adiafani_fovh, $fovh_epifaneias, $fovh_epifaneias);
array_push($array_adiafani_fovc, $fovc_epifaneias, $fovc_epifaneias);
array_push($array_adiafani_ffinh, $ffinh_epifaneias, $ffinh_epifaneias);
array_push($array_adiafani_ffinc, $ffinc_epifaneias, $ffinc_epifaneias);
}




}

}

/*
$array_diafani_type = array();
$array_diafani_name = array();
$array_diafani_g = array();
$array_diafani_b = array();
$array_diafani_edrom = array();
$array_diafani_typos = array();
$array_diafani_u = array();
$array_diafani_gw = array();
$array_diafani_fhorh = array();
$array_diafani_fhorc = array();
$array_diafani_fovh = array();
$array_diafani_fovc = array();
$array_diafani_ffinh = array();
$array_diafani_ffinc = array();
*/
//Για τους 4 προσανατολισμούς tων ανοιγμάτων
for ($p=4;$p<=7;$p++){

$gw_an = "0.52";
$klisi_an = "90";

for ($i = 1; $i <= $st; $i++) {
if ($p==4){
$prosanatolismos = "0";
$st=$anoig_t_boreia;
$an = "an_b_";
$sk = "sk_an_b_";
	for ($z = 1; $z <= $skiaseis_anoig_b; $z++){
			if (${$an."id".$i} == ${$sk."id_an".$z}){
			$fhorh_an = ${$sk."f_hor_h".$z};
			$fhorc_an = ${$sk."f_hor_c".$z};
			$fovh_an = ${$sk."f_ov_c".$z};
			$fovc_an = ${$sk."f_ov_c".$z};
			$ffinh_an = ${$sk."f_fin_c".$z};
			$ffinc_an = ${$sk."f_fin_c".$z};
			}
			else{
			$fhorh_an = "1";
			$fhorc_an = "1";
			$fovh_an = "1";
			$fovc_an = "1";
			$ffinh_an = "1";
			$ffinc_an = "1";
			}
	}
}

if ($p==5){
$prosanatolismos = "90";
$st=$anoig_t_anatolika;
$an = "an_a_";
$sk = "sk_an_a_";
	for ($z = 1; $z <= $skiaseis_anoig_a; $z++){
			if (${$an."id".$i} == ${$sk."id_an".$z}){
			$fhorh_an = ${$sk."f_hor_h".$z};
			$fhorc_an = ${$sk."f_hor_c".$z};
			$fovh_an = ${$sk."f_ov_c".$z};
			$fovc_an = ${$sk."f_ov_c".$z};
			$ffinh_an = ${$sk."f_fin_c".$z};
			$ffinc_an = ${$sk."f_fin_c".$z};
			}
			else{
			$fhorh_an = "1";
			$fhorc_an = "1";
			$fovh_an = "1";
			$fovc_an = "1";
			$ffinh_an = "1";
			$ffinc_an = "1";
			}
	}
}

if ($p==6){
$prosanatolismos = "180";
$st=$anoig_t_notia;
$an = "an_n_";
$sk = "sk_an_n_";
	for ($z = 1; $z <= $skiaseis_anoig_n; $z++){
			if (${$an."id".$i} == ${$sk."id_an".$z}){
			$fhorh_an = ${$sk."f_hor_h".$z};
			$fhorc_an = ${$sk."f_hor_c".$z};
			$fovh_an = ${$sk."f_ov_c".$z};
			$fovc_an = ${$sk."f_ov_c".$z};
			$ffinh_an = ${$sk."f_fin_c".$z};
			$ffinc_an = ${$sk."f_fin_c".$z};
			}
			else{
			$fhorh_an = "1";
			$fhorc_an = "1";
			$fovh_an = "1";
			$fovc_an = "1";
			$ffinh_an = "1";
			$ffinc_an = "1";
			}
	}
}

if ($p==7){
$prosanatolismos = "270";
$st=$anoig_t_dytika;
$an = "an_d_";
$sk = "sk_an_d_";
	for ($z = 1; $z <= $skiaseis_anoig_d; $z++){
			if (${$an."id".$i} == ${$sk."id_an".$z}){
			$fhorh_an = ${$sk."f_hor_h".$z};
			$fhorc_an = ${$sk."f_hor_c".$z};
			$fovh_an = ${$sk."f_ov_c".$z};
			$fovc_an = ${$sk."f_ov_c".$z};
			$ffinh_an = ${$sk."f_fin_c".$z};
			$ffinc_an = ${$sk."f_fin_c".$z};
			}
			else{
			$fhorh_an = "1";
			$fhorc_an = "1";
			$fovh_an = "1";
			$fovc_an = "1";
			$ffinh_an = "1";
			$ffinc_an = "1";
			}
	}
}

if (${$an."anoig_eidos".$i} == 1) {
$type_anoigmatwn = "Πόρτα";
$typos_an = "Αδιαφανής πόρτα";
}//Αδιαφανής πόρτα

if (${$an."anoig_eidos".$i} == 2) {
$type_anoigmatwn = "Μη ανοιγόμενο κούφωμα";
$typos_an = "Συρόμενο παράθυρο";
}//Συρόμενο παράθυρο

if (${$an."anoig_eidos".$i} == 3) {
$type_anoigmatwn = "Ανοιγόμενο κούφωμα";
$typos_an = "Ανοιγόμενο παράθυρο";
}//Ανοιγόμενο παράθυρο

if (${$an."anoig_eidos".$i} == 4) {
$type_anoigmatwn = "Μη ανοιγόμενο κούφωμα";
$typos_an = "Επάλληλο παράθυρο";
}//Επάλληλο παράθυρο

if (${$an."anoig_eidos".$i} == 5) {
$type_anoigmatwn = "Μη ανοιγόμενο κούφωμα";
$typos_an = "Συρόμενη πόρτα μονή";
}//Συρόμενη πόρτα μονή

if (${$an."anoig_eidos".$i} == 6) {
$type_anoigmatwn = "Μη ανοιγόμενο κούφωμα";
$typos_an = "Συρόμενη πόρτα διπλή";
}//Συρόμενη πόρτα διπλή

if (${$an."anoig_eidos".$i} == 7) {
$type_anoigmatwn = "Ανοιγόμενο κούφωμα";
$typos_an = "Ανοιγόμενη πόρτα μονή";
}//Ανοιγόμενη πόρτα μονή

if (${$an."anoig_eidos".$i} == 8) {
$type_anoigmatwn = "Ανοιγόμενο κούφωμα";
$typos_an = "Ανοιγόμενη πόρτα διπλή";
}//Ανοιγόμενη πόρτα διπλή

if (${$an."anoig_eidos".$i} == 9) {
$type_anoigmatwn = "Μη ανοιγόμενο κούφωμα";
$typos_an = "Επάλληλη πόρτα";
}//Επάλληλη πόρτα



//Εάν το άνοιγμα είναι μασίφ πέρνα το στις array αδιαφανών
if (${$an."anoig_eidos".$i} == 1) {
$epifaneia_anoigmatos = ${"epifaneia_masif_b".$i};
array_push($array_adiafani_type, $type_anoigmatwn);
array_push($array_adiafani_name, ${$an."name".$i});
array_push($array_adiafani_g, $prosanatolismos);
array_push($array_adiafani_b, $klisi_an);
array_push($array_adiafani_edrom, $epifaneia_anoigmatos);
array_push($array_adiafani_u, ${$an."anoig_u".$i});
array_push($array_adiafani_a, "0.80");
array_push($array_adiafani_e, "0.80");
array_push($array_adiafani_fhorh, $fhorh_an);
array_push($array_adiafani_fhorc, $fhorc_an);
array_push($array_adiafani_fovh, $fovh_an);
array_push($array_adiafani_fovc, $fovc_an);
array_push($array_adiafani_ffinh, $ffinh_an);
array_push($array_adiafani_ffinc, $ffinc_an);
}

//Εάν το άνοιγμα δεν είναι μασίφ (όλες οι άλλες περιπτώσεις) πέρνα το στις array διαφανών
if (${$an."anoig_eidos".$i} != 1) {
$epifaneia_anoigmatos = ${"epifaneia_anoigmatos_b".$i};
array_push($array_diafani_type, $type_anoigmatwn);
array_push($array_diafani_name, ${$an."name".$i});
array_push($array_diafani_g, $prosanatolismos);
array_push($array_diafani_b, $klisi_an);
array_push($array_diafani_edrom, $epifaneia_anoigmatos);
array_push($array_diafani_typos, $typos_an);
array_push($array_diafani_u, ${$an."anoig_u".$i});
array_push($array_diafani_gw, $gw_an);
array_push($array_diafani_fhorh, $fhorh_an);
array_push($array_diafani_fhorc, $fhorc_an);
array_push($array_diafani_fovh, $fovh_an);
array_push($array_diafani_fovc, $fovc_an);
array_push($array_diafani_ffinh, $ffinh_an);
array_push($array_diafani_ffinc, $ffinc_an);
}


}
}


//Οι παρακάτω είναι και οι μεταβλητές που περνάνε στα αδιαφανή του tee-kenak.

//Μετράω τις γραμμές πριν χωρίσω σε κόμμα από τις array
$count_adiafani = count($array_adiafani_type);
$count_diafani = count($array_diafani_type);
 
//Μετατροπή των array σε τιμές χωρισμένες με κόμμα.
$array_adiafani_type = implode(",", $array_adiafani_type);
$array_adiafani_name = implode(",", $array_adiafani_name);
$array_adiafani_g = implode(",", $array_adiafani_g);
$array_adiafani_b = implode(",", $array_adiafani_b);
$array_adiafani_edrom = implode(",", $array_adiafani_edrom);
$array_adiafani_u = implode(",", $array_adiafani_u);
$array_adiafani_a = implode(",", $array_adiafani_a);
$array_adiafani_e = implode(",", $array_adiafani_e);
$array_adiafani_fhorh = implode(",", $array_adiafani_fhorh);
$array_adiafani_fhorc = implode(",", $array_adiafani_fhorc);
$array_adiafani_fovh = implode(",", $array_adiafani_fovh);
$array_adiafani_fovc = implode(",", $array_adiafani_fovc);
$array_adiafani_ffinh = implode(",", $array_adiafani_ffinh);
$array_adiafani_ffinc = implode(",", $array_adiafani_ffinc);

$array_diafani_type = implode(",", $array_diafani_type);
$array_diafani_name = implode(",", $array_diafani_name);
$array_diafani_g = implode(",", $array_diafani_g);
$array_diafani_b = implode(",", $array_diafani_b);
$array_diafani_edrom = implode(",", $array_diafani_edrom);
$array_diafani_typos = implode(",", $array_diafani_typos);
$array_diafani_u = implode(",", $array_diafani_u);
$array_diafani_gw = implode(",", $array_diafani_gw);
$array_diafani_fhorh = implode(",", $array_diafani_fhorh);
$array_diafani_fhorc = implode(",", $array_diafani_fhorc);
$array_diafani_fovh = implode(",", $array_diafani_fovh);
$array_diafani_fovc = implode(",", $array_diafani_fovc);
$array_diafani_ffinh = implode(",", $array_diafani_ffinh);
$array_diafani_ffinc = implode(",", $array_diafani_ffinc);

//Για έλεγχο ότι όντως έχω όλες τις τιμές.
//echo $array_adiafani_name;
//echo "<br/>";
//echo $array_diafani_name;
//echo "<br/>";



//Μεταφορά xml-schema για το ΤΕΕ-ΚΕΝΑΚ
//***********************************************************************************************************
$tab = "\t";
$br = "\n";
$xml = '<?xml version="1.0" encoding="UTF-8"?>'.$br;
$xml .= '<ENR_IN>'.$br;
	$xml .= '<EPA_NR_PROJECT rid="#1">'.$br;
		$xml .= '<id/>'.$br;
			$xml .= '<blg_use>'.$xrisi_id.'</blg_use>'.$br;
			$xml .= '<blg_part>0</blg_part>'.$br;
			$xml .= '<building_num/>'.$br;
			$xml .= '<blg_kaek/>'.$br;
			$xml .= '<blg_owner>'.$owner.'</blg_owner>'.$br;
			$xml .= '<blg_ownership>'.$owner_status.'</blg_ownership>'.$br;
			$xml .= '<blg_address>'.$address.'</blg_address>'.$br;
			$xml .= '<blg_resp>'.$contact_type.'</blg_resp>'.$br;
			$xml .= '<blg_resp_name>'.$contact_name.'</blg_resp_name>'.$br;
			$xml .= '<blg_resp_phone>'.$contact_tel.'</blg_resp_phone>'.$br;
			$xml .= '<blg_resp_mail>'.$contact_mail.'</blg_resp_mail>'.$br;
			$xml .= '<blg_zone>'.$xml_zwni.'</blg_zone>'.$br;
			$xml .= '<blg_height>0</blg_height>'.$br;
			$xml .= '<blg_climate>'.($climate_data_id-1).'</blg_climate>'.$br;
			$xml .= '<blg_datasource>0000000000</blg_datasource>'.$br;
			$xml .= '<blg_licence_data>'.$pol_grafeio.','.$pol_year.','.$pol_number.','.$pol_year_complete.',,,,,,,,,,,,,</blg_licence_data>'.$br;
			$xml .= '<version_tee_kenak_dll>1.28.1.70</version_tee_kenak_dll>'.$br;
	$xml .= '</EPA_NR_PROJECT>'.$br;	
	
	$xml .= '<LIBRARIES rid="#2">'.$br;
		$xml .= '<id>Lib</id>'.$br;
		$xml .= '<lib_const>C:\Program Files\TEE\TEE KENAK\EnrConstGr.xml</lib_const>'.$br;
		$xml .= '<lib_clim>C:\Program Files\TEE\TEE KENAK\EnrClimateGR.xml</lib_clim>'.$br;
		$xml .= '<lib_fuel>C:\Program Files\TEE\TEE KENAK\EnrFuelGr.xml</lib_fuel>'.$br;
	$xml .= '</LIBRARIES>'.$br;
	
	$xml .= '<BUILDING rid="1">'.$br;
		$xml .= '<blg_parameter1>'.$synoliko_embadon.'</blg_parameter1>'.$br;
		$xml .= '<blg_parameter2>0</blg_parameter2>'.$br;
		$xml .= '<blg_parameter3>0</blg_parameter3>'.$br;
		$xml .= '<blg_parameter4>0</blg_parameter4>'.$br;
		$xml .= '<blg_parameter5>'.$synolikos_ogkos.'</blg_parameter5>'.$br;
		$xml .= '<blg_parameter6>0</blg_parameter6>'.$br;
		$xml .= '<blg_parameter7>0</blg_parameter7>'.$br;
		$xml .= '<blg_parameter8>0</blg_parameter8>'.$br;
		$xml .= '<blg_parameter9>0</blg_parameter9>'.$br;
		$xml .= '<blg_parameter10>-1</blg_parameter10>'.$br;
		$xml .= '<blg_parameter11>1</blg_parameter11>'.$br;
		$xml .= '<blg_parameter12>1</blg_parameter12>'.$br;
		$xml .= '<blg_parameter13>0</blg_parameter13>'.$br;
		$xml .= '<blg_parameter14>'.$xrisi_znx_iliakos.'</blg_parameter14>'.$br;
		$xml .= '<blg_parameter15>0000</blg_parameter15>'.$br;
		$xml .= '<blg_parameter16>1</blg_parameter16>'.$br;
		$xml .= '<blg_parameter17>0</blg_parameter17>'.$br;
		$xml .= '<blg_parameter18/>'.$br;
		$xml .= '<blg_parameter19>0</blg_parameter19>'.$br;
		$xml .= '<blg_parameter20/>'.$br;
		$xml .= '<blg_parameter21>0</blg_parameter21>'.$br;
		$xml .= '<blg_parameter22/>'.$br;
		$xml .= '<blg_parameter23/>'.$br;
		$xml .= '<blg_parameter24/>'.$br;
		$xml .= '<blg_parameter25/>'.$br;
		$xml .= '<blg_parameter26>0</blg_parameter26>'.$br;
		$xml .= '<blg_parameter27>0</blg_parameter27>'.$br;
		$xml .= '<blg_parameter28/>'.$br;
		$xml .= '<blg_parameter29>0</blg_parameter29>'.$br;
		$xml .= '<blg_parameter30>0</blg_parameter30>'.$br;
		$xml .= '<blg_parameter31/>'.$br;
		$xml .= '<blg_parameter32>0</blg_parameter32>'.$br;
		$xml .= '<blg_parameter33>'.$xrisi_znx_iliakos.'</blg_parameter33>'.$br;
		$xml .= '<blg_parameter34>'.$pol_type.'</blg_parameter34>'.$br;
		$xml .= ''.$br;
		$xml .= ''.$br;
		$xml .= ''.$br;
			$xml .= '<ZONE1 rid="1">'.$br;
				$xml .= '<zn_parameter1>'.$xrisi_text.'</zn_parameter1>'.$br;
				$xml .= '<zn_parameter2/>'.$br;
				$xml .= '<zn_parameter3>'.$synoliko_embadon.'</zn_parameter3>'.$br;
				$xml .= '<zn_parameter4>'.$kataskeyi_stoixeia_anigmeni_thermo.'</zn_parameter4>'.$br;
				$xml .= '<zn_parameter5>'.$kataskeyi_stoixeia_aytomatismoi.'</zn_parameter5>'.$br;
				$xml .= '<zn_parameter6>'.$dieisdysi_aera.'</zn_parameter6>'.$br;
				$xml .= '<zn_parameter7>'.$kataskeyi_stoixeia_kaminades.'</zn_parameter7>'.$br;
				$xml .= '<zn_parameter8>'.$kataskeyi_stoixeia_eksaerismos.'</zn_parameter8>'.$br;
				$xml .= '<zn_parameter9>'.$kataskeyi_stoixeia_anem_orofis.'</zn_parameter9>'.$br;
				$xml .= '<zn_parameter10>0</zn_parameter10>'.$br;
				$xml .= '<zn_parameter11>1</zn_parameter11>'.$br;
				$xml .= '<zn_parameter12>'.$mesi_katanalwsi_znx.'</zn_parameter12>'.$br;
					$xml .= '<ENVELOPE rid="1">'.$br;
						$xml .= '<opaque_rows>'.$count_adiafani.'</opaque_rows>'.$br;
						$xml .= '<opaque_column1>'.$array_adiafani_type.',</opaque_column1>'.$br;
						$xml .= '<opaque_column2>'.$array_adiafani_name.',</opaque_column2>'.$br;
						$xml .= '<opaque_column3>'.$array_adiafani_g.',</opaque_column3>'.$br;
						$xml .= '<opaque_column4>'.$array_adiafani_b.',</opaque_column4>'.$br;
						$xml .= '<opaque_column5>'.$array_adiafani_edrom.',</opaque_column5>'.$br;
						$xml .= '<opaque_column6>'.$array_adiafani_u.',</opaque_column6>'.$br;
						$xml .= '<opaque_column7>'.$array_adiafani_a.',</opaque_column7>'.$br;//παλιά μορφή αρχείου. Δεν εμφανίζεται.
						$xml .= '<opaque_column8>'.$array_adiafani_a.',</opaque_column8>'.$br;
						$xml .= '<opaque_column9>'.$array_adiafani_e.',</opaque_column9>'.$br;
						$xml .= '<opaque_column10>'.$array_adiafani_fhorh.',</opaque_column10>'.$br;
						$xml .= '<opaque_column11>'.$array_adiafani_fhorc.',</opaque_column11>'.$br;
						$xml .= '<opaque_column12>'.$array_adiafani_fovh.',</opaque_column12>'.$br;
						$xml .= '<opaque_column13>'.$array_adiafani_fovc.',</opaque_column13>'.$br;
						$xml .= '<opaque_column14>'.$array_adiafani_ffinh.',</opaque_column14>'.$br;
						$xml .= '<opaque_column15>'.$array_adiafani_ffinc.',</opaque_column15>'.$br;
						$xml .= '<opaque_column16>,,,,,,,</opaque_column16>'.$br;
						$xml .= '<ground_rows>1</ground_rows>'.$br;
						$xml .= '<ground_column1>Δάπεδο,</ground_column1>'.$br;
						$xml .= '<ground_column2>Δάπεδο επί εδάφους,</ground_column2>'.$br;
						$xml .= '<ground_column3>'.$dapedo_embadon1.',</ground_column3>'.$br;
						$xml .= '<ground_column4>'.$dapedo_u1.',</ground_column4>'.$br;
						$xml .= '<ground_column5>0,</ground_column5>'.$br;
						$xml .= '<ground_column6>0,</ground_column6>'.$br;
						$xml .= '<ground_column7>'.$perimetros_dapedoy.',</ground_column7>'.$br;
						$xml .= '<ground_column8>,</ground_column8>'.$br;
						$xml .= '<transparent_rows>'.$count_diafani.'</transparent_rows>'.$br;
						$xml .= '<transparent_column1>'.$array_diafani_type.',</transparent_column1>'.$br;
						$xml .= '<transparent_column2>'.$array_diafani_name.',</transparent_column2>'.$br;
						$xml .= '<transparent_column3>'.$array_diafani_g.',</transparent_column3>'.$br;
						$xml .= '<transparent_column4>'.$array_diafani_b.',</transparent_column4>'.$br;
						$xml .= '<transparent_column5>'.$array_diafani_edrom.',</transparent_column5>'.$br;
						$xml .= '<transparent_column6>'.$array_diafani_typos.',</transparent_column6>'.$br;
						$xml .= '<transparent_column7>'.$array_adiafani_u.',</transparent_column7>'.$br;
						$xml .= '<transparent_column8>'.$array_adiafani_gw.',</transparent_column8>'.$br;
						$xml .= '<transparent_column9>'.$array_diafani_fhorh.',</transparent_column9>'.$br;
						$xml .= '<transparent_column10>'.$array_diafani_fhorc.',</transparent_column10>'.$br;
						$xml .= '<transparent_column11>'.$array_diafani_fovh.',</transparent_column11>'.$br;
						$xml .= '<transparent_column12>'.$array_diafani_fovc.',</transparent_column12>'.$br;
						$xml .= '<transparent_column13>'.$array_diafani_ffinh.',</transparent_column13>'.$br;
						$xml .= '<transparent_column14>'.$array_diafani_ffinc.',</transparent_column14>'.$br;
						$xml .= '<transparent_column15>,,,,,,,,,,,,,,,,,,,,,,</transparent_column15>'.$br;
						$xml .= '<opaque_tb_rows>0</opaque_tb_rows>'.$br;
						$xml .= '<opaque_tb_column1/>'.$br;
						$xml .= '<opaque_tb_column2/>'.$br;
						$xml .= '<opaque_tb_column3/>'.$br;
						$xml .= '<internal_nodes>0</internal_nodes>'.$br;
						$xml .= '<direct_benefit_exist>0</direct_benefit_exist>'.$br;
						$xml .= '<direct_benefit_rows>40</direct_benefit_rows>'.$br;
						$xml .= '<direct_benefit_column1>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column1>'.$br;
						$xml .= '<direct_benefit_column2>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column2>'.$br;
						$xml .= '<direct_benefit_column3>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column3>'.$br;
						$xml .= '<direct_benefit_column4>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column4>'.$br;
						$xml .= '<direct_benefit_column5>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column5>'.$br;
						$xml .= '<direct_benefit_column6>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column6>'.$br;
						$xml .= '<direct_benefit_column7>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column7>'.$br;
						$xml .= '<direct_benefit_column8>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column8>'.$br;
						$xml .= '<direct_benefit_column9>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column9>'.$br;
						$xml .= '<direct_benefit_column10>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column10>'.$br;
						$xml .= '<direct_benefit_column11>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column11>'.$br;
						$xml .= '<direct_benefit_column12>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column12>'.$br;
						$xml .= '<direct_benefit_column13>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column13>'.$br;
						$xml .= '<direct_benefit_column14>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column14>'.$br;
						$xml .= '<direct_benefit_column15>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column15>'.$br;
						$xml .= '<direct_benefit_column16>,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,</direct_benefit_column16>'.$br;
							$xml .= '<internal1 rid="1">'.$br;
								$xml .= '<space_between>0</space_between>'.$br;
								$xml .= '<opaque_rows>1</opaque_rows>'.$br;
								$xml .= '<opaque_column1>,</opaque_column1>'.$br;
								$xml .= '<opaque_column2>,</opaque_column2>'.$br;
								$xml .= '<opaque_column3>,</opaque_column3>'.$br;
								$xml .= '<opaque_column4>,</opaque_column4>'.$br;
								$xml .= '<opaque_column5>,</opaque_column5>'.$br;
								$xml .= '<opaque_column6>,</opaque_column6>'.$br;
								$xml .= '<opaque_column7>,</opaque_column7>'.$br;
								$xml .= '<opaque_column8>,</opaque_column8>'.$br;
								$xml .= '<opaque_column9>,</opaque_column9>'.$br;
								$xml .= '<opaque_column10>,</opaque_column10>'.$br;
								$xml .= '<opaque_column11>,</opaque_column11>'.$br;
								$xml .= '<opaque_column12>,</opaque_column12>'.$br;
								$xml .= '<opaque_column13>,</opaque_column13>'.$br;
								$xml .= '<opaque_column14>,</opaque_column14>'.$br;
								$xml .= '<opaque_column15>,</opaque_column15>'.$br;
								$xml .= '<opaque_column16>,</opaque_column16>'.$br;
								$xml .= '<transparent_rows>0</transparent_rows>'.$br;
								$xml .= '<transparent_column1/>'.$br;
								$xml .= '<transparent_column2/>'.$br;
								$xml .= '<transparent_column3/>'.$br;
								$xml .= '<transparent_column4/>'.$br;
								$xml .= '<transparent_column5/>'.$br;
								$xml .= '<transparent_column6/>'.$br;
								$xml .= '<transparent_column7/>'.$br;
								$xml .= '<transparent_column8/>'.$br;
								$xml .= '<transparent_column9/>'.$br;
								$xml .= '<transparent_column10/>'.$br;
								$xml .= '<transparent_column11/>'.$br;
								$xml .= '<transparent_column12/>'.$br;
								$xml .= '<transparent_column13/>'.$br;
								$xml .= '<transparent_column14/>'.$br;
								$xml .= '<transparent_column15/>'.$br;
								$xml .= '<opaque_tb_rows>0</opaque_tb_rows>'.$br;
								$xml .= '<opaque_tb_column1/>'.$br;
								$xml .= '<opaque_tb_column2/>'.$br;
								$xml .= '<opaque_tb_column3/>'.$br;
							$xml .= '</internal1>'.$br;	
					$xml .= '</ENVELOPE>'.$br;
					
					$xml .= '<SYSTEM rid="1">'.$br;

$xml .= '<heating rid="1">'.$br.
'<heating_exists>1</heating_exists>'.$br.
'<production_rows>1</production_rows>'.$br.
'<production_column1>Λέβητας,</production_column1>'.$br.
'<production_column2>Fuel oil,</production_column2>'.$br.
'<production_column3>110,</production_column3>'.$br.
'<production_column4>0.66,</production_column4>'.$br.
'<production_column5>1.0,</production_column5>'.$br.
'<production_column6>1,</production_column6>'.$br.
'<production_column7>1,</production_column7>'.$br.
'<production_column8>1,</production_column8>'.$br.
'<production_column9>1,</production_column9>'.$br.
'<production_column10>0,</production_column10>'.$br.
'<production_column11>0,</production_column11>'.$br.
'<production_column12>0,</production_column12>'.$br.
'<production_column13>0,</production_column13>'.$br.
'<production_column14>0,</production_column14>'.$br.
'<production_column15>1,</production_column15>'.$br.
'<production_column16>1,</production_column16>'.$br.
'<production_column17>1,</production_column17>'.$br.
'<production_column18>,</production_column18>'.$br.
'<distribution_rows>2</distribution_rows>'.$br.
'<distribution_column1>Δίκτυο διανομής θερμού μέσου,Αεραγωγοί,</distribution_column1>'.$br.
'<distribution_column2>7,,</distribution_column2>'.$br.
'<distribution_column3>Εσωτερικοί  ή έως και 20% σε εξωτερικούς,,</distribution_column3>'.$br.
'<distribution_column4>85,,</distribution_column4>'.$br.
'<distribution_column5>70,,</distribution_column5>'.$br.
'<distribution_column6>0.915,,</distribution_column6>'.$br.
'<distribution_column7>False,False,</distribution_column7>'.$br.
'<distribution_column8>,,</distribution_column8>'.$br.
'<termatic_rows>1</termatic_rows>'.$br.
'<termatic_column1>σωματα καλοριφερ,</termatic_column1>'.$br.
'<termatic_column2>0.89,</termatic_column2>'.$br.
'<termatic_column3>,</termatic_column3>'.$br.
'<auxiliary_rows>1</auxiliary_rows>'.$br.
'<auxiliary_column1>Κυκλοφορητές,</auxiliary_column1>'.$br.
'<auxiliary_column2>1,</auxiliary_column2>'.$br.
'<auxiliary_column3>0.50,</auxiliary_column3>'.$br.
'</heating>'.$br;



$xml .= '<cooling rid="1">'.$br.
'<cooling_exists>1</cooling_exists>'.$br.
'<production_rows>1</production_rows>'.$br.
'<production_column1>Αερόψυκτος ψύκτης,</production_column1>'.$br.
'<production_column2>Electricity,</production_column2>'.$br.
'<production_column3>70.4,</production_column3>'.$br.
'<production_column4>1.0,</production_column4>'.$br.
'<production_column5>1.5,</production_column5>'.$br.
'<production_column6>0,</production_column6>'.$br.
'<production_column7>0,</production_column7>'.$br.
'<production_column8>0,</production_column8>'.$br.
'<production_column9>0,</production_column9>'.$br.
'<production_column10>0,</production_column10>'.$br.
'<production_column11>0.5,</production_column11>'.$br.
'<production_column12>0.5,</production_column12>'.$br.
'<production_column13>0.5,</production_column13>'.$br.
'<production_column14>0.5,</production_column14>'.$br.
'<production_column15>0,</production_column15>'.$br.
'<production_column16>0,</production_column16>'.$br.
'<production_column17>0,</production_column17>'.$br.
'<production_column18>,</production_column18>'.$br.
'<distribution_rows>2</distribution_rows>'.$br.
'<distribution_column1>Δίκτυο διανομής ψυχρού μέσου,Αεραγωγοί,</distribution_column1>'.$br.
'<distribution_column2>,,</distribution_column2>'.$br.
'<distribution_column3>Εσωτερικοί  ή έως και 20% σε εξωτερικούς,,</distribution_column3>'.$br.
'<distribution_column4>1,,</distribution_column4>'.$br.
'<distribution_column5>False,False,</distribution_column5>'.$br.
'<distribution_column6>,,</distribution_column6>'.$br.
'<termatic_rows>1</termatic_rows>'.$br.
'<termatic_column1>τοπικές αντλίες θερμότητας,</termatic_column1>'.$br.
'<termatic_column2>0.93,</termatic_column2>'.$br.
'<termatic_column3>,</termatic_column3>'.$br.
'<auxiliary_rows>1</auxiliary_rows>'.$br.
'<auxiliary_column1>,</auxiliary_column1>'.$br.
'<auxiliary_column2>0,</auxiliary_column2>'.$br.
'<auxiliary_column3>0,</auxiliary_column3>'.$br.
'</cooling>'.$br;

$xml .= '<humidification rid="1">'.$br.
'<humidification_exists/>'.$br.
'<production_rows/>'.$br.
'<production_column1/>'.$br.
'<production_column2/>'.$br.
'<production_column3/>'.$br.
'<production_column4/>'.$br.
'<production_column5/>'.$br.
'<production_column6/>'.$br.
'<production_column7/>'.$br.
'<production_column8/>'.$br.
'<production_column9/>'.$br.
'<production_column10/>'.$br.
'<production_column11/>'.$br.
'<production_column12/>'.$br.
'<production_column13/>'.$br.
'<production_column14/>'.$br.
'<production_column15/>'.$br.
'<production_column16/>'.$br.
'<production_column17/>'.$br.
'<distribution_rows>1</distribution_rows>'.$br.
'<distribution_column1>,</distribution_column1>'.$br.
'<distribution_column2>,</distribution_column2>'.$br.
'<distribution_column3>,</distribution_column3>'.$br.
'<distribution_column4>,</distribution_column4>'.$br.
'<termatic_rows>1</termatic_rows>'.$br.
'<termatic_column1>,</termatic_column1>'.$br.
'<termatic_column2>,</termatic_column2>'.$br.
'<termatic_column3>,</termatic_column3>'.$br.
'</humidification>'.$br;


$xml .= '<ahu rid="1">'.$br.
'<ahu_exists/>'.$br.
'<ahu_rows/>'.$br.
'<ahu_column1/>'.$br.
'<ahu_column2/>'.$br.
'<ahu_column3/>'.$br.
'<ahu_column4/>'.$br.
'<ahu_column5/>'.$br.
'<ahu_column6/>'.$br.
'<ahu_column7/>'.$br.
'<ahu_column8/>'.$br.
'<ahu_column9/>'.$br.
'<ahu_column10/>'.$br.
'<ahu_column11/>'.$br.
'<ahu_column12/>'.$br.
'<ahu_column13/>'.$br.
'<ahu_column14/>'.$br.
'<ahu_column15/>'.$br.
'<ahu_column16/>'.$br.
'</ahu>'.$br;


$xml .= '<dhw rid="1">'.$br.
'<dhw_exists>1</dhw_exists>'.$br.
'<production_rows>1</production_rows>'.$br.
'<production_column1>Λέβητας,</production_column1>'.$br.
'<production_column2>Fuel oil,</production_column2>'.$br.
'<production_column3>40,</production_column3>'.$br.
'<production_column4>1.0,</production_column4>'.$br.
'<production_column5>1,</production_column5>'.$br.
'<production_column6>1,</production_column6>'.$br.
'<production_column7>1,</production_column7>'.$br.
'<production_column8>1,</production_column8>'.$br.
'<production_column9>1,</production_column9>'.$br.
'<production_column10>1,</production_column10>'.$br.
'<production_column11>1,</production_column11>'.$br.
'<production_column12>1,</production_column12>'.$br.
'<production_column13>1,</production_column13>'.$br.
'<production_column14>1,</production_column14>'.$br.
'<production_column15>1,</production_column15>'.$br.
'<production_column16>1,</production_column16>'.$br.
'<production_column17>,</production_column17>'.$br.
'<distribution_rows>1</distribution_rows>'.$br.
'<distribution_column1>,</distribution_column1>'.$br.
'<distribution_column2>False,</distribution_column2>'.$br.
'<distribution_column3>Εσωτερικοί  ή έως και 20% σε εξωτερικούς,</distribution_column3>'.$br.
'<distribution_column4>1,</distribution_column4>'.$br.
'<distribution_column5>,</distribution_column5>'.$br.
'<termatic_rows>1</termatic_rows>'.$br.
'<termatic_column1>θερμαντήρες σε εσ.χωρ.,</termatic_column1>'.$br.
'<termatic_column2>0.98,</termatic_column2>'.$br.
'<termatic_column3>,</termatic_column3>'.$br.
'</dhw>'.$br;


$xml .= '<solar_collector rid="1">'.$br.
'<solar_collector_exists>0</solar_collector_exists>'.$br.
'<solar_collector_rows>1</solar_collector_rows>'.$br.
'<solar_collector_column1>Απλός επίπεδος,</solar_collector_column1>'.$br.
'<solar_collector_column2>False,</solar_collector_column2>'.$br.
'<solar_collector_column3>True,</solar_collector_column3>'.$br.
'<solar_collector_column4>0.30,</solar_collector_column4>'.$br.
'<solar_collector_column5>,</solar_collector_column5>'.$br.
'<solar_collector_column6>25,</solar_collector_column6>'.$br.
'<solar_collector_column7>180,</solar_collector_column7>'.$br.
'<solar_collector_column8>40.5,</solar_collector_column8>'.$br.
'<solar_collector_column9>1,</solar_collector_column9>'.$br.
'<solar_collector_column10>,</solar_collector_column10>'.$br.
'</solar_collector>'.$br;



$xml .= '<lighting rid="1">'.$br.
'<lighting_exists>0</lighting_exists>'.$br.
'<lighting_parameter1/>'.$br.
'<lighting_parameter2/>'.$br.
'<lighting_parameter3/>'.$br.
'<lighting_parameter4/>'.$br.
'<lighting_parameter5/>'.$br.
'<lighting_parameter6/>'.$br.
'<lighting_parameter7/>'.$br.
'<lighting_parameter8/>'.$br.
'</lighting>'.$br;





$xml .= '<UNHEATED1 rid="1">'.$br.
'<un_parameter1>89.60</un_parameter1>'.$br.
'<un_parameter2>270</un_parameter2>'.$br.
'<ENVELOPE rid="1">'.$br.
'<opaque_rows>7</opaque_rows>'.$br.
'<opaque_column1>Τοίχος,Τοίχος,Τοίχος,Τοίχος,Τοίχος,Οροφή,Τοίχος,</opaque_column1>'.$br.
'<opaque_column2>Φωταγωγός,απ.κλ.νότια,απ.κλ.ανατολικά,απ.κλ.βόρεια,απ.κλ.δυτικά,απ.κλ.δώμα,εισοδος,</opaque_column2>'.$br.
'<opaque_column3>0,180,90,0,270,0,0,</opaque_column3>'.$br.
'<opaque_column4>90,90,90,90,90,0,90,</opaque_column4>'.$br.
'<opaque_column5>18,7,9,7,9,8,40.6,</opaque_column5>'.$br.
'<opaque_column6>3.4,2.2,2.2,2.2,2.2,3.05,2.2,</opaque_column6>'.$br.
'<opaque_column7>0.04,0.04,0.04,0.04,0.04,0.04,0.04,</opaque_column7>'.$br.
'<opaque_column8>0.40,0.4,0.4,0.4,0.4,0.80,0.4,</opaque_column8>'.$br.
'<opaque_column9>0.80,0.8,0.8,0.8,0.8,0.8,0.8,</opaque_column9>'.$br.
'<opaque_column10>0,0.9,0.9,0.9,0.9,1,0,</opaque_column10>'.$br.
'<opaque_column11>0,0.9,0.9,0.9,0.9,1,0,</opaque_column11>'.$br.
'<opaque_column12>1,1,1,1,1,1,1,</opaque_column12>'.$br.
'<opaque_column13>1,1,1,1,1,1,1,</opaque_column13>'.$br.
'<opaque_column14>1,1,1,1,1,1,1,</opaque_column14>'.$br.
'<opaque_column15>1,1,1,1,1,1,1,</opaque_column15>'.$br.
'<opaque_column16>,,,,,,,</opaque_column16>'.$br.
'<ground_rows>2</ground_rows>'.$br.
'<ground_column1>Τοίχος,Δάπεδο,</ground_column1>'.$br.
'<ground_column2>κλιμακοστάσιο,δάπεδο κλιμ.,</ground_column2>'.$br.
'<ground_column3>40.6,8,</ground_column3>'.$br.
'<ground_column4>2.09,3.1,</ground_column4>'.$br.
'<ground_column5>3,3,</ground_column5>'.$br.
'<ground_column6>,,</ground_column6>'.$br.
'<ground_column7>,11.50,</ground_column7>'.$br.
'<ground_column8>,,</ground_column8>'.$br.
'<transparent_rows>0</transparent_rows>'.$br.
'<transparent_column1/>'.$br.
'<transparent_column2/>'.$br.
'<transparent_column3/>'.$br.
'<transparent_column4/>'.$br.
'<transparent_column5/>'.$br.
'<transparent_column6/>'.$br.
'<transparent_column7/>'.$br.
'<transparent_column8/>'.$br.
'<transparent_column9/>'.$br.
'<transparent_column10/>'.$br.
'<transparent_column11/>'.$br.
'<transparent_column12/>'.$br.
'<transparent_column13/>'.$br.
'<transparent_column14/>'.$br.
'<transparent_column15/>'.$br.
'<opaque_tb_rows>0</opaque_tb_rows>'.$br.
'<opaque_tb_column1/>'.$br.
'<opaque_tb_column2/>'.$br.
'<opaque_tb_column3/>'.$br.
'</ENVELOPE>'.$br.
'</UNHEATED1>'.$br;

					$xml .= '</SYSTEM>'.$br;

			$xml .= '</ZONE1>'.$br;
		$xml .= '</BUILDING>'.$br;
$xml .= '</ENR_IN>'.$br;


//Τέλος σώσε το αρχείο
$handle = fopen('tee-kenak-'.$namefile.'.xml','w+');
fwrite($handle,$xml);
echo "Το αρχείο " . 'tee' . "-kenak-" . $namefile . ".xml" . " εγγράφηκε επιτυχώς";
fclose($handle);

?>
