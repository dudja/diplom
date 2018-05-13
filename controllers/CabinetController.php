<?php

class CabinetController extends Controller
{
    private $pageTpl = '/views/login.tpl.php';

    public function __construct()
    {
        $this->view = new View();
        $this->model = new CabinetModel();
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $this->view->render($this->pageTpl, $this->pageData);// cтраница с формой авторизации
        } else {
            $this->pageData['title'] = "Кабинет";

            $ordersCount = $this->model->getOrdersCount();
            $this->pageData['ordersCount'] = $ordersCount;

            $productsCount = $this->model->getProductsCount();
            $this->pageData['productsCount'] = $productsCount;

            $customerCount = $this->model->getCustomersCount();
            $this->pageData['customerCount'] = $customerCount;

            $orders = $this->model->getOrders();
            $this->pageData['orders'] = $orders;

            $this->view->render('/views/cabinet.tpl.php', $this->pageData);
        }
    }

    public function login()
    {
       if (isset($_POST['submit'])){
           if ($this->isValid($_POST['login'])) {
               $login = $_POST['login'];
           } else  {
               die("Логин должен быть больше 3 знаков");
           }


           if ($this->isValid($_POST['password'])) {
               $pass = $_POST['password'];
           } else  {
               die("Пароль должен быть больше 3 знаков");
           }


           $this->model->login = $login;
           $this->model->password = $pass;
           if ($this->model->checkUser()){
               $_SESSION['user'] = $login;
               header("Location: /"); // root.com/
           } else {
               $this->view->render($this->pageTpl, ['title' => "ошибка", "message" => "Пользователь не найден"]);// cтраничка с формой
           }
       } ;
    }

    public function logout()
    {
        unset($_SESSION["user"]);
        header ("Location: /cabinet");
}

    private function isValid($str)
    {
        return strlen($str) >3;
    }
}

