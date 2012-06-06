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

//Στο φάκελο includes πρέπει να περιέχεται η γραμματοσειρά. 
//Ανάλογα με το λειτουργικό του χρήστη η διαδρομή αλλάζει και έτσι την καλώ από αυτό το φάκελο
//Δεν έχουν τεθεί λογικά if για το αν ο χρήστης δηλώνει παράλληλα με τον τοίχο και παράθυρο και άνοιγμα.
//Πάρε τα δεδομένα της φόρμας
$ipsos_toixoy = $_GET['ipsost'];
$ipsos_portas = $_GET['ipsosp'];
$ipsos_parath = $_GET['ipsospar'];
$ipsos_podias = $_GET['ipsospod'];
$apost_yalo = $_GET['apostyal'];
$apost_empod = $_GET['apostemp'];
$ypsos_empod = $_GET['ypsosemp'];
$pros = $_GET['pros'];
$name = $_GET['name'];

// θέσε HTTP header type σε PNG
header("Content-type: image/png");
// Θέσε το πλάτος και μήκος της εικόνας σε pixels
$width = 700;
$height = 510;
// Θέσε την εικόνα
$im = ImageCreateTrueColor($width, $height); 
// switch on image antialising if it is available
if (function_exists('imageantialias')) ImageAntiAlias($im, true);
// Θέσε το background σε άσπρο
$white = ImageColorAllocate($im, 255, 255, 255); 
ImageFillToBorder($im, 0, 0, $white, $white);
// Όρισε χρώματα για να το βάλεις στις γραμμές
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$grey = imagecolorallocate($im, 62, 62, 62);
$magenda = imagecolorallocate($im, 174, 49, 194);
$roz = imagecolorallocate($im, 103, 16, 81);
 // Φτιάξε το εμπόδιο αφου είναι ψηλότερο (ολες οι διαστασεις επι 30)
ImageLine($im, 0, 0, 0, ($ypsos_empod*30), $black);
ImageLine($im, 10, 0, 10, ($ypsos_empod*30), $black);
ImageLine($im, 0, 0, 10, 0, $black);
ImageLine($im, 0, ($ypsos_empod*30), 10, ($ypsos_empod*30), $black);
//φτιάξε την απόσταση τοίχου και εμποδίου
ImageLine($im, 10, ($ypsos_empod*30), (($apost_empod*30)+10), ($ypsos_empod*30), $magenda);
// φτιάξε τον τοίχο
$x1toixos = (($apost_empod*30)+10);
$y1toixos = ($ypsos_empod*30);
$x2toixos = (($apost_empod*30)+10);
$y2toixos = (($ypsos_empod*30)-($ipsos_toixoy*30));
ImageLine($im, $x1toixos, $y1toixos, $x2toixos, $y2toixos, $black);
ImageLine($im, ($x1toixos+10), $y1toixos, ($x2toixos+10), $y2toixos, $black);
ImageLine($im, $x1toixos, $y1toixos, ($x1toixos+10), $y1toixos, $black);
ImageLine($im, $x2toixos, $y2toixos, ($x2toixos+10), $y2toixos, $black);

// φτιάξε το άνοιγμα (παράθυρο)
$x1anoig = $x1toixos;
$y1anoig = ($y1toixos - ($ipsos_podias*30));
$x2anoig = $x1toixos;
$y2anoig = ($y1toixos - ($ipsos_podias*30)-($ipsos_parath*30));
ImageLine($im, $x1anoig, $y1anoig, ($x1anoig+10), $y1anoig, $blue);
ImageLine($im, $x1anoig, $y2anoig, ($x1anoig+10), $y2anoig, $blue);

// φτιάξε το άνοιγμα (πόρτα)
$x1porta = $x1toixos;
$y1porta = $y1toixos;
$x2porta = $x1toixos;
$y2porta = ($y1toixos - ($ipsos_portas*30));
ImageLine($im, $x1porta, $y1porta, ($x1porta+10), $y1porta, $roz);
ImageLine($im, $x1porta, $y2porta, ($x1porta+10), $y2porta, $roz);

//Φτιάξε τη σκίαση
$ymesotoixoy = ($y1toixos - (($ipsos_toixoy * 30)/2));
$ymesoanoig = ($y1toixos - (($ipsos_parath * 30)/2) - ($ipsos_podias * 30));
$ymesoporta = ($y1toixos - (($ipsos_portas * 30)/2));
ImageLine($im, 10, 0, $x1toixos, $ymesotoixoy, $black);
ImageLine($im, 10, 0, $x1toixos, $ymesoanoig, $blue);
ImageLine($im, 10, 0, $x1toixos, $ymesoporta, $roz);
//Γράψε τις παραμέτρους στην εικόνα
$height = 10;
$angle = 0;
$text0 = "Για το στοιχείo " . $name . " :";
$text1 = "Το ύψος του τοίχου είναι: " . $ipsos_toixoy . " m.";
$text2 = "Το ύψος του εμποδίου είναι: " . $ypsos_empod . " m.";
$text3 = "Η απόσταση του εμποδίου είναι: " . $apost_empod . " m.";
$text4 = "Το ύψος της πόρτας είναι: " . $ipsos_portas . " m.";
$text5 = "Το ύψος του παραθύρου είναι: " . $ipsos_parath . " m.";
$text6 = "Το ύψος ποδιάς του παραθύρου είναι: " . $ipsos_podias . " m.";

$font = './verdana.ttf';
imagefttext($im, 11, $angle, 300, 15, $grey, $font, $text0);
imagefttext($im, $height, $angle, 300, 30, $grey, $font, $text1);
imagefttext($im, $height, $angle, 300, 50, $grey, $font, $text2);
imagefttext($im, $height, $angle, 300, 70, $magenda, $font, $text3);
imagefttext($im, $height, $angle, 300, 90, $roz, $font, $text4);
imagefttext($im, $height, $angle, 300, 110, $blue, $font, $text5);
imagefttext($im, $height, $angle, 300, 130, $blue, $font, $text6);
//βρες την γνωνία της σκίασης για τοίχο
$tantoixoy = ($ymesotoixoy / ($apost_empod*30));
$deg1 = rad2deg(atan($tantoixoy));
$deg1text = "Η γωνία για τον τοίχο είναι: " . $deg1 . " deg.";
//Γράψε τη γωνία για τον τοίχο
imagefttext($im, $height, $angle, 300, 150, $magenda, $font, $deg1text);
//βρες την γνωνία της σκίασης για το άνοιγμα
$tananoig =  (($ypsos_empod - ($ipsos_portas / 2)) / ($apost_empod+$apost_yalo));
$deg2 = rad2deg(atan($tananoig));
$deg2text = "Η γωνία για το άνοιγμα είναι: " . $deg2 . " deg.";
//Γράψε τη γωνία για το άνοιγμα
imagefttext($im, $height, $angle, 300, 170, $blue, $font, $deg2text);

//βρες την γνωνία της σκίασης για την πόρτα
$tanporta = (($ypsos_empod - ($ipsos_parath / 2) - $ipsos_podias) / ($apost_empod+$apost_yalo));
$deg3 = rad2deg(atan($tanporta));
$deg3text = "Η γωνία για την πόρτα είναι: " . $deg3 . " deg.";
//Γράψε τη γωνία για την πόρτα
imagefttext($im, $height, $angle, 300, 190, $roz, $font, $deg3text);

// στείλε την PNG εικόνα στο browser
ob_clean();
ImagePNG($im);
// κατέστρεψε τον pointer για την εικόνα στη μνήμη για να απελευθερώσεις πόρους
ImageDestroy($im);
			
?>