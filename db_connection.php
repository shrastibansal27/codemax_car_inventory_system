<?php
    class Database
    {

        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $db_name = "car_inventory_system";
        private $conn;
        private $model_table = "car_model";
        private $manufacturer_table = "car_manufacturer";

        function getConnection()
        {

           $this->conn = null;

            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }

            return $this->conn;
        }

        function getManufacturer($conn){
           $stmt = $conn->prepare("SELECT * from ".$this->manufacturer_table);
           $stmt->execute();
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $results;
        }

        function setManufacturer($conn,$post){
            $stmt = $conn->prepare("INSERT INTO ".$this->manufacturer_table."(manufacturer_name) Value (:manufacturer_name)" );
            $stmt->execute(array(':manufacturer_name'=>$post['manufacturer_name']));
        }

        function getCarInventory($conn){

            $sql=   "SELECT car_model.model_name,car_manufacturer.manufacturer_name,count(car_model.model_name) as count, car_model.id as model_id FROM ".$this->model_table. " inner join ".$this->manufacturer_table." on car_manufacturer.id = car_model.car_manufacturer_id group by car_model.model_name";

           $stmt = $conn->prepare($sql);
           $stmt->execute();
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;

        }

        function setModel($conn,$post){
             $stmt = $conn->prepare("INSERT INTO ".$this->model_table. "(model_name,car_manufacturer_id,color,manufacturing_year,registration_no,note,car_image1,car_image2) Values (:model_name,:car_manufacturer_id,:color,:manufacturing_year,:registration_no,:note,:car_image1,:car_image2)");

            $stmt->execute(array(':model_name'=>$post['model_name'], ':car_manufacturer_id'=>$post['car_manufacturer_id'], ':color'=>$post['color'], ':manufacturing_year'=>$post['manufacturing_year'], ':registration_no'=>$post['registration_no'],':note'=>$post['note'],':car_image1'=>$post['car_image1'],':car_image2'=>$post['car_image2']));
        }

        function getModel($conn,$id){
            $stmt = $conn->prepare("SELECT * from ".$this->model_table." where id=:id");
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }

        function deleteModel($conn,$id){
            $stmt = $conn->prepare("DELETE from ".$this->model_table. " WHERE id = :id");
            $stmt->bindParam(":id",$id, PDO::PARAM_INT);
            $stmt->execute();
        }
    }
?>