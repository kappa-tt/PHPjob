<?php

  require_once('db_connect.php');
  require_once('function.php');

  user_log();
 
  $pdo = db_connect();

  try {

    $list_sql = 'SELECT * FROM books ORDER BY date ASC';
    $stmt = $pdo->prepare($list_sql);
    $stmt->execute();
  }catch(PDOExpention $e) {
    echo 'Error: '.$e->getMessage();
    die();
  }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>在庫一覧</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body style="width: 800px;">
  <header>
    <h1 class="title">在庫一覧画面</h1>
    <a href="register.php" class="btn register-btn">新規登録</a>
    <a href="logout.php" class="btn logout-btn">ログアウト</a>
  </header>
  <table>
    <tr>
      <th>タイトル</th>
      <th>発売日</th>
      <th>在庫数</th>
      <th></th>
    </tr>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr>
      <td><?php echo $row['title']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['stock']; ?></td>
      <td><a class=" btn delete-btn" href="delete.php?id=<?php echo $row['id']?>">削除</a></td>
    </tr>
    <?php } ?>
  </table>
  
</body>
</html>