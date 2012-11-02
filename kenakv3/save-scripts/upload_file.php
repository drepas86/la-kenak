<?
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

   // Επιλογές
      $allowed_filetypes = array('.xml'); // Διαχωρισμένα με κόμα και σε εισαγωγικά τα αρχεία που επιτρέπονται
      $max_filesize = 1048576; // Σε bytes το μέγεθος (1MB).
      $upload_path = './'; // The place the files will be uploaded to (currently a 'files' directory).
 
   $filename = $_FILES['userfile']['name']; // Το όνομα του αρχείου μαζί με την κατάληξη
   $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Η κατάληξη του αρχείου.
 
   // Επιτρέπεται το αρχείο. Αν ναι προχώρα αλλιώς μήνυμα.
   if(!in_array($ext,$allowed_filetypes))
      die('Δεν επιτρέπεται η κατάληξη που δηλώσατε. Δοκιμάστε ξανά με αρχεία' . $allowed_filetypes[0]);
 
   // Έλεγχος μεγέθους. Η php έχει προβλήματα με αρχεία μεγαλύτερα των 2Mb πολλές φορές.
   if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
      die('Η μελέτη που προσπαθείτε να φορτώσετε είναι πολύ μεγάλη σε μέγεθος.');
 
   // Μπορεί να ανέβει το αρχείο;;;
   if(!is_writable($upload_path))
      die('Προέκυψε πρόβλημα κατά την αποθήκευση της μελέτης, Αλλάξτε τα δικαιώματα σε 777 στο φάκελο save-scripts ή αποθηκεύστε το αρχείο χειροκίνητα εκεί.');
 
   // Upload στη διαδρομή που ορίστηκε.
   if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename))
         echo 'Η μελέτη ανέβηκε επιτυχώς, Δείτε την <a href="' . $upload_path . $filename . '" title="Your File">εδώ</a>'; // οκ.
      else
         echo 'Υπήρξε πρόβλημα με την αποθήκευση της μελέτης.  Δοκιμάστε ξανά.'; // Αποτυχία :(.
 
?>
<a href="get_files.php">Πίσω</a>