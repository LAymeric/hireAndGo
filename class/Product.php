<?php
    require_once __DIR__."./../functions.php";

class Product{

    private $id;
    private $name;
    private $picture;
    private $quantity;
    private $price;

    public function __construct($name, $picture, $quantity, $price){
        $this->name = $name;
        $this->picture = $picture;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function addProduct(){
        $connection = connectDB();

        $insertProduct = $connection->prepare("INSERT INTO product(name, picture, quantity, price) VALUES (:name, :picture, :quantity, :price)");
        $insertProduct->execute(array(
           "name"=>$this->name,
            "picture"=>$this->picture,
            "quantity"=>$this->quantity,
            "price"=>$this->price
        ));
    }

    public function modifyProduct($id){
        $connection = connectDB();

        $modifyProduct = $connection->prepare("UPDATE product SET name = :name, picture = :picture, quantity = :quantity, price = :price WHERE id=".$id);
        $modifyProduct->execute(array(
            "name"=>$this->name,
            "picture"=>$this->picture,
            "quantity"=>$this->quantity,
            "price"=>$this->price
        ));
    }

    public function deleteProduct($id){
        $connection = connectDB();

        $deleteProduct = $connection->prepare("DELETE FROM product WHERE id =".$id);
        $deleteProduct->execute();
    }

    public function getProduct($id){
        $this->id = $id;
        $query = "SELECT * FROM product WHERE id = ".$this->id;
        $result = sqlSelect($query);
        $this->name = $result["name"];
        $this->picture = $result["picture"];
        $this->quantity = $result["quantity"];
        $this->price = $result["price"];
    }

    public function __get($property){
        if('name' === $property) {
            return $this->name;
        } else if('picture' === $property) {
            return $this->picture;
        } else if('quantity' === $property) {
            return $this->quantity;
        } else if('price' === $property) {
            return $this->price;
        } else if('id' === $property) {
            return $this->id;
        } else {
            throw new Exception('Propriété invalide !');
        }
    }

}