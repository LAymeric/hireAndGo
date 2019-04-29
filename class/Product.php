<?php
    require_once __DIR__."./../functions.php";
    require_once '../panier/index.php';


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

        $req = $connection->prepare("SELECT * FROM product");
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
            $out.= '<p class="card-text" style="text-align: center">Prix : '.$item['price'].' <input type="hidden" value="'.$item['price'].'" id="price'.$item['id'].'">€</p><br>';
            $out.= '<p style="text-align: center;"><input type="number" id="quantity'.$item['id'].'" min="1" placeholder="Quantité" style="text-align: center;"></p><br>';
            $out .= '<p style="text-align: center;"><button onclick="Add('.$item['id'].')" style="text-align: center;">Ajouter au panier</button></p>';
            $out.='</div>';
            $out.='</div>';
            $out.='</div>';
        }
        $out.= '     </div>
                </div>';

        echo $out;
    }


}