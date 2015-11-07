<?php include "includes/head.php" ?>
<body>
<section id="container">
    <?php include "includes/header.php" ?>

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
                    <td> <input type = "radio" name="auswahl">
                        <br></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>

                </tr>

                <tr>
                    <td>  <label> Tonno </label></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>

                </tr>

                <tr>
                    <td>  <label> Salami </label></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>

                </tr>
            </table>

        </div>
        <div id="right">

            <section id="auftrag">
                <h1 id="header_right">Aufträge</h1>

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
