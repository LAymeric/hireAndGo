<?php
    require_once "../head.php";


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

    public function addProduce(){
        $connection = connectDB();

        $insertProduct = $connection->prepare("INSERT INTO service(name, picture, quantity, price) VALUES (:name, :picture, :quantity, :price)");
        $insertProduct->execute(array(
            "name"=>$this->name,
            "picture"=>$this->picture,
            "quantity"=>$this->quantity,
            "price"=>$this->price
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

    public function deleteProduct($id){
        $connection = connectDB();

        $deleteProduct = $connection->prepare("DELETE FROM service WHERE id =".$id);
        $deleteProduct->execute();
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

    public function printProducts()
    {
        $out = '<div class="container">
                    <div class="row">';
        foreach ($this->getAllProducts() as $item)
        {
            $out.= '<div class="col-sm-4" style="padding: 20px;">';
            $out.= '<div class="card" style="width: 18rem; border-color: rgb(91,192,222)">' ;
            $out.='<div class="card-body">' ;
            $out.= '<h5 class="card-title" style="text-align: center;">'.$item['name'].' <input type="hidden" value="'.$item['name'].'" id="name'.$item['id'].'"></h5><br>';
            $out.= '<div style="text-align: center" ><img src="../picture/'.$item['picture'].'" width="100px"/></div>';
            $out.= '<p class="card-text" style="text-align: center">' .  PRICE_SERVICE . $item['price'].' <input type="hidden" value="'.$item['price'].'" id="price'.$item['id'].'">€</p><br>';
            $out.= '<p style="text-align: center;"><input type="number" id="quantity'.$item['id'].'" min="1" placeholder="'. QUANTITY.'" style="text-align: center;"></p><br>';
            $out .= '<p style="text-align: center;"><button class="btn btn-info" onclick="Add('.$item['id'].')" style="text-align: center;"><i class="fas fa-plus-circle"></i>'.ADD_CART.'</button></p>';
            $out.='</div>';
            $out.='</div>';
            $out.='</div>';
        }
        $out.= '     </div>
                </div>';

        echo $out;
    }

}