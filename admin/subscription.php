<?php
    ini_set("display_errors", 1);
    include "../head.php";
    include "../navbar.php";
    require_once __DIR__."./../functions.php";

    $navbarItem = 'admin';
?>
<body style="margin-top: 150px">
<p>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#subscriptionModal">Ajouter abonnement</button>
</p>
<?php
    $query = "SELECT * FROM subscription";
    $result = selectAll($query);
    echo "<table>";
    if ($result != null){
        echo "<tr><th>".NAME."</th><th>".DESCRIPTION."</th><th>".PRICE."</th></tr>";

        foreach ($result as $value){
            echo "<tr><th>".$value["name"]."</th><th>".$value["description"]."</th><th>".$value["price"]."</th>";
            echo "<th><a href='modifyInfomations.php?id=".$value["id"]."'>Modifier</a></th>";
            echo "<th><button type='button' class='btn btn-info btn-lg'>Supprimer </button></th></tr>";
        }
    } else {
        echo "Il n'y aucun abonnement";
    }
    echo "</table>" ?>
</body>
    <div class="vertical-spacer"></div>

    <!-- Modal -->
    <div id="subscriptionModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div classe="test">
                    <div class="modal-header">
                        <h4 class="modal-title" ><?php echo SUBSCRIPTION ?> </h4>
                    </div>
                    <div class="modal-body">
                        <form name="subscriptionForm" method="POST" action="../script/saveSubscription.php" >
                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="name"><?php echo NAME; ?></label>
                                    <input type="text" class="form-control" name="name"  required="required">
                                    <div id="errorName" class="error" style="display: none"> <?php echo INVALID_NAME ?></div>
                                </div>
                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <label for="description"><?php echo DESCRIPTION; ?></label>
                                    <input type="text" class="form-control" name="description"  required="required">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="price"><?php echo PRICE; ?></label>
                                        <input type="text" class="form-control" name="price"  required="required">

                                    </div>
                                </div>

                                <div class="col-sm-auto">
                                    <h4>€</h4>
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