/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig	=	function(config){
	config.toolbar				=	[ { name: 'all', items: [ 'Undo', 'Redo', '-', 'Styles', 'Format', 'Font', 'FontSize', 'Bold', 'Italic', 'Underline', 'Strike', 'TextColor', 'BGColor', 'CopyFormatting', 'RemoveFormat', '-', 'Maximize', 'Source' ] } ];
	// config.uiColor = '#00AAFF';
	config.height				=	100;
	config.language				=	'tr';
	config.entities_latin		=	false;
	config.basicEntities		=	false;
	config.htmlEncodeOutput		=	false;
	config.entities				=	false;
	config.autoParagraph		=	false;
};

CKEDITOR.config.enterMode		=	CKEDITOR.ENTER_BR;
CKEDITOR.config.shiftEnterMode	=	CKEDITOR.ENTER_BR;