<?php


class ProductController extends Controller
{
    private $pageTpl = '/views/product.tpl.php';

    public function __construct()
    {
        $this->view = new View();
        $this->model = new ProductModel();
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $this->view->render('/views/login.tpl.php', $this->pageData);// cтраничка с формой
        } else {
            $this->pageData['title'] = "Продукты";

            $this->pageData['errors'] = [];

            $products = $this->model->getProducts();
            $this->pageData['products'] = $products;

            $this->view->render($this->pageTpl, $this->pageData);
        }
    }


    public function addProduct()
    {
        if (isset($_POST['submit'])) {
            $errors = [];
            if (isset($_POST["name"]) && $_POST["name"] != "") {
                $this->model->name = $_POST["name"];
            } else {
                $errors[] = "не указано наименование";
            }
            if (isset($_POST["cost"]) && $_POST["cost"] != "") {
                $this->model->cost = $_POST["cost"];
            } else {
                $errors[] = "не указана стоимость";
            }
            $this->pageData['errors'] = $errors;

            if (count($errors) == 0) {
                $this->model->addProduct();
            }
            $products = $this->model->getProducts();
            $this->pageData['products'] = $products;
            $this->view->render($this->pageTpl, $this->pageData);
        }
    }

    public function getProducts()
    {
        $products = $this->model->getProducts();
     //   var_dump($products);
        echo json_encode($products); // вот тут надо будет уточнить как выводить, но вроде как вот так прям должно быть
    }
    public function addProductToOrder()
    {
        if (isset($_POST['submit'])) {
            $errors = [];
            if (isset($_POST["name"]) && $_POST["name"] != "") {
                $this->model->name = $_POST["name"];
            } else {
                $errors[] = "не указано наименование";
            }
            if (isset($_POST["cost"]) && $_POST["cost"] != "") {
                $this->model->cost = $_POST["cost"];
            } else {
                $errors[] = "не указана стоимость";
            }
            $this->pageData['errors'] = $errors;

            if (count($errors) == 0) {
                $this->model->addProduct();
            }
            $products = $this->model->getProducts();
            $this->pageData['products'] = $products;
            $this->view->render($this->pageTpl, $this->pageData);
        }
    }

}

