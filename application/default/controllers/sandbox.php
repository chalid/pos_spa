<?php

class sandbox extends app_base_controller {

	function __construct() {
        parent::__construct();
    }

    function init() {
		l('inbox');
		l('Inbox');
		l('From');
		l('Listing Inbox');
		l('Choose File');
		l('No file chosen');
		l('Outbox');
		l('outbox');
		l('Listing Outbox');
	}
}