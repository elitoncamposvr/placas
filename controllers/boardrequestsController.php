<?php
class boardrequestsController extends controller
{

    public function __construct()
    {

        $u = new Users();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "/login");
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

        $data['requests_list'] = $rq->getList($u->getCompany());        
        $this->loadTemplate("boardrequests", $data);
    }

    public function create()
    {
        $data = array();
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();


        $this->loadTemplate("boardrequests_create", $data);
    }
}
