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

include ("../includes/database.php");
include ("../includes/connection.php");
include ("../includes/functions.php");
$namefile = $_GET['name'];


//Το αρχείο των υπολογισμών
include("../includes/core-calc/core_calculate_anazwni.php");


$strSQL = "SELECT * FROM kataskeyi_zwnes";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$arithmos_thermzwnes = mysql_num_rows($objQuery);

$i = 0;
while($objResult = mysql_fetch_array($objQuery))
{
$i++;
${"thermiki_zwni".$i} = $objResult["id"];
//Δημιουργία array σε μορφή για το xml του ΤΕΕ
//Ορίζω τις array για τις στηλες που θα μπούν στο τεε-κενακ (15 στήλες αδιαφανών, 14 στήλες διαφανών)
${"array_adiafani_type".$i} = array();
${"array_adiafani_name".$i} = array();
${"array_adiafani_g".$i} = array();
${"array_adiafani_b".$i} = array();
${"array_adiafani_edrom".$i} = array();
${"array_adiafani_u".$i} = array();
${"array_adiafani_a".$i} = array();
${"array_adiafani_e".$i} = array();
${"array_adiafani_fhorh".$i} = array();
${"array_adiafani_fhorc".$i} = array();
${"array_adiafani_fovh".$i} = array();
${"array_adiafani_fovc".$i} = array();
${"array_adiafani_ffinh".$i} = array();
${"array_adiafani_ffinc".$i} = array();

${"array_diafani_type".$i} = array();
${"array_diafani_name".$i} = array();
${"array_diafani_g".$i} = array();
${"array_diafani_b".$i} = array();
${"array_diafani_edrom".$i} = array();
${"array_diafani_typos".$i} = array();
${"array_diafani_u".$i} = array();
${"array_diafani_gw".$i} = array();
${"array_diafani_fhorh".$i} = array();
${"array_diafani_fhorc".$i} = array();
${"array_diafani_fovh".$i} = array();
${"array_diafani_fovc".$i} = array();
${"array_diafani_ffinh".$i} = array();
${"array_diafani_ffinc".$i} = array();
}

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



for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {


if (${"id_zwnis_".$t.$i} == ${"thermiki_zwni".$z}) { //ο τοίχος ανήκει σε αυτή τη ζώνη

//Προσθήκη στο τέλος της κάθε array των τιμών για κάθε επανάληψη.
if (${"epifaneia_toixoy_syr_".$t.$i} != 0){
array_push(${"array_adiafani_type".$z}, $type_toixwn, $type_ypost, $type_syr);
array_push(${"array_adiafani_name".$z}, ${"name_".$t.$i}, "Δοκοί-Υποστ. ".${"name_".$t.$i}, "Συρόμ. ".${"name_".$t.$i});
array_push(${"array_adiafani_g".$z}, $prosanatolismos, $prosanatolismos, $prosanatolismos);
array_push(${"array_adiafani_b".$z}, $klisi_epifaneias, $klisi_epifaneias, $klisi_epifaneias);
array_push(${"array_adiafani_edrom".$z}, ${"epifaneia_dromikoy_".$t.$i}, (${"epifaneia_dokos_".$t.$i} + ${"epifaneia_ypost_".$t.$i}), ${"epifaneia_toixoy_syr_".$t.$i});
array_push(${"array_adiafani_u".$z}, ${"u_".$t.$i}, ${"u_dok_".$t.$i}, ${"u_syr_".$t.$i});
array_push(${"array_adiafani_a".$z}, $a_epifaneias, $a_epifaneias, $a_epifaneias);
array_push(${"array_adiafani_e".$z}, $e_epifaneias, $e_epifaneias, $e_epifaneias);
array_push(${"array_adiafani_fhorh".$z}, $fhorh_epifaneias, $fhorh_epifaneias, $fhorh_epifaneias);
array_push(${"array_adiafani_fhorc".$z}, $fhorc_epifaneias, $fhorc_epifaneias, $fhorc_epifaneias);
array_push(${"array_adiafani_fovh".$z}, $fovh_epifaneias, $fovh_epifaneias, $fovh_epifaneias);
array_push(${"array_adiafani_fovc".$z}, $fovc_epifaneias, $fovc_epifaneias, $fovc_epifaneias);
array_push(${"array_adiafani_ffinh".$z}, $ffinh_epifaneias, $ffinh_epifaneias, $ffinh_epifaneias);
array_push(${"array_adiafani_ffinc".$z}, $ffinc_epifaneias, $ffinc_epifaneias, $ffinc_epifaneias);
}
if (${"epifaneia_toixoy_syr_".$t.$i} == 0){
array_push(${"array_adiafani_type".$z}, $type_toixwn, $type_ypost);
array_push(${"array_adiafani_name".$z}, ${"name_".$t.$i}, "Δοκοί-Υποστ. ".${"name_".$t.$i});
array_push(${"array_adiafani_g".$z}, $prosanatolismos, $prosanatolismos);
array_push(${"array_adiafani_b".$z}, $klisi_epifaneias, $klisi_epifaneias);
array_push(${"array_adiafani_edrom".$z}, ${"epifaneia_dromikoy_".$t.$i}, (${"epifaneia_dokos_".$t.$i} + ${"epifaneia_ypost_".$t.$i}));
array_push(${"array_adiafani_u".$z}, ${"u_".$t.$i}, ${"u_dok_".$t.$i});
array_push(${"array_adiafani_a".$z}, $a_epifaneias, $a_epifaneias);
array_push(${"array_adiafani_e".$z}, $e_epifaneias, $e_epifaneias);
array_push(${"array_adiafani_fhorh".$z}, $fhorh_epifaneias, $fhorh_epifaneias);
array_push(${"array_adiafani_fhorc".$z}, $fhorc_epifaneias, $fhorc_epifaneias);
array_push(${"array_adiafani_fovh".$z}, $fovh_epifaneias, $fovh_epifaneias);
array_push(${"array_adiafani_fovc".$z}, $fovc_epifaneias, $fovc_epifaneias);
array_push(${"array_adiafani_ffinh".$z}, $ffinh_epifaneias, $ffinh_epifaneias);
array_push(${"array_adiafani_ffinc".$z}, $ffinc_epifaneias, $ffinc_epifaneias);
}

}//ο τοίχος δεν ανήκει σε αυτή τη ζώνη
}//τελειώνει η επανάληψη για τις ζώνες


}//τελειώνει η επανάληψη των τοίχων

}//τελειώνει η επανάληψη των προσανατολισμών

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
$t = "b";
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
$t = "a";
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
$t = "n";
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
$t = "d";
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


for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {

$id_zwnis_an_array = get_times("id_zwnis", "kataskeyi_t_".$t, ${$an."id_toixoy".$i});
$id_zwnis_an = $id_zwnis_an_array[0][0];
if ($id_zwnis_an == ${"thermiki_zwni".$z}) {


//Εάν το άνοιγμα είναι μασίφ πέρνα το στις array αδιαφανών
if (${$an."anoig_eidos".$i} == 1) {
$epifaneia_anoigmatos = ${"epifaneia_masif_".$t.$i};
array_push(${"array_adiafani_type".$z}, $type_anoigmatwn);
array_push(${"array_adiafani_name".$z}, ${$an."name".$i});
array_push(${"array_adiafani_g".$z}, $prosanatolismos);
array_push(${"array_adiafani_b".$z}, $klisi_an);
array_push(${"array_adiafani_edrom".$z}, $epifaneia_anoigmatos);
array_push(${"array_adiafani_u".$z}, ${$an."anoig_u".$i});
array_push(${"array_adiafani_a".$z}, "0.80");
array_push(${"array_adiafani_e".$z}, "0.80");
array_push(${"array_adiafani_fhorh".$z}, $fhorh_an);
array_push(${"array_adiafani_fhorc".$z}, $fhorc_an);
array_push(${"array_adiafani_fovh".$z}, $fovh_an);
array_push(${"array_adiafani_fovc".$z}, $fovc_an);
array_push(${"array_adiafani_ffinh".$z}, $ffinh_an);
array_push(${"array_adiafani_ffinc".$z}, $ffinc_an);
}

//Εάν το άνοιγμα δεν είναι μασίφ (όλες οι άλλες περιπτώσεις) πέρνα το στις array διαφανών
if (${$an."anoig_eidos".$i} != 1) {
$epifaneia_anoigmatos = ${"epifaneia_anoigmatos_".$t.$i};
array_push(${"array_diafani_type".$z}, $type_anoigmatwn);
array_push(${"array_diafani_name".$z}, ${$an."name".$i});
array_push(${"array_diafani_g".$z}, $prosanatolismos);
array_push(${"array_diafani_b".$z}, $klisi_an);
array_push(${"array_diafani_edrom".$z}, $epifaneia_anoigmatos);
array_push(${"array_diafani_typos".$z}, $typos_an);
array_push(${"array_diafani_u".$z}, ${$an."anoig_u".$i});
array_push(${"array_diafani_gw".$z}, $gw_an);
array_push(${"array_diafani_fhorh".$z}, $fhorh_an);
array_push(${"array_diafani_fhorc".$z}, $fhorc_an);
array_push(${"array_diafani_fovh".$z}, $fovh_an);
array_push(${"array_diafani_fovc".$z}, $fovc_an);
array_push(${"array_diafani_ffinh".$z}, $ffinh_an);
array_push(${"array_diafani_ffinc".$z}, $ffinc_an);
}


}//το άνοιγμα ανήκει σε αυτή τη ζώνη
}//τελειώνει η επανάληψη των θερμικών ζωνών

}//τελειώνει η επανάληψη των ανοιγμάτων
}//τελειώνει η επανάληψη των προσανατολισμών


//Μετράω τις γραμμές
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
${"count_adiafani".$z} = count(${"array_adiafani_type".$z});
${"count_diafani".$z} = count(${"array_diafani_type".$z});
}
 
 
 
 
 
/** PHPExcel */
date_default_timezone_set('Europe/London');
require_once '../includes/PHPExcel.php';

// Create new PHPExcel object
echo date('H:i:s') . " Νέο PHPExcel object\n";
$objPHPExcel = new PHPExcel();

for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
//Αντίγραφο του πρώτου στυλ φύλλου σε ένα 2ο όπου θα προστεθούν μετά τα αδιαφανή.
$objWorkSheetBase = $objPHPExcel->getSheet();
${"objWorkSheet".$z} = clone $objWorkSheetBase;
${"objWorkSheet".$z}->setTitle('sheet'.$z);
$objPHPExcel->addSheet(${"objWorkSheet".$z});

$objWorkSheetBase = $objPHPExcel->getSheet();
${"objWorkSheet".$z+1} = clone $objWorkSheetBase;
${"objWorkSheet".$z+1}->setTitle('sheet'.$z);
$objPHPExcel->addSheet(${"objWorkSheet".$z+1});
}

// Ενεργό το φύλλο 1
$objPHPExcel->setActiveSheetIndex(0);

// Set properties
$objPHPExcel->getProperties()->setCreator("la-kenak")
							 ->setLastModifiedBy("la-kenak")
							 ->setTitle("Office 2007 XLSX la-kenak Document")
							 ->setSubject("Office 2007 XLSX la-kenak Document")
							 ->setDescription("la-kenak, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Domika result file");


for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {

for ($i=1; $i<=${"count_diafani".$z}; $i++){
$objPHPExcel->setActiveSheetIndex($z)
            ->setCellValue("A".$i, ${"array_diafani_type".$z}[$i-1])
			->setCellValue("B".$i, ${"array_diafani_name".$z}[$i-1])
			->setCellValue("C".$i, ${"array_diafani_g".$z}[$i-1])
			->setCellValue("D".$i, ${"array_diafani_b".$z}[$i-1])
			->setCellValue("E".$i, ${"array_diafani_edrom".$z}[$i-1])
			->setCellValue("F".$i, ${"array_diafani_typos".$z}[$i-1])
			->setCellValue("G".$i, ${"array_diafani_u".$z}[$i-1])
			->setCellValue("H".$i, ${"array_diafani_gw".$z}[$i-1])
			->setCellValue("I".$i, ${"array_diafani_fhorh".$z}[$i-1])
			->setCellValue("J".$i, ${"array_diafani_fhorc".$z}[$i-1])
			->setCellValue("K".$i, ${"array_diafani_fovh".$z}[$i-1])
			->setCellValue("L".$i, ${"array_diafani_fovc".$z}[$i-1])
			->setCellValue("M".$i, ${"array_diafani_ffinh".$z}[$i-1])
			->setCellValue("N".$i, ${"array_diafani_ffinc".$z}[$i-1]);
}
// Αλλαγή ονόματος του φύλλου 1
$objPHPExcel->getActiveSheet()->setTitle('DIAFAN-zwni'.$z);
}



//ΦΥΛΛΟ ΑΝΟΙΓΜΑΤΩΝ

for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {

$objPHPExcel->setActiveSheetIndex($arithmos_thermzwnes+$z);

for ($i=1; $i<=${"count_adiafani".$z}; $i++){
$objPHPExcel->setActiveSheetIndex($arithmos_thermzwnes+$z)
            ->setCellValue("A".$i, ${"array_adiafani_type".$z}[$i-1])
			->setCellValue("B".$i, ${"array_adiafani_name".$z}[$i-1])
			->setCellValue("C".$i, ${"array_adiafani_g".$z}[$i-1])
			->setCellValue("D".$i, ${"array_adiafani_b".$z}[$i-1])
			->setCellValue("E".$i, ${"array_adiafani_edrom".$z}[$i-1])
			->setCellValue("F".$i, ${"array_adiafani_u".$z}[$i-1])
			->setCellValue("G".$i, ${"array_adiafani_a".$z}[$i-1])
			->setCellValue("H".$i, ${"array_adiafani_e".$z}[$i-1])
			->setCellValue("I".$i, ${"array_adiafani_fhorh".$z}[$i-1])
			->setCellValue("J".$i, ${"array_adiafani_fhorc".$z}[$i-1])
			->setCellValue("K".$i, ${"array_adiafani_fovh".$z}[$i-1])
			->setCellValue("L".$i, ${"array_adiafani_fovc".$z}[$i-1])
			->setCellValue("M".$i, ${"array_adiafani_ffinh".$z}[$i-1])
			->setCellValue("N".$i, ${"array_adiafani_ffinc".$z}[$i-1]);
}
// Αλλαγή ονόματος του φύλλου 2
$objPHPExcel->getActiveSheet()->setTitle('ADIAF-zwni'.$z);
}




// Ενεργό το φύλλο 1
$objPHPExcel->setActiveSheetIndex(0);

// Save Excel 2007 file
echo "<br/>" . date('H:i:s') . " Εγγραφή σε Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Echo memory peak usage
echo "<br/>" . date('H:i:s') . " Χρήση μέγιστης μνήμης: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Echo done
echo "<br/>" . date('H:i:s') . " Εγγράφηκε το αρχείο.\r\n";
echo "<br/>" . "<a href=\"excel-domika.xlsx\" >Κατεβάστε το αρχείο XLSX</a>";

?>
