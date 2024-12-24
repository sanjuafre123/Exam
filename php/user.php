<?php 
    header("Access-Control-Allow-Method: POST,GET");
    header("Content-Type: application/json");

    include('config.php');

    $c1 = new Config();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if (!empty($name) && !empty($email) && !empty($phone)) {
            $res = $c1->insertUser($name,$email,$phone);

            if($res)
            {
                $arr['msg'] = 'Data insert succesfuly !';
            }
            else
            {
                $arr['msg'] = 'Data not inserted !';
            }
        }
        else
        {
            $arr['msg'] = 'field this required!';
        }
    }
    elseif($_SERVER['REQUEST_METHOD'] == "GET")
    {
        $res = $c1->fetchUser();
        $user = [];
        
        if($res)
        {
            while ($data = mysqli_fetch_assoc($res)) {
                array_push($user, $data);
                $arr['data'] = $user;
            }
        }
        else
        {
            $arr['msg'] = 'Data not found !';
        }
    }
    else
    {
        $arr['msg'] = 'Only POST and GET type allowed !';
    }
    echo json_encode($arr);
?>