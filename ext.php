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
 * Extension main file for admin extension
 *
 * @package		Todoyu
 * @subpackage	Admin
 */


	// Declare ext ID, path
define('EXTID_ADMIN', 100);
define('PATH_EXT_ADMIN', PATH_EXT . '/admin');

	// Register module locales
TodoyuLanguage::register('admin', PATH_EXT_ADMIN . '/locale/ext.xml');
TodoyuLanguage::register('panelwidget-adminmodules', PATH_EXT_ADMIN . '/locale/panelwidget-adminmodules.xml');

	// Request configurations
require_once( PATH_EXT_ADMIN . '/config/extension.php' );
require_once( PATH_EXT_ADMIN . '/config/panelwidgets.php' );
require_once( PATH_EXT_ADMIN . '/config/admin.php' );
//require_once( PATH_EXT_ADMIN . '/config/assets.php' );



?>