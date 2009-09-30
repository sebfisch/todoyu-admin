<?php


class TodoyuAdminModuleActionController extends TodoyuActionController {

	public function defaultAction(array $params) {
		return TodoyuAdminRenderer::renderModule($params['mod']);
	}
	
	
}

?>