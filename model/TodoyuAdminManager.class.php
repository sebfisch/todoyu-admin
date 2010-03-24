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
	public static function addModule($module, $label, $renderFuncContent, $renderFuncTabs, $position = 100, array $assetConf = array()) {
		$position	= intval($position);

		Todoyu::$CONFIG['EXT']['admin']['modules'][$module] = array(
			'key'			=> $module,
			'label'			=> $label,
			'render'		=> array(
				'content'	=> $renderFuncContent,
				'tabs'		=> $renderFuncTabs
			),
			'position'		=> $position,
			'assetConf'		=> $assetConf
		);
	}


	public static function getActiveModule() {
		$module	= TodoyuAdminPreferences::getActiveModule();

		if( $module === false ) {
			$module = Todoyu::$CONFIG['EXT']['admin']['defaultModule'];
		}

		return $module;
	}



	/**
	 * Get installed admin modules
	 *
	 * @return	Array
	 */
	public static function getModules() {
		if( is_array( Todoyu::$CONFIG['EXT']['admin']['modules'] ) ) {
			return TodoyuArray::sortByLabel( Todoyu::$CONFIG['EXT']['admin']['modules'] );
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
	public static function getModuleRenderFunction($module, $type = 'content') {
		return Todoyu::$CONFIG['EXT']['admin']['modules'][$module]['render'][$type];
	}



	/**
	 * Check if the key belongs to a registered module
	 *
	 * @param	String		$module
	 * @return	Boolean
	 */
	public static function isModule($module) {
		return is_array(Todoyu::$CONFIG['EXT']['admin']['modules'][$module]);
	}
}

?>