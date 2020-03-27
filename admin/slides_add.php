<?php 
session_start();

if(!isset($_SESSION['user']))
  header("Location:login");

if(isset($_GET['i']) && isset($_GET['ac']) && isset($_GET['ob'])) {
  $resp = $_GET['i'];
  $respAction = $_GET['ac'];
  $respOb = $_GET['ob'];
} else {
  $resp = "";
  $respAction = "";
  $respOb = "";
}

$pageName = "slides";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Painel Administrativo</title>

  <link rel="icon" href="favicon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">  
  <link rel="stylesheet" href="<?=BASE?>require/css/style.css">
</head>
<body>

  <!-- TOP MENU -->
  <?php require_once "components/header.php"; ?>
  <!-- END - TOP MENU -->

  <div class="container container-admin">

    <!-- TITLE -->
    <div class="row mb-2">
      <div class="col-md-12">
        <h2>Novo Slide</h2>  
        <small>Publique slides que você deseja expor aos seus clientes.</small>
      </div>
    </div>
    <!-- END - TITLE -->

    <!-- DIRECTORY -->
    <div class="row content-link-add-admin">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=$pageName?>">Slides</a></li>
            <li class="breadcrumb-item active" aria-current="page">Novo</li>
          </ol>
        </nav>
      </div>
    </div>
    <hr>
    <!-- END - DIRECTORY -->
    
    <!-- FORM ADD -->
    <form id="form-depoimentos" class="row form-validate" action="<?=BASE?>actions/<?=$pageName?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="add">

      <div class="w-100"></div>

      <div class="form-group col-md-12">
        <label for="name">Titulo*</label>
        <input type="text" class="form-control" id="name" name="title">
      </div>

      <div class="form-group col-md-12">
        <label for="text">Texto*</label>
        <textarea id="summernote" class="form-control" name="text"></textarea>
      </div>  
      <ul class="form-group col-md-12 container-error"></ul>

      <div class="col-md-12">
        <hr>
      </div>

      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Publicar</button>
      </div>
    </form>
    <!-- END - FORM ADD -->

    </div>

  <!-- NOTIFICATION -->
  <span class="resp-notification notification-validation"><?= $resp ?></span>
  <span class="resp-action"><?= $respAction ?></span>
  <span class="resp-ob"><?= $respOb ?></span>
  <!-- END - NOTIFICATION -->

  <script src="require/js/jquery-3.3.1.min.js"></script>
  <script src="require/js/jquery.validate.min.js"></script>
  <script src="require/js/additional-methods.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="require/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <script src="require/js/summernote-cleaner.js"></script>
  <script src="require/js/editor.js"></script>
  <script src="require/js/index.js"></script>
  <script src="require/js/validate.js"></script>
</body>
</html>