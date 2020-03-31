<?php 
session_start();

include_once '../../connection/connection.php';
include_once '../../connection/close_connection.php';
include_once '../../require/functions/select.php';

if(isset($_POST['user']) 
  && isset($_POST['password'])
  && $_POST['user'] != ""
  && $_POST['password'] != "") {

  $user = $_POST['user']; 
  $password = $_POST['password'];

  if(empty($user) || empty($password)) {

    $_SESSION['log'] = 'invalid'; 
    header("Location:/".'login'."");

  } elseif(!empty($user) && !empty($password)) {

    $return = select("admin", "*", "email='".$user."' AND password='".md5($password)."'");

    if(!$return) {

      $_SESSION['log'] = 'invalid'; 
      header("Location:../");

    } elseif($return) {

      $_SESSION['user'] = $user;
      header("Location: ../");      
    }

  }
} else {

  $_SESSION['log'] = 'invalid'; 
  header("Location:../");

}