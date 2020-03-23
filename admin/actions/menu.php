<?php
require_once '../../connection/connection.php';
require_once '../../connection/close_connection.php';
require_once '../require/functions/insert.php';
require_once '../require/functions/select.php';
require_once '../require/functions/update.php';
require_once '../require/functions/delete.php';
require_once '../require/functions/files.php';
require_once '../require/functions/ordenation.php';

setlocale(LC_ALL,'pt_BR.UTF8');
mb_internal_encoding('UTF8'); 
mb_regex_encoding('UTF8');

if(isset($_POST['action'])) {

  $object = "Cardápio";
  $namePage = "menu";
  $nameTable = "menu";

  if($_POST['action'] == 'add') {
    // ORDENATION
    $lastItem = select($nameTable, "*", "id", "ORDER BY ordenation DESC", "LIMIT 1");
    $ordenation = (!$lastItem) ? 1 : $lastItem[0]['ordenation'] + 1;

      // INSERT
      $return = insert(
        array('id_product', 'name_product', 'description_product','value_product', 'ordenation'), 
        array($_POST['options'], $_POST['name'], $_POST['text'], $_POST['value'], $ordenation),
        $nameTable
      );

      // RETURN
      if($return) {
        header("Location:../".$namePage.".php?i=scs&ac=add&ob=".$object);
      } else {
          header("Location:../".$namePage.".php?i=err&ac=add&ob=".$object);
      }   
    }

  // EDIT
  elseif($_POST['action'] == 'edit') {
    // VALUES - POST
    $id = $_POST['id'];
    $opcao = $_POST['options'];
    $title = $_POST['title'];
    $text = $_POST['text']; 
    $valor = $_POST['value'];
    $ordenation = $_POST['ordenation'];

    // SELECT ITEMS
    $allItems = select($nameTable, "*", "id");
    $item = select($nameTable, "*", "id=".$id);
    $item = $item[0];
    // ITEMS
    $item['name_product'] = ($title != $item['name_product']) ? $title : $item['name_product'];
    $item['description_product'] = ($text != $item['description_product']) ? $text : $item['description_product'];
    $item['value_product'] = ($valor != $item['value_product']) ? $valor : $item['value_product']; 
    $item['ordenation'] = ordenation($ordenation, $item['ordenation'], $allItems, $nameTable);

    // UPDATE
    $return = update(
      array(
        'name_product',
        'description_product',
        'value_product',
        'ordenation'
      ), 
      array(
        $item['name_product'], 
        $item['description_product'], 
        $item['value_product'],
        $item['ordenation']
      ), 
      $nameTable, "id = " . $id
    );
    
    // RETURN
    if($return) {
      header("Location:../".$namePage.".php?i=scs&ac=edit&ob=".$object);
    } else {
      header("Location:../".$namePage.".php?i=err&ac=edit&ob=".$object);
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
      header("Location:../".$namePage.".php?i=scs&ac=remove&ob=".$object);

    } else { // ERROR
      header("Location:../".$namePage.".php?i=err&ac=remove&ob=".$object);
    }

  }

} else { // ACTION NOT SENDED

  header("Location:../".$namePage.".php");
  
}