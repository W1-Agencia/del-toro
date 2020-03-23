<?php
session_start();
if(isset($_SESSION['user'])) {
  header("Location: admin.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login administrativo</title>
  <link rel="icon" href="favicon.png">
  <link rel="stylesheet" href="require/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="require/css/style.css">
  
</head>
<body>
  <div class="content-page">
    <div class="container" >
      <div class="row">
        <form class="justify-content-center form-login" action="actions/login.php" method="POST">
          <div class="logo-admin">
            <img class="img-fluid img-logo" src="require/img/w1.jpg" width="200" height="200">
          </div>
          <div class="form-group">
            <label for="text">Usuário</label>
            <input type="text" class="form-control" name="user" id="user" aria-describedby="user" placeholder="Email ou Usuário">
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
          </div>
          <button type="submit" class="btn btn-success">Login</button>
          <a class="link-for-site" href="../">Ir para o site</a>
        </form>
      </div>
    </div>
    <?php
    if(isset($_GET['i'])) {
    ?>
    <div class="resp-notification">Dados preenchidos incorretamente</div>
    <?php
    }
    ?>
  </div>
</body>
</html>