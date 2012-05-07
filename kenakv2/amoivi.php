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

// This javascript calculation script is provided for use in this software by Μιχαήλ Σολιδάκης.
//Το συγκεκριμένο scirpt υπολογισμού αμοιβών ενεργειακού επιθεωρητή χρησιμοποιήθηκε μετά από 
//επικοινωνία και τη σύμφωνη γνώμη του αρχικού δημιουργού Μιχαήλ Σολιδάκη, 
//όπως έχει δημοσιευτεί στον ιστόχωρο meleth.gr. Στοιχεία επικοινωνίας: www.meleth.gr
//Σαν μικρό δείγμα της βοήθειάς του στο παρόν λογισμικό παρέχεται σύνδεσμος προς τον αρχικό υπολογισμό
//Αν και αυτός ο υπολογισμός διανέμεται με την συνολική διανομή καλό θα ήταν να συμβουλεύεστε τον αρχικό
//δημιουργό για περαιτέρω χρήση του κώδικα.


require_once("includes/connection.php"); 
require_once("includes/functions.php"); 
find_selected_page(); 
include("includes/header_amoivi.php"); 
?>

<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>
		<td id="page">
		
<h3>Υπολογισμός Κόστους Ενεργειακής Επιθεώρησης (Π.Δ. 100/2010 ΦΕΚ177Α)</h3>
<table align='center' class="tabdiv1">

	<tr><td>Τύπος επιθεώρησης</td><td>
		<select id="xrisi" onchange="calc(); showhideoptions();">
		<option value="1">Κατοικία</option>
		<option value="2.5">Διαφορετική χρήση</option>
		<option value="50">Λέβητας / εγκατάσταση θέρμανσης</option>
		<option value="100">Εγκατάσταση Κλιματισμού</option>
		</select>
	</td></tr>
	
	
	
	<tr><td>&nbsp;</td><td></td></tr>
	
	<tr id="katoikia" onchange="calc();"><td>Κατοικία</td><td>
		<select id="spiti" onchange="calc();">
		<option value="1.5">Μονοκατοικία</option>
		<option value="2">Διαμέρισμα</option>
		<option value="1">Οικοδομή</option></select>
	</td></tr>

	<tr id="emvadon"><td>Εμβαδόν</td><td>
		<input type="text" value="" size="5" id="emv" onkeypress='validate(event);' onKeyUp='calc();'/> m&sup2;
	</td></tr>		
	
	<tr id="levitas" style="display:none"><td>Συνολική θερμική ισχύς&nbsp;</td><td>
		<select id="HkW" onchange="calc();">
		<option value="3"> Απο 20 έως 100 kW	</option>
		<option value="5"> Περισσότερο απο 100 kW</option></select>
	</td></tr>

	<tr id="levitaspalaios" style="display:none"><td>Συνολική θερμική ισχύς&nbsp;</td><td>
		<select id="Hage" onchange="calc();">
		<option value="1"> Εγκατάσταση νεότερη των 15 ετών</option>
		<option value="1.2"> Εγκατάσταση παλαιότερη των 15 ετών</option></select>
	</td></tr>
	
	<tr id="klimatismos" style="display:none">
	<td>Συνολική ψυκτική ισχύς&nbsp;</td>
	<td>
		<select id="klimatismoskW" onchange="calc();">
		<option value="3"> Απο 12 έως 100 kW	</option>
		<option value="5"> Περισσότερο απο 100 kW</option>
		</select>
	</td>
	</tr>

	<tr>
	<td>Φ.Π.Α.</td>
	<td><input type="text" size="5" value="23" id="vat" onkeypress='validate(event);' onKeyUp='calc();'/> %</td>
	</tr>

</table>

<table align="center" class="tabdiv1">
<tr><td>Αμοιβή μηχανικού&nbsp;</td><td id="apotelesmata">0.00</td><td>€</td></tr>
<tr><td>Φ.Π.Α.</td><td id="fpa">0.00</td><td>€</td></tr>
<tr><th>ΣΥΝΟΛΟ</th><th id="sum">0.00</th><th>€</th></tr>
<tr><td colspan=3>
<div id="min" style="display:none;">
<br><i>* Ελάχιστη αμοιβή</i>
</div>
</td></tr></table>
<br/><br/><br/>
<div align="center">
Ο συκγκεκριμένος υπολογισμός χρησιμοποιείται μετά από έγκριση του δημιουργού (Μιχαήλ Σολιδάκη) όπως αναρτήθηκε <a href="http://meleth.gr/Energy.html">ΕΔΩ</a>.
</div>
<script type="text/javascript">
function calc() 
{
xrisi = document.getElementById("xrisi"); 
var katoikiaMin = new Array(200,150,200);
if (xrisi.selectedIndex == 0) {document.getElementById("apotelesmata").innerHTML = Math.max((xrisi.options[xrisi.selectedIndex].value*document.getElementById("spiti").options[document.getElementById("spiti").selectedIndex].value*document.getElementById("emv").value),katoikiaMin[document.getElementById("spiti").selectedIndex]).toFixed(2);}
if (xrisi.selectedIndex == 1) {document.getElementById("apotelesmata").innerHTML = Math.max((xrisi.options[xrisi.selectedIndex].value*Math.min(1000,document.getElementById("emv").value) + 1.5*Math.max(0,document.getElementById("emv").value-1000)),300).toFixed(2);}
if (xrisi.selectedIndex == 2) {document.getElementById("apotelesmata").innerHTML = (xrisi.options[xrisi.selectedIndex].value*document.getElementById("HkW").options[document.getElementById("HkW").selectedIndex].value*document.getElementById("Hage").options[document.getElementById("Hage").selectedIndex].value).toFixed(2);}
if (xrisi.selectedIndex == 3) {document.getElementById("apotelesmata").innerHTML = (xrisi.options[xrisi.selectedIndex].value*document.getElementById("klimatismoskW").options[document.getElementById("klimatismoskW").selectedIndex].value).toFixed(2);}
document.getElementById("fpa").innerHTML=(parseFloat(document.getElementById("apotelesmata").innerHTML)*(document.getElementById("vat").value/100)).toFixed(2);
document.getElementById("sum").innerHTML=(parseFloat(document.getElementById("apotelesmata").innerHTML)+parseFloat(document.getElementById("fpa").innerHTML)).toFixed(2);
}
	
// Ρουτίνα ελέγχου για κείμενο στα κελιά που απαιτείται αριθμός 

function validate(evt) 

{
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
	if ( key != 46 && key != 8 ) {
	key = String.fromCharCode( key );
	var regex = /[0-9]|\./;
		if( !regex.test(key) ) {
		theEvent.returnValue = false;
		theEvent.preventDefault();
		}
	}
}

	</script>

		</td>
	</tr>
</table>

<?php include("includes/footer.php"); ?>