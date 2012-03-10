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

//στην αρχή είχαν φτιαχτεί φόρμες για login ώστε να προσθέτω πχ ανοίγματα στη βάση. 
//Το ίδιο θα μπορούσε να γίνει και με τον υπολογισμό του ΚΕΝΑΚ. Αντί να στέλνω με post πχ από μία και μόνο φόρμα
// θα μπορούσα να στέλνω στη βάση δεδομένων και μετά να τραβάω δεδομένα από εκεί για τα αποτελέσματα.
// Κάτι τέτοιο δεν έχει ολοκληρωθεί. Είναι όμως η βάση για την αποθήκευση της κάθε μελέτης - φόρμας που θα συμπληρώνω.
//Είναι επίσης η μοναδική λύση για πολυόροφα κτίρια. 
	session_start();
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
?>
