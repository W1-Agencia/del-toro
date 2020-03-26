<?php
require_once './connection/connection.php';
require_once './connection/close_connection.php';
require_once './require/functions/insert.php';
require_once './require/functions/select.php';
require_once './require/functions/update.php';
require_once './require/functions/delete.php';
require_once './require/functions/ordenation.php';
require_once "./admin/require/functions/files.php";

setlocale(LC_ALL,'pt_BR.UTF8');
mb_internal_encoding('UTF8'); 
mb_regex_encoding('UTF8');

if(isset($_POST['action'])) {

  $object = "Cardápio";
  $namePage = "promocoes";
  $nameTable = "promotions";
  $imageDiretory = "./admin/require/img/promotions/";

  if ($_POST['action'] == 'add') {
      $real = $_POST['value'];
      $value = number_format($real,2,'.',',');
      $lastItem = select($nameTable, "*", "id", "ORDER BY ordenation DESC", "LIMIT 1");
      $ordenation = (!$lastItem) ? 1 : $lastItem[0]['ordenation'] + 1;
      $img = saveImage($_FILES['file'], $imageDiretory);
      print_r($_POST);
      if (!$img) {
          header("Location:../".$namePage."_add.php?i=err&ac=add&ob=".$object);
      } else {
        $return = insert(
        array('name_prod', 'descriptions_prod', 'value_prod','date_init', 'date_end','namedir','ordenation'),
        array($_POST['name'],
              $_POST['text'],
              $value,
              date('Y-m-d',strtotime($_POST['dataPublicao'])),
              date('Y-m-d',strtotime($_POST['dataFinalPublicacao'])),
              $img,
              $ordenation),
        $nameTable
    );
      if ($return) {
        header("Location:".BASE.$namePage."");
      } else {
        header("Location:".BASE.$namePage."");
      }
    }
  }

  // EDIT
  elseif($_POST['action'] == 'edit') {
    $real = $_POST['value'];
    $value = number_format($real,2,'.',',');
    $id = $_POST['id'];
    $img = $_FILES['file'];

    $allItems = select($nameTable, "*", "id");
    $item = select($nameTable, "*", "id=".$id);
    $item = $item[0];

    if (isset($img) && !empty($img['name'])) 
    {
        $nameImage = saveImage($img, $imageDiretory);
        unlink($imageDiretory.$item['namedir']);
        $item['namedir'] = $nameImage;
    }
    $return = update(
      array(
        'namedir',
        'name_prod',
        'descriptions_prod',
        'value_prod',
        'date_init',
        'date_end',
      ), 
      array(
        $item['namedir'],
        $_POST['name'],
        $_POST['text'],
        $value,
        date('Y-m-d',strtotime($_POST['dataPublicao'])),
        date('Y-m-d',strtotime($_POST['dataFinalPublicacao'])),
      ), 
      $nameTable, "id = " . $id
    );
    
    if($return) {
      header("Location:".BASE.$namePage."");
    } else {
      header("Location:".BASE.$namePage."");
    }

  }

  // DELETE
  elseif($_POST['action'] == 'remove') {

    // VERIFY IF ID SENDED
    if(isset($_POST['id']) && !empty($_POST['id'])) {

      // GET VALUE
      $id = $_POST['id'];

      // SEARCH ELEMENT
      $item = select($nameTable, "*", "id=" . $id);

      // ORDENATION
      $allItems = select($nameTable, "*", "id");
      for ($i = 0; $i < count($allItems); $i++) {
        if($allItems[$i]['ordenation'] > $item[0]['ordenation']) {
          update(
            array('ordenation'), 
            array($allItems[$i]['ordenation'] - 1), 
            $nameTable, "id=" . $allItems[$i]['id']
          );
        }
      }

      // IMAGE
      unlink($imageDiretory . $item[0]['img']);

      // DELETE
      delete($nameTable, "id=".$id);

      // RETURN
      header("Location:".BASE.$namePage."");

    } else { // ERROR
      header("Location:".BASE.$namePage."");
    }

  }

} else { // ACTION NOT SENDED

  header("Location:".BASE.$namePage."");
  
}