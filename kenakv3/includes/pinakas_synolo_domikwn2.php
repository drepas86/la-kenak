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
			echo "<br/><font color=\"blue\"> Σύνολα δομικών στοιχείων </font>";
			//Σύνολα επιφανειών
			echo "<table border=\1\"><tr><td>Όνομα τοίχου</td><td>Επιφάνεια δοκών</td><td>Επιφάνεια υποστηλωμάτων</td><td>Επιφάνεια συρομένων</td><td>Διαφανή ανοίγματα</td><td>Αδιαφανή ανοίγματα</td>
			<td>Επιφάνεια δρομικού</td><td>Θερμογέφυρες δομικές</td><td>Θερμογέφυρες ανοιγμάτων</td><td>Διείσδυση αέρα</td></tr>";
			//ΒΟΡΕΙΑ
			for ($i = 1; $i <= $t_boreia; $i++) {
			$t = "b";
			$an = "an_b_";
			$onoma = ${"name_".$t.$i};
			echo "<tr><td>" . $onoma . "</td>";
			echo "<td>" . ${"epifaneia_dokos_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_ypost_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_toixoy_syr_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_anoigmatwn_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_masif_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_dromikoy_".$t.$i} . "</td>";
			echo " <td>" . ${"thermogefyres_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"thermogefyres_anoig_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"dieisdysi_toixoy_".$t.$i} . "</td></tr>";
			}
			echo "<tr><td>Σύνολο Βόρεια</td><td>" . ${"epifaneia_dokos_".$t};
			echo "</td><td>" . ${"epifaneia_ypost_".$t};
			echo "</td><td>" . ${"epifaneia_toixoy_syr_".$t};
			echo "</td><td>" . ${"epifaneia_anoigmatwn_toixoy_".$t};
			echo "</td><td>" . ${"epifaneia_masif_toixoy_".$t};
			echo "</td><td>" . ${"epifaneia_dromikoy_".$t};
			echo "</td><td>" . ${"thermogefyres_toixoy_".$t};
			echo "</td><td>" . ${"thermogefyres_anoig_".$t};
			echo "</td><td>" . ${"dieisdysi_".$t} . "</td></tr>";
			//ΑΝΑΤΟΛΙΚΑ
			for ($i = 1; $i <= $t_anatolika; $i++) {
			$t = "a";
			$an = "an_a_";
			$onoma = ${"name_".$t.$i};
			echo "<tr><td>" . $onoma . "</td>";
			echo "<td>" . ${"epifaneia_dokos_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_ypost_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_toixoy_syr_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_anoigmatwn_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_masif_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_dromikoy_".$t.$i} . "</td>";
			echo " <td>" . ${"thermogefyres_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"thermogefyres_anoig_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"dieisdysi_toixoy_".$t.$i} . "</td></tr>";
			}
			echo "<tr><td>Σύνολο Ανατολικά</td><td>" . ${"epifaneia_dokos_".$t};
			echo "</td><td>" . ${"epifaneia_ypost_".$t};
			echo "</td><td>" . ${"epifaneia_toixoy_syr_".$t};
			echo "</td><td>" . ${"epifaneia_anoigmatwn_toixoy_".$t};
			echo "</td><td>" . ${"epifaneia_masif_toixoy_".$t};
			echo "</td><td>" . ${"epifaneia_dromikoy_".$t};
			echo "</td><td>" . ${"thermogefyres_toixoy_".$t};
			echo "</td><td>" . ${"thermogefyres_anoig_".$t};
			echo "</td><td>" . ${"dieisdysi_".$t} . "</td></tr>";
			
			//NOTIA
			for ($i = 1; $i <= $t_notia; $i++) {
			$t = "n";
			$an = "an_n_";
			$onoma = ${"name_".$t.$i};
			echo "<tr><td>" . $onoma . "</td>";
			echo "<td>" . ${"epifaneia_dokos_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_ypost_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_toixoy_syr_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_anoigmatwn_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_masif_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_dromikoy_".$t.$i} . "</td>";
			echo " <td>" . ${"thermogefyres_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"thermogefyres_anoig_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"dieisdysi_toixoy_".$t.$i} . "</td></tr>";
			}
			echo "<tr><td>Σύνολο Νότια</td><td>" . ${"epifaneia_dokos_".$t};
			echo "</td><td>" . ${"epifaneia_ypost_".$t};
			echo "</td><td>" . ${"epifaneia_toixoy_syr_".$t};
			echo "</td><td>" . ${"epifaneia_anoigmatwn_toixoy_".$t};
			echo "</td><td>" . ${"epifaneia_masif_toixoy_".$t};
			echo "</td><td>" . ${"epifaneia_dromikoy_".$t};
			echo "</td><td>" . ${"thermogefyres_toixoy_".$t};
			echo "</td><td>" . ${"thermogefyres_anoig_".$t};
			echo "</td><td>" . ${"dieisdysi_".$t} . "</td></tr>";
			
			//ΔΥΤΙΚΑ
			for ($i = 1; $i <= $t_dytika; $i++) {
			$t = "d";
			$an = "an_d_";
			$onoma = ${"name_".$t.$i};
			echo "<tr><td>" . $onoma . "</td>";
			echo "<td>" . ${"epifaneia_dokos_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_ypost_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_toixoy_syr_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_anoigmatwn_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_masif_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"epifaneia_dromikoy_".$t.$i} . "</td>";
			echo " <td>" . ${"thermogefyres_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"thermogefyres_anoig_toixoy_".$t.$i} . "</td>";
			echo " <td>" . ${"dieisdysi_toixoy_".$t.$i} . "</td></tr>";
			}
			echo "<tr><td>Σύνολο Δυτικά</td><td>" . ${"epifaneia_dokos_".$t};
			echo "</td><td>" . ${"epifaneia_ypost_".$t};
			echo "</td><td>" . ${"epifaneia_toixoy_syr_".$t};
			echo "</td><td>" . ${"epifaneia_anoigmatwn_toixoy_".$t};
			echo "</td><td>" . ${"epifaneia_masif_toixoy_".$t};
			echo "</td><td>" . ${"epifaneia_dromikoy_".$t};
			echo "</td><td>" . ${"thermogefyres_toixoy_".$t};
			echo "</td><td>" . ${"thermogefyres_anoig_".$t};
			echo "</td><td>" . ${"dieisdysi_".$t} . "</td></tr>";
			echo "</table>";
			?>