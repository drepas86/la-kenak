<?php
/**
 * PHPWord
 *
 * Copyright (c) 2011 PHPWord
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 010 PHPWord
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    Beta 0.6.3, 08.07.2011
 */

 
 //Below there is the statement of modifications to this file and this file only from the PHPWord Library distributed under the LGPL Lisence
 //which is being included in the distribution Labros Kenak v.1.0
 //This is mandatory by the lisence of PHPWord. Also if a user wants a way of doing the exact same thing with another php word library 
 //one can do this by changing the include_once("kenak_word.php"); line inside the file apotelesmata_kenak.php. 
 //This is to check that a user having this distributed software can use another library other than PHPWord.
 //This file is included in apotelesmata_kenak.php and in this file only. 
 //This file was modified in 15-January 2012 to get variables from a calculation and use PHPWord to store them in an word file 
 //Το αρχείο αυτό τροποποιήθηκε στις 15-Ιανουαρίου-2012 για να δέχεται τιμές από υπολογισμό και να αποθηκεύει ένα αρχείο word σε OPENXML format
 //Εαν αλλάξετε την κατάληξη του αρχείου docx μετά από ένα υπολογισμό ΚΕΝΑΚ σε zip θα παρατηρήσετε και την μορφή του φακέλου. 

require_once 'includes/PHPWord.php';
// Νεο phpword
echo "<br/><br/>" . date('H:i:s') . " Δημιουργία τεύχους από την PHPWord\n";
// Νεο Έγγραφο word
$PHPWord = new PHPWord();

// Νέα ενότητα
$section = $PHPWord->createSection();

// Στυλ γενικό
$styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);
$styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');

// Στυλ κελιών
$styleCell = array('valign'=>'center');
$styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);

// Γραμματοσειρά τίτλου
$fontStyle = array('bold'=>true, 'align'=>'center');
$fontSmall = array('bold'=>true, 'align'=>'center', 'size'=>6);

// Στύλ των πινάκων
$PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);


// Επικεφαλίδα
$header = $section->createHeader();
$header->addText('Μελέτη Ενεργειακής απόδοσης κτιρίου - La-Kenak v2.1 - Free software', array('name'=>'Arial', 'color'=>'blue', 'size'=>'8'));
// Υποσέλιδο με αριθμό σελίδων
$footer = $section->createFooter();
$footer->addPreserveText('Σελίδα {PAGE} από {NUMPAGES}', array('align'=>'center'));

//Εξώφυλλο
$section->addTextBreak(7);
$section->addText('ΜΕΛΕΤΗ ΕΝΕΡΓΕΙΑΚΗΣ ΑΠΟΔΟΣΗΣ ΚΤΙΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'20', 'align'=>'center'));
$section->addTextBreak(5);
$section->addText("ΕΡΓΟ:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("ΘΕΣΗ:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("ΙΔΙΟΚΤΗΤΗΣ:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("ΜΕΛΕΤΗΤΕΣ:", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(2);
$section->addText("Ημερομηνία:", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


//Εισαγωγή
$strSQL = "SELECT * FROM kataskeyi_teyxos";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult[] = mysql_fetch_array($objQuery));
$intro1 = $objResult[0]["text"];
$intro2 = $objResult[1]["text"];
$intro3 = $objResult[2]["text"];

$genikiperigrafi = $objResult[3]["text"];
$genikastoixeiaktirioy = $objResult[4]["text"];
$topografiaoikopedoy = $objResult[5]["text"];
$tekmiriwsi1 = $objResult[6]["text"];
$tekmiriwsi2 = $objResult[7]["text"];
$tekmiriwsi3 = $objResult[8]["text"];
$tekmiriwsi4 = $objResult[9]["text"];
$tekmiriwsi5 = $objResult[10]["text"];
$tekmiriwsi6 = $objResult[11]["text"];
$tekmiriwsi7 = $objResult[12]["text"];
$tekmiriwsi8 = $objResult[13]["text"];
$tekmiriwsi9 = $objResult[14]["text"];
$tekmiriwsi10 = $objResult[15]["text"];
$tekmiriwsi11 = $objResult[16]["text"];
$tekmiriwsi12 = $objResult[17]["text"];

$xwrothetisiktirioy = $objResult[18]["text"];
$xwrothetisileitoyrgiwn = $objResult[19]["text"];
$ilioprostasiaanoig = $objResult[20]["text"];
$fysikosfwtismos = $objResult[21]["text"];
$fysikosdrosismos = $objResult[22]["text"];
$pathitikailiakasyst = $objResult[23]["text"];
$diamorfwsiperiv = $objResult[24]["text"];

$kelyfos1 = $objResult[25]["text"];
$kelyfos2 = $objResult[26]["text"];
$kelyfos3 = $objResult[27]["text"];
$kelyfos4 = $objResult[28]["text"];
$kelyfos5 = $objResult[29]["text"];
$kelyfos6 = $objResult[30]["text"];
$kelyfos7 = $objResult[31]["text"];

$thermoeparkeia1 = $objResult[32]["text"];
$kataskeyastikeslyseis1 = $objResult[33]["text"];

$thermansisxediasmos = $objResult[34]["text"];
$psyksisxediasmos = $objResult[35]["text"];
$elthermansi1 = $objResult[36]["text"];
$elthermansi2 = $objResult[37]["text"];
$elthermansi3 = $objResult[38]["text"];
$elthermansi4 = $objResult[39]["text"];
$elthermansi5 = $objResult[40]["text"];
$elthermansi6 = $objResult[41]["text"];
$elthermansi7 = $objResult[42]["text"];
$elpsyksi1 = $objResult[43]["text"];
$elpsyksi2 = $objResult[44]["text"];
$elpsyksi3 = $objResult[45]["text"];
$elznx1 = $objResult[46]["text"];
$elznx2 = $objResult[47]["text"];
$elznx3 = $objResult[48]["text"];
$elznx4 = $objResult[49]["text"];

$egiliaka1 = $objResult[50]["text"];
$egiliaka2 = $objResult[51]["text"];
$egiliaka3 = $objResult[52]["text"];
$egiliaka4 = $objResult[53]["text"];
$egiliaka5 = $objResult[54]["text"];
$egiliaka6 = $objResult[55]["text"];
$egiliaka7 = $objResult[56]["text"];

$egfwtismos1 = $objResult[57]["text"];
$egfwtismos2 = $objResult[58]["text"];
$egfwtismos3 = $objResult[59]["text"];
$enalaktiki1 = $objResult[60]["text"];
$enalaktiki2 = $objResult[61]["text"];
$enalaktiki3 = $objResult[62]["text"];

$kelyfos3331 = $objResult[63]["text"];
$kelyfos3332 = $objResult[64]["text"];
$kelyfos3333 = $objResult[65]["text"];
$kelyfos3334 = $objResult[66]["text"];
$kelyfos3335 = $objResult[67]["text"];


$section->addText('1.ΕΙΣΑΓΩΓΗ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText($intro1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($intro2, array('name'=>'Arial', 'color'=>'black'));
$section->addText($intro3, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText('2.ΓΕΝΙΚΗ ΠΕΡΙΓΡΑΦΗ ΚΤΗΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText($genikiperigrafi, array('name'=>'Arial', 'color'=>'black'));

$section->addText('2.1.Γενικά Στοιχεία κτηρίου', array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($genikastoixeiaktirioy, array('name'=>'Arial', 'color'=>'black'));

$section->addText('2.2.Τοπογραφία οικοπέδου κτηρίου', array('name'=>'Arial', 'color'=>'blue', 'size'=>'18'));
$section->addText($topografiaoikopedoy, array('name'=>'Arial', 'color'=>'black'));

$section->addPageBreak(1);


$section->addText('3.ΤΕΚΜΗΡΙΩΣΗ ΑΡΧΙΤΕΚΤΟΝΙΚΟΥ ΣΧΕΔΙΑΣΜΟΥ ΤΟΥ ΚΤΙΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText($tekmiriwsi1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi2, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi3, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi4, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi5, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi6, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi7, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi8, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi9, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi10, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi11, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsi12, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText('3.1.Χωροθέτηση κτηρίου στο οικόπεδο', array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($xwrothetisiktirioy, array('name'=>'Arial', 'color'=>'black'));

$section->addText('3.2.Χωροθέτηση λειτουργιών στο κτήριο', array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($xwrothetisileitoyrgiwn, array('name'=>'Arial', 'color'=>'black'));

$section->addText('3.3.Ηλιοπροστασία ανοιγμάτων', array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($ilioprostasiaanoig, array('name'=>'Arial', 'color'=>'black'));

$section->addText('3.4.Φυσικός φωτισμός', array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($fysikosfwtismos, array('name'=>'Arial', 'color'=>'black'));

$section->addText('3.5.Φυσικός δροσισμός', array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($fysikosdrosismos, array('name'=>'Arial', 'color'=>'black'));

$section->addText('3.6.Παθητικά ηλιακά συστήματα κτηρίου', array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($pathitikailiakasyst, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText('3.7.Διαμόρφωση του περιβάλλοντα χώρου για τη βελτίωση του μικροκλίματος', array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($diamorfwsiperiv, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText('4.ΕΛΕΓΧΟΣ ΘΕΡΜΟΜΟΝΩΤΙΚΗΣ ΕΠΑΡΚΕΙΑΣ ΔΟΜΙΚΩΝ ΣΤΟΙΧΕΙΩΝ ΚΑΙ ΚΤΗΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText("Σύμφωνα με την Κ.Εν.Α.Κ. όλα τα δομικά στοιχεία ενός νέου ή ριζικά ανακαινιζόμενου κτηρίου οφείλουν να πληρούν 
τους περιορισμούς θερμομόνωσης του πίνακα 4.1:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Πίνακας 4.1.Μέγιστες επιτρεπόμενες τιμές του συντελεστή θερμοπερατότητας διαφόρων 
δομικών στοιχείων ανά κλιματική ζώνη.", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Δομικό στοιχείο', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Σύμβολο', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ζώνη Α', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ζώνη Β', $fontStyle);
$table->addCell(500, $styleCell)->addText('Ζώνη Γ', $fontStyle);
$table->addCell(500, $styleCell)->addText('Ζώνη Δ', $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Εξωτερική οριζόντια ή κεκλιμένη επιφάνεια σε επαφή με τον εξωτερικό αέρα (οροφές)", $fontSmall);
$table->addCell(2000)->addText("Ur");
$table->addCell(2000)->addText("0,5");
$table->addCell(2000)->addText("0,45");
$table->addCell(2000)->addText("0,4");
$table->addCell(2000)->addText("0,35");
$table->addRow();
$table->addCell(2000)->addText("Εξωτερικοί τοίχοι σε επαφή με τον εξωτερικό αέρα", $fontSmall);
$table->addCell(2000)->addText("Ut");
$table->addCell(2000)->addText("0,6");
$table->addCell(2000)->addText("0,5");
$table->addCell(2000)->addText("0,45");
$table->addCell(2000)->addText("0,4");
$table->addRow();
$table->addCell(2000)->addText("Δάπεδα  σε  επαφή  με  τον  εξωτερικό  αέρα (πιλοτές)", $fontSmall);
$table->addCell(2000)->addText("Ufa");
$table->addCell(2000)->addText("0,5");
$table->addCell(2000)->addText("0,45");
$table->addCell(2000)->addText("0,4");
$table->addCell(2000)->addText("0,35");
$table->addRow();
$table->addCell(2000)->addText("Εξωτερικοί τοίχοι σε επαφή με μη θερμαινόμενους χώρους", $fontSmall);
$table->addCell(2000)->addText("Utu");
$table->addCell(2000)->addText("1,5");
$table->addCell(2000)->addText("1");
$table->addCell(2000)->addText("0,8");
$table->addCell(2000)->addText("0,7");
$table->addRow();
$table->addCell(2000)->addText("Εξωτερικοί τοίχοι σε επαφή με το έδαφος", $fontSmall);
$table->addCell(2000)->addText("Utb");
$table->addCell(2000)->addText("1,5");
$table->addCell(2000)->addText("1");
$table->addCell(2000)->addText("0,8");
$table->addCell(2000)->addText("0,7");
$table->addRow();
$table->addCell(2000)->addText("Δάπεδα σε επαφή με κλειστούς μη θερμαινόμενους χώρους", $fontSmall);
$table->addCell(2000)->addText("Ufu");
$table->addCell(2000)->addText("1,2");
$table->addCell(2000)->addText("0,9");
$table->addCell(2000)->addText("0,75");
$table->addCell(2000)->addText("0,7");
$table->addRow();
$table->addCell(2000)->addText("Δάπεδα σε επαφή με το έδαφος", $fontSmall);
$table->addCell(2000)->addText("Ufb");
$table->addCell(2000)->addText("1,2");
$table->addCell(2000)->addText("0,9");
$table->addCell(2000)->addText("0,75");
$table->addCell(2000)->addText("0,7");
$table->addRow();
$table->addCell(2000)->addText("Κουφώματα ανοιγμάτων", $fontSmall);
$table->addCell(2000)->addText("Uw");
$table->addCell(2000)->addText("3,2");
$table->addCell(2000)->addText("3");
$table->addCell(2000)->addText("2,8");
$table->addCell(2000)->addText("2,6");
$table->addRow();
$table->addCell(2000)->addText("Γυάλινες προσόψεις κτηρίων μη ανοιγόμενες ή μερικώς ανοιγόμενες", $fontSmall);
$table->addCell(2000)->addText("Ugf");
$table->addCell(2000)->addText("2,2");
$table->addCell(2000)->addText("2");
$table->addCell(2000)->addText("1,8");
$table->addCell(2000)->addText("1,8");
$section->addPageBreak(1);

$section->addText("Ταυτόχρονα  η  τιμή  του  μέσου  συντελεστή  θερμοπερατότητας  του  εξεταζόμενου  
κτηρίου  δεν πρέπει να ξεπερνάει τα όρια του πίνακα 4.2:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Πίνακας 4.2.Μέγιστες επιτρεπόμενες τιμές του μέσου συντελεστή θερμοπερατότητας 
κτηρίου, ανά κλιματική ζώνη συναρτήσει του λόγου της περιβάλλουσας επιφάνειας του κτηρίου προς 
τον όγκο του.", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow(500);
$table->addCell(2000, $styleCell)->addText('A/V', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ζώνη Α', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ζώνη Β', $fontStyle);
$table->addCell(500, $styleCell)->addText('Ζώνη Γ', $fontStyle);
$table->addCell(500, $styleCell)->addText('Ζώνη Δ', $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("<=0,2");
$table->addCell(2000)->addText("1,26");
$table->addCell(2000)->addText("1,14");
$table->addCell(2000)->addText("1,05");
$table->addCell(2000)->addText("0,96");
$table->addRow();
$table->addCell(2000)->addText("0,3");
$table->addCell(2000)->addText("1,2");
$table->addCell(2000)->addText("1,09");
$table->addCell(2000)->addText("1");
$table->addCell(2000)->addText("0,92");
$table->addRow();
$table->addCell(2000)->addText("0,4");
$table->addCell(2000)->addText("1,15");
$table->addCell(2000)->addText("1,03");
$table->addCell(2000)->addText("0,95");
$table->addCell(2000)->addText("0,87");
$table->addRow();
$table->addCell(2000)->addText("0,5");
$table->addCell(2000)->addText("1,09");
$table->addCell(2000)->addText("0,98");
$table->addCell(2000)->addText("0,9");
$table->addCell(2000)->addText("0,83");
$table->addRow();
$table->addCell(2000)->addText("0,6");
$table->addCell(2000)->addText("1,03");
$table->addCell(2000)->addText("0,93");
$table->addCell(2000)->addText("0,86");
$table->addCell(2000)->addText("0,78");
$table->addRow();
$table->addCell(2000)->addText("0,7");
$table->addCell(2000)->addText("0,98");
$table->addCell(2000)->addText("0,88");
$table->addCell(2000)->addText("0,81");
$table->addCell(2000)->addText("0,73");
$table->addRow();
$table->addCell(2000)->addText("0,8");
$table->addCell(2000)->addText("0,92");
$table->addCell(2000)->addText("0,83");
$table->addCell(2000)->addText("0,76");
$table->addCell(2000)->addText("0,69");
$table->addRow();
$table->addCell(2000)->addText("0,9");
$table->addCell(2000)->addText("0,86");
$table->addCell(2000)->addText("0,78");
$table->addCell(2000)->addText("0,71");
$table->addCell(2000)->addText("0,64");
$table->addRow();
$table->addCell(2000)->addText(">=1");
$table->addCell(2000)->addText("0,81");
$table->addCell(2000)->addText("0,73");
$table->addCell(2000)->addText("0,66");
$table->addCell(2000)->addText("0,6");

$section->addText("Ο έλεγχος θερμομονωτικής επάρκειας πραγματοποιείται σε δύο στάδια:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("1.Υπολογίζεται ο συντελεστής θερμοπερατότητας U όλων των δομικών στοιχείων και ελέγχεται 
η συμμόρφωση του στα όρια των απαιτήσεων του πίνακα 4.1.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("2.Υπολογίζεται  ο  μέσος  συντελεστής  θερμοπερατότητας  του  κτηρίου  Um  και  ελέγχεται  
η συμμόρφωση του στα όρια των απαιτήσεων του πίνακα 4.2.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("1)Έλεγχος θερμομονωτικής επάρκειας δομικού στοιχείου", array('name'=>'Arial', 'color'=>'black', 'size'=>'14'));
$section->addText("Ο υπολογισμός τόσο των συντελεστών θερμοπερατότητας U των δομικών στοιχείων όσο και του 
μέσου συντελεστή θερμοπερατότητας Um  του κτηρίου, γίνεται βάσει της Τ.Ο.Τ.Ε.Ε. 20701-2/2010. 
Βάσει της Τ.Ο.Τ.Ε..Ε. 20701-2/2010 η γενική	σχέση υπολογισμού του συντελεστή θερμοπερατότητας 
αδιαφανών δομικών στοιχείων είναι:", array('name'=>'Arial', 'color'=>'black'));
$section->addImage('images/word-images/adiafani.jpg');
$section->addText(",όπου:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("dj  το πάχος της ομογενούς και ισότροπης στρώσης δομικού υλικού j", array('name'=>'Arial', 'color'=>'black'));
$section->addText("λj ο συντελεστής θερμικής αγωγιμότητας του ομογενούς και ισότροπου υλικού j,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Ri και Ra οι αντιστάσεις θερμικής μετάβασης εκατέρωθεν του δομικού στοιχείου και", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Rδ  η θερμική αντίσταση κλειστού διάκενου αέρα.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Αντίστοιχα ο συντελεστής θερμοπερατότητας διαφανούς δομικού στοιχείου Uw υπολογίζεται από τη σχέση:", array('name'=>'Arial', 'color'=>'black'));
$section->addImage('images/word-images/diafani.jpg');
$section->addText(",όπου:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Uf  ο συντελεστής θερμοπερατότητας πλαισίου του κουφώματος,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Ug  ο συντελεστής θερμοπερατότητας του υαλοπίνακα του κουφώματος,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Αf  το εμβαδό επιφάνειας του πλαισίου του κουφώματος,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Αg  το εμβαδό επιφάνειας του υαλοπίνακα του κουφώματος,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("lg  το μήκος της θερμογέφυρας του υαλοπίνακα του κουφώματος και", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Ψg  ο συντελεστής γραμμικής θερμοπερατότητας του υαλοπίνακα του κουφώματος.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Σε κάθε περίπτωση πρέπει τόσο για τα διαφανή όσο και για τα αδιαφανή δομικά στοιχεία να ισχύει", array('name'=>'Arial', 'color'=>'black'));
$section->addText("U≤Uδ.σ,max	[4.3]", array('name'=>'Arial', 'color'=>'black'));
$section->addText(",όπου:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("U ο συντελεστής θερμικής διαπερατότητας δομικού στοιχείου όπως υπολογίστηκε βάση των σχέσεων (4.1) ή (4.2) και", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Uδ.σ,max η μέγιστη επιτρεπόμενη τιμή για το δομικό στοιχείο (πίνακας 4.1).", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText("2) Έλεγχος θερμομονωτικής επάρκειας κτηρίου", array('name'=>'Arial', 'color'=>'black', 'size'=>'14'));
$section->addText("Εφόσον κάθε δομικό στοιχείο καλύπτει τις απαιτήσεις του πίνακα 4.1, απαιτείται και το κτίριο 
στο σύνολό του να παρουσιάζει ένα ελάχιστο βαθμό θερμικής προστασίας. Ο υπολογισμός του μέσου συντελεστή 
θερμοπερατότητας του κτιρίου δίνεται από τη σχέση:", array('name'=>'Arial', 'color'=>'black'));
$section->addImage('images/word-images/mesos.jpg');
$section->addText(",όπου:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Αj  το εμβαδό δομικού στοιχείου j,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Uj  o συντελεστής θερμοπερατότητας του δομικού στοιχείου j,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Ψi  ο συντελεστής γραμμικής θερμοπερατότητας της θερμογέφυρας i,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("li    το μήκος της θερμογέφυρας i και", array('name'=>'Arial', 'color'=>'black'));
$section->addText("b μειωτικός συντελεστής.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε κάθε περίπτωση πρέπει:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Um≤Um,max	[4.5]", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Όπου Um,max είναι ο μέγιστος επιτρεπόμενος συντελεστής 
θερμοπερατότητας του κτηρίου και δίνεται στον πίνακα 4.1.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε περίπτωση που Um>Um,max ο μελετητής είναι υποχρεωμένος να ακολουθήσει μία 
εκ των τριών παρακάτω επιλογών ή συνδυασμό τους και να αρχίσει εκ νέου τον υπολογισμό:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("1.να βελτιώσει την θερμική προστασία των αδιαφανών δομικών στοιχείων,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("2. να βελτιώσει την θερμική προστασία των διαφανών δομικών στοιχείων,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("3. να  μειώσει την δημιουργία θερμογεφυρών στο κτηριακό  κέλυφος, τροποποιώντας 
τον σχεδιασμό των δομικών στοιχείων στα οποία οφείλονται αυτές.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Βάσει της Τ.Ο.Τ.Ε.Ε. 20701-2/2010 «Θερμοφυσικές ιδιότητες δομικών υλικών και 
έλεγχος θερμομονωτικής επάρκειας των κτιρίων», για τον υπολογισμό των θερμογεφυρών, ο μελετητής 
έχει δύο επιλογές:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("1.να επακολουθήσει την απλουστευμένη μέθοδο με χρήση του πίνακα 15 της 
Τ.Ο.Τ.Ε.Ε. 20701-2/2010 ,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("2.να κάνει αναλυτικά τους υπολογισμούς με χρήση των πινάκων 16α έως και 
16λ της Τ.Ο.Τ.Ε.Ε.20701-2/2010.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("O μειωτικός συντελεστή b υπολογίζεται με χρήση της σχέσης 2.21 της 
Τ.Ο.Τ.Ε.Ε. 20701-2/2010. Εναλλακτικά, και για λόγους απλοποίησης,  μπορεί να θεωρηθεί 
ίσος με 0,5. Στην παρούσα μελέτη ακολουθείται  η απλουστευμένη μέθοδος υπολογισμού των 
θερμογεφυρών και ο μειωτικός συντελεστής b θεωρείται ίσος με 0,5.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("4.1.Γενικά στοιχεία κτηριακού κελύφους.", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Το κτίριο ανήκει στην " . $zwni . " κλιματική ζώνη.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Κάθε δομικό στοιχείο πρέπει να έχει συντελεστή θερμοπερατότητας μικρότερο από αυτούς που δίνονται 
στον πίνακα 4.1 για την " . $zwni . " κλιματική ζώνη.", array('name'=>'Arial', 'color'=>'black'));
$section->addText($kelyfos1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($kelyfos2, array('name'=>'Arial', 'color'=>'black'));
$section->addText($kelyfos3, array('name'=>'Arial', 'color'=>'black'));
$section->addText($kelyfos4, array('name'=>'Arial', 'color'=>'black'));
$section->addText($kelyfos5, array('name'=>'Arial', 'color'=>'black'));
$section->addText($kelyfos6, array('name'=>'Arial', 'color'=>'black'));
$section->addText($kelyfos7, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);
 
 
$section->addText("4.2. Έλεγχος θερμομονωτικής επάρκειας αδιαφανών δομικών στοιχείων", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
 $section->addText("Στον παρακάτω πίνακα δίνονται συνοπτικά οι συντελεστές θερμοπερατότητας των δομικών στοιχείων των θερμαινόμενων και των 
 μη θερμαινόμενων χώρων του κτιρίου, οι οποίοι πληρούν τις ελάχιστες απαιτήσεις του Κ.ΕΝ.Α.Κ.. Στο Τεύχος Υπολογισμών που συνοδεύει 
 την παρούσα μελέτη δίνονται αναλυτικά οι υπολογισμοί των συντελεστών θερμοπερατότητας ενώ στους πίνακες των δομικών στοιχείων 
 δίνονται οι συντελεστές αυτοί.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Πίνακας 4.3- Συντελεστής θερμοπερατότητας των δομικών στοιχείων των θερμαινόμενων και των μη θερμαινόμενων 
χώρων του κτιρίου.", array('name'=>'Arial', 'color'=>'black'));
//Συντελεστές ανάλογα με τη ζώνη
$array_domika41 = get_times_all($zwni, "domika41");
$domika411 = $array_domika41[0][0];
$domika412 = $array_domika41[1][0];
$domika413 = $array_domika41[2][0];
$domika414 = $array_domika41[3][0];
$domika415 = $array_domika41[4][0];
$domika416 = $array_domika41[5][0];
$domika417 = $array_domika41[6][0];
$domika418 = $array_domika41[7][0];
$domika419 = $array_domika41[8][0];

$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Δομικό στοιχείο', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Φύλλο ελέγχου', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U [W/(m2K)]', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Umax [W/(m2K)] [Πίνακας 4.1]', $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Εξωτερική τοιχοποιία σε επαφή με εξωτερικό αέρα");
$table->addCell(2000)->addText("1.1");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika412);
$table->addRow();
$table->addCell(2000)->addText("Εξωτερική τοιχοποιία σε επαφή με εξωτερικό αέρα επένδυση πέτρα");
$table->addCell(2000)->addText("1.1");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika412);
$table->addRow();
$table->addCell(2000)->addText("Εξωτερική δοκός/υποστύλωμα/τοίχωμα σε επαφή με εξωτερικό αέρα και επένδυση πέτρα");
$table->addCell(2000)->addText("1.2");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika412);
$table->addRow();
$table->addCell(2000)->addText("Εξωτερική δοκός/υποστύλωμα/τοίχωμα σε επαφή με εξωτερικό αέρα");
$table->addCell(2000)->addText("1.2");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika412);
$table->addRow();
$table->addCell(2000)->addText("Τοιχοποιία συρομένων σε επαφή με εξωτερικό αέρα");
$table->addCell(2000)->addText("1.3");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika412);
$table->addRow();
$table->addCell(2000)->addText("Τοιχοποιία συρομένων σε επαφή με εξωτερικό αέρα και επένδυση πέτρα");
$table->addCell(2000)->addText("1.3");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika412);
$table->addRow();
$table->addCell(2000)->addText("Δοκός/υποστύλωμα/τοίχωμα σε επαφή με μη θερμαινόμενο χώρο");
$table->addCell(2000)->addText("1.4");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika414);
$table->addRow();
$table->addCell(2000)->addText("Δώμα βατό  σε επαφή με εξωτερικό αέρα");
$table->addCell(2000)->addText("1.5");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika413);
$table->addRow();
$table->addCell(2000)->addText("Δάπεδο σε προεξοχή/πυλωτή σε επαφή με εξωτερικό αέρα");
$table->addCell(2000)->addText("1.6");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika413);
$table->addRow();
$table->addCell(2000)->addText("Οροφή κεραμίδι με μόνωση επ’ αυτού, σε επαφή με εξωτερικό αέρα");
$table->addCell(2000)->addText("1.7");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika413);
$table->addRow();
$table->addCell(2000)->addText("Δάπεδο σε επαφή με μη θερμαινόμενο χώρο.");
$table->addCell(2000)->addText("1.8");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika416);
$table->addRow();
$table->addCell(2000)->addText("Δάπεδο σε επαφή με το έδαφος");
$table->addCell(2000)->addText("1.9");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($domika417);
$table->addRow();
$table->addCell(2000)->addText("Τοιχώματα χωρίς θερμομόνωση σε επαφή με τον εξωτερικό αέρα");
$table->addCell(2000)->addText("1.10");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("Δεν υπάρχει απαίτηση");
$table->addRow();
$table->addCell(2000)->addText("Τοιχώματα χωρίς θερμομόνωση σε επαφή με το έδαφος");
$table->addCell(2000)->addText("1.11");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("Δεν υπάρχει απαίτηση");
$table->addRow();
$table->addCell(2000)->addText("Δάπεδο Υπογείου σε επαφή με το έδαφος");
$table->addCell(2000)->addText("1.12");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("Δεν υπάρχει απαίτηση");
$table->addRow();
$table->addCell(2000)->addText("Οροφή χωρίς θερμομόνωση σε επαφή με εξωτερικό αέρα");
$table->addCell(2000)->addText("1.13");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("Δεν υπάρχει απαίτηση");

$section->addText("Με βάση τις Τ.Ο.Τ.Ε.Ε. 20701-1/2010 και Τ.Ο.Τ.Ε.Ε. 20701-2/2010, οι συντελεστές θερμοπερατότητας δομικών στοιχείων 
που υπεισέρχονται στον υπολογισμό του μέσου συντελεστή θερμοπερατότητας του κτιρίου και στον υπολογισμό κατανάλωσης ενέργειας, 
είναι οι ισοδύναμοι συντελεστές θερμοπερατότητας U΄ και όχι αυτοί που δίνονται στον πίνακα 4.2. Ο αναλυτικός υπολογισμός τους γίνεται 
βάσει της μεθοδολογίας  που  αναπτύσσεται  στην  ενότητα  2.1.6	της Τ.Ο.Τ.Ε.Ε. 20701-2/2010 και δίνεται αναλυτικά στο Τεύχος Υπολογισμών 
που συνοδεύει την παρούσα μελέτη. Στον πίνακα 4.4 δίνονται συνοπτικά οι ισοδύναμοι συντελεστές U΄ των δομικών 
στοιχείων σε επαφή με το έδαφος.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Πίνακας 4.4- Ισοδύναμοι συντελεστές θερμοπερατότητας των δομικών στοιχείων σε επαφή με το έδαφος  των θερμαινόμενων 
και των μη θερμαινόμενων χώρων του κτιρίου", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Δομικό στοιχείο', $fontStyle);
$table->addCell(2000, $styleCell)->addText('φύλ.', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U [W/(m2K)]', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μέσο βάθος z [m]', $fontStyle);
$table->addCell(2000, $styleCell)->addText("U' [W/(m2K)]", $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Δάπεδο ισογείου σε επαφή με το έδαφος", $fontSmall);
$table->addCell(2000)->addText("", $fontSmall);
$table->addCell(2000)->addText($dapedo_u1, $fontSmall);
$table->addCell(2000)->addText("0", $fontSmall);
$table->addCell(2000)->addText($dapedo_u1, $fontSmall);
$table->addRow();
$table->addCell(2000)->addText("Δάπεδο ισογείου σε επαφή με μη θερμαινόμενο χώρο", $fontSmall);
$table->addCell(2000)->addText("", $fontSmall);
$table->addCell(2000)->addText($dapedo_u2, $fontSmall);
$table->addCell(2000)->addText("0", $fontSmall);
$table->addCell(2000)->addText($dapedo_u2, $fontSmall);
$section->addPageBreak(1);


$section->addText("4.3.Έλεγχος θερμομονωτικής επάρκειας διαφανών δομικών στοιχείων", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText("Ο όροφος του κτιρίου θα λειτουργήσει ως τμήμα από τη " . $xrisi_znx_iliakos . ". Σύμφωνα με τον Κ.Εν.Α.Κ., τα κουφώματα που θα 
τοποθετηθούν οφείλουν να έχουν συντελεστή θερμοπερατότητας U≤ " . $domika418 . " W/(m2K).", array('name'=>'Arial', 'color'=>'black'));
$section->addText($thermoeparkeia1, array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow(900);
$table->addCell(2000, $styleCell)->addText('Άνοιγμα', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Τύπος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μέγιστο U', $fontStyle);

for ($j = 1; $j <= $anoig_t_boreia; $j++) {
$t = "b";
$an = "an_b_";
if (${$an."anoig_eidos".$j} == 1) {$anoig_type = "Αδιαφανές άνοιγμα";}
if (${$an."anoig_eidos".$j} == 2) {$anoig_type = "Συρόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 3) {$anoig_type = "Ανοιγόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 4) {$anoig_type = "Επάλληλο παράθυρο";}
if (${$an."anoig_eidos".$j} == 5) {$anoig_type = "Συρόμενη πόρτα απλή";}
if (${$an."anoig_eidos".$j} == 6) {$anoig_type = "Συρόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 7) {$anoig_type = "Ανοιγόμενη πόρτα μονή";}
if (${$an."anoig_eidos".$j} == 8) {$anoig_type = "Ανοιγόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 9) {$anoig_type = "Επάλληλη πόρτα";}
$table->addRow();
$table->addCell(2000)->addText(${$an."name".$j});
$table->addCell(2000)->addText($anoig_type);
$table->addCell(2000)->addText(${$an."anoig_u".$j});
$table->addCell(2000)->addText($domika418);
}

$table = $section->addTable('myOwnTableStyle');
$table->addRow(900);
$table->addCell(2000, $styleCell)->addText('Άνοιγμα', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Τύπος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μέγιστο U', $fontStyle);

for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
$t = "a";
$an = "an_a_";
if (${$an."anoig_eidos".$j} == 1) {$anoig_type = "Αδιαφανές άνοιγμα";}
if (${$an."anoig_eidos".$j} == 2) {$anoig_type = "Συρόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 3) {$anoig_type = "Ανοιγόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 4) {$anoig_type = "Επάλληλο παράθυρο";}
if (${$an."anoig_eidos".$j} == 5) {$anoig_type = "Συρόμενη πόρτα απλή";}
if (${$an."anoig_eidos".$j} == 6) {$anoig_type = "Συρόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 7) {$anoig_type = "Ανοιγόμενη πόρτα μονή";}
if (${$an."anoig_eidos".$j} == 8) {$anoig_type = "Ανοιγόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 9) {$anoig_type = "Επάλληλη πόρτα";}
$table->addRow();
$table->addCell(2000)->addText(${$an."name".$j});
$table->addCell(2000)->addText($anoig_type);
$table->addCell(2000)->addText(${$an."anoig_u".$j});
$table->addCell(2000)->addText($domika418);
}

$table = $section->addTable('myOwnTableStyle');
$table->addRow(900);
$table->addCell(2000, $styleCell)->addText('Άνοιγμα', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Τύπος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μέγιστο U', $fontStyle);

for ($j = 1; $j <= $anoig_t_notia; $j++) {
$t = "n";
$an = "an_n_";
if (${$an."anoig_eidos".$j} == 1) {$anoig_type = "Αδιαφανές άνοιγμα";}
if (${$an."anoig_eidos".$j} == 2) {$anoig_type = "Συρόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 3) {$anoig_type = "Ανοιγόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 4) {$anoig_type = "Επάλληλο παράθυρο";}
if (${$an."anoig_eidos".$j} == 5) {$anoig_type = "Συρόμενη πόρτα απλή";}
if (${$an."anoig_eidos".$j} == 6) {$anoig_type = "Συρόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 7) {$anoig_type = "Ανοιγόμενη πόρτα μονή";}
if (${$an."anoig_eidos".$j} == 8) {$anoig_type = "Ανοιγόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 9) {$anoig_type = "Επάλληλη πόρτα";}
$table->addRow();
$table->addCell(2000)->addText(${$an."name".$j});
$table->addCell(2000)->addText($anoig_type);
$table->addCell(2000)->addText(${$an."anoig_u".$j});
$table->addCell(2000)->addText($domika418);
}

$table = $section->addTable('myOwnTableStyle');
$table->addRow(900);
$table->addCell(2000, $styleCell)->addText('Άνοιγμα', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Τύπος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μέγιστο U', $fontStyle);

for ($j = 1; $j <= $anoig_t_dytika; $j++) {
$t = "d";
$an = "an_d_";
if (${$an."anoig_eidos".$j} == 1) {$anoig_type = "Αδιαφανές άνοιγμα";}
if (${$an."anoig_eidos".$j} == 2) {$anoig_type = "Συρόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 3) {$anoig_type = "Ανοιγόμενο παράθυρο";}
if (${$an."anoig_eidos".$j} == 4) {$anoig_type = "Επάλληλο παράθυρο";}
if (${$an."anoig_eidos".$j} == 5) {$anoig_type = "Συρόμενη πόρτα απλή";}
if (${$an."anoig_eidos".$j} == 6) {$anoig_type = "Συρόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 7) {$anoig_type = "Ανοιγόμενη πόρτα μονή";}
if (${$an."anoig_eidos".$j} == 8) {$anoig_type = "Ανοιγόμενη πόρτα διπλή";}
if (${$an."anoig_eidos".$j} == 9) {$anoig_type = "Επάλληλη πόρτα";}
$table->addRow();
$table->addCell(2000)->addText(${$an."name".$j});
$table->addCell(2000)->addText($anoig_type);
$table->addCell(2000)->addText(${$an."anoig_u".$j});
$table->addCell(2000)->addText($domika418);
}
$section->addPageBreak(1);



//Έλεγχος θερμομονωτικής επάρκειας
$section->addText('4.4.Έλεγχος θερμομονωτικής επάρκειας', array('name'=>'Arial', 'color'=>'006699', 'size'=>'16'));
$section->addTextBreak(1);
$section->addText('Για τον έλεγχο της θερμομονωτικής επάρκειας του κτιρίου είναι απαραίτητος ο υπολογισμός του λόγου της εξωτερικής 
περιβάλλουσας επιφάνειας των θερμαινόμενων τμημάτων του κτιρίου προς τον όγκο τους. Στο Τεύχος Υπολογισμών δίνεται αναλυτικά ο τρόπος 
υπολογισμού του λόγου Α/V.', array('name'=>'Arial', 'color'=>'black'));

// Πίνακας συνόλου δομικών
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Είδος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Επιφάνεια', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U*A', $fontStyle);
//προσθήκη δεδομένων
$table->addRow();
$table->addCell(2000)->addText("Στοιχεία κατακόρυφων αδιαφανών");
$table->addCell(2000)->addText($a_kat_adiafanwn);
$table->addCell(2000)->addText($ua_kat_adiafanwn);
$table->addRow();
$table->addCell(2000)->addText("Στοιχεία οριζόντιων αδιαφανών");
$table->addCell(2000)->addText($a_oriz_adiafanwn);
$table->addCell(2000)->addText($ua_oriz_adiafanwn);
$table->addRow();
$table->addCell(2000)->addText("Στοιχεία διαφανών");
$table->addCell(2000)->addText($a_diafanwn);
$table->addCell(2000)->addText($ua_diafanwn);
$table->addRow();
$table->addCell(2000)->addText("Σύνολο");
$table->addCell(2000)->addText($a_thermoperatotitas);
$table->addCell(2000)->addText($ua_thermoperatotitas);

$section->addTextBreak(1);
$section->addText("U*A θερμογεφυρών :" . $thermogefyres, array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(0);
$section->addText("Σύνολικό U*A  :" . $sunolo_ua, array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(0);
$section->addText("A/V  :" . $aprosv, array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(0);
$section->addText("Τιμή (U*A)/Α  :" . $uadiaa, array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(0);
$section->addText("Η μέγιστη επιτρεπόμενη τιμή μέσου συντελεστή θερμοπερατότητας Um  [W/(m2·Κ)] :" . $umax, array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(0);
if ($uadiaa  <= $umax){
$section->addText("Τηρείται U=" . $uadiaa . " <= Umax=" . $umax, array('name'=>'Arial', 'color'=>'blue'));
}
else{
$section->addText("ΔΕΝ Τηρείται U<Umax καθώς U=" . $uadiaa . "  > Umax=" . $umax, array('name'=>'Arial', 'color'=>'red'));
}

$section->addText("Όπως προέκυψε A/V = " . $aprosv . "m-1   το οποίο από τον πίνακα 4.1 αντιστοιχεί σε μέγιστο επιτρεπτό Um,max="
 . $umax . "W/(m2K) (με χρήση γραμμικής παρεμβολής).", array('name'=>'Arial', 'color'=>'black'));
$section->addText(" Στον πίνακα παρακάτω δίνονται συγκεντρωτικά τα εμβαδά των δομικών στοιχείων, τα αθροίσματα των U×A, καθώς και 
τα αθροίσματα των Ψxl. Όπως προκύπτει, ο μέσος συντελεστής θερμοπερατότητας του κτηρίου ισούται με:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Um= " . $uadiaa . "W/(m2K)< Um,max= " . $umax . " W/(m2K)", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Συνεπώς, σύμφωνα με τις ελάχιστες απαιτήσεις του Κ.Εν.Α.Κ. για τον μέσο συντελεστή θερμοπερατότητας Um, το κτίριο  είναι
  επαρκώς  θερμομονωμένο. Στο Τεύχος Υπολογισμών που συνοδεύει την παρούσα μελέτη δίνονται αναλυτικά όλοι οι υπολογισμοί.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("4.4.1.Κατασκευαστικές Λύσεις Που Υιοθετήθηκαν Για Τη Μείωση Των Θερμικών 
Απωλειών Λόγω Θερμογεφυρών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText($kataskeyastikeslyseis1, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("5.ΤΕΚΜΗΡΙΩΣΗ ΕΛΑΧΙΣΤΩΝ ΠΡΟΔΙΑΓΡΑΦΩΝ ΚΑΙ ΣΧΕΔΙΑΣΜΟΥ ΤΩΝ ΗΛΕΚΤΡΟΜΗΧΑΝΟΛΟΓΙΚΩΝ ΣΥΣΤΗΜΑΤΩΝ ΤΟΥ ΚΤΙΡΙΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Σύμφωνα με το άρθρο 8 του Κ.Εν.Α.Κ., τα νέα και ριζικά ανακαινιζόμενα κτίρια, πρέπει να πληρούν ορισμένες 
ελάχιστες προδιαγραφές όσον αφορά τις ηλεκτρομηχανολογικές εγκαταστάσεις τους, όπως:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Όπου τοποθετούνται κεντρικές κλιματιστικές μονάδες (ΚΚΜ) ή μονάδες παροχής νωπού αέρα ή μονάδες εξαερισμού και 
όσες από αυτές λειτουργούν με νωπό αέρα > 60% της παροχής τους, πρέπει να διαθέτουν σύστημα ανάκτησης θερμότητας με απόδοση 
τουλάχιστον 50%.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Όλα  τα  δίκτυα  διανομής  (νερού  ή  αλλού  μέσου)  των  συστημάτων  θέρμανσης,  ψύξης-κλιματισμού και 
ΖΝΧ, πρέπει να διαθέτουν την ελάχιστη θερμομόνωση που καθορίζεται στην Τ.Ο.Τ.Ε.Ε. 20701-1/2010. Ιδιαίτερα τα δίκτυα που 
διέρχονται από εξωτερικούς χώρους θα διαθέτουν κατ ελάχιστον θερμομόνωση πάχους 19mm για θέρμανση-ψύξη-κλιματισμό και 13mm 
για ΖΝΧ, με αγωγιμότητα θερμομονωτικού υλικού λ=0,040 W/(m.K) στους 20οC (ή ισοδύναμα πάχη άλλου πιστοποιημένου 
θερμομονωτικού υλικού).", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι αεραγωγοί διανομής κλιματιζόμενου αέρα (προσαγωγής και ανακυκλοφορίας) που διέρχονται από εξωτερικούς 
χώρους πρέπει να διαθέτουν θερμομόνωση με αγωγιμότητα θερμομονωτικού υλικού λ=0,040 W/(m.K) στους 20οC, και ελάχιστο πάχος 40mm, 
ενώ για διέλευση σε εσωτερικούς χώρους το αντίστοιχο πάχος είναι 30mm (ή ισοδύναμα πάχη άλλων πιστοποιημένων 
θερμομονωτικών υλικών).", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα δίκτυα διανομής θερμού και ψυχρού μέσου θα διαθέτουν σύστημα αντιστάθμισης της θερμοκρασίας προσαγωγής 
σε μερικά φορτία, ή άλλο πιστοποιημένο ισοδύναμο σύστημα.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε μεγάλα δίκτυα ανακυκλοφορίας ΖΝΧ ανά κλάδους, θα χρησιμοποιούνται  κυκλοφορητές με ρύθμιση 
στροφών ανάλογα με τη ζήτησης σε ΖΝΧ.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε όλα τα νέα ή ριζικά ανακαινιζόμενα κτίρια είναι υποχρεωτική η κάλυψη τουλάχιστον του 60% των αναγκών 
σε ΖΝΧ από ηλιοθερμικά συστήματα. Η υποχρέωση αυτή δεν ισχύει για τις εξαιρέσεις που αναφέρονται στο άρθρο 11 του ν. 3661/08, 
καθώς και όταν οι ανάγκες σε ΖΝΧ καλύπτονται από άλλα αποκεντρωμένα συστήματα παροχής ενέργειας που βασίζονται σε ΑΠΕ,  ΣΗΘ,  
συστήματα  τηλεθέρμανσης  σε  κλίμακα  περιοχής  ή  οικοδομικού  τετραγώνου, καθώς και αντλιών θερμότητας των οποίων ο εποχιακός 
βαθμός απόδοσης (SPF) είναι μεγαλύτερος  από  (1,15  Χ  1/η),  όπου  «η»  είναι  ο  λόγος  της  συνολικής  ακαθάριστης παραγωγής 
ηλεκτρικής ενέργειας προς την κατανάλωση πρωτογενούς ενέργειας για την παραγωγή ηλεκτρικής ενέργειας σύμφωνα με την Κοινοτική 
Οδηγία 2009/28/ΕΚ. Μέχρι να καθορισθεί νομοθετικά η τιμή του η, ο SPF πρέπει να είναι μεγαλύτερος από 3,3.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα συστήματα γενικού φωτισμού στα κτίρια του τριτογενή τομέα πρέπει να έχουν ελάχιστη ενεργειακή απόδοση 55 lumen/W. 
Για επιφάνεια μεγαλύτερη από 15m2 ο τεχνητός φωτισμός ελέγχεται με χωριστούς διακόπτες. Στους χώρους με φυσικό φωτισμό εξασφαλίζεται 
η δυνατότητα σβέσης τουλάχιστον του 50% των λαμπτήρων που βρίσκονται εντός αυτών.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε κτίρια με πολλές ιδιοκτησίες και κεντρικά συστήματα, επιβάλλεται αυτονομία θέρμανσης, ψύξης, καθώς και ΖΝΧ 
(όπου εφαρμόζεται κεντρική παραγωγή/διανομή) και εφαρμόζεται κατανομή δαπανών με θερμιδομέτρηση.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε όλα τα κτίρια απαιτείται θερμοστατικός έλεγχος της θερμοκρασίας εσωτερικού χώρου τουλάχιστον ανά 
ελεγχόμενη θερμική ζώνη κτιρίου.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε όλα τα κτίρια του τριτογενή τομέα επιβάλλεται η εγκατάσταση κατάλληλου εξοπλισμού αντιστάθμισης της άεργης ισχύος των ηλεκτρικών 
τους καταναλώσεων, για την αύξηση του συντελεστή ισχύος τους (συνφ) σε επίπεδο κατ’ ελάχιστο 0,95.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Αδυναμία εφαρμογής των ανωτέρω απαιτεί επαρκή τεχνική τεκμηρίωση σύμφωνα με την 
ισχύουσα νομοθεσία.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα υπό μελέτη κτίρια που έχουν δύο επιμέρους κύριες χρήσεις, τις κατοικίες και τα εμπορικά καταστήματα, 
εξετάζονται ανεξάρτητα σε ότι αφορά την ενεργειακή τους κατάταξη. Για τον λόγο αυτό οι πιο πάνω περιορισμοί δεν ισχύουν 
για το σύνολο του κτηρίου αλλά διαφοροποιούνται για κάθε μία από τις παραπάνω χρήσεις.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("5.1.Σχεδιασμός συστημάτων θέρμανσης, ψύξης, αερισμού", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText($thermansisxediasmos, array('name'=>'Arial', 'color'=>'black'));
$section->addText($psyksisxediasmos, array('name'=>'Arial', 'color'=>'black'));

$section->addText("5.1.1.Ελάχιστες Προδιαγραφές Συστήματος Θέρμανσης Χώρων", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText($elthermansi1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($elthermansi2, array('name'=>'Arial', 'color'=>'black'));
$section->addText($elthermansi3, array('name'=>'Arial', 'color'=>'black'));
$section->addText($elthermansi4, array('name'=>'Arial', 'color'=>'black'));
$section->addText($elthermansi5, array('name'=>'Arial', 'color'=>'black'));
$section->addText($elthermansi6, array('name'=>'Arial', 'color'=>'black'));
$section->addText($elthermansi7, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Παρατήρηση: Για κάθε ιδιοκτησία, οι επιμέρους κλάδοι διανομής θερμικής ενέργειας από το κολλεκτέρ  προς τα σώματα καλοριφέρ, θα πρέπει 
να σχεδιάζονται ώστε να καλύπτουν χώρους με ίδιες λειτουργικές ιδιαιτερότητες  όπως: ίδια χρήση και ωράριο λειτουργίας (υπνοδωμάτια, κοινόχρηστοι χώροι, κ.ά.), 
ίδια εσωτερικά φορτία (συσκευές,  ηλιακά κέρδη λόγω κοινού προσανατολισμού), κ.α. Με το σχεδιασμό αυτόν μπορεί να εφαρμοστεί και ξεχωριστός θερμοστατικός 
έλεγχος στους επιμέρους αυτούς χώρους κάθε ιδιοκτησίας (π.χ. διαμέρισμα), με παράλληλη ρύθμιση τροφοδοσίας κάθε  κλάδου ξεχωριστά (μέσω αυτόματης ηλεκτροβάνας 
στο επίπεδο του κολλεκτέρ), ανάλογα τις απαιτήσεις  σε θερμική ενέργεια των χώρων αυτών.", array('name'=>'Arial', 'color'=>'black', 'bold'=>'true'));
$section->addPageBreak(1);

$section->addText("5.1.2.Ελάχιστες Προδιαγραφές Συστήματος Ψύξης Χώρων", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($elpsyksi1 . " αλλά και του γεγονότος ότι η χρήση του είναι " . $xrisi_znx_iliakos, array('name'=>'Arial', 'color'=>'black'));
$section->addText($elpsyksi3, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η πιθανότητα εμφάνισης θερμοκρασιών πάνω 30οC, είναι περίπου 22%, σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 
20701-3/2010 (Κλιματικά Δεδομένα Ελληνικών Περιοχών). Τις βραδινές ώρες, η χρήση των τοπικών μονάδων ψύξης είναι 
περιορισμένη, εκτός τις ημέρες που η εξωτερική θερμοκρασία υπερβαίνει τους 37οC) (κατάσταση καύσωνα).
", array('name'=>'Arial', 'color'=>'black'));
$section->addText($elpsyksi2, array('name'=>'Arial', 'color'=>'black'));


$section->addText("5.1.3.Ελάχιστες Προδιαγραφές Συστήματος Αερισμού Χώρων", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Οι απαιτήσεις ελάχιστου αερισμού του κτιρίου όσον αφορά τα διαμερίσματα, καλύπτονται μέσω φυσικού αερισμού 
και σύμφωνα με τα οριζόμενα στην Τ.Ο.Τ.Ε.Ε. 20701-1/2010 (παρ. 2.4.3, πίνακας 2.3). Η απαίτηση για νωπό αέρα  
ορίζεται στα " . $syntelestis_znx_iliakos . " m3/h/m2  επιφάνειας δαπέδου.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText("5.2.Σχεδιασμός συστήματος παραγωγής ΖΝΧ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Σύμφωνα με τη μελέτη διαστασιολόγησης του συστήματος ζεστού νερού χρήσης (ΖΝΧ), η κατανάλωση ΖΝΧ για " . $xrisi_znx_iliakos .  
" όπως ορίζεται στην παράγραφο 2.5 (πίνακας 2.5) της Τ.Ο.Τ.Ε.Ε. 20701-1/2010,  είναι " . $syntelestis_znx_iliakos . " m3/h/m2 
θερμαινόμενης επιφάνειας των κατοικιών. Αντίστοιχα για τις περιπτώσεις καταστημάτων, η κατανάλωση ΖΝΧ ανέρχεται στα 0,14 lt/ημέρα/m2 
θερμαινόμενης επιφάνειας των καταστημάτων. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Έτσι, στην περίπτωσή μας, η συνολική ημερήσια κατανάλωση για ΖΝΧ στο κτήριο ανέρχεται περίπου στα " . $vd_iliakoy . 
"lt/ημέρα πού αντιστοιχούν στην  κατανάλωση τής χρήσης του κτιρίου. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η μέση θερμοκρασία ζεστού νερού χρήσης ορίζεται στους 50οC, ενώ οι μέσες θερμοκρασίες νερού δικτύου ύδρευσης 
πόλης για την κοντινότερη πόλη, όπως ορίζονται στην Τ.Ο.Τ.Ε.Ε. 20701-3/2010 «Κλιματικά δεδομένα ελληνικών Περιοχών», 
δίνονται στον πίνακα του τεύχους υπολογισμών.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Το ημερήσιο απαιτούμενο θερμικό φορτίο Qd σε (kWh/day) για την κάλυψη των αναγκών του
κτηρίου σε Ζ.Ν.Χ. δίνεται από την ακόλουθη σχέση :", array('name'=>'Arial', 'color'=>'black'));
$section->addImage('images/word-images/qd.jpg');
$section->addText(",όπου", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Vd [lt /ημέρα] το ημερήσιο φορτίο, Vd  =" . $vd_iliakoy . "lt/ημέρα", array('name'=>'Arial', 'color'=>'black'));
$section->addText("ρc [kg/lt] η μέση πυκνότητα του ζεστού νερού χρήση, ρ = 0,998", array('name'=>'Arial', 'color'=>'black'));
$section->addText("c [kJ/(kg.K)] η ειδική θερμότητα του νερού,  c = 4,18", array('name'=>'Arial', 'color'=>'black'));
$section->addText("ΔΤ [Κ] ή [°C] η θερμοκρασιακή διαφορά μεταξύ νερού δικτύου και ζεστού νερού χρήσης. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Κατά τη διαστασιολόγηση του συστήματος ΖΝΧ εφαρμόστηκε η παραπάνω σχέση για τον υπολογισμό του
μέσου ημερήσιου θερμικού φορτίου (kWh/ημέρα) για ΖΝΧ του κτηρίου για κάθε μήνα, όπως δίνεται", array('name'=>'Arial', 'color'=>'black'));

$section->addText("5.2.1.Ελάχιστες προδιαγραφές συστήματος για την παραγωγή ΖΝΧ", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($elznx1, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Παρατήρηση: Η χρήση ξεχωριστής μονάδας λέβητα-καυστήρα για την παραγωγή Ζ.Ν.Χ. είναι αναγκαία όταν η μονάδα λέβητα-καυστήρα 
για την θέρμανση χώρων καταναλώνει πετρέλαιο  θέρμανσης. Για  την  καλή διαχείριση  ενέργειας, συνίσταται η χρήση ξεχωριστού λέβητα (μικρότερης 
θερμικής ισχύς) και σε περίπτωση κατανάλωσης άλλου τύπου καυσίμου, καθώς θα λειτουργεί και την θερινή περίοδο, εκτός αν υπάρχει πολυβάθμιο 
σύστημα με την πρώτη βαθμίδα θα αποδίδει θερμική ισχύ ίση με την απαιτούμενη για παραγωγή Ζ.Ν.Χ.", array('name'=>'Arial', 'color'=>'black', 'bold'=>'true'));
$section->addText("Η συνολική χωρητικότητα τού θερμαντήρα (δεξαμενή αποθήκευσης) Vstore, εκτιμήθηκε από την ακόλουθη εμπειρική σχέση και 
θα πρέπει να είναι:", array('name'=>'Arial', 'color'=>'black'));
$Vstore = $vd_iliakoy/5;
$section->addText("Vstore = Vd/5=" . $Vstore . " lt", array('name'=>'Arial', 'color'=>'black'));
$eklogi_thermantira = round(($Vstore + 50),-1);
$section->addText("Εκλέγεται θερμαντήρας " . $eklogi_thermantira . "lt", array('name'=>'Arial', 'color'=>'black'));
$section->addText($elznx2, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η θερμική ισχύς Pn, του λέβητα-καυστήρα, συνήθως υπολογίζεται για μέσο χρόνο απόδοσης της συνολικής ημερήσια θερμικής ενέργειας 
σε 5 ώρες και για τον μήνα Φεβρουάριο που παρατηρείται το μέγιστο  θερμικό  φορτίο  για  ΖΝΧ  στο  υπό  μελέτη  κτήριο. Η  θερμική ισχύς  της 
μονάδας λέβητα - καυστήρα Pn, υπολογίζεται από την ακόλουθη σχέση:", array('name'=>'Arial', 'color'=>'black'));
$Pn_levita = $fortio_znx_day_feb/5;
$Pn_levita1 = $Pn_levita*1.3;
$Pn_levita2 = $Pn_levita*1.3*860.1179;
$section->addText("Pn = Qd/5 = " . $Pn_levita, array('name'=>'Arial', 'color'=>'black'));
$section->addText(" Για τον υπολογισμό της ονομαστικής θερμικής ισχύος του λέβητα-καυστήρα Pn, 
λαμβάνεται προσαύξηση 20%, (για επιτάχυνση έναρξης λειτουργίας, κάλυψη θερμικών απωλειών του δικτύου διανομής κ.α.). 
Οπότε έχουμε τελική θερμική ισχύ λέβητα-καυστήρα για ΖΝΧ:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Pn= " . $Pn_levita . "KW * 1,3 = " . $Pn_levita1 . " KW = " . $Pn_levita2 . "Kcal/h", array('name'=>'Arial', 'color'=>'black'));
$section->addText($elznx3, array('name'=>'Arial', 'color'=>'black'));
$section->addText($elznx4, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText("5.2.2.Τεκμηρίωση Εγκατάστασης Ηλιακών Συλλεκτών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText($egiliaka1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($egiliaka2, array('name'=>'Arial', 'color'=>'black'));
$section->addText($egiliaka3, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Παρατήρηση: Σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 20701-1/2010 (παράγραφος 5.3.1) κατά την διαστασιολόγηση (σχεδιασμού) του 
συστήματος ηλιακών συλλεκτών μπορούν να χρησιμοποιηθούν  διάφορες  μεθοδολογίες  όπως, η ωριαία προσομοίωση λειτουργίας του συστήματος, 
οι μέθοδοι που αναφέρονται στο πρότυπο ΕΛΟΤ ΕΝ 15316.4-3:2008, η μέθοδος καμπυλών f των S. klein, W.A. Beckman και J.A Duffie που
 αναπτύχθηκε στο πανεπιστήμιο του Winscosin και οποιαδήποτε άλλη αναγνωρισμένη αναλυτική ή μη μέθοδος εφαρμόζεται μέχρι σήμερα.
 Στην μελέτη διαστασιολόγησης του συστήματος ηλιακών συλλεκτών, η οποία δεν αποτελεί μέρος της παρούσας μελέτης, πρέπει να αναφέρεται
 η μέθοδος και τα δεδομένα που χρησιμοποιήθηκαν αναλυτικά, ενώ στην παρούσα μελέτη είναι υποχρεωτική η αναφορά των
αποτελεσμάτων για την τεκμηρίωση του ποσοστού κάλυψης του φορτίου Ζ.Ν.Χ ", array('name'=>'Arial', 'color'=>'black', 'bold'=>'true'));
$section->addText($egiliaka4, array('name'=>'Arial', 'color'=>'black'));
$diastaseis_iliakoy = $epif_iliakoy/2 . "000mm x 2000mm";
$section->addText("Οι ηλιακοί συλλέκτες που επελέγησαν θα έχουν εξωτερικές διαστάσεις " . $diastaseis_iliakoy, array('name'=>'Arial', 'color'=>'black'));
$section->addText($egiliaka5 ." Έγιναν υπολογισμοί από τους πίνακες ΤΟΤΕΕ για επιμέρους γωνίες κλίσεως των ηλιακών 
συλλεκτών, για " . $array_akt[0][2] . " μοίρες", array('name'=>'Arial', 'color'=>'black'));
$section->addText($egiliaka6, array('name'=>'Arial', 'color'=>'black'));
$pososto_iliaka1 = $pososto_iliaka*100;
$section->addText("Σύμφωνα με τα αποτελέσματα των υπολογισμών, το μέσο ετήσιο ποσοστό κάλυψης του φορτίου για ζεστό νερό χρήσης ανέρχεται 
σε περίπου " . $pososto_iliaka1 . " %.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η μεγαλύτερη κάλυψη παρουσιάζεται τούς μήνες Ιούλιο και Αύγουστο για την βέλτιστη κλίση εγκατάστασης.
 Αναλύοντας τα επιμέρους θερμικά φορτία για ΖΝΧ, προκύπτει πως θα έχουν το ίδιο περίπου ποσοστό κάλυψης.", array('name'=>'Arial', 'color'=>'black'));
$section->addText($egiliaka7, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("5.3.Σχεδιασμός συστήματος φωτισμού", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Η κύρια χρήση του κτιρίου είναι " . $xrisi_znx_iliakos . $egfwtismos1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($egfwtismos2, array('name'=>'Arial', 'color'=>'black'));

$section->addText("5.4.Διόρθωση συνημιτόνου", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText($egfwtismos3, array('name'=>'Arial', 'color'=>'black'));

$section->addText("5.5.Σκοπιμότητα εφαρμογή εναλλακτικών λύσεων σχεδιασμού των Η/Μ συστημάτων του κτηρίου", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Σύμφωνα με την μελέτη σκοπιμότητας εξετάστηκαν οι εξής εναλλακτικές λύσεις για την κάλυψη των θερμικών, 
ψυκτικών και ηλεκτρικών φορτίων του κτιρίου.", array('name'=>'Arial', 'color'=>'black'));
$section->addText($enalaktiki1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($enalaktiki2, array('name'=>'Arial', 'color'=>'black'));
$section->addText($enalaktiki3, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η εγκατάσταση ηλιακών συλλεκτών θα επιφέρει εξοικονόμηση θερμικής ενέργειας:", array('name'=>'Arial', 'color'=>'black'));
$section->addText($apolavi_aktinov . " (kWh/έτος), ποσό που αντιστοιχεί σε πρωτογενή ενέργεια, κατ’ ελάχιστο:", array('name'=>'Arial', 'color'=>'black'));
$apolavi_aktinov1 = $apolavi_aktinov*1.099;
$apolavi_aktinov2 = $apolavi_aktinov*2.9;
$section->addText($apolavi_aktinov1 . "kWh πετρελαίου ή", array('name'=>'Arial', 'color'=>'black'));
$section->addText($apolavi_aktinov2 . "kWh  ηλεκτρικής  ενέργειας", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Παρατήρηση: Σύμφωνα με το άρθρο 4 του νόμου 3661/2008, και το άρθρο 10 του νόμου 3851/2010, η μελέτη σκοπιμότητας 
που συνοδεύει την ενεργειακή μελέτη, εκπονείται προκειμένου να εξεταστεί αν υπάρχει η δυνατότητα εφαρμογής τουλάχιστον ενός από τα 
εναλλακτικά συστήματα παροχής (παραγωγής) ενέργειας, όπως αποκεντρωμένα συστήματα παροχής ενέργειας που βασίζονται σε ανανεώσιμες 
πηγές ενέργειας, συμπαραγωγή ηλεκτρισμού και θερμότητας, συστήματα θέρμανσης ή ψύξης σε κλίμακα περιοχής ή οικοδομικού τετραγώνου, 
καθώς και αντλίες θερμότητας των οποίων ο εποχιακός βαθμός απόδοσης (SPF) είναι μεγαλύτερος από 1,15x1/η, όπου η ο λόγος της συνολικής 
ακαθάριστης παραγωγής ηλεκτρικής ενέργειας προς την κατανάλωση πρωτογενούς ενέργειας για την παραγωγή ηλεκτρικής ενέργειας, σύμφωνα με 
την Κοινοτική Οδηγία 2009/28/ΕΚ. Μέχρι να καθορισθεί νομοθετικά η τιμή του (η), ο SPF πρέπει να είναι μεγαλύτερος από 3,3. Στην μελέτη 
σκοπιμότητας πρέπει να περιγράφετε και να τεκμηριώνεται με τεχνικά, περιβαλλοντικά και οικονομικά κριτήρια, η εφαρμογή ενός τουλάχιστον 
από τα πιο πάνω συστήματα παραγωγής ενέργειας.", array('name'=>'Arial', 'color'=>'black', 'bold'=>'true'));
$section->addPageBreak(1);


$section->addText("6.ΕΝΕΡΓΕΙΑΚΗ ΑΠΟΔΟΣΗ ΚΤΙΡΙΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Σύμφωνα με το άρθρο 5 του Κ.Εν.Α.Κ., για τους υπολογισμούς της ενεργειακής απόδοσης και της ενεργειακής 
κατάταξης των κτιρίων εφαρμόζεται η μέθοδος ημι-σταθερής κατάστασης μηνιαίου βήματος του ευρωπαϊκού προτύπου ΕΛΟΤ ΕΝ ISO 
13790 καθώς και των υπολοίπων υποστηρικτικών προτύπων τα οποία αναφέρονται στο παράρτημα 1 του ίδιου κανονισμού. Σύμφωνα 
με την ΤΟΤΕΕ 20701-2/2010, οι θερμικές ζώνες ενός κτιρίου θεωρούνται θερμικά ασύζευκτες. Οι υπολογισμοί της ενεργειακής 
απόδοση κτιρίου έγιναν με την χρήση του υπολογιστικού εργαλείου ΤΕΕ-ΚΕΝΑΚ, βάσει των απαιτήσεων και προδιαγραφών του νόμου 
3661/2008, του Κ.Εν.Α.Κ. και της αντίστοιχης Τ.Ο.Τ.Ε.Ε. 20701-1/2010.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Για τους επιμέρους υπολογισμούς και τη διαστασιολόγηση των ηλεκτρομηχανολογικών συστημάτων του κτηρίου 
(εγκαταστάσεις θέρμανσης, ψύξης, φωτισμού, ζεστού νερού χρήσης, κ.ά.), χρησιμοποιήθηκαν αναλυτικές μέθοδοι και τεχνικές οδηγίες, 
όπως εφαρμόζονται μέχρι σήμερα και αναφέρονται στις αντίστοιχες παραγράφους.", array('name'=>'Arial', 'color'=>'black'));


$section->addText("6.1.Κλιματικά δεδομένα", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Τα κλιματικά δεδομένα για την περιοχή της μελέτης, είναι ενσωματωμένα σε βιβλιοθήκη του 
λογισμικού και σύμφωνα με όσα ορίζονται στην Τ.Ο.Τ.Ε.Ε. 20701-3/2010, «Κλιματικά δεδομένα Ελληνικών Περιοχών». 
Για τους υπολογισμούς λαμβάνονται υπ’ όψη η μέση μηνιαία θερμοκρασία, η μέση μηνιαία ειδική υγρασία, καθώς και η 
προσπίπτουσα ηλιακή ακτινοβολία σε οριζόντιες επιφάνειες και σε κατακόρυφες επιφάνειες για όλους του προσανατολισμούς, 
για την περιοχή της Αργολίδας. Το υψόμετρο της περιοχής όπου θα κατασκευασθεί το κτήριο είναι 10m. 
Η περιοχή ανήκει στην κλιματική ζώνη " . $zwni, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("6.2.Χρήσεις κτηρίου", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Οι χρήσεις του κτηρίου: " . $gen_xrisi . ", ενώ ειδικότερα " . $xrisi, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι επιθυμητές συνθήκες εσωτερικού περιβάλλοντος (θερμοκρασία, υγρασία, αερισμός, κ.ά.) και τα 
χαρακτηριστικά λειτουργίας του κτηρίου (ωράριο, εσωτερικά κέρδη κ.ά.).", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα κλιματικά δεδομένα της περιοχής του κτηρίου (θερμοκρασία, σχετική και απόλυτη υγρασία, 
ηλιακή ακτινοβολία).", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα γεωμετρικά χαρακτηριστικά των δομικών στοιχείων του κτηριακού κελύφους (σχήμα και μορφή κτηρίου, διαφανείς 
και μη επιφάνειες, σκίαστρα κ.ά.), ο προσανατολισμός τους, τα χαρακτηριστικά των εσωτερικών δομικών στοιχείων (π.χ. εσωτερικοί τοίχοι) 
και άλλα.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα θερμικά χαρακτηριστικά των δομικών (διαφανών και μη) στοιχείων του κτηριακού κελύφους: θερμοπερατότητα, 
θερμική μάζα, απορροφητικότητα στην ηλιακή ακτινοβολία, διαπερατότητα στην ηλιακή ακτινοβολίας, κ.ά..", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα τεχνικά χαρακτηριστικά της εγκατάστασης θέρμανσης χώρων: ο τύπος της μονάδας παραγωγής θερμικής ενέργειας, η απόδοσή της, 
οι απώλειες στο δίκτυο διανομής ζεστού νερού, ο τύπος των τερματικών μονάδων, κ.ά.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα τεχνικά χαρακτηριστικά της εγκατάστασης ψύξης/κλιματισμού χώρων: ο τύπος των μονάδων παραγωγής ψυκτικής ενέργειας, 
η απόδοσή τους, οι απώλειες στο δίκτυο διανομής, ο τύπος των τερματικών μονάδων, κ.ά.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα τεχνικά χαρακτηριστικά της εγκατάστασης παραγωγής ΖΝΧ, όπως: ο τύπος της μονάδας παραγωγής ζεστού νερού χρήσης,
 η απόδοσή της, οι απώλειες του δικτύου διανομής ζεστού νερού χρήσης, το σύστημα αποθήκευσης, κ.ά.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η εγκατάσταση ηλιακών συλλεκτών για την κάλυψη τμήματος του φορτίου για ΖΝΧ", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("6.3.Τμήμα κτηρίου με κύρια χρήση", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText("Το εμβαδό και ο όγκος του υπό μελέτη τμήματος του κτηρίου δίνονται στον παρακάτω πίνακα :", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Ειδική χρήση χώρων', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Θερμαινόμενη επιφάνεια [m2]', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ψυχόμενη επιφάνεια  [m2]]', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Θερμαινόμενος όγκος [m2]', $fontStyle);
$table->addCell(2000, $styleCell)->addText("Ψυχόμενος όγκος [m3]", $fontStyle);
$table->addRow();
$table->addCell(2000)->addText($gen_xrisi);
$table->addCell(2000)->addText($a_thermoperatotitas);
$table->addCell(2000)->addText($a_thermoperatotitas);
$table->addCell(2000)->addText($synolikos_ogkos);
$table->addCell(2000)->addText($synolikos_ogkos);
$table->addRow();
$table->addCell(2000)->addText("Κλιμακοστάσιο");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");

$section->addTextBreak(3);

$section->addText("6.3.1.Θερμικές Ζώνες", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText("Σύμφωνα με το άρθρο 3 του Κ.Εν.Α.Κ. και την Τ.Ο.Τ.Ε.Ε. 20701-1/2010, η διακριτοποίηση ενός κτηρίου 
σε θερμικές ζώνες γίνεται με τα εξής κριτήρια :", array('name'=>'Arial', 'color'=>'black'));
$section->addText("1.   Η επιθυμητή θερμοκρασία των εσωτερικών χώρων να διαφέρει περισσότερο από 4 K για τη χειμερινή ή/και 
τη θερινή περίοδο.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("2.   Υπάρχουν χώροι με διαφορετική χρήση - λειτουργία.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("3.   Υπάρχουν χώροι στο κτήριο που καλύπτονται με διαφορετικά συστήματα θέρμανσης ή/και ψύξης ή/και κλιματισμού λόγω 
διαφορετικών εσωτερικών συνθηκών.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("4.   Υπάρχουν χώροι στο κτήριο που παρουσιάζουν μεγάλες διαφορές εσωτερικών ή/και ηλιακών κερδών ή/και θερμικών 
απωλειών.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("5.   Υπάρχουν χώροι όπου το σύστημα του μηχανικού αερισμού καλύπτει λιγότερο από το 80% της επιφάνειας κάτοψης 
του χώρου.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Βάσει της Τ.Ο.Τ.Ε.Ε. 20701-1/2010 για το διαχωρισμό του κτηρίου σε θερμικές ζώνες συνιστάται να ακολουθούνται οι παρακάτω γενικοί κανόνες:
ο διαχωρισμός του κτηρίου να γίνεται στο μικρότερο δυνατό αριθμό ζωνών, προκειμένου να επιτυγχάνεται οικονομία στο πλήθος των δεδομένων εισόδου και 
στον υπολογιστικό χρόνο, o προσδιορισμός των θερμικών ζωνών να γίνεται καταγράφοντας την πραγματική εικόνα λειτουργίας του κτηρίου, 
τμήματα του κτηρίου με επιφάνεια μικρότερη από το 10% της συνολικής επιφάνειας του κτηρίου να εξετάζονται ενταγμένα σε άλλες θερμικές ζώνες, 
κατά το δυνατόν παρόμοιες, ακόμη και αν οι συνθήκες λειτουργίας τους δικαιολογούν τη θεώρησή τους ως ανεξάρτητων ζωνών.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Με βάση τα παραπάνω, τα τμήματα της κατοικίας και τα τμήματα του κλιμακοστασίου θα μελετηθούν στην παρούσα ενεργειακή μελέτη ως 
μία ενιαία θερμική ζώνη", array('name'=>'Arial', 'color'=>'black'));

$section->addTextBreak(1);
$section->addText("Γενικά δεδομένα για τη χρήση του κτηρίου.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Γενικά δεδομένα (ενιαίας) θερμικής ζώνης", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Χρήση θερμικής ζώνης', $fontStyle);
$table->addCell(2000, $styleCell)->addText($xrisi_znx_iliakos, $fontStyle);
$table->addCell(2000, $styleCell)->addText("", $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Χρήση θερμικής ζώνης", $fontSmall);
$table->addCell(2000)->addText($a_thermoperatotitas);
$table->addCell(2000)->addText("");
$table->addRow();
$table->addCell(2000)->addText("Ανοιγμένη ειδική θερμοχωρητικότητα [kJ/(m2.K)]", $fontSmall);
$table->addCell(2000)->addText("165");
$table->addCell(2000)->addText("");
$table->addRow();
$table->addCell(2000)->addText("Κατηγορία διατάξεων αυτοματισμών ελέγχου για ηλεκτρομηχανολογικό εξοπλισμό", $fontSmall);
$table->addCell(2000)->addText("Α");
$table->addCell(2000)->addText("Τ.Ο.Τ.Ε.Ε. 20701-1/2010,πίνακας 5.5");

$section->addText("Αερισμός", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Διείσδυση αέρα (m3/h)', $fontStyle);
$table->addCell(2000, $styleCell)->addText($dieisdysi_aera, $fontStyle);
$table->addCell(2000, $styleCell)->addText("Τεύχος Υπολογισμών", $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Φυσικός αερισμός (m3/h/ m2)", $fontSmall);
$table->addCell(2000)->addText($syntelestis_dieisdysi_aera);
$table->addCell(2000)->addText("Τ.Ο.Τ.Ε.Ε. 20701-1");
$table->addRow();
$table->addCell(2000)->addText("Συντελεστής χρήσης φυσικού αερισμού", $fontSmall);
$table->addCell(2000)->addText("1");
$table->addCell(2000)->addText("100% για κατοικίες, 0% για τριτογενή τομέα");
$table->addRow();
$table->addCell(2000)->addText("Αριθμός θυρίδων εξαερισμού για φυσικό αέριο", $fontSmall);
$table->addCell(2000)->addText("-");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Αριθμός καμινάδων", $fontSmall);
$table->addCell(2000)->addText("-");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Αριθμός ανεμιστήρων οροφής", $fontSmall);
$table->addCell(2000)->addText("-");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Χώροι κάλυψης ανεμιστήρων οροφής", $fontSmall);
$table->addCell(2000)->addText("-");
$table->addCell(2000)->addText("-");
$section->addPageBreak(1);

$array_leitoyrgias = get_times("*", "energy_conditions", $drop_xrisi);
$section->addText("6.3.2.Εσωτερικές Συνθήκες Λειτουργίας για την χρήση του κτιρίου", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText("Βάσει  της Τ.Ο.Τ.Ε.Ε. 20701-1/2010 καθορίστηκαν οι επιθυμητές συνθήκες λειτουργίας και τα εσωτερικά θερμικά φορτία 
από τους χρήστες και τις συσκευές. Τα δεδομένα για τις συνθήκες λειτουργίας του τμήματος κατοικιών δίνονται αναλυτικά στον 
παρακάτω πίνακα :", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Εσωτερικές συνθήκες λειτουργίας.", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Παράμετρος', $fontStyle);
$table->addCell(2000, $styleCell)->addText("Τιμή", $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Κατηγορία");
$table->addCell(2000)->addText($array_leitoyrgias[0][1]);
$table->addRow();
$table->addCell(2000)->addText("Χρήση");
$table->addCell(2000)->addText($array_leitoyrgias[0][2]);
$table->addRow();
$table->addCell(2000)->addText("Ώρες λειτουργίας (h)");
$table->addCell(2000)->addText($array_leitoyrgias[0][3]);
$table->addRow();
$table->addCell(2000)->addText("Ημέρες λειτουργίας (d)");
$table->addCell(2000)->addText($array_leitoyrgias[0][4]);
$table->addRow();
$table->addCell(2000)->addText("Μήνες λειτουργίας (m)");
$table->addCell(2000)->addText($array_leitoyrgias[0][5]);
$table->addRow();
$table->addCell(2000)->addText("θ,i,h (C)");
$table->addCell(2000)->addText($array_leitoyrgias[0][6]);
$table->addRow();
$table->addCell(2000)->addText("θ,i,c (C)");
$table->addCell(2000)->addText($array_leitoyrgias[0][7]);
$table->addRow();
$table->addCell(2000)->addText("Χ,i,h (%)");
$table->addCell(2000)->addText($array_leitoyrgias[0][8]);
$table->addRow();
$table->addCell(2000)->addText("Χ,i,c (%)");
$table->addCell(2000)->addText($array_leitoyrgias[0][9]);
$table->addRow();
$table->addCell(2000)->addText("Άτομα/100m2");
$table->addCell(2000)->addText($array_leitoyrgias[0][10]);
$table->addRow();
$table->addCell(2000)->addText("Νωπός αέρας (m3/h/person)");
$table->addCell(2000)->addText($array_leitoyrgias[0][11]);
$table->addRow();
$table->addCell(2000)->addText("Νωπός αέρας (m3/h/m2)");
$table->addCell(2000)->addText($array_leitoyrgias[0][12]);
$table->addRow();
$table->addCell(2000)->addText("Στάθμη φωτισμού (lux)");
$table->addCell(2000)->addText($array_leitoyrgias[0][13]);
$table->addRow();
$table->addCell(2000)->addText("Ισχύς κτιρίου αναφοράς (W/m2)");
$table->addCell(2000)->addText($array_leitoyrgias[0][14]);
$table->addRow();
$table->addCell(2000)->addText("Ώρες λειτουργίας ημέρας (h)");
$table->addCell(2000)->addText($array_leitoyrgias[0][15]);
$table->addRow();
$table->addCell(2000)->addText("Ώρες λειτουργίας νύχτας (h)");
$table->addCell(2000)->addText($array_leitoyrgias[0][16]);
$table->addRow();
$table->addCell(2000)->addText("ΖΝΧ (lt/άτομο/ημέρα)");
$table->addCell(2000)->addText($array_leitoyrgias[0][17]);
$table->addRow();
$table->addCell(2000)->addText("ΖΝΧ (lt/m2/ημέρα)");
$table->addCell(2000)->addText($array_leitoyrgias[0][18]);
$table->addRow();
$table->addCell(2000)->addText("ΖΝΧ (m3/m2/year)");
$table->addCell(2000)->addText($array_leitoyrgias[0][19]);
$table->addRow();
$table->addCell(2000)->addText("Άνθρωποι (W/άτομο)");
$table->addCell(2000)->addText($array_leitoyrgias[0][20]);
$table->addRow();
$table->addCell(2000)->addText("Άνθρωποι (W/m2)");
$table->addCell(2000)->addText($array_leitoyrgias[0][21]);
$table->addRow();
$table->addCell(2000)->addText("Συντελεστής παρουσίας f");
$table->addCell(2000)->addText($array_leitoyrgias[0][22]);
$section->addPageBreak(1);

$section->addText("6.3.3.Κέλυφος τμήματος κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText("6.3.3.1.Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με τον εξωτερικό αέρα", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText($kelyfos3331, array('name'=>'Arial', 'color'=>'black'));

$section->addText("6.3.3.2.Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με το έδαφος", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($kelyfos3332, array('name'=>'Arial', 'color'=>'black'));

$section->addText("6.3.3.3.Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με μη θερμαινόμενους χώρους", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($kelyfos3333, array('name'=>'Arial', 'color'=>'black'));

$section->addText("6.3.3.4.Δεδομένα για διαφανή δομικά στοιχεία κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText($kelyfos3334, array('name'=>'Arial', 'color'=>'black'));
$section->addText($kelyfos3335, array('name'=>'Arial', 'color'=>'black'));

$section->addText("6.3.4.Ηλεκτρομηχανολογικές Εγκαταστάσεις Τμήματος Κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Τα δεδομένα που χρησιμοποιήθηκαν στους υπολογισμούς της ενεργειακής απόδοσης του υπό μελέτη κτηρίου και σχετίζονται 
με τις ηλεκτρομηχανολογικές εγκαταστάσεις του, αφορούν στα εξής:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύστημα θέρμανσης χώρων,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύστημα ψύξης χώρων,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύστημα παραγωγής ζεστού νερού χρήσης,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύστημα ηλιακών συλλεκτών για την παραγωγή ζεστού νερού χρήσης,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Στις παραγράφους που ακολουθούν, δίνονται αναλυτικά τα δεδομένα που χρησιμοποιήθηκαν κατά τους υπολογισμούς 
της ενεργειακής απόδοσης του τμήματος, στο λογισμικό.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$array_hm = get_times_all("*", "kataskeyi_hm");
$thermansi_value = $array_hm[0]["value"];
$klimatismos_value = $array_hm[1]["value"];
$thermansi_value_kw = $thermansi_value*1.163/1000;
$thermansi_value_kw13 = $thermansi_value_kw*1.3;
$klimatismos_value_kw = $klimatismos_value*0.000293;

$section->addText("6.3.4.1.Δεδομένα για το σύστημα θέρμανσης κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Σε όλο το κτήριο θα υπάρχει κεντρική εγκατάσταση θέρμανσης για την κάλυψη των αναγκών για θέρμανση χώρων. 
Η εγκατάσταση θα περιλαμβάνει μονάδα λέβητα-καυστήρα θερμικής ισχύος" . $thermansi_value . " Kcal/h ή " . $thermansi_value_kw . 
"KW με θερμοκρασία λειτουργίας 70/85οC, κεντρικό δίκτυο διανομής θερμομονωμένο σύμφωνα με τις ελάχιστες απαιτήσεις (Τ.Ο.Τ.Ε.Ε. 
20701-1/2010 πίνακας 4.7) και θερμαντικά σώματα, τοποθετημένα στους εξωτερικούς τοίχους των επιμέρους χώρων.", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Μονάδα παραγωγής θερμότητας', $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Είδος μονάδας παραγωγής θερμότητας");
$table->addCell(2000)->addText("Λέβητας-Καυστήρας");
$table->addRow();
$table->addCell(2000)->addText("Ισχύς");
$table->addCell(2000)->addText($thermansi_value_kw13);
$table->addRow();
$table->addCell(2000)->addText("Θερμική απόδοση μονάδας");
$table->addCell(2000)->addText("92%");
$table->addRow();
$table->addCell(2000)->addText("Είδος καυσίμου");
$table->addCell(2000)->addText("Πετρέλαιο θέρμανσης");
$table->addRow();
$table->addCell(2000)->addText("Συνολική ισχύς δικτύου διανομής (70% της ισχύος του λέβητα)");
$table->addCell(2000)->addText($thermansi_value_kw);
$table->addRow();
$table->addCell(2000)->addText("Διέλευση από εσ. χώρους");
$table->addCell(2000)->addText("ΝΑΙ");
$table->addRow();
$table->addCell(2000)->addText("Θερμοκρασία προσαγωγής θερμού μέσου στο δίκτυο διανομής (οC)");
$table->addCell(2000)->addText("85");
$table->addRow();
$table->addCell(2000)->addText("Θερμοκρασία επιστροφής θερμού μέσου στο δίκτυο διανομής (οC)");
$table->addCell(2000)->addText("70");
$table->addRow();
$table->addCell(2000)->addText("Βαθμός απόδοσης δικτύου διανομής");
$table->addCell(2000)->addText("100%-5,5%");
$table->addRow();
$table->addCell(2000)->addText("Απώλειες");
$table->addCell(2000)->addText("94,5%");
$table->addRow();
$table->addCell(2000)->addText("Είδος τερματικών μονάδων θέρμανσης χώρων");
$table->addCell(2000)->addText("σώματα ακτινοβολίας σε εξωτερικό τοίχο και θερμ. 70/85oC");
$table->addRow();
$table->addCell(2000)->addText("Θερμική απόδοση τερματικών μονάδων");
$table->addCell(2000)->addText("0,89 (Τ.Ο.Τ.Ε.Ε.  20701-1/2010, πίνακας 4.12)");
$table->addRow();
$table->addCell(2000)->addText("Τύπος βοηθητικών συστημάτων");
$table->addCell(2000)->addText("Κυκλοφορητής (Δv-cP)");
$table->addRow();
$table->addCell(2000)->addText("Αριθμός συστημάτων");
$table->addCell(2000)->addText("1");
$table->addRow();
$table->addCell(2000)->addText("Ισχύς βοηθητικών συστημάτων  (kW)");
$table->addCell(2000)->addText("1x0,1=0,1");
$table->addRow();
$table->addCell(2000)->addText("Χρόνος λειτουργίας βοηθητικών συστημάτων");
$table->addCell(2000)->addText("75 (%) του χρόνου λειτουργίας του κτηρίου");
$section->addText("Η  υπολογισμένη  θερμική  ισχύς  του  λέβητα-καυστήρα,  ελέγχθηκε  για  υπερδιαστασιολόγηση 
σύμφωνα με την σχέση 4.1 της Τ.Ο.Τ.Ε.Ε. 20701-1/2010. Ο καυστήρας θα είναι μονοβάθμιος και ο συντελεστής υπερδιαστασιολόγησης 
(ng1) είναι μονάδα, καθώς επίσης και ο συντελεστής μόνωσης λέβητα (ng2). Κατά συνέπεια και η τελική απόδοση του λέβητα θα είναι 
ίδια με αυτή που δίνει ο κατασκευαστής, σύμφωνα με την μελέτη θέρμανσης.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);



$section->addText("6.3.4.2.Δεδομένα για το σύστημα ψύξης κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Δεν απαιτείται μελέτη ψύξης-κλιματισμού λόγω του μικρού όγκου του κτιρίου αλλά και του γεγονότος ότι η χρήση του 
είναι αυτή της " . $gen_xrisi . " και δη, της " . $xrisi . ". Οι προδιαγραφές του συστήματος ψύξης είναι αυτές πού αναφέρονται στο κτίριο αναφοράς.
Έτσι, θα εγκατασταθούν τοπικές αντλίες θερμότητας διαιρούμενου τύπου και, ενδεικτικά, μία στό καθιστικό και μία στους διαδρόμους πριν τα 
υπνοδωμάτια για ήπια ψύξη των υπνοδωματίων. Οι μονάδες θα έχουν βαθμό ενεργειακής απόδοσης EER=3,0. 
Στη συγκεκριμένη χρήση του κτηρίου, σε διαμερίσματα κατοικιών δηλαδή,  η χρήση  μονάδων ψύξης, παρατηρείται κυρίως τις μεσημεριανές ώρες, 
κατά τις ημέρες με θερμοκρασίες πάνω από 30οC. Η πιθανότητα εμφάνισης θερμοκρασιών πάνω 30οC, είναι περίπου 22%, σύμφωνα με την 
Τ.Ο.Τ.Ε.Ε. 20701-3/2010 (Κλιματικά Δεδομένα Ελληνικών Περιοχών). Τις βραδινές ώρες, η χρήση των τοπικών μονάδων ψύξης είναι 
περιορισμένη, εκτός τις ημέρες που η εξωτερική θερμοκρασία υπερβαίνει τους 37οC) (κατάσταση καύσωνα).", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η συνολική ψυκτική ικανότητα (ισχύς) των αντλιών θερμότητας της " . $gen_xrisi . " αυτή εκτιμάται σε" . 
$klimatismos_value . "Btu/h ή " . $klimatismos_value_kw . " Kw με δυνατότητα κάλυψης 50% ψυκτικού φορτίου σε συνθήκες 
σχεδιασμού.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Μονάδα παραγωγής ψύξης', $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Είδος μονάδας παραγωγής ψύξης");
$table->addCell(2000)->addText("Λέβητας-Καυστήρας");
$table->addRow();
$table->addCell(2000)->addText("Ισχύς");
$table->addCell(2000)->addText($klimatismos_value_kw);
$table->addRow();
$table->addCell(2000)->addText("Βαθμός απόδοσης ΕER:");
$table->addCell(2000)->addText("3,0");
$table->addRow();
$table->addCell(2000)->addText("Είδος καυσίμου");
$table->addCell(2000)->addText("Ηλεκτρικό ρεύμα");
$table->addRow();
$table->addCell(2000)->addText("Ψυκτική ισχύς που μεταφέρει το δίκτυο διανομής  είναι ");
$table->addCell(2000)->addText($klimatismos_value_kw);
$table->addRow();
$table->addCell(2000)->addText("Διέλευση από εσ. χώρους");
$table->addCell(2000)->addText("ΝΑΙ");
$table->addRow();
$table->addCell(2000)->addText("Εξωτερικοί χώροι");
$table->addCell(2000)->addText("Πάνω από 20%");
$table->addRow();
$table->addCell(2000)->addText("Θερμοκρασία προσαγωγής θερμού μέσου στο δίκτυο διανομής (οC)");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Θερμοκρασία επιστροφής θερμού μέσου στο δίκτυο διανομής (οC)");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Βαθμός ψυκτικής απόδοσης δικτύου διανομής (%)");
$table->addCell(2000)->addText("100%");
$table->addRow();
$table->addCell(2000)->addText("Ύπαρξη μόνωσης στους αεραγωγούς");
$table->addCell(2000)->addText("NAI");
$table->addRow();
$table->addCell(2000)->addText("Είδος τερματικών μονάδων ψύξης χώρων");
$table->addCell(2000)->addText("τοπικές αντλίες θερμότητας");
$table->addRow();
$table->addCell(2000)->addText("Θερμική απόδοση τερματικών μονάδων");
$table->addCell(2000)->addText("93,0% (Τ.Ο.Τ.Ε.Ε. 20701-1/2010, πίνακας 4.14)");
$table->addRow();
$table->addCell(2000)->addText("Τύπος βοηθητικών συστημάτων");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Αριθμός συστημάτων");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Ισχύς βοηθητικών συστημάτων  (kW)");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Χρόνος λειτουργίας βοηθητικών συστημάτων");
$table->addCell(2000)->addText("15 (%) του χρόνου λειτουργίας του κτηρίου");

$section->addPageBreak(1);




$section->addText("6.3.4.3.Δεδομένα για το σύστημα αερισμού κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Ο αερισμός που εφαρμόζεται σε όλους τους χώρους της κατοικίας του κτηρίου είναι φυσικός και σύμφωνα με την 
Τ.Ο.Τ.Ε.Ε. 20701-1/2010, η παροχή του αέρα θα είναι ίση με τον απαιτούμενο νωπό αέρα. Από τον πίνακα 2.3 της Τ.Ο.Τ.Ε.Ε. 20701-1/2010 
λαμβάνεται για τις κατοικίες φυσικός αερισμός ίσος με " . $array_leitoyrgias[0][12] . " m3/h/m2.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText("6.3.4.4.Δεδομένα για το σύστημα ΖΝΧ κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Για την παραγωγή ζεστού νερού χρήσης, χρησιμοποιείται το σύστημα της συμβατικής μονάδας λέβητα καυστήρα
με 92,2% βαθμό απόδοσης ισχύος " . $thermansi_value_kw13 . "ο οποίος τροφοδοτεί έναν  θερμαντήρα τριπλής ενέργειας στο λεβητοστάσιο 
του κτηρίου. Ο θερμαντήρας αυτός τροφοδοτείται ταυτόχρονα με θερμική ενέργεια από τους ηλιακούς συλλέκτες στο δώμα και 
διαθέτει και εφεδρικό σύστημα ηλεκτρικών αντιστάσεων. ", array('name'=>'Arial', 'color'=>'black'));

$znx_pos_synol = (($fortio_znx_day_feb/5)*1.3)*$pososto_petr;
$znx_pos_kat = $znx_pos_synol/$thermansi_value_kw13;
$section->addText("Το θερμικό φορτίο για ΖΝΧ που αντιστοιχεί για την κατοικία είναι το" . $znx_pos_kat . " % επί του συνολικού ". 
$znx_pos_synol, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Το δίκτυο διανομής είναι μονωμένο σύμφωνα με τις ελάχιστες προδιαγραφές της Τ.Ο.Τ.Ε.Ε. 20701-1/2010 και με ποσοστό 
απωλειών 7,5% (πίνακας 4.16).Οι πλευρικές απώλειες των θερμαντήρων λαμβάνονται 2% σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 20701-1/2010 
(παράγραφο 4.8.4) για τοποθέτηση σε εσωτερικό χώρο και οι απώλειες λόγω εναλλάκτη θερμότητας λαμβάνονται 5%. 
Τα δεδομένα για το σύστημα ζεστού νερού χρήσης δίνονται στον πίνακα 6.8.", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Σύστημα ΖΝΧ - Μονάδα παραγωγής θερμότητας', $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Είδος μονάδας παραγωγής ΖΝΧ");
$table->addCell(2000)->addText("Λέβητας-Καυστήρας");
$table->addRow();
$table->addCell(2000)->addText("Θερμική απόδοση μονάδας");
$table->addCell(2000)->addText("92,0%");
$table->addRow();
$table->addCell(2000)->addText("Είδος καυσίμου");
$table->addCell(2000)->addText("Πετρέλαιο");
$table->addRow();
$table->addCell(2000)->addText("Μηνιαίο ποσοστό κάλυψης θερμικού φορτίου για ΖΝΧ από το σύστημα (%)");
$table->addCell(2000)->addText("38%");
$table->addRow();
$table->addCell(2000)->addText("Σύστημα ανακυκλοφορίας");
$table->addCell(2000)->addText("ΟΧΙ");
$table->addRow();
$table->addCell(2000)->addText("Διέλευση από εσ. χώρους");
$table->addCell(2000)->addText("ΝΑΙ");
$table->addRow();
$table->addCell(2000)->addText("Εξωτερικοί χώροι");
$table->addCell(2000)->addText("Πάνω από 20%");
$table->addRow();
$table->addCell(2000)->addText("Βαθμός θερμικής απόδοσης δικτύου διανομής (%)");
$table->addCell(2000)->addText("100-7,5 = 92,5 %");
$table->addRow();
$table->addCell(2000)->addText("Είδος τερματικών μονάδων ψύξης χώρων");
$table->addCell(2000)->addText("τοπικές αντλίες θερμότητας");
$table->addRow();
$table->addCell(2000)->addText("Θερμική απόδοση τερματικών μονάδων");
$table->addCell(2000)->addText("93,0% (Τ.Ο.Τ.Ε.Ε. 20701-1/2010, πίνακας 4.14)");
$table->addRow();
$table->addCell(2000)->addText("Είδος αποθήκευσης ζεστού νερού χρήσης");
$table->addCell(2000)->addText("Θερμαντήρες διπλής ενέργειας σε εσωτερικό χώρο");
$table->addRow();
$table->addCell(2000)->addText("Θερμική απόδοση μονάδας αποθήκευσης ΖΝΧ");
$table->addCell(2000)->addText("100-5-2= 93%");
$section->addPageBreak(1);


$pososto_iliaka_100 = $pososto_iliaka*100;
$section->addText("6.3.4.5.Δεδομένα για το σύστημα ηλιακών συλλεκτών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Οι ηλιακοί συλλέκτες που θα εγκατασταθούν στο δώμα, έχουν την δυνατότητα κάλυψης του" . $pososto_iliaka_100 . "του συνολικού ΖΝΧ 
του κτηρίου.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η επιφάνεια ηλιακών συλλεκτών που καλύπτει το ΖΝΧ για το κτίριο είναι " . $epif_iliakoy . " m2.", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Ηλιακοί Συλλέκτες τμήματος κατοικιών', $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Είδος ηλιακού συλλέκτη");
$table->addCell(2000)->addText("Επίπεδος συλλεκτικός");
$table->addRow();
$table->addCell(2000)->addText("Χρήση ηλιακού συλλέκτη για");
$table->addCell(2000)->addText("ZNX");
$table->addRow();
$table->addCell(2000)->addText("Βαθμός ηλιακής αξιοποίησης για ΖΝΧ");
$table->addCell(2000)->addText($pososto_iliaka_100);
$table->addRow();
$table->addCell(2000)->addText("Βαθμός ηλιακής αξιοποίησης για θέρμανση χώρων");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Εμβαδόν επιφάνεια ηλιακών συλλεκτών (m2)");
$table->addCell(2000)->addText($epif_iliakoy);
$table->addRow();
$table->addCell(2000)->addText("Κλίση τοποθέτησης ηλιακών συλλεκτών(ο)");
$table->addCell(2000)->addText("30");
$table->addRow();
$table->addCell(2000)->addText("Προσανατολισμός ηλιακών συλλεκτών (ο)");
$table->addCell(2000)->addText("180");
$table->addRow();
$table->addCell(2000)->addText("Συντελεστής σκίασης F-s");
$table->addCell(2000)->addText("1");


$section->addPageBreak(1);

$section->addText("6.3.4.6.Δεδομένα για το σύστημα φωτισμού κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Τα φωτιστικά που θα χρησιμοποιηθούν για τους χώρους κατοικίας και για τους κοινόχρηστους θερμαινόμενους 
και μη χώρους, δεν λαμβάνονται υπ’ όψη στους υπολογισμούς.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("6.3.4.7.Δεδομένα κτηρίου αναφοράς κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Τα δεδομένα του κτηρίου αναφοράς εισάγονται αυτόματα από το λογισμικό, παράλληλα με την εισαγωγή 
δεδομένων και ανάλογα την χρήση και την λειτουργία του κηρίου ή των θερμικών ζωνών και σύμφωνα με τα όσα ορίζονται 
στο άρθρο 9 του Κ.Εν.Α.Κ. και στην Τ.Ο.Τ.Ε.Ε. 20701-1/2010.", array('name'=>'Arial', 'color'=>'black'));

$section->addPageBreak(1);
 
 
$section->addText("7.Ενέργεια", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Οι συντελεστές μετατροπής σε πρωτογενή ενέργεια και έκλυση αερίων ρύπων, σύμφωνα με το 
Κ.Εν.Α.Κ και την Τ.Ο.Τ.Ε.Ε 20701-1/2010 (παράγραφος 1.2) είναι οι εξής:", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Πηγή ενέργειας', $fontStyle);
$table->addCell(2000, $styleCell)->addText("Συντελεστής μετατροπής σε πρωτογενή ενέργεια", $fontStyle);
$table->addCell(2000, $styleCell)->addText('Εκλυόμενοι ρύποι ανά μονάδα ενέργειας (kgCO2/kWh)', $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Φυσικό αέριο");
$table->addCell(2000)->addText("1,05");
$table->addCell(2000)->addText("0,196");
$table->addRow();
$table->addCell(2000)->addText("Πετρέλαιο θέρμανσης");
$table->addCell(2000)->addText("1,1");
$table->addCell(2000)->addText("0,264");
$table->addRow();
$table->addCell(2000)->addText("Ηλεκτρική ενέργεια");
$table->addCell(2000)->addText("2,9");
$table->addCell(2000)->addText("0,989");
$table->addRow();
$table->addCell(2000)->addText("Υγραέριο");
$table->addCell(2000)->addText("1,05");
$table->addCell(2000)->addText("0,238");
$table->addRow();
$table->addCell(2000)->addText("Βιομάζα");
$table->addCell(2000)->addText("1");
$table->addCell(2000)->addText("-");
$table->addRow();
$table->addCell(2000)->addText("Τηλεθέρμανση από Δ.Ε.Η.");
$table->addCell(2000)->addText("0,7");
$table->addCell(2000)->addText("0,347");

$section->addTextBreak(1);
$section->addText("Η αυξημένη χρήση ηλεκτρικής ενέργειας επιβαρύνει σημαντικά την τελική κατανάλωση πρωτογενούς ενέργειας στο κτήριο, 
καθώς και την έκλυση αερίων ρύπων, σύμφωνα με τους συντελεστές μετατροπής πρωτογενούς ενέργειας.", array('name'=>'Arial', 'color'=>'black'));

$section->addPageBreak(1);


$section->addText("7.1.Κατανάλωση ενέργειας", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Για το τμήμα κτηρίου με χρήση " . $gen_xrisi . ", τα απαιτούμενα φορτία για θέρμανση και 
ψύξη, δίνονται σε σχετικό πίνακα . Στα φορτία αυτά περιλαμβάνονται και τα φορτία αερισμού για κάθε 
εποχή.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι αντίστοιχες καταναλώσεις τελικής ενέργειας ανά χρήση, δίνονται στον ίδιο πίνακα. 
Στην τελική κατανάλωση για θέρμανση και ψύξη, περιλαμβάνεται και η ηλεκτρική κατανάλωση από τα βοηθητικά 
συστήματα της κάθε εγκατάστασης.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι αντίστοιχες καταναλώσεις καυσίμων ανά καύσιμο (πηγή ωφέλιμης ενέργειας), δίνονται στον 
ιδιο σχετικό πίνακα ., όπου στην παρούσα περίπτωση κτηρίου είναι ο ηλεκτρισμός και το πετρέλαιο θέρμανσης.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι καταναλώσεις πρωτογενούς ενέργειας ανά τελική χρήση του τμήματος του κτιρίου με χρήση κατοικιών, 
δίνονται στον πίνακα όπου και η ενεργειακή κατάταξη.. Η κατανάλωση πρωτογενούς ενέργειας για θέρμανση του υπό μελέτη 
κτιρίου βρίσκεται χαμηλότερα από  τα  επίπεδα με το κτίριο αναφοράς, αφού τα συστήματα θέρμανσης τους έχουν σχεδόν τις 
ίδιες τεχνικές προδιαγραφές. Όσον αφορά την κατανάλωση πρωτογενούς ενέργειας για ψύξη του υπό μελέτη τμήματος κτηρίου 
εκτιμήθηκε σχεδόν στο 50% σε σχέση με το κτήριο αναφοράς. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Λόγω του μικρού χώρου του κτιρίου, προκύπτει μεγαλύτερη κατανάλωση από αυτήν του κτιρίου αναφοράς. 
Η διαφορά της κατανάλωσης πρωτογενούς ενέργειας για το ΖΝΧ του κτηρίου σε σχέση με το κτήριο αναφοράς, οφείλεται 
στο υψηλό ποσοστό κάλυψης (64%) από τους ηλιακούς συλλέκτες που θα εγκατασταθούν στο κτήριο.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText("7.2.Ενεργειακή κατάταξη χρήσης", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Σύμφωνα με τα αποτελέσματα των υπολογισμών για την ανηγμένη κατανάλωση πρωτογενούς ενέργειας
 του τμήματος του κτηρίου με χρήση κατοικιών, το κτήριο ανήκει στην κατηγορία Β+", array('name'=>'Arial', 'color'=>'black'));
 $section->addText(" Άρα  πληροί  τις  ελάχιστες  απαιτήσεις  του Κ.Εν.Α.Κ., για κατανάλωση πρωτογενούς 
 ενέργειας κατά μέγιστο ίση με την αντίστοιχη του κτηρίου αναφοράς.", array('name'=>'Arial', 'color'=>'black'));

$section->addPageBreak(1);



$section->addText("ΒΙΒΛΙΟΓΡΑΦΙΑ, ΠΡΟΤΥΠΑ, ΚΑΝΟΝΙΣΜΟΙ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16'));
$section->addText("Για τη σύνταξη της μελέτης αυτής χρησιμοποιήθηκαν τα ακόλουθα πρότυπα, κανονισμοί,
επιστημονικά συγγράμματα και δημοσιεύσεις.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("1.   Οδηγία 2002/91/ΕΚ του Ευρωπαϊκού Κοινοβουλίου και του Συμβουλίου της 16ης Δεκεμβρίου
2002 για την «Ενεργειακή Απόδοσης των Κτηρίων».", array('name'=>'Arial', 'color'=>'black'));
$section->addText("2.   Φ.Ε.Κ. 89, νόμος 3661/19-05-2008. «Μέτρα για την μείωση της ενεργειακής κατανάλωσης των 
κτηρίων και άλλες διατάξεις».", array('name'=>'Arial', 'color'=>'black'));
$section->addText("3.   Φ.Ε.Κ. 407/9.4.2010, «Κανονισμός Ενεργειακής Απόδοσης Κτηρίων- Κ.Εν.Α.Κ..».", array('name'=>'Arial', 'color'=>'black'));
$section->addText("4.   Τ.Ο.Τ.Ε.Ε. 20701-1/2010, «Αναλυτικές Εθνικές Προδιαγραφές παραμέτρων για τον υπολογισμό της ενεργειακής 
απόδοσης κτηρίων και την έκδοση πιστοποιητικού ενεργειακής απόδοσης».", array('name'=>'Arial', 'color'=>'black'));
$section->addText("5.   Τ.Ο.Τ.Ε.Ε. 20701-2/2010,  «Θερμοφυσικές  ιδιότητες  δομικών  υλικών  και  έλεγχος  της θερμομονωτικής 
επάρκειας των κτηρίων».", array('name'=>'Arial', 'color'=>'black'));
$section->addText("6.   Τ.Ο.Τ.Ε.Ε. 20701-3/2010, «Κλιματικά Δεδομένα Ελληνικών Περιοχών».", array('name'=>'Arial', 'color'=>'black'));
$section->addText("7.   Duffie A John., Beckman A. William, «Solar Engineering of Thermal Processes». John Wiley & Sons, 
INC., Second edition, 1991.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);
/*
$section->addText("", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("", array('name'=>'Arial', 'color'=>'black'));
*/



$section->addText('ΦΥΛΛΑ ΥΠΟΛΟΓΙΣΜΩΝ', array('name'=>'Arial', 'color'=>'006699', 'size'=>'18', 'align'=>'center'));

//ΥΠΟΛΟΓΙΣΤΙΚΑ
$section->addText('Χώροι κτιρίου', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);

//Πίνακας χώρων
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Χώροι κτιρίου', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μήκος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Πλάτος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ύψος', $fontStyle);
$table->addCell(500, $styleCell)->addText('Εμβαδόν', $fontStyle);
$table->addCell(500, $styleCell)->addText('Όγκος', $fontStyle);
// Προσθήκη των χώρων
for($i = 1; $i <= $rows_xwroi; $i++) {
	$table->addRow();
	$table->addCell(2000)->addText("Χώρος $i");
	$table->addCell(2000)->addText(${"xwroi_mikos".$i});
	$table->addCell(2000)->addText(${"xwroi_platos".$i});
	$table->addCell(2000)->addText(${"xwroi_ypsos".$i});
	$table->addCell(2000)->addText(${"xwroi_emvadon".$i});
	$table->addCell(2000)->addText(${"xwroi_ogkos".$i});
}
$table->addRow();
$table->addCell(2000)->addText("Σύνολα");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText($synoliko_embadon);
$table->addCell(2000)->addText($synolikos_ogkos);
$section->addPageBreak(1);




$section->addText('Δάπεδα - Οροφές', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);

// Πίνακας δαπέδων οροφών
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Είδος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Εμβαδόν', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U', $fontStyle);
// Προσθήκη δαπέδων - οροφών
$table->addRow();
$table->addCell(2000)->addText("Δάπεδο επί εδάφους");
$table->addCell(2000)->addText($dapedo_embadon1);
$table->addCell(2000)->addText($dapedo_u1);
$table->addRow();
$table->addCell(2000)->addText("Δάπεδο επί μη θερμαινόμενου χώρου");
$table->addCell(2000)->addText($dapedo_embadon2);
$table->addCell(2000)->addText($dapedo_u2);
$table->addRow();
$table->addCell(2000)->addText("Οροφή με κεραμίδι");
$table->addCell(2000)->addText($orofi_embadon1);
$table->addCell(2000)->addText($orofi_u1);
$table->addRow();
$table->addCell(2000)->addText("Οροφή πλάκα");
$table->addCell(2000)->addText($orofi_embadon2);
$table->addCell(2000)->addText($orofi_u2);
$section->addPageBreak(1);



//Θερμογέφυρες γωνιών - δαπέδου
$section->addText('Θερμογέφυρες γωνιών δαπέδου', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας θερμογεφυρών
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Είδος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Πλήθος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ύψος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('U*Α', $fontStyle);
// Προσθήκη θερμογεφυρών εσωτερικών γωνιών
for ($i = 1; $i <= $rows_es_g; $i++) {
	$table->addRow();
	$table->addCell(2000)->addText(${"thermo_esw_drop".$i});
	$table->addCell(2000)->addText(${"thermo_esw_gwnia_p".$i});
	$table->addCell(2000)->addText(${"thermo_esw_gwnia_ypsos".$i});
	$table->addCell(2000)->addText(${"thermo_esw_gwnia_ua".$i});
}
// Προσθήκη θερμογεφυρών εξωτερικών γωνιών
for ($i = 1; $i <= $rows_eks_g; $i++) {
	$table->addRow();
	$table->addCell(2000)->addText(${"thermo_eksw_drop".$i});
	$table->addCell(2000)->addText(${"thermo_eksw_gwnia_p".$i});
	$table->addCell(2000)->addText(${"thermo_eksw_gwnia_ypsos".$i});
	$table->addCell(2000)->addText(${"thermo_eksw_gwnia_ua".$i});
}
// Προσθήκη θερμογεφυρών δαπέδου
$table->addRow();
$table->addCell(2000)->addText('Δαπέδου (υπολογισμός με βάση την περίμετρο)');
$table->addCell(2000)->addText($thermo_dapedo_drop);
$section->addPageBreak(1);



//Δομικά στοιχεία Β
$section->addText('Δομικά στοιχεία Βόρειας πλευράς', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας δομικών Β
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Όνομα στοιχείου', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μήκος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ύψος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Πάχος', $fontStyle);
$table->addCell(2000, $styleCell)->addText(' U ', $fontStyle);
$table->addCell(2000, $styleCell)->addText(' Ε ', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Θερμογέφυρες', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Εδρομ.', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Τύπος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αερισμός', $fontStyle);
for ($i = 1; $i <= $t_boreia; $i++) {
$t = "b";
$onoma = ${"name_b".$i};
$an = "an_b_";
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . $onoma, $fontStyle);
$table->addCell(2000)->addText(${"mikos_".$t.$i});
$table->addCell(2000)->addText(${"ypsos_".$t.$i});
$table->addCell(2000)->addText(${"paxos_".$t.$i});
$table->addCell(2000)->addText(${"u_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_".$t.$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Δοκός ");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"dokos_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_dok_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Υποστύλωμα");
$table->addCell(2000)->addText(${"ypostil_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_ypost_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Συρομένων");
$table->addCell(2000)->addText(${"mikos_syr_".$t.$i});
$table->addCell(2000)->addText(${"ypsos_syr_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_syr_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_".$t.$i});
	for ($j = 1; $j <= $anoig_t_boreia; $j++) {
	if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
	$table->addRow();
	$table->addCell(2000)->addText(${$an."name".$j});
	$table->addCell(2000)->addText(${$an."anoig_mikos".$j});
	$table->addCell(2000)->addText(${$an."anoig_ypsos".$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$an."anoig_u".$j});
	if (${$an."anoig_eidos".$j} == 1){
	$table->addCell(2000)->addText(${"epifaneia_masif_".$t.$j});
	}
	if (${$an."anoig_eidos".$j} != 1){
	$table->addCell(2000)->addText(${"epifaneia_anoigmatos_".$t.$j});
	}
	$table->addCell(2000)->addText(${"thermogefyres_anoig_".$t.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$an."anoig_eidos".$j});
	$table->addCell(2000)->addText(${"dieisdysi_".$t.$j});
	}
	}
}
$section->addPageBreak(1);


//Δομικά στοιχεία Α
$section->addText('Δομικά στοιχεία Ανατολικής πλευράς', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας δομικών A
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Όνομα στοιχείου', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μήκος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ύψος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Πάχος', $fontStyle);
$table->addCell(2000, $styleCell)->addText(' U ', $fontStyle);
$table->addCell(2000, $styleCell)->addText(' Ε ', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Θερμογέφυρες', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Εδρομ.', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Τύπος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αερισμός', $fontStyle);
for ($i = 1; $i <= $t_anatolika; $i++) {
$t = "a";
$onoma = ${"name_a".$i};
$an = "an_a_";
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . $onoma, $fontStyle);
$table->addCell(2000)->addText(${"mikos_".$t.$i});
$table->addCell(2000)->addText(${"ypsos_".$t.$i});
$table->addCell(2000)->addText(${"paxos_".$t.$i});
$table->addCell(2000)->addText(${"u_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_".$t.$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Δοκός ");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"dokos_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_dok_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Υποστύλωμα");
$table->addCell(2000)->addText(${"ypostil_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_ypost_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Συρομένων");
$table->addCell(2000)->addText(${"mikos_syr_".$t.$i});
$table->addCell(2000)->addText(${"ypsos_syr_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_syr_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_".$t.$i});
	for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
	if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
	$table->addRow();
	$table->addCell(2000)->addText(${$an."name".$j});
	$table->addCell(2000)->addText(${$an."anoig_mikos".$j});
	$table->addCell(2000)->addText(${$an."anoig_ypsos".$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$an."anoig_u".$j});
	if (${$an."anoig_eidos".$j} == 1){
	$table->addCell(2000)->addText(${"epifaneia_masif_".$t.$j});
	}
	if (${$an."anoig_eidos".$j} != 1){
	$table->addCell(2000)->addText(${"epifaneia_anoigmatos_".$t.$j});
	}
	$table->addCell(2000)->addText(${"thermogefyres_anoig_".$t.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$an."anoig_eidos".$j});
	$table->addCell(2000)->addText(${"dieisdysi_".$t.$j});
	}
	}
}
$section->addPageBreak(1);





//Δομικά στοιχεία N
$section->addText('Δομικά στοιχεία Νότιας πλευράς', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας δομικών N
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Όνομα στοιχείου', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μήκος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ύψος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Πάχος', $fontStyle);
$table->addCell(2000, $styleCell)->addText(' U ', $fontStyle);
$table->addCell(2000, $styleCell)->addText(' Ε ', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Θερμογέφυρες', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Εδρομ.', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Τύπος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αερισμός', $fontStyle);
for ($i = 1; $i <= $t_notia; $i++) {
$t = "n";
$onoma = ${"name_n".$i};
$an = "an_n_";
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . $onoma, $fontStyle);
$table->addCell(2000)->addText(${"mikos_".$t.$i});
$table->addCell(2000)->addText(${"ypsos_".$t.$i});
$table->addCell(2000)->addText(${"paxos_".$t.$i});
$table->addCell(2000)->addText(${"u_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_".$t.$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Δοκός ");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"dokos_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_dok_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Υποστύλωμα");
$table->addCell(2000)->addText(${"ypostil_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_ypost_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Συρομένων");
$table->addCell(2000)->addText(${"mikos_syr_".$t.$i});
$table->addCell(2000)->addText(${"ypsos_syr_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_syr_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_".$t.$i});
	for ($j = 1; $j <= $anoig_t_notia; $j++) {
	if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
	$table->addRow();
	$table->addCell(2000)->addText(${$an."name".$j});
	$table->addCell(2000)->addText(${$an."anoig_mikos".$j});
	$table->addCell(2000)->addText(${$an."anoig_ypsos".$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$an."anoig_u".$j});
	if (${$an."anoig_eidos".$j} == 1){
	$table->addCell(2000)->addText(${"epifaneia_masif_".$t.$j});
	}
	if (${$an."anoig_eidos".$j} != 1){
	$table->addCell(2000)->addText(${"epifaneia_anoigmatos_".$t.$j});
	}
	$table->addCell(2000)->addText(${"thermogefyres_anoig_".$t.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$an."anoig_eidos".$j});
	$table->addCell(2000)->addText(${"dieisdysi_".$t.$j});
	}
	}
}
$section->addPageBreak(1);



//Δομικά στοιχεία Δ
$section->addText('Δομικά στοιχεία Δυτικής πλευράς', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας δομικών Δ
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Όνομα στοιχείου', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Μήκος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ύψος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Πάχος', $fontStyle);
$table->addCell(2000, $styleCell)->addText(' U ', $fontStyle);
$table->addCell(2000, $styleCell)->addText(' Ε ', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Θερμογέφυρες', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Εδρομ.', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Τύπος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αερισμός', $fontStyle);
for ($i = 1; $i <= $t_dytika; $i++) {
$t = "d";
$onoma = ${"name_d".$i};
$an = "an_d_";
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . $onoma, $fontStyle);
$table->addCell(2000)->addText(${"mikos_".$t.$i});
$table->addCell(2000)->addText(${"ypsos_".$t.$i});
$table->addCell(2000)->addText(${"paxos_".$t.$i});
$table->addCell(2000)->addText(${"u_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_".$t.$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Δοκός ");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"dokos_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_dok_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Υποστύλωμα");
$table->addCell(2000)->addText(${"ypostil_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_ypost_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_".$t.$i});
$table->addRow();
$table->addCell(2000)->addText("Συρομένων");
$table->addCell(2000)->addText(${"mikos_syr_".$t.$i});
$table->addCell(2000)->addText(${"ypsos_syr_".$t.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${"u_syr_".$t.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_".$t.$i});
	for ($j = 1; $j <= $anoig_t_dytika; $j++) {
	if (${$an."id_toixoy".$j} == ${"id_".$t.$i}){
	$table->addRow();
	$table->addCell(2000)->addText(${$an."name".$j});
	$table->addCell(2000)->addText(${$an."anoig_mikos".$j});
	$table->addCell(2000)->addText(${$an."anoig_ypsos".$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$an."anoig_u".$j});
	if (${$an."anoig_eidos".$j} == 1){
	$table->addCell(2000)->addText(${"epifaneia_masif_".$t.$j});
	}
	if (${$an."anoig_eidos".$j} != 1){
	$table->addCell(2000)->addText(${"epifaneia_anoigmatos_".$t.$j});
	}
	$table->addCell(2000)->addText(${"thermogefyres_anoig_".$t.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$an."anoig_eidos".$j});
	$table->addCell(2000)->addText(${"dieisdysi_".$t.$j});
	}
	}
}
$section->addPageBreak(1);


//Διαστάσεις κατασκευής
$section->addText('Διαστάσεις κατασκευής', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας διαστάσεων
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(900);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText('Είδος', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Διάσταση', $fontStyle);
//προσθήκη δεδομένων
$table->addRow();
$table->addCell(2000)->addText('Σύνολο βόρειων τοίχων (όλοι οι όροφοι)');
$table->addCell(2000)->addText($mikos_toixoy_b);
$table->addRow();
$table->addCell(2000)->addText('Σύνολο ανατολικών τοίχων (όλοι οι όροφοι)');
$table->addCell(2000)->addText($mikos_toixoy_a);
$table->addRow();
$table->addCell(2000)->addText('Σύνολο νότιων τοίχων (όλοι οι όροφοι)');
$table->addCell(2000)->addText($mikos_toixoy_n);
$table->addRow();
$table->addCell(2000)->addText('Σύνολο δυτικών τοίχων (όλοι οι όροφοι)');
$table->addCell(2000)->addText($mikos_toixoy_d);
$table->addRow();
$table->addCell(2000)->addText('Περίμετρος δαπέδου');
$table->addCell(2000)->addText($perimetros);
$table->addRow();
$table->addCell(2000)->addText('Όγκος ορόφου');
$table->addCell(2000)->addText($synolikos_ogkos);
$section->addPageBreak(1);



//Σύνολα δομικών στοιχείων Βόρεια
$section->addText('Πίνακας συνόλων δομικών στοιχείων - Βόρεια', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας συνόλου δομικών
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(2000);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCellBTLR)->addText('Όνομα τοίχου', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια δοκών', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια υποστηλωμάτων', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια συρομένων', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Διαφανή ανοίγματα', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αδιαφανή ανοίγματα', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια δρομικού', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Θερμογέφυρες δομικές', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Θερμογέφυρες ανοιγμάτων', $fontStyle);
//προσθήκη δεδομένων
for ($i = 1; $i <= $t_boreia; $i++) {
$table->addRow();
$table->addCell(2000)->addText(${"name_b".$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_b".$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_b".$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_b".$i});
$table->addCell(2000)->addText(${"epifaneia_anoigmatwn_toixoy_b".$i});
$table->addCell(2000)->addText(${"epifaneia_masif_toixoy_b".$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_b".$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_b".$i});
$table->addCell(2000)->addText(${"thermogefyres_anoig_b".$i});
}
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . ${"name_b".$i});
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dokos_b);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_ypost_b);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_toixoy_syr_b);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_anoigmatwn_toixoy_b);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_masif_toixoy_b);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dromikoy_b);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_toixoy_b);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_anoig_b);
$section->addPageBreak(1);


//Σύνολα δομικών στοιχείων Ανατολικά
$section->addText('Πίνακας συνόλων δομικών στοιχείων - Ανατολικά', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας συνόλου δομικών
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(2000);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCellBTLR)->addText('Όνομα τοίχου', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια δοκών', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια υποστηλωμάτων', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια συρομένων', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Διαφανή ανοίγματα', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αδιαφανή ανοίγματα', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια δρομικού', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Θερμογέφυρες δομικές', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Θερμογέφυρες ανοιγμάτων', $fontStyle);
//προσθήκη δεδομένων
for ($i = 1; $i <= $t_anatolika; $i++) {
$table->addRow();
$table->addCell(2000)->addText(${"name_a".$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_a".$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_a".$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_a".$i});
$table->addCell(2000)->addText(${"epifaneia_anoigmatwn_toixoy_a".$i});
$table->addCell(2000)->addText(${"epifaneia_masif_toixoy_a".$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_a".$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_a".$i});
$table->addCell(2000)->addText(${"thermogefyres_anoig_a".$i});
}
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . ${"name_a".$i});
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dokos_a);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_ypost_a);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_toixoy_syr_a);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_anoigmatwn_toixoy_a);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_masif_toixoy_a);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dromikoy_a);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_toixoy_a);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_anoig_a);
$section->addPageBreak(1);


//Σύνολα δομικών στοιχείων Νότια
$section->addText('Πίνακας συνόλων δομικών στοιχείων - Νότια', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας συνόλου δομικών
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(2000);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCellBTLR)->addText('Όνομα τοίχου', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια δοκών', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια υποστηλωμάτων', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια συρομένων', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Διαφανή ανοίγματα', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αδιαφανή ανοίγματα', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια δρομικού', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Θερμογέφυρες δομικές', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Θερμογέφυρες ανοιγμάτων', $fontStyle);
//προσθήκη δεδομένων
for ($i = 1; $i <= $t_notia; $i++) {
$table->addRow();
$table->addCell(2000)->addText(${"name_n".$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_n".$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_n".$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_n".$i});
$table->addCell(2000)->addText(${"epifaneia_anoigmatwn_toixoy_n".$i});
$table->addCell(2000)->addText(${"epifaneia_masif_toixoy_n".$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_n".$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_n".$i});
$table->addCell(2000)->addText(${"thermogefyres_anoig_n".$i});
}
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . ${"name_n".$i});
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dokos_n);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_ypost_n);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_toixoy_syr_n);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_anoigmatwn_toixoy_n);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_masif_toixoy_n);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dromikoy_n);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_toixoy_n);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_anoig_n);
$section->addPageBreak(1);



//Σύνολα δομικών στοιχείων Δυτικά
$section->addText('Πίνακας συνόλων δομικών στοιχείων - Δυτικά', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
// Πίνακας συνόλου δομικών
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(2000);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCellBTLR)->addText('Όνομα τοίχου', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια δοκών', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια υποστηλωμάτων', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια συρομένων', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Διαφανή ανοίγματα', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αδιαφανή ανοίγματα', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Επιφάνεια δρομικού', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Θερμογέφυρες δομικές', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Θερμογέφυρες ανοιγμάτων', $fontStyle);
//προσθήκη δεδομένων
for ($i = 1; $i <= $t_dytika; $i++) {
$table->addRow();
$table->addCell(2000)->addText(${"name_d".$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_d".$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_d".$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_d".$i});
$table->addCell(2000)->addText(${"epifaneia_anoigmatwn_toixoy_d".$i});
$table->addCell(2000)->addText(${"epifaneia_masif_toixoy_d".$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_d".$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_d".$i});
$table->addCell(2000)->addText(${"thermogefyres_anoig_d".$i});
}
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . ${"name_d".$i});
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dokos_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_ypost_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_toixoy_syr_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_anoigmatwn_toixoy_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_masif_toixoy_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dromikoy_d);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_toixoy_d);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_anoig_d);
$section->addPageBreak(1);





//ΖΝΧ από ηλιακό
$section->addText('ΖΝΧ από ηλιακό', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
$section->addText("Χρήση: " . $xrisi_znx_iliakos, array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(0);
$section->addText("Απαιτούμενο ποσό ΖΝΧ: " . $syntelestis_znx_iliakos . " lt/ημέρα/μ2", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(0);
$section->addText("Θερμοκρασία ΖΝΧ: " . $t_znx . " οC", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(0);
$section->addText("Μέση πυκνότητα νερού: 0.998 Kg/lt", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(0);
$section->addText("Ειδική θερμότητα νερού: 4.18 KJ/(Kg.K)", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(0);
$section->addText("Επιφάνεια ηλιακού: " . $epif_iliakoy . " m2", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(0);
$section->addText("Vd: " . $vd_iliakoy . " lt/ημέρα", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(2);
$section->addText("Το δίκτυο διανομής είναι μονωμένο σύμφωνα με τις ελάχιστες προδιαγραφές της Τ.Ο.Τ.Ε.Ε. 20701-1/2010 
και με ποσοστό απωλειών 7,5% (πίνακας 4.16).Οι πλευρικές απώλειες των θερμαντήρων λαμβάνονται 2% σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 
20701-1/2010 (παράγραφο 4.8.4) για τοποθέτηση σε εσωτερικό χώρο και οι απώλειες λόγω εναλλάκτη θερμότητας λαμβάνονται 5%. ", array('name'=>'Arial', 'color'=>'black'));

$section->addPageBreak(1);


//Πίνακας ΖΝΧ από ηλιακό
$table = $section->addTable('myOwnTableStyle');
// Προσθήκη γραμμής
$table->addRow(1000);
// Προσθήκη των τίτλων
$table->addCell(2000, $styleCell)->addText("", $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Ιανουάριος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Φεβρουάριος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Μάρτιος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Απρίλιος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Μαίος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Ιούνιος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Ιούλιος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Αύγουστος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Σεπτέμβριος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Οκτώβριος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Νοέμβριος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Δεκέμβριος', $fontStyle);
$table->addCell(2000, $styleCellBTLR)->addText('Σύνολα', $fontStyle);
//Νερό δικτύου
$table->addRow();
$table->addCell(2000)->addText("Θερμοκρασία νερού δικτύου(oC)", $fontSmall);
$table->addCell(2000)->addText($nero_jan, $fontSmall);
$table->addCell(2000)->addText($nero_feb, $fontSmall);
$table->addCell(2000)->addText($nero_mar, $fontSmall);
$table->addCell(2000)->addText($nero_apr, $fontSmall);
$table->addCell(2000)->addText($nero_may, $fontSmall);
$table->addCell(2000)->addText($nero_jun, $fontSmall);
$table->addCell(2000)->addText($nero_jul, $fontSmall);
$table->addCell(2000)->addText($nero_aug, $fontSmall);
$table->addCell(2000)->addText($nero_sep, $fontSmall);
$table->addCell(2000)->addText($nero_okt, $fontSmall);
$table->addCell(2000)->addText($nero_nov, $fontSmall);
$table->addCell(2000)->addText($nero_dec, $fontSmall);
$table->addCell(2000)->addText("", $fontSmall);
//Μέσο ημερήσιο θερμικό φορτίο
$table->addRow();
$table->addCell(2000)->addText("Μέσο ημερήσιο θερμικό φορτίο για ΖΝΧ (kWh/ημέρα)", $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_jan, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_feb, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_mar, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_apr, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_may, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_jun, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_jul, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_aug, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_sep, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_okt, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_nov, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_day_dec, $fontSmall);
$table->addCell(2000)->addText("", $fontSmall);
//Μέσο μηνιαίο θερμικό φορτίο
$table->addRow();
$table->addCell(2000)->addText("Μέσο μηνιαίο θερμικό φορτίο για ΖΝΧ (kWh/ημέρα)", $fontSmall);
$table->addCell(2000)->addText($fortio_znx_jan, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_feb, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_mar, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_apr, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_may, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_jun, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_jul, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_aug, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_sep, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_okt, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_nov, $fontSmall);
$table->addCell(2000)->addText($fortio_znx_dec, $fontSmall);
$table->addCell(2000)->addText($fortio_znx);
//Μέση μηνιαία προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m2)
$table->addRow();
$table->addCell(2000)->addText("Μέση μηνιαία προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m2)", $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_jan, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_feb, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_mar, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_apr, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_may, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_jun, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_jul, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_aug, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_sep, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_okt, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_nov, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dec, $fontSmall);
$table->addCell(2000)->addText("", $fontSmall);
//Μέση ημερήσια προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m2)
$table->addRow();
$table->addCell(2000)->addText("Μέση ημερήσια προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m2)", $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_jan, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_feb, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_mar, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_apr, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_may, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_jun, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_jul, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_aug, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_sep, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_okt, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_nov, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_day_dec, $fontSmall);
$table->addCell(2000)->addText("", $fontSmall);
//Μέση ημερήσια προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m2) κ4
$table->addRow();
$table->addCell(2000)->addText("Μέση ημερήσια προσπίπτουσα ηλιακή ακτινοβολία για βέλτιστη κλίση (KWh/m2) κ4", $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_jan, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_feb, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_mar, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_apr, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_may, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_jun, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_jul, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_aug, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_sep, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_okt, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_nov, $fontSmall);
$table->addCell(2000)->addText($iliaki_akt_dayk4_dec, $fontSmall);
$table->addCell(2000)->addText("", $fontSmall);
//Μέση μηνιαία απολαβή ηλιακής ακτινοβολίας για βέλτιστη κλίση και επιφάνεια ηλιακού
$table->addRow();
$table->addCell(2000)->addText("Μέση μηνιαία απολαβή ηλιακής ακτινοβολίας για βέλτιστη κλίση και επιφάνεια ηλιακού", $fontSmall);
$table->addCell(2000)->addText($apolavi_jan, $fontSmall);
$table->addCell(2000)->addText($apolavi_feb, $fontSmall);
$table->addCell(2000)->addText($apolavi_mar, $fontSmall);
$table->addCell(2000)->addText($apolavi_apr, $fontSmall);
$table->addCell(2000)->addText($apolavi_may, $fontSmall);
$table->addCell(2000)->addText($apolavi_jun, $fontSmall);
$table->addCell(2000)->addText($apolavi_jul, $fontSmall);
$table->addCell(2000)->addText($apolavi_aug, $fontSmall);
$table->addCell(2000)->addText($apolavi_sep, $fontSmall);
$table->addCell(2000)->addText($apolavi_okt, $fontSmall);
$table->addCell(2000)->addText($apolavi_nov, $fontSmall);
$table->addCell(2000)->addText($apolavi_dec, $fontSmall);
$table->addCell(2000)->addText($apolavi_aktinov);
//Ποσοστό κάλυψης αναγκών από ηλιακά (%)
$table->addRow();
$table->addCell(2000)->addText("Ποσοστό κάλυψης αναγκών από ηλιακά (%)", $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_jan, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_feb, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_mar, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_apr, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_may, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_jun, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_jul, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_aug, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_sep, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_okt, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_nov, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka_dec, $fontSmall);
$table->addCell(2000)->addText($pososto_iliaka);
//Ποσοστό κάλυψης αναγκών υπολοίπων (%)
$table->addRow();
$table->addCell(2000)->addText("Ποσοστό κάλυψης αναγκών υπολοίπων (%)", $fontSmall);
$table->addCell(2000)->addText($pososto_petr_jan, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_feb, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_mar, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_apr, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_may, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_jun, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_jul, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_aug, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_sep, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_okt, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_nov, $fontSmall);
$table->addCell(2000)->addText($pososto_petr_dec, $fontSmall);
$table->addCell(2000)->addText($pososto_petr);
$section->addPageBreak(1);





//ΕΛΕΓΧΟΣ διείσδυσης αέρα από κουφώματα
$section->addText('ΕΛΕΓΧΟΣ διείσδυσης αέρα από κουφώματα', array('name'=>'Arial', 'color'=>'006699'));
$section->addTextBreak(1);
$section->addText("Η συνολική διείσδυση αέρα από κουφώματα είναι: " . $dieisdysi_aera . " m3/h", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(0);
$section->addText("Η απαιτούμενη διείσδυση αέρα είναι: " . $apaitoymeni_dieisdysi_aera . " m3/h<br/>", array('name'=>'Arial', 'color'=>'black'));
$section->addTextBreak(0);
if ($apaitoymeni_dieisdysi_aera <= $dieisdysi_aera){
$section->addText("Ικανοποιείται η απαίτηση καθώς Απαιτούμενη διείσδυση: " . $apaitoymeni_dieisdysi_aera . " m3/h < ή = " . "Συνολική διείσδυση: " . $dieisdysi_aera . " m3/h", array('name'=>'Arial', 'color'=>'blue'));
}
else{
$section->addText("Δεν ικανοποιείται η απαίτηση καθώς Απαιτούμενη διείσδυση: " . $apaitoymeni_dieisdysi_aera . " m3/h > " . "Συνολική διείσδυση: " . $dieisdysi_aera . " m3/h", array('name'=>'Arial', 'color'=>'red'));
}
$section->addPageBreak(1);


$section->addText('ΧΩΡΟΣ ΕΙΚΟΝΩΝ ΣΚΙΑΣΗΣ', array('name'=>'Arial', 'color'=>'006699', 'size'=>'16', 'align'=>'center'));
$section->addPageBreak(1);

$section->addText('CHECK-LIST', array('name'=>'Arial', 'color'=>'006699', 'size'=>'16', 'align'=>'center'));
$section->addImage('images/word-images/check1.jpg');
$section->addImage('images/word-images/check2.jpg');
$section->addImage('images/word-images/check3.jpg');
$section->addImage('images/word-images/check4.jpg');
$section->addImage('images/word-images/check5.jpg');



// Save File
$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
$objWriter->save('apotelesmata/kenak_word2.docx');


// Χρήση μνήμης
echo "<br/>" . date('H:i:s') . " Μέγιστη χρήση μνήμης: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Ολοκλήρωση
echo "<br/>" . date('H:i:s') . " Το αρχείο kenak_word.docx εγγράφηκε επιτυχώς.\r\n" . "<br/><a href=\"apotelesmata/kenak_word2.docx\">Κατεβάστε το αρχείο του τεύχους</a>";
?>