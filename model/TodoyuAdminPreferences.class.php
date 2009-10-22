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

class TodoyuAdminPreferences {


	/**
	 * Save admin preference
	 *
	 * @param	String	$preference
	 * @param	Mixed	$value
	 * @param	Integer	$idItem
	 * @param	Boolean	$unique
	 */
	private static function save($preference, $value, $idItem = 0, $unique = false) {
		$idItem	= intval($idItem);

		return TodoyuPreferenceManager::savePreference(EXTID_ADMIN, $preference, $value, $idItem, $unique, EXTID_ADMIN);
	}



	/**
	 * Get admin preference
	 *
	 * @param	String	$preference
	 * @param	Integer	$idItem
	 * @param	Boolean	$unserialize
	 */
	private static function getPref($preference, $idItem = 0, $unserialize = false) {
		$idItem	= intval($idItem);

		return TodoyuPreferenceManager::getPreference(EXTID_ADMIN, $preference, $idItem, EXTID_ADMIN, $unserialize);
	}



	/**
	 * Get admin preferences
	 *
	 * @param	String	$preference
	 * @param	Integer	$idItem
	 */
	private static function getPrefs($preference, $idItem = 0) {
		$idItem	= intval($idItem);

		return TodoyuPreferenceManager::getPreferences(EXTID_ADMIN, $preference, $idItem, EXTID_ADMIN);
	}



	/**
	 * Save currently active admin area module
	 *
	 * @param	String	$module
	 */
	public static function saveActiveModule($module) {
		self::save('module', $module, 0, true);
	}



	/**
	 * Get previously active admin area module
	 *
	 * @return String
	 */
	public static function getActiveModule() {
		return self::getPref('module');
	}


}

?>