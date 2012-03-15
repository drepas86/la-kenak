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

function xml2array($contents, $get_attributes=1, $priority = 'tag') {
/**
 * xml2array() will convert the given XML text to an array in the XML structure.
 * Link: http://www.bin-co.com/php/scripts/xml2array/
 * Arguments : $contents - The XML text
 *                $get_attributes - 1 or 0. If this is 1 the function will get the attributes as well as the tag values - this results in a different array structure in the return value.
 *                $priority - Can be 'tag' or 'attribute'. This will change the way the resulting array sturcture. For 'tag', the tags are given more importance.
 * Return: The parsed XML in an array form. Use print_r() to see the resulting array structure.
 * Examples: $array =  xml2array(file_get_contents('feed.xml'));
 *              $array =  xml2array(file_get_contents('feed.xml', 1, 'attribute'));
 */
    if(!$contents) return array();

    if(!function_exists('xml_parser_create')) {
        //print "'xml_parser_create()' function not found!";
        return array();
    }

    //Get the XML parser of PHP - PHP must have this module for the parser to work
    $parser = xml_parser_create('');
    xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
    xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
    xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
    xml_parse_into_struct($parser, trim($contents), $xml_values);
    xml_parser_free($parser);

    if(!$xml_values) return;//Hmm...

    //Initializations
    $xml_array = array();
    $parents = array();
    $opened_tags = array();
    $arr = array();

    $current = &$xml_array; //Refference

    //Go through the tags.
    $repeated_tag_index = array();//Multiple tags with same name will be turned into an array
    foreach($xml_values as $data) {
        unset($attributes,$value);//Remove existing values, or there will be trouble

        //This command will extract these variables into the foreach scope
        // tag(string), type(string), level(int), attributes(array).
        extract($data);//We could use the array by itself, but this cooler.

        $result = array();
        $attributes_data = array();
        
        if(isset($value)) {
            if($priority == 'tag') $result = $value;
            else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
        }

        //Set the attributes too.
        if(isset($attributes) and $get_attributes) {
            foreach($attributes as $attr => $val) {
                if($priority == 'tag') $attributes_data[$attr] = $val;
                else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
            }
        }

        //See tag status and do the needed.
        if($type == "open") {//The starting of the tag '<tag>'
            $parent[$level-1] = &$current;
            if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                $current[$tag] = $result;
                if($attributes_data) $current[$tag. '_attr'] = $attributes_data;
                $repeated_tag_index[$tag.'_'.$level] = 1;

                $current = &$current[$tag];

            } else { //There was another element with the same tag name

                if(isset($current[$tag][0])) {//If there is a 0th element it is already an array
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                    $repeated_tag_index[$tag.'_'.$level]++;
                } else {//This section will make the value an array if multiple tags with the same name appear together
                    $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array
                    $repeated_tag_index[$tag.'_'.$level] = 2;
                    
                    if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                        $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                        unset($current[$tag.'_attr']);
                    }

                }
                $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1;
                $current = &$current[$tag][$last_item_index];
            }

        } elseif($type == "complete") { //Tags that ends in 1 line '<tag />'
            //See if the key is already taken.
            if(!isset($current[$tag])) { //New Key
                $current[$tag] = $result;
                $repeated_tag_index[$tag.'_'.$level] = 1;
                if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data;

            } else { //If taken, put all things inside a list(array)
                if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...

                    // ...push the new element into that array.
                    $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                    
                    if($priority == 'tag' and $get_attributes and $attributes_data) {
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                    }
                    $repeated_tag_index[$tag.'_'.$level]++;

                } else { //If it is not an array...
                    $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                    $repeated_tag_index[$tag.'_'.$level] = 1;
                    if($priority == 'tag' and $get_attributes) {
                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                            
                            $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                            unset($current[$tag.'_attr']);
                        }
                        
                        if($attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                        }
                    }
                    $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken
                }
            }

        } elseif($type == 'close') { //Τελος του tag '</tag>'
            $current = &$parent[$level-1];
        }
    }
    
    return($xml_array);
}




function retrivexmldata($pinakas_num,$file){

$array =  xml2array(file_get_contents($file));
//Ελέγχω για ποιό πίνακα θέλω αποτελέσματα
if ($pinakas_num == 0){
$pinakas = "kataskeyi_an_a";
}
if ($pinakas_num == 1){
$pinakas = "kataskeyi_an_b";
}
if ($pinakas_num == 2){
$pinakas = "kataskeyi_an_d";
}
if ($pinakas_num == 3){
$pinakas = "kataskeyi_an_n";
}
if ($pinakas_num == 4){
$pinakas = "kataskeyi_an_s";
}
if ($pinakas_num == 5){
$pinakas = "kataskeyi_daporo";
}
if ($pinakas_num == 6){
$pinakas = "kataskeyi_hm";
}
if ($pinakas_num == 7){
$pinakas = "kataskeyi_meletis";
}
if ($pinakas_num == 8){
$pinakas = "kataskeyi_meletis_topo";
}
if ($pinakas_num == 9){
$pinakas = "kataskeyi_skiaseis_an_a";
}
if ($pinakas_num == 10){
$pinakas = "kataskeyi_skiaseis_an_b";
}
if ($pinakas_num == 11){
$pinakas = "kataskeyi_skiaseis_an_d";
}
if ($pinakas_num == 12){
$pinakas = "kataskeyi_skiaseis_an_n";
}
if ($pinakas_num == 13){
$pinakas = "kataskeyi_skiaseis_t_a";
}
if ($pinakas_num == 14){
$pinakas = "kataskeyi_skiaseis_t_b";
}
if ($pinakas_num == 15){
$pinakas = "kataskeyi_skiaseis_t_d";
}
if ($pinakas_num == 16){
$pinakas = "kataskeyi_skiaseis_t_n";
}
if ($pinakas_num == 17){
$pinakas = "kataskeyi_stoixeia";
}
if ($pinakas_num == 18){
$pinakas = "kataskeyi_t_a";
}
if ($pinakas_num == 19){
$pinakas = "kataskeyi_t_b";
}
if ($pinakas_num == 20){
$pinakas = "kataskeyi_t_d";
}
if ($pinakas_num == 21){
$pinakas = "kataskeyi_t_n";
}
if ($pinakas_num == 22){
$pinakas = "kataskeyi_teyxos";
}
if ($pinakas_num == 23){
$pinakas = "kataskeyi_therm_dap";
}
if ($pinakas_num == 24){
$pinakas = "kataskeyi_therm_eks";
}
if ($pinakas_num == 25){
$pinakas = "kataskeyi_therm_es";
}
if ($pinakas_num == 26){
$pinakas = "kataskeyi_xsystems_coldb";
}
if ($pinakas_num == 27){
$pinakas = "kataskeyi_xsystems_coldd";
}
if ($pinakas_num == 28){
$pinakas = "kataskeyi_xsystems_coldp";
}
if ($pinakas_num == 29){
$pinakas = "kataskeyi_xsystems_coldt";
}
if ($pinakas_num == 30){
$pinakas = "kataskeyi_xsystems_thermb";
}
if ($pinakas_num == 31){
$pinakas = "kataskeyi_xsystems_thermd";
}
if ($pinakas_num == 32){
$pinakas = "kataskeyi_xsystems_thermp";
}
if ($pinakas_num == 33){
$pinakas = "kataskeyi_xsystems_thermt";
}
if ($pinakas_num == 34){
$pinakas = "kataskeyi_xsystems_znxa";
}
if ($pinakas_num == 35){
$pinakas = "kataskeyi_xsystems_znxd";
}
if ($pinakas_num == 36){
$pinakas = "kataskeyi_xsystems_znxp";
}
if ($pinakas_num == 37){
$pinakas = "kataskeyi_xwroi";
}
if ($pinakas_num == 38){
$pinakas = "kataskeyi_zwnes";
}


//Μετράω τις στήλες του πίνακα και βάζω τα ονόματά τους στη μεταβλητή ${"column".$i}
$count_columns = 1+(count($array["database"]["table"][$pinakas_num]["columns"]["column"])-2)/2;
for ($i = 0; $i <= $count_columns; $i++) {
${"column".$i} = $array["database"]["table"][$pinakas_num]["columns"]["column"][$i."_attr"]["name"];
}

//Ελέγχω εαν ο πίνακας έχει μία μόνο μία γραμμή με τιμές και ανάλογα μετράω τις τιμές
if (!isset($array["database"]["table"][$pinakas_num]["records"]["record"][0]["id"])){
$count_records = 1;
}
else{
$count_records = count($array["database"]["table"][$pinakas_num]["records"]["record"]);
}

//Ξεκινάω τον πίνακα δίνοντας τα στοιχεία του και βάζω στην πρώτη γραμμή τις στήλες που έχω από τη μεταβλητή ${"column".$i}
echo "Πίνακας " . $pinakas . ". Σύνολο εγγραφών: " . $count_records . ". Σύνολο στηλών: " . $count_columns;
echo "<table>";
echo "<tr>";
for ($i = 0; $i <= $count_columns; $i++) {
echo "<td>" . ${"column".$i} . "</td>";
}

//Προσθέτω τις γραμμές με τις τιμές. Εαν ο πίνακας έχει μόνο μία γραμμή με τιμές η array [record] δεν έχει αρίθμηση παρά μόνο array με τις στήλες.
echo "</tr>";
if (!isset($array["database"]["table"][$pinakas_num]["records"]["record"][0]["id"])){
echo "<tr>";
for ($j = 0; $j <= $count_columns; $j++) {
echo "<td>" . $array["database"]["table"][$pinakas_num]["records"]["record"][${"column".$j}] . "</td>";
}
echo "</tr>";
}
//Διαφορετικά η array [record] έχει αρίθμηση και σε κάθε αριθμό υπάρχουν array με τις στήλες.
else
{
for ($i = 0; $i <= $count_records; $i++) {
	echo "<tr>";
	for ($j = 0; $j <= $count_columns; $j++) {
    ${"record".$i} = $array["database"]["table"][$pinakas_num]["records"]["record"][$i][${"column".$j}];
	echo "<td>" . ${"record".$i} . "</td>";
	}
	echo "</tr>";
}
}
//Κλείνει ο πίνακας.
echo "</table>";
echo "<br/><br/>";

}





function insertxmldata($pinakas_num,$file){

$array =  xml2array(file_get_contents($file));
//Ελέγχω για ποιό πίνακα θέλω αποτελέσματα
if ($pinakas_num == 0){
$pinakas = "kataskeyi_an_a";
}
if ($pinakas_num == 1){
$pinakas = "kataskeyi_an_b";
}
if ($pinakas_num == 2){
$pinakas = "kataskeyi_an_d";
}
if ($pinakas_num == 3){
$pinakas = "kataskeyi_an_n";
}
if ($pinakas_num == 4){
$pinakas = "kataskeyi_an_s";
}
if ($pinakas_num == 5){
$pinakas = "kataskeyi_daporo";
}
if ($pinakas_num == 6){
$pinakas = "kataskeyi_hm";
}
if ($pinakas_num == 7){
$pinakas = "kataskeyi_meletis";
}
if ($pinakas_num == 8){
$pinakas = "kataskeyi_meletis_topo";
}
if ($pinakas_num == 9){
$pinakas = "kataskeyi_skiaseis_an_a";
}
if ($pinakas_num == 10){
$pinakas = "kataskeyi_skiaseis_an_b";
}
if ($pinakas_num == 11){
$pinakas = "kataskeyi_skiaseis_an_d";
}
if ($pinakas_num == 12){
$pinakas = "kataskeyi_skiaseis_an_n";
}
if ($pinakas_num == 13){
$pinakas = "kataskeyi_skiaseis_t_a";
}
if ($pinakas_num == 14){
$pinakas = "kataskeyi_skiaseis_t_b";
}
if ($pinakas_num == 15){
$pinakas = "kataskeyi_skiaseis_t_d";
}
if ($pinakas_num == 16){
$pinakas = "kataskeyi_skiaseis_t_n";
}
if ($pinakas_num == 17){
$pinakas = "kataskeyi_stoixeia";
}
if ($pinakas_num == 18){
$pinakas = "kataskeyi_t_a";
}
if ($pinakas_num == 19){
$pinakas = "kataskeyi_t_b";
}
if ($pinakas_num == 20){
$pinakas = "kataskeyi_t_d";
}
if ($pinakas_num == 21){
$pinakas = "kataskeyi_t_n";
}
if ($pinakas_num == 22){
$pinakas = "kataskeyi_teyxos";
}
if ($pinakas_num == 23){
$pinakas = "kataskeyi_therm_dap";
}
if ($pinakas_num == 24){
$pinakas = "kataskeyi_therm_eks";
}
if ($pinakas_num == 25){
$pinakas = "kataskeyi_therm_es";
}
if ($pinakas_num == 26){
$pinakas = "kataskeyi_xsystems_coldb";
}
if ($pinakas_num == 27){
$pinakas = "kataskeyi_xsystems_coldd";
}
if ($pinakas_num == 28){
$pinakas = "kataskeyi_xsystems_coldp";
}
if ($pinakas_num == 29){
$pinakas = "kataskeyi_xsystems_coldt";
}
if ($pinakas_num == 30){
$pinakas = "kataskeyi_xsystems_thermb";
}
if ($pinakas_num == 31){
$pinakas = "kataskeyi_xsystems_thermd";
}
if ($pinakas_num == 32){
$pinakas = "kataskeyi_xsystems_thermp";
}
if ($pinakas_num == 33){
$pinakas = "kataskeyi_xsystems_thermt";
}
if ($pinakas_num == 34){
$pinakas = "kataskeyi_xsystems_znxa";
}
if ($pinakas_num == 35){
$pinakas = "kataskeyi_xsystems_znxd";
}
if ($pinakas_num == 36){
$pinakas = "kataskeyi_xsystems_znxp";
}
if ($pinakas_num == 37){
$pinakas = "kataskeyi_xwroi";
}
if ($pinakas_num == 38){
$pinakas = "kataskeyi_zwnes";
}

//Μετράω τις στήλες του πίνακα και βάζω τα ονόματά τους στη μεταβλητή ${"column".$i}
$count_columns = 1+(count($array["database"]["table"][$pinakas_num]["columns"]["column"])-2)/2;
for ($i = 0; $i <= $count_columns; $i++) {
${"column".$i} = $array["database"]["table"][$pinakas_num]["columns"]["column"][$i."_attr"]["name"];
}

//Ελέγχω εαν ο πίνακας έχει μία μόνο μία γραμμή με τιμές και ανάλογα μετράω τις τιμές
if (!isset($array["database"]["table"][$pinakas_num]["records"]["record"][0]["id"])){
$count_records = 1;
}
else{
$count_records = count($array["database"]["table"][$pinakas_num]["records"]["record"]);
}

//Εμφανίζω τις τιμές των γραμμών και των στηλών με το όνομα του πίνακα
echo "Πίνακας " . $pinakas . ". Σύνολο εγγραφών: " . $count_records . ". Σύνολο στηλών: " . $count_columns;

//Προσθέτω τις γραμμές με τις τιμές. Εαν ο πίνακας έχει μόνο μία γραμμή με τιμές η array [record] δεν έχει αρίθμηση παρά μόνο array με τις στήλες.
if (!isset($array["database"]["table"][$pinakas_num]["records"]["record"][0]["id"])){
//Διαγραφή και αυτόματη δημιουργία του πίνακα με τα ίδια χαρακτηριστικά. Όχι αυτά του XML. Αυτό για να διασφαλίσω οτι δεν χαλάω τα autoincrement, πχ κάποιου άλλου ή ότι άλλη αλλαγή έχει κάνει.
$query_del = "TRUNCATE TABLE ".$pinakas;
$result = mysql_query($query_del);

//Προτιμώ το INSERT αν και σε κάποιες περιπτώσεις θα μπορούσα να βάλω update. είτε το ωραίο REPLACE INTO αλλά αν δεν υπάρχει η εγγραφή με αυτά κολλάει.
//Τα loop δεν βρίσκονται γύρω από το query για να περιορίσω της εγγραφές στη βάση. Κάθε πίνακας μπαίνει με τη "μία"...
$query = "INSERT INTO ".$pinakas." ";
$query .= "(";
for ($i = 0; $i <= $count_columns-2; $i++) {
$query .= ${"column".$i} . ",";
}
$last_val = $count_columns-1;
$query .= ${"column".$last_val};
$query .= ") ";
$query .= "VALUES ('";
for ($i = 0; $i <= $count_columns-2; $i++) {
$query .= $array["database"]["table"][$pinakas_num]["records"]["record"][${"column".$i}] . "', '";
}
$query .= $array["database"]["table"][$pinakas_num]["records"]["record"][${"column".$last_val}] . "')";
$result = mysql_query($query);
echo "<p>" . mysql_error() . "</p>";

if ($result) {
			// Εγγραφή επιτυχής
			//Δεν εμφανίζει κάτι γιατί είμαι σε loop και θα εμφανίσει όσα ΟΚ είναι και οι στήλες
			}
else {
			// Λάθος.
			echo "<p>Λάθος για στήλη</p>".$i;
			echo "<p>" . mysql_error() . "</p>";
			}

}
//Διαφορετικά η array [record] έχει αρίθμηση και σε κάθε αριθμό υπάρχουν array με τις στήλες.
else
{
$query_del = "TRUNCATE TABLE ".$pinakas;
$result = mysql_query($query_del);

for ($i = 0; $i <= $count_records-1; $i++) {
	$query = "INSERT INTO ".$pinakas." ";
	$query .= "(";
		for ($j = 0; $j <= $count_columns-2; $j++) {
		$query .= ${"column".$j} . ",";
		}
	$last_val = $count_columns-1;
	$query .= ${"column".$last_val};
	$query .= ") ";
	$query .= "VALUES ('";
		for ($j = 0; $j <= $count_columns-2; $j++) {
		$query .= $array["database"]["table"][$pinakas_num]["records"]["record"][$i][${"column".$j}] . "', '";
		}
	$query .= $array["database"]["table"][$pinakas_num]["records"]["record"][$i][${"column".$last_val}] . "')";
	$result = mysql_query($query);
	echo "<p>" . mysql_error() . "</p>";
	
}
}
echo "  ΟΚ!!!";
echo "<br/>";


}

?>