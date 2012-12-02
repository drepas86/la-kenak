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
require_once("connection.php");
require_once("functions_skiaseis.php");
include_once("form_functions.php");
require_once("session.php");
require_once('/tcpdf/config/lang/eng.php');
require_once('/tcpdf/tcpdf.php');

$skiasi=$_GET["skiasi"];
$print=$_GET["print"];


//#############################################################################
	if ($skiasi==1){//σκίαση ορίζοντα
	$prothema = "hor";
	$pdftitle = "Σκιάσεις Ορίζοντα";
		for ($i=1;$i<=10;$i++){
		${"deg_toixoy".$i}=$_GET["deg_toixoy".$i];
		${"deg_door".$i}=$_GET["deg_door".$i];
		${"deg_an".$i}=$_GET["deg_an".$i];
		${"pros".$i}=$_GET["pros".$i];
		${"name".$i}=$_GET["name".$i];
		${"hor_a".$i}=$_GET["hor_a".$i];
		${"hor_b".$i}=$_GET["hor_b".$i];
		${"hor_c".$i}=$_GET["hor_c".$i];
		${"hor_d".$i}=$_GET["hor_d".$i];
		${"hor_g".$i}=$_GET["hor_g".$i];
		${"hor_e".$i}=$_GET["hor_e".$i];
		${"hor_f".$i}=$_GET["hor_f".$i];
		
		${"array_toixoy".$i} = calc_skiasi_hor(${"deg_toixoy".$i}, ${"pros".$i});
		${"f_h_t".$i} = ${"array_toixoy".$i}[0];
		${"f_c_t".$i} = ${"array_toixoy".$i}[1];
		
		${"array_door".$i} = calc_skiasi_hor(${"deg_door".$i}, ${"pros".$i});
		${"f_h_door".$i} = ${"array_door".$i}[0];
		${"f_c_door".$i} = ${"array_door".$i}[1];
		
		${"array_an".$i} = calc_skiasi_hor(${"deg_an".$i}, ${"pros".$i});
		${"f_h_an".$i} = ${"array_an".$i}[0];
		${"f_c_an".$i} = ${"array_an".$i}[1];
		}
	
	
	$result .= "";
	if ($print==1){
	$result .= "<br/><img src=\"../images/orizontas.png\"></img><br/>";
	}
	
	
	$result .= "<table style=\"width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;\">
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">A/A</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Όνομα στοιχείου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος τοίχου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος πόρτας</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος αν.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος ποδιάς</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Απόσταση υαλ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Απόσταση εμποδίου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος εμποδίου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Προσ.</td>
	</tr>";
	for ($i=1;$i<=10;$i++){
	$result .= "<tr>
	<td>".$i."</td>
	<td>".${"name".$i}."</td>
	<td>".${"hor_a".$i}."</td>
	<td>".${"hor_b".$i}."</td>
	<td>".${"hor_c".$i}."</td>
	<td>".${"hor_d".$i}."</td>
	<td>".${"hor_g".$i}."</td>
	<td>".${"hor_e".$i}."</td>
	<td>".${"hor_f".$i}."</td>
	<td>".${"pros".$i}."</td>
	</tr>";
	}
	$result .= "</table><br/>";
	

	$result .= "<table style=\"width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;\">
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td rowspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Όνομα</td>
	<td colspan=\"3\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Γωνίες σκίασης</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Τοίχος</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Πόρτα</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Άνοιγμα</td>
	</tr>
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Τοίχου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Πόρτας</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ανοίγμ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_hor_h</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_hor_c</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_hor_h</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_hor_c</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_hor_h</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_hor_c</td>
	</tr>";

	for ($i=1;$i<=10;$i++){
	$result .= "<tr>
	<td>".${"name".$i}."</td>
	<td>".round(${"deg_toixoy".$i},2)."</td>
	<td>".round(${"deg_door".$i},2)."</td>
	<td>".round(${"deg_an".$i},2)."</td>
	<td>".${"f_h_t".$i}."</td>
	<td>".${"f_c_t".$i}."</td>
	<td>".${"f_h_door".$i}."</td>
	<td>".${"f_c_door".$i}."</td>
	<td>".${"f_h_an".$i}."</td>
	<td>".${"f_c_an".$i}."</td>
	</tr>";
	}
	$result .= "</table><br/>";
	
	/* Οι εικόνες πρέπει να αποθηκευτούν προσωρινά για να περάσουν στο pdf
		for ($i=1;$i<=10;$i++){
		$result .=  "<img src=\"includes/image_creation_orizonta.php" . 
		"?ipsost=" . ${"hor_a".$i} . "&ipsosp=" . ${"hor_b".$i} . "&ipsospar=" . 
		${"hor_c".$i} . "&ipsospod=" . ${"hor_d".$i} . "&apostyal=" . ${"hor_g".$i} . "&apostemp=" . 
		${"hor_e".$i} . "&ypsosemp=" . ${"hor_f".$i} . "&pros=" . ${"pros".$i} . "&name=" . ${"name".$i} . "\"></img><br/>";
		}
	*/
	}//Τέλος αποτελεσμάτων ορίζοντα (ΝΟ 1)
//#############################################################################	
	
	
	if ($skiasi==2){//σκίαση προβόλου
	$prothema = "fin2";
	$pdftitle = "Σκιάσεις Προβόλου";
		for ($i=1;$i<=10;$i++){
		${"deg_toixoy".$i}=$_GET["deg_toixoy".$i];
		${"deg_door".$i}=$_GET["deg_door".$i];
		${"deg_an".$i}=$_GET["deg_an".$i];
		${"pros".$i}=$_GET["pros".$i];
		${"name".$i}=$_GET["name".$i];
		${"fin2_a".$i}=$_GET["fin2_a".$i];
		${"fin2_b".$i}=$_GET["fin2_b".$i];
		${"fin2_c".$i}=$_GET["fin2_c".$i];
		${"fin2_d".$i}=$_GET["fin2_d".$i];
		${"fin2_g".$i}=$_GET["fin2_g".$i];
		${"fin2_e".$i}=$_GET["fin2_e".$i];
		
		${"array_toixoy".$i} = calc_skiasi_fin2(${"deg_toixoy".$i}, ${"pros".$i});
		${"f_h_t".$i} = ${"array_toixoy".$i}[0];
		${"f_c_t".$i} = ${"array_toixoy".$i}[1];
		
		${"array_door".$i} = calc_skiasi_fin2(${"deg_door".$i}, ${"pros".$i});
		${"f_h_door".$i} = ${"array_door".$i}[0];
		${"f_c_door".$i} = ${"array_door".$i}[1];
		
		${"array_an".$i} = calc_skiasi_fin2(${"deg_an".$i}, ${"pros".$i});
		${"f_h_an".$i} = ${"array_an".$i}[0];
		${"f_c_an".$i} = ${"array_an".$i}[1];
		}
	
	
	$result .= "";
	if ($print==1){
	$result .= "<br/><img src=\"../images/prfin2olos.png\"></img><br/>";
	}
	
	
	$result .= "<table style=\"width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;\">
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">A/A</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Όνομα στοιχείου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος τοίχου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος πόρτας</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος αν.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ύψος ποδιάς</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Απόσταση υαλ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Μήκος προβόλ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Προσ.</td>
	</tr>";
	for ($i=1;$i<=10;$i++){
	$result .= "<tr>
	<td>".$i."</td>
	<td>".${"name".$i}."</td>
	<td>".${"fin2_a".$i}."</td>
	<td>".${"fin2_b".$i}."</td>
	<td>".${"fin2_c".$i}."</td>
	<td>".${"fin2_d".$i}."</td>
	<td>".${"fin2_g".$i}."</td>
	<td>".${"fin2_e".$i}."</td>
	<td>".${"pros".$i}."</td>
	</tr>";
	}
	$result .= "</table><br/>";
	

	$result .= "<table style=\"width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;\">
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td rowspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Όνομα</td>
	<td colspan=\"3\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Γωνίες σκίασης</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Τοίχος</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Πόρτα</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Άνοιγμα</td>
	</tr>
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Τοίχου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Πόρτας</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ανοίγμ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_h</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_c</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_h</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_c</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_h</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_c</td>
	</tr>";

	for ($i=1;$i<=10;$i++){
	$result .= "<tr>
	<td>".${"name".$i}."</td>
	<td>".round(${"deg_toixoy".$i},2)."</td>
	<td>".round(${"deg_door".$i},2)."</td>
	<td>".round(${"deg_an".$i},2)."</td>
	<td>".${"f_h_t".$i}."</td>
	<td>".${"f_c_t".$i}."</td>
	<td>".${"f_h_door".$i}."</td>
	<td>".${"f_c_door".$i}."</td>
	<td>".${"f_h_an".$i}."</td>
	<td>".${"f_c_an".$i}."</td>
	</tr>";
	}
	$result .= "</table><br/>";
	
	/* Οι εικόνες πρέπει να αποθηκευτούν προσωρινά για να περάσουν στο pdf
		for ($i=1;$i<=10;$i++){
		$result_fin2 .=  "<img src=\"includes/image_creation_prfin2olou.php" . 
		"?ipsost=" . ${"fin2_a".$i} . "&ipsosp=" . ${"fin2_b".$i} . "&ipsospar=" . 
		${"fin2_c".$i} . "&ipsospod=" . ${"hor_d".$i} . "&apostyal=" . ${"fin2_g".$i} . "&mikos_prfin2=" . 
		${"fin2_e".$i} . "&pros=" . ${"pros".$i} . "&name=" . ${"name".$i} . "\"></img><br/>";
		}
	*/
	}//Τέλος αποτελεσμάτων προβόλου (ΝΟ 2)
//#############################################################################	
	
	
	if ($skiasi==3){//Πλευρική σκίαση από 2 μεριές
	$prothema = "fin2";
	$pdftitle = "Σκιάσεις αριστερά και δεξιά";
		for ($i=1;$i<=10;$i++){
		${"deg_toixoy_ar".$i}=$_GET["deg_toixoy_ar".$i];
		${"deg_toixoy_de".$i}=$_GET["deg_toixoy_de".$i];
		${"pros".$i}=$_GET["pros".$i];
		${"name".$i}=$_GET["name".$i];
		${"fin2_a".$i}=$_GET["fin2_a".$i];
		${"fin2_b".$i}=$_GET["fin2_b".$i];
		${"fin2_c".$i}=$_GET["fin2_c".$i];
		${"fin2_d".$i}=$_GET["fin2_d".$i];
		${"fin2_e".$i}=$_GET["fin2_e".$i];
		
		${"array_t_ar".$i} = calc_skiasi_fin(${"deg_toixoy_ar".$i}, ${"pros".$i}, 1);
		${"f_h_t_ar".$i} = ${"array_t_ar".$i}[0];
		${"f_c_t_ar".$i} = ${"array_t_ar".$i}[1];
		
		${"array_t_de".$i} = calc_skiasi_fin(${"deg_toixoy_de".$i}, ${"pros".$i}, 2);
		${"f_h_t_de".$i} = ${"array_t_de".$i}[0];
		${"f_c_t_de".$i} = ${"array_t_de".$i}[1];
		
		${"f_h_t".$i} = ${"f_h_t_ar".$i}*${"f_h_t_de".$i};
		${"f_c_t".$i} = ${"f_c_t_ar".$i}*${"f_c_t_de".$i};
		}
	
	
	$result .= "";
	if ($print==1){
	$result .= "<br/><img src=\"../images/pleyrika.png\"></img><br/>";
	}
	
	
	$result .= "<table style=\"width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;\">
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">A/A</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Όνομα στοιχείου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Πλ. τοίχου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Απόστ. αρ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Εμπόδιο αρ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Απόστ. δεξ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Εμπόδιο δεξ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Προσ.</td>
	</tr>";
	for ($i=1;$i<=10;$i++){
	$result .= "<tr>
	<td>".$i."</td>
	<td>".${"name".$i}."</td>
	<td>".${"fin2_a".$i}."</td>
	<td>".${"fin2_b".$i}."</td>
	<td>".${"fin2_c".$i}."</td>
	<td>".${"fin2_d".$i}."</td>
	<td>".${"fin2_e".$i}."</td>
	<td>".${"pros".$i}."</td>
	</tr>";
	}
	$result .= "</table><br/>";
	

	$result .= "<table style=\"width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;\">
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td rowspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Όνομα</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Γωνίες σκίασης</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Αριστερά</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Δεξιά</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Σύνολο</td>
	</tr>
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Αριστερά</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Δεξιά</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_h Αρ</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_c Αρ</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_h Δε</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_c Δε</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_h</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin2_c</td>
	</tr>";

	for ($i=1;$i<=10;$i++){
	$result .= "<tr>
	<td>".${"name".$i}."</td>
	<td>".round(${"deg_toixoy_ar".$i},2)."</td>
	<td>".round(${"deg_toixoy_de".$i},2)."</td>
	<td>".${"f_h_t_ar".$i}."</td>
	<td>".${"f_c_t_ar".$i}."</td>
	<td>".${"f_h_t_de".$i}."</td>
	<td>".${"f_c_t_de".$i}."</td>
	<td>".${"f_h_t".$i}."</td>
	<td>".${"f_c_t".$i}."</td>
	</tr>";
	}
	$result .= "</table><br/>";
	
	}//Τέλος αποτελεσμάτων πλευρικών από 2 μεριές (ΝΟ 3)



//#############################################################################	
	
	
	if ($skiasi==4){//Πλευρική σκίαση από 2 μεριές
	$prothema = "fin";
	$pdftitle = "Σκιάσεις αριστερά ή δεξιά";
		for ($i=1;$i<=10;$i++){
		${"deg_toixoy".$i}=$_GET["deg_toixoy".$i];
		${"deg_an".$i}=$_GET["deg_an".$i];
		${"pros".$i}=$_GET["pros".$i];
		${"name".$i}=$_GET["name".$i];
		${"fin_a".$i}=$_GET["fin_a".$i];
		${"fin_b".$i}=$_GET["fin_b".$i];
		${"fin_c".$i}=$_GET["fin_c".$i];
		${"fin_d".$i}=$_GET["fin_d".$i];
		${"fin_g".$i}=$_GET["fin_g".$i];
		${"fin_e".$i}=$_GET["fin_e".$i];
		${"fin_f".$i}=$_GET["fin_f".$i];
		
		
		${"array_t".$i} = calc_skiasi_fin(${"deg_toixoy".$i}, ${"pros".$i}, ${"fin_f".$i});
		${"f_h_t".$i} = ${"array_t".$i}[0];
		${"f_c_t".$i} = ${"array_t".$i}[1];
		
		${"array_an".$i} = calc_skiasi_fin(${"deg_toixoy".$i}, ${"pros".$i}, ${"fin_f".$i});
		${"f_h_an".$i} = ${"array_an".$i}[0];
		${"f_c_an".$i} = ${"array_an".$i}[1];
		
		}
	
	
	$result .= "";
	if ($print==1){
	$result .= "<br/><img src=\"../images/pleyrika.png\"></img><br/>";
	}
	
	
	$result .= "<table style=\"width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;\">
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">A/A</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Όνομα στοιχείου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Πλάτος τοίχου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Απόσταση τοίχου από εμπ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Πλάτος αν.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Απόσταση αν. από εμπ.</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Απόσταση υαλ. από εξ. παρειά</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Μήκος εμποδίου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Θέση εμποδίου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Προσ.</td>
	</tr>";
	for ($i=1;$i<=10;$i++){
	$result .= "<tr>
	<td>".$i."</td>
	<td>".${"name".$i}."</td>
	<td>".${"fin_a".$i}."</td>
	<td>".${"fin_b".$i}."</td>
	<td>".${"fin_c".$i}."</td>
	<td>".${"fin_d".$i}."</td>
	<td>".${"fin_g".$i}."</td>
	<td>".${"fin_e".$i}."</td>
	<td>".${"fin_f".$i}."</td>
	<td>".${"pros".$i}."</td>
	</tr>";
	}
	$result .= "</table><br/>";
	

	$result .= "<table style=\"width:100%;text-align:center;background-color:#ffffff;border:1px #6699CC dotted;\">
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td rowspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Όνομα</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Γωνίες σκίασης</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Τοίχος</td>
	<td colspan=\"2\" style=\"border:1px #6699CC dotted;vertical-align:middle;\">Άνοιγμα</td>
	</tr>
	<tr style=\"background-color:#ddd;border:1px #6699CC dotted;\">
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Τοίχου</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">Ανοίγματος</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin_h Τ</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin_c Τ</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin_h Αν</td>
	<td style=\"border:1px #6699CC dotted;vertical-align:middle;\">f_fin_c Αν</td>
	</tr>";

	for ($i=1;$i<=10;$i++){
	$result .= "<tr>
	<td>".${"name".$i}."</td>
	<td>".round(${"deg_toixoy".$i},2)."</td>
	<td>".round(${"deg_an".$i},2)."</td>
	<td>".${"f_h_t".$i}."</td>
	<td>".${"f_c_t".$i}."</td>
	<td>".${"f_h_an".$i}."</td>
	<td>".${"f_c_an".$i}."</td>
	</tr>";
	}
	$result .= "</table><br/>";
	
	}//Τέλος αποτελεσμάτων πλευρικών από 2 μεριές (ΝΟ 4)
	
	
//ΕΠΙΛΟΓΗ ΕΜΦΑΝΙΣΗΣ Η ΑΠΟΘΗΚΕΥΣΗΣ
//#############################################################################

		if($print==0){ //Δεν ορίστηκε εκτύπωση. Απλή εμφάνιση
		echo $result;
		}else{ //Ορίστηκε εκτύπωση
		
		
		ob_start();
		@ob_flush();
		@flush();
		ob_start();
		
		// Extend the TCPDF class to create custom Header and Footer
		class MYPDF extends TCPDF {
			//Page header
			public function Header() {
				// Logo
				$image_file = '../images/home-s.png';
				$this->Image($image_file, 10, 5, 8, 8, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
				// Set font
				$this->SetFont('dejavusans', 'B', 10);
				// Title
				$this->Cell(0, 15, $pdftitle, 'B', false, 'C', 0, '', 0, false, 'M', 'B');
			}
			// Page footer
			public function Footer() {
				// Position at 15 mm from bottom
				$this->SetY(-15);
				// Set font
				$this->SetFont('dejavusans', 'N', 8);
				// Page number
				$this->Cell(0, 10, '', 'T', false, 'R', 0, '', 0, false, 'T', 'M');
			}
		}

		// create new PDF document
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('');
		$pdf->SetTitle('La-Kenak');
		$pdf->SetSubject('');
		$pdf->SetKeywords('');
		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		//set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		//set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		//set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		//set some language-dependent strings
		$pdf->setLanguageArray($l);
		// ---------------------------------------------------------
		// set font
		$pdf->SetFont('dejavusans', 'N', 8);
		// add a page
		$pdf->AddPage();
		$pdf->writeHTML($result, $ln = true, $fill = false, $reseth = true, $cell = false, $align = '' ) ;
		
		ob_end_clean();
		// ---------------------------------------------------------
		//Close and output PDF document
		$pdf->Output("PDF/user".$_SESSION['user_id']."-meleti".$_SESSION['meleti_id']."-f_".$prothema.".pdf", 'F');
		
		}
		?>
		<script type="text/javascript">
		window.open("<?php echo "PDF/user".$_SESSION['user_id']."-meleti".$_SESSION['meleti_id']."-f_".$prothema.".pdf";?>", "La-kenak");
		window.close();
		</script>
<?php


?>