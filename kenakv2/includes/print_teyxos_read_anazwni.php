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

/* pChart library inclusions */
 include("pchart/class/pData.class.php");
 include("pchart/class/pDraw.class.php");
 include("pchart/class/pImage.class.php");

$save="*";
if (isset($_GET['save'])) $save=$_GET['save'];
//echo $save;
if ($save=="*"){

//Το αρχείο υπολογισμών
include("core-calc/core_calculate_anazwni.php");


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
		
		
$pin44 = "<table>";
$pin44 .= "<tr><td style=\"text-align:left;width:40%;\">Δομικό στοιχείο</td>".
		 "<td style=\"text-align:center;width:15%;\">Φύλλο ελέγχου</td>".
		 "<td style=\"text-align:center;width:15%;\">U [W/(m²K)]</td>".
		 "<td style=\"text-align:center;width:15%;\">Μέσο βάθος z (m)</td>".
		 "<td style=\"text-align:center;width:15%;\">U' [W/(m²K)]</td></tr>";
for ($i=1;$i<=$rows_dapedo;$i++){	
if (${"dapedo_type".$i} == 0){	
$pin44 .= "<tr><td style=\"text-align:left;\">${"dapedo_name".$i}</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">" . ${"dapedo_u".$i} . "</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">0</td></tr>";
}
}
$pin44 .= "</table>";

//*********************************************************************************************

$pin5 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if ($check_thermzwnes[$z] == 1){

$pin5 .= "<table>";
$pin5 .= "<tr><td colspan=\"5\">Ζώνη $z</td></tr>";
$pin5 .= "<tr><td style=\"text-align:left;width:40%;\">Ειδική χρήση χώρων</td>".
		 "<td style=\"text-align:center;width:15%;\">Θερμαινόμενη επιφάνεια [m²]</td>".
		 "<td style=\"text-align:center;width:15%;\">Ψυχόμενη επιφάνεια  [m²]</td>".
		 "<td style=\"text-align:center;width:15%;\">Θερμαινόμενος όγκος [m³]</td>".
		 "<td style=\"text-align:center;width:15%;\">Ψυχόμενος όγκος [m³]</td></tr>";		
$pin5 .= "<tr><td style=\"text-align:left;\">${"xrisi_gen".$z}</td>".
		  "<td style=\"text-align:center;\">${"a_thermoperatotitas".$z}</td>".
		  "<td style=\"text-align:center;\">${"a_thermoperatotitas".$z}</td>".
		  "<td style=\"text-align:center;\">${"synolikos_ogkos".$z}</td>".
		  "<td style=\"text-align:center;\">${"synolikos_ogkos".$z}</td>";
$pin5 .= "</tr><tr><td style=\"text-align:left;\">Κλιμακοστάσιο</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>";
$pin5 .= "</tr></table><br/>";
}
}
//*********************************************************************************************
$pin6 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if (${"aytomatismoi".$z} == 0){${"aytomatismoi".$z}="Α";}
if (${"aytomatismoi".$z} == 1){${"aytomatismoi".$z}="Β";}
if (${"aytomatismoi".$z} == 2){${"aytomatismoi".$z}="Γ";}
if (${"aytomatismoi".$z} == 3){${"aytomatismoi".$z}="Δ";}
$pin6 .= "<table>";
$pin6 .= "<tr><td colspan=\"3\">Ζώνη $z</td></tr>";
$pin6 .= "<tr><td style=\"text-align:left;width:50%;\">Χρήση θερμικής ζώνης</td>".
		 "<td style=\"text-align:center;width:25%;\">${"xrisi_znx_iliakos".$z}</td>".
		 "<td style=\"text-align:center;width:25%;\">&nbsp;</td></tr>";
$pin6 .= "<tr><td style=\"text-align:left;\">Ανηγμένη ειδική θερμοχωρητικότητα [kJ/(m².K)]</td>".
		  "<td style=\"text-align:center;\">${"anigmeni_thermo".$z}</td>".
		  "<td style=\"text-align:center;\">&nbsp;</td>";
$pin6 .= "</tr><tr><td style=\"text-align:left;\">Κατηγορία διατάξεων αυτοματισμών ελέγχου για ηλεκτρομηχανολογικό εξοπλισμό</td>".
		  "<td style=\"text-align:center;\">${"aytomatismoi".$z}</td>".
		  "<td style=\"text-align:center;\">Τ.Ο.Τ.Ε.Ε. 20701-1/2010,πίνακας 5.5</td>";
$pin6 .= "</tr></table><br/>";
}
//*********************************************************************************************
$pin7 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$pin7 .= "<table>";
$pin7 .= "<tr><td colspan=\"3\">Ζώνη $z</td></tr>";
$pin7 .= "<tr><td style=\"text-align:left;width:40%;\">Διείσδυση αέρα (m³/h)</td>".
		 "<td style=\"text-align:center;width:15%;\">${"dieisdysi_aera".$z}</td>".
		 "<td style=\"text-align:center;width:15%;\">Τεύχος Υπολογισμών</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Φυσικός αερισμός (m³/h/m²)</td>".
		  "<td style=\"text-align:center;\">${"syntelestis_dieisdysi_aera".$z}</td>".
		  "<td style=\"text-align:center;\">Τ.Ο.Τ.Ε.Ε. 20701-1</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Συντελεστής χρήσης φυσικού αερισμού</td>".
		  "<td style=\"text-align:center;\">1</td>".
		  "<td style=\"text-align:center;\">100% για κατοικίες, 0% για τριτογενή τομέα</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Αριθμός θυρίδων εξαερισμού για φυσικό αέριο</td>".
		  "<td style=\"text-align:center;\">${"eksaerismos".$z}</td>".
		  "<td style=\"text-align:center;\">-</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Αριθμός καμινάδων</td>".
		  "<td style=\"text-align:center;\">${"kaminades".$z}</td>".
		  "<td style=\"text-align:center;\">-</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Αριθμός ανεμιστήρων οροφής</td>".
		  "<td style=\"text-align:center;\">${"anem_orofis".$z}</td>".
		  "<td style=\"text-align:center;\">-</td>";
$pin7 .= "</tr><tr><td style=\"text-align:left;\">Χώροι κάλυψης ανεμιστήρων οροφής</td>".
		  "<td style=\"text-align:center;\">-</td>".
		  "<td style=\"text-align:center;\">-</td>";
$pin7 .= "</tr></table>";
}
//*********************************************************************************************
//$array_leitoyrgias = get_times("*", "energy_conditions", $drop_xrisi);
$pin8 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$pin8 .= "<table>";
$pin8 .= "<tr><td colspan=\"2\">Ζώνη $z</td></tr>";
$pin8 .= "<tr><td style=\"text-align:left;width:40%;\">Παράμετρος</td>".
		 "<td style=\"text-align:center;width:60%;\">Τιμή</td></tr><tr>".
         "<td style=\"text-align:left;\">Κατηγορία</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][1]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Χρήση</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][2]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ώρες λειτουργίας (h)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][3]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ημέρες λειτουργίας (d)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][4]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Μήνες λειτουργίας (m)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][5]."</td></tr><tr>".
         "<td style=\"text-align:left;\">θ,i,h (C)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][6]."</td></tr><tr>".
         "<td style=\"text-align:left;\">θ,i,c (C)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][7]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Χ,i,h (%)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][8]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Χ,i,c (%)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][9]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Άτομα/100m2</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][10]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Νωπός αέρας (m³/h/person)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][11]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Νωπός αέρας (m³/h/m²)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][12]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Στάθμη φωτισμού (lux)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][13]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ισχύς κτιρίου αναφοράς (W/m²)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][14]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ώρες λειτουργίας ημέρας (h)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][15]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ώρες λειτουργίας νύχτας (h)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][16]."</td></tr><tr>".
         "<td style=\"text-align:left;\">ΖΝΧ (lt/άτομο/ημέρα)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][17]."</td></tr><tr>".
         "<td style=\"text-align:left;\">ΖΝΧ (lt/m²/ημέρα)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][18]."</td></tr><tr>".
         "<td style=\"text-align:left;\">ΖΝΧ (m³/m²/year)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][19]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Άνθρωποι (W/άτομο)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][20]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Άνθρωποι (W/m2)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][21]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Συντελεστής παρουσίας f</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][22]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ισχύς εξοπλισμού (W / m2)</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][23]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Μέσος συντ. ετεροχρ.</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][24]."</td></tr><tr>".
         "<td style=\"text-align:left;\">Ετεροχρ. ισχύς εξοπλ.</td>".
		 "<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][25]."</td></tr></table>
		 <p style=\"page-break-before:always;\">&nbsp;</p>";
}
//*********************************************************************************************
$pin9 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if (isset(${"thermp_type".$z."1"})){
$pin9 .=  "<table>";
$pin9 .= "<tr><td colspan=\"2\">Ζώνη $z</td></tr>";
$pin9 .= "<tr><td style=\"text-align:left;width:50%;\">ΜΟΝΑΔΕΣ ΠΑΡΑΓΩΓΗΣ</td><td></td></tr>";
for ($i=1;$i<=${"thermp_rows".$z};$i++){
		if (${"thermp_type".$z.$i} == 0){$thermp_type="Λέβητας";}
		if (${"thermp_type".$z.$i} == 1){$thermp_type="Κεντρική υδρόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 2){$thermp_type="Κεντρική αερόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 3){$thermp_type="Τοπική αερόψυκτη Α.Θ.";}
		if (${"thermp_type".$z.$i} == 4){$thermp_type="Γεωθερμική Α.Θ. με οριζόντιο εναλλάκτη";}
		if (${"thermp_type".$z.$i} == 5){$thermp_type="Γεωθερμική Α.Θ. με κατακόρυφο εναλλάκτη";}
		if (${"thermp_type".$z.$i} == 6){$thermp_type="Κεντρική άλλου τύπου Α.Θ.";}
		if (${"thermp_type".$z.$i} == 7){$thermp_type="Τοπικές ηλεκτρικές μονάδες (καλοριφέρ ή θερμοπομποί ή άλλο)";}
		if (${"thermp_type".$z.$i} == 8){$thermp_type="Τοπικές μονάδες αερίου ή υγρού καυσίμου";}
		if (${"thermp_type".$z.$i} == 9){$thermp_type="Ανοικτές εστίες καύσης";}
		if (${"thermp_type".$z.$i} == 10){$thermp_type="Τηλεθέρμανση";}
		if (${"thermp_type".$z.$i} == 11){$thermp_type="ΣΗΘ";}
		if (${"thermp_type".$z.$i} == 12){$thermp_type="Μονάδα παραγωγής άλλου τύπου";}
		
		if (${"thermp_pigienergy".$z.$i} == 0){$thermp_pigi="Υγραέριο (LPG)";}
		if (${"thermp_pigienergy".$z.$i} == 1){$thermp_pigi="Φυσικό αέριο";}
		if (${"thermp_pigienergy".$z.$i} == 2){$thermp_pigi="Ηλεκτρισμός";}
		if (${"thermp_pigienergy".$z.$i} == 3){$thermp_pigi="Πετρέλαιο θέρμανσης";}
		if (${"thermp_pigienergy".$z.$i} == 4){$thermp_pigi="Πετρέλαιο κίνησης";}
		if (${"thermp_pigienergy".$z.$i} == 5){$thermp_pigi="Τηλεθέρμανση (ΔΕΗ)";}
		if (${"thermp_pigienergy".$z.$i} == 6){$thermp_pigi="Τηλεθέρμανση (ΑΠΕ)";}
		if (${"thermp_pigienergy".$z.$i} == 7){$thermp_pigi="Βιομάζα";}
		if (${"thermp_pigienergy".$z.$i} == 8){$thermp_pigi="Βιομάζα τυποποιημένη";}
		if (${"thermp_pigienergy".$z.$i} == 9){$thermp_pigi="ΣΗΘ1";}
		if (${"thermp_pigienergy".$z.$i} == 10){$thermp_pigi="ΣΗΘ2";}
		if (${"thermp_pigienergy".$z.$i} == 11){$thermp_pigi="ΣΗΘ3";}
		if (${"thermp_pigienergy".$z.$i} == 12){$thermp_pigi="ΣΗΘ4";}
		if (${"thermp_pigienergy".$z.$i} == 13){$thermp_pigi="ΣΗΘ5";}
		if (${"thermp_pigienergy".$z.$i} == 14){$thermp_pigi="ΣΗΘ6";}
		if (${"thermp_pigienergy".$z.$i} == 15){$thermp_pigi="ΣΗΘ7";}
		if (${"thermp_pigienergy".$z.$i} == 16){$thermp_pigi="ΣΗΘ8";}
		if (${"thermp_pigienergy".$z.$i} == 17){$thermp_pigi="ΣΗΘ9";}
		if (${"thermp_pigienergy".$z.$i} == 18){$thermp_pigi="ΣΗΘ10";}
$pin9 .= "<tr><td style=\"text-align:left;width:50%;\">Είδος μονάδας παραγωγής θερμότητας</td>".
"<td style=\"text-align:center;width:50%;\">$thermp_type</td></tr><tr>".
"<td style=\"text-align:left;\">Ισχύς</td>".
"<td style=\"text-align:center;\">${"thermp_isxys".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση μονάδας</td>".
"<td style=\"text-align:center;\">${"thermp_bathm".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος καυσίμου</td>".
"<td style=\"text-align:center;\">$thermp_pigi</td></tr>";
}

$pin9 .= "<tr><td style=\"text-align:left;width:50%;\">ΔΙΚΤΥΟ ΔΙΑΝΟΜΗΣ</td><td></td></tr>";
$pin9 .= "<tr><td style=\"text-align:left;\">Συνολική ισχύς δικτύου διανομής (70% της ισχύος του λέβητα)</td>".
"<td style=\"text-align:center;\">$thermansi_value_kw_text</td></tr><tr>".
"<td style=\"text-align:left;\">Διέλευση από εσ. χώρους</td>".
"<td style=\"text-align:center;\">ΝΑΙ</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμοκρασία προσαγωγής θερμού μέσου στο δίκτυο διανομής (ºC)</td>".
"<td style=\"text-align:center;\">85</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμοκρασία επιστροφής θερμού μέσου στο δίκτυο διανομής (ºC)</td>".
"<td style=\"text-align:center;\">70</td></tr><tr>".
"<td style=\"text-align:left;\">Βαθμός απόδοσης δικτύου διανομής</td>".
"<td style=\"text-align:center;\">100%-5,5%</td></tr><tr>".
"<td style=\"text-align:left;\">Απώλειες</td>".
"<td style=\"text-align:center;\">94.5%</td></tr>";

$pin9 .= "<tr><td style=\"text-align:left;width:50%;\">ΤΕΡΜΑΤΙΚΕΣ ΜΟΝΑΔΕΣ</td><td></td></tr>";
for ($i=1;$i<=${"thermt_rows".$z};$i++){
$pin9 .= "<tr><td style=\"text-align:left;\">Είδος τερματικών μονάδων θέρμανσης χώρων</td>".
"<td style=\"text-align:center;\">${"thermt_type".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση τερματικών μονάδων</td>".
"<td style=\"text-align:center;\">${"thermt_bathm".$z.$i}</td></tr>";
}

$pin9 .= "<tr><td style=\"text-align:left;width:50%;\">ΒΟΗΘΗΤΙΚΕΣ ΜΟΝΑΔΕΣ</td><td></td></tr>";
for ($i=1;$i<=${"thermb_rows".$z};$i++){
		if (${"thermb_type".$z.$i} == 0){$thermb_type="Αντλίες";}
		if (${"thermb_type".$z.$i} == 1){$thermb_type="Κυκλοφορητές";}
		if (${"thermb_type".$z.$i} == 2){$thermb_type="Ηλεκτροβάνες";}
		if (${"thermb_type".$z.$i} == 3){$thermb_type="Ανεμιστήρες";}
		${"thermb_isxys_synolo".$z.$i} = ${"thermb_isxys".$z.$i} * ${"thermb_number".$z.$i};

$pin9 .= "<tr><td style=\"text-align:left;\">Τύπος βοηθητικών συστημάτων</td>".
"<td style=\"text-align:center;\">$thermb_type</td></tr><tr>".
"<td style=\"text-align:left;\">Αριθμός συστημάτων</td>".
"<td style=\"text-align:center;\">${"thermb_number".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;\">Ισχύς βοηθητικών συστημάτων  (kW)</td>".
"<td style=\"text-align:center;\">${"thermb_isxys_synolo".$z.$i}</td></tr>";
}
$pin9 .= "<tr><td style=\"text-align:left;\">Χρόνος λειτουργίας βοηθητικών συστημάτων</td>".
"<td style=\"text-align:center;\">75% του χρόνου λειτουργίας του κτιρίου</td></tr></table>";

$pin9 .= "<table>".
"<tr><td>ΙΑΝ</td><td>ΦΕΒ</td><td>ΜΑΡ</td><td>ΑΠΡ</td><td>MAI</td><td>IOYN</td>".
"<td>IOYΛ</td><td>ΑΥΓ</td><td>ΣΕΠ</td><td>ΟΚΤ</td><td>ΝΟΕ</td><td>ΔΕΚ</td></tr>";
for ($i=1;$i<=${"thermp_rows".$z};$i++){
$pin9 .= "<tr><td>${"thermp_jan".$z.$i}</td><td>${"thermp_feb".$z.$i}</td>".
"<td>${"thermp_mar".$z.$i}</td><td>${"thermp_apr".$z.$i}</td>".
"<td>${"thermp_may".$z.$i}</td><td>${"thermp_jun".$z.$i}</td>".
"<td>${"thermp_jul".$z.$i}</td><td>${"thermp_aug".$z.$i}</td>".
"<td>${"thermp_sep".$z.$i}</td><td>${"thermp_okt".$z.$i}</td>".
"<td>${"thermp_nov".$z.$i}</td><td>${"thermp_decem".$z.$i}</td></tr>";
}
$pin9 .= "</table><br/>";

for ($i=1;$i<=${"thermp_rows".$z};$i++){
include("includes/pchart/thermp_draw_chart.php");
$pin9 .= "<img src=\"http://".$_SERVER['HTTP_HOST']."/kenakv2/includes/PDF/thermpchart".$z.$i.".png\" style=\"width:700px;height:230px; border:1px solid black; vertical-align:middle;\" ></img>";
}

}
}

//*********************************************************************************************
$pin10 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if (isset(${"coldp_type".$z."1"})){
$pin10 .=  "<table>";
$pin10 .= "<tr><td colspan=\"2\">Ζώνη $z</td></tr>";
$pin10 .= "<tr><td style=\"text-align:left;width:50%;\">ΜΟΝΑΔΕΣ ΠΑΡΑΓΩΓΗΣ</td><td></td></tr>";
for ($i=1;$i<=${"coldp_rows".$z};$i++){
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
		if (${"coldp_pigienergy".$z.$i} == 5){$coldp_pigi="Τηλεθέρμανση (ΔΕΗ)";}
		if (${"coldp_pigienergy".$z.$i} == 6){$coldp_pigi="Τηλεθέρμανση (ΑΠΕ)";}
		if (${"coldp_pigienergy".$z.$i} == 7){$coldp_pigi="Βιομάζα";}
		if (${"coldp_pigienergy".$z.$i} == 8){$coldp_pigi="Βιομάζα τυποποιημένη";}
		if (${"coldp_pigienergy".$z.$i} == 9){$coldp_pigi="ΣΗΘ1";}
		if (${"coldp_pigienergy".$z.$i} == 10){$coldp_pigi="ΣΗΘ2";}
		if (${"coldp_pigienergy".$z.$i} == 11){$coldp_pigi="ΣΗΘ3";}
		if (${"coldp_pigienergy".$z.$i} == 12){$coldp_pigi="ΣΗΘ4";}
		if (${"coldp_pigienergy".$z.$i} == 13){$coldp_pigi="ΣΗΘ5";}
		if (${"coldp_pigienergy".$z.$i} == 14){$coldp_pigi="ΣΗΘ6";}
		if (${"coldp_pigienergy".$z.$i} == 15){$coldp_pigi="ΣΗΘ7";}
		if (${"coldp_pigienergy".$z.$i} == 16){$coldp_pigi="ΣΗΘ8";}
		if (${"coldp_pigienergy".$z.$i} == 17){$coldp_pigi="ΣΗΘ9";}
		if (${"coldp_pigienergy".$z.$i} == 18){$coldp_pigi="ΣΗΘ10";}
$pin10 .= "<tr><td style=\"text-align:left;width:50%;\">Είδος μονάδας παραγωγής ψύξης</td>".
"<td style=\"text-align:center;width:50%;\">$coldp_type</td></tr>".
"<tr><td style=\"text-align:left;\">Ισχύς</td>".
"<td style=\"text-align:center;\">${"coldp_isxys".$z.$i}</td></tr>".
"<tr><td style=\"text-align:left;\">Βαθμός απόδοσης ΕER:</td>".
"<td style=\"text-align:center;\">${"coldp_eer".$z.$i}</td></tr>".
"<tr><td style=\"text-align:left;\">Είδος καυσίμου</td>".
"<td style=\"text-align:center;\">$coldp_pigi</td></tr>";
}

//Βρίσκω το i από τις γραμμές που περιέχει το δίκτυο διανομής και όχι τους αεραγωγούς
for ($i=1;$i<=${"coldd_rows".$z};$i++){
if (${"coldd_type".$z.$i} == 0){$i_diktyoydianomis=$i;}
}

if (${"coldd_xwros".$z.$i_diktyoydianomis} == 0){$coldt_xwros="Εσωτερικοί ή έως 20% σε εξωτερικούς";}
if (${"coldd_xwros".$z.$i_diktyoydianomis} == 1){$coldt_xwros="Πάνω 20% σε εξωτερικούς";}

if (${"coldd_monwsi".$z.$i_diktyoydianomis} == 0){$coldt_monwsi="OXI";}
if (${"coldd_monwsi".$z.$i_diktyoydianomis} == 1){$coldt_monwsi="NAI";}

$pin10 .= "<tr><td style=\"text-align:left;width:50%;\">ΔΙΚΤΥΟ ΔΙΑΝΟΜΗΣ</td><td></td></tr>";
$pin10 .= "<tr><td style=\"text-align:left;\">Ψυκτική ισχύς που μεταφέρει το δίκτυο διανομής</td>".
"<td style=\"text-align:center;\">$klimatismos_value_kw_text</td></tr>".
"<tr><td style=\"text-align:left;\">Διέλευση από εσ. χώρους</td>".
"<td style=\"text-align:center;\">ΝΑΙ</td></tr>".
"<tr><td style=\"text-align:left;\">Εξωτερικοί χώροι</td>".
"<td style=\"text-align:center;\">$coldt_xwros</td></tr>".
"<tr><td style=\"text-align:left;\">Θερμοκρασία προσαγωγής θερμού μέσου στο δίκτυο διανομής (ºC)</td>".
"<td style=\"text-align:center;\">-</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμοκρασία επιστροφής θερμού μέσου στο δίκτυο διανομής (ºC)</td>".
"<td style=\"text-align:center;\">-</td></tr><tr>".
"<td style=\"text-align:left;\">Βαθμός ψυκτικής απόδοσης δικτύου διανομής (%)</td>".
"<td style=\"text-align:center;\">${"coldd_bathm".$z.$i_diktyoydianomis}</td></tr>".
"<tr><td style=\"text-align:left;\">Ύπαρξη μόνωσης στους αεραγωγούς</td>".
"<td style=\"text-align:center;\">$coldt_monwsi</td></tr>";

$pin10 .= "<tr><td style=\"text-align:left;width:50%;\">ΤΕΡΜΑΤΙΚΕΣ ΜΟΝΑΔΕΣ</td><td></td></tr>";
for ($i=1;$i<=${"coldt_rows".$z};$i++){
$pin10 .= "<tr><td style=\"text-align:left;\">Είδος τερματικών μονάδων ψύξης χώρων</td>".
"<td style=\"text-align:center;\">${"coldt_type".$z.$i}</td></tr>".
"<tr><td style=\"text-align:left;\">Θερμική απόδοση τερματικών μονάδων</td>".
"<td style=\"text-align:center;\">${"coldt_bathm".$z.$i}</td></tr>";
}

$pin10 .= "<tr><td style=\"text-align:left;width:50%;\">ΒΟΗΘΗΤΙΚΕΣ ΜΟΝΑΔΕΣ</td><td></td></tr>";
for ($i=1;$i<=${"coldb_rows".$z};$i++){
		if (${"coldb_type".$z.$i} == 0){$coldb_type="Αντλίες";}
		if (${"coldb_type".$z.$i} == 1){$coldb_type="Κυκλοφορητές";}
		if (${"coldb_type".$z.$i} == 2){$coldb_type="Ηλεκτροβάνες";}
		if (${"coldb_type".$z.$i} == 3){$coldb_type="Ανεμιστήρες";}
		if (${"coldb_type".$z.$i} == 4){$coldb_type="Πύργος ψύξης";}
		${"coldb_isxys_synolo".$z.$i} = ${"coldb_isxys".$z.$i} * ${"coldb_number".$z.$i};

$pin10 .= "<tr><td style=\"text-align:left;\">Τύπος βοηθητικών συστημάτων</td>".
"<td style=\"text-align:center;\">$coldb_type</td></tr><tr>".
"<td style=\"text-align:left;\">Αριθμός συστημάτων</td>".
"<td style=\"text-align:center;\">${"coldb_number".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;\">Ισχύς βοηθητικών συστημάτων  (kW)</td>".
"<td style=\"text-align:center;\">${"coldb_isxys_synolo".$z.$i}</td></tr>";
}

$pin10 .= "<tr><td style=\"text-align:left;\">Χρόνος λειτουργίας βοηθητικών συστημάτων</td>".
"<td style=\"text-align:center;\">15% του χρόνου λειτουργίας του κτιρίου</td></tr>";
$pin10 .= "</table>";

$pin10 .= "<table>".
"<tr><td>ΙΑΝ</td><td>ΦΕΒ</td><td>ΜΑΡ</td><td>ΑΠΡ</td><td>MAI</td><td>IOYN</td>".
"<td>IOYΛ</td><td>ΑΥΓ</td><td>ΣΕΠ</td><td>ΟΚΤ</td><td>ΝΟΕ</td><td>ΔΕΚ</td></tr>";
for ($i=1;$i<=${"coldp_rows".$z};$i++){
$pin10 .= "<tr><td>${"coldp_jan".$z.$i}</td><td>${"coldp_feb".$z.$i}</td>".
"<td>${"coldp_mar".$z.$i}</td><td>${"coldp_apr".$z.$i}</td>".
"<td>${"coldp_may".$z.$i}</td><td>${"coldp_jun".$z.$i}</td>".
"<td>${"coldp_jul".$z.$i}</td><td>${"coldp_aug".$z.$i}</td>".
"<td>${"coldp_sep".$z.$i}</td><td>${"coldp_okt".$z.$i}</td>".
"<td>${"coldp_nov".$z.$i}</td><td>${"coldp_decem".$z.$i}</td></tr>";
}
$pin10 .= "</table><br/>";

for ($i=1;$i<=${"coldp_rows".$z};$i++){
include("includes/pchart/coldp_draw_chart.php");
$pin10 .= "<img src=\"http://".$_SERVER['HTTP_HOST']."/kenakv2/includes/PDF/coldpchart".$z.$i.".png\" style=\"width:700px;height:230px; border:1px solid black; vertical-align:middle;\" ></img>";
}

}
}
//*********************************************************************************************
$pin68 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if (isset(${"znxp_type".$z."1"})){

$pin68 .= "<table>";
$pin68 .= "<tr><td colspan=\"2\">Ζώνη $z</td></tr>";
$pin68 .= "<tr><td style=\"text-align:left;width:50%;\">ΜΟΝΑΔΕΣ ΠΑΡΑΓΩΓΗΣ</td><td></td></tr>";

for ($i=1;$i<=${"znxp_rows".$z};$i++){
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
		if (${"znxp_pigienergy".$z.$i} == 5){$znxp_pigi="Τηλεθέρμανση (ΔΕΗ)";}
		if (${"znxp_pigienergy".$z.$i} == 6){$znxp_pigi="Τηλεθέρμανση (ΑΠΕ)";}
		if (${"znxp_pigienergy".$z.$i} == 7){$znxp_pigi="Βιομάζα";}
		if (${"znxp_pigienergy".$z.$i} == 8){$znxp_pigi="Βιομάζα τυποποιημένη";}
		if (${"znxp_pigienergy".$z.$i} == 9){$znxp_pigi="ΣΗΘ1";}
		if (${"znxp_pigienergy".$z.$i} == 10){$znxp_pigi="ΣΗΘ2";}
		if (${"znxp_pigienergy".$z.$i} == 11){$znxp_pigi="ΣΗΘ3";}
		if (${"znxp_pigienergy".$z.$i} == 12){$znxp_pigi="ΣΗΘ4";}
		if (${"znxp_pigienergy".$z.$i} == 13){$znxp_pigi="ΣΗΘ5";}
		if (${"znxp_pigienergy".$z.$i} == 14){$znxp_pigi="ΣΗΘ6";}
		if (${"znxp_pigienergy".$z.$i} == 15){$znxp_pigi="ΣΗΘ7";}
		if (${"znxp_pigienergy".$z.$i} == 16){$znxp_pigi="ΣΗΘ8";}
		if (${"znxp_pigienergy".$z.$i} == 17){$znxp_pigi="ΣΗΘ9";}
		if (${"znxp_pigienergy".$z.$i} == 18){$znxp_pigi="ΣΗΘ10";}
$pin68 .= "<tr><td style=\"text-align:left;width:50%;\">Είδος μονάδας παραγωγής ZNX</td>".
"<td style=\"text-align:center;width:50%;\">$znxp_type</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση μονάδας</td>".
"<td style=\"text-align:center;\">${"znxp_bathm".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;\">Είδος καυσίμου</td>".
"<td style=\"text-align:center;\">$znxp_pigi</td></tr><tr>".
"<td style=\"text-align:left;\">Μηνιαίο ποσοστό κάλυψης θερμικού φορτίου για ΖΝΧ από το σύστημα (%)</td>".
"<td style=\"text-align:center;\">τουλάχιστον 30%</td></tr>";
}

$pin68 .= "<tr><td style=\"text-align:left;width:50%;\">ΔΙΚΤΥΟ ΔΙΑΝΟΜΗΣ</td><td></td></tr>";
for ($i=1;$i<=${"znxd_rows".$z};$i++){
		if (${"znxa_anakykloforia".$z.$i} == 0){$znxa_anakykloforia="ΟΧΙ";}
		if (${"znxa_anakykloforia".$z.$i} == 1){$znxa_anakykloforia="ΝΑΙ";}
		if (${"znxd_xwros".$z.$i} == 0){$znxa_xwros="Εσωτερικοί ή έως 20% σε εξωτερικούς";}
		if (${"znxd_xwros".$z.$i} == 1){$znxa_xwros="Πάνω από 20% σε εξωτερικούς";}
$pin68 .= "<tr><td style=\"text-align:left;\">Σύστημα ανακυκλοφορίας</td>".
"<td style=\"text-align:center;\">$znxa_anakykloforia</td></tr><tr>".
"<td style=\"text-align:left;\">Εξωτερικοί χώροι</td>".
"<td style=\"text-align:center;\">$znxa_xwros</td></tr><tr>".
"<td style=\"text-align:left;\">Βαθμός θερμικής απόδοσης δικτύου διανομής (%)</td>".
"<td style=\"text-align:center;\">${"znxd_bathm".$z.$i}</td></tr>";
}

$pin68 .= "<tr><td style=\"text-align:left;width:50%;\">ΑΠΟΘΗΚΕΥΤΙΚΕΣ ΜΟΝΑΔΕΣ</td><td></td></tr>";
for ($i=1;$i<=${"znxa_rows".$z};$i++){
$pin68 .= "<tr><td style=\"text-align:left;\">Είδος αποθήκευσης ζεστού νερού χρήσης</td>".
"<td style=\"text-align:center;\">${"znxa_type".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;\">Θερμική απόδοση μονάδας αποθήκευσης ΖΝΧ</td>".
"<td style=\"text-align:center;\">${"znxa_bathm".$z.$i}</td></tr>";
}
$pin68 .= "</table>";
$pin68 .= "<table>".
"<tr><td>ΙΑΝ</td><td>ΦΕΒ</td><td>ΜΑΡ</td><td>ΑΠΡ</td><td>MAI</td><td>IOYN</td>".
"<td>IOYΛ</td><td>ΑΥΓ</td><td>ΣΕΠ</td><td>ΟΚΤ</td><td>ΝΟΕ</td><td>ΔΕΚ</td></tr>";
$pin68 .= "<tr><td>${"pososto_petr_jan".$z}</td><td>${"pososto_petr_feb".$z}</td>".
"<td>${"pososto_petr_mar".$z}</td><td>${"pososto_petr_apr".$z}</td>".
"<td>${"pososto_petr_may".$z}</td><td>${"pososto_petr_jun".$z}</td>".
"<td>${"pososto_petr_jul".$z}</td><td>${"pososto_petr_aug".$z}</td>".
"<td>${"pososto_petr_sep".$z}</td><td>${"pososto_petr_okt".$z}</td>".
"<td>${"pososto_petr_nov".$z}</td><td>${"pososto_petr_dec".$z}</td></tr></table>";

$pin68 .= "<br/><img src=\"http://".$_SERVER['HTTP_HOST']."/kenakv2/includes/PDF/znxchart".$z.".png\" style=\"width:700px;height:230px; border:1px solid black; vertical-align:middle;\" ></img>";
}
}
//*********************************************************************************************
$pin69 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$pososto_iliaka_100 = ${"pososto_iliaka".$z}*100;
if (isset(${"znxiliakos_type".$z."1"})){

$pin69 .= "<table>";
$pin69 .= "<tr><td colspan=\"2\">Ζώνη $z</td></tr>";

for ($i=1;$i<=${"znxiliakos_rows".$z};$i++){
		if (${"znxiliakos_type".$z.$i} == 0){$znxiliakos_type="Χωρίς κάλυμα";}
		if (${"znxiliakos_type".$z.$i} == 1){$znxiliakos_type="Απλός επίπεδος";}
		if (${"znxiliakos_type".$z.$i} == 2){$znxiliakos_type="Επιλεκτικός επίπεδος";}
		if (${"znxiliakos_type".$z.$i} == 3){$znxiliakos_type="Κενού";}
		if (${"znxiliakos_type".$z.$i} == 4){$znxiliakos_type="Συγκεντρωτικός";}
		
		if (${"znxiliakos_thermansi".$z.$i} == 0){$znxiliakos_thermansi="";}
		if (${"znxiliakos_thermansi".$z.$i} == 1){$znxiliakos_thermansi="ΘΕΡΜΑΝΣΗ";}
		
		if (${"znxiliakos_znx".$z.$i} == 0){$znxiliakos_znx="";}
		if (${"znxiliakos_znx".$z.$i} == 1){$znxiliakos_znx="ΖΝΧ";}

$pin69 .= "<tr><td style=\"text-align:left;width:50%;\">Είδος ηλιακού συλλέκτη</td>".
"<td style=\"text-align:center;width:50%;\">$znxiliakos_type</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Χρήση ηλιακού συλλέκτη για</td>".
"<td style=\"text-align:center;width:50%;\">".$znxiliakos_thermansi.", ".$znxiliakos_znx."</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Βαθμός ηλιακής αξιοποίησης για ΖΝΧ</td>".
"<td style=\"text-align:center;width:50%;\">$pososto_iliaka_text</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Βαθμός ηλιακής αξιοποίησης για θέρμανση χώρων</td>".
"<td style=\"text-align:center;width:50%;\">-</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Εμβαδόν επιφάνεια ηλιακών συλλεκτών (m²)</td>".
"<td style=\"text-align:center;width:50%;\">${"znxiliakos_epifaneia".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Κλίση τοποθέτησης ηλιακών συλλεκτών(º)</td>".
"<td style=\"text-align:center;width:50%;\">${"znxiliakos_bdeg".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Προσανατολισμός ηλιακών συλλεκτών (º)</td>".
"<td style=\"text-align:center;width:50%;\">${"znxiliakos_gdeg".$z.$i}</td></tr><tr>".
"<td style=\"text-align:left;width:50%;\">Συντελεστής σκίασης F-s</td>".
"<td style=\"text-align:center;width:50%;\">${"znxiliakos_fs".$z.$i}</td></tr>";
}

$pin69 .= "</table>";
}
}
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


$pinepar = "";
$pinepar1 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if ($check_thermzwnes[$z] == 1){
$pinepar .= "<br />Ζώνη ".$z;
$pinepar .= "<table><tr><td>Είδος</td><td>Επιφάνεια</td><td>U*A</td></tr>";		
$pinepar .= "<tr><td>Στοιχεία κατακόρυφων αδιαφανών</td><td>" . ${"a_kat_adiafanwn".$z} . "</td><td>" . ${"ua_kat_adiafanwn".$z} . "</td></tr>";
$pinepar .= "<tr><td>Στοιχεία οριζόντιων αδιαφανών</td><td>" . ${"a_oriz_adiafanwn".$z} . "</td><td>" . ${"ua_oriz_adiafanwn".$z} . "</td></tr>";
$pinepar .= "<tr><td>Στοιχεία διαφανών</td><td>" . ${"a_diafanwn".$z} . "</td><td>" . ${"ua_diafanwn".$z} . "</td></tr>";
$pinepar .= "<tr><td>Σύνολο</td><td>" . ${"a_thermoperatotitas".$z} . "</td><td>" . ${"ua_thermoperatotitas".$z} . "</td></tr>";
$pinepar .= "</table><br>";

$pinepar1 .= "<br />Ζώνη ".$z;
$pinepar1 .= "<table><tr><td>Είδος</td><td>Τιμή</td></tr>";	
$pinepar1 .= "<tr><td>U*A θερμογεφυρών</td><td>" . ${"thermogefyres".$z} . "</td></tr>";
$pinepar1 .= "<tr><td>Σύνολικό U*A</td><td>" . ${"sunolo_ua".$z} . "</td></tr>";
$pinepar1 .= "<tr><td>A/V</td><td>" . ${"aprosv".$z} . "</td></tr>";
$pinepar1 .= "<tr><td>Τιμή (U*A)/Α</td><td>" . ${"uadiaa".$z} . "</td></tr>";
$pinepar1 .= "<tr><td>Umax  [W/(m2·Κ)] :</td><td>" . ${"umax".$z} . "</td></tr>";
$sygkrisiua1 = ${"uadiaa".$z}  / ${"umax".$z};
			if (${"sygkrisiua".$z}>1)${"elegxosua".$z}="ΔΕΝ τηρείται U &lt;= Umax";
			if (${"sygkrisiua".$z}<=1)${"elegxosua".$z}="ΙΣΧΥΕΙ U &lt;= Umax";
$pinepar1 .= "<tr><td>Έλεγχος</td><td>" . ${"elegxosua".$z} . "</td></tr>";
$pinepar1 .= "</table><br />";

$pinepar1 .="<br />Όπως προέκυψε A/V = " . number_format(${"aprosv".$z},3,".",",") . " m<sup>-1</sup> το οποίο από τον πίνακα 4.1 αντιστοιχεί σε μέγιστο επιτρεπτό Um,max="
 . number_format(${"umax".$z},3,".",",") . " W/(m²K) (με χρήση γραμμικής παρεμβολής).<br />".
"Στον πίνακα παρακάτω δίνονται συγκεντρωτικά τα εμβαδά των δομικών στοιχείων, τα αθροίσματα των U×A, καθώς και 
τα αθροίσματα των Ψxl. Όπως προκύπτει, ο μέσος συντελεστής θερμοπερατότητας του κτιρίου ισούται με:".
"Um= " . number_format(${"uadiaa".$z},3,".",",") . " W/(m²K) < Um,max= " . number_format(${"umax".$z},3,".",",") . " W/(m²K)".
"<br />Συνεπώς, σύμφωνα με τις ελάχιστες απαιτήσεις του Κ.Εν.Α.Κ. για τον μέσο συντελεστή θερμοπερατότητας Um, το κτίριο  είναι
  επαρκώς  θερμομονωμένο. Στο Τεύχος Υπολογισμών που συνοδεύει την παρούσα μελέτη δίνονται αναλυτικά όλοι οι υπολογισμοί.";
  
}
}  
//Πίνακα παρακάτω ;;;;;

//*********************************************************************************************
//                      ΦΥΛΛΑ ΥΠΟΛΟΓΙΣΜΩΝ                                                     *
//*********************************************************************************************
$f1 = "<table>".
"<tr><td style=\"text-align:left;width:15%;\"><b>Χώροι</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Ζώνη</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Μήκος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Πλάτος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Ύψος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Εμβαδόν</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Όγκος</b></td></tr>";
for($i = 1; $i <= $rows_xwroi; $i++) {
$f1 .= "<tr><td style=\"text-align:left;\">Χώρος $i</td>".
"<td style=\"text-align:center;\">${"xwroi_id_zwnis".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_mikos".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_platos".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_ypsos".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_emvadon".$i}</td>".
"<td style=\"text-align:center;\">${"xwroi_ogkos".$i}</td></tr>";
}
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
$f1 .= "<tr><td style=\"text-align:left;\"><b>Ζώνη $z</b></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"><b>${"synoliko_embadon".$z}</b></td>".
"<td style=\"text-align:center;\"><b>${"synolikos_ogkos".$z}</b></td>".
"<td style=\"text-align:center;\"><b></b></td></tr>";
}
$f1 .= "</table>";
//*********************************************************************************************
$f2 = "<table>".
"<tr><td style=\"text-align:left;width:20%;\"><b>Είδος</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>Εμβαδόν</b></td>".
"<td style=\"text-align:center;width:10%;\"><b>U</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>b</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Κατ. Βάθος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Περίμετρος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>UxA</b></td></tr>";
for($i = 1; $i <= $rows_dapedo; $i++) {
$f2 .= "<tr><td style=\"text-align:left;\">${"dapedo_name".$i}</td>".
"<td style=\"text-align:center;\">${"dapedo_emvadon".$i}</td>".
"<td style=\"text-align:center;\">${"dapedo_u".$i}</td>".
"<td style=\"text-align:center;\">${"dapedo_b".$i}</td>".
"<td style=\"text-align:center;\">${"dapedo_bathos".$i}</td>".
"<td style=\"text-align:center;\">${"dapedo_perimetros".$i}</td>".
"<td style=\"text-align:center;\">${"dapedo_ua".$i}</td></tr>";
}
for($i = 1; $i <= $rows_orofes; $i++) {
$f2 .= "<tr><td style=\"text-align:left;\">${"orofes_name".$i}</td>".
"<td style=\"text-align:center;\">${"orofes_emvadon".$i}</td>".
"<td style=\"text-align:center;\">${"orofes_u".$i}</td>".
"<td style=\"text-align:center;\">${"orofes_b".$i}</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">${"orofes_ua".$i}</td></tr>";
}
$f2 .= "</table>";
//*********************************************************************************************
$f3 = "<table>".
"<tr><td style=\"text-align:left;width:25%;\"><b>Είδος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Ζώνη</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Πλήθος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>Ύψος</b></td>".
"<td style=\"text-align:center;width:15%;\"><b>UxΑ</b></td></tr>";
for ($i = 1; $i <= $rows_es_g; $i++) {
$f3 .= "<tr><td style=\"text-align:left;\">${"thermo_esw_drop".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_esw_id_zwnis".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_esw_gwnia_p".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_esw_gwnia_ypsos".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_esw_gwnia_ua".$i}</td></tr>";
}
for ($i = 1; $i <= $rows_eks_g; $i++) {
$f3 .= "<tr><td style=\"text-align:left;\">${"thermo_eksw_drop".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_eksw_id_zwnis".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_eksw_gwnia_p".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_eksw_gwnia_ypsos".$i}</td>".
"<td style=\"text-align:center;\">${"thermo_eksw_gwnia_ua".$i}</td></tr>";
}
$f3 .= "<tr><td style=\"text-align:left;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\"></td></tr>";
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
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">".number_format(${"dokos_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\"></td>".
"<td style=\"text-align:center;\">".number_format(${"u_dok_".$t.$i},2,".",",")."</td>".
"<td style=\"text-align:center;\">".number_format(${"epifaneia_dokos_".$t.$i},2,".",",")."</td>".
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
if ($p==9)$st=$t_boreia;
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
if ($p==9){$t = "b";$onoma = ${"name_b".$i};$an = "an_b_";}
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
"<td style=\"text-align:center;\">${"thermogefyres_anoig_toixoy_".$t.$i}</td></tr>";
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
$f13 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if ($check_thermzwnes[$z] == 1){

$f13 .= "<table>";
$f13 .= "<tr><td>Ζώνη $z</td></tr>";
$f13 .= "<tr><td>".
"Χρήση: " . ${"xrisi_znx_iliakos".$z}."<br />".
"Απαιτούμενο ποσό ΖΝΧ: " . ${"syntelestis_znx_iliakos_text".$z}."<br />".
"Θερμοκρασία ΖΝΧ: " . $t_znx . " ºC"."<br />".
"Μέση πυκνότητα νερού: 0.998 Kg/lt"."<br />".
"Ειδική θερμότητα νερού: 4.18 KJ/(Kg.K)"."<br />".
"Επιφάνεια ηλιακού: " . ${"iliakos_epifaneia".$z} . " m²"."<br />".
"Vd: ${"vd_text".$z} <br/>".
"Το δίκτυο διανομής είναι μονωμένο σύμφωνα με τις ελάχιστες προδιαγραφές της Τ.Ο.Τ.Ε.Ε. 20701-1/2010 
και με ποσοστό απωλειών 7,5% (πίνακας 4.16).Οι πλευρικές απώλειες των θερμαντήρων λαμβάνονται 2% σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 
20701-1/2010 (παράγραφο 4.8.4) για τοποθέτηση σε εσωτερικό χώρο και οι απώλειες λόγω εναλλάκτη θερμότητας λαμβάνονται 5%. ".
"</td></tr></table>";
$f13 .= "<br><br><table border=\"1\" cellpadding=\"2\" cellspacing=\"0\">".
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
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_jan".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_feb".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_mar".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_apr".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_may".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_jun".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_jul".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_aug".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_sep".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_okt".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_nov".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_day_dec".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Μέσο μηνιαίο θερμικό φορτίο για ΖΝΧ (kWh/ημέρα)</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_jan".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_feb".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_mar".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_apr".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_may".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_jun".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_jul".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_aug".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_sep".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_okt".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_nov".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx_dec".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"fortio_znx".$z},0,".",",")."</h5></td></tr>";
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
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_jan".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_feb".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_mar".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_apr".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_may".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_jun".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_jul".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_aug".$z},1,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_sep".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_okt".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_nov".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_dec".$z},2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"apolavi_aktinov".$z},1,".",",")."</h5></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Ποσοστό κάλυψης αναγκών από ηλιακά (%)</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_jan".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_feb".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_mar".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_apr".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_may".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_jun".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_jul".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_aug".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_sep".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_okt".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_nov".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka_dec".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_iliaka".$z}*100,2,".",",")."</h5></td></tr>";
$f13 .= "<tr><td style=\"text-align:left;\"><h5>Ποσοστό κάλυψης αναγκών υπολοίπων (%)</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_jan".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_feb".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_mar".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_apr".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_may".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_jun".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_jul".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_aug".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_sep".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_okt".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_nov".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr_dec".$z}*100,2,".",",")."</h5></td>".
"<td style=\"text-align:center;\"><h5>".number_format(${"pososto_petr".$z}*100,2,".",",")."</h5></td></tr>";
$f13 .= "</table><br/><br/>";
include("includes/pchart/znx_draw_chart.php");
$f13 .= "<img src=\"http://".$_SERVER['HTTP_HOST']."/kenakv2/includes/PDF/znxchart".$z.".png\" style=\"width:700px;height:230px; border:1px solid black; vertical-align:middle;\" ></img>";
}
}
//*********************************************************************************************
$f14 = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){

${"dieisdysi_aera_kam".$z}=${"kaminades".$z}*20;
${"dieisdysi_aera_thyr".$z}=${"eksaerismos".$z}*10;
${"dieisdysi_aera_syn".$z}=${"dieisdysi_aera_kam".$z}+${"dieisdysi_aera_thyr".$z}+${"dieisdysi_aera".$z};
$f14 .= "<table>";
$f14 .= "<tr><td>Ζώνη $z</td></tr>";
$f14 .= "<tr><td>Η συνολική διείσδυση αέρα από κουφώματα είναι: ". number_format(${"dieisdysi_aera".$z},3,".",",") . " m³/h<br/>".
"Η συνολική διείσδυση αέρα από καμινάδες είναι: ". number_format(${"dieisdysi_aera_kam".$z},3,".",",") . " m³/h<br/>".
"Η συνολική διείσδυση αέρα από θυρίδες εξ. είναι: ". number_format(${"dieisdysi_aera_thyr".$z},3,".",",") . " m³/h<br/>".
"Η συνολική διείσδυση αέρα είναι: ". number_format(${"dieisdysi_aera_syn".$z},3,".",",") . " m³/h<br/>".
"Η απαιτούμενη διείσδυση αέρα είναι: " . number_format(${"apaitoymeni_dieisdysi_aera".$z},3,".",",") . " m³/h<br/>";
if ($check_thermzwnes[$z] == 1){
	if (${"apaitoymeni_dieisdysi_aera".$z} <= ${"dieisdysi_aera_syn".$z}){
	$f14 .="Η απαίτηση ικανοποιείται.";
	}else{
	$f14 .="ΔΕΝ ικανοποιείται η απαίτηση.";
	}
}
else{
$f14 .="O χώρος δεν υπεισέρχεται στον έλεγχο θερμ. επάρκειας και ο συντελεστής αερισμού λαμβάνεται ίσος με 1";
}
$f14 .= "</td></tr></table><br/>";
}

for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if ($check_thermzwnes[$z] == 1){
$f14 .= "Έλεγχος Pgen<br/><br/><table><tr><td>Ζώνη $z</td></tr>
<tr><td>Μετά τον έλεγχο της θερμομονωτικής επάρκειας βρέθηκε P<sub>gen</sub>=A*U<sub>m</sub>*ΔΤ*2,5=".number_format(${"pgen".$z},2,".",",")." KW<br/>";
if (${"pgen".$z} <20) { $f14 .= "Βρέθηκε τιμή μικρότερη των 20KW επομένως Pgen=20KW σύμφωνα με την παρ. 4.2.1.1 της ΤΟΤΕΕ-20701-1.2nd edition";}
$f14 .= "</td></tr></table><br/>";
}
}
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
$maxtd=2;
for ($tab=1;$tab<=4;$tab++){
$sgl=0;
$ntd=1;
//${"toixoi".$tab}="<table><tr>";
${"toixoi".$tab}="";
$t[1]="b";
$t[2]="a";
$t[3]="n";
$t[4]="d";
$strSQL = "SELECT * FROM kataskeyi_t_".$t[$tab];
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$im=0;
while($objResult = mysql_fetch_array($objQuery)){
$im++;
$name=$objResult["name"];
$tl=$objResult["t_mikos"];
$th=$objResult["t_ypsos"];
$dh=$objResult["d_ypsos"];
$yl=$objResult["yp_mikos"];
$yd=$objResult["yp_len"];
if ($yd=="")$yd="0";

$strSQL1 = "SELECT * FROM kataskeyi_an_".$t[$tab]." WHERE id_toixoy=".$objResult["id"];
$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
$k = 0;
while($objResult1 = mysql_fetch_array($objQuery1)){
$k++;
$anw[$k]=$objResult1["anoig_mikos"];
$anh[$k]=$objResult1["anoig_ypsos"];
$anx[$k]=$objResult1["x"];
$any[$k]=$objResult1["y"];
}
$ans=$k;
$anrec="";
for ($k=1;$k<=$ans;$k++){
	$anrec=$anrec.$anw[$k]."|".$anh[$k]."|".$anx[$k]."|".$any[$k];
	if ($k<$ans)$anrec.="^";
}
$gl=300*$tl/$th;
$gh=300;
if ($gl>800){$gl=800;$gh=800*$th/$tl;}
$output="file";
include ('includes/draw_wall.php');
//${"toixoi".$tab}.="<td>Τοίχος <b>".$name."</b> ".number_format($tl,2,".",",")." x ".number_format($th,2,".",",")."<br />";
//${"toixoi".$tab}.="<img src=\"http://localhost/kenakv2/includes/PDF/image".$tab.$im.".png\" style=\"width:".$gl ."px;height:".$gh ."px;\" ></img></td>";
${"toixoi".$tab}.="<br />Τοίχος <b>".$name."</b> ".number_format($tl,2,".",",")." x ".number_format($th,2,".",",")." &nbsp;";
${"toixoi".$tab}.="<img src=\"http://".$_SERVER['HTTP_HOST']."/kenakv2/includes/PDF/image".$tab.$im.".png\" style=\"width:".$gl/2 ."px;height:".$gh/2 ."px; border:1px solid black; vertical-align:middle;\" ></img><br /><br />";
/*
$sgl+=$gl;
$ntd+=1;
if ($sgl>1200 || $ntd>$maxtd){
for ($td=1;$td<=($maxtd-$ntd-1);$td++){${"toixoi".$tab}.="<td>&nbsp;</td>";}
${"toixoi".$tab}.="</tr><tr>";
$sgl=0;
$ntd=1;
}
*/
}
/*
for ($td=1;$td<=($maxtd-$ntd-1);$td++){${"toixoi".$tab}.="<td>&nbsp;</td>";}
${"toixoi".$tab}.="</tr></table>";
*/
}

//ΦΩΤΙΣΜΟΣ
$pinfwtismos = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
if (${"systemlight_rows".$z}==0){
$pinfwtismos .= "<table>";
$pinfwtismos .= "<tr><td>Ζώνη $z</td></tr>";
$pinfwtismos .= "<tr><td>Τα φωτιστικά που θα χρησιμοποιηθούν για τους χώρους για χρήση ". ${"array_leitoyrgias".$z}[0][2].
" και για τους κοινόχρηστους θερμαινόμενους  και μη χώρους, δεν λαμβάνονται υπ’ όψη στους υπολογισμούς.</td></tr>";	
$pinfwtismos .= "</table><br/>";
}
	for ($i=1;$i<=${"systemlight_rows".$z};$i++){
		if (isset(${"systemlight_id_zwnis".$z.$i})){
		
		if (${"systemlight_ayt_elegxoy".$z.$i}==1){${"systemlight_ayt_elegxoy".$z.$i}="Αυτόματος";}
		if (${"systemlight_ayt_elegxoy".$z.$i}==2){${"systemlight_ayt_elegxoy".$z.$i}="Χειροκίνητος";}
		
		if (${"systemlight_ayt_kinisis".$z.$i}==0){${"systemlight_ayt_kinisis".$z.$i}="Χειροκίνητος διακόπτης (αφής/σβέσης)";}
		if (${"systemlight_ayt_kinisis".$z.$i}==1){${"systemlight_ayt_kinisis".$z.$i}="Χειροκίνητος διακόπτης (αφής/σβέσης) και αισθητήρας παρουσίας";}
		if (${"systemlight_ayt_kinisis".$z.$i}==2){${"systemlight_ayt_kinisis".$z.$i}="Ανίχνευση με αυτόματη έναυση / ρύθμιση φωτεινής ροής (dimming)";}
		if (${"systemlight_ayt_kinisis".$z.$i}==3){${"systemlight_ayt_kinisis".$z.$i}="Ανίχνευση με αυτόματo έναυση και σβέση";}
		if (${"systemlight_ayt_kinisis".$z.$i}==4){${"systemlight_ayt_kinisis".$z.$i}="Ανίχνευση με χειροκίνητη έναυση / ρύθμιση φωτεινής ροής (dimming)";}
		if (${"systemlight_ayt_kinisis".$z.$i}==5){${"systemlight_ayt_kinisis".$z.$i}="Ανίχνευση με χειροκίνητη έναυση / αυτόματη σβέση";}
		
		if (${"systemlight_thermotita".$z.$i}==0){${"systemlight_thermotita".$z.$i}="OXI";}
		if (${"systemlight_thermotita".$z.$i}==1){${"systemlight_thermotita".$z.$i}="NAI";}
		
		if (${"systemlight_asfaleia".$z.$i}==0){${"systemlight_asfaleia".$z.$i}="OXI";}
		if (${"systemlight_asfaleia".$z.$i}==1){${"systemlight_asfaleia".$z.$i}="NAI";}
		
		if (${"systemlight_efedreia".$z.$i}==0){${"systemlight_efedreia".$z.$i}="OXI";}
		if (${"systemlight_efedreia".$z.$i}==1){${"systemlight_efedreia".$z.$i}="NAI";}
		
		$pinfwtismos .= "<table>";
		$pinfwtismos .= "<tr><td colspan=\"2\">Ζώνη $z</td></tr>";
		$pinfwtismos .= "<tr><td colspan=\"2\"> Η κατανάλωση ενέργειας για φωτισμό 
		θα υπολογισθεί και θα συμπεριληφθεί στην τελική κατανάλωση πρωτογενούς ενέργειας 
		για την ενεργειακή πιστοποίηση του τμήματος της ζώνης του κτηρίου</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;width:40%;\">Παράμετρος</td>".
		"<td style=\"text-align:center;width:60%;\">Τιμή</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Χρήση ζώνης</td>".
		"<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][2]."</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Στάθμη φωτισμού (lux)</td>".
		"<td style=\"text-align:center;\">".${"array_leitoyrgias".$z}[0][13]."</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Ισχύς (kW)</td>".
		"<td style=\"text-align:center;\">".${"systemlight_isxys".$z.$i}."</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Περιοχή ΦΦ(%)</td>".
		"<td style=\"text-align:center;\">".${"systemlight_perioxi".$z.$i}."</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Αυτοματισμοί ελέγχου ΦΦ </td>".
		"<td style=\"text-align:center;\">".${"systemlight_ayt_elegxoy".$z.$i}."</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Αυτοματισμοί ανίχνευσης κίνησης</td>".
		"<td style=\"text-align:center;\">".${"systemlight_ayt_kinisis".$z.$i}."</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Σύστημα απομάκρυνσης θερμότητας</td>".
		"<td style=\"text-align:center;\">".${"systemlight_thermotita".$z.$i}."</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Φωτισμός ασφαλείας</td>".
		"<td style=\"text-align:center;\">".${"systemlight_asfaleia".$z.$i}."</td></tr>";
		$pinfwtismos .= "<tr><td style=\"text-align:left;\">Σύστημα εφεδρείας</td>".
		"<td style=\"text-align:center;\">".${"systemlight_efedreia".$z.$i}."</td></tr>";
		$pinfwtismos .= "</table>";
		$pinfwtismos .= "<br/><br/>Η διακριτοποίηση των ζωνών έγινε με κριτήριο την μεταβολή 
		της στάθμης φυσικού φωτισμού στην διάρκεια της ημέρας και τον προσανατολισμό τους. 
		Σε κάθε επιμέρους ζώνη θα υπάρχει η δυνατότητα αφής/σβέσης του 50% του συνόλου των φωτιστικών σωμάτων.";
		$pinfwtismos .= "<br/><br/>Η συνολική εγκατεστημένη ισχύς για φωτισμό [W] σε μια θερμική ζώνη υπολογίζεται από τον τύπο των 
		συστημάτων φωτισμού που είναι εγκατεστημένα και την καταγραφή του αριθμού φωτιστικών, των λαμπτήρων 
		και των στραγγαλιστικών πηνίων.";
		$pinfwtismos .= "<br/><br/>Για κατακόρυφα ανοίγματα υπολογίστηκε η περιοχή φωτισμού ως:<br/><br/>
		Βάθος περιοχής φωτισμού: L<sub>ΖΦΦ</sub>=2,5 x h<sub>ΖΦΦ</sub>=2,5 x (h<sub>Π</sub>-h<sub>ΕΕ</sub>)<br/>
		Με:
		<ol>
		<li>h<sub>Π</sub>: ύψος πρεκιού ανοίγματος</li>
		<li>h<sub>ΕΕ</sub>: Ύψος επιφάνειας εργασίας</li>
		<li>L<sub>ΖΦΦ</sub>: Βάθος ζώνης φωτισμού</li>
		</ol>
		<br/><br/>
		Πλάτος περιοχής φωτισμού: W<sub>ΖΦΦ</sub>=W<sub>Π</sub> + 0,5 x L<sub>ΖΦΦ</sub><br/>
		Με:
		<ol>
		<li>L<sub>ΖΦΦ</sub>: Βάθος ζώνης φωτισμού</li>
		<li>W<sub>Π</sub>: Πλάτος παραθύρου</li>
		<li>W<sub>ΖΦΦ</sub>: Πλάτος ζώνης φωτισμού</li>
		</ol>
		<br/>";
		//$pinfwtismos .= "<img src=\"http://".$_SERVER['HTTP_HOST']."/kenakv2/includes/filemanager/userfiles/light_platos.png\" style=\"width:800px;height:463px; vertical-align:middle;\" ></img>";
		$pinfwtismos .= "<br/><br/>Η περιοχή φυσικού φωτισμού από τα ανοίγματα οροφής υπολογίζεται ανάλογα το πλάτος του
		ανοίγματος W<sub>ΑΟ</sub>, το ύψος του χώρου h<sub>K</sub> και το ύψος της επιφάνειας 
		εργασίας h<sub>EE</sub>.
		<br/>
		Η περιοχή που μπορεί να καλυφθεί με φυσικό φωτισμό από ένα άνοιγμα οροφής ορίζεται 
		περιμετρικά με την ευθεία που ξεκινάει από το άνοιγμα οροφής και προσπίπτει επάνω στην 
		επιφάνεια εργασίας (με ύψος h<sub>EE</sub>) με κλίση 30<sup>o</sup>. Για ένα κυκλικό άνοιγμα, η περιοχή στο 
		επίπεδο επιφάνειας εργασίας που καλύπτει το άνοιγμα οροφής θα αντιστοιχεί σε μια κυκλική 
		περιοχή με διάμετρο D<sub>ΖΦΦ</sub> όπως υπολογίζεται από τη σχέση:
		<br/>
		D<sub>ΖΦΦ</sub>=W<sub>ΑΟ</sub> + 2 x (h<sub>K</sub> - h<sub>EE</sub>) x εφ(30<sup>o</sup>)
		<br/>";
		//$pinfwtismos .= "<img src=\"http://".$_SERVER['HTTP_HOST']."/kenakv2/includes/filemanager/userfiles/light_orofis.png\" style=\"width:600px;height:353px; border:1px solid black; vertical-align:middle;\" ></img>";
		}else{
		$pinfwtismos .= "<table>";
		$pinfwtismos .= "<tr><td>Ζώνη $z</td></tr>";
		$pinfwtismos .= "<tr><td>Τα φωτιστικά που θα χρησιμοποιηθούν για τους χώρους για χρήση ". ${"array_leitoyrgias".$z}[0][2].
		" και για τους κοινόχρηστους θερμαινόμενους  και μη χώρους, δεν λαμβάνονται υπ’ όψη στους υπολογισμούς.</td></tr>";	
		$pinfwtismos .= "</table>";
		}
	}
}

//ΥΓΡΑΝΣΗ
$pinygransi = "";
for ($z=1;$z<=$arithmos_thermzwnes;$z++){
	if (${"ygrp_rows".$z}==0){
	$pinygransi .= "<table>";
	$pinygransi .= "<tr><td>Ζώνη $z</td></tr>";
	$pinygransi .= "<tr><td>Δεν εφαρμόζεται σύστημα ύγρανσης στη ζώνη του κτιρίου.</td></tr>";	
	$pinygransi .= "</table><br/>";
	}
	for ($i=1;$i<=${"ygrp_rows".$z};$i++){
		if (isset(${"ygrp_id_zwnis".$z.$i})){
		$pinygransi .= ""; //Χώρος για περιγραφή του συστήματος ύγρανσης
		}
	}
}	

//****************************************************************************************************************
//                          ΜΕΤΑΦΟΡΑ ΤΩΝ ΣΤΟΙΧΕΙΩΝ ΣΤΟ ΤΕΥΧΟΣ                                                    *
//****************************************************************************************************************
$objQuery1 = mysql_query("SELECT * FROM teyxos_template") or die ("Error Query [".$strSQL."]");
while($objResult1[] = mysql_fetch_array($objQuery1));

for ($i=1;$i<=8;$i++){

mysql_query("UPDATE teyxos_f SET text = ' ' WHERE id = ".$i); 

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
$z[8]="{ZNX1}";
$z[9]="{ZNX2}";
$z[10]="{ZNX3}";
$z[11]="{ZNX4}";
$z[12]="{ZNX5}";
$z[13]="{THERMIKIENERGEIA1}";
$z[14]="{PETRELAIO1}";
$z[15]="{HLEKTRIKI1}";

$z1[7]=addslashes($vd_iliakoy_text);
$z1[8]=addslashes($Vstore_text);
$z1[9]=addslashes($eklogi_thermantira_text);
$z1[10]=addslashes($Pn_levita_text);
$z1[11]=addslashes($Pn_levita1_text);
$z1[12]=addslashes($Pn_levita2_text);
$z1[13]=addslashes($apolavi_aktinov_text);
$z1[14]=addslashes($apolavi_aktinov1_text);
$z1[15]=addslashes($apolavi_aktinov2_text);

$z[16]="{PIN5}";
$z1[16]=addslashes($pin5);
$z[17]="{PIN6}";
$z1[17]=addslashes($pin6);
$z[18]="{PIN7}";
$z1[18]=addslashes($pin7);
$z[19]="{PIN8}";
$z1[19]=addslashes($pin8);
$z[20]="{THER1}";
$z1[20]=addslashes($thermansi_value_text);
$z[21]="{THER2}";
$z1[21]=addslashes($thermansi_value_kw_text);
$z[22]="{PIN9}";
$z1[22]=addslashes($pin9);
$z[23]="{KLIM1}";
$z1[23]=addslashes($klimatismos_value_text);
$z[24]="{KLIM2}";
$z1[24]=addslashes($klimatismos_value_kw_text);
$z[25]="{PIN10}";
$z1[25]=addslashes($pin10);
$z[26]="{ZNX6}";
$z1[26]=addslashes($thermansi_value_kw13_text);
$z[27]="{ZNX7}";
$z1[27]=addslashes($znx_pos_kat_text);
$z[28]="{ZNX8}";
$z1[28]=addslashes($znx_pos_synol_text);
$z[29]="{ZNX9}";
$z1[29]=addslashes($pososto_iliaka_text);
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
$z1[69]=addslashes($thermansi_value13_text);

for ($j=1;$j<=4;$j++){
$z[69+$j]="{TOIXOI$j}";
if (!is_null(${"toixoi".$j})){
$z1[69+$j]=addslashes(${"toixoi".$j});
}else{
$z1[69+$j]="";
}}

$z[80]="{XRISIKTIRIO1}";
$z1[80]=$xrisi_ktirio;
$z[81]="{XRISIKTIRIO2}";
$z1[81]=$gen_xrisi_ktirio;
$z[82]="{XRISIZWNI1}";
$z1[82]=$xrisi_textsyn;
$z[83]="{XRISIZWNI2}";
$z1[83]=$xrisi_gen_text;
$z[84]="{XRISIZWNI3}";
$z1[84]=$xrisi_eid_text;

$z[85]="{THERMPTYPE1}";
$z1[85]=$thermp_type_text;
$z[86]="{THERMPPIGI1}";
$z1[86]=$thermp_pigienergy_text;
$z[87]="{COLDPTYPE1}";
$z1[87]=$coldp_type_text;
$z[88]="{COLDPPIGI1}";
$z1[88]=$coldp_pigienergy_text;
$z[89]="{ZNXPTYPE1}";
$z1[89]=$znxp_type_text;
$z[90]="{ZNXPPIGI1}";
$z1[90]=$znxp_pigienergy_text;

$z[91]="{THERMTTYPE1}";
$z1[91]=$thermt_type_text;
$z[92]="{COLDTTYPE1}";
$z1[92]=$coldt_type_text;
$z[93]="{ZNXATYPE1}";
$z1[93]=$znxa_type_text;

$z[94]="{COLDPEER1}";
$z1[94]=$coldp_eer_text;

$z[95]="{SYNTDIEISD1}";
$z1[95]=$syntelestis_dieisdysi_aera_text;

$z[96]="{SYNTZNX1}";
$z1[96]=$syntelestis_znx_iliakos_text;

$z[97]="{PINFWTISMOS}";
$z1[97]=$pinfwtismos;

$z[98]="{PINYGRANSI}";
$z1[98]=$pinygransi;

$z[99]="<table>";
$z1[99]="<table border=\"1\" cellpadding=\"5\" cellspacing=\"0\" style=\"width:100%;\" >";

$teyxos = str_replace($z, $z1, $teyxos);

//*************   Εγγραφή στο teyxos_f  ****************************
$c="";
mysql_query("UPDATE teyxos_f SET text = '".$teyxos."' WHERE id = ".$i) or $c=$i; 
//echo $c;
//if ($c<>"")echo $teyxos;

}

}

?>
