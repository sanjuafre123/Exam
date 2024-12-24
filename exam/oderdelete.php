
<?php
  header("Access-Control-Allow-Method: POST ");
  header("Access-Control-Allow-Method: DELETE ");
  header("Content-Type: application/json");

  include("examconfig.php");
  $c1 = new Config();

  if($_SERVER['REQUEST_METHOD']=="DELETE")
  {
    $data = file_get_contents("php://input");
    parse_str($data, $result);

    $id = $result['id'];

  $res = $c1->delete($id,);
  }
  else { 
    $arr['error'] = " only delete  type  is allowed";
  }

?>



  