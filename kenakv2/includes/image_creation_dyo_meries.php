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
$platos_toixoy = $_GET['platos_toixoy'];
$apost_ar = $_GET['apost_ar'];
$mikos_ar = $_GET['mikos_ar'];
$apost_de = $_GET['apost_de'];
$mikos_de = $_GET['mikos_de'];
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
 // Φτιάξε το αριστερά εμπόδιο (ολες οι διαστασεις επι 30)
ImageLine($im, 0, 0, ($mikos_ar*30), 0, $black);
ImageLine($im, 0, 10, ($mikos_ar*30), 10, $black);
ImageLine($im, 0, 0, 0, 10, $black);
ImageLine($im, ($mikos_ar*30), 0, ($mikos_ar*30), 10, $black);
//φτιάξε την απόσταση τοίχου και εμποδίου αριστερά
ImageLine($im, 0, 10, 0, (($apost_ar*30)+10), $magenda);
// φτιάξε τον τοίχο
$x1toixos = 0;
$y1toixos = (($apost_ar*30)+10);
$x2toixos = 0;
$y2toixos = ($y1toixos + ($platos_toixoy*30));
ImageLine($im, $x1toixos, $y1toixos, $x2toixos, $y2toixos, $black);
ImageLine($im, ($x1toixos+10), $y1toixos, ($x2toixos+10), $y2toixos, $black);
ImageLine($im, $x1toixos, $y1toixos, ($x1toixos+10), $y1toixos, $black);
ImageLine($im, $x2toixos, $y2toixos, ($x2toixos+10), $y2toixos, $black);
//φτιάξε την απόσταση τοίχου και εμποδίου αριστερά
ImageLine($im, 0, $y2toixos, 0, ($y2toixos + ($apost_de*30)), $magenda);
 // Φτιάξε το δεξί εμπόδιο (ολες οι διαστασεις επι 30)
$y1empoddeksia = ($y2toixos + ($apost_de*30));
ImageLine($im, 0, $y1empoddeksia, ($mikos_de*30), $y1empoddeksia, $black);
ImageLine($im, 0, ($y1empoddeksia + 10), ($mikos_de*30), ($y1empoddeksia + 10), $black);
ImageLine($im, 0, $y1empoddeksia, 0, ($y1empoddeksia+10), $black);
ImageLine($im, ($mikos_de*30), $y1empoddeksia, ($mikos_de*30), ($y1empoddeksia + 10), $black);
//Φτιάξε τη σκίαση αριστερά
$ymesotoixoy = ($y1toixos + (($platos_toixoy * 30)/2));
ImageLine($im, ($mikos_ar*30), 10, 10, $ymesotoixoy, $magenda);
//Φτιάξε τη σκίαση δεξιά
ImageLine($im, ($mikos_de*30), $y1empoddeksia, 10, $ymesotoixoy, $blue);
//Γράψε τις παραμέτρους στην εικόνα
$height = 10;
$angle = 0;
$text0 = "Για το στοιχείo " . $name . " :";
$text1 = "Το πλάτος του τοίχου είναι: " . $platos_toixoy . " m.";
$text2 = "Το μήκος του αρ. εμποδίου είναι: " . $mikos_ar . " m.";
$text3 = "Το μήκος του δεξ. εμποδίου είναι: " . $mikos_de . " m.";
$text4 = "Η απόσταση αριστερά είναι: " . $apost_ar . " m.";
$text5 = "Η απόσταση δεξιά είναι: " . $apost_de . " m.";
$font = 'arial.ttf';
imagefttext($im, 11, $angle, 300, 15, $grey, $font, $text0);
imagefttext($im, $height, $angle, 300, 30, $grey, $font, $text1);
imagefttext($im, $height, $angle, 300, 50, $grey, $font, $text2);
imagefttext($im, $height, $angle, 300, 70, $grey, $font, $text3);
imagefttext($im, $height, $angle, 300, 90, $magenda, $font, $text4);
imagefttext($im, $height, $angle, 300, 110, $magenda, $font, $text5);
//βρες την γνωνία της σκίασης για τοίχο από αριστερά
$tanar = ($mikos_ar / ($apost_ar + ($platos_toixoy/2)));
$deg1 = rad2deg(atan($tanar));
$deg1text = "Η γωνία για τον τοίχο από αριστερά είναι: " . $deg1 . " deg.";
//Γράψε τη γωνία για τον τοίχο αριστερά
imagefttext($im, $height, $angle, 300, 150, $blue, $font, $deg1text);
//βρες την γνωνία της σκίασης για τον τοίχο δεξιά
$tande = ($mikos_de / ($apost_de + ($platos_toixoy/2)));
$deg2 = rad2deg(atan($tande));
$deg2text = "Η γωνία για τον τοίχο από δεξιά είναι: " . $deg2 . " deg.";
//Γράψε τη γωνία για δεξιά
imagefttext($im, $height, $angle, 300, 170, $blue, $font, $deg2text);
// στείλε την PNG εικόνα στο browser
ob_clean();
ImagePNG($im);
// κατέστρεψε τον pointer για την εικόνα στη μνήμη για να απελευθερώσεις πόρους
ImageDestroy($im);
			
?>