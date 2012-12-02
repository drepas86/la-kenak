﻿<?php
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
<h2>Βοήθεια/Τεκμηρίωση</h2>
<section class="ac-container"><p>Αν και σε κάθε τμήμα του λογισμικού έχουν προστεθεί μικρές επιλογές βοήθειας στο παρόν τμήμα κρίνεται σκόπιμο να παρουσιαστεί
η μεθοδολογία υπολογισμού για τα επιμέρους τμήματα του προγράμματος.</p>
				<div>
					<input id="ac-1" name="accordion-1" type="checkbox" />
					<label for="ac-1">Σκιάσεις</label>
					<article class="ac-medium">
						<p>Στο τμήμα των σκιάσεων εισάγεται η γεωμετρία των δομικών στοιχείων και οι αποστάσεις από εμπόδια (πλευρικά, προβόλους, εμπόδια ορίζοντα),
						οι διαστάσεις αυτών των εμποδίων καθώς και ο προσανατολισμός των σκιαζόμενων επιφανειών. Κατά τον υπολογισμό το λογισμικό υπολογιζει αυτόματα
						τη γωνία σκίασης. Έπειτα με βάση αυτή τη γωνία σκίασης και τον προσανατολισμό της επιφάνειας ανατρέχοντας στην βιβλιοθήκη σκιάσεων με χρήση 
						γραμμικής παρεμβολής (εφόσον η γωνία σκίασης ή/και ο προσανατολισμός είναι διαφορετικός από τις τιμές και τις στήλες αυτών των πινάκων) 
						υπολογίζει ενδιάμεσες τιμές για τις μεταβλητές h και c. <br/>
						Εαν για παράδειγμα η γωνία σκίασης είναι διαφορετική από τις προκαθορισμένες τιμές
						στον πίνακα και ο προσανατολισμός είναι διαφορετικός επίσης, τότε προκύπτει πίνακας 2x2 στον οποίο πραγματοποιείται γραμμική παρεμβολή για τις 
						τιμές των γραμμών του και γραμμική παρεμβολή για τις δύο τιμές που προκύπτουν από την παρεμβολή των γραμμών.<br/>
						Αυτή η διαδικασία απλοποιείται εαν ο προσανατολισμός ή η γωνία σκίασης βρίσκεται σε τιμή προκαθορισμένη στους πίνακες σκιάσεων.
						</p>
					</article>
				</div>
				<div>
					<input id="ac-2" name="accordion-1" type="checkbox" />
					<label for="ac-2">Στοιχεία ζώνης</label>
					<article class="ac-medium">
						<p>Η μέση κατανάλωση ΖΝΧ προκύπτει ως γινόμενο του εμβαδού της επιφάνειας και του συντελεστή ΖΝΧ (m<sup>3</sup>/m<sup>2</sup>/year) ανάλογα με τη χρήση του κτιρίου<br/>
						Η διείσδυση αέρα από κουφωματα (πόρτες και παράθυρα) υπολογίζει την απαιτούμενη διείσδυση αέρα ως γινόμενο του εμβαδού της επιφάνειας και του συντελεστή ΖΝΧ
						Νωπού αέρα (m<sup>3</sup>/h/m<sup>2</sup>) καθώς και την πραγματοποιούμενη διείσδυση αέρα από κουφώματα με βάση τον πίνακα 3.26 της ΤΟΤΕΕ. Έπειτα συγκρίνονται οι δύο τιμές και
						επαληθεύεται εαν πληρείται η απαιτούμενη διείσδυση αέρα στην κατασκευή. <br/>
						Και οι δύο παραπάνω υπολογισμοί δεν υπεισέρχονται στην μελέτη παρά αποτελούν μία γρήγορη εκτίμηση για την κατασκευή με δεδομένο ότι ο χρήστης γνωρίζει
						εξ αρχής το εμβαδόν θυρών και παραθύρων καθώς και την επιφάνεια του κτιρίου με την ανάλογη χρήση αυτού. Κατά την είσοδο θυρών ή παραθύρων στο τμήμα μελέτης
						ο χρήστης καλείται να δηλώσει με βάση τον πίνακα 3.26 τον συντελεστή αερισμού ξεχωριστά για κάθε άνοιγμα. Στο τμήμα ΚΕΝΑΚ του λογισμικού η πραγματοποιούμενη διείσδυση
						προκύπτει για κάθε άνοιγμα ξεχωριστά και έπειτα αθροίζεται ώστε να ελεγχθεί αν πληρείται η απαιτούμενη.
						</p>
					</article>
				</div>
				<div>
					<input id="ac-3" name="accordion-1" type="checkbox" />
					<label for="ac-3">Κέλυφος</label>
					<article class="ac-medium">
						<p>Στο τμήμα του κελύφους στον υπολογισμό των U αδιαφανών δομικών στοιχείων το κάθε στοιχείο υπολογίζεται με βάση τα επιμέρους τμήματά του ως λόγος 
						d προς λ (από τα λ που έχει εισάγει ο χρήστης στη βιβλιοθήκη για τα υλικά). Έπειτα υπολογίζονται οι αντιστάσεις R<sub>Λ</sub>, R<sub>i</sub>, R<sub>a</sub>,
						R<sub>u</sub>, R<sub>δ</sub> και υπολογίζεται το R<sub>ολικό</sub>. Το U του δομικού στοχείου προκύπτει ως ανάστροφος λόγος του R<sub>ολικό</sub>.<br/>
						Αυτή η τιμή του U και με βάση την επιλογή ζώνης συγκρίνεται με την τιμή του πίνακα 4.1 της ΤΟΤΕΕ την οποία δεν πρέπει να ξεπερνά.<br/>
						Ανάλογα ισχύουν και για τα διαφανή δομικά στοιχεία (πόρτες και παράθυρα) σε συνάρτηση του τύπου πλαισίου, συντελεστή εκπομπή υαλοπίνακα, διαστάσεις, υλικό διάκενου,
						μέσο πλάτος πλαισίου ή ποσοστό πλαισίου από τους πίνακες της ΤΟΤΕΕ.
						</p>
					</article>
				</div>
				<div>
					<input id="ac-4" name="accordion-1" type="checkbox" />
					<label for="ac-4">Συστήματα</label>
					<article class="ac-small">
						<p>Τα συστήματα και ο υπολογισμός τους δεν έχει ακόμα ολοκληρωθεί πλήρως και γι αυτό το συγκεκριμένο τμήμα της βοήθειας δεν είναι διαθέσιμο.<br/>
						Τα δεδομένα από τα συστήματα μεταφέρονται αυτούσια στο τεύχος υπολογισμών. Οι συντελεστές πρέπει είτε να εκτιμώνται είτε να υπολογίζονται αναλυτικά
						για τα συστήματα θέρμανσης και ψήξης. Οι συντελεστές της μονάδας παραγωγής ΖΝΧ υπολογίζονται με βάση κλιματικά δεδομένα και βιβλιοθήκες νερού δικτύου.
						Τα κείμενα τεκμηρίωσης για συστήματα θέρμανσης/ψύξης/ΖΝΧ/Ηλιακό συλλέκτη στο τεύχος υπολογισμών πρέπει να ελέγχονται ότι αντιπροσωπεύουν το σύστημα.<br/>
						Πχ εαν το σύστημα θέρμανσης είναι διαφορετικό αυτό του λέβητα με πηγή ενέργειας πετρέλαιο θέρμανσης πρέπει να ελέγχεται το τεύχος ως προς την περιγραφή 
						διαφορετικών συστημάτων.
						</p>
					</article>
				</div>
				<div>
					<input id="ac-5" name="accordion-1" type="checkbox" />
					<label for="ac-5">Είσοδος δεδομένων</label>
					<article class="ac-large">
						<p>Το πρώτο βήμα ξεκινώντας μια μελέτη είναι να υπολογιστούν τα U δομικών στοιχείων (μενού ΚΕΛΥΦΟΣ) τα οποία θα χρησιμοποιηθούν στην είσοδο των τοίχων, παραθύρων, θυρών.
						Έπειτα στο μενού ΜΕΛΕΤΗ προστίθονται τα γενικά στοιχεία μελέτης τα οποία αφορούν ιδιοκτησιακό καθεστώς, μελετητή, τοπογραφία, κλιματολογικά δεδομένα περιοχής και γενική χρήση
						κτιρίου. Τα δεδομένα αυτά κατά την είσοδό τους αποθηκεύονται σε πίνακες της βάσης δεδομένων κατηγοριοποιημένα.<br/>
						Με παρόμοιο τρόπο προστίθενται τα δεδομένα θερμικών ζωνών (μπορεί να επιλεγούν δύο θερμικές ζώνες εαν υπάρχει μη θερμαινόμενος χώρος και η μία, αυτή του μη θερμαινόμενου χώρου, 
						να μην εισέρχεται στον έλεγχο της θερμομονωτικής επάρκειας παρά να εμφανίζονται μόνο τα δομικά της στοιχεία), τα δεδομένα επιφανειών και όγκου του κτιρίου, οριζόντια στοιχεία 
						δαπέδων και οροφών καθώς και θερμογέφυρες όπως αυτές παρουσιάζονται στην κάτοψη του κτιρίου (εσωτερικές και εξωτερικές γωνίες). Εαν αυτές οι θερμογέφυρες ενδέχεται να καλυφθούν
						κατά την είσοδο της τοιχοποιίας αργότερα μπορείτε να παρακάμφθεί αυτή η εισαγωγή χωρίς να δημιουργηθεί πρόβλημα στον υπολογισμό.<br/>
						Στο επόμενο βήμα προστίθενται τα δεδομένα των συστημάτων όπως ακριβώς θα εμφανίζονται στο λογισμικό του ΤΕΕ από τα οποία κατά τον υπολογισμό συλλέγονται οι τιμές ισχύος, ο τύπος 
						αυτών, τα δίκτυα διανομής και αποθήκευσης, οι τερματικές μονάδες και εμφανίζονται στο τεύχος. <br/>
						Έπειτα προστίθενται τα δομικά στοιχεία ανά προσανατολισμό (Β,Α,Ν,Δ) ενώ μπορούν να ονομαστούν και με βάση τις τομές σε ορόφους (πχ ΙΣ=Ισόγειο κλπ). Στην είσοδο αυτών των στοιχείων 
						δίνονται αναλυτικές οδηγίες εισόδου (U, τύπων, αερισμού, θερμογεφυρών, συρομένων, δοκών, υποστυλωμάτων κλπ).<br/>
						Στο τελικό στάδιο εισόδου προστίθενται και οι συντελεστές σκίασης όπου αυτοί είναι διαφορετικοί της μονάδας για τοίχους και ανοίγματα.<br/>
						Η παραγωγή του τεύχους πραγματοποιείται αυτόματα κατά την μετάβαση στο μενού ΤΕΥΧΟΣ όπου και εμφανίζονται τα αποτελέσματα όλων των υπολογισμών ανά κεφάλαιο του τελικού κειμένου.<br/>
						Εαν συγκεκριμένα αποτελέσματα δεν ικανοποιούν δίνεται η δυνατότητα επιστροφής σε οποιοδήποτε σημείο για διόρθωση και έπειτα μετάβαση στο τεύχος και επανεμφάνιση των υπολογισμών με βάση
						τα νέα δεδομένα. Εφόσον το αποτέλεσμα είναι το επιθυμητό δίνεται η δυνατότητα εκτύπωσης σε pdf, docx για περαιτέρω επεξεργασία ή παραγωγή εγγράφων.<br/>
						</p>
					</article>
				</div>
				<div>
					<input id="ac-6" name="accordion-1" type="checkbox" />
					<label for="ac-6">Αποθήκευση/Ανάκτηση</label>
					<article class="ac-medium">
						<p>Η όλη διαδικασία ολοκληρώνεται με τη μετάβαση στο μενού Αποθήκευση/Ανάκτηση όπου παράγεται αρχείο xml για εισαγωγή των δομικών στοιχείων στο λογισμικό του ΤΕΕ, παράγεται αρχείο xlsx το 
						οποίο περιέχει τα δομικά στοιχεία καθώς και τα δεδομένα τους χωρισμένα ανά ζώνη για διορθώσεις καθώς και αντιγραφή/επικόλληση του πλέγματος στο λογισμικό του ΤΕΕ.<br/>
						Επίσης δίνεται η δυνατότητα αποθήκευσης και ανάκτησης του συνόλου του μενού ΜΕΛΕΤΗ (του συνόλου των δεδομένων εισαγωγής του χρήστη) σε αρχεία xml και sql.
						</p>
					</article>
				</div>
				<div>
					<input id="ac-7" name="accordion-1" type="checkbox" />
					<label for="ac-7">Περί...</label>
					<article class="ac-large">
						<p>la-kenak - Open source kenak calc. software <br/>
						Το παρόν λογισμικό διανέμεται με βάση την άδεια GPLv3 ή οποιαδήποτε μεταγενέστερη και παρέχεται χωρίς υποστήριξη. Ο δημιουργός δεν ευθύνεται για τυχόν λάθη, παραλείψεις κλπ τα οποία 
						μπορεί να οδηγήσουν σε μη ορθή παραγωγή του τεύχους ή άλλων δεδομένων εξόδου από το λογισμικό. Οι χρήστες πρέπει να ελέγχουν τα αποτελέσματα και να τα διασταυρώνουν.<br/>
						Το παρόν λογισμικό αποτελείται από τμηματικά αρχεία τα οποία ολοκληρώνουν το λογισμικό και τα οποία είτε δημιουργήθηκαν εκ του μηδενός είτε χρησιμοποιήθηκαν αυτούσια ως βιβλιοθήκες
						που διατίθενται με συγκεκριμένες άδειες διανομής και χρήσης είτε ως τμήματα κώδικα τα οποία επίσης ενδέχεται να διανέμονται με διαφορετικές άδειες. <br/>
						Κάθε τμηματικό αρχείο του λογισμικού φέρει στην κορυφή του την άδεια, την προέλευση, την τροποποίηση, τους δημιουργούς ή όσους πραγματοποίησαν αλλαγές καθώς και την άδεια διανομής και
						χρήσης. Οι άδειες αυτές βρίσκονται ως αρχεία κειμένου (txt) στον κεντρικό φάκελο της διανομής είτε στους φακέλους των βιβλιοθηκών.
						</p>
					</article>
				</div>
			</section>
			
		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>