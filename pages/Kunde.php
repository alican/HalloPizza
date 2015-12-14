<?php	// UTF-8 marker äöüÄÖÜß€

// page "Startseite"

require_once "./blocks/BearbeiteBestellung.php";

class Kunde extends Page
{
    // building blocks
    private $bearbeiteBestellung = null;


    public function __construct() {
        parent::__construct();
        $this->bearbeiteBestellung = new BearbeiteBestellung($this);
    }

    protected function getContentData() {

        $orderId = $this->model->getTransientData("orderId", 0);
        if ($orderId != 0){
            $items = $this->model->getItemsByOrderId($orderId);
            return $items;
        }
        $orderId = $this->model->getOrderId();

        if ($orderId != 0){
            $this->model->setTransientData("orderId", $orderId);
            $items = $this->model->getItemsByOrderId($orderId);
            return $items;
        }
        return [];
    }

    protected function view_getPageTitle() {
        return 'Bestellübersicht';
    }

    protected function view_generatePageContent() {
        echo $this->model->twig->render('Kunde.html', array(
                'messages' => $this->model->getMessages(),
                'items'=> $this->getContentData(),
                'orderid' =>$this->model->getTransientData("orderId", 0),
                'page_title'=> $this->view_getPageTitle())
        );
    }

    public function controller_processReceivedData() {
        $this->bearbeiteBestellung->controller_processReceivedData();    }
}
