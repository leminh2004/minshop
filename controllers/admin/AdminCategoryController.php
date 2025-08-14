<?php
// có class chứa các function thực thi xử lý logic 
class AdminCategoryController
{
    public $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new AdminCategory();
    }

    public function show()
    {
        $listCategory = $this->modelCategory->getAll();
        require_once './views/admin/categories/listCategory.php';
        return  $listCategory;
    }

    public function formAddCategory()
    {
        require_once './views/admin/categories/addCategory.php';
    }

    public function postCategory()
    {
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];

            $errors = [];

            if (empty($name)) {
                $errors['name'] = "Vui lòng nhập tên danh mục";
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $this->modelCategory->create($name);

                // Xóa session errors
                unset($_SESSION['error']);
                header('Location:' . BASE_URL . '?act=admin/danh-muc');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('Location:' . BASE_URL . '?act=admin/form-them-danh-muc');
            }
        }
    }

    public function editCate()
    {
        $id = $_GET['id'];
        $category = $this->modelCategory->find($id);
        require_once './views/admin/categories/editCategory.php';
    }

    public function postEditCate()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $errors = [];

            if (empty($name)) {
                $errors['name'] = "Vui lòng nhập tên danh mục";
            }

            $_SESSION['error'] = $errors;

            if (empty($errors)) {
                $this->modelCategory->update($id, $name);

                // Xóa session errors
                unset($_SESSION['error']);
                header('Location:' . BASE_URL . '?act=admin/danh-muc');
                exit();
            } else {
                $id = $_POST['id'];
                $_SESSION['flash'] = true;
                $category = $this->modelCategory->find($id);
                header('Location:' . BASE_URL . '?act=admin/form-sua-danh-muc&id=' . $id);
            }
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->modelCategory->destroy($id);
        header('Location:' . BASE_URL . '?act=admin/danh-muc');
    }
}
