/****************************************************************************
* todoyu is published under the BSD License:
* http://www.opensource.org/licenses/bsd-license.php
*
* Copyright (c) 2010, snowflake productions GmbH, Switzerland
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

Todoyu.Ext.admin = {

	Headlet: {},

	PanelWidget: {},

	init: function() {
		this.PanelWidget.AdminModules.init();
	},

	/**
	 * Load admin module content
	 *
	 * @param	{String}	module
	 * @param	{Object}	params
	 */
	loadModule: function(module, params) {
		var url		= Todoyu.getUrl('admin', 'module');
		var options	= {
			'parameters': {
				'action': 'load',
				'module': module
			},
			'onComplete': this.onModuleLoaded.bind(this, module)
		};

		if( typeof(params) === 'object' ) {
			$H(options.parameters).update(params).toObject();
		}

		Todoyu.Ui.updateContent(url, options);
	},



	/**
	 * Handler when module content is loaded
	 *
	 * @param	{String}		module
	 * @param	{Ajax.Response}	response
	 */
	onModuleLoaded: function(module, response) {
			// Make sure the module is activated in the panel widget
		this.PanelWidget.AdminModules.activate(module);

		this.updateBodyClassName(module);
	},


	/**
	 * Set body class for easy styling
	 *
	 * @param	{String}	module
	 */
	updateBodyClassName: function(module) {
		var moduleClass = $w(document.body.className).detect(function(class){
			return class.substr(0, 6) === 'module';
		});
		var newClass	= 'module' + module.capitalize();

		document.body.replaceClassName(moduleClass, newClass);
	}

};