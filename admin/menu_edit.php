<?php 
session_start();

require_once './connection/connection.php';
require_once './connection/close_connection.php';
require_once 'require/functions/select.php';

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

// Sets
$pageName = "cardapios";

$_GET['id'] ? 
  $menu = select("menu", "*", "id=".$_GET['id']) :
  header("Location:cardapios");

if($menu) {
  $id = $menu[0]['id'];
  $name = $menu[0]['name_product'];
  $text = $menu[0]['description_product'];
  $value = number_format($menu[0]['value_product'],2,',','.');
  $subselect = $menu[0]['sub_id_product'];

}
$itemsAll = select("tfood", "*", "id");
$sub = select("mfood", "*", "ordenation=".$subselect."");
$itemsAllsub = select("mfood", "*", "id");

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
  <link rel="stylesheet" href="require/css/jquery.css">
  <link rel="stylesheet" href="<?=BASE?>require/css/style.css">
</head>
<body>
  <!-- TOP MENU -->
  <?php  require_once "components/header.php"; ?>
  <!-- END - TOP MENU -->

  <div class="container container-admin">

    <!-- TITLE -->
    <div class="row mb-2">
      <div class="col-md-12">
        <h3>Editar Cardápio</h3>
        <small>Edite os cardápios que você publicou.</small>
      </div>
    </div>
    <!-- END - TITLE -->

    <!-- DIRECTORY -->
    <div class="row content-link-add-admin">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=$pageName?>">Cardápio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
          </ol>
        </nav>
      </div>
    </div>

    <hr>
    <!-- END - DIRECTORY -->

    <!-- FORM EDIT -->
    <form id="form-quartos-edit" action="../actions/<?=$pageName?>" class="row form-validate" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="edit">
      <input type="hidden" name="id" value="<?= $id ?> ">

      <div class="form-group col-md-4">
        <label for="inputState">Selecione a sub categoria de alimento</label>
        <select id="inputState" class="form-control" name='optionssub'>
            <?php if($subselect == $sub): ?>
                <option select><?=$name?></option>
                <?php for($i=0; $i < count($itemsAllsub); $i++) :?>
                  <option value="<?=$itemsAllsub[$i]['ordenation']?>"><?=$itemsAllsub[$i]['subalimento']?></option>
                <?php endfor; ?>
            <?php endif;?>
            <?php if($subselect != $sub) : ?>
              <?php for($i=0; $i < count($itemsAllsub); $i++) :?>
                    <option value="<?=$itemsAllsub[$i]['ordenation']?>"><?=$itemsAllsub[$i]['subalimento']?></option>
              <?php endfor; ?>
            <?php endif;?>
          </select>
      </div>

      <div class="form-group col-md-4">
        <label for="name">Prato*</label>
        <input type="text" class="form-control" id="name" name="title" value="<?= $name ?>">
      </div>

      <div class="form-group col-md-12">
        <label for="content">Texto*</label>
        <textarea id="summernote" class="form-control" name="text"><?= $text ?></textarea>
      </div>

      <div class="form-group col-md-3">
        <label for="name">Preço*</label>
        <input type="text" class="form-control" id="value" name="value" value="<?=$value?>">
      </div>
      
      <ul class="form-group col-md-12 container-error"></ul>   

      <div class="form-group col-md-3">
        <label for="position">Ordem de apresentação*</label>
        <input type="text" class="form-control" name="ordenation" value="<?= $menu[0]['ordenation'] ?>">
      </div> 


      <div class="col-md-12">
        <hr>
      </div>
      
      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Alterar</button>
      </div>
    </form>
    <!-- END - FORM EDIT -->

  </div>

  <div class="modal fade modal-pcn-operator" id="removemodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="smallmodalLabel">Remover imagem</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Você realmente quer remover esta imagem?</p>
        </div>
        <form method="POST" action="actions/<?=$pageName?>" class="modal-footer form-remove">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" id="btn-confirm-remove" class="btn btn-danger">Sim</button>
          <input type="hidden" name="action" value="removeImage">
          <input type="hidden" name="id" id="id">
        </form>
      </div>
    </div>
  </div>  

  <span class="resp-notification notification-validation"><?= $resp ?></span>
  <span class="resp-action"><?= $respAction ?></span>
  <span class="resp-ob"><?= $respOb ?></span>

  <script src="require/js/jquery.js"></script>
  <script src="require/js/jquery.validate.min.js"></script>
  <script src="require/js/additional-methods.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="require/js/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>

  <script src="require/js/editor.js"></script>
  <script src="require/js/index.js"></script>
  <script src="require/js/validate.js"></script> 
</body>
</html>