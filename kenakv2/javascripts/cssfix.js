function check_version(){
var b=navigator.userAgent;
var n=b.indexOf("Chrome");
if (n>-1){
	document.write("<style>ul.tabnav {margin-bottom:6px;}</style>");
}
var n=b.indexOf("Firefox/11.0");
if (n>-1){
	document.write("<style>ul.tabnav {margin-bottom:7px;}</style>");
}
}
check_version();
