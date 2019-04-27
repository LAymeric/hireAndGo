<?php
ini_set("display_errors", 1);
$navbarItem = 'admin';
include "../head.php";
include "../navbar.php";
require_once __DIR__."./../functions.php";

?>
    <body style="margin-top: 150px">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-sm-auto">
                <h1><?php echo PRODUCT ?></h1>
                <p style="text-align: center">
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#productModal"><?php echo ADD_PRODUCT?></button>
                    <a href="admin.php" role="button" class="btn btn-info btn-lg"><?php echo RETURN_HOME_ADMIN?></a>
                </p>
                <?php
                $query = "SELECT * FROM product";
                $result = selectAll($query);
                echo "<table class='table table-bordered table-responsive'>";
                if ($result != null){
                    echo "<tr><th>".PICTURE."</th><th>".NAME."</th><th>".PRICE."</th><th>".QUANTITY."</th><th>".ACTION."</th></tr>";
                    foreach ($result as $value){
                        echo "<tr><th><img src='../picture/".$value["picture"]."' class='picture2'></th><th>".$value["name"]."</th><th>".$value["price"]."€</th><th>".$value["quantity"]."</th>";
                        echo "<th><a href='modifyInfomations.php?id=".$value["id"]."'>".MODIFY."</a>
                                <a href='../script/deleteProduct.php?id=".$value["id"]."'>".DELETE."</a></th>";
                        echo "</tr>";
                    }
                } else {
                    echo EMPTY_SPRODUCT;
                }
                echo "</table>" ?>
            </div>
        </div>
    </div>
    </body>
    <div class="vertical-spacer"></div>

    <!-- Modal -->
    <div id="productModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div classe="test">
                    <div class="modal-header">
                        <h4 class="modal-title" ><?php echo PRODUCT ?> </h4>
                    </div>
                    <div class="modal-body">
                        <form name="productForm" method="POST" action="../script/saveProduct.php" enctype="multipart/form-data">
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="name"><?php echo NAME; ?></label>
                                    <input type="text" class="form-control" name="name"  required="required">
                                    <div id="errorName" class="error" style="display: none"> <?php echo INVALID_NAME ?></div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="picture"><?php echo PICTURE; ?></label>
                                    <input type="file" class="form-control" name="picture"  required="required">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="price"><?php echo PRICE; ?></label>
                                        <input type="text" class="form-control" name="price"  required="required">
                                    </div>
                                </div>
                                <div class="col-sm-auto">€</div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="quantity"><?php echo QUANTITY; ?></label>
                                    <input type="number" class="form-control" name="quantity"  required="required">

                                </div>
                            </div>

                            <div class="form-group" style="text-align:center;">
                                <button type="submit" class="btn btn-secondary"><?php echo VALIDATE ?> </button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo CANCEL ?> </button>
                    </div>
                </div>

            </div>
        </div>

    </div>

<?php
include "../footer.php";
?>