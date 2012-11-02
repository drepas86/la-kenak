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
		//πάρε τις τιμές

	for ($i = 1; $i <= 10; $i++) {
		${"paxos".$i}=$_GET["pax".$i];
		${"strwsi".$i}=$_GET["str".$i];
		${"eidos".$i}=$_GET["eid".$i];
	}
	$zwni=$_GET["zwni"];
	$descr=$_GET["descr"];
	$ria=$_GET["ria"];	

// θέσε HTTP header type σε PNG
header("Content-type: image/png");
// Θέσε το πλάτος και μήκος της εικόνας σε pixels
$width = 740;
$height = 300;
// Θέσε την εικόνα
$im = ImageCreateTrueColor($width, $height); 
// switch on image antialising if it is available
if (function_exists('imageantialias')) ImageAntiAlias($im, true);

//imagealphablending($im, false);
//imagesavealpha($im, true);
// Θέσε το background σε άσπρο
$white = ImageColorAllocate($im, 255, 255, 255); 
ImageFillToBorder($im, 0, 0, $white, $white);
// Όρισε χρώματα για να το βάλεις στις γραμμές
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$grey = imagecolorallocate($im, 62, 62, 62);
$magenda = imagecolorallocate($im, 174, 49, 194);
$roz = imagecolorallocate($im, 103, 16, 81);
$font = './arial.ttf';
	

	
$eidos1=7;
$paxos1=.08;
	
$l=50;
$c=30;
$tl=60;
$linev = @imagecreatefromjpeg('http://'.$_SERVER['SERVER_NAME'].'/kenakv2/images/domika/lineH.jpg');
for ($i = 1; $i <= 10; $i++) {
	$tl += ${"paxos".$i}*500;
}

for ($i = 1; $i <= 10; $i++) {
	if (${"paxos".$i}>0){
		$l += ${"paxos".$i}*500;
		if (${"eidos".$i}=="7" || ${"eidos".$i}=="8"){
			$src = @imagecreatefromjpeg('http://'.$_SERVER['SERVER_NAME'].'/kenakv2/images/domika/insulH.jpg');
			imagecopyresized($im, $src, 30 ,$l+${"paxos".$i}*500,  0, 0, 200, ${"paxos".$i}*500, 200, 34);
			imagefttext($im, 12, 0, 30, 30, $black, $font, $l-${"paxos".$i}*500);
			ImageDestroy($src);

		}
	}
}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

// στείλε την PNG εικόνα στο browser
ob_clean();
ImagePNG($im);
// κατέστρεψε τον pointer για την εικόνα στη μνήμη για να απελευθερώσεις πόρους
ImageDestroy($im);
//ImageDestroy($linev);


?>