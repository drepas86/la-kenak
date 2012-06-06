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
backup_tables(DB_SERVER,DB_USER,DB_PASS,DB_NAME);


/* backup βάσης. Η function είναι παρακάτω */
function backup_tables($host,$user,$pass,$name,$tables = 'kataskeyi_an_a,
kataskeyi_an_b,kataskeyi_an_d,kataskeyi_an_n,kataskeyi_an_s,kataskeyi_dap,kataskeyi_drawing,
kataskeyi_floors,kataskeyi_ground,kataskeyi_hm,kataskeyi_meletis,kataskeyi_meletis_topo,kataskeyi_oro,
kataskeyi_skiaseis_an_a,kataskeyi_skiaseis_an_b,kataskeyi_skiaseis_an_d,kataskeyi_skiaseis_an_n,
kataskeyi_skiaseis_t_a,kataskeyi_skiaseis_t_b,kataskeyi_skiaseis_t_d,kataskeyi_skiaseis_t_n,
kataskeyi_stoixeia,kataskeyi_teyxos,kataskeyi_therm_eks,kataskeyi_therm_es,
kataskeyi_t_a,kataskeyi_t_b,kataskeyi_t_d,kataskeyi_t_n,
kataskeyi_xsystems_coldb,kataskeyi_xsystems_coldd,kataskeyi_xsystems_coldp,kataskeyi_xsystems_coldt,
kataskeyi_xsystems_kkm,kataskeyi_xsystems_light,
kataskeyi_xsystems_thermb,kataskeyi_xsystems_thermd,kataskeyi_xsystems_thermp,kataskeyi_xsystems_thermt,
kataskeyi_xsystems_ygrd,kataskeyi_xsystems_ygrp,kataskeyi_xsystems_ygrt,
kataskeyi_xsystems_znxa,kataskeyi_xsystems_znxb,kataskeyi_xsystems_znxd,kataskeyi_xsystems_znxiliakos,kataskeyi_xsystems_znxp,
kataskeyi_xwroi,kataskeyi_zwnes')
{
$namefile = $_GET["name"];	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	mysql_query("SET NAMES 'utf8'", $link);
	//Πίνακες
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//loop
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}

	//Αρχείο
	$date = date("d-m-Y-His", time());
	
	$handle = fopen('lakenak-sql-'.$namefile.'.sql','w+');
	echo "Το αρχείο lakenak-sql-" . $namefile . ".sql εγγράφηκε επιτυχώς";
	fwrite($handle,$return);
	fclose($handle);
}
?>