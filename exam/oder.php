
<?php

  header("Access-Control-Allow-Method: POST ");
  header("Content-Type: application/json");
  include("examconfig.php");

  $c1 = new Config();
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $oder_date = $_POST['oder_date'];
    $status = $_POST['status'];
   
    $res = $c1->oderinsert($oder_date ,$status);
  }
  else {
    
    $arr['error'] = " only POST  type  is allowed";
  }

 
?>