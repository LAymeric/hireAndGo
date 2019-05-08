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
                <h1><a href="admin.php" role="button" class="btn  btn-lg btn-icone"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a><?php echo PRODUCT ?> <a role="button" class="btn  btn-lg btn-icone" data-toggle="modal" data-target="#productModal"><i class="fas fa-plus-circle fa-2x"></i></a></h1>
                <?php
                $query = "SELECT * FROM service";
                $result = selectAll($query);
                echo "<table class='table table-bordered table-responsive'>";
                if ($result != null){
                    echo "<tr class='myTable'><th>".PICTURE."</th><th>".NAME."</th><th>".PRICE."</th><th>".QUANTITY."</th><th>".ACTION."</th></tr>";
                    foreach ($result as $value){
                        echo "<tr><td><img src='../picture/".$value["picture"]."' class='picture2'></td><td>".$value["name"]."</td><td>".$value["price"]."€</td><td>".$value["quantity"]."</td>";
                        echo "<td><button class='btn btn-info btn-ls' onclick=document.location.href='modifyInfomations.php?id=".$value["id"]."'>".MODIFY."</button>
                                <button class='btn btn-danger btn-ls' onclick=document.location.href='../script/deleteProduct.php?id=".$value["id"]."'>".DELETE."</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo EMPTY_PRODUCT;
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

                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-group">
                                        <input type="checkbox" name="accompanist">
                                        <label for="accompanist"><?php echo SERVICE_ACCOMPANIST; ?></label>
                                    </div>
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