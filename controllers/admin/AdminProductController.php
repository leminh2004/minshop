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

    public function deitalProduct()
    {
        $id = $_GET['id'];
        $product = $this->modelProduct->getProduct($id);
        require_once './views/admin/products/detailProduct.php';
    }

    public function postProduct()
    {
        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $price = $_POST['price'] ?? '';
            $discount = $_POST['discount'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $description = $_POST['description'] ?? '';
            $date = $_POST['date'] ?? '';
            $errors = [];
            if (empty($name)) {
                $errors['name'] = "Tên không được để trống";
            }
            if (empty($price)) {
                $errors['price'] = "Giá sản phẩm được để trống";
            }

            if (!empty($discount)) {
                if ($discount <= 0) {
                    $errors['discount'] = "Giá khuyến mãi phải lớn hơn 0";
                } elseif ($price < $discount) {
                    $errors['discount'] = "Giá giá khuyến mãi phải lớn hơn giá sản phẩm";
                }
            }

            if (empty($category_id)) {
                $errors['category'] = "Vui lòng chọn danh mục";
            }

            if (empty($quantity)) {
                $errors['quantity'] = "Số lượng không được để trống";
            }
            if (empty($date)) {
                $errors['date'] = "Ngày nhập không được để trống";
            }
            if (empty($description)) {
                $errors['description'] = "Mô tả không được để trống";
            }

            $_SESSION['error'] = $errors;
            if (empty($errors)) {

                $image = uploadFile($_FILES['image'], './uploads/');
                // var_dump($image);die;

                // if($erros)
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
                unset($_SESSION['old']);
                header('Location: ' . BASE_URL . '?act=admin/san-pham');
                exit();
            } else {

                $_SESSION['flash'] = true;
                $_SESSION['old'] = $_POST;
                header('Location:' . BASE_URL . '?act=admin/form-them-san-pham');
            }
        }
    }

    public function formEditProduct()
    {
        $id = $_GET['id'];
        $listCategory = $this->modelCategory->getAll();
        $product = $this->modelProduct->getProduct($id);
        require_once './views/admin/products/editProduct.php';
    }

    public function postEditProduct()
    {

        // var_dump($_POST);die();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'] ?? '';
            $image = $_POST['image'] ?? '';
            $price = $_POST['price'] ?? '';
            $discount = $_POST['discount'] ?? '';
            $category_id = $_POST['category_id'] ?? '';
            $quantity = $_POST['quantity'] ?? '';
            $description = $_POST['description'] ?? '';
            $date = $_POST['date'] ?? '';

            // if($erros)
            $this->modelProduct->update(
                $id,
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

        header('Location: ' . BASE_URL . '?act=admin/san-pham');
        exit();
    }

    public function delete()
    {
        $id = $_GET['id'];
        $product = $this->modelProduct->getProduct($id);
        deleteFile($product['image']);
        $this->modelProduct->destroy($id);
        header('Location:' . BASE_URL . '?act=admin/san-pham');
        exit();
    }
}
