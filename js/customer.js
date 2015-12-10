
var customerPage = new function CustomerPage(){

    this.items = [];

    this.updateLayout = function(response){
        alert(response);
        this.items = $.parseJSON(response);

        this.items.forEach(function(item){

        });

        };
    this.getData = function(orderId){
        var self = this;

        ajax = new XMLHttpRequest();
        if(ajax!=null){
            ajax.open("GET","checkorderstate.php",true);
            ajax.setRequestHeader("X-ORDERID", orderId);
            ajax.onreadystatechange = function(){
                if(this.readyState == 4){
                    if(this.status == 200){
                        self.updateLayout(this.responseText);
                    }
                    else{
                        alert(this.statusText);
                    }
                }
            };
            ajax.send(null);
        }
        else{
            alert("Ihr Browser unterstützt kein Ajax!");
        }
    };



};

customerPage.getData(1);