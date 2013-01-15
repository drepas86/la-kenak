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
$ipsos_toixoy = $_GET['ipsos_toixoy'];
$ipsos_portas = $_GET['ipsos_portas'];
$ipsos_parath = $_GET['ipsos_parath'];
$ipsos_podias = $_GET['ipsos_podias'];
$mikos_prov = $_GET['mikos_prov'];
$apost_yalo = $_GET['apost_yalo'];
$pros = $_GET['pros'];
$name = $_GET['name'];

//Διαστάσεις επί
$dim = 100;
// θέσε HTTP header type σε PNG
header("Content-type: image/png");
// Θέσε το πλάτος και μήκος της εικόνας σε pixels
$width = $mikos_prov*$dim+20;
$height = $ipsos_toixoy*$dim+20;
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
$hatch1='../images/hatch/brick1.png';
$hatch2='../images/hatch/concr.png';
$hatch3='../images/hatch/glass.png';
$values = array();


 // Φτιάξε τον πρόβολο αφου είναι ψηλότερα (ολες οι διαστασεις επι 30)
ImageLine($im, 0, 0, ($mikos_prov*$dim)+10, 0, $black);
ImageLine($im, 0, 10, ($mikos_prov*$dim)+10, 10, $black);
ImageLine($im, 0, 0, 0, 10, $black);
ImageLine($im, ($mikos_prov*$dim)+10, 0, ($mikos_prov*$dim)+10, 10, $black);
//Γέμισμα εμποδίου με μπετό
$imagebg = imageCreateFromPNG ($hatch2); 
imageSetTile ($im, $imagebg);
$values[0]=0;
$values[1]=0;
$values[2]=($mikos_prov*$dim)+10;
$values[3]=0;
$values[4]=($mikos_prov*$dim)+10;
$values[5]=10;
$values[6]=0;
$values[7]=10;
imagefilledpolygon($im, $values, 4, IMG_COLOR_TILED);
imagepolygon($im, $values, 4, $fg);


// φτιάξε τον τοίχο
$x1toixos = 0;
$y1toixos = 10;
$x2toixos = 0;
$y2toixos = (10 + ($ipsos_toixoy*$dim));
ImageLine($im, $x1toixos, $y1toixos, $x2toixos, $y2toixos, $black);
ImageLine($im, ($x1toixos+10), $y1toixos, ($x2toixos+10), $y2toixos, $black);
ImageLine($im, $x1toixos, $y1toixos, ($x1toixos+10), $y1toixos, $black);
ImageLine($im, $x2toixos, $y2toixos, ($x2toixos+10), $y2toixos, $black);
//Γέμισμα τοίχου με τούβλο
$imagebg = imageCreateFromPNG ($hatch1); 
imageSetTile ($im, $imagebg);
$values[0]=$x1toixos;
$values[1]=$y1toixos;
$values[2]=$x1toixos+10;
$values[3]=$y1toixos;
$values[4]=$x1toixos+10;
$values[5]=$y2toixos;
$values[6]=$x1toixos;
$values[7]=$y2toixos;
imagefilledpolygon($im, $values, 4, IMG_COLOR_TILED);
imagepolygon($im, $values, 4, $fg);

// φτιάξε το άνοιγμα (πόρτα)
$x1porta = $x1toixos;
$y1porta = $y2toixos;
$x2porta = $x1toixos;
$y2porta = ($y2toixos - ($ipsos_portas*$dim));
ImageLine($im, $x1porta, $y1porta, ($x1porta+10), $y1porta, $roz);
ImageLine($im, $x1porta, $y2porta, ($x1porta+10), $y2porta, $roz);
//Γέμισμα ανοίγματος με γυαλί
$imagebg = imageCreateFromPNG ($hatch3); 
imageSetTile ($im, $imagebg);
$values[0]=$x1porta;
$values[1]=$y1porta;
$values[2]=$x1porta+10;
$values[3]=$y1porta;
$values[4]=$x1porta+10;
$values[5]=$y2porta;
$values[6]=$x1porta;
$values[7]=$y2porta;
imagefilledpolygon($im, $values, 4, IMG_COLOR_TILED);
imagepolygon($im, $values, 4, $fg);

// φτιάξε το άνοιγμα (παράθυρο)
$x1anoig = 0;
$y1anoig = ($y2toixos - ($ipsos_podias*$dim));
$x2anoig = $x1toixos;
$y2anoig = ($y2toixos - ($ipsos_podias*$dim)-($ipsos_parath*$dim));
ImageLine($im, $x1anoig, $y1anoig, ($x1anoig+10), $y1anoig, $blue);
ImageLine($im, $x1anoig, $y2anoig, ($x1anoig+10), $y2anoig, $blue);
//Γέμισμα ανοίγματος με γυαλί
$imagebg = imageCreateFromPNG ($hatch3); 
imageSetTile ($im, $imagebg);
$values[0]=$x1anoig;
$values[1]=$y1anoig;
$values[2]=$x1anoig+10;
$values[3]=$y1anoig;
$values[4]=$x1anoig+10;
$values[5]=$y2anoig;
$values[6]=$x1anoig;
$values[7]=$y2anoig;
imagefilledpolygon($im, $values, 4, IMG_COLOR_TILED);
imagepolygon($im, $values, 4, $fg);



//Φτιάξε τη σκίαση
$ymesotoixoy = ($y2toixos - (($ipsos_toixoy * $dim)/2));
$ymesoanoig = ($y2toixos - (($ipsos_parath * $dim)/2) - ($ipsos_podias * $dim));
$ymesoporta = ($y2toixos - (($ipsos_portas * $dim)/2));
ImageLine($im, ($mikos_prov*$dim)+10, 10, 10, $ymesotoixoy, $black);
ImageLine($im, ($mikos_prov*$dim)+10, 10, 10, $ymesoanoig, $blue);
ImageLine($im, ($mikos_prov*$dim)+10, 10, 10, $ymesoporta, $roz);
//Γράψε τις παραμέτρους στην εικόνα
$height = 10;
$angle = 0;
$text0 = $name;
$text1 = "Το ύψος του τοίχου είναι: " . $ipsos_toixoy . " m.";
$text2 = "Το μήκος του προβόλου είναι: " . $mikos_prov . " m.";
$text3 = "Το ύψος της πόρτας είναι: " . $ipsos_portas . " m.";
$text4 = "Το ύψος του παραθύρου είναι: " . $ipsos_parath . " m.";
$text5 = "Το ύψος ποδιάς του παραθύρου είναι: " . $ipsos_podias . " m.";
$font = 'verdana.ttf';
imagefttext($im, 11, $angle, ($mikos_prov*$dim)/2, ($ipsos_toixoy * $dim)/2, $grey, $font, $text0);
/*
imagefttext($im, $height, $angle, 300, 30, $grey, $font, $text1);
imagefttext($im, $height, $angle, 300, 50, $grey, $font, $text2);
imagefttext($im, $height, $angle, 300, 70, $magenda, $font, $text3);
imagefttext($im, $height, $angle, 300, 90, $roz, $font, $text4);
imagefttext($im, $height, $angle, 300, 110, $grey, $font, $text5);
imagefttext($im, $height, $angle, 300, 130, $grey, $font, $text6);
*/
//βρες την γνωνία της σκίασης για τοίχο
$tantoixoy = ($mikos_prov  / ($ipsos_toixoy / 2));
$deg1 = rad2deg(atan($tantoixoy));
$deg1text = "Η γωνία για τον τοίχο είναι: " . $deg1 . " deg.";
//βρες την γνωνία της σκίασης για το άνοιγμα
$tananoig = (($mikos_prov+$apost_yalo) / ($ipsos_toixoy - $ipsos_podias - ($ipsos_parath/2)));
$deg2 = rad2deg(atan($tananoig));
$deg2text = "Η γωνία για το άνοιγμα είναι: " . $deg2 . " deg.";
//βρες την γνωνία της σκίασης για την πόρτα
$tanpo = (($mikos_prov+$apost_yalo) / ($ipsos_toixoy -($ipsos_portas/2)));;
$deg3 = rad2deg(atan($tanpo));
$deg3text = "Η γωνία για την πόρτα είναι: " . $deg3 . " deg.";
/*
//Γράψε τη γωνία για τον τοίχο
imagefttext($im, $height, $angle, 300, 150, $magenda, $font, $deg1text);
//Γράψε τη γωνία για το άνοιγμα
imagefttext($im, $height, $angle, 300, 170, $blue, $font, $deg2text);
//Γράψε τη γωνία για την πόρτα
imagefttext($im, $height, $angle, 300, 190, $roz, $font, $deg3text);
*/
// στείλε την PNG εικόνα στο browser
ob_clean();
ImagePNG($im);
// κατέστρεψε τον pointer για την εικόνα στη μνήμη για να απελευθερώσεις πόρους
ImageDestroy($im);
			
?>