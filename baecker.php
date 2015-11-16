<?php include "includes/head.php" ?>
<body>
<section id="container">
    <?php include "includes/header.php" ?>

    <?php

    require_once('vendor/twig/twig/lib/Twig/Autoloader.php');
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader, array(
        // 'cache' => 'cache',
    ));

    include "includes/db/db_connect.php";

    $sql_fetch_orders = "SELECT * FROM orders ORDER BY -ordered LIMIT 10;";

    $orders = [];

    if (isset($_GET["order"])){
        $orderID = htmlspecialchars($_GET["order"]);

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
            $orders[] = $row;
        }
    }



    ?>

    <div id="content">
        <div id="left">
            <form action="baecker.php" method="post">

            <?php
            echo $twig->render('baecker-order-view.html', array('queryResult'=> $orders));
            ?>
                <input type="submit" name="speichern" value="speichern" />
            </form>



        </div>
        <div id="right">

            <section id="auftrag">
                <h1 id="header_right">Aufträge</h1>
                <?php
                if(!$result = $db->query($sql_fetch_orders)){
                die('There was an error running the query [' . $db->error . ']');
                }

                while($row = $result->fetch_assoc()){

                $results[] = $row;
                }
                echo $twig->render('order-list.html', array('queryResult'=> $results));
                ?>

        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
