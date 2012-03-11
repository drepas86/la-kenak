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
	// Βασικές function - Περιέχει και function για τον έλεγχο θερμομονωτικής επάρκειας

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
			$output .= "<li id='menutitle'";
			//if ($subject["id"] == $sel_subject['id']) { $output .= " class=\"selected\""; }
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
	
	function get_energy($sel_page,$public = true) {
		global $connection;
		if ($sel_page["id"] == "27"){
			
			$query = "SELECT * FROM energy_kaysima";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
				
	}
	
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
		function get_climate($sel_page,$public = true) {
		global $connection;
		if ($sel_page["id"] == "41"){
			
			$query = "SELECT * FROM climate31";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "42"){
			
			$query = "SELECT * FROM climate32";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "43"){
			
			$query = "SELECT * FROM climate33";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "44"){
			
			$query = "SELECT * FROM climate34";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "45"){
			
			$query = "SELECT * FROM climate35";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "46"){
			
			$query = "SELECT * FROM climate36";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "47"){
			
			$query = "SELECT * FROM climate37";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "48"){
			
			$query = "SELECT * FROM climate38";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "49"){
			
			$query = "SELECT * FROM climate39";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "50"){
			
			$query = "SELECT * FROM climate310";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "51"){
			
			$query = "SELECT * FROM climate311";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "52"){
			
			$query = "SELECT * FROM climate61";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "53"){
			
			$query = "SELECT * FROM climate41";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "54"){
			
			$query = "SELECT * FROM climate42";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		if ($sel_page["id"] == "55"){
			
			$query = "SELECT * FROM climate43_sunt";
			$array_set = mysql_query($query, $connection);
			while($vivliothikes[] = mysql_fetch_array($array_set));
			return $vivliothikes;
		}
		
				
	}
	//η παρακάτω δημιουργεί ένα select_box και έχει μεταβλητές: 
	//(αναζήτηση βάσης, το όνομα στήλης στη βάση που περιέχει τις τιμές, το όνομα στήλης στη βάση που περιέχει τα ονόματα, το όνομα του select_box) 

	//προσθήκη του id= για χρήση στο domika_kelyfos.php -- tsak mod

	function dropdown($query, $value, $name, $drop_name){
		global $connection;
	    $drop_set = mysql_query($query, $connection);
	    $menu = '<select name="' . $drop_name . '" id="' . $drop_name . '">';
	    while ($result = mysql_fetch_array($drop_set)) {
	        $menu .= '
	      <option value="' . $result[$value] . '">' . $result[$name] . '</option>';
	    }
	    $menu .= '</select>';
	    return $menu;
	}
	
	//η παρακάτω δημιουργεί μόνο τις επιλογές του select_box και έχει μεταβλητές: 
	//(αναζήτηση βάσης, το όνομα στήλης στη βάση που περιέχει τις τιμές, το όνομα στήλης στη βάση που περιέχει τα ονόματα, το όνομα του select_box) 
	function dropdown1($query, $value, $name){
		global $connection;
		$menu="";
	    $drop_set = mysql_query($query, $connection);
	    while ($result = mysql_fetch_array($drop_set)) {
	        $menu .= "<option value=\"" . $result[$value]. "\">" . $result[$name] . "</option>";
	    }

	    return $menu;
	}
	
	//Εύρεση τιμών στον πίνακα thermo_eparekia_u ή σε όποιον άλλο έχει ως στήλη την a_pros_v
	function get_thermoeparkeia($zwni, $sqltable, $aprosv){
		global $connection;
			$query = "SELECT " . $zwni . " ";
			$query .= "FROM " . $sqltable . " ";
			$query .= "WHERE a_pros_v=" . $aprosv . " ";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($timesaprosv[] = mysql_fetch_array($array_set));
			return $timesaprosv;
	}
	
	//Εύρεση τιμών στον πίνακα που έχει ως στήλη την id (ολοι οι πίνακες)
	function get_times($epilogi, $sqltable, $id){
		global $connection;
			$query = "SELECT " . $epilogi . " ";
			$query .= "FROM " . $sqltable . " ";
			$query .= "WHERE id=" . $id . " ";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($timesaprosv[] = mysql_fetch_array($array_set));
			return $timesaprosv;
	}
	
	//Εύρεση τιμών στον πίνακα που έχει ως στήλη την id (ολοι οι πίνακες)
	function get_times_all($epilogi, $sqltable){
		global $connection;
			$query = "SELECT " . $epilogi . " ";
			$query .= "FROM " . $sqltable . " ";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($timesaprosv[] = mysql_fetch_array($array_set));
			return $timesaprosv;
	}
	
	//Εύρεση τιμών στον πίνακα domika9a για το δάπεδο επί εδάφους
	function get_dapedo_edafoys($xaraktiristiki, $vathos, $ufb){
		global $connection;
			$query = "SELECT * ";
			$query .= "FROM domika9a ";
			$query .= "WHERE ufb=" . $ufb . " ";
			$query .= "AND z=" . $vathos . " ";
			$array_set = mysql_query($query, $connection);
			confirm_query($array_set);
			while($timesb[] = mysql_fetch_array($array_set));
			$zitoymeno = $timesb[0][$xaraktiristiki];
			return $zitoymeno;
	}
	
	// Γραμμές πριν και μετά το U/A.
	function get_ua($ua){
			if ($ua <= 0.2) {
			$grammi1 = 0.2;
			}
			if ($ua == 0.3) {
			$grammi1 = 0.3;
			}
			if ($ua == 0.4) {
			$grammi1 = 0.4;
			}
			if ($ua == 0.5) {
			$grammi1 = 0.5;
			}
			if ($ua == 0.6) {
			$grammi1 = 0.6;
			}
			if ($ua == 0.7) {
			$grammi1 = 0.7;
			}
			if ($ua == 0.8) {
			$grammi1 = 0.8;
			}
			if ($ua >= 0.9) {
			$grammi1 = 0.9;
			}
			if ($ua >= 1) {
			$grammi1 = "1.0";
			}
			if ($ua > 0.2 && $ua < 0.3) {
			$grammi1 = 0.2;
			$grammi2 = 0.3;
			}
			if ($ua > 0.3 && $ua < 0.4) {
			$grammi1 = 0.3;
			$grammi2 = 0.4;
			}
			if ($ua > 0.4 && $ua < 0.5) {
			$grammi1 = 0.4;
			$grammi2 = 0.5;
			}
			if ($ua > 0.5 && $ua < 0.6) {
			$grammi1 = 0.5;
			$grammi2 = 0.6;
			}
			if ($ua > 0.6 && $ua < 0.7) {
			$grammi1 = 0.6;
			$grammi2 = 0.7;
			}
			if ($ua > 0.7 && $ua < 0.8) {
			$grammi1 = 0.7;
			$grammi2 = 0.8;
			}
			if ($ua > 0.8 && $ua < 0.9) {
			$grammi1 = 0.8;
			$grammi2 = 0.9;
			}
			if ($ua > 0.9 && $ua < 1) {
			$grammi1 = 0.9;
			$grammi2 = "1.0";
			}
			
			return array ($grammi1,$grammi2);
	}
	
		// Γραμμές πριν και μετά τον πίνακα 9α για το δάπεδο επί εδάφους.
	function get_ufb($ufb){
			if ($ufb >= 4.5) {
			$grammi1 = 4.5;
			}
			if ($ufb == 3) {
			$grammi1 = 3;
			}
			if ($ufb == 2) {
			$grammi1 = 2;
			}
			if ($ufb == 1.5) {
			$grammi1 = 1.5;
			}
			if ($ufb == 1) {
			$grammi1 = 1;
			}
			if ($ufb == 0.9) {
			$grammi1 = 0.9;
			}
			if ($ufb == 0.8) {
			$grammi1 = 0.8;
			}
			if ($ufb == 0.7) {
			$grammi1 = 0.7;
			}
			if ($ufb == 0.6) {
			$grammi1 = 0.6;
			}
			if ($ufb <= 0.5) {
			$grammi1 = 0.5;
			}
			if ($ufb > 0.5 && $ufb < 0.6) {
			$grammi1 = 0.5;
			$grammi2 = 0.6;
			}
			if ($ufb > 0.6 && $ufb < 0.7) {
			$grammi1 = 0.6;
			$grammi2 = 0.7;
			}
			if ($ufb > 0.7 && $ufb < 0.8) {
			$grammi1 = 0.7;
			$grammi2 = 0.8;
			}
			if ($ufb > 0.8 && $ufb < 0.9) {
			$grammi1 = 0.8;
			$grammi2 = 0.9;
			}
			if ($ufb > 0.9 && $ufb < 1) {
			$grammi1 = 0.9;
			$grammi2 = 1;
			}
			if ($ufb > 1 && $ufb < 1.5) {
			$grammi1 = 1;
			$grammi2 = 1.5;
			}
			if ($ufb > 1.5 && $ufb < 2) {
			$grammi1 = 1.5;
			$grammi2 = 2;
			}
			if ($ufb > 2 && $ufb < 3) {
			$grammi1 = 2;
			$grammi2 = 3;
			}
			if ($ufb > 3 && $ufb < 4.5) {
			$grammi1 = 3;
			$grammi2 = 4.5;
			}
			
			return array ($grammi1,$grammi2);
	}
	
	
	// Στήλες πριν και μετά τον πίνακα 9α για το δάπεδο επί εδάφους.
	function get_xaraktiristiki($xaraktiristiki){
			if ($xaraktiristiki <= 2) {
			$grammi1 = 2;
			}
			if ($xaraktiristiki == 4) {
			$grammi1 = 4;
			}
			if ($xaraktiristiki == 6) {
			$grammi1 = 6;
			}
			if ($xaraktiristiki == 8) {
			$grammi1 = 8;
			}
			if ($xaraktiristiki == 10) {
			$grammi1 = 10;
			}
			if ($xaraktiristiki == 14) {
			$grammi1 = 14;
			}
			if ($xaraktiristiki == 18) {
			$grammi1 = 18;
			}
			if ($xaraktiristiki == 22) {
			$grammi1 = 22;
			}
			if ($xaraktiristiki == 26) {
			$grammi1 = 26;
			}
			if ($xaraktiristiki >= 30) {
			$grammi1 = 30;
			}
			if ($xaraktiristiki > 2 && $xaraktiristiki < 4) {
			$grammi1 = 2;
			$grammi2 = 4;
			}
			if ($xaraktiristiki > 4 && $xaraktiristiki < 6) {
			$grammi1 = 4;
			$grammi2 = 6;
			}
			if ($xaraktiristiki > 6 && $xaraktiristiki < 8) {
			$grammi1 = 6;
			$grammi2 = 8;
			}
			if ($xaraktiristiki > 8 && $xaraktiristiki < 10) {
			$grammi1 = 8;
			$grammi2 = 10;
			}
			if ($xaraktiristiki > 10 && $xaraktiristiki < 14) {
			$grammi1 = 10;
			$grammi2 = 14;
			}
			if ($xaraktiristiki > 14 && $xaraktiristiki < 18) {
			$grammi1 = 14;
			$grammi2 = 18;
			}
			if ($xaraktiristiki > 18 && $xaraktiristiki < 22) {
			$grammi1 = 18;
			$grammi2 = 22;
			}
			if ($xaraktiristiki > 22 && $xaraktiristiki < 26) {
			$grammi1 = 22;
			$grammi2 = 26;
			}
			if ($xaraktiristiki > 26 && $xaraktiristiki < 30) {
			$grammi1 = 26;
			$grammi2 = 30;
			}
			
			return array ($grammi1,$grammi2);
	}
	
	
	
	
	//Γραμμική παρεμβολή.Παλινδρόμηση ονομάστηκε εξαιτίας λάθους το οποίο συνεχίστηκε. Δεν την μετονόμασα καθώς την είχα καλέσει αρκετές φορές έπειτα από το λάθος.
	function palindromisi($y1, $y2, $x1, $x2, $y0) {
		
		$timi = $x1 + (($x2-$x1)/($y2-$y1))*($y0-$y1);
		
		return $timi;
	}
	

//tsak mod -- για τροποποιήσεις της βάσης παληών εκδόσεων
//πηγή: http://www.edmondscommerce.co.uk/mysql/mysql-add-column-if-not-exists-php-function/
    function add_column_if_not_exist($db, $column, $column_attr = "VARCHAR(255) NOT NULL" ){
		global $connection;
        $exists = false;
        $columns = mysql_query("show columns from $db", $connection);
        while($c = mysql_fetch_assoc($columns)){
            if($c['Field'] == $column){
                $exists = true;
                break;
            }
        }      
        if(!$exists){
            mysql_query("ALTER TABLE `$db` ADD `$column`  $column_attr", $connection);
        }
    }

//tsak mod -- για πρόσθεση νέου πίνακα σε παληές εκδόσεις
//            προστίθεται μόνο το id, τα υπόλοιπα πεδία πρέπει να προστεθούν με add_column_if_not_exist 
	function add_new_table($tb){
		global $connection;

		$sql="SELECT * FROM $tb";
		$result=@mysql_query($sql, $connection);
		if (!$result) {
			mysql_query("CREATE TABLE $tb(id INT(2) NOT NULL AUTO_INCREMENT, PRIMARY KEY(id)) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_general_ci;", $connection) or die(mysql_error()); 
			return true;
		}else{
			return false;
		}
	}

//tsak mod -- αντιγραφή από πίνακα σε πίνακα 
	function copy_from_table_to_table($tb1,$tb2){
		global $connection;

		$sql="insert into $tb1(name,u,paxos,baros) select name,u,paxos,baros from $tb2";
		mysql_query($sql,$connection);
	}
	
//tsak mod -- ανάγνωση από τη βάση των δομικών στοιχείων
	function dropdown2($query, $value1, $value2, $name, $drop_name){
		global $connection;
	    $drop_set = mysql_query($query, $connection);
	    $menu = '<select name="' . $drop_name . '" id="' . $drop_name . '">';
	    while ($result = mysql_fetch_array($drop_set)) {
			$r1=$result[$value1];
			$r2=$result[$value2];
			if ($r1=="")$r1="0|0|0|0|0|0|0|0|0|0";
			if ($r2=="")$r2="0|0|0|0|0|0|0|0|0|0^0|0|0|0|0|0|0|0|0|0";
	        $menu .= '
	      <option value="' . $r1 . '^' .  $r2 .'">' . $result[$name] . '</option>';
	    }
	    $menu .= '</select>';
	    return $menu;
	}
	
	
?>