<?
// =========================================================================
//
//  Please, don't remove this
//
//  Author:      				Enéas Gesing (eneasgesing at gmail dot com)
//	Web: 	     				http://www.portalsi.info
//	Name: 	     				xpMenu.class.php
// 	Description:   				An easy to use xp style menu generator class
//  License:      			GNU General Public License (GPL)
//  Release Date:               	December 27th / 2006
//  Last Update date: 		December 27th / 2006
//  Version:                    		1.0
//
// Tested on:
//		* Server Side:
//			* php 4.4.2
//			* php 5.2
//
//		* Client Side:
//			* Internet Explorer 7.0
//			* Mozilla Firefox 2
//			* Opera 9.02
//
//  If you make any modifications making it better, please let me know, send me mail: eneasgesing at gmail dot com
//  PS.: Sorry for my poor english... :P
// ========================================================================

class xpMenu{

	// initialize variables for class use
	var $xpmenu = array();
	var $submenu_onmouseover;
	var $submenu_onmouseout;
	var $menu_backgroundcolor;
	var $option_backgroundcolor;
	var $menu_width;
	var $menu_height;
	var $option_width;
	var $option_height;
	var $menu_cursor;
	var $option_cursor;
	var $option_bordercolor;
	var $menu_topleftborder;
	var $menu_bottomrightborder;

	/*
	Function : xpMenu()
	Parameters:
		none
	Return:
		none
	Description: Class Constructor Function - Sets variables used on the class
	PS.: You can change these values as you need (some values can be changed on style function)

	*/

	function xpMenu(){
		// cell color when mouse is over
		$this->submenu_onmouseover 	= '#558806';
		// cell color when mouse is out
		$this->submenu_onmouseout		= '#ebf9c9';
		// backgroundcolor of menu
		$this->menu_backgroundcolor		= '#558806';
		// backgroundcolor of options
		$this->option_backgroundcolor		= '#ebf9c9';
		// menu width
		$this->menu_width			= '200px';
		// option width
		$this->option_width			= '100%';
		// menu height
		$this->menu_height			= '28px';
		// option height
		$this->option_height			= '24px';
		// menu cursor when mouseover
		$this->menu_cursor			= 'pointer';
		// option cursor when mouseover
		$this->option_cursor			= 'pointer';
		// border color of option
		$this->option_bordercolor		= '#000000';
		// menu top and left borders
		$this->menu_topleftborder		= '#F5F5F5';
		// menu bottom and right borders
		$this->menu_bottomrightborder		= 'buttonshadow';
	}

	/*
	Function : style()
	Parameters:
		none
	Return:
		string $style_css (contain css to put inside of HTML <head> tag)
	Description: Create the CSS for menu
	PS.: You can copy this and paste on your own CSS file (for this use the content of file extra/style.css without PHP vars)
	*/

	function style(){

		$style_css = '
		<style type="text/css">

.menu {
width:150px;
height: 28px; 
padding:12 5 0 2; 
margin: 0 0 0 0;
border-right: buttonshadow 1px solid; 
border-top: #f5f5f5 1px solid; 
border-left: #f5f5f5 1px solid; 
border-bottom: buttonshadow 1px solid; 
background-color: #233a00; 
cursor:pointer; 
color:#ffffff;
font-family:verdana, arial, helvetica; 
font-size: 12px; 
font-weight:normal;
text-align:center;
}

.option {
height: 24px; 
line-height:24px;
padding:0 0 0 3; 
border-left: 1px solid #222222; 
border-right: 1px solid #222222; 
border-bottom: 1px solid #222222; 
background-color: #d6e2bc; 
color:#000000;
cursor:pointer;
font-family:verdana, arial, helvetica; 
font-size: 10px; 
font-weight:normal;
}



		</style>';
		return $style_css;
	}

	/*
	Function : javaScript()
	Parameters:
		none
	Return:
		string $javascript (contain javascript to put inside of HTML <head> tag)
	Description: Create the JavaScript for menu
	PS.: Don't change this if you don't know
	*/

	function javaScript(){

		$javascript = '
		<script language=\'javascript\'>
		// Impede Seleção
		document.onselectstart = function() { return false; }
		menuison=0;
		
		function SwitchMenu(obj,div){
			if(document.getElementById){
		    	var el  = document.getElementById(obj);
				var cat = "mdiv" + div;
		    	var ar  = document.getElementById(cat).getElementsByTagName("span");
		    	if(el.style.display != "block"){
					for (var i=0; i<ar.length; i++){
						var options = "options" + div
						if (ar[i].className== options) ar[i].style.display = "none";
		    			el.style.display = "block";
					}
					menuison=1;
		    	}else{
		    		el.style.display = "none";
					menuison=0;
		    	}		    
		    }
		}

		function HideMenu(event,obj,div){
			var x=event.clientX;
			var y=event.clientY;
			var m=div;
			if(document.getElementById){
		    	var el  = document.getElementById(obj);
				var cat = "mdiv" + div;
				var ar  = document.getElementById(cat).getElementsByTagName("div");
				if ( ((m-1)*160+5)<x && x<(m*160-5) && ((ar.length*24+21)>y) )return;
    			el.style.display = "none";
			}
		}
		
		function CheckMenu(obj,div){
			if (menuison==0)return;
	    	var el  = document.getElementById(obj);
			var cat = "mdiv" + div;
	    	var ar  = document.getElementById(cat).getElementsByTagName("span");
			for (var i=0; i<ar.length; i++){
				var options = "options" + div
				if (ar[i].className== options) ar[i].style.display = "none";
    			el.style.display = "block";
			}

		}
		
		function OptionON(obj){
			obj.style.background="#558806";
			obj.style.color="#ffffff";
		}

		function OptionOFF(obj){
			obj.style.background="#d6e2bc";
			obj.style.color="#000000";
		}


		</script>';
		return $javascript;
	}

	/*
	Function : addCategory()
	Parameters:
		string $a_name - shortened name of category (you can use any name, withou spaces or special characters)
		string $name - name that will be displayed on menu
		string $image - image that will be displayed on menu
	Return:
		none
	Description: Add a category on menu
	*/
	function addMenu($a_name){
		$this->xpmenu[$a_name] = array();
	}
	function addCategory($a_name, $name, $image, $menu){
	
		$array = array("name" => $name, "image" => $image, "options" => "");
		$this->xpmenu[$menu]["categories"]["$a_name"] = $array;
	}

	/*
	Function : addOption()
	Parameters:
		string $a_name - shortened name of option (you can use any name, withou spaces or special characters)
		string $name - name that will be displayed on menu
		string $image - image that will be displayed on menu
		string $link - option link on menu
		string $category - category to include the option
	Return:
		none
	Description: Add an option in a category on menu
	*/

	function addOption($a_name, $name, $image, $link, $category, $menu){

		$array = array("name" => $name, "image" => $image, "link" => $link);
		$this->xpmenu[$menu]["categories"]["$category"]["options"]["$a_name"] = $array;
	}

	/*
	Function : mountMenu()
	Parameters: none
	Return:
		string $return - menu contents
	Description: Generate the menu contents
	*/

	function mountMenu($key_m){

		$menu = $this->xpmenu[$key_m];

		$return = '<div id="mdiv'.$key_m.'">';
		while (list ($key) = @each ($menu["categories"])) {

			// menu item
			$return .= '<div class="menu" '.
			'onclick="SwitchMenu(\''.$key.'\',\''.$key_m.'\')" onmouseout="HideMenu(event,\''.$key.'\',\''.$key_m.'\')" '
			.'onmouseover="CheckMenu(\''.$key.'\',\''.$key_m.'\');">'.
			$menu["categories"][$key]['name'].'</div>';
			
			// submenu items
			$return .= '<span class="options'.$key_m.'" id="'.$key.'" style="display: none;" '.
			'onmouseout="HideMenu(event,\''.$key.'\',\''.$key_m.'\')" >';

			while (list ($key_s) = @each ($menu['categories'][$key]['options'])) {
				$return .= '<div class="option" onclick="window.location=\''.$menu["categories"][$key]['options'][$key_s]['link'].'\';" onmouseover="OptionON(this);" onmouseout="OptionOFF(this);">'
				.'<span style="vertical-align:bottom;">'.$menu["categories"][$key]['options'][$key_s]['name'].'</span></div>';
			}
			$return .= '</span>';
		}
		$return .= '</div>';
		return $return;

	}
}
/*

'<img style="vertical-align: middle" width=20 height=20 src="'.$menu["categories"][$key]['image'].
			'" border=0 hspace=3>'

<img style="vertical-align: middle" width=16 height=16 src="'.$menu["categories"][$key]['options'][$key_s]['image'].
				'" border=0 hspace=3>
*/
?>