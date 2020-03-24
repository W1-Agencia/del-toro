<?php
include('url_response_admin.php');
$urlpatterns = array(
    '/login' => 'index.php',
	'/' => 'admin.php',
    '/slides' => 'slides.php',
    '/tipo-alimento' => 'tfood.php',
    '/cardapios' => 'menu.php',
    '/promocoes' => 'promotions.php',
    '/promocoes-editar/editar/(?P<id>\S+)' => 'promotions_edit.php',
);
url_response1($urlpatterns);
?>