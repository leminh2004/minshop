<?php
class HomeController
{
    public $modelProduct;
    public $modelCategory;

    public function __construct()
    {
        $this->modelProduct = new Product();
        $this->modelCategory = new Category();
    }

    public function home()
    {
        if (version_compare(PHP_VERSION, '1.0.0', '<')) {
            die('Yêu cầu PHP 8.0 trở lên');
        }

        $products = $this->modelProduct->productsLimit();
        $newProduct = $this->modelProduct->newProduct();
        $featuredProduct = $this->modelProduct->featured();
        require_once './views/user/index.php';
    }

        public function getAllProduct()
    {
        $products = $this->modelProduct->all();
        require_once './views/user/products.php';
    }

    public function detail()
    {
        $id = $_GET['id'];
        $product = $this->modelProduct->find($id);
        $featuredProduct = $this->modelProduct->featured();
        require_once './views/user/detail.php';
    }

    public function login()
    {
        require_once './views/user/login.php';
    }
}
