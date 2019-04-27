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
                <?php
                $query = "SELECT id, name, firstname, email, birthday, city, country, address, phone, registration_date FROM member";
                $result = selectAll($query);
                echo "<table class='table table-bordered table-responsive'>";
                if ($result != null){
                    echo "<tr><th>".NAME."</th><th>".FIRSTNAME."</th><th>".EMAIL."</th>
                <th>".BIRTHDATE."</th><th>".TOWN."</th><th>".COUNTRY."</th>
                <th>".ADDRESS."</th><th>".PHONE."</th><th>".REGISTRATION."</th><th>Action</th></tr>";

                    foreach ($result as $value){

                        echo "<tr><th>".$value["name"]."</th><th>".$value["firstname"]."</th>
                <th>".$value["email"]."</th><th>".$value["birthday"]."</th>
                <th>".$value["city"]."</th><th>".$value["country"]."</th>
                <th>".$value["address"]."</th><th>".$value["phone"]."</th><th>".$value["registration_date"]."</th>
                <th><a href='modifyInfomations.php?id=".$value['id']."'>Changer les droits</a>
                <a href='deleteUser.php?id=".$value['id']."'>supprimer</a></th></tr>";
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
