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
tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr     *
                                                                      *
Ρουτίνα που σχεδιάζει το σκαρίφημα των δομικών στοιχείων              *
Καλείται από το domika_kelyfos (από την showgraph(pout) )             *
Με pout=0 εμφανίζει το σκαρίφημα                                      *
Με pout=1 εκτυπώνει το φύλλο υπολογισμού σε pdf                       *
                                                                      *
***********************************************************************
*/
//Στο φάκελο includes πρέπει να περιέχεται η γραμματοσειρά. 

		//πάρε τις τιμές
		
	for ($i = 1; $i <= 10; $i++) {
		${"paxos".$i}=$_GET["pax".$i];
		${"strwsi".$i}=$_GET["str".$i];
		${"strwsin".$i}=$_GET["strn".$i];
		${"eidos".$i}=$_GET["eid".$i];
	}
	$zwni=$_GET["zwni"];
	$descr=$_GET["descr"];
	$ria=$_GET["ria"];	
	$pout=$_GET["print"];	
	$imh=$_GET["imh"];
	$ri=$_GET["ri"];
	$ra=$_GET["ra"];
	$ru=$_GET["ru"];
	$rd=$_GET["rd"];
	$umax=$_GET["umax"];

if ($pout==1){

?>
<body style="background:#eaeaea;">
<div id="loading" style="position:absolute; width:100%; text-align:center; top:300px;">

<table style="width:50%;margin-left:auto;margin-right:auto;border:2px solid black;font-size: 13px; line-height: 15px;background: #ebf9c9;"><tr>
<td style="text-align:center;font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 13px; line-height: 15px;">
<br><h2>La-Kenak v2.3 - Αδιαφανή δομικά στοιχεία</h2>
Εκτυπώνεται ο πίνακας δομικού στοιχείου. Παρακαλώ περιμένετε... &nbsp;&nbsp;<img src="../images/domika/loading.gif" border=0 /><br/>&nbsp;
</td></tr></table>
</div>

</body>
<?php
ob_end_flush();
ob_flush();
flush();

}	
// Θέσε το πλάτος και μήκος της εικόνας σε pixels
$width = 770;
if ($pout==1){$width = 640;}
$height = 300; 
// Θέσε την εικόνα
$im = ImageCreateTrueColor($width, $height); 
// switch on image antialising if it is available
if (function_exists('imageantialias')) ImageAntiAlias($im, true);

//imagealphablending($im, false);
//imagesavealpha($im, true);
// Θέσε το background σε άσπρο
$white = ImageColorAllocate($im, 255, 255, 255); 
// Όρισε χρώματα για να το βάλεις στις γραμμές
$black = ImageColorAllocate($im, 0, 0, 0);
$blue = ImageColorAllocate($im, 0, 0, 255);
$grey = imagecolorallocate($im, 62, 62, 62);
$magenda = imagecolorallocate($im, 174, 49, 194);
$roz = imagecolorallocate($im, 103, 16, 81);
$font = './arial.ttf';
ImageFillToBorder($im, 0, 0, $black, $black);
imagefilledrectangle ($im,1,1,$width-2,$height-2,$white);

$l=50;
$c=30;
$tl=60;
$linev = @imagecreatefromjpeg('../images/domika/lineV.jpg');
for ($i = 1; $i <= 10; $i++) {
	$tl += ${"paxos".$i}*500;
}
for ($i = 1; $i <= 10; $i++) {
	if (${"paxos".$i}>0){
		$l += ${"paxos".$i}*500;
		if (${"eidos".$i}=="11"){
			$src = @imagecreatefromjpeg('../images/domika/brick.jpg');
			imagecopyresized($im, $src, $l-${"paxos".$i}*500, 50, 0, 0, ${"paxos".$i}*500, 200,44,200);
			ImageDestroy($src);
		}
		if (${"eidos".$i}=="7" || ${"eidos".$i}=="8"){
			$src = @imagecreatefromjpeg('../images/domika/insul.jpg');
			imagecopyresized($im, $src, $l-${"paxos".$i}*500, 50, 0, 0, ${"paxos".$i}*500, 200,34,200);
			ImageDestroy($src);
		}
		if (${"eidos".$i}=="2" || ${"eidos".$i}=="10"){
			$src = @imagecreatefromjpeg('../images/domika/concr.jpg');
			imagecopyresized($im, $src, $l-${"paxos".$i}*500, 50, 0, 0, ${"paxos".$i}*500, 200,99,200);
			ImageDestroy($src);
		}
		if (${"eidos".$i}=="3"){
			$src = @imagecreatefromjpeg('../images/domika/plaster.jpg');
			imagecopyresized($im, $src, $l-${"paxos".$i}*500, 50, 0, 0, ${"paxos".$i}*500, 200,10,200);
			ImageDestroy($src);
		}
	}
}
$l=50;
imagecopyresized($im, $linev, $l, 50, 0, 0, 1, 200,1,200);
for ($i = 1; $i <= 10; $i++) {
	if (${"paxos".$i}>0){
		$l += ${"paxos".$i}*500;
		$tl += ${"paxos".$i}*250;
		$c += 30;
		$src = @imagecreatefrompng('../images/domika/pointerH.png');
		imagecopyresized($im, $src, $l-${"paxos".$i}*250, $c, 0, 0, 300, 5,300,5);
		imagecopyresized($im, $linev, $l, 50, 0, 0, 1, 200,1,200);
		ImageDestroy($src);
		$text=$i.". ".${"strwsin".$i}.", d=".number_format(${"paxos".$i}*100,1,".",",")."cm". ", λ=".number_format(${"strwsi".$i},3,".",",");
		imagefttext($im, 10, 0, $tl, $c, $black, $font, $text);
	}
}
imagefttext($im, 12, 90, 30, 250, $black, $font, "ΜΕΣΑ");
if ($ria==1) $x="ΕΞΩ";
if ($ria==2) $x="ΜΘΧ";
if ($ria==3) $x="ΕΔΑΦΟΣ";
imagefttext($im, 12, 90, $l+30, 250, $black, $font, $x);


if ($pout==1){

$s=imagepng($im,"./temp.png");
ImageDestroy($im);
ImageDestroy($linev);
ob_clean();
include "print_toixoi.php";
exit;
}else{
// θέσε HTTP header type σε PNG
header("Content-type: image/png");
// στείλε την PNG εικόνα στο browser
ob_clean();
ImagePNG($im);
}
// κατέστρεψε τον pointer για την εικόνα στη μνήμη για να απελευθερώσεις πόρους
ImageDestroy($im);
ImageDestroy($linev);
			
?>