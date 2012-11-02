
CKConfig.toolbar["MyToolbar"] = [
['NewPage','Save','Preview','-','Templates','-',
'Cut','Copy','Paste','PasteText','PasteWord','-','Print','-',
'Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
'/',
['Bold','Italic','Underline','-','Subscript','Superscript','-',
'OrderedList','UnorderedList','-','Outdent','Indent','-',
'JustifyLeft','JustifyCenter','JustifyRight','JustifyFull','-',
'Image','Table','-','Rule'],
'/',
['FontName','FontSize','TextColor','BGColor']
] ;



CKConfig.filebrowserImageBrowseUrl = CKConfig.BasePath + 'filemanager/browser/default/browser.html?Type=Image&Connector=' + encodeURIComponent( FCKConfig.BasePath + 'filemanager/connectors/' + _FileBrowserLanguage + '/connector.' + _FileBrowserExtension ) ;
CKConfig.filebrowserImageWindowWidth =  '800' ;
CKConfig.filebrowserImageWindowHeight = '600' ;

CKConfig.startupFocus = true ;

CKConfig.toolbarCanCollapse = false;
//CKConfig.ImageDlgHideLink = true;
//CKConfig.ImageDlgHideAdvanced = true;
CKConfig.defaultLanguage = 'el';
//FCKConfig.ImageBrowser = false;

CKConfig.skin = 'skins/office2003/' ;
