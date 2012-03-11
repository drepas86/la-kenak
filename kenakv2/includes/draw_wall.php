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
Σχεδίαση τοίχου                                                       *
Καλείται από kenak_form3   (function drawit)                          *
                                                                      *
***********************************************************************
*/

	if (isset($_GET['tl']))$tl=$_GET["tl"]*100;
	if (isset($_GET['th']))$th=$_GET["th"]*100;
	if (isset($_GET['dh']))$dh=$_GET["dh"]*100;
	if (isset($_GET['yl']))$yl=$_GET["yl"]*100;
	if (isset($_GET['yd']))$yd=$_GET["yd"];
	if (isset($_GET['anrec']))$anrec=$_GET["anrec"];
	
	$hatch1='../images/hatch/brick.png';
	$hatch2='../images/hatch/concr.png';
	$hatch3='../images/hatch/glass.png';
	$font = './arial.ttf';
	
	if ($output=="file"){
		$tl*=100;
		$th*=100;
		$dh*=100;
		$yl*=100;
		$hatch1='images/hatch/brick.png';
		$hatch2='images/hatch/concr.png';
		$hatch3='images/hatch/glass.png';
		$font = 'includes/arial.ttf';
	}
	
	
	$dW = $tl;
    $dH = $th;
	$values = array();
	$image = imageCreateTrueColor ($dW, $dH);
	$imagebg = imageCreateFromPNG ($hatch1); 
	$bg   = imagecolorallocate($image, 255, 255, 255);
	$fg = imagecolorallocate($image, 0, 0, 0);
	imagefilledrectangle($image, 0, 0, $dW, $dH, $bg);
	imageSetTile ($image, $imagebg);
	$values[0]=0;
	$values[1]=0;
	$values[2]=$tl;
	$values[3]=0;
	$values[4]=$tl;
	$values[5]=$th;
	$values[6]=0;
	$values[7]=$th;
	imagefilledpolygon($image, $values, 4, IMG_COLOR_TILED);
	imagepolygon($image, $values, 4, $fg);
//******************************************************
    imagedestroy ($imagebg);
	$imagebg = imageCreateFromPNG ($hatch2); 
	imageSetTile ($image, $imagebg);
	$values[0]=0;
	$values[1]=0;
	$values[2]=$tl;
	$values[3]=0;
	$values[4]=$tl;
	$values[5]=$dh;
	$values[6]=0;
	$values[7]=$dh;
	imagefilledpolygon($image, $values, 4, IMG_COLOR_TILED);
	imagepolygon($image, $values, 4, $fg);
//******************************************************
	$yl0=explode("|",$yd);
	for ($i=1;$i<=count($yl0);$i++){
		if ($yd=="")break;
		$values[0]=$yl0[$i-1]*100;
		$values[1]=0;
		$values[2]=$yl0[$i-1]*100+$yl;
		$values[3]=0;
		$values[4]=$yl0[$i-1]*100+$yl;
		$values[5]=$th;
		$values[6]=$yl0[$i-1]*100;
		$values[7]=$th;
		imagefilledpolygon($image, $values, 4, IMG_COLOR_TILED);
		imagepolygon($image, $values, 4, $fg);
	}
//******************************************************
    imagedestroy ($imagebg);
	$imagebg = imageCreateFromPNG ($hatch3); 
	imageSetTile ($image, $imagebg);
	$an1=explode("^",$anrec);
	for ($i=1;$i<=count($an1);$i++){
		$an2=explode("|",$an1[$i-1]);
		$values[0]=$an2[2]*100;
		$values[1]=($th/100-$an2[3])*100;
		$values[2]=($an2[0]+$an2[2])*100;
		$values[3]=($th/100-$an2[3])*100;
		$values[4]=($an2[0]+$an2[2])*100;
		$values[5]=($th/100-$an2[3]-$an2[1])*100;
		$values[6]=$an2[2]*100;
		$values[7]=($th/100-$an2[3]-$an2[1])*100;
		imagefilledpolygon($image, $values, 4, $bg);
		imagepolygon($image, $values, 4, $fg);
		$values[0]=$values[0]+2;
		$values[1]=$values[1]-2;
		$values[2]=$values[2]-2;
		$values[3]=$values[3]-2;
		$values[4]=$values[4]-2;
		$values[5]=$values[5]+2;
		$values[6]=$values[6]+2;
		$values[7]=$values[7]+2;
		imagefilledpolygon($image, $values, 4, IMG_COLOR_TILED);
		imagepolygon($image, $values, 4, $fg);
	}

//******************************************************
	$j=count($yl0);
	for ($i=$j;$i>=1;$i--){
		$yl0[$i]=$yl0[$i-1];
	}
	$yl0[0]=0;
	$yl0[$j+1]=$tl/100;
	$j=count($yl0);
	if ($yd=="")$j=0;
	for ($i=2;$i<=$j-1;$i++){
		$text = $yl/100;
		if ($yl/100>0.3)$text = number_format($yl/100,2,".",",");
		$bbox = imagettfbbox(15, 0, $font, $text);
		$fl = $bbox[2] - $bbox[0];
		$fh = $bbox[7] - $bbox[1];
		imagefilledrectangle($image, $yl0[$i-1]*100+$yl/2-$fl/2+$bbox[0], $th-25+$bbox[1], $yl0[$i-1]*100+$yl/2-$fl/2+$bbox[4], $th-25+$bbox[5], $bg);
		imagettftext($image, 15, 0, $yl0[$i-1]*100+$yl/2-$fl/2, $th-25, $fg, $font, $text);
	}
	for ($i=1;$i<=$j-1;$i++){
		$x1=$yl0[$i-1]*100+$yl;
		$x2=$yl0[$i]*100;
		if ($i==1 && $yl0[1]<>0)$x1=0;
		if ($x1<>$x2 && $x1<$x2){
			$text = number_format(($x2-$x1)/100,2,".",",");
			$bbox = imagettfbbox(15, 0, $font, $text);
			$fl = $bbox[2] - $bbox[0];
			$fh = $bbox[7] - $bbox[1];
			imagefilledrectangle($image, $x1+($x2-$x1-$fl)/2, $th-25+$bbox[1], $x1+($x2-$x1-$fl)/2+$fl, $th-25+$bbox[5], $bg);
			imagettftext($image, 15, 0, $x1+($x2-$x1-$fl)/2, $th-25, $fg, $font, $text);
		}
	}

	if ($j==0){
		$text = number_format($tl/100,2,".",",");
		$bbox = imagettfbbox(15, 0, $font, $text);
		$x1=0;
		$x2=$tl;
		$fl = $bbox[2] - $bbox[0];
		$fh = $bbox[7] - $bbox[1];
		imagefilledrectangle($image, $x1+($x2-$x1-$fl)/2, $th-25+$bbox[1], $x1+($x2-$x1-$fl)/2+$fl, $th-25+$bbox[5], $bg);
		imagettftext($image, 15, 0, $x1+($x2-$x1-$fl)/2, $th-25, $fg, $font, $text);
	}
//******************************************************
	$values[0]=0;
	$values[1]=0;
	$values[2]=$tl-1;
	$values[3]=0;
	$values[4]=$tl-1;
	$values[5]=$th-1;
	$values[6]=0;
	$values[7]=$th-1;
	imagepolygon($image, $values, 4, $fg);

	if ($output=="file"){
		$tl/=100;
		$th/=100;
		$dh/=100;
		$yl/=100;
		imagePNG($image,"includes/PDF/image".$tab.$im.".png");
	}else{
		Header("Content-type: image/png");
		imagePNG ($image);
	}
    imagedestroy ($image);
    imagedestroy ($imagebg);
	
	
?>






