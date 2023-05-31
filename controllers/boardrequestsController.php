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
        $offset = 0;

        $data['p'] = 1;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
            $data['p'] = intval($_GET['p']);
            if ($data['p'] == 0) {
                $data['p'] = 1;
            }
        }

        $offset = (15 * ($data['p'] - 1));

        $data['requests_list'] = $rq->getList($offset, $u->getCompany());
        $data['requests_count'] = $rq->getCount($u->getCompany());
        $data['p_count'] = ceil($data['requests_count'] / 15);

        $this->loadTemplate("boardrequests", $data);
    }

    public function create()
    {
        $data = array();
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        if (isset($_POST['license_plate']) && !empty($_POST['license_plate'])) {
            $license_plate = addslashes($_POST['license_plate']);
            $license_name = addslashes($_POST['license_name']);
            $cpf = addslashes($_POST['cpf']);
            $phone = addslashes($_POST['phone']);
            $plate_type = addslashes($_POST['plate_type']);

            $rq->create($license_plate, $license_name, $cpf, $phone, $plate_type, $u->getId(), $u->getCompany());
            header("Location: " . BASE_URL . "boardrequests");
        }

        $this->loadTemplate("boardrequests_create", $data);
    }

    public function show($id)
    {
        $data = array();
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $data['request_info'] = $rq->getInfo($id, $u->getCompany());

        $this->loadTemplate("boardrequests_show", $data);
    }

    public function search()
    {
        $data = array();
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $request_search = addslashes($_POST['request_search']);

        $data['list_search'] = $rq->getSearch($request_search);

        $this->loadTemplate("boardrequests_search", $data);
    }

    public function cancel($id)
    {
        $u = new Users();
        $rq = new BoardRequests();
        $u->setLoggedUser();

        $rq->changeStatus($id, 4, $u->getCompany());
        header("Location: " . BASE_URL . "boardrequests");
    }
}
