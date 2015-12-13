<?php	// UTF-8 marker äöüÄÖÜß€

// page "Startseite"


class Startpage extends Page
{
    public function __construct() {
        parent::__construct();
    }

    protected function view_getPageTitle() {
        return 'Startseite';
    }

    protected function view_generatePageContent() {
        echo $this->model->twig->render('Startpage.html', array(
            'items'=>   $this->model->getItems(),
            'page_title'=> $this->view_getPageTitle())
        );
    }

    public function controller_processReceivedData() {
      //  $this->block_formLogin->controller_processReceivedData();
    }
}
