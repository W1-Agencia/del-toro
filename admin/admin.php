<?php 
session_start();

if(!isset($_SESSION['user'])) {
  header("Location:login");
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Painel Administrativo - Del Toro Hamburgueria</title>

  <link rel="icon" href="../favicon.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="require/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=BASE?>require/css/style.css">
</head>

<body>
  <?php require_once "components/header.php"; ?>

  <div class="mt-5 jumbotron jumbotron-admin">
    <h1 class="display-4 title-first-pg-admin">Painel administrativo.</h1>
    <p class="lead">Bem-vindo a Del Toro Hamburgueria !</p>
  </div>

  <script src="require/js/jquery.js"></script>
  <script src="require/js/bootstrap.min.js"></script>
</body>
</html>