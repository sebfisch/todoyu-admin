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
 * Assets (JS, CSS, SWF, etc.) requirements configuration for admin extension
 *
 * @package		Todoyu
 * @subpackage	Admin
 */

$CONFIG['EXT']['admin']['assets'] = array(
		// default assets: loaded all over the installation always
	'default' => array(
		'js' => array(

		),
		'css' => array(
			array(
				'file'		=> 'ext/admin/assets/css/ext.css',
				'media'		=> 'all',
				'position'	=> 100
			),
			array(
				'file'		=> 'ext/admin/assets/css/global.css',
				'media'		=> 'all',
				'position'	=> 100
			)
		)
	),


		// public assets: basis assets for this extension
	'public' => array(
		'js' => array(
			array(
				'file'		=> 'ext/admin/assets/js/Ext.js',
				'position'	=> 100
			),
			array(
				'file'		=> 'ext/user/assets/js/Ext.js',
				'position'	=> 105
			),
			array(
				'file'		=> 'ext/user/assets/js/Editor.js',
				'position'	=> 110
			),
			array(
				'file'		=> 'ext/user/assets/js/UserEditor.js',
				'position'	=> 115
			),
			array(
				'file'		=> 'ext/user/assets/js/UsergroupEditor.js',
				'position'	=> 120
			)
		)
	),

		// assets of panel widgets
	'panelwidget-adminmodules' => array(
		'css' => array(
			array(
				'file'		=> 'ext/admin/assets/css/panelwidget-adminmodules.css',
				'media'		=> 'all',
				'position'	=> 100
			)
		)
	)

);


?>