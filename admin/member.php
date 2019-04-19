<?php
    ini_set("display_errors", 1);
    include "../head.php";
    include "../navbar.php";
    require_once __DIR__."./../functions.php";


    $navbarItem = 'admin';
?>
<body style="margin-top: 150px">
    <?php
    $query = "SELECT name, firstname, email, birthday, city, country, address, phone, registration_date FROM member";
    $result = selectAll($query);
    echo "<table>";
    if ($result != null){
        echo "<tr><th>".NAME."</th><th>".FIRSTNAME."</th><th>".EMAIL."</th>
                <th>".BIRTHDATE."</th><th>".TOWN."</th><th>".COUNTRY."</th>
                <th>".ADDRESS."</th><th>".PHONE."</th><th>".REGISTRATION."</th></tr>";

        foreach ($result as $value){

            echo "<tr><th>".$value["name"]."</th><th>".$value["firstname"]."</th>
                <th>".$value["email"]."</th><th>".$value["birthday"]."</th>
                <th>".$value["city"]."</th><th>".$value["country"]."</th>
                <th>".$value["address"]."</th><th>".$value["phone"]."</th><th>".$value["registration_date"]."</th></tr>";
        }
    }
     echo "</table>" ?>
</body>
<?php
    include "../footer.php";
?>
