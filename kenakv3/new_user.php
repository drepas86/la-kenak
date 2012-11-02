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

require_once("includes/session.php");
require_once("includes/connection.php");
require_once("includes/functions.php");
confirm_logged_in();

	include_once("includes/form_functions.php");
	
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('username', 'password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('username' => 30, 'password' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$username = trim(mysql_prep($_POST['username']));
		$password = trim(mysql_prep($_POST['password']));
		$hashed_password = sha1($password);

		if ( empty($errors) ) {
		
		//Έλεγχος εαν υπάρχει ήδη ο χρήστης
		$strSQL = "SELECT * FROM users WHERE username='".$username."'";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$num_rows = mysql_num_rows($objQuery);
			if ($num_rows > 0){$message = "<font color=\"red\">ΠΡΟΣΟΧΗ! Υπάρχει άλλος χρήστης με το ίδιο όνομα.</font>";}
		
			if ($num_rows == 0){ //Δεν υπάρχει ήδη ο χρήστης
				$query = "INSERT INTO users (
								username, hashed_password
							) VALUES (
								'{$username}', '{$hashed_password}'
							)";
				$result = mysql_query($query, $connection);
				if ($result) {
					$message = "Ο χρήστης δημιουργήθηκε επιτυχώς.";
				} else {
					$message = "Ο χρήστης δεν μπορεί να δημιουργηθεί.";
					$message .= "<br />" . mysql_error();
				}
			}
		} else {
				if (count($errors) == 1) {
					$message = "Παρουσιάστηκε ένα σφάλμα στη φόρμα.";
				} else {
					$message = "Παρουσιάστηκαν " . count($errors) . " σφάλματα στη φόρμα.";
				}
		}
	} else { // Form has not been submitted.
		$username = "";
		$password = "";
	}

include("includes/header.php");

?>

<table id="structure">
	<tr>
		<td id="navigation">
			<a href="staff.php">Επιστροφή στο μενού χρήστη</a><br />
			<br />
		</td>
		<td id="page">

<?php		
if ($_SESSION['username']=="admin")
{
?>
			<h2>Δημιουργία νέου χρήστη</h2>
			<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
			<?php if (!empty($errors)) { display_errors($errors); } ?>
			<form action="new_user.php" method="post">
			<table>
				<tr>
					<td>Όνομα χρήστη:</td>
					<td><input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" /></td>
				</tr>
				<tr>
					<td>Κωδικός:</td>
					<td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" /></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Create user" /></td>
				</tr>
			</table>
			</form>

<h2>Εγγεγραμένοι χρήστες</h2>
<?php		
echo "<table border=\"1\">";
echo "<tr><td>Όνομα</td><td>Κωδικός</td></tr>";
$strSQL = "SELECT * FROM users ORDER BY username";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$num_rows_users = mysql_num_rows($objQuery);
$i=0;
while($objResult[] = mysql_fetch_array($objQuery)){
echo "<tr><td>".$objResult[$i]['username']."</td><td>".$objResult[$i]['hashed_password']."</td></tr>";
$i++;
}

echo "</table>";
echo "Σύνολο: ".$num_rows_users;

}else{
echo "Δεν έχετε δικαιώματα δημιουργίας χρήστη. Μόνο ο διαχειριστής έχει τέτοια δικαιώματα. Επικοινωνήστε μαζί του ή συνδεθείτε ως διαχειριστής";
}
?>			
		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>