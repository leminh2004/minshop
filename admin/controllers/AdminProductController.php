<?php
// có class chứa các function thực thi xử lý logic 
class AdminProductController
{
    public $modelProduct;

    public function __construct()
    {
        $this->modelProduct = new AdminProductModel();
    }

    public function Home()
    {
        $title = "Đây là trang chủ nhé hahaa";
        $thoiTiet = "Hôm nay trời có vẻ là mưa";
        require_once './views/trangchu.php';
    }
}
