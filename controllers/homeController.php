<?php
class homeController extends controller
{

    public function __construct()
    {

        $u = new Users();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    public function index()
    {
        $data = array();
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        $data['pending'] = $rq->getPending($u->getCompany());
        $data['lastdays'] = $rq->getLastDaysList($u->getCompany());
        $data['currentmonth'] = $rq->getCurrentMonthList($u->getCompany());
        $data['total'] = $rq->getCount($u->getCompany());
        $this->loadTemplate('home', $data);
    }
}
