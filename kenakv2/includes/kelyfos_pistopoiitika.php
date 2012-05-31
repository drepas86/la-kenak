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
?>

			<script type="text/javascript">
				document.getElementById('imgs').innerHTML="<img src=\"images/style/grass.png\"></img>";
			</script>
			<h2>ΠΕΑ</h2>
			
			<div id="tabvanilla" class="widget">
					<ul class="tabnav">  
					<li><a href="#tab-oikad">Απαιτήσεις</a></li>
					<li><a href="#tab-katak">Κατακόρυφα στοιχεία</a></li>
					<li><a href="#tab-oriz">Οριζόντια στοιχεία</a></li>
					<li><a href="#tab-entypa">Έντυπα</a></li>
					</ul>  
					

<!-- **************		ΟΙΚΟΔΟΜΙΚΗ ΑΔΕΙΑ   ******************************************-->			
			<div id="tab-oikad" class="tabdiv" > 
			<h3>Ανάλογα με την ημερομηνία έκδοσης της Οικοδομικής αδείας.</h3>
			
			<table border="1" width="500px">
			<tr>
			<th rowspan="2" valign="middle">Περίοδος έκδοσης οικοδομικής άδειας </th>
			<th rowspan="2" valign="middle">Θερμομονωτική προστασία</th>
			<th colspan="2">Κτήριο μελέτης</th>
			<th colspan="2">Κτήριο αναφοράς</th>
			</tr>
			<tr>
			<th>Υπολογισμός τιμών U</th>
			<th>Υπολογισμός θερμογεφυρών</th>
			<th>Υπολογισμός τιμών U</th>
			<th>Υπολογισμός θερμογεφυρών</th>
			</tr>
			
			<tr>
			<td rowspan="4" valign="middle" bgcolor="00FF00">Πριν από το 1979 (ανυπαρξία κανονισμού) </td>
			<td>Χωρίς θερμομονωτική προστασία </td>
			<td>Τιμές από πίνακα 3.4. </td>
			<td>όχι</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			</tr>
			
			<tr>
			<td>Μερική πρόνοια θερμικής προστασίας (εξαρχής πρόνοια ή μετέπειτα επέμβαση)</td>
			<td>Τιμές από πίνακα 3.4. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			</tr>
			
			<tr>
			<td>Μετέπειτα επεμβάσεις που καλύπτουν τις απαιτήσεις του Κ.Θ.Κ.</td>
			<td>Σύμφωνα με τη μελέτη ή με kmax Κ.Θ.Κ.</td>
			<td>U + 0,1 [W/(m2*K)]</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			</tr>
			
			<tr>
			<td>Μετέπειτα επεμβάσεις που καλύπτουν τις απαιτήσεις του Κ.Εν.Α.Κ.</td>
			<td>Σύμφωνα με τη μελέτη ή με Umax κατά Κ.Εν.Α.Κ.</td>
			<td>U + 0,1 [W/(m2*K)]</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			</tr>
			
			<tr>
			<td rowspan="4" valign="middle" bgcolor="00CC00">Περίοδος 1979 - 2010 (ισχύς Κ.Θ.Κ.)</td>
			<td>Χωρίς θερμομονωτική προστασία (μη εφαρμογή Κ.Θ.Κ.)</td>
			<td>Τιμές από πίνακα 3.4.</td>
			<td>όχι</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			</tr>
			
			<tr>
			<td>Πλημμελής εφαρμογή Κ.Θ.Κ.</td>
			<td>Τιμές από πίνακα 3.4.</td>
			<td>U + 0,1 [W/(m2*K)]</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			</tr>
			
			<tr>
			<td>Σύμφωνα με απαιτήσεις Κ.Θ.Κ.</td>
			<td>Σύμφωνα με τη μελέτη ή με kmax κατά Κ.Θ.Κ.</td>
			<td>U + 0,1 [W/(m2*K)]</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			</tr>
			
			<tr>
			<td>Κάλυψη των απαιτήσεων του Κ.Εν.Α.Κ. (εξαρχής πρόνοια ή μετέπειτα επέμβαση)</td>
			<td>Σύμφωνα με τη μελέτη</td>
			<td>U + 0,1 [W/(m2*K)]</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>U + 0,1 [W/(m2*K)]</td>
			</tr>
			
			<tr>
			<td rowspan="2" valign="middle" bgcolor="009900">Μετά το 2010 (ισχύς Κ.Εν.Α.Κ.)</td>
			<td>Πλημμελής εφαρμογή Κ.Εν.Α.Κ.</td>
			<td>Υποχρέωση βελτίωσης εντός έτους</td>
			<td>ναι</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>ναι</td>
			</tr>
			
			<tr>
			<td>Πλήρης εφαρμογή Κ.Εν.Α.Κ.</td>
			<td>Σύμφωνα με τη μελέτη ή με Umax κατά Κ.Εν.Α.Κ.</td>
			<td>ναι</td>
			<td>Umax κατά Κ.Εν.Α.Κ. </td>
			<td>ναι</td>
			</tr>
			
			</table>
			
			</div>
<!-- **************		ΥΦΙΣΤΑΜΕΝΑ ΚΑΤΑΚΟΡΥΦΑ ΣΤΟΙΧΕΙΑ   *****************************************-->		
			<div id="tab-katak" class="tabdiv" > 
			<h3>Υφιστάμενα κατακόρυφα στοιχεία [W/(m<sup>2</sup>*K)]</h3>
			
			<table border="1" width="700px">
			<tr>
			<th>Περιγραφή στοιχείου</th>
			<th colspan="3">Χωρίς θερμομονωτική προστασία</th>
			<th colspan="3">Με ανεπαρκή θερμομονωτική προστασία κατά Κ.Θ.Κ.</th>
			</tr>
			
			<tr>
			<th>Κατακόρυφα δομικά στοιχεία</th>
			<th>Σε επαφή με αέρα</th>
			<th>Σε επαφή με μη θερμαινόμ. χώρο</th>
			<th>Σε επαφή με έδαφος</th>
			<th>Σε επαφή με αέρα</th>
			<th>Σε επαφή με μη θερμαινόμ. χώρο</th>
			<th>Σε επαφή με έδαφος</th>
			</tr>
			
			<tr>
			<th colspan="7" bgcolor="CCFF00">Στοιχείο φέροντος οργανισμού οπλισμένου σκυροδέματος (πάχους μικρότερου των 80 cm)</th>
			</tr>
			<tr>
			<td>Ανεπίχριστο από τη μία ή τις δύο όψεις.</td>
			<td>3.65</td>
			<td>2.75</td>
			<td>4.30</td>
			<td>1.00</td>
			<td>0.90</td>
			<td>1.05</td>
			</tr>
			<tr>
			<td>Επιχρισμένο και από τις δύο όψεις.</td>
			<td>3.40</td>
			<td>2.60</td>
			<td>-</td>
			<td>1.00</td>
			<td>0.90</td>
			<td>-</td>
			</tr>
			<tr>
			<td>Επενδεδυμένο με απλή ή διακοσμητική οπτοπλινθοδομή.</td>
			<td>2.45</td>
			<td>2.00</td>
			<td>2.90</td>
			<td>0.90</td>
			<td>0.85</td>
			<td>0.95</td>
			</tr>
			<tr>
			<td>Επενδεδυμένο με αργολιθοδομή.</td>
			<td>2.90</td>
			<td>2.30</td>
			<td>3.25</td>
			<td>0.90</td>
			<td>0.85</td>
			<td>0.95</td>
			</tr>
			<tr>
			<td>Επενδεδυμένο με μαρμάρινες πλάκες.</td>
			<td>3.50</td>
			<td>2.05</td>
			<td>4.00</td>
			<td>1.00</td>
			<td>0.90</td>
			<td>1.05</td>
			</tr>
			<tr>
			<td>Επενδεδυμένο με γυψοσανίδα, τσιμεντοσανίδα, ξυλοσανίδα ή άλλες πλάκες.</td>
			<td>2.05</td>
			<td>1.75</td>
			<td>2.25</td>
			<td>0.80</td>
			<td>0.75</td>
			<td>0.85</td>
			</tr>
			
			<tr>
			<th colspan="7" bgcolor="CCFF00">Οπτοπλινθοδομή, φέρουσα ή πλήρωσης (με ή χωρίς κλειστό διάκενο αέρος)</th>
			</tr>
			<tr>
			<th colspan="7" bgcolor="CCFF99">Μπατική ή δικέλυφη δρομική οπτοπλινθοδομή</th>
			</tr>
			<tr>
			<td>Ανεπίχριστο από τη μία ή τις δύο όψεις.</td>
			<td>2.30</td>
			<td>1.90</td>
			<td>2.55</td>
			<td>0.85</td>
			<td>0.80</td>
			<td>0.90</td>
			</tr>
			<tr>
			<td>Επιχρισμένο και από τις δύο όψεις.</td>
			<td>2.20</td>
			<td>1.85</td>
			<td>-</td>
			<td>0.85</td>
			<td>0.80</td>
			<td>-</td>
			</tr>
			<tr>
			<td>Επενδεδυμένο με απλή ή διακοσμητική οπτοπλινθοδομή.</td>
			<td>1.90</td>
			<td>1.60</td>
			<td>2.05</td>
			<td>0.80</td>
			<td>0.75</td>
			<td>0.85</td>
			</tr>
			<tr>
			<td>Επενδεδυμένο με αργολιθοδομή.</td>
			<td>2.10</td>
			<td>1.75</td>
			<td>2.25</td>
			<td>0.80</td>
			<td>0.75</td>
			<td>0.85</td>
			</tr>
			<tr>
			<td>Επενδεδυμένο με μαρμάρινες πλάκες.</td>
			<td>2.25</td>
			<td>1.85</td>
			<td>2.45</td>
			<td>0.85</td>
			<td>0.80</td>
			<td>0.85</td>
			</tr>
			<tr>
			<td>Επενδεδυμένο με γυψοσανίδα, τσιμεντοσανίδα, ξυλοσανίδα ή άλλες πλάκες.</td>
			<td>1.55</td>
			<td>1.35</td>
			<td>1.65</td>
			<td>0.70</td>
			<td>0.70</td>
			<td>0.75</td>
			</tr>
			
			<tr>
			<th colspan="7" bgcolor="CCFF99">Δρομική οπτοπλινθοδομή</th>
			</tr>
			<tr>
			<td>Ανεπίχριστο από τη μία ή τις δύο όψεις.</td>
			<td>3.25</td>
			<td>2.50</td>
			<td>3.75</td>
			<td>0.95</td>
			<td>0.90</td>
			<td>1.00</td>
			</tr>
			<tr>
			<td>Επιχρισμένο και από τις δύο όψεις.</td>
			<td>3.05</td>
			<td>2.40</td>
			<td>-</td>
			<td>0.95</td>
			<td>0.85</td>
			<td>-</td>
			</tr>
			<tr>
			<td>Επενδεδυμένη διακοσμητική οπτοπλινθοδομή.</td>
			<td>2.50</td>
			<td>2.00</td>
			<td>2.75</td>
			<td>0.85</td>
			<td>0.80</td>
			<td>0.90</td>
			</tr>
			<tr>
			<td>Επενδεδυμένη με αργολιθοδομή.</td>
			<td>2.80</td>
			<td>2.25</td>
			<td>3.20</td>
			<td>0.90</td>
			<td>0.85</td>
			<td>0.95</td>
			</tr>
			<tr>
			<td>Επενδεδυμένη με μαρμάρινες πλάκες.</td>
			<td>3.10</td>
			<td>2.40</td>
			<td>3.55</td>
			<td>0.95</td>
			<td>0.85</td>
			<td>1.00</td>
			</tr>
			<tr>
			<td>Επενδεδυμένη με γυψοσανίδα, τσιμεντοσανίδα, ξυλοσανίδα ή άλλες πλάκες.</td>
			<td>1.90</td>
			<td>1.65</td>
			<td>2.05</td>
			<td>0.80</td>
			<td>0.75</td>
			<td>0.85</td>
			</tr>
			
			<tr>
			<th colspan="7" bgcolor="CCFF99">Αργολιθοδομή</th>
			</tr>
			<tr>
			<td>Ανεπίχριστο από τη μία ή τις δύο όψεις.</td>
			<td>4.25</td>
			<td>3.10</td>
			<td>5.00</td>
			<td>1.05</td>
			<td>0.95</td>
			<td>1.10</td>
			</tr>
			<tr>
			<td>Επιχρισμένη και από τις δύο όψεις.</td>
			<td>3.85</td>
			<td>2.85</td>
			<td>-</td>
			<td>1.00</td>
			<td>0.95</td>
			<td>-</td>
			</tr>
			<tr>
			<td>Επενδεδυμένη με διακοσμητική οπτοπλινθοδομή.</td>
			<td>2.85</td>
			<td>2.30</td>
			<td>3.25</td>
			<td>0.90</td>
			<td>0.85</td>
			<td>0.95</td>
			</tr>
			<tr>
			<td>Επενδεδυμένη με μαρμάρινες πλάκες.</td>
			<td>4.10</td>
			<td>3.00</td>
			<td>4.95</td>
			<td>1.00</td>
			<td>0.95</td>
			<td>1.05</td>
			</tr>
			<tr>
			<td>Επενδεδυμένη με γυψοσανίδα, τσιμεντοσανίδα, ξυλοσανίδα ή άλλες πλάκες.</td>
			<td>2.30</td>
			<td>1.95</td>
			<td>2.60</td>
			<td>0.85</td>
			<td>0.80</td>
			<td>0.90</td>
			</tr>
			
			</table>
			
			</div>
<!-- **************		ΥΦΙΣΤΑΜΕΝΑ ΟΡΙΖΟΝΤΙΑ ΣΤΟΙΧΕΙΑ   *****************************************-->		
			<div id="tab-oriz" class="tabdiv" > 
			<h3>Υφιστάμενα οριζόντια στοιχεία [W/(m<sup>2</sup>*K)]</h3>
			<table border="1" width="700px">
			<tr>
			<th>Περιγραφή στοιχείου</th>
			<th colspan="3">Χωρίς θερμομονωτική προστασία</th>
			<th colspan="3">Με ανεπαρκή θερμομονωτική προστασία κατά Κ.Θ.Κ.</th>
			</tr>
			
			<tr>
			<th>Κατακόρυφα δομικά στοιχεία</th>
			<th>Σε επαφή με αέρα</th>
			<th>Σε επαφή με μη θερμαινόμ. χώρο</th>
			<th>Σε επαφή με έδαφος</th>
			<th>Σε επαφή με αέρα</th>
			<th>Σε επαφή με μη θερμαινόμ. χώρο</th>
			<th>Σε επαφή με έδαφος</th>
			</tr>
			
			<tr>
			<th colspan="7" bgcolor="CCFF99">Επιστεγάσεις (με ή χωρίς ψευδοροφή)</th>
			</tr>
			<tr>
			<td>Συμβατικού τύπου δώμα.</td>
			<td>3.05</td>
			<td></td>
			<td></td>
			<td>0.95</td>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<td>Αντεστραμμένου τύπου δώμα.</td>
			<td></td>
			<td></td>
			<td></td>
			<td>0.95</td>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<td>Αεριζόμενο δώμα.</td>
			<td></td>
			<td>3.70</td>
			<td></td>
			<td>1.00</td>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<td>Φυτεμένο δώμα.</td>
			<td>1.20</td>
			<td></td>
			<td></td>
			<td>0.70</td>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<td>Οριζόντια οροφή κάτω από μη θερμομονωμένη στέγη.</td>
			<td>3.70</td>
			<td></td>
			<td></td>
			<td>1.00</td>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<td>Οροφή κάτω από μη θερμαινόμενο χώρο.</td>
			<td></td>
			<td>2.90</td>
			<td></td>
			<td></td>
			<td>0.90</td>
			<td></td>
			</tr>
			<tr>
			<td>Κεραμοσκεπή επί κεκλιμένης πλάκας οπλισμένου σκυροδέματος.</td>
			<td>4.70</td>
			<td></td>
			<td></td>
			<td>1.05</td>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<td>Κεραμοσκεπή επί κεκλιμένης ξύλινης στέγης.</td>
			<td>4.25</td>
			<td></td>
			<td></td>
			<td>1.00</td>
			<td></td>
			<td></td>
			</tr>
			
			<tr>
			<th colspan="7" bgcolor="CCFF99">Δάπεδα με επικάλυψη παντός τύπου (ξύλο, μάρμαρο, πλακάκι, μωσαϊκό κ.τ.λ.)</th>
			</tr>
			<tr>
			<td>Επάνω από ανοικτό υπόστυλο χώρο (πυλωτή).</td>
			<td>2.75</td>
			<td></td>
			<td></td>
			<td>0.90</td>
			<td></td>
			<td></td>
			</tr>
			<tr>
			<td>Επί εδάφους.</td>
			<td></td>
			<td></td>
			<td>3.10</td>
			<td></td>
			<td></td>
			<td>0.95</td>
			</tr>
			<tr>
			<td>Επάνω από μη θερμαινόμενο χώρο.</td>
			<td></td>
			<td>2.00</td>
			<td></td>
			<td></td>
			<td>0.80</td>
			<td></td>
			</tr>
			</table>
			</div>

			<div id="tab-entypa" class="tabdiv" >
			<font style="text-align: center; font-size:200%;">ΥΠΕΥΘΥΝΗ ΔΗΛΩΣΗ </font><br/>
			<font style="text-align: center; font-size:100%;">(Άρθρο 8 Ν.1599/1986)</font><br/><br/>


			<form name="yd" action="domika_kelyfos.php" method="post">
			<table border="1" style="width: 650px;">
			<tr>
			<td style="width: 20%;">ΠΡΟΣ:</td>
			<td style="width: 80%;" colspan="7"><input type="text" name="pros" size="80" /></td>
			</tr>
			<tr>
			<td style="width: 20%;">Ο – Η Όνομα:</td>
			<td style="width: 30%;" colspan="2"><input type="text" name="onoma" size="30" /></td>
			<td style="width: 15%;">Επώνυμο:</td>
			<td style="width: 25%;" colspan="4"><input type="text" name="epwnymo" size="30" /></td>
			</tr>
			<tr>
			<td style="width: 20%;">Όνομα και Επώνυμο Πατέρα: </td>
			<td colspan="7"><input type="text" name="pateras" size="80" /></td>
			</tr>
			<tr>
			<td style="width: 20%;">Όνομα και Επώνυμο Μητέρας: </td>
			<td colspan="7"><input type="text" name="mitera" size="80" /></td>
			</tr>
			<tr>
			<td style="width: 20%;">Ημερομηνία γέννησης(<sup>2</sup>): </td>
			<td colspan="7"><input type="text" name="gennisi" size="80" /></td>
			</tr>
			<tr>
			<td style="width: 20%;">Τόπος γέννησης: </td>
			<td colspan="7"><input type="text" name="topos_gen" size="80" /></td>
			</tr>
			<tr>
			<td style="width: 20%;">Αριθμός Δελτίου Ταυτότητας:</td>
			<td colspan="2" style="width: 35%;"><input type="text" name="taytotita" size="30" /></td>
			<td style="width: 10%;">Τηλ:</td>
			<td colspan="4" style="width: 35%;"><input type="text" name="til" size="30" /></td>
			</tr>
			<tr>
			<td style="width: 20%;">Τόπος Κατοικίας:</td>
			<td style="width: 20%;"><input type="text" name="topos" size="20" /></td>
			<td style="width: 5%;">Οδός:</td>
			<td style="width: 25%;"><input type="text" name="odos" size="20" /></td>
			<td style="width: 5%;">Αριθ:</td>
			<td style="width: 10%;"><input type="text" name="arithm" size="10" /></td>
			<td style="width: 5%;">ΤΚ:</td>
			<td style="width: 10%;"><input type="text" name="tkwdikas" size="10" /></td>
			</tr>
			<tr>
			<td style="width: 20%;">Αρ. Τηλεομοιοτύπου (Fax):</td>
			<td colspan="2"><input type="text" name="fax" size="30" /></td>
			<td>Δ/νση Ηλεκτρ. Ταχυδρομείου (Εmail):</td>
			<td colspan="4"><input type="text" name="mail" size="30" /></td>
			</tr>
			<tr>
			<td colspan="8">Με ατομική μου ευθύνη και γνωρίζοντας τις κυρώσεις (3), που προβλέπονται από τις διατάξεις της παρ. 6 του άρθρου 22 του Ν. 1599/1986, δηλώνω ότι:<td>
			</tr>
			<tr>
			<td colspan="8"><textarea rows="5" cols="100" name="dilwsi"></textarea> <td>
			</tr>
			</table>
			<input type="submit" name="yd_submit" value="Παραγωγή pdf">
			</form>
			<br/>
			(1) Αναγράφεται από τον ενδιαφερόμενο πολίτη ή Αρχή ή η Υπηρεσία του δημόσιου τομέα, που απευθύνεται η αίτηση.<br/>
			(2) Αναγράφεται ολογράφως. <br/>
			(3) «Όποιος εν γνώσει του δηλώνει ψευδή γεγονότα ή αρνείται ή αποκρύπτει τα αληθινά με έγγραφη υπεύθυνη δήλωση του άρθρου 
			8 τιμωρείται με φυλάκιση τουλάχιστον τριών μηνών. Εάν ο υπαίτιος αυτών των πράξεων σκόπευε να προσπορίσει στον εαυτόν του 
			ή σε άλλον περιουσιακό όφελος βλάπτοντας τρίτον ή σκόπευε να βλάψει άλλον, τιμωρείται με κάθειρξη μέχρι 10 ετών.<br/>
			(4) Σε περίπτωση ανεπάρκειας χώρου η δήλωση συνεχίζεται στην πίσω όψη της και υπογράφεται από τον δηλούντα ή την δηλούσα. <br/>
			</div>
</div>			

