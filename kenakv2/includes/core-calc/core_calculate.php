<?php

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
			${"dapedo_id_zwnis".$i} = $objResult["id_zwnis"];
			${"dapedo_type".$i} = $objResult["type"];
			${"dapedo_name".$i} = $objResult["name"];
			${"dapedo_emvadon".$i} = $objResult["emvadon"];
			${"dapedo_u".$i} = $objResult["u"];
			if (${"dapedo_type".$i} == "0"){$dapedo_pol = 0.5;}
			if (${"dapedo_type".$i} == "1"){$dapedo_pol = 1;}
			$dapedo_embadon += ${"dapedo_emvadon".$i};
			${"dapedo_ua".$i} = ${"dapedo_emvadon".$i} * ${"dapedo_u".$i} * $dapedo_pol;
			$dapedo_ua += ${"dapedo_ua".$i};
			}
			
			
			
			//Χώροι κτιρίου
			$strSQL = "SELECT * FROM kataskeyi_xwroi";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$rows_xwroi = mysql_num_rows($objQuery);

			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"xwroi_id_zwnis".$i} = $objResult["id_zwnis"];
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
			${"thermo_eksw_id_zwnis".$i} = $objResult["id_zwnis"];
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
			${"thermo_esw_id_zwnis".$i} = $objResult["id_zwnis"];
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
			${"id_zwnis".$t.$i} = $objResult["id_zwnis"];
			${"name".$t.$i} = $objResult["name"];
			${"mikos".$t.$i} = $objResult["t_mikos"];
			${"ypsos".$t.$i} = $objResult["t_ypsos"];
			${"paxos".$t.$i} = $objResult["t_platos"];
			${"u".$t.$i} = $objResult["t_u"];
			${"thermo_orofis_drop".$t.$i} = $objResult["t_thermo"];
			${"thermo_orofis_dap".$t.$i} = $objResult["t_thermodap"];
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
			${"id_zwnis".$t.$i} = $objResult["id_zwnis"];
			${"name".$t.$i} = $objResult["name"];
			${"mikos".$t.$i} = $objResult["t_mikos"];
			${"ypsos".$t.$i} = $objResult["t_ypsos"];
			${"paxos".$t.$i} = $objResult["t_platos"];
			${"u".$t.$i} = $objResult["t_u"];
			${"thermo_orofis_drop".$t.$i} = $objResult["t_thermo"];
			${"thermo_orofis_dap".$t.$i} = $objResult["t_thermodap"];
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
			${"id_zwnis".$t.$i} = $objResult["id_zwnis"];
			${"name".$t.$i} = $objResult["name"];
			${"mikos".$t.$i} = $objResult["t_mikos"];
			${"ypsos".$t.$i} = $objResult["t_ypsos"];
			${"paxos".$t.$i} = $objResult["t_platos"];
			${"u".$t.$i} = $objResult["t_u"];
			${"thermo_orofis_drop".$t.$i} = $objResult["t_thermo"];
			${"thermo_orofis_dap".$t.$i} = $objResult["t_thermodap"];
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
			${"id_zwnis".$t.$i} = $objResult["id_zwnis"];
			${"name".$t.$i} = $objResult["name"];
			${"mikos".$t.$i} = $objResult["t_mikos"];
			${"ypsos".$t.$i} = $objResult["t_ypsos"];
			${"paxos".$t.$i} = $objResult["t_platos"];
			${"u".$t.$i} = $objResult["t_u"];
			${"thermo_orofis_drop".$t.$i} = $objResult["t_thermo"];
			${"thermo_orofis_dap".$t.$i} = $objResult["t_thermodap"];
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
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_orofis_dap_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
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
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_orofis_dap_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
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
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_orofis_dap_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
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
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_orofis_dap_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
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
		$thermogefyres_enwsi = ($thermogefyres_toixoy_b + $thermogefyres_toixoy_a + $thermogefyres_toixoy_n + $thermogefyres_toixoy_d);//εδώ έχω υπολογίσει θερμογεφυρες υποστύλωμα,δοκό,οροφή,δάπεδο,συρόμενα
			
			//Υπολογισμοί των υπόλοιπων θερμογεφυρών
			//$thermogefyres_dapedoy = $perimetros * $thermo_dapedo_drop;//εδώ υπολογίζονταν με τον παλαιότερο τρόπο οι θερμογέφυρες δαπέδου με βάση την περίμετρο.
			//Αυτές προστέθηκαν στους τοίχους για να καλυφθεί και το ενδιάμεσο δάπεδο.
			
			$thermogefyres = $thermogefyres_orofi + $thermogefyres_gwnia + $thermogefyres_anoig + $thermogefyres_enwsi;
			
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
			$a_oriz_adiafanwn = $dapedo_embadon;
			$a_kat_adiafanwn = $a_adiafanwn_anoigmatwn + $a_dromikoy + $a_syr + $a_dokoy + $a_ypost;
			$a_diafanwn = $a_diafanwn_anoigmatwn;
			$a_thermoperatotitas = $a_oriz_adiafanwn + $a_kat_adiafanwn + $a_diafanwn;
			
			//Υπολογισμός συνόλων ανά κατηγορία UA
			$ua_oriz_adiafanwn = $dapedo_ua;
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

?>