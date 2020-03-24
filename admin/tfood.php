<?php 
session_start();

if(!isset($_SESSION['user']))
  header("Location:login");

require_once './connection/connection.php';
require_once './connection/close_connection.php';
require_once 'require/functions/select.php';

if(isset($_GET['i']) && isset($_GET['ac']) && isset($_GET['ob'])) {
  $resp = $_GET['i'];
  $respAction = $_GET['ac'];
  $respOb = $_GET['ob'];
} else {
  $resp = "";
  $respAction = "";
  $respOb = "";
}

// SETS
$pageName = "tfood";

$rows = 10;

$page = isset($_GET['page']) ? $_GET['page'] : "";
!$page ? $pageCurrent = '1': $pageCurrent = $page;
$start_page = $pageCurrent - 1;
$start_page = $start_page * $rows;

$items = select("food", "*", "id", "ORDER BY ordenation ASC", "LIMIT $start_page, $rows");
$itemsAll = select("food", "*", "id", "ORDER BY ordenation ASC");

$countItems = ($itemsAll ? count($itemsAll) : "0");
$countPage = $countItems / $rows;
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Painel Administrativo</title>

  <link rel="icon" href="favicon.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="require/css/style.css">
</head>

<body>

  <!-- MENU TOP -->
  <?php require_once "components/header.php"; ?>
  <!-- END - MENU TOP -->

  <div class="container container-admin">
    <!-- TITLE -->
    <div class="row">
      <div class="col-md-12">
        <h2>Tipo de alimentos</h2>
        <small>Publique os tipos de comida que deseja seus clientes vejam.</small>
      </div>
    </div>
    <!-- END - TITLE -->

    <hr>
    
    <!-- BTN ADD -->
    <div class="row content-link-add-admin">
      <div class="col-md-12">
        <a href="<?=$pageName?>_add.php" class="btn btn-success"><i class="fas fa-plus"></i> Novo Tipo de alimento</a>
      </div>
    </div>
    <!-- END - BTN ADD -->

    <!-- TABLE -->
    <div class="row table-responsive table-list-admin">
      <div class="col-md-12">
        <?php if($items) : ?>
        <table class="table table-condensed table-striped table-hover table-admin">

          <caption>Listando <?= count($items) ?> Tipo de alimento(s) de <?=$countItems?>.</caption>

          <thead>
            <tr>
              <th>Ordem</th>
              <th>Titulo</th>
              <th>Texto</th>
              <th class="col-actions">Ações</th>
            </tr>
          </thead>

          <tbody>
            <?php for($i = 0; $i < count($items); $i++) : ?>
            <tr id="<?= $items[$i]['id'] ?>">
              <td><?= $items[$i]['ordenation'] ?></td>

              <td><?= $items[$i]['title'] ?></td>

              <td><?= $items[$i]['text'] ?></td>

            <td class="col-actions">
                <a class="link-action-edit" href="<?=$pageName?>-edit/id=<?= $items[$i]['id'] ?>" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="editar">
                  <i class="far fa-edit"></i>
                </a>
                <span id="popover" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="excluir">
                  <a class="link-action-remove" href="#" data-toggle="modal" data-target="#removemodal">
                    <i class="fas fa-trash"></i>
                  </a>
                </span>
              </td>
            </tr>
            <?php endfor; ?>
          </tbody>

        </table>

        <?php
        $before = $pageCurrent - 1;
        $after = $pageCurrent + 1;
        ?>
        <nav aria-label="Page navigation navPagination">
          <ul class="pagination">
            <?php if($pageCurrent > 1) { ?>
            <li class="page-item"><a class="page-link" 
              href="?page=<?=$before?>">Anterior</a></li>
            <?php } if ($pageCurrent<$countPage) {?>

            <li class="page-item"><a class="page-link" 
              href="?page=<?=$after?>">Próximo</a></li>
            <?php } ?>
          </ul>
        </nav>

        <?php else : ?>
        <h4 class="table-empty">
          Nenhum tipo de alimento publicado no site. 
          <a href="<?=$pageName?>_add.php">Adicionar um novo Tipo de alimento.</a>
        </h4>
        <?php endif ?>

      </div>
    </div>
    <!-- END - TABLE -->
  </div>

  <!-- MODAL REMOVE -->
  <div class="modal fade" id="removemodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="smallmodalLabel">Remover Tipo de alimento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <p>Deseja realmente remover este <b>Tipo de alimento</b>?</p>
        </div>

        <form method="POST" action="actions/<?=$pageName?>.php" class="modal-footer form-remove">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" id="btn-confirm-remove" class="btn btn-danger">Sim</button>
          <input type="hidden" name="action" value="remove">
          <input type="hidden" name="id" id="id">
        </form>

      </div>
    </div>
  </div>
  <!-- END - MODAL REMOVE -->

  <!-- NOTIFICATION -->
  <span class="resp-notification notification-validation"><?= $resp ?></span>
  <span class="resp-action"><?= $respAction ?></span>
  <span class="resp-ob"><?= $respOb ?></span>
  <!-- END - NOTIFICATION -->

  <script src="require/js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="require/js/bootstrap.min.js"></script>
  <script src="require/js/index.js"></script>
  <script src="require/js/validate.js"></script>
</body>
</html>