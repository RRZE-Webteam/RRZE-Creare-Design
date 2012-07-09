/**
 * Projekt Vorlagenkatalog 
 *
 * Patch-JavaScript-Datei HTML5
 * enthält Sonderdefinitionen für Internet Explorer (Versionen kleinergleich 8)
 *
 * @author			Thomas Kipf
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
	a.setAttribute('src','/js/'+fileName);
	a.setAttribute('type','text/javascript');
	document.getElementsByTagName('head')[0].appendChild(a);
}

/* Basis-JavaScript einbinden */
includeJS('iehacks.js');

/* Layoutspezifisches JavaScript einbinden */
//includeJS('html5/patches/file.js');