<?php

	// Only admins can access the admin module
if( TodoyuAuth::isAdmin() ) {
	TodoyuFrontend::addSubmenuEntry('todoyu', 'admin', 'LLL:admin.tab.label', '?ext=admin', 1);
	TodoyuHeadManager::addHeadlet('TodoyuHeadletAdmin', 20);
}

?>