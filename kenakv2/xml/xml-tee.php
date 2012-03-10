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
			$array_xrisis_znx1 = get_times("gen_xrisi", "energy_conditions", $drop_xrisi);
			$array_xrisis_znx2 = get_times("znx_m3_sq_y", "energy_conditions", $drop_xrisi);
			$xrisi_gen = $array_xrisis_znx1[0][0];
			$xrisi_znx_iliakos = $array_xrisis_znx[0][0];
			
			$xrisi_text = $xrisi_gen . ', ' . $xrisi_znx_iliakos;
			$syntelestis_znx_iliakos = $array_xrisis_znx[0][1];
			$syntelestis_znx_iliakos2 = $array_xrisis_znx2[0][0];
			$mesi_katanalwsi_znx=$syntelestis_znx_iliakos2*$synoliko_embadon;
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

$array_leitoyrgias = get_times("*", "energy_conditions", $drop_xrisi);

$array_hm = get_times_all("*", "kataskeyi_hm");
$thermansi_value = $array_hm[0]["value"];
$klimatismos_value = $array_hm[1]["value"];
$thermansi_value_kw = $thermansi_value*1.163/1000;
$thermansi_value_kw13 = $thermansi_value_kw*1.3;
$thermansi_value13 = $thermansi_value*1.3;
$klimatismos_value_kw = $klimatismos_value*0.000293;

$pososto_iliaka_100 = $pososto_iliaka*100;

if ($zwni=="a")$zwni="A";
if ($zwni=="b")$zwni="B";
if ($zwni=="g")$zwni="Γ";
if ($zwni=="d")$zwni="Δ";

$Vstore = $vd_iliakoy/5;
$eklogi_thermantira = round(($Vstore + 50),-1);
$Pn_levita = $fortio_znx_day_feb/5;
$Pn_levita1 = $Pn_levita*1.3;
$Pn_levita2 = $Pn_levita*1.3*860.1179;

$apolavi_aktinov1 = $apolavi_aktinov*1.099;
$apolavi_aktinov2 = $apolavi_aktinov*2.9;

$znx_pos_synol = (($fortio_znx_day_feb/5)*1.3)*$pososto_petr;
$znx_pos_kat = $znx_pos_synol/$thermansi_value_kw13;

//Πλαίσιο
$temp = mysql_query("SELECT * FROM kataskeyi_an_s");
while($row = mysql_fetch_array($temp)){
$plaisio=$row['plaisio'];
$ukoyf=$row['ukoyf'];
$platos=$row['platos'];
$pane=$row['pane'];
$upane=$row['upane'];
}

//Στοιχεία μελέτης
$temp1 = mysql_query("SELECT * FROM kataskeyi_meletis");
while($row1 = mysql_fetch_array($temp1)){
$project=$row1['project'];
$place=$row1['place'];
$owner=$row1['owner'];
$engs=$row1['engs'];
$owner_status=$row1['owner_status'];
$address=$row1['address'];
$contact_type=$row1['contact_type'];
$contact_name=$row1['contact_name'];
$contact_tel=$row1['contact_tel'];
$contact_mail=$row1['contact_mail'];
}

//Στοιχεία τοπογραφίας
$temp1 = mysql_query("SELECT * FROM kataskeyi_meletis_topo");
while($row1 = mysql_fetch_array($temp1)){
$sxedio=$row1['project'];
$odos=$row1['odos'];
$apostaseis=$row1['apostaseis'];
$klisi=$row1['klisi'];
$pol_grafeio=$row1['pol_grafeio'];
$pol_year=$row1['pol_year'];
$pol_number=$row1['pol_number'];
$pol_year_complete=$row1['pol_year_complete'];
$pol_type=$row1['pol_type'];
}

if ($pol_type=="0") {$pol_type="Νέο κτίριο";}
if ($pol_type=="1") {$pol_type="Υπάρχον κτίριο";}
if ($pol_type=="2") {$pol_type="Ριζικά ανακαινιζόμενο κτίριο";}

if ($zwni=="a") {$xml_zwni=0;}
if ($zwni=="b") {$xml_zwni=1;}
if ($zwni=="g") {$xml_zwni=2;}
if ($zwni=="d") {$xml_zwni=3;}

//Στοιχεία δροσισμού κλπ
$kataskeyi_stoixeia_array = get_times_all("*", "kataskeyi_stoixeia");
$kataskeyi_stoixeia_anigmeni_thermo = $kataskeyi_stoixeia_array[0]["anigmeni_thermo"];
$kataskeyi_stoixeia_aytomatismoi = $kataskeyi_stoixeia_array[0]["aytomatismoi"];
$kataskeyi_stoixeia_kaminades = $kataskeyi_stoixeia_array[0]["kaminades"];
$kataskeyi_stoixeia_eksaerismos = $kataskeyi_stoixeia_array[0]["eksaerismos"];
$kataskeyi_stoixeia_anem_orofis = $kataskeyi_stoixeia_array[0]["anem_orofis"];


$perimetros_dapedoy_array = get_times_all("*", "kataskeyi_therm_dap");
$perimetros_dapedoy = $perimetros_dapedoy_array[0]["perimetros"];



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
$handle = fopen('tee-kenak-'.time().'.xml','w+');
fwrite($handle,$xml);
echo "Το αρχείο " . 'tee' . "-kenak-" . time() . ".xml" . " εγγράφηκε επιτυχώς";
fclose($handle);

?>
