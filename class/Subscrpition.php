<?php
    require_once __DIR__."./../functions.php";

class Subscrpition{

    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct($name, $description, $price){
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function addSubscription(){
        $connection = connectDB();

        $insertSubs = $connection->prepare("INSERT INTO subscription(name, description, price) VALUES (:name, :description, :price)");
        $insertSubs ->execute(array
        (   "name"=>$this->name,
            "description"=>$this->description,
            "price"=>$this->price
        ));
    }

    public function getSubscription($id){
        $this->id = $id;
        $query = "SELECT * FROM subscription WHERE id = ".$this->id;
        $result = sqlSelect($query);
        $this->name = $result["name"];
        $this->description = $result["description"];
        $this->price = $result["price"];
    }

    public function modifySubscription($id){
        $connection = connectDB();

        $modifySubscription = $connection->prepare("UPDATE subscription SET name = :name, description = :description, price = :price WHERE id=".$id);
        $modifySubscription->execute(array(
           "name"=>$this->name,
           "description"=>$this->description,
           "price"=>$this->price
        ));
    }

    public function deleteSubscription($id){
        $connection = connectDB();

        $deleteSubscription = $connection->prepare("DELETE FROM subscription WHERE id =".$id);
        $deleteSubscription->execute();
    }

    public function __get($property){
        if('name' === $property) {
            return $this->name;
        } else if('description' === $property) {
            return $this->description;
        } else if('price' === $property) {
            return $this->price;
        } else if('id' === $property) {
            return $this->id;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

}

?>