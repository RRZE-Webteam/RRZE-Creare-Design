/**
 * Projekt Vorlagenkatalog 
 *
 * Layout HTML5
 * 
 * @name            sidebar_mobile
 * @desc            positioniert Sidebar im mobilen Layout unterhalb des Inhalts
 *
 * @author          Thomas Kipf
 * @copyright       Copyright 2005-2012, RRZE
 * @license         CC-A 2.0 (http://creativecommons.org/licenses/by/2.0/)
 * @link            http://www.vorlagen.uni-erlangen.de
 * @package         js
 * @version         1.0
 * @lastmodified    06/2012
 */


var main = document.getElementById('main');
var content = document.getElementById('content');
var sidebar = main.getElementsByTagName('aside')[0];

if(document.body.clientWidth <= 480){
	
	content.parentNode.insertBefore(content, sidebar);
	
}