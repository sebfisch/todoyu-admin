<?php

if( allowed('admin', 'general:use') ) {
	TodoyuFrontend::addSubmenuEntry('todoyu', 'admin', 'LLL:admin.tab.label', '?ext=admin', 1);
}

?>