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
Εκτύπωση του φύλλου υπολογισμού ανοιγμάτων σε pdf                     *
Καλείται από kelyfos_anoigmata                                        *
Χρησιμοποιείται η βιβλιοθήκη TCPDF                                    *
                                                                      *
***********************************************************************
*/
include ('database.php');

	for ($i = 1; $i <= 10; $i++) {
		${"aw".$i}=$_GET["aw".$i];
		${"ah".$i}=$_GET["ah".$i];
		${"af".$i}=$_GET["af".$i];
		${"yw".$i}=$_GET["yw".$i];
		${"yh".$i}=$_GET["yh".$i];
	}
	$descr=$_GET["descr"];
	$mpp=$_GET["mpp"];
	$sp=$_GET["sp"];
	$tp=$_GET["tp"];
	$ug=$_GET["ug"];
	$cg=$_GET["cg"];
	$z1=$_GET["z1"];
	$z2=$_GET["z2"];

ob_start();

for($i=0;$i<7;$i++)
{	
echo'
<body style="background:#eaeaea;">
<div id="loading" style="position:absolute; width:100%; text-align:center; top:300px;">
<table style="width:50%;margin-left:auto;margin-right:auto;border:2px solid black;font-size: 13px; line-height: 15px;background: #ebf9c9;"><tr>
<td style="text-align:center;font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 13px; line-height: 15px;">
<br><h2>La-Kenak v'. VERSION .' - Διαφανή δομικά στοιχεία</h2>
Εκτυπώνεται ο πίνακας ανοιγμάτων. Παρακαλώ περιμένετε...&nbsp;&nbsp; <img src="../images/domika/loading.gif" border=0 /><br/>&nbsp;
</td></tr></table>
</div>

</body>
';
   // unsleep(300000);
}

    @ob_flush();
    @flush();
ob_start();

require_once('./tcpdf/config/lang/eng.php');
require_once('./tcpdf/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// Logo
		$image_file = '../images/home-s.png';
		$this->Image($image_file, 10, 5, 8, 8, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 10);
		// Title
		$this->Cell(0, 15, 'La-Kenak v'. VERSION , 'B', false, 'C', 0, '', 0, false, 'M', 'B');
	}
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('dejavusans', 'N', 8);
		// Page number
//		$this->Cell(0, 10, 'Σελ. '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, '', 'T', false, 'R', 0, '', 0, false, 'T', 'M');
	}
}
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
// print a block of text using Write()
$pdf->Write($h=0, $txt='Έλεγχος θερμομονωτικής επάρκειας κτιρίου', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->SetXY(100,15,true);
$pdf->Write($h=0, $txt='υπολογισμός συντελεστή θερμοπερατότητας ανοιγμάτων', $link='', $fill=0, $align='R', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('dejavusans', 'B', 10);
$pdf->MultiCell(60, 10, 'ΖΩΝΗ:',$border = '',$align = 'R',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->SetFont('dejavusans', 'N', 10);
$pdf->MultiCell(90, 10, $z2."  --> Umax = ".$z1." W/(m²K)",$border = '',$align = 'L',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->Ln();

$pdf->SetFont('dejavusans', 'B', 10);
$pdf->MultiCell(60, 10, 'Τύπος πλαισίου:',$border = '',$align = 'R',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->SetFont('dejavusans', 'N', 10);
$pdf->MultiCell(120, 10, $tp,$border = '',$align = 'L',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->Ln();

$pdf->SetFont('dejavusans', 'B', 10);
$pdf->MultiCell(60, 10, 'Uf πλαισίου:',$border = '',$align = 'R',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->SetFont('dejavusans', 'N', 10);
$pdf->MultiCell(90, 10, $sp." W/(m²K)",$border = '',$align = 'L',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->Ln();

$pdf->SetFont('dejavusans', 'B', 10);
$pdf->MultiCell(60, 10, 'Τύπος υαλοπίνακα:',$border = '',$align = 'R',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'T',$fitcell = false);
$pdf->SetFont('dejavusans', 'N', 10);
$pdf->MultiCell(120, 10, $descr,$border = '',$align = 'L',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'T',$fitcell = false);
$pdf->Ln();

$pdf->SetFont('dejavusans', 'B', 10);
$pdf->MultiCell(60, 10, 'Ug υαλοπίνακα:',$border = '',$align = 'R',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->SetFont('dejavusans', 'N', 10);
$pdf->MultiCell(90, 10, $ug." W/(m²K)",$border = '',$align = 'L',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->Ln();

$pdf->SetFont('dejavusans', 'B', 10);
$pdf->MultiCell(60, 15, 'γραμμική θερμοπερατότητα συναρμογής υαλοπινάκων και πλαισίου Ψg:',$border = '',$align = 'R',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 15,$valign = 'B',$fitcell = false);
$pdf->SetFont('dejavusans', 'N', 10);
$pdf->MultiCell(90, 15, $cg." W/(mK)",$border = '',$align = 'L',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 15,$valign = 'B',$fitcell = false);
$pdf->Ln();

$pdf->SetFont('dejavusans', 'B', 10);
$pdf->MultiCell(60, 10, 'μέσο πλάτος πλαισίου:',$border = '',$align = 'R',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->SetFont('dejavusans', 'N', 10);
$pdf->MultiCell(90, 10, $mpp." cm",$border = '',$align = 'L',$fill = false,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('dejavusans', 'N', 8);
$pdf->SetFillColor(220,220,220);

$pdf->MultiCell(15, 20, 'α/α',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 20,$valign = 'M',$fitcell = false);
$pdf->SetFillColor(240,240,240);
$pdf->MultiCell(60, 10, 'Ανοιγμα',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$pdf->SetFillColor(220,220,220);
$pdf->MultiCell(45, 10, 'Υαλοπίνακας',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$pdf->SetFillColor(240,240,240);
$pdf->MultiCell(30, 10, 'Πλαίσιο',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$pdf->SetFillColor(220,220,220);
$pdf->MultiCell(15, 20, "Μήκος \nθερμογέφυρας \nLg",$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 20,$valign = 'M',$fitcell = false);
$pdf->SetFillColor(240,240,240);
$pdf->MultiCell(15, 20, "U \nκουφώματος\nW/(m²K)",$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 20,$valign = 'M',$fitcell = false);

$pdf->Ln();
$pdf->SetXY(30,$pdf->GetY()-10);

$pdf->SetFillColor(240,240,240);
$pdf->MultiCell(15, 10, 'Πλάτος',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, 'Υψος',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, 'Εμβαδό',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, "αριθμός\nφύλλων",$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$pdf->SetFillColor(220,220,220);
$pdf->MultiCell(15, 10, 'Πλάτος',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, 'Υψος',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, 'Εμβαδό',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$pdf->SetFillColor(240,240,240);
$pdf->MultiCell(15, 10, 'Εμβαδό',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, 'Ποσοστό',$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$pdf->Ln();


for ($i = 1; $i <= 10; $i++) {

$ae=number_format(${"aw".$i}*${"ah".$i},2,".",",");
if ($ae==0)$ae="";
$pdf->SetFillColor(240,240,240);
$pdf->MultiCell(15, 10, $i, $border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->SetFillColor(250,250,250);
$pdf->MultiCell(15, 10, ${"aw".$i},$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, ${"ah".$i},$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, $ae,$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, ${"af".$i},$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$ye=number_format(${"yw".$i}*${"yh".$i}*${"af".$i},2,".",",");
if ($ye==0)$ye="";
$pdf->SetFillColor(240,240,240);
$pdf->MultiCell(15, 10, ${"yw".$i},$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, ${"yh".$i},$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, $ye,$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$pe=number_format($ae-$ye,2,".",",");
if ($pe==0)$pe="";
$pp=number_format($pe/$ae*100,0,".",",");
if ($pp==0){$pp="";}else{$pp.="%";}
$pdf->SetFillColor(250,250,250);
$pdf->MultiCell(15, 10, $pe,$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->MultiCell(15, 10, $pp,$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);

$lg=number_format(2*(${"yw".$i}+${"yh".$i})*${"af".$i},2,".",",");
if ($lg==0)$lg="";
$pdf->SetFillColor(240,240,240);
$pdf->MultiCell(15, 10, $lg,$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$uw=number_format(($pe*$sp+$ye*$ug+$lg*$cg)/$ae,2,".",",");
if ($uw==0)$uw="";
$pdf->SetFont('dejavusans', 'B', 8);
$pdf->SetFillColor(250,250,250);
if ($z1<$uw)$pdf->SetTextColor(220,0,0);
$pdf->MultiCell(15, 10, $uw,$border = 'LTRB',$align = 'C',$fill = true,$ln = 0,$x = '',$y = '',$reseth = true,$stretch = 0,$ishtml = false,$autopadding = true,$maxh = 10,$valign = 'M',$fitcell = false);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('dejavusans', 'N', 8);
$pdf->Ln();


}


ob_end_clean();
// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('printout.pdf', 'F');
?><script type="text/javascript">window.location = "printout.pdf"</script><?php


?>