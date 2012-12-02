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
		<!--/Δεύτερος τρόπος εισαγωγής δεδομένων στη βάση-->
		<?php	if ($sel_page["id"] == 5)	{ ?>
			<h2>ΚΕΝΑΚ - Κατακόρυφα δομικά σε επαφή με το έδαφος</h2>
	  <script type="text/javascript">
		document.getElementById('imgs').innerHTML="<img src=\"images/style/home.png\"></img>";
	  </script>
<script language="JavaScript">
	function ClickCheckAll(vol)
	{
	
		var i=1;
		for(i=1;i<=document.frmMain.hdnCount.value;i++)
		{
			if(vol.checked == true)
			{
				eval("document.frmMain.delcheck"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.delcheck"+i+".checked=false");
			}
		}
	}

	function onDelete()
	{
		if(confirm('Επιθυμείτε σίγουρα διαγραφή;')==true)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	

function get_active(){
document.getElementById("tabvanilla").style.display="block";
}

function iframe_ground(){
$(".iframe").colorbox({iframe:true, width:"80%", height:"90%"});
}

function help_typeground(){
$.colorbox({inline:true,  href:"#guidetypeground", width:"80%", height:"80%"});
}

</script>		
			<div id="tabvanilla" class="widget" style="display:none;">
					<ul class="tabnav">  
					<li><a href="#tab-ground">Επαφή με έδαφος</a></li>
					</ul>  

	<div id="tab-ground" class="tabdiv"> 
					
	<img src="images/style/ground.png"></img>
	<h3>Τοίχοι (Κέλυφος - Σε επαφή με το έδαφος)</h3>
	
	<?php
	$ped="kataskeyi_ground";
	$dig="0|0|0|0|0|2|2|2|2|2|0|0|0";
	$tb_name="TableContainer_ground";
	$fields="fields: {
		id: {key: true,create: false,edit: false,list: false},
		user_id: {create: false,edit: false,list: false},
		meleti_id: {create: false,edit: false,list: false},
		id_zwnis: {title: 'ΖΩΝΗ',width: '10%',listClass: 'center',options: ".getzwnes()."},
		type: {title: 'Τύπος <a class=\"esg\" href=\"#guidetypeground\" onclick=help_typeground();><img src=\"./images/style/help.png\"/></a>',width: '10%',listClass: 'center', options: {'0':'Σε έδαφος','1':'Σε Μ.Θ.Χ.'}},
		name: {title: 'Όνομα',width: '20%',listClass: 'center'},
		emvadon: {title: 'Εμβαδόν',width: '20%',listClass: 'center'},
		u: {title: 'U (ονομαστικός συντ.) <a class=\"iframe\" href=\"./domika_kelyfos.php?page=3&min=1#tab-u2\" onclick=iframe_ground();><img src=\"./images/style/help.png\" /></a>',width: '10%',listClass: 'center'},
		k_bathos: {title: 'Κατώτερο βάθος',width: '15%',listClass: 'center'},
		a_bathos: {title: 'Ανώτερο βάθος',width: '15%',listClass: 'center'}
	}";
	include('includes/jtable.php');
?>


	
	</div><!--/ground-->
	

<!--  Κρυφό div class για βοήθεια στην επιλογή τύπου στοιχείου σε έδαφος ------------->
		<div style='display:none'><div id='guidetypeground' style='padding:10px; background:#ebf9c9;'>
		<b>Επιλογή τύπου στοιχείου σε επαφή με το έδαφος:</b><br/>
		Υπάρχουν δύο περιπτώσεις:
		<ol>
		<li>Σε επαφή με το έδαφος στην οποία το U που δηλώνεται ισχύει όπως δηλώθηκε στον υπολογισμό UxA</li>
		<li>Σε επαφή με ΜΘΧ στην οποία το U που δηλώνεται χρησιμοποιείται ως U/2 στον υπολογισμό UxA</li>
		</ol>
		
		</div></div>
<!------------------------------------------------------------------------------------>


</div>
<!------------------------------------------------------------------------------------>	

<?php } ?>