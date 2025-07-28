<?php 
// Require toàn bộ các file khai báo môi trường, thực thi,...(không require view)

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Controllers - Require toàn bộ file Controllers
// Admin
require_once './controllers/admin/AdminProductController.php';
require_once './controllers/admin/AdminCategoryController.php';

// User
require_once './controllers/user/HomeController.php';

// Models - Require toàn bộ file 
// Admin
require_once './models/admin/AdminProduct.php';
require_once './models/admin/AdminCategory.php';


// User
require_once './models/user/Product.php';

// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // User - trang chủ
    '/'=>(new HomeController())->Home(),

    //Admin
    'admin'=>(new AdminProductController())->Home(),
    'admin/danh-sach-san-pham'=>(new AdminProductController())->productList(),


};