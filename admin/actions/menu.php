<?php
require_once './connection/connection.php';
require_once './connection/close_connection.php';
require_once './require/functions/insert.php';
require_once './require/functions/select.php';
require_once './require/functions/update.php';
require_once './require/functions/delete.php';
require_once './require/functions/ordenation.php';

setlocale(LC_ALL,'pt_BR.UTF8');
mb_internal_encoding('UTF8'); 
mb_regex_encoding('UTF8');

if(isset($_POST['action'])) {
  $object = "Cardápio";
  $namePage = "cardapios";
  $nameTable = "menu";

  if($_POST['action'] == 'add') {
    // ORDENATION
    $lastItem = select($nameTable, "*", "id", "ORDER BY ordenation DESC", "LIMIT 1");
    $ordenation = (!$lastItem) ? 1 : $lastItem[0]['ordenation'] + 1;
    $real = $_POST['value'];
    $value = number_format($real,2,'.',',');
      // INSERT
      $return = insert(
        array('sub_id_product', 'name_product', 'description_product','value_product', 'ordenation'), 
        array($_POST['optionssub'], $_POST['name'], $_POST['text'], $value, $ordenation),
        $nameTable
      );

      // RETURN
      if($return) {
        header("Location:".BASE.$namePage."");
      } else {
        header("Location:".BASE.$namePage."");
      }   
    }

  // EDIT
  elseif($_POST['action'] == 'edit') {
    print_r($_POST);
    // VALUES - POST
    $id = $_POST['id'];
    $opcaosub = $_POST['optionssub'];
    $title = $_POST['title'];
    $text = $_POST['text']; 
    $real = $_POST['value'];
    $valor = number_format($real,2,'.',',');
    $ordenation = $_POST['ordenation'];

    // SELECT ITEMS
    $allItems = select($nameTable, "*", "id");
    $item = select($nameTable, "*", "id=".$id);
    $item = $item[0];
    // ITEMS
    $item['name_product'] = ($title != $item['name_product']) ? $title : $item['name_product'];
    $item['description_product'] = ($text != $item['description_product']) ? $text : $item['description_product'];
    $item['value_product'] = ($valor != $item['value_product']) ? $valor : $item['value_product']; 
    $item['sub_id_product'] = ($opcaosub != $item['sub_id_product']) ? $opcaosub : $item['sub_id_product']; 
    $item['ordenation'] = ordenation($ordenation, $item['ordenation'], $allItems, $nameTable);

    // UPDATE
    $return = update(
      array(
        'name_product',
        'description_product',
        'sub_id_product',
        'value_product',
        'ordenation'
      ), 
      array(
        $item['name_product'], 
        $item['description_product'], 
        $item['sub_id_product'],
        $item['value_product'],
        $item['ordenation']
      ), 
      $nameTable, "id = " . $id
    );
    
    // RETURN
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