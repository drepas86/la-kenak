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
include ("../includes/database.php");
include ("../includes/connection.php");
include ("../includes/functions.php");
$host=DB_SERVER;
$user=DB_USER;
$pass=DB_PASS;
$name=DB_NAME;
$table_prefix = "kataskeyi";
$namefile = $_GET['name'];

//Σύνδεση, Χρησιμοποιώ διαφορετική από το connect . Για την ίδια αλλάξτε το $link σε $connection
$link = mysql_connect($host,$user,$pass);
mysql_select_db($name,$link);
mysql_query("SET NAMES 'utf8'", $link);

//πάρε τους πίνακες με παρόμοιο τίτλο τον $table_prefix. ΠΡΟΣΟΧΗ. Εαν το table prefix δεν είναι χαρακτηριστικό θα πάρει και άλλους.
$query = "SHOW TABLES FROM ".$name . " LIKE '%" . $table_prefix . "%'";
$result = mysql_query($query,$link) or die('cannot show tables');
if(mysql_num_rows($result))
{
	//Για να μην τα γραφω συνεχώς
	$tab = "\t";
	$br = "\n";
	$xml = '<?xml version="1.0" encoding="UTF-8"?>'.$br;
	$xml.= '<database name="'.$name.'">'.$br;
	
	//Για κάθε πίνακα στη βάση
	while($table = mysql_fetch_row($result))
	{
		//Γράψε στο xml τον πίνακα
		$xml.= $tab.'<table name="'.$table[0].'">'.$br;
		
		//πάρε τις γραμμές για αυτό τον πίνακα
		$query3 = 'SELECT * FROM '.$table[0];
		$records = mysql_query($query3,$link) or die('cannot select from table: '.$table[0]);
		
		//τα χαρακτηριστικά του
		$attributes = array('name','blob','maxlength','multiple_key','not_null','numeric','primary_key','table','type','default','unique_key','unsigned','zerofill');
		$xml.= $tab.$tab.'<columns>'.$br;
		$x = 0;
		while($x < mysql_num_fields($records))
		{
			$meta = mysql_fetch_field($records,$x);
			$xml.= $tab.$tab.$tab.'<column ';
			foreach($attributes as $attribute)
			{
				$xml.= $attribute.'="'.$meta->$attribute.'" ';
			}
			$xml.= '/>'.$br;
			$x++;
		}
		$xml.= $tab.$tab.'</columns>'.$br;
		
		//και βάλε τις τιμές
		$xml.= $tab.$tab.'<records>'.$br;
		while($record = mysql_fetch_assoc($records))
		{
			$xml.= $tab.$tab.$tab.'<record>'.$br;
			foreach($record as $key=>$value)
			{
				$xml.= $tab.$tab.$tab.$tab.'<'.$key.'>'.stripslashes($value).'</'.$key.'>'.$br;
			}
			$xml.= $tab.$tab.$tab.'</record>'.$br;
		}
		$xml.= $tab.$tab.'</records>'.$br;
		$xml.= $tab.'</table>'.$br;
	}
	$xml.= '</database>';
	
	//Τέλος σώσε το αρχείο
	
	$handle = fopen('lakenak-xml-'.$namefile.'.xml','w+');
	fwrite($handle,$xml);
	echo "Το αρχείο lakenak-xml-" . $namefile . ".xml" . " εγγράφηκε επιτυχώς";
	fclose($handle);
}
?>