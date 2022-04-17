<?php

  $number = $_POST["number"];
  $strNum = strlen($number);
  $randNum = mt_rand(0, $strNum);
  $subNum = substr($number, $randNum, 1);
  
  function omikuji($selNum) {
    if ($selNum == 0) {
      return "凶";
    }elseif ($selNum <= 3) {
      return "小吉";
    }elseif ($selNum <= 6) {
      return "中吉";
    }elseif ($selNum <= 8) {
      return "吉";
    }elseif ($selNum <= 9) {
      return "大吉";
    }
  }
  
?>

<p><?php echo date("Y/m/d", time()); ?>の運勢は</p>
<p>選ばれた数字は<?php echo $subNum; ?></p>
<p><?php echo omikuji($subNum); ?></p>
