<?php include "includes/head.php" ?>
<body>
<section id="container">
    <?php include "includes/header.php" ?>

    <div id="content">
        <div id="left">
            <h1>B&auml;cker</h1>
            <h2></h2>
            <table>
                <caption>Bestell-Status</caption>

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

            <section id="warenkorb">
                <h1>Bestellungen</h1>
                <ul>
                    <li>Bestellung 1</li>
                    <li>Bestellung 2</li>
                    <li>Bestellung 3</li>
                </ul>
            </section>

        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
