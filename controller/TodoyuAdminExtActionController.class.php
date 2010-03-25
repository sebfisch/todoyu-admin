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
* it under the terms of the BSC License.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the BSD License
* for more details.
*
* This copyright notice MUST APPEAR in all copies of the script.
*****************************************************************************/

/**
 * Admin Ext action controller
 *
 * @package		Todoyu
 * @subpackage	Admin
 */
class TodoyuAdminExtActionController extends TodoyuActionController {

	/**
	 * Restrict access to admins
	 *
	 * @param	Array		$params
	 */
	public function init(array $params) {
		TodoyuRightsManager::restrictAdmin();
	}



	/**
	 * Admin extension default action controller method
	 *
	 * @param	Array	$params
	 * @return	String
	 */
	public function defaultAction(array $params) {
			// Set active tab and submenu
		TodoyuFrontend::setActiveTab('todoyu');
//		TodoyuFrontend::setActiveSubmenuTab('todoyu', 'admin');

		TodoyuPage::init('ext/admin/view/ext.tmpl');
		TodoyuPage::setTitle('LLL:admin.page.title');

			// Load config
		TodoyuExtensions::loadAllAdmin();


			// Get current admin module
		$module	= $params['mod'];
		if( ! TodoyuAdminManager::isModule($module) ) {
			$module = TodoyuAdminManager::getActiveModule();
		}
			// Save current module
		TodoyuAdminPreferences::saveActiveModule($module);

		TodoyuPage::set('bodyClasses', 'module' . ucfirst($module));


		$moduleTabs		= TodoyuAdminRenderer::renderModuleTabs($module, $params);
		$moduleContent	= TodoyuAdminRenderer::renderModuleContent($module, $params);
		$panelWidgets	= TodoyuAdminRenderer::renderPanelWidgets();

		TodoyuPage::set('panelWidgets', $panelWidgets);
		TodoyuPage::set('tabs', $moduleTabs);
		TodoyuPage::set('content', $moduleContent);

			// Render output
		return TodoyuPage::render();
	}



	/**
	 * Handle unknown actions (call default action)
	 *
	 * @param	String	$actionName
	 * @param	Array	$params
	 * @return	String
	 */
	public function _unknownAction($actionName, array $params) {
		return $this->defaultAction($params);
	}

}

?>