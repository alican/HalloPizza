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
                        <p class="price"> 7 &euro;</p>
                        <p class="zutaten">Zutaten: Käse, Tomaten ...</p>
                    </div>
                     </section>

                <section class="pizza-menu-eintrag">
                    <div class="pizza-menu-eintrag-pic">
                        <img width="150" src="images/pizza1.jpg">
                    </div>
                        <div class="pizza-menu-eintrag-info">
                            <h2>Pizza 2</h2>
                            <p class="price"> 7 &euro;</p>
                        <p class="zutaten">Zutaten: Käse, Tomaten ...</p>

                    </div>
                </section>
                <section class="pizza-menu-eintrag">
                    <div class="pizza-menu-eintrag-pic">
                        <img width="150" src="images/pizza1.jpg">
                    </div>
                    <div class="pizza-menu-eintrag-info">
                        <h2>Pizza 3</h2>
                        <p class="price"> 7 &euro;</p>
                        <p class="zutaten">Zutaten: Käse, Tomaten ...</p>
                    </div>
                </section>
            </div>

        </div>
        <div id="right">

            <section id="warenkorb">
                <h1 id="header_right">Warenkorb</h1>
                <section class="pizza-warenkorb-eintrag">
                    <div class="pizza-warenkorb-eintrag-pic">
                        <img width="36" src="images/pizza1.jpg">
                    </div>


                    <div class="pizza-warenkorb-eintrag-info">
                        <h3>Pizza 1</h3>
                        <p>Anzahl: <input type="number" min="0" max="99"></p>
                        <p class="pizza-warenkorb-eintrag-preis">
                            20,-
                        </p>
                    </div>




                </section>
                <section class="pizza-warenkorb-eintrag">
                    <div class="pizza-warenkorb-eintrag-pic">
                        <img width="36" src="images/pizza1.jpg">
                    </div>
                    <div class="pizza-warenkorb-eintrag-info">
                        <h3>Pizza 2</h3>
                        <p>Anzahl: <input type="number" min="0" max="99"></p>
                        <p class="pizza-warenkorb-eintrag-preis">
                            10,-
                        </p>
                    </div>
                </section>


                <!-- Button zum loeschen-->
                <input class="button" type="reset" name="deleteall" value="Alle l&ouml;schen"/>
                <input class="button" type="reset" name="deleteselected" value="Auswahl l&ouml;schen"/>
                <fieldset class="field">
                    <legend>Endbetrag </legend>

                    <p class="price">  9,50&nbsp;&euro;</p>
                </fieldset>

                <fieldset class="field">
                    <legend >Ihre Adressdaten </legend>
                    <label class="adress"> <input type="text" id="nachname" name="Zuname" placeholder="Nachname" /> </label>
                    <label class="adress">  <input type="text" id="Vorname" name="Vorname" placeholder="Vorname" />  </label>
                    <label class="adress">   <input type="text" id="Strasse" name="Strasse" placeholder="Strasse und Hausnummer" /> </label>
                    <label class="adress">   <input pattern="[0-9]{5}" type="text" id="plz" name="plz" title="F&uuml;nfstellige PLZ in Deutschland." placeholder="PLZ"  /> </label>
                    <label class="adress">   <input type="text" id="Ort" name="Ort" placeholder="Wohnort" /> </label>
                    <label class="adress">   <input pattern="[0-9]{12}" id="Telefon" name="tel" placeholder="Mobiltelefon"  title="Zu kurze Handynummer"  /> </label>

                </fieldset>
                <!-- Bestellung abschicken-->
                <input class="button" type="submit" name="bestellen" value="Bestellung abschicken"/>


            </section>

        </div>

    </div>
    <?php include "includes/footer.php" ?>
</section>

</body>
