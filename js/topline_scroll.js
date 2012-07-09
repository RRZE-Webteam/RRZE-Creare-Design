/**
 * Projekt Vorlagenkatalog 
 *
 * Layout HTML5
 * 
 * @name            topline_scroll
 * @desc            Kopfzeile mit Suchfeld und Menue scrollt mit
 *
 * @author          Thomas Kipf
 * @copyright       Copyright 2005-2012, RRZE
 * @license         CC-A 2.0 (http://creativecommons.org/licenses/by/2.0/)
 * @link            http://www.vorlagen.uni-erlangen.de
 * @package         js
 * @version         1.0
 * @lastmodified    05/2012
 */
	
function getTopOffset(elem){
	var topOffset = 0;
	if(elem.offsetParent) {	
		do{	topOffset += elem.offsetTop; } 
		while (elem = elem.offsetParent);
	}
	return topOffset;
}
 
if(document.body.clientWidth > 480){

	var header = document.getElementById('kopf');
	var menu = document.getElementById('menu');
	var menuTopOffset = getTopOffset(menu);
	var nav = document.getElementById('navigation');
	var topline_shown = 0;
	var nav_shown = 0;
	
	var topline = document.createElement('div');
	topline.setAttribute('id','topline');
	header.appendChild(topline);
	
	var navline = document.createElement('div');
	navline.setAttribute('id','navline');
	header.appendChild(navline);	
	
	var suche = document.getElementById('suche');
	suche.setAttribute('class','fixed');
	suche.style.width = document.getElementById('main').offsetWidth+"px";
	
	
	if ('pageXOffset' in window) { //alle Browser, IE ab IE9	
		window.onscroll = function(){		
			var scrollTop = window.pageYOffset;
		
			if(scrollTop != 0 && topline_shown == 0){ topline.setAttribute('class','shadow'); topline_shown = 1; }
			else if(scrollTop == 0 && topline_shown == 1){ topline.setAttribute('class',''); topline_shown = 0; }
			
			if(scrollTop > (menuTopOffset-36) && nav_shown == 0){ nav.setAttribute('class','fixed'); navline.setAttribute('class','show'); nav_shown = 1; }
			else if(scrollTop <= (menuTopOffset-36) && nav_shown == 1){ nav.setAttribute('class',''); navline.setAttribute('class',''); nav_shown = 0; }
		}	
	}
	
	topline.onclick = function(){scroll(0,0);}
	suche.onclick = function(){scroll(0,0);}

}