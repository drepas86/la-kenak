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
if ($sel_page["id"] == 5)	{ 
echo "<h2>ΚΕΝΑΚ - Τεύχος</h2>";
echo "<img src=\"images/style/word.png\"></img>";


$strSQL = "SELECT * FROM kataskeyi_teyxos";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult[] = mysql_fetch_array($objQuery));
$intro1 = $objResult[0]["text"];
$intro2 = $objResult[1]["text"];
$intro3 = $objResult[2]["text"];

$genikiperigrafi = $objResult[3]["text"];
$genikastoixeiaktirioy = $objResult[4]["text"];
$topografiaoikopedoy = $objResult[5]["text"];
$tekmiriwsi1 = $objResult[6]["text"];
$tekmiriwsi2 = $objResult[7]["text"];
$tekmiriwsi3 = $objResult[8]["text"];
$tekmiriwsi4 = $objResult[9]["text"];
$tekmiriwsi5 = $objResult[10]["text"];
$tekmiriwsi6 = $objResult[11]["text"];
$tekmiriwsi7 = $objResult[12]["text"];
$tekmiriwsi8 = $objResult[13]["text"];
$tekmiriwsi9 = $objResult[14]["text"];
$tekmiriwsi10 = $objResult[15]["text"];
$tekmiriwsi11 = $objResult[16]["text"];
$tekmiriwsi12 = $objResult[17]["text"];

$xwrothetisiktirioy = $objResult[18]["text"];
$xwrothetisileitoyrgiwn = $objResult[19]["text"];
$ilioprostasiaanoig = $objResult[20]["text"];
$fysikosfwtismos = $objResult[21]["text"];
$fysikosdrosismos = $objResult[22]["text"];
$pathitikailiakasyst = $objResult[23]["text"];
$diamorfwsiperiv = $objResult[24]["text"];

$kelyfos1 = $objResult[25]["text"];
$kelyfos2 = $objResult[26]["text"];
$kelyfos3 = $objResult[27]["text"];
$kelyfos4 = $objResult[28]["text"];
$kelyfos5 = $objResult[29]["text"];
$kelyfos6 = $objResult[30]["text"];
$kelyfos7 = $objResult[31]["text"];

$thermoeparkeia1 = $objResult[32]["text"];
$kataskeyastikeslyseis1 = $objResult[33]["text"];

$thermansisxediasmos = $objResult[34]["text"];
$psyksisxediasmos = $objResult[35]["text"];
$elthermansi1 = $objResult[36]["text"];
$elthermansi2 = $objResult[37]["text"];
$elthermansi3 = $objResult[38]["text"];
$elthermansi4 = $objResult[39]["text"];
$elthermansi5 = $objResult[40]["text"];
$elthermansi6 = $objResult[41]["text"];
$elthermansi7 = $objResult[42]["text"];
$elpsyksi1 = $objResult[43]["text"];
$elpsyksi2 = $objResult[44]["text"];
$elpsyksi3 = $objResult[45]["text"];
$elznx1 = $objResult[46]["text"];
$elznx2 = $objResult[47]["text"];
$elznx3 = $objResult[48]["text"];
$elznx4 = $objResult[49]["text"];

$egiliaka1 = $objResult[50]["text"];
$egiliaka2 = $objResult[51]["text"];
$egiliaka3 = $objResult[52]["text"];
$egiliaka4 = $objResult[53]["text"];
$egiliaka5 = $objResult[54]["text"];
$egiliaka6 = $objResult[55]["text"];
$egiliaka7 = $objResult[56]["text"];

$egfwtismos1 = $objResult[57]["text"];
$egfwtismos2 = $objResult[58]["text"];
$egfwtismos3 = $objResult[59]["text"];
$enalaktiki1 = $objResult[60]["text"];
$enalaktiki2 = $objResult[61]["text"];
$enalaktiki3 = $objResult[62]["text"];

$kelyfos3331 = $objResult[63]["text"];
$kelyfos3332 = $objResult[64]["text"];
$kelyfos3333 = $objResult[65]["text"];
$kelyfos3334 = $objResult[66]["text"];
$kelyfos3335 = $objResult[67]["text"];

echo "<div id=\"tabvanilla\" class=\"widget\">";
echo "<ul class=\"tabnav\">";
echo "<li><a href=\"#kef1\">Κεφ. 1</a></li>";
echo "<li><a href=\"#kef2\">Κεφ. 2-3</a></li>";
echo "<li><a href=\"#kef3\">Κεφ. 3.x</a></li>";
echo "<li><a href=\"#kef4\">Κεφ. 4</a></li>";	
echo "<li><a href=\"#kef5\">Κεφ. 5</a></li>";
echo "<li><a href=\"#kef51\">Κεφ. 5.2.2</a></li>";
echo "<li><a href=\"#kef52\">Κεφ. 5.3-5.5</a></li>";
echo "<li><a href=\"#kef6\">Κεφ. 6.3.3</a></li>";
echo "</ul>";

	
echo "<div id=\"kef1\" class=\"tabdiv\">";
//Φόρμα εισαγωγής τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"5\">1.Εισαγωγή </font><br/><br/>";
echo "<textarea name=\"intro1\"  rows=\"8\" cols=\"150\">" . $intro1 . "</textarea>";
echo "<textarea name=\"intro2\"  rows=\"10\" cols=\"150\">" . $intro2 . "</textarea>";
echo "<textarea name=\"intro3\"  rows=\"8\" cols=\"150\">" . $intro3 . "</textarea>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_intro\" value=\"Τροποποίηση εισαγωγής\">";
echo "</form>";
echo "<br/><br/>";

echo "</div>";


echo "<div id=\"kef2\" class=\"tabdiv\">";
//Φόρμα Κεφ1 τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"4\">2.Γενική περιγραφή κτηρίου </font><br/><br/>";
echo "<textarea name=\"genikiperigrafi\"  rows=\"5\" cols=\"150\">" . $genikiperigrafi . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">2.1.Γενικά στοιχεία κτηρίου </font><br/><br/>";
echo "<textarea name=\"genikastoixeiaktirioy\"  rows=\"5\" cols=\"150\">" . $genikastoixeiaktirioy . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">2.2.Τοπογραφία οικοπέδου </font><br/><br/>";
echo "<textarea name=\"topografiaoikopedoy\"  rows=\"5\" cols=\"150\">" . $topografiaoikopedoy . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">3.Τεκμηρίωση Αρχιτεκτονικού σχεδιασμού του κτηρίου </font><br/><br/>";
echo "<textarea name=\"tekmiriwsi1\"  rows=\"5\" cols=\"150\">" . $tekmiriwsi1 . "</textarea>";
echo "<textarea name=\"tekmiriwsi2\"  rows=\"1\" cols=\"150\">" . $tekmiriwsi2 . "</textarea>";
echo "<textarea name=\"tekmiriwsi3\"  rows=\"2\" cols=\"150\">" . $tekmiriwsi3 . "</textarea>";
echo "<textarea name=\"tekmiriwsi4\"  rows=\"2\" cols=\"150\">" . $tekmiriwsi4 . "</textarea>";
echo "<textarea name=\"tekmiriwsi5\"  rows=\"2\" cols=\"150\">" . $tekmiriwsi5 . "</textarea>";
echo "<textarea name=\"tekmiriwsi6\"  rows=\"2\" cols=\"150\">" . $tekmiriwsi6 . "</textarea>";
echo "<textarea name=\"tekmiriwsi7\"  rows=\"2\" cols=\"150\">" . $tekmiriwsi7 . "</textarea>";
echo "<textarea name=\"tekmiriwsi8\"  rows=\"2\" cols=\"150\">" . $tekmiriwsi8 . "</textarea>";
echo "<textarea name=\"tekmiriwsi9\"  rows=\"3\" cols=\"150\">" . $tekmiriwsi9 . "</textarea>";
echo "<textarea name=\"tekmiriwsi10\"  rows=\"4\" cols=\"150\">" . $tekmiriwsi10 . "</textarea>";
echo "<textarea name=\"tekmiriwsi11\"  rows=\"1\" cols=\"150\">" . $tekmiriwsi11 . "</textarea>";
echo "<textarea name=\"tekmiriwsi12\"  rows=\"3\" cols=\"150\">" . $tekmiriwsi12 . "</textarea>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_kef1\" value=\"Τροποποίηση Κεφαλαίου 2 και 3\">";
echo "</form>";
echo "<br/><br/>";
echo "</div>";

echo "<div id=\"kef3\" class=\"tabdiv\">";
//Φόρμα Κεφ2 τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"4\">3.1.Xωροθέτηση κτηρίου στο οικόπεδο </font><br/><br/>";
echo "<textarea name=\"xwrothetisiktirioy\"  rows=\"5\" cols=\"150\">" . $xwrothetisiktirioy . "</textarea><br/><br/>";
echo "<font color=\"blue\" size=\"4\">3.2.Xωροθέτηση λειτουργιών στο κτήριο </font><br/><br/>";
echo "<textarea name=\"xwrothetisileitoyrgiwn\"  rows=\"5\" cols=\"150\">" . $xwrothetisileitoyrgiwn . "</textarea><br/><br/>";
echo "<font color=\"blue\" size=\"4\">3.3.Ηλιοπροστασία ανοιγμάτων </font><br/><br/>";
echo "<textarea name=\"ilioprostasiaanoig\"  rows=\"5\" cols=\"150\">" . $ilioprostasiaanoig . "</textarea><br/><br/>";
echo "<font color=\"blue\" size=\"4\">3.4.Φυσικός φωτισμός </font><br/><br/>";
echo "<textarea name=\"fysikosfwtismos\"  rows=\"5\" cols=\"150\">" . $fysikosfwtismos . "</textarea><br/><br/>";
echo "<font color=\"blue\" size=\"4\">3.5.Φυσικός δροσισμός </font><br/><br/>";
echo "<textarea name=\"fysikosdrosismos\"  rows=\"5\" cols=\"150\">" . $fysikosdrosismos . "</textarea><br/><br/>";
echo "<font color=\"blue\" size=\"4\">3.6.Παθητικά ηλιακά συστήματα κτηρίου </font><br/><br/>";
echo "<textarea name=\"pathitikailiakasyst\"  rows=\"5\" cols=\"150\">" . $pathitikailiakasyst . "</textarea><br/><br/>";
echo "<font color=\"blue\" size=\"4\">3.7.Διαμόρφωση του περιβάλλοντος χώρου για τη βελτίωση του μικροκλίματος </font><br/><br/>";
echo "<textarea name=\"diamorfwsiperiv\"  rows=\"5\" cols=\"150\">" . $diamorfwsiperiv . "</textarea>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_kef2\" value=\"Τροποποίηση Υπο-ενοτήτων 3.χ\">";
echo "</form>";
echo "<br/><br/>";

echo "</div>";


echo "<div id=\"kef4\" class=\"tabdiv\">";
//Φόρμα Κεφ4 τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"4\">4.1.Γενικά στοιχεία κτηριακού κελύφους </font><br/><br/>";
echo "<textarea name=\"kelyfos1\"  rows=\"3\" cols=\"150\">" . $kelyfos1 . "</textarea><br/>";
echo "<textarea name=\"kelyfos2\"  rows=\"3\" cols=\"150\">" . $kelyfos2 . "</textarea><br/>";
echo "<textarea name=\"kelyfos3\"  rows=\"3\" cols=\"150\">" . $kelyfos3 . "</textarea><br/>";
echo "<textarea name=\"kelyfos4\"  rows=\"3\" cols=\"150\">" . $kelyfos4 . "</textarea><br/>";
echo "<textarea name=\"kelyfos5\"  rows=\"1\" cols=\"150\">" . $kelyfos5 . "</textarea><br/>";
echo "<textarea name=\"kelyfos6\"  rows=\"1\" cols=\"150\">" . $kelyfos6 . "</textarea><br/>";
echo "<textarea name=\"kelyfos7\"  rows=\"3\" cols=\"150\">" . $kelyfos7 . "</textarea><br/>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_kef3\" value=\"Τροποποίηση Κεφαλαίου 4.1\">";
echo "</form>";
echo "<br/><br/>";



//Φόρμα Κεφ4 τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"4\">4.3.Έλεγχος θερμομονωτικής επάρκειας διαφανών δομικών στοιχείων </font><br/><br/>";
echo "<textarea name=\"thermoeparkeia1\"  rows=\"8\" cols=\"150\">" . $thermoeparkeia1 . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">4.4.1.Κατασκευαστικές Λύσεις Που Υιοθετήθηκαν Για Τη Μείωση Των Θερμικών Απωλειών Λόγω Θερμογεφυρών</font><br/><br/>";
echo "<textarea name=\"kataskeyastikeslyseis1\"  rows=\"5\" cols=\"150\">" . $kataskeyastikeslyseis1 . "</textarea><br/>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_kef4\" value=\"Τροποποίηση Κεφαλαίου 4.3 και 4.4\">";
echo "</form>";
echo "<br/><br/>";

echo "</div>";


echo "<div id=\"kef5\" class=\"tabdiv\">";
//Φόρμα Κεφ5 τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"4\">5.1.Σχεδιασμός συστημάτων θέρμανσης/ψύξης/αερισμού </font><br/><br/>";
echo "<textarea name=\"thermansisxediasmos\"  rows=\"4\" cols=\"150\">" . $thermansisxediasmos . "</textarea><br/>";
echo "<textarea name=\"psyksisxediasmos\"  rows=\"4\" cols=\"150\">" . $psyksisxediasmos . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">5.1.1.Ελάχιστες Προδιαγραφές Συστήματος Θέρμανσης Χώρων </font><br/><br/>";
echo "<textarea name=\"elthermansi1\"  rows=\"2\" cols=\"150\">" . $elthermansi1 . "</textarea><br/>";
echo "<textarea name=\"elthermansi2\"  rows=\"2\" cols=\"150\">" . $elthermansi2 . "</textarea><br/>";
echo "<textarea name=\"elthermansi3\"  rows=\"2\" cols=\"150\">" . $elthermansi3 . "</textarea><br/>";
echo "<textarea name=\"elthermansi4\"  rows=\"3\" cols=\"150\">" . $elthermansi4 . "</textarea><br/>";
echo "<textarea name=\"elthermansi5\"  rows=\"6\" cols=\"150\">" . $elthermansi5 . "</textarea><br/>";
echo "<textarea name=\"elthermansi6\"  rows=\"6\" cols=\"150\">" . $elthermansi6 . "</textarea><br/>";
echo "<textarea name=\"elthermansi7\"  rows=\"5\" cols=\"150\">" . $elthermansi7 . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">5.1.2.Ελάχιστες Προδιαγραφές Συστήματος ψύξης Χώρων </font><br/><br/>";
echo "<textarea name=\"elpsyksi1\"  rows=\"2\" cols=\"150\">" . $elpsyksi1 . "</textarea><br/>";
echo "<textarea name=\"elpsyksi3\"  rows=\"4\" cols=\"150\">" . $elpsyksi3 . "</textarea><br/>";
echo "<textarea name=\"elpsyksi2\"  rows=\"2\" cols=\"150\">" . $elpsyksi2 . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">5.2.1.Ελάχιστες προδιαγραφές συστήματος για την παραγωγή ΖΝΧ </font><br/><br/>";
echo "<textarea name=\"elznx1\"  rows=\"3\" cols=\"150\">" . $elznx1 . "</textarea><br/>";
echo "<textarea name=\"elznx2\"  rows=\"3\" cols=\"150\">" . $elznx2 . "</textarea><br/>";
echo "<textarea name=\"elznx3\"  rows=\"3\" cols=\"150\">" . $elznx3 . "</textarea><br/>";
echo "<textarea name=\"elznx4\"  rows=\"3\" cols=\"150\">" . $elznx4 . "</textarea><br/>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_kef5\" value=\"Τροποποίηση Κεφαλαίου 5\">";
echo "</form>";
echo "<br/><br/>";

echo "</div>";


echo "<div id=\"kef51\" class=\"tabdiv\">";
//Φόρμα Κεφ51 τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"4\">5.2.2.Τεκμηρίωση Εγκατάστασης Ηλιακών Συλλεκτών </font><br/><br/>";
echo "<textarea name=\"egiliaka1\"  rows=\"4\" cols=\"150\">" . $egiliaka1 . "</textarea><br/>";
echo "<textarea name=\"egiliaka2\"  rows=\"4\" cols=\"150\">" . $egiliaka2 . "</textarea><br/>";
echo "<textarea name=\"egiliaka3\"  rows=\"4\" cols=\"150\">" . $egiliaka3 . "</textarea><br/>";
echo "<textarea name=\"egiliaka4\"  rows=\"4\" cols=\"150\">" . $egiliaka4 . "</textarea><br/>";
echo "<textarea name=\"egiliaka5\"  rows=\"4\" cols=\"150\">" . $egiliaka5 . "</textarea><br/>";
echo "<textarea name=\"egiliaka6\"  rows=\"4\" cols=\"150\">" . $egiliaka6 . "</textarea><br/>";
echo "<textarea name=\"egiliaka7\"  rows=\"4\" cols=\"150\">" . $egiliaka7 . "</textarea><br/>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_kef51\" value=\"Τροποποίηση Κεφαλαίου 5.2.2\">";
echo "</form>";
echo "<br/><br/>";

echo "</div>";



echo "<div id=\"kef52\" class=\"tabdiv\">";
//Φόρμα Κεφ51 τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"4\">5.3.Σχεδιασμός συστήματος φωτισμού </font><br/><br/>";
echo "<textarea name=\"egfwtismos1\"  rows=\"4\" cols=\"150\">" . $egfwtismos1 . "</textarea><br/>";
echo "<textarea name=\"egfwtismos2\"  rows=\"4\" cols=\"150\">" . $egfwtismos2 . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">5.4.Διόρθωση συνημιτόνου </font><br/><br/>";
echo "<textarea name=\"egfwtismos3\"  rows=\"2\" cols=\"150\">" . $egfwtismos3 . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">5.5.Σκοπιμότητα εφαρμογή εναλλακτικών λύσεων σχεδιασμού των Η/Μ συστημάτων του κτηρίου </font><br/><br/>";
echo "<textarea name=\"enalaktiki1\"  rows=\"2\" cols=\"150\">" . $enalaktiki1 . "</textarea><br/>";
echo "<textarea name=\"enalaktiki2\"  rows=\"2\" cols=\"150\">" . $enalaktiki2 . "</textarea><br/>";
echo "<textarea name=\"enalaktiki3\"  rows=\"3\" cols=\"150\">" . $enalaktiki3 . "</textarea><br/>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_kef52\" value=\"Τροποποίηση Κεφαλαίου 5.3-5.5\">";
echo "</form>";
echo "<br/><br/>";

echo "</div>";


echo "<div id=\"kef6\" class=\"tabdiv\">";
//Φόρμα Κεφ51 τεύχους
echo "<form name=\"frmteyxos\" action=\"kenak.php\" method=\"post\">";
echo "<font color=\"blue\" size=\"4\">6.3.3.Κέλυφος τμήματος κατοικιών </font><br/><br/>";
echo "<font color=\"blue\" size=\"4\">6.3.3.1.Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με τον εξωτερικό αέρα </font><br/><br/>";
echo "<textarea name=\"kelyfos3331\"  rows=\"4\" cols=\"150\">" . $kelyfos3331 . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">6.3.3.2.Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με το έδαφος </font><br/><br/>";
echo "<textarea name=\"kelyfos3332\"  rows=\"4\" cols=\"150\">" . $kelyfos3332 . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">6.3.3.3.Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με μη θερμαινόμενους χώρους </font><br/><br/>";
echo "<textarea name=\"kelyfos3333\"  rows=\"4\" cols=\"150\">" . $kelyfos3333 . "</textarea><br/>";
echo "<font color=\"blue\" size=\"4\">6.3.3.4.Δεδομένα για διαφανή δομικά στοιχεία κατοικιών </font><br/><br/>";
echo "<textarea name=\"kelyfos3334\"  rows=\"4\" cols=\"150\">" . $kelyfos3334 . "</textarea><br/>";
echo "<textarea name=\"kelyfos3335\"  rows=\"4\" cols=\"150\">" . $kelyfos3333 . "</textarea><br/>";
echo "<br/><br/>";
echo "<input type=\"submit\" name=\"update_kef6\" value=\"Τροποποίηση Κεφαλαίου 6.3.3\">";
echo "</form>";
echo "<br/><br/>";

echo "</div>";
echo "</div>";
} 

?>