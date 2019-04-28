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
            <div class="col-sm-12">
                <h1><a href="admin.php" role="button" class="btn  btn-lg btn-return"><i class="far fa-arrow-alt-circle-left fa-2x"></i></a><?php echo " ".MEMBER?></h1>

                <?php
                $query = "SELECT id, name, firstname, email, birthday, city, country, address, phone, registration_date , type FROM member";
                $result = selectAll($query);
                echo "<table class='table table-bordered table-responsive'>";
                if ($result != null){
                    echo "<tr class='col-sm-auto'><th>".NAME."</th><th>".FIRSTNAME."</th><th>".EMAIL."</th>
                <th>".BIRTHDATE."</th><th>".TOWN."</th><th>".COUNTRY."</th>
                <th>".ADDRESS."</th><th>".PHONE."</th><th>".REGISTRATION."</th><th>".TYPE."</th><th>Action</th></tr>";

                    foreach ($result as $value){

                        echo "<tr class='col-sm-auto'><td>".$value["name"]."</td><td>".$value["firstname"]."</td>
                <td>".$value["email"]."</td><td>".$value["birthday"]."</td>
                <td>".$value["city"]."</td><td>".$value["country"]."</td>
                <td>".$value["address"]."</td><td>".$value["phone"]."</td><td>".$value["registration_date"]."</td>
                <td>".$value["type"]."</td>
                <td><a href='modifyInfomations.php?id=".$value['id']."'>".CHANGE_RIGTHS."</a>
                <a href='deleteUser.php?id=".$value['id']."'>".DELETE."</a></td></tr>";
                    }
                }
                echo "</table>" ?>
            </div>
        </div>
    </div>
</body>
<?php
    include "../footer.php";
?>
