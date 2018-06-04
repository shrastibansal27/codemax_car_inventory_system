<?php

require_once 'db_connection.php';

class Model{

    private $table_name ="car_model";
}


#Creating Connection
$database = new Database();
$conn =  $database->getConnection();

$post = $_POST;

if(isset($post['submit'])){
   $database->setModel($conn,$post);
   header("Location:car_inventory.php");
}
elseif(isset($_POST['action'])){
    $id = $_POST['id'];
    $database->deleteModel($conn,$id);
    echo "Successfully Deleted";

}
else{
    $id = $_GET['id'];
    $model = $database->getModel($conn,$id);
    $data = json_encode($model);
    echo $data;
}




?>