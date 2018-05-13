<?php


class OrderController extends Controller
{
    private $pageTpl = '/views/order.tpl.php';

    public function __construct()
    {
        $this->view = new View();
        $this->model = new OrderModel();
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $this->view->render('/views/login.tpl.php', $this->pageData);// cтраничка с формой
        } else {
            $this->pageData['title'] = "Заказы";

            $orders = $this->model->getOrders();
            $this->pageData['orders'] = $orders;

            $this->view->render($this->pageTpl, $this->pageData);
        }
    }

    public function getOrders()
    {
        return $this->model->getOrders();
    }

    public function getStatistic()
    {
        echo json_encode( $this->model->getOrderSplitMonth() );
    }

    public function addOrder()
    {

        if (isset($_POST['submit'])) {
            $errors = [];
            if (isset($_POST["customerF"]) && $_POST["customerF"]!= "") {
                $this->model->customers_first_name = $_POST["customerF"];
            } else {
                $errors[] = "не указано Имя";
            }

            if (isset($_POST["customerL"]) && $_POST["customerL"]!= "") {
                $this->model->customers_last_name = $_POST["customerL"];
            } else {
                $errors[] = "не указана Фамилия";
            }

            if (isset($_POST["customerC"]) && $_POST["customerC"]!= "") {
                $this->model->customers_company_name = $_POST["customerC"];
            } else {
                $errors[] = "не указана Фамилия";
            }

            if (isset($_POST["product"])) {
                $this->model->products_id= $_POST["product"];
            } else {
                $errors[] = "не указан продукт";
            }

            if (isset($_POST["quantity"])) {
                $this->model->products_quantity = $_POST["quantity"];
            } else {
                $errors[] = "не указано количество";
            }


            $this->pageData['errors'] = $errors;

            if (count($errors) == 0) {
                $this->model->addOrder();
                header ("Location: /order");
            }

        }
    }
}

