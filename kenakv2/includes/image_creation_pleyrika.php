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
$platos_toixoy = $_GET['platost'];
$apost_empod = $_GET['aposte'];
$platos_anoig = $_GET['platosa'];
$apost_anoig_empod = $_GET['aposta'];
$mikos_empod = $_GET['mikose'];
$name = $_GET['name'];
$apost_yalo = $_GET['apost_yalo'];

// θέσε HTTP header type σε PNG
header("Content-type: image/png");
// Θέσε το πλάτος και μήκος της εικόνας σε pixels
$width = 500;
$height = 250;
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
 // Φτιάξε τον τοίχο ανάλογα με το πλάτος του (ολες οι διαστασεις επι 30)
ImageLine($im, 0, 0, 0, ($platos_toixoy*30), $black);
ImageLine($im, 10, 0, 10, ($platos_toixoy*30), $black);
ImageLine($im, 0, 0, 10, 0, $black);
ImageLine($im, 0, ($platos_toixoy*30), 10, ($platos_toixoy*30), $black);
// φτιάξε το εμπόδιο
$yempod = (($platos_toixoy * 30) + ($apost_empod * 30));
$x2empod = ($mikos_empod * 30);
ImageLine($im, 0, $yempod, $x2empod, $yempod, $black);
ImageLine($im, 0, $yempod+10, $x2empod, $yempod+10, $black);
ImageLine($im, 0, $yempod, 0, $yempod+10, $black);
ImageLine($im, $x2empod, $yempod, $x2empod, $yempod+10, $black);
// φτιάξε το άνοιγμα
$temp = ($apost_anoig_empod * 30) - ($apost_empod * 30);
$y2anoig = (($platos_toixoy * 30) - $temp);
$y1anoig = ($y2anoig - ($platos_anoig * 30));
ImageLine($im, 0, $y2anoig, 10, $y2anoig, $black);
ImageLine($im, 0, $y1anoig, 10, $y1anoig, $black);
//Φτιάξε τη σκίαση
$ymesotoixoy = (($platos_toixoy * 30)/2);
$mesoanoig = (($platos_anoig * 30)/2);
$ymesoanoig = ($mesoanoig + $y1anoig);
ImageLine($im, 10, $ymesotoixoy, $x2empod, $yempod, $black);
ImageLine($im, 10, $ymesoanoig, $x2empod, $yempod, $blue);
//Γράψε τις παραμέτρους στην εικόνα
$height = 10;
$angle = 0;
$text0 = "Για το στοιχείo " . $name . " :";
$text1 = "Το μήκος του τοίχου είναι: " . $platos_toixoy . " m.";
$text2 = "Το μήκος του εμποδίου είναι: " . $mikos_empod . " m.";
$text3 = "Το μήκος του ανοίγματος είναι: " . $platos_anoig . " m.";
$text4 = "Η απόσταση του εμποδίου από τον τοίχο είναι: " . $apost_empod . " m.";
$text5 = "Η απόσταση του εμποδίου από το άνοιγμα είναι: " . $apost_anoig_empod . " m.";
$font = './arial.ttf';
imagefttext($im, 11, $angle, 150, 15, $blue, $font, $text0);
imagefttext($im, $height, $angle, 150, 30, $blue, $font, $text1);
imagefttext($im, $height, $angle, 150, 50, $blue, $font, $text2);
imagefttext($im, $height, $angle, 150, 70, $blue, $font, $text3);
imagefttext($im, $height, $angle, 150, 90, $blue, $font, $text4);
imagefttext($im, $height, $angle, 150, 110, $blue, $font, $text5);
//βρες την γνωνία της σκίασης για τοίχο
$tantoixoy = ((($platos_toixoy / 2) + $apost_empod) / $mikos_empod);
$deg1 = (90 - rad2deg(atan($tantoixoy)));
$deg1text = "Η γωνία για τον τοίχο είναι: " . $deg1 . " deg.";
//Γράψε τη γωνία για τον τοίχο
imagefttext($im, $height, $angle, 150, 140, $blue, $font, $deg1text);
//βρες την γνωνία της σκίασης για το άνοιγμα
$tananoig = ((($platos_anoig / 2) + $apost_anoig_empod) / ($mikos_empod+$apost_yalo));
$deg2 = (90 - rad2deg(atan($tananoig)));
$deg2text = "Η γωνία για το άνοιγμα είναι: " . $deg2 . " deg.";
//Γράψε τη γωνία για το άνοιγμα
imagefttext($im, $height, $angle, 150, 160, $blue, $font, $deg2text);
// στείλε την PNG εικόνα στο browser
ob_clean();
ImagePNG($im);
// κατέστρεψε τον pointer για την εικόνα στη μνήμη για να απελευθερώσεις πόρους
ImageDestroy($im);
			
?>