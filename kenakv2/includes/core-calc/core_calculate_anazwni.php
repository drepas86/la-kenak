<?php

//-------------- ΣΤΟΙΧΕΙΑ ΑΝΕΞΑΡΤΗΤΑ ΤΗΣ ΘΕΡΜΙΚΗΣ ΖΩΝΗΣ ----------------------------
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
			$nero_dikt_id = $nero_dikt1;
			$velt_klisi_id = $velt_klisi1;
			
			$climate_data_array = get_times("place", "climate41", $climate_data_id);
			$climate_data = $climate_data_array[0]["place"];
			
			$nero_dikt_array = get_times("place", "climate61", $nero_dikt_id);
			$nero_dikt = $nero_dikt_array[0]["place"];
			
			$velt_klisi_array = get_times("place", "climate44", $velt_klisi_id);
			$velt_klisi = $velt_klisi_array[0]["place"];
			
			
			$epif_iliakoy_ktirio = $epif_iliakoy1; // ΑΦΟΡΑ ΟΛΟ ΤΟ ΚΤΙΡΙΟ
			$xrisi_id_ktirio = $xrisi1; //ΑΦΟΡΑ ΟΛΟ ΤΟ ΚΤΊΡΙΟ
			
			$xrisi_array_ktirio = get_times("*", "energy_conditions", $xrisi_id_ktirio); // ΑΦΟΡΑ ΟΛΟ ΤΟ ΚΤΙΡΙΟ
			$xrisi_ktirio = $xrisi_array_ktirio[0]["xrisi"]; // ΑΦΟΡΑ ΟΛΟ ΤΟ ΚΤΙΡΙΟ
			$gen_xrisi_ktirio = $xrisi_array_ktirio[0]["gen_xrisi"]; // ΑΦΟΡΑ ΟΛΟ ΤΟ ΚΤΙΡΙΟ

			
			
//-------------- ΣΤΟΙΧΕΙΑ ΕΞΑΡΤΗΜΕΝΑ ΤΗΣ ΘΕΡΜΙΚΗΣ ΖΩΝΗΣ ------------------------------
			
			//Αρχικά πρέπει να βρώ πόσες είναι οι θερμικές ζώνες
			$strSQL = "SELECT * FROM kataskeyi_zwnes";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$arithmos_thermzwnes = mysql_num_rows($objQuery);
			
			//Έπειτα πρέπει να βρω τα id τους και να τα βάλω σε μια array για να μου είναι εύκολο να τα βρω
			//Ορίζω μία array που θα πάρει τα id αυτά και της βάζω στη θέση 0 το 0 την οποία δεν θα χρησιμοποιήσω. 
			//Η πρώτη ζώνη θα έχει id $id_thermzwnes[1]
			
			$id_thermzwnes = array();
			$check_thermzwnes = array();
			$id_thermzwnes[0] = 0;
			$check_thermzwnes[0] = 0;
			
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			
			${"drop_xrisi".$i} = $objResult["xrisi"];
			${"anigmeni_thermo".$i} = $objResult["anigmeni_thermo"];
			${"thermoeparkeia".$i} = $objResult["thermoeparkeia"];
			${"klines".$i} = $objResult["klines"];
			${"aytomatismoi".$i} = $objResult["aytomatismoi"];
			${"kaminades".$i} = $objResult["kaminades"];
			${"eksaerismos".$i} = $objResult["eksaerismos"];
			${"anem_orofis".$i} = $objResult["anem_orofis"];
			
			array_push($id_thermzwnes, $objResult["id"]);
			array_push($check_thermzwnes, $objResult["thermoeparkeia"]);
			}
			
			//Έπειτα για κάθε πίνακα που περιέχει στοιχεία που είναι εξαρτημένα της θερμικής ζώνης
			//πρέπει να υπολογίσω όπως έκανα και παλαιότερα ανά προσανατολισμό και τις μεταβλητές που δεν έχουν i, j
			//να τους δώσω τιμές με την αριθμηση των ζωνών για να κάνω ξεχωριστούς υπολογισμούς.
			
			//Δάπεδα οροφές
			$strSQL = "SELECT * FROM kataskeyi_daporo";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$rows_dapedo = mysql_num_rows($objQuery);
			
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
			${"dapedo_ua".$i} = ${"dapedo_emvadon".$i} * ${"dapedo_u".$i} * $dapedo_pol;
			
				for ($z=1;$z<=$arithmos_thermzwnes;$z++){
					if (${"dapedo_id_zwnis".$i} == $id_thermzwnes[$z]){
					${"dapedo_emvadonzwnis".$z} += ${"dapedo_emvadon".$i}; //Εμβαδόν δαπέδων θερμικής ζώνης
					${"dapedo_uazwnis".$z} += ${"dapedo_ua".$i}; //UA δαπέδων θερμικής ζώνης
					}
				}
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
			${"xwroi_ogkos".$i} = ${"xwroi_mikos".$i} * ${"xwroi_platos".$i} * ${"xwroi_ypsos".$i};
				
				for ($z=1;$z<=$arithmos_thermzwnes;$z++){
					if (${"xwroi_id_zwnis".$i} == $id_thermzwnes[$z]){
					${"synoliko_embadon".$z} += ${"xwroi_emvadon".$i}; //Εμβαδόν χώρων θερμικής ζώνης
					${"synolikos_ogkos".$z} += ${"xwroi_ogkos".$i};	 //Όγκος θερμικής ζώνης
						if ($check_thermzwnes[$z] == 1) {
						$thermainomenos_ogkos += ${"xwroi_ogkos".$i};
						}
					}
				}
			$synoliko_embadon += ${"xwroi_emvadon".$i};
			$synolikos_ogkos += ${"xwroi_ogkos".$i};
			}
			
			

			
			//θερμογέφυρες γωνιών (κάτοψης)

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
			
				for ($z=1;$z<=$arithmos_thermzwnes;$z++){
					if (${"thermo_eksw_id_zwnis".$i} == $id_thermzwnes[$z]){
					${"thermo_eksw_gwnia_ua_zwnis".$z} += ${"thermo_eksw_gwnia_ua".$i}; //Θερμογέφυρες εξωτερικών γωνιών θερμικής ζώνης
					}
				}
			}
			
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
			
				for ($z=1;$z<=$arithmos_thermzwnes;$z++){
					if (${"thermo_esw_id_zwnis".$i} == $id_thermzwnes[$z]){
					${"thermo_esw_gwnia_ua_zwnis".$z} += ${"thermo_esw_gwnia_ua".$i}; //Θερμογέφυρες εσωτερικών γωνιών θερμικής ζώνης
					}
				}
			}
			
			
			for ($z=1;$z<=$arithmos_thermzwnes;$z++){
			${"thermogefyres_gwnia".$z} = ${"thermo_esw_gwnia_ua_zwnis".$z} + ${"thermo_eksw_gwnia_ua_zwnis".$z}; // Θερμογέφυρες γωνιών κάτοψης για τη θερμική ζώνη
			}
			
			
			
			//σε αυτές τις array θα βάλω την πρώτη τιμή 0 για να κάνω επαναλήψεις από 1-4 και όχι από 0-3
			$it = array(0, "b", "a", "n", "d");
			$itcount = array(0, "t_boreia", "t_anatolika", "t_notia", "t_dytika");
			$ian = array(0, "an_b_", "an_a_", "an_n_", "an_d_");
			$iancount = array(0, "anoig_t_boreia", "anoig_t_anatolika", "anoig_t_notia", "anoig_t_dytika");
			$itsk = array(0, "sk_t_b_", "sk_t_a_", "sk_t_n_", "sk_t_d_");
			$itskcount = array(0, "skiaseis_t_b", "skiaseis_t_a", "skiaseis_t_n", "skiaseis_t_d");
			$iansk = array(0, "sk_an_b_", "sk_an_a_", "sk_an_n_", "sk_an_d_");
			$ianskcount = array(0, "skiaseis_anoig_b", "skiaseis_anoig_a", "skiaseis_anoig_n", "skiaseis_anoig_d");
			
			
			//ΤΟΙΧΟΙ
			for ($p=1;$p<=4;$p++){
		
			$strSQL = "SELECT * FROM kataskeyi_t_".$it[$p];
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			${$itcount[$p]} = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$t = "_".$it[$p];
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
			
			}


			//ΑΝΟΙΓΜΑΤΑ
			for ($p=1;$p<=4;$p++){
			
			$strSQL = "SELECT * FROM kataskeyi_an_".$it[$p];
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			${$iancount[$p]} = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$an = $ian[$p];
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
			
			}
			
			
			//ΣΚΙΑΣΕΙΣ ΤΟΙΧΩΝ
			for ($p=1;$p<=4;$p++){
			
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_".$it[$p];
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			${$itskcount[$p]} = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = $itsk[$p];
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_toixoy".$i} = $objResult["id_toixoy"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}

			}
			
			
			//ΣΚΙΑΣΕΙΣ ΑΝΟΙΓΜΑΤΩΝ
			for ($p=1;$p<=4;$p++){

			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_".$it[$p];
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			${$ianskcount[$p]} = mysql_num_rows($objQuery);
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			$sk = $iansk[$p];
			${$sk."id".$i} = $objResult["id"];
			${$sk."id_an".$i} = $objResult["id_an"];
			${$sk."f_hor_h".$i} = $objResult["f_hor_h"];
			${$sk."f_hor_c".$i} = $objResult["f_hor_c"];
			${$sk."f_ov_h".$i} = $objResult["f_ov_h"];
			${$sk."f_ov_c".$i} = $objResult["f_ov_c"];
			${$sk."f_fin_h".$i} = $objResult["f_fin_h"];
			${$sk."f_fin_c".$i} = $objResult["f_fin_c"];
			}
			
			}
			
			
		
			

		//Υπολογισμοί τοίχων ανοιγμάτων
		for ($p=1;$p<=4;$p++){
		
		for ($i = 1; $i <= ${$itcount[$p]}; $i++) {
		$t = $it[$p];
		$an = $ian[$p];
		
		${"epifaneia_toixoy_".$t.$i} = ${"mikos_".$t.$i} * ${"ypsos_".$t.$i};
		${"epifaneia_toixoy_syr_".$t.$i} = ${"mikos_syr_".$t.$i} * ${"ypsos_syr_".$t.$i};
		${"epifaneia_dokos_".$t.$i} = ${"mikos_".$t.$i} * ${"dokos_".$t.$i};
		${"epifaneia_ypost_".$t.$i} = ${"ypostil_".$t.$i} * (${"ypsos_".$t.$i} - ${"dokos_".$t.$i});
		${"thermogefyres_toixoy_".$t.$i} = (${"mikos_".$t.$i} * ${"thermo_orofis_drop_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_orofis_dap_".$t.$i}) + (${"mikos_".$t.$i} * ${"thermo_dokoy_drop_".$t.$i}) + (${"ypsos_".$t.$i} * ${"arithmos_ypost_".$t.$i} * ${"thermo_ypost_drop_".$t.$i} * 2);
		${"epifaneia_dromikoy_".$t.$i} = ${"epifaneia_toixoy_".$t.$i} - ${"epifaneia_toixoy_syr_".$t.$i} - ${"epifaneia_dokos_".$t.$i} - ${"epifaneia_ypost_".$t.$i};
		
			for ($j = 1; $j <= ${$iancount[$p]}; $j++) {
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
							
			}// τελειώνει η επανάληψη για τα ανοίγματα

		
		${"ua_dromikoy_".$t.$i} = ${"u_".$t.$i} *  ${"epifaneia_dromikoy_".$t.$i};
		${"ua_syr_".$t.$i} = ${"u_syr_".$t.$i} *  ${"epifaneia_toixoy_syr_".$t.$i};
		${"ua_dok_".$t.$i} = ${"u_dok_".$t.$i} * ${"epifaneia_dokos_".$t.$i};
		${"ua_ypost_".$t.$i} = ${"u_ypost_".$t.$i} * ${"epifaneia_ypost_".$t.$i};
		
		
		${"dieisdysi_".$t} += ${"dieisdysi_toixoy_".$t.$i};
		${"thermogefyres_anoig_".$t} += ${"thermogefyres_anoig_toixoy_".$t.$i};
		${"epifaneia_anoigmatwn_toixoy_".$t} += ${"epifaneia_anoigmatwn_toixoy_".$t.$i};
		${"ua_anoigmatos_toixoy_".$t} += ${"ua_anoigmatos_toixoy_".$t.$i};
		${"epifaneia_masif_toixoy_".$t} += ${"epifaneia_masif_toixoy_".$t.$i};
		${"ua_masif_toixoy_".$t} += ${"ua_masif_toixoy_".$t.$i};
		${"epifaneia_dromikoy_".$t} += ${"epifaneia_dromikoy_".$t.$i};
		
		${"ua_dromikoy_".$t} += ${"ua_dromikoy_".$t.$i};
		${"ua_syr_".$t} += ${"ua_syr_".$t.$i};
		${"ua_dok_".$t} += ${"ua_dok_".$t.$i};
		${"ua_ypost_".$t} += ${"ua_ypost_".$t.$i};
		
		${"thermogefyres_toixoy_".$t} += ${"thermogefyres_toixoy_".$t.$i};
		${"mikos_toixoy_".$t} += ${"mikos_".$t.$i};
		${"epifaneia_toixoy_".$t} += ${"epifaneia_toixoy_".$t.$i};
		${"epifaneia_toixoy_syr_".$t} += ${"epifaneia_toixoy_syr_".$t.$i};
		${"epifaneia_dokos_".$t} += ${"epifaneia_dokos_".$t.$i};
		${"epifaneia_ypost_".$t} += ${"epifaneia_ypost_".$t.$i};

			//Για κάθε τοίχο κάνω επανάληψη στις ζώνες για να δω σε ποιά ανήκει ο τοίχος και προσθέτω στα σύνολα
			//των a, ua, διείσδυσης αέρα και thermo της ζώνης που μπαίνουν στον υπολογισμό θερμομονωτικής επάρκειας παρακάτω.
			
			for ($z=1;$z<=$arithmos_thermzwnes;$z++){
				if (${"id_zwnis_".$t.$i} == $id_thermzwnes[$z]) { //ο τοίχος ανήκει σε αυτή τη ζώνη
				${"dieisdysi_zwnis".$z} += ${"dieisdysi_toixoy_".$t.$i};
				${"thermo_anoig_zwnis".$z} += ${"thermogefyres_anoig_toixoy_".$t.$i};//εδώ έχω υπολογίσει θερμογεφυρες ανω/κατω-κασι,λαμπας
				${"thermo_enwsi_zwnis".$z} += ${"thermogefyres_toixoy_".$t.$i};//εδώ έχω υπολογίσει θερμογεφυρες υποστύλωμα,δοκό,οροφή,δάπεδο,συρόμενα
				
				//Υπολογισμός UA
				${"ua_dromikoy_zwnis".$z} += ${"ua_dromikoy_".$t.$i};
				${"ua_syr_zwnis".$z} += ${"ua_syr_".$t.$i};
				${"ua_dok_zwnis".$z} += ${"ua_dok_".$t.$i};
				${"ua_ypost_zwnis".$z} += ${"ua_ypost_".$t.$i};
				${"ua_anoigmatos_zwnis".$z} += ${"ua_anoigmatos_toixoy_".$t.$i};
				${"ua_masif_zwnis".$z} += ${"ua_masif_toixoy_".$t.$i};
				
				//Υπολογισμός A
				${"l_toixoy_zwnis".$z} += ${"mikos_".$t.$i};
				${"a_toixoy_zwnis".$z} += ${"epifaneia_toixoy_".$t.$i};
				${"a_syr_zwnis".$z} += ${"epifaneia_toixoy_syr_".$t.$i};
				${"a_dokoy_zwnis".$z} += ${"epifaneia_dokos_".$t.$i};
				${"a_ypost_zwnis".$z} += ${"epifaneia_ypost_".$t.$i};
				${"a_dromikoy_zwnis".$z} += ${"epifaneia_dromikoy_".$t.$i};
				${"a_diafanwn_anoigmatwn_zwnis".$z} += ${"epifaneia_anoigmatwn_toixoy_".$t.$i};
				${"a_adiafanwn_anoigmatwn_zwnis".$z} += ${"epifaneia_masif_toixoy_".$t.$i};
			

			
				}//Ο τοίχος δεν ανήκει σε αυτή τη ζώνη. Πήγαινε στον επόμενο

			}//τελειώνει η επανάληψη για τις ζώνες
		
		}//τελειώνει η επανάληψη για τον τοίχο	
		
		}//τελειώνει η επανάληψη για τον προσανατολισμό
	
	
		

			for ($z=1;$z<=$arithmos_thermzwnes;$z++){
			
			
			${"thermogefyres".$z} = ${"thermogefyres_orofi".$z} + ${"thermogefyres_gwnia".$z} + ${"thermo_anoig_zwnis".$z} + ${"thermo_enwsi_zwnis".$z};
			
			//Υπολογισμός συνόλων ανά κατηγορία Α
			${"a_oriz_adiafanwn".$z} = ${"dapedo_emvadonzwnis".$z};
			${"a_kat_adiafanwn".$z} = ${"a_adiafanwn_anoigmatwn_zwnis".$z} + ${"a_dromikoy_zwnis".$z} + ${"a_syr_zwnis".$z} + ${"a_dokoy_zwnis".$z} + ${"a_ypost_zwnis".$z};
			${"a_diafanwn".$z} = ${"a_diafanwn_anoigmatwn_zwnis".$z};
			${"a_thermoperatotitas".$z} = ${"a_oriz_adiafanwn".$z} + ${"a_kat_adiafanwn".$z} + ${"a_diafanwn".$z};
			
			//Υπολογισμός συνόλων ανά κατηγορία UA
			${"ua_oriz_adiafanwn".$z} = ${"dapedo_uazwnis".$z};
			${"ua_kat_adiafanwn".$z} = ${"ua_masif_zwnis".$z} + ${"ua_dromikoy_zwnis".$z} + ${"ua_syr_zwnis".$z} + ${"ua_dok_zwnis".$z} + ${"ua_ypost_zwnis".$z};
			${"ua_diafanwn".$z} = ${"ua_anoigmatos_zwnis".$z};
			${"ua_thermoperatotitas".$z} = ${"ua_oriz_adiafanwn".$z} + ${"ua_kat_adiafanwn".$z} + ${"ua_diafanwn".$z};			
			
			//Στοιχεία θερμογεφυρών:
			${"sunolo_ua".$z} = ${"thermogefyres".$z} + ${"ua_thermoperatotitas".$z};
			${"uadiaa".$z} = ${"sunolo_ua".$z} / ${"a_thermoperatotitas".$z};
			
			
			//Έλεγχος ζώνης και θερμομονωτικής επάρκειας
			${"aprosv".$z} = ${"a_thermoperatotitas".$z} / ${"synolikos_ogkos".$z};
			$sqltable = "thermo_eparkeia_u";
			//βρες τις γραμμές πριν και μετά
			${"array_aprosv".$z} = get_ua(${"aprosv".$z});
			${"grammiena".$z} = ${"array_aprosv".$z}[0];
			${"grammidyo".$z} = ${"array_aprosv".$z}[1];
			
			if (!isset(${"grammidyo".$z})){
			${"umaxena".$z} = get_thermoeparkeia($zwni, $sqltable, ${"grammiena".$z});
			${"umax".$z} = ${"umaxena".$z}[0][0]; 
			} 
			else {
			${"umaxenaarray".$z} = get_thermoeparkeia($zwni, $sqltable, ${"grammiena".$z});
			${"umaxena".$z} = ${"umaxenaarray".$z}[0][0];
			${"umaxdyoarray".$z} = get_thermoeparkeia($zwni, $sqltable, ${"grammidyo".$z});
			${"umaxdyo".$z} = ${"umaxdyoarray".$z}[0][0];
			${"umax".$z} = palindromisi(${"grammiena".$z},${"grammidyo".$z},${"umaxena".$z},${"umaxdyo".$z},${"aprosv".$z});
			
			}
			
			${"sygkrisiua".$z} = ${"uadiaa".$z}  / ${"umax".$z};
			if (${"sygkrisiua".$z}>1)${"elegxosua".$z}="ΔΕΝ τηρείται U &lt;= Umax";
			if (${"sygkrisiua".$z}<=1)${"elegxosua".$z}="ΙΣΧΥΕΙ U &lt;= Umax";
			
			}
			
	
	
			//Τα id για νερό δικτύου και βέλτιστη κλίση
			$drop_nero_diktyoy = $nero_dikt_id;
			if ($zwni=="a"){$drop_nero_diktyoy = 1;}
			if ($zwni=="b"){$drop_nero_diktyoy = 2;}
			if ($zwni=="g"){$drop_nero_diktyoy = 3;}
			if ($zwni=="d"){$drop_nero_diktyoy = 4;}
			$drop_velt_klisi = $velt_klisi_id;
			$t_znx = 45; //Θερμοκρασία ΖΝΧ
			
			//Βρίσκω για τις ζώνες τις μεταβλητές της χρήσης
			for ($z=1;$z<=$arithmos_thermzwnes;$z++){

			${"array_xrisis_znx".$z} = get_times("xrisi,znx_l_sq_d", "energy_conditions", ${"drop_xrisi".$z});
			${"array_xrisis_znx1".$z} = get_times("gen_xrisi", "energy_conditions", ${"drop_xrisi".$z});
			${"array_xrisis_znx2".$z} = get_times("znx_m3_sq_y", "energy_conditions", ${"drop_xrisi".$z});
			${"xrisi_gen".$z} = ${"array_xrisis_znx1".$z}[0][0];
			${"xrisi_eid".$z} = ${"array_xrisis_znx".$z}[0][0];
			${"xrisi_znx_iliakos".$z} = ${"array_xrisis_znx".$z}[0][0];
			
			${"xrisi_text".$z} = ${"xrisi_gen".$z} . ", " . ${"xrisi_eid".$z};
			$xrisi_gen_text .= " " . ${"xrisi_gen".$z} . "(Ζώνη " . $z . ")";
			$xrisi_eid_text .= " " . ${"xrisi_eid".$z} . "(Ζώνη " . $z . ")";
			$xrisi_textsyn .= " " . ${"xrisi_gen".$z} . ", " . ${"xrisi_eid".$z} . "(Ζώνη " . $z . ")";
			${"syntelestis_znx_iliakos".$z} = ${"array_xrisis_znx".$z}[0][1];
			${"syntelestis_znx_iliakos2".$z} = ${"array_xrisis_znx2".$z}[0][0];
			${"mesi_katanalwsi_znx".$z} = ${"syntelestis_znx_iliakos2".$z} * ${"synoliko_embadon".$z};
			${"vd_iliakoy".$z} = ${"syntelestis_znx_iliakos".$z} * ${"synoliko_embadon".$z};
			$syntelestis_znx_iliakos_text .= " " . ${"syntelestis_znx_iliakos".$z} . " (ζώνη " . $z . ")";
			}
			
			
			
			for ($z=1;$z<=$arithmos_thermzwnes;$z++){
			//Η επιφάνεια του ηλιακού από τα συστήματα
			$strSQL = "SELECT * FROM kataskeyi_xsystems_znxiliakos WHERE id_zwnis=$id_thermzwnes[$z]";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			//$num_rows = mysql_num_rows($objQuery);
			
			while($objResult = mysql_fetch_array($objQuery))
			{
			${"iliakos_id_zwnis".$z} = $objResult["id_zwnis"];
			${"iliakos_type".$z} = $objResult["type"];
			${"iliakos_thermansi".$z} = $objResult["thermansi"];
			${"iliakos_znx".$z} = $objResult["znx"];
			${"iliakos_syna".$z} = $objResult["syna"];
			${"iliakos_synb".$z} = $objResult["synb"];
			${"iliakos_epifaneia".$z} = $objResult["epifaneia"];
			${"iliakos_gdeg".$z} = $objResult["gdeg"];
			${"iliakos_bdeg".$z} = $objResult["bdeg"];
			${"iliakos_fs".$z} = $objResult["fs"];
			
			if (${"iliakos_type".$z} == 0){${"solar_collector_column1".$z} = "Χωρίς κάλυμμα";}
			if (${"iliakos_type".$z} == 1){${"solar_collector_column1".$z} = "Απλός επίπεδος";}
			if (${"iliakos_type".$z} == 2){${"solar_collector_column1".$z} = "Επιλεκτικός επίπεδος";}
			if (${"iliakos_type".$z} == 3){${"solar_collector_column1".$z} = "Κενού";}
			if (${"iliakos_type".$z} == 4){${"solar_collector_column1".$z} = "Συγκεντρωτικός";}
			
			if (${"iliakos_thermansi".$z} == 0){${"solar_collector_column2".$z} = "False";}
			if (${"iliakos_thermansi".$z} == 1){${"solar_collector_column2".$z} = "True";}
			
			if (${"iliakos_znx".$z} == 0){${"solar_collector_column3".$z} = "False";}
			if (${"iliakos_znx".$z} == 1){${"solar_collector_column3".$z} = "True";}
			}
			}
			
			
			//Νερό δικτύου
			//πρώτη γραμμή πίνακα
			$array_thermokrasiwn = get_times("*", "nero_diktyoy", $drop_nero_diktyoy);
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
			
			
			for ($z=1;$z<=$arithmos_thermzwnes;$z++){
			//2η γραμμή πίνακα
			${"fortio_znx_day_jan".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_jan)/3600,4);
			${"fortio_znx_day_feb".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_feb)/3600,4);
			${"fortio_znx_day_mar".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_mar)/3600,4);
			${"fortio_znx_day_apr".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_apr)/3600,4);
			${"fortio_znx_day_may".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_may)/3600,4);
			${"fortio_znx_day_jun".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_jun)/3600,4);
			${"fortio_znx_day_jul".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_jul)/3600,4);
			${"fortio_znx_day_aug".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_aug)/3600,4);
			${"fortio_znx_day_sep".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_sep)/3600,4);
			${"fortio_znx_day_okt".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_okt)/3600,4);
			${"fortio_znx_day_nov".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_nov)/3600,4);
			${"fortio_znx_day_dec".$z} = round(${"vd_iliakoy".$z} * 0.998 * 4.18 * ($t_znx - $nero_dec)/3600,4);
			
			//3η γραμμή πίνακα
			${"fortio_znx_jan".$z} = ${"fortio_znx_day_jan".$z} * 30;
			${"fortio_znx_feb".$z} = ${"fortio_znx_day_feb".$z} * 30;
			${"fortio_znx_mar".$z} = ${"fortio_znx_day_mar".$z} * 30;
			${"fortio_znx_apr".$z} = ${"fortio_znx_day_apr".$z} * 30;
			${"fortio_znx_may".$z} = ${"fortio_znx_day_may".$z} * 30;
			${"fortio_znx_jun".$z} = ${"fortio_znx_day_jun".$z} * 30;
			${"fortio_znx_jul".$z} = ${"fortio_znx_day_jul".$z} * 30;
			${"fortio_znx_aug".$z} = ${"fortio_znx_day_aug".$z} * 30;
			${"fortio_znx_sep".$z} = ${"fortio_znx_day_sep".$z} * 30;
			${"fortio_znx_okt".$z} = ${"fortio_znx_day_okt".$z} * 30;
			${"fortio_znx_nov".$z} = ${"fortio_znx_day_nov".$z} * 30;
			${"fortio_znx_dec".$z} = ${"fortio_znx_day_dec".$z} * 30;
			${"fortio_znx".$z} = ${"fortio_znx_jan".$z} + ${"fortio_znx_feb".$z} + ${"fortio_znx_mar".$z}
			+ ${"fortio_znx_apr".$z} + ${"fortio_znx_may".$z} + ${"fortio_znx_jun".$z}
			+ ${"fortio_znx_jul".$z} + ${"fortio_znx_aug".$z} + ${"fortio_znx_sep".$z}
			+ ${"fortio_znx_okt".$z} + ${"fortio_znx_nov".$z} + ${"fortio_znx_dec".$z};
			
			}
			
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
			
			
			for ($z=1;$z<=$arithmos_thermzwnes;$z++){
			//7η γραμμή πίνακα
			${"apolavi_jan".$z} = round($iliaki_akt_dayk4_jan*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_feb".$z} = round($iliaki_akt_dayk4_feb*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_mar".$z} = round($iliaki_akt_dayk4_mar*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_apr".$z} = round($iliaki_akt_dayk4_apr*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_may".$z} = round($iliaki_akt_dayk4_may*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_jun".$z} = round($iliaki_akt_dayk4_jun*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_jul".$z} = round($iliaki_akt_dayk4_jul*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_aug".$z} = round($iliaki_akt_dayk4_aug*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_sep".$z} = round($iliaki_akt_dayk4_sep*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_okt".$z} = round($iliaki_akt_dayk4_okt*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_nov".$z} = round($iliaki_akt_dayk4_nov*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_dec".$z} = round($iliaki_akt_dayk4_dec*${"iliakos_epifaneia".$z}*30,4);
			${"apolavi_aktinov".$z} = ${"apolavi_jan".$z} + ${"apolavi_feb".$z} + ${"apolavi_mar".$z} 
			+ ${"apolavi_apr".$z} + ${"apolavi_may".$z} + ${"apolavi_jun".$z}
			+ ${"apolavi_jul".$z} + ${"apolavi_aug".$z} + ${"apolavi_sep".$z} 
			+ ${"apolavi_okt".$z} + ${"apolavi_nov".$z} + ${"apolavi_dec".$z};
			

			//8η γραμμή πίνακα
			${"pososto_iliaka_jan".$z} = round(${"apolavi_jan".$z}/${"fortio_znx_jan".$z},4);
			${"pososto_iliaka_feb".$z} = round(${"apolavi_feb".$z}/${"fortio_znx_feb".$z},4);
			${"pososto_iliaka_mar".$z} = round(${"apolavi_mar".$z}/${"fortio_znx_mar".$z},4);
			${"pososto_iliaka_apr".$z} = round(${"apolavi_apr".$z}/${"fortio_znx_apr".$z},4);
			${"pososto_iliaka_may".$z} = round(${"apolavi_may".$z}/${"fortio_znx_may".$z},4);
			${"pososto_iliaka_jun".$z} = round(${"apolavi_jun".$z}/${"fortio_znx_jun".$z},4);
			${"pososto_iliaka_jul".$z} = round(${"apolavi_jul".$z}/${"fortio_znx_jul".$z},4);
			${"pososto_iliaka_aug".$z} = round(${"apolavi_aug".$z}/${"fortio_znx_aug".$z},4);
			${"pososto_iliaka_sep".$z} = round(${"apolavi_sep".$z}/${"fortio_znx_sep".$z},4);
			${"pososto_iliaka_okt".$z} = round(${"apolavi_okt".$z}/${"fortio_znx_okt".$z},4);
			${"pososto_iliaka_nov".$z} = round(${"apolavi_nov".$z}/${"fortio_znx_nov".$z},4);
			${"pososto_iliaka_dec".$z} = round(${"apolavi_dec".$z}/${"fortio_znx_dec".$z},4);
			${"pososto_iliaka".$z} = round(${"apolavi_aktinov".$z}/ ${"fortio_znx".$z},4);
			
			//Γραμμη 9
			${"pososto_petr_jan".$z} = 1-${"pososto_iliaka_jan".$z};
			${"pososto_petr_feb".$z} = 1-${"pososto_iliaka_feb".$z};
			${"pososto_petr_mar".$z} = 1-${"pososto_iliaka_mar".$z};
			${"pososto_petr_apr".$z} = 1-${"pososto_iliaka_apr".$z};
			${"pososto_petr_may".$z} = 1-${"pososto_iliaka_may".$z};
			${"pososto_petr_jun".$z} = 1-${"pososto_iliaka_jun".$z};
			${"pososto_petr_jul".$z} = 1-${"pososto_iliaka_jul".$z};
			${"pososto_petr_aug".$z} = 1-${"pososto_iliaka_aug".$z};
			${"pososto_petr_sep".$z} = 1-${"pososto_iliaka_sep".$z};
			${"pososto_petr_okt".$z} = 1-${"pososto_iliaka_okt".$z};
			${"pososto_petr_nov".$z} = 1-${"pososto_iliaka_nov".$z};
			${"pososto_petr_dec".$z} = 1-${"pososto_iliaka_dec".$z};
			${"pososto_petr".$z} = 1 -${"pososto_iliaka".$z};
			
			
			//Έλεγχος διείσδυσης αέρα από κουφώματα
			${"array_dieisdysi_aera".$z} = get_times("xrisi,nwpos_aeras_m2", "energy_conditions", ${"drop_xrisi".$z});
			${"syntelestis_dieisdysi_aera".$z} = ${"array_dieisdysi_aera".$z}[0][1];
			$syntelestis_dieisdysi_aera_text .= " " . ${"syntelestis_dieisdysi_aera".$z} . " (ζώνη " . $z . ")";
			if ($check_thermzwnes[$z] == 1){
			${"apaitoymeni_dieisdysi_aera".$z} = ${"syntelestis_dieisdysi_aera".$z} * ${"synoliko_embadon".$z};
			}
			else{
			${"apaitoymeni_dieisdysi_aera".$z} = 1 * ${"synoliko_embadon".$z};
			}
			${"dieisdysi_aera".$z} = ${"dieisdysi_zwnis".$z};
			
			
			${"array_leitoyrgias".$z} = get_times("*", "energy_conditions", ${"drop_xrisi".$z});
			}
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


//------------------------------------ΣΥΣΤΗΜΑΤΑ-------------------------------------------
//Μονάδες παραγωγής θέρμανσης
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_thermp WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"thermp_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"thermp_id".$z.$i} = $objResult["id"];
	${"thermp_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"thermp_type".$z.$i} = $objResult["type"];
	${"thermp_pigienergy".$z.$i} = $objResult["pigienergy"];
	${"thermp_isxys".$z.$i} = $objResult["isxys"];
	${"thermp_bathm".$z.$i} = $objResult["bathm"];
	${"thermp_cop".$z.$i} = $objResult["cop"];
	${"thermp_jan".$z.$i} = $objResult["jan"];
	${"thermp_feb".$z.$i} = $objResult["feb"];
	${"thermp_mar".$z.$i} = $objResult["mar"];
	${"thermp_apr".$z.$i} = $objResult["apr"];
	${"thermp_may".$z.$i} = $objResult["may"];
	${"thermp_jun".$z.$i} = $objResult["jun"];
	${"thermp_jul".$z.$i} = $objResult["jul"];
	${"thermp_aug".$z.$i} = $objResult["aug"];
	${"thermp_sep".$z.$i} = $objResult["sep"];
	${"thermp_okt".$z.$i} = $objResult["okt"];
	${"thermp_nov".$z.$i} = $objResult["nov"];
	${"thermp_decem".$z.$i} = $objResult["decem"];
	
	${"thermp_isxys".$z} += ${"thermp_isxys".$z.$i};
	
		if (${"thermp_type".$z.$i} == 0){$thermp_type="Λέβητας";}
		if (${"thermp_type".$z.$i} == 1){$thermp_type="Κεντρική υδρόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 2){$thermp_type="Κεντρική αερόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 3){$thermp_type="Τοπική αερόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 4){$thermp_type="Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη";}
		if (${"thermp_type".$z.$i} == 5){$thermp_type="Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη";}
		if (${"thermp_type".$z.$i} == 6){$thermp_type="Κεντρική άλλου τύπου Α.Θ.";}
		if (${"thermp_type".$z.$i} == 7){$thermp_type="Τοπικές ηλεκτρικές μονάδες";}
		if (${"thermp_type".$z.$i} == 8){$thermp_type="Τοπικές μονάδες αερίου";}
		if (${"thermp_type".$z.$i} == 9){$thermp_type="Ανοικτές εστίες καύσης";}
		if (${"thermp_type".$z.$i} == 10){$thermp_type="Τηλεθέρμανση";}
		if (${"thermp_type".$z.$i} == 11){$thermp_type="ΣΗΘ";}
		if (${"thermp_type".$z.$i} == 12){$thermp_type="Μονάδα παραγωγής άλλου τύπου";}
		
		if (${"thermp_pigienergy".$z.$i} == 0){$thermp_pigi="Υγραέριο (LPG)";}
		if (${"thermp_pigienergy".$z.$i} == 1){$thermp_pigi="Φυσικό αέριο";}
		if (${"thermp_pigienergy".$z.$i} == 2){$thermp_pigi="Ηλεκτρισμός";}
		if (${"thermp_pigienergy".$z.$i} == 3){$thermp_pigi="Πετρέλαιο θέρμανσης";}
		if (${"thermp_pigienergy".$z.$i} == 4){$thermp_pigi="Πετρέλαιο κίνησης";}
		if (${"thermp_pigienergy".$z.$i} == 5){$thermp_pigi="Τηλεθέρμανση";}
		if (${"thermp_pigienergy".$z.$i} == 6){$thermp_pigi="Βιομάζα";}
		
	$thermp_type_text .= " " . $thermp_type . " (ζώνη " . $z . ")";	
	$thermp_pigienergy_text .= " " . $thermp_pigi . " (ζώνη " . $z . ")";
	}

}	

//Μονάδες παραγωγής ψύξης
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_coldp WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"coldp_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"coldp_id".$z.$i} = $objResult["id"];
	${"coldp_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"coldp_type".$z.$i} = $objResult["type"];
	${"coldp_pigienergy".$z.$i} = $objResult["pigienergy"];
	${"coldp_isxys".$z.$i} = $objResult["isxys"];
	${"coldp_bathm".$z.$i} = $objResult["bathm"];
	${"coldp_eer".$z.$i} = $objResult["eer"];
	${"coldp_jan".$z.$i} = $objResult["jan"];
	${"coldp_feb".$z.$i} = $objResult["feb"];
	${"coldp_mar".$z.$i} = $objResult["mar"];
	${"coldp_apr".$z.$i} = $objResult["apr"];
	${"coldp_may".$z.$i} = $objResult["may"];
	${"coldp_jun".$z.$i} = $objResult["jun"];
	${"coldp_jul".$z.$i} = $objResult["jul"];
	${"coldp_aug".$z.$i} = $objResult["aug"];
	${"coldp_sep".$z.$i} = $objResult["sep"];
	${"coldp_okt".$z.$i} = $objResult["okt"];
	${"coldp_nov".$z.$i} = $objResult["nov"];
	${"coldp_decem".$z.$i} = $objResult["decem"];
	
	${"coldp_isxys".$z} += ${"coldp_isxys".$z.$i};
	
		if (${"coldp_type".$z.$i} == 0){$coldp_type="Αερόψυκτος ψύκτης";}
		if (${"coldp_type".$z.$i} == 1){$coldp_type="Υδρόψυκτος ψύκτης";}
		if (${"coldp_type".$z.$i} == 2){$coldp_type="Υδρόψυκτη Α.Θ.";}
		if (${"coldp_type".$z.$i} == 3){$coldp_type="Αερόψυκτη Α.Θ.";}
		if (${"coldp_type".$z.$i} == 4){$coldp_type="Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη";}
		if (${"coldp_type".$z.$i} == 5){$coldp_type="Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη";}
		if (${"coldp_type".$z.$i} == 6){$coldp_type="Προσρόφησης απορρόφησης Α.Θ.";}
		if (${"coldp_type".$z.$i} == 7){$coldp_type="Κεντρική άλλου τύπου Α.Θ.";}
		if (${"coldp_type".$z.$i} == 8){$coldp_type="Μονάδα παραγωγής άλλου τύπου";}
		
		if (${"coldp_pigienergy".$z.$i} == 0){$coldp_pigi="Υγραέριο (LPG)";}
		if (${"coldp_pigienergy".$z.$i} == 1){$coldp_pigi="Φυσικό αέριο";}
		if (${"coldp_pigienergy".$z.$i} == 2){$coldp_pigi="Ηλεκτρισμός";}
		if (${"coldp_pigienergy".$z.$i} == 3){$coldp_pigi="Πετρέλαιο θέρμανσης";}
		if (${"coldp_pigienergy".$z.$i} == 4){$coldp_pigi="Πετρέλαιο κίνησης";}
		if (${"coldp_pigienergy".$z.$i} == 5){$coldp_pigi="Τηλεθέρμανση";}
		if (${"coldp_pigienergy".$z.$i} == 6){$coldp_pigi="Βιομάζα";}
		
	$coldp_eer_text .= " " . ${"coldp_eer".$z.$i} . " (ζώνη " . $z . ")";
	$coldp_type_text .= " " . $coldp_type . " (ζώνη " . $z . ")";	
	$coldp_pigienergy_text .= " " . $coldp_pigi . " (ζώνη " . $z . ")";
	}

}



//Μονάδες παραγωγής ZNX
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_znxp WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"znxp_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"znxp_id".$z.$i} = $objResult["id"];
	${"znxp_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"znxp_type".$z.$i} = $objResult["type"];
	${"znxp_pigienergy".$z.$i} = $objResult["pigienergy"];
	${"znxp_isxys".$z.$i} = $objResult["isxys"];
	${"znxp_bathm".$z.$i} = $objResult["bathm"];
	${"znxp_jan".$z.$i} = $objResult["jan"];
	${"znxp_feb".$z.$i} = $objResult["feb"];
	${"znxp_mar".$z.$i} = $objResult["mar"];
	${"znxp_apr".$z.$i} = $objResult["apr"];
	${"znxp_may".$z.$i} = $objResult["may"];
	${"znxp_jun".$z.$i} = $objResult["jun"];
	${"znxp_jul".$z.$i} = $objResult["jul"];
	${"znxp_aug".$z.$i} = $objResult["aug"];
	${"znxp_sep".$z.$i} = $objResult["sep"];
	${"znxp_okt".$z.$i} = $objResult["okt"];
	${"znxp_nov".$z.$i} = $objResult["nov"];
	${"znxp_decem".$z.$i} = $objResult["decem"];
	
	${"znxp_isxys".$z} += ${"znxp_isxys".$z.$i};
	
		if (${"znxp_type".$z.$i} == 0){$znxp_type="Λέβητας";}
		if (${"znxp_type".$z.$i} == 1){$znxp_type="Τηλεθέρμανση";}
		if (${"znxp_type".$z.$i} == 2){$znxp_type="ΣΗΘ";}
		if (${"znxp_type".$z.$i} == 3){$znxp_type="Αντλία θερμότητας (Α.Θ.)";}
		if (${"znxp_type".$z.$i} == 4){$znxp_type="Τοπικός ηλεκτρικός θερμαντήρας";}
		if (${"znxp_type".$z.$i} == 5){$znxp_type="Τοπική μονάδα φυσικού αερίου";}
		if (${"znxp_type".$z.$i} == 6){$znxp_type="Μονάδα παραγωγής (κεντρική) άλλου τύπου";}
		if (${"znxp_pigienergy".$z.$i} == 0){$znxp_pigi="Υγραέριο (LPG)";}
		if (${"znxp_pigienergy".$z.$i} == 1){$znxp_pigi="Φυσικό αέριο";}
		if (${"znxp_pigienergy".$z.$i} == 2){$znxp_pigi="Ηλεκτρισμός";}
		if (${"znxp_pigienergy".$z.$i} == 3){$znxp_pigi="Πετρέλαιο θέρμανσης";}
		if (${"znxp_pigienergy".$z.$i} == 4){$znxp_pigi="Πετρέλαιο κίνησης";}
		if (${"znxp_pigienergy".$z.$i} == 5){$znxp_pigi="Τηλεθέρμανση";}
		if (${"znxp_pigienergy".$z.$i} == 6){$znxp_pigi="Βιομάζα";}
		
	$znxp_type_text .= " " . $znxp_type . " (ζώνη " . $z . ")";	
	$znxp_pigienergy_text .= " " . $znxp_pigi . " (ζώνη " . $z . ")";
	}

}

	

//Μονάδες διανομής θέρμανσης
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_thermd WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"thermd_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"thermd_id".$z.$i} = $objResult["id"];
	${"thermd_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"thermd_type".$z.$i} = $objResult["type"];
	${"thermd_isxys".$z.$i} = $objResult["isxys"];
	${"thermd_xwros".$z.$i} = $objResult["xwros"];
	${"thermd_bathm".$z.$i} = $objResult["bathm"];		
	${"thermd_monwsi".$z.$i} = $objResult["monwsi"];	
	}
}

//Μονάδες διανομής ψύξης
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_coldd WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"coldd_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"coldd_id".$z.$i} = $objResult["id"];
	${"coldd_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"coldd_type".$z.$i} = $objResult["type"];
	${"coldd_isxys".$z.$i} = $objResult["isxys"];
	${"coldd_xwros".$z.$i} = $objResult["xwros"];
	${"coldd_bathm".$z.$i} = $objResult["bathm"];		
	${"coldd_monwsi".$z.$i} = $objResult["monwsi"];	
	}
}

//Μονάδες διανομής ΖΝΧ
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_znxd WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"znxd_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"znxd_id".$z.$i} = $objResult["id"];
	${"znxd_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"znxd_type".$z.$i} = $objResult["type"];
	${"znxd_anakykloforia".$z.$i} = $objResult["anakykloforia"];
	${"znxd_xwros".$z.$i} = $objResult["xwros"];
	${"znxd_bathm".$z.$i} = $objResult["bathm"];			
	}
}



//Μονάδες τερματικές θέρμανσης
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_thermt WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"thermt_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"thermt_id".$z.$i} = $objResult["id"];
	${"thermt_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"thermt_type".$z.$i} = $objResult["type"];
	${"thermt_bathm".$z.$i} = $objResult["bathm"];	

	$thermt_type_text .= " " . ${"thermt_type".$z.$i} . " (ζώνη " . $z . ")";
	}
}

//Μονάδες τερματικές ψύξης
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_coldt WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"coldt_rows".$z} = mysql_num_rows($objQuery);

	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"coldt_id".$z.$i} = $objResult["id"];
	${"coldt_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"coldt_type".$z.$i} = $objResult["type"];
	${"coldt_bathm".$z.$i} = $objResult["bathm"];	
	
	$coldt_type_text .= " " . ${"coldt_type".$z.$i} . " (ζώνη " . $z . ")";
	}
}

//Μονάδες αποθηκευτικές ΖΝΧ
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_znxa WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"znxa_rows".$z} = mysql_num_rows($objQuery);

	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"znxa_id".$z.$i} = $objResult["id"];
	${"znxa_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"znxa_type".$z.$i} = $objResult["type"];
	${"znxa_bathm".$z.$i} = $objResult["bathm"];

	$znxa_type_text .= " " . ${"znxa_type".$z.$i} . " (ζώνη " . $z . ")";	
	}
}


//Μονάδες βοηθητικές θέρμανσης
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_thermb WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"thermb_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"thermb_id".$z.$i} = $objResult["id"];
	${"thermb_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"thermb_type".$z.$i} = $objResult["type"];
	${"thermb_number".$z.$i} = $objResult["number"];
	${"thermb_isxys".$z.$i} = $objResult["isxys"];			
	}
}

//Μονάδες βοηθητικές ψύξης
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_coldb WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"coldb_rows".$z} = mysql_num_rows($objQuery);
	
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"coldb_id".$z.$i} = $objResult["id"];
	${"coldb_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"coldb_type".$z.$i} = $objResult["type"];
	${"coldb_number".$z.$i} = $objResult["number"];
	${"coldb_isxys".$z.$i} = $objResult["isxys"];			
	}
}

//Ηλιακός
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$strSQL = "SELECT * FROM kataskeyi_xsystems_znxiliakos WHERE id_zwnis=$id_thermzwnes[$z]";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
${"znxiliakos_rows".$z} = mysql_num_rows($objQuery);

	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
	$i++;
	${"znxiliakos_id".$z.$i} = $objResult["id"];
	${"znxiliakos_id_zwnis".$z.$i} = $objResult["id_zwnis"];
	${"znxiliakos_type".$z.$i} = $objResult["type"];
	${"znxiliakos_thermansi".$z.$i} = $objResult["thermansi"];	
	${"znxiliakos_znx".$z.$i} = $objResult["znx"];
	${"znxiliakos_syna".$z.$i} = $objResult["syna"];	
	${"znxiliakos_synb".$z.$i} = $objResult["synb"];	
	${"znxiliakos_epifaneia".$z.$i} = $objResult["epifaneia"];	
	${"znxiliakos_gdeg".$z.$i} = $objResult["gdeg"];	
	${"znxiliakos_bdeg".$z.$i} = $objResult["bdeg"];
	${"znxiliakos_fs".$z.$i} = $objResult["fs"];
	}
}


	
//Τιμές θέρμανσης και ψύξης για το κείμενο στο τεύχος ----Κεφ 5
for ($z=1;$z<=$arithmos_thermzwnes;$z++){

//Τιμές σε KW από την ισχύ όλων των μονάδων παραγωγής για τη ζώνη $z
${"thermansi_value_kw".$z} = ${"thermp_isxys".$z};
${"klimatismos_value_kw".$z} = ${"coldp_isxys".$z};

//Τιμές σε Kcal, btu
${"thermansi_value".$z} = ${"thermp_isxys".$z} / 1.163 * 1000 ;
${"klimatismos_value".$z} = ${"coldp_isxys".$z} / 0.000293;

//Τιμές σε Kw Προσαυξημένες κατά 30% για τη ζώνη $z
${"thermansi_value_kw13".$z} = ${"thermansi_value_kw".$z} * 1.3;
${"klimatismos_value_kw13".$z} = ${"klimatismos_value_kw".$z} * 1.3;

//Τιμές σε Kcal,btu Προσαυξημένες κατά 30% για τη ζώνη $z
${"thermansi_value13".$z} = ${"thermansi_value".$z} * 1.3;
${"klimatismos_value13".$z} = ${"klimatismos_value".$z} * 1.3;
}


//Εάν χρησιμοποιηθεί το μενού της μελέτης οι τιμές έρχονται από τον πίνακα kataskeyi_hm αλλά δεν έχουν αρίθμηση
//Πρέπει να αλλάξουν και στο print_teyxos_read_anazwni.php εαν χρησιμοποιηθεί το παρακάτω.
/*
$array_hm = get_times_all("*", "kataskeyi_hm");
$thermansi_value = $array_hm[0]["value"];
$klimatismos_value = $array_hm[1]["value"];
$thermansi_value_kw = $thermansi_value*1.163/1000;
$thermansi_value_kw13 = $thermansi_value_kw*1.3;
$thermansi_value13 = $thermansi_value*1.3;
$klimatismos_value_kw = $klimatismos_value*0.000293;

$Vstore = $vd_iliakoy/5;
$eklogi_thermantira = round(($Vstore + 50),-1);
$Pn_levita = $fortio_znx_day_feb/5;
$Pn_levita1 = $Pn_levita*1.3;
$Pn_levita2 = $Pn_levita*1.3*860.1179;
*/

if ($zwni=="a")$zwni="A";
if ($zwni=="b")$zwni="B";
if ($zwni=="g")$zwni="Γ";
if ($zwni=="d")$zwni="Δ";

//Γραμμή 1112 στο print_teyxos_read_anazwni.php
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
${"pososto_iliaka_100".$z} = ${"pososto_iliaka".$z}*100;
${"Vstore".$z} = ${"vd_iliakoy".$z}/5;
${"eklogi_thermantira".$z} = round((${"Vstore".$z} + 50),-1);
if (${"eklogi_thermantira".$z}<150){
${"eklogi_thermantira".$z} =150;
}

${"Pn_levita".$z} = ${"fortio_znx_day_feb".$z}/5;
${"Pn_levita1".$z} = ${"Pn_levita".$z}*1.3;
${"Pn_levita2".$z} = ${"Pn_levita".$z}*1.3*860.1179;

${"apolavi_aktinov1".$z} = ${"apolavi_aktinov".$z}*1.099;
${"apolavi_aktinov2".$z} = ${"apolavi_aktinov".$z}*2.9;

${"znx_pos_synol".$z} = ((${"fortio_znx_day_feb".$z}/5)*1.3)*${"pososto_petr".$z};
${"znx_pos_kat".$z} = ${"znx_pos_synol".$z}/$thermansi_value_kw13;
}

//Το παρακάτω προσθέτει όλες τις τιμές που βρίσκει για τη θέρμανση ψύξη σε μικρά κείμενα
//για χρήση στο τεύχος
 
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if ($check_thermzwnes[$z] == 1){
$vd_iliakoy_text .= " " . number_format(${"vd_iliakoy".$z},2,".",",") . " (ζώνη " . $z . ")";
$Vstore_text .= " " . number_format(${"Vstore".$z},2,".",",") . " (ζώνη " . $z . ")";
$eklogi_thermantira_text .= " " . number_format(${"eklogi_thermantira".$z},2,".",",") . " (ζώνη " . $z . ")";
$Pn_levita_text .= " " . number_format(${"Pn_levita".$z},2,".",",") . " (ζώνη " . $z . ")";
$Pn_levita1_text .= " " . number_format(${"Pn_levita1".$z},2,".",",") . " (ζώνη " . $z . ")";
$Pn_levita2_text .= " " . number_format(${"Pn_levita2".$z},2,".",",") . " (ζώνη " . $z . ")";
$apolavi_aktinov_text .= " " . number_format(${"apolavi_aktinov".$z},2,".",",") . " (ζώνη " . $z . ")";
$apolavi_aktinov1_text .= " " . number_format(${"apolavi_aktinov1".$z},2,".",",") . " (ζώνη " . $z . ")";
$apolavi_aktinov2_text .= " " . number_format(${"apolavi_aktinov2".$z},2,".",",") . " (ζώνη " . $z . ")";
$znx_pos_synol_text .= " " . number_format(${"znx_pos_synol".$z},2,".",",") . " (ζώνη " . $z . ")";
$znx_pos_kat_text .= " " . number_format(${"znx_pos_kat".$z},2,".",",") . " (ζώνη " . $z . ")";

$thermansi_value_kw_text .= " " . number_format(${"thermansi_value_kw".$z},2,".",",") . " (ζώνη " . $z . ")";
$klimatismos_value_kw_text .= " " . number_format(${"klimatismos_value_kw".$z},2,".",",") . " (ζώνη " . $z . ")";
$thermansi_value_text .= " " . number_format(${"thermansi_value".$z},2,".",",") . " (ζώνη " . $z . ")";
$klimatismos_value_text .= " " . number_format(${"klimatismos_value".$z},2,".",",") . " (ζώνη " . $z . ")";
$thermansi_value_kw13_text .= " " . number_format(${"thermansi_value_kw13".$z},2,".",",") . " (ζώνη " . $z . ")";
$klimatismos_value_kw13_text .= " " . number_format(${"klimatismos_value_kw13".$z},2,".",",") . " (ζώνη " . $z . ")";
$thermansi_value13_text .= " " . number_format(${"thermansi_value13".$z},2,".",",") . " (ζώνη " . $z . ")";
$klimatismos_value13_text .= " " . number_format(${"klimatismos_value13".$z},2,".",",") . " (ζώνη " . $z . ")";
$pososto_iliaka_text .= " " . number_format(${"pososto_iliaka".$z}*100,2,".",",") . " (ζώνη " . $z . ")";

}
}


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