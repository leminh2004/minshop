<?php
// có class chứa các function thực thi xử lý logic 
class AdminCategoryController
{
    public $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new AdminCategory();
    }

    public function categoryList()
    {
        $listCategory = $this->modelCategory->getAllCategory();
        require_once './views/admin/categories/listCategory.php';
    }
}
