<?php include "includes/head.php" ?>
<body>
<section id="container">
<?php include "includes/header.php" ?>

    <div id="content">
        <div id="left">

            <div id="pizzamenu">
                <section class="pizza-menu-eintrag">
                    <div class="pizza-menu-eintrag-pic">
                        <img width="150" src="images/pizza1.jpg">
                    </div>
                    <div class="pizza-menu-eintrag-info">
                        <h2>Pizza 1</h2>
                        <p>Zutaten: Käse, Tomaten ...</p>
                    </div>
                     </section>
                <section class="pizza-menu-eintrag">
                    <div class="pizza-menu-eintrag-pic">
                        <img width="150" src="images/pizza1.jpg">
                    </div>
                        <div class="pizza-menu-eintrag-info">
                            <h2>Pizza 2</h2>
                        <p>Zutaten: Käse, Tomaten ...</p>
                    </div>
                </section>
                <section class="pizza-menu-eintrag">
                    <div class="pizza-menu-eintrag-pic">
                        <img width="150" src="images/pizza1.jpg">
                    </div>
                    <div class="pizza-menu-eintrag-info">
                        <h2>Pizza 3</h2>
                        <p>Zutaten: Käse, Tomaten ...</p>
                    </div>
                </section>
            </div>

        </div>
        <div id="right">

            <section id="warenkorb">
                <h1>Warenkorb</h1>
                <ul>
                    <li>Eintrag 1</li>
                    <li>Eintrag 2</li>
                    <li>Eintrag 3</li>
                </ul>

                <!-- Button zum loeschen-->
                <input type="reset" name="deleteall" value="Alle l&ouml;schen"/>
                <input type="reset" name="deleteselected" value="Auswahl l&ouml;schen"/>
                <fieldset>
                    <legend>Endbetrag </legend>
                    9,50 &euro;
                </fieldset>

                <fieldset>
                    <legend>Ihre Adressdaten </legend>
                    <label> <input type="text" id="nachname" name="Zuname" placeholder="Nachname" readonly/> </label>
                    <label>  <input type="text" id="Vorname" name="Vorname" placeholder="Vorname" readonly />  </label>
                    <label>   <input type="text" id="Strasse" name="Strasse" placeholder="Strasse und Hausnummer" readonly /> </label>
                    <label>   <input pattern="[0-9]{5}" type="text" id="plz" name="plz" title="F&uuml;nfstellige PLZ in Deutschland." placeholder="PLZ" readonly /> </label>
                    <label>   <input type="text" id="Ort" name="Ort" placeholder="Wohnort" readonly /> </label>
                    <label>   <input pattern="[0-9]{12}" id="Telefon" name="tel" placeholder="Mobiltelefon"  title="Zu kurze Handynummer" readonly /> </label>

                </fieldset>
                <!-- Bestellung abschicken-->
                <input type="submit" name="bestellen" value="Bestellung abschicken"/>


            </section>

        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
