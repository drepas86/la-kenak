/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{

	config.toolbarCanCollapse = false;
	config.defaultLanguage = 'el';
	config.filebrowserBrowseUrl = 'includes/filemanager/'
	config.skin = 'v2' ;
	config.resize_enabled = false;
	config.filebrowserWindowHeight = '60%';
	config.filebrowserWindowWidth = '60%';
	config.height = 500;
	config.htmlEncodeOutput = false;
	
config.toolbar_Basic =
[
    { name: 'document',    items : [ 'Preview','Print','Source' ] },
    { name: 'clipboard',   items : [ 'Undo','Redo' ] },
    { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
    { name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'] },
    { name: 'insert',      items : [ 'Image','Table','HorizontalRule','SpecialChar' ] },
    { name: 'styles',      items : [ 'Format' ] },
    { name: 'colors',      items : [ 'TextColor','BGColor' ] },
    { name: 'tools',       items : [ 'Maximize', '-','About' ] }
];	
config.toolbar = 'Basic';

};
