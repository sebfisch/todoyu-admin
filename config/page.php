<?php

	// Only admins can access the admin module
if( TodoyuAuth::isAdmin() ) {
	TodoyuHeadManager::addHeadlet('TodoyuHeadletAdmin', 20);
}

?>