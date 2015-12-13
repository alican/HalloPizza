/**
 * Created by alican on 14.11.2015.
 */

function Item(id, name, price){
    this.id = id;
    this.name = name;
    this.price = price;
    this.quantity = 1;

    this.getPrice = function(){
        return this.price * this.quantity;
    }
}

var basket = new function Basket(){
    this.items = [];
    this.addItem = function(newItem){
        var inserted = false;
        this.items.forEach(function(item){
            if(newItem.id == item.id){
                item.quantity++;
                inserted = true;
            }
        });
        if (!inserted){
            this.items.push(newItem);
        }
    };
    this.getTotalprice = function(){
        var totalprice = 0;
        this.items.forEach(function(item){
            totalprice += (item.price * item.quantity);
        });
        return totalprice;
    };

    this.deleteAll = function(){
        this.items = [];
        this.drawBasket();
    };

    this.deleteItem = function(id){

        for (var i = 0; i < this.items.length; i++){
            if (this.items[i].id == id){
                if (i > -1) {
                    this.items.splice(i, 1);
                }
            }
        }
        this.drawBasket();
    };

    this.drawBasket = function(){
        var self = this;
        // Im HTML-Dokument befindet sich ein verstecktes section template.
        // das wird zuerst gesucht,
        var template = document.querySelector('#basketrow_template');
        // hier wird der Warenkorb gesucht, in den alle Einträge gespeichert werden,
        // und danach der Inhalt geleert.
        var warenkorb = document.querySelector("#basket-entries");
        var totalprice = document.querySelector("#totalprice span");

        if (this.items.length < 1){
            warenkorb.innerHTML = "<p>Warenkorb ist leer.<br> Klicken Sie auf eine Pizza um sie in den Warenkorb zu legen.</p>";
        }else{
            warenkorb.innerHTML = "";
            this.items.forEach(function(item){
                // In der Basket-Klasse werden alle Items durchsucht und für jeden
                // Eintrag wird eine Kopie des templates erstellt.
                var itemNode = document.importNode(template, true);

                itemNode.dataset.id = item.id;

                var deleteButton = itemNode.querySelector(".deleteButton");

                deleteButton.addEventListener("click", function(){
                    self.deleteItem(item.id);
                });
                // dann wird von dieser Kopie die ID "#basketrow_template" entfernt,
                // damit es durch die CSS-Angabe nicht mehr hidden ist.
                itemNode.removeAttribute("id");

                itemNode.querySelector(".pizza-warenkorb-eintrag-info h3").innerHTML = item.name;
                var inputQuantity = itemNode.querySelector(".pizza-warenkorb-eintrag-info input");
                inputQuantity.value = item.quantity;

                // Erstellt ein verstecktes input field
                // Beispiel: <input type="hidden" name="item-1" value="1" />
                // damit man beim abschicken des Formulars die IDs und Anzahl der Pizzen mitschicken kann.
                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "item-" + item.id;
                input.value = item.quantity;
                itemNode.appendChild(input);

                // Beim ändern der Anzahl-Inputs wird der Wert im Item-Object angepasst und
                // das Warenkorb neu aufgebaut.
                inputQuantity.addEventListener("change", function(){
                    item.quantity = inputQuantity.value;
                    basket.drawBasket();

                });
                itemNode.querySelector(".pizza-warenkorb-eintrag-preis span").innerHTML = item.getPrice();

                warenkorb.appendChild(itemNode);
            });
        }
        totalprice.innerHTML = self.getTotalprice();

    };
};

function addTOCart(elm){
    // wenn vorhanden

    basket.addItem(new Item(
        elm.dataset.id,
        elm.dataset.name,
        elm.dataset.price
    ));

    basket.drawBasket();
}

function  deleteAll(){
    basket.deleteAll();
}
