/**
 * Projekt Vorlagenkatalog 
 *
 * Basis-JavaScript-Datei HTML5
 *
 * @author          Thomas Kipf
 * @copyright       Copyright 2005-2012, RRZE
 * @license         CC-A 2.0 (http://creativecommons.org/licenses/by/2.0/)
 * @link            http://www.vorlagen.uni-erlangen.de
 * @package         js
 * @version         1.0
 * @lastmodified    04/2012
 */

/* Include-Funktion definieren */
function includeJS(fileName) {
	var a = document.createElement('script');
	a.setAttribute('src',fileName);
	a.setAttribute('type','text/javascript');
	document.getElementsByTagName('head')[0].appendChild(a);
}

/* Basis-JavaScript einbinden */
includeJS('base.js');

/* Layoutspezifisches JavaScript einbinden */
includeJS('keyboard_menu.js');
includeJS('header_position.js');
includeJS('topline_scroll.js');
includeJS('sidebar_mobile.js');