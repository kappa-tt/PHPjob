<?php

  require_once('db_connect.php');

  if(!empty($_POST)) {
 
    if(empty($_POST['name'])) {
      echo 'ユーザー名を入力してください。';
    }else if(empty($_POST['password'])) {
      echo 'パスワードを入力してください。';
    }else if(!empty($_POST['name']) && !empty($_POST['password'])) {

      $name = $_POST['name'];
      $password = $_POST['password'];
      
      $pdo = db_connect();
    
      try {
        $users_sql = 'INSERT INTO users(name, password) value(:name, :password)';
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare($users_sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
      }catch(PDOExpention $e) {
        echo 'Error: '.$e->getMessage();
        die();
      }

      echo '登録が完了しました。<br>';
      echo '<a href="login.php">ログインページへ</a>';
      

    }

  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <span class="title">ユーザー登録画面</span>
  </header>
  <form action="" method="post">
    <input type="text" name="name" placeholder="ユーザー名" class="input">
    <br>
    <input type="password" name="password" placeholder="パスワード" class="input">
    <br>
    <input type="submit" value="新規登録" class="btn">
  </form>
</body>
</html>