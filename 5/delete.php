<?php

  require_once('db_connect.php');
  require_once('function.php');

  user_log();
  
  $id = $_GET['id'];

  if (empty($id)) {
    header("Location: main.php");
    exit;
  }

  $pdo = db_connect();

  try {
    $delete_sql = 'DELETE FROM books where id = :id';
    $stmt = $pdo->prepare($delete_sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header('location: main.php');
    exit();
  }catch(PDOExpention $e) {
    echo 'Error: '.$e->getMessage();
    die();
  }

?>