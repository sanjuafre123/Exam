<?php

  header("Access-Control-Allow-Method: POST ");
  header("Access-Control-Allow-Method: PUT ");
  header("Content-Type: application/json");

  include("examconfig.php");
  $c1 = new Config();

  if($_SERVER['REQUEST_METHOD']=="PUT")
  {
    $data = file_get_contents("php://input");
    parse_str($data, $result);

    $id = $result['id'];
    $pro_name = $result['pro_name'];
    $price = $result['price'];
    

    $res = $c1->update($id,$pro_name, $price);
    if($res){

        $arr['msg']=  " PUT";
    }else{
        $arr['err']='not PUT ';
    }
  }
  else { 
    $arr['error'] = " only PUT  type  is allowed";
  }

    echo  json_encode($arr);
?>



  