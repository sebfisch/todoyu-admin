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
		TodoyuFrontend::setActiveTab('todoyu');
		TodoyuFrontend::setActiveSubmenuTab('todoyu', 'admin');

		TodoyuPage::init('ext/admin/view/ext.tmpl');
		TodoyuPage::setTitle('LLL:admin.page.title');

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


		$moduleContent = TodoyuAdminRenderer::renderModule($module);

		TodoyuPage::set('content', $moduleContent);

			// Panel widgets
		$panelWidgets	= TodoyuAdminRenderer::renderPanelWidgets();
		TodoyuPage::set('panelWidgets', $panelWidgets);

			// Render output
		return TodoyuPage::render();
	}




	public function _unknownAction($actionName, array $params) {
		return $this->defaultAction($params);
	}

}

?>