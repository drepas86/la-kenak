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

***********************************************************************
Tsak mods - Κώστας Τσακίρης - πολιτικός μηχανικός - ktsaki@tee.gr     *
                                                                      *
Javascripts για σχεδίαση χώρων και τοίχων, επιλογή θερμογεφυρών κλπ   *
                                                                      *
***********************************************************************
*/

oFReader = new FileReader(), rFilter = /^(image\/bmp|image\/cis-cod|image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/pipeg|image\/png|image\/svg\+xml|image\/tiff|image\/x-cmu-raster|image\/x-cmx|image\/x-icon|image\/x-portable-anymap|image\/x-portable-bitmap|image\/x-portable-graymap|image\/x-portable-pixmap|image\/x-rgb|image\/x-xbitmap|image\/x-xpixmap|image\/x-xwindowdump)$/i;

oFReader.onload = function (oFREvent) {
  document.getElementById("uploadPreview").src = oFREvent.target.result;
};

function loadImageFile() {
  if (document.getElementById("uploadImage").files.length === 0) { return; }
  var oFile = document.getElementById("uploadImage").files[0];
  if (!rFilter.test(oFile.type)) { alert("Θα πρέπει να επιλέξετε ένα αρχείο εικόνας!"); return; }
  oFReader.readAsDataURL(oFile);
}


function init(){
document.onselectstart = function () { return false; };
//adding the event listerner for Mozilla
if(window.addEventListener) document.addEventListener('DOMMouseScroll', zoomInOut, false);
//for IE/OPERA etc
document.onmousewheel = zoomInOut;
xs=0;ys=0;xe=0;ye=0;dxs=0;dys=0;dxe=0;dye=0;ymax=10;xmax=ymax;ws=-1;
xt1=0;yt1=0;xt2=0;yt2=0;selected_rect=-1;x0=0;y0=0;ipsos=3;
imx=0;imy=0;imw=800;imh=600;imcal1=0;imcal2=0;imcal3=0;imgw=800;imgh=600;
cleft=61;ctop=51;save=1;
dtype=1;zooming=0;
grid = new Image();grid.src="draw_grid.php?ymax=10";
fn=new Array();
fn1=new Array();
fn[1]="ΥΠ";
fn[2]="ΙΣ";
fn1[1]="Υπόγειο";
fn1[2]="Ισόγειο";
on=new Array();
on[0]="Β";
on[1]="Α";
on[2]="Ν";
on[3]="Δ";
for (i=3;i<10;i++){var j=i-2;fn[i]=j+"ος";fn1[i]=j+"ος όροφος";}
floor=document.getElementById("floor").value;
document.getElementById("ymax").value=ymax;
action="edit";
//draw_grid();
redraw_all();
}

function set_type(){
for (i=1;i<=6;i++){
	if (document.getElementById("d"+i).checked){dtype=i;}
}
}

function draw_grid(){
var b=navigator.userAgent;
var n=b.indexOf("Chrome");
if (n > -1){return;}
grid.src="draw_grid.php?ymax="+xmax+"\"";
var ctx=document.getElementById("canvas").getContext("2d");
ctx.fillStyle=ctx.createPattern(grid,"repeat");
ctx.fillRect(0,0,800,600);
}

//*********************  ΔΑΠΕΔΑ ************************************************
function info(){
$.colorbox({inline:true,  href:"#info" , width:"400px;" });
set_names();
var r=rect[selected_rect];
var nn=r.name;
if (nn==undefined){nn="";}
document.getElementById('n').value=nn;
var xx=Math.round((r.x)/600*xmax*20)*5/100;
xx=number_format(xx,2,".",",");
var yy=Math.round((600-r.y)/600*ymax*20)*5/100;
yy=number_format(yy,2,".",",");
document.getElementById('x_info').value=xx;
document.getElementById('y_info').value=yy;
document.getElementById('lx_info').value=document.getElementById('lx').value;
document.getElementById('ly_info').value=document.getElementById('ly').value;
document.getElementById('h').value=number_format(r.height,2,".",",");
if (r.height==0){document.getElementById('h').value=number_format(ipsos,2,".",",");}
var zz=r.zone;
if (isNaN(zz)){zz="";}
document.getElementById('z').value=zz;
document.getElementById('u').value=number_format(r.u,2,".",",");
document.getElementById('dap').selectedIndex=r.ep;
if (r.or==0){document.getElementById('t1').checked=true;}
if (r.or==1){document.getElementById('t2').checked=true;}
sr=selected_rect;
selected_rect=-1;
}

function save_xwros(){
$.fn.colorbox.close();
var xx=document.getElementById('x_info').value;
var yy=document.getElementById('y_info').value;
var lx=document.getElementById('lx_info').value;
var ly=document.getElementById('ly_info').value;
var hh=document.getElementById('h').value;
var zz=document.getElementById('z').value;
var nn=document.getElementById('n').value;
rect[sr].height=hh;rect[sr].zone=zz;rect[sr].name=nn;
xx=xx/xmax*600;
yy=600-yy/ymax*600;
lx=lx/xmax*600;
ly=ly/xmax*600;
rect[sr].x=xx;rect[sr].y=yy;rect[sr].w=lx;rect[sr].h=ly;
ipsos=hh;
rect[sr].u=document.getElementById('u').value;
rect[sr].ep=document.getElementById('dap').selectedIndex;
if (document.getElementById('t1').checked){rect[sr].or=0;}
if (document.getElementById('t2').checked){rect[sr].or=1;}
redraw_all();
save=0;
}
//*********************  ΤΟΙΧΟΣ ************************************************
function set_names(){
	var n=new Array();
	var n1=0;
	for (i=0;i<rect.length;i++){
		if (rect[i].type==1){
			n1+=1;
			rect[i].name=fn1[floor]+' '+n1;
		}
		if (rect[i].type==2){
			if (rect[i].w<rect[i].h && rect[i].or==0){rect[i].or=3;}
			if (isNaN(n[rect[i].or])){n[rect[i].or]=0;}
			n[rect[i].or]+=1;
			rect[i].name=fn[floor]+'-'+on[rect[i].or]+n[rect[i].or];
		}
	}
	var m=new Array();
	for (i=0;i<rect.length;i++){
		if (rect[i].type==3){
			for (j=0;j<rect.length;j++){
				if (isNaN(m[j])){m[j]=0;}
				if (rect[i].c==j){m[j]+=1;rect[i].name=rect[j].name+'-'+m[j];}
			}
		}
	}
}

function info1(){
$.colorbox({inline:true,  href:"#info1", width:"460px;" , height:"380px;" });
set_names();
var r=rect[selected_rect];
var nn=r.name;
if (nn==undefined){nn="";}
document.getElementById('tn').value=nn;
var xx=Math.round((r.x)/600*xmax*20)*5/100;
xx=number_format(xx,2,".",",");
var yy=Math.round((600-r.y)/600*ymax*20)*5/100;
yy=number_format(yy,2,".",",");
document.getElementById('tx_info').value=xx;
document.getElementById('ty_info').value=yy;
var lx=document.getElementById('lx').value;
var ly=document.getElementById('ly').value;
if (lx>ly){
	document.getElementById('orientation').innerHTML="<input type=\"radio\" id=\"o1\" checked=\"checked\" name=\"t_or\" value=\"1\" />Βόρειος<input type=\"radio\" id=\"o2\" name=\"t_or\" value=\"2\" />Νότιος	";
	to=0;
	if (r.or==0){document.getElementById('o1').checked=true;}
	if (r.or==2){document.getElementById('o2').checked=true;}
}
if (ly>lx){
	document.getElementById('orientation').innerHTML="<input type=\"radio\" id=\"o1\" checked=\"checked\" name=\"t_or\" value=\"1\" />Δυτικός<input type=\"radio\" id=\"o2\" name=\"t_or\" value=\"2\" />Ανατολικός";
	var tl=lx;lx=ly;ly=tl;to=1;
	if (r.or==3){document.getElementById('o1').checked=true;}
	if (r.or==1){document.getElementById('o2').checked=true;}
}
document.getElementById('tn').value=nn;

document.getElementById('tlx_info').value=lx;
document.getElementById('tly_info').value=ly;
document.getElementById('th').value=number_format(r.height,2,".",",");
if (r.height==0){document.getElementById('th').value=number_format(ipsos,2,".",",");}
var zz=r.zone;
if (isNaN(zz)){zz="";}
document.getElementById('tz').value=zz;
document.getElementById('tu').value=number_format(r.u,2,".",",");
document.getElementById('hd').value=number_format(r.hd,2,".",",");
document.getElementById('dap1').selectedIndex=r.ep;
document.getElementById('th_dap').value=number_format(r.th_dap,2,".",",");
document.getElementById('th_or').value=number_format(r.th_or,2,".",",");
document.getElementById('th_dok').value=number_format(r.th_dok,2,".",",");
document.getElementById('u_dok').value=number_format(r.u_dok,2,".",",");
sr=selected_rect;
selected_rect=-1;
}

function save_toixos(c){
if (c==1){$.fn.colorbox.close();}
var xx=document.getElementById('tx_info').value;
var yy=document.getElementById('ty_info').value;
var lx=document.getElementById('tlx_info').value;
var ly=document.getElementById('tly_info').value;
var hh=document.getElementById('th').value;
var zz=document.getElementById('tz').value;
var nn=document.getElementById('tn').value;
if (to==1){var tl=lx;lx=ly;ly=tl;}
rect[sr].height=hh;rect[sr].zone=zz;rect[sr].name=nn;
xx=xx/xmax*600;
yy=600-yy/ymax*600;
lx=lx/xmax*600;
ly=ly/xmax*600;
rect[sr].x=xx;rect[sr].y=yy;rect[sr].w=lx;rect[sr].h=ly;
ipsos=hh;
rect[sr].u=document.getElementById('tu').value;
rect[sr].hd=document.getElementById('hd').value;
rect[sr].ep=document.getElementById('dap1').selectedIndex;
for (i=1;i<=2;i++){if (document.getElementById("o"+i).checked){var x=i;break;} }
if (x==1 && to==0){rect[sr].or=0;}
if (x==2 && to==0){rect[sr].or=2;}
if (x==1 && to==1){rect[sr].or=3;}
if (x==2 && to==1){rect[sr].or=1;}
rect[sr].th_dap=document.getElementById('th_dap').value;
rect[sr].th_or=document.getElementById('th_or').value;
rect[sr].th_dok=document.getElementById('th_dok').value;
rect[sr].u_dok=document.getElementById('u_dok').value;
check_dims(sr);
if (c==1){redraw_all();}
save=0;
}

function get_thermo_or(){
$("#orofis").colorbox({iframe:true, width:"685px", height:"90%"  , onClosed:function(){ selected_rect=sr; info1(); }});
}
function get_thermo_dap(){
$("#thermodap").colorbox({iframe:true, width:"685px", height:"90%"  , onClosed:function(){ selected_rect=sr; info1(); }});
}
function get_thermo_dok(){
$("#dok").colorbox({iframe:true, width:"685px", height:"90%"  , onClosed:function(){ selected_rect=sr; info1(); }});
}
function getpsi1(n,x){
$.fn.colorbox.close();
rect[sr].th_dok=document.getElementById("d_thermo").options[n-1].value;
}
function getpsi3(n,x){
$.fn.colorbox.close();
rect[sr].th_dap=document.getElementById("t_thermo").options[n-1].value;
}
function view_toixos(){
$.colorbox({inline:true,  href:"#view", width:"800px;" , height:"500px;" , 		
			onComplete:function(){ draw_view(); } , 
			onClosed:function(){ selected_rect=sr; info1(); }  });
}

function draw_line(ctx,x1,y1,x2,y2,c){
	ctx.lineWidth=2;
	ctx.strokeStyle=c;
	ctx.beginPath();
	ctx.moveTo(x1,y1);
	ctx.lineTo(x2,y2);
	ctx.stroke();
	ctx.lineWidth=1;
}

function draw_view(){
	var xm=0;var xm1=999;var hm=0;
	var o=rect[sr].or;
	for (i=0;i<rect.length;i++){
		if (rect[i].type==2 && rect[i].or==o){
		  if (((o==1 || o==3) && Math.abs(rect[i].x-rect[sr].x)<3) || ((o==0 || o==2) && Math.abs(rect[i].y-rect[sr].y)<3)) {
			if (rect[i].x+rect[i].w>xm){xm=rect[i].x+rect[i].w+20;}
			if (rect[i].height>hm){hm=rect[i].height;}
			if (rect[i].x<xm1){xm1=rect[i].x-20;}
		}}
	}
	var ym=0;var ym1=999;
	for (i=0;i<rect.length;i++){
		if (rect[i].type==2 && rect[i].or==o){
			if (((o==1 || o==3) && Math.abs(rect[i].x-rect[sr].x)<3) || ((o==0 || o==2) && Math.abs(rect[i].y-rect[sr].y)<3)) {
				if (rect[i].y+rect[i].h>ym){ym=rect[i].y+rect[i].h+20;}
				if (rect[i].y<ym1){ym1=rect[i].y-20;}
		}}
	}
	if (o==1 || o==3){var xm00=xm;var xm01=xm1;xm=ym;xm1=ym1;ym=xm00;ym1=xm01;}
	var sc=800/(xm-xm1);
	if (hm*sc/xmax*600>300){sc=xmax*0.5/hm;}
	document.getElementById("v_canvas").getContext("2d").clearRect(0,0,800,400);
	for (i=0;i<rect.length;i++){
		if (rect[i].type==2 && rect[i].or==o){
		  if (((o==1 || o==3) && Math.abs(rect[i].x-rect[sr].x)<3) || ((o==0 || o==2) && Math.abs(rect[i].y-rect[sr].y)<3)) {
			var ctx=document.getElementById("v_canvas").getContext("2d");
			ctx.globalAlpha = 1;
			ctx.strokeStyle="#000000";
			var r=rect[i];
			var brick=ctx.createPattern(document.getElementById("brick"),"repeat");
			var concr=ctx.createPattern(document.getElementById("concr"),"repeat");
			var glass=ctx.createPattern(document.getElementById("glass"),"repeat");
			
			if (o==0){ //ΒΟΡΕΙΟΣ ΤΟΙΧΟΣ
				ctx.strokeRect((xm-r.x-r.w)*sc,50,r.w*sc,r.height*sc/xmax*600);
				ctx.fillStyle=brick;
				ctx.fillRect((xm-r.x-r.w)*sc+2,52,r.w*sc-4,r.height*sc/xmax*600-4); //ΤΟΙΧΟΣ
				ctx.fillStyle=concr;
				if (r.hd>0){
					ctx.fillRect((xm-r.x-r.w)*sc+2,52,r.w*sc-4,r.hd*sc/xmax*600-4); //ΔΟΚΑΡΙ
					draw_line(ctx,(xm-r.x-r.w)*sc+2,50+r.hd*sc/xmax*600,(xm-r.x)*sc-2,50+r.hd*sc/xmax*600,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				}
				draw_line(ctx,(xm-r.x-r.w)*sc+2,50,(xm-r.x)*sc-2,50,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				draw_line(ctx,(xm-r.x-r.w)*sc+2,50+r.height*sc/xmax*600,(xm-r.x)*sc-2,50+r.height*sc/xmax*600,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				for (j=0;j<rect.length;j++){
					if (rect[j].type==4 && rect[j].c==i){ //ΥΠΟΣΤΥΛΩΜΑΤΑ
						ctx.fillStyle=concr;
						var r1=rect[j];
						ctx.fillRect((xm-r1.x-r1.w)*sc+2,52,r1.w*sc-4,r.height*sc/xmax*600-4);
						//ΘΡΜΟΓΕΦΥΡΕΣ
						if (Math.abs(r1.x+r1.w-r.x-r.w)>2){draw_line(ctx,(xm-r1.x-r1.w)*sc+2,50+r.hd*sc/xmax*600,(xm-r1.x-r1.w)*sc+2,50+r.height*sc/xmax*600-2,"#FF0000");}
						if (Math.abs(r1.x-r.x)>2){draw_line(ctx,(xm-r1.x)*sc-2,50+r.hd*sc/xmax*600,(xm-r1.x)*sc-2,50+r.height*sc/xmax*600-2,"#FF0000");}
					}
					if (rect[j].type==3 && rect[j].c==i){ //ΑΝΟΙΓΜΑΤΑ
						ctx.fillStyle=glass;
						var r1=rect[j];
						var podia=r1.ah/xmax*600;var preki=r1.height/xmax*600;
						ctx.fillRect((xm-r1.x-r1.w)*sc,50+(r.height/xmax*600-preki)*sc,r1.w*sc,(preki-podia)*sc);
						ctx.strokeStyle="#FF0000";ctx.lineWidth=2;
						ctx.strokeRect((xm-r1.x-r1.w)*sc,50+(r.height/xmax*600-preki)*sc,r1.w*sc,(preki-podia)*sc);
						ctx.lineWidth=1;ctx.strokeStyle="#000000";
						ctx.strokeRect((xm-r1.x-r1.w)*sc+2,53+(r.height/xmax*600-preki)*sc,r1.w*sc-4,(preki-podia)*sc-6);
					}
				}
			}
			if (o==1){ //ΑΝΑΤΟΛΙΚΟΣ ΤΟΙΧΟΣ
				ctx.strokeRect((xm-r.y-r.h)*sc,50,r.h*sc,r.height*sc/xmax*600);
				ctx.fillStyle=brick;
				ctx.fillRect((xm-r.y-r.h)*sc+2,52,r.h*sc-4,r.height*sc/xmax*600-4); //ΤΟΙΧΟΣ
				ctx.fillStyle=concr;
				if (r.hd>0){
					ctx.fillRect((xm-r.y-r.h)*sc+2,52,r.h*sc-4,r.hd*sc/xmax*600-4); //ΔΟΚΑΡΙ
					draw_line(ctx,(xm-r.y-r.h)*sc+2,50+r.hd*sc/xmax*600,(xm-r.y)*sc-2,50+r.hd*sc/xmax*600,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				}
				draw_line(ctx,(xm-r.y-r.h)*sc+2,50,(xm-r.y)*sc-2,50,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				draw_line(ctx,(xm-r.y-r.h)*sc+2,50+r.height*sc/xmax*600,(xm-r.y)*sc-2,50+r.height*sc/xmax*600,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				for (j=0;j<rect.length;j++){
					if (rect[j].type==4 && rect[j].c==i){ //ΥΠΟΣΤΥΛΩΜΑΤΑ
						ctx.fillStyle=concr;
						var r1=rect[j];
						ctx.fillRect((xm-r1.y-r1.h)*sc+2,52,r1.h*sc-4,r.height*sc/xmax*600-4);
						//ΘΡΜΟΓΕΦΥΡΕΣ
						if (Math.abs(r1.y-r.y)>2){draw_line(ctx,(xm-r1.y)*sc-2,50+r.hd*sc/xmax*600,(xm-r1.y)*sc-2,50+r.height*sc/xmax*600-2,"#FF0000");}
						if (Math.abs(r1.y+r1.h-r.y-r.h)>2){draw_line(ctx,(xm-r1.y-r1.h)*sc+2,50+r.hd*sc/xmax*600,(xm-r1.y-r1.h)*sc+2,50+r.height*sc/xmax*600-2,"#FF0000");}
					}
					if (rect[j].type==3 && rect[j].c==i){ //ΑΝΟΙΓΜΑΤΑ
						ctx.fillStyle=glass;
						var r1=rect[j];
						var podia=r1.ah/xmax*600;var preki=r1.height/xmax*600;
						ctx.fillRect((xm-r1.y-r1.h)*sc,50+(r.height/xmax*600-preki)*sc,r1.h*sc,(preki-podia)*sc);
						ctx.strokeStyle="#FF0000";ctx.lineWidth=2;
						ctx.strokeRect((xm-r1.y-r1.h)*sc,50+(r.height/xmax*600-preki)*sc,r1.h*sc,(preki-podia)*sc);
						ctx.lineWidth=1;ctx.strokeStyle="#000000";
						ctx.strokeRect((xm-r1.y-r1.h)*sc+2,53+(r.height/xmax*600-preki)*sc,r1.h*sc-4,(preki-podia)*sc-6);
					}
				}
			}
			if (o==2){ //ΝΟΤΙΟΣ ΤΟΙΧΟΣ
				ctx.strokeRect((r.x-xm1)*sc,50,r.w*sc,r.height*sc/xmax*600);
				ctx.fillStyle=brick;
				ctx.fillRect((r.x-xm1)*sc+2,52,r.w*sc-4,r.height*sc/xmax*600-4); //ΤΟΙΧΟΣ
				ctx.fillStyle=concr;
				if (r.hd>0){
					ctx.fillRect((r.x-xm1)*sc+2,52,r.w*sc-4,r.hd*sc/xmax*600-4); //ΔΟΚΑΡΙ
					draw_line(ctx,(r.x-xm1)*sc+2,50+r.hd*sc/xmax*600,(r.x-xm1+r.w)*sc-2,50+r.hd*sc/xmax*600,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				}
				draw_line(ctx,(r.x-xm1)*sc+2,50,(r.x-xm1+r.w)*sc-2,50,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ 
				draw_line(ctx,(r.x-xm1)*sc+2,50+r.height*sc/xmax*600,(r.x-xm1+r.w)*sc-2,50+r.height*sc/xmax*600,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				for (j=0;j<rect.length;j++){
					if (rect[j].type==4 && rect[j].c==i){ //ΥΠΟΣΤΥΛΩΜΑΤΑ
						ctx.fillStyle=concr;
						var r1=rect[j];
						ctx.fillRect((r1.x-xm1)*sc+2,52,r1.w*sc-4,r.height*sc/xmax*600-4);
						//ΘΕΡΜΟΓΕΦΥΡΕΣ
						if (Math.abs(r1.x-r.x)>2){draw_line(ctx,(r1.x-xm1)*sc+2,50+r.hd*sc/xmax*600,(r1.x-xm1)*sc+2,50+r.height*sc/xmax*600-2,"#FF0000");}
						if (Math.abs(r1.x+r1.w-r.x-r.w)>2){draw_line(ctx,(r1.x-xm1+r1.w)*sc-2,50+r.hd*sc/xmax*600,(r1.x-xm1+r1.w)*sc-2,50+r.height*sc/xmax*600-2,"#FF0000");}
					}
					if (rect[j].type==3 && rect[j].c==i){ //ΑΝΟΙΓΜΑΤΑ
						ctx.fillStyle=glass;
						var r1=rect[j];
						var podia=r1.ah/xmax*600;var preki=r1.height/xmax*600;
						ctx.fillRect((r1.x-xm1)*sc,50+(r.height/xmax*600-preki)*sc,r1.w*sc,(preki-podia)*sc);
						ctx.strokeStyle="#FF0000";ctx.lineWidth=2;
						ctx.strokeRect((r1.x-xm1)*sc,50+(r.height/xmax*600-preki)*sc,r1.w*sc,(preki-podia)*sc);
						ctx.lineWidth=1;ctx.strokeStyle="#000000";
						ctx.strokeRect((r1.x-xm1)*sc+2,53+(r.height/xmax*600-preki)*sc,r1.w*sc-4,(preki-podia)*sc-6);
					}
				}
			}
			if (o==3){ //ΔΥΤΙΚΟΣ ΤΟΙΧΟΣ
				ctx.strokeRect((r.y-xm1)*sc,50,r.h*sc,r.height*sc/xmax*600);
				ctx.fillStyle=brick;
				ctx.fillRect((r.y-xm1)*sc+2,52,r.h*sc-4,r.height*sc/xmax*600-4); //ΤΟΙΧΟΣ
				ctx.fillStyle=concr;
				if (r.hd>0){
					ctx.fillRect((r.y-xm1)*sc+2,52,r.h*sc-4,r.hd*sc/xmax*600-4); //ΔΟΚΑΡΙ
					draw_line(ctx,(r.y-xm1)*sc+2,50+r.hd*sc/xmax*600,(r.y-xm1+r.h)*sc-2,50+r.hd*sc/xmax*600,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				}
				draw_line(ctx,(r.y-xm1)*sc+2,50,(r.y-xm1+r.h)*sc-2,50,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				draw_line(ctx,(r.y-xm1)*sc+2,50+r.height*sc/xmax*600,(r.y-xm1+r.h)*sc-2,50+r.height*sc/xmax*600,"#FF0000"); //ΘΕΡΜΟΓΕΦΥΡΑ
				for (j=0;j<rect.length;j++){ 
					if (rect[j].type==4 && rect[j].c==i){ //ΥΠΟΣΤΥΛΩΜΑΤΑ
						ctx.fillStyle=concr;
						var r1=rect[j];
						ctx.fillRect((r1.y-xm1)*sc+2,52,r1.h*sc-4,r.height*sc/xmax*600-4);
						//ΘΕΡΜΟΓΕΦΥΡΕΣ
						if (Math.abs(r1.y-r.y)>2){draw_line(ctx,(r1.y-xm1)*sc+2,50+r.hd*sc/xmax*600,(r1.y-xm1)*sc+2,50+r.height*sc/xmax*600-2,"#FF0000");}
						if (Math.abs(r1.y+r1.h-r.y-r.h)>2){draw_line(ctx,(r1.y-xm1+r1.h)*sc-2,50+r.hd*sc/xmax*600,(r1.y-xm1+r1.h)*sc-2,50+r.height*sc/xmax*600-2,"#FF0000");}
					}
					if (rect[j].type==3 && rect[j].c==i){ //ΑΝΟΙΓΜΑΤΑ
						ctx.fillStyle=glass;
						var r1=rect[j];
						var podia=r1.ah/xmax*600;var preki=r1.height/xmax*600;
						ctx.fillRect((r1.y-xm1)*sc,50+(r.height/xmax*600-preki)*sc,r1.h*sc,(preki-podia)*sc); 
						ctx.strokeStyle="#FF0000";ctx.lineWidth=2;
						ctx.strokeRect((r1.y-xm1)*sc,50+(r.height/xmax*600-preki)*sc,r1.h*sc,(preki-podia)*sc);
						ctx.lineWidth=1;ctx.strokeStyle="#000000";
						ctx.strokeRect((r1.y-xm1)*sc+2,53+(r.height/xmax*600-preki)*sc,r1.h*sc-4,(preki-podia)*sc-6);
					}
				}
			}
			
		}}
	}

	var inf=fn1[floor]+' - ΤΟΙΧΟΣ '+rect[sr].name;
	
	document.getElementById('v_info').innerHTML=inf;
}

//*********************  ΑΝΟΙΓΜΑ ************************************************
function info2(){
$.colorbox({inline:true,  href:"#info2" , width:"430px;" });
set_names();
var r=rect[selected_rect];
var nn=r.name;
if (nn==undefined){nn="";}
document.getElementById('an').value=nn;
var xx=Math.round((r.x)/600*xmax*20)*5/100;
xx=number_format(xx,2,".",",");
var yy=Math.round((600-r.y)/600*ymax*20)*5/100;
yy=number_format(yy,2,".",",");
document.getElementById('ax_info').value=xx;
document.getElementById('ay_info').value=yy;
var lx=document.getElementById('lx').value;
var ly=document.getElementById('ly').value;
to=0;
if (lx>ly){document.getElementById('alx_info').value=lx;}else{document.getElementById('alx_info').value=ly;to=1;}
document.getElementById('aly_info').value=number_format(r.ah,2,".",",");
var preki=r.height;
if (preki==undefined || preki==0){preki=2.2;}
document.getElementById('ah').value=number_format(preki,2,".",",");
document.getElementById('ae').selectedIndex=r.ae;
for (i=0;i<document.getElementById("aa").length;i++){
	if (document.getElementById("aa").options[i].value==r.aa){document.getElementById("aa").options[i].selected=true;break;}
}
document.getElementById('au').value=number_format(r.u,2,".",",");
document.getElementById('th1').value=number_format(r.th1,2,".",",");
document.getElementById('th2').value=number_format(r.th2,2,".",",");
sr=selected_rect;
selected_rect=-1;
}

function save_anoigma(){
$.fn.colorbox.close();
var r=rect[sr];
var xx=document.getElementById('ax_info').value;
var yy=document.getElementById('ay_info').value;
xx=xx/xmax*600;
yy=600-yy/ymax*600;
r.x=xx;r.y=yy;
var lx=document.getElementById('alx_info').value;
if (to==0){r.w=lx/xmax*600;}else{r.h=lx/xmax*600;}
r.ah=document.getElementById('aly_info').value;
r.height=document.getElementById('ah').value
r.ae=document.getElementById('ae').selectedIndex;
r.aa=document.getElementById("aa").options[document.getElementById("aa").selectedIndex].value;
r.u=document.getElementById('au').value;
r.th1=document.getElementById('th1').value;
r.th2=document.getElementById('th2').value;
check_dims(sr);
redraw_all();
save=0;
}

function get_thermo_lamda(){
$("#lamda1").colorbox({iframe:true, width:"685px", height:"90%" , onClosed:function(){ selected_rect=sr; info2(); } });
}	
function get_thermo_ak(){
$("#lamda2").colorbox({iframe:true, width:"690px", height:"90%" , onClosed:function(){ selected_rect=sr; info2(); } });
}
function getpsi(n,x,t){
$.fn.colorbox.close();
if (x==99){
rect[sr].th_or=document.getElementById("t_thermo").options[n-1].value;
}else{
if (t=='l'){rect[sr].th1=document.getElementById("l_thermo").options[n-1].value;}
if (t=='a'){rect[sr].th2=document.getElementById("a_thermo").options[n-1].value;}
}
}

//*********************  ΥΠΟΣΤΥΛΩΜΑ ************************************************

function info3(){
$.colorbox({inline:true,  href:"#info3"});
var r=rect[selected_rect];
var xx=Math.round((r.x)/600*xmax*20)*5/100;
xx=number_format(xx,2,".",",");
var yy=Math.round((600-r.y)/600*ymax*20)*5/100;
yy=number_format(yy,2,".",",");
document.getElementById('yx_info').value=xx;
document.getElementById('yy_info').value=yy;
if (rect[r.c].w>rect[r.c].h){var lx=document.getElementById('lx').value;to=0;}else{var lx=document.getElementById('ly').value;to=1;}
document.getElementById('ylx_info').value=lx;
document.getElementById('yu').value=number_format(r.u,2,".",",");
document.getElementById('th_yp').value=number_format(r.th1,2,".",",");

sr=selected_rect;
selected_rect=-1;
}

function save_stylos(){
$.fn.colorbox.close();
var r=rect[sr];
var xx=document.getElementById('yx_info').value;
var yy=document.getElementById('yy_info').value;
xx=xx/xmax*600;
yy=600-yy/ymax*600;
r.x=xx;r.y=yy;
var lx=document.getElementById('ylx_info').value;
if (to==0){r.w=lx/xmax*600;}else{r.h=lx/xmax*600;}
r.u=document.getElementById('yu').value;
r.th1=document.getElementById('th_yp').value;
check_dims(sr);
redraw_all();
save=0;
}

function get_thermo_ypost(){
$("#thermoypost").colorbox({iframe:true, width:"685px", height:"90%"  , onClosed:function(){ selected_rect=sr; info3(); }});
}
function getpsi2(n,x){
$.fn.colorbox.close();
rect[sr].th1=document.getElementById("yp_thermo").options[n-1].value;
}

//**************************** ΕΙΣΑΓΩΓΗ ΚΑΤΟΨΗΣ *************************************

function insert_image(){
$.fn.colorbox.close();
if (document.getElementById("uploadImage").value !== "" ){
	var img = new Image();
	img.src=document.getElementById('uploadPreview').src;
	imgw=img.width;imgh=img.height;imw=imh*imgw/imgh;
	var ctx=document.getElementById("canvas").getContext("2d");
	ctx.globalAlpha = 0.5;
	ctx.drawImage(document.getElementById('uploadPreview'),imx+x0,imy+y0,imw,imh);
}
}

function calib_image(x,y){
if (document.getElementById("uploadImage").value !== "" ){
	if (imcal1==0){imcal1=x;imcal2=y;return;}
	imcal3=y;
	$.colorbox({inline:true,  href:"#image_calibr", width:"300px;", 
		onComplete:function(){ document.getElementById('cal1').focus(); } , 
		onClosed:function(){ set_action('edit'); }  
	});
}else{
	set_action('edit');
}
}

function calibrate(){
$.fn.colorbox.close();
var x=imcal1;
var y=imcal2;
var d=document.getElementById("cal1").value;
d=d/ymax*600;
var sc=d/Math.abs(imcal3-imcal2);
imx=imx+x0+x-imcal1*sc;
imy=imy+y0+y-imcal2*sc;
imw=imw*sc;
imh=imh*sc;
redraw_all();
imcal1=0;imcal2=0;imcal3=0;
set_action('edit');
}

function set_action(n){
	if (document.getElementById("floor").value==0 && n!=='help' && n!=='edit'){alert("Επιλέξτε πρώτα μία στάθμη");return;}
	document.getElementById('edit').style.backgroundColor="#ffffff";
	document.getElementById('erase').style.backgroundColor="#ffffff";
	document.getElementById('save').style.backgroundColor="#ffffff";
	document.getElementById('props').style.backgroundColor="#ffffff";
	document.getElementById('move').style.backgroundColor="#ffffff";
	document.getElementById('insert').style.backgroundColor="#ffffff";
	document.getElementById('calibr').style.backgroundColor="#ffffff";
	document.getElementById('help').style.backgroundColor="#ffffff";
	document.getElementById(n).style.backgroundColor="#aaaaaa";
	document.getElementById('canvas').style.cursor="pointer";
	if (n=="edit"){document.getElementById('canvas').style.cursor="crosshair";dxs=0;dys=0;dxe=0;dye=0;}
	if (n=="calibr"){document.getElementById('canvas').style.cursor="crosshair";}
	if (n=="move"){document.getElementById('canvas').style.cursor="move";}
	if (n=="props"){document.getElementById('canvas').style.cursor="help";}
	action=n;
	if (n=='insert'){$.colorbox({inline:true,  href:"#image_insert" , onClosed:function(){if (document.getElementById("uploadImage").value == "" ){ set_action('edit');} } });}
	if (n=='help'){$.colorbox({inline:true,  href:"#draw_help", width:"82%", onClosed:function(){ set_action('edit'); }  });}
}

function setmax(){
var sc=ymax;var ymax1=ymax;
ymax=parseFloat(document.getElementById("ymax").value);
xmax=ymax;
sc=sc/ymax
for (i=0;i<rect.length;i++){
	var r=rect[i];
//	r.x=r.x*sc;r.y=r.y*sc+600*(1-sc);r.w=r.w*sc;r.h=r.h*sc;
	var x=Math.round(r.x/600*ymax1*20)*5/100;
	r.x=x/ymax*600;
	var x=Math.round((600-r.y)/600*ymax1*20)*5/100;
	r.y=600-x/ymax*600;
	var x=Math.round(r.w/600*ymax1*20)*5/100;
	r.w=x/ymax*600;
	var x=Math.round(r.h/600*ymax1*20)*5/100;
	r.h=x/ymax*600;
}
x0=400-cleft-(400-cleft-x0)*sc;
y0=(300+ctop+y0)*sc-300-ctop;
imh=imh*sc;imx=imx*sc;imy=imy*sc+(ymax-ymax1)/ymax*600;
redraw_all();
zooming=0;
}

function zoomInOut(event){
	var delta = 0;
	if (!event) event = window.event;
	if(event.preventDefault) { event.preventDefault(); }
	event.returnValue = false;
	// normalize the delta
	if (event.wheelDelta){
		// IE & Opera
		delta = event.wheelDelta / 120;
	}else if (event.detail) // W3C
	{
		delta = -event.detail / 3;
	}
	if(zooming==1){return;}
	var newzoom=parseFloat(xmax)-delta;
	if (newzoom<1){newzoom=1;}
	if (newzoom>50){newzoom=50;}
	document.getElementById("ymax").value=newzoom;
	zooming=1;
	setmax();
}

function redraw_all(){
	var ctx=document.getElementById("canvas").getContext("2d");
	ctx.clearRect(0,0,800,600);
	draw_grid();
	insert_image();
	for (i=0;i<rect.length;i++){
		draw_rect(i);
	}
}

function erase_rect(r){
	rect.splice(r,1);
	selected_rect=-1;
	redraw_all();
	document.getElementById("lx").value="";
	document.getElementById("ly").value="";
}

function draw_rect(r){
	var ctx=document.getElementById("canvas").getContext("2d");
	ctx.globalAlpha = 1;
	ctx.strokeStyle="#000000";
	var r=rect[r];
	ctx.strokeRect(r.x+x0,r.y+y0,r.w,r.h);
	if (r.type==1){ctx.fillStyle="#FF0000";}
	if (r.type==2){ctx.fillStyle="#f89b08";}
	if (r.type==3){ctx.fillStyle="#00FF00";}
	if (r.type==4){ctx.fillStyle="#045a59";}
	if (r.type==5){ctx.fillStyle="#aaaaaa";}
	ctx.globalAlpha = 0.5;
	ctx.fillRect(r.x+1+x0,r.y+1+y0,r.w-2,r.h-2);
	document.getElementById('draw').innerHTML="";
}

function is_inside(x,y,r){
	var r=rect[r];
	if (x>=r.x && x<=(r.x+r.w) && y>=r.y && y<=(r.y+r.h) ){
		if (dtype==r.type || action=="edit") {return true;}else{return false;}
	}else{
		return false;
	}
}

function is_top(x,y,r){
	var r=rect[r];
	if (x>=r.x && x<=(r.x+r.w) && y>=r.y && y<=(r.y+5) ){
		if (dtype==r.type || action=="edit") {return true;}else{return false;}
	}else{
		return false;
	}
}

function is_bottom(x,y,r){
	var r=rect[r];
	if (x>=r.x && x<=(r.x+r.w) && y>=r.y+r.h-5 && y<=(r.y+r.h) ){
		if (dtype==r.type || action=="edit") {return true;}else{return false;}
	}else{
		return false;
	}
}

function is_left(x,y,r){
	var r=rect[r];
	if (x>=r.x && x<=(r.x+5) && y>=r.y && y<=(r.y+r.h) ){
		if (dtype==r.type || action=="edit") {return true;}else{return false;}
	}else{
		return false;
	}
}

function is_right(x,y,r){
	var r=rect[r];
	if (x>=r.x+r.w-5 && x<=(r.x+r.w) && y>=r.y && y<=(r.y+r.h)){
		if (dtype==r.type || action=="edit") {return true;}else{return false;}
	}else{
		return false;
	}
}

function move(x,dx,dy){
	rect[x].x=rect[x].x+dx-xt1;rect[x].y=rect[x].y+dy-yt1;
}

function check_dims(x,dx,dy){
var r0=rect[x];
if (r0.w<10){r0.w=10;if (action=="stretch_left"){r0.x=r0.x-dx+xt1;}}
if (r0.h<10){r0.h=10;if (action=="stretch_up"){r0.y=r0.y-dy+yt1;}}
if (r0.type==2){
	for (i=0;i<rect.length;i++){
		if ((rect[i].type==3 || rect[i].type==4) && rect[i].c==x){
			check_dims(i);
		}
	}
}
if (r0.type==3 || r0.type==4){
	var r=rect[r0.c];
	if (r.w>r.h){
		r0.y=r.y;r0.h=r.h;
		if (r0.x<r.x){r0.x=r.x;}
		if (r0.x+r0.w>r.x+r.w){r0.x=r.x+r.w-r0.w;}
	}
	if (r.w<r.h){
		r0.x=r.x;r0.w=r.w;
		if (r0.y<r.y){r0.y=r.y;}
		if (r0.y+r0.h>r.y+r.h){r0.y=r.y+r.h-r0.h;}
	}
}}

function mousemove(event){
	var dx=event.clientX-cleft;
	var dy=event.clientY-ctop;
	var x=Math.round((event.clientX-cleft-x0)/600*xmax*20)*5/100;
	x=number_format(x,2,".",",");
	var y=Math.round((600+ctop-event.clientY+y0)/600*ymax*20)*5/100;
	y=number_format(y,2,".",",");
	document.getElementById("x").value=x;
	document.getElementById("y").value=y;
	if (xe!=0){xs=0;ys=0;xe=0;ye=0;}
	if (dxe!=0){dxs=0;dys=0;dxe=0;dye=0;}
	if (dxs!=0 && action=='edit'){
		var jg = new jsGraphics("draw"); 
		document.getElementById('draw').innerHTML="";
		jg.setColor("red");
		jg.setStroke(1);
		jg.setStroke(Stroke.DOTTED); 
		jg.drawRect(dxs,dys,dx-dxs,dy-dys);
		jg.paint();
		var t=Math.round(Math.abs(dx-dxs)/600*xmax*20)*5/100;
		t=number_format(t,2,".",",");
		document.getElementById("lx").value=t;
		var t=Math.round(Math.abs(dy-dys)/600*xmax*20)*5/100;
		t=number_format(t,2,".",",");
		document.getElementById("ly").value=t;
	}
	if (action=="move" && selected_rect>-1){
		var x=selected_rect;
		var r=rect[x];
		if (r.type==2){
			for (i=0;i<rect.length;i++){
				if ((rect[i].type==3 || rect[i].type==4) && rect[i].c==x){
					move(i,dx,dy);
				}
			}
		}
		move(x,dx,dy);
		check_dims(x);
		xt1=dx;yt1=dy;
		document.getElementById('canvas').style.cursor="move";
		redraw_all();
	}
	if (action=="stretch_up" && selected_rect>-1){
		var r=rect[selected_rect];
		r.y=r.y+dy-yt1;r.h=r.h-dy+yt1;
		check_dims(selected_rect,dx,dy);
		xt1=dx;yt1=dy;
		document.getElementById('canvas').style.cursor="n-resize";
		redraw_all();
	}
	if (action=="stretch_down" && selected_rect>-1){
		var r=rect[selected_rect];
		r.h=r.h+dy-yt1;
		check_dims(selected_rect);
		xt1=dx;yt1=dy;
		document.getElementById('canvas').style.cursor="s-resize";
		redraw_all();
	}
	if (action=="stretch_left" && selected_rect>-1){
		var r=rect[selected_rect];
		r.x=r.x+dx-xt1;r.w=r.w-dx+xt1;
		check_dims(selected_rect,dx);
		xt1=dx;yt1=dy;
		document.getElementById('canvas').style.cursor="w-resize";
		redraw_all();
	}
	if (action=="stretch_right" && selected_rect>-1){
		var r=rect[selected_rect];
		r.w=r.w+dx-xt1;
		check_dims(selected_rect);
		xt1=dx;yt1=dy;
		document.getElementById('canvas').style.cursor="e-resize";
		redraw_all();
	}
	if (action=="drag" && selected_rect==-1){
		x0=x0+dx-xt1;y0=y0+dy-yt1;
		xt1=dx;yt1=dy;
		document.getElementById('canvas').style.cursor="move";
		redraw_all();
	}
}

function mousedown(event){
if (document.getElementById("floor").value==0){alert("Επιλέξτε πρώτα μία στάθμη");return;}
xt1=event.clientX-cleft;
yt1=event.clientY-ctop;
if (event.which==2){
	document.getElementById('draw').innerHTML="";
	dxs=0;
}
if (action=="edit" && (dtype==3 || dtype==4)){
	for (i=0;i<rect.length;i++){
		if (is_inside(xt1-x0,yt1-y0,i)){
			if (rect[i].type==2){break;}
		}
	}
	if (i==rect.length && ws==-1){alert("Το σημείο δεν βρίσκεται σε κάποιον τοίχο");return;}
	if (ws<0){ws=i;}
}
if (action=="move" || action=="erase"  || action=="props" ){
	for (i=0;i<rect.length;i++){
		if (is_inside(xt1-x0,yt1-y0,i)){
			selected_rect=i;
			var t=Math.round(rect[i].w/600*xmax*20)*5/100;
			t=number_format(t,2,".",",");
			document.getElementById("lx").value=t;
			var t=Math.round(rect[i].h/600*xmax*20)*5/100;
			t=number_format(t,2,".",",");
			document.getElementById("ly").value=t;
			if (is_top(xt1-x0,yt1-y0,i) && action=="move"){action="stretch_up";document.getElementById('canvas').style.cursor="n-resize";}
			if (is_bottom(xt1-x0,yt1-y0,i) && action=="move"){action="stretch_down";document.getElementById('canvas').style.cursor="s-resize";}
			if (is_left(xt1-x0,yt1-y0,i) && action=="move"){action="stretch_left";document.getElementById('canvas').style.cursor="w-resize";}
			if (is_right(xt1-x0,yt1-y0,i) && action=="move"){action="stretch_right";document.getElementById('canvas').style.cursor="e-resize";}
			break;
		}
	}
	if (action=="move" && selected_rect==-1){action="drag";document.getElementById('canvas').style.cursor="move";}
}

}

function mouseup(event){
xt2=event.clientX-cleft;
yt2=event.clientY-ctop;
if (action=="stretch_up" || action=="stretch_down" || action=="stretch_left" || action=="stretch_right" || action=="drag"){action="move";document.getElementById('canvas').style.cursor="move";}
if (action=="move"){selected_rect=-1;}
}

function mouseclick(event){
	var dx=event.clientX-cleft;
	var dy=event.clientY-ctop;
	var x=Math.round((event.clientX-cleft)/600*xmax*20)*5/100;
	x=number_format(x,2,".",",");
	var y=Math.round((600+ctop-event.clientY)/600*ymax*20)*5/100;
	y=number_format(y,2,".",",");
	if (xs!=0){xe=x;ye=y;}
	if (xs==0){xs=x;ys=y;xe=0;ye=0;}
	if (dxs!=0 && action=='edit'){
		dxe=dx;dye=dy;
		var r=new rectangle(Math.min(dxs,dxe)-x0,Math.min(dys,dye)-y0,Math.abs(dxe-dxs),Math.abs(dye-dys),dtype);
		rect.push(r);
		var r1=rect[ws];var r2=rect[rect.length-1];
		if (dtype==3 || dtype==4){
			if (r1.w>r1.h){
				r2.y=r1.y;r2.h=r1.h;
				if (r2.x<r1.x){r2.w=r2.x+r2.w-r1.x;r2.x=r1.x;}
				if (r2.x+r2.w>r1.x+r1.w){r2.w=r1.x+r1.w-r2.x;}
			}
			if (r1.w<r1.h){
				r2.x=r1.x;r2.w=r1.w;
				if (r2.y<r1.y){r2.h=r2.y+r2.h-r1.y;r2.y=r1.y;}
				if (r2.y+r2.h>r1.y+r1.h){r2.h=r1.y+r1.h-r2.y;}
			}
		r2.c=ws;
		ws=-1;
		}
		redraw_all();
		save=0;
	}
	if (dxs==0 && action=='edit'){dxs=dx;dys=dy;dxe=0;dye=0;}
	if (action=='erase' && selected_rect>-1){
		var x=selected_rect;var xrt=rect[x].type;
		erase_rect(x);
		if (xrt==2){
			var ch=0;
			while (ch!==1){
				var j=rect.length;
				for (i=0;i<j;i++){
					if ((rect[i].type==3 || rect[i].type==4) && rect[i].c==x){
						erase_rect(i);
						break;
					}
				}
				if (i==j){ch=1;}
			}
		}
		save=0;
	}
	if (action=='props' && selected_rect>-1){
		if (rect[selected_rect].type==1){info();return;}
		if (rect[selected_rect].type==2){info1();;return;}
		if (rect[selected_rect].type==3){info2();;return;}
		if (rect[selected_rect].type==4){info3();;return;}
	}
	if (action=='calibr'){calib_image(dx,dy);}
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
