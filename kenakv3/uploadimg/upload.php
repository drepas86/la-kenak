<?php
$idir = "uploadimg/images/";   // Διαδρομή για την αρχική εικόνα
$tdir = "uploadimg/images/pea/";   // Διαδρομή για την μικρότερη εικόνα του ΠΕΑ
$twidth = "800";   // Μέγιστο πλάτος εικόνας για ΠΕΑ - Ορίζω γύρω στα 800-1024 για να βγει η εικόνα γύρω στα 150kb
$theight = "800";   // Μέγιστο ύψος εικόνας για ΠΕΑ - Ορίζω γύρω στα 800-1024 για να βγει η εικόνα γύρω στα 150kb

   // Φόρμα εικόνας   ?>
  <form method="post" action="kenak.php?page=2#tab-img" enctype="multipart/form-data">
   Αρχείο όψης:<br />
  <input type="file" name="imagefile" class="form">
  <br /><br />
  <input name="submitimg" type="submit" value="Ανέβασε" class="formimg">  <input type="reset" value="Καθαρισμός" class="formimg">
  </form>
<? 

	if (isset($_POST['submitimg'])) {   // Ανέβασμα / αλλαγή μεγέθους
  $url = $_FILES['imagefile']['name'];   // Θέσε $url ίσο με το όνομα της εικόνας
  if ($_FILES['imagefile']['type'] == "image/jpg" || $_FILES['imagefile']['type'] == "image/jpeg" || $_FILES['imagefile']['type'] == "image/pjpeg") {
    $file_ext = strrchr($_FILES['imagefile']['name'], '.');   // Η επέκταση της εικόνας
    $copy = copy($_FILES['imagefile']['tmp_name'], "$idir" . $_FILES['imagefile']['name']);   // Move Image From Temporary Location To Permanent Location
    if ($copy) {   // If The Script Was Able To Copy The Image To It's Permanent Location
      print 'Η εικόνα ανέβηκε επιτυχώς.<br />';   // Η εικόνα ανέβηκε επιτυχώς
      $simg = imagecreatefromjpeg("$idir" . $url);   // Προσωρινή εικόνα για να φτιάξω την μικρότερη μετά
      $currwidth = imagesx($simg);   // Πλάτος αρχικής εικόνας
      $currheight = imagesy($simg);   // Ύψος αρχικής εικόνας
      if ($currheight > $currwidth) {   // Εαν το ύψος είναι μεγαλύτερο του πλάτους η εικόνα τραβήχτηκε κατακόρυφα
         $zoom = $twidth / $currheight;   // Length Ratio για το πλάτος
         $newheight = $theight;   // Το ύψος είναι το μέγιστο ύψος
         $newwidth = $currwidth * $zoom;   // Νέο πλάτος
      } else {    // Αλλιώς υπέθεσε πως το πλάτος είναι μεγαλύτερο του μήκους (το ίδιο και εαν είναι ίσα)
        $zoom = $twidth / $currwidth;   // Length Ratio για το ύψος
        $newwidth = $twidth;   // Το πλάτος είναι το μέγιστο πλάτος
        $newheight = $currheight * $zoom;   // Νέο ύψος
      }
      $dimg = imagecreate($newwidth, $newheight);   // Νέα εικόνα
      imagetruecolortopalette($simg, false, 256);   // Νέο χρώμα
      $palsize = ImageColorsTotal($simg);
      for ($i = 0; $i < $palsize; $i++) {   // Μέτρημα χρωμάτων παλέτας
       $colors = ImageColorsForIndex($simg, $i);   // Μέτρημα χρωμάτων σε χρήση
       ImageColorAllocate($dimg, $colors['red'], $colors['green'], $colors['blue']);   // Τι χρώματα θα χρησιμοποιήσει η εικόνα - για το server
      }
      imagecopyresized($dimg, $simg, 0, 0, 0, 0, $newwidth, $newheight, $currwidth, $currheight);   // Αντιγραφή διορθωμένης εικόνας στη νέα για να σωθεί
      imagejpeg($dimg, "$tdir" . 'user-'.$_SESSION['user_id'].'meleti-'.$_SESSION['meleti_id'].'.jpg');   // Αποθήκευση της εικόνας
	  $filesize = round(filesize($tdir.'user-'.$_SESSION['user_id'].'meleti-'.$_SESSION['meleti_id'].'.jpg')/1024, 2);
      imagedestroy($simg);   // Καταστροφή της προσωρινής εικόνας
      imagedestroy($dimg);   // Καταστροφή της δεύτερης προσωρινής εικόνας
      print 'Η εικόνα για το ΠΕΑ σώθηκε επιτυχώς στο φάκελο /'.$tdir. ' (width:'.$newwidth.'px, height:'.$newheight.' px, μέγεθος:'.$filesize.'Kb)';   // επιτυχής αλλαγή μεγέθους
	  unlink($idir.$_FILES['imagefile']['name']);
    } else {
      print '<font color="#FF0000">ΛΑΘΟΣ: Προέκυψε σφάλμα κατά την φόρτωση της εικόνας στο server.</font>';   // Απέτυχε το ανέβασμα της εικόνας
    }
  } else {
    print '<font color="#FF0000">ΛΑΘΟΣ: Λάθος τύπος αρχείου (επιτρέπονται μόνο .jpg ή .jpeg. Η δικιά σας εικόνα είναι: ';   // Μήνυμα σε λάθος τύπο αρχείου
    print $file_ext;   // η επέκταση της αρχικής εικόνας
    print '.</font>';
  }
}


if (file_exists($tdir.'user-'.$_SESSION['user_id'].'meleti-'.$_SESSION['meleti_id'].'.jpg')) {
    echo '<br/>Προεπισκόπιση εικονας ('.round(filesize($tdir.'user-'.$_SESSION['user_id'].'meleti-'.$_SESSION['meleti_id'].'.jpg')/1024, 2).'Kb):
	  <br/>';
	echo '<img src="'.$tdir.'user-'.$_SESSION['user_id'].'meleti-'.$_SESSION['meleti_id'].'.jpg">';
} else {
    echo "Δεν έχετε ανεβάσει ακόμα εικόνα για τη μελέτη/ΠΕΑ";
}
 ?>