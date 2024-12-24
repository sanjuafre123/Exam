<?php
 class Config{
   private $host = "localhost";
   private $usermane = "root";
   private $password = "";
   private $datbase = "costomer";
   private $connection;
   public function connect()
   {
     $this->connection = mysqli_connect($this->host,$this->usermane,$this->password,$this->datbase);
   }
   public function __construct()
{
 $this->connect();
}

public function insert ($name,$email,$phone)
    {
      $query = "INSERT INTO manage (name,email,phone) VALUES('$name','$email',$phone)";
      $res = mysqli_query($this->connection,$query);
     return  $res;
    }  

    public function productinsert ($pro_name,$price)
    {
      $query = "INSERT INTO products (pro_name,price) VALUES('$pro_name',$price)";
      $res = mysqli_query($this->connection,$query);
     return  $res;
    }

    public function oderinsert ($order_date,$status)
    {
      $query = "INSERT INTO orders (order_date,status) VALUES('$order_date','$status')";
      $res = mysqli_query($this->connection,$query);
     return  $res;
    }

    public function fetch()
    {
      $query = "SELECT * FROM manage";
      $res = mysqli_query($this->connection, $query);
      return $res;
    }


    public function update( $id,$pro_name,$price)
    {
      $query =" UPDATE products SET `pro_name`='$pro_name',`price`='$price' WHERE id= $id   ";
      $res = mysqli_query($this->connection,$query);
     return  $res;
    }

    public function delete ( $id,)
    {
      $query =" DELETE FROM orders WHERE  id =$id  ";
      $res = mysqli_query($this->connection,$query);
     return  $res;
    }
 }
?>

