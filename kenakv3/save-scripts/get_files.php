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

require_once("../includes/session.php");
confirm_logged_in();

class ExtensionFilterIterator extends FilterIterator
{

protected $_extensions = array();

function __construct( Iterator $iterator , $extension )
{
parent::__construct( $iterator );
if( is_string( $extension ) ){
$this->_extensions[] = $extension;
}
 
if( is_array( $extension ) ){
$this->_extensions = $extension;
}
}
 

function accept()
{
$item = $this->getInnerIterator()->current();
if( $item->isFile() && in_array( substr( $item->getFilename(), ( strrpos( $item->getFilename(), '.') + 1 ) ), $this->_extensions ) ){
return true;
}
return false;
}
}


//Διαδρομή
$path = '../save-scripts/';

$iterator = new ExtensionFilterIterator( new DirectoryIterator( $path ), array( 'xml' ) );

echo "Σύνολο αρχείων μελετών στο φάκελο save-scripts:";
echo iterator_count($iterator);

echo "<br/>";
echo "<table><tr><td>Αρχείο</td><td>Ημερομηνία</td><td>Μέγεθος</td><td>Προεπισκόπηση</td><td>Φόρτωση μελέτης</td><td>Διαγραφή</td></tr>";
echo "<tr>";
foreach( $iterator as $file ){
echo "<tr>";
$filename = $file->getFilename().PHP_EOL;

echo "<td>";
echo "<a href=\"" . $path . $filename . "\">" . $file . "</a>";
echo "</td>";

echo "<td>";
echo date ("F d Y H:i:s", filemtime($file));
echo "</td>";

echo "<td>";
echo round(filesize($file)/ 1024, 2) . "Kb";
echo "</td>";


echo "<td>";
echo "<a href=\"xmltotables.php?filename=" . $filename . "\"> Προεπισκόπηση </a>";
echo "</td>";

echo "<td>";
echo "<a href=\"loadmeleti.php?filename=" . $filename . "\"> Φόρτωση </a>";
echo "</td>";

echo "<td>";
echo "<a href=\"delete_file.php?filename=" . $filename . "\"> Διαγραφή </a>";
echo "</td>";
}
echo "</table>";
?>

<br/>
Ανεβάστε ένα αρχείο xml

<form action="upload_file.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="userfile" id="file" />
<br />
<input type="submit" name="submit" value="Ανεβάστε το αρχείο" />
</form>





