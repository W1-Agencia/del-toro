<?php 
session_start();

if(!isset($_SESSION['user'])) { header("Location:index.php"); }

require_once '../connection/connection.php';
require_once '../connection/close_connection.php';
require_once 'require/functions/select.php';

if(isset($_GET['i']) && isset($_GET['ac']) && isset($_GET['ob'])) {
  $statusResponse = $_GET['i'];
  $actionResponse = $_GET['ac'];
  $objectResponse = $_GET['ob'];
} else {
  $statusResponse = "";
  $actionResponse = "";
  $objectResponse = "";
}

$item = select("configuration", "*", "id", "ORDER BY id");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Painel Administrativo</title>

  <link rel="icon" href="favicon.png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css">  
  <link rel="stylesheet" href="require/css/style.css">
</head>
<body>

  <?php require_once "components/header.php"; ?>

  <div class="container container-admin">
    <div class="row">
      <h2 class="col-md-12">Configurações</h2>  
    </div>

    <div class="row content-link-add-admin">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin.php">Inicial</a></li>
            <li class="breadcrumb-item active" aria-current="page">Configurações</li>
          </ol>
        </nav>
      </div>
    </div>

    <hr>

    <form id="form" class="row" action="actions/configuration.php" method="post">
      <?php if($item): ?>
      <input type="hidden" name="id" value="<?= $item[0]['id'] ?>">
      <?php endif; ?>

      <input type="hidden" name="action" value="<?= $item ? 'edit' : 'add' ?>">

      <div class="form-group col-md-3">
        <label for="phone1">Telefone (1)</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-phone"></i></div>
          </div>
          <input type="text" class="form-control" id="phone1" name="phone1" value="<?=$item[0]['phone1']?>">
        </div>
      </div>

      <div class="form-group col-md-3">
        <label for="phone1">Telefone (2)</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-phone"></i></div>
          </div>
          <input type="text" class="form-control" id="phone2" name="phone2" value="<?=$item[0]['phone2']?>">
        </div>
      </div>

      <div class="form-group col-md-6">
        <label for="email">Email</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="far fa-envelope"></i></div>
          </div>
          <input type="text" class="form-control" id="email" name="email" value="<?=$item[0]['email']?>">
        </div>
      </div>

      <div class="form-group col-md-4">
        <label for="facebook">URL Facebook</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fab fa-facebook-f"></i></div>
          </div>
          <input type="text" class="form-control" id="facebook" name="facebook" value="<?=$item[0]['facebook']?>">
        </div>
      </div>

      <div class="form-group col-md-4">
        <label for="instagram">URL Instagram</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fab fa-instagram"></i></div>
          </div>
          <input type="text" class="form-control" id="instagram" name="instagram" value="<?=$item[0]['instagram']?>">
        </div>
      </div>

      <div class="form-group col-md-4">
        <label for="linkedin">URL Linkedin</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fab fa-linkedin-in"></i></div>
          </div>
          <input type="text" class="form-control" id="linkedin" name="linkedin" value="<?=$item[0]['linkedin']?>">
        </div>
      </div>

      <div class="form-group col-md-9">
        <label for="text">Endereço</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
          </div>
          <input type="text" class="form-control" id="address" name="address" value="<?=$item[0]['address']?>">
        </div>
      </div>

      <div class="form-group col-md-3">
        <label for="cnpj">CNPJ</label>
        <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?=$item[0]['cnpj']?>">
      </div>

      <div class="form-group col-md-12">
        <label for="text">Texto sobre a empresa</label>
        <textarea class="form-control" id="summernote" rows="7" name="text"><?= $item[0]['text'] ?></textarea>
      </div>

      <ul class="form-group col-md-12 container-error"></ul>

      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Alterar</button>
        <hr>
      </div>
    </form>
  </div>

  <span class="resp-notification notification-validation"><?= $statusResponse ?></span>
  <span class="resp-action"><?= $actionResponse ?></span>
  <span class="resp-ob"><?= $objectResponse ?></span>

  <script src="require/js/jquery.js"></script>
  <script src="require/js/jquery.validate.min.js"></script>
  <script src="require/js/additional-methods.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="require/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <script src="require/js/summernote-cleaner.js"></script>
  <script src="require/js/editor.js"></script>
  <script src="require/js/index.js"></script>
  <script src="require/js/validate.js"></script
</body>
</html>