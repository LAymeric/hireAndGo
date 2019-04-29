<?php
/**
 * Created by IntelliJ IDEA.
 * User: Aymeric
 * Date: 29/04/2019
 * Time: 14:35
 */

require_once '../class/Cart.php';
require_once '../head.php';



$unser = unserialize($_SESSION['Panier']);

$tab = '<table class="table table-bordered">
                    <thead style="background-color: rgb(91,192,222); color: #FFFFFF">
                        <tr>
                            <th>'.NAME.'</th>
                            <th>'.UNIT_PRICE.'</th>
                            <th>'.QUANTITY.'</th>
                            <th>'.TOTAL_PRICE.'</th>
                            <th>'.ACTION.'</th>
                        </tr>
                    </thead>';
$tab.='<tbody>';

$totalPrice = 0;

foreach ($unser->getItemList() as $value)
{
    $tab.='<tr>
                    <td>'.$value->getNameItem().'</td>
                    <td>'.$value->getPriceItem().'€</td>
                    <td><input type="number" min="1" value="'.$value->getQuantityItem().'" id="quantite'.$value->getIdItem().'" onchange="update('.$value->getIdItem().')"></td>
                    <td>'.$value->getQuantityItem()*$value->getPriceItem().'€</td>
                    <td><button class="btn btn-danger" onclick="del('.$value->getIdItem().')">'.DELETE.'</button></td>
                </tr>';
    $totalPrice+=$value->getQuantityItem()*$value->getPriceItem();
}

if ($unser->getNumberItem() == 0)
{
    $tab.='<tr><td colspan="5" style="text-align: center">Il n\'y a pas d\'articles</td></tr>';
}
if ($unser->getNumberItem() >0){
    $tab.='<tr>
            <td colspan="3" align="right">'.TOTAL_PRICE.' :</td>
            <td>'.$totalPrice.'€</td>
            <td><button class="btn btn-outline-dark" onclick="delAll()">'.DELETE_ALL.'</button></td>
       </tr>';
}


$tab.= '</tbody></table>';



echo $tab;

?>