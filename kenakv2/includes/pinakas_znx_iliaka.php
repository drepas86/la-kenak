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
			
			echo "<table class=\"znx\" border=\"1\"><tr><td></td><td>Ιανουάριος</td><td>Φεβρουάριος</td><td>Μάρτιος</td><td>Απρίλιος</td><td>Μάιος</td><td>Ιούνιος</td>";
			echo "<td>Ιούλιος</td><td>Αύγουστος</td><td>Σεπτέμβριος</td><td>Οκτόβριος</td><td>Νοέμβριος</td><td>Δεκέμβριος</td><td>Σύνολο</td></tr>";
			echo "<tr><td>Θερμοκρασία νερού δικτύου <br/>(oC)</td><td class=\"znx\">" . $nero_jan . "</td><td class=\"znx\">" . $nero_feb . "</td><td class=\"znx\">" . $nero_mar . "</td><td class=\"znx\">";
			echo $nero_apr . "</td><td class=\"znx\">" . $nero_may . "</td><td class=\"znx\">" . $nero_jun . "</td><td class=\"znx\">" . $nero_jul . "</td><td class=\"znx\">" . $nero_aug . "</td><td class=\"znx\">" . $nero_sep . "</td><td class=\"znx\">";
			echo $nero_okt . "</td><td class=\"znx\">" . $nero_nov . "</td><td class=\"znx\">" . $nero_dec . "</td><td class=\"znx\"></td></tr>";
			
			echo "<tr><td>Μέσο ημερήσιο θερμικό φορτίο <br/>για ΖΝΧ (kWh/ημέρα)</td><td class=\"znx\">" . $fortio_znx_day_jan . "</td><td class=\"znx\">" . $fortio_znx_day_feb . "</td><td class=\"znx\">" . $fortio_znx_day_mar . "</td><td class=\"znx\">";
			echo $fortio_znx_day_apr . "</td><td class=\"znx\">" . $fortio_znx_day_may . "</td><td class=\"znx\">" . $fortio_znx_day_jun . "</td><td class=\"znx\">" . $fortio_znx_day_jul . "</td><td class=\"znx\">" . $fortio_znx_day_aug . "</td><td class=\"znx\">" . $fortio_znx_day_sep . "</td><td class=\"znx\">";
			echo $fortio_znx_day_okt . "</td><td class=\"znx\">" . $fortio_znx_day_nov . "</td><td class=\"znx\">" . $fortio_znx_day_dec . "</td><td></td class=\"znx\"></tr>";
			
			echo "<tr><td>Μέσο μηνιαίο θερμικό φορτίο <br/>για ΖΝΧ (kWh/μήνα)</td><td class=\"znx\">" . $fortio_znx_jan . "</td><td class=\"znx\">" . $fortio_znx_feb . "</td><td class=\"znx\">" . $fortio_znx_mar . "</td><td class=\"znx\">";
			echo $fortio_znx_apr . "</td><td class=\"znx\">" . $fortio_znx_may . "</td><td class=\"znx\">" . $fortio_znx_jun . "</td><td class=\"znx\">" . $fortio_znx_jul . "</td><td class=\"znx\">" . $fortio_znx_aug . "</td><td class=\"znx\">" . $fortio_znx_sep . "</td><td class=\"znx\">";
			echo $fortio_znx_okt . "</td><td class=\"znx\">" . $fortio_znx_nov . "</td><td class=\"znx\">" . $fortio_znx_dec . "</td><td class=\"znx\">" . $fortio_znx . "</td></tr>";
			
			echo "<tr><td>Μέση μηνιαία προσπίπτουσα <br/>ηλιακή ακτινοβολία <br/>για βέλτιστη κλίση (KWh/m2)</td><td class=\"znx\">" . $iliaki_akt_jan . "</td><td class=\"znx\">" . $iliaki_akt_feb . "</td><td class=\"znx\">" . $iliaki_akt_mar . "</td><td class=\"znx\">";
			echo $iliaki_akt_apr . "</td><td class=\"znx\">" . $iliaki_akt_may . "</td><td class=\"znx\">" . $iliaki_akt_jun . "</td><td class=\"znx\">" . $iliaki_akt_jul . "</td><td class=\"znx\">" . $iliaki_akt_aug . "</td><td class=\"znx\">" . $iliaki_akt_sep . "</td><td class=\"znx\">";
			echo $iliaki_akt_okt . "</td><td class=\"znx\">" . $iliaki_akt_nov . "</td><td class=\"znx\">" . $iliaki_akt_dec . "</td><td class=\"znx\"></td></tr>";
			
			echo "<tr><td>Μέση ημερήσια προσπίπτουσα <br/>ηλιακή ακτινοβολία <br/>για βέλτιστη κλίση (KWh/m2)</td><td class=\"znx\">" . $iliaki_akt_day_jan . "</td><td class=\"znx\">" . $iliaki_akt_day_feb . "</td><td class=\"znx\">" . $iliaki_akt_day_mar . "</td><td class=\"znx\">";
			echo $iliaki_akt_day_apr . "</td><td class=\"znx\">" . $iliaki_akt_day_may . "</td><td class=\"znx\">" . $iliaki_akt_day_jun . "</td><td class=\"znx\">" . $iliaki_akt_day_jul . "</td><td class=\"znx\">" . $iliaki_akt_day_aug . "</td><td class=\"znx\">" . $iliaki_akt_day_sep . "</td><td class=\"znx\">";
			echo $iliaki_akt_day_okt . "</td><td class=\"znx\">" . $iliaki_akt_day_nov . "</td><td class=\"znx\">" . $iliaki_akt_day_dec . "</td><td class=\"znx\"></td></tr>";
			
			echo "<tr><td>Μέση ημερήσια προσπίπτουσα <br/>ηλιακή ακτινοβολία <br/>για βέλτιστη κλίση (KWh/m2) k4</td><td class=\"znx\">" . $iliaki_akt_dayk4_jan . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_feb . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_mar . "</td><td class=\"znx\">";
			echo $iliaki_akt_dayk4_apr . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_may . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_jun . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_jul . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_aug . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_sep . "</td><td class=\"znx\">";
			echo $iliaki_akt_dayk4_okt . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_nov . "</td><td class=\"znx\">" . $iliaki_akt_dayk4_dec . "</td><td class=\"znx\"></td></tr>";
			
			echo "<tr><td>Μέση μηνιαία απολαβή <br/>ηλιακής ακτινοβολίας <br/>για βέλτιστη κλίση <br/> και επιφάνεια ηλιακού</td><td class=\"znx\">" . $apolavi_jan . "</td><td class=\"znx\">" . $apolavi_feb . "</td><td class=\"znx\">" . $apolavi_mar . "</td><td class=\"znx\">";
			echo $apolavi_apr . "</td><td class=\"znx\">" . $apolavi_may . "</td><td class=\"znx\">" . $apolavi_jun . "</td><td class=\"znx\">" . $apolavi_jul . "</td><td class=\"znx\">" . $apolavi_aug . "</td><td class=\"znx\">" . $apolavi_sep . "</td><td class=\"znx\">";
			echo $apolavi_okt . "</td><td class=\"znx\">" . $apolavi_nov . "</td><td class=\"znx\">" . $apolavi_dec . "</td><td class=\"znx\">" . $apolavi_aktinov . "</td></tr>";
			
			echo "<tr><td>Ποσοστό κάλυψης <br/>αναγκών από <br/>ηλιακά (%)</td><td class=\"znx\">" . $pososto_iliaka_jan . "</td><td class=\"znx\">" . $pososto_iliaka_feb . "</td><td class=\"znx\">" . $pososto_iliaka_mar . "</td><td class=\"znx\">";
			echo $pososto_iliaka_apr . "</td><td class=\"znx\">" . $pososto_iliaka_may . "</td><td class=\"znx\">" . $pososto_iliaka_jun . "</td><td class=\"znx\">" . $pososto_iliaka_jul . "</td><td class=\"znx\">" . $pososto_iliaka_aug . "</td><td class=\"znx\">" . $pososto_iliaka_sep . "</td><td class=\"znx\">";
			echo $pososto_iliaka_okt . "</td><td class=\"znx\">" . $pososto_iliaka_nov . "</td><td class=\"znx\">" . $pososto_iliaka_dec . "</td><td>" . $pososto_iliaka . "</td></tr>";
			
			echo "<tr><td>Ποσοστό κάλυψης <br/>υπολοίπων (%)</td><td class=\"znx\">" . $pososto_petr_jan . "</td><td class=\"znx\">" . $pososto_petr_feb . "</td><td class=\"znx\">" . $pososto_petr_mar . "</td><td class=\"znx\">";
			echo $pososto_petr_apr . "</td><td class=\"znx\">" . $pososto_petr_may . "</td><td class=\"znx\">" . $pososto_petr_jun . "</td><td class=\"znx\">" . $pososto_petr_jul . "</td><td class=\"znx\">" . $pososto_petr_aug . "</td><td class=\"znx\">" . $pososto_petr_sep . "</td><td class=\"znx\">";
			echo $pososto_petr_okt . "</td><td class=\"znx\">" . $pososto_petr_nov . "</td><td class=\"znx\">" . $pososto_petr_dec . "</td><td>" . $pososto_petr . "</td></tr></table>";
			
			?>