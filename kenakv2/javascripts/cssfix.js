function check_version(){
var b=navigator.appVersion;
var n=b.indexOf("Chrome");
if (n>-1){
	document.write("<style>ul.tabnav {margin-bottom:6px;}</style>");
}
}
check_version();
