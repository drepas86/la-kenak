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

	// Στο αρχείο αυτό αποθηκεύονται τα βασικά functions και κάποια πρόσθετα για τις σκιάσεις

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
			$query .= "WHERE id = 4 ";
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
			$query .= "AND subject_id = 4 ";
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
	// Βρες επιλεγμένη σελίδα	
	function find_selected_page() {
		global $sel_subject;
		global $sel_page;
		if (isset($_GET['subj'])) {
			$sel_subject = get_subject_by_id($_GET['subj']);
			$sel_page = get_default_page($sel_subject['id']);
		} elseif (isset($_GET['page'])) {
			$sel_subject = NULL;
			$sel_page = get_page_by_id($_GET['page']);
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
			$output .= "><a href=\"index_skiaseis.php?subj=" . urlencode($subject["id"]) . 
				"\">{$subject["menu_name"]}</a></li>";
				
				$page_set = get_pages_for_subject($subject["id"], $public);
				$output .= "<ul class=\"pages\">";
				while ($page = mysql_fetch_array($page_set)) {
					$output .= "<li";
					if ($page["id"] == $sel_page['id']) { $output .= " class=\"selected\""; }
					$output .= "><a href=\"index_skiaseis.php?page=" . urlencode($page["id"]) .
						"\">{$page["menu_name"]}</a></li>";
				}
				$output .= "</ul>";
			
		}
		$output .= "</ul>";
		return $output;
	}
	// Εμφάνιση βιβλιοθηκών για τα ανοίγματα
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
		// Εύρεση από τους πίνακες των πλευρικών σκιάσεων
	function get_skiaseis_toixoy_pleyrika($prosanatolismos, $sqltable, $gwnia_skiasis){
		global $connection;
			$query = "SELECT " . $prosanatolismos . " ";
			$query .= "FROM " . $sqltable . " ";
			$query .= "WHERE deg=" . $gwnia_skiasis . " ";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($timesf[] = mysql_fetch_array($array_set));
			return $timesf;
	}

	function get_prosanatolismo_pleyrika($pros){
	//Εύρεση των στηλών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.
			if ($pros == 0){
			$stili1 = "b";
			$prosanatolismos_epif = "Βόρεια";
			$timi_stili1 = 0;
			}
			if ($pros == 45){
			$stili1 = "ba";
			$prosanatolismos_epif = "Βορειοανατολικά";
			$timi_stili1 = 45;
			}
			if ($pros == 90){
			$stili1 = "a";
			$prosanatolismos_epif = "Ανατολικά";
			$timi_stili1 = 90;
			}
			if ($pros == 135){
			$stili1 = "na";
			$prosanatolismos_epif = "Νοτιοανατολικά";
			$timi_stili1 = 135;
			}
			if ($pros == 180){
			$stili1 = "n";
			$prosanatolismos_epif = "Νότια";
			$timi_stili1 = 180;
			}
			if ($pros == 225){
			$stili1 = "nd";
			$prosanatolismos_epif = "Νοτιοδυτικά";
			$timi_stili1 = 225;
			}
			if ($pros == 270){
			$stili1 = "d";
			$prosanatolismos_epif = "Δυτικά";
			$timi_stili1 = 270;
			}
			if ($pros == 315){
			$stili1 = "bd";
			$prosanatolismos_epif = "Βορειοδυτικά";
			$timi_stili1 = 315;
			}
			if ($pros > 0 && $pros < 45){
			$stili1 = "b";
			$stili2 = "ba";
			$prosanatolismos_epif = "Βόρεια - Βορειοανατολικά";
			$timi_stili1 = 0;
			$timi_stili2 = 45;
			}
			if ($pros > 45 && $pros < 90){
			$stili1 = "ba";
			$stili2 = "a";
			$prosanatolismos_epif = "Βορειοανατολικά - Ανατολικά";
			$timi_stili1 = 45;
			$timi_stili2 = 90;
			}
			if ($pros > 90 && $pros < 135){
			$stili1 = "a";
			$stili2 = "na";
			$prosanatolismos_epif = "Ανατολικά - Νοτιοανατολικά";
			$timi_stili1 = 90;
			$timi_stili2 = 135;
			}
			if ($pros > 135 && $pros < 180){
			$stili1 = "na";
			$stili2 = "n";
			$prosanatolismos_epif = "Νοτιοανατολικά - Νότια";
			$timi_stili1 = 135;
			$timi_stili2 = 180;
			}
			if ($pros > 180 && $pros < 225){
			$stili1 = "n";
			$stili2 = "nd";
			$prosanatolismos_epif = "Νότια - Νοτιοδυτικά";
			$timi_stili1 = 180;
			$timi_stili2 = 225;
			}
			if ($pros > 225 && $pros < 270){
			$stili1 = "nd";
			$stili2 = "d";
			$prosanatolismos_epif = "Νοτιοδυτικά - Δυτικά";
			$timi_stili1 = 225;
			$timi_stili2 = 270;
			}
			if ($pros > 270 && $pros < 315){
			$stili1 = "d";
			$stili2 = "bd";
			$prosanatolismos_epif = "Δυτικά - Βορειοδυτικά";
			$timi_stili1 = 270;
			$timi_stili2 = 315;
			}
			if ($pros > 315){
			$stili1 = "bd";
			$stili2 = "b";
			$prosanatolismos_epif = "Βορειοδυτικά - Βόρεια";
			$timi_stili1 = 315;
			$timi_stili2 = 360;
			}
			
			return array ($stili1,$stili2,$prosanatolismos_epif,$timi_stili1,$timi_stili2);
	}
	// Εύρεση της σκίασης του τοίχου ή του ανοίγματος
	function get_skiasi_pleyrika($degtoixoy){
			if ($degtoixoy == 0) {
			$grammi1 = 0;
			}
			if ($degtoixoy == 10) {
			$grammi1 = 10;
			}
			if ($degtoixoy == 20) {
			$grammi1 = 20;
			}
			if ($degtoixoy == 30) {
			$grammi1 = 30;
			}
			if ($degtoixoy == 40) {
			$grammi1 = 40;
			}
			if ($degtoixoy == 50) {
			$grammi1 = 50;
			}
			if ($degtoixoy == 60) {
			$grammi1 = 60;
			}
			if ($degtoixoy >= 70) {
			$grammi1 = 70;
			}
			if ($degtoixoy > 0 && $degtoixoy < 10) {
			$grammi1 = 0;
			$grammi2 = 10;
			}
			if ($degtoixoy > 10 && $degtoixoy < 20) {
			$grammi1 = 10;
			$grammi2 = 20;
			}
			if ($degtoixoy > 20 && $degtoixoy < 30) {
			$grammi1 = 20;
			$grammi2 = 30;
			}
			if ($degtoixoy > 30 && $degtoixoy < 40) {
			$grammi1 = 30;
			$grammi2 = 40;
			}
			if ($degtoixoy > 40 && $degtoixoy < 50) {
			$grammi1 = 40;
			$grammi2 = 50;
			}
			if ($degtoixoy > 50 && $degtoixoy < 60) {
			$grammi1 = 50;
			$grammi2 = 60;
			}
			if ($degtoixoy > 60 && $degtoixoy < 70) {
			$grammi1 = 60;
			$grammi2 = 70;
			}
			return array ($grammi1,$grammi2);
	}
	
	// Εύρεση της σκίασης του τοίχου ή του ανοίγματος από ορίζοντα
	function get_skiasi_orizonta($degtoixoy){
			if ($degtoixoy == 0) {
			$grammi1 = 0;
			}
			if ($degtoixoy == 5) {
			$grammi1 = 5;
			}
			if ($degtoixoy == 10) {
			$grammi1 = 10;
			}
			if ($degtoixoy == 15) {
			$grammi1 = 15;
			}
			if ($degtoixoy == 20) {
			$grammi1 = 20;
			}
			if ($degtoixoy == 25) {
			$grammi1 = 25;
			}
			if ($degtoixoy == 30) {
			$grammi1 = 30;
			}
			if ($degtoixoy == 35) {
			$grammi1 = 35;
			}
			if ($degtoixoy == 40) {
			$grammi1 = 40;
			}
			if ($degtoixoy == 45) {
			$grammi1 = 45;
			}
			if ($degtoixoy == 50) {
			$grammi1 = 50;
			}
			if ($degtoixoy == 55) {
			$grammi1 = 55;
			}
			if ($degtoixoy == 60) {
			$grammi1 = 60;
			}
			if ($degtoixoy == 65) {
			$grammi1 = 65;
			}
			if ($degtoixoy >= 70) {
			$grammi1 = 70;
			}
			if ($degtoixoy > 0 && $degtoixoy < 5) {
			$grammi1 = 0;
			$grammi2 = 5;
			}
			if ($degtoixoy > 5 && $degtoixoy < 10) {
			$grammi1 = 5;
			$grammi2 = 10;
			}
			if ($degtoixoy > 10 && $degtoixoy < 15) {
			$grammi1 = 10;
			$grammi2 = 15;
			}
			if ($degtoixoy > 15 && $degtoixoy < 20) {
			$grammi1 = 15;
			$grammi2 = 20;
			}
			if ($degtoixoy > 20 && $degtoixoy < 25) {
			$grammi1 = 20;
			$grammi2 = 25;
			}
			if ($degtoixoy > 25 && $degtoixoy < 30) {
			$grammi1 = 25;
			$grammi2 = 30;
			}
			if ($degtoixoy > 30 && $degtoixoy < 35) {
			$grammi1 = 30;
			$grammi2 = 35;
			}
			if ($degtoixoy > 35 && $degtoixoy < 40) {
			$grammi1 = 35;
			$grammi2 = 40;
			}
			if ($degtoixoy > 40 && $degtoixoy < 45) {
			$grammi1 = 40;
			$grammi2 = 45;
			}
			if ($degtoixoy > 45 && $degtoixoy < 50) {
			$grammi1 = 45;
			$grammi2 = 50;
			}
			if ($degtoixoy > 50 && $degtoixoy < 55) {
			$grammi1 = 50;
			$grammi2 = 55;
			}
			if ($degtoixoy > 55 && $degtoixoy < 60) {
			$grammi1 = 55;
			$grammi2 = 60;
			}
			if ($degtoixoy > 60 && $degtoixoy < 65) {
			$grammi1 = 60;
			$grammi2 = 65;
			}
			if ($degtoixoy > 65 && $degtoixoy < 70) {
			$grammi1 = 65;
			$grammi2 = 70;
			}
			return array ($grammi1,$grammi2);
	}
	
	//Γραμμική παρεμβολή.Παλινδρόμηση ονομάστηκε εξαιτίας λάθους το οποίο συνεχίστηκε. Δεν την μετονόμασα καθώς την είχα καλέσει αρκετές φορές έπειτα από το λάθος.
	function palindromisi($y1, $y2, $x1, $x2, $y0) {
		
		$timi = $x1 + (($x2-$x1)/($y2-$y1))*($y0-$y1);
		
		return $timi;
	}	
	
	/*function palindromisi($y1, $y2, $x1, $x2, $y0) {
		$timi = (($y0-$y1)*$x2 + ($y2-$y0)*$x1)/($y2-$y1);
				//Ίδια αποτελέσματα με την παραπάνω - Απλά τσεκάρω τους τύπους.
		return $timi;
	}*/
	
	
	
	
	
	//Υπολογισμός συντελεστών σκίασης ορίζοντα
	function calc_skiasi_hor($deg, $pros){
	$sqltable = "skiaseis_orizonta";
	//Εύρεση των στηλών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΠΡΟΣΑΝΑΤΟΛΙΣΜΟΣ ΕΠΙΦΑΝΕΙΑΣ
	$arrayprosanatolismoy = get_prosanatolismo_pleyrika($pros);
	$stili1 = $arrayprosanatolismoy[0];
	$stili2 = $arrayprosanatolismoy[1];
	$prosanatolismos_epif = $arrayprosanatolismoy[2];
	$timi_stili1 = $arrayprosanatolismoy[3];
	$timi_stili2 = $arrayprosanatolismoy[4];
	
	//Εύρεση των γραμμών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή
	$arrayskiasis = get_skiasi_orizonta($deg);
	$grammi1 = $arrayskiasis[0];
	$grammi2 = $arrayskiasis[1];
	
	
			//υπολογισμός
			if (!isset($stili2)) {	//δεν έχει οριστεί ενδιάμεσος προσανατολισμός πλευράς
					if (!isset($grammi2)) { //η σκίαση έχει πέσει σε στάνταρ τιμή
					$timesf = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h = $timesf[0][0];
					$f_c = $timesf[1][0];
					}
					if (isset($grammi2)) { //η σκίαση δεν πέφτει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις γραμμές με τη γωνία σκίασης
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h1 = $timesf1[0][0];
					$f_c1 = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2);
					$f_h2 = $timesf2[0][0];
					$f_c2 = $timesf2[1][0];
					$f_h = palindromisi($grammi1, $grammi2, $f_h1, $f_h2, $deg);
					$f_c = palindromisi($grammi1, $grammi2, $f_c1, $f_c2, $deg);
					}
					
			}
			else{ //έχει οριστεί ενδιάμεσος προσανατολισμός
					if (!isset($grammi2)) { //η σκίαση έχει πέσει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις στηλες (προσανατολισμός) με τον προσανατολισμό
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h1 = $timesf1[0][0];
					$f_c1 = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1);
					$f_h2_toixoy = $timesf2[0][0];
					$f_c2_toixoy = $timesf2[1][0];
					$f_h = palindromisi($timi_stili1, $timi_stili2, $f_h1, $f_h2, $pros);
					$f_c = palindromisi($timi_stili1, $timi_stili2, $f_c1, $f_c2, $pros);
					}
					if (isset($grammi2)) { // η σκιαση έχει πέσει ενδιάμεσα. ο προσανατολισμός έχει πέσει ενδιάμεσα
					$timesf71 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h71 = $timesf71[0][0];
					$f_c71 = $timesf71[1][0];
					$timesf81 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1);
					$f_h81 = $timesf81[0][0];
					$f_c81 = $timesf81[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της πρώτης γραμμής για στήλη 1 και 2
					$f_h11 = palindromisi($timi_stili1, $timi_stili2, $f_h71, $f_h81, $pros);
					$f_c11 = palindromisi($timi_stili1, $timi_stili2, $f_c71, $f_c81, $pros);
					
					$timesf72 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2);
					$f_h72 = $timesf72[0][0];
					$f_c72_toixoy = $timesf72[1][0];
					$timesf82 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi2);
					$f_h82 = $timesf82[0][0];
					$f_c82 = $timesf82[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της δεύτερης γραμμής για στήλη 1 και 2
					$f_h12 = palindromisi($timi_stili1, $timi_stili2, $f_h72, $f_h82, $pros);
					$f_c12 = palindromisi($timi_stili1, $timi_stili2, $f_c72, $f_c82, $pros);
					// παλινδρόμηση ανάμεσα στις τιμές των δύο γραμμών που βρέθηκαν με την γωνία σκίασης.
					$f_h = palindromisi($grammi1, $grammi2, $f_h11, $f_h12, $deg);
					$f_c = palindromisi($grammi1, $grammi2, $f_c11, $f_c12, $deg);
					}
			}
	$array = array(round($f_h,3), round($f_c,3));
	return $array;
	}


	//Υπολογισμός συντελεστών σκίασης προβόλου
	function calc_skiasi_ov($deg, $pros){
	$sqltable = "skiaseis_provolos";
	//Εύρεση των στηλών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΠΡΟΣΑΝΑΤΟΛΙΣΜΟΣ ΕΠΙΦΑΝΕΙΑΣ
			$arrayprosanatolismoy = get_prosanatolismo_pleyrika($pros);
			$stili1 = $arrayprosanatolismoy[0];
			$stili2 = $arrayprosanatolismoy[1];
			$prosanatolismos_epif = $arrayprosanatolismoy[2];
			$timi_stili1 = $arrayprosanatolismoy[3];
			$timi_stili2 = $arrayprosanatolismoy[4];
			
			//Εύρεση των γραμμών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή
			$arrayskiasis = get_skiasi_orizonta($deg);
			$grammi1 = $arrayskiasis[0];
			$grammi2 = $arrayskiasis[1];
			
			
			//Παρεμβολή εαν είμαστε ενδιάμεσα σε τιμές προσανατολισμού.
			//Αν όχι πάρε τις στάνταρ τιμές από τον πίνακα
			
			//υπολογισμός τοίχου
			if (!isset($stili2)) {	//δεν έχει οριστεί ενδιάμεσος προσανατολισμός πλευράς
					if (!isset($grammi2)) { //η σκίαση έχει πέσει σε στάνταρ τιμή
					$timesf = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h = $timesf[0][0];
					$f_c = $timesf[1][0];
					}
					if (isset($grammi2)) { //η σκίαση δεν πέφτει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις γραμμές με τη γωνία σκίασης
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h1 = $timesf1[0][0];
					$f_c1 = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2);
					$f_h2 = $timesf2[0][0];
					$f_c2 = $timesf2[1][0];
					$f_h = palindromisi($grammi1, $grammi2, $f_h1, $f_h2, $deg);
					$f_c = palindromisi($grammi1, $grammi2, $f_c1, $f_c2, $deg);
					}
					
			}
			else{ //έχει οριστεί ενδιάμεσος προσανατολισμός
					if (!isset($grammi2)) { //η σκίαση έχει πέσει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις στηλες (προσανατολισμός) με τον προσανατολισμό
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h1 = $timesf1[0][0];
					$f_c1 = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1);
					$f_h2 = $timesf2[0][0];
					$f_c2 = $timesf2[1][0];
					$f_h = palindromisi($timi_stili1, $timi_stili2, $f_h1, $f_h2, $pros);
					$f_c = palindromisi($timi_stili1, $timi_stili2, $f_c1, $f_c2, $pros);
					}
					if (isset($grammi2)) { // η σκιαση έχει πέσει ενδιάμεσα. ο προσανατολισμός έχει πέσει ενδιάμεσα
					$timesf71 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h71 = $timesf71[0][0];
					$f_c71 = $timesf71[1][0];
					$timesf81 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1);
					$f_h81 = $timesf81[0][0];
					$f_c81 = $timesf81[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της πρώτης γραμμής για στήλη 1 και 2
					$f_h11 = palindromisi($timi_stili1, $timi_stili2, $f_h71, $f_h81, $pros);
					$f_c11 = palindromisi($timi_stili1, $timi_stili2, $f_c71, $f_c81, $pros);
					
					$timesf72 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2);
					$f_h72 = $timesf72[0][0];
					$f_c72 = $timesf72[1][0];
					$timesf82 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi2);
					$f_h82 = $timesf82[0][0];
					$f_c82 = $timesf82[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της δεύτερης γραμμής για στήλη 1 και 2
					$f_h12 = palindromisi($timi_stili1, $timi_stili2, $f_h72, $f_h82, $pros);
					$f_c12 = palindromisi($timi_stili1, $timi_stili2, $f_c72, $f_c82, $pros);
					// παλινδρόμηση ανάμεσα στις τιμές των δύο γραμμών που βρέθηκαν με την γωνία σκίασης.
					$f_h = palindromisi($grammi1, $grammi2, $f_h11, $f_h12, $deg);
					$f_c = palindromisi($grammi1, $grammi2, $f_c11, $f_c12, $deg);
					}
			}
	$array = array(round($f_h,3), round($f_c,3));
	return $array;
	}
	
	
	//Υπολογισμός συντελεστών σκίασης πλευρικών
	function calc_skiasi_fin($deg, $pros, $thesi){
	if ($thesi == 1) { 
			$pinakasthesis = "320a";
			$sqltable = "skiaseis_aristera";
			}
			else {
			$pinakasthesis = "320b";
			$sqltable = "skiaseis_deksia";
			}
	//Εύρεση των στηλών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή.ΠΡΟΣΑΝΑΤΟΛΙΣΜΟΣ ΕΠΙΦΑΝΕΙΑΣ
			$arrayprosanatolismoy = get_prosanatolismo_pleyrika($pros);
			$stili1 = $arrayprosanatolismoy[0];
			$stili2 = $arrayprosanatolismoy[1];
			$prosanatolismos_epif = $arrayprosanatolismoy[2];
			$timi_stili1 = $arrayprosanatolismoy[3];
			$timi_stili2 = $arrayprosanatolismoy[4];			
			
			//Εύρεση των γραμμών στη βάση δεδομένων που θα χρησιμοποιηθούν είτε για απ' ευθείας τιμές είτε για παρεμβολή
			$arrayskiasis = get_skiasi_pleyrika($deg);
			$grammi1 = $arrayskiasis[0];
			$grammi2 = $arrayskiasis[1];
			
			
			//Παρεμβολή εαν είμαστε ενδιάμεσα σε τιμές προσανατολισμού.
			//Αν όχι πάρε τις στάνταρ τιμές από τον πίνακα
			if (!isset($stili2)) {	//δεν έχει οριστεί ενδιάμεσος προσανατολισμός πλευράς
					if (!isset($grammi2)) { //η σκίαση έχει πέσει σε στάνταρ τιμή
					$timesf = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h = $timesf[0][0];
					$f_c = $timesf[1][0];
					}
					if (isset($grammi2)) { //η σκίαση δεν πέφτει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις γραμμές με τη γωνία σκίασης
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h1 = $timesf1[0][0];
					$f_c1 = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2);
					$f_h2 = $timesf2[0][0];
					$f_c2 = $timesf2[1][0];
					$f_h = palindromisi($grammi1, $grammi2, $f_h1, $f_h2, $deg);
					$f_c = palindromisi($grammi1, $grammi2, $f_c1, $f_c2, $deg);
					}
					
			}
			else{ //έχει οριστεί ενδιάμεσος προσανατολισμός
					if (!isset($grammi2)) { //η σκίαση έχει πέσει σε στάνταρ τιμή.παλινδρόμιση ανάμεσα στις στηλες (προσανατολισμός) με τον προσανατολισμό
					$timesf1 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h1_toixoy = $timesf1[0][0];
					$f_c1_toixoy = $timesf1[1][0];
					$timesf2 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1);
					$f_h2_toixoy = $timesf2[0][0];
					$f_c2_toixoy = $timesf2[1][0];
					$f_h_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_h1_toixoy, $f_h2_toixoy, $pros);
					$f_c_toixoy = palindromisi($timi_stili1, $timi_stili2, $f_c1_toixoy, $f_c2_toixoy, $pros);
					}
					if (isset($grammi2)) { // η σκιαση έχει πέσει ενδιάμεσα. ο προσανατολισμός έχει πέσει ενδιάμεσα
					$timesf71 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi1);
					$f_h71 = $timesf71[0][0];
					$f_c71 = $timesf71[1][0];
					$timesf81 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi1);
					$f_h81 = $timesf81[0][0];
					$f_c81 = $timesf81[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της πρώτης γραμμής για στήλη 1 και 2
					$f_h11 = palindromisi($timi_stili1, $timi_stili2, $f_h71, $f_h81, $pros);
					$f_c11 = palindromisi($timi_stili1, $timi_stili2, $f_c71, $f_c81, $pros);
					
					$timesf72 = get_skiaseis_toixoy_pleyrika($stili1, $sqltable, $grammi2);
					$f_h72 = $timesf72[0][0];
					$f_c72 = $timesf72[1][0];
					$timesf82 = get_skiaseis_toixoy_pleyrika($stili2, $sqltable, $grammi2);
					$f_h82 = $timesf82[0][0];
					$f_c82 = $timesf82[1][0];
					// παλινδρόμηση ανάμεσα στις τιμές της δεύτερης γραμμής για στήλη 1 και 2
					$f_h12 = palindromisi($timi_stili1, $timi_stili2, $f_h72, $f_h82, $pros);
					$f_c12 = palindromisi($timi_stili1, $timi_stili2, $f_c72, $f_c82, $pros);
					// παλινδρόμηση ανάμεσα στις τιμές των δύο γραμμών που βρέθηκαν με την γωνία σκίασης.
					$f_h = palindromisi($grammi1, $grammi2, $f_h11, $f_h12, $deg);
					$f_c = palindromisi($grammi1, $grammi2, $f_c11, $f_c12, $deg);
					}
			}
	$array = array(round($f_h,3), round($f_c,3));
	return $array;
	}
	

?>