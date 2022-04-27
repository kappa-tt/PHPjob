<?php
require_once("getData.php");

$login_date = date("Y-m-d H:i:s", time());
$data_sql = "UPDATE users SET last_login = :login_date";

$pdo = connect();

try {
  $stmt = $pdo->prepare($data_sql);
  $stmt->bindParam(':login_date', $login_date);
  $stmt->execute();
}catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}

$users_data = new getData();

function category_name($category) {
  if($category === '1') {
    return "食事";
  }elseif($category === '2') {
    return "旅行";
  }else {
    return "その他";
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
    <div class="header-left">
      <img src="img/logo.png" alt="ロゴ" class="header-image">
    </div>
    <div class="header-right">
      <div class="header-right-name">
        ようこそ 
        <?PHP
         echo $users_data->getUserData()['last_name']; echo $users_data->getUserData()['first_name'];
         ?>
         さん
      </div>
      <div class="header-right-login">
        最終ログイン日：
        <?php echo $users_data->getUserData()['last_login'];?>
      </div>
    </div>
  </header>

  <main>
    <table>
      <tr>
        <th>記事ID</th>
        <th>タイトル</th>
        <th>カテゴリ</th>
        <th>本文</th>
        <th>投稿日</th>
      </tr>
      <?php foreach($users_data->getPostData() as $row){?>
      <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['title'];?></td>
        <td><?php echo category_name($row['category_no']);?></td>
        <td><?php echo $row['comment'];?></td>
        <td><?php echo $row['created'];?></td>
      </tr>
      <?php }?>
    </table>
  </main>

  <footer>
    Y&I group.inc
  </footer>
  
</body>
</html>