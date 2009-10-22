<?php


class TodoyuAdminExtActionController extends TodoyuActionController {

	public function defaultAction(array $params) {
		TodoyuFrontend::setActiveTab('admin');


		TodoyuPage::init('ext/admin/view/ext.tmpl');
		TodoyuPage::setTitle('LLL:admin.page.title');

		TodoyuPage::addExtAssets('admin');
		TodoyuAdminRenderer::addAllModAssets();
		TodoyuExtensions::loadAllAdmin();

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