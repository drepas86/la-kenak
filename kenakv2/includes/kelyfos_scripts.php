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

function set_default(){
	var plaisio=document.getElementById("syntel_plaisio").options[document.getElementById("syntel_plaisio").selectedIndex].text;
	var ukoyf=document.getElementById("syntel_plaisio").value;
	var platos=document.getElementById("mpp").value;
	var pane=document.getElementById("descr").value;
	var upane=document.getElementById("UG").value;
	var x="./includes/save_default_an.php?record="+plaisio+"|"+ukoyf+"|"+platos+"|"+pane+"|"+upane;
	document.getElementById('save_an1').innerHTML="<img src=\""+x+"\"></img>";
	document.getElementById('save_an1').innerHTML="<center>Τα στοιχεία αποθηκεύθηκαν</center>";
	$.colorbox({inline:true, width:"30%", href:"#save_an1"});
	setTimeout( "closebox();", 1000);
}

function help_an(){
$.colorbox({inline:true, href:"#help_an"});
}
function help_dom(){
$.colorbox({inline:true, href:"#help_box"});
}

function number_format (number, decimals, dec_point, thousands_sep) {
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function trim(s) {
	return s.replace(/^\s+|\s+$/g,"");
}
function ltrim(s) {
	return s.replace(/^\s+/,"");
}
function rtrim(s) {
	return s.replace(/\s+$/,"");
}

function printop(){

var x="includes/print_anoigmata.php?descr="+document.getElementById("descr").value;
x+="&mpp="+document.getElementById("mpp").value;
x+="&sp="+document.getElementById("syntel_plaisio").value;
x+="&tp="+document.getElementById("syntel_plaisio").options[document.getElementById("syntel_plaisio").selectedIndex].text;
x+="&ug="+document.getElementById("UG").value;
x+="&cg="+document.getElementById("CG").value;
x+="&z1="+document.getElementById("an_zwni").value;
x+="&z2="+document.getElementById("an_zwni").options[document.getElementById("an_zwni").selectedIndex].text;

for (i=1;i<=10;i++){
	if (document.getElementById("aw"+i).value!=""){
	x+="&aw"+i+"="+document.getElementById("aw"+i).value;
	x+="&ah"+i+"="+document.getElementById("ah"+i).value;
	x+="&af"+i+"="+document.getElementById("af"+i).value;
	x+="&yw"+i+"="+document.getElementById("yw"+i).value;
	x+="&yh"+i+"="+document.getElementById("yh"+i).value;
	}
}
//alert (x);
window.open(x,"La-Kenak");
}

function read_an(){
$.colorbox({inline:true, href:"#read_an"});
}
function read_an1(){
$.fn.colorbox.close();
document.getElementById("an_name").value=document.getElementById("an_rec").options[document.getElementById("an_rec").selectedIndex].text;
document.getElementById('anoig').innerHTML=document.getElementById("an_name").value;
var rec=document.getElementById('an_rec').value;
var x=rec.split("^");
if (isNaN(x[4])){x[4]="";}
document.getElementById('syntel_plaisio').selectedIndex=x[0];
document.getElementById('ekp').selectedIndex=x[1];
document.getElementById('dias').selectedIndex=x[2];
document.getElementById('aer').selectedIndex=x[3];
document.getElementById('mpp').value=x[4];
for (i=1;i<=5;i++){
	var y=x[i+4].split("|");
	for (j=1;j<=10;j++){
		if (y[j-1]=="0"){y[j-1]="";}
		if (i==1){document.getElementById('aw'+j).value=y[j-1];}
		if (i==2){document.getElementById('ah'+j).value=y[j-1];}
		if (i==3){document.getElementById('af'+j).value=y[j-1];}
		if (i==4){document.getElementById('yw'+j).value=y[j-1];}
		if (i==5){document.getElementById('yh'+j).value=y[j-1];}
	}
}
getpane();
checkall();
}

function save_an(){
$.colorbox({inline:true, href:"#save_an", onComplete:function(){ 
document.getElementById("an_name").focus();
}});
}
function save_an1(){
var x=trim(document.getElementById("an_name").value);
if (x==""){closebox();return;}
x+="@"+document.getElementById("syntel_plaisio").selectedIndex;
x+="^"+document.getElementById("ekp").selectedIndex;
x+="^"+document.getElementById("dias").selectedIndex;
x+="^"+document.getElementById("aer").selectedIndex;
x+="^"+document.getElementById("mpp").value+"^";
for (i=1;i<=10;i++){
	var t=document.getElementById("aw"+i).value;
	if (t==''){t='0';}
	x+=t;
	if (i<10){x+="|";}
}
x+="^";
for (i=1;i<=10;i++){
	var t=document.getElementById("ah"+i).value;
	if (t==''){t='0';}
	x+=t;
	if (i<10){x+="|";}
}
x+="^";
for (i=1;i<=10;i++){
	var t=document.getElementById("af"+i).value;
	if (t==''){t='0';}
	x+=t;
	if (i<10){x+="|";}
}
x+="^";
for (i=1;i<=10;i++){
	var t=document.getElementById("yw"+i).value;
	if (t==''){t='0';}
	x+=t;
	if (i<10){x+="|";}
}
x+="^";
for (i=1;i<=10;i++){
	var t=document.getElementById("yh"+i).value;
	if (t==''){t='0';}
	x+=t;
	if (i<10){x+="|";}
}
x="./includes/save_an.php?record="+x;
document.getElementById('save_an1').innerHTML="<img src=\""+x+"\"></img>";
document.getElementById('save_an1').innerHTML="<center>Τα ανοίγματα αποθηκεύθηκαν</center>";
$.colorbox({inline:true, width:"30%", href:"#save_an1"});
setTimeout( "reload();", 1000);
}
function reload(){
var x=document.getElementById("an_rec").selectedIndex;
window.location=("domika_kelyfos.php?page=2&read="+x);
}

function closebox(){
$.fn.colorbox.close();
}

function savewall(){
var p="";
var i;
var name=document.getElementById("descr").value;
var kind=document.getElementById("Ria").selectedIndex;

if (kind<1){alert("Δεν έχετε επιλέξει αντιστάσεις θερμικής μετάβασης");return;}
if (trim(name)==""){alert("Δεν έχετε συμπληρώσει την περιγραφή του στοιχείου");return;}


for (i=1;i<=10;i++){
	var t=document.getElementById("paxos"+i).value;
	if (isNaN(t)) {t="0";}
	if (t=="") {t="0";}
	p += t;
	if (i<10){p += "|";}
}
var s="";
for (i=1;i<=10;i++){
	var t=document.getElementById("eidos"+i).selectedIndex;
	s += t;
	if (i<10){s += "|";}
}
s += "^";
for (i=1;i<=10;i++){
	var t=document.getElementById("strwsi"+i).selectedIndex;
	s += t;
	if (i<10){s += "|";}
}
var u=document.getElementById("U").value;
var d=document.getElementById("sum2").value;
var x="includes/save_wall.php?paxh="+p+"&wid="+wallid+"&fid="+floorid+"&name="+name+"&kind="+kind+"&strwseis="+s+"&u="+u+"&d="+d;
document.getElementById('inline_content1').innerHTML="<img src=\""+x+"\"></img>";
document.getElementById('inline_content1').innerHTML="<center>Το δομικό στοιχείο αποθηκεύθηκε</center>";
$.colorbox({inline:true, width:"30%", href:"#inline_content1"});
setTimeout( "pagerefresh();", 1000);
}

function pagerefresh(){
location.reload(true);
}

function getwall(){
$.colorbox({inline:true,  href:"#inline_content"});
}

function getname(k){
var i;
var n=document.getElementById(k).selectedIndex;
if (k=="walls"){
wallid=n+1;
floorid=0;
}else{
wallid=0;
floorid=n+1;
}
document.getElementById("descr").value=document.getElementById(k).options[n].text;
$.fn.colorbox.close();
var x=document.getElementById(k).value;
var y=x.split("^");
var p=y[0].split("|");
var s1=y[1].split("|");
var s2=y[2].split("|");
for (i=1;i<=10;i++)
{
	if (p[i-1]>0){
	document.getElementById("paxos"+i).value=p[i-1];
	}else{
	document.getElementById("paxos"+i).value="";
	}
	document.getElementById("eidos"+i).selectedIndex=s1[i-1];
	document.getElementById("strwsi"+i).innerHTML=getmat(i);
	document.getElementById("strwsi"+i).selectedIndex=s2[i-1];
	getcl(i);
}

}

function showgraph(pout){
var x;
var i;
var n;
var w;
n=document.getElementById("Ria").selectedIndex;
if (n>0){
if (n<4){
x="includes/image_creation_wall.php?descr="+document.getElementById("descr").value;
}else{
x="includes/image_creation_floor.php?descr="+document.getElementById("descr").value;
}
x+="&floor=1"
x+="&zwni="+document.getElementById("zwni").selectedIndex;
x+="&roof="+document.getElementById("Roof").value;
x+="&ria="+document.getElementById("Ria").selectedIndex;
w=document.getElementById('sum2').value*500+200;
if (w<300){w=300;}
document.getElementById('graph').style.height=w;
for (i=1;i<=10;i++)
{
x+="&pax"+i+"="+document.getElementById("paxos"+i).value;
x+="&str"+i+"="+document.getElementById("strwsi"+i).value;
x+="&strn"+i+"="+document.getElementById("strwsi"+i).options[document.getElementById("strwsi"+i).selectedIndex].text;
x+="&eid"+i+"="+document.getElementById("eidos"+i).value;
}
x+="&imh="+w;
x+="&ri="+document.getElementById("sum3").value;
x+="&ra="+document.getElementById("sum4").value;
x+="&ru="+document.getElementById("sum6").value;
x+="&rd="+document.getElementById("sum7").value;
x+="&umax="+getumax();
if (pout==1){
x+="&print=1";
window.open(x,"La-Kenak");
}
else
{
document.getElementById('graph').innerHTML="<img src=\""+x+"\"></img>";
}
}
}

function getumax(){
var n;
var x;
var y;
var umax;
n = document.getElementById("Ria").selectedIndex;
if (n>0){
x = document.getElementById("zwni").value;
y = x.split("|");
if (n>5){n -= 1; }
umax=y[n-1];
return umax;
}
return "";
}

function getroof(){
var n;
var m;
n = document.getElementById("Roof").selectedIndex;
if (n>0){
m=document.getElementById("Roof").value;
m=parseFloat(m).toFixed(3);
if (isNaN(m)) {m="";}
document.getElementById("sum6").value=m;
}else{
document.getElementById("sum6").value="";
}
getria();
}

function getair(){
var x;
var y;
var n;
var m;
var f=0;
var r=0;
var air;
var i;
n = document.getElementById("air").selectedIndex;
if (n>0){
m=document.getElementById("air").value;
for (i=1;i<=3;i++){
	if (document.getElementById("fl"+i).checked){f=i;}
}
for (i=1;i<=4;i++){
	if (document.getElementById("refl"+i).checked){r=i;}
}
f=(r-1)*3+f-1;
x=m.split("|");
y=x[f];
y=parseFloat(y).toFixed(3);
if (isNaN(y)) {y="";}
document.getElementById("sum7").value=y;
}
else{
document.getElementById("sum7").value="";
}
getria();
}

function getsum1(){
var s1=0;
for (i=1;i<=10;i++)
{
s = parseFloat(document.getElementById("dl"+i).value);
if (!isNaN(s)) {s1 += s ;}
}
s1 = s1.toFixed(3);
if (isNaN(s1)) {s1=0;}
document.getElementById("sum1").value=s1;

var s2=0;
for (i=1;i<=10;i++)
{
s = parseFloat(document.getElementById("paxos"+i).value);
if (!isNaN(s)) {s2 += s ;}
}
s2 = s2.toFixed(3)
if (isNaN(s2)) {s2=0;}
document.getElementById("sum2").value=s2;

}

function getcl(v)
{
var n;
var x;
var y;
n = document.getElementById("strwsi"+v).selectedIndex;
x = parseFloat(document.getElementById("strwsi"+v).options[n].value);
x = x.toFixed(3)
if (isNaN(x)) {x="";}
document.getElementById("cl"+v).value=x;

y = parseFloat(document.getElementById("paxos"+v).value);
y = y/x;
y = y.toFixed(3)
if (!isFinite(y)) {y="";}
document.getElementById("dl"+v).value=y;

getsum1();
getria();
}

function getria(){
var x;
var y;
var s1;
var s3;
var s4;
var s6;
var s7;
var sol;
var um;
var u;
n = document.getElementById("Ria").selectedIndex;
if (n>0){
x = document.getElementById("Ria").options[n].value;
y = x.split("|");
s3 = parseFloat(y[0]);
s4 = parseFloat(y[1]);
}
if (isNaN(s3)) {s3 = 0;}
if (isNaN(s4)) {s4 = 0;}
document.getElementById("sum3").value=s3.toFixed(3);
document.getElementById("sum4").value=s4.toFixed(3);
s1=parseFloat(document.getElementById("sum1").value);
s6=parseFloat(document.getElementById("sum6").value);
s7=parseFloat(document.getElementById("sum7").value);
if (isNaN(s6)) {s6=0;}
if (isNaN(s7)) {s7=0;}
if (isNaN(s1)) {s1=0;}
if (isNaN(s3)) {s3=0;}
if (isNaN(s4)) {s4=0;}
sol=parseFloat(s1)+parseFloat(s3)+parseFloat(s4)+parseFloat(s6)+parseFloat(s7);
if (isNaN(sol)) {sol=0;}
sol=sol.toFixed(3)
document.getElementById("sum5").value=sol;
if (sol>0){
u=1/sol;
u=u.toFixed(3)
var ut=document.getElementById("U").value;
document.getElementById("U").value=u;
if (ut!==u){showgraph(0);}
}else{
document.getElementById("U").value="";
}
um=getumax();
if (um!=""){
if (u<=um){
document.getElementById('OK').src="images/domika/yes.png";
}
else if (u>um){
document.getElementById('OK').src="images/domika/no.png";
}
document.getElementById('umax').innerHTML="<b>&nbsp;Umax="+um+"</b>";
}else{
document.getElementById('OK').src="images/domika/blank.png";
document.getElementById('umax').innerHTML="";
}

}

function getmat(v)
{
var n = document.getElementById("eidos"+v).selectedIndex;
var x;
switch(n)
{
case 1:
  x='<?php echo $aeras1; ?>';
  break;
case 2:
  x= '<?php echo $beton1; ?>';
  break;
case 3:
  x= '<?php echo $epixrismata1; ?>';
  break;
case 4:
  x= '<?php echo $gypso1; ?>';
  break;
case 5:
  x= '<?php echo $keram1; ?>';
  break;
case 6:
  x= '<?php echo $ksyl1; ?>';
  break;
case 7:
  x= '<?php echo $mon1; ?>';
  break;
case 8:
  x= '<?php echo $mondow1; ?>';
  break;
case 9:
  x= '<?php echo $plakes1; ?>';
  break;
case 10:
  x= '<?php echo $skyro1; ?>';
  break;
case 11:
  x= '<?php echo $toyvla1; ?>';
  break;
case 12:
  x= '<?php echo $ygro1; ?>';
  break;
case 13:
  x= '<?php echo $diaf1; ?>';
  break;
default:
  x= '';
}
return  "<option>&nbsp;</option>"+x;
}

//--- anoigmata --------------------------------------------------------------

function get_par_e(v)
{
var parath_platos= parseFloat(document.getElementById("platos"+v).value);
var parath_ipsos= parseFloat(document.getElementById("ipsos"+v).value);
var platos_plaisio= parseFloat(document.getElementById("platos_plaisio"+v).value);
var emvadon= parath_platos * parath_ipsos;
var mikos_plaisio= (parath_platos+parath_ipsos)*2;
var emvadon_plaisio= mikos_plaisio * platos_plaisio;

document.getElementById("parath_e"+v).value=emvadon;
document.getElementById("mikos_plaisio"+v).value=mikos_plaisio;
document.getElementById("emvadon_plaisio"+v).value=emvadon_plaisio;
}

function getpane(){

var p=document.getElementById("syntel_plaisio").value;
if (p==""){
document.getElementById('UF').innerHTML="";
}else{
document.getElementById('UF').innerHTML="<b>&nbsp;&nbsp;&nbsp;&nbsp;U<sub>f</sub>="+p+" </b>W/(m²K)";
}
document.getElementById("descr").value="";
document.getElementById("UG").value="";
document.getElementById("CG").value="";
var t=document.getElementById("typ").value;
var e=document.getElementById("ekp").value;
var d1=document.getElementById("dias").value;
var a=document.getElementById("aer").value;
d=document.getElementById("dias").selectedIndex;
if (d==0){return;}
if (d<6){t=1;}
if (d>5){t=2;}
document.getElementById("typ").selectedIndex=t;
if (e==""){return;}
if (a==""){return;}
var x="υαλοπίνακας ";
if (t=="1"){x="Διπλός "+x+" "+d1;}
if (t=="2"){x="Τριπλός "+x+" "+d1;}
if (e=="1"){x+="  χωρίς επίστρωση χαμηλής εκπομπής";}
if (e=="2"){x+="  με επίστρωση low-e <0.10 ";}
if (e=="3"){x+="  με επίστρωση low-e <0.05 ";}
if (a=="1"){x+=" και αέρα στο διάκενο";}
if (a=="2"){x+=" και αργό στο διάκενο";}
if (a=="3"){x+=" και κρυπτό στο διάκενο";}
t=document.getElementById("typ").selectedIndex;
e=document.getElementById("ekp").selectedIndex;
d=document.getElementById("dias").selectedIndex;
a=document.getElementById("aer").selectedIndex;
if (t==2 && d<6){return;}
if (t==1 && d>5){return;}
document.getElementById("descr").value=x;
if (t==1){
var s="3.3|3.0|2.8|3.1|2.9|2.7|2.8|2.7|2.6|2.7|2.6|2.6|2.7|2.6|2.6|";
   s+="2.6|2.2|1.7|2.2|1.9|1.4|1.8|1.5|1.3|1.6|1.4|1.3|1.6|1.4|1.4|";
   s+="2.5|2.1|1.5|2.1|1.7|1.3|1.7|1.3|1.1|1.4|1.2|1.2|1.5|1.2|1.2";
var t=s.split("|");
var n=((e-1)*5+d-1)*3+a;
x=t[n-1];
}
if (t==2){
var s="2.3|2.1|1.8|2.1|1.9|1.7|1.9|1.8|1.6|1.7|1.3|1.0|1.4|1.1|0.8|1.1|0.9|0.6|1.6|1.2|0.9|1.3|.0|0.7|1.0|0.8|0.5";
var t=s.split("|");
d-=5;
var n=((e-1)*3+d-1)*3+a;
x=t[n-1];
}
document.getElementById("UG").value=x;
p=document.getElementById("syntel_plaisio").selectedIndex;
if (p==0){return;}
if (p>2 && p<7){p=3;}
if (p>6){p=4;}
if (e==3){e=2;}
s="0.02|0.05|0.08|0.11|0.06|0.08|0.06|0.08";
t=s.split("|");
n=(p-1)*2+e;
x=t[n-1];
document.getElementById("CG").value=x;
checkall();
}


function get_u(n,m){
if (!m){m=0;}
var mpp=parseFloat(document.getElementById("mpp").value);
if (!isFinite(mpp)){mpp=0;}
document.getElementById("ae"+n).value="";
document.getElementById("ye"+n).value="";
document.getElementById("pe"+n).value="";
document.getElementById("pp"+n).value="";
document.getElementById("lg"+n).value="";
document.getElementById("uw"+n).value="";
var aw=parseFloat(document.getElementById("aw"+n).value);
if (!isFinite(aw)){document.getElementById("aw"+n).focus();return 1;}
var ah=parseFloat(document.getElementById("ah"+n).value);
if (!isFinite(ah)){document.getElementById("ah"+n).focus();return 1;}
var af=parseFloat(document.getElementById("af"+n).value);
if (!isFinite(af)){document.getElementById("af"+n).focus();return 1;}
var yw=parseFloat(document.getElementById("yw"+n).value);
var yh=parseFloat(document.getElementById("yh"+n).value);
if (mpp>0){
mpp/=100;
if ((!isFinite(yw) && !isFinite(yh)) || m==1 ){
yw=aw/af-2*mpp;
yh=ah-2*mpp;
}}
if (!isFinite(yw)){document.getElementById("yw"+n).focus();return 1;}
if (!isFinite(yh)){document.getElementById("yh"+n).focus();return 1;}
document.getElementById("aw"+n).value=number_format(aw,2,".",",");
document.getElementById("ah"+n).value=number_format(ah,2,".",",");
document.getElementById("yw"+n).value=number_format(yw,2,".",",");
document.getElementById("yh"+n).value=number_format(yh,2,".",",");
document.getElementById("ae"+n).value=number_format(aw*ah,2,".",",");
document.getElementById("ye"+n).value=number_format(yw*yh*af,2,".",",");
document.getElementById("pe"+n).value=number_format(aw*ah-yw*yh*af,2,".",",");
document.getElementById("pp"+n).value=number_format((aw*ah-yw*yh*af)/(aw*ah)*100,0,".",",")+"%";
document.getElementById("lg"+n).value=number_format(2*(yw+yh)*af,2,".",",");

document.getElementById("uw"+n).value="";

var lg=2*(yw+yh)*af;
var ae=aw*ah;
var ye=yw*yh*af;
var pe=ae-ye;

var ch=0;
var uf=parseFloat(document.getElementById("syntel_plaisio").value);
if (isNaN(uf)){ch=1;}
var cg=parseFloat(document.getElementById("CG").value);
if (isNaN(cg)){ch=1;}
var ug=parseFloat(document.getElementById("UG").value);
if (isNaN(ug)){ch=1;}

if (ch==0){
var uw=(pe*uf+ye*ug+lg*cg)/ae;
document.getElementById("uw"+n).value=number_format(uw,2,".",",");
var umax=document.getElementById("an_zwni").value;
if (uw>umax){
document.getElementById("uw"+n).style.backgroundColor="#ff0000";
}else{
document.getElementById("uw"+n).style.backgroundColor="#fff1d7";
}

}

if (n==10){n=0;}
n+=1;
document.getElementById("aw"+n).focus();
return 0;

}

function checkall(){

var p=document.getElementById("an_zwni").value;
document.getElementById('an_umax').innerHTML="<b>&nbsp;Umax ανοιγμάτων="+p+"</b>";

for (i=1;i<=10;i++){
	document.getElementById("ae"+i).value="";
	document.getElementById("ye"+i).value="";
	document.getElementById("pe"+i).value="";
	document.getElementById("pp"+i).value="";
	document.getElementById("lg"+i).value="";
	document.getElementById("uw"+i).value="";
}

for (i=1;i<=10;i++){
	if (get_u(i)==1){break;}
}


}

//Υπολογίζει τον ισοδύναμο συντελεστή από τη δεύτερη φόρμα στο αρχείο kelyfos_dapeda.php#tab-u2
function calcufbz1z2(){
var calcutb;
var utb1 = document.getElementById("katakoryfo_utb1").value;
var z1 = document.getElementById("vathos1").options[document.getElementById('vathos1').selectedIndex].value;
var utb2 = document.getElementById("katakoryfo_utb2").value;
var z2 = document.getElementById("vathos2").options[document.getElementById('vathos2').selectedIndex].value;
if (z1<z2){
calcutb = ((z2*utb2)-(z1*utb1))/(z2-z1);
}
if (z1>z2){
calcutb = ((z1*utb1)-(z2*utb2))/(z1-z2);
}

if (z1 == z2){
document.getElementById("ufbz1z2").value = "";
document.getElementById("ufb_info").innerHTML = "Χρησιμοποιήστε την φόρμα παραπάνω για ένα βάθος z1";
}

if (z1 != z2){
document.getElementById("ufbz1z2").value = number_format(calcutb,3,".",",");
document.getElementById("ufb_info").innerHTML = "";
}

}


//Υπολογίζει τον ισοδύναμο συντελεστή από τη πρώτη φόρμα στο αρχείο kelyfos_dapeda.php#tab-u2
function calcufbz1(){
var link;
var calcutb1;
var utb = document.getElementById("katakoryfo_utb").value;
var z = document.getElementById("vathos").options[document.getElementById('vathos').selectedIndex].value;

link = $.get("./includes/kelyfos_test.php?vathos="+z+"&katakoryfo_utb="+utb);

document.getElementById("ufb1_info").innerHTML = "";

}






</script>
