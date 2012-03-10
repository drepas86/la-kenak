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


	// Βασικές function - Περιέχει και function για τον ΖΝΧ

	//Έλεγχω την διαδρομή στον browser για να μην πέσω σε λάθη
	function mysql_prep( $value ) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 ή ανώτερη
			// mysql_real_escape_string να δουλεύει
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // αν μικρότερη PHP  από την v4.3.0
			// αν magic quotes στο OFF τότε πρόσθεσε κάθετες
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// αν magic quotes στο OFF τότε μην προσθέτεις
		}
		return $value;
	}

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Απέτυχε η εύρεση στη βάση ή δηλώσατε λάθος βάση: " . mysql_error());
		}
	}
	
	function get_all_subjects($public = true) {
		global $connection;
		$query = "SELECT * 
				FROM subjects ";
		if ($public) {
			$query .= "WHERE visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$subject_set = mysql_query($query, $connection);
		confirm_query($subject_set);
		return $subject_set;
	}
	//Βρες τις σελίδες που ανήκουν στην ενότητα
	function get_pages_for_subject($subject_id, $public = true) {
		global $connection;
		$query = "SELECT * 
				FROM pages ";
		$query .= "WHERE subject_id = {$subject_id} ";
		if ($public) {
			$query .= "AND visible = 1 ";
		}
		$query .= "ORDER BY position ASC";
		$page_set = mysql_query($query, $connection);
		confirm_query($page_set);
		return $page_set;
	}
	//Εύρεση κατηγορίας με το id
	function get_subject_by_id($subject_id) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE id=" . $subject_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// Υπενθύμιση:
		// αν δεν επιστρέψει καμία γραμμή, fetch_array θα δώσει false
		if ($subject = mysql_fetch_array($result_set)) {
			return $subject;
		} else {
			return NULL;
		}
	}
	//Εύρεση σελίδας με το id
	function get_page_by_id($page_id) {
		global $connection;
		$query = "SELECT * ";
		$query .= "FROM pages ";
		$query .= "WHERE id=" . $page_id ." ";
		$query .= "LIMIT 1";
		$result_set = mysql_query($query, $connection);
		confirm_query($result_set);
		// Υπενθύμιση:
		// αν δεν επιστρέψει καμία γραμμή, fetch_array θα δώσει false
		if ($page = mysql_fetch_array($result_set)) {
			return $page;
		} else {
			return NULL;
		}
	}
	
	function get_default_page($subject_id) {
		// Βρες όλες τις ενότητες με visible
		$page_set = get_pages_for_subject($subject_id, true);
		if ($first_page = mysql_fetch_array($page_set)) {
			return $first_page;
		} else {
			return NULL;
		}
	}
	//Βρες επιλεγμένη σελίδα
	function find_selected_page() {
		global $sel_subject;
		global $sel_page;
		if (isset($_GET['subj'])) {
			$sel_subject = get_subject_by_id($_GET['subj']);
			$sel_page = get_default_page($sel_subject['id']);
		} elseif (isset($_GET['page'])) {
			$sel_subject = NULL;
			$sel_page = $_GET['page'];
		} else {
			$sel_subject = NULL;
			$sel_page = NULL;
		}
	}
	//Function που "έμεινε" από την έκδοση με χρήστες
	function navigation($sel_subject, $sel_page, $public = false) {
		$output = "<ul class=\"subjects\">";
		$subject_set = get_all_subjects($public);
		while ($subject = mysql_fetch_array($subject_set)) {
			$output .= "<li";
			if ($subject["id"] == $sel_subject['id']) { $output .= " class=\"selected\""; }
			$output .= "><a href=\"edit_subject.php?subj=" . urlencode($subject["id"]) . 
				"\">{$subject["menu_name"]}</a></li>";
			$page_set = get_pages_for_subject($subject["id"], $public);
			$output .= "<ul class=\"pages\">";
			while ($page = mysql_fetch_array($page_set)) {
				$output .= "<li";
				if ($page["id"] == $sel_page['id']) { $output .= " class=\"selected\""; }
				$output .= "><a href=\"content.php?page=" . urlencode($page["id"]) .
					"\">{$page["menu_name"]}</a></li>";
			}
			$output .= "</ul>";
		}
		$output .= "</ul>";
		return $output;
	}

	// Στην αρχή το πρόγραμμα δημιουργήθηκε με λογαριασμούς χρηστών. Καμία διαφορά ως προς το public
	function public_navigation($sel_subject, $sel_page, $public = true) {
		$output = "<ul class=\"subjects\">";
		$subject_set = get_all_subjects($public);
		while ($subject = mysql_fetch_array($subject_set)) {
			$output .= "<li";
			if ($subject["id"] == $sel_subject['id']) { $output .= " class=\"selected\""; }
			$output .= "><a href=\"index.php?subj=" . urlencode($subject["id"]) . 
				"\">{$subject["menu_name"]}</a></li>";
				
				$page_set = get_pages_for_subject($subject["id"], $public);
				$output .= "<ul class=\"pages\">";
				while ($page = mysql_fetch_array($page_set)) {
					$output .= "<li";
					if ($page["id"] == $sel_page['id']) { $output .= " class=\"selected\""; }
					$output .= "><a href=\"index.php?page=" . urlencode($page["id"]) .
						"\">{$page["menu_name"]}</a></li>";
				}
				$output .= "</ul>";
			
		}
		$output .= "</ul>";
		return $output;
	}

	function get_anoigmata($sel_page,$public = true) {
		global $connection;
		if ($sel_page["id"] == "1"){
			
			$query = "SELECT * FROM anoigmata_alouminio";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "2"){
			
			$query = "SELECT * FROM anoigmata_alouminio_thermo";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "3"){
			
			$query = "SELECT * FROM anoigmata_doors";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "4"){
			
			$query = "SELECT * FROM anoigmata_plastic";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "5"){
			
			$query = "SELECT * FROM anoigmata_wood";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
	}
	
	// Εμφάνιση βιβλιοθηκών για τα υλικά
	function get_ylika($sel_page,$public = true) {
		global $connection;
		if ($sel_page["id"] == "6"){
			
			$query = "SELECT * FROM domika_ylika_beton";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "7"){
			
			$query = "SELECT * FROM domika_ylika_diafora";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "8"){
			
			$query = "SELECT * FROM domika_ylika_ygromonwseis";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "9"){
			
			$query = "SELECT * FROM domika_ylika_epixrismata";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "10"){
			
			$query = "SELECT * FROM domika_ylika_gypsosanides";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "11"){
			
			$query = "SELECT * FROM domika_ylika_keramidia";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "12"){
			
			$query = "SELECT * FROM domika_ylika_ksyleia";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "13"){
			
			$query = "SELECT * FROM domika_ylika_monwtika";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "14"){
			
			$query = "SELECT * FROM domika_ylika_monwtikadow";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "15"){
			
			$query = "SELECT * FROM domika_ylika_plakes";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "16"){
			
			$query = "SELECT * FROM domika_ylika_skyrodemata";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "17"){
			
			$query = "SELECT * FROM domika_ylika_toyvla";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "18"){
			
			$query = "SELECT * FROM domika_ylika_epifstraera";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
	}
	
	// Εμφάνιση βιβλιοθηκών για τα δομικά
	function get_domika($sel_page,$public = true) {
		global $connection;
		if ($sel_page["id"] == "19"){
			
			$query = "SELECT * FROM domika_dapedo_edafous";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "20"){
			
			$query = "SELECT * FROM domika_orofes";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "21"){
			
			$query = "SELECT * FROM domika_pilotis";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "22"){
			
			$query = "SELECT * FROM domika_toixoi";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		
	}
	
	// Εμφάνιση βιβλιοθηκών για τις σκιάσεις
	function get_skiaseis($sel_page,$public = true) {
		global $connection;
		if ($sel_page["id"] == "23"){
			
			$query = "SELECT * FROM skiaseis_aristera";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "24"){
			
			$query = "SELECT * FROM skiaseis_deksia";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "25"){
			
			$query = "SELECT * FROM skiaseis_orizonta";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "26"){
			
			$query = "SELECT * FROM skiaseis_provolos";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		
	}
	// Εμφάνιση βιβλιοθηκών για τα καύσιμα
	function get_energy($sel_page,$public = true) {
		global $connection;
		if ($sel_page["id"] == "27"){
			
			$query = "SELECT * FROM energy_kaysima";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
				
	}
	// Εμφάνιση βιβλιοθηκών για τις συνθήκες λειτουργίας
	function get_synthikes($sel_page,$public = true) {
		global $connection;
		if ($sel_page["id"] == "28"){
			
			$query = "SELECT * FROM energy_conditions";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "29"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 0,2";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "30"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 2,9";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "31"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 11,11";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "32"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 22,4";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "33"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 26,7";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "34"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 33,2";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "35"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 35,3";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "36"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 38,2";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "37"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 40,4";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "38"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 44,1";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "39"){
			
			$query = "SELECT * FROM energy_conditions LIMIT 45,1";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
				
	}
?>