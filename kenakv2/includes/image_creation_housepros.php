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

include ('database.php');
require_once("connection.php");
require_once("functions.php");

header("Content-type: image/png");

// Θέσε το πλάτος και μήκος της εικόνας σε pixels
$width = 300;
$height = 300; 
// Θέσε την εικόνα
$im = ImageCreateTrueColor($width, $height); 

// switch on image antialising if it is available
if (function_exists('imageantialias')) ImageAntiAlias($im, true);

// Όρισε χρώματα
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$grey = imagecolorallocate($im, 62, 62, 62);
$magenda = imagecolorallocate($im, 174, 49, 194);
$roz = imagecolorallocate($im, 103, 16, 81);
$font = 'arial.ttf';


ImageFillToBorder($im, 0, 0, $white, $white);
/*
ImageLine($im, $width/2, 20, $width/2, $height-100, $magenda);
$tileimage = imageCreateFromPNG('../images/hatch/brick.png');
imageSetTile ($im, $tileimage);
imagefilledrectangle($im, 50,50,$width-120,$height-120, IMG_COLOR_TILED);
imagerectangle ($im, 50,50,$width-120,$height-120, $grey);
*/

$kataskeyi_meletistopo_array = get_times_all("*", "kataskeyi_meletis_topo");
$rotate = $kataskeyi_meletistopo_array[0]["prosb"];

$roof = imageCreateFromjpeg('../images/domika/roof.jpg');
if ($rotate > 0){
$im1 = imagerotate($roof, -$rotate, $white);
$sizex = imagesx($im1);
$sizey = imagesy($im1);
imagecopyresized ($im, $im1, 0, 0, 0, 0, 200, 200, $sizex, $sizey);
}
else{
$sizex = imagesx($roof);
$sizey = imagesy($roof);
imagecopyresized ($im, $roof, 0, 0, 0, 0, 200, 200, $sizex, $sizey);
}
$northimage = imageCreateFromPNG('../images/domika/northArrow.png');
imagecopyresized ($im, $northimage, 0, 0, 0, 0, 24, 47, 48, 94);
imagefttext($im, 12, 0, 30, 30, $black, $font, "Βόρεια πλευρά deg=".$rotate);

ob_clean();
ImagePNG($im);
// κατέστρεψε τον pointer για την εικόνα στη μνήμη για να απελευθερώσεις πόρους
ImageDestroy($im);
imagedestroy ($roof);
imagedestroy ($northimage);
imagedestroy ($im1);
?>