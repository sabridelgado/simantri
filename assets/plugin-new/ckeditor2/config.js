/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.height = '750px';
	config.allowedContent = true;
	config.autoParagraph=false;
	config.format_tags = 'p;h1;h2;h3;pre';
	
	config.contentsCss = 'CustomFonts/fonts.css';
	config.font_names = 'Arial Bold/arialblack;' + config.font_names;
	config.font_names = 'tahomab/tahomab;' + config.font_names;
	config.font_names = 'monotypecorsiva/monotypecorsiva;' + config.font_names;
	config.font_names = 'Arial Narrow/arialnarrow;' + config.font_names;
	config.font_names = 'Arial Narrow Bold/arialnarrowb;' + config.font_names;
};
