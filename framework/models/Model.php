<?php	// UTF-8 marker äöüÄÖÜß€

// This class represents the data model of the Model-View-Controller architecture.
// It encapsulates the database, the session variables and the transient variables.
// The page classes should access model data only via this class.
// This class can be subclassed, e.g. in order to create page-specific models.

require_once "./framework/ModelCore.php";
require_once('./vendor/twig/twig/lib/Twig/Autoloader.php');
Twig_Autoloader::register();


class Model {

    private $loader = null;
    public $twig = null;
    private $modelCore      = null;

    public function __construct() {
        $this->modelCore = ModelCore::getInstance();
        $this->loader = new Twig_Loader_Filesystem('templates');
        $this->twig = new Twig_Environment($this->loader, array(
            // 'cache' => 'cache',
        ));
    }

    // ---------- access to transient data ----------
    public function getTransientData($name, $default = null) {
        return $this->modelCore->getTransientData($name, $default);
    }

    public function setTransientData($name, $value) {
        $this->modelCore->setTransientData($name, $value);
    }


    public function getMessages() {
        return $this->modelCore->getTransientData("messages", []);
    }

    public function setMessage($text, $type ) {


        $message = array(
            "text"  => $text,
            "type"  => $type
        );
        $messages = array($message);

        $this->modelCore->setTransientData("messages", $messages);
    }


    // ---------- access to persistent session data ----------
    public function sessionDataAvailable() {
        return $this->modelCore->isLoggedIn();
    }

    public function getUser() {
        return $_SESSION['user'];
    }

    public function setVisitedPages($visitedpages) {
        $_SESSION['visitedpages'] = $visitedpages;
    }

    public function getVisitedPages() {
        return isset($_SESSION['visitedpages']) ? $_SESSION['visitedpages'] : 0;
    }

    public function setOrderId($orderId) {
        $_SESSION['orderId'] = $orderId;
    }

    public function getOrderId() {
        return isset($_SESSION['orderId']) ? $_SESSION['orderId'] : 0;
    }


    // ---------- access to persistent global data ----------


    public function getOrders($finished = false) { /* string[] */
        if ($finished){
            //Fahrer
            $SQLabfrage = "SELECT * FROM orders
WHERE orderid NOT IN (SELECT `order` FROM order_items WHERE state NOT BETWEEN 2 AND 3 )
ORDER BY ordered LIMIT 20;";
        }else{
            //Baecker
            $SQLabfrage = "SELECT * FROM orders
WHERE orderid IN (SELECT `order` FROM order_items WHERE state < 2 )
ORDER BY ordered LIMIT 99;";
        }
        $Recordset = $this->modelCore->query ($SQLabfrage);
        if (!$Recordset)
            throw new Exception($this->modelCore->error."\r\n".$SQLabfrage);

        $Orders = array();

        // variant 1: move selected records to array of strings
        while ($row = $Recordset->fetch_assoc()) {
            $Orders[] = $row;
        }
        $Recordset->free();
        return $Orders;
    }

    public function getItems() { /* string[] */
        $SQLabfrage = "SELECT * FROM `items`";

        $Recordset = $this->modelCore->query ($SQLabfrage);
        if (!$Recordset)
            throw new Exception($this->modelCore->error."\r\n".$SQLabfrage);

        $Items = array();

        // variant 1: move selected records to array of strings
        while ($row = $Recordset->fetch_assoc()) {
            $Items[] = $row;
        }
        $Recordset->free();
        return $Items;
    }

    public function getItemsByOrderId($orderID) {

        $SQLabfrage = sprintf("
            SELECT i.name,
                   i.picture,
                   i.price,
                   i.ingredients,
                   i.itemid,
                   oi.quantity,
                   oi.orderitemid,
                   oi.state
            FROM order_items oi
            JOIN items i ON oi.item = i.itemid
            WHERE oi.order = %s;",
            $orderID
        );

        $Recordset = $this->modelCore->query ($SQLabfrage);
        if (!$Recordset)
            throw new Exception($this->modelCore->error."\r\n".$SQLabfrage);

        $Items = array();

        // variant 1: move selected records to array of strings
        while ($row = $Recordset->fetch_assoc()) {
            $Items[] = $row;
        }
        $Recordset->free();
        return $Items;
    }

    public function updateItems($items) {
        foreach($items as $k => $v) {
            $sql_update_orders = sprintf("UPDATE `order_items` SET `state`= %s, `updated`=now() WHERE `orderitemid`= %s;", $v, $k);

            $this->modelCore->query($sql_update_orders);
        }
        $this->setMessage("Status wurde aktualisiert", "info");


    }


        public function saveOrder($address, $items) {

        $sql_insert_order = sprintf("
    INSERT INTO orders (address)
    VALUES (\"%s\");",
            $address
        );

        $this->modelCore->query($sql_insert_order);
        $orderId = $this->modelCore->insert_id;

        $sql_insert_order_item = "INSERT INTO order_items (item, `order`, quantity) VALUES ";

        foreach($items as $k => $v) {
            $sql_insert_order_item .= sprintf("(%d, %d, %d),", $k, $orderId, $v);
        }

        $sql_insert_order_item = rtrim($sql_insert_order_item, ',');
        $sql_insert_order_item .= ";";

        $result = $this->modelCore->query($sql_insert_order_item);
        if (!$result)
            throw new Exception($this->modelCore->error."\r\n".$result);

        $this->modelCore->store_result();
        $this->setMessage("Bestellung wurde aufgenommen", "info");

            /* free result */
        //$this->modelCore->free_result();
       // $this->modelCore->close();
        //$this->modelCore = null;

        $this->modelCore->setTransientData("orderId", $orderId);

        return $orderId;
    }
}
