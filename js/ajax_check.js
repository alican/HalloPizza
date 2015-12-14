var checker = new function Checker() {
    this.response_data = [];
    var self = this;

    this.update = function(order_id){
    location.reload();
    };

    this.compare = function(){
        for (var i = 0; i < self.response_data.length; i++) {
            if(self.response_data[i].updated > items[i].updated){
                self.update(i);
            }
        }
    };

    this.check = function(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                self.response_data = JSON.parse(xhttp.responseText);
                self.compare();
            }
        };
        xhttp.open("GET", "/index.php?page=Ajax&order=" + orderId, true);
        xhttp.send();
    };

    this.start = function(){
      if(orderId > 0){
          setInterval(function() { self.check() }, 3000);
      }

    };

    this.start();
};