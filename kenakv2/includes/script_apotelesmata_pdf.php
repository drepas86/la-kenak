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

			<?php
			require_once("functions.php");
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
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * ${"ypsos_".$t.$i};
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
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * ${"ypsos_".$t.$i};
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
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * ${"ypsos_".$t.$i};
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
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * ${"ypsos_".$t.$i};
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

$pin43 = "<table><tr><td>Δομικό στοιχείο</td><td>Φύλλο ελέγχου</td><td>U [W/(m2K)]</td><td>Umax [W/(m2K)] [Πίνακας 4.1]</td></tr>";
$pin43 .= "<tr><td>Εξωτερική τοιχοποιία σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td>" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td>Εξωτερική τοιχοποιία σε επαφή με εξωτερικό αέρα επένδυση πέτρα</td><td></td><td></td><td>" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td>Εξωτερική δοκός/υποστύλωμα/τοίχωμα σε επαφή με εξωτερικό αέρα και επένδυση πέτρα</td><td></td><td></td><td>" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td>Εξωτερική δοκός/υποστύλωμα/τοίχωμα σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td>" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td>Τοιχοποιία συρομένων σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td>" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td>Τοιχοποιία συρομένων σε επαφή με εξωτερικό αέρα και επένδυση πέτρα</td><td></td><td></td><td>" . $domika412 . "</td></tr>";
$pin43 .= "<tr><td>Δοκός/υποστύλωμα/τοίχωμα σε επαφή με μη θερμαινόμενο χώρο</td><td></td><td></td><td>" . $domika414 . "</td></tr>";
$pin43 .= "<tr><td>Δώμα βατό  σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td>" . $domika413 . "</td></tr>";
$pin43 .= "<tr><td>Δάπεδο σε προεξοχή/πυλωτή σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td>" . $domika413 . "</td></tr>";
$pin43 .= "<tr><td>Οροφή κεραμίδι με μόνωση επ’ αυτού, σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td>" . $domika413 . "</td></tr>";
$pin43 .= "<tr><td>Δάπεδο σε επαφή με μη θερμαινόμενο χώρο.</td><td></td><td></td><td>" . $domika416 . "</td></tr>";
$pin43 .= "<tr><td>Δάπεδο σε επαφή με το έδαφος</td><td></td><td></td><td>" . $domika417 . "</td></tr>";
$pin43 .= "<tr><td>Τοιχώματα χωρίς θερμομόνωση σε επαφή με τον εξωτερικό αέρα</td><td></td><td></td><td>Δεν υπάρχει απαίτηση</td></tr>";
$pin43 .= "<tr><td>Τοιχώματα χωρίς θερμομόνωση σε επαφή με το έδαφος</td><td></td><td></td><td>Δεν υπάρχει απαίτηση</td></tr>";
$pin43 .= "<tr><td>Δάπεδο Υπογείου σε επαφή με το έδαφος</td><td></td><td></td><td>Δεν υπάρχει απαίτηση</td></tr>";
$pin43 .= "<tr><td>Οροφή χωρίς θερμομόνωση σε επαφή με εξωτερικό αέρα</td><td></td><td></td><td>Δεν υπάρχει απαίτηση</td></tr>";
$pin43 .= "</table>";
		
		
$pin44 = "<table><tr><td>Δομικό στοιχείο</td><td>Φύλλο ελέγχου</td><td>U [W/(m2K)]</td><td>Μέσο βάθος z [m]</td><td>U' [W/(m2K)]</td></tr>";		
$pin44 .= "<tr><td>Δάπεδο ισογείου σε επαφή με το έδαφος</td><td>" . $dapedo_u1 . "</td><td></td><td>0</td><td></td></tr>";
$pin44 .= "<tr><td>Δάπεδο ισογείου σε επαφή με μη θερμαινόμενο χώρο</td><td>" . $dapedo_u2 . "</td><td></td><td>0</td><td></td></tr>";
$pin44 .= "</table>";

$ukoyfmax = "<=" . $domika418;

$pinkoyf = "<table><tr><td>Άνοιγμα</td><td>Τύπος</td><td>U [W/(m2K)]</td><td>Umax [W/(m2K)]</td></tr>";
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

$pinkoyf .= "<tr><td>" . ${$an."name".$j} . "</td><td>" . $anoig_type . "</td><td>" . ${$an."anoig_u".$j} . "</td><td>" . $domika418 . "</td></tr>";
}
$pinkoyf .= "</table>";

$pinkoyf .= "<table><tr><td>Άνοιγμα</td><td>Τύπος</td><td>U [W/(m2K)]</td><td>Umax [W/(m2K)]</td></tr>";
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

$pinkoyf .= "<table><tr><td>Άνοιγμα</td><td>Τύπος</td><td>U [W/(m2K)]</td><td>Umax [W/(m2K)]</td></tr>";
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

$pinkoyf .= "<table><tr><td>Άνοιγμα</td><td>Τύπος</td><td>U [W/(m2K)]</td><td>Umax [W/(m2K)]</td></tr>";
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
$pinepar .= "</table>";


$pinepar1 = "<table><tr><td>Είδος</td><td>Τιμή</td></tr>";	
$pinepar1 .= "<tr><td>U*A θερμογεφυρών</td><td>" . $thermogefyres . "</td></tr>";
$pinepar1 .= "<tr><td>Σύνολικό U*A</td><td>" . $sunolo_ua . "</td></tr>";
$pinepar1 .= "<tr><td>A/V</td><td>" . $aprosv . "</td></tr>";
$pinepar1 .= "<tr><td>Τιμή (U*A)/Α</td><td>" . $uadiaa . "</td></tr>";
$pinepar1 .= "<tr><td>Umax  [W/(m2·Κ)] :</td><td>" . $umax . "</td></tr>";
$pinepar1 .= "<tr><td>ΕΛΕΓΧΟΣ</td><td>" . $elegxosua . "</td></tr>";
$pinepar1 .= "</table>";











	
 ?>