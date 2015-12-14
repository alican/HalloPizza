<?php	// UTF-8 marker äöüÄÖÜß€

require_once "./blocks/AktualisiereStatus.php";

class Fahrer extends Page
{
    private $aktualisiereStatus = null;

    public function __construct() {
        parent::__construct();
        $this->aktualisiereStatus = new AktualisiereStatus($this);
    }

    protected function getContentData() {

        $orderId = $this->model->getTransientData("order", 0);
        if ($orderId != 0){
            $items = $this->model->getItemsByOrderId($orderId);
            return $items;
        }
        return [];
    }

    protected function view_getPageTitle() {
        return 'Fahrer';
    }

    protected function view_generatePageContent() {
        echo $this->model->twig->render('Fahrer.html', array(
                'messages' => $this->model->getMessages(),
                'items'=> $this->getContentData(),
                'orderid' =>$this->model->getTransientData("order", 0),
                'orders'=> $this->model->getOrders(true),
                'page_title'=> $this->view_getPageTitle())
        );
    }

    public function controller_processReceivedData() {
        $this->aktualisiereStatus->controller_processReceivedData();
    }
}
