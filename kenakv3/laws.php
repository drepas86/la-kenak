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

require_once("includes/connection.php"); 
require_once("includes/functions.php"); 
require_once("includes/session.php");
find_selected_page(); 
confirm_logged_in();
include("includes/header_tekmiriwsi.php"); 

if (isset($_SESSION['user_id'])){$login_message="Καλωσήρθες, <a href=\"staff.php\">".$_SESSION['username']."</a>";}
if (isset($_SESSION['meleti_id'])){$login_message.=" - Μελέτη: ".$_SESSION['meleti_perigrafi'];}
if (!isset($_SESSION['meleti_id'])){$login_message.=" - Επιλέξτε μελέτη πρώτα";}
if (!isset($_SESSION['user_id'])){$login_message="<a href=\"login.php\">Σύνδεση</a>";}
?>

<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
		<td id="page">
<h2>Νομοθεσία</h2>
<section class="ac-container">
				<div>
					<input id="ac-1" name="accordion-1" type="checkbox" />
					<label for="ac-1">Νόμοι</label>
					<article class="ac-medium">
						<ul>
						<li>Νόμος 3661/2008 (ΦΕΚ 89/Α/2010) «Μέτρα για τη μείωση της ενεργειακής κατανάλωσης των κτιρίων και άλλες διατάξεις»</li>
						<li>Νόμος 3851/2010 (ΦΕΚ 85/Α/2010) «Επιτάχυνση της ανάπτυξης των Ανανεώσιμων Πηγών Ενέργειας για την αντιμετώπιση της κλιματικής αλλαγής 
						και άλλες διατάξεις σε θέματα αρμοδιότητας του Υπουργείου Περιβάλλοντος, Ενέργειας και Κλιματικής Αλλαγής»</li>
						<li>Νόμος 3889/2010 «Χρηματοδότηση Περιβαλλοντικών Παρεμβάσεων, Πράσινο Ταμείο, Κύρωση Δασικών Χαρτών και άλλες διατάξεις»</li>
						<li>Νόμος 4030/2011 «Νέος τρόπος έκδοσης αδειών δόμησης, ελέγχου κατασκευών και λοιπές διατάξεις» (ΦΕΚ 249 Α/2011)</li>
						<li>Νόμος 3818/2010 (ΦΕΚ 17/Α/2010) «Προστασία των δασών και δασικών εκτάσεων του Ν. Αττικής, σύσταση Ειδικής Γραμματείας Επιθεώρησης Περιβάλλοντος και Ενέργειας και λοιπές διατάξεις»</li>
						<li>Κανονισμός Ενεργειακής Απόδοσης Κτιρίων (ΚΕΝΑΚ) (ΦΕΚ Β΄ 407) - Δ6/Β/οικ.5825/30-03-2010 Κοινή Απόφαση των Υπουργών 
						Οικονομικών και ΠΕΚΑ </li>
						<li>Κοινή Υπουργική Απόφαση «Εκπαίδευση και Εξεταστική διαδικασία Ενεργειακών Επιθεωρητών" (ΦΕΚ 2406 Β/31.10.2011)</li>
						<li>Προεδρικό Διάταγμα 100/2010   «Ενεργειακοί Επιθεωρητές Κτιρίων, Λεβήτων και Εγκαταστάσεων Θέρμανσης και Εγκαταστάσεων Κλιματισμού» (ΦΕΚ 177/Α/6.10.2010)</li>
						<li>Προεδρικό Διάταγμα 72/2010  (ΦΕΚ 132/Α/2010) «Συγκρότηση, διοικητική – οργανωτική δομή και στελέχωση της Ειδικής Υπηρεσίας Επιθεωρητών Ενέργειας»</li>
						</ul>
					</article>
				</div>
				<div>
					<input id="ac-2" name="accordion-1" type="checkbox" />
					<label for="ac-2">Εγκύκλιοι</label>
					<article class="ac-medium">
						<ul>
						<li>Εγκύκλιος «Εφαρμογή του Κανονισμού Ενεργειακής Απόδοσης Κτιρίων (ΚΕΝΑΚ )» (οικ. 1603/4.10.2010)</li>
						<li>Εγκύκλιος «Διευκρινίσεις για την ορθή εφαρμογή του Κανονισμού Ενεργειακής Απόδοσης Κτιρίων» (οικ. 2279/22.12.2010)</li>
						<li>Εγκύκλιος 2366/05.01.2011 με επιπλέον διευκρινήσεις</li>
						<li>Εγκύκλιος 22/26.01.2011 της Συντονιστικής Επιτροπής Συμβολαιογραφικών Συλλόγων Ελλάδος</li>
						<li>Εγκύκλιος «Διευκρινίσεις για την εφαρμογή των διατάξεων του Ν 4030/2011 «Νέος τρόπος έκδοσης αδειών δόμησης, ελέγχου κατασκευών και λοιπές διατάξεις» (ΦΕΚ 249 Α΄)</li>
						<li>917/10.5.2011 έγγραφο της Γενικής Γραμματέως Χωροταξίας και Αστικής Ανάπλασης</li>
						<li>49731/2010 Απόφαση Υπουργού ΠΕΚΑ (ΦΕΚ 498 ΑΑΠ/23.11.2010)</li>
						<li>οικ. 9584/2011 (ΦΕΚ 492 Β) Απόφαση Υπουργού ΠΕΚΑ</li>
						</ul>
					</article>
				</div>
				<div>
					<input id="ac-3" name="accordion-1" type="checkbox" />
					<label for="ac-3">ΤΟΤΕΕ</label>
					<article class="ac-medium">
						<ul>
						<li>ΤΟΤΕΕ 20701−1/2010 «Αναλυτικές εθνικές προδιαγραφές παραμέτρων για τον υπολογισμό της ενεργειακής απόδοσης κτιρίων και την έκδοση του πιστοποιητικού ενεργειακής απόδοσης»</li>
						<li>ΤΟΤΕΕ 20701−2/2010 «Θερμοφυσικές ιδιότητες δομικών υλικών και έλεγχος της θερμομονωτικής επάρκειας των κτιρίων»</li>
						<li>ΤΟΤΕΕ 20701−3/2010 «Κλιματικά δεδομένα ελληνικών περιοχών»</li>
						<li>ΤΟΤΕΕ 20701−4/2010 «Οδηγίες και έντυπα ενεργειακών επιθεωρήσεων κτιρίων, λεβήτων και εγκαταστάσεων θέρμανσης και εγκαταστάσεων κλιματισμού»</li>
						</ul>
					</article>
				</div>
				<div>
					<input id="ac-4" name="accordion-1" type="checkbox" />
					<label for="ac-4">Χρήσιμοι σύνδεσμοι</label>
					<article class="ac-medium">
						<ul>
						<li><a href="http://www.ypeka.gr/Default.aspx?tabid=338">ypeka.gr - Νομικό πλαίσιο επιθεώρησης</a></li>
						<li><a href="http://www.ypeka.gr/Default.aspx?tabid=339&language=el-GR">ypeka.gr - Ειδική υπηρεσία επιθεωρητών ενέργειας</a></li>
						<li><a href="http://www.ypeka.gr/Default.aspx?tabid=340&language=el-GR">ypeka.gr - Μητρώο προσωρινών ενεργειακών επιθεωρητών</a></li>
						<li><a href="https://www.buildingcert.gr/">buildingcert.gr - Μητρώο Ενεργειακών Επιθεωρητών & Αρχείο Ενεργειακών Επιθεωρήσεων</a></li>
						<li><a href="http://http://www.cres.gr">www.cres.gr - Κέντρο ανανεώσιμων πηγών και εξοικονόμησης ενέργειας</a></li>
						</ul>
					</article>
				</div>
</section>
			
		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>