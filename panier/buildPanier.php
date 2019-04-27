<?php

require_once '../class/Panier.php';

session_start();

$unser = unserialize($_SESSION['Panier']);

$tab = '<table class="table table-bordered">
                    <thead style="background-color: rgb(91,192,222)">
                        <tr>
                            <th>Nom</th>
                            <th>Prix unitaire</th>
                            <th>Quantité</th>
                            <th>Prix total</th>
                            <th>Action</th>
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
                    <td><button class="btn btn-danger" onclick="del('.$value->getIdItem().')">Supprimer</button></td>
                </tr>';
    $totalPrice+=$value->getQuantityItem()*$value->getPriceItem();
}

if ($unser->getNumberItem() == 0)
{
    $tab.='<tr><td colspan="5" style="text-align: center">Il n\'y a pas d\'articles</td></tr>';
}
if ($unser->getNumberItem() >0){
$tab.='<tr>
            <td colspan="3" align="right">Prix total :</td>
            <td>'.$totalPrice.'</td>
            <td><button class="btn btn-outline-dark" onclick="delAll()">Tout supprimer</button></td>
       </tr>';
}


$tab.= '</tbody></table>';



echo $tab;

?>