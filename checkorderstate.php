<?php
/**
 * Created by PhpStorm.
 * User: alican
 * Date: 30.11.2015
 * Time: 11:26
 */

include "includes/db/db_connect.php";

if (isset($_COOKIE["orderID"])) {
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

$out = array_values($results);
echo json_encode($out);
