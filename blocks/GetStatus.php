<?php	// UTF-8 marker äöüÄÖÜß€

// form blocks have the advantage, that generation and processing of the form
// is located within the same class, even if both happens on different pages

class GetStatus extends Form
{
    public function __construct(Page $parent) {
        parent::__construct($parent, "Result", true);
    }

    protected function controller_processReceivedForm() {
        if (isset($_GET['order'])){
            $orderID = htmlspecialchars($_GET["order"]);
            $this->model->setTransientData("order", $orderID);
            return $orderID;
        }
        return 0;
    }


}
