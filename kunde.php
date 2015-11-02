<?php include "includes/head.php" ?>
<body>
<section id="container">
    <?php include "includes/header.php" ?>

    <div id="content">
        <div id="left">
            <h1>Kunde</h1>
            <table>
                <caption> <h1> Kunden&uuml;bersicht </h1> </caption>

                <tr>
                    <th> <!-- leere Spalte --> </th>
                    <th> bestellt </th>
                    <th> im Ofen </th>
                    <th> fertig </th>
                    <th> unterwegs </th>
                </tr>

                <tr>
                    <td>  <label> Margherita </label></td>
                    <td> <input type = "radio" name="auswahl">
                        <br></td>
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
                    <td> <input type = "radio" name="auswahl">
                        <br></td>

                </tr>
            </table>


        </div>
        <div id="right">

            <section id="warenkorb">
                <h1>Warenkorb</h1>
                <ul>
                    <li>Eintrag 1</li>
                    <li>Eintrag 2</li>
                    <li>Eintrag 3</li>
                </ul>
            </section>

        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
