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

***********************************************************************
Tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr     *
                                                                      *
Ανάγνωση στοιχείων από τη βάση για την εκτύπωση του τεύχους           *
include στο kenak_formteyxos.php                                      *
                                                                      *
***********************************************************************
*/
$save="*";
if (isset($_GET['save'])) $save=$_GET['save'];
//echo $save;
if ($save=="*"){

			//Γενικά στοιχεία
			$strSQL = "SELECT * FROM kataskeyi_stoixeia";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$num_rows = mysql_num_rows($objQuery);
			
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"zwni".$i} = $objResult["zwni"];
			${"climate_data".$i} = $objResult["climate_data"];
			${"xrisi".$i} = $objResult["xrisi"];
			${"nero_dikt".$i} = $objResult["nero_dikt"];
			${"velt_klisi".$i} = $objResult["velt_klisi"];
			${"epif_iliakoy".$i} = $objResult["iliakos"];
			}
			
			$zwni = $zwni1;
			$climate_data_id = $climate_data1;
			$xrisi_id = $xrisi1;
			$nero_dikt_id = $nero_dikt1;
			$velt_klisi_id = $velt_klisi1;
			$epif_iliakoy = $epif_iliakoy1;
			
			$climate_data_array = get_times("place", "climate41", $climate_data_id);
			$climate_data = $climate_data_array[0]["place"];
			
			$xrisi_array = get_times("*", "energy_conditions", $xrisi_id);
			$xrisi = $xrisi_array[0]["xrisi"];
			$gen_xrisi = $xrisi_array[0]["gen_xrisi"];
			
			$nero_dikt_array = get_times("place", "climate61", $nero_dikt_id);
			$nero_dikt = $nero_dikt_array[0]["place"];
			
			$velt_klisi_array = get_times("place", "climate44", $velt_klisi_id);
			$velt_klisi = $velt_klisi_array[0]["place"];
			

			//Δάπεδα οροφές
			$strSQL = "SELECT * FROM kataskeyi_daporo";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$num_rows = mysql_num_rows($objQuery);
			
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"dapedo_name".$i} = $objResult["name"];
			${"dapedo_emvadon".$i} = $objResult["emvadon"];
			${"dapedo_u".$i} = $objResult["u"];
			}
			
			$dapedo_embadon1 = $dapedo_emvadon1;
			$dapedo_u1 = $dapedo_u1;
			$dapedo_embadon2 = $dapedo_emvadon2;
			$dapedo_u2 = $dapedo_u2;
			$orofi_embadon1 = $dapedo_emvadon3;
			$orofi_u1 = $dapedo_u3;
			$orofi_embadon2 = $dapedo_emvadon4;
			$orofi_u2 = $dapedo_u4;
		
		//Υπολογισμοί U*A δαπέδων - οροφών
		$dapedo_ua1 = $dapedo_embadon1 * $dapedo_u1;
		$dapedo_ua2 = $dapedo_embadon2 * $dapedo_u2;
		$dapedo_ua = $dapedo_ua1*0.5 + $dapedo_ua2*0.5;
		$orofi_ua1 = $orofi_embadon1 * $orofi_u1;
		$orofi_ua2 = $orofi_embadon2 * $orofi_u2;
		$orofi_ua = $orofi_ua1 + $orofi_ua2;
		
			//Χώροι κτιρίου
			$strSQL = "SELECT * FROM kataskeyi_xwroi";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$rows_xwroi = mysql_num_rows($objQuery);

			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"xwroi_name".$i} = $objResult["name"];
			${"xwroi_mikos".$i} = $objResult["mikos"];
			${"xwroi_platos".$i} = $objResult["platos"];
			${"xwroi_ypsos".$i} = $objResult["ypsos"];
			${"xwroi_emvadon".$i} = ${"xwroi_mikos".$i} * ${"xwroi_platos".$i};
			$synoliko_embadon += ${"xwroi_emvadon".$i};
			${"xwroi_ogkos".$i} = ${"xwroi_mikos".$i} * ${"xwroi_platos".$i} * ${"xwroi_ypsos".$i};
			$synolikos_ogkos += ${"xwroi_ogkos".$i};		
			}
			
			//Θερμογέφυρες
			//Δαπέδου
			$strSQL = "SELECT * FROM kataskeyi_therm_dap";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$num_rows = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"therm_dap".$i} = $objResult["therm_dap"];
			}
			$thermo_dapedo_drop = $therm_dap1;
			
			//εξωτερικές γωνίες
			$strSQL = "SELECT * FROM kataskeyi_therm_eks";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$rows_eks_g = mysql_num_rows($objQuery);

			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"thermo_eksw_drop".$i} = $objResult["thermo_u"];
			${"thermo_eksw_gwnia_p".$i} = $objResult["plithos"];
			${"thermo_eksw_gwnia_ypsos".$i} = $objResult["ypsos"];
			${"thermo_eksw_gwnia_ua".$i} = ${"thermo_eksw_gwnia_p".$i} * ${"thermo_eksw_gwnia_ypsos".$i} * ${"thermo_eksw_drop".$i};
			$thermo_eksw_gwnia_ua += ${"thermo_eksw_gwnia_ua".$i};
			}
			$thermogefyres_gwnia = $thermo_esw_gwnia_ua + $thermo_eksw_gwnia_ua;
			
			//εσωτερικές γωνίες
			$strSQL = "SELECT * FROM kataskeyi_therm_es";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$rows_es_g = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"thermo_esw_drop".$i} = $objResult["thermo_u"];
			${"thermo_esw_gwnia_p".$i} = $objResult["plithos"];
			${"thermo_esw_gwnia_ypsos".$i} = $objResult["ypsos"];
			${"thermo_esw_gwnia_ua".$i} = ${"thermo_esw_gwnia_p".$i} * ${"thermo_esw_gwnia_ypsos".$i} * ${"thermo_esw_drop".$i};
			$thermo_esw_gwnia_ua += ${"thermo_esw_gwnia_ua".$i};
			}

			
			
			//Τοιχοποιία Βόρεια
			$strSQL = "SELECT * FROM kataskeyi_t_b";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$t_boreia = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$t = "_b";
			${"id".$t.$i} = $objResult["id"];
			${"name".$t.$i} = $objResult["name"];
			${"mikos".$t.$i} = $objResult["t_mikos"];
			${"ypsos".$t.$i} = $objResult["t_ypsos"];
			${"paxos".$t.$i} = $objResult["t_platos"];
			${"u".$t.$i} = $objResult["t_u"];
			${"thermo_orofis_drop".$t.$i} = $objResult["t_thermo"];
			${"dokos".$t.$i} = $objResult["d_ypsos"];
			${"u_dok".$t.$i} = $objResult["d_u"];
			${"thermo_dokoy_drop".$t.$i} = $objResult["d_thermo"];
			${"ypostil".$t.$i} = $objResult["yp_mikos"];
			${"arithmos_ypost".$t.$i} = $objResult["yp_plithos"];
			${"u_ypost".$t.$i} = $objResult["yp_u"];
			${"thermo_ypost_drop".$t.$i} = $objResult["yp_thermo"];
			${"mikos_syr".$t.$i} = $objResult["syr_mikos"];
			${"ypsos_syr".$t.$i} = $objResult["syr_ypsos"];
			${"u_syr".$t.$i} = $objResult["syr_u"];
			}



			//Τοιχοποιία Ανατολικά
			$strSQL = "SELECT * FROM kataskeyi_t_a";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$t_anatolika = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$t = "_a";
			${"id".$t.$i} = $objResult["id"];
			${"name".$t.$i} = $objResult["name"];
			${"mikos".$t.$i} = $objResult["t_mikos"];
			${"ypsos".$t.$i} = $objResult["t_ypsos"];
			${"paxos".$t.$i} = $objResult["t_platos"];
			${"u".$t.$i} = $objResult["t_u"];
			${"thermo_orofis_drop".$t.$i} = $objResult["t_thermo"];
			${"dokos".$t.$i} = $objResult["d_ypsos"];
			${"u_dok".$t.$i} = $objResult["d_u"];
			${"thermo_dokoy_drop".$t.$i} = $objResult["d_thermo"];
			${"ypostil".$t.$i} = $objResult["yp_mikos"];
			${"arithmos_ypost".$t.$i} = $objResult["yp_plithos"];
			${"u_ypost".$t.$i} = $objResult["yp_u"];
			${"thermo_ypost_drop".$t.$i} = $objResult["yp_thermo"];
			${"mikos_syr".$t.$i} = $objResult["syr_mikos"];
			${"ypsos_syr".$t.$i} = $objResult["syr_ypsos"];
			${"u_syr".$t.$i} = $objResult["syr_u"];
			}			
			
			
			
			//Τοιχοποιία Νότια
			$strSQL = "SELECT * FROM kataskeyi_t_n";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$t_notia = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$t = "_n";
			${"id".$t.$i} = $objResult["id"];
			${"name".$t.$i} = $objResult["name"];
			${"mikos".$t.$i} = $objResult["t_mikos"];
			${"ypsos".$t.$i} = $objResult["t_ypsos"];
			${"paxos".$t.$i} = $objResult["t_platos"];
			${"u".$t.$i} = $objResult["t_u"];
			${"thermo_orofis_drop".$t.$i} = $objResult["t_thermo"];
			${"dokos".$t.$i} = $objResult["d_ypsos"];
			${"u_dok".$t.$i} = $objResult["d_u"];
			${"thermo_dokoy_drop".$t.$i} = $objResult["d_thermo"];
			${"ypostil".$t.$i} = $objResult["yp_mikos"];
			${"arithmos_ypost".$t.$i} = $objResult["yp_plithos"];
			${"u_ypost".$t.$i} = $objResult["yp_u"];
			${"thermo_ypost_drop".$t.$i} = $objResult["yp_thermo"];
			${"mikos_syr".$t.$i} = $objResult["syr_mikos"];
			${"ypsos_syr".$t.$i} = $objResult["syr_ypsos"];
			${"u_syr".$t.$i} = $objResult["syr_u"];
			}			
			
			
			
			//Τοιχοποιία Δυτικά
			$strSQL = "SELECT * FROM kataskeyi_t_d";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$t_dytika = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$t = "_d";
			${"id".$t.$i} = $objResult["id"];
			${"name".$t.$i} = $objResult["name"];
			${"mikos".$t.$i} = $objResult["t_mikos"];
			${"ypsos".$t.$i} = $objResult["t_ypsos"];
			${"paxos".$t.$i} = $objResult["t_platos"];
			${"u".$t.$i} = $objResult["t_u"];
			${"thermo_orofis_drop".$t.$i} = $objResult["t_thermo"];
			${"dokos".$t.$i} = $objResult["d_ypsos"];
			${"u_dok".$t.$i} = $objResult["d_u"];
			${"thermo_dokoy_drop".$t.$i} = $objResult["d_thermo"];
			${"ypostil".$t.$i} = $objResult["yp_mikos"];
			${"arithmos_ypost".$t.$i} = $objResult["yp_plithos"];
			${"u_ypost".$t.$i} = $objResult["yp_u"];
			${"thermo_ypost_drop".$t.$i} = $objResult["yp_thermo"];
			${"mikos_syr".$t.$i} = $objResult["syr_mikos"];
			${"ypsos_syr".$t.$i} = $objResult["syr_ypsos"];
			${"u_syr".$t.$i} = $objResult["syr_u"];
			}			
			
			
			
			//Ανοίγματα Β
			$strSQL = "SELECT * FROM kataskeyi_an_b";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$anoig_t_boreia = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$an = "an_b_";
			${$an."id".$i} = $objResult["id"];
			${$an."id_toixoy".$i} = $objResult["id_toixoy"];
			${$an."name".$i} = $objResult["name"];
			${$an."anoig_mikos".$i} = $objResult["anoig_mikos"];
			${$an."anoig_ypsos".$i} = $objResult["anoig_ypsos"];
			${$an."anoig_u".$i} = $objResult["anoig_u"];
			${$an."anoig_eidos".$i} = $objResult["anoig_eidos"];
			${$an."anoig_aerismos".$i} = $objResult["anoig_aerismos"];
			${$an."anoig_lampas".$i} = $objResult["anoig_lampas"];
			${$an."anoig_ankat".$i} = $objResult["anoig_ankat"];
			}
			
			
			//Ανοίγματα Α
			$strSQL = "SELECT * FROM kataskeyi_an_a";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$anoig_t_anatolika = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$an = "an_a_";
			${$an."id".$i} = $objResult["id"];
			${$an."id_toixoy".$i} = $objResult["id_toixoy"];
			${$an."name".$i} = $objResult["name"];
			${$an."anoig_mikos".$i} = $objResult["anoig_mikos"];
			${$an."anoig_ypsos".$i} = $objResult["anoig_ypsos"];
			${$an."anoig_u".$i} = $objResult["anoig_u"];
			${$an."anoig_eidos".$i} = $objResult["anoig_eidos"];
			${$an."anoig_aerismos".$i} = $objResult["anoig_aerismos"];
			${$an."anoig_lampas".$i} = $objResult["anoig_lampas"];
			${$an."anoig_ankat".$i} = $objResult["anoig_ankat"];

			}

			
			
			//Ανοίγματα N
			$strSQL = "SELECT * FROM kataskeyi_an_n";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$anoig_t_notia = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$an = "an_n_";
			${$an."id".$i} = $objResult["id"];
			${$an."id_toixoy".$i} = $objResult["id_toixoy"];
			${$an."name".$i} = $objResult["name"];
			${$an."anoig_mikos".$i} = $objResult["anoig_mikos"];
			${$an."anoig_ypsos".$i} = $objResult["anoig_ypsos"];
			${$an."anoig_u".$i} = $objResult["anoig_u"];
			${$an."anoig_eidos".$i} = $objResult["anoig_eidos"];
			${$an."anoig_aerismos".$i} = $objResult["anoig_aerismos"];
			${$an."anoig_lampas".$i} = $objResult["anoig_lampas"];
			${$an."anoig_ankat".$i} = $objResult["anoig_ankat"];
			
			}
			
			
			//Ανοίγματα Δ
			$strSQL = "SELECT * FROM kataskeyi_an_d";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$anoig_t_dytika = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$an = "an_d_";
			${$an."id".$i} = $objResult["id"];
			${$an."id_toixoy".$i} = $objResult["id_toixoy"];
			${$an."name".$i} = $objResult["name"];
			${$an."anoig_mikos".$i} = $objResult["anoig_mikos"];
			${$an."anoig_ypsos".$i} = $objResult["anoig_ypsos"];
			${$an."anoig_u".$i} = $objResult["anoig_u"];
			${$an."anoig_eidos".$i} = $objResult["anoig_eidos"];
			${$an."anoig_aerismos".$i} = $objResult["anoig_aerismos"];
			${$an."anoig_lampas".$i} = $objResult["anoig_lampas"];
			${$an."anoig_ankat".$i} = $objResult["anoig_ankat"];
			
			}
			
			//ΣΚΙΑΣΕΙΣ ΤΟΙΧΩΝ (Οι μεταβλητές έχουν τη μορφή sk_t_{b ή a ή d ή n}_{ονομα στοιχείου}_i
			//Σκιάσεις τοίχων ΒΟΡΕΙΑ
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_b";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_t_b = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = "sk_t_b_";
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_toixoy".$i} = $objResult["id_toixoy"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}

			//Σκιάσεις τοίχων ΑΝΑΤΟΛΙΚΑ
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_a";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_t_a = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = "sk_t_a_";
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_toixoy".$i} = $objResult["id_toixoy"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}

			//Σκιάσεις τοίχων ΝΟΤΙΑ

			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_n";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_t_n = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = "sk_t_n_";
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_toixoy".$i} = $objResult["id_toixoy"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}
			

			//Σκιάσεις τοίχων ΔΥΤΙΚΑ
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_d";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_t_d = mysql_num_rows($objQuery);

			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = "sk_t_d_";
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_toixoy".$i} = $objResult["id_toixoy"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}

			
			
			//ΣΚΙΑΣΕΙΣ ΑΝΟΙΓΜΑΤΩΝ  (Οι μεταβλητές έχουν τη μορφή sk_an_{b ή a ή d ή n}_{ονομα στοιχείου}_i
			//Σκιάσεις ανοιγμάτων ΒΟΡΕΙΑ

			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_b";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_anoig_b = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = "sk_an_b_";
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_an".$i} = $objResult["id_an"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}

			//Σκιάσεις ανοιγμάτων ΑΝΑΤΟΛΙΚΑ
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_a";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_anoig_a = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = "sk_an_a_";
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_an".$i} = $objResult["id_an"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}

			//Σκιάσεις ανοιγμάτων ΝΟΤΙΑ

			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_n";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_anoig_n = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = "sk_an_n_";
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_an".$i} = $objResult["id_an"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}

			//Σκιάσεις ανοιγμάτων ΔΥΤΙΚΑ

			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_d";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_anoig_d = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = "sk_an_d_";
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_an".$i} = $objResult["id_an"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}

			
			

		//Υπολογισμοί τοίχων ανοιγμάτων
		for ($i = 1; $i <= $t_boreia; $i++) {
		$t = "b";
		$an = "an_b_";
		
		${"epifaneia_toixoy_".$t.$i} = ${"mikos_".$t.$i} * ${"ypsos_".$t.$i};
		${"epifaneia_toixoy_syr_".$t.$i} = ${"mikos_syr_".$t.$i} * ${"ypsos_syr_".$t.$i};
		${"epifaneia_dokos_".$t.$i} = ${"mikos_".$t.$i} * ${"dokos_".$t.$i};
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * (${"ypsos_".$t.$i} - ${"dokos_".$t.$i});
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
		${"thermogefyres_toixoy_".$t} += ${"thermogefyres_toixoy_".$t.$i};
		${"mikos_toixoy_".$t} += ${"mikos_".$t.$i};
		${"epifaneia_toixoy_".$t} += ${"epifaneia_toixoy_".$t.$i};
		${"epifaneia_toixoy_syr_".$t} += ${"epifaneia_toixoy_syr_".$t.$i};
		${"epifaneia_dokos_".$t} += ${"epifaneia_dokos_".$t.$i};
		${"epifaneia_ypost_".$t} += ${"epifaneia_ypost_".$t.$i};
		${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_toixoy_".$t.$i} - ${"epifaneia_toixoy_syr_".$t.$i} - ${"epifaneia_dokos_".$t.$i} - ${"epifaneia_ypost_".$t.$i};
		
			for ($j = 1; $j <= $anoig_t_boreia; $j++) {
			//υπολογισμοί ανοιγμάτων b
					${"dieisdysi_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j} * ${$an."anoig_aerismos".$j};
					${"thermogefyres_anoig_".$t.$j} = (${$an."anoig_mikos".$j} * ${$an."anoig_ankat".$j})*2 + (${$an."anoig_ypsos".$j} * ${$an."anoig_lampas".$j})*2;
						if (${$an."anoig_eidos".$j} != 1) {
						${"epifaneia_anoigmatos_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j};
						${"ua_anoigmatos_".$t.$j} = ${"epifaneia_anoigmatos_".$t.$j} * ${$an."anoig_u".$j};
						}
						if (${$an."anoig_eidos".$j} == 1){
						${"epifaneia_masif_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j};	
						${"ua_masif_".$t.$j} = ${"epifaneia_masif_".$t.$j} * ${$an."anoig_u".$j};
						
						}
						
					if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
					${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_dromikoy_".$t.$i} - ${"epifaneia_anoigmatos_".$t.$j} - ${"epifaneia_masif_".$t.$j};
					${"epifaneia_anoigmatwn_toixoy_".$t.$i} += ${"epifaneia_anoigmatos_".$t.$j};
					${"ua_anoigmatos_toixoy_".$t.$i} += ${"ua_anoigmatos_".$t.$j};
					${"epifaneia_masif_toixoy_".$t.$i} += ${"epifaneia_masif_".$t.$j};
					${"ua_masif_toixoy_".$t.$i} += ${"ua_masif_".$t.$j};
					${"dieisdysi_toixoy_".$t.$i} += ${"dieisdysi_".$t.$j};
					${"thermogefyres_anoig_toixoy_".$t.$i} += ${"thermogefyres_anoig_".$t.$j};
					}
							
			}
		
		${"dieisdysi_".$t} += ${"dieisdysi_toixoy_".$t.$i};
		${"thermogefyres_anoig_".$t} += ${"thermogefyres_anoig_toixoy_".$t.$i};
		${"epifaneia_anoigmatwn_toixoy_".$t} += ${"epifaneia_anoigmatwn_toixoy_".$t.$i};
		${"ua_anoigmatos_toixoy_".$t} += ${"ua_anoigmatos_toixoy_".$t.$i};
		${"epifaneia_masif_toixoy_".$t} += ${"epifaneia_masif_toixoy_".$t.$i};
		${"ua_masif_toixoy_".$t} += ${"ua_masif_toixoy_".$t.$i};
		${"epifaneia_dromikoy_".$t} += ${"epifaneia_dromikoy_".$t.$i};
		${"ua_dromikoy_".$t.$i} = ${"u_".$t.$i} *  ${"epifaneia_dromikoy_".$t.$i};
		${"ua_dromikoy_".$t} += ${"ua_dromikoy_".$t.$i};
		${"ua_syr_".$t.$i} = ${"u_syr_".$t.$i} *  ${"epifaneia_toixoy_syr_".$t.$i};
		${"ua_syr_".$t} += ${"ua_syr_".$t.$i};
		${"ua_dok_".$t.$i} = ${"u_dok_".$t.$i} * ${"epifaneia_dokos_".$t.$i};
		${"ua_dok_".$t} += ${"ua_dok_".$t.$i};
		${"ua_ypost_".$t.$i} = ${"u_ypost_".$t.$i} * ${"epifaneia_ypost_".$t.$i};
		${"ua_ypost_".$t} += ${"ua_ypost_".$t.$i};
		}


		
		for ($i = 1; $i <= $t_anatolika; $i++) {
		$t = "a";
		$an = "an_a_";
		
		${"epifaneia_toixoy_".$t.$i} = ${"mikos_".$t.$i} * ${"ypsos_".$t.$i};
		${"epifaneia_toixoy_syr_".$t.$i} = ${"mikos_syr_".$t.$i} * ${"ypsos_syr_".$t.$i};
		${"epifaneia_dokos_".$t.$i} = ${"mikos_".$t.$i} * ${"dokos_".$t.$i};
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * (${"ypsos_".$t.$i} - ${"dokos_".$t.$i});
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
		${"thermogefyres_toixoy_".$t} += ${"thermogefyres_toixoy_".$t.$i};
		${"mikos_toixoy_".$t} += ${"mikos_".$t.$i};
		${"epifaneia_toixoy_".$t} += ${"epifaneia_toixoy_".$t.$i};
		${"epifaneia_toixoy_syr_".$t} += ${"epifaneia_toixoy_syr_".$t.$i};
		${"epifaneia_dokos_".$t} += ${"epifaneia_dokos_".$t.$i};
		${"epifaneia_ypost_".$t} += ${"epifaneia_ypost_".$t.$i};
		${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_toixoy_".$t.$i} - ${"epifaneia_toixoy_syr_".$t.$i} - ${"epifaneia_dokos_".$t.$i} - ${"epifaneia_ypost_".$t.$i};
		
			for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
			//υπολογισμοί ανοιγμάτων a
				${"dieisdysi_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j} * ${$an."anoig_aerismos".$j};
					${"thermogefyres_anoig_".$t.$j} = (${$an."anoig_mikos".$j} * ${$an."anoig_ankat".$j})*2 + (${$an."anoig_ypsos".$j} * ${$an."anoig_lampas".$j})*2;
						if (${$an."anoig_eidos".$j} != 1) {
						${"epifaneia_anoigmatos_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j};
						${"ua_anoigmatos_".$t.$j} = ${"epifaneia_anoigmatos_".$t.$j} * ${$an."anoig_u".$j};
						}
						if (${$an."anoig_eidos".$j} == 1){
						${"epifaneia_masif_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j};	
						${"ua_masif_".$t.$j} = ${"epifaneia_masif_".$t.$j} * ${$an."anoig_u".$j};
						
						}
						
					if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
					${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_dromikoy_".$t.$i} - ${"epifaneia_anoigmatos_".$t.$j} - ${"epifaneia_masif_".$t.$j};
					${"epifaneia_anoigmatwn_toixoy_".$t.$i} += ${"epifaneia_anoigmatos_".$t.$j};
					${"ua_anoigmatos_toixoy_".$t.$i} += ${"ua_anoigmatos_".$t.$j};
					${"epifaneia_masif_toixoy_".$t.$i} += ${"epifaneia_masif_".$t.$j};
					${"ua_masif_toixoy_".$t.$i} += ${"ua_masif_".$t.$j};
					${"dieisdysi_toixoy_".$t.$i} += ${"dieisdysi_".$t.$j};
					${"thermogefyres_anoig_toixoy_".$t.$i} += ${"thermogefyres_anoig_".$t.$j};
					}
				
			}
		
		${"dieisdysi_".$t} += ${"dieisdysi_toixoy_".$t.$i};
		${"thermogefyres_anoig_".$t} += ${"thermogefyres_anoig_toixoy_".$t.$i};
		${"epifaneia_anoigmatwn_toixoy_".$t} += ${"epifaneia_anoigmatwn_toixoy_".$t.$i};
		${"ua_anoigmatos_toixoy_".$t} += ${"ua_anoigmatos_toixoy_".$t.$i};
		${"epifaneia_masif_toixoy_".$t} += ${"epifaneia_masif_toixoy_".$t.$i};
		${"ua_masif_toixoy_".$t} += ${"ua_masif_toixoy_".$t.$i};
		${"epifaneia_dromikoy_".$t} += ${"epifaneia_dromikoy_".$t.$i};
		${"ua_dromikoy_".$t.$i} = ${"u_".$t.$i} *  ${"epifaneia_dromikoy_".$t.$i};
		${"ua_dromikoy_".$t} += ${"ua_dromikoy_".$t.$i};
		${"ua_syr_".$t.$i} = ${"u_syr_".$t.$i} *  ${"epifaneia_toixoy_syr_".$t.$i};
		${"ua_syr_".$t} += ${"ua_syr_".$t.$i};
		${"ua_dok_".$t.$i} = ${"u_dok_".$t.$i} * ${"epifaneia_dokos_".$t.$i};
		${"ua_dok_".$t} += ${"ua_dok_".$t.$i};
		${"ua_ypost_".$t.$i} = ${"u_ypost_".$t.$i} * ${"epifaneia_ypost_".$t.$i};
		${"ua_ypost_".$t} += ${"ua_ypost_".$t.$i};
		}
		
		
		
		
		
		for ($i = 1; $i <= $t_notia; $i++) {
		$t = "n";
		$an = "an_n_";
		
		${"epifaneia_toixoy_".$t.$i} = ${"mikos_".$t.$i} * ${"ypsos_".$t.$i};
		${"epifaneia_toixoy_syr_".$t.$i} = ${"mikos_syr_".$t.$i} * ${"ypsos_syr_".$t.$i};
		${"epifaneia_dokos_".$t.$i} = ${"mikos_".$t.$i} * ${"dokos_".$t.$i};
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * (${"ypsos_".$t.$i} - ${"dokos_".$t.$i});
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
		${"thermogefyres_toixoy_".$t} += ${"thermogefyres_toixoy_".$t.$i};
		${"mikos_toixoy_".$t} += ${"mikos_".$t.$i};
		${"epifaneia_toixoy_".$t} += ${"epifaneia_toixoy_".$t.$i};
		${"epifaneia_toixoy_syr_".$t} += ${"epifaneia_toixoy_syr_".$t.$i};
		${"epifaneia_dokos_".$t} += ${"epifaneia_dokos_".$t.$i};
		${"epifaneia_ypost_".$t} += ${"epifaneia_ypost_".$t.$i};
		${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_toixoy_".$t.$i} - ${"epifaneia_toixoy_syr_".$t.$i} - ${"epifaneia_dokos_".$t.$i} - ${"epifaneia_ypost_".$t.$i};
		
			for ($j = 1; $j <= $anoig_t_notia; $j++) {
			//υπολογισμοί ανοιγμάτων n
				${"dieisdysi_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j} * ${$an."anoig_aerismos".$j};
					${"thermogefyres_anoig_".$t.$j} = (${$an."anoig_mikos".$j} * ${$an."anoig_ankat".$j})*2 + (${$an."anoig_ypsos".$j} * ${$an."anoig_lampas".$j})*2;
						if (${$an."anoig_eidos".$j} != 1) {
						${"epifaneia_anoigmatos_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j};
						${"ua_anoigmatos_".$t.$j} = ${"epifaneia_anoigmatos_".$t.$j} * ${$an."anoig_u".$j};
						}
						if (${$an."anoig_eidos".$j} == 1){
						${"epifaneia_masif_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j};	
						${"ua_masif_".$t.$j} = ${"epifaneia_masif_".$t.$j} * ${$an."anoig_u".$j};
						
						}
						
					if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
					${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_dromikoy_".$t.$i} - ${"epifaneia_anoigmatos_".$t.$j} - ${"epifaneia_masif_".$t.$j};
					${"epifaneia_anoigmatwn_toixoy_".$t.$i} += ${"epifaneia_anoigmatos_".$t.$j};
					${"ua_anoigmatos_toixoy_".$t.$i} += ${"ua_anoigmatos_".$t.$j};
					${"epifaneia_masif_toixoy_".$t.$i} += ${"epifaneia_masif_".$t.$j};
					${"ua_masif_toixoy_".$t.$i} += ${"ua_masif_".$t.$j};
					${"dieisdysi_toixoy_".$t.$i} += ${"dieisdysi_".$t.$j};
					${"thermogefyres_anoig_toixoy_".$t.$i} += ${"thermogefyres_anoig_".$t.$j};
					}
				
			}
		
		${"dieisdysi_".$t} += ${"dieisdysi_toixoy_".$t.$i};
		${"thermogefyres_anoig_".$t} += ${"thermogefyres_anoig_toixoy_".$t.$i};
		${"epifaneia_anoigmatwn_toixoy_".$t} += ${"epifaneia_anoigmatwn_toixoy_".$t.$i};
		${"ua_anoigmatos_toixoy_".$t} += ${"ua_anoigmatos_toixoy_".$t.$i};
		${"epifaneia_masif_toixoy_".$t} += ${"epifaneia_masif_toixoy_".$t.$i};
		${"ua_masif_toixoy_".$t} += ${"ua_masif_toixoy_".$t.$i};
		${"epifaneia_dromikoy_".$t} += ${"epifaneia_dromikoy_".$t.$i};
		${"ua_dromikoy_".$t.$i} = ${"u_".$t.$i} *  ${"epifaneia_dromikoy_".$t.$i};
		${"ua_dromikoy_".$t} += ${"ua_dromikoy_".$t.$i};
		${"ua_syr_".$t.$i} = ${"u_syr_".$t.$i} *  ${"epifaneia_toixoy_syr_".$t.$i};
		${"ua_syr_".$t} += ${"ua_syr_".$t.$i};
		${"ua_dok_".$t.$i} = ${"u_dok_".$t.$i} * ${"epifaneia_dokos_".$t.$i};
		${"ua_dok_".$t} += ${"ua_dok_".$t.$i};
		${"ua_ypost_".$t.$i} = ${"u_ypost_".$t.$i} * ${"epifaneia_ypost_".$t.$i};
		${"ua_ypost_".$t} += ${"ua_ypost_".$t.$i};
		}
		
		
		
		
		for ($i = 1; $i <= $t_dytika; $i++) {
		$t = "d";
		$an = "an_d_";
		
		${"epifaneia_toixoy_".$t.$i} = ${"mikos_".$t.$i} * ${"ypsos_".$t.$i};
		${"epifaneia_toixoy_syr_".$t.$i} = ${"mikos_syr_".$t.$i} * ${"ypsos_syr_".$t.$i};
		${"epifaneia_dokos_".$t.$i} = ${"mikos_".$t.$i} * ${"dokos_".$t.$i};
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * (${"ypsos_".$t.$i} - ${"dokos_".$t.$i});
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
		${"thermogefyres_toixoy_".$t} += ${"thermogefyres_toixoy_".$t.$i};
		${"mikos_toixoy_".$t} += ${"mikos_".$t.$i};
		${"epifaneia_toixoy_".$t} += ${"epifaneia_toixoy_".$t.$i};
		${"epifaneia_toixoy_syr_".$t} += ${"epifaneia_toixoy_syr_".$t.$i};
		${"epifaneia_dokos_".$t} += ${"epifaneia_dokos_".$t.$i};
		${"epifaneia_ypost_".$t} += ${"epifaneia_ypost_".$t.$i};
		${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_toixoy_".$t.$i} - ${"epifaneia_toixoy_syr_".$t.$i} - ${"epifaneia_dokos_".$t.$i} - ${"epifaneia_ypost_".$t.$i};
		
			for ($j = 1; $j <= $anoig_t_dytika; $j++) {
			//υπολογισμοί ανοιγμάτων d
				${"dieisdysi_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j} * ${$an."anoig_aerismos".$j};
					${"thermogefyres_anoig_".$t.$j} = (${$an."anoig_mikos".$j} * ${$an."anoig_ankat".$j})*2 + (${$an."anoig_ypsos".$j} * ${$an."anoig_lampas".$j})*2;
						if (${$an."anoig_eidos".$j} != 1) {
						${"epifaneia_anoigmatos_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j};
						${"ua_anoigmatos_".$t.$j} = ${"epifaneia_anoigmatos_".$t.$j} * ${$an."anoig_u".$j};
						}
						if (${$an."anoig_eidos".$j} == 1){
						${"epifaneia_masif_".$t.$j} = ${$an."anoig_mikos".$j} * ${$an."anoig_ypsos".$j};	
						${"ua_masif_".$t.$j} = ${"epifaneia_masif_".$t.$j} * ${$an."anoig_u".$j};
						
						}
						
					if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
					${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_dromikoy_".$t.$i} - ${"epifaneia_anoigmatos_".$t.$j} - ${"epifaneia_masif_".$t.$j};
					${"epifaneia_anoigmatwn_toixoy_".$t.$i} += ${"epifaneia_anoigmatos_".$t.$j};
					${"ua_anoigmatos_toixoy_".$t.$i} += ${"ua_anoigmatos_".$t.$j};
					${"epifaneia_masif_toixoy_".$t.$i} += ${"epifaneia_masif_".$t.$j};
					${"ua_masif_toixoy_".$t.$i} += ${"ua_masif_".$t.$j};
					${"dieisdysi_toixoy_".$t.$i} += ${"dieisdysi_".$t.$j};
					${"thermogefyres_anoig_toixoy_".$t.$i} += ${"thermogefyres_anoig_".$t.$j};
					}
				
			}
		
		${"dieisdysi_".$t} += ${"dieisdysi_toixoy_".$t.$i};
		${"thermogefyres_anoig_".$t} += ${"thermogefyres_anoig_toixoy_".$t.$i};
		${"epifaneia_anoigmatwn_toixoy_".$t} += ${"epifaneia_anoigmatwn_toixoy_".$t.$i};
		${"ua_anoigmatos_toixoy_".$t} += ${"ua_anoigmatos_toixoy_".$t.$i};
		${"epifaneia_masif_toixoy_".$t} += ${"epifaneia_masif_toixoy_".$t.$i};
		${"ua_masif_toixoy_".$t} += ${"ua_masif_toixoy_".$t.$i};
		${"epifaneia_dromikoy_".$t} += ${"epifaneia_dromikoy_".$t.$i};
		${"ua_dromikoy_".$t.$i} = ${"u_".$t.$i} *  ${"epifaneia_dromikoy_".$t.$i};
		${"ua_dromikoy_".$t} += ${"ua_dromikoy_".$t.$i};
		${"ua_syr_".$t.$i} = ${"u_syr_".$t.$i} *  ${"epifaneia_toixoy_syr_".$t.$i};
		${"ua_syr_".$t} += ${"ua_syr_".$t.$i};
		${"ua_dok_".$t.$i} = ${"u_dok_".$t.$i} * ${"epifaneia_dokos_".$t.$i};
		${"ua_dok_".$t} += ${"ua_dok_".$t.$i};
		${"ua_ypost_".$t.$i} = ${"u_ypost_".$t.$i} * ${"epifaneia_ypost_".$t.$i};
		${"ua_ypost_".$t} += ${"ua_ypost_".$t.$i};
		}
		
		
		
		//Υπολογισμός περιμέτρου
		//Το παρακάτω διορθώθηκε και για πολυόροφα κτήρια
		//$perimetros = $mikos_toixoy_b + $mikos_toixoy_a + $mikos_toixoy_n + $mikos_toixoy_d;
		$strSQL = "SELECT * FROM kataskeyi_therm_dap";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$num_rows = mysql_num_rows($objQuery);
			
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"perimetros".$i} = $objResult["perimetros"];
			}
			
			$perimetros = $perimetros1;
		
		
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
			$ua_anoigmatos = $ua_anoigmatos_toixoy_b + $ua_anoigmatos_toixoy_a + $ua_anoigmatos_toixoy_n + $ua_anoigmatos_toixoy_d;
			$ua_masif = $ua_masif_toixoy_b + $ua_masif_toixoy_a + $ua_masif_toixoy_n + $ua_masif_toixoy_d;
			
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
			
			//Στοιχεία θερμογεφυρών:
			$sunolo_ua = $thermogefyres + $ua_thermoperatotitas;
			$uadiaa = $sunolo_ua / $a_thermoperatotitas;
			
			
			//Έλεγχος ζώνης και θερμομονωτικής επάρκειας
			$aprosv = $a_thermoperatotitas / $synolikos_ogkos;
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
			
			$sygkrisiua = $uadiaa  / $umax;
			if ($sygkrisiua>1)$elegxosua="ΔΕΝ τηρείται U &lt;= Umax";
			if ($sygkrisiua<=1)$elegxosua="ΙΣΧΥΕΙ U &lt;= Umax";
			
			$drop_xrisi = $xrisi_id;
			$drop_nero_diktyoy = $nero_dikt_id;
			$drop_velt_klisi = $velt_klisi_id;

			$array_xrisis_znx = get_times("xrisi,znx_l_sq_d", "energy_conditions", $drop_xrisi);
			$xrisi_znx_iliakos = $array_xrisis_znx[0][0];
			$syntelestis_znx_iliakos = $array_xrisis_znx[0][1];
			$t_znx = 50; //Θερμοκρασία ΖΝΧ
			$vd_iliakoy = $syntelestis_znx_iliakos * $synoliko_embadon;
			
			//τράβα από το αρχείο τον πίνακα με τους υπολογισμούς ηλιακών
			//Νερό δικτύου
			//πρώτη γραμμή πίνακα
			$array_thermokrasiwn = get_times("*", "climate61", $drop_nero_diktyoy);
			$nero_jan = $array_thermokrasiwn[0]["jan"];
			$nero_feb = $array_thermokrasiwn[0]["feb"];
			$nero_mar = $array_thermokrasiwn[0]["mar"];
			$nero_apr = $array_thermokrasiwn[0]["apr"];
			$nero_may = $array_thermokrasiwn[0]["may"];
			$nero_jun = $array_thermokrasiwn[0]["jun"];
			$nero_jul = $array_thermokrasiwn[0]["jul"];
			$nero_aug = $array_thermokrasiwn[0]["aug"];
			$nero_sep = $array_thermokrasiwn[0]["sep"];
			$nero_okt = $array_thermokrasiwn[0]["okt"];
			$nero_nov = $array_thermokrasiwn[0]["nov"];
			$nero_dec = $array_thermokrasiwn[0]["dec"];
			
			//2η γραμμή πίνακα
			$fortio_znx_day_jan = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_jan)/3600,4);
			$fortio_znx_day_feb = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_feb)/3600,4);
			$fortio_znx_day_mar = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_mar)/3600,4);
			$fortio_znx_day_apr = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_apr)/3600,4);
			$fortio_znx_day_may = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_may)/3600,4);
			$fortio_znx_day_jun = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_jun)/3600,4);
			$fortio_znx_day_jul = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_jul)/3600,4);
			$fortio_znx_day_aug = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_aug)/3600,4);
			$fortio_znx_day_sep = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_sep)/3600,4);
			$fortio_znx_day_okt = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_okt)/3600,4);
			$fortio_znx_day_nov = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_nov)/3600,4);
			$fortio_znx_day_dec = round($vd_iliakoy * 0.998 * 4.18 * ($t_znx - $nero_dec)/3600,4);
			
			//3η γραμμή πίνακα
			$fortio_znx_jan = $fortio_znx_day_jan * 30;
			$fortio_znx_feb = $fortio_znx_day_feb * 30;
			$fortio_znx_mar = $fortio_znx_day_mar * 30;
			$fortio_znx_apr = $fortio_znx_day_apr * 30;
			$fortio_znx_may = $fortio_znx_day_may * 30;
			$fortio_znx_jun = $fortio_znx_day_jun * 30;
			$fortio_znx_jul = $fortio_znx_day_jul * 30;
			$fortio_znx_aug = $fortio_znx_day_aug * 30;
			$fortio_znx_sep = $fortio_znx_day_sep * 30;
			$fortio_znx_okt = $fortio_znx_day_okt * 30;
			$fortio_znx_nov = $fortio_znx_day_nov * 30;
			$fortio_znx_dec = $fortio_znx_day_dec * 30;
			$fortio_znx = $fortio_znx_jan+$fortio_znx_feb+$fortio_znx_mar
			+$fortio_znx_apr+$fortio_znx_may+$fortio_znx_jun
			+$fortio_znx_jul+$fortio_znx_aug+$fortio_znx_sep
			+$fortio_znx_okt+$fortio_znx_nov+$fortio_znx_dec;
			
			//4η γραμμή πίνακα
			$array_akt = get_times("*", "climate44", $drop_velt_klisi);
			$iliaki_akt_jan = $array_akt[0]["jan"];
			$iliaki_akt_feb = $array_akt[0]["feb"];
			$iliaki_akt_mar = $array_akt[0]["mar"];
			$iliaki_akt_apr = $array_akt[0]["apr"];
			$iliaki_akt_may = $array_akt[0]["may"];
			$iliaki_akt_jun = $array_akt[0]["jun"];
			$iliaki_akt_jul = $array_akt[0]["jul"];
			$iliaki_akt_aug = $array_akt[0]["aug"];
			$iliaki_akt_sep = $array_akt[0]["sep"];
			$iliaki_akt_okt = $array_akt[0]["okt"];
			$iliaki_akt_nov = $array_akt[0]["nov"];
			$iliaki_akt_dec = $array_akt[0]["dec"];
			
			//5η γραμμή πίνακα
			$iliaki_akt_day_jan = round($iliaki_akt_jan/30,4);
			$iliaki_akt_day_feb = round($iliaki_akt_feb/30,4);
			$iliaki_akt_day_mar = round($iliaki_akt_mar/30,4);
			$iliaki_akt_day_apr = round($iliaki_akt_apr/30,4);
			$iliaki_akt_day_may = round($iliaki_akt_may/30,4);
			$iliaki_akt_day_jun = round($iliaki_akt_jun/30,4);
			$iliaki_akt_day_jul = round($iliaki_akt_jul/30,4);
			$iliaki_akt_day_aug = round($iliaki_akt_aug/30,4);
			$iliaki_akt_day_sep = round($iliaki_akt_sep/30,4);
			$iliaki_akt_day_okt = round($iliaki_akt_okt/30,4);
			$iliaki_akt_day_nov = round($iliaki_akt_nov/30,4);
			$iliaki_akt_day_dec = round($iliaki_akt_dec/30,4);
			
			//6η γραμμή πίνακα
			$iliaki_akt_dayk4_jan = round($iliaki_akt_day_jan*0.33*0.923,4);
			$iliaki_akt_dayk4_feb = round($iliaki_akt_day_feb*0.33*0.923,4);
			$iliaki_akt_dayk4_mar = round($iliaki_akt_day_mar*0.33*0.923,4);
			$iliaki_akt_dayk4_apr = round($iliaki_akt_day_apr*0.33*0.923,4);
			$iliaki_akt_dayk4_may = round($iliaki_akt_day_may*0.33*0.923,4);
			$iliaki_akt_dayk4_jun = round($iliaki_akt_day_jun*0.33*0.923,4);
			$iliaki_akt_dayk4_jul = round($iliaki_akt_day_jul*0.33*0.923,4);
			$iliaki_akt_dayk4_aug = round($iliaki_akt_day_aug*0.33*0.923,4);
			$iliaki_akt_dayk4_sep = round($iliaki_akt_day_sep*0.33*0.923,4);
			$iliaki_akt_dayk4_okt = round($iliaki_akt_day_okt*0.33*0.923,4);
			$iliaki_akt_dayk4_nov = round($iliaki_akt_day_nov*0.33*0.923,4);
			$iliaki_akt_dayk4_dec = round($iliaki_akt_day_dec*0.33*0.923,4);
			$iliaki_akt_dayk4 = $iliaki_akt_dayk4_jan+$iliaki_akt_dayk4_feb+$iliaki_akt_dayk4_mar
			+$iliaki_akt_dayk4_apr+$iliaki_akt_dayk4_may+$iliaki_akt_dayk4_jun
			+$iliaki_akt_dayk4_jul+$iliaki_akt_dayk4_aug+$iliaki_akt_dayk4_sep
			+$iliaki_akt_dayk4_okt+$iliaki_akt_dayk4_nov+$iliaki_akt_dayk4_dec;
			
			//7η γραμμή πίνακα
			$apolavi_jan = round($iliaki_akt_dayk4_jan*$epif_iliakoy*30,4);
			$apolavi_feb = round($iliaki_akt_dayk4_feb*$epif_iliakoy*30,4);
			$apolavi_mar = round($iliaki_akt_dayk4_mar*$epif_iliakoy*30,4);
			$apolavi_apr = round($iliaki_akt_dayk4_apr*$epif_iliakoy*30,4);
			$apolavi_may = round($iliaki_akt_dayk4_may*$epif_iliakoy*30,4);
			$apolavi_jun = round($iliaki_akt_dayk4_jun*$epif_iliakoy*30,4);
			$apolavi_jul = round($iliaki_akt_dayk4_jul*$epif_iliakoy*30,4);
			$apolavi_aug = round($iliaki_akt_dayk4_aug*$epif_iliakoy*30,4);
			$apolavi_sep = round($iliaki_akt_dayk4_sep*$epif_iliakoy*30,4);
			$apolavi_okt = round($iliaki_akt_dayk4_okt*$epif_iliakoy*30,4);
			$apolavi_nov = round($iliaki_akt_dayk4_nov*$epif_iliakoy*30,4);
			$apolavi_dec = round($iliaki_akt_dayk4_dec*$epif_iliakoy*30,4);
			$apolavi_aktinov = $apolavi_jan + $apolavi_feb + $apolavi_mar + $apolavi_apr + $apolavi_may + $apolavi_jun
			+$apolavi_jul + $apolavi_aug + $apolavi_sep + $apolavi_okt + $apolavi_nov + $apolavi_dec;
			
			//8η γραμμή πίνακα
			$pososto_iliaka_jan = round($apolavi_jan/$fortio_znx_jan,4);
			$pososto_iliaka_feb = round($apolavi_feb/$fortio_znx_feb,4);
			$pososto_iliaka_mar = round($apolavi_mar/$fortio_znx_mar,4);
			$pososto_iliaka_apr = round($apolavi_apr/$fortio_znx_apr,4);
			$pososto_iliaka_may = round($apolavi_may/$fortio_znx_may,4);
			$pososto_iliaka_jun = round($apolavi_jun/$fortio_znx_jun,4);
			$pososto_iliaka_jul = round($apolavi_jul/$fortio_znx_jul,4);
			$pososto_iliaka_aug = round($apolavi_aug/$fortio_znx_aug,4);
			$pososto_iliaka_sep = round($apolavi_sep/$fortio_znx_sep,4);
			$pososto_iliaka_okt = round($apolavi_okt/$fortio_znx_okt,4);
			$pososto_iliaka_nov = round($apolavi_nov/$fortio_znx_nov,4);
			$pososto_iliaka_dec = round($apolavi_dec/$fortio_znx_dec,4);
			$pososto_iliaka = round($apolavi_aktinov/ $fortio_znx,4);
			
			//Γραμμη 9
			$pososto_petr_jan = 1-$pososto_iliaka_jan;
			$pososto_petr_feb = 1-$pososto_iliaka_feb;
			$pososto_petr_mar = 1-$pososto_iliaka_mar;
			$pososto_petr_apr = 1-$pososto_iliaka_apr;
			$pososto_petr_may = 1-$pososto_iliaka_may;
			$pososto_petr_jun = 1-$pososto_iliaka_jun;
			$pososto_petr_jul = 1-$pososto_iliaka_jul;
			$pososto_petr_aug = 1-$pososto_iliaka_aug;
			$pososto_petr_sep = 1-$pososto_iliaka_sep;
			$pososto_petr_okt = 1-$pososto_iliaka_okt;
			$pososto_petr_nov = 1-$pososto_iliaka_nov;
			$pososto_petr_dec = 1-$pososto_iliaka_dec;
			$pososto_petr = 1 -$pososto_iliaka;
			
			
			//Έλεγχος διείσδυσης αέρα από κουφώματα
			$array_dieisdysi_aera = get_times("xrisi,nwpos_aeras_m2", "energy_conditions", $drop_xrisi);
			$syntelestis_dieisdysi_aera = $array_dieisdysi_aera[0][1];
			$apaitoymeni_dieisdysi_aera = $syntelestis_dieisdysi_aera * $synoliko_embadon;
			$dieisdysi_aera = $dieisdysi_b + $dieisdysi_a + $dieisdysi_n + $dieisdysi_d;
			
			
			//include_once("apotelesmata/kenak_excel2.php");
			//include_once("apotelesmata/kenak_word2.php");
	

//ΕΔΩ ΞΕΚΙΝΑΩ ΚΑΙ ΥΠΟΛΟΓΙΖΩ ΓΙΑ ΤΟ PDF ΟΣΑ ΔΕΝ ΕΧΟΥΝ ΥΠΟΛΟΓΙΣΤΕΙ ΑΠΟ ΠΡΙΝ Η ΧΡΕΙΑΖΟΝΤΑΙ ΜΟΡΦΟΠΟΙΗΣΗ
		
//Συντελεστές ανάλογα με τη ζώνη
$array_domika41 = get_times_all($zwni, "domika41");
$domika411 = $array_domika41[0][0];
$domika412 = $array_domika41[1][0];
$domika413 = $array_domika41[2][0];
$domika414 = $array_domika41[3][0];
$domika415 = $array_domika41[4][0];
$domika416 = $array_domika41[5][0];
$domika417 = $array_domika41[6][0];
$domika418 = $array_domika41[7][0];
$domika419 = $array_domika41[8][0];


$pin43  = "<table><tr>";
$pin43 .= "<td style=\"text-align:left;width:50%;\"><b>Δομικό στοιχείο</b></td><td style=\"text-align:left;width:10%;\"><b>Φύλλο ελέγχου</b></td><td style=\"text-align:left;width:10%;\"><b>U [W/(m²K)]</b></td><td style=\"text-align:left;width:30%;\"><b>Umax [W/(m²K)] [Πίνακας 4.1]</b></td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;width:50%;\">Εξωτερική τοιχοποιία σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Εξωτερική τοιχοποιία σε επαφή με εξωτερικό αέρα επένδυση πέτρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Εξωτερική δοκός/υποστύλωμα/τοίχωμα σε επαφή με εξωτερικό αέρα και επένδυση πέτρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Εξωτερική δοκός/υποστύλωμα/τοίχωμα σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Τοιχοποιία συρομένων σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Τοιχοποιία συρομένων σε επαφή με εξωτερικό αέρα και επένδυση πέτρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Δοκός/υποστύλωμα/τοίχωμα σε επαφή με μη θερμαινόμενο χώρο</td><td></td><td></td><td style=\"text-align:center;\">" . $domika414 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Δώμα βατό  σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika413 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Δάπεδο σε προεξοχή/πυλωτή σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika413 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Οροφή κεραμίδι με μόνωση επ’ αυτού, σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td style=\"text-align:center;\">" . $domika413 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Δάπεδο σε επαφή με μη θερμαινόμενο χώρο.</td><td></td><td></td><td style=\"text-align:center;\">" . $domika416 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Δάπεδο σε επαφή με το έδαφος</td><td></td><td></td><td style=\"text-align:center;\">" . $domika417 . "</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Τοιχώματα χωρίς θερμομόνωση σε επαφή με τον εξωτερικό αέρα</td><td></td><td></td><td style=\"text-align:center;\">Δεν υπάρχει απαίτηση</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Τοιχώματα χωρίς θερμομόνωση σε επαφή με το έδαφος</td><td></td><td></td><td style=\"text-align:center;\">Δεν υπάρχει απαίτηση</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Δάπεδο Υπογείου σε επαφή με το έδαφος</td><td></td><td></td><td style=\"text-align:center;\">Δεν υπάρχει απαίτηση</td></tr>";
$pin43 .= "<tr><td style=\"text-align:left;\">Οροφή χωρίς θερμομόνωση σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td style=\"text-align:center;\">Δεν υπάρχει απαίτηση</td></tr>";
$pin43 .= "</table>";
		
		
$pin44 = "<table><tr>".
		 "<td style=\"text-align:left;width:40%;\">Δομικό στοιχείο</td>".
		 "<td style=\"text-align:center;width:15%;\">Φύλλο ελέγχου</td>".
		 "<td style=\"text-align:center;width:15%;\">U [W/(m²K)]</td>".
		 "<td style=\"text-align:center;width:15%;\">Μέσο βάθος z (m)</td>".
		 "<td style=\"text-align:center;width:15%;\">U' [W/(m²K)]</td></tr>";		
$pin44 .= "<tr><td style=\"text-align:left;\">Δάπεδο ισογείου σε επαφή με το έδαφος</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">" . $dapedo_u1 . "</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">0</td>";
$pin44 .= "</tr><tr><td style=\"text-align:left;\">Δάπεδο ισογείου σε επαφή με μη θερμαινόμενο χώρο</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">" . $dapedo_u2 . "</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">0</td>";
$pin44 .= "</tr></table>";

//*********************************************************************************************

$pin5 = "<table><tr>".
		 "<td style=\"text-align:left;width:40%;\">Ειδική χρήση χώρων</td>".
		 "<td style=\"text-align:center;width:15%;\">Θερμαινόμενη επιφάνεια [m²]</td>".
		 "<td style=\"text-align:center;width:15%;\">Ψυχόμενη επιφάνεια  [m²]</td>".
		 "<td style=\"text-align:center;width:15%;\">Θερμαινόμενος όγκος [m³]</td>".
		 "<td style=\"text-align:center;width:15%;\">Ψυχόμενος όγκος [m³]</td></tr>";		
$pin5 .= "<tr><td style=\"text-align:left;\">$gen_xrisi</td>".
		  "<td style=\"text-align:center;\">$a_thermoperatotitas</td>".
		  "<td style=\"text-align:center;\">$a_thermoperatotitas</td>".
		  "<td style=\"text-align:center;\">$synolikos_ogkos</td>".
		  "<td style=\"text-align:center;\">$synolikos_ogkos</td>";
$pin5 .= "</tr><tr><td style=\"text-align:left;\">Κλιμακοστάσιο</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>";
$pin5 .= "</tr></table>";
//*********************************************************************************************
$pin6 = "<table><tr>".
		 "<td style=\"text-align:left;width:50%;\">Χρήση θερμικής ζώνης</td>".
		 "<td style=\"text-align:center;width:25%;\">$xrisi_znx_iliakos</td>".
		 "<td style=\"text-align:center;width:25%;\">&nbsp;</td></tr>";
$pin6 .= "<tr><td style=\"text-align:left;\">Ανηγμένη ειδική θερμοχωρητικότητα [kJ/(m².K)]</td>".
		  "<td style=\"text-align:center;\">165</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>";
$pin6 .= "</tr><tr><td style=\"text-align:left;\">Κατηγορία διατάξεων αυτοματισμών ελέγχου για ηλεκτρομηχανολογικό εξοπλισμό</td>".
		  "<td style=\"text-align:center;\">Α</td>".
		  "<td style=\"text-align:center;\">Τ.Ο.Τ.Ε.Ε. 20701-1/2010,πίνακας 5.5</td>";
$pin6 .= "</tr></table>";
//*********************************************************************************************
$pin7 = "<table><tr>".
		 "<td style=\"text-align:left;width:40%;\">Διείσδυση αέρα (m³/h)</td>".
		 "<td style=\"text-align:center;width:15%;\">$dieisdysi_aera</td>".
		 "<td style=\"text-align:center;width:15%;\">Τεύχος Υπολογισμών</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Φυσικός αερισμός (m³/h/m²)</td>".
		  "<td style=\"text-align:center;\">$syntelestis_dieisdysi_aera</td>".
		  "<td style=\"text-align:center;\">Τ.Ο.Τ.Ε.Ε. 20701-1</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Συντελεστής χρήσης φυσικού αερισμού</td>".
		  "<td style=\"text-align:center;\">1</td>".
		  "<td style=\"text-align:center;\">100% για κατοικίες, 0% για τριτογενή τομέα</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Αριθμός θυρίδων εξαερισμού για φυσικό αέριο</td>".
		  "<td style=\"text-align:center;\">-</td>".
		  "<td style=\"text-align:center;\">-</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Αριθμός καμινάδων</td>".
		  "<td style=\"text-align:center;\">-</td>".
		  "<td style=\"text-align:center;\">-</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Αριθμός ανεμιστήρων οροφής</td>".
		  "<td style=\"text-align:center;\">-</td>".
		  "<td style=\"text-align:center;\">-</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Χώροι κάλυψης ανεμιστήρων οροφής</td>".
		  "<td style=\"text-align:center;\">-</td>".
		  "<td style=\"text-align:center;\">-</td>";
$pin7 .= "</tr></table>";
//*********************************************************************************************
$array_leitoyrgias = get_times("*", "energy_conditions", $drop_xrisi);
$pin8 =  "<table><tr>".
		 "<td style=\"text-align:left;width:40%;\">Παράμετρος</td>".
		 "<td style=\"text-align:center;width:15%;\">Τιμή</td></tr><tr>".
         "<td style=\"text-align:left;\">Κατηγορία</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][1]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Χρήση</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][2]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ώρες λειτουργίας (h)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][3]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ημέρες λειτουργίας (d)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][4]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Μήνες λειτουργίας (m)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][5]."</td></tr><tr>".
         "<td style=\"text-align:left;\">θ,i,h (C)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][6]."</td></tr><tr>".
         "<td style=\"text-align:left;\">θ,i,c (C)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][7]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Χ,i,h (%)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][8]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Χ,i,c (%)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][9]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Άτομα/100m2</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][10]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Νωπός αέρας (m³/h/person)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][11]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Νωπός αέρας (m³/h/m²)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][12]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Στάθμη φωτισμού (lux)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][13]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ισχύς κτιρίου αναφοράς (W/m²)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][14]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ώρες λειτουργίας ημέρας (h)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][15]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ώρες λειτουργίας νύχτας (h)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][16]."</td></tr><tr>".
         "<td style=\"text-align:left;\">ΖΝΧ (lt/άτομο/ημέρα)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][17]."</td></tr><tr>".
         "<td style=\"text-align:left;\">ΖΝΧ (lt/m²/ημέρα)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][18]."</td></tr><tr>".
         "<td style=\"text-align:left;\">ΖΝΧ (m³/m²/year)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][19]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Άνθρωποι (W/άτομο)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][20]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Άνθρωποι (W/m2)</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][21]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Συντελεστής παρουσίας f</td>".
		 "<td style=\"text-align:center;\">".$array_leitoyrgias[0][22]."</td></tr></table>";
//*********************************************************************************************
$array_hm = get_times_all("*", "kataskeyi_hm");
$thermansi_value = $array_hm[0]["value"];
$klimatismos_value = $array_hm[1]["value"];
$thermansi_value_kw = $thermansi_value*1.163/1000;
$thermansi_value_kw13 = $thermansi_value_kw*1.3;
$thermansi_value13 = $thermansi_value*1.3;
$klimatismos_value_kw = $klimatismos_value*0.000293;
$pin9 =  "<table><tr>".
"<td style=\"text-align:left;width:50%;\">Είδος μονάδας παραγωγής θερμότητας</td>".
"<td style=\"text-align:center;width:50%;\">Λέβητας-Καυστήρας</td></tr><tr>".
"<td style=\"text-align:left;\">Ισχύς</td>".
"<td style=\"text-align:center;\">$thermansi_value_kw13</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση μονάδας</td>".
"<td style=\"text-align:center;\">92%</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος καυσίμου</td>".
"<td style=\"text-align:center;\">Πετρέλαιο θέρμανσης</td></tr><tr>".
"<td style=\"text-align:left;\">Συνολική ισχύς δικτύου διανομής (70% της ισχύος του λέβητα)</td>".
"<td style=\"text-align:center;\">$thermansi_value_kw</td></tr><tr>".
"<td style=\"text-align:left;\">Διέλευση από εσ. χώρους</td>".
"<td style=\"text-align:center;\">ΝΑΙ</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμοκρασία προσαγωγής θερμού μέσου στο δίκτυο διανομής (ºC)</td>".
"<td style=\"text-align:center;\">85</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμοκρασία επιστροφής θερμού μέσου στο δίκτυο διανομής (ºC)</td>".
"<td style=\"text-align:center;\">70</td></tr><tr>".
"<td style=\"text-align:left;\">Βαθμός απόδοσης δικτύου διανομής</td>".
"<td style=\"text-align:center;\">100%-5,5%</td></tr><tr>".
"<td style=\"text-align:left;\">Απώλειες</td>".
"<td style=\"text-align:center;\">94.5%</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος τερματικών μονάδων θέρμανσης χώρων</td>".
"<td style=\"text-align:center;\">σώματα ακτινοβολίας σε εξωτερικό τοίχο και θερμ. 70/85ºC</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση τερματικών μονάδων</td>".
"<td style=\"text-align:center;\">0.89 (Τ.Ο.Τ.Ε.Ε.  20701-1/2010, πίνακας 4.12)</td></tr><tr>".
"<td style=\"text-align:left;\">Τύπος βοηθητικών συστημάτων</td>".
"<td style=\"text-align:center;\">Κυκλοφορητής (Δv-cP)</td></tr><tr>".
"<td style=\"text-align:left;\">Αριθμός συστημάτων</td>".
"<td style=\"text-align:center;\">1</td></tr><tr>".
"<td style=\"text-align:left;\">Ισχύς βοηθητικών συστημάτων  (kW)</td>".
"<td style=\"text-align:center;\">1x0.1=0.1</td></tr><tr>".
"<td style=\"text-align:left;\">Χρόνος λειτουργίας βοηθητικών συστημάτων</td>".
"<td style=\"text-align:center;\">75% του χρόνου λειτουργίας του κτιρίου</td></tr></table>";
//*********************************************************************************************
$pin10 =  "<table><tr>".
"<td style=\"text-align:left;width:50%;\">Είδος μονάδας παραγωγής ψύξης</td>".
"<td style=\"text-align:center;width:50%;\">Λέβητας-Καυστήρας</td></tr><tr>".
"<td style=\"text-align:left;\">Ισχύς</td>".
"<td style=\"text-align:center;\">$klimatismos_value_kw</td></tr><tr>".
"<td style=\"text-align:left;\">Βαθμός απόδοσης ΕER:</td>".
"<td style=\"text-align:center;\">3.0</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος καυσίμου</td>".
"<td style=\"text-align:center;\">Ηλεκτρικό ρεύμα</td></tr><tr>".
"<td style=\"text-align:left;\">Ψυκτική ισχύς που μεταφέρει το δίκτυο διανομής</td>".
"<td style=\"text-align:center;\">$klimatismos_value_kw</td></tr><tr>".
"<td style=\"text-align:left;\">Διέλευση από εσ. χώρους</td>".
"<td style=\"text-align:center;\">ΝΑΙ</td></tr><tr>".
"<td style=\"text-align:left;\">Εξωτερικοί χώροι</td>".
"<td style=\"text-align:center;\">Πάνω από 20%</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμοκρασία προσαγωγής θερμού μέσου στο δίκτυο διανομής (ºC)</td>".
"<td style=\"text-align:center;\">-</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμοκρασία επιστροφής θερμού μέσου στο δίκτυο διανομής (ºC)</td>".
"<td style=\"text-align:center;\">-</td></tr><tr>".
"<td style=\"text-align:left;\">Βαθμός ψυκτικής απόδοσης δικτύου διανομής (%)</td>".
"<td style=\"text-align:center;\">100%</td></tr><tr>".
"<td style=\"text-align:left;\">Ύπαρξη μόνωσης στους αεραγωγούς</td>".
"<td style=\"text-align:center;\">NAI</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος τερματικών μονάδων ψύξης χώρων</td>".
"<td style=\"text-align:center;\">τοπικές αντλίες θερμότητας</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση τερματικών μονάδων</td>".
"<td style=\"text-align:center;\">93.0% (Τ.Ο.Τ.Ε.Ε. 20701-1/2010, πίνακας 4.14)</td></tr><tr>".
"<td style=\"text-align:left;\">Τύπος βοηθητικών συστημάτων</td>".
"<td style=\"text-align:center;\">-</td></tr><tr>".
"<td style=\"text-align:left;\">Αριθμός συστημάτων</td>".
"<td style=\"text-align:center;\">-</td></tr><tr>".
"<td style=\"text-align:left;\">Ισχύς βοηθητικών συστημάτων  (kW)</td>".
"<td style=\"text-align:center;\">-</td></tr><tr>".
"<td style=\"text-align:left;\">Χρόνος λειτουργίας βοηθητικών συστημάτω</td>".
"<td style=\"text-align:center;\">15% του χρόνου λειτουργίας του κτιρίου</td></tr></table>";
//*********************************************************************************************
$pin68 =  "<table><tr>".
"<td style=\"text-align:left;width:50%;\">Είδος μονάδας παραγωγής ZNX</td>".
"<td style=\"text-align:center;width:50%;\">Λέβητας-Καυστήρας</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση μονάδας</td>".
"<td style=\"text-align:center;\">92%</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος καυσίμου</td>".
"<td style=\"text-align:center;\">Πετρέλαιο</td></tr><tr>".
"<td style=\"text-align:left;\">Μηνιαίο ποσοστό κάλυψης θερμικού φορτίου για ΖΝΧ από το σύστημα (%)</td>".
"<td style=\"text-align:center;\">38%</td></tr><tr>".
"<td style=\"text-align:left;\">Σύστημα ανακυκλοφορίας</td>".
"<td style=\"text-align:center;\">ΟΧΙ</td></tr><tr>".
"<td style=\"text-align:left;\">Εξωτερικοί χώροι</td>".
"<td style=\"text-align:center;\">Πάνω από 20%</td></tr><tr>".
"<td style=\"text-align:left;\">Βαθμός θερμικής απόδοσης δικτύου διανομής (%)</td>".
"<td style=\"text-align:center;\">100-7.5 = 92.5 %</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος τερματικών μονάδων ψύξης χώρων</td>".
"<td style=\"text-align:center;\">τοπικές αντλίες θερμότητας</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση τερματικών μονάδων</td>".
"<td style=\"text-align:center;\">93.0% (Τ.Ο.Τ.Ε.Ε. 20701-1/2010, πίνακας 4.14)</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος αποθήκευσης ζεστού νερού χρήσης</td>".
"<td style=\"text-align:center;\">Θερμαντήρες διπλής ενέργειας σε εσωτερικό χώρο</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση μονάδας αποθήκευσης ΖΝΧ</td>".
"<td style=\"text-align:center;\">100-5-2= 93%</td></tr></table>";
//*********************************************************************************************
$pososto_iliaka_100 = $pososto_iliaka*100;
$pin69 =  "<table><tr>".
"<td style=\"text-align:left;width:50%;\">Είδος ηλιακού συλλέκτη</td>".
"<td style=\"text-align:center;width:50%;\">Επίπεδος συλλεκτικός</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Χρήση ηλιακού συλλέκτη για</td>".
"<td style=\"text-align:center;width:50%;\">ZNX</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Βαθμός ηλιακής αξιοποίησης για ΖΝΧ</td>".
"<td style=\"text-align:center;width:50%;\">$pososto_iliaka_100</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Βαθμός ηλιακής αξιοποίησης για θέρμανση χώρων</td>".
"<td style=\"text-align:center;width:50%;\">-</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Εμβαδόν επιφάνεια ηλιακών συλλεκτών (m²)</td>".
"<td style=\"text-align:center;width:50%;\">$epif_iliakoy</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Κλίση τοποθέτησης ηλιακών συλλεκτών(º)</td>".
"<td style=\"text-align:center;width:50%;\">30</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Προσανατολισμός ηλιακών συλλεκτών (º)</td>".
"<td style=\"text-align:center;width:50%;\">180</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Συντελεστής σκίασης F-s</td>".
"<td style=\"text-align:center;width:50%;\">1</td></tr></table>";
//*********************************************************************************************

$ukoyfmax = "<=" . $domika418;

$pinkoyf = "<b>Βόρεια Ανοίγματα</b><br><table><tr>".
		   "<td>Άνοιγμα</td>".
		   "<td>Τύπος</td>".
		   "<td>U [W/(m²K)]</td>".
		   "<td>Umax [W/(m²K)]</td></tr>";
for ($j = 1; $j <= $anoig_t_boreia; $j++) {
$t = "b";
$an = "an_b_";
if (${$an."anoig_eidos".$j} == 1) {$anoig_type = "Αδιαφανές άνοιγμα";}
if (${$an."anoig_eidos".$j} == 2) {$anoig_type = "Συρόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 3) {$anoig_type = "Ανοιγόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 4) {$anoig_type = "Επάλληλο παράθυρο";}
if (${$an."anoig_eidos".$j} == 5) {$anoig_type = "Συρόμενη πόρτα απλή";}
if (${$an."anoig_eidos".$j} == 6) {$anoig_type = "Συρόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 7) {$anoig_type = "Ανοιγόμενη πόρτα μονή";}
if (${$an."anoig_eidos".$j} == 8) {$anoig_type = "Ανοιγόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 9) {$anoig_type = "Επάλληλη πόρτα";}

$pinkoyf .= "<tr><td>" . ${$an."name".$j} . 
			"</td><td>" . $anoig_type . 
			"</td><td>" . ${$an."anoig_u".$j} . 
			"</td><td>" . $domika418 . "</td></tr>";
}
$pinkoyf .= "</table>";

$pinkoyf .= "<b>Ανατολικά Ανοίγματα</b><br><table><tr><td>Άνοιγμα</td><td>Τύπος</td><td>U [W/(m2K)]</td><td>Umax [W/(m2K)]</td></tr>";
for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
$t = "a";
$an = "an_a_";
if (${$an."anoig_eidos".$j} == 1) {$anoig_type = "Αδιαφανές άνοιγμα";}
if (${$an."anoig_eidos".$j} == 2) {$anoig_type = "Συρόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 3) {$anoig_type = "Ανοιγόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 4) {$anoig_type = "Επάλληλο παράθυρο";}
if (${$an."anoig_eidos".$j} == 5) {$anoig_type = "Συρόμενη πόρτα απλή";}
if (${$an."anoig_eidos".$j} == 6) {$anoig_type = "Συρόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 7) {$anoig_type = "Ανοιγόμενη πόρτα μονή";}
if (${$an."anoig_eidos".$j} == 8) {$anoig_type = "Ανοιγόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 9) {$anoig_type = "Επάλληλη πόρτα";}

$pinkoyf .= "<tr><td>" . ${$an."name".$j} . "</td><td>" . $anoig_type . "</td><td>" . ${$an."anoig_u".$j} . "</td><td>" . $domika418 . "</td></tr>";
}
$pinkoyf .= "</table>";

$pinkoyf .= "<b>Νότια Ανοίγματα</b><br><table><tr><td>Άνοιγμα</td><td>Τύπος</td><td>U [W/(m2K)]</td><td>Umax [W/(m2K)]</td></tr>";
for ($j = 1; $j <= $anoig_t_notia; $j++) {
$t = "n";
$an = "an_n_";
if (${$an."anoig_eidos".$j} == 1) {$anoig_type = "Αδιαφανές άνοιγμα";}
if (${$an."anoig_eidos".$j} == 2) {$anoig_type = "Συρόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 3) {$anoig_type = "Ανοιγόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 4) {$anoig_type = "Επάλληλο παράθυρο";}
if (${$an."anoig_eidos".$j} == 5) {$anoig_type = "Συρόμενη πόρτα απλή";}
if (${$an."anoig_eidos".$j} == 6) {$anoig_type = "Συρόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 7) {$anoig_type = "Ανοιγόμενη πόρτα μονή";}
if (${$an."anoig_eidos".$j} == 8) {$anoig_type = "Ανοιγόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 9) {$anoig_type = "Επάλληλη πόρτα";}

$pinkoyf .= "<tr><td>" . ${$an."name".$j} . "</td><td>" . $anoig_type . "</td><td>" . ${$an."anoig_u".$j} . "</td><td>" . $domika418 . "</td></tr>";
}
$pinkoyf .= "</table>";

$pinkoyf .= "<b>Δυτικά Ανοίγματα</b><br><table><tr><td>Άνοιγμα</td><td>Τύπος</td><td>U [W/(m2K)]</td><td>Umax [W/(m2K)]</td></tr>";
for ($j = 1; $j <= $anoig_t_dytika; $j++) {
$t = "d";
$an = "an_d_";
if (${$an."anoig_eidos".$j} == 1) {$anoig_type = "Αδιαφανές άνοιγμα";}
if (${$an."anoig_eidos".$j} == 2) {$anoig_type = "Συρόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 3) {$anoig_type = "Ανοιγόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 4) {$anoig_type = "Επάλληλο παράθυρο";}
if (${$an."anoig_eidos".$j} == 5) {$anoig_type = "Συρόμενη πόρτα απλή";}
if (${$an."anoig_eidos".$j} == 6) {$anoig_type = "Συρόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 7) {$anoig_type = "Ανοιγόμενη πόρτα μονή";}
if (${$an."anoig_eidos".$j} == 8) {$anoig_type = "Ανοιγόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 9) {$anoig_type = "Επάλληλη πόρτα";}

$pinkoyf .= "<tr><td>" . ${$an."name".$j} . "</td><td>" . $anoig_type . "</td><td>" . ${$an."anoig_u".$j} . "</td><td>" . $domika418 . "</td></tr>";
}
$pinkoyf .= "</table>";



$pinepar = "<table><tr><td>Είδος</td><td>Επιφάνεια</td><td>U*A</td></tr>";		
$pinepar .= "<tr><td>Στοιχεία κατακόρυφων αδιαφανών</td><td>" . $a_kat_adiafanwn . "</td><td>" . $ua_kat_adiafanwn . "</td></tr>";
$pinepar .= "<tr><td>Στοιχεία οριζόντιων αδιαφανών</td><td>" . $a_oriz_adiafanwn . "</td><td>" . $ua_oriz_adiafanwn . "</td></tr>";
$pinepar .= "<tr><td>Στοιχεία διαφανών</td><td>" . $a_diafanwn . "</td><td>" . $ua_diafanwn . "</td></tr>";
$pinepar .= "<tr><td>Σύνολο</td><td>" . $a_thermoperatotitas . "</td><td>" . $ua_thermoperatotitas . "</td></tr>";
$pinepar .= "</table><br>";


$pinepar1 = "<table><tr><td>Είδος</td><td>Τιμή</td></tr>";	
$pinepar1 .= "<tr><td>U*A θερμογεφυρών</td><td>" . $thermogefyres . "</td></tr>";
$pinepar1 .= "<tr><td>Σύνολικό U*A</td><td>" . $sunolo_ua . "</td></tr>";
$pinepar1 .= "<tr><td>A/V</td><td>" . $aprosv . "</td></tr>";
$pinepar1 .= "<tr><td>Τιμή (U*A)/Α</td><td>" . $uadiaa . "</td></tr>";
$pinepar1 .= "<tr><td>Umax  [W/(m2·Κ)] :</td><td>" . $umax . "</td></tr>";
$pinepar1 .= "<tr><td>ΕΛΕΓΧΟΣ</td><td>" . $elegxosua . "</td></tr>";
$pinepar1 .= "</table><br />";

$pinepar1 .="<br />Όπως προέκυψε A/V = " . number_format($aprosv,3,".",",") . " m<sup>-1</sup> το οποίο από τον πίνακα 4.1 αντιστοιχεί σε μέγιστο επιτρεπτό Um,max="
 . number_format($umax,3,".",",") . " W/(m²K) (με χρήση γραμμικής παρεμβολής).<br />".
"Στον πίνακα παρακάτω δίνονται συγκεντρωτικά τα εμβαδά των δομικών στοιχείων, τα αθροίσματα των U×A, καθώς και 
τα αθροίσματα των Ψxl. Όπως προκύπτει, ο μέσος συντελεστής θερμοπερατότητας του κτιρίου ισούται με:".
"Um= " . number_format($uadiaa,3,".",",") . " W/(m²K) < Um,max= " . number_format($umax,3,".",",") . " W/(m²K)".
"<br />Συνεπώς, σύμφωνα με τις ελάχιστες απαιτήσεις του Κ.Εν.Α.Κ. για τον μέσο συντελεστή θερμοπερατότητας Um, το κτίριο  είναι
  επαρκώς  θερμομονωμένο. Στο Τεύχος Υπολογισμών που συνοδεύει την παρούσα μελέτη δίνονται αναλυτικά όλοι οι υπολογισμοί.";
//Πίνακα παρακάτω ;;;;;

//*********************************************************************************************
//                      ΦΥΛΛΑ ΥΠΟΛΟΓΙΣΜΩΝ                                                     *
//*********************************************************************************************
$f1 = "<table>".
"<tr><td style=\"text-align:left;width:25%;\"><b>Χώροι</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Μήκος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Πλάτος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Ύψος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Εμβαδόν</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Όγκος</b></td></tr>";
for($i = 1; $i <= $rows_xwroi; $i++) {
$f1 .= "<tr><td style=\"text-align:left;\">Χώρος $i</td>".
"<td style=\"text-align:center;\">${"xwroi_mikos".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_platos".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_ypsos".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_emvadon".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_ogkos".$i}</td></tr>";
}
$f1 .= "<tr><td style=\"text-align:left;\"><b>Σύνολα</b></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"><b>$synoliko_embadon</b></td>".
"<td style=\"text-align:center;\"><b>$synolikos_ogkos</b></td></tr>";
$f1 .= "</table>";
//*********************************************************************************************
$f2 = "<table>".
"<tr><td style=\"text-align:left;width:25%;\"><b>Είδος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Εμβαδόν</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>U</b></td></tr>";
$f2 .= "<tr><td style=\"text-align:left;\">Δάπεδο επί εδάφους</td>".
"<td style=\"text-align:center;\">$dapedo_embadon1</td>".
"<td style=\"text-align:center;\">$dapedo_u1</td></tr>";
$f2 .= "<tr><td style=\"text-align:left;\">Δάπεδο επί μη θερμαινόμενου χώρου</td>".
"<td style=\"text-align:center;\">$dapedo_embadon2</td>".
"<td style=\"text-align:center;\">$dapedo_u2</td></tr>";
$f2 .= "<tr><td style=\"text-align:left;\">Οροφή με κεραμίδι</td>".
"<td style=\"text-align:center;\">$orofi_embadon1</td>".
"<td style=\"text-align:center;\">$orofi_u1</td></tr>";
$f2 .= "<tr><td style=\"text-align:left;\">Οροφή πλάκα</td>".
"<td style=\"text-align:center;\">$orofi_embadon2</td>".
"<td style=\"text-align:center;\">$orofi_u2</td></tr>";
$f2 .= "</table>";
//*********************************************************************************************
$f3 = "<table>".
"<tr><td style=\"text-align:left;width:25%;\"><b>Είδος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Πλήθος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Ύψος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>UxΑ</b></td></tr>";
for ($i = 1; $i <= $rows_es_g; $i++) {
$f3 .= "<tr><td style=\"text-align:left;\">${"thermo_esw_drop".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_esw_gwnia_p".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_esw_gwnia_ypsos".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_esw_gwnia_ua".$i}</td></tr>";
}
for ($i = 1; $i <= $rows_eks_g; $i++) {
$f3 .= "<tr><td style=\"text-align:left;\">${"thermo_eksw_drop".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_eksw_gwnia_p".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_eksw_gwnia_ypsos".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_eksw_gwnia_ua".$i}</td></tr>";
}
$f3 .= "<tr><td style=\"text-align:left;\">Δαπέδου (υπολογισμός με βάση την περίμετρο)</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">$thermo_dapedo_drop</td></tr>";
$f3 .= "</table>";
//*********************************************************************************************
for ($p=4;$p<=7;$p++){
${'f'.$p} = "<table>".
"<tr><td style=\"text-align:left;width:28%;\"><b>Όνομα στοιχείου</b></td>".
"<td style=\"text-align:center;width:8%;\"><b>Μήκος</b></td>".
"<td style=\"text-align:center;width:8%;\"><b>Ύψος</b></td>".
"<td style=\"text-align:center;width:8%;\"><b>Πάχος</b></td>".
"<td style=\"text-align:center;width:8%;\"><b>U</b></td>".
"<td style=\"text-align:center;width:8%;\"><b>Ε</b></td>".
"<td style=\"text-align:center;width:8%;\"><b>Θερμο<br />γέφυ<br />ρες</b></td>".
"<td style=\"text-align:center;width:8%;\"><b>Ε<sub>δρομ.</sub></b></td>".
"<td style=\"text-align:center;width:8%;\"><b>Τύπος</b></td>".
"<td style=\"text-align:center;width:8%;\"><b>Αερι<br />σμός</b></td></tr>";
if ($p==4)$st=$t_boreia;
if ($p==5)$st=$t_anatolika;
if ($p==6)$st=$t_notia;
if ($p==7)$st=$t_dytika;
for ($i = 1; $i <= $st; $i++) {
if ($p==4)$t = "b";
if ($p==5)$t = "a";
if ($p==6)$t = "n";
if ($p==7)$t = "d";
if ($p==4)$onoma = ${"name_b".$i};
if ($p==5)$onoma = ${"name_a".$i};
if ($p==6)$onoma = ${"name_n".$i};
if ($p==7)$onoma = ${"name_d".$i};
if ($p==4)$an = "an_b_";
if ($p==5)$an = "an_a_";
if ($p==6)$an = "an_n_";
if ($p==7)$an = "an_d_";
${'f'.$p} .= "<tr style=\"background-color:#eaeaea;\"><td style=\"text-align:left;\">Σύνολο " . $onoma."</td>".
"<td style=\"text-align:center;\">".number_format(${"mikos_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"ypsos_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"paxos_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"u_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"epifaneia_toixoy_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"thermogefyres_toixoy_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"epifaneia_dromikoy_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td></tr>";
${'f'.$p} .= "<tr><td style=\"text-align:left;\">Δοκός</td>".
"<td style=\"text-align:center;\">".number_format(${"dokos_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">".number_format(${"u_dok_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"epifaneia_dokos_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td></tr>";
${'f'.$p} .= "<tr><td style=\"text-align:left;\">Υποστύλωμα</td>".
"<td style=\"text-align:center;\">".number_format(${"ypostil_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">".number_format(${"u_ypost_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"epifaneia_ypost_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td></tr>";
${'f'.$p} .= "<tr><td style=\"text-align:left;\">Συρομένων</td>".
"<td style=\"text-align:center;\">".number_format(${"mikos_syr_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"ypsos_syr_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">".number_format(${"u_syr_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"epifaneia_toixoy_syr_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td></tr>";
for ($j = 1; $j <= $anoig_t_boreia; $j++) {
if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
${'f'.$p} .= "<tr><td style=\"text-align:left;\">".${$an."name".$j}."</td>".
"<td style=\"text-align:center;\">".number_format(${$an."anoig_mikos".$j},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${$an."anoig_ypsos".$j},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">".number_format(${$an."anoig_u".$j},2,".",",")."</td>";
if (${$an."anoig_eidos".$j} == 1)$x=${"epifaneia_masif_".$t.$j};
if (${$an."anoig_eidos".$j} != 1)$x=${"epifaneia_anoigmatos_".$t.$j};
${'f'.$p}.="<td style=\"text-align:center;\">".number_format($x,2,".",",")."</td>";
${'f'.$p}.="<td style=\"text-align:center;\">".number_format(${"thermogefyres_anoig_".$t.$j},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">".number_format(${$an."anoig_eidos".$j},0,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"dieisdysi_".$t.$j},2,".",",")."</td></tr>";
}}
}
${'f'.$p} .= "</table>";
}
//*********************************************************************************************
$f8 = "<table>".
"<tr><td style=\"text-align:left;width:25%;\"><b>Είδος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Διάσταση</b></td></tr>";
$f8 .= "<tr><td style=\"text-align:left;\">Σύνολο βόρειων τοίχων (όλοι οι όροφοι)</td>".
"<td style=\"text-align:center;\">$mikos_toixoy_b</td></tr>";
$f8 .= "<tr><td style=\"text-align:left;\">Σύνολο ανατολικών τοίχων (όλοι οι όροφοι)</td>".
"<td style=\"text-align:center;\">$mikos_toixoy_a</td></tr>";
$f8 .= "<tr><td style=\"text-align:left;\">Σύνολο νότιων τοίχων (όλοι οι όροφοι)</td>".
"<td style=\"text-align:center;\">$mikos_toixoy_n</td></tr>";
$f8 .= "<tr><td style=\"text-align:left;\">Σύνολο δυτικών τοίχων (όλοι οι όροφοι)</td>".
"<td style=\"text-align:center;\">$mikos_toixoy_d</td></tr>";
$f8 .= "<tr><td style=\"text-align:left;\">Περίμετρος δαπέδου</td>".
"<td style=\"text-align:center;\">$perimetros</td></tr>";
$f8 .= "<tr><td style=\"text-align:left;\">Όγκος ορόφου</td>".
"<td style=\"text-align:center;\">$synolikos_ogkos</td></tr>";
$f8 .= "</table>";
//*********************************************************************************************
for ($p=9;$p<=12;$p++){
if ($p== 9)$st=$t_boreia;
if ($p==10)$st=$t_anatolika;
if ($p==11)$st=$t_notia;
if ($p==12)$st=$t_dytika;
${'f'.$p} = "<table>".
"<tr style=\"background-color:#eaeaea;\"><td style=\"text-align:left;width:20%;\"><b>Όνομα τοίχου</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Επιφά-<br>νεια<br>δοκών</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Επιφά-<br>νεια<br>υποστη-<br>λωμάτων</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Επιφά-<br>νεια<br>συρο-<br>μένων</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Διαφανή<br>ανοίγ-<br>ματα</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Αδια-<br>φανή<br>ανοί-<br>γματα</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Επιφά-<br>νεια<br>δρομικού</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Θερμο-<br>γέφυρες<br>δομικές</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Θερμο-<br>γέφυρες<br>ανοιγ-<br>μάτων</b></td></tr>";
for ($i = 1; $i <= $st; $i++) {
if ($p== 9){$t = "b";$onoma = ${"name_b".$i};$an = "an_b_";}
if ($p==10){$t = "a";$onoma = ${"name_a".$i};$an = "an_a_";}
if ($p==11){$t = "n";$onoma = ${"name_n".$i};$an = "an_n_";}
if ($p==12){$t = "d";$onoma = ${"name_d".$i};$an = "an_d_";}
${'f'.$p} .= "<tr><td style=\"text-align:left;\">$onoma</td>".
"<td style=\"text-align:center;\">${"epifaneia_dokos_".$t.$i}</td>".
"<td style=\"text-align:center;\">${"epifaneia_ypost_".$t.$i}</td>".
"<td style=\"text-align:center;\">${"epifaneia_toixoy_syr_".$t.$i}</td>".
"<td style=\"text-align:center;\">${"epifaneia_anoigmatwn_toixoy_".$t.$i}</td>".
"<td style=\"text-align:center;\">${"epifaneia_masif_toixoy_".$t.$i}</td>".
"<td style=\"text-align:center;\">${"epifaneia_dromikoy_".$t.$i}</td>".
"<td style=\"text-align:center;\">${"thermogefyres_toixoy_".$t.$i}</td>".
"<td style=\"text-align:center;\">${"thermogefyres_anoig_".$t.$i}</td></tr>";
}
${'f'.$p} .= "<tr><td style=\"text-align:left;\"><b>Σύνολο</b></td>".
"<td style=\"text-align:center;\"><b>${"epifaneia_dokos_".$t}</b></td>".
"<td style=\"text-align:center;\"><b>${"epifaneia_ypost_".$t}</b></td>".
"<td style=\"text-align:center;\"><b>${"epifaneia_toixoy_syr_".$t}</b></td>".
"<td style=\"text-align:center;\"><b>${"epifaneia_anoigmatwn_toixoy_".$t}</b></td>".
"<td style=\"text-align:center;\"><b>${"epifaneia_masif_toixoy_".$t}</b></td>".
"<td style=\"text-align:center;\"><b>${"epifaneia_dromikoy_".$t}</b></td>".
"<td style=\"text-align:center;\"><b>${"thermogefyres_toixoy_".$t}</b></td>".
"<td style=\"text-align:center;\"><b>${"thermogefyres_anoig_".$t}</b></td></tr>";
${'f'.$p} .= "</table>";
}
//*********************************************************************************************
$f13 = "<table>".
"<tr><td>".
"Χρήση: " . $xrisi_znx_iliakos."<br />".
"Απαιτούμενο ποσό ΖΝΧ: " . $syntelestis_znx_iliakos . " lt/ημέρα/μ²"."<br />".
"Θερμοκρασία ΖΝΧ: " . $t_znx . " ºC"."<br />".
"Μέση πυκνότητα νερού: 0.998 Kg/lt"."<br />".
"Ειδική θερμότητα νερού: 4.18 KJ/(Kg.K)"."<br />".
"Επιφάνεια ηλιακού: " . $epif_iliakoy . " m²"."<br />".
"Vd: " . $vd_iliakoy . " lt/ημέρα"."<br />".
"Το δίκτυο διανομής είναι μονωμένο σύμφωνα με τις ελάχιστες προδιαγραφές της Τ.Ο.Τ.Ε.Ε. 20701-1/2010 
και με ποσοστό απωλειών 7,5% (πίνακας 4.16).Οι πλευρικές απώλειες των θερμαντήρων λαμβάνονται 2% σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 
20701-1/2010 (παράγραφο 4.8.4) για τοποθέτηση σε εσωτερικό χώρο και οι απώλειες λόγω εναλλάκτη θερμότητας λαμβάνονται 5%. ".
"</td></tr></table>";
$f13 .= "<br><br><table>".
"<tr><td style=\"text-align:left;width:22%;\"></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΙΑΝ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΦΕΒ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΜΑΡ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΑΠΡ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΜΑΙ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΙΟΥΝ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΙΟΥΛ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΑΥΓ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΣΕΠ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΟΚΤ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΝΟΕ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΔΕΚ</h5></td>".
"<td style=\"text-align:center;width:6%;\"><h5>ΣΥΝ</h5></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Θερμοκρασία νερού δικτύου(ºC)</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_jan</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_feb</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_mar</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_apr</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_may</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_jun</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_jul</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_aug</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_sep</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_okt</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_nov</h5></td>".
"<td style=\"text-align:center;\"><h5>$nero_dec</h5></td>".
"<td style=\"text-align:center;\"></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Μέσο ημερήσιο θερμικό φορτίο για ΖΝΧ (kWh/ημέρα)</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_jan,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_feb,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_mar,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_apr,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_may,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_jun,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_jul,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_aug,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_sep,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_okt,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_nov,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_day_dec,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Μέσο μηνιαίο θερμικό φορτίο για ΖΝΧ (kWh/ημέρα)</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_jan,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_feb,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_mar,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_apr,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_may,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_jun,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_jul,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_aug,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_sep,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_okt,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_nov,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx_dec,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($fortio_znx,0,".",",")."</h5></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Μέση μηνιαία προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m²)</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_jan</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_feb</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_mar</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_apr</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_may</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_jun</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_jul</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_aug</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_sep</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_okt</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_nov</h5></td>".
"<td style=\"text-align:center;\"><h5>$iliaki_akt_dec</h5></td>".
"<td style=\"text-align:center;\"></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Μέση ημερήσια προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m²)</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_jan,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_feb,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_mar,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_apr,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_may,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_jun,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_jul,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_aug,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_sep,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_okt,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_nov,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_day_dec,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Μέση ημερήσια προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m²) κ4</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_jan,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_feb,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_mar,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_apr,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_may,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_jun,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_jul,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_aug,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_sep,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_okt,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_nov,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($iliaki_akt_dayk4_dec,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Μέση μηνιαία απολαβή ηλιακής ακτινοβολίας για βέλτιστη κλίση και επιφάνεια ηλιακού</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_jan,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_feb,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_mar,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_apr,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_may,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_jun,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_jul,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_aug,1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_sep,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_okt,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_nov,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_dec,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($apolavi_aktinov,1,".",",")."</h5></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Ποσοστό κάλυψης αναγκών από ηλιακά (%)</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_jan*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_feb*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_mar*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_apr*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_may*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_jun*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_jul*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_aug*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_sep*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_okt*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_nov*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka_dec*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_iliaka*100,2,".",",")."</h5></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Ποσοστό κάλυψης αναγκών υπολοίπων (%)</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_jan*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_feb*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_mar*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_apr*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_may*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_jun*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_jul*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_aug*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_sep*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_okt*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_nov*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr_dec*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format($pososto_petr*100,2,".",",")."</h5></td></tr>";
$f13 .= "</table>";
//*********************************************************************************************
$f14 = "<table><tr><td>".
$f14 .= "Η συνολική διείσδυση αέρα από κουφώματα είναι: ". number_format($dieisdysi_aera,3,".",",") . " m³/h<br/>".
"Η απαιτούμενη διείσδυση αέρα είναι: " . number_format($apaitoymeni_dieisdysi_aera,3,".",",") . " m³/h<br/>";
if ($apaitoymeni_dieisdysi_aera <= $dieisdysi_aera){
$f14 .="Η απαίτηση ικανοποιείται.";
}else{
$f14 .="ΔΕΝ ικανοποιείται η απαίτηση.";
}
$f14 .= "</td></tr></table>";
//*********************************************************************************************



/*

$f3 = "<table>".
"<tr><td style=\"text-align:left;width:25%;\"><b></b></td>".
"<td style=\"text-align:center;width:15%;\"><b></b></td>".
"<td style=\"text-align:center;width:15%;\"><b></b></td>".
"<td style=\"text-align:center;width:15%;\"><b></b></td></tr>";


$f4 .= "<tr><td style=\"text-align:left;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td></tr>";
*/



//****************************************************************************************************************
//                          ΜΕΤΑΦΟΡΑ ΤΩΝ ΣΤΟΙΧΕΙΩΝ ΣΤΟ ΤΕΥΧΟΣ                                                    *
//****************************************************************************************************************
$objQuery1 = mysql_query("SELECT * FROM teyxos_template") or die ("Error Query [".$strSQL."]");
while($objResult1[] = mysql_fetch_array($objQuery1));

for ($i=1;$i<=8;$i++){

$teyxos=$objResult1[$i-1]["text"];

$z=" rgb(255, 160, 122);";
$z1="#ffa07a;";
$teyxos = str_replace($z, $z1, $teyxos);
$z="#ffa07a; ";
$z1="#ffa07a;";
$teyxos = str_replace($z, $z1, $teyxos);

preg_match_all("/\{[A-Z,0-9]*\}/",$teyxos,$m);
for ($k=1;$k<=count($m[0]);$k++){
$teyxos= preg_replace("/<span style=\"background-color:\#ffa07a;\">\{[A-Z,0-9]*\}<\/span>/",$m[0][$k-1],$teyxos,1);
}
if ($zwni=="a")$zwni="A";
if ($zwni=="b")$zwni="B";
if ($zwni=="g")$zwni="Γ";
if ($zwni=="d")$zwni="Δ";

$z=array();
$z1=array();
$z[0]="{NEWPAGE}";
$z1[0]="<p style=\"page-break-before:always;\"></p>";
$z[1]="{ZWNI}";
$z1[1]="<b>".$zwni."</b>";
$z[2]="{PIN43}";
$z1[2]=addslashes($pin43);
$z[3]="{PIN44}";
$z1[3]=addslashes($pin44);
$z[4]="{PINKOYF}";
$z1[4]=addslashes($pinkoyf);
$z[6]="{PINEPAR}";
$z1[6]=addslashes($pinepar."<br />".$pinepar1);
$z[7]="{ZNX}";
$z1[7]="<b>".number_format($vd_iliakoy,2,".",",")."</b>";
$z[8]="{ZNX1}";
$Vstore = $vd_iliakoy/5;
$eklogi_thermantira = round(($Vstore + 50),-1);
$Pn_levita = $fortio_znx_day_feb/5;
$Pn_levita1 = $Pn_levita*1.3;
$Pn_levita2 = $Pn_levita*1.3*860.1179;
$z1[8]="<b>".number_format($Vstore,2,".",",")."</b>";
$z[9]="{ZNX2}";
$z1[9]="<b>".number_format($eklogi_thermantira,2,".",",")."</b>";
$z[10]="{ZNX3}";
$z1[10]="<b>".number_format($Pn_levita,2,".",",")."</b>";
$z[11]="{ZNX4}";
$z1[11]="<b>".number_format($Pn_levita1,2,".",",")."</b>";
$z[12]="{ZNX5}";
$z1[12]="<b>".number_format($Pn_levita2,2,".",",")."</b>";
$z[13]="{THERMIKIENERGEIA1}";
$z1[13]="<b>".number_format($apolavi_aktinov,2,".",",")."</b>";
$apolavi_aktinov1 = $apolavi_aktinov*1.099;
$apolavi_aktinov2 = $apolavi_aktinov*2.9;
$z[14]="{PETRELAIO1}";
$z1[14]="<b>".number_format($apolavi_aktinov1,2,".",",")."</b>";
$z[15]="{HLEKTRIKI1}";
$z1[15]="<b>".number_format($apolavi_aktinov2,2,".",",")."</b>";
$z[16]="{PIN5}";
$z1[16]=addslashes($pin5);
$z[17]="{PIN6}";
$z1[17]=addslashes($pin6);
$z[18]="{PIN7}";
$z1[18]=addslashes($pin7);
$z[19]="{PIN8}";
$z1[19]=addslashes($pin8);
$z[20]="{THER1}";
$z1[20]="<b>".number_format($thermansi_value,2,".",",")."</b>";
$z[21]="{THER2}";
$z1[21]="<b>".number_format($thermansi_value_kw,2,".",",")."</b>";
$z[22]="{PIN9}";
$z1[22]=addslashes($pin9);
$z[23]="{KLIM1}";
$z1[23]="<b>".number_format($klimatismos_value,2,".",",")."</b>";
$z[24]="{KLIM2}";
$z1[24]="<b>".number_format($klimatismos_value_kw,2,".",",")."</b>";
$z[25]="{PIN10}";
$z1[25]=addslashes($pin10);
$z[26]="{ZNX6}";
$z1[26]="<b>".number_format($thermansi_value_kw13,2,".",",")."</b>";
$znx_pos_synol = (($fortio_znx_day_feb/5)*1.3)*$pososto_petr;
$znx_pos_kat = $znx_pos_synol/$thermansi_value_kw13;
$z[27]="{ZNX7}";
$z1[27]="<b>".number_format($znx_pos_kat,2,".",",")."</b>";
$z[28]="{ZNX8}";
$z1[28]="<b>".number_format($znx_pos_synol,2,".",",")."</b>";
$z[29]="{ZNX9}";
$z1[29]="<b>".number_format($pososto_iliaka*100,2,".",",")."</b>";
$z[30]="{PIN68}";
$z1[30]=addslashes($pin68);
$z[31]="{PIN69}";
$z1[31]=addslashes($pin69);
$z[32]="{PROJECT}";
$z1[32]=addslashes($project);
$z[33]="{PLACE}";
$z1[33]=addslashes($place);
$z[34]="{OWNER}";
$z1[34]=addslashes($owner);
$z[35]="{ENGS}";
$z1[35]=addslashes($engs);
$z[36]="{UKOYFMAX}";
$z1[36]=number_format($domika418,2,".",",");
$temp = mysql_query("SELECT * FROM kataskeyi_an_s");
while($row = mysql_fetch_array($temp)){
$plaisio=$row['plaisio'];
$ukoyf=$row['ukoyf'];
$platos=$row['platos'];
$pane=$row['pane'];
$upane=$row['upane'];
}
$z[37]="{PLAISIO}";
$z1[37]=$plaisio;
$z[38]="{UKOYF}";
$z1[38]=number_format($ukoyf,2,".",",");
$z[39]="{PLATOS}";
$z1[39]=number_format($platos,1,".",",");
$z[40]="{PANE}";
$z1[40]=$pane;
$z[41]="{UPANE}";
$z1[41]=number_format($upane,2,".",",");
for ($j=1;$j<=14;$j++){
$z[41+$j]="{F$j}";
if (!is_null(${"f".$j})){
$z1[41+$j]=addslashes(${"f".$j});
}else{
$z1[41+$j]="";
}}


$z[60]="<table>";
$z1[60]="<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:100%;\" >";


//Στοιχεία μελέτης
$temp1 = mysql_query("SELECT * FROM kataskeyi_meletis");
while($row1 = mysql_fetch_array($temp1)){
$project=$row1['project'];
$place=$row1['place'];
$owner=$row1['owner'];
$engs=$row1['engs'];
}
$z[61]="{PROJECT1}";
$z1[61]=addslashes($project);
$z[62]="{PLACE1}";
$z1[62]=$place;
$z[63]="{OWNER1}";
$z1[63]=$owner;
$z[64]="{ENGS1}";
$z1[64]=$engs;


//Στοιχεία τοπογραφίας
$temp1 = mysql_query("SELECT * FROM kataskeyi_meletis_topo");
while($row1 = mysql_fetch_array($temp1)){
$sxedio=$row1['sxedio'];
$odos=$row1['odos'];
$apostaseis=$row1['apostaseis'];
$klisi=$row1['klisi'];
}
$z[65]="{SXEDIOY1}";
$z1[65]=$sxedio;
$z[66]="{ODOS1}";
$z1[66]=$odos;
$z[67]="{APOSTASEISOIK1}";
$z1[67]=$apostaseis;
$z[68]="{VELTKLISI1}";
$z1[68]=$klisi;
$z[69]="{THER3}";
$z1[69]=$thermansi_value13;

$teyxos = str_replace($z, $z1, $teyxos);

//*************   Εγγραφή στο teyxos_f  ****************************
$c="";
mysql_query("UPDATE teyxos_f SET text = '".$teyxos."' WHERE id = ".$i) or $c=$i; 
//echo $c;
//if ($c<>"")echo $teyxos;

}

}

?>
