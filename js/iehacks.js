/**
 * Projekt Vorlagenkatalog 
 *
 * Basis-JavaScript-Datei für IE (Versionen kleinergleich 8) 
 *
 * @author          Thomas Kipf
 * @copyright       Copyright 2005-2012, RRZE
 * @license         CC-A 2.0 (http://creativecommons.org/licenses/by/2.0/)
 * @link            http://www.vorlagen.uni-erlangen.de
 * @package         js
 * @version         1.0
 * @lastmodified    04/2012
 */

/* HTML5-Tags erzeugen */

var html5Elements = new Array(
	'article',
	'aside',
	'details',
	'figcaption',
	'figure',
	'footer',
	'header',
	'hgroup',
	'nav',
	'section',
	'audio',
	'canvas',
	'video'
);

for(var i=0;i<html5Elements.length;i++){
	document.createElement(html5Elements[i]);
}