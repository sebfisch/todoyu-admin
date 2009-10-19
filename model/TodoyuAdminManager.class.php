<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2009 snowflake productions gmbh
*  All rights reserved
*
*  This script is part of the todoyu project.
*  The todoyu project is free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License, version 2,
*  (http://www.gnu.org/licenses/old-licenses/gpl-2.0.html) as published by
*  the Free Software Foundation;
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Manage admin module
 *
 * @package		Todoyu
 * @subpackage	Admin
 */

class TodoyuAdminManager {

	/**
	 * Add a module to the admin panel
	 *
	 * @param	String		$module				Module key
	 * @param	String		$label				Module label
	 * @param	String		$renderFunction		Function ref to the content render function
	 * @param	Integer		$position			Position in menu
	 */
	public static function addModule($module, $label, $renderFunction, $position = 100, array $assetConf = array()) {
		$position	= intval($position);

		$GLOBALS['CONFIG']['EXT']['admin']['modules'][$module] = array(
			'key'		=> $module,
			'label'		=> TodoyuDiv::getLabel($label),
			'funcRef'	=> $renderFunction,
			'position'	=> $position,
			'assetConf'	=> $assetConf
		);
	}


	public static function getActiveModule() {
		$module	= TodoyuAdminPreferences::getActiveModule();

		if( $module === false ) {
			$module = $GLOBALS['CONFIG']['EXT']['admin']['defaultModule'];
		}

		return $module;
	}



	/**
	 * Get installed admin modules
	 *
	 * @return	Array
	 */
	public static function getModules() {
		if( is_array( $GLOBALS['CONFIG']['EXT']['admin']['modules'] ) ) {
			return TodoyuArray::sortByLabel( $GLOBALS['CONFIG']['EXT']['admin']['modules'] );
		} else {
			return array();
		}
	}



	/**
	 * Get the render function of a module
	 *
	 * @param	String		$module		Module key
	 * @return	Array		[class,method]
	 */
	public static function getModuleRenderFunction($module) {
		return explode('::', $GLOBALS['CONFIG']['EXT']['admin']['modules'][$module]['funcRef']);
	}



	/**
	 * Check if the key belongs to a registered module
	 *
	 * @param	String		$module
	 * @return	Boolean
	 */
	public static function isModule($module) {
		return is_array($GLOBALS['CONFIG']['EXT']['admin']['modules'][$module]);
	}



	/**
	 * Handler for admin extension request
	 * Stop request if user is not admin
	 *
	 */
	public static function onAdminExtRequest() {
		if( ! TodoyuAuth::isAdmin() ) {
			die("YOU HAVE NO ADMIN RIGHTS!");
			exit();
		}
	}



//
//	/**
//	 * Get active component
//	 *
//	 * @param	String	$module
//	 */
//	public static function getActiveComponent($module) {
//		$components			= array_keys( $GLOBALS['CONFIG']['EXT'][ $module ]['admin']['components'] );
//		$activeComponent	= TodoyuRequest::getComponent();
//
//			// no component selected?
//		if ( ! in_array($activeComponent, $components) ) {
//				// activate first component entry (default)
//			$activeComponent = $components[0];
//		}
//
//			// set selected component active
//		$GLOBALS['CONFIG']['EXT']['calendar']['admin']['components'][$activeComponent][act] = 1;
//	}

}

?>