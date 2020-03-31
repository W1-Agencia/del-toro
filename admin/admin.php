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

  <div class="pt-5">
  </div>
  <div class="row pl-5">
  <div class="col-md-3">
        <a href="tipo-alimento" class="card card-admin text-white bg-success mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-hamburger"></i> Categorias de alimento</h4>
          </div>
        </a>
  </div>
  <div class="col-md-3">
        <a href="tipo-sub-alimento" class="card card-admin text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-hamburger"></i> Sub-categoria de alimentos </h4>
          </div>
        </a>
  </div>
  <div class="col-md-3">
        <a href="cardapios" class="card card-admin text-white bg-danger mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-hamburger"></i> Cardapios</h4>
            <p class="card-text">Adicione cardápios.</p>
          </div>
        </a>
  </div>
  <div class="col-md-3">
        <a href="cardapios" class="card card-admin text-white bg-warning mb-3" style="max-width: 18rem;">
          <div class="card-body">
            <h4 class="card-title"><i class="fas fa-hamburger"></i> Promoções</h4>
            <p class="card-text">Adicione promoções da semana.</p>
          </div>
        </a>
  </div>
  </div>
  <script src="require/js/jquery.js"></script>
  <script src="require/js/bootstrap.min.js"></script>
</body>
</html>