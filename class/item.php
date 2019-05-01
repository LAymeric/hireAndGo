<?php
/**
 * Created by IntelliJ IDEA.
 * User: Smoothie
 * Date: 29/04/2019
 * Time: 14:41
 */

class item
{

    private $name_item;
    private $price_item;
    private $quantity_item;
    private $id_item;

    public function getNameItem()
    {
        return $this->name_item;
    }

    public function setNameItem($name_item)
    {
        $this->name_item = $name_item;
    }

    public function getPriceItem()
    {
        return $this->price_item;
    }

    public function setPriceItem($price_item)
    {
        $this->price_item = $price_item;
    }

    public function getQuantityItem()
    {
        return $this->quantity_item;
    }

    public function getIdItem()
    {
        return $this->id_item;
    }

    public function setQuantityItem($quantity_item)
    {
        $this->quantity_item = $quantity_item;
    }

    public function setIdItem($id_item)
    {
        $this->id_item = $id_item;
    }



    public function __construct($n, $p, $q, $i)
    {
        $this->name_item = $n;
        $this->price_item = $p;
        $this->quantity_item = $q;
        $this->id_item = $i;
    }



}