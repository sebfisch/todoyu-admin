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

class TodoyuAdminExtActionController extends TodoyuActionController {

	public function defaultAction(array $params) {
			// Set active tab and submenu
		TodoyuFrontend::setActiveTab('todoyu');
//		TodoyuFrontend::setActiveSubmenuTab('todoyu', 'admin');

		TodoyuPage::init('ext/admin/view/ext.tmpl');
		TodoyuPage::setTitle('LLL:admin.page.title');

			// Load assets and config
		TodoyuPage::addExtAssets('admin');
		TodoyuAdminRenderer::addAllModAssets();
		TodoyuExtensions::loadAllAdmin();


			// Get current admin module
		$module	= $params['mod'];
		if( ! TodoyuAdminManager::isModule($module) ) {
			$module = TodoyuAdminManager::getActiveModule();
		}
			// Save current module
		TodoyuAdminPreferences::saveActiveModule($module);

		$panelWidgets	= TodoyuAdminRenderer::renderPanelWidgets();
		$moduleTabs		= TodoyuAdminRenderer::renderModuleTabs($module, $params);
		$moduleContent	= TodoyuAdminRenderer::renderModuleContent($module, $params);

		TodoyuPage::set('panelWidgets', $panelWidgets);
		TodoyuPage::set('tabs', $moduleTabs);
		TodoyuPage::set('content', $moduleContent);

			// Render output
		return TodoyuPage::render();
	}




	public function _unknownAction($actionName, array $params) {
		return $this->defaultAction($params);
	}

}

?>