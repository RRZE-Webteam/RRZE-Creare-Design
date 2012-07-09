/**
 * Projekt Vorlagenkatalog 
 *
 * Layout HTML5
 * 
 * @name            keyboard_menu
 * @desc            aktiviert Tastatur-Navigation im Hauptmenue
 *
 * @author          Thomas Kipf
 * @copyright       Copyright 2005-2012, RRZE
 * @license         CC-A 2.0 (http://creativecommons.org/licenses/by/2.0/)
 * @link            http://www.vorlagen.uni-erlangen.de
 * @package         js
 * @version         1.1
 * @lastmodified    06/2012
 */
 
function toggleHover(e, addHover, layers){
	for(var j = 0; j < layers*2; j++){
		e = e.parentNode;
		if(e.nodeName=='UL'||e.nodeName=='SPAN') continue;
		if(e.nodeName!='LI') break;
		if(addHover) e.className += ' hover';
		else e.className = e.className.replace( /(?:^|\s)hover(?!\S)/ , '' );
	}	
}

var menuLayers = 5; //Anzahl der Menue-Ebenen	
var links = document.getElementById('navigation').getElementsByTagName('a');

for (var i = 0; i < links.length; i++) {   
	links[i].onfocus = function(){ toggleHover(this, 1, menuLayers); }; //onfocus, onblur: alle Browser (ohne IE)
	links[i].onfocusin = function(){ toggleHover(this, 1, menuLayers); }; //onfocusin, onfocusout: IE
	links[i].onblur = function(){ toggleHover(this, 0, menuLayers);	};
	links[i].onfocusout = function(){ toggleHover(this, 0, menuLayers); };
}