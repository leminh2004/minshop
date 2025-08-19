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

        $products = $this->modelProduct->allProducts();
        $newProduct = $this->modelProduct->newProduct();
        require_once './views/user/index.php';
    }
}
