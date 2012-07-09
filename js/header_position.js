/**
 * Projekt Vorlagenkatalog 
 *
 * Layout HTML5
 * 
 * @name            header_position
 * @desc            positioniert Titel hoehenabhaengig mittig im Header
 *
 * @author          Thomas Kipf
 * @copyright       Copyright 2005-2012, RRZE
 * @license         CC-A 2.0 (http://creativecommons.org/licenses/by/2.0/)
 * @link            http://www.vorlagen.uni-erlangen.de
 * @package         js
 * @version         1.0
 * @lastmodified    04/2012
 */

var header = document.getElementById('kopf');
var logo = document.getElementById('logo');
var menu = document.getElementById('menu');
var title = logo.getElementsByTagName('p')[0];

if(document.body.clientWidth > 480){
	
	if(logo.offsetHeight > (header.offsetHeight-40)) title.style.fontSize = '1.4em';
	title.style.paddingTop = (header.offsetHeight - title.offsetHeight)/2+"px";
	
}