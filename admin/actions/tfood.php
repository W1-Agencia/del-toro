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

  $object = "Alimento";
  $namePage = "tipo-alimento";
  $nameTable = "tfood";

  if($_POST['action'] == 'add') {

    // ORDENATION
    $lastItem = select($nameTable, "*", "id", "ORDER BY ordenation DESC", "LIMIT 1");
    $ordenation = (!$lastItem) ? 1 : $lastItem[0]['ordenation'] + 1;

    // SAVE IMAGE

      // INSERT
      $return = insert(
        array("alimento","ordenation"), 
        array($_POST['title'],$ordenation),
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

    // VALUES - POST
    $id = $_POST['id'];
    $title = $_POST['title'];
    $ordenation = $_POST['ordenation'];

    // SELECT ITEMS
    $allItems = select($nameTable, "*", "id");
    $item = select($nameTable, "*", "id=".$id);
    $item = $item[0];

    // ORDENATION
    $item['ordenation'] = ordenation($ordenation, $item['ordenation'], $allItems, $nameTable);

    // IMAGE

    // ITEMS
    $item['alimento'] = ($title != $item['alimento']) ? $title : $item['alimento'];

    // UPDATE
    $return = update(
      array(
        'alimento',
        'ordenation'
      ), 
      array(
        $item['alimento'],
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