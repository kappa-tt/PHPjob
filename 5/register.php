<?php

  require_once('db_connect.php');
  require_once('function.php');

  user_log();

  if(!empty($_POST)) {

    if(empty($_POST['book_name'])) {
      echo 'タイトルを入力してください。';
    }else if(empty($_POST['release'])) {
      echo '発売日を入力してください。';
    }else if(empty($_POST['stock'])) {
      echo '数量を入力してください。';
    }else if(!empty($_POST['book_name']) && !empty($_POST['release']) && !empty($_POST['stock'])) {

      $book_name = $_POST['book_name'];
      $release = $_POST['release'];
      $stock = $_POST['stock'];

      $pdo = db_connect();
    
      try {
        
        $book_sql = 'INSERT INTO books(title, date, stock) value(:book_name, :release, :stock)';
        $stmt = $pdo->prepare($book_sql);
        $stmt->bindParam(':book_name', $book_name);    
        $stmt->bindParam(':release', $release);    
        $stmt->bindParam(':stock', $stock);
        $stmt->execute();
    
        header('location: main.php');
        exit();

      }catch(PDOExpention $e) {
        echo 'Error: '.$e->getMessage();
        die();
      }

    }

  }


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1 class="title">本 登録画面</h1>
  </header>
  <form action="" method="post">
    <input type="text" name="book_name" placeholder="タイトル" class="input" style="width: 200px;"><br>
    <input type="text" name="release" placeholder="発売日"  class="input" style="width: 200px;"><br>
    <p>在庫数</p>
    <input type="number" name="stock" placeholder="選択してください。" class="input" style="width: 150px;"><br>
    <input type="submit" value="登録" class="btn">
  </form>
</body>
</html>