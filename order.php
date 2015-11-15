<pre>
<?php

include "includes/db/db_connect.php";

$items = array();

foreach ($_POST as $key => $value) {
    if (strstr(htmlspecialchars($key), 'item')) {
        $k = str_replace('item-', '', $key);
        $items[$k] = htmlspecialchars($value);
    }
}

$address = htmlspecialchars($_POST["address"]);

$sql_insert_order = sprintf("
    BEGIN;
    INSERT INTO orders (address)
    VALUES (\"%s\");
    INSERT INTO order_items (item, `order`, quantity) VALUES",
    $address
    );

foreach($items as $k => $v) {
    $sql_insert_order .= sprintf("(%d, LAST_INSERT_ID(), %d),", $k, $v);
}

$sql_insert_order = rtrim($sql_insert_order, ',');
$sql_insert_order .= ";COMMIT;";

//echo $sql_insert_order;
$db->multi_query($sql_insert_order);

printf ("New Record has id %d.\n", $db->insert_id);



?>
</pre>