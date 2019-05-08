<?php
class Service{


    private $id;
    private $name;
    private $picture;
    private $quantity;
    private $price;
    private $isAccompanist;

    public function __construct(){

        $ctp = func_num_args();
        $args = func_get_args();
        switch($ctp)
        {
            case 4:
                $this->fonction4($args[0],$args[1],$args[2],$args[3]);
                break;
            case 5:
                $this->fonction5($args[0],$args[1],$args[2],$args[3],$args[4]);
                break;
            case 6:
                $this->fonction6($args[0],$args[1],$args[2],$args[3],$args[4],$args[5]);
                break;
            default:
                break;
         }
    }

     private function fonction4($name, $picture, $quantity, $price){
             $this->name = $name;
             $this->picture = $picture;
             $this->quantity = $quantity;
             $this->price = $price;

         }

     private function fonction5($name, $picture, $quantity, $price, $isAccompanist){
              $this->name = $name;
              $this->picture = $picture;
              $this->quantity = $quantity;
              $this->price = $price;
              $this->isAccompanist = $isAccompanist;

         }

     private function fonction6($id, $name, $picture, $quantity, $price, $isAccompanist){
              $this->name = $name;
              $this->picture = $picture;
              $this->quantity = $quantity;
              $this->price = $price;
              $this->isAccompanist = $isAccompanist;

         }



  /* public function __construct($name, $picture, $quantity, $price, $isAccompanist){
        $this->name = $name;
        $this->picture = $picture;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->isAccompanist = $isAccompanist;

    }*/

    public function deleteProduct($id){
        $connection = connectDB();

        $deleteProduct = $connection->prepare("DELETE FROM service WHERE id =".$id);
        $deleteProduct->execute();
    }

    public function addProduct(){
        $connection = connectDB();

        $insertProduct = $connection->prepare("INSERT INTO service(name, picture, quantity, price, isAccompanist) VALUES (:name, :picture, :quantity, :price, :isAccompanist)");
        $insertProduct->execute(array(
            "name"=>$this->name,
            "picture"=>$this->picture,
            "quantity"=>$this->quantity,
            "price"=>$this->price,
            "isAccompanist"=>$this->isAccompanist
        ));

    }

    public function modifyProduct($id){
        $connection = connectDB();

        $modifyProduct = $connection->prepare("UPDATE service SET name = :name, picture = :picture, quantity = :quantity, price = :price WHERE id=".$id);
        $modifyProduct->execute(array(
            "name"=>$this->name,
            "picture"=>$this->picture,
            "quantity"=>$this->quantity,
            "price"=>$this->price
        ));
    }


    public function getProduct($id){
        $this->id = $id;
        $query = "SELECT * FROM service WHERE id = ".$this->id;
        $result = sqlSelect($query);
        $this->name = $result["name"];
        $this->image = $result["picture"];
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

    public function getAllProducts()
    {
        $connection = connectDB();

        $req = $connection->prepare("SELECT * FROM service");
        $req->execute();
        $allProducts = $req->fetchAll();
        return $allProducts;
    }

}