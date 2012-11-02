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
			echo "<table border=\1\"><tr><td>Όνομα τοίχου</td><td>Επιφάνεια δοκών</td><td>Επιφάνεια υποστηλωμάτων</td><td>Επιφάνεια συρομένων</td><td>Διαφανή ανοίγματα</td><td>Αδιαφανή ανοίγματα</td><td>Επιφάνεια δρομικού</td><td>Θερμογέφυρες δομικές</td><td>Θερμογέφυρες ανοιγμάτων</td></tr>";
			//ΒΟΡΕΙΑ
			for ($i = 1; $i <= $t_boreia; $i++) {
			echo "<tr><td>T-B" . $i . "</td>";
			echo "<td>" . ${"epifaneia_dokos_b".$i} . "</td>";
			echo " <td>" . ${"epifaneia_ypost_b".$i} . "</td>";
			echo " <td>" . ${"epifaneia_toixoy_syr_b".$i} . "</td>";
			echo " <td>" . ${"epifaneia_anoigmatwn_toixoy_b".$i} . "</td>";
			echo " <td>" . ${"epifaneia_masif_toixoy_b".$i} . "</td>";
			echo " <td>" . ${"epifaneia_dromikoy_b".$i} . "</td>";
			echo " <td>" . ${"thermogefyres_toixoy_b".$i} . "</td>";
			echo " <td>" . ${"thermogefyres_anoig_b".$i} . "</td></tr>";
			}
			echo "<tr><td>Σύνολο T-B</td><td>" . $epifaneia_dokos_b;
			echo "</td><td>" . $epifaneia_ypost_b;
			echo "</td><td>" . $epifaneia_toixoy_syr_b;
			echo "</td><td>" . $epifaneia_anoigmatwn_toixoy_b;
			echo "</td><td>" . $epifaneia_masif_toixoy_b;
			echo "</td><td>" . $epifaneia_dromikoy_b;
			echo "</td><td>" . $thermogefyres_toixoy_b;
			echo "</td><td>" . $thermogefyres_anoig_b . "</td></tr>";
			//ΑΝΑΤΟΛΙΚΑ
			for ($i = 1; $i <= $t_anatolika; $i++) {
			echo "<tr><td>T-A" . $i . "</td>";
			echo "<td>" . ${"epifaneia_dokos_a".$i} . "</td>";
			echo " <td>" . ${"epifaneia_ypost_a".$i} . "</td>";
			echo " <td>" . ${"epifaneia_toixoy_syr_a".$i} . "</td>";
			echo " <td>" . ${"epifaneia_anoigmatwn_toixoy_a".$i} . "</td>";
			echo " <td>" . ${"epifaneia_masif_toixoy_a".$i} . "</td>";
			echo " <td>" . ${"epifaneia_dromikoy_a".$i} . "</td>";
			echo " <td>" . ${"thermogefyres_toixoy_a".$i} . "</td>";
			echo " <td>" . ${"thermogefyres_anoig_a".$i} . "</td></tr>";
			}
			echo "<tr><td>Σύνολο T-A</td><td>" . $epifaneia_dokos_a;
			echo "</td><td>" . $epifaneia_ypost_a;
			echo "</td><td>" . $epifaneia_toixoy_syr_a;
			echo "</td><td>" . $epifaneia_anoigmatwn_toixoy_a;
			echo "</td><td>" . $epifaneia_masif_toixoy_a;
			echo "</td><td>" . $epifaneia_dromikoy_a;
			echo "</td><td>" . $thermogefyres_toixoy_a;
			echo "</td><td>" . $thermogefyres_anoig_a . "</td></tr>";
			
			//NOTIA
			for ($i = 1; $i <= $t_notia; $i++) {
			echo "<tr><td>T-N" . $i . "</td>";
			echo "<td>" . ${"epifaneia_dokos_n".$i} . "</td>";
			echo " <td>" . ${"epifaneia_ypost_n".$i} . "</td>";
			echo " <td>" . ${"epifaneia_toixoy_syr_n".$i} . "</td>";
			echo " <td>" . ${"epifaneia_anoigmatwn_toixoy_n".$i} . "</td>";
			echo " <td>" . ${"epifaneia_masif_toixoy_n".$i} . "</td>";
			echo " <td>" . ${"epifaneia_dromikoy_n".$i} . "</td>";
			echo " <td>" . ${"thermogefyres_toixoy_n".$i} . "</td>";
			echo " <td>" . ${"thermogefyres_anoig_n".$i} . "</td></tr>";
			}
			echo "<tr><td>Σύνολο T-N</td><td>" . $epifaneia_dokos_n;
			echo "</td><td>" . $epifaneia_ypost_n;
			echo "</td><td>" . $epifaneia_toixoy_syr_n;
			echo "</td><td>" . $epifaneia_anoigmatwn_toixoy_n;
			echo "</td><td>" . $epifaneia_masif_toixoy_n;
			echo "</td><td>" . $epifaneia_dromikoy_n;
			echo "</td><td>" . $thermogefyres_toixoy_n;
			echo "</td><td>" . $thermogefyres_anoig_n . "</td></tr>";
			
			//ΔΥΤΙΚΑ
			for ($i = 1; $i <= $t_dytika; $i++) {
			echo "<tr><td>T-Δ" . $i . "</td>";
			echo "<td>" . ${"epifaneia_dokos_d".$i} . "</td>";
			echo " <td>" . ${"epifaneia_ypost_d".$i} . "</td>";
			echo " <td>" . ${"epifaneia_toixoy_syr_d".$i} . "</td>";
			echo " <td>" . ${"epifaneia_anoigmatwn_toixoy_d".$i} . "</td>";
			echo " <td>" . ${"epifaneia_masif_toixoy_d".$i} . "</td>";
			echo " <td>" . ${"epifaneia_dromikoy_d".$i} . "</td>";
			echo " <td>" . ${"thermogefyres_toixoy_d".$i} . "</td>";
			echo " <td>" . ${"thermogefyres_anoig_d".$i} . "</td></tr>";
			}
			echo "<tr><td>Σύνολο T-Δ</td><td>" . $epifaneia_dokos_d;
			echo "</td><td>" . $epifaneia_ypost_d;
			echo "</td><td>" . $epifaneia_toixoy_syr_d;
			echo "</td><td>" . $epifaneia_anoigmatwn_toixoy_d;
			echo "</td><td>" . $epifaneia_masif_toixoy_d;
			echo "</td><td>" . $epifaneia_dromikoy_d;
			echo "</td><td>" . $thermogefyres_toixoy_d;
			echo "</td><td>" . $thermogefyres_anoig_d . "</td></tr>";
			echo "</table>";
			?>