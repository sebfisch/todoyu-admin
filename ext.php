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
 * Extension main file for admin extension
 *
 * @package		Todoyu
 * @subpackage	Admin
 */


if( ! defined('TODOYU') ) die('NO ACCESS');



	// declare ext ID, path
define('EXTID_ADMIN', 100);
define('PATH_EXT_ADMIN', PATH_EXT . '/admin');


	// request configurations
require_once( PATH_EXT_ADMIN . '/config/extension.php' );
require_once( PATH_EXT_ADMIN . '/config/panelwidgets.php' );
require_once( PATH_EXT_ADMIN . '/config/admin.php' );
//require_once( PATH_EXT_ADMIN . '/config/assets.php' );

	// register localization files
TodoyuLocale::register('admin', PATH_EXT_ADMIN . '/locale/ext.xml');
TodoyuLocale::register('panelwidget-adminmodules', PATH_EXT_ADMIN . '/locale/panelwidget-adminmodules.xml');

if( TodoyuAuth::isLoggedIn() ) {
		// Add meta menu entry
	TodoyuMetaMenuManager::addEntry('admin', 'LLL:admin.metamenu.label', 100, '?ext=admin');
}

?>