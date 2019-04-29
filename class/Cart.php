<?php
/**
 * Created by IntelliJ IDEA.
 * User: Smoothie
 * Date: 29/04/2019
 * Time: 14:40
 */

require_once 'Item.php';

class Cart
{
    private $item_list = array();
    private $number_item;

    public function __construct()
    {
        $this->number_item = 0;
    }


    public function addItem($n, $p, $q, $i)
    {
        $product = new Item($n, $p, $q, $i);

        foreach ($this->item_list as $item)
        {
            if ($product->getIdItem() == $item->getIdItem())
            {
                $item->setQuantityItem($q + $item->getQuantityItem()) ;
                return false;
            }
        }

        array_push($this->item_list,$product);

        $this->number_item++;

        return true;
    }

    public function delItem($i)
    {
        foreach ($this->item_list as $item => $val)
        {
            if ($val->getIdItem() == $i )
            {
                unset($this->item_list[$item]);
                $this->number_item--;
                return true;
            }
        }
        return false;
    }

    public function deleteAll()
    {
        foreach ($this->item_list as $item => $val)
        {
            unset($this->item_list[$item]);
        }

        $this->number_item = 0;
        return true;
    }

    public function updateItem($q, $i)
    {
        foreach ($this->item_list as $item)
        {
            if ($item->getIdItem() == $i)
            {
                $item->setQuantityItem($q) ;
                return true;
            }
        }
        return false;
    }

    public function getNumberItem()
    {
        return $this->number_item;
    }


    public function getItemList()
    {
        return $this->item_list;
    }
}