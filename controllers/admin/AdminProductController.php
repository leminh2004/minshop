<?php
// có class chứa các function thực thi xử lý logic 
class AdminProductController
{
    public $modelProduct;
    public $modelCategory;

    public function __construct()
    {
        $this->modelProduct = new AdminProduct();
        $this->modelCategory = new AdminCategory();
    }

    public function Home()
    {
        echo "Đây là trang chủ";
    }

    public function show()
    {
        $listProduct = $this->modelProduct->getAll();
        // var_dump($listProduct);die();
        require_once './views/admin/products/listProduct.php';
    }

    public function formAddProduct()
    {
        $listCategory = $this->modelCategory->getAll();
        require_once './views/admin/products/addProduct.php';
    }

    public function postProduct()
    {
        var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $image = $_POST['image'] ?? '';
            $price = $_POST['price'] ?? '';
            $discount = $_POST['discount'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $description = $_POST['description'] ?? '';
            $date = $_POST['date'] ?? '';

            $this->modelProduct->create(
                $name,
                $image,
                $price,
                $discount,
                $category_id,
                $quantity,
                $description,
                $date
            );
        }


        // header('Location: ' . BASE_URL . '?act=admin/san-pham');
        exit();
    }
}
