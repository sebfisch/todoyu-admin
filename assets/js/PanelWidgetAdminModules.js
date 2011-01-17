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
 * @module	Admin
 */

/**
 * Panelwidget which lists all admin modules
 *
 * @class		AdminModules
 * @namespace	Todoyu.Ext.admin.PanelWidget
 */
Todoyu.Ext.admin.PanelWidget.AdminModules = {

	/**
	 * Reference to extension
	 * @property	ext
	 * @type		Object
	 */
	ext: Todoyu.Ext.admin,

	/**
	 * @property	list
	 * @type		Element
	 */
	list: null,

	init: function() {
		this.list = $('admin-modules');
	},

	module: function(module) {
		this.ext.loadModule(module);
		this.activate(module);
	},

	activate: function(module) {
		var current = this.getActive();

		if( current ) {
			current.removeClassName('active');
		}

		this.setActive(module);
	},


	getActive: function() {
		return this.list.down('li.active');
	},

	setActive: function(module) {
		this.list.down('li.' + module).addClassName('active');
	}

};