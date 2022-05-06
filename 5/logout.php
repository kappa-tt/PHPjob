<?php

  session_start();

  $_SESSION = array();

  session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログアウト</title>
</head>
<body>
  <h1 class="title">ログアウト画面</h1>
  <p>ログアウトしました</p>
  <a href="login.php">ログイン画面に戻る</a>
</body>
</html>