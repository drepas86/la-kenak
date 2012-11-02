<?php
include ('database.php');
require_once("connection.php");
require_once("session.php");

//Πόσους ορόφους έχει το κτίριο σε array με τα ονόματά τους
$onomata =array();
$onomata[0]="Όροφοι κτιρίου";
$strSQL = "SELECT * FROM kataskeyi_floors WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id'];
$objQuery = mysql_query($strSQL);
$i = 0;
while($objResult = mysql_fetch_array($objQuery))
{
$i++;
array_push($onomata, $objResult["name"]);
}
//$onomata= array("Όροφοι κτιρίου","Υ-1","Υ-2","Π-1","ΙΣ","ΟΡ-1","ΟΡ-2","ΟΡ-3","ΟΡ-4","ΟΡ-5","ΣΤ");

if (count($onomata)>5){
// Θέσε το πλάτος και μήκος της εικόνας σε pixels
$width = 400;
$height = 400;
}else{
$width = 400;
$height = 200;
}

// Φτιάξε την εικόνα
$im = ImageCreateTrueColor($width, $height);

// switch on image antialising if it is available
if (function_exists('imageantialias')) ImageAntiAlias($im, true);

// Όρισε χρώματα
$white = ImageColorAllocate($im, 255, 255, 255); 
$black = ImageColorAllocate($im, 0, 0, 0);
$grey = imagecolorallocate($im, 62, 62, 62);
$magenda = imagecolorallocate($im, 174, 49, 194);
$roz = imagecolorallocate($im, 103, 16, 81);

$font = 'verdana.ttf';

ImageFillToBorder($im, 0, 0, $black, $black);
imagefilledrectangle($im,0,0,$width,$height,$white);
imagefttext($im, 8, 90, 10, $height/2, $black, $font, $onomata[0]);

for ($i=1;$i<=count($onomata)-1;$i++){
$polygon_x1=50;
$polygon_y1=$height-30*$i;
$polygon_x2=$width-50;
$polygon_y2=$height-30*$i;
$polygon_x3=$width-50;
$polygon_y3=$height-30*$i-30;
$polygon_x4=50;
$polygon_y4=$height-30*$i-30;
if ($onomata[$i] == "ΣΤ"){$polygon_x3=$width/2;$polygon_x4=$width/2;}

//Φτιάξε το γέμισμα του τούβλου
$imagebg = imageCreateFromPNG('../images/hatch/brick1.png');
if (strlen(strstr($onomata[$i],"Υ"))>0){$imagebg = imageCreateFromPNG('../images/hatch/concrete.png');}
if ($onomata[$i]=="ΣΤ"){$imagebg = imageCreateFromPNG('../images/hatch/brick2.png');}
if (strlen(strstr($onomata[$i],"Π"))>0){$imagebg = imageCreateFromPNG('../images/hatch/blank.png');}
//Φτιάξε τον όροφο
imageSetTile ($im, $imagebg);

$polygon_values = array($polygon_x1,$polygon_y1,
						$polygon_x2,$polygon_y2,
						$polygon_x3,$polygon_y3,
						$polygon_x4,$polygon_y4);
$polygon_values2 = array($polygon_x1,$polygon_y1,
						$polygon_x2,$polygon_y2,
						$polygon_x2,$polygon_y2-2,
						$polygon_x1,$polygon_y1-2);
$polygon_values3 = array($polygon_x1,$polygon_y1,
						$polygon_x4,$polygon_y4,
						$polygon_x4+2,$polygon_y4,
						$polygon_x1+2,$polygon_y1);
$polygon_values4 = array($polygon_x4,$polygon_y4,
						$polygon_x3,$polygon_y3,
						$polygon_x3,$polygon_y3-2,
						$polygon_x4,$polygon_y3-2);
$polygon_values5 = array($polygon_x3,$polygon_y3,
						$polygon_x2,$polygon_y2,
						$polygon_x2-2,$polygon_y2,
						$polygon_x3-2,$polygon_y3);
imagefilledpolygon($im, $polygon_values, 4, IMG_COLOR_TILED);
imagefilledpolygon($im, $polygon_values2, 4, $grey);
imagefilledpolygon($im, $polygon_values3, 4, $grey);
imagefilledpolygon($im, $polygon_values4, 4, $grey);
imagefilledpolygon($im, $polygon_values5, 4, $grey);
$orofos_text = $onomata[$i];
imagefttext($im, 8, 0, $width-50, $height-30*$i-10, $black, $font, $orofos_text);
}

imagedestroy ($imagebg);

// στείλε την PNG εικόνα στο browser
ob_clean();
// θέσε HTTP header type σε PNG
header("Content-type: image/png");
ImagePNG($im);

// κατέστρεψε τον pointer για την εικόνα στη μνήμη για να απελευθερώσεις πόρους
ImageDestroy($im);
?>
