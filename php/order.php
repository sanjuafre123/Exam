<?php 
    header("Access-Control-Allow-Method: POST,DELETE");
    header("Content-Type: application/json");

    include('config.php');

    $c1 = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $order_date = $_POST['order_date'];
        $status = $_POST['status'];

        if(!empty($order_date) && !empty($status))
        {
            $res = $c1->insertOrder($order_date,$status);

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
    else if($_SERVER['REQUEST_METHOD'] == "DELETE")
    {
        $data = file_get_contents("php://input");
        parse_str($data,$result);

        $id = $result['id'];

        if(!empty($id))
        {
        $res = $c1->deleteOrder($id);

            if($res)
            {
                $arr['msg'] = 'Data deleted successfuly !';
            }
            else
            {
                $arr['msg'] = 'Data not deleted !';
            }
        }
        else
        {
            $arr['msg'] = 'All field required!';
        }
    }
    else
    {
        $arr['msg'] = 'Only POST and DELETE type allowed !';
    }
    echo json_encode($arr);
?>