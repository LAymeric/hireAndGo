<?php
    ini_set("display_errors", 1);
    $navbarItem = 'admin';
    include "../head.php";
    include "../navbar.php";
    require_once __DIR__ . "./../class/Subscrpition.php";
    require_once __DIR__."./../class/Product.php";
    require_once __DIR__."./../class/User.php";
    require_once __DIR__."./../functions.php";

    $addressRefer = substr(strrchr($_SERVER["HTTP_REFERER"], '/'), 1);
    $addressRefer = substr($addressRefer, 0,strlen($addressRefer) - 4);
    switch ($addressRefer){

        case "member" :
            $member = new USER(null);
            $member->selectUser($_GET['id']);
            echo "<body style='padding-top: 100px'><form class='adminForm' action='../script/updateRigths.php' method='post'>";
            echo "<div class='row'>";
                echo "<div class='col-sm-12'>";
                    echo "<div class='form-group' style='text-align: center'>";
                        echo "<h4>".MEMBER."</h4><br>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-sm-4'>";
                    echo "<div class='form-group' >";
                        echo "<label>".FIRSTNAME.": "."</label>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='col-sm-4'>";
                    echo "<div class='form-group' >";
                        echo "<label>".$member->__get('firstname')."</label>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-sm-4'>";
                    echo "<div class='form-group'>";
                        echo "<label>".NAME.": "."</label>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='col-sm-4'>";
                    echo "<div class='form-group' >";
                        echo "<label>".$member->__get('lastname')."</label>";
                    echo "</div>";
                 echo "</div>";
            echo "</div>";
            echo "<div class='row'>";
                echo "<div class='col-sm-4'>";
                    echo "<div class='form-group'>";
                        echo "<input type='hidden' name='id' value='".$member->__get("id")."'>";
                            echo "<label>".TYPE." :</label><br>";
                            echo "</div>";
                            echo "</div>";
            echo "<div class='col-sm-4'>";
            echo "<div class='form-group'>";
                                echo "<select name='type'>";
                                    echo "<option value='FRONT'";
                                    if ($member->__get('type')){
                                        echo "selected='selected'";
                                    } else {
                                       echo "";
                                    }
                                    echo ">FRONT</option>";

                                    echo "<option value='ADMIN'";
                                    if ($member->__get('type')){
                                        echo "selected='selected'";
                                    } else {
                                        echo "";
                                    }
                                    echo ">ADMIN</option>";
                                echo "</select><br>";
                      echo "</div>";
                echo "</div>";
            echo "</div><br>";
            echo "<div class='row'>";
                echo "<div class='col-sm-12'>";
                    echo "<div class='form-group' style='text-align: center'>";

                        echo "<button type='submit' class=\"btn btn-info btn-lg\">".SAVE."</button>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
                echo "</form></body>";
            break;

        case "subscription":
            $subscription = new Subscrpition(null, null, null);
            $subscription->getSubscription($_GET['id']);
                echo "<body style='padding-top: 100px'><form class='adminForm' action='../script/updateSubscription.php' method='post'>";
                 echo "<div class='row'>";
                    echo "<div class='col-sm-12'>";
                        echo "<div class='form-group' style='text-align: center'>";
                            echo "<h4>".SUBSCRIPTION."</h4><br>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                    echo "<input type='hidden' name='id' value='".$subscription->__get("id")."'><br>";
                    echo "<div class='row'>";
                        echo "<div class='col-sm-4'>";
                            echo "<div class='form-group'>";
                                echo "<label>".NAME." :</label>";
                            echo "</div>";
                         echo "</div>";
                         echo "<div class='col-sm-4'>";
                            echo "<div class='form-group'>";
                                echo "<input type='text' name='name' value='".$subscription->__get("name")."'><br>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='row'>";
                        echo "<div class='col-sm-4'>";
                            echo "<div class='form-group'>";
                                echo "<label>".DESCRIPTION." :</label>";
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='col-sm-4'>";
                            echo "<div class='form-group'>";
                                echo "<input type='text' name='description' value='".$subscription->__get("description")."'><br>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='row'>";
                        echo "<div class='col-sm-4'>";
                            echo "<div class='form-group'>";
                                echo "<label>".PRICE." :</label>";
                             echo "</div>";
                        echo "</div>";
                        echo "<div class='col-sm-4'>";
                            echo "<div class='form-group'>";
                                echo "<input type='number' step='any' name='price' value='".$subscription->__get("price")."'><br>";
                             echo "</div>";
                         echo "</div>";
                    echo "</div>";
                    echo "<div class='row'>";
                        echo "<div class='col-sm-12'>";
                            echo "<div class='form-group' style='text-align: center'>";
                                echo "<button type='submit' class=\"btn btn-info btn-lg\">".SAVE."</button>";
                            echo "</div>";
                        echo "</div>";
                     echo "</div>";
                echo "</form></body>";
                break;

        case "product" :
            $product = new Product(null, null, null, null);
            $product->getProduct($_GET['id']);
            echo "<body style='padding-top: 100px'><form  class='adminForm' action='../script/updateProduct.php' method='post' enctype='multipart/form-data'>";
                echo "<div class='row'>";
                     echo "<div class='col-sm-12'>";
                         echo "<div class='form-group' style='text-align: center'>";
                            echo "<h4>".PRODUCT."</h4><br>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<input type='hidden' name='id' value='".$product->__get("id")."'><br>";

                 echo "<div class='row'>";
                    echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                            echo "<label>".NAME." :</label>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                            echo "<input type='text' name='name' value='".$product->__get("name")."'><br>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='row'>";
                    echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                            echo "<label>".PICTURE." :</label>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                            echo "<input id='file' type='file' class=\"input-file\" name='picture'><br>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='row'>";
                    echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                            echo "<label>".PRICE." :</label>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                            echo "<input type='number' step='any' name='price' value='".$product->__get("price")."'><br>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='row'>";
                    echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                            echo "<label>".QUANTITY." :</label>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='col-sm-4'>";
                        echo "<div class='form-group'>";
                            echo "<input type='number' name='quantity' value='".$product->__get("quantity")."'><br>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "<div class='row'>";
                    echo "<div class='col-sm-12'>";
                        echo "<div class='form-group' style='text-align: center'>";
                            echo "<button type='submit' class=\"btn btn-info btn-lg\">".SAVE."</button>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            echo "</form></body>";
            break;

        default:
            header("Location: admin.php");
            break;
    }
?>

<?php
    include "../footer.php";
?>
