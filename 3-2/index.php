<!-- 下記、単価・個数にて
りんご→150円,2個
みかん→50円,3個
もも→300円,10個 -->

<?php

  $fruits = ["りんご" => 150, "みかん" => 50, "もも" => 300];

  $fruitsNum = [2, 3, 10];

  function totalPrice($price,$num) {

    return $price * $num;

  }

 foreach ($fruits as $key => $value) {

  if ($key === "りんご") {
    echo $key,"は",totalPrice($value,$fruitsNum[0]),"円です。";
    echo '<br>';
  }elseif ($key === "みかん") {
    echo $key,"は",totalPrice($value,$fruitsNum[1]),"円です。";
    echo '<br>';
  }elseif ($key === "もも") {
    echo $key,"は",totalPrice($value,$fruitsNum[2]),"円です。";
    echo '<br>';   
  }
  }

?>