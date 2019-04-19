<?php
    ini_set("display_errors", 1);
    include "../head.php";
    include "../navbar.php";
    require_once __DIR__."./../class/Subcrpition.php";
    require_once __DIR__."./../functions.php";

    $navbarItem = 'admin';
    $addressRefer = substr(strrchr($_SERVER["HTTP_REFERER"], '/'), 1);
    $addressRefer = substr($addressRefer, 0,strlen($addressRefer) - 4);
    switch ($addressRefer){

        case "member" :
            break;

        case "subscription":
            $subscription = new Subcrpition(null, null, null);
            $subscription->getSubscription($_GET['id']);
                echo "<body style='padding-top: 100px'><form action='../script/updateSubscription.php' method='post'>";
                    echo "<label>".SUBSCRIPTION."</label><br>";
                    echo "<input type='hidden' name='id' value='".$subscription->__get("id")."'><br>";
                    echo "<label>".NAME." :</label> <input type='text' name='name' value='".$subscription->__get("name")."'><br>";
                    echo "<label>".DESCRIPTION." :</label> <input type='text' name='description' value='".$subscription->__get("description")."'><br>";
                    echo "<label>".PRICE." :</label> <input type='text' name='price' value='".substr($subscription->__get("price"), 0, strlen($subscription->__get("price")) - 1)."'><br>";
                    echo "<button type='submit'>Enregistrer</button>";
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
