<?php
require_once('vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    // 'cache' => 'cache',
));

include "includes/db/db_connect.php";

$results = [];

$message = "";

$orderID = -1;

if($_POST) {

    $items = array();

    $message = "Neue Bestellung";

    foreach ($_POST as $key => $value) {
        if (strstr(htmlspecialchars($key), 'item')) {
            $k = str_replace('item-', '', $key);
            $items[$k] = htmlspecialchars($value);
        }
    }

    $address = htmlspecialchars($_POST["address"]);


    $sql_insert_order = sprintf("
    INSERT INTO orders (address)
    VALUES (\"%s\");
    INSERT INTO order_items (item, `order`, quantity) VALUES",
        $address
    );

    foreach($items as $k => $v) {
        $sql_insert_order .= sprintf("(%d, LAST_INSERT_ID(), %d),", $k, $v);
    }

    $sql_insert_order = rtrim($sql_insert_order, ',');
    $sql_insert_order .= ";";

    //echo $sql_insert_order;
    $db->multi_query($sql_insert_order);

    $orderID = $db->insert_id;

    setcookie("orderID", $orderID);

} else{
if ($orderID < 0 || isset($_COOKIE["orderID"])){
        if ($orderID < 0){
            $orderID = $_COOKIE["orderID"];
        }

    $fetch_order = sprintf("
            SELECT i.name,
                   i.picture,
                   i.price,
                   i.ingredients,
                   i.itemid,
                   oi.quantity,
                   oi.orderitemid,
                   oi.state
            FROM order_items oi
            JOIN items i ON oi.item = i.itemid
            WHERE oi.order = %s;",
            $orderID
        );

        if(!$result = $db->query($fetch_order)){
            die('There was an error running the query [' . $db->error . ']');
        }

        while($row = $result->fetch_assoc()){
            $results[] = $row;
        }

        mysqli_close($db);
}
}

?>

<?php include "includes/head.php" ?>
<body>
<section id="container">
    <?php include "includes/header.php" ?>

    <div id="content">
        <div id="left">
            <?php echo $twig->render('costumer-order-view.html', array('queryResult'=> $results, '$message' => $message)); ?>
        </div>
        <div id="right">
        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
