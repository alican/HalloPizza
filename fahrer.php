<?php include "includes/head.php" ?>
<body>
<section id="container">
    <?php include "includes/header.php" ?>

    <div id="content">
        <div id="left">


            <section class="fahrer-kunden-eintrag">
                <p>
                    Nachname, Adresse ( Strasse - Wohnort)
                <p>
                <p>Pizzen: Tonno, Calzone ...</p>
                <p>Gesamtpreis: 20,- Euro</p>

                <table>
                    <tr>
                        <th> gebacken</th>
                        <th> unterwegs</th>
                        <th> ausgeliefert</th>
                    </tr>
                    <tr>
                        <td> <input type = "radio" name="01">
                            <br></td>
                        <td> <input type = "radio" name="01">
                            <br></td>
                        <td> <input type = "radio" name="01">
                            <br></td>
                    </tr>
                </table>
            </section>

            <section class="fahrer-kunden-eintrag">
                <p>
                    Nachname, Adresse ( Strasse - Wohnort)
                <p>
                <p>Pizzen: Tonno, Calzone ...</p>
                <p>Gesamtpreis: 20,- Euro</p>

                <table>
                    <tr>
                        <th> gebacken</th>
                        <th> unterwegs</th>
                        <th> ausgeliefert</th>
                    </tr>
                    <tr>
                        <td> <input type = "radio" name="02">
                            <br></td>
                        <td> <input type = "radio" name="02">
                            <br></td>
                        <td> <input type = "radio" name="02">
                            <br></td>
                    </tr>
                </table>
            </section>


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

            </section>
        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
