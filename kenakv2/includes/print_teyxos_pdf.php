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
Εκτύπωση του τεύχους ΚΕΝΑΚ σε ένα pdf για κάθε κεφάλαιο               *
Καλείται από kenak_formteyxos.php                                     *
Χρησιμοποιείται η βιβλιοθήκη TCPDF                                    *
                                                                      *
***********************************************************************
*/

include ('database.php');

ob_start();

?>
<body style="background:#eaeaea;">
<div id="loading" style="position:absolute; width:100%; text-align:center; top:300px;">

<table style="width:50%;margin-left:auto;margin-right:auto;border:2px solid black;font-size: 13px; line-height: 15px;background: #ebf9c9;"><tr>
<td style="text-align:center;font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 13px; line-height: 15px;">
<br><h2>La-Kenak v<?php echo VERSION; ?> - ΤΕΥΧΟΣ</h2>
Δημιουργούνται τα αρχεία PDF του τεύχους. Παρακαλώ περιμένετε... <br /><br />
<div id="kef"></div><br /><img src="../images/domika/loading.gif" border=0 /><br>&nbsp;
</td></tr></table>
</div>

</body>
<?php

$kef="ALL";
if (isset($_GET['kef'])) $kef=$_GET['kef'];

require_once('./tcpdf/config/lang/eng.php');
require_once('./tcpdf/tcpdf.php');
require_once("connection.php");

$strSQL = "SELECT * FROM teyxos_f";
$objQuery = mysql_query($strSQL, $connection) or die ("Error Query [".$strSQL."]");

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// Logo
		//$image_file = '../images/home-s.png';
		//$this->Image($image_file, 10, 5, 8, 8, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('dejavusans', 'B', 10);
		// Title
		$this->Cell(0, 15, 'Μελέτη ενεργειακής απόδοσης κτιρίου', 'B', false, 'C', 0, '', 0, false, 'M', 'B');
	}
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('dejavusans', 'N', 8);
		// Page number
		//$this->Cell(0, 10, 'Σελ. '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, '  ', 'T', false, 'R', 0, '', 0, false, 'T', 'M');
	}
}


while($objResult[] = mysql_fetch_array($objQuery));
//$teyxos="";
for ($i=0;$i<=7;$i++){

if (($kef<>"ALL" && $kef==($i+1)) || $kef=="ALL"){


?>
<script type="text/javascript">
document.getElementById('kef').innerHTML="Κεφάλαιο <h2><?=$i+1;?></h2>";
</script>
<?php
set_time_limit (120);
ob_end_flush();
ob_flush();
flush();
ob_start();

$teyxos=$objResult[$i]["text"];

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('La-Kenak');
$pdf->SetSubject('');
$pdf->SetKeywords('');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
//set some language-dependent strings
$pdf->setLanguageArray($l);
// ---------------------------------------------------------
// set font
$pdf->SetFont('dejavusans', 'N', 8);
// add a page
$pdf->AddPage();
//$teyxos = nl2br($teyxos);
//$teyxos_new_lines = substr_count($teyxos, "\n");
//$teyxos = explode("", $teyxos);
//for ($z=0;$z<=$teyxos_new_lines;$z++){
$pdf->writeHTML($teyxos, $ln = true, $fill = false, $reseth = true, $cell = false, $align = '' ) ;
//}

ob_end_clean();
// ---------------------------------------------------------
//Close and output PDF document
$j=$i+1;
$pdf->Output('PDF/printout'.$j.'.pdf', 'F');

}}

if ($kef=="ALL"){

?><script type="text/javascript">window.close();</script><?php

}else{

?>
<script type="text/javascript">
window.open('PDF/printout<?=$j?>.pdf');
window.close();
</script>

<?php


}
?>
