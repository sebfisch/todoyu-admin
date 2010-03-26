<?php
/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2010, snowflake productions gmbh
* All rights reserved.
*
* This script is part of the todoyu project.
* The todoyu project is free software; you can redistribute it and/or modify
* it under the terms of the BSD License.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the BSD License
* for more details.
*
* This copyright notice MUST APPEAR in all copies of the script.
*****************************************************************************/

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
	 * @param	String		$module		e.g. 'extensions' / 'records' / 'rights' / etc.
	 * @return	String
	 */
	public static function renderModuleContent($module, array $params = array()) {
		$renderFunc = TodoyuAdminManager::getModuleRenderFunction($module, 'content');

		return TodoyuFunction::callUserFunction($renderFunc, $params);
	}



	/**
	 * Render tabs of given module inside admin area
	 *
	 * @param	String	$module			e.g. 'extensions' / 'records' / 'rights' / etc.
	 * @param	Array	$params
	 * @return	String
	 */
	public static function renderModuleTabs($module, array $params = array()) {
		$renderFunc = TodoyuAdminManager::getModuleRenderFunction($module, 'tabs');

		return TodoyuFunction::callUserFunction($renderFunc, $params);
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

}

?>