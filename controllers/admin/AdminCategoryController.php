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
        var_dump($_POST);
        // var_dump('Form thêm');
        // echo 'Request method: ' . $_SERVER['REQUEST_METHOD'] . '<br>';
        // echo 'Form đã submit<br>';
        // echo '<pre>';
    }
}
