<?php

  require_once('db_connect.php');

  session_start();

  if(!empty($_POST)) {

    if(empty($_POST['name'])) {
      echo 'ユーザー名が未入力です。';
    }else if(empty($_POST['password'])) {
      echo 'パスワードが未入力です。';
    }else if(!empty($_POST['name']) && !empty($_POST['password'])) {

      $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
      $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

      $pdo = db_connect();

      try {
        $login_sql = 'SELECT * FROM users where name = :name';
        $stmt = $pdo->prepare($login_sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
      }catch(PDOExpention $e) {
        echo 'Error: '.$e->getMessage();
        die();
      }

      if($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if(password_verify($password, $row['password'])) {
          
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['user_name'] = $row['name'];

          header('location: main.php');
          exit;

        }
      }else {
        echo 'ユーザー名かパスワードに誤りがあります。';
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
  <title>ログインページ</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <span class="title">ログイン画面</span>
      <a href="signup.php" class="btn signUp-btn">新規ユーザー登録</a>
  </header>
  <form action="" method="post">
    <input type="text" name="name" placeholder="ユーザー名" class="input">
    <br>
    <input type="password" name="password" placeholder="パスワード" class="input">
    <br>
    <input type="submit" value="ログイン" class="btn">
  </form>
</body>
</html>