<?php

require_once 'db_connection.php';

class Manufacturer{

    private $table_name ="car_manufacturer";

}

#Creating Connection
$database = new Database();
$conn =  $database->getConnection();

$post = $_POST;

if(isset($post['manufacturer_name'])){
   $manufacturer_set =$database->setManufacturer($conn,$post);
   header("Location:model-form.php");
} else {
    $manufacturer_list =$database->getManufacturer($conn);
    $list = json_encode($manufacturer_list);
    echo $list;
}


?>