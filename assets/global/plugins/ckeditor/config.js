/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
var urlbase = '../../../assets/global/plugins';
CKEDITOR.editorConfig = function( config )
{
	// console.log( window.location.href); 
	// Define changes to default configuration here. For example:
	config.language = 'es';
	config.uiColor = '#F0F0F0';
	// config.allowedContent = true;
	// config.removeFormatAttributes = '';
	// fullPage =true; 
	config.removePlugins = 'htmldataprocessor';
	filebrowserBrowseUrl = urlbase+'/ckfinder/ckfinder.html';  
	filebrowserImageBrowseUrl = urlbase+'/ckfinder/ckfinder.html?Type=Images';
	filebrowserFlashBrowseUrl = urlbase+'/ckfinder/ckfinder.html?Type=Flash';
	filebrowserUploadUrl = urlbase+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	filebrowserImageUploadUrl = urlbase+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	filebrowserFlashUploadUrl = urlbase+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	 
};
