<?php 
    header("Access-Control-Allow-Method: POST,PUT");
    header("Content-Type: application/json");

    include('config.php');

    $c1 = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];

        if(!empty($product_name) && !empty($price))
        {
            $res = $c1->insertProduct($product_name,$price);

            if($res)
            {
                $arr['msg'] = 'Data inserted !';
            }
            else
            {
                $arr['msg'] = 'Data not inserted !';
            }
        }
        else
        {
            $arr['msg'] = 'All field required!';
        }
    }
    elseif($_SERVER['REQUEST_METHOD'] == "PUT")
    {
        $data = file_get_contents("php://input");
        parse_str($data,$result);

        $id = $result['id'];
        $product_name = $result['product_name'];
        $price = $result['price'];

        if(!empty($id) && !empty($product_name) && !empty($price))
        {
        $res = $c1->updateProduct($id,$product_name,$price);

        if($res)
        {
            $arr['msg'] = 'Data updated !';
        }
        else
        {
            $arr['msg'] = 'Data not updated !';
        }
        }
        else
        {
            $arr['msg'] = 'All field required!';   
        }
    }
    else
    {
        $arr['msg'] = 'Only POST and PUT type allowed !';
    }
    echo json_encode($arr);
?>