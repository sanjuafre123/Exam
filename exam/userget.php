<?php

  header("Access-Control-Allow-Method: POST ");
  header("Access-Control-Allow-Method: GET ");
  header("Content-Type: application/json");

  include("examconfig.php");
  $c1 = new Config();

  if($_SERVER['REQUEST_METHOD']=="GET")
  {
    $res = $c1->fetch();
    $arr = [];
    if($res)
       {
        while($data = mysqli_fetch_assoc($res))
        {
            array_push($arr,$data);
        }
       }
       else{
        $arr['msg'] = "Database not found !";
       }
  }
  else {
    $arr['error'] = " only POST AND GET  type  is allowed";
  }

    echo  json_encode($arr);
?>