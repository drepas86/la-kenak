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



//Εάν το άνοιγμα είναι μασίφ πέρνα το στις array αδιαφανών
if (${$an."anoig_eidos".$i} == 1) {
$epifaneia_anoigmatos = ${"epifaneia_masif_".$t.$i};
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
$epifaneia_anoigmatos = ${"epifaneia_anoigmatos_".$t.$i};
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


//Μετράω τις γραμμές
$count_adiafani = count($array_adiafani_type);
$count_diafani = count($array_diafani_type);
 
 
 
 
 
 
/** PHPExcel */
date_default_timezone_set('Europe/London');
require_once '../includes/PHPExcel.php';

// Create new PHPExcel object
echo date('H:i:s') . " Νέο PHPExcel object\n";
$objPHPExcel = new PHPExcel();

//Αντίγραφο του πρώτου στυλ φύλλου σε ένα 2ο όπου θα προστεθούν μετά τα αδιαφανή.
$objWorkSheetBase = $objPHPExcel->getSheet();
$objWorkSheet1 = clone $objWorkSheetBase;
$objWorkSheet1->setTitle('Cloned Sheet');
$objPHPExcel->addSheet($objWorkSheet1);

// Set properties
$objPHPExcel->getProperties()->setCreator("la-kenak")
							 ->setLastModifiedBy("la-kenak")
							 ->setTitle("Office 2007 XLSX la-kenak Document")
							 ->setSubject("Office 2007 XLSX la-kenak Document")
							 ->setDescription("la-kenak, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Domika result file");


for ($i=1; $i<=$count_diafani; $i++){
$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue("A".$i, $array_diafani_type[$i-1])
			->setCellValue("B".$i, $array_diafani_name[$i-1])
			->setCellValue("C".$i, $array_diafani_g[$i-1])
			->setCellValue("D".$i, $array_diafani_b[$i-1])
			->setCellValue("E".$i, $array_diafani_edrom[$i-1])
			->setCellValue("F".$i, $array_diafani_typos[$i-1])
			->setCellValue("G".$i, $array_diafani_u[$i-1])
			->setCellValue("H".$i, $array_diafani_gw[$i-1])
			->setCellValue("I".$i, $array_diafani_fhorh[$i-1])
			->setCellValue("J".$i, $array_diafani_fhorc[$i-1])
			->setCellValue("K".$i, $array_diafani_fovh[$i-1])
			->setCellValue("L".$i, $array_diafani_fovc[$i-1])
			->setCellValue("M".$i, $array_diafani_ffinh[$i-1])
			->setCellValue("N".$i, $array_diafani_ffinc[$i-1]);
}

// Αλλαγή ονόματος του φύλλου 1
$objPHPExcel->getActiveSheet()->setTitle('TEE-DIAFANI');


//ΦΥΛΛΟ ΑΝΟΙΓΜΑΤΩΝ
//Ενεργό το 2ο φύλλο
$objPHPExcel->setActiveSheetIndex(1);

for ($i=1; $i<=$count_adiafani; $i++){
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue("A".$i, $array_adiafani_type[$i-1])
			->setCellValue("B".$i, $array_adiafani_name[$i-1])
			->setCellValue("C".$i, $array_adiafani_g[$i-1])
			->setCellValue("D".$i, $array_adiafani_b[$i-1])
			->setCellValue("E".$i, $array_adiafani_edrom[$i-1])
			->setCellValue("F".$i, $array_adiafani_u[$i-1])
			->setCellValue("G".$i, $array_adiafani_a[$i-1])
			->setCellValue("H".$i, $array_adiafani_e[$i-1])
			->setCellValue("I".$i, $array_adiafani_fhorh[$i-1])
			->setCellValue("J".$i, $array_adiafani_fhorc[$i-1])
			->setCellValue("K".$i, $array_adiafani_fovh[$i-1])
			->setCellValue("L".$i, $array_adiafani_fovc[$i-1])
			->setCellValue("M".$i, $array_adiafani_ffinh[$i-1])
			->setCellValue("N".$i, $array_adiafani_ffinc[$i-1]);
}



// Αλλαγή ονόματος του φύλλου 2
$objPHPExcel->getActiveSheet()->setTitle('TEE-ADIAFANI');

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
