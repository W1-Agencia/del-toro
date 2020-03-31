<?php


if(!defined('BASE_W1')){
  define('BASE_W1','http://w1agencia.com.br/');
}

if(!defined('BASE')){
  define('BASE','http://localhost:8080/del-toro/admin/');
  // define('BASE','http://w1agencia.com.br/demos/deltoro/admin/');  
}
if(!defined('BASE_APP')){
  define('BASE_APP','http://localhost:8080/del-toro/');
  // define('BASE_APP','http://w1agencia.com.br/demos/deltoro/');  
}

if(!defined('BASE_IMG')){
  define('BASE_IMG', BASE_APP.'require/img/');
}

if(!defined('BASE_IMG_ADMIN')){
  define('BASE_IMG_ADMIN', BASE_APP.'admin/require/img/');
}

if(!defined('BASE_CSS')){
  define('BASE_CSS', BASE_APP.'require/css/');
}

if(!defined('BASE_JS')){
  define('BASE_JS', BASE_APP.'require/js/');
}

if(!defined('PROJECT_DIR'))
  define('PROJECT_DIR', 'del-toro/admin');
  // define('PROJECT_DIR', 'demos/deltoro/admin');

if(!defined('APPLICATION_DIR'))
  define('APPLICATION_DIR', 'admin');


if(!defined('REQUEST_URI'))
  define('REQUEST_URI',str_replace('/'.PROJECT_DIR,'',$_SERVER['REQUEST_URI']));

function url_response1($urlpatterns) {
  foreach ($urlpatterns as $pcre => $app) {
    if(preg_match("@^{$pcre}$@", REQUEST_URI, $_GET)) {
      include(APPLICATION_DIR.'/'.$app);
      exit();
    } else {
      $erro = true;
    }
  }
  if(isset($erro) && $erro == true){
    include("app/404.php");
  }
  return;
}

?>
