<?php
// có class chứa các function thực thi xử lý logic 
class AdminProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new AdminProduct();
    }

    public function Home()
    {
        echo "Đây là trang chủ";
    }

    public function productList()
    {
        $listProduct = $this->modelProduct->getAllProduct();
        // var_dump($listProduct);die();
        require_once './views/admin/products/listProduct.php';
    }
}
