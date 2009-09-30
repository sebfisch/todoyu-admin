<?php


class TodoyuAdminCacheActionController extends TodoyuActionController {

	public function clearAction(array $params) {
		TodoyuHeader::sendHeaderPlain();

		if( TodoyuAuth::isAdmin() ) {
			TodoyuCacheManager::clearAllCache();

			return 'All Cache cleared';
		} else {
			return 'You have no access to clear the cache!';
		}
	}	
	
}

?>