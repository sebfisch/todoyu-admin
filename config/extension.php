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
 * General configuration for admin extension
 *
 * @package		Todoyu
 * @subpackage	Admin
 */


if( ! defined('TODOYU') ) die('NO ACCESS');


$CONFIG['EXT']['admin']['defaultModule'] = 'extensions';

	// Register handler to restrict admin module access
TodoyuActionDispatcher::registerRequestHandler('admin', 'TodoyuAdminManager::onAdminExtRequest');

	// Add meta menu link to admin if allowed
//if( allowed('admin', 'use') ) {
//	TodoyuMetaMenuManager::addEntry('admin', 'LLL:admin.metamenu.label', 100, '?ext=admin');
//}

?>