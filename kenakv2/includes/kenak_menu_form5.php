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
		<?php	if ($sel_page["id"] == 6)	{
			echo "<h2>ΚΕΝΑΚ - Αποτελέσματα αποθηκευμένης μελέτης</h2>";
		?>	
	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/result.png\"></img>";
	  </script>
			
			<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#a">Γενικά στοιχεία</a></li>
					<li><a href="#b">Δάπεδα/Οροφές</a></li>
					<li><a href="#c">Χώροι</a></li>
					<li><a href="#d">Θερμογέφυρες</a></li>
					</ul> 
					
					
			<div id="a" class="tabdiv">
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
			
			echo "<table border=\"1\">";
			echo "<tr><td>Ζώνη</td><td>Κλιματικά δεδομένα</td><td>Γενική Χρήση</td><td>Χρήση</td><td>Νερό δικτύου</td><td>Βέλτιστη κλίση</td><td>Επιφάνεια ηλιακού</td></tr>";
			echo "<tr>";
			echo "<td>" . $zwni . "</td>";
			echo "<td>" . $climate_data . "</td>";
			echo "<td>" . $gen_xrisi . "</td>";
			echo "<td>" . $xrisi . "</td>";
			echo "<td>" . $nero_dikt . "</td>";
			echo "<td>" . $velt_klisi . " deg</td>";
			echo "<td>" . $epif_iliakoy . " m2</td>";
			echo "</tr>";
			echo "</table><br/><br/>";
			?>
			</div>
			
			<div id="b" class="tabdiv">
			<?php
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
		
			echo "<table border=\"1\">";
			echo "<tr><td>Τύπος</td><td>Εμβαδόν</td><td>U</td></tr>";
			echo "<tr><td>Δάπεδο επί εδάφους</td>";
			echo "<td>" . $dapedo_embadon1 . "</td>";
			echo "<td>" . $dapedo_u1 . "</td></tr>";
			echo "<tr><td>Δάπεδο σε μη θερμ. χώρο</td>";
			echo "<td>" . $dapedo_embadon2 . "</td>";
			echo "<td>" . $dapedo_u2 . "</td></tr>";
			echo "<tr><td>Οροφή με κεραμίδι</td>";
			echo "<td>" . $orofi_embadon1 . "</td>";
			echo "<td>" . $orofi_u1 . "</td></tr>";
			echo "<tr><td>Οροφή πλάκα</td>";
			echo "<td>" . $orofi_embadon2 . "</td>";
			echo "<td>" . $orofi_u2 . "</td></tr>";
			echo "</table><br/><br/>";
			?>
			</div>
			
			<div id="c" class="tabdiv">
			<?php
			//Χώροι κτιρίου
			$strSQL = "SELECT * FROM kataskeyi_xwroi";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$rows_xwroi = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>Όνομα χώρου</td><td>Μήκος</td><td>Πλάτος</td><td>'Υψος</td><td>Εμβαδόν</td><td>Όγκος</td></tr>";
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
			
			echo "<tr><td>" . ${"xwroi_name".$i} . "</td>";
			echo "<td>" . ${"xwroi_mikos".$i} . "</td>";
			echo "<td>" . ${"xwroi_platos".$i} . "</td>";
			echo "<td>" . ${"xwroi_ypsos".$i} . "</td>";
			echo "<td>" . ${"xwroi_emvadon".$i} . "</td>";
			echo "<td>" . ${"xwroi_ogkos".$i} . "</td></tr>";
			
			}
			echo "</table>";
			echo "<br/>Συνολικό εμβαδόν = " . $synoliko_embadon;
			echo "<br/>Συνολικός όγκος = " . $synolikos_ogkos;
			echo "<br/><br/>";
			?>
			</div>
			
			
			<div id="d" class="tabdiv">
			<?php
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
			echo "<table border=\"1\">";
			echo "<tr><td>Θερμογέφυρα δαπέδου</td></tr>";
			echo "<tr>";
			echo "<td>" . $thermo_dapedo_drop . "</td>";
			echo "</tr>";
			echo "</table>";
			
			//εξωτερικές γωνίες
			$strSQL = "SELECT * FROM kataskeyi_therm_eks";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$rows_eks_g = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>Θερμογέφυρα εξωτερικής γωνίας</td><td>Πλήθος</td><td>'Υψος</td></tr>";
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"thermo_eksw_drop".$i} = $objResult["thermo_u"];
			${"thermo_eksw_gwnia_p".$i} = $objResult["plithos"];
			${"thermo_eksw_gwnia_ypsos".$i} = $objResult["ypsos"];
			${"thermo_eksw_gwnia_ua".$i} = ${"thermo_eksw_gwnia_p".$i} * ${"thermo_eksw_gwnia_ypsos".$i} * ${"thermo_eksw_drop".$i};
			$thermo_eksw_gwnia_ua += ${"thermo_eksw_gwnia_ua".$i};
			echo "<tr><td>" . ${"thermo_eksw_drop".$i} . "</td>";
			echo "<td>" . ${"thermo_eksw_gwnia_p".$i} . "</td>";
			echo "<td>" . ${"thermo_eksw_gwnia_ypsos".$i} . "</td></tr>";
			}
			echo "</table>";
			$thermogefyres_gwnia = $thermo_esw_gwnia_ua + $thermo_eksw_gwnia_ua;
			
			//εσωτερικές γωνίες
			$strSQL = "SELECT * FROM kataskeyi_therm_es";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$rows_es_g = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>Θερμογέφυρα εσωτερικής γωνίας</td><td>Πλήθος</td><td>'Υψος</td></tr>";
			$i = 0;
			while($objResult = mysql_fetch_array($objQuery))
			{
			$i++;
			${"thermo_esw_drop".$i} = $objResult["thermo_u"];
			${"thermo_esw_gwnia_p".$i} = $objResult["plithos"];
			${"thermo_esw_gwnia_ypsos".$i} = $objResult["ypsos"];
			${"thermo_esw_gwnia_ua".$i} = ${"thermo_esw_gwnia_p".$i} * ${"thermo_esw_gwnia_ypsos".$i} * ${"thermo_esw_drop".$i};
			$thermo_esw_gwnia_ua += ${"thermo_esw_gwnia_ua".$i};
			echo "<tr><td>" . ${"thermo_esw_drop".$i} . "</td>";
			echo "<td>" . ${"thermo_esw_gwnia_p".$i} . "</td>";
			echo "<td>" . ${"thermo_esw_gwnia_ypsos".$i} . "</td></tr>";
			}
			echo "</table>";
			
			?>
			</div>
			</div><br/><br/>
			
			
			
			<?php
			//Τοιχοποιία Βόρεια
			echo "<font color=\"blue\"> Τοιχοποιία Βόρεια </font>";
			$strSQL = "SELECT * FROM kataskeyi_t_b";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$t_boreia = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Όνομα τοίχου</td><td>Μήκος τοίχου</td><td>Ύψος τοίχου</td><td>Πλάτος τοίχου</td><td>U τοίχου</td>
			<td>Ψ Οροφής</td><td>Ύψος δοκού</td><td>U δοκού</td><td>Ψ δοκού</td><td>Μήκος υποστ.</td><td>Πλήθος υποστ.</td><td>U υποστ.</td>
			<td>Ψ υποστ.</td><td>Μήκος συρομένων</td><td>Ύψος συρομένων</td><td>U συρομένων</td></tr>";
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
			
			echo "<tr><td>" . ${"id".$t.$i} . "</td>";
			echo "<td>" . ${"name".$t.$i} . "</td>";
			echo "<td>" . ${"mikos".$t.$i} . "</td>";
			echo "<td>" . ${"ypsos".$t.$i} . "</td>";
			echo "<td>" . ${"paxos".$t.$i} . "</td>";
			echo "<td>" . ${"u".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_orofis_drop".$t.$i} . "</td>";
			echo "<td>" . ${"dokos".$t.$i} . "</td>";
			echo "<td>" . ${"u_dok".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_dokoy_drop".$t.$i} . "</td>";
			echo "<td>" . ${"ypostil".$t.$i} . "</td>";
			echo "<td>" . ${"arithmos_ypost".$t.$i} . "</td>";
			echo "<td>" . ${"u_ypost".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_ypost_drop".$t.$i} . "</td>";
			echo "<td>" . ${"mikos_syr".$t.$i} . "</td>";
			echo "<td>" . ${"ypsos_syr".$t.$i} . "</td>";
			echo "<td>" . ${"u_syr".$t.$i} . "</td></tr>";
			}
			echo "</table>";


			
			
			//Τοιχοποιία Ανατολικά
			echo "<font color=\"blue\"> Τοιχοποιία Ανατολικά </font>";
			$strSQL = "SELECT * FROM kataskeyi_t_a";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$t_anatolika = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Όνομα τοίχου</td><td>Μήκος τοίχου</td><td>Ύψος τοίχου</td><td>Πλάτος τοίχου</td><td>U τοίχου</td>
			<td>Ψ Οροφής</td><td>Ύψος δοκού</td><td>U δοκού</td><td>Ψ δοκού</td><td>Μήκος υποστ.</td><td>Πλήθος υποστ.</td><td>U υποστ.</td>
			<td>Ψ υποστ.</td><td>Μήκος συρομένων</td><td>Ύψος συρομένων</td><td>U συρομένων</td></tr>";
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
			
			echo "<tr><td>" . ${"id".$t.$i} . "</td>";
			echo "<td>" . ${"name".$t.$i} . "</td>";
			echo "<td>" . ${"mikos".$t.$i} . "</td>";
			echo "<td>" . ${"ypsos".$t.$i} . "</td>";
			echo "<td>" . ${"paxos".$t.$i} . "</td>";
			echo "<td>" . ${"u".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_orofis_drop".$t.$i} . "</td>";
			echo "<td>" . ${"dokos".$t.$i} . "</td>";
			echo "<td>" . ${"u_dok".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_dokoy_drop".$t.$i} . "</td>";
			echo "<td>" . ${"ypostil".$t.$i} . "</td>";
			echo "<td>" . ${"arithmos_ypost".$t.$i} . "</td>";
			echo "<td>" . ${"u_ypost".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_ypost_drop".$t.$i} . "</td>";
			echo "<td>" . ${"mikos_syr".$t.$i} . "</td>";
			echo "<td>" . ${"ypsos_syr".$t.$i} . "</td>";
			echo "<td>" . ${"u_syr".$t.$i} . "</td></tr>";
			}
			echo "</table>";


			
			
			
			
			//Τοιχοποιία Νότια
			echo "<font color=\"blue\"> Τοιχοποιία Νότια </font>";
			$strSQL = "SELECT * FROM kataskeyi_t_n";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$t_notia = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Όνομα τοίχου</td><td>Μήκος τοίχου</td><td>Ύψος τοίχου</td><td>Πλάτος τοίχου</td><td>U τοίχου</td>
			<td>Ψ Οροφής</td><td>Ύψος δοκού</td><td>U δοκού</td><td>Ψ δοκού</td><td>Μήκος υποστ.</td><td>Πλήθος υποστ.</td><td>U υποστ.</td>
			<td>Ψ υποστ.</td><td>Μήκος συρομένων</td><td>Ύψος συρομένων</td><td>U συρομένων</td></tr>";
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
			
			echo "<tr><td>" . ${"id".$t.$i} . "</td>";
			echo "<td>" . ${"name".$t.$i} . "</td>";
			echo "<td>" . ${"mikos".$t.$i} . "</td>";
			echo "<td>" . ${"ypsos".$t.$i} . "</td>";
			echo "<td>" . ${"paxos".$t.$i} . "</td>";
			echo "<td>" . ${"u".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_orofis_drop".$t.$i} . "</td>";
			echo "<td>" . ${"dokos".$t.$i} . "</td>";
			echo "<td>" . ${"u_dok".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_dokoy_drop".$t.$i} . "</td>";
			echo "<td>" . ${"ypostil".$t.$i} . "</td>";
			echo "<td>" . ${"arithmos_ypost".$t.$i} . "</td>";
			echo "<td>" . ${"u_ypost".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_ypost_drop".$t.$i} . "</td>";
			echo "<td>" . ${"mikos_syr".$t.$i} . "</td>";
			echo "<td>" . ${"ypsos_syr".$t.$i} . "</td>";
			echo "<td>" . ${"u_syr".$t.$i} . "</td></tr>";
			}
			echo "</table>";


			
			
			
			
			//Τοιχοποιία Δυτικά
			echo "<font color=\"blue\"> Τοιχοποιία Δυτικά </font>";
			$strSQL = "SELECT * FROM kataskeyi_t_d";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$t_dytika = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Όνομα τοίχου</td><td>Μήκος τοίχου</td><td>Ύψος τοίχου</td><td>Πλάτος τοίχου</td><td>U τοίχου</td>
			<td>Ψ Οροφής</td><td>Ύψος δοκού</td><td>U δοκού</td><td>Ψ δοκού</td><td>Μήκος υποστ.</td><td>Πλήθος υποστ.</td><td>U υποστ.</td>
			<td>Ψ υποστ.</td><td>Μήκος συρομένων</td><td>Ύψος συρομένων</td><td>U συρομένων</td></tr>";
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
			
			echo "<tr><td>" . ${"id".$t.$i} . "</td>";
			echo "<td>" . ${"name".$t.$i} . "</td>";
			echo "<td>" . ${"mikos".$t.$i} . "</td>";
			echo "<td>" . ${"ypsos".$t.$i} . "</td>";
			echo "<td>" . ${"paxos".$t.$i} . "</td>";
			echo "<td>" . ${"u".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_orofis_drop".$t.$i} . "</td>";
			echo "<td>" . ${"dokos".$t.$i} . "</td>";
			echo "<td>" . ${"u_dok".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_dokoy_drop".$t.$i} . "</td>";
			echo "<td>" . ${"ypostil".$t.$i} . "</td>";
			echo "<td>" . ${"arithmos_ypost".$t.$i} . "</td>";
			echo "<td>" . ${"u_ypost".$t.$i} . "</td>";
			echo "<td>" . ${"thermo_ypost_drop".$t.$i} . "</td>";
			echo "<td>" . ${"mikos_syr".$t.$i} . "</td>";
			echo "<td>" . ${"ypsos_syr".$t.$i} . "</td>";
			echo "<td>" . ${"u_syr".$t.$i} . "</td></tr>";
			}
			echo "</table>";
			echo "<br/><br/>";
			
			
			
			
			//Ανοίγματα Β
			echo "<font color=\"blue\"> Ανοίγματα Βόρεια </font>";
			$strSQL = "SELECT * FROM kataskeyi_an_b";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$anoig_t_boreia = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id τοίχου</td><td>Όνομα ανοίγματος</td><td>Μήκος ανοίγματος</td><td>Ύψος ανοίγματος</td><td>U ανοίγματος</td>
			<td>Είδος ανοίγματος</td><td>Αερισμός ανοίγματος</td><td>Ψ Λαμπάς</td><td>Ψ Ανωκάσι/Κατωκάσι</td></tr>";
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
			
			echo "<tr><td>" . ${$an."id".$i} . "</td>";
			echo "<td>" . ${$an."id_toixoy".$i} . "</td>";
			echo "<td>" . ${$an."name".$i} . "</td>";
			echo "<td>" . ${$an."anoig_mikos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_ypsos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_u".$i} . "</td>";
			echo "<td>" . ${$an."anoig_eidos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_aerismos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_lampas".$i} . "</td>";
			echo "<td>" . ${$an."anoig_ankat".$i} . "</td></tr>";
			}
			echo "</table>";
			
			
			//Ανοίγματα Α
			echo "<font color=\"blue\"> Ανοίγματα Ανατολικά </font>";
			$strSQL = "SELECT * FROM kataskeyi_an_a";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$anoig_t_anatolika = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id τοίχου</td><td>Όνομα ανοίγματος</td><td>Μήκος ανοίγματος</td><td>Ύψος ανοίγματος</td><td>U ανοίγματος</td>
			<td>Είδος ανοίγματος</td><td>Αερισμός ανοίγματος</td><td>Ψ Λαμπάς</td><td>Ψ Ανωκάσι/Κατωκάσι</td></tr>";
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
			
			echo "<tr><td>" . ${$an."id".$i} . "</td>";
			echo "<td>" . ${$an."id_toixoy".$i} . "</td>";
			echo "<td>" . ${$an."name".$i} . "</td>";
			echo "<td>" . ${$an."anoig_mikos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_ypsos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_u".$i} . "</td>";
			echo "<td>" . ${$an."anoig_eidos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_aerismos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_lampas".$i} . "</td>";
			echo "<td>" . ${$an."anoig_ankat".$i} . "</td></tr>";
			}
			echo "</table>";
			
			
			//Ανοίγματα N
			echo "<font color=\"blue\"> Ανοίγματα Νότια </font>";
			$strSQL = "SELECT * FROM kataskeyi_an_n";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$anoig_t_notia = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id τοίχου</td><td>Όνομα ανοίγματος</td><td>Μήκος ανοίγματος</td><td>Ύψος ανοίγματος</td><td>U ανοίγματος</td>
			<td>Είδος ανοίγματος</td><td>Αερισμός ανοίγματος</td><td>Ψ Λαμπάς</td><td>Ψ Ανωκάσι/Κατωκάσι</td></tr>";
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
			
			echo "<tr><td>" . ${$an."id".$i} . "</td>";
			echo "<td>" . ${$an."id_toixoy".$i} . "</td>";
			echo "<td>" . ${$an."name".$i} . "</td>";
			echo "<td>" . ${$an."anoig_mikos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_ypsos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_u".$i} . "</td>";
			echo "<td>" . ${$an."anoig_eidos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_aerismos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_lampas".$i} . "</td>";
			echo "<td>" . ${$an."anoig_ankat".$i} . "</td></tr>";
			}
			echo "</table>";
			
			
			//Ανοίγματα Δ
			echo "<font color=\"blue\"> Ανοίγματα Δυτικά </font>";
			$strSQL = "SELECT * FROM kataskeyi_an_d";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$anoig_t_dytika = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id τοίχου</td><td>Όνομα ανοίγματος</td><td>Μήκος ανοίγματος</td><td>Ύψος ανοίγματος</td><td>U ανοίγματος</td>
			<td>Είδος ανοίγματος</td><td>Αερισμός ανοίγματος</td><td>Ψ Λαμπάς</td><td>Ψ Ανωκάσι/Κατωκάσι</td></tr>";
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
			
			echo "<tr><td>" . ${$an."id".$i} . "</td>";
			echo "<td>" . ${$an."id_toixoy".$i} . "</td>";
			echo "<td>" . ${$an."name".$i} . "</td>";
			echo "<td>" . ${$an."anoig_mikos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_ypsos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_u".$i} . "</td>";
			echo "<td>" . ${$an."anoig_eidos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_aerismos".$i} . "</td>";
			echo "<td>" . ${$an."anoig_lampas".$i} . "</td>";
			echo "<td>" . ${$an."anoig_ankat".$i} . "</td></tr>";
			}
			echo "</table>";
			echo "<br/><br/>";
			
			//ΣΚΙΑΣΕΙΣ ΤΟΙΧΩΝ (Οι μεταβλητές έχουν τη μορφή sk_t_{b ή a ή d ή n}_{ονομα στοιχείου}_i
			//Σκιάσεις τοίχων ΒΟΡΕΙΑ
			echo "<font color=\"blue\"> Σκιάσεις τοίχων - Βόρεια</font>";
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_b";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_t_b = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id τοίχου</td><td>F_hor_h</td><td>F_hor_c</td><td>F_ov_h</td><td>F_ov_c</td>
			<td>F_fin_h</td><td>F_fin_c</td></tr>";
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
			
			echo "<tr><td>" . ${$sk."id".$i} . "</td>";
			echo "<td>" . ${$sk."id_toixoy".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_c".$i} . "</td></tr>";
			}
			echo "</table>";
			//Σκιάσεις τοίχων ΑΝΑΤΟΛΙΚΑ
			echo "<font color=\"blue\"> Σκιάσεις τοίχων - Ανατολικά</font>";
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_a";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_t_a = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id τοίχου</td><td>F_hor_h</td><td>F_hor_c</td><td>F_ov_h</td><td>F_ov_c</td>
			<td>F_fin_h</td><td>F_fin_c</td></tr>";
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
			
			echo "<tr><td>" . ${$sk."id".$i} . "</td>";
			echo "<td>" . ${$sk."id_toixoy".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_c".$i} . "</td></tr>";
			}
			echo "</table>";
			//Σκιάσεις τοίχων ΝΟΤΙΑ
			echo "<font color=\"blue\"> Σκιάσεις τοίχων - Νότια</font>";
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_n";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_t_n = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id τοίχου</td><td>F_hor_h</td><td>F_hor_c</td><td>F_ov_h</td><td>F_ov_c</td>
			<td>F_fin_h</td><td>F_fin_c</td></tr>";
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
			
			echo "<tr><td>" . ${$sk."id".$i} . "</td>";
			echo "<td>" . ${$sk."id_toixoy".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_c".$i} . "</td></tr>";
			}
			echo "</table>";
			//Σκιάσεις τοίχων ΔΥΤΙΚΑ
			echo "<font color=\"blue\"> Σκιάσεις τοίχων - Δυτικά</font>";
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_t_d";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_t_d = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id τοίχου</td><td>F_hor_h</td><td>F_hor_c</td><td>F_ov_h</td><td>F_ov_c</td>
			<td>F_fin_h</td><td>F_fin_c</td></tr>";
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
			
			echo "<tr><td>" . ${$sk."id".$i} . "</td>";
			echo "<td>" . ${$sk."id_toixoy".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_c".$i} . "</td></tr>";
			}
			echo "</table>";
			echo "<br/>";
			
			
			//ΣΚΙΑΣΕΙΣ ΑΝΟΙΓΜΑΤΩΝ  (Οι μεταβλητές έχουν τη μορφή sk_an_{b ή a ή d ή n}_{ονομα στοιχείου}_i
			//Σκιάσεις ανοιγμάτων ΒΟΡΕΙΑ
			echo "<font color=\"blue\"> Σκιάσεις ανοιγμάτων - Βόρεια</font>";
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_b";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_anoig_b = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id ανοίγματος</td><td>F_hor_h</td><td>F_hor_c</td><td>F_ov_h</td><td>F_ov_c</td>
			<td>F_fin_h</td><td>F_fin_c</td></tr>";
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
			
			echo "<tr><td>" . ${$sk."id".$i} . "</td>";
			echo "<td>" . ${$sk."id_an".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_c".$i} . "</td></tr>";
			}
			echo "</table>";
			//Σκιάσεις ανοιγμάτων ΑΝΑΤΟΛΙΚΑ
			echo "<font color=\"blue\"> Σκιάσεις ανοιγμάτων - Ανατολικά</font>";
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_a";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_anoig_a = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id ανοίγματος</td><td>F_hor_h</td><td>F_hor_c</td><td>F_ov_h</td><td>F_ov_c</td>
			<td>F_fin_h</td><td>F_fin_c</td></tr>";
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
			
			echo "<tr><td>" . ${$sk."id".$i} . "</td>";
			echo "<td>" . ${$sk."id_an".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_c".$i} . "</td></tr>";
			}
			echo "</table>";
			//Σκιάσεις ανοιγμάτων ΝΟΤΙΑ
			echo "<font color=\"blue\"> Σκιάσεις ανοιγμάτων - Νότια</font>";
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_n";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_anoig_n = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id ανοίγματος</td><td>F_hor_h</td><td>F_hor_c</td><td>F_ov_h</td><td>F_ov_c</td>
			<td>F_fin_h</td><td>F_fin_c</td></tr>";
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
			
			echo "<tr><td>" . ${$sk."id".$i} . "</td>";
			echo "<td>" . ${$sk."id_an".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_c".$i} . "</td></tr>";
			}
			echo "</table>";
			//Σκιάσεις ανοιγμάτων ΔΥΤΙΚΑ
			echo "<font color=\"blue\"> Σκιάσεις ανοιγμάτων - Δυτικά</font>";
			$strSQL = "SELECT * FROM kataskeyi_skiaseis_an_d";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$skiaseis_anoig_d = mysql_num_rows($objQuery);
			echo "<table border=\"1\">";
			echo "<tr><td>id</td><td>Id ανοίγματος</td><td>F_hor_h</td><td>F_hor_c</td><td>F_ov_h</td><td>F_ov_c</td>
			<td>F_fin_h</td><td>F_fin_c</td></tr>";
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
			
			echo "<tr><td>" . ${$sk."id".$i} . "</td>";
			echo "<td>" . ${$sk."id_an".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_hor_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_ov_c".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_h".$i} . "</td>";
			echo "<td>" . ${$sk."f_fin_c".$i} . "</td></tr>";
			}
			echo "</table>";
			echo "<br/><br/>";
			
			

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
			
			
			
		//Προβολή δεδομένων του χρήστη
			
			
			//Δομικά στοιχεία
			echo "<table border=\"1\"><br/><br/><tr bgcolor=\"grey\"><th colspan=\"8\"><b>ΔΟΜΙΚΑ ΣΤΟΙΧΕΙΑ ΚΕΝΑΚ</b></th><th colspan=\"2\"><b>Τύπος/αερισμός</b></th></tr>";
			echo "<tr><td><b>Όνομα στοιχείου</b></td><td><b>Μήκος<b></td><td><b>Ύψος</b></td><td><b>Πάχος</b></td><td><b> U </b></td><td><b>  Ε  </b></td><td><b>Θερμογέφυρες</b></td><td><b>Εδρομ.</b></td></tr>";
			echo "<tr bgcolor=\"#00FFFF\"><th colspan=\"10\"><b>ΒΟΡΕΙΑ (0)</b></th></tr>";
						//ΒΟΡΕΙΑ
						for ($i = 1; $i <= $t_boreia; $i++) {
						$t = "b";
						$an = "an_b_";
						$onoma = ${"name_".$t.$i};
						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"10\"><b>" . $onoma . "</b></td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . "</td>";
						echo "<td>" . ${"mikos_".$t.$i} . "</td>";
						echo "<td>" . ${"ypsos_".$t.$i} . "</td>";
						echo "<td>" . ${"paxos_".$t.$i} . "</td>";
						echo "<td>" . ${"u_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_".$t.$i} . "</td>";
						echo "<td>" . ${"thermogefyres_toixoy_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dromikoy_".$t.$i} . "</td></tr>";
						echo "<tr><td>Δοκός " . $onoma . "</td>";
						echo "<td></td><td>" . ${"dokos_".$t.$i} . "</td><td></td>";
						echo "<td>" . ${"u_dok_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dokos_".$t.$i} . "</td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . "</td>";
						echo "<td>" . ${"ypostil_".$t.$i} . "</td><td colspan=\"2\"></td>";
						echo "<td>" . ${"u_ypost_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_ypost_".$t.$i} . "</td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . "</td>";
						echo "<td>" . ${"mikos_syr_".$t.$i} . "</td>";
						echo "<td>" . ${"ypsos_syr_".$t.$i} . "</td><td></td>";
						echo "<td>" . ${"u_syr_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_syr_".$t.$i} . "</td></tr>";
						
								for ($j = 1; $j <= $anoig_t_boreia; $j++) {
									if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
									echo "<tr><td>" . ${$an."name".$j} . "</td>";
									echo "<td>" . ${$an."anoig_mikos".$j} . "</td>";
									echo "<td>". ${$an."anoig_ypsos".$j} . "</td>";
									echo "<td></td><td>" . ${$an."anoig_u".$j} . "</td>";
										if (${$an."anoig_eidos".$j} != 1) {
										echo "<td>" . ${"epifaneia_anoigmatos_".$t.$j} . "</td>";
										}
											if (${$an."anoig_eidos".$j} == 1) {
											echo "<td>" . ${"epifaneia_masif_".$t.$j} . "</td>";
											}
									echo "<td>" . ${"thermogefyres_anoig_".$t.$j} . "</td><td></td>";
									echo "<td>" . ${$an."anoig_eidos".$j} . "</td>";
									echo "<td>" . ${"dieisdysi_".$t.$j} . "</td></tr>";
									}
								}
						
						}
						
						
						//ΑΝΑΤΟΛΙΚΑ
						echo "<tr bgcolor=\"#FFFF33\"><th colspan=\"10\"><b>ΑΝΑΤΟΛΙΚΑ (90)</b></th></tr>";
						for ($i = 1; $i <= $t_anatolika; $i++) {
						$t = "a";
						$an = "an_a_";
						$onoma = ${"name_".$t.$i};
						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"10\"><b>" . $onoma . "</b></td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . "</td>";
						echo "<td>" . ${"mikos_".$t.$i} . "</td>";
						echo "<td>" . ${"ypsos_".$t.$i} . "</td>";
						echo "<td>" . ${"paxos_".$t.$i} . "</td>";
						echo "<td>" . ${"u_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_".$t.$i} . "</td>";
						echo "<td>" . ${"thermogefyres_toixoy_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dromikoy_".$t.$i} . "</td></tr>";
						echo "<tr><td>Δοκός " . $onoma . "</td>";
						echo "<td></td><td>" . ${"dokos_".$t.$i} . "</td><td></td>";
						echo "<td>" . ${"u_dok_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dokos_".$t.$i} . "</td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . "</td>";
						echo "<td>" . ${"ypostil_".$t.$i} . "</td><td colspan=\"2\"></td>";
						echo "<td>" . ${"u_ypost_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_ypost_".$t.$i} . "</td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . "</td>";
						echo "<td>" . ${"mikos_syr_".$t.$i} . "</td>";
						echo "<td>" . ${"ypsos_syr_".$t.$i} . "</td><td></td>";
						echo "<td>" . ${"u_syr_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_syr_".$t.$i} . "</td></tr>";
						
								for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
									if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
									echo "<tr><td>" . ${$an."name".$j} . "</td>";
									echo "<td>" . ${$an."anoig_mikos".$j} . "</td>";
									echo "<td>". ${$an."anoig_ypsos".$j} . "</td>";
									echo "<td></td><td>" . ${$an."anoig_u".$j} . "</td>";
										if (${$an."anoig_eidos".$j} != 1) {
										echo "<td>" . ${"epifaneia_anoigmatos_".$t.$j} . "</td>";
										}
											else{
											echo "<td>" . ${"epifaneia_masif_".$t.$j} . "</td>";
											}
									echo "<td>" . ${"thermogefyres_anoig_".$t.$j} . "</td><td></td>";
									echo "<td>" . ${$an."anoig_eidos".$j} . "</td>";
									echo "<td>" . ${"dieisdysi_".$t.$j} . "</td></tr>";
									}
								}
						
						}
						
						
						//ΝΟΤΙΑ
						echo "<tr bgcolor=\"#009966\"><th colspan=\"10\"><b>ΝΟΤΙΑ (180)</b></th></tr>";
						for ($i = 1; $i <= $t_notia; $i++) {
						$t = "n";
						$an = "an_n_";
						$onoma = ${"name_".$t.$i};
						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"10\"><b>" . $onoma . "</b></td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . "</td>";
						echo "<td>" . ${"mikos_".$t.$i} . "</td>";
						echo "<td>" . ${"ypsos_".$t.$i} . "</td>";
						echo "<td>" . ${"paxos_".$t.$i} . "</td>";
						echo "<td>" . ${"u_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_".$t.$i} . "</td>";
						echo "<td>" . ${"thermogefyres_toixoy_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dromikoy_".$t.$i} . "</td></tr>";
						echo "<tr><td>Δοκός " . $onoma . "</td>";
						echo "<td></td><td>" . ${"dokos_".$t.$i} . "</td><td></td>";
						echo "<td>" . ${"u_dok_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dokos_".$t.$i} . "</td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . "</td>";
						echo "<td>" . ${"ypostil_".$t.$i} . "</td><td colspan=\"2\"></td>";
						echo "<td>" . ${"u_ypost_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_ypost_".$t.$i} . "</td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . "</td>";
						echo "<td>" . ${"mikos_syr_".$t.$i} . "</td>";
						echo "<td>" . ${"ypsos_syr_".$t.$i} . "</td><td></td>";
						echo "<td>" . ${"u_syr_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_syr_".$t.$i} . "</td></tr>";
						
								for ($j = 1; $j <= $anoig_t_notia; $j++) {
									if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
									echo "<tr><td>" . ${$an."name".$j} . "</td>";
									echo "<td>" . ${$an."anoig_mikos".$j} . "</td>";
									echo "<td>". ${$an."anoig_ypsos".$j} . "</td>";
									echo "<td></td><td>" . ${$an."anoig_u".$j} . "</td>";
										if (${$an."anoig_eidos".$j} != 1) {
										echo "<td>" . ${"epifaneia_anoigmatos_".$t.$j} . "</td>";
										}
											else{
											echo "<td>" . ${"epifaneia_masif_".$t.$j} . "</td>";
											}
									echo "<td>" . ${"thermogefyres_anoig_".$t.$j} . "</td><td></td>";
									echo "<td>" . ${$an."anoig_eidos".$j} . "</td>";
									echo "<td>" . ${"dieisdysi_".$t.$j} . "</td></tr>";
									}
								}
						
						}
						
						
						
						//ΔΥΤΙΚΑ
						echo "<tr bgcolor=\"#CC9933\"><th colspan=\"10\"><b>ΔΥΤΙΚΑ (270)</b></th></tr>";
						for ($i = 1; $i <= $t_dytika; $i++) {
						$t = "d";
						$an = "an_d_";
						$onoma = ${"name_".$t.$i};
						
						echo "<tr><td bgcolor=\"#00FFFF\" colspan=\"10\"><b>" . $onoma . "</b></td></tr><tr>";
						echo "<td>Σύνολο " . $onoma . "</td>";
						echo "<td>" . ${"mikos_".$t.$i} . "</td>";
						echo "<td>" . ${"ypsos_".$t.$i} . "</td>";
						echo "<td>" . ${"paxos_".$t.$i} . "</td>";
						echo "<td>" . ${"u_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_".$t.$i} . "</td>";
						echo "<td>" . ${"thermogefyres_toixoy_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dromikoy_".$t.$i} . "</td></tr>";
						echo "<tr><td>Δοκός " . $onoma . "</td>";
						echo "<td></td><td>" . ${"dokos_".$t.$i} . "</td><td></td>";
						echo "<td>" . ${"u_dok_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_dokos_".$t.$i} . "</td></tr>";
						echo "<tr><td>Υποστύλωμα " . $onoma . "</td>";
						echo "<td>" . ${"ypostil_".$t.$i} . "</td><td colspan=\"2\"></td>";
						echo "<td>" . ${"u_ypost_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_ypost_".$t.$i} . "</td></tr>";
						echo "<tr><td>Συρομένων " . $onoma . "</td>";
						echo "<td>" . ${"mikos_syr_".$t.$i} . "</td>";
						echo "<td>" . ${"ypsos_syr_".$t.$i} . "</td><td></td>";
						echo "<td>" . ${"u_syr_".$t.$i} . "</td>";
						echo "<td>" . ${"epifaneia_toixoy_syr_".$t.$i} . "</td></tr>";
						
								for ($j = 1; $j <= $anoig_t_dytika; $j++) {
									if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
									echo "<tr><td>" . ${$an."name".$j} . "</td>";
									echo "<td>" . ${$an."anoig_mikos".$j} . "</td>";
									echo "<td>". ${$an."anoig_ypsos".$j} . "</td>";
									echo "<td></td><td>" . ${$an."anoig_u".$j} . "</td>";
										if (${$an."anoig_eidos".$j} != 1) {
										echo "<td>" . ${"epifaneia_anoigmatos_".$t.$j} . "</td>";
										}
											else{
											echo "<td>" . ${"epifaneia_masif_".$t.$j} . "</td>";
											}
									echo "<td>" . ${"thermogefyres_anoig_".$t.$j} . "</td><td></td>";
									echo "<td>" . ${$an."anoig_eidos".$j} . "</td>";
									echo "<td>" . ${"dieisdysi_".$t.$j} . "</td></tr>";
									}
								}
						
						}
						
			echo "</table>";
			
			//Προβολή όψεων.Συμβαδίζει αυτός ο αριθμός με το σχέδιο. Αν όχι λάθος στην είσοδο των δεδομένων για τους τοίχους
			echo "<br/><font color=\"blue\"> Διαστάσεις κατασκευής </font>";
			echo "<br/>Συνολικό μήκος Βόρειων τοίχων:" . $mikos_toixoy_b . " m";
			echo "<br/>Συνολικό μήκος Ανατολικών τοίχων:" . $mikos_toixoy_a . " m";
			echo "<br/>Συνολικό μήκος Νότιων τοίχων:" . $mikos_toixoy_n . " m";
			echo "<br/>Συνολικό μήκος Δυτικών τοίχων:" . $mikos_toixoy_d . " m";
			echo "<br/>Περίμετρος δαπέδου:" . $perimetros . " m";
			echo "<br/>Όγκος ορόφου:" . $synolikos_ogkos . " m3<br/><br/>";
			
			//τράβα από το αρχείο τον πίνακα με τα σύνολα των επιφανειών
			include_once("includes/pinakas_synolo_domikwn2.php");
			
			
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
			


			$drop_xrisi = $xrisi_id;
			$drop_nero_diktyoy = $nero_dikt_id;
			$drop_velt_klisi = $velt_klisi_id;

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
			
			
			include_once("apotelesmata/kenak_excel2.php");
			include_once("apotelesmata/kenak_word2.php");
		
		
		
		
			} ?>