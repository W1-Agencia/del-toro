<?php
include('url_response.php');
$urlpatterns = array(
	'/' => 'index.php',
	'/home' => 'index.php',
	'/cardapios' => 'cardapios.php'
);
url_response($urlpatterns);
?>
