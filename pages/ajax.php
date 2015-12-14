<?php	// UTF-8 marker äöüÄÖÜß€

require_once "./blocks/GetStatus.php";

class Ajax extends Page
{

    private $GetStatus = null;

    public function __construct() {
        parent::__construct();
        $this->GetStatus = new GetStatus($this);
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
        return '';
    }

    protected function view_generatePageContent() {
        $items =  $this->getContentData();
        echo json_encode($items);
    }

    public function controller_processReceivedData() {
        $this->GetStatus->controller_processReceivedData();
    }
}
