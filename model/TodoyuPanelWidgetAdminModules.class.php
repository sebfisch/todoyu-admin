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
 * Admin modules panel widget
 *
 * @name 		Admin renderer
 * @package		Todoyu
 * @subpackage	Admin
 */

class TodoyuPanelWidgetAdminModules extends TodoyuPanelWidget implements TodoyuPanelWidgetIf {


	/**
	 * Admin modules panel widget constructor
	 *
	 * @param	array	$config
	 * @param	array	$params
	 * @param	Integer	$idArea
	 * @param	Boolean $expanded
	 */
	public function __construct(array $config, array $params = array(), $idArea = 0) {
		$idArea	= intval($idArea);

		parent::__construct(
			'admin',								// ext key
			'adminmodules',							// panel widget ID
			'LLL:panelwidget-adminmodules.title',	// widget title text
			$config,								// widget config array
			$params,								// widget params
			$idArea									// area ID
		);

		$this->addHasIconClass();

		TodoyuPage::addExtAssets('admin', 'panelwidget-adminmodules');
	}



	/**
	 * Render content
	 *
	 * @return	String
	 */
	public function renderContent() {
		$content = '';

		$modules	= TodoyuAdminManager::getModules();
		$active		= TodoyuAdminPreferences::getActiveModule();

		if(!$active)	{
			$active = current($modules);
			$active = $active['key'];
		}

		$data		= array(
			'active'	=> $active,
			'modules'	=> $modules
		);

		$content	= render('ext/admin/view/panelwidget-adminmodules.tmpl', $data);

		$this->setContent($content);

		return $content;
	}



	/**
	 * Render widget including content
	 *
	 * @return	String
	 */
	public function render() {
		$this->renderContent();

		return parent::render();
	}




	public static function isAllowed() {
		return allowed('admin', 'panelwidget.adminmodules');
	}

}

?>