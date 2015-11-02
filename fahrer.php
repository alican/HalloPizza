<?php include "includes/head.php" ?>
<body>
<section id="container">
    <?php include "includes/header.php" ?>

    <div id="content">
        <div id="left">
            <h1>Fahrer</h1>

            <section class="fahrer-kunden-eintrag">
                <p>
                    Nachname, Adresse ( Strasse - Wohnort)
                <p>
                <p><b>Pizzen: </b>Tonno, Calzone ...</p>
                <p><b>Gesamtpreis: </b> 20,- Euro</p>

                <table>
                    <tr>
                        <th> gebacken</th>
                        <th> unterwegs</th>
                        <th> ausgeliefert</th>
                    </tr>
                    <tr>
                        <td> <input type = "radio" name="auswahl">
                            <br></td>
                        <td> <input type = "radio" name="auswahl">
                            <br></td>
                        <td> <input type = "radio" name="auswahl">
                            <br></td>
                    </tr>
                </table>
            </section>


        </div>
        <div id="right">

            <h1>Bestellungen</h1>
            <ul>
                <li>Bestellung 1</li>
                <li>Bestellung 2</li>
                <li>Bestellung 3</li>
            </ul>
        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
