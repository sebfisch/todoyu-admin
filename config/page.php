<?php

if( TodoyuAuth::isLoggedIn() ) {
	TodoyuFrontend::addSubmenuEntry('todoyu', 'admin', 'LLL:admin.tab.label', '?ext=admin', 1);
}

?>