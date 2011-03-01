<?php
/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2011, snowflake productions GmbH, Switzerland
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
 * Admin modules panel widget
 *
 * @name 		Admin renderer
 * @package		Todoyu
 * @subpackage	Admin
 */
class TodoyuAdminPanelWidgetModules extends TodoyuPanelWidget implements TodoyuPanelWidgetIf {

	/**
	 * Admin modules panel widget constructor
	 *
	 * @param	Array		$config
	 * @param	Array		$params
	 * @param	Integer		$idArea
	 * @param	Boolean 	$expanded
	 */
	public function __construct(array $config, array $params = array(), $idArea = 0) {
		$idArea	= intval($idArea);

		parent::__construct(
			'admin',								// ext key
			'adminmodules',							// panel widget ID
			'LLL:panelwidget-adminmodules.title',	// widget title text
			$config,								// widget config array
			$params,								// widget parameters
			$idArea									// area ID
		);

		$this->addHasIconClass();
	}



	/**
	 * Render content
	 *
	 * @return	String
	 */
	public function renderContent() {
		$modules	= TodoyuAdminManager::getModules();
		$active		= TodoyuAdminPreferences::getActiveModule();

		if( ! $active ) {
			$active = $modules[0]['key'];
		}

		$tmpl	= 'ext/admin/view/panelwidget-adminmodules.tmpl';
		$data	= array(
			'active'	=> $active,
			'modules'	=> $modules
		);

		$content	= render($tmpl, $data);

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



	/**
	 * Check whether usage of admin modules selector widget is allowed
	 *
	 * @return	Boolean
	 */
	public static function isAllowed() {
		return TodoyuAuth::isAdmin();
	}

}

?>