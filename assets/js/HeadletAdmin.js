Todoyu.Ext.admin.Headlet.Admin = {

	init: function() {
		if( document.location.href.toQueryParams().ext === 'admin' ) {
			//this.headlet.setActive('admin');
		}
	},

	onButtonClick: function(event) {
		Todoyu.goTo('admin', 'ext');
	}

};