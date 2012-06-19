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
if (isset($_POST['yd_submit'])) {
require_once('/includes/tcpdf/config/lang/eng.php');
require_once('/includes/tcpdf/tcpdf.php');
	// Δεδομένα για τη φόρμα
	$pros = $_POST['pros'];
	$onoma = $_POST['onoma'];
	$epwnymo = $_POST['epwnymo'];
	$pateras = $_POST['pateras'];
	$mitera = $_POST['mitera'];
	$gennisi = $_POST['gennisi'];
	$topos_gen = $_POST['topos_gen'];
	$taytotita = $_POST['taytotita'];
	$til = $_POST['til'];
	$topos = $_POST['topos'];
	$odos = $_POST['odos'];
	$arithm = $_POST['arithm'];
	$tkwdikas = $_POST['tkwdikas'];
	$fax = $_POST['fax'];
	$mail = $_POST['mail'];
	$dilwsi = $_POST['dilwsi'];
		
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// Logo
		$image_file = 'images/style/ethnosimo.jpg';
		$this->Image($image_file, 10, 5, 8, 8, 'JPG', '', 'T', false, 300, 'C', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('dejavusans', 'B', 10);
		// Title
		//$this->Cell(0, 15, '', 'B', false, 'C', 0, '', 0, false, 'M', 'B');
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

$print_yd="
<font style=\"text-align: center; font-size:200%;\">ΥΠΕΥΘΥΝΗ ΔΗΛΩΣΗ </font><br/>
<font style=\"text-align: center; font-size:100%;\">(Άρθρο 8 Ν.1599/1986)</font><br/><br/>

<table border=\"1\">
<tr><td>
Η ακρίβεια των στοιχείων που υποβάλλονται με αυτή τη δήλωση μπορεί να ελεγχθεί με βάση το αρχείο άλλων υπηρεσιών (άρθρο 8 παρ. 4 Ν. 1599/1986)
</td></tr>
</table><br/><br/>

<table border=\"1\">
<tr>
<td style=\"width: 20%;\">ΠΡΟΣ(<sup>1</sup>):</td>
<td colspan=\"7\" style=\"width: 80%;\">$pros</td>
</tr>
<tr>
<td style=\"width: 20%;\">Ο – Η Όνομα:</td>
<td colspan=\"2\">$onoma</td><td>Επώνυμο:</td>
<td colspan=\"4\">$epwnymo</td>
</tr>
<tr>
<td style=\"width: 20%;\">Όνομα και Επώνυμο Πατέρα: </td>
<td colspan=\"7\">$pateras</td>
</tr>
<tr>
<td style=\"width: 20%;\">Όνομα και Επώνυμο Μητέρας: </td>
<td colspan=\"7\">$mitera</td>
</tr>
<tr>
<td style=\"width: 20%;\">Ημερομηνία γέννησης(<sup>2</sup>): </td>
<td colspan=\"7\">$gennisi</td>
</tr>
<tr>
<td style=\"width: 20%;\">Τόπος γέννησης: </td>
<td colspan=\"7\">$topos_gen</td>
</tr>
<tr>
<td style=\"width: 20%;\">Αριθμός Δελτίου Ταυτότητας:</td>
<td colspan=\"2\" style=\"width: 35%;\">$taytotita</td>
<td style=\"width: 10%;\">Τηλ:</td>
<td colspan=\"4\" style=\"width: 35%;\">$til</td>
</tr>
<tr>
<td style=\"width: 20%;\">Τόπος Κατοικίας:</td>
<td style=\"width: 20%;\">$topos</td>
<td style=\"width: 5%;\">Οδός:</td>
<td style=\"width: 25%;\">$odos</td>
<td style=\"width: 5%;\">Αριθ:</td>
<td style=\"width: 10%;\">$arithm</td>
<td style=\"width: 5%;\">ΤΚ:</td>
<td style=\"width: 10%;\">$tkwdikas</td>
</tr>
<tr>
<td style=\"width: 20%;\">Αρ. Τηλεομοιοτύπου (Fax):</td>
<td colspan=\"2\">$fax</td>
<td>Δ/νση Ηλεκτρ. Ταχυδρομείου (Εmail):</td>
<td colspan=\"4\">$mail</td>
</tr>
</table>
<br/><br/>
Με ατομική μου ευθύνη και γνωρίζοντας τις κυρώσεις (3), που προβλέπονται από τις διατάξεις της παρ. 6 του άρθρου 22 του Ν. 1599/1986, δηλώνω ότι:<br/><br/>
$dilwsi
<font style=\"text-align: right; font-size:100%;\">(<sup>4</sup>)</font><br/><br/>

<font style=\"text-align: right; font-size:100%;\">Ημερομηνία:      ……….20……</font><br/><br/>
<font style=\"text-align: right; font-size:100%;\">Ο – Η Δηλ.</font><br/><br/><br/><br/><br/><br/>

<font style=\"text-align: right; font-size:100%;\">(Υπογραφή)</font><br/><br/>

(1) Αναγράφεται από τον ενδιαφερόμενο πολίτη ή Αρχή ή η Υπηρεσία του δημόσιου τομέα, που απευθύνεται η αίτηση.<br/>
(2) Αναγράφεται ολογράφως. <br/>
(3) «Όποιος εν γνώσει του δηλώνει ψευδή γεγονότα ή αρνείται ή αποκρύπτει τα αληθινά με έγγραφη υπεύθυνη δήλωση του άρθρου 
8 τιμωρείται με φυλάκιση τουλάχιστον τριών μηνών. Εάν ο υπαίτιος αυτών των πράξεων σκόπευε να προσπορίσει στον εαυτόν του 
ή σε άλλον περιουσιακό όφελος βλάπτοντας τρίτον ή σκόπευε να βλάψει άλλον, τιμωρείται με κάθειρξη μέχρι 10 ετών.<br/>
(4) Σε περίπτωση ανεπάρκειας χώρου η δήλωση συνεχίζεται στην πίσω όψη της και υπογράφεται από τον δηλούντα ή την δηλούσα. <br/>

";

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
$pdf->writeHTML($print_yd, $ln = true, $fill = false, $reseth = true, $cell = false, $align = '' ) ;


ob_end_clean();
// ---------------------------------------------------------
//Close and output PDF document

$pdf->Output('includes/PDF/yd-n1599.pdf', 'F');

echo "Το pdf σώθηκε. Ανοίξτε το <a href=\"includes/PDF/yd-n1599.pdf\">εδώ.<a>";
?>
<script type="text/javascript">window.location = "includes/PDF/yd-n1599.pdf"</script>
<?php
}





if (isset($_POST['pfa_submit'])) {
require_once('/includes/tcpdf/config/lang/eng.php');
require_once('/includes/tcpdf/tcpdf.php');
	// Δεδομένα για τη φόρμα
	$textarea = $_POST['kefaa'];
		
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// Logo
		//$image_file = 'images/style/ethnosimo.jpg';
		//$this->Image($image_file, 10, 5, 8, 8, 'JPG', '', 'T', false, 300, 'C', false, false, 0, false, false, false);
		// Set font
		//$this->SetFont('dejavusans', 'B', 10);
		// Title
		//$this->Cell(0, 15, '', 'B', false, 'C', 0, '', 0, false, 'M', 'B');
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

$print_yd=$textarea;

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
$pdf->writeHTML($print_yd, $ln = true, $fill = false, $reseth = true, $cell = false, $align = '' ) ;


ob_end_clean();
// ---------------------------------------------------------
//Close and output PDF document

$pdf->Output('includes/PDF/yd-pfa.pdf', 'F');

echo "Το pdf σώθηκε. Ανοίξτε το <a href=\"includes/PDF/yd-pfa.pdf\">εδώ.<a>";
?>
<script type="text/javascript">window.location = "includes/PDF/yd-pfa.pdf"</script>
<?php
}




if (isset($_POST['symfwnia_submit'])) {
require_once('/includes/tcpdf/config/lang/eng.php');
require_once('/includes/tcpdf/tcpdf.php');
	// Δεδομένα για τη φόρμα
	$textarea = $_POST['symfwnia'];
		
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// Logo
		//$image_file = 'images/style/ethnosimo.jpg';
		//$this->Image($image_file, 10, 5, 8, 8, 'JPG', '', 'T', false, 300, 'C', false, false, 0, false, false, false);
		// Set font
		//$this->SetFont('dejavusans', 'B', 10);
		// Title
		//$this->Cell(0, 15, '', 'B', false, 'C', 0, '', 0, false, 'M', 'B');
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

$print_yd=$textarea;

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
$pdf->writeHTML($print_yd, $ln = true, $fill = false, $reseth = true, $cell = false, $align = '' ) ;


ob_end_clean();
// ---------------------------------------------------------
//Close and output PDF document

$pdf->Output('includes/PDF/yd-symfwnia.pdf', 'F');

echo "Το pdf σώθηκε. Ανοίξτε το <a href=\"includes/PDF/yd-symfwnia.pdf\">εδώ.<a>";
?>
<script type="text/javascript">window.location = "includes/PDF/yd-symfwnia.pdf"</script>
<?php
}




if (isset($_POST['prokatabliteos_submit'])) {
require_once('/includes/tcpdf/config/lang/eng.php');
require_once('/includes/tcpdf/tcpdf.php');
	// Δεδομένα για τη φόρμα
	$textarea = $_POST['prokatabliteos'];
		
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
	//Page header
	public function Header() {
		// Logo
		//$image_file = 'images/style/ethnosimo.jpg';
		//$this->Image($image_file, 10, 5, 8, 8, 'JPG', '', 'T', false, 300, 'C', false, false, 0, false, false, false);
		// Set font
		//$this->SetFont('dejavusans', 'B', 10);
		// Title
		//$this->Cell(0, 15, '', 'B', false, 'C', 0, '', 0, false, 'M', 'B');
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

$print_yd=$textarea;

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
$pdf->writeHTML($print_yd, $ln = true, $fill = false, $reseth = true, $cell = false, $align = '' ) ;


ob_end_clean();
// ---------------------------------------------------------
//Close and output PDF document

$pdf->Output('includes/PDF/yd-prokatabliteos.pdf', 'F');

echo "Το pdf σώθηκε. Ανοίξτε το <a href=\"includes/PDF/yd-prokatabliteos.pdf\">εδώ.<a>";
?>
<script type="text/javascript">window.location = "includes/PDF/yd-prokatabliteos.pdf"</script>
<?php
}
?>