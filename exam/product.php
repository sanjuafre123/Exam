<?php

header("Access-Control-Allow-Method: POST ");
header("Access-Control-Allow-Method: GET ");
header("Content-Type: application/json");

include("examconfig.php");


$c1 = new Config();
$arr;
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $pro_name = $_POST['pro_name'];
  $price = $_POST['price'];
 
  $res = $c1->productinsert($pro_name,$price );
}
else { 
  $arr['error'] = " only POST  type  is allowed";
}

  echo  json_encode($arr);
?>