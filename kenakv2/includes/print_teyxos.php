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
Εκτύπωση του τεύχους ΚΕΝΑΚ σε pdf (συνένωση των αρχείων που           *
δημιουργήθηκαν με το print_teyxos_pdf.php                             *
Καλείται από kenak_formteyxos.php                                     *
Χρησιμοποιούνται οι βιβλιοθήκες TCPDF κα FPDI                         *
                                                                      *
***********************************************************************
*/
ob_start();
include_once("database.php");
for($i=0;$i<7;$i++)
{	
echo'
<body style="background:#eaeaea;">
<div id="loading" style="position:absolute; width:100%; text-align:center; top:300px;">
<table style="width:50%;margin-left:auto;margin-right:auto;border:2px solid black;font-size: 13px; line-height: 15px;background: #ebf9c9;"><tr>
<td style="text-align:center;font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 13px; line-height: 15px;">
<br><h2>La-Kenak v'.VERSION.' - Tεύχος</h2>
Εκτυπώνεται το τεύχος. Παρακαλώ περιμένετε...&nbsp;&nbsp; <img src="../images/domika/loading.gif" border=0 /><br/>&nbsp;
</td></tr></table>
</div>

</body>
';
   // unsleep(300000);
}

@ob_flush();
@flush();
ob_start();

require_once("tcpdf/tcpdf.php");
require_once("fpdi/fpdi.php");
 
class concat_pdf extends FPDI {
     var $files = array();
     function setFiles($files) {
          $this->files = $files;
     }
     function concat() {
          foreach($this->files AS $file) {
               $pagecount = $this->setSourceFile($file);
               for ($i = 1; $i <= $pagecount; $i++) {
                    $tplidx = $this->ImportPage($i);
                    $s = $this->getTemplatesize($tplidx);
                    $this->AddPage('P', array($s['w'], $s['h']));
                    $this->useTemplate($tplidx);
               }
          }
     }
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('dejavusans', 'N', 8);
		// Page number
		$this->Cell(0, 10, 'Σελ. '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 'T', false, 'R', 0, '', 0, false, 'T', 'M');
		//$this->Cell(0, 10, '  ', 'T', false, 'R', 0, '', 0, false, 'T', 'M');
	}
	 
}

for ($i=1;$i<=8;$i++){
$f[$i]="PDF/printout".$i.".pdf";
}
$pdf =& new concat_pdf();
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(true);
$pdf->setFiles($f);
$pdf->concat();

ob_end_clean();
// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('PDF/teyxos.pdf', 'F');
?><script type="text/javascript">window.location = "PDF/teyxos.pdf"</script><?php



?>
