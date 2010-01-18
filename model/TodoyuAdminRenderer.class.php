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
 * Admin renderer
 *
 * @name 		Admin renderer
 * @package		Todoyu
 * @subpackage	Admin
 */

class TodoyuAdminRenderer {


	/**
	 * Render module
	 *
	 * @param	String		$module
	 * @return	String
	 */
	public static function renderModuleContent($module, array $params = array()) {
		$renderFunc = TodoyuAdminManager::getModuleRenderFunction($module, 'content');

		return TodoyuDiv::callUserFunction($renderFunc, $params);
	}


	public static function renderModuleTabs($module, array $params = array()) {
		$renderFunc = TodoyuAdminManager::getModuleRenderFunction($module, 'tabs');

		return TodoyuDiv::callUserFunction($renderFunc, $params);
	}



	/**
	 * Render panel widgets
	 *
	 * @return	String
	 */
	public static function renderPanelWidgets() {
		$params	= array();

		return TodoyuPanelWidgetRenderer::renderPanelWidgets('admin', $params);
	}



	/**
	 * Add all configured assets of registered admin modules
	 *
	 */
	public static function addAllModAssets() {
		if( is_array($GLOBALS['CONFIG']['EXT']['admin']['modules']) ) {
			foreach($GLOBALS['CONFIG']['EXT']['admin']['modules'] as $module) {
				if( is_array($module['assetConf']) && sizeof($module['assetConf']) === 2 ) {
					TodoyuPage::addExtAssets($module['assetConf'][0], $module['assetConf'][1]);
				}
			}
		}
	}

}

?>