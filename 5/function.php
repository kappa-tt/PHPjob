<?php

  require_once('db_connect.php');

  function user_log() {
    
    session_start();
  
    if(empty($_SESSION['user_name'])) {
      header('location: login.php');
      exit();
    }

  }


?>