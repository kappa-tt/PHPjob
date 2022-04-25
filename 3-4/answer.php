<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php 
  //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
  $Name = $_POST["my_name"];
  $Answer1 = filter_input(INPUT_POST, "q1", FILTER_SANITIZE_STRING);
  $Answer2 = filter_input(INPUT_POST, "q2", FILTER_SANITIZE_STRING);
  $Answer3 = filter_input(INPUT_POST, "q3", FILTER_SANITIZE_STRING);
  $corAns1 = $_POST["a1"];
  $corAns2 = $_POST["a2"];
  $corAns3 = $_POST["a3"];
  
  
  //選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
  function result($answer, $corAns) {
    if ($answer === $corAns) {
      return "正解！";
    }else {
      return "残念・・・";
    }
  }
  
  ?>
  <p><!--POST通信で送られてきた名前を表示-->
  <?php echo $Name; ?>さんの結果は・・・？</p>
  <p>①の答え</p>
  <!--作成した関数を呼び出して結果を表示-->
  <?php echo result($Answer1, $corAns1); ?>
  
  <p>②の答え</p>
  <!--作成した関数を呼び出して結果を表示-->
  <?php echo result($Answer2, $corAns2); ?>
  
  <p>③の答え</p>
  <!--作成した関数を呼び出して結果を表示-->
  <?php echo result($Answer3, $corAns3); ?>
  
</body>
</html>

