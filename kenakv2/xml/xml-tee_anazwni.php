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

$kataskeyi_meletistopo_array = get_times_all("*", "kataskeyi_meletis_topo");
$prosanatolismos_b = $kataskeyi_meletistopo_array[0]["prosb"];

//$prosanatolismos_b="0";
$prosanatolismos_a = $prosanatolismos_b + 90;
if ($prosanatolismos_a>=360){$prosanatolismos_a=$prosanatolismos_a-360;}
$prosanatolismos_n = $prosanatolismos_b + 180;
if ($prosanatolismos_n>=360){$prosanatolismos_n=$prosanatolismos_n-360;}
$prosanatolismos_d = $prosanatolismos_b + 270;
if ($prosanatolismos_d>=360){$prosanatolismos_d=$prosanatolismos_d-360;}

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
$prosanatolismos = ${"prosanatolismos_".$t};

$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_b WHERE id_toixoy = ".${"id_".$t.$i};
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_results = mysql_num_rows($objQuery);
$objResult = mysql_fetch_array($objQuery);
if ($num_results > 0){ 
$fhorh_epifaneias = $objResult["f_hor_h"];
$fhorc_epifaneias = $objResult["f_hor_c"];
$fovh_epifaneias = $objResult["f_ov_h"];
$fovc_epifaneias = $objResult["f_ov_c"];
$ffinh_epifaneias = $objResult["f_fin_h"];
$ffinc_epifaneias = $objResult["f_fin_c"];
}
if ($num_results == 0){ 
$fhorh_epifaneias = 1;
$fhorc_epifaneias = 1;
$fovh_epifaneias = 1;
$fovc_epifaneias = 1;
$ffinh_epifaneias = 1;
$ffinc_epifaneias = 1;
}
/*
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
*/		
}

if ($p==5){
$t = "a";
$an = "an_a_";
$sk = "sk_t_a_";
$prosanatolismos = ${"prosanatolismos_".$t};

$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_a WHERE id_toixoy = ".${"id_".$t.$i};
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_results = mysql_num_rows($objQuery);
$objResult = mysql_fetch_array($objQuery);
if ($num_results > 0){ 
$fhorh_epifaneias = $objResult["f_hor_h"];
$fhorc_epifaneias = $objResult["f_hor_c"];
$fovh_epifaneias = $objResult["f_ov_h"];
$fovc_epifaneias = $objResult["f_ov_c"];
$ffinh_epifaneias = $objResult["f_fin_h"];
$ffinc_epifaneias = $objResult["f_fin_c"];
}
if ($num_results == 0){ 
$fhorh_epifaneias = 1;
$fhorc_epifaneias = 1;
$fovh_epifaneias = 1;
$fovc_epifaneias = 1;
$ffinh_epifaneias = 1;
$ffinc_epifaneias = 1;
}
/*
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
*/		
}

if ($p==6){
$t = "n";
$an = "an_n_";
$sk = "sk_t_n_";
$prosanatolismos = ${"prosanatolismos_".$t};

$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_n WHERE id_toixoy = ".${"id_".$t.$i};
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_results = mysql_num_rows($objQuery);
$objResult = mysql_fetch_array($objQuery);
if ($num_results > 0){ 
$fhorh_epifaneias = $objResult["f_hor_h"];
$fhorc_epifaneias = $objResult["f_hor_c"];
$fovh_epifaneias = $objResult["f_ov_h"];
$fovc_epifaneias = $objResult["f_ov_c"];
$ffinh_epifaneias = $objResult["f_fin_h"];
$ffinc_epifaneias = $objResult["f_fin_c"];
}
if ($num_results == 0){ 
$fhorh_epifaneias = 1;
$fhorc_epifaneias = 1;
$fovh_epifaneias = 1;
$fovc_epifaneias = 1;
$ffinh_epifaneias = 1;
$ffinc_epifaneias = 1;
}
/*
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
*/		
}

if ($p==7){
$t = "d";
$onoma = ${"name_d".$i};
$an = "an_d_";
$sk = "sk_t_d_";
$prosanatolismos = ${"prosanatolismos_".$t};

$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_d WHERE id_toixoy = ".${"id_".$t.$i};
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_results = mysql_num_rows($objQuery);
$objResult = mysql_fetch_array($objQuery);
if ($num_results > 0){ 
$fhorh_epifaneias = $objResult["f_hor_h"];
$fhorc_epifaneias = $objResult["f_hor_c"];
$fovh_epifaneias = $objResult["f_ov_h"];
$fovc_epifaneias = $objResult["f_ov_c"];
$ffinh_epifaneias = $objResult["f_fin_h"];
$ffinc_epifaneias = $objResult["f_fin_c"];
}
if ($num_results == 0){ 
$fhorh_epifaneias = 1;
$fhorc_epifaneias = 1;
$fovh_epifaneias = 1;
$fovc_epifaneias = 1;
$ffinh_epifaneias = 1;
$ffinc_epifaneias = 1;
}
/*
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
*/		
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
$st=$anoig_t_boreia;
$an = "an_b_";
$sk = "sk_an_b_";
$t = "b";
$prosanatolismos = ${"prosanatolismos_".$t};

$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_b WHERE id_an = ".${$an."id".$i};
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_results = mysql_num_rows($objQuery);
$objResult = mysql_fetch_array($objQuery);
if ($num_results > 0){ 
$fhorh_an = $objResult["f_hor_h"];
$fhorc_an = $objResult["f_hor_c"];
$fovh_an = $objResult["f_ov_h"];
$fovc_an = $objResult["f_ov_c"];
$ffinh_an = $objResult["f_fin_h"];
$ffinc_an = $objResult["f_fin_c"];
}
if ($num_results == 0){ 
$fhorh_an = 1;
$fhorc_an = 1;
$fovh_an = 1;
$fovc_an = 1;
$ffinh_an = 1;
$ffinc_an = 1;
}
/*
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
*/	
	
}

if ($p==5){
$st=$anoig_t_anatolika;
$an = "an_a_";
$sk = "sk_an_a_";
$t = "a";
$prosanatolismos = ${"prosanatolismos_".$t};

$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_a WHERE id_an = ".${$an."id".$i};
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_results = mysql_num_rows($objQuery);
$objResult = mysql_fetch_array($objQuery);
if ($num_results > 0){ 
$fhorh_an = $objResult["f_hor_h"];
$fhorc_an = $objResult["f_hor_c"];
$fovh_an = $objResult["f_ov_h"];
$fovc_an = $objResult["f_ov_c"];
$ffinh_an = $objResult["f_fin_h"];
$ffinc_an = $objResult["f_fin_c"];
}
if ($num_results == 0){ 
$fhorh_an = 1;
$fhorc_an = 1;
$fovh_an = 1;
$fovc_an = 1;
$ffinh_an = 1;
$ffinc_an = 1;
}
/*
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
*/

}

if ($p==6){
$st=$anoig_t_notia;
$an = "an_n_";
$sk = "sk_an_n_";
$t = "n";
$prosanatolismos = ${"prosanatolismos_".$t};

$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_n WHERE id_an = ".${$an."id".$i};
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_results = mysql_num_rows($objQuery);
$objResult = mysql_fetch_array($objQuery);
if ($num_results > 0){ 
$fhorh_an = $objResult["f_hor_h"];
$fhorc_an = $objResult["f_hor_c"];
$fovh_an = $objResult["f_ov_h"];
$fovc_an = $objResult["f_ov_c"];
$ffinh_an = $objResult["f_fin_h"];
$ffinc_an = $objResult["f_fin_c"];
}
if ($num_results == 0){ 
$fhorh_an = 1;
$fhorc_an = 1;
$fovh_an = 1;
$fovc_an = 1;
$ffinh_an = 1;
$ffinc_an = 1;
}
/*
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
*/
	
}

if ($p==7){
$st=$anoig_t_dytika;
$an = "an_d_";
$sk = "sk_an_d_";
$t = "d";
$prosanatolismos = ${"prosanatolismos_".$t};

$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_d WHERE id_an = ".${$an."id".$i};
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_results = mysql_num_rows($objQuery);
$objResult = mysql_fetch_array($objQuery);
if ($num_results > 0){ 
$fhorh_an = $objResult["f_hor_h"];
$fhorc_an = $objResult["f_hor_c"];
$fovh_an = $objResult["f_ov_h"];
$fovc_an = $objResult["f_ov_c"];
$ffinh_an = $objResult["f_fin_h"];
$ffinc_an = $objResult["f_fin_c"];
}
if ($num_results == 0){ 
$fhorh_an = 1;
$fhorc_an = 1;
$fovh_an = 1;
$fovc_an = 1;
$ffinh_an = 1;
$ffinc_an = 1;
}
/*
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
*/	
	
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

//ΟΡΟΦΕΣ ΣΤΙΣ ΑΔΙΑΦΑΝΕΙΣ
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
for ($i = 1; $i <= $rows_orofes; $i++) {

if (${"orofes_id_zwnis".$i}==${"thermiki_zwni".$z}){
array_push(${"array_adiafani_type".$z}, "Οροφή");
array_push(${"array_adiafani_name".$z}, ${"orofes_name".$i});
array_push(${"array_adiafani_g".$z}, "0");
array_push(${"array_adiafani_b".$z}, "0");
array_push(${"array_adiafani_edrom".$z}, ${"orofes_emvadon".$i});
array_push(${"array_adiafani_u".$z}, ${"orofes_u".$i});
array_push(${"array_adiafani_a".$z}, "0.80");
array_push(${"array_adiafani_e".$z}, "0.80");
array_push(${"array_adiafani_fhorh".$z}, ${"orofes_f_hor_h".$i});
array_push(${"array_adiafani_fhorc".$z}, ${"orofes_f_hor_c".$i});
array_push(${"array_adiafani_fovh".$z}, ${"orofes_f_ov_h".$i});
array_push(${"array_adiafani_fovc".$z}, ${"orofes_f_ov_c".$i});
array_push(${"array_adiafani_ffinh".$z}, ${"orofes_f_fin_h".$i});
array_push(${"array_adiafani_ffinc".$z}, ${"orofes_f_fin_c".$i});
}

}
}


//Μετράω τις γραμμές
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
${"count_adiafani".$z} = count(${"array_adiafani_type".$z});
${"count_diafani".$z} = count(${"array_diafani_type".$z});
}



 
//Μετατροπή των array σε τιμές χωρισμένες με κόμμα για χρήση στο XML-TEE.

for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
${"array_adiafani_type".$z} = implode(",", ${"array_adiafani_type".$z});
${"array_adiafani_name".$z} = implode(",", ${"array_adiafani_name".$z});
${"array_adiafani_g".$z} = implode(",", ${"array_adiafani_g".$z});
${"array_adiafani_b".$z} = implode(",", ${"array_adiafani_b".$z});
${"array_adiafani_edrom".$z} = implode(",", ${"array_adiafani_edrom".$z});
${"array_adiafani_u".$z} = implode(",", ${"array_adiafani_u".$z});
${"array_adiafani_a".$z} = implode(",", ${"array_adiafani_a".$z});
${"array_adiafani_e".$z} = implode(",", ${"array_adiafani_e".$z});
${"array_adiafani_fhorh".$z} = implode(",", ${"array_adiafani_fhorh".$z});
${"array_adiafani_fhorc".$z} = implode(",", ${"array_adiafani_fhorc".$z});
${"array_adiafani_fovh".$z} = implode(",", ${"array_adiafani_fovh".$z});
${"array_adiafani_fovc".$z} = implode(",", ${"array_adiafani_fovc".$z});
${"array_adiafani_ffinh".$z} = implode(",", ${"array_adiafani_ffinh".$z});
${"array_adiafani_ffinc".$z} = implode(",", ${"array_adiafani_ffinc".$z});

${"array_diafani_type".$z} = implode(",", ${"array_diafani_type".$z});
${"array_diafani_name".$z} = implode(",", ${"array_diafani_name".$z});
${"array_diafani_g".$z} = implode(",", ${"array_diafani_g".$z});
${"array_diafani_b".$z} = implode(",", ${"array_diafani_b".$z});
${"array_diafani_edrom".$z} = implode(",", ${"array_diafani_edrom".$z});
${"array_diafani_typos".$z} = implode(",", ${"array_diafani_typos".$z});
${"array_diafani_u".$z} = implode(",", ${"array_diafani_u".$z});
${"array_diafani_gw".$z} = implode(",", ${"array_diafani_gw".$z});
${"array_diafani_fhorh".$z} = implode(",", ${"array_diafani_fhorh".$z});
${"array_diafani_fhorc".$z} = implode(",", ${"array_diafani_fhorc".$z});
${"array_diafani_fovh".$z} = implode(",", ${"array_diafani_fovh".$z});
${"array_diafani_fovc".$z} = implode(",", ${"array_diafani_fovc".$z});
${"array_diafani_ffinh".$z} = implode(",", ${"array_diafani_ffinh".$z});
${"array_diafani_ffinc".$z} = implode(",", ${"array_diafani_ffinc".$z});
}

//ΣΕ ΕΠΑΦΗ ΜΕ ΕΔΑΦΟΣ
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
for ($i=1;$i<=8;$i++){
${"ground_column".$i.$z} = array();
}
}

//Δάπεδα
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
for ($i = 1; $i <= $rows_dapedo; $i++) {

if (${"dapedo_id_zwnis".$i}==${"thermiki_zwni".$z}){
array_push(${"ground_column1".$z}, "Δάπεδο");
array_push(${"ground_column2".$z}, ${"dapedo_name".$i});
array_push(${"ground_column3".$z}, ${"dapedo_emvadon".$i});
array_push(${"ground_column4".$z}, ${"dapedo_u".$i});
array_push(${"ground_column5".$z}, ${"dapedo_bathos".$i});
array_push(${"ground_column6".$z}, "");
array_push(${"ground_column7".$z}, ${"dapedo_perimetros".$i});
}
}
}

//Τοίχοι
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
for ($i = 1; $i <= $rows_groundt; $i++) {

if (${"groundt_id_zwnis".$i}==${"thermiki_zwni".$z}){
array_push(${"ground_column1".$z}, "Τοίχος");
array_push(${"ground_column2".$z}, ${"groundt_name".$i});
array_push(${"ground_column3".$z}, ${"groundt_emvadon".$i});
array_push(${"ground_column4".$z}, ${"groundt_u".$i});
array_push(${"ground_column5".$z}, ${"groundt_k_bathos".$i});
array_push(${"ground_column6".$z}, ${"groundt_a_bathos".$i});
array_push(${"ground_column7".$z}, "");
}
}
}


//Μετράω τις γραμμές
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
${"count_ground".$z} = count(${"ground_column1".$z});
}

for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
for ($i=1;$i<=8;$i++){
${"ground_column".$i.$z} = implode(",", ${"ground_column".$i.$z});
}
}


//--------- ΣΥΣΤΗΜΑΤΑ ----------
//Στα συστήματα στάνταρ γραμμές έχουν το δίκτυο διανομής (2) και οι τερματικές μονάδες (1).
//Οι μονάδες παραγωγής και οι βοηθητικές μονάδες μπορούν να έχουν μεταβαλλόμενο πλήθος γραμμών από το χρήστη
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
for ($i=1;$i<=17;$i++){
${"heat_production_column".$i.$z} = array();
${"cold_production_column".$i.$z} = array();
${"znx_production_column".$i.$z} = array();
${"ygr_production_column".$i.$z} = array();
}

for ($i=1;$i<=16;$i++){
${"kkm_production_column".$i.$z} = array();
}

for ($i=1;$i<=8;$i++){
${"heat_distribution_column".$i.$z} = array();
${"cold_distribution_column".$i.$z} = array();
${"znx_distribution_column".$i.$z} = array();
${"ygr_distribution_column".$i.$z} = array();
}
for ($i=1;$i<=3;$i++){
${"heat_termatic_column".$i.$z} = array();
${"cold_termatic_column".$i.$z} = array();
${"znx_termatic_column".$i.$z} = array();
${"ygr_termatic_column".$i.$z} = array();

${"heat_auxiliary_column".$i.$z} = array();
${"cold_auxiliary_column".$i.$z} = array();
${"znx_auxiliary_column".$i.$z} = array();
}

for ($i=1;$i<=8;$i++){
${"light_production_column".$i.$z} = array();
}
}

//Οι τιμές των στηλών σε array. Δηλαδή όλοι οι τύποι μαζί, όλες οι μονάδες παραγωγής μαζί κ.ο.κ.
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
for ($i = 1; $i <= ${"thermp_rows".$z}; $i++) {
		if (${"thermp_type".$z.$i} == 0){${"thermp_type".$z.$i}="Λέβητας";}
		if (${"thermp_type".$z.$i} == 1){${"thermp_type".$z.$i}="Κεντρική υδρόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 2){${"thermp_type".$z.$i}="Κεντρική αερόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 3){${"thermp_type".$z.$i}="Τοπική αερόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 4){${"thermp_type".$z.$i}="Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη";}
		if (${"thermp_type".$z.$i} == 5){${"thermp_type".$z.$i}="Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη";}
		if (${"thermp_type".$z.$i} == 6){${"thermp_type".$z.$i}="Κεντρική άλλου τύπου Α.Θ.";}
		if (${"thermp_type".$z.$i} == 7){${"thermp_type".$z.$i}="Τοπικές ηλεκτρικές μονάδες (καλοριφέρ ή θερμοπομποί ή άλλο)";}
		if (${"thermp_type".$z.$i} == 8){${"thermp_type".$z.$i}="Τοπικές μονάδες αερίου ή υγρού καυσίμου";}
		if (${"thermp_type".$z.$i} == 9){${"thermp_type".$z.$i}="Ανοικτές εστίες καύσης";}
		if (${"thermp_type".$z.$i} == 10){${"thermp_type".$z.$i}="Τηλεθέρμανση";}
		if (${"thermp_type".$z.$i} == 11){${"thermp_type".$z.$i}="ΣΗΘ";}
		if (${"thermp_type".$z.$i} == 12){${"thermp_type".$z.$i}="Μονάδα παραγωγής άλλου τύπου";}
		if (${"thermp_pigienergy".$z.$i} == 0){${"thermp_pigienergy".$z.$i}="Bottle gas (LPG)";}
		if (${"thermp_pigienergy".$z.$i} == 1){${"thermp_pigienergy".$z.$i}="Natural gas";}
		if (${"thermp_pigienergy".$z.$i} == 2){${"thermp_pigienergy".$z.$i}="Electricity";}
		if (${"thermp_pigienergy".$z.$i} == 3){${"thermp_pigienergy".$z.$i}="Fuel oil";}
		if (${"thermp_pigienergy".$z.$i} == 4){${"thermp_pigienergy".$z.$i}="Fuel oil with taxis";}
		if (${"thermp_pigienergy".$z.$i} == 5){${"thermp_pigienergy".$z.$i}="District heating";}
		if (${"thermp_pigienergy".$z.$i} == 6){${"thermp_pigienergy".$z.$i}="District heating res";}
		if (${"thermp_pigienergy".$z.$i} == 7){${"thermp_pigienergy".$z.$i}="Biomass";}
		if (${"thermp_pigienergy".$z.$i} == 8){${"thermp_pigienergy".$z.$i}="Biomasst";}
		if (${"thermp_pigienergy".$z.$i} == 9){${"thermp_pigienergy".$z.$i}="ΣΗΘ1";}
		if (${"thermp_pigienergy".$z.$i} == 10){${"thermp_pigienergy".$z.$i}="ΣΗΘ2";}
		if (${"thermp_pigienergy".$z.$i} == 11){${"thermp_pigienergy".$z.$i}="ΣΗΘ3";}
		if (${"thermp_pigienergy".$z.$i} == 12){${"thermp_pigienergy".$z.$i}="ΣΗΘ4";}
		if (${"thermp_pigienergy".$z.$i} == 13){${"thermp_pigienergy".$z.$i}="ΣΗΘ5";}
		if (${"thermp_pigienergy".$z.$i} == 14){${"thermp_pigienergy".$z.$i}="ΣΗΘ6";}
		if (${"thermp_pigienergy".$z.$i} == 15){${"thermp_pigienergy".$z.$i}="ΣΗΘ7";}
		if (${"thermp_pigienergy".$z.$i} == 16){${"thermp_pigienergy".$z.$i}="ΣΗΘ8";}
		if (${"thermp_pigienergy".$z.$i} == 17){${"thermp_pigienergy".$z.$i}="ΣΗΘ9";}
		if (${"thermp_pigienergy".$z.$i} == 18){${"thermp_pigienergy".$z.$i}="ΣΗΘ10";}
array_push(${"heat_production_column1".$z}, ${"thermp_type".$z.$i});
array_push(${"heat_production_column2".$z}, ${"thermp_pigienergy".$z.$i});
array_push(${"heat_production_column3".$z}, ${"thermp_isxys".$z.$i});
array_push(${"heat_production_column4".$z}, ${"thermp_bathm".$z.$i});
array_push(${"heat_production_column5".$z}, ${"thermp_cop".$z.$i});
array_push(${"heat_production_column6".$z}, ${"thermp_jan".$z.$i});
array_push(${"heat_production_column7".$z}, ${"thermp_feb".$z.$i});
array_push(${"heat_production_column8".$z}, ${"thermp_mar".$z.$i});
array_push(${"heat_production_column9".$z}, ${"thermp_apr".$z.$i});
array_push(${"heat_production_column10".$z}, ${"thermp_may".$z.$i});
array_push(${"heat_production_column11".$z}, ${"thermp_jun".$z.$i});
array_push(${"heat_production_column12".$z}, ${"thermp_jul".$z.$i});
array_push(${"heat_production_column13".$z}, ${"thermp_aug".$z.$i});
array_push(${"heat_production_column14".$z}, ${"thermp_sep".$z.$i});
array_push(${"heat_production_column15".$z}, ${"thermp_okt".$z.$i});
array_push(${"heat_production_column16".$z}, ${"thermp_nov".$z.$i});
array_push(${"heat_production_column17".$z}, ${"thermp_decem".$z.$i});
}
for ($i = 1; $i <= ${"coldp_rows".$z}; $i++) {
		if (${"coldp_type".$z.$i} == 0){${"coldp_type".$z.$i}="Αερόψυκτος ψύκτης";}
		if (${"coldp_type".$z.$i} == 1){${"coldp_type".$z.$i}="Υδρόψυκτος ψύκτης";}
		if (${"coldp_type".$z.$i} == 2){${"coldp_type".$z.$i}="Υδρόψυκτη Α.Θ.";}
		if (${"coldp_type".$z.$i} == 3){${"coldp_type".$z.$i}="Αερόψυκτη Α.Θ.";}
		if (${"coldp_type".$z.$i} == 4){${"coldp_type".$z.$i}="Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη";}
		if (${"coldp_type".$z.$i} == 5){${"coldp_type".$z.$i}="Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη";}
		if (${"coldp_type".$z.$i} == 6){${"coldp_type".$z.$i}="Προσρόφησης απορρόφησης Α.Θ.";}
		if (${"coldp_type".$z.$i} == 7){${"coldp_type".$z.$i}="Κεντρική άλλου τύπου Α.Θ.";}
		if (${"coldp_type".$z.$i} == 8){${"coldp_type".$z.$i}="Μονάδα παραγωγής άλλου τύπου";}
		if (${"coldp_pigienergy".$z.$i} == 0){${"coldp_pigienergy".$z.$i}="Bottle gas (LPG)";}
		if (${"coldp_pigienergy".$z.$i} == 1){${"coldp_pigienergy".$z.$i}="Natural gas";}
		if (${"coldp_pigienergy".$z.$i} == 2){${"coldp_pigienergy".$z.$i}="Electricity";}
		if (${"coldp_pigienergy".$z.$i} == 3){${"coldp_pigienergy".$z.$i}="Fuel oil";}
		if (${"coldp_pigienergy".$z.$i} == 4){${"coldp_pigienergy".$z.$i}="Fuel oil with taxis";}
		if (${"coldp_pigienergy".$z.$i} == 5){${"coldp_pigienergy".$z.$i}="District heating";}
		if (${"coldp_pigienergy".$z.$i} == 6){${"coldp_pigienergy".$z.$i}="District heating res";}
		if (${"coldp_pigienergy".$z.$i} == 7){${"coldp_pigienergy".$z.$i}="Biomass";}
		if (${"coldp_pigienergy".$z.$i} == 8){${"coldp_pigienergy".$z.$i}="Biomasst";}
		if (${"coldp_pigienergy".$z.$i} == 9){${"coldp_pigienergy".$z.$i}="ΣΗΘ1";}
		if (${"coldp_pigienergy".$z.$i} == 10){${"coldp_pigienergy".$z.$i}="ΣΗΘ2";}
		if (${"coldp_pigienergy".$z.$i} == 11){${"coldp_pigienergy".$z.$i}="ΣΗΘ3";}
		if (${"coldp_pigienergy".$z.$i} == 12){${"coldp_pigienergy".$z.$i}="ΣΗΘ4";}
		if (${"coldp_pigienergy".$z.$i} == 13){${"coldp_pigienergy".$z.$i}="ΣΗΘ5";}
		if (${"coldp_pigienergy".$z.$i} == 14){${"coldp_pigienergy".$z.$i}="ΣΗΘ6";}
		if (${"coldp_pigienergy".$z.$i} == 15){${"coldp_pigienergy".$z.$i}="ΣΗΘ7";}
		if (${"coldp_pigienergy".$z.$i} == 16){${"coldp_pigienergy".$z.$i}="ΣΗΘ8";}
		if (${"coldp_pigienergy".$z.$i} == 17){${"coldp_pigienergy".$z.$i}="ΣΗΘ9";}
		if (${"coldp_pigienergy".$z.$i} == 18){${"coldp_pigienergy".$z.$i}="ΣΗΘ10";}
array_push(${"cold_production_column1".$z}, ${"coldp_type".$z.$i});
array_push(${"cold_production_column2".$z}, ${"coldp_pigienergy".$z.$i});
array_push(${"cold_production_column3".$z}, ${"coldp_isxys".$z.$i});
array_push(${"cold_production_column4".$z}, ${"coldp_bathm".$z.$i});
array_push(${"cold_production_column5".$z}, ${"coldp_eer".$z.$i});
array_push(${"cold_production_column6".$z}, ${"coldp_jan".$z.$i});
array_push(${"cold_production_column7".$z}, ${"coldp_feb".$z.$i});
array_push(${"cold_production_column8".$z}, ${"coldp_mar".$z.$i});
array_push(${"cold_production_column9".$z}, ${"coldp_apr".$z.$i});
array_push(${"cold_production_column10".$z}, ${"coldp_may".$z.$i});
array_push(${"cold_production_column11".$z}, ${"coldp_jun".$z.$i});
array_push(${"cold_production_column12".$z}, ${"coldp_jul".$z.$i});
array_push(${"cold_production_column13".$z}, ${"coldp_aug".$z.$i});
array_push(${"cold_production_column14".$z}, ${"coldp_sep".$z.$i});
array_push(${"cold_production_column15".$z}, ${"coldp_okt".$z.$i});
array_push(${"cold_production_column16".$z}, ${"coldp_nov".$z.$i});
array_push(${"cold_production_column17".$z}, ${"coldp_decem".$z.$i});
}
for ($i = 1; $i <= ${"znxp_rows".$z}; $i++) {
		if (${"znxp_type".$z.$i} == 0){${"znxp_type".$z.$i}="Λέβητας";}
		if (${"znxp_type".$z.$i} == 1){${"znxp_type".$z.$i}="Τηλεθέρμανση";}
		if (${"znxp_type".$z.$i} == 2){${"znxp_type".$z.$i}="ΣΗΘ";}
		if (${"znxp_type".$z.$i} == 3){${"znxp_type".$z.$i}="Αντλία θερμότητας (Α.Θ.)";}
		if (${"znxp_type".$z.$i} == 4){${"znxp_type".$z.$i}="Τοπικός ηλεκτρικός θερμαντήρας";}
		if (${"znxp_type".$z.$i} == 5){${"znxp_type".$z.$i}="Τοπική μονάδα φυσικού αερίου";}
		if (${"znxp_type".$z.$i} == 6){${"znxp_type".$z.$i}="Μονάδα παραγωγής (κεντρική) άλλου τύπου";}
		if (${"znxp_pigienergy".$z.$i} == 0){${"znxp_pigienergy".$z.$i}="Bottle gas (LPG)";}
		if (${"znxp_pigienergy".$z.$i} == 1){${"znxp_pigienergy".$z.$i}="Natural gas";}
		if (${"znxp_pigienergy".$z.$i} == 2){${"znxp_pigienergy".$z.$i}="Electricity";}
		if (${"znxp_pigienergy".$z.$i} == 3){${"znxp_pigienergy".$z.$i}="Fuel oil";}
		if (${"znxp_pigienergy".$z.$i} == 4){${"znxp_pigienergy".$z.$i}="Fuel oil with taxis";}
		if (${"znxp_pigienergy".$z.$i} == 5){${"znxp_pigienergy".$z.$i}="District heating";}
		if (${"znxp_pigienergy".$z.$i} == 6){${"znxp_pigienergy".$z.$i}="District heating res";}
		if (${"znxp_pigienergy".$z.$i} == 7){${"znxp_pigienergy".$z.$i}="Biomass";}
		if (${"znxp_pigienergy".$z.$i} == 8){${"znxp_pigienergy".$z.$i}="Biomasst";}
		if (${"znxp_pigienergy".$z.$i} == 9){${"znxp_pigienergy".$z.$i}="ΣΗΘ1";}
		if (${"znxp_pigienergy".$z.$i} == 10){${"znxp_pigienergy".$z.$i}="ΣΗΘ2";}
		if (${"znxp_pigienergy".$z.$i} == 11){${"znxp_pigienergy".$z.$i}="ΣΗΘ3";}
		if (${"znxp_pigienergy".$z.$i} == 12){${"znxp_pigienergy".$z.$i}="ΣΗΘ4";}
		if (${"znxp_pigienergy".$z.$i} == 13){${"znxp_pigienergy".$z.$i}="ΣΗΘ5";}
		if (${"znxp_pigienergy".$z.$i} == 14){${"znxp_pigienergy".$z.$i}="ΣΗΘ6";}
		if (${"znxp_pigienergy".$z.$i} == 15){${"znxp_pigienergy".$z.$i}="ΣΗΘ7";}
		if (${"znxp_pigienergy".$z.$i} == 16){${"znxp_pigienergy".$z.$i}="ΣΗΘ8";}
		if (${"znxp_pigienergy".$z.$i} == 17){${"znxp_pigienergy".$z.$i}="ΣΗΘ9";}
		if (${"znxp_pigienergy".$z.$i} == 18){${"znxp_pigienergy".$z.$i}="ΣΗΘ10";}
array_push(${"znx_production_column1".$z}, ${"znxp_type".$z.$i});
array_push(${"znx_production_column2".$z}, ${"znxp_pigienergy".$z.$i});
array_push(${"znx_production_column3".$z}, ${"znxp_isxys".$z.$i});
array_push(${"znx_production_column4".$z}, ${"znxp_bathm".$z.$i});
array_push(${"znx_production_column5".$z}, ${"znxp_jan".$z.$i});
array_push(${"znx_production_column6".$z}, ${"znxp_feb".$z.$i});
array_push(${"znx_production_column7".$z}, ${"znxp_mar".$z.$i});
array_push(${"znx_production_column8".$z}, ${"znxp_apr".$z.$i});
array_push(${"znx_production_column9".$z}, ${"znxp_may".$z.$i});
array_push(${"znx_production_column10".$z}, ${"znxp_jun".$z.$i});
array_push(${"znx_production_column11".$z}, ${"znxp_jul".$z.$i});
array_push(${"znx_production_column12".$z}, ${"znxp_aug".$z.$i});
array_push(${"znx_production_column13".$z}, ${"znxp_sep".$z.$i});
array_push(${"znx_production_column14".$z}, ${"znxp_okt".$z.$i});
array_push(${"znx_production_column15".$z}, ${"znxp_nov".$z.$i});
array_push(${"znx_production_column16".$z}, ${"znxp_decem".$z.$i});
}
for ($i = 1; $i <= ${"ygrp_rows".$z}; $i++) {
		if (${"ygrp_type".$z.$i} == 0){${"ygrp_type".$z.$i}="Ατμολέβητας κεντρικής παροχής";}
		if (${"ygrp_type".$z.$i} == 1){${"ygrp_type".$z.$i}="Τοπική μονάδα ψεκασμού";}
		if (${"ygrp_type".$z.$i} == 2){${"ygrp_type".$z.$i}="Τοπική μονάδα παραγωγής ατμού";}
		if (${"ygrp_type".$z.$i} == 3){${"ygrp_type".$z.$i}="Τοπική μονάδα άλλου τύπου";}
		if (${"ygrp_pigienergy".$z.$i} == 0){${"ygrp_pigienergy".$z.$i}="Bottle gas (LPG)";}
		if (${"ygrp_pigienergy".$z.$i} == 1){${"ygrp_pigienergy".$z.$i}="Natural gas";}
		if (${"ygrp_pigienergy".$z.$i} == 2){${"ygrp_pigienergy".$z.$i}="Electricity";}
		if (${"ygrp_pigienergy".$z.$i} == 3){${"ygrp_pigienergy".$z.$i}="Fuel oil";}
		if (${"ygrp_pigienergy".$z.$i} == 4){${"ygrp_pigienergy".$z.$i}="Fuel oil with taxis";}
		if (${"ygrp_pigienergy".$z.$i} == 5){${"ygrp_pigienergy".$z.$i}="District heating";}
		if (${"ygrp_pigienergy".$z.$i} == 6){${"ygrp_pigienergy".$z.$i}="District heating res";}
		if (${"ygrp_pigienergy".$z.$i} == 7){${"ygrp_pigienergy".$z.$i}="Biomass";}
		if (${"ygrp_pigienergy".$z.$i} == 8){${"ygrp_pigienergy".$z.$i}="Biomasst";}
		if (${"ygrp_pigienergy".$z.$i} == 9){${"ygrp_pigienergy".$z.$i}="ΣΗΘ1";}
		if (${"ygrp_pigienergy".$z.$i} == 10){${"ygrp_pigienergy".$z.$i}="ΣΗΘ2";}
		if (${"ygrp_pigienergy".$z.$i} == 11){${"ygrp_pigienergy".$z.$i}="ΣΗΘ3";}
		if (${"ygrp_pigienergy".$z.$i} == 12){${"ygrp_pigienergy".$z.$i}="ΣΗΘ4";}
		if (${"ygrp_pigienergy".$z.$i} == 13){${"ygrp_pigienergy".$z.$i}="ΣΗΘ5";}
		if (${"ygrp_pigienergy".$z.$i} == 14){${"ygrp_pigienergy".$z.$i}="ΣΗΘ6";}
		if (${"ygrp_pigienergy".$z.$i} == 15){${"ygrp_pigienergy".$z.$i}="ΣΗΘ7";}
		if (${"ygrp_pigienergy".$z.$i} == 16){${"ygrp_pigienergy".$z.$i}="ΣΗΘ8";}
		if (${"ygrp_pigienergy".$z.$i} == 17){${"ygrp_pigienergy".$z.$i}="ΣΗΘ9";}
		if (${"ygrp_pigienergy".$z.$i} == 18){${"ygrp_pigienergy".$z.$i}="ΣΗΘ10";}
array_push(${"ygr_production_column1".$z}, ${"ygrp_type".$z.$i});
array_push(${"ygr_production_column2".$z}, ${"ygrp_pigienergy".$z.$i});
array_push(${"ygr_production_column3".$z}, ${"ygrp_isxys".$z.$i});
array_push(${"ygr_production_column4".$z}, ${"ygrp_bathm".$z.$i});
array_push(${"ygr_production_column5".$z}, ${"ygrp_jan".$z.$i});
array_push(${"ygr_production_column6".$z}, ${"ygrp_feb".$z.$i});
array_push(${"ygr_production_column7".$z}, ${"ygrp_mar".$z.$i});
array_push(${"ygr_production_column8".$z}, ${"ygrp_apr".$z.$i});
array_push(${"ygr_production_column9".$z}, ${"ygrp_may".$z.$i});
array_push(${"ygr_production_column10".$z}, ${"ygrp_jun".$z.$i});
array_push(${"ygr_production_column11".$z}, ${"ygrp_jul".$z.$i});
array_push(${"ygr_production_column12".$z}, ${"ygrp_aug".$z.$i});
array_push(${"ygr_production_column13".$z}, ${"ygrp_sep".$z.$i});
array_push(${"ygr_production_column14".$z}, ${"ygrp_okt".$z.$i});
array_push(${"ygr_production_column15".$z}, ${"ygrp_nov".$z.$i});
array_push(${"ygr_production_column16".$z}, ${"ygrp_decem".$z.$i});
}

for ($i = 1; $i <= ${"thermd_rows".$z}; $i++) {
		if (${"thermd_type".$z.$i} == 0){${"thermd_type".$z.$i}="Δίκτυο διανομής θερμού μέσου";}
		if (${"thermd_type".$z.$i} == 1){${"thermd_type".$z.$i}="Αεραγωγοί";}
array_push(${"heat_distribution_column1".$z}, ${"thermd_type".$z.$i});
		if (${"thermd_type".$z.$i} == 1){${"thermd_isxys".$z.$i}="";} //Πάντα κενή η ισχύς σε αεραγωγούς
array_push(${"heat_distribution_column2".$z}, ${"thermd_isxys".$z.$i});
		if (${"thermd_xwros".$z.$i} == 0){${"thermd_xwros".$z.$i}="Εσωτερικοί  ή έως και 20% σε εξωτερικούς";}
		if (${"thermd_xwros".$z.$i} == 1){${"thermd_xwros".$z.$i}="Πάνω απο  20% σε εξωτερικούς";}	
array_push(${"heat_distribution_column3".$z}, ${"thermd_xwros".$z.$i});
		if (${"thermd_type".$z.$i} == 1){${"thermd_bathm".$z.$i}="";} //Πάντα κενός ο βαθμός απόδοσης σε αεραγωγούς
array_push(${"heat_distribution_column6".$z}, ${"thermd_bathm".$z.$i});
		if (${"thermd_monwsi".$z.$i} == 0){${"thermd_monwsi".$z.$i}="False";}
		if (${"thermd_monwsi".$z.$i} == 1){${"thermd_monwsi".$z.$i}="True";}
		if (${"thermd_type".$z.$i} == 0){${"thermd_monwsi".$z.$i}="False";} //Πάντα false η μόνωση σε δίκτυο διανομής θερμού μέσου
array_push(${"heat_distribution_column7".$z}, ${"thermd_monwsi".$z.$i});
}

for ($i = 1; $i <= ${"coldd_rows".$z}; $i++) {
		if (${"coldd_type".$z.$i} == 0){${"coldd_type".$z.$i}="Δίκτυο διανομής ψυχρού μέσου";}
		if (${"coldd_type".$z.$i} == 1){${"coldd_type".$z.$i}="Αεραγωγοί";}
array_push(${"cold_distribution_column1".$z}, ${"coldd_type".$z.$i});
		if (${"coldd_type".$z.$i} == 1){${"coldd_isxys".$z.$i}="";} //Πάντα κενή η ισχύς σε αεραγωγούς
array_push(${"cold_distribution_column2".$z}, ${"coldd_isxys".$z.$i});
		if (${"coldd_xwros".$z.$i} == 0){${"coldd_xwros".$z.$i}="Εσωτερικοί  ή έως και 20% σε εξωτερικούς";}
		if (${"coldd_xwros".$z.$i} == 1){${"coldd_xwros".$z.$i}="Πάνω απο  20% σε εξωτερικούς";}	
array_push(${"cold_distribution_column3".$z}, ${"coldd_xwros".$z.$i});
		if (${"coldd_type".$z.$i} == 1){${"coldd_bathm".$z.$i}="";} //Πάντα κενός ο βαθμός απόδοσης σε αεραγωγούς
array_push(${"cold_distribution_column4".$z}, ${"coldd_bathm".$z.$i});
		if (${"coldd_monwsi".$z.$i} == 0){${"coldd_monwsi".$z.$i}="False";}
		if (${"coldd_monwsi".$z.$i} == 1){${"coldd_monwsi".$z.$i}="True";}
		if (${"coldd_type".$z.$i} == 0){${"coldd_monwsi".$z.$i}="False";} //Πάντα false η μόνωση σε δίκτυο διανομής ψυχρού μέσου
array_push(${"cold_distribution_column5".$z}, ${"coldd_monwsi".$z.$i});
}

for ($i = 1; $i <= ${"znxd_rows".$z}; $i++) {
array_push(${"znx_distribution_column1".$z}, ${"znxd_type".$z.$i});
		if (${"znxd_anakykloforia".$z.$i} == 0){${"znxd_anakykloforia".$z.$i}="False";}
		if (${"znxd_anakykloforia".$z.$i} == 1){${"znxd_anakykloforia".$z.$i}="True";}
array_push(${"znx_distribution_column2".$z}, ${"znxd_anakykloforia".$z.$i});
		if (${"znxd_xwros".$z.$i} == 0){${"znxd_xwros".$z.$i}="Εσωτερικοί  ή έως και 20% σε εξωτερικούς";}
		if (${"znxd_xwros".$z.$i} == 1){${"znxd_xwros".$z.$i}="Πάνω απο  20% σε εξωτερικούς";}	
array_push(${"znx_distribution_column3".$z}, ${"znxd_xwros".$z.$i});
array_push(${"znx_distribution_column4".$z}, ${"znxd_bathm".$z.$i});
}

for ($i = 1; $i <= ${"ygrd_rows".$z}; $i++) {
array_push(${"ygr_distribution_column1".$z}, ${"ygrd_type".$z.$i});
		if (${"ygrd_xwros".$z.$i} == 0){${"ygrd_xwros".$z.$i}="Εσωτερικοί  ή έως και 20% σε εξωτερικούς";}
		if (${"ygrd_xwros".$z.$i} == 1){${"ygrd_xwros".$z.$i}="Πάνω απο  20% σε εξωτερικούς";}	
array_push(${"ygr_distribution_column2".$z}, ${"ygrd_xwros".$z.$i});
array_push(${"ygr_distribution_column3".$z}, ${"ygrd_bathm".$z.$i});
}

for ($i = 1; $i <= ${"thermb_rows".$z}; $i++) {
		if (${"thermb_type".$z.$i} == 0){${"thermb_type".$z.$i}="Αντλίες";}
		if (${"thermb_type".$z.$i} == 1){${"thermb_type".$z.$i}="Κυκλοφορητές";}
		if (${"thermb_type".$z.$i} == 2){${"thermb_type".$z.$i}="Ηλεκτροβάνες";}
		if (${"thermb_type".$z.$i} == 3){${"thermb_type".$z.$i}="Ανεμιστήρες";}
array_push(${"heat_auxiliary_column1".$z}, ${"thermb_type".$z.$i});
array_push(${"heat_auxiliary_column2".$z}, ${"thermb_number".$z.$i});
array_push(${"heat_auxiliary_column3".$z}, ${"thermb_isxys".$z.$i});
}

for ($i = 1; $i <= ${"coldb_rows".$z}; $i++) {
		if (${"coldb_type".$z.$i} == 0){${"coldb_type".$z.$i}="Αντλίες";}
		if (${"coldb_type".$z.$i} == 1){${"coldb_type".$z.$i}="Κυκλοφορητές";}
		if (${"coldb_type".$z.$i} == 2){${"coldb_type".$z.$i}="Ηλεκτροβάνες";}
		if (${"coldb_type".$z.$i} == 3){${"coldb_type".$z.$i}="Ανεμιστήρες";}
		if (${"coldb_type".$z.$i} == 4){${"coldb_type".$z.$i}="Πύργος ψύξης";}
array_push(${"cold_auxiliary_column1".$z}, ${"coldb_type".$z.$i});
array_push(${"cold_auxiliary_column2".$z}, ${"coldb_number".$z.$i});
array_push(${"cold_auxiliary_column3".$z}, ${"coldb_isxys".$z.$i});
}

for ($i = 1; $i <= ${"znxb_rows".$z}; $i++) {
		if (${"znxb_type".$z.$i} == 0){${"znxb_type".$z.$i}="Αντλίες";}
		if (${"znxb_type".$z.$i} == 1){${"znxb_type".$z.$i}="Κυκλοφορητές";}
		if (${"znxb_type".$z.$i} == 2){${"znxb_type".$z.$i}="Ηλεκτροβάνες";}
		if (${"znxb_type".$z.$i} == 3){${"znxb_type".$z.$i}="Άλλου τύπου";}
array_push(${"znx_auxiliary_column1".$z}, ${"znxb_type".$z.$i});
array_push(${"znx_auxiliary_column2".$z}, ${"znxb_number".$z.$i});
array_push(${"znx_auxiliary_column3".$z}, ${"znxb_isxys".$z.$i});
}

for ($i = 1; $i <= ${"systemkkm_rows".$z}; $i++) {
array_push(${"kkm_production_column1".$z}, ${"systemkkm_type".$z.$i});
array_push(${"kkm_production_column2".$z}, ${"systemkkm_tm_ther".$z.$i});
array_push(${"kkm_production_column3".$z}, ${"systemkkm_F_h".$z.$i});
array_push(${"kkm_production_column5".$z}, ${"systemkkm_R_h".$z.$i});
array_push(${"kkm_production_column6".$z}, ${"systemkkm_Q_r_h".$z.$i});
array_push(${"kkm_production_column7".$z}, ${"systemkkm_tm_psyx".$z.$i});
array_push(${"kkm_production_column8".$z}, ${"systemkkm_F_c".$z.$i});
array_push(${"kkm_production_column10".$z}, ${"systemkkm_R_c".$z.$i});
array_push(${"kkm_production_column11".$z}, ${"systemkkm_Q_r_c".$z.$i});
array_push(${"kkm_production_column12".$z}, ${"systemkkm_tm_ygr".$z.$i});
array_push(${"kkm_production_column13".$z}, ${"systemkkm_H_r".$z.$i});
array_push(${"kkm_production_column14".$z}, ${"systemkkm_filters".$z.$i});
array_push(${"kkm_production_column15".$z}, ${"systemkkm_E_vent".$z.$i});
}
for ($i = 1; $i <= ${"systemlight_rows".$z}; $i++) {
array_push(${"light_production_column1".$z}, ${"systemlight_isxys".$z.$i});
array_push(${"light_production_column2".$z}, ${"systemlight_perioxi".$z.$i});
array_push(${"light_production_column3".$z}, ${"systemlight_ayt_elegxoy".$z.$i});
array_push(${"light_production_column4".$z}, ${"systemlight_ayt_kinisis".$z.$i});
array_push(${"light_production_column6".$z}, ${"systemlight_thermotita".$z.$i});
array_push(${"light_production_column7".$z}, ${"systemlight_asfaleia".$z.$i});
array_push(${"light_production_column8".$z}, ${"systemlight_efedreia".$z.$i});
}


}

//Μετατροπή από array σε τιμές χωρισμένες με κόμμα
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
for ($i=1;$i<=17;$i++){
${"heat_production_column".$i.$z} = implode(",", ${"heat_production_column".$i.$z});
${"cold_production_column".$i.$z} = implode(",", ${"cold_production_column".$i.$z});
${"znx_production_column".$i.$z} = implode(",", ${"znx_production_column".$i.$z});
${"ygr_production_column".$i.$z} = implode(",", ${"ygr_production_column".$i.$z});
}
for ($i=1;$i<=16;$i++){
${"kkm_production_column".$i.$z} = implode(",", ${"kkm_production_column".$i.$z});
}
for ($i=1;$i<=8;$i++){
${"heat_distribution_column".$i.$z} = implode(",", ${"heat_distribution_column".$i.$z});
${"cold_distribution_column".$i.$z} = implode(",", ${"cold_distribution_column".$i.$z});
${"znx_distribution_column".$i.$z} = implode(",", ${"znx_distribution_column".$i.$z});
${"ygr_distribution_column".$i.$z} = implode(",", ${"ygr_distribution_column".$i.$z});
}
for ($i=1;$i<=3;$i++){
${"heat_termatic_column".$i.$z} = implode(",", ${"heat_termatic_column".$i.$z});
${"cold_termatic_column".$i.$z} = implode(",", ${"cold_termatic_column".$i.$z});
${"znx_termatic_column".$i.$z} = implode(",", ${"znx_termatic_column".$i.$z});
${"ygr_termatic_column".$i.$z} = implode(",", ${"ygr_termatic_column".$i.$z});

${"heat_auxiliary_column".$i.$z} = implode(",", ${"heat_auxiliary_column".$i.$z});
${"cold_auxiliary_column".$i.$z} = implode(",", ${"cold_auxiliary_column".$i.$z});
${"znx_auxiliary_column".$i.$z} = implode(",", ${"znx_auxiliary_column".$i.$z});
}
for ($i=1;$i<=8;$i++){
${"light_production_column".$i.$z} = implode(",", ${"light_production_column".$i.$z});
}


}





//Μεταφορά xml-schema για το ΤΕΕ-ΚΕΝΑΚ
//***********************************************************************************************************
$tab = "\t";
$br = "\n";
$xml = '<?xml version="1.0" encoding="UTF-8"?>'.$br;
$xml .= '<ENR_IN>'.$br;
	$xml .= '<EPA_NR_PROJECT rid="#1">'.$br;
		$xml .= '<id/>'.$br;
			$xml .= '<blg_use>'.$xrisi_id_ktirio.'</blg_use>'.$br;
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
			$xml .= '<version_tee_kenak_dll>1.29.1.19</version_tee_kenak_dll>'.$br;
	$xml .= '</EPA_NR_PROJECT>'.$br;	
	
	$xml .= '<LIBRARIES rid="#2">'.$br;
		$xml .= '<id>Lib</id>'.$br;
		$xml .= '<lib_const>C:\Program Files\TEE\TEE KENAK\EnrConstGr.xml</lib_const>'.$br;
		$xml .= '<lib_clim>C:\Program Files\TEE\TEE KENAK\EnrClimateGR.xml</lib_clim>'.$br;
		$xml .= '<lib_fuel>C:\Program Files\TEE\TEE KENAK\EnrFuelGr.xml</lib_fuel>'.$br;
	$xml .= '</LIBRARIES>'.$br;
	$xml .= '<BUILDING rid="1">'.$br;
		$xml .= '<blg_parameter1>'.$synoliko_embadon.'</blg_parameter1>'.$br; //συνολική επιφάνεια
		$xml .= '<blg_parameter2>0</blg_parameter2>'.$br;
		$xml .= '<blg_parameter3>0</blg_parameter3>'.$br;
		$xml .= '<blg_parameter4>0</blg_parameter4>'.$br;
		$xml .= '<blg_parameter5>'.$thermainomenos_ogkos.'</blg_parameter5>'.$br; //θερμαινόμενος όγκος
		$xml .= '<blg_parameter6>0</blg_parameter6>'.$br;
		$xml .= '<blg_parameter7>0</blg_parameter7>'.$br;
		$xml .= '<blg_parameter8>0</blg_parameter8>'.$br;
		$xml .= '<blg_parameter9>0</blg_parameter9>'.$br;
		$xml .= '<blg_parameter10>-1</blg_parameter10>'.$br;
		$xml .= '<blg_parameter11>'.$arithmos_thermzwnes.'</blg_parameter11>'.$br; //θερμικές ζώνες
		$xml .= '<blg_parameter12>1</blg_parameter12>'.$br;
		$xml .= '<blg_parameter13>0</blg_parameter13>'.$br;
		$xml .= '<blg_parameter14>'.$xrisi_znx_iliakos.'</blg_parameter14>'.$br; // χρήση κτιρίου
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
		$xml .= '<blg_parameter33>'.$xrisi_ktirio.'</blg_parameter33>'.$br;
		$xml .= '<blg_parameter34>'.$pol_type.'</blg_parameter34>'.$br;
		$xml .= ''.$br;
		$xml .= ''.$br;
		$xml .= ''.$br;	
	
for ($z = 1; $z <= $arithmos_thermzwnes; $z++) {
			$xml .= "<ZONE".$z." rid=\"1\">".$br;
				$xml .= '<zn_parameter1>'.${"xrisi_eid".$z}.'</zn_parameter1>'.$br;
				$xml .= '<zn_parameter2/>'.$br;
				$xml .= '<zn_parameter3>'.${"synoliko_embadon".$z}.'</zn_parameter3>'.$br;
				$xml .= '<zn_parameter4>'.${"anigmeni_thermo".$z}.'</zn_parameter4>'.$br;
				$xml .= '<zn_parameter5>'.${"aytomatismoi".$z}.'</zn_parameter5>'.$br;
				$xml .= '<zn_parameter6>'.${"dieisdysi_aera".$z}.'</zn_parameter6>'.$br;
				$xml .= '<zn_parameter7>'.${"kaminades".$z}.'</zn_parameter7>'.$br;
				$xml .= '<zn_parameter8>'.${"eksaerismos".$z}.'</zn_parameter8>'.$br;
				$xml .= '<zn_parameter9>'.${"anem_orofis".$z}.'</zn_parameter9>'.$br;
				$xml .= '<zn_parameter10>0</zn_parameter10>'.$br;
				$xml .= '<zn_parameter11>1</zn_parameter11>'.$br;
				$xml .= '<zn_parameter12>'.${"mesi_katanalwsi_znx".$z}.'</zn_parameter12>'.$br;
					$xml .= "<ENVELOPE rid=\"1\">".$br;
						$xml .= '<opaque_rows>'.${"count_adiafani".$z}.'</opaque_rows>'.$br;
						$xml .= '<opaque_column1>'.${"$array_adiafani_type".$z}.',</opaque_column1>'.$br;
						$xml .= '<opaque_column2>'.${"array_adiafani_name".$z}.',</opaque_column2>'.$br;
						$xml .= '<opaque_column3>'.${"array_adiafani_g".$z}.',</opaque_column3>'.$br;
						$xml .= '<opaque_column4>'.${"array_adiafani_b".$z}.',</opaque_column4>'.$br;
						$xml .= '<opaque_column5>'.${"array_adiafani_edrom".$z}.',</opaque_column5>'.$br;
						$xml .= '<opaque_column6>'.${"array_adiafani_u".$z}.',</opaque_column6>'.$br;
						$xml .= '<opaque_column7>'.${"array_adiafani_a".$z}.',</opaque_column7>'.$br;//παλιά μορφή αρχείου. Δεν εμφανίζεται.
						$xml .= '<opaque_column8>'.${"array_adiafani_a".$z}.',</opaque_column8>'.$br;
						$xml .= '<opaque_column9>'.${"array_adiafani_e".$z}.',</opaque_column9>'.$br;
						$xml .= '<opaque_column10>'.${"array_adiafani_fhorh".$z}.',</opaque_column10>'.$br;
						$xml .= '<opaque_column11>'.${"array_adiafani_fhorc".$z}.',</opaque_column11>'.$br;
						$xml .= '<opaque_column12>'.${"array_adiafani_fovh".$z}.',</opaque_column12>'.$br;
						$xml .= '<opaque_column13>'.${"array_adiafani_fovc".$z}.',</opaque_column13>'.$br;
						$xml .= '<opaque_column14>'.${"array_adiafani_ffinh".$z}.',</opaque_column14>'.$br;
						$xml .= '<opaque_column15>'.${"array_adiafani_ffinc".$z}.',</opaque_column15>'.$br;
						$xml .= '<opaque_column16>,,,,,,,</opaque_column16>'.$br;
						$xml .= '<ground_rows>'.${"count_ground".$z}.'</ground_rows>'.$br;
						$xml .= '<ground_column1>'.${"ground_column1".$z}.',</ground_column1>'.$br;
						$xml .= '<ground_column2>'.${"ground_column2".$z}.',</ground_column2>'.$br;
						$xml .= '<ground_column3>'.${"ground_column3".$z}.',</ground_column3>'.$br;
						$xml .= '<ground_column4>'.${"ground_column4".$z}.',</ground_column4>'.$br;
						$xml .= '<ground_column5>'.${"ground_column5".$z}.',</ground_column5>'.$br;
						$xml .= '<ground_column6>'.${"ground_column6".$z}.',</ground_column6>'.$br;
						$xml .= '<ground_column7>'.${"ground_column7".$z}.',</ground_column7>'.$br;
						$xml .= '<ground_column8>,</ground_column8>'.$br;
						$xml .= '<transparent_rows>'.${"count_diafani".$z}.'</transparent_rows>'.$br;
						$xml .= '<transparent_column1>'.${"array_diafani_type".$z}.',</transparent_column1>'.$br;
						$xml .= '<transparent_column2>'.${"array_diafani_name".$z}.',</transparent_column2>'.$br;
						$xml .= '<transparent_column3>'.${"array_diafani_g".$z}.',</transparent_column3>'.$br;
						$xml .= '<transparent_column4>'.${"array_diafani_b".$z}.',</transparent_column4>'.$br;
						$xml .= '<transparent_column5>'.${"array_diafani_edrom".$z}.',</transparent_column5>'.$br;
						$xml .= '<transparent_column6>'.${"array_diafani_typos".$z}.',</transparent_column6>'.$br;
						$xml .= '<transparent_column7>'.${"array_diafani_u".$z}.',</transparent_column7>'.$br;
						$xml .= '<transparent_column8>'.${"array_diafani_gw".$z}.',</transparent_column8>'.$br;
						$xml .= '<transparent_column9>'.${"array_diafani_fhorh".$z}.',</transparent_column9>'.$br;
						$xml .= '<transparent_column10>'.${"array_diafani_fhorc".$z}.',</transparent_column10>'.$br;
						$xml .= '<transparent_column11>'.${"array_diafani_fovh".$z}.',</transparent_column11>'.$br;
						$xml .= '<transparent_column12>'.${"array_diafani_fovc".$z}.',</transparent_column12>'.$br;
						$xml .= '<transparent_column13>'.${"array_diafani_ffinh".$z}.',</transparent_column13>'.$br;
						$xml .= '<transparent_column14>'.${"array_diafani_ffinc".$z}.',</transparent_column14>'.$br;
						$xml .= '<transparent_column15>,,,,,,,,,,,,,,,,,,,,,,</transparent_column15>'.$br;
						$xml .= '<opaque_tb_rows>1</opaque_tb_rows>'.$br;
						$xml .= '<opaque_tb_column1>ΣΥΝΟΛΙΚΕΣ,</opaque_tb_column1>'.$br;
						$xml .= '<opaque_tb_column2>1,</opaque_tb_column2>'.$br;
						$xml .= '<opaque_tb_column3>'.${"thermogefyres".$z}.',</opaque_tb_column3>'.$br; //θερμογέφυρες κελύφους
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
'<production_rows>'.${"thermp_rows".$z}.'</production_rows>'.$br.
'<production_column1>'.${"heat_production_column1".$z}.',</production_column1>'.$br.
'<production_column2>'.${"heat_production_column2".$z}.',,</production_column2>'.$br.
'<production_column3>'.${"heat_production_column3".$z}.',</production_column3>'.$br.
'<production_column4>'.${"heat_production_column4".$z}.',</production_column4>'.$br.
'<production_column5>'.${"heat_production_column5".$z}.',</production_column5>'.$br.
'<production_column6>'.${"heat_production_column6".$z}.',</production_column6>'.$br.
'<production_column7>'.${"heat_production_column7".$z}.',</production_column7>'.$br.
'<production_column8>'.${"heat_production_column8".$z}.',</production_column8>'.$br.
'<production_column9>'.${"heat_production_column9".$z}.',</production_column9>'.$br.
'<production_column10>'.${"heat_production_column10".$z}.',</production_column10>'.$br.
'<production_column11>'.${"heat_production_column11".$z}.',</production_column11>'.$br.
'<production_column12>'.${"heat_production_column12".$z}.',</production_column12>'.$br.
'<production_column13>'.${"heat_production_column13".$z}.',</production_column13>'.$br.
'<production_column14>'.${"heat_production_column14".$z}.',</production_column14>'.$br.
'<production_column15>'.${"heat_production_column15".$z}.',</production_column15>'.$br.
'<production_column16>'.${"heat_production_column16".$z}.',</production_column16>'.$br.
'<production_column17>'.${"heat_production_column17".$z}.',</production_column17>'.$br.
'<production_column18>,</production_column18>'.$br.
'<distribution_rows>'.${"thermd_rows".$z}.'</distribution_rows>'.$br.
'<distribution_column1>'.${"heat_distribution_column1".$z}.',</distribution_column1>'.$br.
'<distribution_column2>'.${"heat_distribution_column2".$z}.',</distribution_column2>'.$br.
'<distribution_column3>'.${"heat_distribution_column3".$z}.',</distribution_column3>'.$br.
'<distribution_column4>,,</distribution_column4>'.$br.
'<distribution_column5>,,</distribution_column5>'.$br.
'<distribution_column6>'.${"heat_distribution_column6".$z}.',</distribution_column6>'.$br.
'<distribution_column7>'.${"heat_distribution_column7".$z}.',</distribution_column7>'.$br.
'<distribution_column8>,,</distribution_column8>'.$br.
'<termatic_rows>1</termatic_rows>'.$br.
'<termatic_column1>'.${"thermt_type".$z."1"}.',</termatic_column1>'.$br.
'<termatic_column2>'.${"thermt_bathm".$z."1"}.',</termatic_column2>'.$br.
'<termatic_column3>,</termatic_column3>'.$br.
'<auxiliary_rows>'.${"thermb_rows".$z}.'</auxiliary_rows>'.$br.
'<auxiliary_column1>'.${"heat_auxiliary_column1".$z}.',</auxiliary_column1>'.$br.
'<auxiliary_column2>'.${"heat_auxiliary_column2".$z}.',</auxiliary_column2>'.$br.
'<auxiliary_column3>'.${"heat_auxiliary_column3".$z}.',</auxiliary_column3>'.$br.
'</heating>'.$br;



$xml .= '<cooling rid="1">'.$br.
'<cooling_exists>1</cooling_exists>'.$br.
'<production_rows>'.${"coldp_rows".$z}.'</production_rows>'.$br.
'<production_column1>'.${"cold_production_column1".$z}.',</production_column1>'.$br.
'<production_column2>'.${"cold_production_column2".$z}.',</production_column2>'.$br.
'<production_column3>'.${"cold_production_column3".$z}.',</production_column3>'.$br.
'<production_column4>'.${"cold_production_column4".$z}.',</production_column4>'.$br.
'<production_column5>'.${"cold_production_column5".$z}.',</production_column5>'.$br.
'<production_column6>'.${"cold_production_column6".$z}.',</production_column6>'.$br.
'<production_column7>'.${"cold_production_column7".$z}.',</production_column7>'.$br.
'<production_column8>'.${"cold_production_column8".$z}.',</production_column8>'.$br.
'<production_column9>'.${"cold_production_column9".$z}.',</production_column9>'.$br.
'<production_column10>'.${"cold_production_column10".$z}.',</production_column10>'.$br.
'<production_column11>'.${"cold_production_column11".$z}.',</production_column11>'.$br.
'<production_column12>'.${"cold_production_column12".$z}.',</production_column12>'.$br.
'<production_column13>'.${"cold_production_column13".$z}.',</production_column13>'.$br.
'<production_column14>'.${"cold_production_column14".$z}.',</production_column14>'.$br.
'<production_column15>'.${"cold_production_column15".$z}.',</production_column15>'.$br.
'<production_column16>'.${"cold_production_column16".$z}.',</production_column16>'.$br.
'<production_column17>'.${"cold_production_column17".$z}.',</production_column17>'.$br.
'<production_column18>,</production_column18>'.$br.
'<distribution_rows>'.${"coldd_rows".$z}.'</distribution_rows>'.$br.
'<distribution_column1>'.${"cold_distribution_column1".$z}.',</distribution_column1>'.$br.
'<distribution_column2>'.${"cold_distribution_column2".$z}.',</distribution_column2>'.$br.
'<distribution_column3>'.${"cold_distribution_column3".$z}.',</distribution_column3>'.$br.
'<distribution_column4>'.${"cold_distribution_column4".$z}.',</distribution_column4>'.$br.
'<distribution_column5>'.${"cold_distribution_column5".$z}.',</distribution_column5>'.$br.
'<distribution_column6>,,</distribution_column6>'.$br.
'<termatic_rows>1</termatic_rows>'.$br.
'<termatic_column1>'.${"coldt_type".$z."1"}.',</termatic_column1>'.$br.
'<termatic_column2>'.${"coldt_bathm".$z."1"}.',</termatic_column2>'.$br.
'<termatic_column3>,</termatic_column3>'.$br.
'<auxiliary_rows>'.${"coldb_rows".$z}.'</auxiliary_rows>'.$br.
'<auxiliary_column1>'.${"cold_auxiliary_column1".$z}.',</auxiliary_column1>'.$br.
'<auxiliary_column2>'.${"cold_auxiliary_column2".$z}.',</auxiliary_column2>'.$br.
'<auxiliary_column3>'.${"cold_auxiliary_column3".$z}.',</auxiliary_column3>'.$br.
'</cooling>'.$br;

if (${"ygrp_rows".$z}==0){ //Δεν υπάρχει ΥΓΡΑΝΣΗ
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
}
if (${"ygrp_rows".$z}>0){ //Yπάρχει ΥΓΡΑΝΣΗ
$xml .= '<humidification rid="1">'.$br.
'<humidification_exists>1</humidification_exists>'.$br.
'<production_rows>'.${"ygrp_rows".$z}.'</production_rows>'.$br.
'<production_column1>'.${"ygr_production_column1".$z}.',</production_column1>'.$br.
'<production_column2>'.${"ygr_production_column2".$z}.',</production_column2>'.$br.
'<production_column3>'.${"ygr_production_column3".$z}.',</production_column3>'.$br.
'<production_column4>'.${"ygr_production_column4".$z}.',</production_column4>'.$br.
'<production_column5>'.${"ygr_production_column5".$z}.',</production_column5>'.$br.
'<production_column6>'.${"ygr_production_column6".$z}.',</production_column6>'.$br.
'<production_column7>'.${"ygr_production_column7".$z}.',</production_column7>'.$br.
'<production_column8>'.${"ygr_production_column8".$z}.',</production_column8>'.$br.
'<production_column9>'.${"ygr_production_column9".$z}.',</production_column9>'.$br.
'<production_column10>'.${"ygr_production_column10".$z}.',</production_column10>'.$br.
'<production_column11>'.${"ygr_production_column11".$z}.',</production_column11>'.$br.
'<production_column12>'.${"ygr_production_column12".$z}.',</production_column12>'.$br.
'<production_column13>'.${"ygr_production_column13".$z}.',</production_column13>'.$br.
'<production_column14>'.${"ygr_production_column14".$z}.',</production_column14>'.$br.
'<production_column15>'.${"ygr_production_column15".$z}.',</production_column15>'.$br.
'<production_column16>'.${"ygr_production_column16".$z}.',</production_column16>'.$br.
'<production_column17>'.${"ygr_production_column17".$z}.',</production_column17>'.$br.
'<distribution_rows>'.${"ygrd_rows".$z}.'</distribution_rows>'.$br.
'<distribution_column1>'.${"ygr_distribution_column1".$z}.',</distribution_column1>'.$br.
'<distribution_column2>'.${"ygr_distribution_column2".$z}.',</distribution_column2>'.$br.
'<distribution_column3>'.${"ygr_distribution_column3".$z}.',</distribution_column3>'.$br.
'<distribution_column4>,</distribution_column4>'.$br.
'<termatic_rows>1</termatic_rows>'.$br.
'<termatic_column1>'.${"ygrt_type".$z."1"}.',</termatic_column1>'.$br.
'<termatic_column2>1,</termatic_column2>'.$br.
'<termatic_column3>,</termatic_column3>'.$br.
'</humidification>'.$br;
}


if (${"systemkkm_rows".$z}==0){ //Δεν υπάρχει ΚΚΜ
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
}
if (${"systemkkm_rows".$z}>0){ //Υπάρχει ΚΚΜ
$xml .= '<ahu rid="1">'.$br.
'<ahu_exists>1</ahu_exists>'.$br.
'<ahu_rows>'.${"systemkkm_rows".$z}.'</ahu_rows>'.$br.
'<ahu_column1>'.${"kkm_production_column1".$z}.',</ahu_column1>'.$br.
'<ahu_column2>'.${"kkm_production_column2".$z}.',</ahu_column2>'.$br.
'<ahu_column3>'.${"kkm_production_column3".$z}.',</ahu_column3>'.$br.
'<ahu_column4>,</ahu_column4>'.$br.
'<ahu_column5>'.${"kkm_production_column5".$z}.',</ahu_column5>'.$br.
'<ahu_column6>'.${"kkm_production_column6".$z}.',</ahu_column6>'.$br.
'<ahu_column7>'.${"kkm_production_column7".$z}.',</ahu_column7>'.$br.
'<ahu_column8>'.${"kkm_production_column8".$z}.',</ahu_column8>'.$br.
'<ahu_column9>,</ahu_column9>'.$br.
'<ahu_column10>'.${"kkm_production_column10".$z}.',</ahu_column10>'.$br.
'<ahu_column11>'.${"kkm_production_column11".$z}.',</ahu_column11>'.$br.
'<ahu_column12>'.${"kkm_production_column12".$z}.',</ahu_column12>'.$br.
'<ahu_column13>'.${"kkm_production_column13".$z}.',</ahu_column13>'.$br.
'<ahu_column14>'.${"kkm_production_column14".$z}.',</ahu_column14>'.$br.
'<ahu_column15>'.${"kkm_production_column15".$z}.',</ahu_column15>'.$br.
'<ahu_column16>,</ahu_column16>'.$br.
'</ahu>'.$br;
}

$xml .= '<dhw rid="1">'.$br.
'<dhw_exists>1</dhw_exists>'.$br.
'<production_rows>'.${"znxp_rows".$z}.'</production_rows>'.$br.
'<production_column1>'.${"znx_production_column1".$z}.',</production_column1>'.$br.
'<production_column2>'.${"znx_production_column2".$z}.',</production_column2>'.$br.
'<production_column3>'.${"znx_production_column3".$z}.',</production_column3>'.$br.
'<production_column4>'.${"znx_production_column4".$z}.',</production_column4>'.$br.
'<production_column5>'.${"znx_production_column5".$z}.',</production_column5>'.$br.
'<production_column6>'.${"znx_production_column6".$z}.',</production_column6>'.$br.
'<production_column7>'.${"znx_production_column7".$z}.',</production_column7>'.$br.
'<production_column8>'.${"znx_production_column8".$z}.',</production_column8>'.$br.
'<production_column9>'.${"znx_production_column9".$z}.',</production_column9>'.$br.
'<production_column10>'.${"znx_production_column10".$z}.',</production_column10>'.$br.
'<production_column11>'.${"znx_production_column11".$z}.',</production_column11>'.$br.
'<production_column12>'.${"znx_production_column12".$z}.',</production_column12>'.$br.
'<production_column13>'.${"znx_production_column13".$z}.',</production_column13>'.$br.
'<production_column14>'.${"znx_production_column14".$z}.',</production_column14>'.$br.
'<production_column15>'.${"znx_production_column15".$z}.',</production_column15>'.$br.
'<production_column16>'.${"znx_production_column16".$z}.',</production_column16>'.$br.
'<production_column17>,</production_column17>'.$br.
'<distribution_rows>'.${"znxd_rows".$z}.'</distribution_rows>'.$br.
'<distribution_column1>'.${"znx_distribution_column1".$z}.',</distribution_column1>'.$br.
'<distribution_column2>'.${"znx_distribution_column2".$z}.',</distribution_column2>'.$br.
'<distribution_column3>'.${"znx_distribution_column3".$z}.',</distribution_column3>'.$br.
'<distribution_column4>'.${"znx_distribution_column4".$z}.',</distribution_column4>'.$br.
'<distribution_column5>,</distribution_column5>'.$br.
'<termatic_rows>1</termatic_rows>'.$br.
'<termatic_column1>'.${"znxa_type".$z."1"}.',</termatic_column1>'.$br.
'<termatic_column2>'.${"znxa_bathm".$z."1"}.',</termatic_column2>'.$br.
'<termatic_column3>,</termatic_column3>'.$br.
'<auxiliary_rows>'.${"znxb_rows".$z}.'</auxiliary_rows>'.$br.
'<auxiliary_column1>'.${"znx_auxiliary_column1".$z}.',</auxiliary_column1>'.$br.
'<auxiliary_column2>'.${"znx_auxiliary_column2".$z}.',</auxiliary_column2>'.$br.
'<auxiliary_column3>'.${"znx_auxiliary_column3".$z}.',</auxiliary_column3>'.$br.
'</dhw>'.$br;

if (${"znxiliakos_rows".$z}==0){ //Δεν υπάρχει ηλιακός
$xml .= '<solar_collector rid="1">'.$br.
'<solar_collector_exists></solar_collector_exists>'.$br.
'<solar_collector_rows>1</solar_collector_rows>'.$br.
'<solar_collector_column1>,</solar_collector_column1>'.$br.
'<solar_collector_column2>,</solar_collector_column2>'.$br.
'<solar_collector_column3>,</solar_collector_column3>'.$br.
'<solar_collector_column4>,</solar_collector_column4>'.$br.
'<solar_collector_column5>,</solar_collector_column5>'.$br.
'<solar_collector_column6>,</solar_collector_column6>'.$br.
'<solar_collector_column7>,</solar_collector_column7>'.$br.
'<solar_collector_column8>,</solar_collector_column8>'.$br.
'<solar_collector_column9>,</solar_collector_column9>'.$br.
'<solar_collector_column10>,</solar_collector_column10>'.$br.
'</solar_collector>'.$br;
}
if (${"znxiliakos_rows".$z}>0){ //Υπάρχει ηλιακός
$xml .= '<solar_collector rid="1">'.$br.
'<solar_collector_exists>1</solar_collector_exists>'.$br.
'<solar_collector_rows>'.${"znxiliakos_rows".$z}.'</solar_collector_rows>'.$br.
'<solar_collector_column1>'.${"solar_collector_column1".$z}.',</solar_collector_column1>'.$br.
'<solar_collector_column2>'.${"solar_collector_column2".$z}.',</solar_collector_column2>'.$br.
'<solar_collector_column3>'.${"solar_collector_column3".$z}.',</solar_collector_column3>'.$br.
'<solar_collector_column4>'.${"iliakos_syna".$z}.',</solar_collector_column4>'.$br.
'<solar_collector_column5>'.${"iliakos_synb".$z}.',</solar_collector_column5>'.$br.
'<solar_collector_column6>'.${"iliakos_epifaneia".$z}.',</solar_collector_column6>'.$br.
'<solar_collector_column7>'.${"iliakos_gdeg".$z}.',</solar_collector_column7>'.$br.
'<solar_collector_column8>'.${"iliakos_bdeg".$z}.',</solar_collector_column8>'.$br.
'<solar_collector_column9>'.${"iliakos_fs".$z}.',</solar_collector_column9>'.$br.
'<solar_collector_column10>,</solar_collector_column10>'.$br.
'</solar_collector>'.$br;
}


if (${"systemkkm_rows".$z}==0){ //Δεν υπάρχει σύστημα φωτισμού
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
}
if (${"systemkkm_rows".$z}>0){ //Υπάρχει σύστημα φωτισμού
$xml .= '<lighting rid="1">'.$br.
'<lighting_exists>1</lighting_exists>'.$br.
'<lighting_parameter1>'.${"light_production_column1".$z}.',</lighting_parameter1>'.$br.
'<lighting_parameter2>'.${"light_production_column2".$z}.',</lighting_parameter2>'.$br.
'<lighting_parameter3>'.${"light_production_column3".$z}.',</lighting_parameter3>'.$br.
'<lighting_parameter4>'.${"light_production_column4".$z}.',</lighting_parameter4>'.$br.
'<lighting_parameter5>,</lighting_parameter5>'.$br.
'<lighting_parameter6>'.${"light_production_column6".$z}.',</lighting_parameter6>'.$br.
'<lighting_parameter7>'.${"light_production_column7".$z}.',</lighting_parameter7>'.$br.
'<lighting_parameter8>'.${"light_production_column8".$z}.',</lighting_parameter8>'.$br.
'</lighting>'.$br;
}

$xml .= '</SYSTEM>'.$br;
$xml .= "</ZONE".$z.">".$br;


}
$xml .= '</BUILDING>'.$br;

$xml .= '</ENR_IN>'.$br;


//Τέλος σώσε το αρχείο
$handle = fopen('tee-kenak-'.$namefile.'.xml','w+');
fwrite($handle,$xml);
echo "Το αρχείο " . 'tee' . "-kenak-" . $namefile . ".xml" . " εγγράφηκε επιτυχώς";
echo "<br/>" . "<a href=\"tee-kenak-$namefile.xml\" >Κατεβάστε το αρχείο xml-tee</a>";
fclose($handle);

?>
