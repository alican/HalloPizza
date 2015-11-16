<?php include "includes/head.php" ?>
<body>
<div id="container">
<?php include "includes/header.php" ?>

<?php
    require_once('vendor/twig/twig/lib/Twig/Autoloader.php');
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('views');
    $twig = new Twig_Environment($loader, array(
       // 'cache' => 'cache',
    ));

    include "includes/db/db_connect.php";

?>
    <div id="content">
        <div id="left">

            <div id="pizzamenu">

                <?php
                if(!$result = $db->query($sql_select_items)){
                    die('There was an error running the query [' . $db->error . ']');
                }

                while($row = $result->fetch_assoc()){

                    $results[] = $row;
                }
                echo $twig->render('pizza-menu-item.html', array('queryResult'=> $results));

                mysqli_close($db)
                ?>

            </div>

        </div>
        <div id="right">
            <h1 id="header_right">Warenkorb</h1>
            <div id="warenkorb">
                <form action="kunde.php" method="post">

                <div id="basket-entries">
                    <p>Warenkorb ist leer.<br> Klicken Sie auf eine Pizza um sie in den Warenkorb zu legen.</p>
                </div>

                <!-- Button zum loeschen-->
                <input class="button" type="reset" name="deleteall" value="Alle l&ouml;schen"/>
                <input class="button" type="reset" name="deleteselected" value="Auswahl l&ouml;schen"/>
                <fieldset class="field">
                    <legend>Endbetrag </legend>
                    <p id="totalprice"><span>9,50</span>&nbsp;&euro;</p>
                </fieldset>

                <fieldset class="field">
                    <legend >Ihre Adressdaten </legend>
                    <label class="address">
                        <input type="text" id="address" name="address" placeholder="Anschrift" />
                    </label>
                </fieldset>
                <!-- Bestellung abschicken-->
                <input class="button" type="submit" name="bestellen" value="Bestellung abschicken"/>
                </form>

            </div>

        </div>

    </div>
    <?php include "includes/footer.php" ?>
</div>

<section id="basketrow_template" class="pizza-warenkorb-eintrag">
    <div class="pizza-warenkorb-eintrag-pic">
        <img width="36" src="images/pizza1.jpg">
    </div>
    <div class="pizza-warenkorb-eintrag-info">
        <h3>Pizza 1</h3>
        <p>Anzahl: <input name="quantity" type="number" min="0" max="99"></p>
        <p class="pizza-warenkorb-eintrag-preis">
            <span>20</span>&nbsp;€
        </p>
    </div>
</section>
<script type="text/javascript" src="js/main.js"></script>
</body>
