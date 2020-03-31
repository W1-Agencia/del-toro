<?php

session_start();

if(isset($_SESSION['user']))
  header("Location: admin");

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Login administrativo - Del' Toro Hamburgueria</title>

  <link rel="icon" href="require/img/favicon.png">
  <link rel="stylesheet" href="require/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="require/css/style.css">
</head>
<body>
  <div class="content-page">
    <div class="container">
      <div class="row">
        <form id="form-login" class="justify-content-center form-login form-validate" action="actions/login.php" method="POST">
          <div class="logo-admin">
            <img class="img-fluid pl-5 " src="require/img/w1.png" alt="Logo da Del-Toro"  width="120px" height="100px">
          </div>
          <div class="form-group">
            <label for="text">Usuário</label>
            <input type="text" class="form-control" name="user" id="user" aria-describedby="user" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
          </div>

          <div class="form-group">
            <input type="checkbox" class="checkChangePassword" name="changeTypePassword"> <label>Mostrar senha</label>
          </div>
          <button type="submit" class="btn btn-primary btn-block mt-4 mb-4">Login</button>
          <a class="link-for-site" href="../">Ir para o site</a>
        </form>
      </div>
    </div>

    <?php 
    if(isset($_SESSION['log'])) : 
      unset($_SESSION['log']);
    ?>
    <div class="resp-notification notification-validation notification-warning">Dados preenchidos incorretamente</div>
    <?php 
    endif; 
    ?>
  </div>

  <script src="require/js/jquery.min.js" type="text/javascript"></script>
  <script src="require/js/jquery.validate.min.js" type="text/javascript"></script>
  <script src="require/js/index.js" type="text/javascript"></script>
  <script src="require/js/validate.js" type="text/javascript"></script>
</body>
</html>

