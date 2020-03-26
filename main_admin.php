<?php
include('url_response_admin.php');
$urlpatterns = array(
    '/login' => 'index.php',
    '/header' => 'components/header.php',
    '/' => 'admin.php',
    '/configuracoes' => 'configurations.php',
    '/logout' => 'actions/logout.php',

    '/slides' => 'slides.php',
    '/slides-adicionar' => 'slides_add.php',
    '/slides-delete' => 'actions/slides.php',
    '/slides-editar/(?P<id>\S+)' => 'slides_edit.php',
    '/actions/slides' => 'actions/slides.php',

    '/actions/login' => 'actions/login.php',
    '/actions/configuracoes' => 'actions/configuration.php',

    '/tipo-alimento' => 'tfood.php',
    '/tipo-alimento-adicionar' => 'tfood_add.php',
    '/tipo-alimento-delete' => 'actions/tfood.php',
    '/tipo-alimento-editar/(?P<id>\S+)' => 'tfood_edit.php',
    '/actions/tipo-alimento' => 'actions/tfood.php',
    
    '/tipo-sub-alimento' => 'mfood.php',
    '/tipo-sub-alimento-adicionar' => 'mfood_add.php',
    '/tipo-sub-alimento-delete' => 'actions/mfood.php',
    '/tipo-sub-alimento-editar/(?P<id>\S+)' => 'mfood_edit.php',
    '/actions/tipo-sub-alimento' => 'actions/mfood.php',

    '/cardapios' => 'menu.php',
    '/cardapios-adicionar' => 'menu_add.php',
    '/cardapios-delete' => 'actions/menu.php',
    '/cardapios-editar/(?P<id>\S+)' => 'menu_edit.php',
    '/actions/cardapios' => 'actions/menu.php',

    '/promocoes' => 'promotions.php',
    '/promocoes-adicionar' => 'promotions_add.php',
    '/promocoes-delete' => 'actions/promotions.php',
    '/promocoes-editar/(?P<id>\S+)' => 'promotions_edit.php',
    '/actions/promocoes' => 'actions/promotions.php',


);
url_response1($urlpatterns);
?>