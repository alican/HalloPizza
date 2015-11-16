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


    ?>

    <div id="content">
        <div id="left">

            <table>
                <caption><h1 class="table-overview"> B&auml;cker&uuml;bersicht </h1> </caption>

                <tr>
                    <th> <!-- leere Spalte --> </th>
                    <th> bestellt </th>
                    <th> im Ofen </th>
                    <th> fertig </th>
                </tr>

                <tr>
                    <td>  <label> Margherita </label></td>
                    <td> <input type = "radio" name="01">
                        <br></td>
                    <td> <input type = "radio" name="01">
                        <br></td>
                    <td> <input type = "radio" name="01">
                        <br></td>
                </tr>

                <tr>
                    <td>  <label> Tonno </label></td>
                    <td> <input type = "radio" name="02">
                        <br></td>
                    <td> <input type = "radio" name="02">
                        <br></td>
                    <td> <input type = "radio" name="02">
                        <br></td>
                </tr>

                <tr>
                    <td>  <label> Salami </label></td>
                    <td> <input type = "radio" name="03">
                        <br></td>
                    <td> <input type = "radio" name="03">
                        <br></td>
                    <td> <input type = "radio" name="03">
                        <br></td>
                </tr>
            </table>

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

                <section class="pizza-auftrag">
                        <div class="pizza-warenkorb-eintrag-pic">
                            <img width="36" src="images/pizza1.jpg">
                        </div>
                    <div class="pizza-auftrag-info">
                        <h3>Bestellung 1</h3>

                    </div>


            </section>
                <section class="pizza-auftrag">
                    <div class="pizza-warenkorb-eintrag-pic">
                        <img width="36" src="images/pizza1.jpg">
                    </div>
                    <div class="pizza-auftrag-info">
                        <h3>Bestellung 2</h3>

                    </div>


                </section>
                <section class="pizza-auftrag">
                    <div class="pizza-warenkorb-eintrag-pic">
                        <img width="36" src="images/pizza1.jpg">
                    </div>
                    <div class="pizza-auftrag-info">
                        <h3>Bestellung 3</h3>

                    </div>


                </section>

        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
