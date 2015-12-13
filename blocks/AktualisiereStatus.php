<?php	// UTF-8 marker äöüÄÖÜß€

// form blocks have the advantage, that generation and processing of the form
// is located within the same class, even if both happens on different pages

class AktualisiereStatus extends Form
{
    public function __construct(Page $parent) {
        parent::__construct($parent, "Result", true);
    }

    protected function controller_processReceivedForm() {
        if($_POST){
            $items = array();
            foreach ($_POST as $key => $value) {
                if (strstr(htmlspecialchars($key), 'item')) {
                    $k = str_replace('item-', '', $key);
                    $items[$k] = htmlspecialchars($value);
                }
            }
            $this->model->updateItems($items);
        }

        if (isset($_GET['order'])){
            $orderID = htmlspecialchars($_GET["order"]);
            $this->model->setTransientData("order", $orderID);
            return $orderID;
        }else{
            $this->model->setMessage("Bitte wählen Sie rechts aus der Liste eine Bestellung aus", "info");
        }
        return 0;
    }


}
