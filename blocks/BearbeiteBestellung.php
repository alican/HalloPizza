<?php	// UTF-8 marker äöüÄÖÜß€

// form blocks have the advantage, that generation and processing of the form
// is located within the same class, even if both happens on different pages

class BearbeiteBestellung extends Form
{
    public function __construct(Page $parent) {
        parent::__construct($parent, "Result", true);
    }

    protected function controller_processReceivedForm() {
        if ($_POST){
            $items = array();
            foreach ($_POST as $key => $value) {
                if (strstr(htmlspecialchars($key), 'item')) {
                    $k = str_replace('item-', '', $key);
                    $v = htmlspecialchars($value);
                    if ($v > 0){
                        $items[$k] = htmlspecialchars($v);
                    }
                }
            }
            $address = htmlspecialchars($_POST["address"]);
            if (empty($items) || empty($address)){
                $this->model->setMessage("Die Bestellung beinhaltet unvollständige Daten.", "error");
            }else{
                $orderID = $this->model->saveOrder($address, $items);
                $this->model->setOrderId($orderID);
                return $orderID;
            }
        }
        return 0;
    }
}
