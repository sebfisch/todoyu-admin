<?php

if( allowed('admin', 'use') ) {
	TodoyuFrontend::addSubmenuEntry('todoyu', 'admin', 'LLL:admin.tab.label', '?ext=admin', 1);
}

?>