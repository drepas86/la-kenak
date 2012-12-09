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
<?php 
require_once("includes/connection.php");
require_once("includes/functions.php");
require_once("includes/session.php");

add_column_if_not_exist("anoigmata_alouminio", "rec","VARCHAR(300)");
add_column_if_not_exist("anoigmata_alouminio_thermo", "rec","VARCHAR(300)");
add_column_if_not_exist("anoigmata_doors", "rec","VARCHAR(300)");
add_column_if_not_exist("anoigmata_plastic", "rec","VARCHAR(300)");
add_column_if_not_exist("anoigmata_wood", "rec","VARCHAR(300)");
confirm_logged_in();
find_selected_page();
include("includes/header.php");
include("includes/scripts.php");


if (isset($_SESSION['user_id'])){$login_message="Καλωσήρθες, <a href=\"staff.php\">".$_SESSION['username']."</a>";}
if (isset($_SESSION['meleti_id'])){$login_message.=" - Μελέτη: ".$_SESSION['meleti_perigrafi'];}
if (!isset($_SESSION['meleti_id'])){$login_message.=" - Επιλέξτε μελέτη πρώτα";}
if (!isset($_SESSION['user_id'])){$login_message="<a href=\"login.php\">Σύνδεση</a>";}
?>

<div class="topright"><a href="index.php"><img src="images/home.png" align="right"></img></a></div>
<table id="structure">
	<tr>

<?php if ($sel_page) { ?>
	<td id="navigation">
			<?php echo public_navigation($sel_subject, $sel_page); ?>
		</td>
<?php } ?>
		<td id="page">
	
<?php
include_once("includes/apotelesmata_index.php");
$pin[1]="anoigmata_alouminio";
$pin[2]="anoigmata_alouminio_thermo";
$pin[3]="anoigmata_doors";
$pin[4]="anoigmata_plastic";
$pin[5]="anoigmata_wood";
$pin[6]="domika_ylika_beton";
$pin[7]="domika_ylika_diafora";
$pin[8]="domika_ylika_ygromonwseis";
$pin[9]="domika_ylika_epixrismata";
$pin[10]="domika_ylika_gypsosanides";
$pin[11]="domika_ylika_keramidia";
$pin[12]="domika_ylika_ksyleia";
$pin[13]="domika_ylika_monwtika";
$pin[14]="domika_ylika_monwtikadow";
$pin[15]="domika_ylika_plakes";
$pin[16]="domika_ylika_skyrodemata";
$pin[17]="domika_ylika_toyvla";
$pin[18]="domika_ylika_epifstraera";
$pin[19]="domika_dapedo_edafous";
$pin[20]="domika_orofes";
$pin[21]="domika_pilotis";
$pin[22]="domika_toixoi";
$tb_name="jtable_container";
?>
			<?php if ($sel_page) { ?>
				<h2><?php echo $sel_page['menu_name']; ?></h2>
				<div class="page-content">
					<?php 
					echo "<br/>";
					if ($sel_page["id"] < 6){
						$ped=$pin[$sel_page["id"]];
						$dig="0|0|3|3|0|0|0|0|0|0|0";
						$fields="fields: {
							id: {key: true,create: false,edit: false,list: false},
							name: {title: 'Ονομα',width: '60%'},
							u: {title: 'Θερμική Αγωγιμότητα',width: '20%',listClass: 'center'},
							g: {title: 'g',width: '20%',listClass: 'center'}
						}";
						include('includes/jtable_b.php');
					}
						
					if ($sel_page["id"] > 5 && $sel_page["id"] < 18)	{
						$ped=$pin[$sel_page["id"]];
						$dig="0|0|3|0|2|3|0|0|0|0|0";
						$fields="fields: {
							id: {key: true,create: false,edit: false,list: false},
							name: {title: 'Ονομα',width: '30%'},
							agwg_l: {title: 'Θερμική Αγωγιμότητα',width: '15%',listClass: 'center'},
							pykn_r: {title: 'Πυκνότητα',width: '15%',listClass: 'center'},
							paxos: {title: 'Πάχος',width: '15%',listClass: 'center'},
							cp: {title: 'Ειδική Θερμότητα',width: '15%',listClass: 'center'},
							hatch: {title: 'Γραμμοσκίαση',width: '10%',listClass: 'center'}
						}";
						include('includes/jtable_b.php');
					}

					if ($sel_page["id"] == 18)	{
						$ped=$pin[$sel_page["id"]];
						$dig="0|0|3|0|0|0|0|0|0|0|0";
						$fields="fields: {
							id: {key: true,create: false,edit: false,list: false},
							name: {title: 'Ονομα',width: '50%'},
							r: {title: 'Θερμική Αντίσταση',width: '30%',listClass: 'center'},
							hatch: {title: 'Γραμμοσκίαση',width: '20%',listClass: 'center'}
						}";
						include('includes/jtable_b.php');
					}
					
					if ($sel_page["id"] > 18 && $sel_page["id"] < 23)	{
						$ped=$pin[$sel_page["id"]];
						$dig="0|0|3|3|2|2|0|0|0|0|0";
						$fields="fields: {
							id: {key: true,create: false,edit: false,list: false},
							name: {title: 'Ονομα',width: '40%'},
							u: {title: 'U',width: '15%',listClass: 'center'},
							cm: {title: 'Cm',width: '15%',listClass: 'center'},
							paxos: {title: 'Πάχος',width: '15%',listClass: 'center'},
							baros: {title: 'Βάρος',width: '15%',listClass: 'center'}
						}";
						include('includes/jtable_b.php');
					}
					
					if (($sel_page["id"] > 22 && $sel_page["id"] < 27) OR ($sel_page["id"] > 55 && $sel_page["id"] < 58))	{
					$vivliothikes = get_skiaseis($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td>";
						if ($sel_page["id"] == 57){echo "<td>Τύπος περσίδων</td>";}
						echo "<td>Μοίρες (degrees)</td><td>Περίοδος</td><td>Β (γ=0deg)</td><td>ΒΑ (γ=45deg)</td><td>Α (γ=90deg)</td><td>ΝΑ (γ=135deg)</td><td>Ν (γ=180deg)</td><td>ΝΔ (γ=225deg)</td><td>Δ (γ=270deg)</td><td>ΒΔ (γ=315deg)</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["id"] . "</td>";
						if ($sel_page["id"] == 57){echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["type"] . "</td>";}
						echo "<td class=\"vivliothiki\" width=\"50\">" . $vivliothikes[$i]["deg"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"50\">" . $vivliothikes[$i]["periode"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["b"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["ba"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["a"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["na"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["n"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["nd"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["d"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"10\">" . $vivliothikes[$i]["bd"] . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)";
					}
					
					if ($sel_page["id"] == 27)	{
					$vivliothikes = get_energy($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Όνομα</td><td>Μονάδα</td><td>f_unit (Μονάδα/MJ)</td><td>f_prim (-)</td><td>f_CO2 (KgCO2/kWh)</td><td>f_cost (€/MJ)</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"47%\">" . $vivliothikes[$i]["name"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . $vivliothikes[$i]["unit"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . number_format($vivliothikes[$i]["funit"], 5, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . number_format($vivliothikes[$i]["fprim"], 5, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . number_format($vivliothikes[$i]["fco2"], 5, '.', ',') . "</td>";
						echo "<td class=\"vivliothikic\" width=\"10%\">" . number_format($vivliothikes[$i]["fcost"], 5, '.', ','). "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)" 
						. "<br/><br/>όπου:<br/><b>f_unit:</b> Συντελεστής μετατροπής από ενέργεια καυσίμου (MJ) σε Μ.Μ."
						. "<br/><b>f_prim:</b> Συντελεστής μετατροπής από ενέργεια καυσίμου (MJ) σε πρωτογενή"
						. "<br/><b>f_CO2:</b> Συντελεστής μετατροπής από ενέργεια καυσίμου (MJ) σε Kg CO2";
					}
					
					if ($sel_page["id"] > 27 && $sel_page["id"] < 56)	{
					$vivliothikes = get_synthikes($sel_page);
						echo "<table class=\"sortable\" border=\"1\" width=\"100%\"><tr><td>Α/Α</td><td>Κατηγορία</td><td>Χρήση</td><td>Ώρες λειτουρ γίας (h)</td><td>Ημέρες λειτουρ γίας</td>
						<td>Μήνες λειτουρ γίας</td><td>θ,i,h (C)</td><td>θ,i,c (C)</td><td>Χ,i,h (%)</td><td>Χ,i,c (%)</td><td>Άτομα / 100 m2</td><td>Νωπός αέρας (m3 / h / person)</td>
						<td>Νωπός αέρας (m3 / h / m2)</td><td>Στάθμη φωτι σμού (lux)</td><td>Ισχύς κτιρίου αναφο ράς (W/m2)</td><td>Ώρες λειτουρ γίας ημέρας (h)</td><td>Ώρες λειτουρ γίας νύχτας (h)</td>
						<td>ΖΝΧ (lt / άτομο / ημέρα)</td><td>ΖΝΧ (lt / m2 / ημέρα)</td><td>ΖΝΧ (m3 / m2 (κλίνες) / year)</td><td>Άνθρω ποι (W / άτομο)</td><td>Άνθρω ποι (W / m2)</td>
						<td>Συντε λεστής παρου σίας f</td><td>Ισχύς εξοπλισμού (W / m2)</td><td>Μέσος συντ. ετεροχρ.</td><td>Ετεροχρ. ισχύς εξοπλ.</td></tr>";
						for ($i = 0; $i <= (count($vivliothikes)-1); $i++) {
						echo "<tr class=\"vivliothiki\">";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["id"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"18%\">" . $vivliothikes[$i]["gen_xrisi"] . "</td>";
						echo "<td class=\"vivliothiki\" width=\"19%\">" . $vivliothikes[$i]["xrisi"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"50\">" . $vivliothikes[$i]["hours"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"50\">" . $vivliothikes[$i]["days"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["months"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["tih"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["tic"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["xih"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["xic"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["atoma"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["nwpos_aeras_per"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["nwpos_aeras_m2"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["fwtismos"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["isxys_anaf"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["hours_day"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["hours_night"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["znx_l_p_d"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["znx_l_sq_d"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["znx_m3_sq_y"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["w_persons"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["w_m2"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["synt_parousias"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["eks_w"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["eks_synt"] . "</td>";
						echo "<td class=\"vivliothikic\" width=\"3%\">" . $vivliothikes[$i]["eks_w_eter"] . "</td>";
						echo "</tr>";
						}
						echo "</table>";
						echo "Σύνολο εγγραφών:" . (count($vivliothikes)-1) . "<br/>(Σημείωση: οι πίνακες ταξινομούνται με κλικ στον τίτλο της στήλης)" . 
						"<br/><br/>Τυπικό ωράριο λειτουργίας ανά χρήση: Πίνακας 2.1 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Καθοριζόμενες τιμές θερμοκρασίας και σχετικής υγρασίας εσωτερικών χώρων: Πίνακας 2.2 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Απαιτούμενος νωπός αέρας ανά χρήση κτιρίου: Πίνακας 2.3 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Στάθμη γενικού (όχι ειδικού) φωτισμού και εγκατεστημένη ισχύς φωτισμού κτιρίου αναφοράς ανά χρήση κτιρίου: Πίνακας 2.4 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Τυπική κατανάλωση ΖΝΧ ανά χρήση κτιρίου: Πίνακας 2.5 της ΤΟΤΕΕ 20701-1. " . 
						"<br/>Εκλυόμενη θερμότητα χρηστών ανά χρήση κτιρίου: Πίνακας 2.7 της ΤΟΤΕΕ 20701-1. ";
					}
					
					?>
				</div>
			<?php } else { 				 
				 
				 include("includes/version-history.php"); 
				
			 } ?>
		</td>
	</tr>
</table>
<?php include("includes/footer.php"); ?>