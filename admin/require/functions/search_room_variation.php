<?php

require_once '../../connection/connection.php';
require_once '../../connection/close_connection.php';
require_once '../../require/functions/select.php';

if(!empty($_POST['id'])) {
	$variations = select("apartment_variations", "id, type", "accommodations_id = ". $_POST['id'], "ORDER BY ordenation ASC");

	echo json_encode($variations);
} else {
	echo false;
}