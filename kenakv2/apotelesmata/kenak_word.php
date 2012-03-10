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
$header->addText('Μελέτη Ενεργειακής απόδοσης κτιρίου - La-Kenak v1.0 - Free software', array('name'=>'Arial', 'color'=>'blue', 'size'=>'8'));
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
$eisagwgi_teyxoys1 = "Η  εκπόνηση  μελέτης  ενεργειακής  απόδοσης  είναι  υποχρεωτική,  βάσει  του  νόμου  3661/2008 
«Μέτρα για τη μείωση της ενεργειακής κατανάλωσης των κτιρίων και άλλες διατάξεις» (ΦΕΚ Α 89) , για όλα τα νέα ή ριζικά 
ανακαινιζόμενα κτίρια με τις εξαιρέσεις του άρθρου 11, όπως αυτός τροποποιήθηκε σύμφωνα με τα άρθρα 10 και 10Α του νόμου
3851/2010. Η μελέτη ενεργειακής απόδοσης εκπονείται βάσει του Κανονισμού Ενεργειακής Απόδοσης Κτηρίων – Κ.Εν.Α.Κ. 
(Φ.Ε.Κ. Β407/9.4.2010) και τις Τεχνικές Οδηγίες του Τεχνικού Επιμελητηρίου Ελλάδας που συντάχθηκαν υποστηρικτικά  του 
κανονισμού  όπως  αυτές  ισχύουν  επικαιροποιημένες. Ειδικότερα, η μελέτη ενεργειακής απόδοσης βασίζεται στις εξής Τ.Ο.Τ.Ε.Ε. :
20701-1/2010:  «Αναλυτικές  Εθνικές  Προδιαγραφές  παραμέτρων  για  τον  υπολογισμό  της ενεργειακής απόδοσης κτιρίων και την έκδοση 
πιστοποιητικού ενεργειακής απόδοσης», 20701-2/2010: «Θερμοφυσικές ιδιότητες δομικών υλικών και έλεγχος της θερμομονωτικής
επάρκειας των κτιρίων»,20701-3/2010: «Κλιματικά δεδομένα ελληνικών πόλεων». ";
$eisagwgi_teyxoys2 = "Η ενσωμάτωση παθητικών ηλιακών συστημάτων (Π.Η.Σ.) πέραν του άμεσου	κέρδους, εγκαταστάσεων ανανεώσιμων πηγών ενέργειας 
(Α.Π.Ε.) και συστημάτων συμπαραγωγής ηλεκτρισμού – θέρμανσης (Σ.Η.Θ.) θα καλυφθεί στην αμέσως επόμενη φάση με την έκδοση των 
ακόλουθων Τ.Ο.Τ.Ε.Ε. που θα καθορίσουν με σαφήνεια τις παραμέτρους και τις προδιαγραφές των σχετικών μελετών – εγκαταστάσεων : 
20701-Χ/2010: «Βιοκλιματικός σχεδιασμός».20701-Χ/2010: «Εγκαταστάσεις Α.Π.Ε. σε κτίρια».20701-Χ/2010: «Εγκαταστάσεις Σ.Η.Θ. σε κτίρια».
Σύμφωνα με την εγκύκλιο οικ.1603/4.10.2010: «Για την καλύτερη δυνατή εφαρμογή των απαιτήσεων της παραγράφου 1 του άρθρου 8 
«Σχεδιασμός Κτιρίου», απαιτείται συστηματική προσέγγιση των αρχών του βιοκλιματικού σχεδιασμού του κτιρίου με επαρκή τεχνική τεκμηρίωση, 
στη βάση της διαθέσιμης βιβλιογραφίας και έως την έκδοση σχετικής Τ.Ο.Τ.Ε.Ε. Στην περίπτωση που αποδεδειγμένα υπάρχουν αρκετοί περιορισμοί 
(πολεοδομικού, τεχνικού, αισθητικού, οικονομικού χαρακτήρα, κ.ά.) που ενδεχομένως αποκλείουν την εφαρμογή της βέλτιστης ενεργειακά λύσης, 
υποβάλλεται υποχρεωτικά Τεχνική Έκθεση, η οποία θα τεκμηριώνει επαρκώς τους λόγους μη εφαρμογής κάθε μίας από τις περιπτώσεις της παραγράφου 
1 του άρθρου 8. ";
$eisagwgi_teyxoys3 = "Στόχος της ενεργειακής μελέτης είναι η ελαχιστοποίηση κατά το δυνατόν της κατανάλωσης ενέργειας για την σωστή λειτουργία του κτιρίου, μέσω:
του βιοκλιματικού σχεδιασμού του κτηριακού κελύφους, αξιοποιώντας τη θέση του κτηρίου ως προς τον περιβάλλοντα χώρο, την ηλιακή διαθέσιμη 
ακτινοβολία ανά προσανατολισμό όψης, κ.ά., της θερμομονωτικής επάρκειας του κτηρίου με την κατάλληλη εφαρμογή θερμομόνωσης στα αδιαφανή 
δομικά στοιχεία	αποφεύγοντας κατά το δυνατόν τη δημιουργία θερμογεφυρών, καθώς και την επιλογή κατάλληλων κουφωμάτων, δηλαδή συνδυασμό 
υαλοπίνακα αλλά και πλαισίου, της επιλογής κατάλληλων ηλεκτρομηχανολογικών συστημάτων υψηλής απόδοσης, για την κάλυψη των αναγκών σε 
θέρμανση, ψύξη, κλιματισμό, φωτισμό και ζεστό νερό χρήσης με την κατά το δυνατόν ελάχιστη κατανάλωση (ανηγμένης) πρωτογενούς ενέργειας,
της  χρήσης  τεχνολογιών  ανανεώσιμων  πηγών  ενέργειας  (Α.Π.Ε.)  όπως,  ηλιοθερμικά συστήματα, φωτοβολταϊκά συστήματα, γεωθερμικές 
αντλίες θερμότητας (εδάφους, υπόγειων και επιφανειακών νερών) κ.ά. και της εφαρμογής διατάξεων αυτομάτου ελέγχου της λειτουργίας των 
ηλεκτρομηχανολογικών εγκαταστάσεων, για τον περιορισμό της άσκοπης χρήσης τους.";

$section->addText('ΕΙΣΑΓΩΓΗ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText($eisagwgi_teyxoys1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($eisagwgi_teyxoys2, array('name'=>'Arial', 'color'=>'black'));
$section->addText($eisagwgi_teyxoys3, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText('ΓΕΝΙΚΗ ΠΕΡΙΓΡΑΦΗ ΚΤΗΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addTextBreak(5);

$section->addText('ΓΕΝΙΚΑ ΣΤΟΙΧΕΙΑ ΚΤΙΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addTextBreak(5);

$section->addText('ΤΟΠΟΓΡΑΦΙΑ ΟΙΚΟΠΕΔΟΥ ΚΤΙΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addTextBreak(5);
$section->addPageBreak(1);


$tekmiriwsiarxsxed_teyxoys1 = "Σύμφωνα με το άρθρο 8 του Κ.Εν.Α.Κ. το κτίριο πρέπει να σχεδιασθεί λαμβάνοντας υπόψη :
την χωροθέτηση του κτιρίου και τον προσανατολισμό του στο οικόπεδο, την εσωτερική χωροθέτηση χώρων λόγω λειτουργιών του κτιρίου, 
την κατάλληλη χωροθέτηση των ανοιγμάτων για επαρκή ηλιασμό, φυσικό φωτισμό και φυσικό δροσισμό καθώς και την ηλιοπροστασία τους, 
την ενσωμάτωση τουλάχιστον  ενός παθητικού ηλιακού συστήματος, ενός εκ των οποίων δύναται να είναι το σύστημα του άμεσου κέρδους, 
διαμόρφωση του περιβάλλοντα χώρου για τη βελτίωση του μικροκλίματος.";
$tekmiriwsiarxsxed_teyxoys2 = "Αδυναμία εφαρμογής των ανωτέρω απαιτεί επαρκή τεκμηρίωση, σύμφωνα πάντα με το Κ.Εν.ΑΚ.";
$tekmiriwsiarxsxed_teyxoys3 = "Ακόμη, σύμφωνα με το άρθρο 11 του Κ.Εν.Α.Κ. τα περιεχόμενα της ενεργειακής μελέτης τα οποία
λαμβάνονται υπόψη και για τον ενεργειακό σχεδιασμό είναι τα ακόλουθα:";
$tekmiriwsiarxsxed_teyxoys31 = "1.   γεωμετρικά  χαρακτηριστικά  του  κτιρίου  και  των  ανοιγμάτων  (κάτοψη,  όγκος,  επιφάνεια, 
προσανατολισμός, συντελεστές σκίασης κ.α.),";
$tekmiriwsiarxsxed_teyxoys32 = "2.   τεκμηρίωση  της  χωροθέτησης  και  του  προσανατολισμού  του  κτιρίου  για  τη  μέγιστη αξιοποίηση  
των  τοπικών  κλιματικών  συνθηκών,  με  διαγράμματα  ηλιασμού  λαμβάνοντας υπόψη την περιβάλλουσα δόμηση,";
$tekmiriwsiarxsxed_teyxoys33 = "3.   τεκμηρίωση της επιλογής και χωροθέτησης της φύτευσης και άλλων στοιχείων βελτίωσης του μικροκλίματος,";
$tekmiriwsiarxsxed_teyxoys34 = "4.   τεκμηρίωση του σχεδιασμού και χωροθέτησης των ανοιγμάτων ανά προσανατολισμό ανάλογα με τις απαιτήσεις
 ηλιασμού, φωτισμού και αερισμού (ποσοστό, τύπος και εμβαδόν διαφανών επιφανειών ανά προσανατολισμό),";
$tekmiriwsiarxsxed_teyxoys35 = "5.   Χωροθέτηση των λειτουργιών ανάλογα με τη χρήση και τις απαιτήσεις άνεσης και ποιότητας εσωτερικού 
περιβάλλοντος (θερμικές, φυσικού αερισμού και φωτισμού),";
$tekmiriwsiarxsxed_teyxoys36 = "6.  περιγραφή λειτουργίας των παθητικών συστημάτων για τη χειμερινή και θερινή περίοδο: υπολογισμός επιφάνειας 
παθητικών ηλιακών συστημάτων άμεσου και έμμεσου κέρδους (κατακόρυφης / κεκλιμένης / οριζόντιας επιφάνειας),  για τα συστήματα με μέγιστη απόκλιση 
έως  30ο    από  το  νότο,  καθώς  και  του  ποσοστού  αυτής  επί  της  αντίστοιχης  συνολικήςεπιφάνειας της όψης,";
$tekmiriwsiarxsxed_teyxoys37 = "7.   περιγραφή των συστημάτων ηλιοπροστασίας του κτηρίου ανά προσανατολισμό: διαστάσεις και υλικά κατασκευής, 
τύπος (σταθερά / κινητά, οριζόντια / κατακόρυφα, συμπαγή / διάτρητα) και ένδειξη του προκύπτοντος ποσοστού σκίασης για την 21η Δεκεμβρίου 
(χειμερινό ηλιοστάσιο: μικρότερη διάρκεια ημέρας και χαμηλότερηθέση ήλιου) και την 21η  Ιουνίου, (θερινό ηλιοστάσιο: μεγαλύτερη διάρκεια ημέρας 
και υψηλότερη θέση  ήλιου).";
$tekmiriwsiarxsxed_teyxoys38 = "8.   γενική περιγραφή των τεχνικών εκμετάλλευσης του φυσικού φωτισμού.";
$tekmiriwsiarxsxed_teyxoys39 = "9.   σχεδιαστική απεικόνιση με κατασκευαστικές λεπτομέρειες της θερμομονωτικής στρώσης, 
των παθητικών συστημάτων και των συστημάτων ηλιοπροστασίας στα αρχιτεκτονικά σχέδια του κτιρίου (κατόψεις, όψεις, τομές).";

$section->addText('ΤΕΚΜΗΡΙΩΣΗ ΑΡΧΙΤΕΚΤΟΝΙΚΟΥ ΣΧΕΔΙΑΣΜΟΥ ΤΟΥ ΚΤΙΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText($tekmiriwsiarxsxed_teyxoys1, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys2, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys3, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys31, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys32, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys33, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys34, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys35, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys36, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys37, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys38, array('name'=>'Arial', 'color'=>'black'));
$section->addText($tekmiriwsiarxsxed_teyxoys39, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText('ΧΩΡΟΘΕΤΗΣΗ ΚΤΙΡΙΟΥ ΣΤΟ ΟΙΚΟΠΕΔΟ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addTextBreak(5);

$section->addText('ΧΩΡΟΘΕΤΗΣΗ ΛΕΙΤΟΥΡΓΙΩΝ ΣΤΟ ΚΤΙΡΙΟ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText("Ο εσωτερικός σχεδιασμός  και  οι διαμόρφωση  των χώρων στο κτίριο, έγιναν με γνώμονα τη μέγιστη 
εκμετάλλευση ή την αποφυγή της ηλιακής ακτινοβολίας ανάλογα με την εποχή. Οι κύριοι χώροι θα τοποθετηθούν στο νότιο 
προσανατολισμό, ενώ στον ανατολικό θα τοποθετηθούν οι κουζίνες ούτως ώστε κατά τους χειμερινούς μήνες να γίνει δυνατή 
η αξιοποίηση της ηλιακής ακτινοβολίας τις πρωινές ώρες, ενώ κατά τους θερινούς μήνες να είναι ευχάριστη η χρήση των 
χώρων προτού η εξωτερική θερμοκρασία να ανέβει αισθητά. Τα δωμάτια θα τοποθετηθούν στους δυτικούς προσανατολισμούς 
ούτως ώστε να είναι δυνατή η χρήση του φυσικού δροσισμού ακόμη και 
κατά τις πρώτες πρωινές ώρες κατά τη θερινή περίοδο.", array('name'=>'Arial', 'color'=>'black'));

$section->addText('ΗΛΙΟΠΡΟΣΤΑΣΙΑ ΑΝΟΙΓΜΑΤΩΝ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText("Ως μέσο ηλιοπροστασίας των ανοιγμάτων επιλέχθηκαν οι τέντες. Σε συνδυασμό με την κινητή ηλιοπροστασία, 
η οποία όμως δεν λαμβάνεται υπόψη κατά τους υπολογισμούς της ενεργειακής κατανάλωσης του κτιρίου, εκτιμάται ότι 
προσφέρουν επαρκή προστασία. ", array('name'=>'Arial', 'color'=>'black'));

$section->addText('ΦΥΣΙΚΟΣ ΦΩΤΙΣΜΟΣ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText("Σε όλους τους κύριους χώρους των διαμερισμάτων θα τοποθετηθούν ανοίγματα τα οποία θα προσφέρουν 
επαρκή φυσικό φωτισμό. ", array('name'=>'Arial', 'color'=>'black'));

$section->addText('ΦΥΣΙΚΟΣ ΔΡΟΣΙΣΜΟΣ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText("Εκτιμάται ότι τα ανοίγματα τα οποία προβλέπονται, θα προσφέρουν 
επαρκή φυσικό δροσισμό.", array('name'=>'Arial', 'color'=>'black'));

$section->addText('ΠΑΘΗΤΙΚΑ ΗΛΙΑΚΑ ΣΥΣΤΗΜΑΤΑ ΚΤΗΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
$section->addText("Το παθητικό σύστημα που επιλέχθηκε να ενσωματωθεί στο σχεδιασμό του κτιρίου είναι 
αυτό του άμεσου  κέρδους.  Όπως φαίνεται και  στα σχέδια σκιασμού των ανοιγμάτων, κατά τη διάρκεια του χειμώνα 
υπάρχει επαρκής ηλιασμός ενώ κατά την περίοδο του θέρους η άμεση ηλιακή ακτινοβολία μειώνεται στο ελάχιστο. 
Η επαρκής  ποσότητα ανοιγμάτων στη νότια όψη συνδυάζεται με βαριά υλικά υψηλής θερμοχωρητικότητας και  με 
ισχυρή θερμομόνωση, ούτως ώστε το κτίριο να μπορεί να λειτουργήσει ως συλλέκτης, 
αποθήκη και παγίδα ηλιακής ενέργειας.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText('ΔΙΑΜΟΡΦΩΣΗ ΤΟΥ ΠΕΡΙΒΑΛΛΟΝΤΑ ΧΩΡΟΥ ΓΙΑ ΤΗ ΒΕΛΤΙΩΣΗ ΤΟΥ ΜΙΚΡΟΚΛΙΜΑΤΟΣ', array('name'=>'Arial', 'color'=>'red', 'size'=>'16'));
$section->addText("Λόγω της θέσης του οικοπέδου , θα γίνει φύτευση χαμηλών δένδρων. 
Επί πλέον, θα επιλεγούν και χαμηλές πόες και χαμηλά φυτά με μικρές απαιτήσεις σε νερό, οι οποίες θα λειτουργήσουν 
βελτιωτικά στο μικροκλίμα της περιοχής", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText('ΕΛΕΓΧΟΣ ΘΕΡΜΟΜΟΝΩΤΙΚΗΣ ΕΠΑΡΚΕΙΑΣ ΔΟΜΙΚΩΝ ΣΤΟΙΧΕΙΩΝ ΚΑΙ ΚΤΗΡΙΟΥ', array('name'=>'Arial', 'color'=>'red', 'size'=>'18'));
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
$section->addText("1.   Υπολογίζεται ο συντελεστής θερμοπερατότητας U όλων των δομικών στοιχείων και ελέγχεται 
η συμμόρφωση του στα όρια των απαιτήσεων του πίνακα 4.1.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("2.   Υπολογίζεται  ο  μέσος  συντελεστής  θερμοπερατότητας  του  κτηρίου  Um  και  ελέγχεται  
η συμμόρφωση του στα όρια των απαιτήσεων του πίνακα 4.2.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("1) Έλεγχος θερμομονωτικής επάρκειας δομικού στοιχείου", array('name'=>'Arial', 'color'=>'black', 'size'=>'14'));
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


$section->addText("Γενικά στοιχεία κτηριακού κελύφους.", array('name'=>'Arial', 'color'=>'red', 'size'=>'16'));
$section->addText("Το κτίριο ανήκει στην " . $zwni . " κλιματική ζώνη.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Κάθε δομικό στοιχείο πρέπει να έχει συντελεστή θερμοπερατότητας μικρότερο από αυτούς που δίνονται 
στον πίνακα 4.1 για την " . $zwni . " κλιματική ζώνη.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η είσοδος των κατοικιών και τα κλιμακοστάσια θεωρούνται θερμαινόμενοι χώροι, 
οπότε οφείλουν να είναι θερμομονωμένοι. Σε κάτοψη δίδεται σε τομή το ισόγειο ως ο 
θερμαινόμενος χώρος του κτιρίου. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Ο φέρων οργανισμός του κτιρίου φέρει θερμομόνωση εξωτερικά, ενώ οι 
τοιχοποιίες πλήρωσης έχουν  θερμομόνωση  στον  πυρήνα.  Το δάπεδο του ισογείου, θα 
θερμομονωθεί στην κάτω παρειά του.Η συλλογή των γεωμετρικών δεδομένων και οι υπολογισμοί 
των θερμικών χαρακτηριστικών των επιφανειών του κτιρίου γίνεται έχοντας 
υπόψη τα εξής:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("1. για  τον υπολογισμό της ενεργειακής κατανάλωσης και  
κατ’ επέκταση της ενεργειακής απόδοσης του κτιρίου είναι απαραίτητα όχι μόνο τα 
θερμικά και γεωμετρικά χαρακτηριστικά των θερμαινόμενων χώρων, αλλά και αυτά των μη 
θερμαινόμενων που είναι σε επαφή με τους θερμαινόμενους,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("2. τα δομικά στοιχεία του κτιρίου που γειτνιάζουν με αλλά 
θερμαινόμενα κτίρια, κατά τον έλεγχο θερμικής επάρκειας του κτηρίου θεωρείται 
ότι έρχονται σε επαφή με το εξωτερικό περιβάλλον (ως να μην υπάρχουν τα γειτονικά 
κτήρια), ενώ  για  τον υπολογισμό  της  ενεργειακής απόδοσης 
θεωρούνται αδιαβατικά,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("3. τα δομικά στοιχεία θερμικής ζώνης του κτιρίου που γειτνιάζουν 
με άλλη θερμική ζώνη του ίδιου κτιρίου θεωρούνται αδιαβατικά,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("4. οι αδιαφανείς και οι διαφανείς επιφάνειες έχουν ηλιακά κέρδη τα οποία 
εξαρτώνται από τον προσανατολισμό και τον σκιασμό τους,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("5. σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 20701-1/2010 για λόγους απλοποίησης, 
για τον υπολογισμό της ενεργειακής απόδοσης κτιρίων, για κατακόρυφα δομικά 
αδιαφανή στοιχεία με συντελεστή θερμοπερατότητας  μικρότερο  από  0,60  W/(m2.K),
 ο συντελεστής σκίασης δύναται ναθεωρηθεί ίσος με 0,9.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);
 
 
$section->addText("ΕΛΕΓΧΟΣ ΘΕΡΜΟΜΟΝΩΤΙΚΗΣ ΕΠΑΡΚΕΙΑΣ ΑΔΙΑΦΑΝΩΝ ΔΟΜΙΚΩΝ ΣΤΟΙΧΕΙΩΝ ΚΤΙΡΙΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
 $section->addText("Στον παρακάτω πίνακα δίνονται συνοπτικά οι συντελεστές θερμοπερατότητας των δομικών στοιχείων των θερμαινόμενων και των 
 μη θερμαινόμενων χώρων του κτιρίου, οι οποίοι πληρούν τις ελάχιστες απαιτήσεις του Κ.ΕΝ.Α.Κ.. Στο Τεύχος Υπολογισμών που συνοδεύει 
 την παρούσα μελέτη δίνονται αναλυτικά οι υπολογισμοί των συντελεστών θερμοπερατότητας ενώ στους πίνακες των δομικών στοιχείων 
 δίνονται οι συντελεστές αυτοί.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Πίνακας - Συντελεστής θερμοπερατότητας των δομικών στοιχείων των θερμαινόμενων και των μη θερμαινόμενων 
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

$section->addText("Πίνακας - Ισοδύναμοι συντελεστές θερμοπερατότητας των δομικών στοιχείων σε επαφή με το έδαφος  των θερμαινόμενων 
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


$section->addText("ΕΛΕΓΧΟΣ ΘΕΡΜΟΜΟΝΩΤΙΚΗΣ ΕΠΑΡΚΕΙΑΣ ΔΙΑΦΑΝΩΝ ΔΟΜΙΚΩΝ ΣΤΟΙΧΕΙΩΝ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Ο όροφος του κτιρίου θα λειτουργήσει ως τμήμα από τη " . $xrisi_znx_iliakos . ". Σύμφωνα με τον Κ.Εν.Α.Κ., τα κουφώματα που θα 
τοποθετηθούν οφείλουν να έχουν συντελεστή θερμοπερατότητας U≤" . $domika418 . " W/(m2K).", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Για τα κουφώματα τού ισογείου επιλέχθηκε η χρήση πλαισίου αλουμινίου  χωρίς θερμοδιακοπή, με μέσο συντελεστή 
θερμοπερατότητας  U = 2,8 W/(m2K)  όπως  προκύπτει  από  τον σχετικό αναλυτικό υπολογισμό  με μέσου πλάτους πλαισίου 12,5cm. Θα 
φέρουν υαλοπίνακα με πάχη 4-12-4 χωρίς επίστρωση χαμηλής εκπομπής και αέρα στο διάκενο. Ο συντελεστής θερμοπερατότητας του 
υαλοπίνακα που θα χρησιμοποιηθεί θα είναι μέσου Ug=2,80W/(m2K) όπως προκύπτει από τον σχετικό πίνακα υλικών της ΤΟΤΕΕ. 
Ο υπολογισμός του U των κουφωμάτων έγινε βάσει της σχέσης 4.2 και της Τ.Ο.Τ.Ε.Ε. 20701-2/2010. Οι υπολογισμοί αυτοί δίνονται 
αναλυτικά στο Τεύχος Υπολογισμών που συνοδεύει την παρούσα μελέτη. Στον σχετικό πίνακα  δίνονται αναλυτικά οι συντελεστές θερμοπερατότητας 
των κουφωμάτων του ισογείου . Όπως φαίνεται στους πίνακες, οι τιμές θερμοπερατότητας των κουφωμάτων καλύπτουν 
τις ελάχιστες απαιτήσεις.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Κατασκευαστικές Λύσεις Που Υιοθετήθηκαν Για Τη Μείωση Των Θερμικών 
Απωλειών Λόγω Θερμογεφυρών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText(" Η τοποθέτηση των κουφωμάτων είναι κεντρική-ισομερής. Για την μείωση των απωλειών από τις θερμογέφυρες 
που δημιουργούνται στους λαμπάδες, το ανωκάσι και το κατωκάσι, υπάρχει συνέχεια της θερμομόνωσης (πάχους 2cm) κάθετα στους 
λαμπάδες, το ανωκάσι και το κατωκάσι των κουφωμάτων του ισογείου.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);



$section->addText("ΤΕΚΜΗΡΙΩΣΗ ΕΛΑΧΙΣΤΩΝ ΠΡΟΔΙΑΓΡΑΦΩΝ ΚΑΙ ΣΧΕΔΙΑΣΜΟΥ ΤΩΝ ΗΛΕΚΤΡΟΜΗΧΑΝΟΛΟΓΙΚΩΝ ΣΥΣΤΗΜΑΤΩΝ ΤΟΥ ΚΤΙΡΙΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
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
Για επιφάνεια μεγαλύτερη από 15m2   ο τεχνητός φωτισμός ελέγχεται με χωριστούς διακόπτες. Στους χώρους με φυσικό φωτισμό εξασφαλίζεται 
η δυνατότητα σβέσης τουλάχιστον του 50% των λαμπτήρων που βρίσκονται εντός αυτών.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε κτίρια με πολλές ιδιοκτησίες και κεντρικά συστήματα, επιβάλλεται αυτονομία θέρμανσης, ψύξης, καθώς και ΖΝΧ 
(όπου εφαρμόζεται κεντρική παραγωγή/διανομή) και εφαρμόζεται κατανομή δαπανών με θερμιδομέτρηση.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε  όλα  τα  κτίρια  απαιτείται  θερμοστατικός  έλεγχος  της  θερμοκρασίας  εσωτερικού  χώρου τουλάχιστον ανά 
ελεγχόμενη θερμική ζώνη κτιρίου.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σε όλα τα κτίρια του τριτογενή τομέα επιβάλλεται η εγκατάσταση κατάλληλου εξοπλισμού αντιστάθμισης της άεργης ισχύος των ηλεκτρικών 
τους καταναλώσεων, για την αύξηση του συντελεστή ισχύος τους (συνφ) σε επίπεδο κατ’ ελάχιστο 0,95.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Αδυναμία εφαρμογής των ανωτέρω απαιτεί επαρκή τεχνική τεκμηρίωση σύμφωνα με την 
ισχύουσα νομοθεσία.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Τα υπό μελέτη κτίρια που έχουν δύο επιμέρους κύριες χρήσεις, τις κατοικίες και τα εμπορικά καταστήματα, 
εξετάζονται ανεξάρτητα σε ότι αφορά την ενεργειακή τους κατάταξη. Για τον λόγο αυτό οι πιο πάνω περιορισμοί δεν ισχύουν 
για το σύνολο του κτηρίου αλλά διαφοροποιούνται για κάθε μία από τις παραπάνω χρήσεις.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("ΣΧΕΔΙΑΣΜΟΣ ΣΥΣΤΗΜΑΤΩΝ ΘΕΡΜΑΝΣΗΣ, ΨΥΞΗΣ, ΑΕΡΙΣΜΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Η θέρμανση των εσωτερικών χώρων του κτιρίου, σύμφωνα με την μελέτη θέρμανσης (διαστασιολόγησης συστήματος), 
θα γίνεται μέσω κεντρικής μονάδας θέρμανσης, με λέβητα-καυστήρα πετρελαίου,   με   μονοσωλήνιο   σύστημα   και   αυτονομία. 
Το σύστημα θέρμανσης θα καλύπτει όλους  τους χώρους  στο ισόγειο. Οι αποθήκες  στο  υπόγειο του κτηρίου, είναι μη θερμαινόμενοι 
χώροι.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η ψύξη των χώρων του κτιρίου θα γίνεται με τοπικές αντλίες θερμότητας πού θα εγκατασταθούν 
σε μεμονωμένους χώρους του ισογείου με δυνατότητα κάλυψης του 50% του μέγιστου απαιτούμενου ψυκτικού φορτίου 
για το κτίριο.", array('name'=>'Arial', 'color'=>'black'));


$section->addText("Ελάχιστες Προδιαγραφές Συστήματος Θέρμανσης Χώρων", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText("Σύμφωνα με την μελέτη θέρμανσης του κτιρίου, το μέγιστο απαιτούμενο θερμικό φορτίο για την θέρμανση του συγκεκριμένου 
χώρου ανέρχεται στις ________________ kcal/h. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Για τον υπολογισμό της ισχύος του λέβητα- καυστήρα λαμβάνεται συντελεστής προσαύξησης 30%, λόγω θερμικών απωλειών στο 
λέβητα, στο δίκτυο διανομής, αλλά και για την επιτάχυνση της έναρξης λειτουργίας", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η θερμική ισχύς της μονάδας λέβητα-καυστήρα θα είναι ________________ kcal/h ή ___________________ kW και 
θα λειτουργεί με πετρέλαιο. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύμφωνα με τον Κ.Εν.Α.Κ. για την κατηγορία ενεργειακής απόδοσης των λεβήτων του κτηρίου αναφοράς, 
το Π.Δ. 335/1993 και την τροποποίηση αυτού με το ΠΔ 32/2010, η μονάδα θα έχει βαθμό θερμικής απόδοσης  92,0% και ο καυστήρας θα 
είναι μονοβάθμιος δικαιολογούμενος από την μικρή ισχύ του συστήματος.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η θερμοκρασία λειτουργίας της εγκατάστασης θέρμανσης θα είναι 85οC για την προσαγωγή και
70oC για την επιστροφή. Η διανομή στα διαμερίσματα θα γίνεται με μονοσωλήνιο σύστημα, με ένα ζεύγος κεντρικών κατακόρυφων στηλών 
προσαγωγής-επιστροφής θερμού νερού. Οι κατακόρυφες σωλήνες προσαγωγής θα τροφοδοτούνται μέσω ενός κοινού κεντρικού συλλέκτη (κολλεκτέρ), 
όπως και οι κατακόρυφες σωλήνες επιστροφής θερμού νερού. Για κάθε τελικό χρήστη, διαμέρισμα ή κατάστημα, θα υπάρχουν δύο ξεχωριστοί 
συλλέκτες (κολλεκτέρ) διανομής (προσαγωγή και επιστροφή), από τους οποίους θα αναχωρούν και στους οποίους θα επιστρέφουν όλα τα 
οριζόντια κυκλώματα θερμού νερού προς και από τα θερμαντικά σώματα των επιμέρους χώρων κάθε ιδιοκτησίας. Σε κάθε ζεύγος 
συλλεκτών (κολλεκτέρ) διανομής ιδιοκτησίας, τοποθετείται (σε κοινόχρηστο χώρο) σύστημα θερμιδομέτρησης.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Όλες οι σωληνώσεις του δικτύου διανομής που διέρχονται από μη θερμαινόμενους χώρους θα είναι μονωμένες 
και σύμφωνα με τις ελάχιστες προδιαγραφές που ορίζει ο Κ.Εν.Α.Κ. και η Τ.Ο.Τ.Ε.Ε. 20701-1/2010 (πίνακας 4.7). 
Για τις κατακόρυφες στήλες Φ35, το πάχος της μόνωσης σύμφωνα με τους κανονισμούς πρέπει να είναι 13mm, ενώ 
για τους βρόχους οριζόντιας τοπικής διανομής Φ16, το πάχος της μόνωσης πρέπει να είναι 9mm. Οι σωληνώσεις διανομής, 
από τους τοπικούς συλλέκτες μέχρι τις τερματικές μονάδες (εκπομπής θερμότητας) των διαμερισμάτων ή των καταστημάτων, 
διέρχονται σχεδόν εξ’ ολοκλήρου από εσωτερικούς θερμαινόμενους χώρους, όπου δεν απαιτείται θερμομόνωση των σωληνώσεων. 
Οι κατακόρυφες κεντρικές στήλες του δικτύου διανομής θα θερμομονωθούν στο σύνολό τους.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Λόγω του ότι υπάρχει μία ιδιοκτησία (διαμέρισμα) στο κτίριο, βάσει του Κ.Εν.Α.Κ., δεν απαιτείται η 
κατανομή δαπανών ανά χώρο (ιδιοκτησία) και για το λόγο αυτό η εφαρμοζόμενη θέρμανση σύμφωνα με τα προαναφερόμενα, δεν 
θεωρείται αυτόνομη με την καθαρή έννοια της αυτονομίας. Η εγκατάσταση θέρμανσης θα διαθέτει σύστημα αντιστάθμισης, 
για την κάλυψη των μερικών  φορτίων  θέρμανσης,  με  την  χρήση  τετράοδης  βάνας  αυτόματης  ρύθμισης  κυκλοφορίας 
νερού. Ο κυκλοφορητής της διανομής θερμού νερού θέρμανσης θα έχει ονομαστική ηλεκτρική ισχύ 0,3 kW και θα 
είναι σταθερού αριθμού στροφών και παροχής για σταθερό μανομετρικό.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Παρατήρηση: Για κάθε ιδιοκτησία, οι επιμέρους κλάδοι διανομής θερμικής ενέργειας από το κολλεκτέρ 
προς τα σώματα καλοριφέρ, θα πρέπει να σχεδιάζονται ώστε να καλύπτουν χώρους με ίδιες λειτουργικές ιδιαιτερότητες 
όπως: ίδια χρήση και ωράριο λειτουργίας (υπνοδωμάτια, κοινόχρηστοι χώροι, κ.ά.), ίδια εσωτερικά φορτία (συσκευές, 
ηλιακά κέρδη λόγω κοινού προσανατολισμού), κ.α. Με το σχεδιασμό αυτόν μπορεί να εφαρμοστεί και ξεχωριστός θερμοστατικός 
έλεγχος στους επιμέρους αυτούς χώρους κάθε ιδιοκτησίας (π.χ. διαμέρισμα), με παράλληλη ρύθμιση τροφοδοσίας κάθε 
κλάδου ξεχωριστά (μέσω αυτόματης ηλεκτροβάνας στο επίπεδο του κολλεκτέρ), ανάλογα τις απαιτήσεις 
σε θερμική ενέργεια των χώρων αυτών.", array('name'=>'Arial', 'color'=>'black', 'bold'=>'true'));
$section->addPageBreak(1);

$section->addText("Ελάχιστες Προδιαγραφές Συστήματος Ψύξης Χώρων", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Δεν απαιτείται μελέτη ψύξης-κλιματισμού λόγω του μικρού όγκου του κτιρίου αλλά και του γεγονότος 
ότι η χρήση του είναι " . $xrisi_znx_iliakos, array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι προδιαγραφές του συστήματος ψύξης είναι αυτές πού αναφέρονται στο κτίριο αναφοράς.
Έτσι, θα εγκατασταθούν τοπικές αντλίες θερμότητας διαιρούμενου τύπου και, ενδεικτικά, μία στο καθιστικό και μία στους 
διαδρόμους πριν τα υπνοδωμάτια για ήπια ψύξη των υπνοδωματίων. Οι μονάδες θα έχουν βαθμό ενεργειακής απόδοσης EER=3,0. 
Στη συγκεκριμένη χρήση του κτιρίου,  η χρήση  μονάδων ψύξης, παρατηρείται κυρίως 
τις μεσημεριανές ώρες, κατά τις ημέρες με θερμοκρασίες πάνω από 30οC. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η πιθανότητα εμφάνισης θερμοκρασιών πάνω 30οC, είναι περίπου 22%, σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 
20701-3/2010 (Κλιματικά Δεδομένα Ελληνικών Περιοχών). Τις βραδινές ώρες, η χρήση των τοπικών μονάδων ψύξης είναι 
περιορισμένη, εκτός τις ημέρες που η εξωτερική θερμοκρασία υπερβαίνει τους 37οC) (κατάσταση καύσωνα).
", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η συνολική ψυκτική ικανότητα (ισχύς) των αντλιών θερμότητας για τη χρήση αυτή εκτιμάται σε _____________ Btu/h 
(_______________ kW) με δυνατότητα κάλυψης 50% ψυκτικού φορτίου σε συνθήκες σχεδιασμού. ", array('name'=>'Arial', 'color'=>'black'));


$section->addText("Ελάχιστες Προδιαγραφές Συστήματος Αερισμού Χώρων", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Οι απαιτήσεις ελάχιστου αερισμού του κτιρίου όσον αφορά τα διαμερίσματα, καλύπτονται μέσω φυσικού αερισμού 
και σύμφωνα με τα οριζόμενα στην Τ.Ο.Τ.Ε.Ε. 20701-1/2010 (παρ. 2.4.3, πίνακας 2.3). Η απαίτηση για νωπό αέρα των κατοικιών 
ορίζεται στα " . $syntelestis_znx_iliakos . " m3/h/m2  επιφάνειας δαπέδου.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText("ΣΧΕΔΙΑΣΜΟΣ ΣΥΣΤΗΜΑΤΟΣ ΠΑΡΑΓΩΓΗΣ ΖΕΣΤΟΥ ΝΕΡΟΥ ΧΡΗΣΗΣ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Σύμφωνα με τη μελέτη διαστασιολόγησης του συστήματος ζεστού νερού χρήσης (ΖΝΧ), η κατανάλωση ΖΝΧ για " . $xrisi_znx_iliakos .  
" όπως ορίζεται στην παράγραφο 2.5 (πίνακας 2.5) της Τ.Ο.Τ.Ε.Ε. 20701-1/2010,  είναι " . $syntelestis_znx_iliakos . " m3/h/m2 
θερμαινόμενης επιφάνειας των κατοικιών. Αντίστοιχα για τις περιπτώσεις καταστημάτων, η κατανάλωση ΖΝΧ ανέρχεται στα 0,14 lt/ημέρα/m2 
θερμαινόμενης επιφάνειας των καταστημάτων. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Έτσι, στην περίπτωσή μας, η συνολική ημερήσια κατανάλωση για ΖΝΧ στο κτήριο ανέρχεται περίπου στα " . $vd_iliakoy . 
"lt/ημέρα πού αντιστοιχούν στην  κατανάλωση τής χρήσης του κτιρίου. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η μέση θερμοκρασία ζεστού νερού χρήσης ορίζεται στους 50οC, ενώ οι μέσες θερμοκρασίες νερού δικτύου ύδρευσης 
πόλης για την κοντινότερη πόλη, όπως ορίζονται στην Τ.Ο.Τ.Ε.Ε. 20701-3/2010 «Κλιματικά δεδομένα ελληνικών Περιοχών», 
δίνονται στον πίνακα του τεύχους υπολογισμών.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Το ημερήσιο απαιτούμενο θερμικό φορτίο Qd    σε (kWh/day) για την κάλυψη των αναγκών του
κτηρίου σε Ζ.Ν.Χ. δίνεται από την ακόλουθη σχέση :", array('name'=>'Arial', 'color'=>'black'));
$section->addImage('images/word-images/qd.jpg');
$section->addText(",όπου", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Vd [lt /ημέρα] το ημερήσιο φορτίο, Vd  =" . $vd_iliakoy . "lt/ημέρα", array('name'=>'Arial', 'color'=>'black'));
$section->addText("ρc [kg/lt] η μέση πυκνότητα του ζεστού νερού χρήση, ρ = 0,998", array('name'=>'Arial', 'color'=>'black'));
$section->addText("c [kJ/(kg.K)] η ειδική θερμότητα του νερού,  c = 4,18", array('name'=>'Arial', 'color'=>'black'));
$section->addText("ΔΤ [Κ] ή [°C] η θερμοκρασιακή διαφορά μεταξύ νερού δικτύου και ζεστού νερού χρήσης. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Κατά τη διαστασιολόγηση του συστήματος ΖΝΧ εφαρμόστηκε η παραπάνω σχέση για τον υπολογισμό του
μέσου ημερήσιου θερμικού φορτίου (kWh/ημέρα) για ΖΝΧ του κτηρίου για κάθε μήνα, όπως δίνεται", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Ελάχιστες προδιαγραφές συστήματος για την παραγωγή ΖΝΧ", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Σύμφωνα με τη μελέτη διαστασιολόγησης του συστήματος ΖΝΧ, για την κάλυψη των αναγκών για ζεστό νερό χρήση, 
θα εγκατασταθούν ένας κεντρικός θερμαντήρας (δεξαμενή αποθήκευσης) τριπλής ενέργειας, που θα λαμβάνει θερμική ενέργεια από την 
μονάδα λέβητα-καυστήρα πετρελαίου μέσω ανεξάρτητου δικτύου ελεγχόμενου από θερμοστάτη και ηλεκτροβάννα και από συστοιχία ηλιακών 
συλλεκτών στο δώμα, όπως περιγράφεται στην επόμενη παράγραφο. Ο θερμαντήρας θα έχει και εφεδρική ηλεκτρική αντίσταση.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Παρατήρηση: Η χρήση ξεχωριστής μονάδας λέβητα-καυστήρα για την παραγωγή Ζ.Ν.Χ. είναι αναγκαία όταν η μονάδα λέβητα-καυστήρα 
για την θέρμανση χώρων καταναλώνει πετρέλαιο  θέρμανσης. Για  την  καλή διαχείριση  ενέργειας, συνίσταται η χρήση ξεχωριστού λέβητα (μικρότερης 
θερμικής ισχύς) και σε περίπτωση κατανάλωσης άλλου τύπου καυσίμου, καθώς θα λειτουργεί και την θερινή περίοδο, εκτός αν υπάρχει πολυβάθμιο 
σύστημα με την πρώτη βαθμίδα θα αποδίδει θερμική ισχύ ίση με την απαιτούμενη για παραγωγή Ζ.Ν.Χ.", array('name'=>'Arial', 'color'=>'black', 'bold'=>'true'));
$section->addText("Η  συνολική  χωρητικότητα  τού  θερμαντήρα  (δεξαμενή  αποθήκευσης)  Vstore, εκτιμήθηκε από την ακόλουθη εμπειρική σχέση και 
θα πρέπει να είναι:", array('name'=>'Arial', 'color'=>'black'));
$Vstore = $vd_iliakoy/5;
$section->addText("Vstore = Vd/5=" . $Vstore . " lt", array('name'=>'Arial', 'color'=>'black'));
$eklogi_thermantira = round(($Vstore + 50),-1);
$section->addText("Εκλέγεται θερμαντήρας " . $eklogi_thermantira . "lt", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η λειτουργία θα ελέγχεται από διαφορικούς θερμοστάτες ηλιακών-Δ/Ξ αποθήκευσης, αλλά και χρονοδιακόπτη-ηλεκτροβάννα 
(παροχής θερμικής ενέργειας από το λέβητα). Σε περίπτωση δυνατότητας πλήρης κάλυψης των φορτίων ΖΝΧ από την διαθέσιμη ηλιακή ενέργεια, 
θα πρέπει η παροχή θερμικής ενέργειας από τον λέβητα να διακόπτεται.", array('name'=>'Arial', 'color'=>'black'));
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
$section->addText("Ο λέβητας-καυστήρας που επιλέχθηκε είναι αυτός με τον λέβητα θέρμανσης, λόγω της μικρής ισχύος του προκύπτοντα για τα ΖΝΧ, θα είναι 
δηλαδή μίας βαθμίδας, πετρελαίου και θα έχει βαθμό θερμικής απόδοσης 93,2%, περίπου ίδιο με την απόδοση του κτιρίου αναφοράς όπως ορίζεται στον πίνακα 
4.1 της Τ.Ο.Τ.Ε.Ε. 20701-1/2010.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι σωληνώσεις του δικτύου διανομής ΖΝΧ θα είναι θερμομονωμένες σύμφωνα με τις απαιτήσεις του άρθρου 8 του Κ.ΕΝ.Α.Κ. και τα οριζόμενα 
στην σχετική Τ.Ο.Τ.Ε.Ε. 20701-1/2010 (πίνακας 4.7). Το δίκτυο διανομής ΖΝΧ θα διέρχεται μέσα από τους εσωτερικούς χώρους του κτιρίου και το πάχος θερμομόνωσης 
των σωληνώσεων θα είναι ίσο με το ελάχιστο πάχος 9mm σύμφωνα με τους κανονισμούς. Συγκεκριμένα, επιλέχθηκε εύκαμπτη ελαστομερής θερμομόνωση 
κογχυλίων 9mm.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);

$section->addText("Τεκμηρίωση Εγκατάστασης Ηλιακών Συλλεκτών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText("επιλέγεται οι ηλιακοί συλλέκτες να τοποθετηθούν στο δώμα του κτιρίου και προς την Νότια πλευρά αυτού, 
εξασφαλίζοντας μηδενική στην ουσία σκίαση και επαρκή κλίση. Ο Θερμαντήρας, τοποθετείται πάνω από τους συλλέκτες, στο δώμα του κτιρίου.
Τα παραπάνω φαίνονται σε σκίτσο, πού επισυνάπτεται.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Για τον υπολογισμό του φορτίου κάλυψης των ηλιακών συλλεκτών στην παρούσα μελέτη, εφαρμόστηκε η μέθοδος 
υπολογισμού του μέσου μηνιαίου θερμικού οφέλους, με βάση την προσπίπτουσα ηλιακή ακτινοβολία, τον προσανατολισμό των ηλιακών συλλεκτών 
προς τον Νότο και την κλίση αυτών ως προς τον ορίζοντα σε 30 μοίρες.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι τιμές της μέσης μηνιαίας προσπίπτουσας ηλιακής ακτινοβολίας, του μέσου συντελεστή απολαβής θερμότητας και της μέσης 
μηνιαίας θερμοκρασίας ημέρας, ανακτήθηκαν από τους σχετικούς πίνακες της ΤΟΤΕΕ. . Η μέθοδος αυτή, δίνει περίπου τα ίδια αποτελέσματα για την 
κάλυψη του φορτίου ζεστού νερού χρήσης, με την αναλυτική μέθοδο υπολογισμού όπως δίνεται από το ευρωπαϊκό πρότυπο ΕΛΟΤ ΕΝ ISO 12976.2:2006, 
και για τις ανάγκες της παρούσας μελέτης είναι επαρκής.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Παρατήρηση: Σύμφωνα με την Τ.Ο.Τ.Ε.Ε. 20701-1/2010 (παράγραφος 5.3.1) κατά την διαστασιολόγηση (σχεδιασμού) του 
συστήματος ηλιακών συλλεκτών μπορούν να χρησιμοποιηθούν  διάφορες  μεθοδολογίες  όπως, η ωριαία προσομοίωση λειτουργίας του συστήματος, 
οι μέθοδοι που αναφέρονται στο πρότυπο ΕΛΟΤ ΕΝ 15316.4-3:2008, η μέθοδος καμπυλών f των S. klein, W.A. Beckman και J.A Duffie που
 αναπτύχθηκε στο πανεπιστήμιο του Winscosin και οποιαδήποτε άλλη αναγνωρισμένη αναλυτική ή μη μέθοδος εφαρμόζεται μέχρι σήμερα.
 Στην μελέτη διαστασιολόγησης του συστήματος ηλιακών συλλεκτών, η οποία δεν αποτελεί μέρος της παρούσας μελέτης, πρέπει να αναφέρεται
 η μέθοδος και τα δεδομένα που χρησιμοποιήθηκαν αναλυτικά, ενώ στην παρούσα μελέτη είναι υποχρεωτική η αναφορά των
αποτελεσμάτων για την τεκμηρίωση του ποσοστού κάλυψης του φορτίου Ζ.Ν.Χ ", array('name'=>'Arial', 'color'=>'black', 'bold'=>'true'));
$section->addText("Σύμφωνα με τη μελέτη διαστασιολόγησης των ηλιακών συλλεκτών, για το συγκεκριμένο κτίριο, μελετήθηκε η εφαρμογή 
επίπεδων ηλιακών συλλεκτών στην κεραμοσκεπή του κτιρίου, προκειμένου για την κάλυψη τουλάχιστον του 60% του απαιτούμενου φορτίου για 
ζεστό νερό χρήσης. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Οι ηλιακοί συλλέκτες που επελέγησαν θα έχουν εξωτερικές διαστάσεις ________________", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η βέλτιστη γωνία κλίσης ηλιακών συλλεκτών, εξαρτάται από το γεωγραφικό πλάτος της περιοχής και τον προσανατολισμό τοποθέτησης 
τους. Σύμφωνα με τον εμπειρικό κανόνα, για τις ελληνικές περιοχές, η βέλτιστη κλίση ενός ηλιακού συλλέκτη για ετήσια χρήση είναι περίπου 
ίση με το γεωγραφικό πλάτος της περιοχής, όπου για την Αργολίδα είναι 36,0ο. Στο υπό μελέτη κτίριο ο προσανατολισμός των ηλιακών συλλεκτών 
θα είναι νότιος και η γωνία εγκατάστασης τους θα είναι _______ο. Έγιναν υπολογισμοί από τους πίνακες ΤΟΤΕΕ για επιμέρους γωνίες κλίσεως των ηλιακών 
συλλεκτών, για " . $array_akt[0][2] . " μοίρες", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Χρησιμοποιείται απλός ηλιακός συλλέκτης, και από τον πίνακα 5.8 της ΤΟΤΕΕ 1/2010, σελ. 133, λαμβάνεται συντελεστής 
αξιοποίησης ηλιακής ακτινοβολίας για χρήση σε κατοικίες, αυτός των 33%. Επίσης, ως ποσοστό απωλειών , για σύστημα χωρίς ανακυκλοφορία και 
με μόνωση του κτιρίου αναφοράς, για ημερήσια ζήτηση 200-1000 lt, λαμβάνουμε αυτό του 7,7%.", array('name'=>'Arial', 'color'=>'black'));
$pososto_iliaka1 = $pososto_iliaka*100;
$section->addText("Σύμφωνα με τα αποτελέσματα των υπολογισμών, το μέσο ετήσιο ποσοστό κάλυψης του φορτίου για ζεστό νερό χρήσης ανέρχεται 
σε περίπου " . $pososto_iliaka1 . " %.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Η μεγαλύτερη κάλυψη παρουσιάζεται τούς μήνες Ιούλιο και Αύγουστο για την βέλτιστη κλίση εγκατάστασης.
 Αναλύοντας τα επιμέρους θερμικά φορτία για ΖΝΧ, προκύπτει πως θα έχουν το ίδιο περίπου ποσοστό κάλυψης.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Εγκατάσταση μεγαλύτερης επιφάνειας ηλιακών συλλεκτών, θα δημιουργούσε προβλήματα τοποθέτησής τους στην κεκλιμένη στέγη.
Και η περίπτωση αυτή ωστόσο δεν κρίνεται ιδιαίτερα σκόπιμη τεχνικοοικονομικά, δεδομένου πως και με τον παρόντα σχεδιασμό επιτυγχάνεται μέση ετήσια 
κάλυψη φορτίου τουλάχιστον 65%, δηλαδή υπερ-ικανοποιητική, χωρίς η εγκατάσταση να βασίζεται σε εξεζητημένες και συνεπώς 
ακριβές λύσεις.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("ΣΧΕΔΙΑΣΜΟΣ ΣΥΣΤΗΜΑΤΟΣ ΦΩΤΙΣΜΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Η κύρια χρήση του κτιρίου είναι " . $xrisi_znx_iliakos . ". Η κατανάλωση ενέργειας για φωτισμό για την επιλεγμένη χρήση 
δεν λαμβάνεται υπ’ όψη για την ενεργειακή απόδοση του κτιρίου. Έτσι, η κατανάλωση ενέργειας για φωτισμό δεν απαιτεί υπολογισμό, και δεν 
υποβάλλεται σχετικό έντυπο μελέτης. Στις ζώνες φυσικού φωτισμού σύμφωνα με τον Κ.Εν.Α.Κ., θα πρέπει να εξασφαλίζεται η δυνατότητα 
αφής/σβέσης τουλάχιστον του 50% των λαμπτήρων που βρίσκονται σε αυτές. ", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Για την αξιοποίηση του φυσικού φωτισμού κατά την διάρκεια της ημέρας, προβλέπεται η εγκατάσταση απλών συστημάτων 
ελέγχου των φωτιστικών στις ζώνες φυσικού φωτισμού που αποτελούνται από αισθητήρα φυσικού φωτισμού και αυτόματους διακόπτες σβέσης 
στο 50% των φωτιστικών όλων των ζωνών.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("ΔΙΟΡΘΩΣΗ ΣΥΝΗΜΙΤΟΝΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Στο κτίριο δεν εφαρμόζεται διόρθωση (συνφ) σε καμία περίπτωση, λόγω χαμηλής 
εγκατεστημένης ηλεκτρικής ισχύος.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("ΣΚΟΠΙΜΟΤΗΤΑ ΕΦΑΡΜΟΓΗΣ ΕΝΑΛΛΑΚΤΙΚΩΝ ΛΥΣΕΩΝ ΣΧΕΔΙΑΣΜΟΥ ΤΩΝ ΗΛΕΚΤΡΟΜΗΧΑΝΟΛΟΓΙΚΩΝ ΣΥΣΤΗΜΑΤΩΝ ΤΟΥ 
ΚΤΗΡΙΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Σύμφωνα με την μελέτη σκοπιμότητας εξετάστηκαν οι εξής εναλλακτικές λύσεις για την κάλυψη των θερμικών, 
ψυκτικών και ηλεκτρικών φορτίων του κτιρίου.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("1. Η εγκατάσταση συστήματος συμπαραγωγής ηλεκτρισμού και θερμότητας, η οποία κρίνεται ως μη οικονομικά 
βιώσιμη εφαρμογή για το υπό μελέτη κτήριο. Τα χαμηλά θερμικά φορτία της χειμερινής περιόδου περιορίζονται στο ελάχιστο την 
θερινή περίοδο, οπότε το σύστημα συμπαραγωγής δεν λειτουργεί οικονομικά.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("2. Η περίπτωση εγκατάστασης οριζόντιων γεωθερμικών εναλλακτών για την λειτουργία αντλίας θερμότητας 
δεν μπορεί να εφαρμοστεί, για οικονομικούς λόγους επίσης, λόγω του μικρού φορτίου πού απαιτείται.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("3. Η εγκατάσταση ηλιακών συλλεκτών όπως παρουσιάστηκε παραπάνω και η οποία είναι υποχρεωτική βάσει των 
κανονισμών, θα καλύψει περίπου το 70% του θερμικού φορτίου για ζεστό νερό  χρήσης  όλου  του κτηρίου. Λόγω της περιορισμένης επιφάνειας
 της στέγης, δεν υπάρχει δυνατότητα εφαρμογής περαιτέρω εγκατάστασης ηλιακών συλλεκτών ή φωτοβολταϊκών στοιχείων. ", array('name'=>'Arial', 'color'=>'black'));
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

$section->addText("ΕΝΕΡΓΕΙΑΚΗ ΑΠΟΔΟΣΗ ΚΤΙΡΙΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Σύμφωνα με το άρθρο 5 του Κ.Εν.Α.Κ., για τους υπολογισμούς της ενεργειακής απόδοσης και της ενεργειακής 
κατάταξης των κτιρίων εφαρμόζεται η μέθοδος ημι-σταθερής κατάστασης μηνιαίου βήματος του ευρωπαϊκού προτύπου ΕΛΟΤ ΕΝ ISO 
13790 καθώς και των υπολοίπων υποστηρικτικών προτύπων τα οποία αναφέρονται στο παράρτημα 1 του ίδιου κανονισμού. Σύμφωνα 
με την ΤΟΤΕΕ 20701-2/2010, οι θερμικές ζώνες ενός κτιρίου θεωρούνται θερμικά ασύζευκτες. Οι υπολογισμοί της ενεργειακής 
απόδοση κτιρίου έγιναν με την χρήση του υπολογιστικού εργαλείου ΤΕΕ-ΚΕΝΑΚ, βάσει των απαιτήσεων και προδιαγραφών του νόμου 
3661/2008, του Κ.Εν.Α.Κ. και της αντίστοιχης Τ.Ο.Τ.Ε.Ε. 20701-1/2010.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Για τους επιμέρους υπολογισμούς και τη διαστασιολόγηση των ηλεκτρομηχανολογικών συστημάτων του κτηρίου 
(εγκαταστάσεις θέρμανσης, ψύξης, φωτισμού, ζεστού νερού χρήσης, κ.ά.), χρησιμοποιήθηκαν αναλυτικές μέθοδοι και τεχνικές οδηγίες, 
όπως εφαρμόζονται μέχρι σήμερα και αναφέρονται στις αντίστοιχες παραγράφους.", array('name'=>'Arial', 'color'=>'black'));


$section->addText("ΚΛΙΜΑΤΙΚΑ ΔΕΔΟΜΕΝΑ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Τα κλιματικά δεδομένα για την περιοχή της ____________, είναι ενσωματωμένα σε βιβλιοθήκη του 
λογισμικού και σύμφωνα με όσα ορίζονται στην Τ.Ο.Τ.Ε.Ε. 20701-3/2010, «Κλιματικά δεδομένα Ελληνικών Περιοχών». 
Για τους υπολογισμούς λαμβάνονται υπ’ όψη η μέση μηνιαία θερμοκρασία, η μέση μηνιαία ειδική υγρασία, καθώς και η 
προσπίπτουσα ηλιακή ακτινοβολία σε οριζόντιες επιφάνειες και σε κατακόρυφες επιφάνειες για όλους του προσανατολισμούς, 
για την περιοχή του ____________. Το υψόμετρο της περιοχής όπου θα κατασκευασθεί το κτήριο είναι _______________m. 
Η περιοχή ανήκει στην κλιματική ζώνη " . $zwni, array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("ΧΡΗΣΕΙΣ ΚΤΙΡΙΟΥ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Οι χρήσεις του κτηρίου: " . $xrisi_znx_iliakos, array('name'=>'Arial', 'color'=>'black'));
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


$section->addText("ΤΜΗΜΑ ΚΤΙΡΙΟΥ ΜΕ ΚΥΡΙΑ ΧΡΗΣΗ", array('name'=>'Arial', 'color'=>'red', 'size'=>'16')); 
$section->addText("Το εμβαδό και ο όγκος του υπό μελέτη τμήματος κατοικιών του κτηρίου δίνονται στον παρακάτω πίνακα :", array('name'=>'Arial', 'color'=>'black'));
$table = $section->addTable('myOwnTableStyle');
$table->addRow();
$table->addCell(2000, $styleCell)->addText('Ειδική χρήση χώρων', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Θερμαινόμενη επιφάνεια [m2]', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Ψυχόμενη επιφάνεια  [m2]]', $fontStyle);
$table->addCell(2000, $styleCell)->addText('Θερμαινόμενος όγκος [m2]', $fontStyle);
$table->addCell(2000, $styleCell)->addText("Ψυχόμενος όγκος [m3]", $fontStyle);
$table->addRow();
$table->addCell(2000)->addText("Κατοικία");
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

$section->addText("Θερμικές Ζώνες", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
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
$section->addText("Εσωτερικές Συνθήκες Λειτουργίας για την χρήση του κτιρίου", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
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


$section->addText("Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με τον εξωτερικό αέρα", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16')); 
$section->addText("Τα δομικά στοιχεία του κτηρίου θα επιχριστούν με ανοιχτόχρωμο επίχρισμα.  Οι συντελεστές απορροφητικότητας και οι συντελεστές 
εκπομπής των δομικών στοιχείων λαμβάνονται από τον πίνακα 3.14 της Τ.Ο.Τ.Ε.Ε. 20701-1/2010. Στον σχετικό πίνακα πού επισυνάπτεται δίνονται 
συγκεντρωτικά τα απαιτούμενα για τους υπολογισμούς δεδομένα.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με το έδαφος", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Υπάρχει δομικό στοιχείο σε επαφή με το έδαφος που είναι το δάπεδο του ισογείου.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με μη θερμαινόμενους χώρους", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Δεν υπάρχουν δομικά στοιχεία σε επαφή με μη θερμαινόμενους χώρους.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Δεδομένα για διαφανή δομικά στοιχεία κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Όπως αναφέρθηκε σε προηγούμενη παράγραφο, για τα κουφώματα  επιλέχθηκε η χρήση πλαισίου  αλουμινίου χωρίς θερμοδιακοπή  
που  θα  φέρει  υαλοπίνακα  4-12-4  χωρίς επίστρωση χαμηλής εκπομπής (στη θέση 2) και αέρα στο διάκενο. Ο συντελεστής ηλιακού κέρδους 
σε κάθετη πρόσπτωση των υαλοπινάκων δηλώνεται από το κατασκευαστή τους ίσος με g=0,52. Αναλυτικά οι υπολογισμοί σχετικά με τα διαφανή 
δομικά στοιχεία δίνονται στο Τεύχος Υπολογισμών που συνοδεύει τη παρούσα μελέτη.", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Για  κάθε  κούφωμα  υπολογίσθηκε  ο  συντελεστής  σκίασης  από  ορίζοντα  Fhor,  ο  συντελεστής σκίασης από προστέγασμα 
Fov και ο συντελεστής σκίασης από πλευρικό Ffin. Στα σχέδια   δίνονται οι γωνίες σκίασης των κουφωμάτων από μακρινά εμπόδια  (περιβάλλον κτηρίου), 
προστεγάσματα και πλευρικά σκίαστρα. ", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Ηλεκτρομηχανολογικές Εγκαταστάσεις Τμήματος Κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Τα δεδομένα που χρησιμοποιήθηκαν στους υπολογισμούς της ενεργειακής απόδοσης του υπό μελέτη κτηρίου και σχετίζονται 
με τις ηλεκτρομηχανολογικές εγκαταστάσεις του, αφορούν στα εξής:", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύστημα θέρμανσης χώρων,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύστημα ψύξης χώρων,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύστημα παραγωγής ζεστού νερού χρήσης,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Σύστημα ηλιακών συλλεκτών για την παραγωγή ζεστού νερού χρήσης,", array('name'=>'Arial', 'color'=>'black'));
$section->addText("Στις παραγράφους που ακολουθούν, δίνονται αναλυτικά τα δεδομένα που χρησιμοποιήθηκαν κατά τους υπολογισμούς 
της ενεργειακής απόδοσης του τμήματος, στο λογισμικό.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);


$section->addText("Δεδομένα για το σύστημα αερισμού κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Ο αερισμός που εφαρμόζεται σε όλους τους χώρους της κατοικίας του κτηρίου είναι φυσικός και σύμφωνα με την 
Τ.Ο.Τ.Ε.Ε. 20701-1/2010, η παροχή του αέρα θα είναι ίση με τον απαιτούμενο νωπό αέρα. Από τον πίνακα 2.3 της Τ.Ο.Τ.Ε.Ε. 20701-1/2010 
λαμβάνεται για τις κατοικίες φυσικός αερισμός ίσος με " . $array_leitoyrgias[0][12] . " m3/h/m2.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Δεδομένα για το σύστημα φωτισμού κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Τα φωτιστικά που θα χρησιμοποιηθούν για τους χώρους κατοικίας και για τους κοινόχρηστους θερμαινόμενους 
και μη χώρους, δεν λαμβάνονται υπ’ όψη στους υπολογισμούς.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Δεδομένα κτηρίου αναφοράς κατοικιών", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Τα δεδομένα του κτηρίου αναφοράς εισάγονται αυτόματα από το λογισμικό, παράλληλα με την εισαγωγή 
δεδομένων και ανάλογα την χρήση και την λειτουργία του κηρίου ή των θερμικών ζωνών και σύμφωνα με τα όσα ορίζονται 
στο άρθρο 9 του Κ.Εν.Α.Κ. και στην Τ.Ο.Τ.Ε.Ε. 20701-1/2010.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Δεδομένα για αδιαφανή δομικά στοιχεία σε επαφή με μη θερμαινόμενους χώρους", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Το ισόγειο του κτηρίου έρχεται σε επαφή με μη θερμαινόμενους χώρους που βρίσκονται στο υπόγειο του κτηρίου.", array('name'=>'Arial', 'color'=>'black'));

$section->addText("Δεδομένα κτιρίου αναφοράς", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
$section->addText("Τα δεδομένα του κτηρίου αναφοράς εισάγονται αυτόματα από το λογισμικό, παράλληλα με την εισαγωγή 
δεδομένων και ανάλογα την χρήση και την λειτουργία του κηρίου ή των θερμικών ζωνών και σύμφωνα με τα όσα ορίζονται στο
 άρθρο 9 του Κ.Εν.Α.Κ. και στην Τ.Ο.Τ.Ε.Ε. 20701-1/2010.", array('name'=>'Arial', 'color'=>'black'));
$section->addPageBreak(1);
 
 
$section->addText("Ενέργεια", array('name'=>'Arial', 'color'=>'blue', 'size'=>'16'));
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
for($i = 1; $i <= 10; $i++) {
	$table->addRow();
	$table->addCell(2000)->addText("Χώρος $i");
	$table->addCell(2000)->addText(${"mikos".$i});
	$table->addCell(2000)->addText(${"platos".$i});
	$table->addCell(2000)->addText(${"ypsos".$i});
	$table->addCell(2000)->addText(${"embadon".$i});
	$table->addCell(2000)->addText(${"ogkos".$i});
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
for ($i = 1; $i <= 5; $i++) {
	$table->addRow();
	$table->addCell(2000)->addText(${"thermo_esw_drop".$i});
	$table->addCell(2000)->addText(${"thermo_esw_gwnia_p".$i});
	$table->addCell(2000)->addText(${"thermo_esw_gwnia_ypsos".$i});
	$table->addCell(2000)->addText(${"thermo_esw_gwnia_ua".$i});
}
// Προσθήκη θερμογεφυρών εξωτερικών γωνιών
for ($i = 1; $i <= 5; $i++) {
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
$onoma = "T-B";
$mikos = "mikos_b";
$ypsos = "ypsos_b";
$paxos = "paxos_b";
$dokos = "dokos_b";
$ypostil = "ypostil_b";
$u = "u_b";
$mikos_syr = "mikos_syr_b";
$ypsos_syr = "ypsos_syr_b";
$u_syr = "u_syr_b";
$drop_syr = "drop_syr_b";
$drop_aeras = "drop_aeras_b";
$u_dok = "u_dok_b";
$u_ypost = "u_ypost_b";
$u_anoig = "u_anoig_b";
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . $onoma . $i, $fontStyle);
$table->addCell(2000)->addText(${$mikos.$i});
$table->addCell(2000)->addText(${$ypsos.$i});
$table->addCell(2000)->addText(${$paxos.$i});
$table->addCell(2000)->addText(${$u.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_b".$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_b".$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_b".$i});
$table->addRow();
$table->addCell(2000)->addText("Δοκός " . $onoma . $i);
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$dokos.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_dok.$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_b".$i});
$table->addRow();
$table->addCell(2000)->addText("Υποστύλωμα " . $onoma . $i);
$table->addCell(2000)->addText(${$ypostil.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_ypost.$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_b".$i});
$table->addRow();
$table->addCell(2000)->addText("Συρομένων" . $onoma . $i);
$table->addCell(2000)->addText(${$mikos_syr.$i});
$table->addCell(2000)->addText(${$ypsos_syr.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_syr.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_b".$i});
	for ($j = 1; $j <= $anoig_t_boreia; $j++) {
	$table->addRow();
	$table->addCell(2000)->addText("Άνοιγμα " . $onoma . $i . "-" . $j);
	$table->addCell(2000)->addText(${$mikos.$i.$j});
	$table->addCell(2000)->addText(${$ypsos.$i.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$u_anoig.$i.$j});
	$table->addCell(2000)->addText(${"epifaneia_anoigmatos_b".$i.$j});
	$table->addCell(2000)->addText(${"thermogefyres_anoig_b".$i.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$drop_syr.$i.$j});
	$table->addCell(2000)->addText(${"dieisdysi_b".$i.$j});
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
$onoma = "T-A";
$mikos = "mikos_a";
$ypsos = "ypsos_a";
$paxos = "paxos_a";
$dokos = "dokos_a";
$ypostil = "ypostil_a";
$u = "u_a";
$mikos_syr = "mikos_syr_a";
$ypsos_syr = "ypsos_syr_a";
$u_syr = "u_syr_a";
$drop_syr = "drop_syr_a";
$drop_aeras = "drop_aeras_a";
$u_dok = "u_dok_a";
$u_ypost = "u_ypost_a";
$u_anoig = "u_anoig_a";
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . $onoma . $i, $fontStyle);
$table->addCell(2000)->addText(${$mikos.$i});
$table->addCell(2000)->addText(${$ypsos.$i});
$table->addCell(2000)->addText(${$paxos.$i});
$table->addCell(2000)->addText(${$u.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_a".$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_a".$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_a".$i});
$table->addRow();
$table->addCell(2000)->addText("Δοκός " . $onoma . $i);
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$dokos.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_dok.$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_a".$i});
$table->addRow();
$table->addCell(2000)->addText("Υποστύλωμα " . $onoma . $i);
$table->addCell(2000)->addText(${$ypostil.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_ypost.$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_a".$i});
$table->addRow();
$table->addCell(2000)->addText("Συρομένων" . $onoma . $i);
$table->addCell(2000)->addText(${$mikos_syr.$i});
$table->addCell(2000)->addText(${$ypsos_syr.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_syr.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_a".$i});
	for ($j = 1; $j <= $anoig_t_anatolika; $j++) {
	$table->addRow();
	$table->addCell(2000)->addText("Άνοιγμα " . $onoma . $i . "-" . $j);
	$table->addCell(2000)->addText(${$mikos.$i.$j});
	$table->addCell(2000)->addText(${$ypsos.$i.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$u_anoig.$i.$j});
	$table->addCell(2000)->addText(${"epifaneia_anoigmatos_a".$i.$j});
	$table->addCell(2000)->addText(${"thermogefyres_anoig_a".$i.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$drop_syr.$i.$j});
	$table->addCell(2000)->addText(${"dieisdysi_a".$i.$j});
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
$onoma = "T-N";
$mikos = "mikos_n";
$ypsos = "ypsos_n";
$paxos = "paxos_n";
$dokos = "dokos_n";
$ypostil = "ypostil_n";
$u = "u_n";
$mikos_syr = "mikos_syr_n";
$ypsos_syr = "ypsos_syr_n";
$u_syr = "u_syr_n";
$drop_syr = "drop_syr_n";
$drop_aeras = "drop_aeras_n";
$u_dok = "u_dok_n";
$u_ypost = "u_ypost_n";
$u_anoig = "u_anoig_n";
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . $onoma . $i, $fontStyle);
$table->addCell(2000)->addText(${$mikos.$i});
$table->addCell(2000)->addText(${$ypsos.$i});
$table->addCell(2000)->addText(${$paxos.$i});
$table->addCell(2000)->addText(${$u.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_n".$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_n".$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_n".$i});
$table->addRow();
$table->addCell(2000)->addText("Δοκός " . $onoma . $i);
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$dokos.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_dok.$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_n".$i});
$table->addRow();
$table->addCell(2000)->addText("Υποστύλωμα " . $onoma . $i);
$table->addCell(2000)->addText(${$ypostil.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_ypost.$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_n".$i});
$table->addRow();
$table->addCell(2000)->addText("Συρομένων" . $onoma . $i);
$table->addCell(2000)->addText(${$mikos_syr.$i});
$table->addCell(2000)->addText(${$ypsos_syr.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_syr.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_n".$i});
	for ($j = 1; $j <= $anoig_t_notia; $j++) {
	$table->addRow();
	$table->addCell(2000)->addText("Άνοιγμα " . $onoma . $i . "-" . $j);
	$table->addCell(2000)->addText(${$mikos.$i.$j});
	$table->addCell(2000)->addText(${$ypsos.$i.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$u_anoig.$i.$j});
	$table->addCell(2000)->addText(${"epifaneia_anoigmatos_n".$i.$j});
	$table->addCell(2000)->addText(${"thermogefyres_anoig_n".$i.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$drop_syr.$i.$j});
	$table->addCell(2000)->addText(${"dieisdysi_n".$i.$j});
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
$onoma = "T-Δ";
$mikos = "mikos_d";
$ypsos = "ypsos_d";
$paxos = "paxos_d";
$dokos = "dokos_d";
$ypostil = "ypostil_n";
$u = "u_d";
$mikos_syr = "mikos_syr_d";
$ypsos_syr = "ypsos_syr_d";
$u_syr = "u_syr_d";
$drop_syr = "drop_syr_d";
$drop_aeras = "drop_aeras_d";
$u_dok = "u_dok_d";
$u_ypost = "u_ypost_d";
$u_anoig = "u_anoig_d";
$table->addRow();
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο " . $onoma . $i, $fontStyle);
$table->addCell(2000)->addText(${$mikos.$i});
$table->addCell(2000)->addText(${$ypsos.$i});
$table->addCell(2000)->addText(${$paxos.$i});
$table->addCell(2000)->addText(${$u.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_d".$i});
$table->addCell(2000)->addText(${"thermogefyres_toixoy_d".$i});
$table->addCell(2000)->addText(${"epifaneia_dromikoy_d".$i});
$table->addRow();
$table->addCell(2000)->addText("Δοκός " . $onoma . $i);
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$dokos.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_dok.$i});
$table->addCell(2000)->addText(${"epifaneia_dokos_d".$i});
$table->addRow();
$table->addCell(2000)->addText("Υποστύλωμα " . $onoma . $i);
$table->addCell(2000)->addText(${$ypostil.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_ypost.$i});
$table->addCell(2000)->addText(${"epifaneia_ypost_d".$i});
$table->addRow();
$table->addCell(2000)->addText("Συρομένων" . $onoma . $i);
$table->addCell(2000)->addText(${$mikos_syr.$i});
$table->addCell(2000)->addText(${$ypsos_syr.$i});
$table->addCell(2000)->addText("");
$table->addCell(2000)->addText(${$u_syr.$i});
$table->addCell(2000)->addText(${"epifaneia_toixoy_syr_d".$i});
	for ($j = 1; $j <= $anoig_t_dytika; $j++) {
	$table->addRow();
	$table->addCell(2000)->addText("Άνοιγμα " . $onoma . $i . "-" . $j);
	$table->addCell(2000)->addText(${$mikos.$i.$j});
	$table->addCell(2000)->addText(${$ypsos.$i.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$u_anoig.$i.$j});
	$table->addCell(2000)->addText(${"epifaneia_anoigmatos_d".$i.$j});
	$table->addCell(2000)->addText(${"thermogefyres_anoig_d".$i.$j});
	$table->addCell(2000)->addText("");
	$table->addCell(2000)->addText(${$drop_syr.$i.$j});
	$table->addCell(2000)->addText(${"dieisdysi_d".$i.$j});
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
$table->addCell(2000)->addText('Όψη Β');
$table->addCell(2000)->addText($mikos_toixoy_b);
$table->addRow();
$table->addCell(2000)->addText('Όψη Α');
$table->addCell(2000)->addText($mikos_toixoy_a);
$table->addRow();
$table->addCell(2000)->addText('Όψη Ν');
$table->addCell(2000)->addText($mikos_toixoy_n);
$table->addRow();
$table->addCell(2000)->addText('Όψη Δ');
$table->addCell(2000)->addText($mikos_toixoy_d);
$table->addRow();
$table->addCell(2000)->addText('Περίμετρος ορόφου');
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
$table->addCell(2000)->addText("T-B" . $i);
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
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο T-B" . $i);
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
$table->addCell(2000)->addText("T-A" . $i);
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
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο T-A" . $i);
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
$table->addCell(2000)->addText("T-Ν" . $i);
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
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο T-Ν" . $i);
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
$table->addCell(2000)->addText("T-Δ" . $i);
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
$table->addCell(2000, $styleFirstRow)->addText("Σύνολο T-Δ" . $i);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dokos_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_ypost_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_toixoy_syr_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_anoigmatwn_toixoy_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_masif_toixoy_d);
$table->addCell(2000, $styleFirstRow)->addText($epifaneia_dromikoy_d);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_toixoy_d);
$table->addCell(2000, $styleFirstRow)->addText($thermogefyres_anoig_d);
$section->addPageBreak(1);


//Έλεγχος θερμομονωτικής επάρκειας
$section->addText('Έλεγχος θερμομονωτικής επάρκειας', array('name'=>'Arial', 'color'=>'006699'));
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
$objWriter->save('apotelesmata/kenak_word.docx');


// Χρήση μνήμης
echo "<br/>" . date('H:i:s') . " Μέγιστη χρήση μνήμης: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Ολοκλήρωση
echo "<br/>" . date('H:i:s') . " Το αρχείο kenak_word.docx εγγράφηκε επιτυχώς.\r\n" . "<br/><a href=\"apotelesmata/kenak_word.docx\">Κατεβάστε το αρχείο του τεύχους</a>";
?>