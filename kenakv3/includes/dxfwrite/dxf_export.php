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
include("../connection.php");
include("../session.php");
include("functions_dxf.php");

//Εδώ βρίσκονται πληροφορίες μορφής.
//http://www.autodesk.com/techpubs/autocad/acad2000/dxf/index.htm
//DXF-2000 - Πρόβλημα με τα Ελληνικά στο progecad,nanocad
//Πρέπει να τροποποιηθεί η function dxf_drawtext.
//στη γραμμή 912 του functions_dxf.php βρίσκεται η γραμματοσειρά
//Tα function start και end έχουν χρησιμοποιηθεί αυτούσια από το progecad,nanocad και 
//παραγωγή ενός κενού αρχείου dxf2000.


$dxf = dxf_start(); //Υπό κατασκευή ακόμα. Περιέχει τα styles κλπ
$dxf .= dxf_startentities(); //Ξεκινά το section γραμμών κλπ
$dxf .= dxf_drawtext(11,11,"la-kenak", "keimena");

$rec_count=0;

if ($_GET['floor']!=0){
$floor=$_GET["floor"];
$dxf_set = mysql_query("SELECT * FROM kataskeyi_drawing WHERE floor=$floor AND item=0 AND user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']) or die ("Error Query1");
while ($result = mysql_fetch_array($dxf_set)) {$rec_count=$result['rec'];}

for ($i=1;$i<=$rec_count;$i++){
	$dxf_set = mysql_query("SELECT * FROM kataskeyi_drawing WHERE floor=$floor AND item=$i AND user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']) or die ("Error Query2");
	while ($result = mysql_fetch_array($dxf_set)) {
		$rec=$result['rec'];
		$x=explode("|",$rec);
		
		if ($x[7] == 1){$layer="orizontia-dapeda";}
		if ($x[7] == 2){$layer="katakoryfa-toixoi";}
		if ($x[7] == 3){$layer="katakoryfa-anoigmata";}
		if ($x[7] == 4){$layer="katakoryfa-ypostylwmata";}
		if ($x[7] == 5){$layer="orizontia-ekswstes";}
		if ($x[7] == 6){$layer="orizontia-thremogefyres";}
		
		$x1 = round($x[0]/3,2)*0.05;
		$x2 = round((600-$x[1])/3,2)*0.05;
		$dx = round($x[2]/3,2)*0.05;
		$dy = round($x[3]/3,2)*0.05;
		
		$dxf .= dxf_drawrectangle($x1, $x2, $dx, $dy, $layer);
		$dxf .= dxf_drawtext($x1,$x2,$x[4],"keimena");
		
	}
}

$dxf .= dxf_endsection(); //Ξεκινά το section γραμμών κλπ
$dxf .= dxf_end(); //Υπό κατασκευή ακόμα. Περιέχει τις βιβλιοθήκες


$handle = fopen("lakenak-user".$_SESSION['user_id']."-dxf-orofos".$floor.".dxf",'w+');
fwrite($handle,$dxf);
echo "Το αρχείο lakenak-dxf αποθηκεύτηκε. Κατεβάστε το από <a href=\"./lakenak-user".$_SESSION['user_id']."-dxf-orofos".$floor.".dxf\">ΕΔΩ</a>";
fclose($handle);
}else{
echo "Επιλέξτε πρώτα όροφο.";
}

?>