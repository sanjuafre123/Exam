

<?php

  header("Access-Control-Allow-Method: POST ");

  header("Content-Type: application/json");

  include("examconfig.php");

  
  $c1 = new Config();
  $arr;
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $res = $c1->insert($name,$email ,$phone);
  }
  
  else {
    
    $arr['error'] = " only POST  type  is allowed";
  }

    echo  json_encode($arr);
?>