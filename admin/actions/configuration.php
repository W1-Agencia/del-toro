<?php

require_once './connection/connection.php';
require_once './connection/close_connection.php';
require_once 'require/functions/insert.php';
require_once 'require/functions/select.php';
require_once 'require/functions/update.php';
require_once 'require/functions/delete.php';
require_once 'require/functions/files.php';

setlocale(LC_ALL,'pt_BR.UTF8');
mb_internal_encoding('UTF8'); 
mb_regex_encoding('UTF8');

if(isset($_POST['action'])) {

  $namePage = "configurations";
  $object = "configurations";

  // ADD
  if($_POST['action'] == 'add') {

    // Parameters
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $address = $_POST['address'];
    $cnpj = $_POST['cnpj'];
    // escape function
    $text = addslashes($_POST['text']);

    // Action
    $return = insert(
      array('phone1', 'phone2', 'email','facebook', 'instagram', 'linkedin', 'address', 'cnpj', 'text'), 
      array($phone1, $phone2, $email, $facebook, $instagram, $linkedin, $address, $cnpj, $text),
      "configuration"
    );

    // Return
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
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $address = $_POST['address'];
    $cnpj = $_POST['cnpj'];
    // escape function
    $text = addslashes($_POST['text']);


    $item = select("configuration", "*", "id=".$id, "ORDER BY id");
    $item = $item[0];


    // Assignment for items
    $item['phone1'] = ($phone1 != $item['phone1']) ? $phone1 : $item['phone1'];
    $item['phone2'] = ($phone2 != $item['phone2']) ? $phone2 : $item['phone2'];
    $item['email'] = ($email != $item['email']) ? $email : $item['email'];
    $item['facebook'] = ($facebook != $item['facebook']) ? $facebook : $item['facebook'];
    $item['instagram'] = ($instagram != $item['instagram']) ? $instagram : $item['instagram'];
    $item['linkedin'] = ($linkedin != $item['linkedin']) ? $linkedin : $item['linkedin'];
    $item['text'] = ($text != $item['text']) ? $text : $item['text'];
    $item['address'] = ($address != $item['address']) ? $address : $item['address'];
    $item['cnpj'] = ($cnpj != $item['cnpj']) ? $cnpj : $item['cnpj'];
    $item['ie'] = ($ie != $item['ie']) ? $ie : $item['ie'];

    $return = update(
      array('phone1', 'phone2', 'email', 'facebook','instagram', 'linkedin', 'address', 'cnpj', 'ie', 'text'
      ), 
      array($item['phone1'], $item['phone2'], $item['email'],$item['facebook'],$item['instagram'], $item['linkedin'], $item['address'], $item['cnpj'], $item['ie'], $item['text']
      ), 
      "configuration", "id = " . $id
    );

    if($return) {
      header("Location:".BASE.$namePage."");
    } else {
      header("Location:".BASE.$namePage."");
    }

  }

} else {

  header("Location:".BASE.$namePage."");
  
}